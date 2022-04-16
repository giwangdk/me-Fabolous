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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.mua.profile.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MakeupartistRequest $request)
    {
        $data = $request->all();
        $data['photo'] =  $request->file('photo')->move('assets/mua', $request->file('photo')->getClientOriginalName());


        Makeupartist::create($data);

        return redirect()->route('makeupartist.index');
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
    public function edit($id)
    {
        $item = Makeupartist::findOrFail($id);
        $categories = Category::all();

        return view('pages.mua.profile.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MakeupartistRequest $request, $id)
    {
        $data = $request->all();

        $data['photo'] = $request->file('photo')->move('assets/mua', $request->file('photo')->getClientOriginalName());

        $item = Makeupartist::findOrFail($id);

        $item->update($data);

        return redirect()->route('makeupartist.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Makeupartist::findOrFail($id);
        $item->delete();

        return redirect()->route('makeupartist.index');
    }
}
