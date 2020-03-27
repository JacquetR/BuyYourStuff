<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategorieRepository")
 */
class Categorie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $namec;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNamec(): ?string
    {
        return $this->namec;
    }

    public function setNamec(string $namec): self
    {
        $this->namec = $namec;

        return $this;
    }
}
