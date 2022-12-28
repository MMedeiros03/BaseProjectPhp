<?php

namespace Nbwdigital\BaseProject\Entity;

use DateTime;
use Doctrine\ORM\Mapping\Embeddable;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;

#[Embeddable]
class Base
{

    #[Id]
    #[Column, GeneratedValue]
    public int $id;

    #[Column(name:'createDate', type:'datetime')]
    public DateTime $CreateDate;

    #[Column(name:'userCreate', type:'integer')]
    public int $UserCreate;

    #[Column(name:'updateDate', type:'datetime', nullable:true)]
    public DateTime $UpdateDate;

    #[Column(name:'userUpdate', type:'integer', nullable:true)]
    public int $UserUpdate;

    #[Column(name:'deleteDate', type:'datetime', nullable:true)]
    public DateTime $DeleteDate;

    #[Column(name:'userDelete', type:'integer', nullable:true)]
    public int $UserDelete;
    


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    // --------------------------------------------------

    /**
     * Get the value of CreateDate
     */ 
    public function getCreateDate()
    {
        return $this->CreateDate;
    }

    /**
     * Set the value of CreateDate
     *
     * @return  self
     */ 
    public function setCreateDate($CreateDate)
    {
        $this->CreateDate = $CreateDate;

        return $this;
    }

    // --------------------------------------------------

    /**
     * Get the value of UserCreate
     */ 
    public function getUserCreate()
    {
        return $this->UserCreate;
    }

    /**
     * Set the value of UserCreate
     *
     * @return  self
     */ 
    public function setUserCreate($UserCreate)
    {
        $this->UserCreate = $UserCreate;

        return $this;
    }

    /**
     * Get the value of UpdateDate
     */ 
    public function getUpdateDate()
    {
        return $this->UpdateDate;
    }

    /**
     * Set the value of UpdateDate
     *
     * @return  self
     */ 
    public function setUpdateDate($UpdateDate)
    {
        $this->UpdateDate = $UpdateDate;

        return $this;
    }

    // --------------------------------------------------

    /**
     * Get the value of UserUpdate
     */ 
    public function getUserUpdate()
    {
        return $this->UserUpdate;
    }

    /**
     * Set the value of UserUpdate
     *
     * @return  self
     */ 
    public function setUserUpdate($UserUpdate)
    {
        $this->UserUpdate = $UserUpdate;

        return $this;
    }

    // --------------------------------------------------

    /**
     * Get the value of DeleteDate
     */ 
    public function getDeleteDate()
    {
        return $this->DeleteDate;
    }

    /**
     * Set the value of DeleteDate
     *
     * @return  self
     */ 
    public function setDeleteDate($DeleteDate)
    {
        $this->DeleteDate = $DeleteDate;

        return $this;
    }

    // --------------------------------------------------

    /**
     * Get the value of UserDelete
     */ 
    public function getUserDelete()
    {
        return $this->UserDelete;
    }

    /**
     * Set the value of UserDelete
     *
     * @return  self
     */ 
    public function setUserDelete($UserDelete)
    {
        $this->UserDelete = $UserDelete;

        return $this;
    }

    // --------------------------------------------------
}
