<?php

namespace App\Entity;

use App\Repository\CityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CityRepository::class)
 */
class City
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
    private $cityCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cityName;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=6, nullable=true)
     */
    private $cityGpsLat;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=6, nullable=true)
     */
    private $cityGpsLng;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $citySlug;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=Department::class, inversedBy="cities")
     */
    private $department;

    /**
     * @ORM\OneToMany(targetEntity=Poi::class, mappedBy="city")
     */
    private $pois;

    public function __construct()
    {
        $this->pois = new ArrayCollection();
        $this->createdAt = new \DateTime();
    }

    public function __toString()
    {
        return $this->cityName;
        return $this->department;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCityCode(): ?string
    {
        return $this->cityCode;
    }

    public function setCityCode(string $cityCode): self
    {
        $this->cityCode = $cityCode;

        return $this;
    }

    public function getCityName(): ?string
    {
        return $this->cityName;
    }

    public function setCityName(string $cityName): self
    {
        $this->cityName = $cityName;

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

    public function getCityGpsLat(): ?string
    {
        return $this->cityGpsLat;
    }

    public function setCityGpsLat(?string $cityGpsLat): self
    {
        $this->cityGpsLat = $cityGpsLat;

        return $this;
    }

    public function getCityGpsLng(): ?string
    {
        return $this->cityGpsLng;
    }

    public function setCityGpsLng(?string $cityGpsLng): self
    {
        $this->cityGpsLng = $cityGpsLng;

        return $this;
    }

    public function getCitySlug(): ?string
    {
        return $this->citySlug;
    }

    public function setCitySlug(?string $citySlug): self
    {
        $this->citySlug = $citySlug;

        return $this;
    }

    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    public function setDepartment(?Department $department): self
    {
        $this->department = $department;

        return $this;
    }

    /**
     * @return Collection|Poi[]
     */
    public function getPois(): Collection
    {
        return $this->pois;
    }

    public function addPoi(Poi $poi): self
    {
        if (!$this->pois->contains($poi)) {
            $this->pois[] = $poi;
            $poi->setCity($this);
        }

        return $this;
    }

    public function removePoi(Poi $poi): self
    {
        if ($this->pois->contains($poi)) {
            $this->pois->removeElement($poi);
            // set the owning side to null (unless already changed)
            if ($poi->getCity() === $this) {
                $poi->setCity(null);
            }
        }

        return $this;
    }
}
