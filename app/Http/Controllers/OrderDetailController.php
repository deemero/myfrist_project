<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    OrderDetail,
};
use DB;

class OrderDetailController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }




    public function index()
    {
        $list_of_order = OrderDetail::with('user')->
        where('user_id', auth()->user()->id)->get();


        return view('list_of_order' , compact(
            'list_of_order',
        ));
    }

    public function create()
    {
        // return view('neworder');
        $latest_order = OrderDetail::latest()->value("id");

        if($latest_order == null)
            $new_rec_no = "RH00001";
        else{
            $new_rec_no = 'RH'.str($latest_order + 1, 5, 0, STR_PAD_LEFT);
        }

        return view('neworder' , compact(
            'new_rec_no',
        ));

    }

    public function store(Request $request){
        $this->validate($request, [
            'rec_no' => 'required|max:7',
            'address' => 'required|max:255',
            'tel_no' => 'nullable|numeric',
            'email' => 'nullable'
        ]);

        OrderDetail::create([
            'rec_no' => $request->rec_no,
            'user_id' => auth()->user()->id,
            'address' => $request->address,
            'tel_no' => $request->tel_no,
            'email' => $request->email,
            'date' => now(),
        ]);

        return redirect()->route('order.create')->with('status', 'Order added Successfully');

    }

    public function edit($id)
    {
        $order_detail = OrderDetail::findorFail($id);
        // $order_detail = OrderDetail::where('id' , $id)->first();
        // $order_detail = DB::table('order_details')->where('id', $id)->get();

        // dd($order_detail);
        return view('editorder', compact(
            'order_detail',
        ));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'rec_no' => 'required|max:7',
            'address' => 'required|max:255',
            'tel_no' => 'nullable|numeric',
            'email' => 'nullable'
        ]);

        $order_detail=OrderDetail::findOrFail($id);
        $order_detail->rec_no = $request->rec_no;
        $order_detail->address = $request->address;
        $order_detail->tel_no = $request->tel_no;
        $order_detail->email = $request->email;
        $order_detail->save();

        return redirect()->route('order.edit' , ['id' => $id])->with('status' , 'Update Successfully');



    }

    public function delete($id)
    {
        OrderDetail::destroy($id);
        return redirect()->route('order.index')->with('status' , 'Data Delete Successfully');

    }



}
