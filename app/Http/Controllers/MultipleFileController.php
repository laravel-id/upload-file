<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\File;
use Carbon\Carbon;

class MultipleFileController extends Controller
{

    /**
     * Show form for upload multiple files.
     * 
     * @return View
     */
    public function form(): View
    {
        return view('multiple.form');
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'files.*' => 'required|max:1000'
        ]);

        $files = [];
        foreach ($request->file('files') as $file) {
            if ($file->isValid()) {
                $path = $file->store('public/files');

                // save information to variable
                // next will be saved to database
                $files[] = [
                    'title' => $file->getClientOriginalName(),
                    'filename' => $path,
                    'created_at' => $now = Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => $now,
                ];
            }
        }

        File::insert($files);

        return redirect()
            ->back()
            ->withSuccess(sprintf('Total %s berkas berhasil diunggah.', count($files)));
    }
}
