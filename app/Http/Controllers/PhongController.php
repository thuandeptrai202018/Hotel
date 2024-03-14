<?php

namespace App\Http\Controllers;

use App\Models\Phong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PhongController extends Controller
{
    public function index()
    {
        return view('admin.page.phong.index');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        Phong::create($data);

        return response()->json([
            'status'    =>  true,
            'message'   => 'Đã thêm mới thành công phòng',
        ]);
    }

    public function data()
    {
        $data = Phong::get();

        return response()->json([
            'status'    => true,
            'data'      => $data,
        ]);
    }

    public function destroy(Request $request)
    {
        Phong::where('id', $request->id)->first()->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá thành công phòng.',
        ]);
    }

    public function update(Request $request)
    {
        $data   = $request->all();
        $Phong  = Phong::find($request->id);
        $Phong->update($data);

        return response()->json([
            'status'    => true,
            'message'   => 'Đã cập nhật phòng thành công',
        ]);

    }
}
