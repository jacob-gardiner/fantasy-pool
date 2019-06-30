<?php

namespace App\Http\Controllers;

use App\Helpers\PoolHelpers;
use App\Houseguest;
use App\Http\Requests\Houseguest\HouseguestStoreRequest;
use App\Http\Requests\Houseguest\HouseguestUpdateRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class HouseguestController extends Controller
{
    private $poolHelpers;

    /**
     * HouseguestController constructor.
     * @param PoolHelpers $poolHelpers
     */
    public function __construct(PoolHelpers $poolHelpers)
    {
        $this->middleware('auth');

        $this->poolHelpers = $poolHelpers;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Houseguest $houseguest
     * @return Response
     */
    public function edit(Houseguest $houseguest)
    {
        return view('houseguest.edit', [
            'houseguest' => $houseguest
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param HouseguestUpdateRequest $request
     * @param Houseguest              $houseguest
     * @return Response
     */
    public function update(HouseguestUpdateRequest $request, Houseguest $houseguest)
    {
        $file = $this->handlePhoto($request->file('photo'));

        $houseguest->update([
            'name'  => $request->get('name'),
            'photo' => $file ? Storage::url($file->hashName()) : $houseguest->photo,
        ]);

        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param HouseguestStoreRequest $request
     * @return Response
     */
    public function store(HouseguestStoreRequest $request)
    {
        $file = $this->handlePhoto($request->file('photo'));

        Houseguest::create([
            'name'    => $request->get('name'),
            'photo'   => $file ? Storage::url($file->hashName()) : config('app.avatar_default'),
            'pool_id' => $request->get('pool_id')
        ]);

        return redirect()->route('fantasy-pool.add_houseguest', [
            'pool_id' => $request->get('pool_id')
        ]);
    }

    /**
     * @param Houseguest $houseguest
     * @return Factory|View
     */
    public function show(Houseguest $houseguest)
    {
        return view('houseguest.show', [
            'houseguest'        => $houseguest,
            'gameActions'       => $houseguest->pool->gameActions,
            'houseguestActions' => $houseguest->actions,
            'isOwner'           => $this->poolHelpers->isPoolOwner($houseguest->pool->id),
        ]);
    }

    /**
     * @param $photo
     * @return mixed
     */
    private function handlePhoto($photo){
        $file = $photo;

        if ($photo) {
            Storage::disk('local')->put('public', $file);
        }

        return $file;
    }
}
