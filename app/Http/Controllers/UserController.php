<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catagorie as Catagory;
use App\Book as Book;
use App\Books_photo as Photo;
use Auth;

class UserController extends Controller
{
    public function sellBooks (){
        $catagory = Catagory::all();
        return view('user.sellBook',['catagory'=>$catagory]);
    }


    public function storeBooks (Request $request){
        $this->validate($request,array(
            'title' =>'required|max:200',
            'author' =>'required|max:200',
            'edition' =>'required|max:20',
            'price' =>'required|max:10',
            'cover' =>'mimes:jpeg,bmp,png,jpg|max:4000',
            'inner_1'=>'mimes:jpeg,bmp,png,jpg|max:4000',
            'inner_2'=>'mimes:jpeg,bmp,png,jpg|max:4000',
        ));

        $Book = new Book();
        $Book->name = $request->title;
        $Book->author = $request->author;
        $Book->price = $request->price;
        $Book->edition = $request->edition;
        $Book->catagory_id = $request->catagory;

        $User = Auth::user();
        $User->book()->save($Book);
        $Book_id = Book::select('id')->orderBy('id','desc')->first();

        if($request->hasFile('cover')){
            $fileName = time().'.'.$request->file('cover')->getClientOriginalExtension();
            $path = $request->file('cover')->storeAs('uploaded_images',$fileName);
            $Photo = new Photo();
            $Photo->path = $fileName;
            $Book_id->photo()->save($Photo);
        }

        if($request->hasFile('inner_1')){
            $fileName = time().'.'.$request->file('inner_1')->getClientOriginalExtension();
            $path = $request->file('inner_1')->storeAs('uploaded_images',$fileName);
            $Photo = new Photo();
            $Photo->path = $fileName;
            $Book_id->photo()->save($Photo);
        }

        if($request->hasFile('inner_2')){
            $fileName = time().'.'.$request->file('inner_2')->getClientOriginalExtension();
            $path = $request->file('inner_2')->storeAs('uploaded_images',$fileName);
            $Photo = new Photo();
            $Photo->path = $fileName;
            $Book_id->photo()->save($Photo);
        }

        return redirect('/home');
    }
}
