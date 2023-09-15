<?php

namespace App\Entity;

use App\Repository\ServicesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServicesRepository::class)]
class Services
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Services_Reparation = null;

    #[ORM\ManyToOne(inversedBy: 'Services')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Administrateur $administrateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getServicesReparation(): ?string
    {
        return $this->Services_Reparation;
    }

    public function setServicesReparation(string $Services_Reparation): static
    {
        $this->Services_Reparation = $Services_Reparation;

        return $this;
    }

    public function getAdministrateur(): ?Administrateur
    {
        return $this->administrateur;
    }

    public function setAdministrateur(?Administrateur $administrateur): static
    {
        $this->administrateur = $administrateur;

        return $this;
    }
}
