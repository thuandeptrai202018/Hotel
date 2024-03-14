@extends('admin.share.master_page')

@section('noi_dung')
<div class="row" id="app">
    <div class="col-md-12 mt-1">
        <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGiaPhong">Thêm Mới Giá Phòng</div>
        <div class="modal fade" id="addGiaPhong" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-5 px-sm-5 pt-50">
                        <div class="text-center mb-2">
                            <h1 class="mb-1">Thêm Mới Giá Phòng</h1>
                            <p>Bạn vui lòng nhập đầy đủ giá của phòng.</p>
                        </div>
                        <form v-on:submit.prevent="addGiaPhong" id="formdata" class="row gy-1 pt-75">
                            <div class="col-md-12">
                                <label class="form-label">Tên Phòng</label>
                                <select name="ma_phong" id="ma_phong" class="form-control">
                                    <option value="0">Root</option>
                                    <template v-for="(v, k) in list_ten_phong">
                                        <option v-bind:value="v.id">@{{v.ten_phong}}</option>
                                    </template>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Tên Loại Phòng</label>
                                <select name="ma_loai_phong" id="ma_loai_phong" class="form-control">
                                    <option value="0">Root</option>
                                    <template v-for="(v, k) in list_LP">
                                        <option v-bind:value="v.id">@{{v.ten_loai_phong}}</option>
                                    </template>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Giá Theo Giờ</label>
                                <input type="number" id="gia_theo_gio" name="gia_theo_gio" class="form-control"/>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Giá Theo Ngày</label>
                                <input type="number" id="gia_theo_ngay" name="gia_theo_ngay" class="form-control"/>
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
                <h3>DANH SÁCH GIÁ PHÒNG CÓ TRÊN HỆ THỐNG</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên Phòng</th>
                            <th>Tên Loại Phòng</th>
                            <th>Giá Theo Giờ</th>
                            <th>Giá Theo Ngày</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       <template v-for="(v, k) in listdata">
                            <tr>
                                <td>@{{(k+1)}}</td>
                                <td>@{{v.ten_phong}}</td>
                                <td>@{{v.ten_loai_phong}}</td>
                                <td>@{{v.gia_theo_gio}}</td>
                                <td>@{{v.gia_theo_ngay}}</td>
                                <td>
                                    <button v-on:click="edit_GP = v" data-bs-toggle="modal" data-bs-target="#updateLP" class="btn btn-info">Cập Nhật</button>
                                    <button v-on:click="delete_GP = v" data-bs-toggle="modal" data-bs-target="#delete_GP" class="btn btn-danger">Xoá Bỏ</button>
                                </td>
                            </tr>
                       </template>
                    </tbody>
                    <div class="modal fade" id="delete_GP" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                            <div class="modal-content">
                                <div class="modal-header bg-transparent">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body pb-5 px-sm-5 pt-50">
                                    <div class="text-center mb-2">
                                        <h1 class="mb-1">XOÁ GIÁ PHÒNG</h1>
                                    </div>
                                        <div class="col-12 text-center mt-2 pt-50">
                                            <p>Bạn có chắc chắn là sẽ xoá giá phòng của  <b style="color: red">@{{delete_GP.ten_loai_phong}}</b> này hay không ?</p>
                                        </div>
                                        <div class="col-12 text-center mt-2 pt-50">
                                            <button v-on:click="deleteGiaPhong()" type="submit" class="btn btn-primary me-1">Đồng Ý Xoá</button>
                                            <button type="reset" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">Đóng</button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="updateLP" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                            <div class="modal-content">
                                <div class="modal-header bg-transparent">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body pb-5 px-sm-5 pt-50">
                                    <div class="text-center mb-2">
                                        <h1 class="mb-1">Cập Nhật Thông Tin Giá Phòng</h1>
                                    </div>
                                    <form v-on:submit.prevent="updateGiaPhong()" id="formdata" class="row gy-1 pt-75">
                                        <div class="col-md-12">
                                            <label class="form-label">Tên Phòng</label>
                                            <select v-model="edit_GP.ma_phong" id="ma_phong" class="form-control">
                                                <option value="0">Root</option>
                                                <template v-for="(v, k) in list_ten_phong">
                                                    <option v-bind:value="v.id">@{{v.ten_phong}}</option>
                                                </template>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Tên Loại Phòng</label>
                                            <select v-model="edit_GP.ma_loai_phong" id="ma_loai_phong" class="form-control">
                                                <option value="0">Root</option>
                                                <template v-for="(v, k) in list_LP">
                                                    <option v-bind:value="v.id">@{{v.ten_loai_phong}}</option>
                                                </template>
                                            </select>
                                        </div>

                                        <div class="col-md-12">
                                            <label class="form-label">Giá Theo Giờ</label>
                                            <input type="number" id="gia_theo_gio" v-model="edit_GP.gia_theo_gio" class="form-control"/>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Giá Theo Ngày</label>
                                            <input type="number" id="gia_theo_ngay" v-model="edit_GP.gia_theo_ngay" class="form-control"/>
                                        </div>
                                        <div class="col-12 text-center mt-2 pt-50">
                                            <button v-on:click="updateGiaPhong()" type="submit" class="btn btn-primary me-1">Cập Nhật</button>
                                            <button type="reset" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">Đóng</button>
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
                delete_GP       : {},
                edit_GP         : {},
                list_LP         : [],
                list_ten_phong  : [],
            },
            created()   {
                this.loadData();
                this.loadLoaiPhong();
                this.loadTenPhong();
            },
            methods :   {

                loadLoaiPhong() {
                    axios
                        .get('/admin/loai-phong/data')
                        .then((res) => {
                            this.list_LP = res.data.data;
                        });
                },
                loadTenPhong() {
                    axios
                        .get('/admin/phong/data')
                        .then((res) => {
                            this.list_ten_phong = res.data.data;
                        });
                },
                addGiaPhong() {
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
                        .post('/admin/gia-phong/create', paramObj)
                        .then((res) => {
                            if(res.data.status == true) {
                                toastr.success(res.data.message);
                                $('#addGiaPhong').modal('hide');
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
                        .get('/admin/gia-phong/data')
                        .then((res) => {
                            if(res.data.status) {
                                this.listdata = res.data.data;
                            }
                        });
                },
                deleteGiaPhong() {
                    axios
                        .post('/admin/gia-phong/delete', this.delete_GP)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message);
                                $('#delete_GP').modal('hide');
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
                updateGiaPhong() {
                    axios
                        .post('/admin/gia-phong/update', this.edit_GP)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message);
                                $('#updateLP').modal('hide');
                                this.loadData();
                            } else {
                                toastr.error("Đã xảy ra lỗi gì đó");
                                $('#updateLP').modal('hide');
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
