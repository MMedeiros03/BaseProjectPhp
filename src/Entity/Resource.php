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
    
   

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

}