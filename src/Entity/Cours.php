<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity as UniqueEntity;
use Symfony\Component\Validator\Constraints\Time;

//  * @UniqueEntity(
//  *      fields={"professeur", "dateHeureDebut"},
//  *      errorPath="dateHeureDebut",
//  *      message="Ce professeur a déjà un cours à cette heure !")


/**
 * @ORM\Entity(repositoryClass="App\Repository\CoursRepository")
 
 */
class Cours
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank()
     */
    private $date;

    /**
     * @ORM\Column(type="time")
     * @Assert\NotBlank()
     */
    private $dateHeureDebut;

    /**
     * @ORM\Column(type="time")
     * @Assert\NotBlank()
     */
    private $dateHeureFin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Salle", inversedBy="cours")
     * @ORM\JoinColumn(nullable=false)
     */
    private $salle;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Professeur", inversedBy="cours")
     * @ORM\JoinColumn(nullable=false)
     */
    private $professeur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Matiere", inversedBy="cours")
     * @ORM\JoinColumn(nullable=false)
     */
    private $matiere;


    public function __construct()
    {
        $this->date = new \DateTime();    
        $this->dateHeureDebut = new \DateTime();
        $this->dateHeureFin = new \DateTime();
    }

    public function __toString()
    {
        return strval($this->id);
    }

    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'date' => $this->getdate(),
            'dateHeureDebut' => $this->getDateHeureDebut(),
            'dateHeureFin' => $this->getDateHeureFin(),
            'type' => $this->getType(),
            'professeur' =>array_map(function($professeur){
                return $professeur;
            }, $this->getProfesseur()->toArray()),
            'matiere' =>array_map(function($matiere){
                return $matiere;
            }, $this->getMatiere()->toArray()),
            'salle' =>array_map(function($salle){
                return $salle;
            }, $this->getSalle()->toArray())
        ];
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDateHeureDebut() 
    {
        return $this->dateHeureDebut;
    }

    public function setDateHeureDebut( $dateHeureDebut): self
    {
        $this->dateHeureDebut = $dateHeureDebut;

        return $this;
    }

    public function getDateHeureFin(): ?\DateTime
    {
        return $this->dateHeureFin;
    }

    public function setDateHeureFin(\DateTime $dateHeureFin): self
    {
        $this->dateHeureFin = $dateHeureFin;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }


    

    public function getSalle(): ?Salle
    {
        return $this->salle;
    }

    public function setSalle(?Salle $salle): self
    {
        $this->salle = $salle;

        return $this;
    }

    public function getProfesseur(): ?Professeur
    {
        return $this->professeur;
    }

    public function setProfesseur(?Professeur $professeur): self
    {
        $this->professeur = $professeur;

        return $this;
    }

    public function getMatiere(): ?Matiere
    {
        return $this->matiere;
    }

    public function setMatiere(?Matiere $matiere): self
    {
        $this->matiere = $matiere;

        return $this;
    }
}
