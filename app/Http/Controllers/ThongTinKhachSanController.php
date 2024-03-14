<?php

namespace App\Http\Controllers;

use App\Models\ThongTinKhachSan;
use Illuminate\Http\Request;

class ThongTinKhachSanController extends Controller
{
    public function index()
    {
        return view('admin.page.thong_tin_khach_san.index');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        ThongTinKhachSan::create([
            'ten_khach_san'     => $request->ten_khach_san,
            'dia_chi'           => $request->dia_chi,
            'mo_ta'             => $request->mo_ta,
            'thanh_pho'         => $request->thanh_pho,
            'quoc_gia'          => $request->quoc_gia,
            'so_dien_thoai'     => $request->so_dien_thoai,
            'email'             => $request->email,
            'nguoi_dai_dien'    => $request->nguoi_dai_dien,
            'is_open'           => $request->is_open,
            'website'           => $request->website,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Đã thêm mới chuyên mục thành công'
        ]);
    }

    public function data()
    {
        $data = ThongTinKhachSan::get();

        return response()->json([
            'list' => $data
        ]);
    }

}
