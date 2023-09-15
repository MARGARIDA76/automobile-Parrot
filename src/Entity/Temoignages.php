<?php

namespace App\Entity;

use App\Repository\TemoignagesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TemoignagesRepository::class)]
class Temoignages
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Commetaire = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Note = null;

    #[ORM\ManyToOne(inversedBy: 'Temoignages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Employes $employes = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getCommetaire(): ?string
    {
        return $this->Commetaire;
    }

    public function setCommetaire(string $Commetaire): static
    {
        $this->Commetaire = $Commetaire;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->Note;
    }

    public function setNote(string $Note): static
    {
        $this->Note = $Note;

        return $this;
    }

    public function getEmployes(): ?Employes
    {
        return $this->employes;
    }

    public function setEmployes(?Employes $employes): static
    {
        $this->employes = $employes;

        return $this;
    }
}
