final <?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Contracts\EmailServiceInterface;
use App\Core\Contracts\EmailTemplateRendererInterface;
use App\Core\Contracts\ViewInterface;
use App\Core\Http\JsonResponse;
use App\Core\Services\RequestBlocklistService;

class EmailController
{
    private EmailServiceInterface $emailModel;
    private RequestBlocklistService $requestBlocklistService;
    private ViewInterface $view;
}
