<script type="text/javascript" src="js/sanpham.js"></script>
<script type="text/javascript" src="libs/tinymce/tinymce.min.js"></script>
<link rel="stylesheet" href="libs/imgupload/4image-upload.css">
<style>
    #image-upload-demo {
        width: 100%;
        margin: auto;
    }
</style>
<div class="col-lg-12">
    <div class="card">
        <form action="sanpham/addsave" method="post" enctype="multipart/form-data">
            <div class="card-header"><strong>Thêm mới</strong><small> Sản phẩm</small></div>
            <div class="card-body card-block">
                <input type="hidden" name="masp" value="<?= $this->masp ?>">
                <div class="row form-group">
                    <div class="col-12 col-md-5">
                        <div class="form-group"><label for="city" class=" form-control-label">Tên</label><input type="text" id="name" name="name" placeholder="Nhập tên sản phẩm" class="form-control" required="required"></div>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="form-group"><label for="postal-code" class=" form-control-label">Danh mục</label>
                            <select name="danh_muc" class="form-control">
                                <?php foreach ($this->danhmuc as $item) {
                                    $char = '';
                                    for ($j = 0; $j < $item['level']; $j++)
                                        $char .= '|---';
                                    echo '<option value="' . $item['id'] . '">' . $char . ' ' . $item['name'] . '</option>';
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                        <div class="form-group"><label for="postal-code" class=" form-control-label">Tình trạng</label>
                            <select name="status" class="form-control">
                                <option value="1" selected>Hiển thị</option>
                                <option value="2">Ẩn</option>
                            </select>
                        </div>
                    </div>
                </div>



                <div class="row form-group">
                    <div class="col-12 col-md-3">
                        <div class="form-group"><label for="city" class=" form-control-label">Model</label>
                            <input type="text" placeholder="Model" name="ma" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group"><label for="city" class=" form-control-label">Tag</label>
                            <input type="text" placeholder="Tag" name="tag" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group"><label for="postal-code" class=" form-control-label">Url</label><input type="text" name="url" placeholder="Để trống sẽ lấy theo tên" class="form-control"></div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group"><label for="postal-code" class=" form-control-label">Vị trí</label><input type="text" name="position" placeholder="Vị trí nổi bật" class="form-control"></div>
                    </div>
                </div>

                <?php if (count($this->thuoctinh) > 0) { ?>
                    <label>Thuộc tính</label>
                    <div class="row form-group border border-success pt-2 mx-1">
                        <div class="w-100 col-12">
                            <?php foreach ($this->thuoctinh as $key =>  $value) { ?>
                                <div class="col-6 col-md-3">
                                    <div class="form-group"><label for="postal-code" class=" form-control-label"><?= $value['name'] ?></label><input type="text" placeholder="<?= $value['name'] ?>" name="thuoctinh<?= ($key + 1) ?>" class="form-control"></div>
                                </div>
                            <?php } ?>
                        </div>

                    </div>
                <?php } ?>

                <input type="hidden" name="tongtt" value="<?= count($this->thuoctinh) ?>">

                <div class="row form-group">
                    <div class="col-12">
                        <div id="image-upload-demo">
                            <div id="iu-gallery">
                                <div id="iu-image-like-div">
                                    <div class="iu-image-placeholder" id="iu-image-upload-zone">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-12">
                        <div class="form-group"><label for="city" class=" form-control-label">Thông số kỹ thuật</label>
                            <textarea rows="10" class="form-control" name="mo_ta"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row form-group d-none">
                    <div class="col-12">
                        <div class="form-group"><label for="city" class=" form-control-label">Nội dung</label>
                            <textarea rows="10" class="form-control" name="noidung"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-12 center">
                        <button type="submit" class="btn btn-lg btn-info btn-block">
                            <i class="ti-save"></i>&nbsp;
                            <span id="payment-button-amount">CẬP NHẬT</span>
                    </div>
                </div>

        </form>
    </div>

    <script>
        tinymce.init({
            mode: "textareas",
            entity_encoding: "raw",
            plugins: ["advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen textcolor", "media",
                "insertdatetime media table contextmenu paste jbimages", "fullscreen", "moxiemanager"
            ],
            image_advtab: true,
            paste_data_images: true,
            browser_spellcheck: true,
            relative_urls: false,
            remove_script_host: false,
            //convert_urls : true,
            image_dimensions: false,
            forced_root_block: false,
            force_br_newlines: true,
            force_p_newlines: false,
            toolbar: " undo redo | styleselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media insertfile |  fontsizeselect | forecolor backcolor | fullscreen"
        });
    </script>

    <script src="libs/imgupload/4image-upload.js"></script>



    <script id="jsNeedToCopy">
        //Detect Internet Explorer. Show alert to customer.
        if (window.document.documentMode) {
            alert("This website doesn't work on Internet Explorer, you should use modern browsers like Chrome or Safari instead");
        }
        var myImageUpload = new ImageUpload({
            imageUploadZoneId: 'iu-image-upload-zone',
            imageGalleryId: 'iu-gallery',
            sendRequestToServer: true,
            saveImageRoute: "sanpham/saveimage",
            imageBelongsTo: {
                "post_id": <?= $this->masp ?>
            },
            saveImageOrderRoute: "sanpham/saveImageOrder",
            deleteImageRoute: "sanpham/deleteimage",



            dictUploadImageNote: '<img src="https://4imageupload.com//demo-image/image-uploader-icon.png" class="iu-image-icon"><p class="iu-note-text">Chọn tệp hoặc kéo thả để upload ảnh</p>',
            insertImageItemBeforeElmnt: document.getElementById('iu-image-upload-zone').parentNode,
            getTargetForHighlight: function() {
                return document.getElementById('iu-image-upload-zone').getElementsByClassName('iu-image-note')[0];
            },
            showUploadingLoader: function(imagePlaceholder, showUploadedPercentComplete) {
                var progressBar = document.createElement('div');
                progressBar.className = 'iu-progress-bar';
                var percentBar = document.createElement('div');
                percentBar.className = 'iu-percent-bar';
                if (showUploadedPercentComplete === true) {
                    percentBar.innerHTML = '0%';
                }
                progressBar.appendChild(percentBar);
                imagePlaceholder.appendChild(progressBar);
            },
            updateUploadingLoader: function(percentComplete, imagePlaceholder, showUploadedPercentComplete) {
                var percentComplete = Math.floor(percentComplete);
                var percentBar = imagePlaceholder.getElementsByClassName('iu-percent-bar')[0];

                if (percentBar != null) {
                    percentBar.style.width = percentComplete + "%";
                    if (showUploadedPercentComplete === true) {
                        percentBar.innerHTML = percentComplete + "%";
                    }
                }
            },
            removeUploadingLoader: function(imagePlaceholder, showUploadedPercentComplete) {
                var progressBar = imagePlaceholder.getElementsByClassName('iu-progress-bar')[0];
                var fadeEffect = setInterval(function() {
                    if (!progressBar.style.opacity) {
                        progressBar.style.opacity = 1;
                    }
                    if (progressBar.style.opacity > 0) {
                        progressBar.style.opacity -= 0.1;
                    } else {
                        clearInterval(fadeEffect);
                        progressBar.remove();
                    }
                }, 300);
            },

            addFlashBox: function(showedAlertString, showedTime, backgroundColor) {
                var oldFlashBox = document.getElementsByClassName('iu-flash-box')[0];
                if (oldFlashBox) {
                    oldFlashBox.remove();
                }
                var flashBox = document.createElement('div');
                flashBox.className = 'iu-flash-box';
                if (backgroundColor) {
                    flashBox.style.backgroundColor = backgroundColor;
                }
                flashBox.innerHTML = showedAlertString;
                document.body.appendChild(flashBox);
                setTimeout(function() {
                    fadeEffect(flashBox);
                }, showedTime);

                function fadeEffect(elmnt) {
                    var fadeEffect = setInterval(function() {
                        if (!elmnt.style.opacity) {
                            elmnt.style.opacity = 1;
                        }
                        if (elmnt.style.opacity > 0) {
                            elmnt.style.opacity -= 0.1;
                        } else {
                            clearInterval(fadeEffect);
                            elmnt.remove();
                        }
                    }, 50);
                }
            },

        });
    </script>