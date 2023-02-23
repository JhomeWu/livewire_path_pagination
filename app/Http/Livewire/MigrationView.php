<?php

namespace App\Http\Livewire;

use App\Models\Migration;
use Livewire\Component;

class MigrationView extends Component
{
    public $migrations;
    public $currentPage;
    public $lastPage;

    public function mount($pageString = 'p-1')
    {
        $parts = explode('-', $pageString);
        $page = intval($parts[1]);
        $migrationPage = Migration::paginate(1, ['*'], 'page', $page);
        $this->migrations = collect($migrationPage->items());
        $this->currentPage = $migrationPage->currentPage();
        $this->lastPage = $migrationPage->lastPage();
    }

    public function render()
    {
        return view('livewire.migration-view');
    }
}
