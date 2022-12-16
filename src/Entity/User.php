<?php

namespace Nbwdigital\BaseProject\Entity;



use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table('user')]
class User
{
    #[Id]
    #[Column, GeneratedValue]
    private int $id;

    #[Column(name:'name')]
    private string $name;

    #[Column(name: 'cnpj')]
    private string $cnpj;

    #[Column(name:'status')]
    private string $status;

    #[Column(name: 'created_at')]
    private \DateTime $createdAt;

    #[Column(name: 'login',unique: true)]
    private string $login;


    public function getId(): int
    {
        return $this->id;
    }

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