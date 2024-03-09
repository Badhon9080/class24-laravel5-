<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function category(){
      //dd('testing');

       $categorys = Category::latest()->paginate(2);
     //dd($categorys);
      return view('backend.category.index', compact('categorys'));
     }



   // StoRe data.
       public function categoryInsert(Request $request){
        $categoryStore = new Category();
        $categoryStore->category = $request->category;
        $categoryStore->category_slug = Str::slug($request->category);
        $categoryStore->save();
        return back();
        }


        // edit
        public function categoryEdit($id){
            $categorys = Category::latest()->get();
            $findCategory = Category::find($id);
            //dd($findCategory);
            return view('backend.category.index', compact('categorys', 'findCategory'));
        }



        // update
        public function categoryUpdate(Request $request, $id){
             $updateCategory = Category::find($id);
             $updateCategory->category = $request->category;
             $updateCategory->category_slug = Str::slug($request->category);
             $updateCategory->save(); return back();
           //  dd($updateCategory);
        }

        // delete
        public function categoryDelete($id){
           Category::find($id)->delete( );
           return back();
        }
     }
