<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CantonRepository")
 */
class Canton
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
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Province", inversedBy="cantons")
     */
    private $idprov;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AdPets", mappedBy="cantons")
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIdprov(): ?Province
    {
        return $this->idprov;
    }

    public function setIdprov(?Province $idprov): self
    {
        $this->idprov = $idprov;

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
            $adPet->setCantons($this);
        }

        return $this;
    }

    public function removeAdPet(AdPets $adPet): self
    {
        if ($this->adPets->contains($adPet)) {
            $this->adPets->removeElement($adPet);
            // set the owning side to null (unless already changed)
            if ($adPet->getCantons() === $this) {
                $adPet->setCantons(null);
            }
        }

        return $this;
    }
}
