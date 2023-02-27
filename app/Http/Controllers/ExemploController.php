<?php

namespace App\Http\Controllers;

use App\Models\Exemplo;
use Illuminate\Http\Request;

class ExemploController extends Controller
{
    public function sample() {
        return view('sample.index');
    }

    public function createSample(Request $request) {

        $this->validateRequest($request);

        $exemplo = new Exemplo();
        $exemplo->name = $request->name;
        $exemplo->description = $request->description;
        $exemplo->save();

        return $exemplo->toJson();
    }

    public function listSample() {
        return Exemplo::all()->toJson();
    }

    protected function validateRequest($request)
    {
        $rules = [];

        $rules['name'] = 'required|max:255';
        $rules['description'] = 'required';

        $messages = [
            'name.required' => 'O campo nome é obrigatório.',
            'name.max' => 'O campo nome deve ter menos que 255 caracteres.',
            'description.required' => 'O campo descrição é obrigatório.',
        ];

        dd($this->validate($request, $rules, $messages));
    }
}
