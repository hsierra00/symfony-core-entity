<?php

namespace App\Entity\Core\Base;

use Doctrine\ORM\Mapping as ORM;

/**
 * 
 */
trait Name
{
    /**
     * @ORM\Column(type="string", length=250, nullable=false)
     */
    protected $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}