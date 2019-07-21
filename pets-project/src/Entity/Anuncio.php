<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnuncioRepository")
 * @Vich\Uploadable 
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
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="imageName", size="imageSize")
     * 
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imageName;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     */
    private $imageSize;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    

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

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }
    
    public function setImageSize(?int $imageSize): void
    {
        $this->imageSize = $imageSize;
    }

    public function getImageSize(): ?int
    {
        return $this->imageSize;
    }
}
