<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProduitRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

use App\Models\Produit;

/**
 * Class ProduitCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProduitCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Produit');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/produit');
        $this->crud->setEntityNameStrings('produit', 'produits');
    }

    protected function setupListOperation()
    {
        $f1 = [
            
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'Image',
            'height' => '130px'
        ];
        $f2 = [
            'name' => 'nom',
            'type' => 'text',
            'label' => 'Nom',
        ];
        $f3 = [
            'name' => 'prix',
            'type' => 'text',
            'label' => 'Prix',
        ];
        $f4 = [
            'name' => 'remise',
            'type' => 'text',
            'label' => 'Remise',
        ];
        $f5 = [
            'name' => 'category.nomCat',
            'type' => 'text',
            'label' => 'Categorie'
        ];
        $this->crud->addColumns([$f1, $f2, $f3, $f4, $f5]);
    }

    protected function setupCreateOperation()
    {
        
        $this->crud->setValidation(ProduitRequest::class);

        $this->crud->addField('nom');
        $this->crud->addField('prix');
        $this->crud->addField('remise');
        $this->crud->addField([  // Select
            'label' => "Catégorie",
            'type' => 'select',
            'name' => 'category_id', 
            'entity' => 'category', 
            'attribute' => 'nomCat', 
        ]);
        $this->crud->addField([
            'label' => "Date début",
            'name' => 'date_debut',
            'type' => 'datetime']);
        $this->crud->addField( [
            'label' => "Date fin",
            'name' => 'date_fin',
            'type' => 'datetime']);
        $this->crud->addField([
            'name' =>'isPromo',
            'label' => 'En promotion',
            'type' => 'checkbox']);
        $this->crud->addField([
            'label' => "Image",
            'name' => "imgPath",
            'type' => 'text',
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 1]);
        // TODO: remove setFromDb() and manually define Fields
       // $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);

        $f1 = [
            'name' => 'imgPath',
            'type' => 'image',
            'height' => '3330px',
            'label' => 'Image'
        ];
        $f2 = [
            'name' => 'nom',
            'type' => 'text',
            'label' => 'Nom'
        ];
        $f3 = [
            'name' => 'prix',
            'type' => 'text',
            'label' => 'Prix',
        ];
        $f4 = [
            'name' => 'remise',
            'type' => 'text',
            'label' => 'Remise',
        ];
        $f5 = [
            'name' => 'category.nomCat',
            'type' => 'text',
            'label' => 'Catégorie',
        ];
        $f6 = [
            'name' => 'date_fin',
            'type' => 'date',
            'label' => 'Date fin',
        ];
        $f7 = [
            'name' => 'date_debut',
            'type' => 'date',
            'label' => 'Date début',
        ];
        $f8 = [
            'name' => 'isPromo',
            'type' => 'boolean',
            'label' => 'En promotion',
        ];

        $this->crud->addColumns([$f1, $f2, $f3, $f4, $f5, $f6, $f7, $f8]);
        // $this->crud->removeColumn('date');
        // $this->crud->removeColumn('extras');
    }
   
}
