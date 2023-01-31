{{--Edit--}}
<div class="modal fade" id="edit{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">edit Destination :: {{$row->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('destenation.update','test')}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <input type="hidden" name="id" value="{{$row->id}}">


                    <div class="row">
                        <div class="col">
                            <label>Name Destination AR</label>
                            <input type="text" name="name" class="form-control" value="{{$row->getTranslation('name','ar')}}">
                        </div>

                        <div class="col">
                            <label>Name Destination En</label>
                            <input type="text" name="name_en" class="form-control" value="{{$row->getTranslation('name','en')}}">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>Notes Destination AR</label>
                            <textarea class="form-control" rows="5" name="note" id="elm1">
                                {{$row->getTranslation('note','ar')}}
                            </textarea>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>Notes Destination EN</label>
                            <textarea class="form-control" rows="5" name="note_en" id="elm1">
                                {{$row->getTranslation('note','en')}}
                            </textarea>
                        </div>
                    </div>


                    <br>

                    @if($row->photo)
                        <img src="{{asset('admin/pictures/destenation/' . $row->id .'/' .$row->photo->Filename)}}" width="50" height="50" class="rounded-circle" alt="...">
                    @endif
                    <input type="hidden" name="oldfile" value="{{$row->photo->Filename ?? ''}}">

                    <div class="row">
                        <div class="col">
                            <input type="file" accept="image/*" name="filename">
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
