<?php
   
/*
*
* -------------------------------------------------------
* CLASSNAME:        services
* GENERATION DATE:  2026-01-20 01:41:20
* CLASS FILE:       services.class.php
* FOR MYSQL TABLE:  services
* FOR MYSQL DB:     skaleup
* -------------------------------------------------------
*
*/

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;
use DateTime;
// use Doctrine\DBAL\Types\Type;
// use Doctrine\DBAL\Types\Types;

#[ORM\Entity]
#[ORM\Table(name: "services")]
class ServicesEntity
{ 
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    public int|null $id = null;

    #[ORM\Column(type: 'string', length: 50)]
    public string $title;

    #[ORM\Column(type: 'string', length: 50)]
    public string $url;

    #[ORM\Column(type: 'string', length: 50)]
    public string $iconType;

    #[ORM\Column(type: 'string', length: 50)]
    public string $iconBootstrap;

    #[ORM\Column(type: 'string', length: 50)]
    public string $iconFontAwesome;

    #[ORM\Column(type: 'string', length: 50)]
    public string $largeIcon;

    #[ORM\Column(type: 'text')]
    public string $shortText;

    #[ORM\Column(type: 'text')]
    public string $text;

    #[ORM\Column(type: 'string', length: 50)]
    public string $image;

    #[ORM\Column(type: 'string', length: 50)]
    public string $headerImage;

    #[ORM\Column(type: 'string', length: 50)]
    public string $whyChooseList;

    #[ORM\Column(type: 'string', length: 50)]
    public string $footerCallout;

    #[ORM\Column(type: 'datetime')]
    public DateTime $dateAdded;

    #[ORM\Column(type: 'datetime')]
    public DateTime $dateUpdated;

    #[ORM\Column(type: 'integer')]
    public int $listingOrder;

    // public function __construct($val=NULL)
    // {
    //     $this->id =  !isset($val->id) ? NULL : $val->id;
    //     $this->title =  !isset($val->title) ? NULL : $val->title;
    //     $this->url =  !isset($val->url) ? NULL : $val->url;
    //     $this->iconType =  !isset($val->iconType) ? NULL : $val->iconType;
    //     $this->iconBootstrap =  !isset($val->iconBootstrap) ? NULL : $val->iconBootstrap;
    //     $this->iconFontAwesome =  !isset($val->iconFontAwesome) ? NULL : $val->iconFontAwesome;
    //     $this->largeIcon =  !isset($val->largeIcon) ? NULL : $val->largeIcon;
    //     $this->shortText =  !isset($val->shortText) ? NULL : $val->shortText;
    //     $this->text =  !isset($val->text) ? NULL : $val->text;
    //     $this->image =  !isset($val->image) ? NULL : $val->image;
    //     $this->headerImage =  !isset($val->headerImage) ? NULL : $val->headerImage;
    //     $this->whyChooseList =  !isset($val->whyChooseList) ? NULL : $val->whyChooseList;
    //     $this->footerCallout =  !isset($val->footerCallout) ? NULL : $val->footerCallout;
    //     $this->dateAdded =  !isset($val->dateAdded) ? date('Y-m-d H:i:s') : $val->dateAdded;
    //     $this->dateUpdated =  !isset($val->dateUpdated) ? NULL : $val->dateUpdated;
    //     $this->listingOrder =  !isset($val->listingOrder) ? NULL : $val->listingOrder;
    // }

    public function getid()
    {
        return $this->id;
    }

    public function gettitle()
    {
        return $this->title;
    }

    public function geturl()
    {
        return $this->url;
    }

    public function geticonType()
    {
        return $this->iconType;
    }

    public function geticonBootstrap()
    {
        return $this->iconBootstrap;
    }

    public function geticonFontAwesome()
    {
        return $this->iconFontAwesome;
    }

    public function getlargeIcon()
    {
        return $this->largeIcon;
    }

    public function getshortText()
    {
        return $this->shortText;
    }

    public function gettext()
    {
        return $this->text;
    }

    public function getimage()
    {
        return $this->image;
    }

    public function getheaderImage()
    {
        return $this->headerImage;
    }

    public function getwhyChooseList()
    {
        return $this->whyChooseList;
    }

    public function getfooterCallout()
    {
        return $this->footerCallout;
    }

    public function getdateAdded()
    {
        return $this->dateAdded;
    }

    public function getdateUpdated()
    {
        return $this->dateUpdated;
    }

    public function getlistingOrder()
    {
        return $this->listingOrder;
    }

    public function setid($val)
    {
        $this->id =  !isset($val->id) ? NULL : $val->id;
    }

    public function settitle($val)
    {
        $this->title =  !isset($val->title) ? NULL : $val->title;
    }

    public function seturl($val)
    {
        $this->url =  !isset($val->url) ? NULL : $val->url;
    }

    public function seticonType($val)
    {
        $this->iconType =  !isset($val->iconType) ? NULL : $val->iconType;
    }

    public function seticonBootstrap($val)
    {
        $this->iconBootstrap =  !isset($val->iconBootstrap) ? NULL : $val->iconBootstrap;
    }

    public function seticonFontAwesome($val)
    {
        $this->iconFontAwesome =  !isset($val->iconFontAwesome) ? NULL : $val->iconFontAwesome;
    }

    public function setlargeIcon($val)
    {
        $this->largeIcon =  !isset($val->largeIcon) ? NULL : $val->largeIcon;
    }

    public function setshortText($val)
    {
        $this->shortText =  !isset($val->shortText) ? NULL : $val->shortText;
    }

    public function settext($val)
    {
        $this->text =  !isset($val->text) ? NULL : $val->text;
    }

    public function setimage($val)
    {
        $this->image =  !isset($val->image) ? NULL : $val->image;
    }

    public function setheaderImage($val)
    {
        $this->headerImage =  !isset($val->headerImage) ? NULL : $val->headerImage;
    }

    public function setwhyChooseList($val)
    {
        $this->whyChooseList =  !isset($val->whyChooseList) ? NULL : $val->whyChooseList;
    }

    public function setfooterCallout($val)
    {
        $this->footerCallout =  !isset($val->footerCallout) ? NULL : $val->footerCallout;
    }

    public function setdateAdded($val)
    {
        $this->dateAdded =  !isset($val->dateAdded) ? 'CURRENT_TIMESTAMP' : $val->dateAdded;
    }

    public function setdateUpdated($val)
    {
        $this->dateUpdated =  !isset($val->dateUpdated) ? NULL : $val->dateUpdated;
    }

    public function setlistingOrder($val)
    {
        $this->listingOrder =  !isset($val->listingOrder) ? NULL : $val->listingOrder;
    }
} 

?>

