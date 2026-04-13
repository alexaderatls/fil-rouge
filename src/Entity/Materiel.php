<?php

namespace App\Entity;

use App\Repository\MaterielRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MaterielRepository::class)]
class Materiel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'materiels')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Intervention $intervention = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column]
    private ?int $quantite_utilise = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntervention(): ?Intervention
    {
        return $this->intervention;
    }

    public function setIntervention(?Intervention $intervention): static
    {
        $this->intervention = $intervention;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getQuantiteUtilise(): ?int
    {
        return $this->quantite_utilise;
    }

    public function setQuantiteUtilise(int $quantite_utilise): static
    {
        $this->quantite_utilise = $quantite_utilise;

        return $this;
    }
}
