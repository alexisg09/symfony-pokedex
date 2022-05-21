<?php

namespace App\Controller;

use App\Entity\Dresseur;
use App\Form\DresseurType;
use App\Repository\DresseurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/dresseur')]
class DresseurController extends AbstractController
{
    #[Route('/', name: 'app_dresseur_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $dresseurs = $entityManager
            ->getRepository(Dresseur::class)
            ->findAll();

        return $this->render('dresseur/index.html.twig', [
            'dresseurs' => $dresseurs,
        ]);
    }

    #[Route('/new', name: 'app_dresseur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $dresseur = new Dresseur();
        $form = $this->createForm(DresseurType::class, $dresseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($dresseur);
            $entityManager->flush();

            return $this->redirectToRoute('app_dresseur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('dresseur/new.html.twig', [
            'dresseur' => $dresseur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_dresseur_show', methods: ['GET'])]
    public function show(Dresseur $dresseur): Response
    {
        return $this->render('dresseur/show.html.twig', [
            'dresseur' => $dresseur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_dresseur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Dresseur $dresseur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DresseurType::class, $dresseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_dresseur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('dresseur/edit.html.twig', [
            'dresseur' => $dresseur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_dresseur_delete', methods: ['POST'])]
    public function delete(Request $request, Dresseur $dresseur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dresseur->getId(), $request->request->get('_token'))) {
            $entityManager->remove($dresseur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_dresseur_index', [], Response::HTTP_SEE_OTHER);
    }
}
