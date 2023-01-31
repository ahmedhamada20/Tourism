@extends('admin.layout.master')
@section('title', 'setting')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">setting</h4>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end page-title-box -->
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('setting.update','test')}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <input type="hidden" name="id" value="{{$data->id}}">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="logo">
                                    <label class="custom-file-label" for="customFile">Choose logo</label>
                                </div>
                                <img  src="{{asset('upload/setting/'.$data->logo)}}" alt="" style="width: 100%; height: 100px;margin-bottom: 20px;margin-top: 10px;background-color: #0b2e13">
                            </div>
                            
                            
                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="image_transfer">
                                    <label class="custom-file-label" for="customFile">image transfer</label>
                                </div>
                                <img  src="{{asset('upload/image_transfer/'.$data->image_transfer)}}" alt="" style="width: 100%; height: 100px;margin-bottom: 20px;margin-top: 10px;background-color: #0b2e13">
                            </div>
                            
                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="image_home">
                                    <label class="custom-file-label" for="customFile">image home</label>
                                </div>
                                <img  src="{{asset('upload/image_home/'.$data->image_home)}}" alt="" style="width: 100%; height: 100px;margin-bottom: 20px;margin-top: 10px;background-color: #0b2e13">
                            </div>

                            <div class="col">
                                <label>name AR</label>
                                <input type="text" name="name" class="form-control" value="{{$data->getTranslation('name','ar')}}">
                            </div>

                            <div class="col">
                                <label>name EN</label>
                                <input type="text" name="name_en" class="form-control" value="{{$data->getTranslation('name','en')}}">
                            </div>


                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>phone</label>
                                <input type="text" name="phone" value="{{$data->phone}}" class="form-control">
                            </div>

                            <div class="col">
                                <label>Fax</label>
                                <input type="text" name="Fax" value="{{$data->Fax}}" class="form-control">
                            </div>

                            <div class="col">
                                <label>url</label>
                                <input type="text" name="url" value="{{$data->url}}" class="form-control">
                            </div>

                            <div class="col">
                                <label>email</label>
                                <input type="email" name="email" value="{{$data->email}}" class="form-control">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>address</label>
                                <input type="text" name="address" value="{{$data->address}}" class="form-control">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>facebook</label>
                                <input type="url" name="facebook" value="{{$data->facebook}}" class="form-control">
                            </div>


                            <div class="col">
                                <label>twitter</label>
                                <input type="url" name="twitter" value="{{$data->twitter}}" class="form-control">
                            </div>


                            <div class="col">
                                <label>instagram</label>
                                <input type="url" name="instagram" value="{{$data->instagram}}" class="form-control">
                            </div>

                            <div class="col">
                                <label>YouTube</label>
                                <input type="url" name="YouTube" value="{{$data->YouTube}}" class="form-control">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>Meta TAG</label>
                                <!--  <select class="form-control" name="seo[]" required multiple="multiple">-->
                                      <!--<option value="" selected>{{implode("[",[$data->seo]) ?? ''}}</option>-->
                                <!--</select>-->
                                <input type="text" name="seo" class="form-control form-control" value="{{$data->seo ?? ''}}" id="QRY_Owner"/>
                            </div>
                            
                             <div class="col">
                                <label>Meta Dicraption</label>
                              <textarea class="form-control" name="meta_dic" rows="2">
                                  {{$data->meta_dic ?? ''}}
                              </textarea>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col">
                                <label>notes AR</label>
                                <textarea class="form-control" name="notes" rows="5" id="elm1">
                                 {{$data->getTranslation('notes','ar')}}
                                </textarea>
                            </div>
                        </div>

                        <br>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>notes EN</label>
                                <textarea class="form-control" name="notes_en" rows="5" id="elm1">
                                 {{$data->getTranslation('notes','en')}}
                                </textarea>
                            </div>
                        </div>

                        <br>

                         <div class="row">
                            <div class="col">
                                <label>Transfer More Info AR</label>
                                <textarea class="form-control" name="description" rows="5" id="elm1">
                                        {{$data->getTranslation('description','ar')}}
                                </textarea>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>Transfer More Info EN</label>
                                <textarea class="form-control" name="description_en" rows="5" id="elm1">
                                    {{$data->getTranslation('description','en')}}
                                </textarea>
                            </div>
                        </div>
                        
                        <br>



                        @if($data->photo)
                            <img src="{{asset('admin/pictures/setting/' . $data->id .'/' .$data->photo->Filename)}}" width="50" height="50" alt="">
                        @endif

                        <div class="row">
                            <div class="col">
                                <label for="">Tours Details Page Cover</label><br>
                                <input type="file" name="filename" accept="image/*">
                            </div>
                        </div>
   
                        <br>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success">Update</button>
                            </div>
                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src='https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js'></script>

   <script>
// $(".js-example-tokenizer").select2({
//     tags: true,
//     tokenSeparators: [',', ' ']
// });

 $("#QRY_Owner").select2({
                placeholder: "Owner ID",
                tags: [],
                tokenSeparators: [",", " ", ";"],
                maximumInputLength: 12,
                selectOnBlur: true,
                dropdownCssClass: "hiddenSelect2DropDown"
            });
   </script>


    <script>
        $(function () {
            $('input').on('change', function (event) {

                var $element = $(event.target);
                var $container = $element.closest('.example');

                if (!$element.data('tagsinput'))
                    return;

                var val = $element.val();
                if (val === null)
                    val = "null";
                var items = $element.tagsinput('items');

                $('code', $('pre.val', $container)).html(($.isArray(val) ? JSON.stringify(val) : "\"" + val.replace('"', '\\"') + "\""));
                $('code', $('pre.items', $container)).html(JSON.stringify($element.tagsinput('items')));


            }).trigger('change');
        });
    </script>
@endsection
