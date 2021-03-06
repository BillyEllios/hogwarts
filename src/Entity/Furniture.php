<?php

namespace App\Entity;

use App\Repository\FurnitureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FurnitureRepository::class)]
class Furniture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 32)]
    private $name;

    #[ORM\ManyToOne(targetEntity: Student::class, inversedBy: 'furniture')]
    private $student;

    #[ORM\ManyToOne(targetEntity: FurnitureType::class, inversedBy: 'furniture')]
    #[ORM\JoinColumn(nullable: false)]
    private $FurnituresTypes;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getStudent(): ?Student
    {
        return $this->student;
    }

    public function setStudent(?Student $student): self
    {
        $this->student = $student;

        return $this;
    }

    public function getFurnituresTypes(): ?FurnitureType
    {
        return $this->FurnituresTypes;
    }

    public function setFurnituresTypes(?FurnitureType $FurnituresTypes): self
    {
        $this->FurnituresTypes = $FurnituresTypes;

        return $this;
    }
}
