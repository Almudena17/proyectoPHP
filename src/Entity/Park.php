<?php

namespace App\Entity;

use App\Repository\ParkRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParkRepository::class)]
class Park
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $area = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $age = null;

    #[ORM\ManyToMany(targetEntity: District::class, inversedBy: 'parks')]
    private Collection $districts;

    public function __construct()
    {
        $this->districts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getArea(): ?string
    {
        return $this->area;
    }

    public function setArea(?string $area): self
    {
        $this->area = $area;

        return $this;
    }

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(?string $age): self
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @return Collection<int, District>
     */
    public function getDistricts(): Collection
    {
        return $this->districts;
    }

    public function addDistrict(District $district): self
    {
        if (!$this->districts->contains($district)) {
            $this->districts->add($district);
        }

        return $this;
    }

    public function removeDistrict(District $district): self
    {
        $this->districts->removeElement($district);

        return $this;
    }
}
