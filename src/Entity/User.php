<?php

namespace Nbwdigital\BaseProject\Entity;


use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\JoinColumn;


#[Entity]
#[Table('user')]
class User extends Base
{

    #[Column(name:'name')]
    public string $name;

    #[Column(name: 'login',unique: true)]
    public string $login;

    #[Column(name:'password')]
    public string $password;

    #[OneToOne(targetEntity: Role::class)]
    #[JoinColumn(name: 'roleId', referencedColumnName: 'id')]
    public int $roleId;

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    public function getCnpj()
    {
        return $this->cnpj;
    }

    public function setCnpj(string $cnpj)
    {
        $this->cnpj = $cnpj;

        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status)
    {
        $this->status = $status;

        return $this;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin(string $login)
    {
        $this->login = $login;

        return $this;
    }
}