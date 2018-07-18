<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'typedocument_id' => 'required',
            'daterec' => 'required',
            'datedocument' => 'required',
            'sender' => 'required',
            'subject' => 'required',
            'pages' => 'required',
            'filename' => 'required|file|max:20480',
        ];
    }

    //195-55 R16 maxis:220-200 interstate:195

    //185-55 R16 toyo: 239
    public function messages(){
        return [
            'typedocument_id.required' => 'Debe elegir un Tipo de Documento a radicar',
            'daterec.required' => 'La Fecha de Recepción no puede estar vacía',
            'datedocument.required' => 'La Fecha del documento no puede estar vacía',
            'sender.required' => 'Especifique quien envía el documento',
            'subject.required' => 'Especifique el asunto o referencia del documento',
            'pages.required' => 'Especifique el número de páginas del documento',
            'filename.required' => 'Seleccione el archivo con el documento a radicar',
        ];
    }
}
