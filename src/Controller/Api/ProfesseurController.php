<?php

namespace App\Controller\Api;

use App\Entity\Avis;
use App\Entity\Professeur;
use App\Entity\Matiere;
use App\Form\AvisType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\AccessMap;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/api")
 */
class ProfesseurController extends AbstractController
{
    /**
     * @Route("/professeurs", name="api_professeurs")
     */
    public function getProfesseurs(EntityManagerInterface $em)
    {
        // Commun
        $professeurs = $em->getRepository(Professeur::class)->findAll();

        // Méthode 1
        // $response = new Response();
        // $response->headers->set('Content-Type', 'application/json');
        // $response->setContent(json_encode($professeurs));
        // $response->setStatusCode(200);
        // return $this->json($response);


        // Méthode 2
        // $professeursArray = [];

        // foreach ($professeurs as $professeur) {
        //     $professeursArray[] = $professeur->toArray();
        // }

        // return $this->json($professeursArray);


        // Méthode 3
        return $this->json(array_map(function ($professeur) {
            return $professeur->toArray();
        }, $professeurs));

        // Méthode 4
        // return $this->json($professeurs, 200, [], ['ignored_attributes' => ['professeurs', 'professeur']]);
    }

    /**
     * @Route("/professeurs/{id}", name="api_professeurs_id")
     */
    public function getProfesseur(Professeur $professeur)
    {
        return $this->json($professeur->toArray());
    }

    /**
     * @Route("/professeurs/{id}/avis", name="api_get_professeurs_avis", methods="GET")
     */
    public function getProfesseurAvis(Professeur $professeur)
    {
        return $this->json(array_map(function ($avis) {
            return $avis->toArray();
        }, $professeur->getAvis()->toArray()));
    }

    /**
     * @Route("/professeurs/{id}/cours", name="api_get_professeurs_cours", methods="GET")
     */
    public function getProfesseurCours(Professeur $professeur)
    {
        return $this->json(array_map(function ($unCours) {
            return $unCours->toArray();
        }, $professeur->getCours()->toArray()));
    }

    /**
     * @Route("/professeurs/{id}/avis", name="api_put_professeurs_avis", methods="PUT")
     */
    public function putProfesseurAvis(EntityManagerInterface $em, Request $request, ValidatorInterface $validator, Professeur $professeur)
    {
        // $data = json_decode($request->getContent());

        // try {
        //     $avis = new Avis;
        //     $avis->setNote($data->note)
        //         ->setCommentaire($data->commentaire)
        //         ->setEmailEtudiant($data->emailEtudiant)
        //         ->setProfesseur($professeur);
        // } catch (\Exception $e) {
        //     return $this->json(['message' => 'Avis invalide.'], 400);
        // }

        // $errors = $validator->validate($avis);
        // if (count($errors) > 0) {
        //     return $this->json(['message' => 'Avis invalide.'], 400);
        // }

        // $em->persist($avis);
        // $em->flush();

        // return $this->json($avis, Response::HTTP_CREATED);


        

        $data = json_decode($request->getContent(), true);
        $data['professeur'] = $professeur->getId();

        $form = $this->createForm(AvisType::class, new Avis, ['csrf_protection' => false]);
        $form->submit($data);

        if (!$form->isValid()) {
            // return $this->json(['message' => (string) $form->getErrors()], 400);
            return $this->json($this->getFormErrors($form), 400);
        }

        $avis = $form->getData();
        $em->persist($avis);
        $em->flush();

        return $this->json($avis->toArray(), Response::HTTP_CREATED);
    }

    private function getFormErrors(Form $form)
    {
        $errors = [];

        foreach ($form->getErrors() as $error) {
            $error[$form->getName()][] = $error->getMessage();
        }

        foreach ($form as $child) {
            if (!$child->isValid()) {
                foreach ($child->getErrors() as $error) {
                    $errors[$child->getName()][] = $error->getMessage();
                }
            }
        }
        return $errors;
    }

    /**
     * @Route("/avis/{id}", name="api_delete_professeurs_avis", methods={"DELETE"})
     */
    public function deleteAvis(EntityManagerInterface $em, Avis $avis)
    {
        $em->remove($avis);
        $em->flush();

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setStatusCode(204);

        return $response;

        // OU => Symfony renvoie tout seul le header
        // $return $this->json(null,204);
    }

    /**
     * @Route("/matieres", name="api_matieres")
     */
    public function getMatieres(EntityManagerInterface $em)
    {
        $matieres = $em->getRepository(Matiere::class)->findAll();
        return $this->json(array_map(function ($matiere) {
            return $matiere->toArray();
        }, $matieres));
    }
}
