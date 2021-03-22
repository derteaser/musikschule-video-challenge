<?php


namespace App\Http\Controllers;


use App\Models\Video;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;


class VideoController extends Controller {

    public static function create(string $id, string $filename): ?View {
        $video = Video::create(['name' => $filename, 'cloudinary_public_id' => $id, 'description' => '', 'user_id' => Auth::user()->id]);
        return view('video', ['video' => $video, 'edit' => true]);
    }
}
