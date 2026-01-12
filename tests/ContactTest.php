<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use App\Models\ContactModel;

final class ContactTest extends TestCase
{
    public function testCheckEmptyContactForm(): void
    {
        // $this->assertInstanceOf(
        //     Email::class,
        //     Email::fromString('user@example.com')
        // );
        $contactModel = new ContactModel();
        $empty = $contactModel->checkContactForm(array());
        $emptyVal = array(
            'Name is required',
            'Email is required',
            'Comment is required'
        );
        $this->assertSame($emptyVal, $empty);
    }

    // public function testCannotBeCreatedFromInvalidEmailAddress(): void
    // {
    //     $this->expectException(InvalidArgumentException::class);

    //     Email::fromString('invalid');
    // }

    // public function testCanBeUsedAsString(): void
    // {
    //     $this->assertEquals(
    //         'user@example.com',
    //         Email::fromString('user@example.com')
    //     );
    // }
}


