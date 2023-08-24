<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public function index()
{
    if (request()->ajax()) {
        $data = Order::with('customer')->select('*');
        return Datatables::of($data)
            ->addIndexColumn()
            ->editColumn('total', function ($row) {
                return '$' . $row->amount;
            })
            ->addColumn('customer_name', function ($row) {
                return $row->customer->first_name.' '.$row->customer->last_name; // Assuming 'name' is the attribute in the Customer model
            })
            ->addColumn('view', function ($row) {
                $btn = '<a href="' . route('admin.order.show', $row->id) . '" class=""><i class="fa fa-eye text-info"></i></a>';
                return $btn;
            })
            ->rawColumns(['view'])
            ->make(true);
    }
    
    return view('admin.order.index');
  }


  public function show(Order $order)
  {
    $order->load('customer');
    return view('admin.order.show',compact('order'));
  }

}
