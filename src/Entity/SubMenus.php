<?php

namespace App\Entity;

use App\Repository\SubMenusRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubMenusRepository::class)]
class SubMenus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?int $submenuOrder = null;

    #[ORM\Column]
    private ?bool $is_visible = null;

    #[ORM\Column(length: 255)]
    private ?string $link = null;

    #[ORM\ManyToOne(targetEntity: Menu::class, inversedBy: 'subMenuses', cascade: ["persist", "remove"])]
    #[ORM\JoinColumn(name: 'menu_id', referencedColumnName: 'id')]
    private ?Menu $menu = null;

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

    public function getSubmenuOrder(): ?int
    {
        return $this->submenuOrder;
    }

    public function setSubmenuOrder(?int $submenuOrder): static
    {
        $this->submenuOrder = $submenuOrder;

        return $this;
    }

    public function isIsVisible(): ?bool
    {
        return $this->is_visible;
    }

    public function setIsVisible(bool $is_visible): static
    {
        $this->is_visible = $is_visible;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): static
    {
        $this->link = $link;

        return $this;
    }

    public function getMenu(): ?Menu
    {
        return $this->menu;
    }

    public function setMenu(?Menu $menu): static
    {
        $this->menu = $menu;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
