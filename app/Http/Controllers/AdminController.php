<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.page.tai_khoan.index');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $data['ho_va_ten']  = $request->ho_lot . ' ' . $request->ten;
        $data['password']   = bcrypt($request->password);

        Admin::create($data);

        return response()->json([
            'status'    => true,
            'message'   => 'Đã thêm mới tài khoản admin thành công',
        ]);
    }

    public function data()
    {
        $data = Admin::get();

        return response()->json([
            'status'    =>  true,
            'data'      =>  $data,
        ]);
    }

    public function destroy(Request $request)
    {
        Admin::where('id', $request->id)->first()->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Đã xoá thành công tài khoản',
        ]);
    }


    public function update(Request $request)
    {
        $data   = $request->all();
        $admin  = Admin::find($request->id);
        $admin->update($data);

        return response()->json([
            'status'    => true,
            'message'   => 'Đã cập nhật phòng thành công',
        ]);

    }
}
