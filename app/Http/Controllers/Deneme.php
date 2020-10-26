<?php

namespace App\Http\Controllers;
use App\Images;
use App\Product;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function GuzzleHttp\Promise\all;

class Deneme extends Controller
{
    public function fileUpload(Request $request){
        if ($request->hasFile('file')) {
            $name = rand(0,100).time().rand(0,100)."_".$request->file('file')->getClientOriginalName();
            $test = false;
            while (!$test){
                $data = new Images();
                $data->file_name = $name;
                $data->image_url = rand(0,10000).time().rand(0,10000);
                $test = $data->saveOrFail();
            }
            Storage::putFileAs('public', $request->file, $name);
            return response()->json( "success ",'200');
        }
        return response()->json( "failed",'500');
    }
    public function downloadImage(Request $request){
        $data = Images::where('image_url',$request->url)->first();
        $name = substr($data->file_name,26,strlen($data->file_name));
        return response()->download(public_path('storage/'.$data->file_name),$name);
    }
    public function getAllImages(){
        $data = Images::all();
        return response()->json($data,'200');
    }

}
