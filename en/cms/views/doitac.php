<script type="text/javascript" src="js/doitac.js"></script>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Quản lý đối tác</strong>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#largeModal"
                                onclick="add()"><i class="fa fa-plus"></i>&nbsp; Add
                        </button>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên đối tác</th>
                                <th>Ảnh đại diện</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Hiển thị</th>
                                <th>Link ảnh</th>
                                <th>Trạng thái</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            foreach ($this->data as $row) {
                                echo '<tr>
                                              <td>' . $row['id'] . '</td>
                                              <td>' . $row['ten'] . '</td>
                                              <td>' . $row['hinhanh'] . '</td>
                                              <td>' . $row['dien_thoai'] . '</td>
                                              <td>' . $row['dia_chi'] . '</td>
                                               <td>' . $row['hien_thi'] . '</td>
                                               <td>' . $row['hinh_anh'] . '</td>';
                                if ($row['hien_thi'] == 1) {
                                    echo '<td><a href="javascript:void(0)"  onclick="hienthi(' . $row['id'] . ')"><span class="badge badge-pill badge-success">&nbsp;Bật&nbsp;</span></a></td>';
                                } else {
                                    echo '<td><a href="javascript:void(0)"  onclick="hienthi(' . $row['id'] . ')"><span class="badge badge-pill badge-danger">&nbsp;Tắt&nbsp;</span></a></td>';
                                }
                                echo '<td><a href="javascript:void(0)" data-toggle="modal" data-target="#largeModal" onclick="edit(' . $i . ')"><i class="fa fa-edit"></i></a></td>
                                              <td><a href="javascript:void(0)" onclick="del(' . $row['id'] . ')"><i class="fa fa-trash-o"></i></a>  </td>
                                 <td>' . $row['url'] . '</td>
                                          </tr>';
                                $i++;
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Thông tin đối tác</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-client" method="post" enctype="multipart/form-data" action="doitac/save">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row form-group">
                                <input type="hidden" id="id" name="id">
                                <div class="col col-md-3"><label for="name" class=" form-control-label">Tên đối
                                        tác</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="name" name="name" placeholder="Tên đối tác"
                                           class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="hinhanh" class=" form-control-label">Link
                                        ảnh</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="hinhanh" name="hinhanh" placeholder="Link ảnh"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="hinhanh" class=" form-control-label">Hiển
                                        thị</label></div>
                                <div class="col-1 col-md-2">
                                    <input type="checkbox" style="float: left;" id="hienthi" name="hienthi" value="1"
                                           placeholder="Hiển thị trang chủ"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="vitri" class=" form-control-label">Số điện
                                        thoại</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="dienthoai" name="dienthoai" placeholder="Số điện thoại"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Địa chỉ</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="diachi" name="diachi" placeholder="Địa chỉ"
                                           class="form-control">
                                </div>
                            </div>
                             <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Link đối tác</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="url" name="url" placeholder="Link đối tác"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                    class="fa fa-arrow-circle-left"></i>&nbsp;Cancel
                        </button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp; Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>