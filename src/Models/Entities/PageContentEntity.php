<?php
   
/*
*
* -------------------------------------------------------
* CLASSNAME:        page_content
* GENERATION DATE:  2026-01-20 01:41:12
* CLASS FILE:       page_content.class.php
* FOR MYSQL TABLE:  page_content
* FOR MYSQL DB:     skaleup
* -------------------------------------------------------
*
*/

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "page_content")]
class PageContentEntity
{ 
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    public int|null $id = null;

    #[ORM\Column(type: 'string', length: 50)]
    public string $title;

    #[ORM\Column(type: 'text')]
    public string $content;

    #[ORM\Column(type: 'string', length: 100)]
    public string $metaTitle;

    #[ORM\Column(type: 'string', length: 500)]
    public string $metaDescription;

    #[ORM\Column(type: 'string', length: 500)]
    public string $metaKeywords;

    #[ORM\Column(type: 'string', length: 100)]
    public string $dateUpdated;

    public function __construct($val=NULL)
    {
        // $this->id =  !isset($val->id) ? NULL : $val->id;
        // $this->title =  !isset($val->title) ? NULL : $val->title;
        // $this->content =  !isset($val->content) ? NULL : $val->content;
        // $this->metaTitle =  !isset($val->metaTitle) ? NULL : $val->metaTitle;
        // $this->metaDescription =  !isset($val->metaDescription) ? NULL : $val->metaDescription;
        // $this->metaKeywords =  !isset($val->metaKeywords) ? NULL : $val->metaKeywords;
        // $this->dateAdded =  !isset($val->dateAdded) ? date('Y-m-d H:i:s') : $val->dateAdded;        
        // $this->dateUpdated =  !isset($val->dateUpdated) ? date('Y-m-d H:i:s') : $val->dateUpdated;
    }

    public function getid()
    {
        return $this->id;
    }

    public function gettitle()
    {
        return $this->title;
    }

    public function getcontent()
    {
        return $this->content;
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

    public function getdateAdded()
    {
        return $this->dateAdded;
    }

    public function getdateUpdated()
    {
        return $this->dateUpdated;
    }

    public function setid($val)
    {
        $this->id =  !isset($val->id) ? NULL : $val->id;
    }

    public function settitle($val)
    {
        $this->title =  !isset($val->title) ? NULL : $val->title;
    }

    public function setcontent($val)
    {
        $this->content =  !isset($val->content) ? NULL : $val->content;
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

    public function setdateAdded($val)
    {
        $this->dateAdded =  !isset($val->dateAdded) ? 'CURRENT_TIMESTAMP' : $val->dateAdded;
    }

    public function setdateUpdated($val)
    {
        $this->dateUpdated =  !isset($val->dateUpdated) ? 'CURRENT_TIMESTAMP' : $val->dateUpdated;
    }
} 

?>

