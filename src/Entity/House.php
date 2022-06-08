<?php

namespace App\Entity;

use App\Repository\HouseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HouseRepository::class)]
class House
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 32)]
    private $name;

    #[ORM\OneToMany(mappedBy: 'house', targetEntity: Students::class)]
    private $students;

    #[ORM\OneToOne(targetEntity: Teachers::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $houseMaster;

    public function __construct()
    {
        $this->students = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
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

    /**
     * @return Collection<int, Students>
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(Students $student): self
    {
        if (!$this->students->contains($student)) {
            $this->students[] = $student;
            $student->setHouse($this);
        }

        return $this;
    }

    public function removeStudent(Students $student): self
    {
        if ($this->students->removeElement($student)) {
            // set the owning side to null (unless already changed)
            if ($student->getHouse() === $this) {
                $student->setHouse(null);
            }
        }

        return $this;
    }

    public function getHouseMaster(): ?Teachers
    {
        return $this->houseMaster;
    }

    public function setHouseMaster(Teachers $houseMaster): self
    {
        $this->houseMaster = $houseMaster;

        return $this;
    }
}
