<?php

namespace App\Entity;

use App\Repository\AdministrateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdministrateurRepository::class)]
class Administrateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Adresse_Email = null;

    #[ORM\Column(length: 255)]
    private ?string $Mot_de_Passe = null;

    #[ORM\OneToMany(mappedBy: 'administrateur', targetEntity: Employes::class)]
    private Collection $Employes;

    #[ORM\OneToMany(mappedBy: 'administrateur', targetEntity: Services::class)]
    private Collection $Services;

    public function __construct()
    {
        $this->Employes = new ArrayCollection();
        $this->Services = new ArrayCollection();
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

    /**
     * @return Collection<int, Employes>
     */
    public function getEmployes(): Collection
    {
        return $this->Employes;
    }

    public function addEmploye(Employes $employe): static
    {
        if (!$this->Employes->contains($employe)) {
            $this->Employes->add($employe);
            $employe->setAdministrateur($this);
        }

        return $this;
    }

    public function removeEmploye(Employes $employe): static
    {
        if ($this->Employes->removeElement($employe)) {
            // set the owning side to null (unless already changed)
            if ($employe->getAdministrateur() === $this) {
                $employe->setAdministrateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Services>
     */
    public function getServices(): Collection
    {
        return $this->Services;
    }

    public function addService(Services $service): static
    {
        if (!$this->Services->contains($service)) {
            $this->Services->add($service);
            $service->setAdministrateur($this);
        }

        return $this;
    }

    public function removeService(Services $service): static
    {
        if ($this->Services->removeElement($service)) {
            // set the owning side to null (unless already changed)
            if ($service->getAdministrateur() === $this) {
                $service->setAdministrateur(null);
            }
        }

        return $this;
    }
}
