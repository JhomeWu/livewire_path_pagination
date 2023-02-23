<?php

namespace App\Http\Livewire;

use App\Models\Migration;
use Livewire\Component;

class MigrationView extends Component
{
    public $migrations;
    public $currentPage;
    public $lastPage;
    public $baseUrl;

    public function setBaseUrl()
    {
        $currentUrl = request()->url();
        $currentUrlPart = explode('/', $currentUrl);
        $lastPath = end($currentUrlPart);
        if (preg_match('/^p-\d+$/', $lastPath)) {
            array_pop($currentUrlPart);
        }
        $this->baseUrl = implode('/', $currentUrlPart);
    }

    public function mount($pageString = 'p-1')
    {
        $parts = explode('-', $pageString);
        $page = intval($parts[1]);
        $migrationPage = Migration::paginate(1, ['*'], 'page', $page);
        $this->migrations = collect($migrationPage->items());
        $this->currentPage = $migrationPage->currentPage();
        $this->lastPage = $migrationPage->lastPage();
    }

    public function toPreviousPage()
    {
        $this->currentPage = max(1, $this->currentPage - 1);
        $this->mount('p-' . $this->currentPage);
        $this->emit('changePath', $this->currentPage);
    }

    public function toNextPage()
    {
        $this->currentPage = min($this->lastPage, $this->currentPage + 1);
        $this->mount('p-' . $this->currentPage);
        $this->emit('changePath', $this->currentPage);
    }

    public function toPage($pageString)
    {
        $this->mount($pageString);
        $this->emit('changePath', $this->currentPage);
    }

    public function render()
    {
        $this->setBaseUrl();
        return view('livewire.migration-view');
    }
}
