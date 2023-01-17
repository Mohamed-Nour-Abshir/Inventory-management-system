<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Purchaseproduct;
use App\Models\Unit;
use App\Models\Warehouse;
use App\Models\Warehousestockqty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::with('orderdetail')->paginate(10);
        // dd($product);
        return view('admin.products.product-list', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = DB::table('products')->select('purchaseproduct_id')->get()->toArray();
        $productId = [];
        foreach ($products as $data) {
            array_push($productId, $data->purchaseproduct_id);
        }
        $purchaseproduct = Purchaseproduct::with('product')->whereNotIn('id', $productId)->get();
        $category = Category::all();
        $brand = Brand::all();
        $unit = Unit::all();
        $warehouse = Warehouse::all();
        return view('admin.products.product-create', compact('purchaseproduct', 'category', 'brand', 'unit', 'warehouse'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notification = [
            'message' => 'Product Add Successfully',
            'alert-type' => 'success',
        ];

        $request->validate([
            'supplier_name' => 'required',
            'purchase_price' => 'required',
            'sell_price' => 'required',
            'category' => 'required',
            'unit' => 'required',
            'brand' => 'required',
            'warehouse' => 'required',
        ]);


        $image = $request->file('file');
        $filename = $image->getClientOriginalName();
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(350, 350);
        $image_resize->save('products/' . $filename);

        $product = new Product([
            'purchaseproduct_id' => $request->get('purchaseproduct'),
            'product_name' => $request->get('product_name'),
            'products_id' => $request->get('products_id'),
            'supplier_name' => $request->get('supplier_name'),
            'purchase_price' => $request->get('purchase_price'),
            'sell_price' => $request->get('sell_price'),
            'image' => $filename,
            'product_code' => $request->get('product_code'),
            'quantity' => $request->get('quantity'),
            'category_id' => $request->get('category'),
            'unit_id' => $request->get('unit'),
            'brand_id' => $request->get('brand'),
            'warehouse_id' => $request->get('warehouse'),
            'status' => $request->get('status'),
        ]);
        // dd($product);
        $product->save();

        if ($request->warehouse_stockqty[0]) {
            foreach ($request->warehouse_name as $key => $data) {
                $warehousestockqty = new Warehousestockqty();

                $warehousestockqty->warehouse_name = $data;
                $warehousestockqty->warehouse_stockqty = $request->warehouse_stockqty[$key];
                $warehousestockqty->product_id = $product->id;

                $warehousestockqty->save();
            };
        }

        return redirect('home/product')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('category', 'brand', 'units', 'purchaseproduct', 'warehousestockqty', 'orderdetail')->where('products.id', $id)->first();
        $products = Product::with('warehousestockqty')->where('products.id', $id)->get();
        // dd($products);
        return view('admin.products.product-show', compact('product', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('category', 'brand', 'units', 'purchaseproduct', 'warehousestockqty')->where('products.id', $id)->first();
        $purchaseproduct = Purchaseproduct::all();
        $category = Category::all();
        $brand = Brand::all();
        $unit = Unit::all();
        $warehouse = Warehouse::all();
        return view('admin.products.product-edit', compact('product', 'purchaseproduct', 'category', 'brand', 'unit', 'warehouse'));
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
        $notification = [
            'message' => 'Product Update Successfully',
            'alert-type' => 'success',
        ];

        $product = Product::find($id);

        if ($request->hasfile('file')) {

            $image = $request->file('file');
            $filename = $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(350, 350);
            $image_resize->save('products/' . $filename);
            $product->image = $filename;
        }

        $product->purchaseproduct_id = $request->purchaseproduct;
        $product->supplier_name = $request->supplier_name;
        $product->purchase_price = $request->purchase_price;
        $product->sell_price = $request->sell_price;
        $product->product_code = $request->product_code;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category;
        $product->unit_id = $request->unit;
        $product->brand_id = $request->brand;
        $product->warehouse_id = $request->warehouse;

        $product->update();

        if ($request->warehouse_stockqty) {
            foreach ($request->warehouse_name as $key => $data) {
                $productID = NULL;
                if (isset($request->warehousestock_name[$key])) {
                    $productID = $request->warehousestock_name[$key];
                }
                Warehousestockqty::updateOrCreate(

                    ['id' => $productID],
                    [
                        'warehouse_name' => $request->warehouse_name[$key],
                        'warehouse_stockqty' => $request->warehouse_stockqty[$key],

                        'product_id' => $product->id,
                    ]
                );
            };
        }

        return redirect('home/product')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notification = [
            'message' => 'Product Delete successfully',
            'alert-type' => 'success',
        ];
        $order = Product::findOrFail($id);
        $order->delete();
        return redirect('home/product')->with($notification);
    }
}
