<?php

namespace App\Controller;

use App\Service\StatsService;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminDashboardController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_dashboard")
     */
    public function index(ObjectManager $manager, StatsService $statsService): Response
    {
        $stats    = $statsService->getStats();
        $bestAds  = $statsService->getAdsStat('DESC');
        $worstAds = $statsService->getAdsStat('ASC');
        
        return $this->render('admin/dashboard/index.html.twig', [            
            'stats' => $stats,
            'bestAds' => $bestAds,
            'worstAds' => $worstAds
        ]);
    }
}
