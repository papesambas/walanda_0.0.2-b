<?php

namespace App\Entity;

use App\Entity\Trait\SlugTrait;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\NomsRepository;
use App\Entity\Trait\CreatedAtTrait;
use App\Entity\Trait\EntityTrackingTrait;

#[ORM\Entity(repositoryClass: NomsRepository::class)]
class Noms
{
    use CreatedAtTrait;
    use SlugTrait;
    use EntityTrackingTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 75)]
    private ?string $designation = null;

    public function __toString()
    {
        return $this->designation;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): static
    {
        $this->designation = mb_strtoupper($designation, 'UTF-8');

        return $this;
    }
}
