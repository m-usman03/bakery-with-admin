<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Str;

class ProductController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = Product::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('thumbnail', function ($row) {
                    $html = "<img src='" . asset('storage/' . $row->thumbnail) . "' height='100px' width='100px'/>";
                    return $html;
                })
                ->addColumn('edit', function ($row) {
                    $btn = "<a href=" . route('admin.product.edit', $row->id) . " class=''><i class='fa fa-pen text-primary'></i></a>";
                    return $btn;
                })->addColumn('delete', function ($row) {
                    $btn = "<a href='javascript:void(0)' class='delete-product' data-id=" . $row->id . "><i class='fa fa-trash text-danger'></i></a>";
                    return $btn;
                })
                ->rawColumns(['delete', 'edit', 'thumbnail'])
                ->make(true);
        }
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin.product.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ProductRequest $request)
    {
        // dd($request->all());
        $slug = Str::slug($request->name);
        if (Product::where('slug', $slug)->exists()) {
            return back()->with('error', 'Name already exists !!')->withInput($request->all());
        }
        try {
            DB::beginTransaction();
            $product = new Product;

            $directory = 'public/product/thumbnail';

            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory, 0755, true);
            }
            $thumbnailName = 'thumbnail_'.time().mt_rand(1,10).'.'. $request->file('thumbnail')->getClientOriginalExtension();
            $product->thumbnail = $request->file('thumbnail')->storeAs('product/thumbnail',$thumbnailName,'public');

            $product = $this->save($request, $product);

            $this->savePictures($request->pics,$product);

           

            DB::commit();

            return redirect()->route('admin.product.index')->with('success', 'Product Successfully Added!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Something went wrong !!')->withInput($request->all());
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin.product.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Product $product)
    {
        $product->load('pics');

        return view('admin.product.create_edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(ProductRequest $request, Product $product)
    {
        $slug = Str::slug($request->name);
        // Check if the slug exists for any other product (excluding the current one being updated)
        if (Product::where('slug', $slug)->where('id', '<>', $product->id)->exists()) {
            return back()->with('error', 'Name already exists!!')->withInput($request->all());
        }
    
        try {
            DB::beginTransaction();
    
            // Delete previous thumbnail if the request has a new one
            if ($request->hasFile('thumbnail')) {
                $directory = 'public/product/thumbnail';
                if (!Storage::exists($directory)) {
                    Storage::makeDirectory($directory, 0755, true);
                }
    
                // Delete the previous thumbnail
                if ($product->thumbnail) {
                    Storage::delete('public/' . $product->thumbnail);
                }
    
                $thumbnailName = 'thumbnail_'.time().mt_rand(1, 10).'.'.$request->file('thumbnail')->getClientOriginalExtension();
                $product->thumbnail = $request->file('thumbnail')->storeAs('product/thumbnail', $thumbnailName, 'public');
            }
    
            $product = $this->save($request, $product);
    
            // Call the function to delete old pictures if request has new ones
            if (!empty($request->pics) && is_array($request->pics)) {
                $this->deletePictures($product);
                $this->savePictures($request->pics, $product);
            }
    
          
    
            DB::commit();
    
            return redirect()->route('admin.product.index')->with('success', 'Product Successfully Updated!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Something went wrong!!')->withInput($request->all());
        }
    }
    
    // Function to delete old pictures
    private function deletePictures(Product $product)
    {
        foreach ($product->pics as $pic) {
            // Delete the picture file from storage
            if ($pic->url) {
                Storage::delete('public/' . $pic->url);
            }
            // Delete the picture record from the database
            $pic->delete();
        }
    }
    


    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Product $product)
    {
        try {
            DB::beginTransaction();
            $this->deletePictures($product);
            // Delete the thumbnail from storage
            Storage::disk('public')->delete($product->thumbnail);

            // Delete the product
            $product->delete();

            DB::commit();

            return response()->json([
                'success' => 1,
                'message' => 'Deleted successfully'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => 0,
                'message' => 'Something went wrong'
            ]);
        }
    }


    public function save($request, $product)
    {
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->description = $request->description;
        $product->price = $request->price;
        $product->weight = $request->weight;
        $product->box = $request->box;
        $product->save();
        return $product;
    }

    function savePictures($pics,$product)
    {
        $directory = 'public/product/images';
        if (!Storage::exists($directory)) {
            Storage::makeDirectory($directory, 0755, true);
        }
        foreach ($pics as $pic) {
            $name = 'picture_'.time().mt_rand(1,10).'.'. $pic->getClientOriginalExtension();
       
            $productPic  = new ProductImage();
            $productPic->product_id = $product->id;
            $productPic->image = $pic->storeAs('product/images',$name,'public');
            $productPic->save();          
        }

    }


}
