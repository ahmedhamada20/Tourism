{{--Included--}}
<div class="modal fade" id="edit{{$row->id}}"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">moreDetails trips :: {{$trips->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('moreDetails.update','moreDetails')}}" method="post" enctype="multipart/form-data">
                  @method('PUT')
                    @csrf

                    <input type="hidden" name="trips_id" value="{{$row->trip_id}}">
                    <input type="hidden" name="id" value="{{$row->id}}">


                    <div class="row">
                        <div class="col">
                            <label> Please Note AR</label>
                            <textarea rows="5" name="notes" class="form-control" >
                                {{$row->getTranslation('notes','ar')}}
                            </textarea>
                        </div>

                        <div class="col">
                            <label> Please Note En</label>
                            <textarea rows="5" name="notes_en" class="form-control" >
                                {{$row->getTranslation('notes','en')}}
                            </textarea>
                        </div>
                    </div>

                    <br>

                    
                    <div class="row">
                        <div class="col">
                            <label> Cancellation Policy AR</label>
                            <textarea rows="5" name="Cancellation" class="form-control">
                                {{$row->getTranslation('Cancellation','ar')}}
                            </textarea>
                        </div>

                        <div class="col">
                            <label> Cancellation Policy En</label>
                            <textarea rows="5" name="Cancellation_en" class="form-control">
                                {{$row->getTranslation('Cancellation','en')}}
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
