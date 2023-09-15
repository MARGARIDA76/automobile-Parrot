<?php

namespace App\Entity;

use App\Repository\VoituresOccasionsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoituresOccasionsRepository::class)]
class VoituresOccasions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $Prix = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $Annee_de_mise_en_circulation = null;

    #[ORM\Column(length: 255)]
    private ?string $Kilometrage = null;

    #[ORM\Column(length: 255)]
    private ?string $Caracteristiques = null;

    #[ORM\Column(length: 255)]
    private ?string $Equipments = null;

    #[ORM\Column(length: 255)]
    private ?string $Options_installees = null;

    #[ORM\ManyToOne(inversedBy: 'VoituresOccasions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Employes $employes = null;



    public function __construct()
    {
        $this->Annee_de_mise_en_circulation = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrix(): ?string
    {
        return $this->Prix;
    }

    public function setPrix(string $Prix): static
    {
        $this->Prix = $Prix;

        return $this;
    }

    public function getAnneeDeMiseEnCirculation(): ?\DateTimeImmutable
    {
        return $this->Annee_de_mise_en_circulation;
    }

    public function setAnneeDeMiseEnCirculation(\DateTimeImmutable $Annee_de_mise_en_circulation): static
    {
        $this->Annee_de_mise_en_circulation = $Annee_de_mise_en_circulation;

        return $this;
    }

    public function getKilometrage(): ?string
    {
        return $this->Kilometrage;
    }

    public function setKilometrage(string $Kilometrage): static
    {
        $this->Kilometrage = $Kilometrage;

        return $this;
    }

    public function getCaracteristiques(): ?string
    {
        return $this->Caracteristiques;
    }

    public function setCaracteristiques(string $Caracteristiques): static
    {
        $this->Caracteristiques = $Caracteristiques;

        return $this;
    }

    public function getEquipments(): ?string
    {
        return $this->Equipments;
    }

    public function setEquipments(string $Equipments): static
    {
        $this->Equipments = $Equipments;

        return $this;
    }

    public function getOptionsInstallees(): ?string
    {
        return $this->Options_installees;
    }

    public function setOptionsInstallees(string $Options_installees): static
    {
        $this->Options_installees = $Options_installees;

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
