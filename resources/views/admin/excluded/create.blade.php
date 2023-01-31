{{--Included--}}
<div class="modal fade" id="add"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">excluded trips :: {{$trips->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('excluded.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="trips_id" value="{{$trips->id}}">


                    <div class="row">
                        <div class="col">
                            <label> Name AR</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="col">
                            <label> Name En</label>
                            <input type="text" name="name_en" class="form-control" required>
                        </div>
                    </div>

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
