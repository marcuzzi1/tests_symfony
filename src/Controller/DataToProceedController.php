<?php

namespace App\Controller;

use App\Entity\DataToProceed;
use App\Form\DataToProceedType;
use App\Repository\DataToProceedRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/data")
 */
class DataToProceedController extends AbstractController
{
    /**
     * @Route("/", name="data_to_proceed_index", methods={"GET"})
     */
    public function index(DataToProceedRepository $dataToProceedRepository): Response
    {
        return $this->render('data_to_proceed/index.html.twig', [
            'data_to_proceeds' => $dataToProceedRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="data_to_proceed_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $dataToProceed = new DataToProceed();
        $form = $this->createForm(DataToProceedType::class, $dataToProceed);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($dataToProceed);
            $entityManager->flush();

            return $this->redirectToRoute('data_to_proceed_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('data_to_proceed/new.html.twig', [
            'data_to_proceed' => $dataToProceed,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="data_to_proceed_show", methods={"GET"})
     */
    public function show(DataToProceed $dataToProceed): Response
    {
        return $this->render('data_to_proceed/show.html.twig', [
            'data_to_proceed' => $dataToProceed,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="data_to_proceed_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, DataToProceed $dataToProceed, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DataToProceedType::class, $dataToProceed);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('data_to_proceed_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('data_to_proceed/edit.html.twig', [
            'data_to_proceed' => $dataToProceed,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="data_to_proceed_delete", methods={"POST"})
     */
    public function delete(Request $request, DataToProceed $dataToProceed, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dataToProceed->getId(), $request->request->get('_token'))) {
            $entityManager->remove($dataToProceed);
            $entityManager->flush();
        }

        return $this->redirectToRoute('data_to_proceed_index', [], Response::HTTP_SEE_OTHER);
    }
}
