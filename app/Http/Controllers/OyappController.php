<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OyappRequest;
use App\Models\Diary;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Cloudinary;
use Illuminate\Support\Facades\Storage;

// コントローラーは繋がっているモデルごとに分けた方がやりやすい.

class OyappController extends Controller
{
    //
    public function index(Diary $oyapp,User $user)
    {
        return view("oyapps/index")->with(["oyapps"=>$oyapp->get(),"users"=>$user->get()]);
    }
   public function show(Diary $oyapp)
    {
    return view("oyapps/show")->with(["oyapp"=>$oyapp]);
    }

    public function create()
    {
    return view("oyapps/create");
    }

    public function store(Diary $oyapp ,OyappRequest $request,User $user)
    {
    $input = $request['oyapp'];
    $date = Carbon::now();
    $input["date"] = $date;
    $user_id = Auth::id();
    $input["user_id"] = $user_id;
    
    if($request->file("image_path")){
    $image_path = Cloudinary::upload($request->file("image_path")->getRealPath())->getSecurePath();
    $input += ['image_path' =>$image_path];
    }
    $oyapp->fill($input)->save();
    return redirect('/oyapps/'.$oyapp->id);
    }

    public function edit(Diary $oyapp)
    {
    return view("oyapps/edit")->with(["oyapp"=>$oyapp]);
    }

    public function update(OyappRequest $request,Diary $oyapp)
    {
    $input = $request["oyapp"];
    $date = Carbon::now();
    $input["date"] = $date;
    $image = $request->file("image_path");
    $path=$oyapp->image_path;
    if(isset($image)){
        Storage::disk("public")->delete($path);
        $path = $image->store("oyapp","public");
        
    }
    $oyapp->update([
            "body" =>$input["body"],
            "image_path"=> $path,
            "date"=> $date,
        ]);
    
    return redirect("/oyapps/".$oyapp->id);
    }

    public function delete(Diary $oyapp)
    {
    $oyapp->delete();
    return redirect("/");
    }
    
    
    
    
    public function snapshot_store(Diary $diary,Snapshot $snapshot ,Request $request)
    {
    $request->validate([
            "image_path"=>"required|image",
        ]);    
        
    $input = $request['snapshot'];
    
    $input += ['user_id' => Auth::id()];
    $input += ['diary_id' => $diary->id];
    $image_path = Cloudinary::upload($request->file("image_path")->getRealPath())->getSecurePath();
    $input += ['image_path' =>$image_path];
    
    $snapshot->fill($input)->save();
    return redirect('/oyapps/'.$oyapp->id);
    }
   


}
