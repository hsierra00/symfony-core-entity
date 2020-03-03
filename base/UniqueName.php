<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * 
 */
trait UniqueName
{
    /**
     * @ORM\Column(type="string", length=250, unique=true, nullable=false)
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