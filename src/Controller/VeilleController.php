<?php

namespace App\Controller;

use App\Entity\Veille;
use App\Form\VeilleType;
use App\Repository\VeilleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/veille')]
class VeilleController extends AbstractController
{
    #[Route('/', name: 'app_veille_index', methods: ['GET'])]
    public function index(VeilleRepository $veilleRepository): Response
    {
        return $this->render('veille/index.html.twig', [
            'veilles' => $veilleRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_veille_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $veille = new Veille();
        $form = $this->createForm(VeilleType::class, $veille);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($veille);
            $entityManager->flush();

            return $this->redirectToRoute('app_veille_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('veille/new.html.twig', [
            'veille' => $veille,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_veille_show', methods: ['GET'])]
    public function show(Veille $veille): Response
    {
        return $this->render('veille/show.html.twig', [
            'veille' => $veille,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_veille_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Veille $veille, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(VeilleType::class, $veille);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_veille_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('veille/edit.html.twig', [
            'veille' => $veille,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_veille_delete', methods: ['POST'])]
    public function delete(Request $request, Veille $veille, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$veille->getId(), $request->request->get('_token'))) {
            $entityManager->remove($veille);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_veille_index', [], Response::HTTP_SEE_OTHER);
    }
}
