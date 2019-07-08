<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategPetRepository")
 */
class CategPet
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
    private $descPet;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Anuncio", mappedBy="idcateg")
     */
    private $anuncios;

    public function __construct()
    {
        $this->anuncios = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescPet(): ?string
    {
        return $this->descPet;
    }

    public function setDescPet(string $descPet): self
    {
        $this->descPet = $descPet;

        return $this;
    }

    /**
     * @return Collection|Anuncio[]
     */
    public function getAnuncios(): Collection
    {
        return $this->anuncios;
    }

    public function addAnuncio(Anuncio $anuncio): self
    {
        if (!$this->anuncios->contains($anuncio)) {
            $this->anuncios[] = $anuncio;
            $anuncio->setIdcateg($this);
        }

        return $this;
    }

    public function removeAnuncio(Anuncio $anuncio): self
    {
        if ($this->anuncios->contains($anuncio)) {
            $this->anuncios->removeElement($anuncio);
            // set the owning side to null (unless already changed)
            if ($anuncio->getIdcateg() === $this) {
                $anuncio->setIdcateg(null);
            }
        }

        return $this;
    }
}
