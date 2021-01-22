<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class postBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() /*read */
    {

        $blog = Storage::get('/public/data.json');
        $data = json_decode($blog, true);
        rsort($data);

        return view('welcome', compact('data')); 
    }

   
    public function create()
    {

        return view('form');
    }

    public function post(Request $request) /*read */
    {
        $blog = Storage::get('/public/data.json');
        $data = json_decode($blog, true);

        $idlist = array_column($data, 'id');
        $auto_increment_id = end($idlist);

        $data[]=array(
            'id'=>$auto_increment_id+1,
            'title'=>$request ->title,
            'author'=>$request ->author,
            'content'=>$request ->content,
        );
        $sikop = json_encode($data, JSON_PRETTY_PRINT);
        $blog = Storage::put('/public/data.json', $sikop);
        return redirect('/'); //saat masukin data bakal di arahin ke welcome

    }

    public function edit($id) /*edit */
    {
        $blog = Storage::get('/public/data.json');
        $data = json_decode($blog, true);
        $edit = $data[$id-1];

        return view('edit', compact('edit')); 


    }

    public function update(Request $request, $id) /*edit */
    {
        $blog = Storage::get('/public/data.json');
        $data = json_decode($blog, true);

        $data[$id-1]= array(
            'id'=>$request ->id,
            'title'=>$request ->title,
            'author'=>$request ->author,
            'content'=>$request ->content,
        );

        $sikop = json_encode($data, JSON_PRETTY_PRINT);
        $blog = Storage::put('/public/data.json', $sikop);
        return redirect('/');
    }

    public function destroy($id) /*Delete */
    {
        $blog = Storage::get('/public/data.json');
        $data = json_decode($blog, true);

        unset($data[$id-1]);
        $sikop = json_encode($data, JSON_PRETTY_PRINT);
        $blog = Storage::put('/public/data.json', $sikop);
        return redirect('/');
    }
   
    
}
