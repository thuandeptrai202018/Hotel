@extends('admin.share.master_page')

@section('noi_dung')
    <div class="row">
        <div class="col-md-12">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_modal_ttks">
                Thêm Mới Thông Tin Khách Sạn
            </button>
            <div class="modal fade" id="add_modal_ttks" tabindex="-1" aria-labelledby="twoFactorAuthTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg two-factor-auth">
                    <div class="modal-content">
                        <div class="modal-header bg-transparent">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body pb-5 px-sm-5 mx-50">
                            <h1 class="text-center mb-1" id="twoFactorAuthTitle">Thêm Mới Thông Tin Khách Sạn</h1>
                            <div class="custom-options-checkable">
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="form-label">Tên Khách Sạn</label>
                                        <input name="ten_khach_san" id="ten_khach_san" class="form-control form-control-lg" type="text" placeholder="Nguyễn Văn A" />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label">Địa Chỉ</label>
                                        <input name="dia_chi" id="dia_chi" class="form-control form-control-lg" type="text" placeholder="Điện Bàn - Quảng Nam" />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label">Mô Tả</label>
                                        <input name="mo_ta" id="mo_ta" class="form-control form-control-lg" type="text" placeholder="" />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label">Thành Phố</label>
                                        <input name="thanh_pho" id="thanh_pho" class="form-control form-control-lg" type="text" placeholder="" />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label">Quốc Gia</label>
                                        <input name="quoc_gia" id="quoc_gia" class="form-control form-control-lg" type="text" placeholder="" />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label">Số Điện Thoại</label>
                                        <input name="so_dien_thoai" id="so_dien_thoai" class="form-control form-control-lg" type="number" placeholder="" />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label">Email</label>
                                        <input name="email" id="email" class="form-control form-control-lg" type="email" placeholder="" />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label">Người Đại Diện</label>
                                        <input name="nguoi_dai_dien" id="nguoi_dai_dien" class="form-control form-control-lg" type="text" placeholder="" />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label">Trạng Thái</label>
                                        <select class="form-select form-select-lg" id="is_open" name="is_open">
                                            <option value="1">Còn Hoạt Động</option>
                                            <option value="0">Tạm Ngừng Kinh Doanh</option>
                                        </select>
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label">Website</label>
                                        <input name="website" id="website" class="form-control form-control-lg" type="text" placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <button id="themMoi" type="button" class="btn btn-outline-success round">Thêm Mới</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-2">
            <div class="table-responsive" style="height: 250px">
                <table class="table" id="table_ttks">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-center align-middle text-nowrap">Tên Khách Sạn</th>
                            <th class="text-center align-middle text-nowrap">Địa Chỉ</th>
                            <th class="text-center align-middle text-nowrap">Mô Tả</th>
                            <th class="text-center align-middle text-nowrap">Thành Phố</th>
                            <th class="text-center align-middle text-nowrap">Quốc Gia</th>
                            <th class="text-center align-middle text-nowrap">Số Điện Thoại</th>
                            <th class="text-center align-middle text-nowrap">Email</th>
                            <th class="text-center align-middle text-nowrap">Người Đại Diện</th>
                            <th class="text-center align-middle text-nowrap">Trạng Thái</th>
                            <th class="text-center align-middle text-nowrap">Website</th>
                            <th class="text-center align-middle text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center align-middle text-nowrap">1</td>
                            <td class="text-center align-middle text-nowrap">Trần Quốc Luận</td>
                            <td class="text-center align-middle text-nowrap">Thái Cẩm</td>
                            <td class="text-center align-middle text-nowrap">I</td>
                            <td class="text-center align-middle text-nowrap">Quảng Nam</td>
                            <td class="text-center align-middle text-nowrap">Việt Nam</td>
                            <td class="text-center align-middle text-nowrap">0707535864</td>
                            <td class="text-center align-middle text-nowrap">tranquocluan.qna@gmail.com</td>
                            <td class="text-center align-middle text-nowrap">Mr Luận</td>
                            <td class="text-center align-middle text-nowrap">1111111111111111111111</td>
                            <td class="text-center align-middle text-nowrap"><span class="badge rounded-pill badge-light-primary me-1">Active</span></td>
                            <td class="text-center align-middle text-nowrap">
                                <button class="btn btn-info">Cập Nhật</button>
                                <button class="btn btn-danger">Xoá Bỏ</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {

            $("#themMoi").click(function() {
                var ten_khach_san   = $("#ten_khach_san").val();
                var dia_chi         = $("#dia_chi").val();
                var mo_ta           = $("#mo_ta").val();
                var thanh_pho       = $("#thanh_pho").val();
                var quoc_gia        = $("#quoc_gia").val();
                var so_dien_thoai   = $("#so_dien_thoai").val();
                var email           = $("#email").val();
                var nguoi_dai_dien  = $("#nguoi_dai_dien").val();
                var is_open         = $("#is_open").val();
                var website         = $("#website").val();

                var payload = {
                    'ten_khach_san'   : ten_khach_san,
                    'dia_chi'         : dia_chi,
                    'mo_ta'           : mo_ta,
                    'thanh_pho'       : thanh_pho,
                    'quoc_gia'        : quoc_gia,
                    'so_dien_thoai'   : so_dien_thoai,
                    'email'           : email,
                    'nguoi_dai_dien'  : nguoi_dai_dien,
                    'is_open'         : is_open,
                    'website'         : website,
                };

                $.ajax({
                    'url'       :   '/admin/thong-tin-khach-san/create',
                    'type'      :   'post',
                    'data'      :   payload,
                    'success'   :   function(res) {
                        if(res.status) {
                            toastr.success("Đã cập nhật chuyên mục thành công!", "success");
                            // hienThiTable();
                            $('#add_modal_ttks').modal('hide');
                        } else {
                            toastr.error("Có lỗi không mong muốn xảy ra!");
                        }
                    },
                });
            });

            hienThiTable();

            function hienThiTable()
            {
                $.ajax({
                    'url'       :   '/admin/thong-tin-khach-san/data',
                    'type'      :   'get',
                    'success'   :   function(res) {
                        var noi_dung = '';
                        $.each(res.list, function(k, v) {
                            noi_dung += '<tr>';
                            noi_dung += '<td class="text-center align-middle text-nowrap">'+ (k + 1) +'</td>';
                            noi_dung += '<td class="text-center align-middle text-nowrap">'+ (v.ten_khach_san) +'</td>';
                            noi_dung += '<td class="text-center align-middle text-nowrap">'+ (v.dia_chi) +'</td>';
                            noi_dung += '<td class="text-center align-middle text-nowrap">'+ (v.mo_ta) +'</td>';
                            noi_dung += '<td class="text-center align-middle text-nowrap">'+ (v.thanh_pho) +'</td>';
                            noi_dung += '<td class="text-center align-middle text-nowrap">'+ (v.quoc_gia) +'</td>';
                            noi_dung += '<td class="text-center align-middle text-nowrap">'+ (v.so_dien_thoai) +'</td>';
                            noi_dung += '<td class="text-center align-middle text-nowrap">'+ (v.email) +'</td>';
                            noi_dung += '<td class="text-center align-middle text-nowrap">'+ (v.nguoi_dai_dien) +'</td>';
                            noi_dung += '<td class="text-center align-middle text-nowrap"><span class="badge rounded-pill badge-light-primary me-1">'+ (v.is_open) +'</span></td>';
                            noi_dung += '<td class="text-center align-middle text-nowrap">'+ (v.website) +'</td>';
                            noi_dung += '<td class="text-center align-middle text-nowrap">';
                            noi_dung += '<button class="btn btn-info" style="margin-right: 5px">Cập Nhật</button>';
                            noi_dung += '<button class="btn btn-danger">Xoá Bỏ</button>';
                            noi_dung += '</td>';
                            noi_dung += '</tr>';
                        });
                        $("#table_ttks tbody").html(noi_dung);
                    },
                });
            }

        });
    </script>
@endsection
