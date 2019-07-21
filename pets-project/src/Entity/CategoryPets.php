<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryPetsRepository")
 */
class CategoryPets
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
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AdPets", mappedBy="categorypets")
     */
    private $adPets;

    public function __construct()
    {
        $this->adPets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|AdPets[]
     */
    public function getAdPets(): Collection
    {
        return $this->adPets;
    }

    public function addAdPet(AdPets $adPet): self
    {
        if (!$this->adPets->contains($adPet)) {
            $this->adPets[] = $adPet;
            $adPet->setCategorypets($this);
        }

        return $this;
    }

    public function removeAdPet(AdPets $adPet): self
    {
        if ($this->adPets->contains($adPet)) {
            $this->adPets->removeElement($adPet);
            // set the owning side to null (unless already changed)
            if ($adPet->getCategorypets() === $this) {
                $adPet->setCategorypets(null);
            }
        }

        return $this;
    }
}
