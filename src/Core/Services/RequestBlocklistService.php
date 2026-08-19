final <?php

declare(strict_types=1);

namespace App\Core\Services;

use App\Models\Entities\RequestBlockRuleEntity;
use App\Models\RequestBlockRuleModel;

class RequestBlocklistService
{
    private const DEFAULT_PUBLIC_MESSAGE = 'Unable to process request.';

    /**
     * @var array<int, string>
     */
    private const REQUEST_ATTRIBUTES = [
        'ip',
        'user_agent',
        'path',
        'method',
        'referer',
        'query_string',
        'host',
    ];

    /**
     * @var array<int, string>
     */
    private const SUBMISSION_ATTRIBUTES = [
        'email',
        'email_domain',
        'phone',
        'name',
        'message',
    ];

    public function findMatchingRequestRule(?array $server = null, ?string $requestPath = null): ?RequestBlockRuleEntity
    {
        $server ??= $_SERVER;
        $context = $this->buildRequestContext($server, $requestPath);

        return $this->findMatchForContext($context, self::REQUEST_ATTRIBUTES);
    }

    public function findMatchingSubmissionRule(array $payload, ?array $server = null): ?RequestBlockRuleEntity
    {
        $context = $this->buildSubmissionContext($payload);
        $context['ip'] = $this->resolveClientIp($server ?? $_SERVER);

        return $this->findMatchForContext($context, array_merge(self::SUBMISSION_ATTRIBUTES, ['ip']));
    }

    public function getPublicMessage(?RequestBlockRuleEntity $rule, string $fallback = self::DEFAULT_PUBLIC_MESSAGE): string
    {
        $message = trim((string) ($rule?->getBlockMessage() ?? ''));

        return $message !== '' ? $message : $fallback;
    }

    /**
     * @param array<string, string> $context
     * @param array<int, string> $allowedAttributes
     */
    private function findMatchForContext(array $context, array $allowedAttributes): ?RequestBlockRuleEntity
    {
        foreach ($this->requestBlockRuleModel->getActiveRules() as $rule) {
            $attribute = $this->normalizeAttribute($rule->getAttribute());

            if (!in_array($attribute, $allowedAttributes, true)) {
                continue;
            }

            $candidate = $context[$attribute] ?? '';

            if ($candidate === '') {
                continue;
            }

            if ($this->matchesRule($rule, $candidate, $attribute)) {
                return $rule;
            }
        }

        return null;
    }

    /**
     * @return array<string, string>
     */
    private function buildRequestContext(array $server, ?string $requestPath): array
    {
        $path = $requestPath ?? (parse_url($server['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/');

        return [
            'ip' => $this->resolveClientIp($server),
            'user_agent' => trim((string) ($server['HTTP_USER_AGENT'] ?? '')),
            'path' => $this->normalizePath($path),
            'method' => strtoupper(trim((string) ($server['REQUEST_METHOD'] ?? 'GET'))),
            'referer' => trim((string) ($server['HTTP_REFERER'] ?? '')),
            'query_string' => trim((string) ($server['QUERY_STRING'] ?? '')),
            'host' => trim((string) ($server['HTTP_HOST'] ?? '')),
        ];
    }

    /**
     * @return array<string, string>
     */
    private function buildSubmissionContext(array $payload): array
    {
        $email = trim((string) ($payload['email'] ?? ''));
        $message = (string) ($payload['comment'] ?? $payload['message'] ?? '');

        return [
            'email' => strtolower($email),
            'email_domain' => $this->extractEmailDomain($email),
            'phone' => $this->normalizePhone((string) ($payload['phone'] ?? '')),
            'name' => trim((string) ($payload['name'] ?? '')),
            'message' => trim($message),
        ];
    }

    private function matchesRule(RequestBlockRuleEntity $rule, string $candidate, string $attribute): bool
    {
        $matchType = strtolower(trim($rule->getMatchType()));

        if ($matchType === 'cidr') {
            return $attribute === 'ip' && $this->matchesCidr($candidate, trim($rule->getRuleValue()));
        }

        $normalizedCandidate = $this->normalizeComparableValue($candidate, $attribute);
        $normalizedRuleValue = $this->normalizeComparableValue($rule->getRuleValue(), $attribute);

        if ($normalizedCandidate === '' || $normalizedRuleValue === '') {
            return false;
        }

        return match ($matchType) {
            'exact' => $normalizedCandidate === $normalizedRuleValue,
            'contains' => str_contains($normalizedCandidate, $normalizedRuleValue),
            'starts_with' => str_starts_with($normalizedCandidate, $normalizedRuleValue),
            'ends_with' => str_ends_with($normalizedCandidate, $normalizedRuleValue),
            default => false,
        };
    }

    private function normalizeAttribute(string $attribute): string
    {
        return strtolower(trim($attribute));
    }

    private function normalizeComparableValue(string $value, string $attribute): string
    {
        $trimmedValue = trim($value);

        return match ($attribute) {
            'path' => strtolower($this->normalizePath($trimmedValue)),
            'phone' => $this->normalizePhone($trimmedValue),
            'ip' => $trimmedValue,
            default => strtolower($trimmedValue),
        };
    }

    private function normalizePath(string $path): string
    {
        $normalizedPath = parse_url($path, PHP_URL_PATH) ?: '/';

        if ($normalizedPath !== '/' && str_ends_with($normalizedPath, '/')) {
            $normalizedPath = rtrim($normalizedPath, '/');
        }

        return $normalizedPath === '' ? '/' : $normalizedPath;
    }

    private function normalizePhone(string $phone): string
    {
        return preg_replace('/\D+/', '', $phone) ?? '';
    }

    private function extractEmailDomain(string $email): string
    {
        $parts = explode('@', strtolower(trim($email)));

        return count($parts) === 2 ? $parts[1] : '';
    }

    private function resolveClientIp(array $server): string
    {
        $forwardedFor = trim((string) ($server['HTTP_X_FORWARDED_FOR'] ?? ''));

        if ($forwardedFor !== '') {
            $ips = array_map('trim', explode(',', $forwardedFor));

            return $ips[0] ?? '';
        }

        $clientIp = trim((string) ($server['HTTP_CLIENT_IP'] ?? ''));

        if ($clientIp !== '') {
            return $clientIp;
        }

        return trim((string) ($server['REMOTE_ADDR'] ?? ''));
    }

    private function matchesCidr(string $ip, string $cidr): bool
    {
        if (!str_contains($cidr, '/')) {
            return false;
        }

        [$subnet, $prefixLength] = explode('/', $cidr, 2);
        $prefix = (int) $prefixLength;
        $ipBinary = @inet_pton($ip);
        $subnetBinary = @inet_pton(trim($subnet));

        if ($ipBinary === false || $subnetBinary === false || strlen($ipBinary) !== strlen($subnetBinary)) {
            return false;
        }

        $maxPrefix = strlen($ipBinary) * 8;

        if ($prefix < 0 || $prefix > $maxPrefix) {
            return false;
        }

        $fullBytes = intdiv($prefix, 8);
        $remainingBits = $prefix % 8;

        if ($fullBytes > 0 && substr($ipBinary, 0, $fullBytes) !== substr($subnetBinary, 0, $fullBytes)) {
            return false;
        }

        if ($remainingBits === 0) {
            return true;
        }

        $mask = (0xFF << (8 - $remainingBits)) & 0xFF;

        return (ord($ipBinary[$fullBytes]) & $mask) === (ord($subnetBinary[$fullBytes]) & $mask);
    }
}
