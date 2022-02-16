<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Profile;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function create(){
        return view('profile.create');
    }
    public function store(request $request){
        $data=$request->validate([
            'name'=>'Required',
            'caption'=>'Required',
            'image' => ['Required','image'] ,
        ]);
        $imagePath=request('image')->store('uploads','public');
        $image=Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();
        profile::create(
            [
                'name'=>$data['name'],
                'caption'=>$data['caption'],
                'image'=>$imagePath,
            ]
        );
        return redirect()->route('profile.index');
    }
    public function index(){
        $profile=profile::all();
        return view('profile.index', compact('profile'));
    }
    public function show(profile $profile){
        $profile=profile::find($profile)[0];
        return view('profile.edit',compact('profile'));
    }
    public function update(Request $request,profile $profile){
        $request->validate([
            'name'=>'Required',
            'caption'=>'Required',
            'image' => ['Required','image'] ,
        ]);
        $profile->name = $request->name;
        $profile->caption = $request->caption;
        $imagePath=request('image')->store('uploads','public');
        $profile->image =$imagePath;
        $profile->save();
        return redirect()->route('profile.index');


    }
}

