<?php

namespace App\Http\Controllers;

use App\Goods;
use App\Currency;
use App\Manufacturer;
use App\Program;
use App\Merchant;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the goods.
     *
     * @return Response
     */
    public function index()
    {
//        $goods = Goods::orderBy('modified', 'desc')->get();
        $goods = Goods::orderBy('modified', 'desc')->simplePaginate(10);
        return view('goods',compact('goods'));
    }
    /**
     * Show the form for creating a new item.
     *
     * @return Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a new created item in db.
     *
     * @return Response
     */
    public function store()
    {
        //
    }
    /**
     * Display the specified item.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $goods = Goods::find($id);
        $currency = Currency::find($goods->currency_id);
        $program = Program::find($goods->program_id);
        $manufacturer = Manufacturer::find($goods->manufacturer_id);
        $merchant = Merchant::find($goods->merchant_id);
        return view('goods-show',compact('goods', 'currency', 'program', 'manufacturer', 'merchant'));
    }

    /**
     * Show the form for editing the specified item.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified item in db.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }
    /**
     * Remove the specified item from db.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Goods::find($id)->delete();
        return redirect('goods');
    }
}
