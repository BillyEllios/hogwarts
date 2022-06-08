<?php

namespace App\Entity;

use App\Repository\TeachersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeachersRepository::class)]
class Teachers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $teacher_fname;

    #[ORM\Column(type: 'string', length: 255)]
    private $teacher_lname;

    #[ORM\Column(type: 'date')]
    private $teacher_birth;

    #[ORM\Column(type: 'string', length: 255)]
    private $teacher_phone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeacherFname(): ?string
    {
        return $this->teacher_fname;
    }

    public function setTeacherFname(string $teacher_fname): self
    {
        $this->teacher_fname = $teacher_fname;

        return $this;
    }

    public function getTeacherLname(): ?string
    {
        return $this->teacher_lname;
    }

    public function setTeacherLname(string $teacher_lname): self
    {
        $this->teacher_lname = $teacher_lname;

        return $this;
    }

    public function getTeacherBirth(): ?\DateTimeInterface
    {
        return $this->teacher_birth;
    }

    public function setTeacherBirth(\DateTimeInterface $teacher_birth): self
    {
        $this->teacher_birth = $teacher_birth;

        return $this;
    }

    public function getTeacherPhone(): ?string
    {
        return $this->teacher_phone;
    }

    public function setTeacherPhone(string $teacher_phone): self
    {
        $this->teacher_phone = $teacher_phone;

        return $this;
    }

    public function __toString()
    {
        return $this->teacher_fname . ' ' . $this->teacher_lname;
    }
}
