<?php

namespace App\Entity;

use App\Repository\InterventionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InterventionRepository::class)]
class Intervention
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'interventions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $client = null;

    #[ORM\ManyToOne(inversedBy: 'interventions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Technicien $technicien = null;

    #[ORM\Column(length: 255)]
    private ?string $typeintervention = null;

    #[ORM\Column(length: 255)]
    private ?string $statut = null;

    #[ORM\Column]
    private ?\DateTime $dateintervention = null;

    /**
     * @var Collection<int, Materiel>
     */
    #[ORM\OneToMany(targetEntity: Materiel::class, mappedBy: 'intervention')]
    private Collection $materiels;

    public function __construct()
    {
        $this->materiels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): static
    {
        $this->client = $client;

        return $this;
    }

    public function getTechnicien(): ?Technicien
    {
        return $this->technicien;
    }

    public function setTechnicien(?Technicien $technicien): static
    {
        $this->technicien = $technicien;

        return $this;
    }

    public function getTypeintervention(): ?string
    {
        return $this->typeintervention;
    }

    public function setTypeintervention(string $typeintervention): static
    {
        $this->typeintervention = $typeintervention;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getDateintervention(): ?\DateTime
    {
        return $this->dateintervention;
    }

    public function setDateintervention(\DateTime $dateintervention): static
    {
        $this->dateintervention = $dateintervention;

        return $this;
    }

    /**
     * @return Collection<int, Materiel>
     */
    public function getMateriels(): Collection
    {
        return $this->materiels;
    }

    public function addMateriel(Materiel $materiel): static
    {
        if (!$this->materiels->contains($materiel)) {
            $this->materiels->add($materiel);
            $materiel->setIntervention($this);
        }

        return $this;
    }

    public function removeMateriel(Materiel $materiel): static
    {
        if ($this->materiels->removeElement($materiel)) {
            // set the owning side to null (unless already changed)
            if ($materiel->getIntervention() === $this) {
                $materiel->setIntervention(null);
            }
        }

        return $this;
    }
}
