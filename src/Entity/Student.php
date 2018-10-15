<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StudentRepository")
 */
class Student
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $dni;

    /**
     * @ORM\Column(type="date")
     */
    private $birthDate;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $notes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fatherFullName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motherFullName;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $father_phone;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $mother_phone;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $father_fixed_phone;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $mother_fixed_phone;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $family_address;

    /**
     * @ORM\Column(type="string", length=7)
     */
    private $postal_code;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $dni_signing_authority;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $authority_email;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="student", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDni(): ?string
    {
        return $this->dni;
    }

    public function setDni(string $dni): self
    {
        $this->dni = $dni;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getFatherFullName(): ?string
    {
        return $this->fatherFullName;
    }

    public function setFatherFullName(string $fatherFullName): self
    {
        $this->fatherFullName = $fatherFullName;

        return $this;
    }

    public function getMotherFullName(): ?string
    {
        return $this->motherFullName;
    }

    public function setMotherFullName(string $motherFullName): self
    {
        $this->motherFullName = $motherFullName;

        return $this;
    }

    public function getFatherPhone(): ?string
    {
        return $this->father_phone;
    }

    public function setFatherPhone(string $father_phone): self
    {
        $this->father_phone = $father_phone;

        return $this;
    }

    public function getMotherPhone(): ?string
    {
        return $this->mother_phone;
    }

    public function setMotherPhone(string $mother_phone): self
    {
        $this->mother_phone = $mother_phone;

        return $this;
    }

    public function getFatherFixedPhone(): ?string
    {
        return $this->father_fixed_phone;
    }

    public function setFatherFixedPhone(?string $father_fixed_phone): self
    {
        $this->father_fixed_phone = $father_fixed_phone;

        return $this;
    }

    public function getMotherFixedPhone(): ?string
    {
        return $this->mother_fixed_phone;
    }

    public function setMotherFixedPhone(?string $mother_fixed_phone): self
    {
        $this->mother_fixed_phone = $mother_fixed_phone;

        return $this;
    }

    public function getFamilyAddress(): ?string
    {
        return $this->family_address;
    }

    public function setFamilyAddress(string $family_address): self
    {
        $this->family_address = $family_address;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postal_code;
    }

    public function setPostalCode(string $postal_code): self
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    public function getDniSigningAuthority(): ?string
    {
        return $this->dni_signing_authority;
    }

    public function setDniSigningAuthority(string $dni_signing_authority): self
    {
        $this->dni_signing_authority = $dni_signing_authority;

        return $this;
    }

    public function getAuthorityEmail(): ?string
    {
        return $this->authority_email;
    }

    public function setAuthorityEmail(string $authority_email): self
    {
        $this->authority_email = $authority_email;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
