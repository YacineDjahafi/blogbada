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

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $link = null;

    // menu => menu_id
    #[ORM\OneToMany(mappedBy: 'menu', targetEntity: SubMenus::class, cascade: ['persist', 'remove'])]
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
        if (!$this->subMenuses->contains($subMenus)) {
            $this->subMenuses->add($subMenus);
            $subMenus->setMenu($this);
        }
        return $this;
    }

    public function getSubMenuses(): Collection
    {
        return $this->subMenuses;
    }

    public function removeSubMenus(SubMenus $subMenus): static
    {
        $this->subMenuses->removeElement($subMenus);

        if ($subMenus->getMenu() === $this) {
            $subMenus->setMenu(null);
        }
        return $this;
    }
}
