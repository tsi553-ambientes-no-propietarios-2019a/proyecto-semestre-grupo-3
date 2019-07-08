<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProvinciasRepository")
 */
class Provincias
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
    private $nomProv;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Cantones", mappedBy="idprov")
     */
    private $cantones;

    public function __construct()
    {
        $this->cantones = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProv(): ?string
    {
        return $this->nomProv;
    }

    public function setNomProv(string $nomProv): self
    {
        $this->nomProv = $nomProv;

        return $this;
    }

    /**
     * @return Collection|Cantones[]
     */
    public function getCantones(): Collection
    {
        return $this->cantones;
    }

    public function addCantone(Cantones $cantone): self
    {
        if (!$this->cantones->contains($cantone)) {
            $this->cantones[] = $cantone;
            $cantone->setIdprov($this);
        }

        return $this;
    }

    public function removeCantone(Cantones $cantone): self
    {
        if ($this->cantones->contains($cantone)) {
            $this->cantones->removeElement($cantone);
            // set the owning side to null (unless already changed)
            if ($cantone->getIdprov() === $this) {
                $cantone->setIdprov(null);
            }
        }

        return $this;
    }
}
