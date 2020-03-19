<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatiereRepository")
 */
class Matiere
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $titre;

    /**
     * @ORM\Column(type="string")
     */
    private $reference;


    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Professeur", mappedBy="matieres")
     */
    private $professeurs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Cours", mappedBy="matiere")
     * @ORM\JoinColumn(nullable=true)
     */
    private $cours;





    public function __construct()
    {
        $this->professeurs = new ArrayCollection();
        $this->cours = new ArrayCollection();
    }

    public function __toString(): ?string
    {
        return $this->titre . '';
    }

    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'titre' => $this->getTitre(),
            'reference' => $this->getReference(),
        ];
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre($titre){
        if(!isset($titre)){
            $this->titre = '';
        } else
        $this->titre = $titre;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }




    /**
     * @return Collection|Professeur[]
     */
    public function getProfesseurs(): Collection
    {
        return $this->professeurs;
    }

    public function addProfesseur(Professeur $professeur): self
    {
        if (!$this->professeurs->contains($professeur)) {
            $this->professeurs[] = $professeur;
            $professeur->addMatiere($this);
        }

        return $this;
    }

    public function removeProfesseur(Professeur $professeur): self
    {
        if ($this->professeurs->contains($professeur)) {
            $this->professeurs->removeElement($professeur);
            $professeur->removeMatiere($this);
        }

        return $this;
    }


     /**
     * @return Collection|Cours[]
     */
    public function getCours(): Collection
    {
        return $this->cours;
    }

    public function removeUnCours(Cours $unCours): self
    {
        if ($this->cours->contains($unCours)) {
            $this->cours->removeElement($unCours);
            // set the owning side to null (unless already changed)
            if ($unCours->getMatiere() === $this) {
                $unCours->setMatiere(null);
            }
        }

        return $this;
    }
}
