<div>
    
    <div class="page-wrapper">
        <div class="page-content">
            
            <section class="py-4">
                <div class="container">
                    
                    <div class="row">
                        <div class="col-sm-3"></div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">

                                    <div class="row">

                                        <div class="col-lg-12">
                                            <div class="card shadow-none mb-3 mb-lg-0 border p-4 rounded">

                                                <div class="text-center">
                                                    <h3 class="">Seller Registration</h3>
                                                </div>
                                                
                                                <div class="card-body">
                                                    
                                                    <form class="row g-3" wire:submit.prevent="Store()">
                                                        @csrf


                                                        <div class="col-sm-12">
                                                            <label for="name" class="form-label">Shop Name</label>
                                                            <input class="form-control" type="text" name="shop_name"  required placeholder="Shop Name" wire:model="shop_name">

                                                            <div style="color: red;">
                                                            @error('shop_name') <span class="error">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12">
                                                            <label for="name" class="form-label">Shop Address</label>

                                                            <textarea class="form-control" name="shop_address"  required placeholder="Shop Address" wire:model="shop_address" maxlength="250" rows="6">
                                                                
                                                            </textarea>

                                                            <div style="color: red;">
                                                            @error('shop_address') <span class="error">{{ $message }}</span> @enderror
                                                            </div>

                                                        </div>

                                                        <div class="col-sm-12">
                                                            <label for="name" class="form-label">Owner Name</label>
                                                            <input class="form-control" type="text" name="owner_name"  required placeholder="Owner Name" wire:model="owner_name">

                                                            <div style="color: red;">
                                                            @error('owner_name') <span class="error">{{ $message }}</span> @enderror
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label for="name" class="form-label">Owner Email</label>
                                                            <input class="form-control" type="email" name="owner_email"  required placeholder="Owner Email" wire:model="owner_email">

                                                            <div style="color: red;">
                                                            @error('owner_email') <span class="error">{{ $message }}</span> @enderror
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label for="password" class="form-label">Owner Password</label>
                                                            <input class="form-control" type="password" name="password"  required placeholder="Owner Password" wire:model="password" maxlength="15">

                                                            <div style="color: red;">
                                                            @error('password') <span class="error">{{ $message }}</span> @enderror
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label for="password" class="form-label">Owner Password Confirmation</label>
                                                            <input class="form-control" type="password" name="password_confirmation"  required placeholder="Owner Password Confirmation" wire:model="password_confirmation" maxlength="15">

                                                            <div style="color: red;">
                                                            @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label for="name" class="form-label">Owner Phone</label>
                                                            <input class="form-control" type="text" name="owner_phone"  required placeholder="Owner Phone" wire:model="owner_phone">

                                                            <div style="color: red;">
                                                            @error('owner_phone') <span class="error">{{ $message }}</span> @enderror
                                                            </div>

                                                        </div>

                                                        <div class="col-sm-12">
                                                            <label for="name" class="form-label">Product Type</label>

                                                            <textarea class="form-control" name="product_type"  required placeholder="Product Type" wire:model="product_type" maxlength="250" rows="6">
                                                                
                                                            </textarea>

                                                            <div style="color: red;">
                                                            @error('product_type') <span class="error">{{ $message }}</span> @enderror
                                                            </div>

                                                        </div>
                                                        
                                                        
                                                        <div class="col-sm-12">
                                                            <label for="name" class="form-label">Seller Type</label>
                                                            
                                                            <select class="form-control" name="seller_type"  required placeholder="Seller Type" wire:model="seller_type">
                                                                
                                                                <option value="" style="color:black;">Select Type</option>
                                                                <option value="personal" style="color:black;">Personal</option>
                                                                <option value="business" style="color:black;">Business</option>

                                                            </select>

                                                            <div style="color: red;">
                                                            @error('seller_type') <span class="error">{{ $message }}</span> @enderror
                                                            </div>

                                                        </div>

                                                        @if($seller_type === 'personal')
                                                            <div class="col-sm-12">
                                                                <label for="name" class="form-label">NID</label>
                                                                <input class="form-control" type="file" name="nid" wire:model="nid" @if($seller_type === 'personal') required @endif>

                                                                <div style="color: red;">
                                                                @error('nid') <span class="error">{{ $message }}</span> @enderror
                                                                </div>

                                                            </div>

                                                        @elseif($seller_type === 'business')

                                                            <div class="col-sm-12">
                                                                <label for="name" class="form-label">Trade License</label>
                                                                <input class="form-control" type="file" name="trade_license" wire:model="trade_license" @if($seller_type === 'business') required @endif>

                                                                <div style="color: red;">
                                                                @error('trade_license') <span class="error">{{ $message }}</span> @enderror
                                                                </div>

                                                            </div>

                                                        @endif


                                                        <div class="col-sm-12">
                                                            <label for="name" class="form-label">Payment : Bank/ MPS info</label>

                                                            <textarea class="form-control" name="payment_info"  required placeholder="Payment : Bank/ MPS info" wire:model="payment_info" maxlength="250" rows="6">
                                                                
                                                            </textarea>

                                                            <div style="color: red;">
                                                            @error('payment_info') <span class="error">{{ $message }}</span> @enderror
                                                            </div>

                                                        </div>

                                                        <div class="col-12">
                                                            <div class="d-grid">
                                                                <br>
                                                                <button type="submit" class="btn btn-light">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    

                                </div>
                            </div>
                        </div>

                        <div class="col-md-3"></div>
                        
                    </div>

                    

                </div>
            </section>
            <!--end shop cart-->
        </div>
    </div>


</div>
