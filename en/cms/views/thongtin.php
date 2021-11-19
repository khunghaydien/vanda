<script type="text/javascript" src="js/thongtin.js"></script>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Thông tin chung</strong>
                        <?php if ($_SESSION['admin']['id'] == 1) { ?>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#largeModal" onclick="add()"><i class="fa fa-plus"></i>&nbsp; Add</button>
                        <?php } ?>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Giá trị</th>
                                    <th>Kiểu</th>
                                    <th style="display:none;">Tình trạng</th>
                                    <th style="display:none;">ID</th>
                                    <?php if ($_SESSION['admin']['id'] == 1) { ?>
                                        <th>Key</th>
                                    <?php } ?>
                                    <th></th>
                                    <?php if ($_SESSION['admin']['id'] == 1) {
                                        echo '<th></th>';
                                    } ?>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($this->data as $row) {
                                    echo '<tr>
                                              <td>' . $i . '</td>
                                              <td>' . $row['name'] . '</td>
                                              <td>' . $row['value'] . '</td>
                                              <td>' . $row['type'] . '</td>
                                              <td style="display:none;">' . $row['status'] . '</td>
                                              <td style="display:none;">' . $row['id'] . '</td>';
                                    if ($_SESSION['admin']['id'] == 1)
                                        echo '<td>' . $row['key_info'] . '</td>';
                                    if ($_SESSION['admin']['nhom'] > 2) {
                                        echo '<td><a href="javascript:void(0)"><i class="fa fa-edit"></i></a></td>';
                                    } else {
                                        echo '<td><a href="javascript:void(0)" data-toggle="modal" data-target="#largeModal" onclick="edit(' . ($i - 1) . ')"><i class="fa fa-edit"></i></a></td>';
                                    }
                                    if ($_SESSION['admin']['id'] == 1)
                                        echo '<td><a href="javascript:void(0)" onclick="del(' . $row['id'] . ')"><i class="fa fa-trash-o"></i></a>  </td>';
                                    echo '</tr>';
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
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Thông tin chung</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-client" method="post" action="thongtin/save">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row form-group">
                                <input type="hidden" id="id" name="id">
                                <div class="col col-md-3"><label for="name" class=" form-control-label">Tên trường</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="name" name="name" placeholder="Tên trường" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="value" class=" form-control-label">Giá trị</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="value" name="value" placeholder="Giá trị" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="kieu" class=" form-control-label">Kiểu</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="kieu" name="kieu" placeholder="Kiểu" class="form-control" required>
                                </div>
                            </div>
                            <?php if ($_SESSION['admin']['id'] == 1) { ?>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="keyInfo" class=" form-control-label">Key</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="keyInfo" name="keyInfo" placeholder="Để trống sẽ tự cập nhật theo tên trường" class="form-control">
                                    </div>
                                </div>
                            <?php } ?>

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