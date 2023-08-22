<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ToppingRequest;
use App\Models\Topping;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ToppingController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = Topping::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('edit', function ($row) {
                    $btn = "<a href=" . route('admin.topping.edit', $row->id) . " class=''><i class='fa fa-pen text-primary'></i></a>";
                    return $btn;
                })->addColumn('delete', function ($row) {
                    $btn = "<a href='javascript:void(0)' class='delete-topping' data-id=" . $row->id . "><i class='fa fa-trash text-danger'></i></a>";
                    return $btn;
                })
                ->rawColumns(['delete', 'edit'])
                ->make(true);
        }
        return view('admin.topping.index');
    }

    public function create()
    {
        return view('admin.topping.create_edit');
    }

    public function store(ToppingRequest $request)
    {
        $topping = new Topping;
        $this->save($request,$topping);

        return redirect()->route('admin.topping.index')->with('success', 'Topping Successfully Added!');
    }

    public function edit(Topping $topping)
    {
        return view('admin.topping.create_edit', compact('topping'));
    }

    public function update(ToppingRequest $request, Topping $topping)
    {
        $this->save($request,$topping);

        return redirect()->route('admin.topping.index')->with('success', 'Topping Successfully Updated!');
    }

    public function destroy(Topping $topping)
    {
        $topping->delete();

        return response()->json([
            'success' => 1,
            'message' => 'Deleted successfully'
        ]);
    }

    public function save($request,$topping)
    {
        $topping->name = $request->name;
        $topping->price = $request->price;
        $topping->save();
    }
}
