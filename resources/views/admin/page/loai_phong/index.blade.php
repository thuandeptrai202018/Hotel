@extends('admin.share.master_page')

@section('noi_dung')
<div class="row" id="app">
    <div class="col-md-12 mt-1">
        <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLoaiPhong">Thêm Mới Loại Phòng</div>
        <div class="modal fade" id="addLoaiPhong" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-5 px-sm-5 pt-50">
                        <div class="text-center mb-2">
                            <h1 class="mb-1">Thêm Mới Loại Phòng</h1>
                            <p>Bạn vui lòng nhập đầy đủ thông tin của phòng.</p>
                        </div>
                        <form v-on:submit.prevent="addLoaiPhong" id="formdata" class="row gy-1 pt-75">
                            <div class="col-md-12">
                                <label class="form-label">Tên Loại Phòng</label>
                                <input type="text" id="ten_loai_phong" name="ten_loai_phong" class="form-control"/>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Tên Loại Phòng</label>
                                <textarea class="form-control" name="trang_bi" id="trang_bi" cols="30" rows="5"></textarea>
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
                <h3>DANH SÁCH CÁC PHÒNG CÓ TRÊN HỆ THỐNG</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên Loại Phòng</th>
                            <th>Trang Bị</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       <template v-for="(v, k) in listdata">
                            <tr>
                                <td>@{{(k+1)}}</td>
                                <td>@{{v.ten_loai_phong}}</td>
                                <td>@{{v.trang_bi}}</td>
                                <td>
                                    <button v-on:click="edit_LP = v" data-bs-toggle="modal" data-bs-target="#updateLP" class="btn btn-info">Cập Nhật</button>
                                    <button v-on:click="deleteLP = v" data-bs-toggle="modal" data-bs-target="#deleteLP" class="btn btn-danger">Xoá Bỏ</button>
                                </td>
                            </tr>
                       </template>
                    </tbody>
                    <div class="modal fade" id="deleteLP" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                            <div class="modal-content">
                                <div class="modal-header bg-transparent">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body pb-5 px-sm-5 pt-50">
                                    <div class="text-center mb-2">
                                        <h1 class="mb-1">XOÁ LOẠI PHÒNG</h1>
                                    </div>
                                        <div class="col-12 text-center mt-2 pt-50">
                                            <p>Bạn có chắc chắn là sẽ xoá <b style="color: red">@{{deleteLP.ten_loai_phong}}</b> này hay không ?</p>
                                        </div>
                                        <div class="col-12 text-center mt-2 pt-50">
                                            <button v-on:click="deleteLoaiPhong()" type="submit" class="btn btn-primary me-1">Đồng Ý Xoá</button>
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
                                        <h1 class="mb-1">Cập Nhật Thông Tin Loại Phòng</h1>
                                    </div>
                                    <form v-on:submit.prevent="updateLoaiPhong()" id="formdata" class="row gy-1 pt-75">
                                        <div class="col-md-12">
                                            <label class="form-label">Tên Loại Phòng</label>
                                            <input type="text" id="ten_loai_phong" v-model="edit_LP.ten_loai_phong" class="form-control"/>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Tên Loại Phòng</label>
                                            <textarea class="form-control" v-model="edit_LP.trang_bi" id="trang_bi" cols="30" rows="5"></textarea>
                                        </div>
                                        <div class="col-12 text-center mt-2 pt-50">
                                            <button v-on:click="updateLoaiPhong()" type="submit" class="btn btn-primary me-1">Cập Nhật</button>
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
                deleteLP        : {},
                edit_LP        : {},
            },
            created()   {
                this.loadData();
            },
            methods :   {
                addLoaiPhong() {
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
                        .post('/admin/loai-phong/create', paramObj)
                        .then((res) => {
                            if(res.data.status == true) {
                                toastr.success(res.data.message);
                                $('#addLoaiPhong').modal('hide');
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
                        .get('/admin/loai-phong/data')
                        .then((res) => {
                            if(res.data.status) {
                                this.listdata = res.data.data;
                            }
                        });
                },
                deleteLoaiPhong() {
                    axios
                        .post('/admin/loai-phong/delete', this.deleteLP)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message);
                                $('#deleteLP').modal('hide');
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
                updateLoaiPhong() {
                    axios
                        .post('/admin/loai-phong/update', this.edit_LP)
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
