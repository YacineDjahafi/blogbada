<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?int $menuOrder = null;



    #[ORM\Column]
    private ?bool $isVisible = null;

    #[ORM\ManyToOne(inversedBy: 'no')]
    private ?Article $article = null;

    #[ORM\ManyToOne]
    private ?Category $category = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $link = null;

    #[ORM\OneToMany(mappedBy: 'menu_id', targetEntity: SubMenus::class)]
    private Collection $subMenuses;

    public function __construct()
    {
        $this->subMenuses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getMenuOrder(): ?int
    {
        return $this->menuOrder;
    }

    public function setMenuOrder(?int $menuOrder): static
    {
        $this->menuOrder = $menuOrder;
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

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): static
    {
        $this->article = $article;
        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;
        return $this;
    }



    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): static
    {
        $this->link = $link;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

  

    public function addSubMenus(SubMenus $subMenus): static
    {
        // Ajoutez l'objet SubMenus à la collection
        if (!$this->subMenuses->contains($subMenus)) {
            $this->subMenuses->add($subMenus);
            $subMenus->setMenu($this);
        }
        return $this;
    }

    
        public function removeSubMenus(SubMenus $subMenus): static
        {
            // Remove the SubMenus object from the collection
            $this->subMenuses->removeElement($subMenus);
        
            // Set the owning side of the relationship to null (unless already changed)
            if ($subMenus->getMenu() === $this) {
                $subMenus->setMenu(null);
            }
            return $this;
        }
    
}