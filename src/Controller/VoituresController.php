<?php

namespace App\Controller;

use App\Entity\Voiture;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class VoituresController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/voitures', name: 'app_voiture')]
    public function index(): Response
    {
        $voituresRepository = $this->em->getRepository(Voiture::class);

        $voitures = $voituresRepository->findAll();

        return $this->render('voitures/voitures.html.twig', [
            'voitures' => $voitures,
        ]);
    }

    #[Route('/voitures/{id}', name: 'app_voiture_detail')]
    public function detail(int $id): Response
    {
       $voiture = $this->em->getRepository(Voiture::class)->find($id);
            
        if (!$voiture) {
            $this->addFlash('error', 'Voiture non trouvée.');
            return $this->redirectToRoute('app_home');
        }
        return $this->render('voitures/voiture_detail.html.twig', [
            'voiture' => $voiture,
        ]);
    }

    #[Route('/voitures/{id}/delete', name: 'app_voiture_delete')]
    public function delete(int $id): Response
    {
       $voiture = $this->em->getRepository(Voiture::class)->find($id);
            
        if (!$voiture) {
            $this->addFlash('error', 'Voiture non trouvée.');
            return $this->redirectToRoute('app_home');
        }

        $this->em->remove($voiture);
        $this->em->flush();

        $this->addFlash('success', 'Voiture supprimée avec succès.');

        return $this->redirectToRoute('app_voiture');
    }
}