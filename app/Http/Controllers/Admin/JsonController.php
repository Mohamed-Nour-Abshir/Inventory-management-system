<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Unit;

class JsonController extends Controller
{
    public function categoryList(Request $request)
    {
        $parent_id = $request->category_id;
        $category = Category::where('id', $parent_id)
            ->with('supplierproduct')
            ->get();
        return response()->json([
            'supplierproduct' => $category
        ]);
    }

    public function brandName(Request $request)
    {
        $brand_id = $request->brand_id;
        $brand = Brand::where('id', $brand_id)
            ->with('supplierproduct')
            ->get();
        return response()->json([
            'supplierproduct' => $brand
        ]);
    }

    public function unitProduct(Request $request)
    {
        $unit_id = $request->unit_id;
        $unit = Unit::where('id', $unit_id)
            ->with('supplierproduct')
            ->get();
        return response()->json([
            'supplierproduct' => $unit
        ]);
    }
}
