<?php

namespace App\Http\Livewire;

use App\Models\Lineinspector;
use Livewire\Component;
use Session;


class Piece extends Component
{
    public $fields = [];

    public function addField()
    {
        $this->fields[] = '';
    }

    public function render()
    {
        return view('livewire.piece')->layout('layouts.lineinspector');;
    }
}
