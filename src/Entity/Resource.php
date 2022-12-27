<?php

namespace Nbwdigital\BaseProject\Entity;


use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table('resource')]
class Resource extends Base
{

    #[Column(name:'name')]
    public string $roleName;

    #[Column(name: 'label')]
    public string $Label;

    #[Column(name:'description')]
    public string $Description;
    

    /**
     * Get the value of roleName
     */ 
    public function getRoleName()
    {
        return $this->roleName;
    }

    /**
     * Set the value of roleName
     *
     * @return  self
     */ 
    public function setRoleName($roleName)
    {
        $this->roleName = $roleName;

        return $this;
    }
    //---------------------------------------------------

    /**
     * Get the value of Label
     */ 
    public function getLabel()
    {
        return $this->Label;
    }

    /**
     * Set the value of Label
     *
     * @return  self
     */ 
    public function setLabel($Label)
    {
        $this->Label = $Label;

        return $this;
    }
    //---------------------------------------------------

    /**
     * Get the value of Description
     */ 
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * Set the value of Description
     *
     * @return  self
     */ 
    public function setDescription($Description)
    {
        $this->Description = $Description;

        return $this;
    }
    //---------------------------------------------------
}