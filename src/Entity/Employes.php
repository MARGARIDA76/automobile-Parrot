<?php

namespace App\Entity;

use App\Repository\EmployesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployesRepository::class)]
class Employes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Adresse_Email = null;

    #[ORM\Column(length: 255)]
    private ?string $Mot_de_Passe = null;

    #[ORM\ManyToOne(inversedBy: 'Employes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Administrateur $administrateur = null;

    #[ORM\OneToMany(mappedBy: 'employes', targetEntity: VoituresOccasions::class)]
    private Collection $VoituresOccasions;

    #[ORM\OneToMany(mappedBy: 'employes', targetEntity: Temoignages::class)]
    private Collection $Temoignages;

    public function __construct()
    {
        $this->VoituresOccasions = new ArrayCollection();
        $this->Temoignages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresseEmail(): ?string
    {
        return $this->Adresse_Email;
    }

    public function setAdresseEmail(string $Adresse_Email): static
    {
        $this->Adresse_Email = $Adresse_Email;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->Mot_de_Passe;
    }

    public function setMotDePasse(string $Mot_de_Passe): static
    {
        $this->Mot_de_Passe = $Mot_de_Passe;

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

    /**
     * @return Collection<int, VoituresOccasions>
     */
    public function getVoituresOccasions(): Collection
    {
        return $this->VoituresOccasions;
    }

    public function addVoituresOccasion(VoituresOccasions $voituresOccasion): static
    {
        if (!$this->VoituresOccasions->contains($voituresOccasion)) {
            $this->VoituresOccasions->add($voituresOccasion);
            $voituresOccasion->setEmployes($this);
        }

        return $this;
    }

    public function removeVoituresOccasion(VoituresOccasions $voituresOccasion): static
    {
        if ($this->VoituresOccasions->removeElement($voituresOccasion)) {
            // set the owning side to null (unless already changed)
            if ($voituresOccasion->getEmployes() === $this) {
                $voituresOccasion->setEmployes(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Temoignages>
     */
    public function getTemoignages(): Collection
    {
        return $this->Temoignages;
    }

    public function addTemoignage(Temoignages $temoignage): static
    {
        if (!$this->Temoignages->contains($temoignage)) {
            $this->Temoignages->add($temoignage);
            $temoignage->setEmployes($this);
        }

        return $this;
    }

    public function removeTemoignage(Temoignages $temoignage): static
    {
        if ($this->Temoignages->removeElement($temoignage)) {
            // set the owning side to null (unless already changed)
            if ($temoignage->getEmployes() === $this) {
                $temoignage->setEmployes(null);
            }
        }

        return $this;
    }
}
