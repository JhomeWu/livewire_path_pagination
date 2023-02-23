<?php

namespace App\Http\Livewire;

use App\Models\Migration;
use Livewire\Component;

class MigrationView extends Component
{
    public $migrations;

    public function mount()
    {
        $this->migrations = Migration::get();
    }

    public function render()
    {
        return view('livewire.migration-view');
    }
}
