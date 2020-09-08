<?php

namespace App\Http\Controllers;

use App\chapter;
use App\Providers\SweetAlertServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $req)
    {
        //
        $chapter=new chapter;
        $chapter->chapter_name=$req->chaptername;
        $chapter->subject_id=$req->subject;
        $chapter->credit=$req->credit;
        $chapter->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req)
    {
        $res= DB::table('chapters')
        ->join('subjects', 'subjects.subject_id', '=', 'chapters.subject_id')
        ->select('subjects.subject_name','chapters.chapter_id','chapters.chapter_name','chapters.credit')
        ->get();

        if(!$req->session()->get('fname'))
        {
            return redirect('/');
        }
        else
        {
            return view('chapter')->with('chapter',$res);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req,$id)
    {
        //
        $department = DB::table('chapters')->where('chapter_id', $id)->update([
            'chapter_name' => $req->input('chaptername'),
            'subject_id' => $req->input('subject'),
            'credit' => $req->input('credit')
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, chapter $chapter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('chapters')->where('chapter_id', '=', $id)->delete();
    }
}
