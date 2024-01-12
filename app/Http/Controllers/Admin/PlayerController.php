<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Player::orderBy('ranking')->get();
        return view('admin.players.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.players.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        $request->validate([
            'name'=> 'required|max:70|min:5',
            'age'=> 'required|numeric|min:17',
            'weight'=>'required|numeric|min:60|max:100',
            'height'=> 'required|numeric|min:165|max:220',
            'points'=> 'required|numeric|min:600|max:20000',
            'country'=> 'required|min:3|max:30',
            'ranking'=> 'required|numeric|min:1|max:200',

            ]);

        $newPlayer = Player::create($data);

        return redirect()->route('admin.players.index')->with('success','Player created successfully!');
        dd(session('success'));
    }

    /**
     * Display the specified resource.
     */ 
    public function show(Player $player)
    {
        return view('admin.players.show', compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        return view('admin.players.edit', compact('player'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Player $player)
    {
        $data = $request->all();
        $player->update($data);

        return redirect()->route('admin.players.show', $player->id);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        $player->delete();
        return redirect()->route('admin.players.index');
    }
}
