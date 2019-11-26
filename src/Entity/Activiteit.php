<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActiviteitRepository")
 */
class Activiteit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $naam;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $duration;

    /**
     * @ORM\Column(type="float")
     */
    private $costs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Less", mappedBy="activiteit", orphanRemoval=true)
     */
    private $lessen;

    public function __construct()
    {
        $this->lessen = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

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

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getCosts(): ?float
    {
        return $this->costs;
    }

    public function setCosts(float $costs): self
    {
        $this->costs = $costs;

        return $this;
    }

    /**
     * @return Collection|Less[]
     */
    public function getLessen(): Collection
    {
        return $this->lessen;
    }

    public function addLessen(Less $lessen): self
    {
        if (!$this->lessen->contains($lessen)) {
            $this->lessen[] = $lessen;
            $lessen->setActiviteit($this);
        }

        return $this;
    }

    public function removeLessen(Less $lessen): self
    {
        if ($this->lessen->contains($lessen)) {
            $this->lessen->removeElement($lessen);
            // set the owning side to null (unless already changed)
            if ($lessen->getActiviteit() === $this) {
                $lessen->setActiviteit(null);
            }
        }

        return $this;
    }
}
