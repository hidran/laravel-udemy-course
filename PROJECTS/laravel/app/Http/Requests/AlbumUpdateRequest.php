<?php

namespace LaraCourse\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use LaraCourse\Models\Album;

class AlbumUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       
         $album = Album::find($this->id);
       
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       // dd($this->route()->parameter('id'));
        // dd($this->route('id'));
        //dd($this->id);
        return [

            'name' => 'required',
            
            'name' => Rule::unique('albums','album_name')->ignore($this->id,'id'),

           
            // 'user_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => ' Il nome dell\'album è obbligatorio',
            'name.unique' => ' Il nome deve essere univoco',
         
            'album_thumb.required' => ' L\'immagine  dell\'album è obbligatoria',
            'description.required' => ' La descrizione  dell\'album è obbligatoria',

        ];
    }
}
