<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destenation;
use App\Models\Extra;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TransferController extends Controller
{
    protected $data = [
        'folder' => 'admin.',
        'Models' => 'App\Models\Transfer',
        'route' => 'transfer',
        'folderBlade' => 'transfer',
        'folderImage' => 'transfer',
        'fileName' => 'transfer'
    ];

    public function index()
    {
        $data = [
            'data' => $this->data['Models']::paginate(50),

        ];
        return view($this->data['folder'] . $this->data['folderBlade'] . '.index', $data);
    }


    public function create()
    {
        $data = [
            'extras' => Extra::all(),
            'destenations' => Destenation::all(),
        ];
        return view($this->data['folder'] . $this->data['folderBlade'] . '.create', $data);
    }


    public function store(Request $request)
    {


        if ($request->page_id == 3) {
            // Insert Many Photos
            if ($request->hasfile('FilenameMany')) {
                foreach ($request->file('FilenameMany') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->move('admin/pictures/' . '/' . $this->data['folderImage'] . '/' . $request->id_photos, $file->getClientOriginalName());

                    // Inset Date
                    Photo::create([
                        'Filename' => $name,
                        'photoable_id' => $request->id_photos,
                        'photoable_type' => $this->data['Models'],
                    ]);
                }
            }

            toastr()->success('Done Created Photos Successfully');
            return redirect()->back();
        }

        if ($request->duplication == 6){

            $data = $this->data['Models']::findorfail($request->id);

    

            $duplication = $this->data['Models']::create([
                'name' => ['ar' => $data->getTranslation('name','ar'), 'en' => $data->getTranslation('name','en')],
                'notes' => ['ar' => $data->getTranslation('notes','ar'), 'en' =>$data->getTranslation('notes','en')],
                'type' => $data->type,
                'start_date' => $data->start_date,
                'end_date' => $data->end_date,
                'route_form' =>   ['ar' => $data->getTranslation('route_form','ar'), 'en' => $data->getTranslation('route_form','en')],
                'route_to' =>    ['ar' => $data->getTranslation('route_to','ar'), 'en' => $data->getTranslation('route_to','en')],
                'price_EG' => $data->price_EG,
                'price_EN' => $data->price_EN,
                'price_EG_go' => $data->price_EG_go,
                'price_EN_back' => $data->price_EN_back,
                'destenation_id' => $data->destenation_id,
                'rate' => $data->rate,
                'car_name' => $data->car_name,
                'car_type' => $data->car_type,
                'car_model' => $data->car_model,
            ]);

            $duplication->extras()->syncWithoutDetaching($data->extras);



            toastr()->success('Done duplication Successfully');
            return redirect('admin/' . $this->data['route']);
        }

        DB::beginTransaction();
        try {
            $data = $this->data['Models']::create([
                'name' => ['ar' => $request->name, 'en' => $request->name_en],
                'notes' => ['ar' => $request->notes, 'en' => $request->notes_en],
                'type' => $request->type,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'route_form' => ['ar' => $request->route_form, 'en' => $request->route_form_en],
                'route_to' => ['ar' => $request->route_to, 'en' =>  $request->route_to_en],
                'price_EG' => $request->price_EG,
                'price_EN' => $request->price_EN,
                'price_EG_go' => $request->price_EG_go,
                'price_EN_back' => $request->price_EN_back,
                'destenation_id' => $request->destenation_id,
                'rate' => $request->rate,
                'car_name' => $request->car_name,
                'car_type' => $request->car_type,
                'car_model' => $request->car_model,
            ]);

            $data->extras()->attach($request->extra_id);


            // Insert Many Photos
            if ($request->hasfile('FilenameMany')) {
                foreach ($request->file('FilenameMany') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->move('admin/pictures/' . '/' . $this->data['folderImage'] . '/' . $data->id, $file->getClientOriginalName());

                    // Inset Date
                    Photo::create([
                        'Filename' => $name,
                        'photoable_id' => $data->id,
                        'photoable_type' => $this->data['Models'],
                    ]);
                }
            }
            DB::commit();
            toastr()->success('Done Created Successfully');
            return redirect('admin/' . $this->data['route']);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function show($id)
    {
        $data = [
            'data' => $this->data['Models']::findorfail(decrypt($id)),
            'extras' => Extra::all(),
            'destenations' => Destenation::all(),
        ];
        return view($this->data['folder'] . $this->data['folderBlade'] . '.show', $data);
    }

    public function edit($id)
    {
        $data = [
            'data' => $this->data['Models']::findorfail(decrypt($id)),
            'extras' => Extra::all(),
            'destenations' => Destenation::all(),
        ];
        return view($this->data['folder'] . $this->data['folderBlade'] . '.edit', $data);
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = $this->data['Models']::findorfail($request->id);
            $data->update([
                'name' => ['ar' => $request->name, 'en' => $request->name_en],
                'notes' => ['ar' => $request->notes, 'en' => $request->notes_en],
                'type' => $request->type,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'route_form' => ['ar' => $request->route_form, 'en' => $request->route_form_en],
                'route_to' => ['ar' => $request->route_to, 'en' =>  $request->route_to_en],
                'price_EG' => $request->price_EG,
                'price_EN' => $request->price_EN,
                'price_EG_go' => $request->price_EG_go,
                'price_EN_back' => $request->price_EN_back,
                'destenation_id' => $data->destenation_id,
                'rate' => $request->rate,
                'car_name' => $request->car_name,
                'car_type' => $request->car_type,
                'car_model' => $request->car_model,
            ]);


            if (isset($request->extra_id)) {
                $data->extras()->sync($request->extra_id);
            } else {
                $data->extras()->sync(array());
            }

            // Update One Photo
            DB::commit();
            toastr()->success('Done Updated Successfully');
            return redirect('admin/' . $this->data['route']);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
//        dd($request->all());

        try {
            if ($request->page_id == 3) {
                File::delete(public_path('admin/pictures/' . $this->data['folderImage'] . '/' . $request->id . '/' . $request->oldfile));
                Photo::where('id', $request->id_photos)->where('photoable_type', $this->data['Models'])->delete();
                toastr()->error('done deleted Successfully');
                return redirect()->back();
            } else {
                $this->data['Models']::destroy($request->id);
                if ($request->oldfile) {
                    Storage::disk('public_download')->deleteDirectory($this->data['folderImage'] . '/' . $request->id);
                    Photo::where('photoable_id', $request->id)->where('photoable_type', $this->data['Models'])->delete();
                }
                toastr()->error('done deleted Successfully');
                return redirect('admin/' . $this->data['route']);
            }


        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
