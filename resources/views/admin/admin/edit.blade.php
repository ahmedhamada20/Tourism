{{--Edit--}}
<div class="modal fade" id="edit{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('create_admin.update','test')}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <input type="hidden" name="id" value="{{$row->id}}">


                    <div class="row">
                        <div class="col">
                            <label>name</label>
                            <input type="text" name="name" value="{{$row->name}}" class="form-control @error('name') is-invalid @enderror"
                                   >
                        </div>

                        <div class="col">
                            <label>email</label>
                            <input type="email" name="email" value="{{$row->email}}"
                                   class="form-control @error('email') is-invalid @enderror" >
                        </div>
                    </div>

                    <br>

                    <div class="row">

                        <div class="col">
                            <label>password</label>
                            <input type="password" name="password"  class="form-control @error('password') is-invalid @enderror">
                        </div>

                        <div class="col">
                            <label>countries</label>
                            <select class="form-control" name="countries_id">
                                <option value="" disabled selected>-- Choose --</option>
                                @foreach(App\Models\Countries::all() as  $data)
                                    <option value="{{$data->id}}" {{$data->id == $row->countries_id ? 'selected' : ''}}>{{$data->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <br>



                    <br>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
