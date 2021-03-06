<?php

namespace App\Entity;

use App\Repository\FurnitureTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FurnitureTypeRepository::class)]
class FurnitureType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 32)]
    private $name;

    #[ORM\OneToMany(mappedBy: 'FurnituresTypes', targetEntity: Furniture::class)]
    private $furniture;

    #[ORM\ManyToMany(targetEntity: Course::class, inversedBy: 'furnitureTypes')]
    private $Courses;

    public function __construct()
    {
        $this->furniture = new ArrayCollection();
        $this->Courses = new ArrayCollection();
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
     * @return Collection<int, Furniture>
     */
    public function getFurniture(): Collection
    {
        return $this->furniture;
    }

    public function addFurniture(Furniture $furniture): self
    {
        if (!$this->furniture->contains($furniture)) {
            $this->furniture[] = $furniture;
            $furniture->setFurnituresTypes($this);
        }

        return $this;
    }

    public function removeFurniture(Furniture $furniture): self
    {
        if ($this->furniture->removeElement($furniture)) {
            // set the owning side to null (unless already changed)
            if ($furniture->getFurnituresTypes() === $this) {
                $furniture->setFurnituresTypes(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Course>
     */
    public function getCourses(): Collection
    {
        return $this->Courses;
    }

    public function addCourse(Course $course): self
    {
        if (!$this->Courses->contains($course)) {
            $this->Courses[] = $course;
        }

        return $this;
    }

    public function removeCourse(Course $course): self
    {
        $this->Courses->removeElement($course);

        return $this;
    }
}
