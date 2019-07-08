<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CantonesRepository")
 */
class Cantones
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
    private $nomCanton;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Provincias", inversedBy="cantones")
     */
    private $idprov;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Usuarios", mappedBy="idCanton")
     */
    private $usuarios;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Anuncio", mappedBy="idcanton")
     */
    private $anuncios;

    public function __construct()
    {
        $this->usuarios = new ArrayCollection();
        $this->anuncios = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCanton(): ?string
    {
        return $this->nomCanton;
    }

    public function setNomCanton(string $nomCanton): self
    {
        $this->nomCanton = $nomCanton;

        return $this;
    }

    public function getIdprov(): ?Provincias
    {
        return $this->idprov;
    }

    public function setIdprov(?Provincias $idprov): self
    {
        $this->idprov = $idprov;

        return $this;
    }

    /**
     * @return Collection|Usuarios[]
     */
    public function getUsuarios(): Collection
    {
        return $this->usuarios;
    }

    public function addUsuario(Usuarios $usuario): self
    {
        if (!$this->usuarios->contains($usuario)) {
            $this->usuarios[] = $usuario;
            $usuario->setIdCanton($this);
        }

        return $this;
    }

    public function removeUsuario(Usuarios $usuario): self
    {
        if ($this->usuarios->contains($usuario)) {
            $this->usuarios->removeElement($usuario);
            // set the owning side to null (unless already changed)
            if ($usuario->getIdCanton() === $this) {
                $usuario->setIdCanton(null);
            }
        }

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
            $anuncio->setIdcanton($this);
        }

        return $this;
    }

    public function removeAnuncio(Anuncio $anuncio): self
    {
        if ($this->anuncios->contains($anuncio)) {
            $this->anuncios->removeElement($anuncio);
            // set the owning side to null (unless already changed)
            if ($anuncio->getIdcanton() === $this) {
                $anuncio->setIdcanton(null);
            }
        }

        return $this;
    }
}
