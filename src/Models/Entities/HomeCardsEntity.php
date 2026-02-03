<?php
   
/*
*
* -------------------------------------------------------
* CLASSNAME:        home_cards
* GENERATION DATE:  2026-01-20 01:40:31
* CLASS FILE:       home_cards.class.php
* FOR MYSQL TABLE:  home_cards
* FOR MYSQL DB:     skaleup
* -------------------------------------------------------
*
*/

namespace App\Models\Entities;

class HomeCardsEntity
{ 
    public $title;   // (normal Attribute)

        public $image;   // (normal Attribute)

        public $bgImage;   // (normal Attribute)

        public $url;   // (normal Attribute)

        public $shortText;   // (normal Attribute)

        public $text;   // (normal Attribute)
    

    
    


// **********************
// CONSTRUCTOR
// **********************

public function __construct($val=NULL)
{
    $this->title =  !isset($val->title) ? NULL : $val->title;
    $this->image =  !isset($val->image) ? NULL : $val->image;
    $this->bgImage =  !isset($val->bgImage) ? NULL : $val->bgImage;
    $this->url =  !isset($val->url) ? NULL : $val->url;
    $this->shortText =  !isset($val->shortText) ? NULL : $val->shortText;
    $this->text =  !isset($val->text) ? NULL : $val->text;
}

public function gettitle()
{
    return $this->title;
}

public function getimage()
{
    return $this->image;
}

public function getbgImage()
{
    return $this->bgImage;
}

public function geturl()
{
    return $this->url;
}

public function getshortText()
{
    return $this->shortText;
}

public function gettext()
{
    return $this->text;
}

// **********************
// SETTER METHODS
// **********************


public function settitle($val)
{
    $this->title =  !isset($val->title) ? NULL : $val->title;
}

public function setimage($val)
{
    $this->image =  !isset($val->image) ? NULL : $val->image;
}

public function setbgImage($val)
{
    $this->bgImage =  !isset($val->bgImage) ? NULL : $val->bgImage;
}

public function seturl($val)
{
    $this->url =  !isset($val->url) ? NULL : $val->url;
}

public function setshortText($val)
{
    $this->shortText =  !isset($val->shortText) ? NULL : $val->shortText;
}

public function settext($val)
{
    $this->text =  !isset($val->text) ? NULL : $val->text;
}


} 

?>

