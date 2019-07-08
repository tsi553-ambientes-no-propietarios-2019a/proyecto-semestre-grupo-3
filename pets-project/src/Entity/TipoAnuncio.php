<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TipoAnuncioRepository")
 */
class TipoAnuncio
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
    private $descTipo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Anuncio", mappedBy="idtipo")
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

    public function getDescTipo(): ?string
    {
        return $this->descTipo;
    }

    public function setDescTipo(string $descTipo): self
    {
        $this->descTipo = $descTipo;

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
            $anuncio->setIdtipo($this);
        }

        return $this;
    }

    public function removeAnuncio(Anuncio $anuncio): self
    {
        if ($this->anuncios->contains($anuncio)) {
            $this->anuncios->removeElement($anuncio);
            // set the owning side to null (unless already changed)
            if ($anuncio->getIdtipo() === $this) {
                $anuncio->setIdtipo(null);
            }
        }

        return $this;
    }
}
