<?php

namespace App\Entity;

use App\Model\TimestampedInterface;
use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article implements TimestampedInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $content = null;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    private ?int $featured_image_id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $featuredText = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToMany(targetEntity: Category::class, inversedBy: 'articles')]
    private Collection $categories;

    #[ORM\ManyToOne]
    private ?Media $featuredImage = null;

    #[ORM\OneToMany(mappedBy: 'article', targetEntity: Menu::class)]
    private Collection $no;

    #[ORM\ManyToMany(targetEntity: Media::class)]
    private Collection $relatedImages;

    #[ORM\Column(length: 100)]
    private ?string $dates = null;

    #[ORM\Column(length: 255)]
    private ?string $age = null;

    #[ORM\Column(length: 100)]
    private ?string $duration = null;

    #[ORM\Column]
    private ?bool $isVisible = null;

    #[ORM\Column(nullable: true)]
    private ?int $article_order = null;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->no = new ArrayCollection();
        $this->relatedImages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getFeaturedText(): ?string
    {
        return $this->featuredText;
    }

    public function setFeaturedText(?string $featuredText): static
    {
        $this->featuredText = $featuredText;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): static
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
            $category->addArticle($this);
        }

        return $this;
    }

    public function removeCategory(Category $category): static
    {
        if ($this->categories->removeElement($category)) {
            $category->removeArticle($this);
        }

        return $this;
    }

    public function getFeaturedImage(): ?Media
    {
        return $this->featuredImage;
    }


    public function setFeaturedImage(?Media $featuredImage): static
    {
        $this->featuredImage = $featuredImage;

        return $this;
    }

    /**
     * @return Collection<int, Menu>
     */
    public function getNo(): Collection
    {
        return $this->no;
    }

    public function __toString()
    {
        return $this->title;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getRelatedImages(): Collection
    {
        return $this->relatedImages;
    }

    public function addRelatedImage(Media $relatedImage): static
    {
        if (!$this->relatedImages->contains($relatedImage)) {
            $this->relatedImages->add($relatedImage);
        }

        return $this;
    }

    public function removeRelatedImage(Media $relatedImage): static
    {
        $this->relatedImages->removeElement($relatedImage);

        return $this;
    }

    public function getDates(): ?string
    {
        return $this->dates;
    }

    public function setDates(string $dates): static
    {
        $this->dates = $dates;

        return $this;
    }

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(string $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function isIsVisible(): ?bool
    {
        return $this->isVisible;
    }

    public function setIsVisible(bool $isVisible): static
    {
        $this->isVisible = $isVisible;

        return $this;
    }

    public function getArticleOrder(): ?int
    {
        return $this->article_order;
    }

    public function getArticle_Order(): ?int
    {
        return $this->article_order;
    }

    public function setArticleOrder(?int $article_order): static
    {
        $this->article_order = $article_order;

        return $this;
    }


    /*    public function getFeaturedImageId(): ?int
    {
        return $this->featured_image_id;
    }

    public function setFeaturedImageId(?int $featured_image_id): static
    {
        $this->featured_image_id = $featured_image_id;
        return $this;
    } */

    public function getFeatured_Image_Id(): ?int
    {
        return $this->featured_image_id;
    }

    public function setFeatured_Image_Id(?int $featured_image_id): static
    {
        $this->featured_image_id = $featured_image_id;
        return $this;
    }
}
