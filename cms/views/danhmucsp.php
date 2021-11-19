<script type="text/javascript" src="js/danhmucsp.js"></script>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Phân loại sản phẩm</strong>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#largeModal" onclick="add()"><i class="fa fa-plus"></i>&nbsp; Add</button>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Loại sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Mô tả</th>
                                    <th>URL</th>
                                    <th>Link ảnh</th>
                                    <th>Cha</th>
                                    <th>Mục cha</th>
                                    <th width="60">Thứ tự</th>
                                    <th>Tình trạng</th>
                                    <th>Tình trạng</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($this->data as $row) {
                                    $status = ($row['status'] == 1) ? "<span class='text-success'>Hiển thị</span>" : "<span class='text-secondary'>Ẩn</span>";
                                    echo '<tr>
                                                <td>' . $row['id'] . '</td>
                                                <td>' . $row['name'] . '</td>
                                                <td>' . $row['hinhanh'] . '</td>
                                                <td>' . $row['description'] . '</td>
                                                <td>' . $row['url'] . '</td>
                                                <td>' . $row['image'] . '</td>
                                                <td>' . $row['cha'] . '</td>
                                                <td>' . $row['muccha'] . '</td>
                                                <td>' . $row['position'] . '</td>
                                                <td>' . $row['status'] . '</td>
                                                <td>' . $status . '</td>
                                                <td><a href="javascript:void(0)" data-toggle="modal" data-target="#largeModal" onclick="edit(' . $i . ')"><i class="fa fa-edit"></i></a></td>
                                                <td><a href="javascript:void(0)" onclick="del(' . $row['id'] . ')"><i class="fa fa-trash-o"></i></a>  </td>
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

<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Thông tin danh mục</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-client" method="post" enctype="multipart/form-data" action="danhmucsp/save">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row form-group">
                                <input type="hidden" id="id" name="id">
                                <div class="col col-md-3"><label for="name" class=" form-control-label">Danh mục</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="name" name="name" placeholder="Tên danh mục" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="hinhanh" class=" form-control-label">Hình ảnh</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="hinhanh" name="hinhanh" placeholder="Link ảnh" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="email" class=" form-control-label">Danh mục cha</label></div>
                                <div class="col-12 col-md-9">

                                    <select class="form-control" id="danhmuccha" name="danhmuccha">
                                        <option value="0">ROOT</option>
                                        <?php foreach ($this->data as $value) {
                                            echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                                        } ?>

                                    </select>

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="status" class=" form-control-label">Tình trạng</label></div>
                                <div class="col-12 col-md-9">
                                    <select id="status" name="status" class="form-control">
                                        <option value="1">Hiển thị</option>
                                        <option value="2">Ẩn</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="mota" class=" form-control-label">Mô tả</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="mota" name="mota" placeholder="Mô tả" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="url" class=" form-control-label">URL</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="url" name="url" placeholder="Để trống sẽ cập nhật theo tên danh mục" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="position" class=" form-control-label">Thứ tự</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="number" min=1 id="position" name="position" placeholder="Thứ tự hiển thị" class="form-control">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i>&nbsp;Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp; Update</button>
                </div>
            </form>
        </div>
    </div>
</div>