<?php

namespace App\Entity;

use App\Repository\ActionSemaineRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActionSemaineRepository::class)
 */
class ActionSemaine
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Video;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Joueur;

    /**
     * @ORM\Column(type="date")
     */
    private $Date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getVideo(): ?string
    {
        return $this->Video;
    }

    public function setVideo(string $Video): self
    {
        $this->Video = $Video;

        return $this;
    }

    public function getJoueur(): ?string
    {
        return $this->Joueur;
    }

    public function setJoueur(string $Joueur): self
    {
        $this->Joueur = $Joueur;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }
}
