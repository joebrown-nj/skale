<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Contracts\UserLocationProviderInterface;
use App\Models\LogModel;

class LogController
{
    private UserLocationProviderInterface $userController;
    private LogModel $logModel;
    private array $user;

    public function __construct(UserLocationProviderInterface $userController, LogModel $logModel)
    {
        $this->userController = $userController;
        $this->logModel = $logModel;
        $this->user = $this->userController->getUserLocation();
    }

    public function getUser(): array
    {
        return $this->user;
    }

    public function logButtonClick(?array $input = null, ?array $server = null): bool
    {
        $input ??= $_POST;
        $server ??= $_SERVER;

        $data = [
            'target' => $input['target'] ?? '',
            'url' => $input['url'] ?? '',
            'detail' => $input['detail'] ?? '',
            'userIP' => $server['REMOTE_ADDR'] ?? '',
            'userInfo' => json_encode($this->user),
            'serverInfo' => json_encode($server),
        ];

        return $this->logModel->logButtonClick($data);
    }
}
