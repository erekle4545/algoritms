<?php

namespace App\Http\Controllers;

use App\Models\UserProductGroups;
use App\Http\Requests\StoreUserProductGroupsRequest;
use App\Http\Requests\UpdateUserProductGroupsRequest;

class UserProductGroupsController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserProductGroupsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserProductGroupsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserProductGroups  $userProductGroups
     * @return \Illuminate\Http\Response
     */
    public function show(UserProductGroups $userProductGroups)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserProductGroups  $userProductGroups
     * @return \Illuminate\Http\Response
     */
    public function edit(UserProductGroups $userProductGroups)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserProductGroupsRequest  $request
     * @param  \App\Models\UserProductGroups  $userProductGroups
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserProductGroupsRequest $request, UserProductGroups $userProductGroups)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserProductGroups  $userProductGroups
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserProductGroups $userProductGroups)
    {
        //
    }
}
