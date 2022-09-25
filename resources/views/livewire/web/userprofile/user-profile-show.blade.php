<div>
    

    <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                
                <section class="py-4">
                    <div class="container">
                        <h3 class="d-none">Account</h3>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card shadow-none mb-3 mb-lg-0">
                                            <div class="card-body">
                                                <div class="list-group list-group-flush">   
                                                    
                                                    {{-- <a href="{{ route('user.user_profile', ['id'=>Auth::user()->id]) }}" class="list-group-item active d-flex justify-content-between align-items-center">Account Details <i class='bx bx-user-circle fs-5'></i></a> --}}
                                                    
                                                    @include('livewire.web.userprofile.side_menu')


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="card shadow-none mb-0">
                                            <div class="card-body">
                                                <form class="row g-3" role="form" enctype="multipart/form-data" wire:submit.prevent="StoreUserInfo()">
                                                    @csrf
                                                    <div class="col-md-12">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" class="form-control" wire:model="name">
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label">Email address</label>
                                                        <input type="text" class="form-control" wire:model="email">
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-light btn-ecomm" style="float: right;">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end row-->
                                <br>
                                <div class="row">
                                    <div class="col-lg-4">
                                        
                                    </div>

                                    <div class="col-lg-8">
                                        <div class="card shadow-none mb-0">
                                            <div class="card-body">
                                                <form class="row g-3" role="form" enctype="multipart/form-data" wire:submit.prevent="ChangeUserPassword()">
                                                    @csrf
                                                    <div class="col-12">
                                                        <label for="current_password" class="form-label">Current Password</label>
                                                        <input id="current_password" type="password" class="form-control" wire:model="current_password">
                                                        <x-jet-input-error for="current_password" class="mt-2" />
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="password" class="form-label">New Password</label>
                                                        <input id="password" type="password" class="form-control" wire:model="new_password">
                                                        <x-jet-input-error for="password" class="mt-2" />
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="password_confirmation" class="form-label">Confirm New Password</label>
                                                        <input id="password_confirmation" type="password" class="form-control" wire:model="confirm_password">
                                                        <x-jet-input-error for="password_confirmation" class="mt-2" />
                                                        <x-jet-action-message class="mr-3" on="saved">
                                                            {{ __('Saved.') }}
                                                        </x-jet-action-message>
                                                    </div>
                                                    <div class="col-12">
                                                        <p style="color:red;">Note: Changing Password May Cause Logout.</p>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-light btn-ecomm" style="float: right;">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!--end row-->
                                <br>
                                <div class="row">
                                    <div class="col-lg-4">
                                        
                                    </div>

                                    <div class="col-lg-8">
                                        <div class="card shadow-none mb-0">
                                            <div class="card-body">
                                                <form class="row g-3" role="form" enctype="multipart/form-data" wire:submit.prevent="StoreUserProfile()">
                                                    @csrf
                                                    <div class="col-12">
                                                        <label class="form-label">Mobile</label>
                                                        <input type="text" class="form-control" wire:model="mobile">
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label">City</label>
                                                        <input type="text" class="form-control" wire:model="city">
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label">Post Code</label>
                                                        <input type="text" class="form-control" wire:model="post_code">
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label">Address Line 1</label>
                                                        <textarea class="form-control" wire:model="address_line1"></textarea>
                                                        {{-- <input type="text" class="form-control" wire:model="address_line1"> --}}
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label">Address Line 2</label>
                                                        <textarea class="form-control" wire:model="address_line2"></textarea>
                                                        {{-- <input type="text" class="form-control" wire:model="address_line2"> --}}
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-light btn-ecomm" style="float: right;">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
                <!--end shop cart-->
            </div>
        </div>
        <!--end page wrapper -->


</div>
