@extends('admin.layout.master')
@section('title', 'Pre Language')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">Pre Language</h4>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end page-title-box -->
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-header">

                    
                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add New Pre Language
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Pre Language</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{route('store_prelang')}}" method="post">
              @csrf
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Name En</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Name ar</label>
                        <input type="text" class="form-control" name="name_ar">
                    </div>
                </div>
            </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
        </form>
      </div>

  </div>
</div>
</div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap text-center"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($prelangs as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->name}}</td>
                                <td>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$row->id}}">
  <i class="fa fa-edit"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
      </div>
      <div class="modal-body">
        <form action="{{route('update_prelang',$row->id)}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Name En</label>
                        <input type="text" class="form-control" name="name" value="{{$row->name}}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Name ar</label>
                        <input type="text" class="form-control" name="name_ar" value="{{$row->getTranslation('name','ar')}}">
                    </div>
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


                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#deleted{{$row->id}}"><i class="fa fa-trash"></i></button>

                                </td>
                                @include('admin.pre.deleted')

                            </tr>
                            <!-- Modal -->
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@section('js')
@endsection
