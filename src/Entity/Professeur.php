<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProfesseurRepository")
 */
class Professeur
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
    private $nom;

    /**
     * @ORM\Column(type="string")
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", unique=true)
     * @Assert\Email()
     */
    private $email;


    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Matiere", inversedBy="professeurs")
     */
    private $matieres;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Avis", mappedBy="professeur")
     */
    private $avis;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Cours", mappedBy="professeur")
     */
    private $cours;

    public function __construct()
    {
        $this->matieres = new ArrayCollection();
        $this->avis = new ArrayCollection();
        $this->cours = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->nom . ' ' . $this->prenom;
    }

    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'nom' => $this->getNom(),
            'prenom' => $this->getPrenom(),
            'email' => $this->getEmail(),
            'matieres' => array_map(function ($matiere) {
                return $matiere->toArray();
            }, $this->getMatieres()->toArray()),
        ];
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }
    
    public function getEmail(): ?string
    {
        return $this->email;
    }
    
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
        // Le fait de mettre un return permet à la complétion de la table de faire $professeur->setNom()->setPrenom()->setEmail();
    }

    /**
     * @return Collection|Matiere[]
     */
    public function getMatieres(): Collection
    {
        return $this->matieres;
    }

    public function addMatiere(Matiere $matiere): self
    {
        if (!$this->matieres->contains($matiere)) {
            $this->matieres[] = $matiere;
        }

        return $this;
    }

    public function removeMatiere(Matiere $matiere): self
    {
        if ($this->matieres->contains($matiere)) {
            $this->matieres->removeElement($matiere);
        }

        return $this;
    }

    /**
     * @return Collection|Avis[]
     */
    public function getAvis(): Collection
    {
        return $this->avis;
    }

    public function addAvis(Avis $avis): self
    {
        if (!$this->avis->contains($avis)) {
            $this->avis[] = $avis;
            $avis->setProfesseur($this);
        }

        return $this;
    }

    public function removeAvis(Avis $avis): self
    {
        if ($this->avis->contains($avis)) {
            $this->avis->removeElement($avis);
            // set the owning side to null (unless already changed)
            if ($avis->getProfesseur() === $this) {
                $avis->setProfesseur(null);
            }
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

    public function addUnCours(Cours $unCours): self
    {
        if (!$this->cours->contains($unCours)) {
            $this->cours[] = $unCours;
            $unCours->setProfesseur($this);
        }

        return $this;
    }

    public function removeUnCours(Cours $unCours): self
    {
        if ($this->cours->contains($unCours)) {
            $this->cours->removeElement($unCours);
            // set the owning side to null (unless already changed)
            if ($unCours->getProfesseur() === $this) {
                $unCours->setProfesseur(null);
            }
        }

        return $this;
    }
}
