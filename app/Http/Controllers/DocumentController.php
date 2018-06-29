<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Document;
use App\Category;
use App\Typedocument;
use App\Reception;
use App\Response;
use App\User;
use Illuminate\Http\Request;

class DocumentController extends Controller
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
        $typedocuments = Typedocument::get();
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

        $document = Document::create([
            'typedocument_id'   => $request->input('typedocument_id'),
            'daterec'           => $request->input('daterec'),
            'datedocument'      => $request->input('datedocument'),
            'codedocument'      => '',
            'sender'            => strtoupper($request->input('sender')),
            'subject'           => strtoupper($request->input('subject')),
            'pages'             => $request->input('pages'),
            'project'           => $request->input('project'),
            'category_id'       => 0,
            'comments'          => '',
            'user_id'           => 0,
            'state_id'          => 1,
        ]);

        $date = $request->input('daterec');
        $codedocument = 'CU1' . substr($date, 0, 4) . substr($date, 5, 2) . substr($date, 8, 2) . '-' . str_pad($document->id, 4, "0", STR_PAD_LEFT);
        $document->codedocument = $codedocument;

        if($request->hasFile('filename')){
            $document->filename = $request->file('filename')->store('public/inbox');

            $fileToFtp = substr($document->filename, 6);
            
            //Storage::disk('ftp')->put('/inbox/', $request->file('filename'));
            $document->filename = 'http://www.curaduria1santamarta.co/public' . $fileToFtp;
        }
        $document->save();

        $reception = Reception::create([
            'document_id'       => $document->id,
            'user_id'           => Auth::user()->id,
        ]);

        if($document){
            return redirect()->route('documents.show', $document->id)->with('success', 'Documento guardado');
        }

        return back()->withInput()->with('errors', 'Ocurrió un error al guardar el registro');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        // dd($document);
        return view('documents.show', ['document' => $document]);
    }

    public function showresponse(Document $document)
    {
        // dd($document);
        return view('documents.showresponse', ['document' => $document]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        $users = User::where('profile_id', 3)->get();
        $categories = Category::get();
        return view('documents.edit', ['document' => $document, 'users' => $users, 'categories' => $categories]);
    }

    public function response(Document $document)
    {
        return view('documents.response', ['document' => $document]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $document->update([
            'user_id'       => $request->input('user_id'),
            'category_id'   => $request->input('category_id'),
            'comments'      => $request->input('comments'),
            'state_id'      => 2,
        ]);

        if($document){
            return redirect()->route('home');
        }

        return back()->withInput()->with('errors', 'Ocurrió un error al guardar el registro');
    }

    public function responsedocument(Request $request)
    {
        $now = new \DateTime();   
        $response = Response::create([
            'date'          => $now->format('Y-m-d H:i:s'),
            'comments'      => $request->input('response'),
            'codedocument'  => $request->input('codedocument'),
            'document_id'   => $request->input('document_id'),
        ]);

        if($request->hasFile('filename')){
            $response->filename = $request->file('filename')->store('public/outbox');

            $fileToFtp = substr($response->filename, 8);
            
            Storage::disk('ftp')->put('/outbox/', $request->file('filename'));
            $response->filename = 'http://www.curaduria1santamarta.co/public' . $fileToFtp;
        }
        $response->save();

        $document = Document::find($response->document_id);
        $document->state_id = 3;
        $document->save();

        if($response){
            return redirect()->route('home');
        }

        return back()->withInput()->with('errors', 'Ocurrió un error al guardar el registro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }

}
