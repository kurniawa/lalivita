<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactCreate extends Component
{
    public $contacts;
    public $name;
    public $phone;
    // public function mount($contacts)
    // {
    //     dd($contacts);
    //     $this->contacts=$contacts;
    // }
    public function render()
    {

        return view('livewire.contact-create');
    }

    public function store()
    {
        // $post=$request->post();
        // dd($post);
        $this->validate([
            'name'=>'required|min:3',
            'phone'=>'required|max:15',
        ]);

        $contact=Contact::create([
            'name'=>$this->name,
            'phone'=>$this->phone
        ]);
        $this->resetForm();
        $this->emit('contactStored',$contact);
    }

    private function resetForm()
    {
        $this->name=null;$this->phone=null;
    }
}
