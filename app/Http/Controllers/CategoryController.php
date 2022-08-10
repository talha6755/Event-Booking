<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index()
    {
        $all_categories = Category::all();

        return response()->json([
            "status" => "200",
            "message" => "All Categories",
            "data" => $all_categories,
        ]);

    }

    public function store(Request $request)
    {
        $request->validate([
            "category_name" => "required",
            "thumbnail" => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $thumbnail = '';
        if ($file = $request->file('thumbnail')) {
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('images/categoryTHumbnail', $filename);
            $thumbnail = $filename;
        }

        $insertcategory = Category::create([
            "category_name" => $request->category_name,
            "thumbnail" => $thumbnail,
            "publication_status" => $request->publication_status,
        ]);

       return response()->json([
            "status" => "200",
            "message" => "Catagories Saved Successfully",
        ]);
    }


}
