@extends('admin.share.master_page')

@section('noi_dung')
<div class="row" id="app">
    <div class="col-md-12 mt-1">
        <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTKAdmin">Thêm Mới Tài Khoản Admin</div>
        <div class="modal fade" id="addTKAdmin" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-5 px-sm-5 pt-50">
                        <div class="text-center mb-2">
                            <h1 class="mb-1">Thêm Mới Tài Khoản Admin</h1>
                        </div>
                        <form v-on:submit.prevent="addTKAdmin" id="formdata" class="row gy-1 pt-75">
                            <div class="col-md-6">
                                <label class="form-label">Họ Lót</label>
                                <input type="text" id="ho_lot" name="ho_lot" class="form-control"/>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tên</label>
                                <input type="text" id="ten" name="ten" class="form-control"/>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control"/>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Mật Khẩu</label>
                                <input type="password" id="password" name="password" class="form-control"/>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Nhập Lại Mật Khẩu</label>
                                <input type="password" id="re_password" name="re_password" class="form-control"/>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Ngày Sinh</label>
                                <input type="date" id="ngay_sinh" name="ngay_sinh" class="form-control"/>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Số Điện Thoại</label>
                                <input type="text" id="so_dien_thoai" name="so_dien_thoai" class="form-control"/>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Địa Chỉ</label>
                                <input type="text" id="dia_chi" name="dia_chi" class="form-control"/>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Giới Tính</label>
                                <select  id="gioi_tinh" name="gioi_tinh" class="form-control">
                                    <option value="0">Nữ</option>
                                    <option value="1">Nam</option>
                                    <option value="2">Khác</option>
                                </select>
                            </div>
                            <div class="col-12 text-center mt-2 pt-50">
                                <button type="submit" class="btn btn-primary me-1">Thêm Mới</button>
                                <button type="reset" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">Đóng</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 mt-1">
       <div class="card">
            <div class="card-header">
                <h3>DANH SÁCH TÀI KHOẢN ADMIN CÓ TRÊN HỆ THỐNG</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Họ Và Tên</th>
                            <th class="text-center">Ngày Sinh</th>
                            <th class="text-center">Địa Chỉ</th>
                            <th class="text-center">Giới Tính</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       <template v-for="(v, k) in listdata">
                            <tr>
                                <td class="text-centern text-nowrap align-middle">@{{(k+1)}}</td>
                                <td class="text-centern text-nowrap align-middle">@{{v.email}}</td>
                                <td class="text-centern text-nowrap align-middle">@{{v.ho_va_ten}}</td>
                                <td class="text-centern text-nowrap align-middle">@{{v.ngay_sinh}}</td>
                                <td class="text-centern text-nowrap align-middle">@{{v.dia_chi}}</td>
                                <td class="text-centern text-nowrap align-middle">
                                    <template v-if="v.gioi_tinh == 0">
                                        <button class="btn btn-success">Nữ Giới</button>
                                    </template>
                                    <template v-if="v.gioi_tinh == 1">
                                        <button class="btn btn-success">Nam Giới</button>
                                    </template>
                                    <template  v-if="v.gioi_tinh == 2">
                                        <button class="btn btn-warning">Giới Tính Khác</button>
                                    </template>
                                </td>
                                <td class="text-centern text-nowrap align-middle">
                                    <button v-on:click="edit_tk = v" data-bs-toggle="modal" data-bs-target="#edit_tk" class="btn btn-info">Cập Nhật</button>
                                    <button v-on:click="delete_tk = v" data-bs-toggle="modal" data-bs-target="#delete_tk" class="btn btn-danger">Xoá Bỏ</button>
                                </td>
                            </tr>
                       </template>
                    </tbody>
                    <div class="modal fade" id="delete_tk" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                            <div class="modal-content">
                                <div class="modal-header bg-transparent">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body pb-5 px-sm-5 pt-50">
                                    <div class="text-center mb-2">
                                        <h1 class="mb-1">XOÁ PHÒNG</h1>
                                    </div>
                                        <div class="col-12 text-center mt-2 pt-50">
                                            <p>Bạn có chắc chắn là sẽ xoá phòng của  <b style="color: red">@{{delete_tk.ten_phong}}</b> này hay không ?</p>
                                        </div>
                                        <div class="col-12 text-center mt-2 pt-50">
                                            <button v-on:click="deleteADMIN()" type="submit" class="btn btn-primary me-1">Đồng Ý Xoá</button>
                                            <button type="reset" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">Đóng</button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="edit_tk" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                            <div class="modal-content">
                                <div class="modal-header bg-transparent">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body pb-5 px-sm-5 pt-50">
                                    <div class="text-center mb-2">
                                        <h1 class="mb-1">Cập Nhật Thông Tin Phòng</h1>
                                    </div>
                                    <form v-on:submit.prevent="updateTaiKhoan()" id="formdata" class="row gy-1 pt-75">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label">Họ Lót</label>
                                                <input type="text" id="ho_lot" v-model="edit_tk.ho_lot" class="form-control"/>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Tên</label>
                                                <input type="text" id="ten" v-model="edit_tk.ten" class="form-control"/>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">Email</label>
                                                <input type="email" id="email" v-model="edit_tk.email" class="form-control"/>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Mật Khẩu</label>
                                                <input type="password" id="password" v-model="edit_tk.password" class="form-control"/>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Nhập Lại Mật Khẩu</label>
                                                <input type="password" id="re_password" v-model="edit_tk.re_password" class="form-control"/>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Ngày Sinh</label>
                                                <input type="date" id="ngay_sinh" v-model="edit_tk.ngay_sinh" class="form-control"/>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Số Điện Thoại</label>
                                                <input type="text" id="so_dien_thoai" v-model="edit_tk.so_dien_thoai" class="form-control"/>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Địa Chỉ</label>
                                                <input type="text" id="dia_chi" v-model="edit_tk.dia_chi" class="form-control"/>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Giới Tính</label>
                                                <select  id="gioi_tinh" v-model="edit_tk.gioi_tinh" class="form-control">
                                                    <option value="0">Nữ</option>
                                                    <option value="1">Nam</option>
                                                    <option value="2">Khác</option>
                                                </select>
                                            </div>
                                            <div class="col-12 text-center mt-2 pt-50">
                                                <button v-on:click="updateTaiKhoan()" type="submit" class="btn btn-primary me-1">Cập Nhật</button>
                                                <button type="reset" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">Đóng</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </table>
            </div>
       </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        new Vue({
            el      :   '#app',
            data    :   {
                listdata        : [],
                delete_tk       : {},
                edit_tk         : {},
            },
            created()   {
                this.loadData();
            },
            methods :   {
                addTKAdmin() {
                    var paramObj = {};
                    $.each($('#formdata').serializeArray(), function(_, kv) {
                        if (paramObj.hasOwnProperty(kv.name)) {
                            paramObj[kv.name] = $.makeArray(paramObj[kv.name]);
                            paramObj[kv.name].push(kv.value);
                        } else {
                            paramObj[kv.name] = kv.value;
                        }
                    });

                    axios
                        .post('/admin/tai-khoan/create', paramObj)
                        .then((res) => {
                            if(res.data.status == true) {
                                toastr.success(res.data.message);
                                $('#addTKAdmin').modal('hide');
                                this.loadData();
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },

                loadData() {
                    axios
                        .get('/admin/tai-khoan/data')
                        .then((res) => {
                            if(res.data.status) {
                                this.listdata = res.data.data;
                            }
                        });
                },
                deleteADMIN() {
                    axios
                        .post('/admin/tai-khoan/delete', this.delete_tk)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message);
                                $('#delete_tk').modal('hide');
                                this.loadData();

                            } else {
                                toastr.error("Đã xảy ra lỗi");
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                updateTaiKhoan() {
                    axios
                        .post('/admin/tai-khoan/update', this.edit_tk)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message);
                                $('#edit_tk').modal('hide');
                                this.loadData();
                            } else {
                                toastr.error("Đã xảy ra lỗi gì đó");
                                $('#edit_tk').modal('hide');
                                this.loadData();
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },

            },
        });
    </script>
@endsection
