<?php

namespace App\Http\Controllers\Frontend\User;

use App\Domains\Auth\Http\Requests\Backend\Files\FilesRequest;
use Illuminate\Http\Request;
use App\Models\Files;
use App\Domains\Auth\Models\User;
use Illuminate\Support\Facades\DB;
use App\Domains\Auth\Services\PermissionService;

class FilesController
{
    public function store(FilesRequest $request)
    {
        $files = new Files;
        $files->text = $request->input('text');
        $files->summary = $request->input('summary');
        $files->save();
        return view('summarize',['files' => $files]);
    }

}
