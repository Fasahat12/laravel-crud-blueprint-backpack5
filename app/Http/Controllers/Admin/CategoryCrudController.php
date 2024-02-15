<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Library\Widget;
use App\Http\Requests\CategoryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CategoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CategoryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ReorderOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Category::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/category');
        CRUD::setEntityNameStrings('category', 'categories');

        /* To Add Custom CRUD Routes */
        
        // $this->crud->setEditView('test');
        // $this->crud->setCreateView('test');
        // $this->crud->setShowView('test');
        // CRUD::setListView('test');

        /* Add Widgets to all CRUD UIs */

        // $widgetDefinationArray = [
        //     'type'         => 'alert',
        //     'class'        => 'alert alert-info mb-2',
        //     'heading'      => 'Important information!',
        //     'content'      => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti nulla quas distinctio veritatis provident mollitia error fuga quis repellat, modi minima corporis similique, quaerat minus rerum dolorem asperiores, odit magnam.',
        //     'close_button' => true, // show close button or not
        // ];

        // Widget::add($widgetDefinationArray)->to('before_content');

        /* Add Custom CSS & JS Files */
        
        // Widget::add()->type('script')->content('https://code.jquery.com/ui/1.12.0/jquery-ui.min.js');
        // Widget::add()->type('style')
        //     ->content('https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace@2.0.0-beta.58/dist/themes/light.css')
        //     ->crossorigin('anonymous');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('name');
        CRUD::column('slug');
        CRUD::column('created_at');
        CRUD::column('updated_at');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        /* Add Widgets to Create UI */

        $widgetDefinationArray = [
            'type'         => 'alert',
            'class'        => 'alert alert-info mb-2',
            'heading'      => 'Important information!',
            'content'      => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti nulla quas distinctio veritatis provident mollitia error fuga quis repellat, modi minima corporis similique, quaerat minus rerum dolorem asperiores, odit magnam.',
            'close_button' => true, // show close button or not
        ];

        Widget::add($widgetDefinationArray)->to('before_content');

        /* Add Custom JS */

        Widget::add()->type('script')->content('https://code.jquery.com/ui/1.12.0/jquery-ui.min.js');

        /* Set Request Validation File */

        CRUD::setValidation(CategoryRequest::class);

        /* Set Table Fields */

        CRUD::field('parent_id');
        CRUD::field('name');
        CRUD::field('slug');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    /**
     * Provides an interface to reorder & nest elements
     * 
     * @see https://backpackforlaravel.com/docs/5.x/crud-api#reorder-operation
     * @return void
     */
    protected function setupReorderOperation()
    {
        // which model attribute to use for labels
        $this->crud->set('reorder.label', 'name');
        // maximum nesting depth; this example will prevent the user from creating trees deeper than 3 levels;
        $this->crud->set('reorder.max_level', 4);
    }
}
