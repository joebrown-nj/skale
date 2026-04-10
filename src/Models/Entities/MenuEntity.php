<?php
   
/*
*
* -------------------------------------------------------
* CLASSNAME:        menu
* GENERATION DATE:  2026-01-20 01:41:03
* CLASS FILE:       menu.class.php
* FOR MYSQL TABLE:  menu
* FOR MYSQL DB:     skaleup
* -------------------------------------------------------
*
*/

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "menu")]
class MenuEntity
{ 
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    public int|null $id = null;

    #[ORM\Column(type: 'string', length: 50)]
    public string $title;

    #[ORM\Column(type: 'string', length: 60)]
    public string $url;

    #[ORM\Column(type: 'string', length: 60)]
    public string $class;

    #[ORM\Column(type: 'integer')]
    // #[ORM\OneToOne(targetEntity: PageContentEntity::class)]
    // #[ORM\JoinColumn(name: "pageContentId", referencedColumnName: "id")]
    public int $pageContentId;

    #[ORM\Column(type: 'integer')]
    public int $parentId;

    #[ORM\Column(type: 'integer')]
    public int $listingOrder;

    #[ORM\Column(type: 'string', length: 20)]
    public string $menuLocation;

    #[ORM\Column(type: 'boolean')]
    public bool $active;

    // /**
    //  * Many Menus have Many Pages.
    //  * @var Collection<int, PageContentEntity>
    //  */
    // #[ManyToMany(targetEntity: PageContentEntity::class, inversedBy: 'menus')]
    // #[JoinTable(name: 'page_content')]
    // private Collection $pages;
    // public function __construct() {
    //     $this->pages = new ArrayCollection();
    // }

    // public function __construct($val=NULL)
    // {
        // $this->id = !isset($val->id) ? NULL : $val->id;
        // $this->title = !isset($val->title) ? NULL : $val->title;
        // $this->url = !isset($val->url) ? NULL : $val->url;
        // $this->class = !isset($val->class) ? NULL : $val->class;
        // $this->pageContentId = !isset($val->pageContentId) ? NULL : $val->pageContentId;
        // $this->parentId = !isset($val->parentId) ? NULL : $val->parentId;
        // $this->listingOrder = !isset($val->listingOrder) ? NULL : $val->listingOrder;
        // $this->menuLocation = !isset($val->menuLocation) ? NULL : $val->menuLocation;
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

    public function getclass()
    {
        return $this->class;
    }

    public function getpageContentId()
    {
        return $this->pageContentId;
    }

    public function getparentId()
    {
        return $this->parentId;
    }

    public function getlistingOrder()
    {
        return $this->listingOrder;
    }

    public function getmenuLocation()
    {
        return $this->menuLocation;
    }

    public function getactive()
    {
        return $this->active;
    }



    public function setid($val)
    {
        $this->id = !isset($val->id) ? NULL : $val->id;
    }

    public function settitle($val)
    {
        $this->title = !isset($val->title) ? NULL : $val->title;
    }

    public function seturl($val)
    {
        $this->url = !isset($val->url) ? NULL : $val->url;
    }

    public function setclass($val)
    {
        $this->class = !isset($val->class) ? NULL : $val->class;
    }

    public function setpageContentId($val)
    {
        $this->pageContentId = !isset($val->pageContentId) ? NULL : $val->pageContentId;
    }

    public function setparentId($val)
    {
        $this->parentId = !isset($val->parentId) ? NULL : $val->parentId;
    }

    public function setlistingOrder($val)
    {
        $this->listingOrder = !isset($val->listingOrder) ? NULL : $val->listingOrder;
    }

    public function setmenuLocation($val)
    {
        $this->menuLocation = !isset($val->menuLocation) ? NULL : $val->menuLocation;
    }

    public function setactive($val)
    {
        $this->menuLocation = !isset($val->menuLocation) ? NULL : $val->menuLocation;
    }
} 

// #[Entity]
// class PageContentEntity
// {
//     // ...
//     /** Many pageContent have one menu. This is the owning side. */
//     #[ManyToOne(targetEntity: MenuEntity::class, inversedBy: 'pageContents')]
//     #[JoinColumn(name: 'menu_id', referencedColumnName: 'id')]
//     private MenuEntity|null $menu = null;
//     // ...
// }

// #[Entity]
// class Feature
// {
//     // ...
//     /** Many features have one product. This is the owning side. */
//     #[ManyToOne(targetEntity: Product::class, inversedBy: 'features')]
//     #[JoinColumn(name: 'product_id', referencedColumnName: 'id')]
//     private Product|null $product = null;
//     // ...
// }

?>

