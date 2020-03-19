<?php

namespace App\Controller\Api;

use App\Entity\Avis;
use App\Entity\Salle;
use App\Entity\Professeur;
use App\Entity\Matiere;
use App\Entity\Cours;
use App\Form\CoursType;
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
class CoursController extends AbstractController
{
    /**
     * @Route("/cours", name="api_cours")
     */
    public function getCours(EntityManagerInterface $em)
    {
        $cours = $em->getRepository(Cours::class)->findAll();

        // Méthode 3
        return $this->json(array_map(function ($unCours) {
            return $unCours->toArray();
        }, $cours));
    }

    /**
     * @Route("/cours/create", name="api_put_cours", methods="PUT")
     */
    public function createCours(EntityManagerInterface $em, Request $request)
    {
        $data = json_decode($request->getContent());
        
        try {
            $unCours = new Cours;
            $unCours->setDate($data->date)
                ->setDateHeureDebut($data->dateHeureDebut)
                ->setDateHeureFin($data->dateHeureFin)
                ->setType($data->type)
                ->setSalle(new Salle($data->salle))
                ->setProfesseur(new Professeur($data->professeur))
                ->setMatiere(new Matiere($data->matiere));
        } catch (\Exception $e) {
            return $this->json(['message' => 'Erreur creation cours.'], 400);
        }

        // // $errors = $validator->validate($unCours);
        // // if (count($errors) > 0) {
        // //     return $this->json(['message' => 'Cours invalide.'], 400);
        // // }

        $em->persist($unCours);
        $em->flush();

        return $this->json($unCours, Response::HTTP_CREATED);


        // $data = json_decode($request->getContent(), true);

        // $form = $this->createForm(CoursType::class, new Cours, ['csrf_protection' => false]);
        // $form->submit($data);

        // if (!$form->isValid()) {
        //     // return $this->json(['message' => (string) $form->getErrors()], 400);
        //     return $this->json($this->getFormErrors($form), 400);
        // }

        // $cours = $form->getData();
        // $em->persist($cours);
        // $em->flush();

        // return $this->json($cours->toArray(), Response::HTTP_CREATED);
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
     * @Route("/cours/{id}", name="api_cours_id")
     */
    public function getUnCours(Cours $unCours)
    {
        return $this->json($unCours->toArray());
    }

    /**
     * @Route("/cours/{id}/edit", name="api_cours_id_edit")
     */
    public function editUnCours(EntityManagerInterface $em, Request $request, Cours $unCours)
    {
        $data = json_decode($request->getContent());
        try {
            // $unCours = new Cours;
            $unCours->setDate($data->date)
                ->setDateHeureDebut($data->dateHeureDebut)
                ->setDateHeureFin($data->dateHeureFinS)
                ->setType($data->type)
                ->setSalle($data->salle)
                ->setProfesseur($data->professeur)
                ->setMatiere($data->matiere);
        } catch (\Exception $e) {
            return $this->json(['message' => 'Erreur edit cours.'], 400);
        }

        // $errors = $validator->validate($unCours);
        // if (count($errors) > 0) {
        //     return $this->json(['message' => 'Cours invalide.'], 400);
        // }

        $em->persist($unCours);
        $em->flush();

        return $this->json($unCours, Response::HTTP_CREATED);



        // $entityManager = $this->getDoctrine()->getManager();
        // $product = $entityManager->getRepository(Product::class)->find($id);
    
        // if (!$product) {
        //     throw $this->createNotFoundException(
        //         'No product found for id '.$id
        //     );
        // }
    
        // $product->setName('New product name!');
        // $entityManager->flush();
    
        // return $this->redirectToRoute('product_show', [
        //     'id' => $product->getId()
        // ]);
    }

    /**
     * @Route("/cours/{id}/delete", name="api_delete_cours", methods="DELETE")
     */
    public function deleteCours(EntityManagerInterface $em, Cours $unCours)
    {
        $em->remove($unCours);
        $em->flush();

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setStatusCode(204);

        return $response;

        // OU => Symfony renvoie tout seul le header
        // $return $this->json(null,204);
    }
}
