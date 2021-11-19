<script type="text/javascript" src="js/dathang.js"></script>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Quản lý đơn đặt hàng</strong>
                            </div>
                            <div class="card-body">
                              <table id="example" class="table table-striped table-bordered">
                                  <thead>
                                      <tr>
                                            <th>Mã đơn</th>
                                            <th>Tên khách</th>
                                            <th>Địa chỉ</th>
                                            <th>Số điện thoại</th>
                                            <th class="d-none">Email</th>
                                            <th class="d-none">Mã sản phẩm</th>
                                            <th>Sản phẩm</th>
                                            <th class="d-none">Tên sản phẩm</th>
                                            <th>Ghi chú</th>
                                            <th>Trạng thái</th>
                                            <th class="d-none">Trạng thái</th>
                                            <th></th>
                                            <th></th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $i=0;
                                        foreach($this->data as $row) {
                                            $status = ($row['status'] == 1)? 'Chưa xác nhận':'Đã xác nhận';
                                            echo '<tr>
                                                <td>'.$row['id'].'</td>
                                                <td>'.$row['name'].'</td>
                                                <td>'.$row['address'].'</td>
                                                <td>'.$row['phone'].'</td>
                                                <td class="d-none">'.$row['email'].'</td>
                                                <td class="d-none">'.$row['code_product'].'</td>
                                                <td><a target="_blank" href="'.HOME.'/product/'.$row['url_product'].'" >'.$row['code_product'].' - '.$row['name_product'].'</a></td>
                                                <td class="d-none">'.$row['name_product'].'</td>
                                                <td>'.$row['note'].'</td>
                                                <td>'.$status.'</td>
                                                <td class="d-none">'.$row['status'].'</td>
                                                <td><a href="javascript:void(0)" data-toggle="modal" data-target="#largeModal" onclick="edit('.$i.')"><i class="fa fa-edit"></i></a></td>
                                              <td><a href="dathang/del?id='.$row['id'].'"><i class="fa fa-trash-o"></i></a>  </td>
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
                        <h5 class="modal-title" id="largeModalLabel">Thông tin đơn đặt hàng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="form-client" method="post" enctype="multipart/form-data" action="dathang/save">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <input type="hidden" id="id" name="id">
                                    <div class="col col-md-3"><label for="thanhpho" class=" form-control-label">Họ tên</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="name" name="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="đơn đặt hàng" class=" form-control-label">Địa chỉ</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="address" name="address" placeholder="Địa chỉ" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="đơn đặt hàng" class=" form-control-label">Số điện thoại</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="phone" name="phone" placeholder="Số điện thoại" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="email" class=" form-control-label">Email</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="email" name="email" placeholder="Email   " class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="status" class=" form-control-label">Trạng thái</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="status" id="status" class="input-sm form-control-sm form-control">
                                            <option value="1">Chưa xác nhận</option>
                                            <option value="2">Đã xác nhận</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="product" class=" form-control-label">Sản phẩm</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="product" name="product" placeholder="Sản phẩm" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="row form-group">
                                    <div class="col"><label for="note" class=" form-control-label">Ghi chú</label></div>
                                    <div class="col-12 ">
                                        <textarea name="note" id="note" class="form-control w-100" rows="1"></textarea>
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

        <!-- <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticModalLabel">Warning</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Are you sure to delete this data?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="del()">Confirm</button>
                    </div>
                </div>
            </div>
        </div> -->
