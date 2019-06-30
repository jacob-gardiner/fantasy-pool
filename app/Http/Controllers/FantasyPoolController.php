<?php

namespace App\Http\Controllers;

use App\FantasyPool;
use App\Http\Requests\FantasyPool\StorePoolRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FantasyPoolController extends Controller
{
    /**
     * FantasyPoolController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fantasy-pool.index', [
            'pools' => auth()->user()->pools
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fantasy-pool.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePoolRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePoolRequest $request)
    {
        $file = $request->file('photo');

        if ($file) {
            Storage::disk('local')->put('public', $file);
        }

        /* Create the pool */
        $fantasy_pool = FantasyPool::create([
            'name'     => $request->get('name'),
            'photo'    => $file ? Storage::url($file->hashName()) : config('app.pool_default'),
            'owner_id' => auth()->user()->id,
        ]);

        /* Redirect to where the user can add houseguests */
        return redirect()->route('fantasy-pool.dashboard', [
            'pool' => $fantasy_pool->id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FantasyPool $fantasyPool)
    {
        return view('fantasy-pool.edit', [
            'pool' => $fantasyPool
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FantasyPool $fantasyPool)
    {
        $file = $request->file('photo');

        if ($file) {
            Storage::disk('local')->put('public', $file);
        }

        /* Create the pool */
        $fantasyPool->update([
            'name'     => $request->get('name'),
            'photo'    => $file ? Storage::url($file->hashName()) : $fantasyPool->photo,
            'owner_id' => auth()->user()->id,
        ]);

        /* Redirect to where the user can add houseguests */
        return redirect()->route('fantasy-pool.dashboard', [
            'pool' => $fantasyPool->id,
        ])->with('message', 'Pool Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
