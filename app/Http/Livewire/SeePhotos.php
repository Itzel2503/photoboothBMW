<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SeePhotos extends Component
{
    public $newPhoto;
    protected $listeners = ['update'];
    
    public function render()
    {
        $photos = DB::table('photos')->latest()->take(6)->get();
        return view('livewire.see-photos', ['photos' => $photos]);
    }

    public function update()
    {
        $this->mount();
    }
}