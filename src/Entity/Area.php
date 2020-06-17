<?php

namespace App\Entity;

use App\Repository\AreaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AreaRepository::class)
 */
class Area
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $areaCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $areaName;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $areaSlug;

    /**
     * @ORM\ManyToOne(targetEntity=Country::class, inversedBy="areas")
     */
    private $country;

    /**
     * @ORM\OneToMany(targetEntity=Department::class, mappedBy="area")
     */
    private $departments;

    public function __construct()
    {
        $this->departments = new ArrayCollection();
        $this->createdAt = new \DateTime();
    }

    public function __toString()
    {
        return $this->areaName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAreaCode(): ?string
    {
        return $this->areaCode;
    }

    public function setAreaCode(string $areaCode): self
    {
        $this->areaCode = $areaCode;

        return $this;
    }

    public function getAreaName(): ?string
    {
        return $this->areaName;
    }

    public function setAreaName(string $areaName): self
    {
        $this->areaName = $areaName;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getAreaSlug(): ?string
    {
        return $this->areaSlug;
    }

    public function setAreaSlug(?string $areaSlug): self
    {
        $this->areaSlug = $areaSlug;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Collection|department[]
     */
    public function getDepartments(): Collection
    {
        return $this->departments;
    }

    public function addDepartment(Department $department): self
    {
        if (!$this->departments->contains($department)) {
            $this->departments[] = $department;
            $department->setArea($this);
        }

        return $this;
    }

    public function removeDepartment(Department $department): self
    {
        if ($this->departments->contains($department)) {
            $this->departments->removeElement($department);
            // set the owning side to null (unless already changed)
            if ($department->getArea() === $this) {
                $department->setArea(null);
            }
        }

        return $this;
    }
}
