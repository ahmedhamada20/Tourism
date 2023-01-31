<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dates;
use App\Models\Day;
use App\Models\Destenation;
use App\Models\Excluded;
use App\Models\Extra;
use App\Models\Included;
use App\Models\Photo;
use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TripsController extends Controller
{
    protected $data = [
        'folder' => 'admin.',
        'Models' => 'App\Models\Trips',
        'route' => 'trips',
        'folderBlade' => 'trips',
        'folderImage' => 'trips',
        'fileName' => 'trips'
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
            'days' => Day::all(),
            'transfers' => Transfer::all(),
            'destinations' => Destenation::all(),
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

        if ($request->duplication == 6) {

            $data = $this->data['Models']::findorfail($request->id);

            $duplication = $this->data['Models']::create([
                'name' => ['ar' => $data->getTranslation('name', 'ar'), 'en' => $data->getTranslation('name', 'en')],
                'notes' => ['ar' => $data->getTranslation('notes', 'ar'), 'en' => $data->getTranslation('notes', 'en')],
                'price_adult_EG' => $data->price_adult_EG,
                'price_child_EG' => $data->price_child_EG,
                'price_adult_EN' => $data->price_adult_EN,
                'price_child_EN' => $data->price_child_EN,
                'destination_id' => $data->destination_id,
                'trips_type_id' => $data->trips_type_id,
                'transfer_id' => $data->transfer_id,
                'rate' => $data->rate,
            ]);

            $duplication->extras()->syncWithoutDetaching($data->extras);
            $duplication->days()->syncWithoutDetaching($data->days);


            toastr()->success('Done duplication Successfully');
            return redirect('admin/' . $this->data['route']);
        }


        DB::beginTransaction();
        try {
            $data = $this->data['Models']::create([
                'name' => ['ar' => $request->name, 'en' => $request->name_en],
                'notes' => ['ar' => $request->notes, 'en' => $request->notes_en],
                'price_adult_EG' => $request->price_adult_EG,
                'price_child_EG' => $request->price_child_EG,
                'price_adult_EN' => $request->price_adult_EN,
                'price_child_EN' => $request->price_child_EN,
                'destination_id' => $request->destination_id,
                'trips_type_id' => $request->trips_type_id,
                'transfer_id' => $request->transfer_id,
                'rate' => $request->rate,
            ]);
            $data->extras()->attach($request->extra_id);
            $data->days()->attach($request->day_id);


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
            'days' => Day::all(),
            'transfers' => Transfer::all(),
            'destinations' => Destenation::all(),
        ];

        return view($this->data['folder'] . $this->data['folderBlade'] . '.show', $data);
    }

    public function edit($id)
    {
        $data = [
            'data' => $this->data['Models']::findorfail(decrypt($id)),
            'extras' => Extra::all(),
            'days' => Day::all(),
            'transfers' => Transfer::all(),
            'destinations' => Destenation::all(),
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
                'price_adult_EG' => $request->price_adult_EG,
                'price_child_EG' => $request->price_child_EG,
                'price_adult_EN' => $request->price_adult_EN,
                'price_child_EN' => $request->price_child_EN,
                'destination_id' => $request->destination_id,
                'transfer_id' => $request->transfer_id,
                'trips_type_id' => $request->trips_type_id,
                'rate' => $request->rate,

            ]);

            if (isset($request->extra_id)) {
                $data->extras()->sync($request->extra_id);
            } else {
                $data->extras()->sync(array());
            }


            if (isset($request->day_id)) {
                $data->days()->sync($request->day_id);
            } else {
                $data->dates()->sync(array());
            }

            // Update One Photo
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
