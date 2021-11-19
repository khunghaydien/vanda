<footer id="footer" class="footer-wrapper">
    <!-- FOOTER 1 -->
    <div class="footer footer-0">
    </div>


    <!-- FOOTER 2 -->
    <div class="footer-widgets footer footer-2 dark">
        <div class="row dark large-columns-4 mb-0">
            <div id="text-2" class="col pb-0 widget widget_text"><span><?=$info['ten-cong-ty']?></span>
                <div class="is-divider small"></div>
                <div class="textwidget">
                    <p style="margin-bottom: 0">
                        Tax code:<strong> <?=$info['mst']?></strong><br /> 
                        Address: <strong> <?=$info['dia-chi']?></strong><br /> 
                        Representative office address: <strong> <?=$info['dia-chi-2']?></strong><br /> 
                        Hotline: <strong> <?php echo functions::convertPhone($info['dien-thoai']);?> / <?php echo functions::convertPhone($info['dien-thoai-2']);?></strong><br />
                        Email: <strong> <?=$info['email']?></strong>
                    </p>
                </div>
            </div>
            <div id="custom_html-10" class="widget_text col pb-0 widget widget_custom_html">
                <div class="textwidget custom-html-widget">
                    <div class="right-footer">
                        <!-- <img src="template/images/dathongbao.png" alt="Thông báo"> -->
                    </div>
                </div>
            </div>
            <div id="custom_html-11" class="widget_text col pb-0 widget widget_custom_html">
                <div class="textwidget custom-html-widget">
                    <div style="position: fixed; z-index: 9999; left : 0px; bottom : -7px;">
                        <a href="tel:<?= $info['dien-thoai']?>">
                            <h4 style="margin-bottom: 0; color: #fff; background: url(template/wp-content/uploads/2018/05/pop_tuvan-1.png) no-repeat; background-size: contain; padding-left: 45px; padding-right: 20px; padding-top: 4px; padding-bottom: 4px; float: left;">
                                Call <?php echo functions::convertPhone($info['dien-thoai']);?>
                            </h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end footer 2 -->


    <div class="absolute-footer dark medium-text-center text-center">
        <div class="container clearfix">
            <div class="footer-secondary pull-right">
                <div class="payment-icons inline-block">
                    <div class="payment-icon">
                        <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 32">
                            <path d="M10.781 7.688c-0.251-1.283-1.219-1.688-2.344-1.688h-8.376l-0.061 0.405c5.749 1.469 10.469 4.595 12.595 10.501l-1.813-9.219zM13.125 19.688l-0.531-2.781c-1.096-2.907-3.752-5.594-6.752-6.813l4.219 15.939h5.469l8.157-20.032h-5.501l-5.062 13.688zM27.72 26.061l3.248-20.061h-5.187l-3.251 20.061h5.189zM41.875 5.656c-5.125 0-8.717 2.72-8.749 6.624-0.032 2.877 2.563 4.469 4.531 5.439 2.032 0.968 2.688 1.624 2.688 2.499 0 1.344-1.624 1.939-3.093 1.939-2.093 0-3.219-0.251-4.875-1.032l-0.688-0.344-0.719 4.499c1.219 0.563 3.437 1.064 5.781 1.064 5.437 0.032 8.97-2.688 9.032-6.843 0-2.282-1.405-4-4.376-5.439-1.811-0.904-2.904-1.563-2.904-2.499 0-0.843 0.936-1.72 2.968-1.72 1.688-0.029 2.936 0.314 3.875 0.752l0.469 0.248 0.717-4.344c-1.032-0.406-2.656-0.844-4.656-0.844zM55.813 6c-1.251 0-2.189 0.376-2.72 1.688l-7.688 18.374h5.437c0.877-2.467 1.096-3 1.096-3 0.592 0 5.875 0 6.624 0 0 0 0.157 0.688 0.624 3h4.813l-4.187-20.061h-4zM53.405 18.938c0 0 0.437-1.157 2.064-5.594-0.032 0.032 0.437-1.157 0.688-1.907l0.374 1.72c0.968 4.781 1.189 5.781 1.189 5.781-0.813 0-3.283 0-4.315 0z"></path>
                        </svg>
                    </div>
                    <div class="payment-icon">
                        <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 32">
                            <path d="M35.255 12.078h-2.396c-0.229 0-0.444 0.114-0.572 0.303l-3.306 4.868-1.4-4.678c-0.088-0.292-0.358-0.493-0.663-0.493h-2.355c-0.284 0-0.485 0.28-0.393 0.548l2.638 7.745-2.481 3.501c-0.195 0.275 0.002 0.655 0.339 0.655h2.394c0.227 0 0.439-0.111 0.569-0.297l7.968-11.501c0.191-0.275-0.006-0.652-0.341-0.652zM19.237 16.718c-0.23 1.362-1.311 2.276-2.691 2.276-0.691 0-1.245-0.223-1.601-0.644-0.353-0.417-0.485-1.012-0.374-1.674 0.214-1.35 1.313-2.294 2.671-2.294 0.677 0 1.227 0.225 1.589 0.65 0.365 0.428 0.509 1.027 0.404 1.686zM22.559 12.078h-2.384c-0.204 0-0.378 0.148-0.41 0.351l-0.104 0.666-0.166-0.241c-0.517-0.749-1.667-1-2.817-1-2.634 0-4.883 1.996-5.321 4.796-0.228 1.396 0.095 2.731 0.888 3.662 0.727 0.856 1.765 1.212 3.002 1.212 2.123 0 3.3-1.363 3.3-1.363l-0.106 0.662c-0.040 0.252 0.155 0.479 0.41 0.479h2.147c0.341 0 0.63-0.247 0.684-0.584l1.289-8.161c0.040-0.251-0.155-0.479-0.41-0.479zM8.254 12.135c-0.272 1.787-1.636 1.787-2.957 1.787h-0.751l0.527-3.336c0.031-0.202 0.205-0.35 0.41-0.35h0.345c0.899 0 1.747 0 2.185 0.511 0.262 0.307 0.341 0.761 0.242 1.388zM7.68 7.473h-4.979c-0.341 0-0.63 0.248-0.684 0.584l-2.013 12.765c-0.040 0.252 0.155 0.479 0.41 0.479h2.378c0.34 0 0.63-0.248 0.683-0.584l0.543-3.444c0.053-0.337 0.343-0.584 0.683-0.584h1.575c3.279 0 5.172-1.587 5.666-4.732 0.223-1.375 0.009-2.456-0.635-3.212-0.707-0.832-1.962-1.272-3.628-1.272zM60.876 7.823l-2.043 12.998c-0.040 0.252 0.155 0.479 0.41 0.479h2.055c0.34 0 0.63-0.248 0.683-0.584l2.015-12.765c0.040-0.252-0.155-0.479-0.41-0.479h-2.299c-0.205 0.001-0.379 0.148-0.41 0.351zM54.744 16.718c-0.23 1.362-1.311 2.276-2.691 2.276-0.691 0-1.245-0.223-1.601-0.644-0.353-0.417-0.485-1.012-0.374-1.674 0.214-1.35 1.313-2.294 2.671-2.294 0.677 0 1.227 0.225 1.589 0.65 0.365 0.428 0.509 1.027 0.404 1.686zM58.066 12.078h-2.384c-0.204 0-0.378 0.148-0.41 0.351l-0.104 0.666-0.167-0.241c-0.516-0.749-1.667-1-2.816-1-2.634 0-4.883 1.996-5.321 4.796-0.228 1.396 0.095 2.731 0.888 3.662 0.727 0.856 1.765 1.212 3.002 1.212 2.123 0 3.3-1.363 3.3-1.363l-0.106 0.662c-0.040 0.252 0.155 0.479 0.41 0.479h2.147c0.341 0 0.63-0.247 0.684-0.584l1.289-8.161c0.040-0.252-0.156-0.479-0.41-0.479zM43.761 12.135c-0.272 1.787-1.636 1.787-2.957 1.787h-0.751l0.527-3.336c0.031-0.202 0.205-0.35 0.41-0.35h0.345c0.899 0 1.747 0 2.185 0.511 0.261 0.307 0.34 0.761 0.241 1.388zM43.187 7.473h-4.979c-0.341 0-0.63 0.248-0.684 0.584l-2.013 12.765c-0.040 0.252 0.156 0.479 0.41 0.479h2.554c0.238 0 0.441-0.173 0.478-0.408l0.572-3.619c0.053-0.337 0.343-0.584 0.683-0.584h1.575c3.279 0 5.172-1.587 5.666-4.732 0.223-1.375 0.009-2.456-0.635-3.212-0.707-0.832-1.962-1.272-3.627-1.272z"></path>
                        </svg>
                    </div>
                    <div class="payment-icon">
                        <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 32">
                            <path d="M7.114 14.656c-1.375-0.5-2.125-0.906-2.125-1.531 0-0.531 0.437-0.812 1.188-0.812 1.437 0 2.875 0.531 3.875 1.031l0.563-3.5c-0.781-0.375-2.406-1-4.656-1-1.594 0-2.906 0.406-3.844 1.188-1 0.812-1.5 2-1.5 3.406 0 2.563 1.563 3.688 4.125 4.594 1.625 0.594 2.188 1 2.188 1.656 0 0.625-0.531 0.969-1.5 0.969-1.188 0-3.156-0.594-4.437-1.343l-0.563 3.531c1.094 0.625 3.125 1.281 5.25 1.281 1.688 0 3.063-0.406 4.031-1.157 1.063-0.843 1.594-2.062 1.594-3.656-0.001-2.625-1.595-3.719-4.188-4.657zM21.114 9.125h-3v-4.219l-4.031 0.656-0.563 3.563-1.437 0.25-0.531 3.219h1.937v6.844c0 1.781 0.469 3 1.375 3.75 0.781 0.625 1.907 0.938 3.469 0.938 1.219 0 1.937-0.219 2.468-0.344v-3.688c-0.282 0.063-0.938 0.22-1.375 0.22-0.906 0-1.313-0.5-1.313-1.563v-6.156h2.406l0.595-3.469zM30.396 9.031c-0.313-0.062-0.594-0.093-0.876-0.093-1.312 0-2.374 0.687-2.781 1.937l-0.313-1.75h-4.093v14.719h4.687v-9.563c0.594-0.719 1.437-0.968 2.563-0.968 0.25 0 0.5 0 0.812 0.062v-4.344zM33.895 2.719c-1.375 0-2.468 1.094-2.468 2.469s1.094 2.5 2.468 2.5 2.469-1.124 2.469-2.5-1.094-2.469-2.469-2.469zM36.239 23.844v-14.719h-4.687v14.719h4.687zM49.583 10.468c-0.843-1.094-2-1.625-3.469-1.625-1.343 0-2.531 0.563-3.656 1.75l-0.25-1.469h-4.125v20.155l4.688-0.781v-4.719c0.719 0.219 1.469 0.344 2.125 0.344 1.157 0 2.876-0.313 4.188-1.75 1.281-1.375 1.907-3.5 1.907-6.313 0-2.499-0.469-4.405-1.407-5.593zM45.677 19.532c-0.375 0.687-0.969 1.094-1.625 1.094-0.468 0-0.906-0.093-1.281-0.281v-7c0.812-0.844 1.531-0.938 1.781-0.938 1.188 0 1.781 1.313 1.781 3.812 0.001 1.437-0.219 2.531-0.656 3.313zM62.927 10.843c-1.032-1.312-2.563-2-4.501-2-4 0-6.468 2.938-6.468 7.688 0 2.625 0.656 4.625 1.968 5.875 1.157 1.157 2.844 1.719 5.032 1.719 2 0 3.844-0.469 5-1.251l-0.501-3.219c-1.157 0.625-2.5 0.969-4 0.969-0.906 0-1.532-0.188-1.969-0.594-0.5-0.406-0.781-1.094-0.875-2.062h7.75c0.031-0.219 0.062-1.281 0.062-1.625 0.001-2.344-0.5-4.188-1.499-5.5zM56.583 15.094c0.125-2.093 0.687-3.062 1.75-3.062s1.625 1 1.687 3.062h-3.437z"></path>
                        </svg>
                    </div>
                    <div class="payment-icon">
                        <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 32">
                            <path d="M42.667-0c-4.099 0-7.836 1.543-10.667 4.077-2.831-2.534-6.568-4.077-10.667-4.077-8.836 0-16 7.163-16 16s7.164 16 16 16c4.099 0 7.835-1.543 10.667-4.077 2.831 2.534 6.568 4.077 10.667 4.077 8.837 0 16-7.163 16-16s-7.163-16-16-16zM11.934 19.828l0.924-5.809-2.112 5.809h-1.188v-5.809l-1.056 5.809h-1.584l1.32-7.657h2.376v4.753l1.716-4.753h2.508l-1.32 7.657h-1.585zM19.327 18.244c-0.088 0.528-0.178 0.924-0.264 1.188v0.396h-1.32v-0.66c-0.353 0.528-0.924 0.792-1.716 0.792-0.442 0-0.792-0.132-1.056-0.396-0.264-0.351-0.396-0.792-0.396-1.32 0-0.792 0.218-1.364 0.66-1.716 0.614-0.44 1.364-0.66 2.244-0.66h0.66v-0.396c0-0.351-0.353-0.528-1.056-0.528-0.442 0-1.012 0.088-1.716 0.264 0.086-0.351 0.175-0.792 0.264-1.32 0.703-0.264 1.32-0.396 1.848-0.396 1.496 0 2.244 0.616 2.244 1.848 0 0.353-0.046 0.749-0.132 1.188-0.089 0.616-0.179 1.188-0.264 1.716zM24.079 15.076c-0.264-0.086-0.66-0.132-1.188-0.132s-0.792 0.177-0.792 0.528c0 0.177 0.044 0.31 0.132 0.396l0.528 0.264c0.792 0.442 1.188 1.012 1.188 1.716 0 1.409-0.838 2.112-2.508 2.112-0.792 0-1.366-0.044-1.716-0.132 0.086-0.351 0.175-0.836 0.264-1.452 0.703 0.177 1.188 0.264 1.452 0.264 0.614 0 0.924-0.175 0.924-0.528 0-0.175-0.046-0.308-0.132-0.396-0.178-0.175-0.396-0.308-0.66-0.396-0.792-0.351-1.188-0.924-1.188-1.716 0-1.407 0.792-2.112 2.376-2.112 0.792 0 1.32 0.045 1.584 0.132l-0.265 1.451zM27.512 15.208h-0.924c0 0.442-0.046 0.838-0.132 1.188 0 0.088-0.022 0.264-0.066 0.528-0.046 0.264-0.112 0.442-0.198 0.528v0.528c0 0.353 0.175 0.528 0.528 0.528 0.175 0 0.35-0.044 0.528-0.132l-0.264 1.452c-0.264 0.088-0.66 0.132-1.188 0.132-0.881 0-1.32-0.44-1.32-1.32 0-0.528 0.086-1.099 0.264-1.716l0.66-4.225h1.584l-0.132 0.924h0.792l-0.132 1.585zM32.66 17.32h-3.3c0 0.442 0.086 0.749 0.264 0.924 0.264 0.264 0.66 0.396 1.188 0.396s1.1-0.175 1.716-0.528l-0.264 1.584c-0.442 0.177-1.012 0.264-1.716 0.264-1.848 0-2.772-0.924-2.772-2.773 0-1.142 0.264-2.024 0.792-2.64 0.528-0.703 1.188-1.056 1.98-1.056 0.703 0 1.274 0.22 1.716 0.66 0.35 0.353 0.528 0.881 0.528 1.584 0.001 0.617-0.046 1.145-0.132 1.585zM35.3 16.132c-0.264 0.97-0.484 2.201-0.66 3.697h-1.716l0.132-0.396c0.35-2.463 0.614-4.4 0.792-5.809h1.584l-0.132 0.924c0.264-0.44 0.528-0.703 0.792-0.792 0.264-0.264 0.528-0.308 0.792-0.132-0.088 0.088-0.31 0.706-0.66 1.848-0.353-0.086-0.661 0.132-0.925 0.66zM41.241 19.697c-0.353 0.177-0.838 0.264-1.452 0.264-0.881 0-1.584-0.308-2.112-0.924-0.528-0.528-0.792-1.32-0.792-2.376 0-1.32 0.35-2.42 1.056-3.3 0.614-0.879 1.496-1.32 2.64-1.32 0.44 0 1.056 0.132 1.848 0.396l-0.264 1.584c-0.528-0.264-1.012-0.396-1.452-0.396-0.707 0-1.235 0.264-1.584 0.792-0.353 0.442-0.528 1.144-0.528 2.112 0 0.616 0.132 1.056 0.396 1.32 0.264 0.353 0.614 0.528 1.056 0.528 0.44 0 0.924-0.132 1.452-0.396l-0.264 1.717zM47.115 15.868c-0.046 0.264-0.066 0.484-0.066 0.66-0.088 0.442-0.178 1.035-0.264 1.782-0.088 0.749-0.178 1.254-0.264 1.518h-1.32v-0.66c-0.353 0.528-0.924 0.792-1.716 0.792-0.442 0-0.792-0.132-1.056-0.396-0.264-0.351-0.396-0.792-0.396-1.32 0-0.792 0.218-1.364 0.66-1.716 0.614-0.44 1.32-0.66 2.112-0.66h0.66c0.086-0.086 0.132-0.218 0.132-0.396 0-0.351-0.353-0.528-1.056-0.528-0.442 0-1.012 0.088-1.716 0.264 0-0.351 0.086-0.792 0.264-1.32 0.703-0.264 1.32-0.396 1.848-0.396 1.496 0 2.245 0.616 2.245 1.848 0.001 0.089-0.021 0.264-0.065 0.529zM49.69 16.132c-0.178 0.528-0.396 1.762-0.66 3.697h-1.716l0.132-0.396c0.35-1.935 0.614-3.872 0.792-5.809h1.584c0 0.353-0.046 0.66-0.132 0.924 0.264-0.44 0.528-0.703 0.792-0.792 0.35-0.175 0.614-0.218 0.792-0.132-0.353 0.442-0.574 1.056-0.66 1.848-0.353-0.086-0.66 0.132-0.925 0.66zM54.178 19.828l0.132-0.528c-0.353 0.442-0.838 0.66-1.452 0.66-0.707 0-1.188-0.218-1.452-0.66-0.442-0.614-0.66-1.232-0.66-1.848 0-1.142 0.308-2.067 0.924-2.773 0.44-0.703 1.056-1.056 1.848-1.056 0.528 0 1.056 0.264 1.584 0.792l0.264-2.244h1.716l-1.32 7.657h-1.585zM16.159 17.98c0 0.442 0.175 0.66 0.528 0.66 0.35 0 0.614-0.132 0.792-0.396 0.264-0.264 0.396-0.66 0.396-1.188h-0.397c-0.881 0-1.32 0.31-1.32 0.924zM31.076 15.076c-0.088 0-0.178-0.043-0.264-0.132h-0.264c-0.528 0-0.881 0.353-1.056 1.056h1.848v-0.396l-0.132-0.264c-0.001-0.086-0.047-0.175-0.133-0.264zM43.617 17.98c0 0.442 0.175 0.66 0.528 0.66 0.35 0 0.614-0.132 0.792-0.396 0.264-0.264 0.396-0.66 0.396-1.188h-0.396c-0.881 0-1.32 0.31-1.32 0.924zM53.782 15.076c-0.353 0-0.66 0.22-0.924 0.66-0.178 0.264-0.264 0.749-0.264 1.452 0 0.792 0.264 1.188 0.792 1.188 0.35 0 0.66-0.175 0.924-0.528 0.264-0.351 0.396-0.879 0.396-1.584-0.001-0.792-0.311-1.188-0.925-1.188z"></path>
                        </svg>
                    </div>
                    <div class="payment-icon">
                        <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 32">
                            <path d="M13.043 8.356c-0.46 0-0.873 0.138-1.24 0.413s-0.662 0.681-0.885 1.217c-0.223 0.536-0.334 1.112-0.334 1.727 0 0.568 0.119 0.99 0.358 1.265s0.619 0.413 1.141 0.413c0.508 0 1.096-0.131 1.765-0.393v1.327c-0.693 0.262-1.389 0.393-2.089 0.393-0.884 0-1.572-0.254-2.063-0.763s-0.736-1.229-0.736-2.161c0-0.892 0.181-1.712 0.543-2.462s0.846-1.32 1.452-1.709 1.302-0.584 2.089-0.584c0.435 0 0.822 0.038 1.159 0.115s0.7 0.217 1.086 0.421l-0.616 1.276c-0.369-0.201-0.673-0.333-0.914-0.398s-0.478-0.097-0.715-0.097zM19.524 12.842h-2.47l-0.898 1.776h-1.671l3.999-7.491h1.948l0.767 7.491h-1.551l-0.125-1.776zM19.446 11.515l-0.136-1.786c-0.035-0.445-0.052-0.876-0.052-1.291v-0.184c-0.153 0.408-0.343 0.84-0.569 1.296l-0.982 1.965h1.739zM27.049 12.413c0 0.711-0.257 1.273-0.773 1.686s-1.213 0.62-2.094 0.62c-0.769 0-1.389-0.153-1.859-0.46v-1.398c0.672 0.367 1.295 0.551 1.869 0.551 0.39 0 0.694-0.072 0.914-0.217s0.329-0.343 0.329-0.595c0-0.147-0.024-0.275-0.070-0.385s-0.114-0.214-0.201-0.309c-0.087-0.095-0.303-0.269-0.648-0.52-0.481-0.337-0.818-0.67-1.013-1s-0.293-0.685-0.293-1.066c0-0.439 0.108-0.831 0.324-1.176s0.523-0.614 0.922-0.806 0.857-0.288 1.376-0.288c0.755 0 1.446 0.168 2.073 0.505l-0.569 1.189c-0.543-0.252-1.044-0.378-1.504-0.378-0.289 0-0.525 0.077-0.71 0.23s-0.276 0.355-0.276 0.607c0 0.207 0.058 0.389 0.172 0.543s0.372 0.36 0.773 0.615c0.421 0.272 0.736 0.572 0.945 0.9s0.313 0.712 0.313 1.151zM33.969 14.618h-1.597l0.7-3.22h-2.46l-0.7 3.22h-1.592l1.613-7.46h1.597l-0.632 2.924h2.459l0.632-2.924h1.592l-1.613 7.46zM46.319 9.831c0 0.963-0.172 1.824-0.517 2.585s-0.816 1.334-1.415 1.722c-0.598 0.388-1.288 0.582-2.067 0.582-0.891 0-1.587-0.251-2.086-0.753s-0.749-1.198-0.749-2.090c0-0.902 0.172-1.731 0.517-2.488s0.82-1.338 1.425-1.743c0.605-0.405 1.306-0.607 2.099-0.607 0.888 0 1.575 0.245 2.063 0.735s0.73 1.176 0.73 2.056zM43.395 8.356c-0.421 0-0.808 0.155-1.159 0.467s-0.627 0.739-0.828 1.283-0.3 1.135-0.3 1.771c0 0.5 0.116 0.877 0.348 1.133s0.558 0.383 0.979 0.383 0.805-0.148 1.151-0.444c0.346-0.296 0.617-0.714 0.812-1.255s0.292-1.148 0.292-1.822c0-0.483-0.113-0.856-0.339-1.12-0.227-0.264-0.546-0.396-0.957-0.396zM53.427 14.618h-1.786l-1.859-5.644h-0.031l-0.021 0.163c-0.111 0.735-0.227 1.391-0.344 1.97l-0.757 3.511h-1.436l1.613-7.46h1.864l1.775 5.496h0.021c0.042-0.259 0.109-0.628 0.203-1.107s0.407-1.942 0.94-4.388h1.43l-1.613 7.461zM13.296 20.185c0 0.98-0.177 1.832-0.532 2.556s-0.868 1.274-1.539 1.652c-0.672 0.379-1.464 0.568-2.376 0.568h-2.449l1.678-7.68h2.15c0.977 0 1.733 0.25 2.267 0.751s0.801 1.219 0.801 2.154zM8.925 23.615c0.536 0 1.003-0.133 1.401-0.399s0.71-0.657 0.934-1.174c0.225-0.517 0.337-1.108 0.337-1.773 0-0.54-0.131-0.95-0.394-1.232s-0.64-0.423-1.132-0.423h-0.624l-1.097 5.001h0.575zM18.64 24.96h-4.436l1.678-7.68h4.442l-0.293 1.334h-2.78l-0.364 1.686h2.59l-0.299 1.334h-2.59l-0.435 1.98h2.78l-0.293 1.345zM20.509 24.96l1.678-7.68h1.661l-1.39 6.335h2.78l-0.294 1.345h-4.436zM26.547 24.96l1.694-7.68h1.656l-1.694 7.68h-1.656zM33.021 23.389c0.282-0.774 0.481-1.27 0.597-1.487l2.346-4.623h1.716l-4.061 7.68h-1.814l-0.689-7.68h1.602l0.277 4.623c0.015 0.157 0.022 0.39 0.022 0.699-0.007 0.361-0.018 0.623-0.033 0.788h0.038zM41.678 24.96h-4.437l1.678-7.68h4.442l-0.293 1.334h-2.78l-0.364 1.686h2.59l-0.299 1.334h-2.59l-0.435 1.98h2.78l-0.293 1.345zM45.849 22.013l-0.646 2.947h-1.656l1.678-7.68h1.949c0.858 0 1.502 0.179 1.933 0.536s0.646 0.881 0.646 1.571c0 0.554-0.15 1.029-0.451 1.426s-0.733 0.692-1.298 0.885l1.417 3.263h-1.803l-1.124-2.947h-0.646zM46.137 20.689h0.424c0.474 0 0.843-0.1 1.108-0.3s0.396-0.504 0.396-0.914c0-0.287-0.086-0.502-0.258-0.646s-0.442-0.216-0.812-0.216h-0.402l-0.456 2.076zM53.712 20.39l2.031-3.11h1.857l-3.355 4.744-0.646 2.936h-1.645l0.646-2.936-1.281-4.744h1.694l0.7 3.11z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <!-- -right -->

            <div class="footer-primary pull-left">
                <div class="copyright-footer" style="color: #fff;">
                    © 2021 <?=$info['project']?>. All rights reserved | Design by GemsTech
                </div>
            </div>
            <!-- .left -->
        </div>
        <!-- .container -->
    </div>
    <!-- .absolute-footer -->
    <a href="#top" class="back-to-top button invert plain is-outline hide-for-medium icon circle fixed bottom z-1" id="top-link"><i class="icon-angle-up"></i></a>

