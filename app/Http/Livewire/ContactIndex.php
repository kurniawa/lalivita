<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{
    use WithPagination;
    public $page_number=20;
    public $search_key;

    public $mode='create';
    protected $listeners = [
        'contactStored'=>'handleContactStored',
        'contactUpdated'=>'handleContactUpdated'
    ];
    public function render()
    {
        // $contacts=Contact::latest()->get();
        $page_number=$this->page_number;
        $search_key=$this->search_key;
        $search_key === null ?
        $contacts=Contact::latest()->paginate($page_number) :
        $contacts=Contact::where('name','like',"%$search_key%")->latest()->paginate($page_number);

        $data=[
            'contacts'=>$contacts
        ];
        // dd($data);
        return view('livewire.contact-index',$data);
    }
    public function handleContactStored($contact)
    {
        session()->flash('_success',"Contact $contact[name] was stored!");
    }

    public function clickEditContact($id)
    {
        $this->mode='update';
        $contact=Contact::find($id);
        $this->emit('editContact',$contact);
    }

    public function handleContactUpdated($_success)
    {
        session()->flash('_success',$_success);
    }

    public function clickDeleteContact($id)
    {
        $contact=Contact::find($id);
        $contact->delete();
        $_warning="Contact dengan nama: $contact->name telah berhasil dihapus!";
        session()->flash('_warning',$_warning);
        // $this->emit('contactUpdated',$_warning);
    }
}

