<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    protected $data = [
        'folder' => 'admin.',
        'Models' => 'App\Models\AboutUs',
        'route' => 'aboutUs',
        'folderBlade' => 'aboutUs',
        'folderImage' => 'aboutUs',
        'fileName' => 'test'
    ];

    public function index()
    {
        $data = [
            'data' => $this->data['Models']::first(),
        ];
        return view($this->data['folder'] . $this->data['folderBlade'] . '.index', $data);
    }


    public function create()
    {
        return view($this->data['folder'] . $this->data['folderBlade'] . '.create');
    }


    public function show($id)
    {
        $data = [
            'data' => $this->data['Models']::findorfail($id),
        ];
        return view($this->data['folder'] . $this->data['folderBlade'] . '.show', $data);
    }

    public function edit($id)
    {
        $data = [
            'data' => $this->data['Models']::findorfail($id),
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
                'icon_1' => $request->icon_1,
                'title_1' => ['ar' => $request->title_1, 'en' => $request->title_1_en],
                'icon_2' => $request->icon_2,
                'title_2' => ['ar' => $request->title_2, 'en' => $request->title_2_en],
                'icon_3' => $request->icon_3,
                'title_3' => ['ar' => $request->title_3, 'en' => $request->title_3_en],
                'icon_4' => $request->icon_4,
                'title_4' => ['ar' => $request->title_4, 'en' => $request->title_4_en],
                'icon_5' => $request->icon_5,
                'title_5' => ['ar' => $request->title_5, 'en' => $request->title_5_en],
                'icon_6' => $request->icon_6,
                'title_6' => ['ar' => $request->title_6, 'en' => $request->title_6_en],
                'name_chooseUs' => ['ar' => $request->name_chooseUs, 'en' => $request->name_chooseUs_en],
                'notes_chooseUs' => ['ar' => $request->notes_chooseUs, 'en' => $request->notes_chooseUs_en],
                'video' => $request->video,
            ]);

            // Update One Photo

            // Update One Photo
            if ($file = $request->file('filename')) {
                File::delete(public_path('admin/pictures/' . $this->data['folderImage'] . '/' . $request->id . '/' . $request->oldfile));
                $file_name = $file->getClientOriginalName();
                $file_name_Extension = $request->file('filename')->getClientOriginalExtension();
                $file_to_store = time() . '_' . explode('.', $file_name)[0] . '_.' . $file_name_Extension;
                if ($file->move('admin/pictures/' . $this->data['folderImage'] . '/' . $request->id, $file_to_store)) {
                    Photo::updateOrCreate([
                        'photoable_id' => $request->id,
                        'photoable_type' => $this->data['Models'],
                    ], [
                        'Filename' => $file_to_store,
                        'photoable_id' => $data->id,
                        'photoable_type' => $this->data['Models'],
                    ]);
                }
            }

            DB::commit();
            toastr()->success('Done Updated Successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
        try {
            $this->data['Models']::destroy($request->id);
            if ($request->oldfile) {
                Storage::disk('public_download')->deleteDirectory($this->data['folderImage'] . '/' . $request->id);
                Photo::where('photoable_id', $request->id)->where('photoable_type', $this->data['Models'])->delete();
            }
            toastr()->error('done deleted Successfully');
            return redirect('admin/' . $this->data['route']);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
