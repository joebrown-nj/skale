<?php
   
/*
*
* -------------------------------------------------------
* CLASSNAME:        home_page
* GENERATION DATE:  2026-01-20 01:40:40
* CLASS FILE:       home_page.class.php
* FOR MYSQL TABLE:  home_page
* FOR MYSQL DB:     skaleup
* -------------------------------------------------------
*
*/

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "home_page")]
class HomePageEntity
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    public int|null $id = null;

    #[ORM\Column(type: 'string', length: 100)]
    public string $type;

    #[ORM\Column(type: 'string', length: 250)]
    public string $headline;

    #[ORM\Column(type: 'string', length: 250)]
    public string $subHeading;

    #[ORM\Column(type: 'text')]
    public string $text;

    #[ORM\Column(type: 'integer')]
    public int $impressions;

    #[ORM\Column(type: 'string', length: 250)]
    public string $url;

    #[ORM\Column(type: 'string', length: 150)]
    public string $buttonText;

    public function __construct($val=NULL)
    {
        // $this->id =  !isset($val->id) ? NULL : $val->id;
        // $this->type =  !isset($val->type) ? NULL : $val->type;
        // $this->headline =  !isset($val->headline) ? NULL : $val->headline;
        // $this->subHeading =  !isset($val->subHeading) ? NULL : $val->subHeading;
        // $this->text =  !isset($val->text) ? NULL : $val->text;
        // $this->impressions =  !isset($val->impressions) ? '0' : $val->impressions;
        // $this->url =  !isset($val->url) ? NULL : $val->url;
        // $this->buttonText =  !isset($val->buttonText) ? NULL : $val->buttonText;
    }

    public function getid()
    {
        return $this->id;
    }

    public function gettype()
    {
        return $this->type;
    }

    public function getheadline()
    {
        return $this->headline;
    }

    public function getsubHeading()
    {
        return $this->subHeading;
    }

    public function gettext()
    {
        return $this->text;
    }

    public function getimpressions()
    {
        return $this->impressions;
    }

    public function geturl()
    {
        return $this->url;
    }

    public function getbuttonText()
    {
        return $this->buttonText;
    }

    public function setid($val)
    {
        $this->id =  !isset($val->id) ? NULL : $val->id;
    }

    public function settype($val)
    {
        $this->type =  !isset($val->type) ? NULL : $val->type;
    }

    public function setheadline($val)
    {
        $this->headline =  !isset($val->headline) ? NULL : $val->headline;
    }

    public function setsubHeading($val)
    {
        $this->subHeading =  !isset($val->subHeading) ? NULL : $val->subHeading;
    }

    public function settext($val)
    {
        $this->text =  !isset($val->text) ? NULL : $val->text;
    }

    public function setimpressions($val)
    {
        $this->impressions =  !isset($val->impressions) ? '0' : $val->impressions;
    }

    public function seturl($val)
    {
        $this->url =  !isset($val->url) ? NULL : $val->url;
    }

    public function setbuttonText($val)
    {
        $this->buttonText =  !isset($val->buttonText) ? NULL : $val->buttonText;
    }
} 

?>

