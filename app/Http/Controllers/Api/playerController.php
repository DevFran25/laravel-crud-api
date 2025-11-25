<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Player;
use Illuminate\Support\Facades\Validator;

//Metodos de CRUD para el modelo Player se implementaran aqui
class PlayerController extends Controller
{

public function index() { 
    
    $players = Player::all(); 
    $data = [ 'players' => $players, 
              'status' => 200 
            ];
    return response()->json($data, 200); 

}

public function store(Request $request)
{
    // Validación correcta
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'age' => 'required|integer',
        'position' => 'required|string|max:100',
        'team' => 'required|string|max:100',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'message'    => 'Error en la validación de los datos',
            'errors'     => $validator->errors(),
            'status'     => 400
        ], 400);
    }

    // Crear jugador
    $player = Player::create($validator->validated());

    return response()->json([
        'message' => 'Jugador creado exitosamente',
        'player'  => $player,
        'status'  => 201
    ], 201);    
    }

    public function show($id)
    {
        $player = Player::find($id);
        if (!$player){
            $data = [
                'message' => 'Jugador no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        return response()->json([
            'message' => 'Jugador encontrado',
            'player' => $player,
            'status' => 200
        ], 200);
    }
}

