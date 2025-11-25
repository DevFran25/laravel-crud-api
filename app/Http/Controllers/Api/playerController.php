<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Player;
use Illuminate\Support\Facades\Validator;

//Metodos de CRUD para el modelo Player se implementaran aqui
class playerController extends Controller
{
    public function index()
    {
        $players = Player::all();

        $data = [
            'players' => $players,
            'status' => 200
            ];
        return response()->json($data, 200);
    }

    //almacenar
    public function store(Request $request)
    {
       Validator::make($request->all(),[
        'name' => 'required|string|max:255',
        'age' => 'required|integer',
        'position' => 'required|string|max:100',
        'team' => 'required|string|max:100',
       ]);

       if($validator->fails()){
        $data = [
            'message' => 'Error en la validación de los datos',
            'errors' => $validator->errors(),
            'status' => 400
        ];
        return response()->json($data, 400);

       }

       $players = Player::create([
        'name' => $request->name,
        'age' => $request->age,
        'position' => $request->position,
        'team' => $request->team,
       ]);
       if (!$players) {
        $data = [
            'message' => 'Error al crear el jugador',
            'status' => 500
        ];
        return response()->json($data, 500);
       }
       $data = [
        'message' => 'Jugador creado exitosamente',
        'player' => $players,
        'status' => 201
       ];
       return response()->json($data, 201);
    }
}
