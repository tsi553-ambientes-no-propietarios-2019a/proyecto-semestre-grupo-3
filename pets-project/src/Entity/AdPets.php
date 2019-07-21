<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdPetsRepository")
 */
class AdPets
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
    private $tittle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeAd", inversedBy="adPets")
     */
    private $typepets;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CategoryPets", inversedBy="adPets")
     */
    private $categorypets;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="adPets")
     */
    private $idUser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTittle(): ?string
    {
        return $this->tittle;
    }

    public function setTittle(string $tittle): self
    {
        $this->tittle = $tittle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getTypepets(): ?TypeAd
    {
        return $this->typepets;
    }

    public function setTypepets(?TypeAd $typepets): self
    {
        $this->typepets = $typepets;

        return $this;
    }

    public function getCategorypets(): ?CategoryPets
    {
        return $this->categorypets;
    }

    public function setCategorypets(?CategoryPets $categorypets): self
    {
        $this->categorypets = $categorypets;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }
}
