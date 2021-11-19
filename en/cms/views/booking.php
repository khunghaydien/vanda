<script type="text/javascript" src="js/booking.js"></script>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Quản lý đặt lịch</strong>
                            </div>
                            <div class="card-body">
                              <table id="example" class="table table-striped table-bordered">
                                  <thead>
                                      <tr>
                                            <th>STT</th>
                                            <th>Tên</th>
                                            <th>Thời gian</th>
                                            <th>Tuổi</th>
                                            <th>Điện thoại</th>
                                            <th>Email</th>
                                            <th style="display: none;">ND</th>
                                            <th></th>
                                            <th></th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $i=0;
                                        foreach($this->data as$row) {
                                            echo '';
                                            echo '<tr>
                                                <td>'.($i+1).'</td>
                                                <td>'.$row['name'].'</td>
                                                <td>'.$row['thoigian'].'</td>
                                                <td>'.$row['age'].'</td>
                                                <td>'.$row['sdt'].'</td>
                                                <td>'.$row['email'].'</td>
                                                <td style="display: none;">'.$row['noi_dung'].'</td>
                                                <td><a href="javascript:void(0)" data-toggle="modal" data-target="#largeModal" onclick="edit('.$i.')"><i class="fa fa-edit"></i></a></td>
                                              <td><a href="javascript:void(0)" onclick="xoa('.$row['id'].')"><i class="fa fa-trash-o"></i></a>  </td>
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
                        <h5 class="modal-title" id="largeModalLabel">Thông tin booking</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="form-client" method="post" enctype="multipart/form-data" action="booking/save">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <input type="hidden" id="id" name="id">
                                    <div class="col col-md-3"><label for="thanhpho" class=" form-control-label">Tên KH</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="name" name="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="booking" class=" form-control-label">Tuổi</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="soluong" name="soluong" placeholder="Số lượng" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="quanhuyen" class=" form-control-label">Email</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="email" name="email" placeholder="Email" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="quanhuyen" class=" form-control-label">Thời gian</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="thoigian" name="thoigian" placeholder="Thời gian" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="vitri" class=" form-control-label">Điện thoại</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="sdt" name="sdt" placeholder="Điện thoại" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="vitri" class=" form-control-label">Nội dung</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="noidung" name="noidung" placeholder="Nội dung" class="form-control">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i>&nbsp;Cancel</button>
                        <!-- <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp; Update</button> -->
                    </div>
                    </form>
                </div>
            </div>
        </div>

     