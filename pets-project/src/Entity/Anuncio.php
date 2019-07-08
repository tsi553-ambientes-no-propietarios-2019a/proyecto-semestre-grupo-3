<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnuncioRepository")
 */
class Anuncio
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
    private $titulo;

    /**
     * @ORM\Column(type="text")
     */
    private $Descr;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TipoAnuncio", inversedBy="anuncios")
     */
    private $idtipo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CategPet", inversedBy="anuncios")
     */
    private $idcateg;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuarios", inversedBy="anuncios")
     */
    private $iduser;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cantones", inversedBy="anuncios")
     */
    private $idcanton;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getDescr(): ?string
    {
        return $this->Descr;
    }

    public function setDescr(string $Descr): self
    {
        $this->Descr = $Descr;

        return $this;
    }

    public function getIdtipo(): ?TipoAnuncio
    {
        return $this->idtipo;
    }

    public function setIdtipo(?TipoAnuncio $idtipo): self
    {
        $this->idtipo = $idtipo;

        return $this;
    }

    public function getIdcateg(): ?CategPet
    {
        return $this->idcateg;
    }

    public function setIdcateg(?CategPet $idcateg): self
    {
        $this->idcateg = $idcateg;

        return $this;
    }

    public function getIduser(): ?Usuarios
    {
        return $this->iduser;
    }

    public function setIduser(?Usuarios $iduser): self
    {
        $this->iduser = $iduser;

        return $this;
    }

    public function getIdcanton(): ?Cantones
    {
        return $this->idcanton;
    }

    public function setIdcanton(?Cantones $idcanton): self
    {
        $this->idcanton = $idcanton;

        return $this;
    }
}
