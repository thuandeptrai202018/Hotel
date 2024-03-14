<?php

namespace App\Http\Controllers;

use App\Models\LoaiPhong;
use Illuminate\Http\Request;

class LoaiPhongController extends Controller
{

    public function index()
    {
        return view('admin.page.loai_phong.index');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        LoaiPhong::create($data);

        return response()->json([
            'status'    => true,
            'message'   => "Đã Thêm Mới Thành Công Loại Phònsg",
        ]);
    }

    public function data()
    {
        $data = LoaiPhong::get();

        return response()->json([
            'status'    => true,
            'data'      => $data,
        ]);
    }

    public function destroy(Request $request)
    {
        LoaiPhong::where('id', $request->id)->first()->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá thành công loại phòng',
        ]);
    }

    public function update(Request $request)
    {
        $data       = $request->all();
        $loaiPhong  = LoaiPhong::find($request->id);
        $loaiPhong->update($data);

        return response()->json([
            'status'    => true,
            'message'   => 'Đã cập nhật loại phòng thành công',
        ]);
    }

}
