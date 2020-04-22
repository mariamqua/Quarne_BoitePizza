<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FormuleRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FormuleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FormuleCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Formule');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/formule');
        $this->crud->setEntityNameStrings('formule', 'formules');
    }

    protected function setupListOperation()
    {
        $f1 = [
            
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'Image',
            'height' => '90px'
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
      
        $this->crud->addColumns([$f1, $f2, $f3]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(FormuleRequest::class);

        $this->crud->addField([
            'name' => 'nom',
            'type' => 'text',
            'label' => 'Nom',
        ]);
        $this->crud->addField([
            'name' => 'prix',
            'type' => 'text',
            'label' => 'Prix'
        ]);
        $this->crud->addField([
            'name' => 'description',
            'type' => 'textarea',
            'label' => 'Description',
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
            'height' => '200px',
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
            'name' => 'description',
            'type' => 'textarea',
            'label' => 'Description',
            
        ];
        

        $this->crud->addColumns([$f1, $f2, $f3, $f4]);
        // $this->crud->removeColumn('date');
        // $this->crud->removeColumn('extras');
    }
}
