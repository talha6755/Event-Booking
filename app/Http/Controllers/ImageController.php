<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        // $result = $request->file('image')->store('Apidocs');
        // return["result" => $result];
          if ($file = $request->file('thumbnail')) {
          $path = $file->move('/public/files');
          $name = $request->thumbnail->getClientOriginalName();

          //store your file into directory and db
          $save = new Category();
          $save->category_name = $request->category_name;
          $save->thumbnail = $name;
          $save->publication_status= $request->publication_status;
          $save->save();

          return response()->json([
              "success" => true,
              "message" => "File successfully uploaded",
              "data" => $save
          ]);

      }



 // public funtion upload(Request $request)
    // {
    // $insertthumbnail = Category::create([
    //     "thumbnail" => $request->thumbnail,
    //     return $insertthumbnail;
    // ]);

    }


}





    // } // public funtion upload(Request $request)
    // {
    // $insertthumbnail = Category::create([
    //     "thumbnail" => $request->thumbnail,
    //     return $insertthumbnail;
    // ]);


    // }




