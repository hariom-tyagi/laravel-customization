<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use wapmorgan\Mp3Info\Mp3Info;
use App\Models\Audio;

class AudioController extends Controller {

    function index() {
        return view('admin/audios/index');
    }

    function getAudiosDatatable(Request $request) {
        return DataTables::of(Audio::get())
                        ->addIndexColumn()
                        ->addColumn('action', function($row) {
                            return '<button onclick="playAudio(' . $row['audio_id'] . ')" type="button" class="btn btn-warning btn-md"><i class="fa fa-play"></i></button>'
                                    . '&nbsp;&nbsp;<a href="' . url('/') . '" class="btn btn-primary btn-md"><i class="fa fa-edit"></i></a>'
                                    . '&nbsp;&nbsp;<button class="btn btn-danger btn-md"><i class="fa fa-trash"></i></button>';
                        })
                        ->rawColumns(['action'])
                        ->make(true);
    }

    function audio(Request $request, $audio_id = NULL) {
        if ($request->isMethod('post')) {
            $postArr = $request->except('_token', 'audio_file');
            if (!empty($postArr['audio_id'])) {
                
            } else {
                Audio::insertGetId($postArr);
                return redirect('admin/audios/index');
            }
        }
        return view('admin/audios/audio');
    }

}
