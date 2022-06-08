<?php

namespace App\Controller\Admin;

use App\Entity\House;
use App\Entity\Students;
use App\Entity\Teachers;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    )
    {
        
    }
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        return $this->redirect($this->adminUrlGenerator->setController(StudentsCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Hogwarts');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Hogwarts', 'fa fa-hat-wizard');
        yield MenuItem::linkToCrud('Students', 'fa fa-title-text', Students::class);
        yield MenuItem::linkToCrud('Teachers', 'fa fa-cauldron', Teachers::class);
        yield MenuItem::linkToCrud('House', 'fa fa-title-text', House::class);
    }
}
