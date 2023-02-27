<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    function createClient(Request $req){

        $this->validateRequest($req);

        $client = new Client();
        $client->email = $req->email;
        $client->password = Hash::make($req->password);
        $client->save();

        // tratar retorno
        return $client->toJson();
    }

    function loginClient(Request $req) {

        $this->validateRequest($req);

        if (strlen($req->password) < 6) {
            $result['message'] = 'E-mail ou senha inválidos.';
        }

        $client = Client::where('email', $req->email)->first();

        if (!$client) {
            $result['message'] = 'E-mail ou senha inválidos.';
        }

        if (!Hash::check($req->password, $client->password)) {
            $result['message'] = 'E-mail ou senha inválidos.';
        } else {
            $result['message'] = 'Logado';
        }

        return $result;
    }

    protected function validateRequest($request)
    {
        $rules = [];

        $rules['email'] = 'required|email';
        $rules['password'] = 'required';

        $messages = [
            'email.required' => 'E-mail ou senha inválidos.',
            'email.email' => 'E-mail ou senha inválidos.',
            'password.required' => 'E-mail ou senha inválidos.',
        ];

        $this->validate($request, $rules, $messages);
    }
}
