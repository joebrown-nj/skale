<?php
   
/*
*
* -------------------------------------------------------
* CLASSNAME:        blog
* GENERATION DATE:  2026-01-20 01:38:15
* CLASS FILE:       blog.class.php
* FOR MYSQL TABLE:  blog
* FOR MYSQL DB:     skaleup
* -------------------------------------------------------
*
*/

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "blog")]
class BlogEntity
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    public int|null $id = null;

    #[ORM\Column(type: 'string', length: 50)]
    public string $title;

    #[ORM\Column(type: 'string', length: 100)]
    public $url;

    #[ORM\Column(type: 'text')]
    public $text;

    #[ORM\Column(type: 'text')]
    public $shortText;

    #[ORM\Column(type: 'string', length: 100)]
    public $image;

    #[ORM\Column(type: 'datetime')]
    public $datePosted;

    #[ORM\Column(type: 'boolean')]
    public $featured;

    #[ORM\Column(type: 'string', length: 100)]
    public $metaTitle;

    #[ORM\Column(type: 'string', length: 100)]
    public $metaDescription;

    #[ORM\Column(type: 'string', length: 100)]
    public $metaKeywords;

    // public function __construct($val=NULL)
    // {
        // $this->id =  !isset($val->id) ? NULL : $val->id;
        // $this->title =  !isset($val->title) ? NULL : $val->title;
        // $this->url =  !isset($val->url) ? NULL : $val->url;
        // $this->text =  !isset($val->text) ? NULL : $val->text;
        // $this->shortText =  !isset($val->shortText) ? NULL : $val->shortText;
        // $this->image =  !isset($val->image) ? NULL : $val->image;
        // $this->datePosted =  !isset($val->datePosted) ? NULL : $val->datePosted;
        // $this->featured =  !isset($val->featured) ? NULL : $val->featured;
        // $this->metaTitle =  !isset($val->metaTitle) ? NULL : $val->metaTitle;
        // $this->metaDescription =  !isset($val->metaDescription) ? NULL : $val->metaDescription;
        // $this->metaKeywords =  !isset($val->metaKeywords) ? NULL : $val->metaKeywords;
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

    public function gettext()
    {
        return $this->text;
    }

    public function getshortText()
    {
        return $this->shortText;
    }

    public function getimage()
    {
        return $this->image;
    }

    public function getdatePosted()
    {
        return $this->datePosted;
    }

    public function getfeatured()
    {
        return $this->featured;
    }

    public function getmetaTitle()
    {
        return $this->metaTitle;
    }

    public function getmetaDescription()
    {
        return $this->metaDescription;
    }

    public function getmetaKeywords()
    {
        return $this->metaKeywords;
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

    public function settext($val)
    {
        $this->text =  !isset($val->text) ? NULL : $val->text;
    }

    public function setshortText($val)
    {
        $this->shortText =  !isset($val->shortText) ? NULL : $val->shortText;
    }

    public function setimage($val)
    {
        $this->image =  !isset($val->image) ? NULL : $val->image;
    }

    public function setdatePosted($val)
    {
        $this->datePosted =  !isset($val->datePosted) ? NULL : $val->datePosted;
    }

    public function setfeatured($val)
    {
        $this->featured =  !isset($val->featured) ? NULL : $val->featured;
    }

    public function setmetaTitle($val)
    {
        $this->metaTitle =  !isset($val->metaTitle) ? NULL : $val->metaTitle;
    }

    public function setmetaDescription($val)
    {
        $this->metaDescription =  !isset($val->metaDescription) ? NULL : $val->metaDescription;
    }

    public function setmetaKeywords($val)
    {
        $this->metaKeywords =  !isset($val->metaKeywords) ? NULL : $val->metaKeywords;
    }
} 

?>

