<?php

namespace App\Entity;

use App\Repository\ReviewRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReviewRepository::class)
 */
class Review
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
    private $reviewName;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity=poi::class, inversedBy="reviews")
     */
    private $pois;

    public function __construct()
    {
        $this->pois = new ArrayCollection();
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReviewName(): ?string
    {
        return $this->reviewName;
    }

    public function setReviewName(string $reviewName): self
    {
        $this->reviewName = $reviewName;

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

    /**
     * @return Collection|poi[]
     */
    public function getPois(): Collection
    {
        return $this->pois;
    }

    public function addPoi(poi $poi): self
    {
        if (!$this->pois->contains($poi)) {
            $this->pois[] = $poi;
        }

        return $this;
    }

    public function removePoi(poi $poi): self
    {
        if ($this->pois->contains($poi)) {
            $this->pois->removeElement($poi);
        }

        return $this;
    }
}
