<?php
   
/*
*
* -------------------------------------------------------
* CLASSNAME:        email_list_signups
* GENERATION DATE:  2026-01-20 01:40:21
* CLASS FILE:       email_list_signups.class.php
* FOR MYSQL TABLE:  email_list_signups
* FOR MYSQL DB:     skaleup
* -------------------------------------------------------
*
*/

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "email_list_signups")]
class EmailListSignupsEntity
{ 
   #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    public int|null $id = null;

    #[ORM\Column(type: 'string', length: 100)]
    public string $email;

    // #[ORM\Column(type: 'datetime')]
    // public DateTime $signUpDate;

    #[ORM\Column(type: 'string', length: 500)]
    public $userInfo;

    // **********************
    // CONSTRUCTOR
    // **********************

    // public function __construct($val=NULL)
    // {
    //     $this->id = !isset($val->id) ? NULL : $val->id;
    //     $this->email = !isset($val->email) ? NULL : $val->email;
    //     $this->signUpDate = !isset($val->signUpDate) ? date('Y-m-d H:i:s') : $val->signUpDate;
    //     $this->userInfo = !isset($val->userInfo) ? NULL : $val->userInfo;
    // }

    public function getid()
    {
        return $this->id;
    }

    public function getemail()
    {
        return $this->email;
    }

    // public function getsignUpDate()
    // {
    //     return $this->signUpDate;
    // }

    public function getuserInfo()
    {
        return $this->userInfo;
    }

    // **********************
    // SETTER METHODS
    // **********************

    // public function setid($val)
    // {
    //     $this->id = !isset($val->id) ? NULL : $val->id;
    // }

    // public function setemail($val)
    // {
    //     $this->email = !isset($val->email) ? NULL : $val->email;
    // }

    // public function setsignUpDate($val)
    // {
    //     $this->signUpDate = !isset($val->signUpDate) ? 'CURRENT_TIMESTAMP' : $val->signUpDate;
    // }

    // public function setuserInfo($val)
    // {
    //     $this->userInfo = !isset($val->userInfo) ? NULL : $val->userInfo;
    // }

    public function setid($val)
    {
        $this->id = !isset($val) ? NULL : $val;
    }

    public function setemail($val)
    {
        $this->email = !isset($val) ? NULL : $val;
    }

    // public function setsignUpDate($val='')
    // {
    //     $this->signUpDate = empty($val) ? date('Y-m-d H:i:s') : $val;
    // }

    public function setuserInfo($val)
    {
        $this->userInfo = !isset($val) ? NULL : $val;
    }
} 

?>

