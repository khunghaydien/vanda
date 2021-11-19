<style type="text/css">
    .w-90 {
        width: 90% !important;
        max-width: 1580px !important;
    }

    .scheduler-border {
        border: 1px groove #ddd !important;
        padding: 0 1.4em 1.4em 1.4em !important;
        margin: 0 0 1.5em 0 !important;
        -webkit-box-shadow: 0px 0px 0px 0px #000;
        box-shadow: 0px 0px 0px 0px #000;
    }
</style>
<script type="text/javascript" src="js/users.js"></script>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Quản lý tài khoản</strong>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#largeModal"
                                onclick="add()"><i class="fa fa-plus"></i>&nbsp; Add
                        </button>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered" style="width: 100%">
                            <thead>
                            <tr>
                                <th>Mã tài khoản</th>
                                <th>Tên tài khoản</th>
                                <th>Tên đăng nhập</th>
                                <th>Nhóm</th>
                                <!--                                <th>Email</th>-->
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
                                                <td>' . $row['name'] . '</td>
                                                <td>' . $row['ten_dang_nhap'] . '</td>';
                                if ($row['nhom'] == 1)
                                    echo '<td>Admin</td>';
                                elseif ($row['nhom'] == 2)
                                    echo '<td>Manager</td>';
                                elseif ($row['nhom'] == 3)
                                    echo '<td>Biên tập viên</td>';
                                elseif ($row['nhom'] == 4)
                                    echo '<td>Nhân viên</td>';
                                else
                                    echo '<td>Cộng tác viên</td>';
                                echo '<td><a href="javascript:void(0)" data-toggle="modal" data-target="#largeModal" onclick="edit(' . $i . ')"><i class="fa fa-edit"></i></a></td>
                                                <td><a href="javascript:void(0)" onclick="del(' . $row['id'] . ')"><i class="fa fa-trash-o"></i></a>  </td>
                                                <td>' . $row['nhom'] . '</td>
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

<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="users/save" id="form-client" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin tài khoản</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" id="id" name="id">
                        <label for="exampleInputEmail1">Tên nhân viên</label>
                        <input
                                type="text" name="name" id="name" placeholder="Họ tên"
                                class="input-sm form-control-sm form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên đăng nhập</label>
                        <input type="text" placeholder="Tên đăng nhập" name="username" id="username"
                               class="input-sm form-control-sm form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mật khẩu</label>
                        <input type="text" placeholder="Mật khẩu" name="password" id="password"
                               class="input-sm form-control-sm form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nhóm</label>
                        <select name="nhom" id="nhom" class="input-sm form-control-sm form-control">
                            <option value="1">Admin</option>
                            <option value="2">Manager</option>
                            <option value="3">Biên tập viên</option>
                            <option value="4">Nhân viên</option>
                            <option value="5" selected>Cộng tác viên</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" name="btnluu" class="btn btn-primary"><i class="fa fa-file-text-o"></i> Lưu
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

