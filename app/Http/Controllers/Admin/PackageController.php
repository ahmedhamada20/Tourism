<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dates;
use App\Models\Extra;
use App\Models\Photo;
use App\Models\Transfer;
use App\Models\Trips;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    protected $data = [
        'folder' => 'admin.',
        'Models' => 'App\Models\Package',
        'route' => 'package',
        'folderBlade' => 'package',
        'folderImage' => 'package',
        'fileName' => 'package'
    ];

    public function index()
    {
        $data = [
            'data' => $this->data['Models']::all(),
        ];
        return view($this->data['folder'] . $this->data['folderBlade'] . '.index', $data);
    }


    public function create()
    {
        $data = [
            'extras' => Extra::all(),
            'dates' => Dates::all(),
            'trips' => Trips::all(),
            'transfers' => Transfer::all(),
        ];
        return view($this->data['folder'] . $this->data['folderBlade'] . '.create', $data);
    }


    public function store(Request $request)
    {
        // Insert Many Photos
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
                'price' => $data->price,
                'rate' => $data->rate,
                'before_price' => $data->before_price,
                'price_adult_EG' => $data->price_adult_EG,
                'price_child_EG' => $data->price_child_EG,
                'price_adult_EN' => $data->price_adult_EN,
                'price_child_EN' => $data->price_child_EN,
            
            ]);

            // duplication Many To many extras
            $duplication->extras()->syncWithoutDetaching($data->extras);

            // duplication Many To many dates
            $duplication->dates()->syncWithoutDetaching($data->dates);

            // duplication Many To many trips
            $duplication->trips()->syncWithoutDetaching($data->trips);

            // duplication Many To many transfers
            $duplication->transfers()->syncWithoutDetaching($data->transfers);


            toastr()->success('Done duplication Successfully');
            return redirect('admin/' . $this->data['route']);
        }




        DB::beginTransaction();
        try {
            $data = $this->data['Models']::create([
                'name' => ['ar' => $request->name, 'en' => $request->name_en],
                'notes' => ['ar' => $request->notes, 'en' => $request->notes_en],
                'price' => $request->price,
                'rate' => $request->rate,
                'before_price' => $request->before_price,
                'price_adult_EG' => $request->price_adult_EG,
                'price_child_EG' => $request->price_child_EG,
                'price_adult_EN' => $request->price_adult_EN,
                'price_child_EN' => $request->price_child_EN,
            
            ]);

            // Save Many To many extras
            $data->extras()->attach($request->extras_id);

            // Save Many To many dates
            $data->dates()->attach($request->dates_id);

            // Save Many To many trips
            $data->trips()->attach($request->trips_id);

            // Save Many To many transfers
            $data->transfers()->attach($request->transfers_id);


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
            'dates' => Dates::all(),
            'trips' => Trips::all(),
            'transfers' => Transfer::all(),
        ];
        return view($this->data['folder'] . $this->data['folderBlade'] . '.show', $data);
    }

    public function edit($id)
    {
        $data = [
            'data' => $this->data['Models']::findorfail(decrypt($id)),
            'extras' => Extra::all(),
            'dates' => Dates::all(),
            'trips' => Trips::all(),
            'transfers' => Transfer::all(),
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
                'price' => $request->price,
                'rate' => $request->rate,
                'before_price' => $request->before_price,
                'price_adult_EG' => $request->price_adult_EG,
                'price_child_EG' => $request->price_child_EG,
                'price_adult_EN' => $request->price_adult_EN,
                'price_child_EN' => $request->price_child_EN,
            
            ]);

            // Edit Many To Many extras
            if (isset($request->extras_id)) {
                $data->extras()->sync($request->extras_id);
            } else {
                $data->extras()->sync(array());
            }

            // Edit Many To Many dates
            if (isset($request->dates_id)) {
                $data->dates()->sync($request->dates_id);
            } else {
                $data->dates()->sync(array());
            }

            // Edit Many To Many trips
            if (isset($request->trips_id)) {
                $data->trips()->sync($request->trips_id);
            } else {
                $data->trips()->sync(array());
            }

            // Edit Many To Many transfers
            if (isset($request->transfers_id)) {
                $data->transfers()->sync($request->transfers_id);
            } else {
                $data->transfers()->sync(array());
            }


            DB::commit();
            toastr()->success('Done Created Successfully');
            return redirect('admin/' . $this->data['route']);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
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
