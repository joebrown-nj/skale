final <?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Contracts\UserLocationProviderInterface;

class UserController implements UserLocationProviderInterface
{
    private string $apiKey;
    private string $urlTemplate;

    #[\Override]
    public function getIPAddress(?array $server = null): string
    {
        $server ??= $_SERVER;

        if (isset($server['HTTP_CLIENT_IP'])) {
            return $server['HTTP_CLIENT_IP'];
        }

        if (isset($server['HTTP_X_FORWARDED_FOR'])) {
            return $server['HTTP_X_FORWARDED_FOR'];
        }

        return $server['REMOTE_ADDR'] ?? '127.0.0.1';
    }

    #[\Override]
    public function getUserLocation(): array|\ArrayAccess
    {
        $ipAddress = $this->getIPAddress();

        if (
            isset($_SESSION['userLocation'])
            && isset($_SESSION['userLocation']['ipAddress'])
            && $_SESSION['userLocation']['ipAddress'] == $ipAddress
        ) {
            return $_SESSION['userLocation'];
        }

        $urlToCall = sprintf($this->urlTemplate, $ipAddress);
        $rawJson = @file_get_contents($urlToCall);
        $data = is_string($rawJson) ? json_decode($rawJson, true) : null;

        if (is_array($data) && isset($data['city_name']) && $data['city_name'] !== '-') {
            $this->setUserLocationSession($data);
            return $data;
        }

        $fallbackLocation = $this->buildFallbackLocation($ipAddress);
        $this->setUserLocationSession($fallbackLocation);

        return $fallbackLocation;
    }

    private function setUserLocationSession(array $data): void
    {
        $_SESSION['userLocation'] = $data;
    }

    private function buildFallbackLocation(string $ipAddress): array
    {
        return [
            'ipAddress' => $ipAddress,
            'city_name' => 'Localhost',
            'region_name' => 'Localhost',
            'country_name' => 'Localhost',
        ];
    }
}
