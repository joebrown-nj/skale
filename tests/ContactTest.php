<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Core\Services\FormSubmissionService;
use App\Models\ContactModel;

final class ContactTest extends TestCase
{
    public function testCheckEmptyContactForm(): void
    {
        $contactModel = (new \ReflectionClass(ContactModel::class))->newInstanceWithoutConstructor();
        $empty = $contactModel->checkContactForm(array());
        $emptyVal = array(
            'Name is required',
            'Email is required',
            'Phone is required',
            'Comment is required'
        );
        $this->assertSame($emptyVal, $empty);
    }

    public function testCheckContactFormReturnsOnlyEmailErrorWhenEmailIsInvalid(): void
    {
        $contactModel = (new \ReflectionClass(ContactModel::class))->newInstanceWithoutConstructor();

        $errors = $contactModel->checkContactForm([
            'name' => 'Jane Doe',
            'email' => 'not-an-email',
            'phone' => '555-0100',
            'comment' => 'Need help with growth.',
        ]);

        $this->assertSame(['Email is required'], $errors);
    }

    public function testCheckContactFormReturnsNoErrorsForValidPayload(): void
    {
        $contactModel = (new \ReflectionClass(ContactModel::class))->newInstanceWithoutConstructor();

        $errors = $contactModel->checkContactForm([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'phone' => '555-0100',
            'comment' => 'Need help with growth.',
            'interests' => ['SEO', 'Automation'],
        ]);

        $this->assertSame([], $errors);
    }

    public function testDetectsHtmlAndCodePayloadsAsMalicious(): void
    {
        $service = (new \ReflectionClass(FormSubmissionService::class))->newInstanceWithoutConstructor();

        $this->assertTrue($service->containsMaliciousInput([
            'name' => '<script>alert("xss")</script>',
            'email' => 'jane@example.com',
            'comment' => 'normal text',
        ]));

        $this->assertTrue($service->containsMaliciousInput([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'comment' => '<?php echo "code"; ?>',
        ]));

        $this->assertFalse($service->containsMaliciousInput([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'comment' => 'This is a normal message with < and > symbols for pricing.',
        ]));
    }
}


