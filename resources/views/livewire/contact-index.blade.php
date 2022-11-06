<div>
    {{-- Stop trying to control. --}}
    {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-violet-500">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
    </svg> --}}

    @if ($mode==='create')
    @livewire('contact-create')
    @elseif ($mode==='update')
    @livewire('contact-edit')
    @endif

    @if (session()->has('_success'))
    <div class="alert-success mb-3">{{ session('_success') }}</div>
    @endif
    @if (session()->has('_warning'))
    <div class="alert-warning mb-3">{{ session('_warning') }}</div>
    @endif

    <hr>
    <div class="my-2 flex items-center">
        <div>
            <input wire:model="search_key" type="text" class="input" placeholder="Search...">
        </div>
        <div class="ml-1">
            Jumlah Pencarian:
            <select wire:model="page_number" name="" id="" class="form-select">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
            </select>
        </div>
    </div>
    <table class="table-simple">
        <tr>
            <th>#</th><th>Name</th><th>Phone</th><th></th>
        </tr>
        @php $i=1; @endphp
        @foreach ($contacts as $contact)
        <tr>
            <td>{{ $i }}</td><td>{{ $contact->name }}</td><td>{{ $contact->phone }}</td>
            <td><button wire:click="clickEditContact({{ $contact->id }})" class="btn-dd-sm rounded">Edit</button><button wire:click="clickDeleteContact({{ $contact->id }})" class="btn-danger-sm rounded ml-0.5">Delete</button></td>
        </tr>
        @php $i++; @endphp
        @endforeach

    </table>
    {{ $contacts->links() }}

</div>
{{--
    mysql -u doadmin -p AVNS_Ru8VM4etI8nfSjJT6c6 -h db-mysql-sgp1-00853-do-user-12814545-0.b.db.ondigitalocean.com -P 25060 < <local-pg-dump-path>

    mysql -u doadmin -p AVNS_Ru8VM4etI8nfSjJT6c6 -h db-mysql-sgp1-00853-do-user-12814545-0.b.db.ondigitalocean.com -P 25060 -D lalivita

    mysql -u doadmin -p -h mysql-test-do-user-4915853-0.db.ondigitalocean.com -P 25060 your_database_name \ < /path/to/database_file_name.sql

    mysql -u doadmin -p -h db-mysql-sgp1-00853-do-user-12814545-0.b.db.ondigitalocean.com -P 25060 lalivita \ < /home/kasepisan/Downloads tall-test.sql
    mysql -u doadmin -p -h db-mysql-sgp1-00853-do-user-12814545-0.b.db.ondigitalocean.com -P 25060 lalivita < /home/kasepisan/Downloads tall-test.sql

 --}}
