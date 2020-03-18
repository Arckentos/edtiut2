<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Professeur;
use App\Form\ProfesseurType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/professeurs")
 */
class ProfesseurController extends AbstractController
{
    /**
     * @Route("/", name="professeurs")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $professeurs = $em->getRepository(Professeur::class)->findAll();

        return $this->render('professeur/index.html.twig', ['professeurs' => $professeurs,]);
    }

    /**
     * @Route("/create", name="professeurs.create", methods={"GET", "POST"})
     */
    public function create(Request $request, EntityManagerInterface $em)
    {
        $professeur = new Professeur();
        $form = $this->createForm(ProfesseurType::class, $professeur);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $professeur = $form->getData();
            $em->persist($professeur);
            $em->flush();

            return $this->redirectToRoute('professeurs');
        }

        return $this->render('professeur/create.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/{id}/edit", name="professeurs.edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, EntityManagerInterface $em, int $id)
    {
        $professeur = $em->getRepository(Professeur::class)->find($id);
        $form = $this->createForm(ProfesseurType::class, $professeur);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $professeur = $form->getData();
            $em->persist($professeur);
            $em->flush();

            return $this->redirectToRoute('professeurs');
        }

        return $this->render('professeur/create.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/{id}/delete", name="professeurs.delete", methods={"GET", "POST"})
     */
    public function delete(EntityManagerInterface $em, Professeur $professeur)
    {
        $em->remove($professeur);
        $em->flush();

        return $this->redirectToRoute('professeurs');
    }
}
