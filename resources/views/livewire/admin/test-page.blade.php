<div>

    


    Test Page

    <div>
        {{-- Order : {{ $order }} --}}
    </div>
    
    <div>
        {{-- <input type="text" wire:model="test_number"> --}}
        {{-- Image<input type="file" wire:model="image"> --}}

        <button wire:click.prevent="randNum()">Push Me</button>

        

    </div>






    
 
@push('scripts')   

    

@endpush

</div>
