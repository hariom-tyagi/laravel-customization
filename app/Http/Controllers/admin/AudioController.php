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
                            return '<button onclick="playAudio(' . $row['audio_id'] . ',\'' . $row['file_name'] . '\',\'' . $row['name'] . '\')" type="button" class="btn btn-warning btn-md"><i class="fa fa-play"></i></button>'
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

                $audio_id = Audio::insertGetId($postArr);
                if ($request->hasFile('audio_file')) {
                    $file_name = $request->audio_file->getClientOriginalName();
                    $request->audio_file->move("uploads/audios/$audio_id", $file_name);
                    $audioFileDetailArr = new Mp3Info(public_path("uploads/audios/$audio_id/$file_name"));
                    Audio::where([['audio_id', '=', $audio_id]])->update(['file_name' => $file_name, 'duration' => gmdate("H:i:s", $audioFileDetailArr->duration), 'size' => $this->formatBytes($audioFileDetailArr->audioSize)]);
                }
                return redirect('admin/audios/index');
            }
        }
        return view('admin/audios/audio');
    }

    function formatBytes($size, $precision = 2) {
        $base = log($size, 1024);
        $suffixes = array('', 'K', '', 'G', 'T');
        return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
    }

}
