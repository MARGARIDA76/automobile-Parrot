<?php

namespace App\Controller;

use App\Entity\VoituresOccasions;
use App\Form\VoituresOccasionsType;
use App\Repository\VoituresOccasionsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/voitures/occasions')]
class VoituresOccasionsController extends AbstractController
{
    #[Route('/', name: 'app_voitures_occasions_index', methods: ['GET'])]
    public function index(VoituresOccasionsRepository $voituresOccasionsRepository): Response
    {
        return $this->render('voitures_occasions/index.html.twig', [
            'voitures_occasions' => $voituresOccasionsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_voitures_occasions_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $voituresOccasion = new VoituresOccasions();
        $form = $this->createForm(VoituresOccasionsType::class, $voituresOccasion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($voituresOccasion);
            $entityManager->flush();

            return $this->redirectToRoute('app_voitures_occasions_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('voitures_occasions/new.html.twig', [
            'voitures_occasion' => $voituresOccasion,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_voitures_occasions_show', methods: ['GET'])]
    public function show(VoituresOccasions $voituresOccasion): Response
    {
        return $this->render('voitures_occasions/show.html.twig', [
            'voitures_occasion' => $voituresOccasion,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_voitures_occasions_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, VoituresOccasions $voituresOccasion, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(VoituresOccasionsType::class, $voituresOccasion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_voitures_occasions_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('voitures_occasions/edit.html.twig', [
            'voitures_occasion' => $voituresOccasion,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_voitures_occasions_delete', methods: ['POST'])]
    public function delete(Request $request, VoituresOccasions $voituresOccasion, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$voituresOccasion->getId(), $request->request->get('_token'))) {
            $entityManager->remove($voituresOccasion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_voitures_occasions_index', [], Response::HTTP_SEE_OTHER);
    }
}
