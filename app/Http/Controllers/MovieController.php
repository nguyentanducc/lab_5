<?php

namespace App\Http\Controllers;

use App\Models\gene;
use App\Models\movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){
        $movie = movie::orderByDesc('id')->paginate(5);
        return view('home',compact('movie'));
    }
    public function create(){
        $gene = gene::all();
        return view('create',compact('gene'));
       
    }
    public function store(Request $request){
        $data_movie = [
            'title' => $request['title'],
            'intro' => $request['intro'],
            'release_date' => $request['release_date'],
            'gene_id' => $request['gene_id'],
        ];  
      
        $data_movie['poster'] = "";
        if($request->hasFile('poster')){
            $path = $request->file('poster')->store('images');
            $data_movie['poster'] = $path;
            
        }
        
        movie::query()->create($data_movie);
        return  redirect()->route('home')->with('message', 'Thêm Movie thành công');
    }
    public function edit(movie $movie){
        $gene = gene::all();
        return view('edit',compact('gene','movie'));
    }
    public function update(movie $movie,Request $request){
        $data_movie = [
            'title' => $request['title'],
            'intro' => $request['intro'],
            'release_date' => $request['release_date'],
            'gene_id' => $request['gene_id'],
        ]; 
        $old_poster  = $movie->poster;
        $data_movie['poster'] = $old_poster;
        if($request->hasFile('poster')){
            $path = $request->file('poster')->store('images');
            $data_movie['poster'] = $path;
            
        }
        $movie->update($data_movie);
        if($request->hasFile('poster')){
            if(file_exists('./storage/'.$old_poster)){
            unlink('./storage/'.$old_poster);
        
            }
        }
        return redirect()->back()->with('message', 'Cập nhật dữ liệu thành công');
    }
    public function destroy(movie $movie){
        $movie->delete();
        return redirect()->route('home')->with('message', 'Xóa dữ liệu thành công');

    }
    public function detail(movie $movie){
        $gene = gene::all();
        return view('detail',compact('movie','gene'));
    }
    public function search(Request $request){
        $search = $request->search;
        $movie = movie::where(function ($query) use ($search){
            $query->where('title','like',"%$search%")
            ->orWhere('intro','like',"%$search%");
        })
        ->orWhereHas('gene',function ($query) use ($search){
            $query->where('name','like',"%$search%");
        })
        ->get();
        return view('home',compact('movie','search'));
    }
}
