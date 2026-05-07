<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
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
}


