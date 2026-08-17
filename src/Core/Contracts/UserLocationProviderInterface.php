<?php

declare(strict_types=1);

namespace App\Core\Contracts;

interface UserLocationProviderInterface
{
    public function getIPAddress(?array $server = null): string;

    public function getUserLocation();
}
