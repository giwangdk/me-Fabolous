<?php

namespace App\Http\Controllers\MUA;

use App\Makeupartist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\MakeupartistRequest;
use App\User;
use App\Category;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mua = Makeupartist::where('user_id', '=', Auth::user()->id)->get()->first();
        return view('pages.mua.profile.index', compact('mua'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $item = Makeupartist::where('user_id', '=', Auth::user()->id)->get()->first();
        return view('pages.mua.profile.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MakeupartistRequest $request)
    {
        $data = $request->all();

        $data['photo'] = $request->file('photo')->store('assets/mua', 'public');
        $data['user_id'] = Auth::user()->id;

        $item = Makeupartist::where('user_id', '=', Auth::user()->id)->get()->first();
        if($item == null){
            Makeupartist::create($data);
            User::where('id', Auth::user()->id)->update(array('mua_name'=>$request->name));

        }else{
            $item->update($data);
            User::where('id', Auth::user()->id)->update(array('mua_name'=>$request->name));
        }

        return redirect()->route('myprofile');
    }
}
