<?php
$data->checkViews();
$thisUrl = isset($_GET['url']) ? $_GET['url'] : null;
$url = rtrim($thisUrl, '/');
$url = explode('/', $thisUrl);
$page['title'] = (isset($page['title'])) ? $page['title'] : "VANDA";
$page['description'] = (isset($page['description'])) ? strip_tags($page['description']) : "Website bán hàng với các sản phẩm phù hợp với bạn";
$page['keywords'] = (isset($page['keywords'])) ? $page['keywords'] : "ban hang, kinh doanh, VANDA";
$page['image'] = (isset($page['image'])) ? $page['image'] : $info['avatar'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?= HOME ?>/" />
    <title><?= $page['title'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="icon" type="image/png" href="template/images/favicon.png" /> -->
    <link rel="icon" href="<?= $info['favicon'] ?>" sizes="32x32" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="<?= $page['description'] ?>" />
    <meta name="keywords" content="<?= $page['keywords'] ?>">
    <meta property="og:url" content="<?php echo HOME . '/' . $thisurl ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?= $page['title'] ?>" />
    <meta property="og:description" content="<?= $page['description'] ?>" />
    <meta property="og:image" content="<?= $page['image'] ?>" />
    <meta property="og:image:alt" content="<?= $page['title'] ?>" />
    <meta property="og:image:width" content="620" />
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
    <meta property="og:locale" content="vi_VN">
    <meta property="og:site_name" content="<?= $page['title'] ?>">
    <meta property="og:updated_time" content="2021-06-05T11:09:10+07:00">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= $page['title'] ?>">
    <meta name="twitter:description" content="<?= $page['title'] ?>">
    <!--/tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="pingback" href="xmlrpc.php" />

    <script>
        (function(html) {
            html.className = html.className.replace(/\bno-js\b/, 'js')
        })(document.documentElement);
        const BASE_URL = "<?= HOME ?>";
    </script>
    <!-- <script type="application/ld+json" class="rank-math-schema">
        {
            "@context": "https://schema.org",
            "@graph": [{
                "@type": "Organization",
                "@id": "https://smtparts.vn/#organization",
                "name": "SMTPART",
                "url": "https://smtparts.vn"
            }, {
                "@type": "WebSite",
                "@id": "https://smtparts.vn/#website",
                "url": "https://smtparts.vn",
                "name": "SMTPART",
                "publisher": {
                    "@id": "https://smtparts.vn/#organization"
                },
                "inLanguage": "vi",
                "potentialAction": {
                    "@type": "SearchAction",
                    "target": "https://smtparts.vn/?s={search_term_string}",
                    "query-input": "required name=search_term_string"
                }
            }, {
                "@type": "Person",
                "@id": "https://smtparts.vn/author/admin",
                "name": "admin",
                "url": "https://smtparts.vn/author/admin",
                "image": {
                    "@type": "ImageObject",
                    "@id": "https://secure.gravatar.com/avatar/e3788029a111a1919f55555db54f8079?s=96&amp;d=mm&amp;r=g",
                    "url": "https://secure.gravatar.com/avatar/e3788029a111a1919f55555db54f8079?s=96&amp;d=mm&amp;r=g",
                    "caption": "admin",
                    "inLanguage": "vi"
                },
                "worksFor": {
                    "@id": "https://smtparts.vn/#organization"
                }
            }, {
                "@type": "WebPage",
                "@id": "https://smtparts.vn#webpage",
                "url": "https://smtparts.vn",
                "name": "C\u00d4NG TY TNHH KHAI TH\u00c1C C\u00d4NG NGH\u1ec6 SMT VI\u1ec6T NAM l",
                "datePublished": "2013-11-20T09:39:49+07:00",
                "dateModified": "2018-06-05T11:09:10+07:00",
                "author": {
                    "@id": "https://smtparts.vn/author/admin"
                },
                "isPartOf": {
                    "@id": "https://smtparts.vn/#website"
                },
                "inLanguage": "vi"
            }, {
                "@type": "Article",
                "headline": "C\u00d4NG TY TNHH KHAI TH\u00c1C C\u00d4NG NGH\u1ec6 SMT VI\u1ec6T NAM l",
                "keywords": "C\u00d4NG TY TNHH KHAI TH\u00c1C C\u00d4NG NGH\u1ec6 SMT VI\u1ec6T NAM",
                "datePublished": "2013-11-20T09:39:49+07:00",
                "dateModified": "2018-06-05T11:09:10+07:00",
                "author": {
                    "@type": "Person",
                    "name": "admin"
                },
                "publisher": {
                    "@id": "https://smtparts.vn/#organization"
                },
                "name": "C\u00d4NG TY TNHH KHAI TH\u00c1C C\u00d4NG NGH\u1ec6 SMT VI\u1ec6T NAM l",
                "@id": "https://smtparts.vn#richSnippet",
                "isPartOf": {
                    "@id": "https://smtparts.vn#webpage"
                },
                "inLanguage": "vi",
                "mainEntityOfPage": {
                    "@id": "https://smtparts.vn#webpage"
                }
            }]
        }
    </script> -->
    <!-- /Rank Math WordPress SEO plugin -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Thing",
      "name": "<?php echo $page['title'] ?>",
      "subjectOf": {
        "@type": "Book",
        "name": "<?php echo $page['title'] ?>"
      }
    }
    </script>

    <link rel='dns-prefetch' href='http://s.w.org/' />
    <link rel="alternate" type="application/rss+xml" title="Dòng thông tin SMTPART &raquo;" href="feed" />
    <link rel="alternate" type="application/rss+xml" title="Dòng phản hồi SMTPART &raquo;" href="comments/feed" />
    <link rel="alternate" type="application/rss+xml" title="SMTPART &raquo; TRANG CHỦ Dòng phản hồi" href="trang-chu/feed" />
    <script type="text/javascript">
        window._wpemojiSettings = {
            "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/13.0.1\/72x72\/",
            "ext": ".png",
            "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/13.0.1\/svg\/",
            "svgExt": ".svg",
            "source": {
                "concatemoji": "https:\/\/smtparts.vn\/wp-includes\/js\/wp-emoji-release.min.js?ver=5.7.2"
            }
        };
        ! function(e, a, t) {
            var n, r, o, i = a.createElement("canvas"),
                p = i.getContext && i.getContext("2d");

            function s(e, t) {
                var a = String.fromCharCode;
                p.clearRect(0, 0, i.width, i.height), p.fillText(a.apply(this, e), 0, 0);
                e = i.toDataURL();
                return p.clearRect(0, 0, i.width, i.height), p.fillText(a.apply(this, t), 0, 0), e === i.toDataURL()
            }

            function c(e) {
                var t = a.createElement("script");
                t.src = e, t.defer = t.type = "text/javascript", a.getElementsByTagName("head")[0].appendChild(t)
            }
            for (o = Array("flag", "emoji"), t.supports = {
                    everything: !0,
                    everythingExceptFlag: !0
                }, r = 0; r < o.length; r++) t.supports[o[r]] = function(e) {
                if (!p || !p.fillText) return !1;
                switch (p.textBaseline = "top", p.font = "600 32px Arial", e) {
                    case "flag":
                        return s([127987, 65039, 8205, 9895, 65039], [127987, 65039, 8203, 9895, 65039]) ? !1 : !s([55356, 56826, 55356, 56819], [55356, 56826, 8203, 55356, 56819]) && !s([55356, 57332, 56128, 56423, 56128, 56418, 56128, 56421, 56128, 56430, 56128, 56423, 56128, 56447], [55356, 57332, 8203, 56128, 56423, 8203, 56128, 56418, 8203, 56128, 56421, 8203, 56128, 56430, 8203, 56128, 56423, 8203, 56128, 56447]);
                    case "emoji":
                        return !s([55357, 56424, 8205, 55356, 57212], [55357, 56424, 8203, 55356, 57212])
                }
                return !1
            }(o[r]), t.supports.everything = t.supports.everything && t.supports[o[r]], "flag" !== o[r] && (t.supports.everythingExceptFlag = t.supports.everythingExceptFlag && t.supports[o[r]]);
            t.supports.everythingExceptFlag = t.supports.everythingExceptFlag && !t.supports.flag, t.DOMReady = !1, t.readyCallback = function() {
                t.DOMReady = !0
            }, t.supports.everything || (n = function() {
                t.readyCallback()
            }, a.addEventListener ? (a.addEventListener("DOMContentLoaded", n, !1), e.addEventListener("load", n, !1)) : (e.attachEvent("onload", n), a.attachEvent("onreadystatechange", function() {
                "complete" === a.readyState && t.readyCallback()
            })), (n = t.source || {}).concatemoji ? c(n.concatemoji) : n.wpemoji && n.twemoji && (c(n.twemoji), c(n.wpemoji)))
        }(window, document, window._wpemojiSettings);
    </script>
    <style type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 .07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <link rel='stylesheet' id='wp-block-library-css' href='template/wp-includes/css/dist/block-library/style.min9f31.css?ver=5.7.2' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-block-vendors-style-css' href='template/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/vendors-style5859.css?ver=4.9.1' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-block-style-css' href='template/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/style5859.css?ver=4.9.1' type='text/css' media='all' />
    <link rel='stylesheet' id='contact-form-7-css' href='template/wp-content/plugins/contact-form-7/includes/css/stylesc225.css?ver=5.4.1' type='text/css' media='all' />
    <style id='woocommerce-inline-inline-css' type='text/css'>
        .woocommerce form .form-row .required {
            visibility: visible;
        }
    </style>
    <link rel='stylesheet' id='flatsome-icons-css' href='template/wp-content/themes/congnghevietnam/assets/css/fl-icons6de8.css?ver=3.3' type='text/css' media='all' />
    <link rel='stylesheet' id='fancybox-css' href='template/wp-content/plugins/easy-fancybox/css/jquery.fancybox.min4271.css?ver=1.3.24' type='text/css' media='screen' />
    <link rel='stylesheet' id='flatsome-main-css' href='template/wp-content/themes/congnghevietnam/assets/css/flatsomeccfb.css?ver=3.4.2' type='text/css' media='all' />
    <link rel='stylesheet' id='flatsome-shop-css' href='template/wp-content/themes/congnghevietnam/assets/css/flatsome-shopccfb.css?ver=3.4.2' type='text/css' media='all' />
    <link rel='stylesheet' id='flatsome-style-css' href='template/wp-content/themes/congnghevietnam/styleccfb.css?ver=3.4.2' type='text/css' media='all' />
    <!-- <script type='text/javascript' src='template/wp-includes/js/jquery/jquery.min9d52.js?ver=3.5.1' id='jquery-core-js'></script> -->
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script type='text/javascript' src='template/wp-includes/js/jquery/jquery-migrate.mind617.js?ver=3.3.2' id='jquery-migrate-js'></script>
    <link rel="https://api.w.org/" href="template/wp-json/index.html" />
    <link rel="alternate" type="application/json" href="template/wp-json/wp/v2/pages/71.json" />
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="xmlrpc0db0.php?rsd" />
    <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="template/wp-includes/wlwmanifest.xml" />
    <meta name="generator" content="WordPress 5.7.2" />
    <link rel='shortlink' href='index.html' />
    <link rel="alternate" type="application/json+oembed" href="template/wp-json/oembed/1.0/embed3fc5.json?url=https%3A%2F%2Fsmtparts.vn%2F" />
    <link rel="alternate" type="text/xml+oembed" href="template/wp-json/oembed/1.0/embedf253?url=https%3A%2F%2Fsmtparts.vn%2F&amp;format=xml" />
    <style>
        .bg {
            opacity: 0;
            transition: opacity 1s;
            -webkit-transition: opacity 1s;
        }

        .bg-loaded {
            opacity: 1;
        }
    </style>
    <script type="text/javascript">
        WebFontConfig = {
            google: {
                families: ["Roboto:regular,700:vietnamese", "Roboto+Condensed:regular,regular:vietnamese", "Roboto:regular,700:vietnamese", "Roboto+Condensed:regular,regular:vietnamese", ]
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = 'js/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>
    <noscript>
        <style>
            .woocommerce-product-gallery {
                opacity: 1 !important;
            }
        </style>
    </noscript>
    <link rel="apple-touch-icon" href="template/wp-content/uploads/2018/04/logo.png" />
    <style id="custom-css" type="text/css">
        :root {
            --primary-color: #446084;
        }

        /* Site Width */

        .header-main {
            height: 110px
        }

        #logo img {
            max-height: 110px
        }

        #logo {
            width: 180px;
        }

        .header-top {
            min-height: 30px
        }

        .has-transparent+.page-title:first-of-type,
        .has-transparent+#main>.page-title,
        .has-transparent+#main>div>.page-title,
        .has-transparent+#main .page-header-wrapper:first-of-type .page-title {
            padding-top: 190px;
        }

        .header.show-on-scroll,
        .stuck .header-main {
            height: 50px !important
        }

        .stuck #logo img {
            max-height: 50px !important
        }

        .header-bottom {
            background-color: #f1f1f1
        }

        .stuck .header-main .nav>li>a {
            line-height: 50px
        }

        @media (max-width: 549px) {
            .header-main {
                height: 70px
            }

            #logo img {
                max-height: 70px
            }
        }

        @media screen and (max-width: 549px) {
            body {
                font-size: 100%;
            }
        }

        body {
            font-family: "Roboto Condensed", sans-serif
        }

        body {
            font-weight: 0
        }

        .nav>li>a {
            font-family: "Roboto", sans-serif;
        }

        .nav>li>a {
            font-weight: 700;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .heading-font,
        .off-canvas-center .nav-sidebar.nav-vertical>li>a {
            font-family: "Roboto", sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .heading-font,
        .banner h1,
        .banner h2 {
            font-weight: 700;
        }

        .alt-font {
            font-family: "Roboto Condensed", sans-serif;
        }

        .alt-font {
            font-weight: 0 !important;
        }

        .products.has-equal-box-heights .box-image {
            padding-top: 100%;
        }

        @media screen and (min-width: 550px) {
            .products .box-vertical .box-image {
                min-width: 247px !important;
                width: 247px !important;
            }
        }

        #fancybox-title {
            z-index: 111102;
            display: none !important;
        }

        .list-product-home p.name.product-title {
            height: 38px;
            overflow: hidden;
            font-size: 15px;
        }

        @media (max-width: 549px) {
            .list-product-home p.name.product-title {
                height: auto;
            }

            .footer-widgets.footer.footer-2.dark {
                padding: 20px 0px 0px 0px;
                background-size: cover;
            }
        }

        .label-new.menu-item>a:after {
            content: "New";
        }

        .label-hot.menu-item>a:after {
            content: "Hot";
        }

        .label-sale.menu-item>a:after {
            content: "Sale";
        }

        .label-popular.menu-item>a:after {
            content: "Popular";
        }
    </style>
    <link rel="stylesheet" href="template/css/style.css">
    <link rel='stylesheet' href='template/css/topmenu.css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- //for bootstrap working -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet" />
    <link href="//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic" rel="stylesheet" type="text/css" />
    <!-- facebook -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=2861959690584988&autoLogAppEvents=1" nonce="xHfgo18x"></script>
</head>

<body class="home page-template page-template-page-blank page-template-page-blank-php page page-id-71 theme-congnghevietnam woocommerce-no-js lightbox nav-dropdown-has-arrow">
    <!-- header -->
    <a class="skip-link screen-reader-text" href="#main">Skip to content</a>
    <div id="wrapper">


        <header id="header" class="header has-sticky sticky-jump">
            <div class="header-wrapper">
                <!-- <div id="top-bar" class="header-top hide-for-sticky nav-dark">
                    <div class="flex-row container">
                        <div class="flex-col hide-for-medium flex-left">
                            <ul class="nav nav-left medium-nav-center nav-small  nav-divided">
                                <li class="html custom html_topbar_left">Chào mừng các bạn đến với <strong>Vanda ® </strong></li>
                            </ul>
                        </div>

                        <div class="flex-col hide-for-medium flex-center">
                            <ul class="nav nav-center nav-small  nav-divided">
                            </ul>
                        </div>

                        <div class="flex-col hide-for-medium flex-right">
                            <ul class="nav top-bar-nav nav-right nav-small  nav-divided">
                                <li id="menu-item-2569" class="nav-01 menu-item menu-item-type-custom menu-item-object-custom  menu-item-2569"><a href="#" class="nav-top-link">Quy trình làm việc</a></li>
                                <li id="menu-item-2658" class="nav-02 menu-item menu-item-type-post_type menu-item-object-page  menu-item-2658"><a href="huong-dan-mua-hang" class="nav-top-link">Hướng dẫn mua hàng</a></li>
                                <li id="menu-item-2571" class="nav-02 menu-item menu-item-type-custom menu-item-object-custom  menu-item-2571"><a href="#" class="nav-top-link">Chính sách &#038; Quy định</a></li>
                                <li id="menu-item-2572" class="nav-03 menu-item menu-item-type-custom menu-item-object-custom  menu-item-2572"><a href="#" class="nav-top-link">Trung tâm CSKH</a></li>
                                <li class="html header-social-icons ml-0">
                                    <div class="social-icons follow-icons "><a href="http://url/" target="_blank" data-label="Facebook" rel="nofollow" class="icon primary button round facebook tooltip" title="Follow on Facebook"><i class="icon-facebook"></i></a><a href="http://url/" target="_blank" rel="nofollow" data-label="Instagram" class="icon primary button round  instagram tooltip" title="Follow on Instagram"><i class="icon-instagram"></i></a><a href="http://url/" target="_blank" data-label="Twitter" rel="nofollow" class="icon primary button round  twitter tooltip" title="Follow on Twitter"><i class="icon-twitter"></i></a><a href="mailto:your@email" data-label="E-mail" rel="nofollow" class="icon primary button round  email tooltip" title="Send us an email"><i class="icon-envelop"></i></a></div>
                                </li>
                            </ul>
                        </div>

                        <div class="flex-col show-for-medium flex-grow">
                            <ul class="nav nav-center nav-small mobile-nav  nav-divided">
                                <li class="html custom html_topbar_left">Chào mừng các bạn đến với <strong>Vanda ® </strong></li>
                            </ul>
                        </div>

                    </div>
                </div> -->
                <!-- #header-top -->
                <div id="masthead" class="header-main hide-for-sticky">
                    <div class="header-inner flex-row container logo-left medium-logo-center" role="navigation">

                        <!-- Logo -->
                        <div id="logo" class="flex-col logo">
                            <!-- Header logo -->
                            <a href="<?= HOME ?>" title="<?= $info['ten-cong-ty'] ?>" rel="home">
                                <img width="180" height="110" src="<?= $info['logo'] ?>" class="header_logo header-logo" alt="<?= $info['ten-cong-ty'] ?>" />
                                <img width="180" height="110" src="<?= $info['logo'] ?>" class="header-logo-dark" alt="<?= $info['ten-cong-ty'] ?>" />
                            </a>
                        </div>

                        <!-- Mobile Left Elements -->
                        <div class="flex-col show-for-medium flex-left">
                            <ul class="mobile-nav nav nav-left ">
                                <li class="nav-icon has-icon">
                                    <a href="#" data-open="#main-menu" data-pos="left" data-bg="main-menu-overlay" data-color="" class="is-small" aria-controls="main-menu" aria-expanded="false">
                                        <i class="icon-menu"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Left Elements -->
                        <div class="flex-col hide-for-medium flex-left flex-grow">
                            <ul class="header-nav header-nav-main nav nav-left  nav-uppercase">
                            </ul>
                        </div>
                        <!-- Right Elements -->
                        <div class="flex-col hide-for-medium flex-right w-100">
                            <ul class="header-nav header-nav-main nav nav-right nav-uppercase">
                                <li class="html custom html_topbar_right w-75">
                                    <div class="text-font-top" style="text-align:center;margin-right:28px;">
                                        <span style="font-size: 40px; font-weight: 1000; color: #1473c5; font-family: 'Calibri' !important;"><?= $info['ten-cong-ty'] ?></span><br>
                                        <!-- <i style="font-size: 14px; color: #2f2f2f;"><?= $info['mo-ta'] ?></i> -->
                                    </div>
                                </li>
                                <li class="html custom html_top_right_text">
                                    <a style="display: inline-block; margin-top: 0px !important; padding: 0 !important; font-size: 13px !important; font-weight: 400 !important; line-height: 22px !important;padding-left: 50px !important; ">
                                        <i class="fa fa-phone" style=" padding-right: 10px; color:#ee434d;position: absolute; margin-left: -50px; font-size: 4.1em; line-height: 2; "></i>
                                        CONSULTANCY CENTER
                                        <strong style="margin-top:5px; color:#ee434d;display: block; font-size: 2em; letter-spacing: -1px; font-family: 'Roboto';"><?php echo functions::convertPhone($info['dien-thoai']); ?></strong>
                                        <strong style="margin-top:5px; color:#ee434d;display: block; font-size: 2em; letter-spacing: -1px; font-family: 'Roboto';"><?php echo functions::convertPhone($info['dien-thoai-2']); ?></strong>
                                        <span>Working hours: 8:30 - 17:30</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Mobile Right Elements -->
                        <!-- <div class="flex-col show-for-medium flex-right">
                            <ul class="mobile-nav nav nav-right ">
                                <li class="cart-item has-icon">

                                    <div class="header-button">
                                        <a href="cart" class="header-cart-link off-canvas-toggle nav-top-link icon primary button round is-small" data-open="#cart-popup" data-class="off-canvas-cart" title="Giỏ hàng" data-pos="right">

                                            <i class="icon-shopping-cart" data-icon-label="0">
                                            </i>
                                        </a>
                                    </div>

                                    Cart Sidebar Popup
                                    <div id="cart-popup" class="mfp-hide widget_shopping_cart">
                                        <div class="cart-popup-inner inner-padding">
                                            <div class="cart-popup-title text-center">
                                                <h4 class="uppercase">Giỏ hàng</h4>
                                                <div class="is-divider"></div>
                                            </div>
                                            <div class="widget_shopping_cart_content">


                                                <p class="woocommerce-mini-cart__empty-message">Chưa có sản phẩm trong giỏ hàng.</p>


                                            </div>
                                            <div class="cart-sidebar-content relative"></div>
                                        </div>
                                    </div>

                                </li>
                            </ul>
                        </div> -->

                    </div>
                    <!-- .header-inner -->

                    <!-- Header divider -->
                    <div class="container">
                        <div class="top-divider full-width"></div>
                    </div>
                </div>
                <!-- .header-main -->
                <div id="wide-nav" class="header-bottom wide-nav hide-for-medium">
                    <div class="flex-row container">

                        <div class="flex-col hide-for-medium flex-left">
                            <ul class="nav header-nav header-bottom-nav nav-left  nav-uppercase">
                                <?php
                                foreach ($menu as $value) {
                                    if ($value['sub_menu'] == 0) { ?>
                                     <li id="menu-item-694" class="menu-item menu-item-type-post_type menu-item-object-page <?php if($thisUrl == $value['url']) echo 'menu-item-home';?> current-menu-item page_item page-item-71 current_page_item active  menu-item-694"><a href="<?= $value['url'] ?>" class="nav-top-link"><?= $value['name'] ?></a></li>
                                     <?php } else { ?>
                                        <li class="dropdown">
                                            <a href="<?= $value['url'] ?>" class="dropdown-toggle" data-toggle="dropdown"><?= $value['name'] ?><b class="caret"></b></a>
                                            <ul class="dropdown-menu multi-level" style="padding-top: 5px;">
                                                <?php
                                                    $arraySub = $data->subMenu($value['id']);
                                                    foreach ($arraySub as $item) {
                                                        if ($item['sub_menu'] == 0) {?>
                                                            <li><a href="<?= $item['url'] ?>"><?= $item['name'] ?></a></li>
                                                        <?php } else { ?>
                                                        <li class="dropdown-submenu">
                                                            <a href="<?= $item['url'] ?>" class="dropdown-toggle" data-toggle="dropdown"><?= $item['name'] ?></a>
                                                            <ul class="dropdown-menu">
                                                                <?php
                                                                    $arrayChildSub = $data->subMenu($item['id']);
                                                                    foreach ($arrayChildSub as $child) {?>
                                                                        <li><a href="<?=$child['url']?>"><?=$child['name']?></a></li>
                                                                <?php } ?>
                                                            </ul>
                                                        </li>
                                                    <?php }
                                                } ?>
                                            </ul>
                                        </li>
                                    <?php } 
                                }?>
                            </ul>
                        </div>

                        <div class="flex-col hide-for-medium flex-right flex-grow">
                            <ul class="nav header-nav header-bottom-nav nav-right  nav-uppercase">
                                <li class="header-search-form search-form html relative has-icon">
                                    <div class="header-search-form-wrapper">
                                        <div class="searchform-wrapper ux-search-box relative form- is-normal">
                                            <form method="post" class="searchform" action="search">
                                                <div class="flex-row relative">
                                                    <div class="flex-col flex-grow">
                                                        <input type="search" class="mb-0" name="keyword" value="<?php if (isset($_REQUEST['keyword'])) echo $_REQUEST['keyword']; ?>" placeholder="Enter keywords..." required />
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
                                <li class="cart-item has-icon has-dropdown">
                                    <div class="header-button">
                                        <a title="English" class="header-cart-link icon primary button round is-small" style="background-color: #FFF;">
                                            <img src="template/images/en.png" alt="English">
                                        </a>
                                    </div>
                                    <ul class="nav-dropdown nav-dropdown-default fix-flag-block">
                                        <a href="<?=HOME_VI ?>"  title="Vietnamese" class="header-cart-link icon primary button round is-small" style="background-color: #FFF;">
                                            <img src="template/images/vi.png" alt="Vietnamese">
                                        </a>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- flex-col -->


                    </div>
                    <!-- .flex-row -->
                </div>
                <!-- .header-bottom -->

                <div class="header-bg-container fill">
                    <div class="header-bg-image fill"></div>
                    <div class="header-bg-color fill"></div>
                </div>
                <!-- .header-bg-container -->
            </div>
            <!-- header-wrapper-->
        </header>
        <!-- /header -->