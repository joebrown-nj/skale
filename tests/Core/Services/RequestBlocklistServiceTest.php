<?php declare(strict_types=1);

namespace Tests\Core\Services;

use App\Core\Services\RequestBlocklistService;
use App\Models\Entities\RequestBlockRuleEntity;
use App\Models\RequestBlockRuleModel;
use PHPUnit\Framework\TestCase;

final class RequestBlocklistServiceTest extends TestCase
{
    public function testMatchesExactIpRuleForRequest(): void
    {
        $service = $this->buildServiceWithRules([
            $this->buildRule('ip', 'exact', '203.0.113.25'),
        ]);

        $matchedRule = $service->findMatchingRequestRule([
            'REMOTE_ADDR' => '203.0.113.25',
            'REQUEST_METHOD' => 'GET',
            'REQUEST_URI' => '/contact',
        ], '/contact');

        $this->assertInstanceOf(RequestBlockRuleEntity::class, $matchedRule);
        $this->assertSame('ip', $matchedRule?->getAttribute());
    }

    public function testMatchesCidrIpRuleForRequest(): void
    {
        $service = $this->buildServiceWithRules([
            $this->buildRule('ip', 'cidr', '203.0.113.0/24'),
        ]);

        $matchedRule = $service->findMatchingRequestRule([
            'REMOTE_ADDR' => '203.0.113.88',
            'REQUEST_METHOD' => 'GET',
            'REQUEST_URI' => '/contact',
        ], '/contact');

        $this->assertInstanceOf(RequestBlockRuleEntity::class, $matchedRule);
        $this->assertSame('cidr', $matchedRule?->getMatchType());
    }

    public function testMatchesEmailDomainForSubmission(): void
    {
        $service = $this->buildServiceWithRules([
            $this->buildRule('email_domain', 'exact', 'mailinator.com'),
        ]);

        $matchedRule = $service->findMatchingSubmissionRule([
            'email' => 'bot@mailinator.com',
        ]);

        $this->assertInstanceOf(RequestBlockRuleEntity::class, $matchedRule);
        $this->assertSame('email_domain', $matchedRule?->getAttribute());
    }

    public function testMatchesNormalizedPhoneForSubmission(): void
    {
        $service = $this->buildServiceWithRules([
            $this->buildRule('phone', 'exact', '5550109999'),
        ]);

        $matchedRule = $service->findMatchingSubmissionRule([
            'phone' => '(555) 010-9999',
        ]);

        $this->assertInstanceOf(RequestBlockRuleEntity::class, $matchedRule);
        $this->assertSame('phone', $matchedRule?->getAttribute());
    }

    public function testReturnsConfiguredPublicMessageWhenAvailable(): void
    {
        $rule = $this->buildRule('ip', 'exact', '203.0.113.25');
        $rule->setBlockMessage('Access denied.');

        $service = $this->buildServiceWithRules([$rule]);

        $this->assertSame('Access denied.', $service->getPublicMessage($rule));
    }

    /**
     * @param array<int, RequestBlockRuleEntity> $rules
     */
    private function buildServiceWithRules(array $rules): RequestBlocklistService
    {
        $model = $this->createMock(RequestBlockRuleModel::class);
        $model->method('getActiveRules')->willReturn($rules);

        return new RequestBlocklistService($model);
    }

    private function buildRule(string $attribute, string $matchType, string $ruleValue): RequestBlockRuleEntity
    {
        return (new RequestBlockRuleEntity())
            ->setAttribute($attribute)
            ->setMatchType($matchType)
            ->setRuleValue($ruleValue)
            ->setActive(true);
    }
}
