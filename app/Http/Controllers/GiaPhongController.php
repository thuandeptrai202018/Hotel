<?php

namespace App\Http\Controllers;

use App\Models\GiaPhong;
use App\Models\LoaiPhong;
use Illuminate\Http\Request;

class GiaPhongController extends Controller
{
    public function index()
    {
        return view('admin.page.gia_phong.index');
    }

    public function data()
    {

        $data = GiaPhong::join('loai_phongs', 'gia_phongs.ma_loai_phong', 'loai_phongs.id')
                        ->join('phongs', 'gia_phongs.ma_phong', 'phongs.id')
                        ->select('gia_phongs.*', 'loai_phongs.ten_loai_phong', 'phongs.ten_phong')
                        ->get();

        return response()->json([
            'status'    =>  true,
            'data'      =>  $data,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        GiaPhong::create($data);

        return response()->json([
            'status'    => true,
            'message'   => 'Đã thêm mới giá phòng thành công',
        ]);
    }

    public function destroy(Request $request)
    {
        GiaPhong::where('id', $request->id)->first()->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá thành công giá phòng',
        ]);
    }

    public function update(Request $request)
    {
        $data       = $request->all();
        $loaiPhong  = GiaPhong::find($request->id);
        $loaiPhong->update($data);

        return response()->json([
            'status'    => true,
            'message'   => 'Đã cập nhật giá phòng thành công',
        ]);
    }
}
