<div>
    <!-- Appointments -->
        <div class="col-lg-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">Sections Settings</h3>
                        </div>
                        <div class="col-6">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                        </div>

                        {{-- <div class="col-3">
                            <a class="btn btn-success float-right text-white" data-toggle="modal" data-target="#modalAddCategory">Add New Category</a>
                        </div> --}}
                    </div>             
                </div>
                <br>
                <div class="col-12">

                    
                    <br>
                    <table id="datatable-makesales" class="table table-bordered table-striped nowrap data-table-makesales" style="overflow-wrap: anywhere;" width="100%">
                        <thead style="text-align: center;">
                        <tr>
                            <th>ID</th>
                            <th>Section</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($allSections as $key=>$value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->sections }}</td>
                                    <td class="text-center">
                                        <input style="transform: scale(3);" type="checkbox" class="form-check-input" wire:click="updateSection({{ $value->id }})" @if($value->show == 1) checked @endif>

                                        {{-- <input  type="checkbox" class="form-control" wire:model.defer="selectedUsers" value="{{$user->id}}"  @if($selectedUsers->contains($user->id)) checked @endif> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- Appointments -->







       


        <style type="text/css">
          html {
            font-size: .9rem;
          }
        </style>

</div>
