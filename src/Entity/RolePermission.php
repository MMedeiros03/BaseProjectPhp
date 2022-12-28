<?php

namespace Nbwdigital\BaseProject\Entity;


use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table('rolePermission')]
class RolePermission  extends Base
{

    #[Column(name:'roleId')]
    public string $roleId;

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
    // --------------------------------------------------
    

    /**
     * Get the value of resourceId
     */ 
    public function getResourceId()
    {
        return $this->resourceId;
    }

    /**
     * Set the value of resourceId
     *
     * @return  self
     */ 
    public function setResourceId($resourceId)
    {
        $this->resourceId = $resourceId;

        return $this;
    }
    // --------------------------------------------------
    

    /**
     * Get the value of ResourceName
     */ 
    public function getResourceName()
    {
        return $this->ResourceName;
    }

    /**
     * Set the value of ResourceName
     *
     * @return  self
     */ 
    public function setResourceName($ResourceName)
    {
        $this->ResourceName = $ResourceName;

        return $this;
    }
    // --------------------------------------------------
    

    /**
     * Get the value of CanView
     */ 
    public function getCanView()
    {
        return $this->CanView;
    }

    /**
     * Set the value of CanView
     *
     * @return  self
     */ 
    public function setCanView($CanView)
    {
        $this->CanView = $CanView;

        return $this;
    }
    // --------------------------------------------------
    

    /**
     * Get the value of CanHandle
     */ 
    public function getCanHandle()
    {
        return $this->CanHandle;
    }

    /**
     * Set the value of CanHandle
     *
     * @return  self
     */ 
    public function setCanHandle($CanHandle)
    {
        $this->CanHandle = $CanHandle;

        return $this;
    }
    // --------------------------------------------------
    

    /**
     * Get the value of roleId
     */ 
    public function getRoleId()
    {
        return $this->roleId;
    }

    /**
     * Set the value of roleId
     *
     * @return  self
     */ 
    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;

        return $this;
    }
}