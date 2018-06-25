<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\documents;
use App\category;
use App\typedocument;
use Illuminate\Http\Request;

class DocumentsController extends Controller
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
        $typedocuments = typedocument::get();
        return view('documents.create', ['typedocuments' => $typedocuments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = $request->input('daterec');
        
        $document = documents::create([
            'typedocument_id'   => $request->input('typedocument_id'),
            'daterec'           => $request->input('daterec'),
            'datedocument'      => $request->input('datedocument'),
            'codedocument'      => 'XXXX',
            'sender'            => strtoupper($request->input('sender')),
            'subject'           => strtoupper($request->input('subject')),
            'pages'             => $request->input('pages'),
            'project'           => $request->input('project'),
            'category_id'       => 0,
            'comments'          => '',
            'userrec_id'        => Auth::user()->id,
            'userenc_id'        => 0,
            'state_id'          => 1,
        ]);

        dd(substr($date,0,4) . '-' . $document->id);
        if($request->hasFile('filename')){
            $document->filename = $request->file('filename')->store('public.inbox');
        }
        $document->save();

        if($document){
            $typedocuments = typedocument::get();
            return redirect()->route('documents.create', ['typedocuments' => $typedocuments])->with('success', 'Documento guardado');
        }

        return back()->withInput()->with('errors', 'Ocurrió un error al guardar el registro');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function show(documents $documents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function edit(documents $documents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, documents $documents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function destroy(documents $documents)
    {
        //
    }
}
