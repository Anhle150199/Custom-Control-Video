<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Album;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $video = Video::join('album', 'album.id', '=', 'video.album_id')->where('video.user_id', Auth::user()->id)->select('video.*', 'album.name')->get();
        $albums = Album::where('user_id', Auth::user()->id)->get();
        // return $video;
        return view('home', ['video' => $video, 'albums' => $albums]);
    }

    public function show($id)
    {
        $video = Video::find($id);
        $albums = Album::where('user_id', Auth::user()->id)->get();
        return view('show', ['video' => $video, 'albums' => $albums]);
    }

    public function getUpload()
    {
        $albums = Album::where('user_id', Auth::user()->id)->get();
        return view('upload',  ['albums' => $albums]);
    }

    public function postUpload(Request $request)
    {
        $video = new Video;
        $video->title = $request->title;
        $video->summary = $request->summary;
        $video->album_id = $request->album;
        $video->user_id = Auth::user()->id;
        $video->created_at = date("Y-m-d H:i:s");
        $video->updated_at = date("Y-m-d H:i:s");
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $vid = $file->getClientOriginalName();
            $sizeVideo = filesize($file) / 1048576;
            $sizeVideo = round($sizeVideo, 1, PHP_ROUND_HALF_EVEN);
            while (file_exists("public/videos/" . $vid)) {
                $vid = Str::random(5) . "_" . $vid;
            }
            $file->move("videos", $vid);
            $video->video = $vid;
            $video->size = $sizeVideo;
        } else {
            $video->video = '';
            $video->size = 0;
        }
        $video->save();
        $album = Album::find($video->album_id);
        $album->count_file  += 1;
        $album->size += $video->size;
        $album->save();
        return redirect()->route('show.video', ['id' => $video->id]);
    }

    public function getEditVideo($id)
    {
        $video = Video::find($id);
        $albums = Album::where('user_id', Auth::user()->id)->get();
        return view('video_edit', ['video' => $video, 'albums' => $albums]);
    }
    public function postEditVideo(Request $request)
    {
        $video = Video::find($request->id);
        $albums = Album::where('user_id', Auth::user()->id)->get();
        $video->title = $request->title;
        $video->summary = $request->summary;
        $video->album_id = $request->album;
        $video->updated_at = date("Y-m-d H:i:s");
        $video->save();
        return redirect()->route('edit.video', ['id' => $video->id]);
    }

    public function getCreateAlbum()
    {
        $albums = Album::where('user_id', Auth::user()->id)->get();
        return view('create_album',  ['albums' => $albums]);
    }

    public function postCreateAlbum(Request $request)
    {
        $album = new Album;
        $album->name = $request->name;
        $album->user_id = Auth::user()->id;
        $album->created_at = date("Y-m-d H:i:s");
        $album->updated_at = date("Y-m-d H:i:s");
        $album->save();
        return redirect()->route('list.album')->with('session', 'Created ' . $album->name);
    }

    public function getListAlbum()
    {
        $albums = Album::where('user_id', Auth::user()->id)->get();
        return view('album_list',  ['albums' => $albums]);
    }

    public function videoAlbum($id)
    {
        $albums = Album::where('user_id', Auth::user()->id)->get();
        $album = Album::find($id);
        $video = Video::where('user_id', Auth::user()->id)->where('album_id', $album->id)->get();
        return view('video_album', ['albums' => $albums, 'video' => $video, 'album' => $album]);
    }

    public function getEditAlbum($id)
    {
        $album = Album::find($id);
        $albums = Album::where('user_id', Auth::user()->id)->get();
        return view('album_edit',  ['albums' => $albums, 'album' => $album]);
    }

    public function postEditAlbum(Request $request)
    {
        $album = Album::find($request->id);
        $album->name = $request->name;
        $album->updated_at = date("Y-m-d H:i:s");
        $album->save();
        return redirect()->back();
    }

    public function deleteAlbum($id)
    {
        $album = Album::find($id);
        $name = $album->name;
        $video = Video::where('album_id', $id)->get();
        foreach ($video as $video) {
            $file_path = "videos/" . $video->video;
            FILE::delete($file_path);
            $video->delete();
        }
        $album->delete();
        return redirect()->route('list.album')->with('session', 'Deleted ' . $name);
    }
    public function deleteVideo($id)
    {
        $video = Video::find($id);
        $name = $video->title;

        $file_path = "videos/" . $video->video;
        FILE::delete($file_path);

        $album = Album::find($video->album_id);
        $album->count_file  -= 1;
        $album->size -= $video->size;

        $album->save();
        $video->delete();
        return redirect()->back()->with('session', 'Deleted ' . $name);
    }

    public function getProfile($id)
    {
        $user = User::find($id);
        $users = User::all();
        $albums = Album::where('user_id', Auth::user()->id)->get();
        return view('profile',  ['albums' => $albums, 'user' => $user, 'users' => $users]);
    }
    public function postEditProfile(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->updated_at = date("Y-m-d H:i:s");
        $user->save();
        return redirect()->back();
    }
    public function changePassword(Request $request)
    {
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->updated_at = date("Y-m-d H:i:s");
        $user->save();
        return redirect()->back();
    }
}
