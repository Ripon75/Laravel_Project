<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class helloController extends Controller
{
    public function aboutView(){
        return view('about');
    }
    public function contactView(){
        return view('contact');
    }
    public function blogView(){
        return view('blog');
    }
    
    public function addCategory(){
        return view('posts.add_category');
    }
    public function storeCategory(Request $request){

        // from validation
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:25',
            // 'slug' => 'required|unique:categories|max:25',
        ]);

        $data = array();
        $data['name'] = $request->name;
        //$data['slug'] = $request->slug;
        //return response()->json($data);
        // echo "<pre>";
        // print_r($data);

        $category = DB::table('categories')->insert($data);

        if($category){
            $notification = array(
                'message'=> 'Successfully Category Inserted',
                'alert-type'=>'success'    
            );
            return Redirect()->route('all.category')->with($notification);
        }else{
            $notification = array(
                'message'=> 'Something is wrong',
                'alert-type'=> 'error'    
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function allCategory(){
        $category = DB::table('categories')->get();
        return view('posts.all_category', compact('category'));
    }

    public function viewCategory($id){
        $category = DB::table('categories')->where('id',$id)->first();
        return view('posts.categoryview')->with('cat',$category);
    }

    public function deleteCategory($id){
        $delete = DB::table('categories')->where('id',$id)->delete();
        $notification = array(
            'message'=> 'Successfully Category Deleted',
            'alert-type'=>'success'    
        );
        return Redirect()->back()->with($notification);
    }

    public function editCategory($id){

        $category = DB::table('categories')->where('id',$id)->first();

        return view('posts.editCategory', compact('category'));
    }

    public function updateCategory(Request $request,$id){
        // from validation
        $validated = $request->validate([
            'name' => 'required|max:25',
            //'slug' => 'required|max:25',
        ]);

        $data = array();
        $data['name'] = $request->name;
        //$data['slug'] = $request->slug;
        
        $category = DB::table('categories')->where('id',$id)->update($data);

        if($category){
            $notification = array(
                'message'=> 'Successfully Category Updated',
                'alert-type'=>'success'    
            );
            return Redirect()->route('all.category')->with($notification);
        }else{
            $notification = array(
                'message'=> 'Nothing to Update',
                'alert-type'=> 'error'    
            );
            return Redirect()->route('all.category')->with($notification);
        }
    }

    public function index(){

        $post = DB::table('posts')->join('categories', 'posts.category_id','categories.id')->select('posts.*','categories.name')->paginate(3);
        return view('index', compact('post'));
    }

}
