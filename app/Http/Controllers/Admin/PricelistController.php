<?php

namespace App\Http\Controllers\Admin;

use App\Pricelist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\PricelistRequest;
use App\Category;
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
        if (request()->ajax()) {
            $query = Pricelist::with(['category', 'makeupartist']);
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
                                    <a class="dropdown-item" href="' . route('pricelist.edit', $item->id) . '">
                                    Sunting
                                    </a>
                                    <form action="' . route('pricelist.destroy', $item->id) . '" method="post">
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
        return view('pages.admin.pricelist.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $makeupartists =  Makeupartist::all();
        $categories = Category::all();
        return view('pages.admin.pricelist.create', compact('categories', 'makeupartists'));
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
        Pricelist::create($data);

        return redirect()->route('pricelist.index');
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
        $makeupartists =  Makeupartist::all();

        return view('pages.admin.pricelist.edit', compact('item', 'categories', 'makeupartists'));
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

        $item = Pricelist::findOrFail($id);

        $item->update($data);

        return redirect()->route('pricelist.index');
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

        return redirect()->route('pricelist.index');
    }
}
