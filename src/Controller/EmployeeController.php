<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class EmployeeController extends AbstractController
{
    #[Route('/')]
    public function homepage() : Response
    {
        $content = [
            'Employee table',
            'Billy avait un chameau',
        ];  

        return $this->render('employee/homepage.html.twig', [
            'title'=>'Homepage',
            'content'=>$content,
        ]);
    }
    #[Route('browse/{list}')]
    public function browse($list = null) : Response
    {
        if ($list) {
            $title = 'Employee: ' .u(str_replace('-', ' ', $list))->title(true);
        }else { 
            $title = 'List of employees: (database Employee -> ID/first_name etc...) ';
        }
            

        return new Response($title);
    }
}