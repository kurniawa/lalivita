<div class="px-5 py-5 mt-5 my-3 border rounded-lg shadow-sm">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <form class="grid grid-cols-2 gap-2" wire:submit.prevent="update">
        <div>
            <label for="">Nama</label>
            <input wire:model="name" type="text" class="input mt-1 @error('name') is-invalid @enderror" placeholder="Nama">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="">Phone</label>
            <input wire:model="phone" type="text" class="input mt-1 @error('phone') is-invalid @enderror" name="phone" placeholder="Phone">
            @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <input type="hidden" name="id" value="{{ $contactId }}">
            <button class="btn-dd rounded">Konfirmasi Edit</button>
        </div>
        {{-- <div>{{ $name }}</div> --}}
    </form>
</div>
