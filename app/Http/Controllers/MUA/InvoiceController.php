<?php

namespace App\Http\Controllers\MUA;

use App\Pricelist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Category;
use Illuminate\Support\Facades\Auth;
use App\Transaction;
use App\Invoice;
use App\Makeupartist;

class InvoiceController extends Controller
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
            $query = Invoice::where('mua_id', '=', $makeupartist->id);
            $query = Transaction::with(['transaction', 'mua', 'user']);
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <div class="btn-group">
                        <div class="dropdown">
                            <button class="btn brn-primary dropdown-toggle mr-1 mb-1
                                type="button" data-toggle="dropdown">
                                Aksi
                                </button>
                                <div class="dropdown-menu"> <a class="dropdown-item" href="' . route('invoice-mua.show', $item->id) . '">
                                Detail
                                </a>
                                    <a class="dropdown-item" href="' . route('invoice-mua.edit', $item->id) . '">
                                    Sunting
                                    </a>
                                </div>
                        </div>
                    </div>
                ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.mua.transaction.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Invoice::with(['transaction', 'mua', 'user'])->findOrFail($id);
        return view('pages.mua.invoice.detail', compact('item'));
    }

    /**    
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Invoice::with(['pricelist', 'mua', 'user'])->findOrFail($id);
        return view('pages.mua.invoice.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Invoice::findOrFail($id);
        $item->status_penyewaan = $request->input("status_penyewaan");
        $item->save();
        
        return redirect()->route('invoice-mua.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Invoice::findOrFail($id);
        $item->delete();

        return redirect()->route('pricelist.index');
    }
}
