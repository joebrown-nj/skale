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
}


