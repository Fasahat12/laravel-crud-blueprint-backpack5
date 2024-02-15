<?php

namespace App\Services;

use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;

class CustomCrudPanel extends CrudPanel
{
    /**
     * Prevent users from updating entries.
     */
    // public function update($id, $data)
    // {
    //     // $data = $this->decodeJsonCastedAttributes($data, 'update', $id);
    //     // $data = $this->compactFakeFields($data, 'update', $id);
    //     $item = $this->model->findOrFail($id);

    //     \Alert::warning("<strong>Disabled in Demo</strong><br>For security reasons, the db entries aren't updated in the demo.");

    //     return $item;
    // }

    // public function getListView()
    // {
    //     return 'test';
    // }
}
