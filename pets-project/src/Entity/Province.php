<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProvinceRepository")
 */
class Province
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
     * @ORM\OneToMany(targetEntity="App\Entity\Canton", mappedBy="idprov")
     */
    private $cantons;

    public function __construct()
    {
        $this->cantons = new ArrayCollection();
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

    /**
     * @return Collection|Canton[]
     */
    public function getCantons(): Collection
    {
        return $this->cantons;
    }

    public function addCanton(Canton $canton): self
    {
        if (!$this->cantons->contains($canton)) {
            $this->cantons[] = $canton;
            $canton->setIdprov($this);
        }

        return $this;
    }

    public function removeCanton(Canton $canton): self
    {
        if ($this->cantons->contains($canton)) {
            $this->cantons->removeElement($canton);
            // set the owning side to null (unless already changed)
            if ($canton->getIdprov() === $this) {
                $canton->setIdprov(null);
            }
        }

        return $this;
    }
}
