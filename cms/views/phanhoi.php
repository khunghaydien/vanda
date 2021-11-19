<script type="text/javascript" src="js/phanhoi.js"></script>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Phản hồi của khách hàng</strong>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#largeModal" onclick="add()"><i class="fa fa-plus"></i>&nbsp; Add
                        </button>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered" style="width: 100%">
                     <thead>
                        <tr>
                           <th>ID</th>
                           <th>Tên khách hàng</th>
                           <th>Nhận xét</th>
                           <th>Hình ảnh</th>
                           <th style="display: none;">HA</th>
                           <th width="200">Chức năng</th>
                        </tr>
                     </thead>

                     <tbody>
                        <?php
                           $loaisp=$this->data;
                           if (sizeof($loaisp)>0) {
                               $i=1;
                               foreach ($loaisp as $item) {
                                   echo '<tr>
                                       <td>'.$item['id'].'</td>
                                       <td>'.$item['author'].'</td>
                                       <td>'.$item['content'].'</td>
                                       <td><img src="'.$item['avatar'].'" height="60"></td>
                                       <td style="display: none;">'.$item['avatar'].'</td>';
                                   echo '<td align="center">';
                                   echo ' <button type="button" data-toggle="modal" data-target="#largeModal" onclick="edit('.($i-1).')" ><i class="fa fa-edit"></i></button> ';
                                   echo ' <button onclick="xoa('.$item['id'].')"><i class="fa fa-trash-o"></i></button>';
                                   $i++;
                               }
                           }
                           ?>
                     </tbody>
                  </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .animated -->
</div>
<!-- .content -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Thông tin phản hồi khách hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-client" method="post" enctype="multipart/form-data" action="phanhoi/save">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row form-group">
                                <input type="hidden" id="id" name="id">
                                <div class="col col-md-3"><label for="name" class=" form-control-label">Họ Tên</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="name" name="name" placeholder="Tên đối tác"
                                           class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="hinhanh" class=" form-control-label">Hình
                                        ảnh</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="hinhanh" name="hinhanh" placeholder="Link ảnh"
                                           class="form-control">
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-sm-6">
                           
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Nhận xét</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="nhanxet" name="nhanxet" placeholder="Nhận xét"
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

