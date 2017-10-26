<?php

namespace App\Http\Controllers;

use App\Goods;
use App\Currency;
use App\Manufacturer;
use App\Program;
use App\Merchant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'price' => 'required',
            'EAN' => 'required|max:13',
        ]);

        $newGoods = new Goods([
            'id' => $request->get('id'),
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
        ]);

        $file = $request->img_name;
        if($file->isValid())
        {
            $imageName = $newGoods['id'] . '.' . $request->file('img_name')->getClientOriginalExtension();
            $newGoods['image'] = $imageName;
            $request->img_name->storeAs('public/img', $imageName);
        }

        $newGoods->save();

        Session::flash('message', "Goods added!");
        return redirect()->route('goods.show', ['id' => $newGoods['id']]);
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
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'price' => 'required',
            'EAN' => 'required|max:13',
        ]);

//        dd('UPDATE');

        Goods::where('id', $request->get('id'))
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
            ]);

        $file = $request->img_name;
        if($file)
        {
            if($file->isValid())
            {
                $imageName = $request->get('id') . '.' . $request->file('img_name')->getClientOriginalExtension();
                $request->img_name->storeAs('public/img', $imageName);
            }
        }

        Session::flash('message', "Goods updated!");
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
