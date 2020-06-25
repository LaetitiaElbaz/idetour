<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=PoiRepository::class)
 * @Vich\Uploadable()
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

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, mappedBy="pois")
     */
    private $categories;

    /**
     * @ORM\ManyToMany(targetEntity=Tag::class, mappedBy="pois")
     */
    private $tags;

    /**
     * @ORM\ManyToMany(targetEntity=Review::class, mappedBy="pois")
     */
    private $reviews;

    /**
     * @ORM\ManyToOne(targetEntity=City::class, inversedBy="pois")
     */
    private $city;

    /**
     * @ORM\OneToMany(targetEntity=Offer::class, mappedBy="poi")
     */
    private $offers;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="poi")
     */
    private $comments;

    /**
     * @ORM\OneToMany(targetEntity=Contact::class, mappedBy="poi")
     */
    private $contacts;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $thumbnail;

    /**
     * @Vich\UploadableField(mapping="post_thumbnails", fileNameProperty="thumbnail")
     */
    private $thumbnailFile;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->tags = new ArrayCollection();
        $this->reviews = new ArrayCollection();
        $this->offers = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->contacts = new ArrayCollection();
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

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

    /**
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->addPoi($this);
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
            $category->removePoi($this);
        }

        return $this;
    }

    /**
     * @return Collection|Tag[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
            $tag->addPoi($this);
        }

        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        if ($this->tags->contains($tag)) {
            $this->tags->removeElement($tag);
            $tag->removePoi($this);
        }

        return $this;
    }

    /**
     * @return Collection|Review[]
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): self
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews[] = $review;
            $review->addPoi($this);
        }

        return $this;
    }

    public function removeReview(Review $review): self
    {
        if ($this->reviews->contains($review)) {
            $this->reviews->removeElement($review);
            $review->removePoi($this);
        }

        return $this;
    }

    /**
     * @return Collection|Offer[]
     */
    public function getOffers(): Collection
    {
        return $this->offers;
    }

    public function addOffer(Offer $offer): self
    {
        if (!$this->offers->contains($offer)) {
            $this->offers[] = $offer;
            $offer->setPoi($this);
        }

        return $this;
    }

    public function removeOffer(Offer $offer): self
    {
        if ($this->offers->contains($offer)) {
            $this->offers->removeElement($offer);
            // set the owning side to null (unless already changed)
            if ($offer->getPoi() === $this) {
                $offer->setPoi(null);
            }
        }

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setPoi($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getPoi() === $this) {
                $comment->setPoi(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Contact[]
     */
    public function getContacts(): Collection
    {
        return $this->contacts;
    }

    public function addContact(Contact $contact): self
    {
        if (!$this->contacts->contains($contact)) {
            $this->contacts[] = $contact;
            $contact->setPoi($this);
        }

        return $this;
    }

    public function removeContact(Contact $contact): self
    {
        if ($this->contacts->contains($contact)) {
            $this->contacts->removeElement($contact);
            // set the owning side to null (unless already changed)
            if ($contact->getPoi() === $this) {
                $contact->setPoi(null);
            }
        }

        return $this;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(?string $thumbnail): self
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getThumbnailFile()
    {
        return $this->thumbnailFile;
    }

    /**
     * @param mixed $thumbnailFile
     * @throws \Exception
     */
    public function setThumbnailFile($thumbnailFile): void
    {
        $this->thumbnailFile = $thumbnailFile;
        //If thumbnailFile exists, we update the updatedAt field : if we don't update any field, Doctrine is not listening because thumbnailFile is not map to Doctrine.
        if ($thumbnailFile) {
            $this->updatedAt = new \DateTime();
        }
    }
}
