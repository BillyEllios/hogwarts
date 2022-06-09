<?php

namespace App\Controller\Admin;

use App\Entity\Furniture;
use App\Service\FurnitureTypeService;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FurnitureCrudController extends AbstractCrudController
{
    public function __construct(private FurnitureTypeService $furnitureTypeService) {

    }

    public static function getEntityFqcn(): string
    {
        return Furniture::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
        ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            AssociationField::new('student'),
            TextField::new('name'),
            AssociationField::new('FurnituresTypes')
        ];
    }
}
