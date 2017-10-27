<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGoods;
use App\Goods;
use App\Currency;
use App\Manufacturer;
use App\Program;
use App\Merchant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

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
        $goods['id'] = md5(microtime());
        $currency = Currency::get();
        $program = Program::get();
        $manufacturer = Manufacturer::get();
        $merchant = Merchant::get();

        return view('goods-create', compact('goods', 'currency', 'program', 'manufacturer', 'merchant'));
    }

    /**
     * Store a new created item in db.
     *
     * @return Response
     */
    public function store(StoreGoods $request)
    {
        $idGoods = $request->get('id');
        $imageName = '';

        $file = $request->img_name;
        if($file)
        {
            if($file->isValid())
            {
                $imageName = $idGoods . '.' . $request->file('img_name')->getClientOriginalExtension();
                $request->file('img_name')->move(public_path("/img"), $imageName);
            }
        }

        $newGoods = new Goods([
            'id' => $idGoods,
            'name' => $request->get('name'),
            'description'  => $request->get('description'),
            'modified'  => Carbon::now()->toDateTimeString(),
            'price'  => $request->get('price'),
            'price_old'  => $request->get('price_old'),
            'shipping_costs'  => $request->get('shipping_costs'),
            'currency_id'  => $request->get('currency_id'),
            'program_id'  => $request->get('program_id'),
            'manufacturer_id'  => $request->get('manufacturer_id'),
            'merchant_id'  => $request->get('merchant_id'),
            'ean'  => $request->get('EAN'),
            'image' => $imageName,
        ]);

        $result = $newGoods->save();

        if($result)
        {
            Session::flash('message', "Goods added!");
        }
        else
        {
            Session::flash('message', "Wrong!");
        }

        return redirect()->route('goods.show', ['id' => $idGoods]);
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
        return view('goods-show', compact('goods', 'currency', 'program', 'manufacturer', 'merchant'));
    }

    /**
     * Show the form for editing the specified item.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $goods = Goods::find($id);
        $currency = Currency::get();
        $program = Program::get();
        $manufacturer = Manufacturer::get();
        $merchant = Merchant::get();
        return view('goods-edit', compact('goods', 'currency', 'program', 'manufacturer', 'merchant'));
    }

    /**
     * Update the specified item in db.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(StoreGoods $request)
    {
        $imageName = $request->get('img_name_old');

        $file = $request->img_name;
        if($file)
        {
            if($file->isValid())
            {
                $imageName = $request->get('id') . '.' . $request->file('img_name')->getClientOriginalExtension();
                $request->file('img_name')->move(public_path("/img"), $imageName);
            }
        }

        $result = Goods::where('id', $request->get('id'))
            ->update([
                'name' => $request->get('name'),
                'description'  => $request->get('description'),
                'modified'  => Carbon::now()->toDateTimeString(),
                'price'  => $request->get('price'),
                'price_old'  => $request->get('price_old'),
                'shipping_costs'  => $request->get('shipping_costs'),
                'currency_id'  => $request->get('currency_id'),
                'program_id'  => $request->get('program_id'),
                'manufacturer_id'  => $request->get('manufacturer_id'),
                'merchant_id'  => $request->get('merchant_id'),
                'ean'  => $request->get('EAN'),
                'image'  => $imageName,
            ]);

        if($result)
        {
            Session::flash('message', "Goods updated!");
        }
        else
        {
            Session::flash('message', "Wrong!");
        }

        return redirect()->route('goods.show', ['id' => $request->get('id')]);
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
