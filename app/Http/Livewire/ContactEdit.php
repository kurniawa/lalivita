<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactEdit extends Component
{
    public $name;
    public $phone;
    public $contactId;
    protected $listeners=['editContact'=>'contactEdit'];

    public function render()
    {
        return view('livewire.contact-edit');
    }

    public function contactEdit($contact)
    {
        $this->name=$contact['name'];
        $this->phone=$contact['phone'];
        $this->contactId=$contact['id'];
    }

    public function update()
    {
        // dd($this);
        $run_db=true;
        $this->validate([
            'name'=>'required|min:3',
            'phone'=>'required|max:15',
        ]);

        if ($this->contactId===null) {
            $run_db=false;
        }
        if ($run_db) {
            $contact=Contact::find($this->contactId);
            $contact->update([
                'name'=>$this->name,
                'phone'=>$this->phone
            ]);
            $_success="Contact telah berhasil di update - nama: $contact->name";

            $this->name=null;
            $this->phone=null;

            $this->emit('contactUpdated',$_success);
        }
    }
}
