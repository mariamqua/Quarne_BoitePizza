<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CommentaireRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CommentaireCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CommentaireCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Commentaire');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/commentaire');
        $this->crud->setEntityNameStrings('commentaire', 'commentaires');
    }

    protected function setupListOperation()
    {
        $f1 = [
            
            'name' => 'date_pub',
            'type' => 'text',
            'label' => 'date de publication',
        ];
        $f2 = [
            'name' => 'produit.nom',
            'type' => 'text',
            'label' => 'Produit',
        ];
        $f3 = [
            'name' => 'client.nom',
            'type' => 'text',
            'label' => 'Client',
        ];
        
        $this->crud->addColumns([$f1, $f2, $f3]);
    }

    protected function setupCreateOperation()
    {
        
        $this->crud->setValidation(CommentaireRequest::class);

        $this->crud->addField([  // Select
            'label' => "Produit",
            'type' => 'select',
            'name' => 'produit_id', 
            'entity' => 'produit', 
            'attribute' => 'nom', 
        ]);

        $this->crud->addField([  // Select
            'label' => "Client",
            'type' => 'select',
            'name' => 'client_id', 
            'entity' => 'client', 
            'attribute' => 'nom', 
        ]);


        $this->crud->addField([
            'label' => "Texte",
            'name' => 'texte',
            'type' => 'textarea']);

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
            'name' => 'produit.nom',
            'type' => 'text',
            'label' => 'Produit',

        ];
        $f2 = [
            'name' =>'client.nom',
            'type' => 'text',
            'label' => 'Client'
        ];
        $f3 = [
            'name' => 'texte',
            'type' => 'textarea',
            'label' => 'Texte',
        ];
        $f4 = [
            'name' => 'date_pub',
            'type' => 'date',
            'label' => 'Date de publication',
        ];
        
        $this->crud->addColumns([$f1, $f2, $f3, $f4]);
        // $this->crud->removeColumn('date');
        // $this->crud->removeColumn('extras');
    }
   
}
