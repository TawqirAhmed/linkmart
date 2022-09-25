<div>

    <form role="form" enctype="multipart/form-data" wire:submit.prevent="searchFor()">
        @csrf
        <div class="input-group flex-nowrap px-xl-4">
            
            

            <input type="text" class="form-control w-100" placeholder="Search for Products" wire:model="search_for">

            <a wire:click="searchFor()"><span class="input-group-text cursor-pointer"><i class='bx bx-search'></i></span></a>

            

        </div>
    </form>

</div>
