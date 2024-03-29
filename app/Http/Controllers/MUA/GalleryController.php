<?php

namespace App\Http\Controllers\MUA;

use App\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\GalleryRequest;
use App\Makeupartist;
use Illuminate\Support\Facades\Auth;
class GalleryController extends Controller
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
            $query = Gallery::where('mua_id', '=', $makeupartist->id);
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
                                    <form action="' . route('gallery-mua.destroy', $item->id) . '" method="post">
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
                ->editColumn('photos', function ($item) {
                    return $item->photos ? '<img src="' . Storage::url($item->photos) . '" style="max-height:30px" />'  : '';
                })
                ->rawColumns(['action', 'photos'])
                ->make();
        }
        return view('pages.mua.gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $makeupartist = Makeupartist::where('user_id', '=', Auth::user()->id)->get()->first();
        return view('pages.mua.gallery.create', compact('makeupartist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        $mua = Makeupartist::where('user_id', '=', Auth::user()->id)->get()->first();
        $data['mua_id'] = $mua->id;
        
        $data['photos'] = $request->file('photos')->store('assets/gallery', 'public');
        Gallery::create($data);

        return redirect()->route('gallery-mua.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Gallery::findOrFail($id);
        $item->delete();

        return redirect()->route('gallery-mua.index');
    }
}
