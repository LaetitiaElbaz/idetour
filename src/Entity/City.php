<?php

namespace App\Entity;

use App\Repository\CityRepository;
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
}
