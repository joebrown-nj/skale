final <?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Contracts\ContactFormInterface;
use App\Core\Contracts\ViewInterface;
use App\Core\Http\JsonResponse;
use App\Core\Services\FormSubmissionService;
use App\Core\Services\RequestBlocklistService;
use App\Models\PageContentModel;

class ContactController
{
    private ContactFormInterface $contactModel;
    private FormSubmissionService $formSubmissionService;
    private RequestBlocklistService $requestBlocklistService;
    private ViewInterface $view;

    public function index(): void
    {
        $this->view->render('contact');
    }

    private function normalizeInput(array $input): array
    {
        $input['form_type'] = trim((string) ($input['form_type'] ?? 'contact'));
        $input['name'] = trim((string) ($input['name'] ?? ''));
        $input['email'] = trim((string) ($input['email'] ?? ''));

        if ($input['form_type'] === 'newsletter' && $input['name'] === '') {
            $input['name'] = 'Newsletter Subscriber';
            $input['subscribe'] = 1;
        }

        if (isset($input['interest']) && !isset($input['interests'])) {
            $input['interests'] = [$input['interest']];
        }

        return $input;
    }
}
