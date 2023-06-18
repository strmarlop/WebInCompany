<?php

namespace App\Controller;

use App\Entity\Interview;
use App\Form\InterviewType;
use App\Repository\InterviewRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/interview')]
class InterviewController extends AbstractController
{
    #[Route('/', name: 'app_interview_index', methods: ['GET'])]
    public function index(InterviewRepository $interviewRepository): Response
    {
        return $this->render('interview/index.html.twig', [
            'interviews' => $interviewRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_interview_new', methods: ['GET', 'POST'])]
    public function new(Request $request, InterviewRepository $interviewRepository): Response
    {
        $interview = new Interview();
        $form = $this->createForm(InterviewType::class, $interview);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $interviewRepository->save($interview, true);

            return $this->redirectToRoute('app_interview_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('interview/new.html.twig', [
            'interview' => $interview,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_interview_show', methods: ['GET'])]
    public function show(Interview $interview): Response
    {
        return $this->render('interview/show.html.twig', [
            'interview' => $interview,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_interview_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Interview $interview, InterviewRepository $interviewRepository): Response
    {
        $form = $this->createForm(InterviewType::class, $interview);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $interviewRepository->save($interview, true);

            return $this->redirectToRoute('app_interview_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('interview/edit.html.twig', [
            'interview' => $interview,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_interview_delete', methods: ['POST'])]
    public function delete(Request $request, Interview $interview, InterviewRepository $interviewRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$interview->getId(), $request->request->get('_token'))) {
            $interviewRepository->remove($interview, true);
        }

        return $this->redirectToRoute('app_interview_index', [], Response::HTTP_SEE_OTHER);
    }
}
