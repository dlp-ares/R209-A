<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\FormationRepository;
class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(): Response
    {
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
	
	#[Route('/cv', name: 'app_cv')]
    public function cv(FormationRepository $formationR): Response
    {
		//dd($formationR->findByOneCategorie("Certification") );
        return $this->render('dashboard/cv.html.twig', [
            'formationDiplomes' => $formationR->findByOneCategorie("diplôme"),
            'formationCertifications' => $formationR->findByOneCategorie("Certification"),
            
        ]);
    }
}
