{{--Edit--}}
<div class="modal fade" id="edit{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">edit extra :: {{$row->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('extra.update','test')}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <input type="hidden" name="id" value="{{$row->id}}">


                    <div class="row">
                        <div class="col">
                            <label>Name extra AR</label>
                            <input type="text" name="name" class="form-control" value="{{$row->getTranslation('name','ar')}}">
                        </div>

                        <div class="col">
                            <label>Name extra En</label>
                            <input type="text" name="name_en" class="form-control" value="{{$row->getTranslation('name','en')}}">
                        </div>
                    </div>

                    <br>


                    <div class="row">
                        <div class="col">
                            <label>Price Person EG</label>
                            <input type="text" name="price_person_eg" class="form-control" value="{{$row->price_person_eg}}">
                        </div>

                        <div class="col">
                            <label>Price Person EN</label>
                            <input type="text" name="price_person_en" class="form-control" value="{{$row->price_person_en}}">
                        </div>

                        <div class="col">
                            <label>Price Group</label>
                            <input type="text" name="price_group" class="form-control" value="{{$row->price_group}}">
                        </div>


                        <div class="col">
                            <label>Price Group EG</label>
                            <input type="text" name="price_group_eg" class="form-control" value="{{$row->price_group_eg}}">
                        </div>

                        <div class="col">
                            <label>Price Group EN</label>
                            <input type="text" name="price_group_en" class="form-control" value="{{$row->price_group_en}}">
                        </div>




                        <div class="col">
                            <label>Number Group</label>
                            <input type="text" name="number_group" class="form-control" value="{{$row->number_group}}">
                        </div>

                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>icon</label>
                            <input type="text" name="icon" value="{{$row->icon}}" class="form-control @error('icon') is-invalid @enderror">
                        </div>
                    </div>

                    <br>

                    
                    <div class="row">
                        <div class="col">
                            <label>Notes AR</label>
                            <textarea class="form-control" rows="5" name="notes" id="elm1">
                                {{$row->getTranslation('notes','ar')}}
                            </textarea>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>Notes EN</label>
                            <textarea class="form-control" rows="5" name="notes_en" id="elm1">
                                {{$row->getTranslation('notes','en')}}
                            </textarea>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
