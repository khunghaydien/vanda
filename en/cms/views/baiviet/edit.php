<script type="text/javascript" src="libs/tinymce/tinymce.min.js"></script>
<div class="col-lg-12">
<div class="card">
    <form action="baiviet/editsave?id=<?php echo $this->data['id']; ?>" method="post" enctype="multipart/form-data">
   <div class="card-header"><strong>Cập nhập</strong><small> Bài viết</small></div>
   <div class="card-body card-block">
      <div class="row form-group">
         <div class="col-6">
            <div class="form-group"><label for="city" class=" form-control-label">Tên</label><input type="text" id="name" name="name" placeholder="Nhập tên" class="form-control" value="<?php echo $this->data['title']; ?>" required="required"></div>
         </div>
         <div class="col-6">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Url</label><input type="text" name="url" placeholder="Url" class="form-control" value="<?php echo $this->data['url']; ?>"></div>
         </div>
      </div>
      <div class="row form-group">
         <div class="col-3">
            <div class="form-group"><label for="city" class=" form-control-label">Link ảnh</label><input type="text" id="link_anh" name="link_anh" placeholder="Hình ảnh" class="form-control" value="<?php echo $this->data['avatar']; ?>"></div>
         </div>
         <div class="col-3">
            <div class="form-group"><label for="city" class=" form-control-label">Hình ảnh</label><input type="file" id="hinh_anh" name="hinh_anh" placeholder="Hình ảnh" class="form-control"></div>
         </div>
         <div class="col-6">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Tag</label><input type="text" name="tag" placeholder="Thẻ tag" class="form-control" value="<?php echo $this->data['tag']; ?>"></div>
         </div>
      </div>
      <div class="row form-group">
         <div class="col-3">
            <div class="form-group"><label for="city" class=" form-control-label">Views</label>
              <input type="text" name="views" placeholder="Lượt xem" class="form-control" value="<?php echo $this->data['view']; ?>">
            </div>
         </div>
         <div class="col-3">
            <div class="form-group"><label for="city" class=" form-control-label">Sắp xếp</label><input type="number" id="com" name="com" placeholder="Sắp xếp" class="form-control" value="<?php echo $this->data['position']; ?>"></div>
         </div>
         <div class="col-3">
            <div class="form-group"><img src="<?php echo $this->data['avatar']; ?>" style="width: 80px;height: 80px;object-fit: cover;"></div>
         </div>
         <div class="col-3">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Danh mục</label>
              <select class="form-control" name="danh_muc">
                <?php foreach ($this->danhmuc as $item) {
                	if ($item['id']==$this->data['category']) {
                		echo '<option value="'.$item['id'].'" selected="selected">'.$item['name'].'</option>';
                	}else{
                		echo '<option value="'.$item['id'].'">'.$item['name'].'</option>';
                	}
                } ?>
              </select>
            </div>
         </div>
      </div>
      <div class="row form-group">
         <div class="col-12">
             <div class="form-group"><label for="city" class=" form-control-label">Mô tả</label>
              <textarea rows="10" class="form-control" name="mo_ta"><?php echo $this->data['description']; ?></textarea>
             </div>
         </div>
      </div>
      <div class="row form-group">
         <div class="col-12">
             <div class="form-group"><label for="city" class=" form-control-label">Nội dung</label>
              <textarea rows="10" class="form-control" name="noi_dung"><?php echo $this->data['content']; ?></textarea>
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