<?php
   
/*
*
* -------------------------------------------------------
* CLASSNAME:        portfolio
* GENERATION DATE:  2026-03-27 01:38:15
* CLASS FILE:       portfolio.class.php
* FOR MYSQL TABLE:  portfolio
* FOR MYSQL DB:     skaleup
* -------------------------------------------------------
*
*/

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "portfolio")]
class PortfolioEntity
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    public int|null $id = null;

    #[ORM\Column(type: 'string', length: 100)]
    public string $title;

    #[ORM\Column(type: 'string', length: 150)]
    public string $url;

    #[ORM\Column(type: 'string', length: 500)]
    public string $text;

    #[ORM\Column(type: 'string', length: 100)]
    public string $image;
}

?>

