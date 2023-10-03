<?php

namespace App\Entity;

use App\TimestampedInterface;
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

    public function addNo(Menu $no): static
    {
        if (!$this->no->contains($no)) {
            $this->no->add($no);
            $no->setArticle($this);
        }

        return $this;
    }

    public function removeNo(Menu $no): static
    {
        if ($this->no->removeElement($no)) {
            // set the owning side to null (unless already changed)
            if ($no->getArticle() === $this) {
                $no->setArticle(null);
            }
        }

        return $this;
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
}
