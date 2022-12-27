<?php

namespace Nbwdigital\BaseProject\Entity;

use DateTime;
use Doctrine\DBAL\Types\DateType;

class Base
{
    public int $id;

    public DateTime $CreateDate;

    public int $UserCreate;

    public DateTime $UpdateDate;

    public int $UserUpdate;

    public DateTime $DeleteDate;

    public int $UserDelete;
    
    // ------------------------------------------------------
    public function GetId(){
        return $this->id;
    }
    public function SetId(int $id){
        $this->id = $id;
        return $this;
    }

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
