<?php
   
/*
*
* -------------------------------------------------------
* CLASSNAME:        contact
* GENERATION DATE:  2026-01-20 01:39:54
* CLASS FILE:       contact.class.php
* FOR MYSQL TABLE:  contact
* FOR MYSQL DB:     skaleup
* -------------------------------------------------------
*
*/

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "contact")]
class ContactEntity
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    public int|null $id = null;

    #[ORM\Column(type: 'string', length: 50)]
    public string $name;

    #[ORM\Column(type: 'string', length: 100)]
    public string $email;

    #[ORM\Column(type: 'string', length: 20)]
    public string $phone;

    // #[ORM\Column(type: 'string', length: 100)]
    // public string $subject;

    #[ORM\Column(type: 'text')]
    public string $message;

    #[ORM\Column(type: 'string', length: 100)]
    public string $interestedIn;

    // #[ORM\Column(type: 'datetime')]
    // public DateTime $date;

    // public function __construct($val=NULL)
    // {
    //     $this->id = !isset($val->id) ? NULL : $val->id;
    //     $this->name = !isset($val->name) ? NULL : $val->name;
    //     $this->email = !isset($val->email) ? NULL : $val->email;
    //     $this->phone = !isset($val->phone) ? NULL : $val->phone;
    //     $this->subject = !isset($val->subject) ? NULL : $val->subject;
    //     $this->message = !isset($val->message) ? NULL : $val->message;
    //     $this->interestedIn = !isset($val->interestedIn) ? NULL : $val->interestedIn;
    //     $this->date = !isset($val->date) ? date('Y-m-d H:i:s') : $val->date;         
    // }

    public function getid()
    {
        return $this->id;
    }

    public function getname()
    {
        return $this->name;
    }

    public function getemail()
    {
        return $this->email;
    }

    public function getphone()
    {
        return $this->phone;
    }

    // public function getsubject()
    // {
    //     return $this->subject;
    // }

    public function getmessage()
    {
        return $this->message;
    }

    public function getinterestedIn()
    {
        return $this->interestedIn;
    }

    // public function getdate()
    // {
    //     return $this->date;
    // }

    public function setid($val)
    {
        $this->id = !isset($val->id) ? NULL : $val->id;
    }

    public function setname($val)
    {
        $this->name = $val;
    }

    public function setemail($val)
    {
        $this->email = $val;
    }

    public function setphone($val)
    {
        $this->phone = $val;
    }

    // public function setsubject($val)
    // {
    //     $this->subject = $val;
    // }

    public function setmessage($val)
    {
        $this->message = $val;
    }

    public function setinterestedIn($val)
    {
        $this->interestedIn = $val;
    }

    // public function setdate($val='')
    // {
    //     $this->date = empty($val) ? date('Y-m-d H:i:s') : $val;
    // }
} 

?>