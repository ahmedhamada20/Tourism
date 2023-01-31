{{--Included--}}
<div class="modal fade" id="edit{{$row->id}}"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">additional trips :: {{$trips->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('additional.update','additional')}}" method="post" enctype="multipart/form-data">
                  @method('PUT')
                    @csrf

                    <input type="hidden" name="trips_id" value="{{$row->trip_id}}">
                    <input type="hidden" name="id" value="{{$row->id}}">


                    <div class="row">
                        <div class="col">
                            <label>Name  AR</label>
                            <input type="text" name="name" class="form-control" value="{{$row->getTranslation('name','ar')}}">
                        </div>

                        <div class="col">
                            <label>Name  En</label>
                            <input type="text" name="name_en" class="form-control" value="{{$row->getTranslation('name','en')}}">
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
