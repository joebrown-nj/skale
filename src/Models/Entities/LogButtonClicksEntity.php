<?php
   
/*
*
* -------------------------------------------------------
* CLASSNAME:        log_button_clicks
* GENERATION DATE:  2026-01-20 01:40:55
* CLASS FILE:       log_button_clicks.class.php
* FOR MYSQL TABLE:  log_button_clicks
* FOR MYSQL DB:     skaleup
* -------------------------------------------------------
*
*/

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "log_button_clicks")]
class LogButtonClicksEntity
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    public int|null $id = null;

    #[ORM\Column(type: 'string', length: 50)]
    public string $target;

    // #[ORM\Column(type: 'datetime')]
    // public DateTime $date;

    #[ORM\Column(type: 'string', length: 100)]
    public string $url;

    #[ORM\Column(type: 'text')]
    public string $detail;

    #[ORM\Column(type: 'string', length: 50)]
    public string $userIP;

    #[ORM\Column(type: 'text')]
    public string $userInfo;

    #[ORM\Column(type: 'text')]
    public string $serverInfo;

    // public function __construct($val=NULL)
    // {
    //     $this->id = !isset($val->id) ? NULL : $val->id;
    //     $this->target = !isset($val->target) ? NULL : $val->target;
    //     $this->date = !isset($val->date) ? date('Y-m-d H:i:s') : $val->date;
    //     $this->url = !isset($val->url) ? NULL : $val->url;
    //     $this->detail = !isset($val->detail) ? NULL : $val->detail;
    //     $this->userIP = !isset($val->userIP) ? NULL : $val->userIP;
    //     $this->userInfo = !isset($val->userInfo) ? NULL : $val->userInfo;
    //     $this->serverInfo = !isset($val->serverInfo) ? NULL : $val->serverInfo;
    // }

    public function getid()
    {
        return $this->id;
    }

    public function gettarget()
    {
        return $this->target;
    }

    public function getdate()
    {
        return $this->date;
    }

    public function geturl()
    {
        return $this->url;
    }

    public function getdetail()
    {
        return $this->detail;
    }

    public function getuserIP()
    {
        return $this->userIP;
    }

    public function getuserInfo()
    {
        return $this->userInfo;
    }

    public function getserverInfo()
    {
        return $this->serverInfo;
    }

    public function setid($val)
    {
        $this->id = !isset($val) ? NULL : $val;
    }

    public function settarget($val)
    {
        $this->target = !isset($val) ? '' : $val;
    }

    // public function setdate($val)
    // {
    //     $this->date = !isset($val->date) ? 'CURRENT_TIMESTAMP' : $val->date;
    // }

    public function seturl($val)
    {
        $this->url = !isset($val) ? '' : $val;
    }

    public function setdetail($val)
    {
        $this->detail = !isset($val) ? '' : $val;
    }

    public function setuserIP($val)
    {
        $this->userIP = !isset($val) ? '' : $val;
    }

    public function setuserInfo($val)
    {
        $this->userInfo = !isset($val) ? '' : $val;
    }

    public function setserverInfo($val)
    {
        $this->serverInfo = !isset($val) ? '' : $val;
    }
}

?>

