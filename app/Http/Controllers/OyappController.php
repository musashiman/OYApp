<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OyappRequest;
use App\Models\Diary;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Cloudinary;

class OyappController extends Controller
{
    //
    public function index(Diary $oyapp)
    {
        return view("oyapps/index")->with(["oyapps"=>$oyapp->get()]);
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
    // この辺で詰まってる。ユーザーidをそのまま表示できるように改良したい。
    // $user = Auth::user();
    // $users_id = $user->id;
    // $input["users_id"] = $users_id;
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
    $input_post = $request["oyapp"];
    $oyapp->fill($input_post)->save();
    return redirect("/oyapps/" .$oyapp->id);
    }

    public function delete(Diary $oyapp)
    {
    $oyapp->delete();
    return redirect("/");
    }


}
