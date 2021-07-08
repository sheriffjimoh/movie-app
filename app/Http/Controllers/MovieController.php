<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;
use App\http\Resources\MovieResourceses;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Movie::all();
        if($data){
            return MovieResourceses::collection($data);
        }
    }

    // get movies by category

    public function Bycategory($category_id)
    {
        $data = Movie::where('category_id', $category_id)->get();
       
        if($data){
            return MovieResourceses::collection($data);
        }
    }

        // get movies  by search

        public function Bysearch($search_key)
        {
        $data = Movie::query()
        ->where('title', 'LIKE', "%{$search_key}%") 
        ->orWhere('description', 'LIKE', "%{$search_key}%") 
        ->orWhere('artist', 'LIKE', "%{$search_key}%") 
        ->orWhere('Created_at', 'LIKE', "%{$search_key}%") 
        ->get();

        if($data){
            return MovieResourceses::collection($data);
        }

        }


      public function updateImage(Request $request)
     {
        if($request->hasFile('image')){
            $image_ext = $request->image->extension();
            $allowed_ext = array('png','jpg','jpeg');
            if(!in_array($image_ext, $allowed_ext)){
                return 'only png, jpeg and jpg image are allowed';
            }else{
               $unique= uniqid();
               $new_image_name = trim($request->title).$unique.'.'.$image_ext;
               $request->image->storeAs('public/images', $new_image_name);
            }
          }else{
              return 'image is required';
          }
          $path = Storage::url('images/'.$new_image_name);
  
          $data = Movie::where('id',$request->id)->update([
            'image' => $path
        ]);
  
          if($data){
              return 200;
          }
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request->hasFile('image')){
          $image_ext = $request->image->extension();
          $allowed_ext = array('png','jpg','jpeg');
          if(!in_array($image_ext, $allowed_ext)){
              return 'only png, jpeg and jpg image are allowed';
          }else{

             $unique= uniqid();
             $new_image_name = trim($request->title).$unique.'.'.$image_ext;
             $request->image->storeAs('public/images', $new_image_name);
          }
        }else{
            return 'image is required';
        }
        $path = asset('images/'.$new_image_name);

        $data = Movie::create([
            'title' =>$request->title,
            'description' => $request->description,
            'artist' => $request->artist,
            'category_id' => $request->category,
            'image'=> $path,
        ]);

        if($data){
            return 200;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = Movie::find($id);
        if($data){
            return $data;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update record
  
          $data = Movie::where('id',$id)->update([
              'title' =>$request->title,
              'description' => $request->description,
              'artist' => $request->artist,
              'category_id' => $request->category,
          ]);
  
          if($data){
              return 200;
          }
      

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete data
        $delete = DB::table('movies')->where('id', $id)->delete();
        if ($delete) {
          return 200;
        }
    }
}