</footer>
<!-- .footer-wrapper -->

</div>
<!-- #wrapper -->

<!-- Mobile Sidebar -->
<div id="main-menu" class="mobile-sidebar no-scrollbar mfp-hide">
    <div class="sidebar-menu no-scrollbar ">
        <ul class="nav nav-sidebar  nav-vertical nav-uppercase">
            <li class="menu-item menu-item-type-post_type menu-item-object-page" style="text-align: center;">
                <img src="template/images/en.png" alt="English">
                <a href="<?=HOME_VI ?>" title="Vietnamese" class="header-cart-link icon primary button round is-small"style="background-color: #FFF; padding:0;">
                    <img src="template/images/vi.png" alt="Vietnamese">
                </a>
            </li>
            <li class="header-search-form search-form html relative has-icon">
                <div class="header-search-form-wrapper">
                    <div class="searchform-wrapper ux-search-box relative form- is-normal">
                        <form method="post" class="searchform" action="search" >
                            <div class="flex-row relative">
                                <div class="flex-col flex-grow">
                                    <input type="search" class="search-field mb-0" id="keyword" name="keyword" value="" placeholder="Enter keywords..." required />
                                </div>
                                <!-- .flex-col -->
                                <div class="flex-col">
                                    <button type="submit" class="ux-search-submit submit-button secondary button icon mb-0">
                                        <i class="icon-search"></i> </button>
                                </div>
                                <!-- .flex-col -->
                            </div>
                            <!-- .flex-row -->
                            <div class="live-search-results text-left z-top"></div>
                        </form>
                    </div>
                </div>
            </li>
            <?php
            foreach ($menu as $value) {
                if ($value['sub_menu'] == 0) { ?>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page <?php if($thisUrl == $value['url']) echo 'menu-item-home';?> "><a href="<?= $value['url'] ?>" class="nav-top-link"><?= $value['name'] ?></a></li>
                    <?php } else { ?>
                    <li style="display: flex;" class="menu-item menu-item-type-post_type menu-item-object-page <?php if($thisUrl == $value['url']) echo 'menu-item-home';?>"><a href="<?= $value['url'] ?>" class="nav-top-link"><?= $value['name'] ?></a>
                        <ul class=children>
                            <?php
                                $arraySub = $data->subMenu($value['id']);
                                foreach ($arraySub as $item) {
                                    if ($item['sub_menu'] == 0) {?>
                                        <li  class="menu-item menu-item-type-taxonomy menu-item-object-product_cat  menu-item-2558"><a href="<?= $item['url'] ?>"><?= $item['name'] ?></a></li>
                                    <?php } else { ?>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children  menu-item-2547"><a href="<?= $item['url'] ?>"><?= $item['name'] ?></a>
                                            <ul class=nav-sidebar-ul>
                                            <?php
                                                $arrayChildSub = $data->subMenu($item['id']);
                                                foreach ($arrayChildSub as $child) {?>
                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat  menu-item-2548"><a href="<?= $child['url'] ?>"><?= $child['name'] ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                            <?php }
                            } ?>
                        </ul>
                    </li>
                <?php } 
            }?>
            
            <li class="html custom html_topbar_right">
                <div class="text-font-top" style="text-align:center;margin-right:28px">
                <span style="font-size: 24px; font-weight: 1000; color: #1473c5; font-family: 'Calibri' !important;"><?= $info['ten-cong-ty'] ?></span><br>
                </div>
            </li>
            <li class="html custom html_top_right_text">
                <a style="display: inline-block; margin-top: 0px !important; padding: 0 !important; font-size: 13px !important; font-weight: 400 !important; line-height: 22px !important;padding-left: 35px !important; ">
                    <i class="fa fa-phone" style="color:#ee434d;position: absolute; margin-left: -50px; font-size: 4.1em; line-height: 3.3; "></i>
                    CONSULTANCY CENTER
                    <strong style="margin-top: 0.5em; color:#ee434d;display: block; font-size: 2em; letter-spacing: -1px; "><?php echo functions::convertPhone($info['dien-thoai']);?></strong>
                    <strong style="margin-top: 0.5em; margin-bottom: 0.5em; color:#ee434d;display: block; font-size: 2em; letter-spacing: -1px; "><?php echo functions::convertPhone($info['dien-thoai-2']);?></strong>
                    <span>Working hours: 8:30 - 17:30</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- inner -->
</div>
<!-- #mobile-menu -->
<div id="login-form-popup" class="lightbox-content mfp-hide">


    <div class="woocommerce-notices-wrapper"></div>
    <div class="account-container lightbox-inner">


        <div class="col2-set row row-divided row-large" id="customer_login">

            <div class="col-1 large-6 col pb-0">

                <div class="account-login-inner">

                    <h3 class="uppercase">Đăng nhập</h3>

                    <form class="woocommerce-form woocommerce-form-login login" method="post">


                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="username">Tên tài khoản hoặc địa chỉ email <span class="required">*</span></label>
                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" value="" />
                        </p>
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="password">Mật khẩu <span class="required">*</span></label>
                            <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" />
                        </p>


                        <p class="form-row">
                            <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="5dfc33be53" /><input type="hidden" name="_wp_http_referer" value="/" /> <input type="submit" class="woocommerce-Button button" name="login" value="Đăng nhập" />
                            <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
                                <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span>Ghi nhớ mật khẩu</span>
                            </label>
                        </p>
                        <p class="woocommerce-LostPassword lost_password">
                            <a href="my-account/lost-password.html">Quên mật khẩu?</a>
                        </p>


                    </form>
                </div>
                <!-- .login-inner -->


            </div>

            <div class="col-2 large-6 col pb-0">

                <div class="account-register-inner">

                    <h3 class="uppercase">Đăng ký</h3>

                    <form method="post" class="register">



                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="reg_email">Địa chỉ email <span class="required">*</span></label>
                            <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" value="" />
                        </p>


                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="reg_password">Mật khẩu <span class="required">*</span></label>
                            <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" />
                        </p>


                        <div class="woocommerce-privacy-policy-text"></div>
                        <p class="woocommerce-FormRow form-row">
                            <input type="hidden" id="woocommerce-register-nonce" name="woocommerce-register-nonce" value="ef97fe2f4b" /><input type="hidden" name="_wp_http_referer" value="/" /> <input type="submit" class="woocommerce-Button button" name="register" value="Đăng ký" />
                        </p>


                    </form>

                </div>

            </div>
            <!-- .large-6 -->

        </div>
        <!-- .row -->

    </div>
    <!-- .account-login-container -->

</div>
<script type="text/javascript">
    (function() {
        var c = document.body.className;
        c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
        document.body.className = c;
    })();
</script>
<script type='text/javascript' src='template/wp-includes/js/dist/vendor/wp-polyfill.min89b1.js?ver=7.4.4' id='wp-polyfill-js'></script>
<script type='text/javascript' id='wp-polyfill-js-after'>
    ('fetch' in window) || document.write('<script src="template/wp-includes/js/dist/vendor/wp-polyfill-fetch.min6e0e.js?ver=3.0.0"></scr' + 'ipt>');
    (document.contains) || document.write('<script src="template/wp-includes/js/dist/vendor/wp-polyfill-node-contains.min2e00.js?ver=3.42.0"></scr' + 'ipt>');
    (window.DOMRect) || document.write('<script src="template/wp-includes/js/dist/vendor/wp-polyfill-dom-rect.min2e00.js?ver=3.42.0"></scr' + 'ipt>');
    (window.URL && window.URL.prototype && window.URLSearchParams) || document.write('<script src="template/wp-includes/js/dist/vendor/wp-polyfill-url.min5aed.js?ver=3.6.4"></scr' + 'ipt>');
    (window.FormData && window.FormData.prototype.keys) || document.write('<script src="template/wp-includes/js/dist/vendor/wp-polyfill-formdata.mine9bd.js?ver=3.0.12"></scr' + 'ipt>');
    (Element.prototype.matches && Element.prototype.closest) || document.write('<script src="template/wp-includes/js/dist/vendor/wp-polyfill-element-closest.min4c56.js?ver=2.0.2"></scr' + 'ipt>');
    ('objectFit' in document.documentElement.style) || document.write('<script src="template/wp-includes/js/dist/vendor/wp-polyfill-object-fit.min531b.js?ver=2.3.4"></scr' + 'ipt>');
</script>
<!-- <script type='text/javascript' id='contact-form-7-js-extra'>
    /* <![CDATA[ */
    var wpcf7 = {
        "api": {
            "root": "https:\/\/smtparts.vn\/wp-json\/",
            "namespace": "contact-form-7\/v1"
        },
        "cached": "1"
    };
    /* ]]> */
</script> -->
<script type='text/javascript' src='template/wp-content/plugins/contact-form-7/includes/js/indexc225.js?ver=5.4.1' id='contact-form-7-js'></script>
<script type='text/javascript' src='template/wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min44fd.js?ver=2.70' id='jquery-blockui-js'></script>
<!-- <script type='text/javascript' id='wc-add-to-cart-js-extra'>
    /* <![CDATA[ */
    var wc_add_to_cart_params = {
        "ajax_url": "\/wp-admin\/admin-ajax.php",
        "wc_ajax_url": "\/?wc-ajax=%%endpoint%%",
        "i18n_view_cart": "Xem gi\u1ecf h\u00e0ng",
        "cart_url": "https:\/\/smtparts.vn\/cart",
        "is_cart": "",
        "cart_redirect_after_add": "yes"
    };
    /* ]]> */
</script> -->
<!-- <script type='text/javascript' src='template/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min9a8d.js?ver=5.3.0' id='wc-add-to-cart-js'></script> -->
<script type='text/javascript' src='template/wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min6b25.js?ver=2.1.4' id='js-cookie-js'></script>
<script type='text/javascript' id='woocommerce-js-extra'>
    /* <![CDATA[ */
    var woocommerce_params = {
        "ajax_url": "\/wp-admin\/admin-ajax.php",
        "wc_ajax_url": "\/?wc-ajax=%%endpoint%%"
    };
    /* ]]> */
</script>
<script type='text/javascript' src='template/wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min9a8d.js?ver=5.3.0' id='woocommerce-js'></script>
<!-- <script type='text/javascript' id='wc-cart-fragments-js-extra'>
    /* <![CDATA[ */
    var wc_cart_fragments_params = {
        "ajax_url": "\/wp-admin\/admin-ajax.php",
        "wc_ajax_url": "\/?wc-ajax=%%endpoint%%",
        "cart_hash_key": "wc_cart_hash_2f347e87a8db48c44bd3bedb6ce44ed7",
        "fragment_name": "wc_fragments_2f347e87a8db48c44bd3bedb6ce44ed7",
        "request_timeout": "5000"
    };
    /* ]]> */
</script> -->
<script type='text/javascript' src='template/wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min9a8d.js?ver=5.3.0' id='wc-cart-fragments-js'></script>
<script type='text/javascript' src='template/wp-content/themes/congnghevietnam/inc/extensions/flatsome-live-search/flatsome-live-searchccfb.js?ver=3.4.2' id='flatsome-live-search-js'></script>
<script type='text/javascript' src='template/wp-content/plugins/easy-fancybox/js/jquery.fancybox.min4271.js?ver=1.3.24' id='jquery-fancybox-js'></script>
<script type='text/javascript' id='jquery-fancybox-js-after'>
    var fb_timeout, fb_opts = {
        'overlayShow': true,
        'hideOnOverlayClick': true,
        'showCloseButton': true,
        'margin': 20,
        'centerOnScroll': false,
        'enableEscapeButton': true,
        'autoScale': true
    };
    if (typeof easy_fancybox_handler === 'undefined') {
        var easy_fancybox_handler = function() {
            jQuery('.nofancybox,a.wp-block-file__button,a.pin-it-button,a[href*="pinterest.com/pin/create"],a[href*="facebook.com/share"],a[href*="twitter.com/share"]').addClass('nolightbox');
            /* IMG */
            var fb_IMG_select = 'a[href*=".jpg"]:not(.nolightbox,li.nolightbox>a),area[href*=".jpg"]:not(.nolightbox),a[href*=".jpeg"]:not(.nolightbox,li.nolightbox>a),area[href*=".jpeg"]:not(.nolightbox),a[href*=".png"]:not(.nolightbox,li.nolightbox>a),area[href*=".png"]:not(.nolightbox),a[href*=".webp"]:not(.nolightbox,li.nolightbox>a),area[href*=".webp"]:not(.nolightbox)';
            jQuery(fb_IMG_select).addClass('fancybox image');
            var fb_IMG_sections = jQuery('.gallery,.wp-block-gallery,.tiled-gallery,.wp-block-jetpack-tiled-gallery');
            fb_IMG_sections.each(function() {
                jQuery(this).find(fb_IMG_select).attr('rel', 'gallery-' + fb_IMG_sections.index(this));
            });
            jQuery('a.fancybox,area.fancybox,li.fancybox a').each(function() {
                jQuery(this).fancybox(jQuery.extend({}, fb_opts, {
                    'transitionIn': 'elastic',
                    'easingIn': 'easeOutBack',
                    'transitionOut': 'elastic',
                    'easingOut': 'easeInBack',
                    'opacity': false,
                    'hideOnContentClick': false,
                    'titleShow': true,
                    'titlePosition': 'over',
                    'titleFromAlt': true,
                    'showNavArrows': true,
                    'enableKeyboardNav': true,
                    'cyclic': false
                }))
            });
        };
        jQuery('a.fancybox-close').on('click', function(e) {
            e.preventDefault();
            jQuery.fancybox.close()
        });
    };
    var easy_fancybox_auto = function() {
        setTimeout(function() {
            jQuery('#fancybox-auto').trigger('click')
        }, 1000);
    };
    jQuery(easy_fancybox_handler);
    jQuery(document).on('post-load', easy_fancybox_handler);
    jQuery(easy_fancybox_auto);
</script>
<script type='text/javascript' src='template/wp-content/plugins/easy-fancybox/js/jquery.easing.min330a.js?ver=1.4.1' id='jquery-easing-js'></script>
<script type='text/javascript' src='template/wp-content/plugins/easy-fancybox/js/jquery.mousewheel.mina9d5.js?ver=3.1.13' id='jquery-mousewheel-js'></script>
<script type='text/javascript' src='template/wp-includes/js/hoverIntent.minc245.js?ver=1.8.1' id='hoverIntent-js'></script>
<script type='text/javascript' id='flatsome-js-js-extra'>
    /* <![CDATA[ */
    var flatsomeVars = {
        "ajaxurl": "https:\/\/smtparts.vn\/wp-admin\/admin-ajax.php",
        "rtl": "",
        "sticky_height": "50"
    };
    /* ]]> */
</script>
<script type='text/javascript' src='template/wp-content/themes/congnghevietnam/assets/js/flatsomeccfb.js?ver=3.4.2' id='flatsome-js-js'></script>
<script type='text/javascript' src='template/wp-content/themes/congnghevietnam/assets/js/woocommerceccfb.js?ver=3.4.2' id='flatsome-theme-woocommerce-js-js'></script>
<script type='text/javascript' src='template/wp-includes/js/comment-reply.min9f31.js?ver=5.7.2' id='comment-reply-js'></script>
<script type='text/javascript' src='template/wp-includes/js/wp-embed.min9f31.js?ver=5.7.2' id='wp-embed-js'></script>
<script type='text/javascript' id='zxcvbn-async-js-extra'>
    /* <![CDATA[ */
    var _zxcvbnSettings = {
        "src": "https:\/\/smtparts.vn\/wp-includes\/js\/zxcvbn.min.js"
    };
    /* ]]> */
</script>
<script type='text/javascript' src='template/wp-includes/js/zxcvbn-async.min5152.js?ver=1.0' id='zxcvbn-async-js'></script>
<script type='text/javascript' src='template/wp-includes/js/dist/hooks.minf521.js?ver=50e23bed88bcb9e6e14023e9961698c1' id='wp-hooks-js'></script>
<script type='text/javascript' src='template/wp-includes/js/dist/i18n.min87d6.js?ver=db9a9a37da262883343e941c3731bc67' id='wp-i18n-js'></script>
<script type='text/javascript' id='wp-i18n-js-after'>
    wp.i18n.setLocaleData({
        'text direction\u0004ltr': ['ltr']
    });
</script>
<script type='text/javascript' id='password-strength-meter-js-extra'>
    /* <![CDATA[ */
    var pwsL10n = {
        "unknown": "M\u1eadt kh\u1ea9u m\u1ea1nh kh\u00f4ng x\u00e1c \u0111\u1ecbnh",
        "short": "R\u1ea5t y\u1ebfu",
        "bad": "Y\u1ebfu",
        "good": "Trung b\u00ecnh",
        "strong": "M\u1ea1nh",
        "mismatch": "M\u1eadt kh\u1ea9u kh\u00f4ng kh\u1edbp"
    };
    /* ]]> */
</script>
<script type='text/javascript' id='password-strength-meter-js-translations'>
    (function(domain, translations) {
        var localeData = translations.locale_data[domain] || translations.locale_data.messages;
        localeData[""].domain = domain;
        wp.i18n.setLocaleData(localeData, domain);
    })("default", {
        "translation-revision-date": "2021-05-13 14:44:15+0000",
        "generator": "GlotPress\/3.0.0-alpha.2",
        "domain": "messages",
        "locale_data": {
            "messages": {
                "": {
                    "domain": "messages",
                    "plural-forms": "nplurals=1; plural=0;",
                    "lang": "vi_VN"
                },
                "%1$s is deprecated since version %2$s! Use %3$s instead. Please consider writing more inclusive code.": ["%1$s \u0111\u00e3 ng\u1eebng ho\u1ea1t \u0111\u1ed9ng t\u1eeb phi\u00ean b\u1ea3n %2$s! S\u1eed d\u1ee5ng thay th\u1ebf b\u1eb1ng %3$s."]
            }
        },
        "comment": {
            "reference": "wp-admin\/js\/password-strength-meter.js"
        }
    });
</script>
<script type='text/javascript' src='template/wp-admin/js/password-strength-meter.min9f31.js?ver=5.7.2' id='password-strength-meter-js'></script>
<script type='text/javascript' id='wc-password-strength-meter-js-extra'>
    /* <![CDATA[ */
    var wc_password_strength_meter_params = {
        "min_password_strength": "3",
        "stop_checkout": "",
        "i18n_password_error": "Vui l\u00f2ng nh\u1eadp m\u1eadt kh\u1ea9u kh\u00f3 h\u01a1n.",
        "i18n_password_hint": "G\u1ee3i \u00fd: M\u1eadt kh\u1ea9u ph\u1ea3i c\u00f3 \u00edt nh\u1ea5t 12 k\u00fd t\u1ef1. \u0110\u1ec3 n\u00e2ng cao \u0111\u1ed9 b\u1ea3o m\u1eadt, s\u1eed d\u1ee5ng ch\u1eef in hoa, in th\u01b0\u1eddng, ch\u1eef s\u1ed1 v\u00e0 c\u00e1c k\u00fd t\u1ef1 \u0111\u1eb7c bi\u1ec7t nh\u01b0 ! \" ? $ % ^ & )."
    };
    /* ]]> */
</script>
<script type='text/javascript' src='template/wp-content/plugins/woocommerce/assets/js/frontend/password-strength-meter.min9a8d.js?ver=5.3.0' id='wc-password-strength-meter-js'></script>
<div class="support-ultility">
    <div class="hotline">
        <div class="box-ultility">
            <span><i class="fa fa-phone-square" aria-hidden="true"></i> Hotline 1 : <strong><a href="tel:<?=$info['dien-thoai']?>"> <?php echo functions::convertPhone($info['dien-thoai']);?></a></strong></span>
            <span><i class="fa fa-phone-square" aria-hidden="true"></i> Hotline 2 : <strong><a href="tel:<?=$info['dien-thoai-2']?>"><?php echo functions::convertPhone($info['dien-thoai-2']);?></a></strong></span>
        </div>
    </div>
</div>
<script src="template/js/main.js"></script>
</body>

<!-- Mirrored from smtparts.vn/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Jun 2021 03:03:45 GMT -->

</html>