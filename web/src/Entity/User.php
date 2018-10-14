<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $nickname;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $fideRating;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $lichessHandle;

    /**
     * @ORM\Column(type="string", length=16, nullable=true)
     */
    private $lichessAccessKey;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $type;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Student", mappedBy="user", cascade={"persist", "remove"})
     */
    private $student;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(string $nickname): self
    {
        $this->nickname = $nickname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getFideRating(): ?int
    {
        return $this->fideRating;
    }

    public function setFideRating(?int $fideRating): self
    {
        $this->fideRating = $fideRating;

        return $this;
    }

    public function getLichessHandle(): ?string
    {
        return $this->lichessHandle;
    }

    public function setLichessHandle(?string $lichessHandle): self
    {
        $this->lichessHandle = $lichessHandle;

        return $this;
    }

    public function getLichessAccessKey(): ?string
    {
        return $this->lichessAccessKey;
    }

    public function setLichessAccessKey(?string $lichessAccessKey): self
    {
        $this->lichessAccessKey = $lichessAccessKey;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getStudent(): ?Student
    {
        return $this->student;
    }

    public function setStudent(Student $student): self
    {
        $this->student = $student;

        // set the owning side of the relation if necessary
        if ($this !== $student->getUser()) {
            $student->setUser($this);
        }

        return $this;
    }
}
