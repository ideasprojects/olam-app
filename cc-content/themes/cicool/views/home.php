<!DOCTYPE html>
<html data-style-switcher-options="{'changeLogo': false, 'colorPrimary': '#446084', 'colorSecondary': '#f7f7f7', 'colorTertiary': '#2baab1', 'colorQuaternary': '#383f48', 'borderRadius': 0}">
    <head>
        <!-- Basic -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <title><?= site_name(); ?></title>

        <meta name="keywords" content="<?= site_name(); ?>" />
        <meta name="description" content="<?= get_option('site_description'); ?>" />
        <meta name="author" content="<?= get_option('author'); ?>" />

        <!-- Favicon -->
        <link rel="shortcut icon" href="https://www.olamgroup.com/content/dam/olamgroup/icons/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="https://www.olamgroup.com/content/dam/olamgroup/icons/favicon.ico" />

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no" />

        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400" rel="stylesheet" type="text/css" />

        <!-- Vendor CSS -->
        <script defer src="asset/css/all.js"></script>
        <link rel="stylesheet" href="asset/css/bootstrap.min.css" />
        <link rel="stylesheet" href="asset/css/all.min.css" />
        <link rel="stylesheet" href="asset/css/animate.min.css" />
        <link rel="stylesheet" href="asset/css/simple-line-icons.min.css" />
        <link rel="stylesheet" href="asset/css/owl.carousel.min.css" />
        <link rel="stylesheet" href="asset/css/owl.theme.default.min.css" />
        <link rel="stylesheet" href="asset/css/magnific-popup.min.css" />

        <link rel="stylesheet" type="text/css" href="asset/css/typewriter.css" />

        <link rel="stylesheet" href="asset/css/theme.css" />
        <link rel="stylesheet" href="asset/css/theme-elements.css" />
        <link rel="stylesheet" href="asset/css/theme-blog.css" />
        <link rel="stylesheet" href="asset/css/theme-shop.css" />

        <link rel="stylesheet" href="asset/css/settings.css" />
        <link rel="stylesheet" href="asset/css/layers.css" />
        <link rel="stylesheet" href="asset/css/navigation.css" />

        <link rel="stylesheet" href="asset/css/skin-corporate-15.css" />
        <!-- <script src="master/style-switcher/style.switcher.localstorage.js"></script>  -->

        <!-- Head Libs -->
        <script src="asset/css/modernizr.min.js"></script>
    </head>

    <header
        id="header"
        class="header-transparent header-semi-transparent header-semi-transparent-dark"
        data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': false, 'stickyStartAt': 53, 'stickySetTop': '-53px'}"
    >
        <div class="header-body border-top-0 bg-dark box-shadow-none">
            <div class="header-top header-top-borders header-top-light-2-borders">
                <div class="container container-lg h-100">
                    <div class="header-row h-100">
                        <div class="header-column justify-content-start">
                            <div class="header-row">
                                <nav class="header-nav-top">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item nav-item-borders py-2 d-none d-sm-inline-flex">
                                            <span class="pl-0"><i class="far fa-dot-circle text-4 text-color-primary" style="top: 1px;"></i> 1234 Street Name, City Name</span>
                                        </li>
                                        <li class="nav-item nav-item-borders py-2">
                                            <a href="tel:123-456-7890"><i class="fab fa-whatsapp text-4 text-color-primary" style="top: 0;"></i> 123-456-7890</a>
                                        </li>
                                        <li class="nav-item nav-item-borders py-2 d-none d-md-inline-flex">
                                            <a href="mailto:mail@domain.com"><i class="far fa-envelope text-4 text-color-primary" style="top: 1px;"></i> mail@domain.com</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="header-column justify-content-end">
                            <div class="header-row">
                                <nav class="header-nav-top">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item nav-item-borders py-2 d-lg-inline-flex">
                                          <?php if (!app()->aauth->is_loggedin()): ?>
                                          <a href="<?= site_url('administrator/login'); ?>">Login</a>
                                          <?php else: ?>
                                          <a href="<?= site_url('administrator/dashboard'); ?>">Dashboard</a>
                                          <?php endif; ?>
                                        </li>
                                        <li class="nav-item nav-item-borders py-2 pr-0 dropdown">
                                            <a class="nav-link" href="#" role="button" id="dropdownLanguage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="https://drilchem.com/storage/flag-lang/united-states-of-america-flag-icon-16.png" class="flag flag-us" alt="English" /> English
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-container header-container-height-sm container container-lg">
                <div class="header-row">
                    <div class="header-column">
                        <div class="header-row">
                            <div class="header-logo">
                                <a href="<?= site_url() ?>">
                                    <img alt="Porto" width="130" height="auto" src="asset/img/logo-white.png" />
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="header-column justify-content-end">
                        <div class="header-row">
                            <div class="header-nav header-nav-links header-nav-dropdowns-dark header-nav-light-text order-2 order-lg-1">
                                <div class="header-nav-main header-nav-main-mobile-dark header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                    <nav class="collapse">
                                        <ul class="nav nav-pills" id="mainNav">
                                            <li class="dropdown">
                                                <a class="dropdown-item" href="#homepage"> Home </a>
                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-item" href="#about"> About </a>
                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-item" href="#purpose"> Purpose </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
                                    <i class="fas fa-bars"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <body class="loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 500}">
        <div class="loading-overlay">
            <div class="bounce-loader">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>

        <div class="body">
            <div role="main" class="main">
                <div class="slider-container rev_slider_wrapper" style="height: 100vh;" id="homepage">
                    <div
                        id="revolutionSlider"
                        class="slider rev_slider"
                        data-version="5.4.8"
                        data-plugin-revolution-slider
                        data-plugin-options="{'addOnTypewriter': { 'enable': true }, 'sliderLayout': 'fullscreen', 'delay': 9000, 'gridwidth': [1410,1110,930,690], 'gridheight': 700, 'disableProgressBar': 'on', 'responsiveLevels': [4096,1422,1182,974], 'navigation' : {'arrows': { 'enable': true, 'style': 'arrows-style-1 arrows-primary' }, 'bullets': {'enable': true, 'style': 'bullets-style-1', 'h_align': 'center', 'v_align': 'bottom', 'space': 7, 'v_offset': 70, 'h_offset': 0}}}"
                    >
                        <ul>
                            <li class="slide-overlay slide-overlay-level-8" data-transition="fade">
                                <img src="asset/img/saru.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" />

                                <h1
                                    class="tp-caption font-weight-extra-bold text-color-light"
                                    data-frames='[{"delay":1000,"speed":500,"frame":"0","from":"opacity:0;x:50%;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                                    data-x="['left','left','left','center']"
                                    data-y="center"
                                    data-voffset="['-85','-85','-85','-85']"
                                    data-fontsize="['48','48','48','48']"
                                    data-lineheight="['55','55','55','55']"
                                    data-letterspacing="-1"
                                >
                                    We are a leading
                                </h1>

                                <div
                                    class="tp-caption font-weight-extra-bold text-color-light"
                                    data-frames='[{"delay":500,"speed":2500,"from":"y:50px;sX:1;sY:1;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                    data-type="text"
                                    data-typewriter='{"lines":"supplying food ingredients.,feed and fibre to thousands of customers.,ranging from multi-national organisations.,with world famous brands, to small family run businesses.","enabled":"on","speed":"60","delays":"1%7C100","looped":"on","cursorType":"one","blinking":"on","word_delay":"off","sequenced":"on","hide_cursor":"off","start_delay":"1500","newline_delay":"1000","deletion_speed":"20","deletion_delay":"1000","blinking_speed":"500","linebreak_delay":"60","cursor_type":"two","background":"off"}'
                                    data-x="['left','left','left','center']"
                                    data-y="center"
                                    data-voffset="['-33','-33','-33','-33']"
                                    data-responsive_offset="on"
                                    data-width="['750','750','750','750']"
                                    data-fontsize="['48','48','48','48']"
                                    data-lineheight="['55','55','55','55']"
                                    data-textAlign="['left','left','left','center']"
                                >
                                    food and agri-business.
                                </div>

                                <div
                                    class="tp-caption font-weight-light text-color-light ws-normal"
                                    data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2300,"split":"chars","splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                    data-x="['left','left','left','center']"
                                    data-y="center"
                                    data-voffset="['33','33','33','33']"
                                    data-width="['900','900','900','900']"
                                    data-fontsize="['18','18','18','22']"
                                    data-lineheight="['26','26','26','26']"
                                    data-textAlign="['left','left','left','center']"
                                >
                                    We aim to re-imagine global agriculture so that it is better.
                                </div>

                                <a
                                    class="tp-caption btn btn-primary font-weight-bold rounded"
                                    href="#about"
                                    data-frames='[{"delay":3000,"speed":2000,"frame":"0","from":"y:50%;opacity:0;","to":"y:0;o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                                    data-x="['left','left','left','center']"
                                    data-y="center"
                                    data-voffset="['103','103','103','140']"
                                    data-paddingtop="['16','16','16','24']"
                                    data-paddingbottom="['16','16','16','24']"
                                    data-paddingleft="['40','40','40','45']"
                                    data-paddingright="['40','40','40','45']"
                                    data-fontsize="['14','14','14','18']"
                                    data-lineheight="['20','20','20','22']"
                                >
                                    LEARN MORE <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="pt-5" id="about">
                    <div class="row justify-content-center">
                        <div class="col-xl-8 text-center mb-4">
                            <h2 class="font-weight-bold text-8 mb-3 appear-animation" data-appear-animation="fadeIn">A Taste of What We Do</h2>
                            <p class="line-height-9 text-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                                <span class="">
                                    As well as growing crops in our own orchards and estates, we source from over five million farmers and operate 75 large processing and manufacturing facilities. We develop ingredients and packaging
                                    solutions, and deliver risk management, logistics and infrastructure to support our customers’ needs. Through our Packaged Foods Business, we market our own brands directly to consumers in Africa. Here’s
                                    a flavour of what that looks like.
                                </span>
                            </p>
                        </div>
                    </div>
                </div>

                <section class="section section-no-border mb-5 p-0" id="strategy">
                    <div class="container">
                        <div class="row justify-content-center text-center">
                            <div class="col-md-4 mb-2 appear-animation" data-appear-animation="fadeIn">
                                <h4 class="font-weight-bold mb-2 mt-4 mt-md-0">Our Strategy</h4>
                                <p class="px-lg-4 mb-0">
                                    In January 2019, we launched a revised strategy to enhance our leadership position and capture value from key emerging consumer trends.
                                </p>
                            </div>
                            <div class="col-md-4 appear-animation" data-appear-animation="fadeInLeftBig">
                                <h4 class="font-weight-bold mb-2 mt-4 mt-md-0">Purpose & Vision</h4>
                                <p class="px-lg-4 mb-0">
                                    We aim to address the challenges involved in meeting the needs of a growing population, while achieving positive impact for farming communities, our planet and our stakeholders.
                                </p>
                            </div>
                            <div class="col-md-4 appear-animation" data-appear-animation="fadeInRightBig">
                                <h4 class="font-weight-bold mb-2 mt-4 mt-md-0">Our Values</h4>
                                <p class="px-lg-4 mb-0">
                                    Our values are at the heart of our business; they’re the tangible expression of our culture and the foundation of our shared philosophy.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="section section-no-border section-height-3 bg-color-primary my-0">
                    <div class="container">
                        <div class="row counters counters-sm text-light">
                            <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInLeftShorter">
                                <div class="counter">
                                    <label class="text-light opacity-6 font-weight-normal pt-1">Estabilished</label>
                                    <strong data-to="1989" data-append="">0</strong>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInDownShorter">
                                <div class="counter">
                                    <label class="text-light opacity-6 font-weight-normal pt-1">We Employ</label>
                                    <strong data-to="81000" data-append="+">0</strong>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 mb-4 mb-sm-0 appear-animation" data-appear-animation="fadeInUpShorter">
                                <div class="counter">
                                    <label class="text-light opacity-6 font-weight-normal pt-1">Farmers</label>
                                    <strong data-to="5" data-append="M">0</strong>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 appear-animation" data-appear-animation="fadeInRightShorter">
                                <div class="counter">
                                    <label class="text-light opacity-6 font-weight-normal pt-1">Countries</label>
                                    <strong data-to="60" data-append="+">0</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="container my-5" id="purpose">
                    <div class="row py-5">
                        <div class="col">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="featured-boxes featured-boxes-modern-style-1">
                                        <div class="featured-box overlay overlay-show overlay-op-9 border-radius border-0">
                                            <div class="featured-box-background" style="background-image: url(asset/img/video-thumbnail.png); background-size: cover; background-position: center;"></div>
                                            <div class="box-content px-lg-4 px-xl-5 py-lg-5">
                                                <div class="py-5 my-4">
                                                    <a class="text-decoration-none lightbox" href="https://vimeo.com/45830194" data-plugin-options="{'type':'iframe'}">
                                                        <img
                                                            class="icon-animated"
                                                            width="60"
                                                            src="https://portotheme.com/html/porto/8.0.0/vendor/linea-icons/linea-music/icons/music_play_button.svg"
                                                            alt=""
                                                            data-icon
                                                            data-plugin-options="{'color': '#FFF', 'animated': true, 'delay': 600, 'strokeBased': true}"
                                                        />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 text-center text-lg-left">
                                    <h4 class="text-6 font-weight-bold line-height-5 mt-4 mt-lg-0">Living Our Purpose.</h4>
                                    <p>With our sector facing huge challenges, we aim to re-imagine global agriculture so that it is better for the over 5 million farmers in our extended supply chain, their communities and our planet.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer id="footer" class="mt-0">
            <div class="container container-lg">
                <div class="footer-copyright footer-copyright-style-2">
                    <div class="py-2">
                        <div class="row py-4">
                            <div class="col d-flex align-items-center justify-content-center mb-4 mb-lg-0">
                                <p>© Copyright 2020. All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Vendor -->
        <script src="asset/css/jquery.min.js"></script>
        <script src="asset/css/jquery.appear.min.js"></script>
        <script src="asset/css/jquery.easing.min.js"></script>
        <script src="asset/css/jquery.cookie.min.js"></script>
        <!-- <script src="asset/style.switcher.js"></script> -->
        <script src="asset/css/popper.min.js"></script>
        <script src="asset/css/bootstrap.min.js"></script>
        <script src="asset/css/common.min.js"></script>
        <script src="asset/css/jquery.validate.min.js"></script>
        <script src="asset/css/jquery.easypiechart.min.js"></script>
        <script src="asset/css/jquery.gmap.min.js"></script>
        <script src="asset/css/jquery.lazyload.min.js"></script>
        <script src="asset/css/jquery.isotope.min.js"></script>
        <script src="asset/css/owl.carousel.min.js"></script>
        <script src="asset/css/jquery.magnific-popup.min.js"></script>
        <script src="asset/css/jquery.vide.min.js"></script>
        <script src="asset/css/vivus.min.js"></script>

        <script src="asset/css/theme.js"></script>
        <script src="asset/css/jquery.themepunch.tools.min.js"></script>
        <script src="asset/css/jquery.themepunch.revolution.min.js"></script>

        <script type="text/javascript" src="asset/css/revolution.addon.typewriter.min.js"></script>

        <script src="asset/css/theme.init.js"></script>
    </body>
</html>
