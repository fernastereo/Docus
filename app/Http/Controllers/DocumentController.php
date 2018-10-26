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
use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CreateDocumentRequest;

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
        $now = new \DateTime();   
        $typedocuments = Typedocument::get();
        return view('documents.create', ['typedocuments' => $typedocuments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDocumentRequest $request)
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
            'company_id'        => Auth::user()->company_id
        ]);

        $date = $request->input('daterec');
        $codedocument = Auth::user()->company->prefixcdocument . substr($date, 0, 4) . substr($date, 5, 2) . substr($date, 8, 2) . '-' . str_pad(Auth::user()->company->consecutive, 4, "0", STR_PAD_LEFT);
        $document->codedocument = $codedocument;
        $consecutive = Auth::user()->company->consecutive;

        if($request->hasFile('filename')){
            //Se Guardo el contenido del archivo en la variable $fileContents:
            $fileContents = $request->file('filename');
            //Guardo la ruta dentro del bucket donde se almacenó el archivo en la variable $storagePath:
            $storagePath = Storage::disk('s3')->put(Auth::user()->company->bucket . '/inbox', $fileContents, 'public');
            //Guardo la url completa para acceder al archivo dentro del bucket en la variable $url
            $url = Storage::disk('s3')->url($storagePath);
            //Guardo la ruta obtenida en el paso anterior en la BD para poder referenciarla
            $document->filename = $url;

            /*$filename = 'algo.pdf';
            $filen = $request->file('filename');
            $t = Storage::disk('s3')->put($filename, file_get_contents($filen), 'public');
            $filename = Storage::disk('s3')->url($filename);
            $document->filename = $filename;*/

            /*$fileToFtp = substr($document->filename, 6);
            Storage::disk('ftp')->put('inbox/', $request->file('filename'));
            $document->filename = 'http://www.curaduria1santamarta.co/public' . $fileToFtp;*/
        }
        $document->save();

        $reception = Reception::create([
            'document_id'       => $document->id,
            'user_id'           => Auth::user()->id,
        ]);

        //Actualizar el consecutivo
        $consecutive++;
        $company = Company::where('id', Auth::user()->company_id)->update(['consecutive' => $consecutive]);

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
        $users = User::where([['profile_id', 3], ['company_id', Auth::user()->company_id]])->get();
        $categories = Category::get();
        return view('documents.edit', ['document' => $document, 'users' => $users, 'categories' => $categories]);
    }

    public function response(Document $document)
    {
        return view('documents.response', ['document' => $document]);
    }

    public function filename(Document $document)
    {
        return view('documents.filename', ['document' => $document]);
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
        //dd($request);
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

    public function updatefilename(Request $request, Document $document){
        //dd($request);
        if($request->hasFile('filename')){
            //Guardo el contenido del archivo en la variable $fileContents:
            $fileContents = $request->file('filename');
            //Guardo la ruta dentro del bucket donde se almacenó el archivo en la variable $storagePath:
            $storagePath = Storage::disk('s3')->put(Auth::user()->company->bucket . '/inbox', $fileContents, 'public');
            //Guardo la url completa para acceder al archivo dentro del bucket en la variable $url
            $url = Storage::disk('s3')->url($storagePath);
            //Guardo la ruta obtenida en el paso anterior en la BD para poder referenciarla
            $document->filename = $url;
        }
        $document->save();

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
            //Guardo el contenido del archivo en la variable $fileContents:
            $fileContents = $request->file('filename');
            //Guardo la ruta dentro del bucket donde se almacenó el archivo en la variable $storagePath:
            $storagePath = Storage::disk('s3')->put(Auth::user()->company->bucket . '/outbox', $fileContents, 'public');
            //Guardo la url completa para acceder al archivo dentro del bucket en la variable $url
            $url = Storage::disk('s3')->url($storagePath);
            //Guardo la ruta obtenida en el paso anterior en la BD para poder referenciarla
            $response->filename = $url;
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
