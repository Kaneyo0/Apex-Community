<?php

namespace App\Entity;

use App\Repository\SaisonRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SaisonRepository::class)
 */
class Saison
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint")
     */
    private $numero;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $newCaracter;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $newMap;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $newWeapon;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbFix;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getNewCaracter(): ?string
    {
        return $this->newCaracter;
    }

    public function setNewCaracter(?string $newCaracter): self
    {
        $this->newCaracter = $newCaracter;

        return $this;
    }

    public function getNewMap(): ?string
    {
        return $this->newMap;
    }

    public function setNewMap(?string $newMap): self
    {
        $this->newMap = $newMap;

        return $this;
    }

    public function getNewWeapon(): ?string
    {
        return $this->newWeapon;
    }

    public function setNewWeapon(?string $newWeapon): self
    {
        $this->newWeapon = $newWeapon;

        return $this;
    }

    public function getNbFix(): ?int
    {
        return $this->nbFix;
    }

    public function setNbFix(?int $nbFix): self
    {
        $this->nbFix = $nbFix;

        return $this;
    }
}
