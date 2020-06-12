<?php

namespace App\Entity;

use App\Repository\PoiRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PoiRepository::class)
 */
class Poi
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $poiName;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=6, nullable=true)
     */
    private $poiGpsLat;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=6, nullable=true)
     */
    private $poiGpsLng;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $poiSlug;

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

    public function getPoiName(): ?string
    {
        return $this->poiName;
    }

    public function setPoiName(string $poiName): self
    {
        $this->poiName = $poiName;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getpoiGpsLat(): ?string
    {
        return $this->poiGpsLat;
    }

    public function setpoiGpsLat(?string $poiGpsLat): self
    {
        $this->poiGpsLat = $poiGpsLat;

        return $this;
    }

    public function getpoiGpsLng(): ?string
    {
        return $this->poiGpsLng;
    }

    public function setpoiGpsLng(?string $poiGpsLng): self
    {
        $this->poiGpsLng = $poiGpsLng;

        return $this;
    }

    public function getPoiSlug(): ?string
    {
        return $this->poiSlug;
    }

    public function setPoiSlug(?string $poiSlug): self
    {
        $this->poiSlug = $poiSlug;

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
}
