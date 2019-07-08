<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsuariosRepository")
 */
class Usuarios
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
    private $NomUser;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ApelUser;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $EmailUser;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $TelfUser;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PassUser;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cantones", inversedBy="usuarios")
     */
    private $idCanton;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Anuncio", mappedBy="iduser")
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

    public function getNomUser(): ?string
    {
        return $this->NomUser;
    }

    public function setNomUser(string $NomUser): self
    {
        $this->NomUser = $NomUser;

        return $this;
    }

    public function getApelUser(): ?string
    {
        return $this->ApelUser;
    }

    public function setApelUser(string $ApelUser): self
    {
        $this->ApelUser = $ApelUser;

        return $this;
    }

    public function getEmailUser(): ?string
    {
        return $this->EmailUser;
    }

    public function setEmailUser(string $EmailUser): self
    {
        $this->EmailUser = $EmailUser;

        return $this;
    }

    public function getTelfUser(): ?string
    {
        return $this->TelfUser;
    }

    public function setTelfUser(string $TelfUser): self
    {
        $this->TelfUser = $TelfUser;

        return $this;
    }

    public function getPassUser(): ?string
    {
        return $this->PassUser;
    }

    public function setPassUser(string $PassUser): self
    {
        $this->PassUser = $PassUser;

        return $this;
    }

    public function getIdCanton(): ?Cantones
    {
        return $this->idCanton;
    }

    public function setIdCanton(?Cantones $idCanton): self
    {
        $this->idCanton = $idCanton;

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
            $anuncio->setIduser($this);
        }

        return $this;
    }

    public function removeAnuncio(Anuncio $anuncio): self
    {
        if ($this->anuncios->contains($anuncio)) {
            $this->anuncios->removeElement($anuncio);
            // set the owning side to null (unless already changed)
            if ($anuncio->getIduser() === $this) {
                $anuncio->setIduser(null);
            }
        }

        return $this;
    }
}
