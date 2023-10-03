<?php

namespace App\Domains\Auth\Http\Controllers\Backend\Files;

use App\Domains\Auth\Http\Requests\Backend\Files\FilesRequest;
use Illuminate\Http\Request;
use App\Domains\Auth\Models\Files;
use App\Domains\Auth\Models\User;
use Illuminate\Support\Facades\DB;
use App\Domains\Auth\Services\PermissionService;

class FilesController
{

    //Per te shfaqur te dhenat ne index Route
    public function index()
    {
        $files = Files::paginate(8);
        return view('backend.auth.files.index',[
            'files' => $files
        ]);
    }

    //Per te krijuar te dhena  te reja
    public function create()
    {
        return view('backend.auth.files.create');
    }

    //per tu ruajtur te dhenat ne databaz
    public function store(FilesRequest $request)
    {
        $files = new Files;
        $files->text = $request->input('text');
        $files->summary = $request->input('summary');
        $files->users = $request->input('users');
        $files->save();
        return redirect()->route('admin.auth.files.index')->withFlashSuccess(__('The file was successfully created.'));
    }


    //per te bere editimin e te dhenave
    public function edit($files_id)
    {
        $files = Files::find($files_id);
        return view('backend.auth.files.edit')->with([
            'files' => $files
        ]);
    }

    public function update(FilesRequest $request, $files_id)
    {
        $files = Files::find($files_id);
        $files->text = $request->input('text');
        $files->summary = $request->input('summary');
        $files->save();

        return redirect()->route('admin.auth.files.index')->withFlashSuccess(__('files Updated'));
    }

    //per te shfaq te dhenat ne databaz
    public function show($files_id)
    {
        $files = Files::find($files_id);
        if ($files) {
            return view('backend.auth.files.show')->with([
                'files' => $files
            ]);
        }
        return redirect()->route('admin.auth.files.index')->withFlashDanger('Failed to find files');
    }

    //per ti fshier te dhenat
    public function destroy($files_id)
    {
        $files = DB::table('files')->where('files_id', $files_id)->delete();
        if($files){
            return redirect()->route('admin.auth.files.index')->withFlashSuccess('file Removed');
        }
        return redirect('/backend.auth.files.index')->withFlashDanger('Fail');
    }
}
