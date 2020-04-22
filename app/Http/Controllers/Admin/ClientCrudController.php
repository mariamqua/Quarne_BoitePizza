<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClientRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ClientCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ClientCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Client');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/client');
        $this->crud->setEntityNameStrings('client', 'clients');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
         // $this->crud->setFromDb();
         $f1 = [
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'image',
            'height' => '100px'
        ];
        $f2 = [
            'name' => 'nom',
            'type' => 'text',
            'label' => 'Nom',
        ];
        $f3 = [
            'name' => 'prenom',
            'type' => 'text',
            'label' => 'Prénom',
        ];
        $f4 = [
            'name' => 'login',
            'type' => 'text',
            'label' => 'login',
        ];
        $f4 = [
            'name' => 'email',
            'type' => 'text',
            'label' => 'Email',
        ];
        $this->crud->addColumns([$f1, $f2, $f3, $f4]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ClientRequest::class);

        $this->crud->addField([
            'name' => 'nom',
            'type' => 'text',
            'label' => 'Nom',
        ]);
        $this->crud->addField([
            'name' => 'prenom',
            'type' => 'text',
            'label' => 'Prénom'
        ]);
        $this->crud->addField([
            'name' => 'adresse',
            'type' => 'text',
            'label' => 'Adresse'
        ]);
        $this->crud->addField([
            'name' => 'email',
            'type' => 'email',
            'label' => 'Email',
    
        ]);
        
        $this->crud->addField([
            'name' => 'ca',
            'type' => 'text',
            'label' => "Chiffre d'affaire"
        ]);
        $this->crud->addField([
            'name' => 'login',
            'type' => 'text',
            'label' => 'Login'
        ]);
        $this->crud->addField([
            'name' => 'motdepasse',
            'type' => 'text',
            'label' => "Mot de passe ",
            
        ]);
        $this->crud->addField([
            'name' => 'admin',
            'type' => 'boolean',
            'label' => "Admin"
        ]);
       
        $this->crud->addField([
            'label' => "Image",
            'name' => "imgPath",
            'type' => 'text',
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 1
        ]);
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
            'label' => 'Image',
            'height' => '200px'
           
        ];
        $f2 = [
            'name' => 'nom',
            'type' => 'text',
            'label' => 'Nom',

            
        ];
        $f3 = [
            'name' => 'prenom',
            'type' => 'text',
            'label' => 'Prénom',
        ];
        $f4 = [
            'name' => 'adresse',
            'type' => 'text',
            'label' => 'Adresse',

            
        ];
        $f5 = [
            'name' => 'email',
            'type' => 'text',
            'label' => 'Email',

            
        ];
        $f6 = [
            'name' => 'login',
            'type' => 'text',
            'label' => 'login',

            
        ];
        $f7 = [
            'name' => 'ca',
            'type' => 'text',
            'label' => "Chiffre d'affaire",

            
        ];
        $f8 = [
            'name' => 'date_inscr',
            'type' => 'date',
            'label' => 'Date inscription',
    
        ];

        $this->crud->addColumns([$f1, $f2, $f3, $f4, $f5, $f6, $f7, $f8]);
        // $this->crud->removeColumn('date');
        // $this->crud->removeColumn('extras');
    }
}
