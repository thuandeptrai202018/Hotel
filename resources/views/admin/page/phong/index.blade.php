@extends('admin.share.master_page')

@section('noi_dung')
<div class="row" id="app">
    <div class="col-md-12 mt-1">
        <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPhong">Thêm Mới Phòng</div>
        <div class="modal fade" id="addPhong" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-5 px-sm-5 pt-50">
                        <div class="text-center mb-2">
                            <h1 class="mb-1">Thêm Mới Phòng</h1>
                        </div>
                        <form v-on:submit.prevent="addPhong" id="formdata" class="row gy-1 pt-75">
                            <div class="col-md-12">
                                <label class="form-label">Tên Phòng</label>
                                <input type="text" id="ten_phong" name="ten_phong" class="form-control"/>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Slug Phòng</label>
                                <input type="text" id="slug_phong" name="slug_phong" class="form-control"/>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Mô tả</label>
                                <input type="text" id="mo_ta" name="mo_ta" class="form-control"/>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Trạng Thái</label>
                                <select name="trang_thai" id="trang_thai" class="form-control">
                                    <option value="0">Tạm Ngưng Hoạt Động</option>
                                    <option selected value="1">Sẳn Sàng Hoạt Động</option>
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
                <h3>DANH SÁCH PHÒNG CÓ TRÊN HỆ THỐNG</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Tên Phòng</th>
                            <th class="text-center">Slug Phòng</th>
                            <th class="text-center">Mô Tả</th>
                            <th class="text-center">Trạng Thái</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       <template v-for="(v, k) in listdata">
                            <tr>
                                <td class="text-centern text-nowrap align-middle">@{{(k+1)}}</td>
                                <td class="text-centern text-nowrap align-middle">@{{v.ten_phong}}</td>
                                <td class="text-centern text-nowrap align-middle">@{{v.slug_phong}}</td>
                                <td class="text-centern text-nowrap align-middle">@{{v.mo_ta}}</td>
                                <td class="text-centern text-nowrap align-middle">
                                    <template v-if="v.trang_thai == 1">
                                        <button class="btn btn-success">Sẳn Sàng Kinh Doanh</button>
                                    </template>
                                    <template v-else>
                                        <button class="btn btn-warning">Tạm Ngưng Kinh Doanh</button>
                                    </template>
                                </td>
                                <td class="text-centern text-nowrap align-middle">
                                    <button v-on:click="edit_phong = v" data-bs-toggle="modal" data-bs-target="#editPhong" class="btn btn-info">Cập Nhật</button>
                                    <button v-on:click="deletePhong = v" data-bs-toggle="modal" data-bs-target="#deletePhong" class="btn btn-danger">Xoá Bỏ</button>
                                </td>
                            </tr>
                       </template>
                    </tbody>
                    <div class="modal fade" id="deletePhong" tabindex="-1" aria-hidden="true">
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
                                            <p>Bạn có chắc chắn là sẽ xoá phòng của  <b style="color: red">@{{deletePhong.ten_phong}}</b> này hay không ?</p>
                                        </div>
                                        <div class="col-12 text-center mt-2 pt-50">
                                            <button v-on:click="deletePHONG()" type="submit" class="btn btn-primary me-1">Đồng Ý Xoá</button>
                                            <button type="reset" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">Đóng</button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="editPhong" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                            <div class="modal-content">
                                <div class="modal-header bg-transparent">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body pb-5 px-sm-5 pt-50">
                                    <div class="text-center mb-2">
                                        <h1 class="mb-1">Cập Nhật Thông Tin Phòng</h1>
                                    </div>
                                    <form v-on:submit.prevent="updatePhong()" id="formdata" class="row gy-1 pt-75">
                                        <div class="col-md-12">
                                            <label class="form-label">Tên Phòng</label>
                                            <input type="text" id="ten_phong" v-model="edit_phong.ten_phong" class="form-control"/>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Slug Phòng</label>
                                            <input type="text" id="slug_phong" v-model="edit_phong.slug_phong" class="form-control"/>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Mô tả</label>
                                            <input type="text" id="mo_ta" v-model="edit_phong.mo_ta" class="form-control"/>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Trạng Thái</label>
                                            <select v-model="edit_phong.trang_thai" id="trang_thai" class="form-control">
                                                <option value="0">Tạm Ngưng Hoạt Động</option>
                                                <option selected value="1">Sẳn Sàng Hoạt Động</option>
                                            </select>
                                        </div>
                                        <div class="col-12 text-center mt-2 pt-50">
                                            <button v-on:click="updatePhong()" type="submit" class="btn btn-primary me-1">Cập Nhật</button>
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
                deletePhong     : {},
                edit_phong      : {},
            },
            created()   {
                this.loadData();
            },
            methods :   {
                addPhong() {
                    var paramObj = {};
                    $.each($('#formdata').serializeArray(), function(_, kv) {
                        if (paramObj.hasOwnProperty(kv.name)) {
                            paramObj[kv.name] = $.makeArray(paramObj[kv.name]);
                            paramObj[kv.name].push(kv.value);
                        } else {
                            paramObj[kv.name] = kv.value;
                        }
                        paramObj['mo_ta'] = CKEDITOR.instances['mo_ta'].getData();
                    });

                    axios
                        .post('/admin/phong/create', paramObj)
                        .then((res) => {
                            if(res.data.status == true) {
                                toastr.success(res.data.message);
                                $('#addPhong').modal('hide');
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
                        .get('/admin/phong/data')
                        .then((res) => {
                            if(res.data.status) {
                                this.listdata = res.data.data;
                            }
                        });
                },
                deletePHONG() {
                    axios
                        .post('/admin/phong/delete', this.deletePhong)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message);
                                $('#deletePhong').modal('hide');
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
                updatePhong() {
                    axios
                        .post('/admin/phong/update', this.edit_phong)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message);
                                $('#editPhong').modal('hide');
                                this.loadData();
                            } else {
                                toastr.error("Đã xảy ra lỗi gì đó");
                                $('#editPhong').modal('hide');
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.19.1/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('mo_ta');
        // CKEDITOR.replace('mo_ta_edit');
    </script>
@endsection
