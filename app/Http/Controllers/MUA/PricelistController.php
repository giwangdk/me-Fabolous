<?php

namespace App\Http\Controllers\MUA;

use App\Pricelist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\PricelistRequest;
use App\Category;
use Illuminate\Support\Facades\Auth;
use App\Makeupartist;

class PricelistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $makeupartist = Makeupartist::where('user_id', '=', Auth::user()->id)->get()->first();
        if (request()->ajax()) {
            $query = Pricelist::where('mua_id', '=', $makeupartist->id)->with(['category']);
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <div class="btn-group">
                        <div class="dropdown">
                            <button class="btn brn-primary dropdown-toggle mr-1 mb-1
                                type="button" data-toggle="dropdown">
                                Aksi
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="' . route('pricelist-mua.edit', $item->id) . '">
                                    Sunting
                                    </a>
                                    <form action="' . route('pricelist-mua.destroy', $item->id) . '" method="post">
                                        ' . method_field('delete') . csrf_field() . '
                                        <button type="submit" class="dropdown-item text-danger">
                                        Hapus
                                        </button>
                                    </form>
                                </div>
                        </div>
                    </div>
                ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.mua.pricelist.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $makeupartist = Makeupartist::where('user_id', '=', Auth::user()->id)->get()->first();
        $categories = Category::all();
        return view('pages.mua.pricelist.create', compact('categories', 'makeupartist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PricelistRequest $request)
    {
        $data = $request->all();
        $mua = Makeupartist::where('user_id', '=', Auth::user()->id)->get()->first();
        $data['mua_id'] = $mua->id;
        Pricelist::create($data);

        return redirect()->route('pricelist-mua.index');
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
        $item = Pricelist::findOrFail($id);
        $categories = Category::all();
        
        $makeupartist = Makeupartist::where('user_id', '=', Auth::user()->id)->get()->first();

        return view('pages.mua.pricelist.edit', compact('item', 'categories', 'makeupartist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PricelistRequest $request, $id)
    {
        $data = $request->all();
        
        $mua = Makeupartist::where('user_id', '=', Auth::user()->id)->get()->first();
        $data['mua_id'] = $mua->id;
        $item = Pricelist::findOrFail($id);

        $item->update($data);

        return redirect()->route('pricelist-mua.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Pricelist::findOrFail($id);
        $item->delete();

        return redirect()->route('pricelist-mua.index');
    }
}
