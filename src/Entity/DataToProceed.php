<?php

namespace App\Entity;

use App\Repository\DataToProceedRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DataToProceedRepository::class)
 */
class DataToProceed
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $someString;

    /**
     * @ORM\Column(type="integer")
     */
    private $someInt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSomeString(): ?string
    {
        return $this->someString;
    }

    public function setSomeString(string $someString): self
    {
        $this->someString = $someString;

        return $this;
    }

    public function getSomeInt(): ?int
    {
        return $this->someInt;
    }

    public function setSomeInt(int $someInt): self
    {
        $this->someInt = $someInt;

        return $this;
    }
}
