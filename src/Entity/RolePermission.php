<?php

namespace Nbwdigital\BaseProject\Entity;


use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table('rolePermission')]
class RolePermission  extends Base
{

    #[Column(name:'roleName')]
    public string $roleName;

    #[Column(name: 'resourceId', type:'integer')]
    public int $resourceId;

    #[Column(name:'ResourceName')]
    public string $ResourceName;
    
    #[Column(name:'canView',type:'boolean')]
    public bool $CanView;

    #[Column(name:'canHandle',type:'boolean')]
    public bool $CanHandle;
   

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