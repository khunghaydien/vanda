<script type="text/javascript" src="libs/tinymce/tinymce.min.js"></script>
<div class="col-lg-12">
<div class="card">
    <form action="baiviet/addsave" method="post" enctype="multipart/form-data">
   <div class="card-header"><strong>Thêm mới</strong><small> Bài viết</small></div>
   <div class="card-body card-block">
      <div class="row form-group">
         <div class="col-6">
            <div class="form-group"><label for="city" class=" form-control-label">Tên</label><input type="text" id="name" name="name" placeholder="Nhập tên" class="form-control" required="required"></div>
         </div>
         <div class="col-6">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Url</label><input type="text" name="url" placeholder="Url" class="form-control"></div>
         </div>
      </div>
      <div class="row form-group">
         <div class="col-3">
            <div class="form-group"><label for="city" class=" form-control-label">Link ảnh</label><input type="text" id="link_anh" name="link_anh" placeholder="Hình ảnh" class="form-control"></div>
         </div>
         <div class="col-3">
            <div class="form-group"><label for="city" class=" form-control-label">Hình ảnh</label><input type="file" id="hinh_anh" name="hinh_anh" placeholder="Hình ảnh" class="form-control"></div>
         </div>
         <div class="col-6">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Tag</label><input type="text" name="tag" placeholder="Thẻ tag" class="form-control"></div>
         </div>
      </div>
      <div class="row form-group">
         <div class="col-3">
            <div class="form-group"><label for="city" class=" form-control-label">Views</label>
              <input type="number" name="views" placeholder="Lượt xem" class="form-control" value="1">
            </div>
         </div>
         <div class="col-3">
            <div class="form-group"><label for="city" class=" form-control-label">Sắp xếp</label><input type="number" id="com" name="com" placeholder="Sắp xếp" class="form-control"></div>
         </div>
         <div class="col-6">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Danh mục</label>
              <select class="form-control" name="danh_muc">
                <?php foreach ($this->danhmuc as $item) {
                   echo '<option value="'.$item['id'].'">'.$item['name'].'</option>';
                } ?>
              </select>
            </div>
         </div>
      </div>
      <div class="row form-group">
         <div class="col-12">
             <div class="form-group"><label for="city" class=" form-control-label">Mô tả</label>
              <textarea rows="10" class="form-control" name="mo_ta"></textarea>
             </div>
         </div>
      </div>
      <div class="row form-group">
         <div class="col-12">
             <div class="form-group"><label for="city" class=" form-control-label">Nội dung</label>
              <textarea rows="10" class="form-control" name="noi_dung"></textarea>
             </div>
         </div>
      </div>

      <div class="row form-group">
         <div class="col-12 center">
            <button type="submit" class="btn btn-lg btn-info btn-block">
            <i class="ti-save"></i>&nbsp;
            <span id="payment-button-amount">CẬP NHẬP</span>
         </div>
      </div>
   </div>
   </form>
</div>
<script>
          tinymce.init({
                        mode: "textareas",
                        entity_encoding : "raw",
                        plugins: ["advlist autolink lists link image charmap print preview anchor",
                                    "searchreplace visualblocks code fullscreen textcolor", "media",
                                    "insertdatetime media table contextmenu paste jbimages","fullscreen","moxiemanager"],
                        image_advtab: true,
                        paste_data_images: true,
                        browser_spellcheck : true,
                        relative_urls:false,
                        remove_script_host : false,
                        //convert_urls : true,
                        image_dimensions: false,
                        forced_root_block : false,
                        force_br_newlines : true,
                        force_p_newlines : false,
                        toolbar: " undo redo | styleselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media insertfile |  fontsizeselect | forecolor backcolor | fullscreen"
            });

        </script>