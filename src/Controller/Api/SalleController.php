<?php

namespace App\Controller\Api;

use App\Entity\Salle;
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
class SalleController extends AbstractController
{
    /**
     * @Route("/salles", name="api_salles")
     */
    public function getSalles(EntityManagerInterface $em)
    {
        // Commun
        $salles = $em->getRepository(Salle::class)->findAll();

        // Méthode 3
        return $this->json(array_map(function ($uneSalle) {
            return $uneSalle->toArray();
        }, $salles));
    }

    /**
     * @Route("/salles/{id}", name="api_salles_id")
     */
    public function getUneSalle(Salle $uneSalle)
    {
        return $this->json($uneSalle->toArray());
    }

    /**
     * @Route("/salles/{id}/delete", name="api_delete_salles", methods={"DELETE"})
     */
    public function deleteSalle(EntityManagerInterface $em, Salle $uneSalle)
    {
        $em->remove($uneSalle);
        $em->flush();

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setStatusCode(204);

        return $response;

        // OU => Symfony renvoie tout seul le header
        // $return $this->json(null,204);
    }

    /**
     * @Route("/salles/create", name="api_put_salles", methods={"PUT"})
     */
    public function createSalle(EntityManagerInterface $em, Request $request)
    {
        $data = json_decode($request->getContent());
        try {
            $uneSalle = new Salle;
            $uneSalle->setNumero($data->numero);
        } catch (\Exception $e) {
            return $this->json(['message' => 'Erreur creation salle.'], 400);
        }

        // $errors = $validator->validate($uneSalle);
        // if (count($errors) > 0) {
        //     return $this->json(['message' => 'Salle invalide.'], 400);
        // }

        $em->persist($uneSalle);
        $em->flush();

        return $this->json($uneSalle, Response::HTTP_CREATED);
    }
}
