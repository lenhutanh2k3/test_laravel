<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::all();
        return view('products.index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.insert');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // Kiểm tra nếu có file hình ảnh được tải lên
        if ($request->hasFile('hinh_anh')) {
            // Lưu file hình ảnh vào thư mục 'storage/app/public/cay'
            $filePath = $request->file('hinh_anh')->store('cay', 'public'); // Lưu vào 'storage/app/public/cay'

            // Lưu đường dẫn file hình ảnh vào cơ sở dữ liệu
            Product::create([
                'ten_san_pham' => $request->ten_san_pham,
                'mo_ta' => $request->mo_ta,
                'gia' => $request->gia,
                'hinh_anh' => $filePath, // Đường dẫn file hình ảnh
            ]);
        }

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được tạo thành công.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);

        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $filePath = $request->file('hinh_anh')->store('cay', 'public');
        $product = Product::find($id);
        $product->ten_san_pham = $request->ten_san_pham;
        $product->gia = $request->gia;
        $product->mo_ta = $request->mo_ta;
        $product->hinh_anh = $filePath;;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được cập nhật.');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được xoa thành công.');

    }
}
