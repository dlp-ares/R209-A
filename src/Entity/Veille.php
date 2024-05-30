<?php

namespace App\Entity;

use App\Repository\VeilleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VeilleRepository::class)]
class Veille
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateD = null;

    #[ORM\Column(length: 255)]
    private ?string $acquisition = null;

    #[ORM\Column]
    private ?bool $veilleContinue = null;

    #[ORM\ManyToOne(inversedBy: 'veilles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDateD(): ?\DateTimeInterface
    {
        return $this->dateD;
    }

    public function setDateD(\DateTimeInterface $dateD): static
    {
        $this->dateD = $dateD;

        return $this;
    }

    public function getAcquisition(): ?string
    {
        return $this->acquisition;
    }

    public function setAcquisition(string $acquisition): static
    {
        $this->acquisition = $acquisition;

        return $this;
    }

    public function isVeilleContinue(): ?bool
    {
        return $this->veilleContinue;
    }

    public function setVeilleContinue(bool $veilleContinue): static
    {
        $this->veilleContinue = $veilleContinue;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }
}
