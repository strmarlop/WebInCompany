<?php

namespace App\Entity;

use App\Repository\InterviewRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: InterviewRepository::class)]
class Interview
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Don\'t leave me empty')]
    private ?string $job = null;




    // #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    // private ?\DateTimeInterface $date = null;

    
    // #[ORM\Column(length: 255)]
    // #[Assert\NotBlank(message: 'Don\'t leave me empty')]
    // private ?string $date = null;






    #[ORM\ManyToOne(inversedBy: 'interviews')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Statut $statut = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Don\'t leave me empty')]
    private ?string $company = null;

    #[ORM\ManyToOne(inversedBy: 'interviews')]
    private ?User $owner = null;

    // #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    // private ?\DateTimeInterface $date = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function setJob(string $job): static
    {
        $this->job = $job;

        return $this;
    }
    // public function getDate(): ?string
    // {
    //     return $this->date;
    // }

    // public function setDate(string $date): static
    // {
    //     $this->date = $date;

    //     return $this;
    // }
    // public function getDate(): ?\DateTimeInterface
    // {
    //     return $this->date;
    // }

    // public function setDate(\DateTimeInterface $date): static
    // {
    //     $this->date = $date;

    //     return $this;
    // }

    public function getStatut(): ?Statut
    {
        return $this->statut;
    }

    public function setStatut(?Statut $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(string $company): static
    {
        $this->company = $company;

        return $this;
    }

    // public function getDate(): ?\DateTimeInterface
    // {
    //     return $this->date;
    // }

    // public function setDate(?\DateTimeInterface $date): static
    // {
    //     $this->date = $date;

    //     return $this;
    // }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): static
    {
        $this->owner = $owner;

        return $this;
    }
}
