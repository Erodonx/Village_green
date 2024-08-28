<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class ContactDTO
{

    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max:200)]
    public string $name = '';

    #[Assert\NotBlank]
    #[Assert\Email]
    public string $email = '';

    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max:200)]
    public string $message = '';

    #[Assert\NotBlank]
    public string $service = '';
/*
    public function getName(): ?string
    {
        return $this->name;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }
    
    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }
    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }
    public function setMessage(?string $message): static
    {
        $this->message = $message;

        return $this;
    }
*/   
}