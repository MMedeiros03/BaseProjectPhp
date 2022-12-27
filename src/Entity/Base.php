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

    #[Column(name:'updateDate', type:'datetime')]
    public DateTime $UpdateDate;

    #[Column(name:'userUpdate', type:'integer')]
    public int $UserUpdate;

    #[Column(name:'deleteDate', type:'datetime')]
    public DateTime $DeleteDate;

    #[Column(name:'userDelete', type:'integer')]
    public int $UserDelete;
    

    // ------------------------------------------------------
    public function GetCreateDate(){
        return $this->CreateDate;
    }
    public function SetCreateDate(DateTime $CreateDate){
        $this->CreateDate = $CreateDate;
        return $this;
    }

    // ------------------------------------------------------
    public function GetUserCreate(){
        return $this->UserCreate;
    }
    public function SetUserCreate(int $UserCreate){
        $this->UserCreate = $UserCreate;
        return $this;
    }

    // ------------------------------------------------------
    public function GetUpdateDate(){
        return $this->UpdateDate;
    }
    public function SetUpdateDate(DateTime $UpdateDate){
        $this->UpdateDate = $UpdateDate;
        return $this;
    }

    // ------------------------------------------------------
    public function GetUserUpdate(){
        return $this->UserUpdate;
    }
    public function SetUserUpdate(int $UserUpdate){
        $this->UserUpdate = $UserUpdate;
        return $this;
    }

    // ------------------------------------------------------
    public function GetDeleteDate(){
        return $this->DeleteDate;
    }
    public function SetDeleteDate(DateTime $DeleteDate){
        $this->DeleteDate = $DeleteDate;
        return $this;
    }

    // ------------------------------------------------------
    public function GetUserDelete(){
        return $this->UserDelete;
    }
    public function SetUserDelete(int $UserDelete){
        $this->UserDelete = $UserDelete;
        return $this;
    }
}
