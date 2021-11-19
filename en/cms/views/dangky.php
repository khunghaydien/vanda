<script type="text/javascript" src="js/dangky.js"></script>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Khách hàng liên hệ</strong>
                            </div>
                            <div class="card-body">
                              <table id="example" class="table table-striped table-bordered">
                                  <thead>
                                      <tr>
                                            <th>STT</th>
                                            <th>Tên</th>
                                            <th>Tiêu đề</th>
                                            <th>Nội dung</th>
                                            <th>Email</th>
                                            <th>Điện thoại</th>
                                            <th>Ngày giờ</th>
                                            <th></th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $i=0;
                                        foreach($this->data as $row) {
                                            echo '';
                                            echo '<tr>
                                                <td>'.($i+1).'</td>
                                                <td>'.$row['name'].'</td>
                                                <td>'.$row['title'].'</td>
                                                <td>'.$row['content'].'</td>
                                                <td>'.$row['email'].'</td>
                                                <td>'.$row['phone'].'</td>
                                                <td>'.$row['thoigian'].'</td>
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

        

     