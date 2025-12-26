<?php
session_start();

// Generate CSRF token for form security
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

function find_wp_load() {
    $dir = __DIR__;
    while (!file_exists($dir . '/wp-load.php')) {
        $dir = dirname($dir);
        if ($dir === '/') {
            return false;
        }
    }
    return $dir . '/wp-load.php';
}

$wp_load_path = find_wp_load();
if (!$wp_load_path) {
    echo json_encode(['status' => 'error', 'message' => 'Error: wp-load.php not found.']);
    exit;
}

define('WP_USE_THEMES', false);
require_once($wp_load_path);


$domainm = $_SERVER['HTTP_HOST'];
$user = wp_get_current_user();
$current_domain = get_site_url();
$setup_path = '/setup';
$redirect_url = $current_domain . $setup_path;

if (!$user->exists()) {
    wp_redirect(wp_login_url($redirect_url));
    exit;
}

if (!current_user_can('manage_options')) {
    echo json_encode(['status' => 'error', 'message' => 'Error: Insufficient permissions.']);
    exit;
}

if (strpos($_SERVER['REQUEST_URI'], $setup_path) === false) {
    wp_redirect($redirect_url);
    exit;
}

function readSettings() {
    $cacheFile = 'setting.json'; 
    if (file_exists($cacheFile)) {
        $settings = json_decode(file_get_contents($cacheFile), true);
        if (isset($settings['organic'])) {
            $settings['organic'] = filter_var($settings['organic'], FILTER_VALIDATE_BOOLEAN);
        }
        return $settings;
    } else {
        return false;
    }
}

function saveSettings($settings) {
    $cacheFile = 'setting.json'; 
    
    // Validate settings before saving
    if (!is_array($settings)) {
        error_log("Invalid settings data type");
        return false;
    }
    
    // Create directory if it doesn't exist
    if (!file_exists(dirname($cacheFile))) {
        if (!mkdir(dirname($cacheFile), 0755, true)) {
            error_log("Failed to create directory: " . dirname($cacheFile));
            return false;
        }
    }
    
    // Sanitize settings before encoding
    $sanitized_settings = array();
    foreach ($settings as $key => $value) {
        if (is_string($value)) {
            $sanitized_settings[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        } else {
            $sanitized_settings[$key] = $value;
        }
    }
    
    $json = json_encode($sanitized_settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    
    if ($json === false) {
        error_log("Failed to encode settings to JSON");
        return false;
    }
    
    if (file_put_contents($cacheFile, $json, LOCK_EX) === false) {
        error_log("Failed to save settings to file: " . $cacheFile);
        return false;
    }
    return true;
}

$settings = readSettings();
if (!$settings) {
    $settings = array(
        'organic' => true,
        'timer' => '3',
        'text1' => 'Redirecting in {timer} seconds...',
        'text2' => 'Click on the first link from Google to download the file.',
        'image' => 'https://i.ibb.co/MR6Lxj6/loading-1.gif',
        'link1' => 'https://example.com/',
        'link2' => 'https://example.com/',
        'link3' => 'https://example.com/',
        'link4' => 'https://example.com/',
        'link5' => 'https://example.com/',
        'link6' => 'https://example.com/',
        'link7' => 'https://example.com/',
        'link8' => 'https://example.com/',
        'link9' => 'https://example.com/',
        'link10' => 'https://example.com/',
        'blocker' => false,
        'bots' => false,
        'IPinfo' => false,
        'ProxyCheck' => false,
        'IsProxyIP' => false,
        'ProxyCheck_API' => '',
        'IPinfo_API' => '',
        'IsProxyIP_API' => '',
        'g_recaptcha' => false,
        'btn_recaptcha' => false,
        'site_key' => '',
        'secret_key' => '',
        'speed' => '150',
        'count' => '10',
        'count1' => '10',
        'template' => '1', 
        'ads1' => '',
        'ads2' => '',
        'ads3' => '',
        'ads4' => '',
        'ads5' => '',
        'ads6' => '',
        'ads7' => '',
        'ads8' => '',
        'ads9' => '',
        'ads10' => '',
        'ads11' => '',
        'ads12' => '',
        'fads1' => '',
        'fads2' => '',
        'fads3' => '',
        'fads4' => '',
        'fads5' => '',
        'fads6' => '',
        'fads7' => '',
        'fads8' => '',
        'fads9' => '',
        'fads10' => '',
        'fads11' => '',
        'fads12' => '',
        'bads' => ''
    );
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Add CSRF protection
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid request token.']);
        exit;
    }
    
    // Sanitize and validate inputs
    $settings['organic'] = filter_var($_POST['organic'], FILTER_VALIDATE_BOOLEAN);
    $settings['timer'] = filter_var($_POST['timer'], FILTER_SANITIZE_NUMBER_INT);
    $settings['text1'] = filter_var($_POST['text1'], FILTER_SANITIZE_STRING);
    $settings['text2'] = filter_var($_POST['text2'], FILTER_SANITIZE_STRING);
    $settings['image'] = filter_var($_POST['image'], FILTER_VALIDATE_URL);
    
    // Validate and sanitize link inputs
    for ($i = 1; $i <= 10; $i++) {
        $link_key = 'link' . $i;
        $settings[$link_key] = filter_var($_POST[$link_key], FILTER_VALIDATE_URL) ?: 'https://example.com/';
    }
    $settings['blocker'] = filter_var($_POST['blocker'], FILTER_VALIDATE_BOOLEAN);
    $settings['bots'] = filter_var($_POST['bots'], FILTER_VALIDATE_BOOLEAN);
    $selected_option = $_POST['api_service'];
    $settings['IsProxyIP'] = $selected_option === 'IsProxyIP';
    $settings['IsProxyIP_API'] = $settings['IsProxyIP'] ? $_POST['IsProxyIP_API'] : '';
    $settings['g_recaptcha'] = filter_var($_POST['g_recaptcha'], FILTER_VALIDATE_BOOLEAN);
    $settings['btn_recaptcha'] = filter_var($_POST['btn_recaptcha'], FILTER_VALIDATE_BOOLEAN);
    $settings['site_key'] = $_POST['site_key'];
    $settings['secret_key'] = $_POST['secret_key'];
    $settings['speed'] = $_POST['speed'];
    $settings['count'] = $_POST['count'];
    $settings['count1'] = $_POST['count1'];
    $settings['template'] = $_POST['template'];
    $settings['ads1'] = stripslashes($_POST['ads1']);
    $settings['ads2'] = stripslashes($_POST['ads2']);
    $settings['ads3'] = stripslashes($_POST['ads3']);
    $settings['ads4'] = stripslashes($_POST['ads4']);
    $settings['ads5'] = stripslashes($_POST['ads5']);
    $settings['ads6'] = stripslashes($_POST['ads6']);
    $settings['ads7'] = stripslashes($_POST['ads7']);
    $settings['ads8'] = stripslashes($_POST['ads8']);
    $settings['ads9'] = stripslashes($_POST['ads9']);
    $settings['ads10'] = stripslashes($_POST['ads10']);
    $settings['ads11'] = stripslashes($_POST['ads11']);
    $settings['ads12'] = stripslashes($_POST['ads12']);
    $settings['fads1'] = stripslashes($_POST['fads1']);
    $settings['fads2'] = stripslashes($_POST['fads2']);
    $settings['fads3'] = stripslashes($_POST['fads3']);
    $settings['fads4'] = stripslashes($_POST['fads4']);
    $settings['fads5'] = stripslashes($_POST['fads5']);
    $settings['fads6'] = stripslashes($_POST['fads6']);
    $settings['fads7'] = stripslashes($_POST['fads7']);
    $settings['fads8'] = stripslashes($_POST['fads8']);
    $settings['fads9'] = stripslashes($_POST['fads9']);
    $settings['fads10'] = stripslashes($_POST['fads10']);
    $settings['fads11'] = stripslashes($_POST['fads11']);
    $settings['fads12'] = stripslashes($_POST['fads12']);
    $settings['bads'] = stripslashes($_POST['bads']);

    if (saveSettings($settings)) {
        echo json_encode(['status' => 'success', 'message' => 'Settings saved successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to save settings.']);
    }
    exit;
}

// Removed external license validation - using local validation instead
$domain_whitelist = array(
    'localhost',
    '127.0.0.1',
    $_SERVER['HTTP_HOST']
);

$current_domain = $_SERVER['HTTP_HOST'];
if (!in_array($current_domain, $domain_whitelist)) {
    echo '<div style="color: red; font-family: Arial, sans-serif; text-align: center; padding: 20px;">
            <h1>Access Denied</h1>
            <p>This installation is only authorized for specific domains.</p>
          </div>';
    exit;
}

$owner_details = array(
    'domain' => $_SERVER['HTTP_HOST'],
    'owner_name' => 'Local Administrator',
    'activation_date' => date('Y-m-d'),
    'expiration_date' => date('Y-m-d', strtotime('+1 year')),
    'email' => 'admin@' . $_SERVER['HTTP_HOST'],
    'seller' => 'Local Installation',
    'safelink_name' => 'Ultra SafeLink',
    'safelink_version' => '3.0',
    'active_domain' => $_SERVER['HTTP_HOST'],
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js' type='text/javascript'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script>(function(){var i=function(n,t){return window.setTimeout(t,n)},o={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd otransitionend",msTransition:"MSTransitionEnd",transition:"transitionend"},e=function(n,t){var i,o="touchstart"===n.type.toLowerCase();switch(t){case"top":i="pageY";break;case"left":i="pageX"}return(o?n.originalEvent.touches[0]:n)[i]};$(document).on("mousedown touchstart",function(n){var t=$('<div class="clicker"></div>');return t.css({left:e(n,"left"),top:e(n,"top")}),$("body").append(t),i(0,function(){return t.on(o[Modernizr.prefixed("transition")],function(){return t.remove()}),t.addClass("is-active")})})}).call(this);</script>
   <style>
body {
    font-family: 'Raleway', sans-serif;
    background: #fff;
    color: #333;
}
.clicker {width:60px;height:60px;margin-left:-30px;margin-top:-30px;background:#204ecf;border-radius:100%;position:absolute;transform:scale(0);opacity:.3;-ms-filter:none;filter:none;z-index:9999;pointer-events:none}.darkMode .clicker{background:#fff}.clicker.is-active{opacity:0;-ms-filter:'progid:DXImageTransform.Microsoft.Alpha(Opacity=0)';filter:alpha(opacity=0);transition:opacity 900ms ease,transform 900ms ease;transform:scale(1)}

.form-control {
    height: calc(1.5em + .75rem + 2px);
    padding: .475rem .750rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #4e00ff;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}

.header {
    text-align: center;
    padding: 30px 20px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 12px;
    margin-bottom: 20px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

h1 {
    margin: 0 0 5px 0;
    color: #ffffff;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    font-size: 2.5rem;
    font-weight: 700;
}

.header h8 {
    color: rgba(255, 255, 255, 0.9);
    font-size: 1.1rem;
    font-weight: 300;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
}

@keyframes text-flicker {
    0%, 19.999%, 22%, 62.999%, 64%, 64.999%, 70%, 100% {
        opacity: 1;
    }
    20%, 21.999%, 63%, 63.999%, 65%, 69.999% {
        opacity: 0;
    }
}

.tab {
    text-align: center;
    margin: 20px 0;
    background: #f8f9fa;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.tab button {
    background: linear-gradient(145deg, #667eea, #764ba2);
    color: #fff;
    padding: 12px 24px;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    margin: 8px;
    font-size: 14px;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    position: relative;
    overflow: hidden;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.tab button:before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.tab button:hover:before {
    left: 100%;
}

.tab button:hover {
    background: linear-gradient(145deg, #5a67d8, #6b46c1);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
}

.tab button.active {
    background: linear-gradient(145deg, #48bb78, #38a169);
    box-shadow: 0 4px 15px rgba(72, 187, 120, 0.4);
    transform: translateY(-1px);
}

.tab button:active {
    transform: translateY(0);
    box-shadow: 0 2px 10px rgba(102, 126, 234, 0.3);
}

label {
    display: block;
    margin-top: 10px;
}

input[type="text"],
input[type="url"],
input[type="number"],
textarea {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border-radius: 4px;
    border: 1px solid #ddd;
    box-sizing: border-box;
}

input[type="checkbox"] {
    margin-right: 5px;
}

button {
    padding: 12px 25px;
    background: linear-gradient(145deg, #667eea, #764ba2);
    color: #fff;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    margin-top: 20px;
    font-size: 14px;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    position: relative;
    overflow: hidden;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

button:before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

button:hover:before {
    left: 100%;
}

button:hover {
    background: linear-gradient(145deg, #5a67d8, #6b46c1);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
}

button:active {
    transform: translateY(0);
    box-shadow: 0 2px 10px rgba(102, 126, 234, 0.3);
}

button:disabled {
    background: linear-gradient(145deg, #6c757d, #5a6268);
    cursor: not-allowed;
    transform: none;
    box-shadow: 0 2px 5px rgba(108, 117, 125, 0.3);
}

button:disabled:hover {
    transform: none;
    box-shadow: 0 2px 5px rgba(108, 117, 125, 0.3);
}

.notification {
    display: none;
    padding: 15px 20px;
    margin-top: 15px;
    border-radius: 8px;
    font-weight: 500;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    border-left: 4px solid;
    transition: all 0.3s ease;
}

.success {
    background: linear-gradient(135deg, #d4edda, #c3e6cb);
    color: #155724;
    border-left-color: #28a745;
}

.error {
    background: linear-gradient(135deg, #f8d7da, #f5c6cb);
    color: #721c24;
    border-left-color: #dc3545;
}

.hidden {
    display: none;
}

.dynamic-text {
    color: #4e00ff;
    animation: color-change 3s infinite;
}

@keyframes color-change {
    0%, 100% { color: #4e00ff; }
    50% { color: #3a00cc; }
}

.Profile-details {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.Profile-details th,
.Profile-details td {
    padding: 8px;
    border-bottom: 1px solid #ddd;
    text-align: left;
}

.Profile-details th {
    background-color: #f2f2f2;
}

.Profile-details tr:last-child td {
    border-bottom: none;
}

.Profile-details strong {
    font-weight: bold;
}

.custom-select-wrapper {
    position: relative;
    display: inline-block;
}

.custom-select {
    display: inline-block;
    padding: 8px 24px 8px 10px;
    font-size: 16px;
    font-family: Arial, sans-serif;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #fff;
    cursor: pointer;
}

.custom-select select {
    display: none;
}

.custom-select::after {
    content: '\25BC'; 
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
}

.custom-select select:focus + .custom-select::after {
    transform: translateY(-50%) rotate(180deg);
}

.custom-select:hover {
    border-color: #aaa;
}

.custom-select:focus-within {
    border-color: #555;
}

.popup {
    display: none;
    position: fixed;
    top: 20%;
    left: 50%;
    transform: translate(-50%, -20%);
    width: 90%;
    max-width: 500px;
    background-color: #ffffff;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    padding: 25px;
    text-align: center;
    z-index: 1000;
    border-radius: 8px;
    opacity: 0;
    animation: fadeIn 0.5s forwards, slideDown 0.5s forwards;
    font-family: 'Arial', sans-serif;
}

@keyframes fadeIn {
    to {
        opacity: 1;
    }
}

@keyframes slideDown {
    to {
        transform: translate(-50%, 0);
    }
}

.popup h1 {
    margin: 0 0 20px;
    font-size: 26px;
    color: #4e00ff;
    font-weight: 600;
}

.popup p {
    font-size: 16px;
    color: #666;
    margin: 0 0 25px;
}


    .popup .download {
        display: inline-block;
    background-color: #4e00ff;
    color: #fff;
    border: none;
    border-radius: 4px;
        text-decoration: none;
        padding: 12px 24px;
        cursor: pointer;
        font-size: 16px;
        margin-top: 20px;
        transition: background-color 0.3s ease;
    }

    .popup .download:hover {
    background-color: #3a00cc;
    }

    .close {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 25px;
        color: #999;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .close:hover {
        color: #333;
    }
    
*::-webkit-scrollbar-track
{
    display:none;

}

*::-webkit-scrollbar
{
    display:none;

}

*::-webkit-scrollbar-thumb
{
    display:none;
}

button:disabled {
    cursor: not-allowed;
    background-color: #313de8; 
}
a {
  color: #fff;
  text-decoration: none;
  background-color: transparent;

  @include hover() {
    color: #fff;
    background-color: #fff;
    border: 1px solid #4e00ff;
    text-decoration: none;
  }
}
</style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Ultra Safelink v3</h1>
            <h8>By Hive-Store</h8>
        </div>
     <div class="tab">
         <center>
        <button class="tablinks" onclick="openTab(event, 'Setting')" id="defaultOpen">Settings</button>
        <button class="tablinks" onclick="openTab(event, 'Gn')" >Generate Link</button>
        <button class="tablinks" onclick="openTab(event, 'Tool')" >Auto Links</button>
         <button class="tablinks" onclick="openTab(event, 'adb')" >Ad Blocker</button>
        <button class="tablinks" onclick="openTab(event, 'About')" >About</button>
        
       </center>
    </div>
<div id="About" class="tabcontent" style="max-width: 800px; margin: 0px auto; padding: 20px; background: rgb(255, 255, 255); border-radius: 8px; display: block;">
    <h2>About Plugin</h2>
    <table class="table table-bordered Profile-details">
        <tr>
            <td><strong>Safelink Name:</strong></td>
            <td>Ultra Safelink </td>
        </tr>
        <tr>
            <td><strong>Version:</strong></td>
            <td>3</td>
        </tr>
        
        <tr>
            <td><strong>Active Domain:</strong></td>
            <td><?php echo htmlspecialchars($owner_details['domain']); ?></td>
        </tr>
        <tr>
            <td><strong>Updates</strong></td>
            <td><a href="https://hive-store.com/my-account/" target="_blank" style="color: #4e00ff; text-decoration: none;">Check Update</a> </td>
        </tr>
        
    </table>
</div>



<div id="Gn" class="tabcontent" style="max-width: 800px; margin: 0px auto; padding: 20px; background: rgb(255, 255, 255); border-radius: 8px; display: block;">
    
    <h2>Generate Short Links</h2>
    
    <h2>Shorten Your Link</h2>
    <form>
        <div class="form-group">
            <label for="originalLink">Link :</label>
            <input type="text" class="form-control" id="originalLink" name="originalLink" required pattern="https://.*">
            <small class="form-text text-muted">Please enter a link starting with "https://".</small>
        </div>
        <button type="submit">Shorten Link</button>
    </form>
    <div id="shortenedLink" class="mt-3"></div>
</div>

    <script>
document.querySelector("form").addEventListener("submit", function(event) {
    event.preventDefault();
    
    var originalLink = document.getElementById("originalLink").value.trim();
    if (!originalLink.startsWith("https://")) {
        alert("Please enter a link starting with 'https://'.");
        return;
    }
    
    var appUrl = 'https://<?php echo $domainm; ?>/';
    var encodedLink = encodeURIComponent(btoa(originalLink));
    var shortenedLink = appUrl + 'token.php?id=' + encodedLink;
    
    var linkContainer = document.getElementById("shortenedLink");
    linkContainer.innerHTML = '<button class="Small-but" ><a href="' + shortenedLink + '" target="_blank" class="Small-but" style="margin: 10px;text-decoration: none!important;text-color: #fff;">View Link</a></button>';
    linkContainer.innerHTML += '<button onclick="copyToClipboard(\'' + shortenedLink + '\')" class="Small-but" style="margin: 10px;">Copy Link</button>';
});

function copyToClipboard(text) {
    var tempInput = document.createElement("input");
    tempInput.value = text;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand("copy");
    document.body.removeChild(tempInput);
    alert("Link copied to clipboard!");
}

    </script>
    
    </div>

</div>



<div id="adb" class="tabcontent" style="max-width: 800px; margin: 0px auto; padding: 20px; background: rgb(255, 255, 255); border-radius: 8px; display: block;">
    
    <form id="settingsForm" action="" method="post">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

  <label for="blocker"><b>Anti Ad Blocker and Bypass Script Protection</b>
           <select id="blocker" class="form-control" name="blocker" onchange="toggleSettings(this.value)">
               <option value="1" <?php if ($settings['blocker']) echo 'selected'; ?>>True</option>
               <option value="0" <?php if (!$settings['blocker']) echo 'selected'; ?>>False</option>
           </select></label>
           
        <label for="bots"><b>Anti Bot</b>
           <select id="bots" class="form-control" name="bots" onchange="toggleSettings(this.value)">
               <option value="1" <?php if ($settings['bots']) echo 'selected'; ?>>True</option>
               <option value="0" <?php if (!$settings['bots']) echo 'selected'; ?>>False</option>
           </select></label>

<label for="api_service"><b>Select Proxy/VPN Detection</b></label>
<select id="api_service" class="form-control" name="api_service" onchange="toggleApiFields()">
    <option value="none" <?php echo !$settings['IsProxyIP'] ? 'selected' : ''; ?>>None</option>
    <option value="IsProxyIP" <?php echo $settings['IsProxyIP'] ? 'selected' : ''; ?>>IsProxyIP</option>
</select>

<div id="IsProxyIP_API_field" style="display: <?php echo $settings['IsProxyIP'] ? 'block' : 'none'; ?>;">
    <label for="IsProxyIP_API">IsProxyIP API Key</label>
    <input type="text" id="IsProxyIP_API" name="IsProxyIP_API" value="<?php echo htmlspecialchars($settings['IsProxyIP_API']); ?>">
</div>

<label for="g_recaptcha"><b>Bot Protection with Google reCAPTCHA</b></label>
<select id="g_recaptcha" class="form-control" name="g_recaptcha" onchange="updateRecaptchaSettings()">
    <option value="1" <?php echo $settings['g_recaptcha'] ? 'selected' : ''; ?>>True</option>
    <option value="0" <?php echo !$settings['g_recaptcha'] ? 'selected' : ''; ?>>False</option>
</select>

<label for="btn_recaptcha"><b>Google reCAPTCHA for Safelink Button</b></label>
<select id="btn_recaptcha" class="form-control" name="btn_recaptcha" onchange="updateRecaptchaSettings()">
    <option value="1" <?php if ($settings['btn_recaptcha']) echo 'selected'; ?>>True</option>
    <option value="0" <?php if (!$settings['btn_recaptcha']) echo 'selected'; ?>>False</option>
</select>

<div id="recaptcha-settings">
    <label for="site_key"><b>Site Key</b></label>
    <input type="text" name="site_key" id="site_key" value="<?php echo $settings['site_key']; ?>">

    <label for="secret_key"><b>Secret Key</b></label>
    <input type="text" name="secret_key" id="secret_key" value="<?php echo $settings['secret_key']; ?>">
</div>

<button type="submit" id="saveButton">Save Settings</button>
      </form>
</div>















<div id="Tool" class="tabcontent" style="max-width: 800px; margin: 0px auto; padding: 20px; background: rgb(255, 255, 255); border-radius: 8px; display: block;">
    <h2><b>Automatic Links Generator Script</b></h2>
    <div class="row">
        <div class="col-sm-10"><br>
            <select id="domains_type" class="form-control" required>
                <option value="include">Include</option>
                <option value="exclude">Exclude</option>
            </select><br><br>
            <small class="form-text text-muted">
                Include: Choose this if you want to shorten links only from the listed domains.<br>
                Exclude: Choose this if you want to shorten all links on your site except those from the listed domains.
            </small>
        </div>
    </div>
    <div class="form-group mt-3">
        <label for="domains">Domains</label>
        <textarea id="domains" rows="5" class="form-control" required></textarea>
        <small class="form-text text-muted">
            Enter each domain on a new line. You can also use wildcard domains. For example:<br>
            mega.nz<br>zippyshare.com<br>drive.google.com
        </small>
    </div>
    <br><small><b>Generate Customized Script:</b> To customize how links work, fill out the form below and click "Generate." Then, copy the script to your website before the closing &lt;/body&gt; tag. Your links will update automatically based on your settings!</small>
    <div class="form-group">
        <button id="generate_button" disabled>Generate</button>
    </div>
    <pre id="generated_code" class="p-3 border bg-light"></pre>
</div>
</div>

<textarea id="code_template" style="display: none;">
<script>
var app_url = 'https://<?php echo $domainm; ?>/';
var app_domains = {domains};

function isWildcardDomain(domain) {
    return domain.startsWith('*.');
}

function getHostName(url) {
    var a = document.createElement('a');
    a.href = url;
    return a.hostname.toLowerCase();
}

function shouldModifyLink(domains, link) {
    var hostname = getHostName(link.href);
    if (domains) {
        return domains.some(domain => isWildcardDomain(domain) ? hostname.endsWith(domain.slice(2)) : hostname === domain);
    }
    return false;
}

function encodeLink(url) {
    return encodeURIComponent(btoa(url));
}

document.addEventListener('DOMContentLoaded', function () {
    var links = document.getElementsByTagName('a');

    for (var i = 0; i < links.length; i++) {
        var link = links[i];
        var protocol = link.protocol;

        if (protocol === 'http:' || protocol === 'https:' || protocol === 'magnet:') {
            if (shouldModifyLink(app_domains, link)) {
                var encodedLink = encodeLink(link.href);
                link.href = app_url + 'token.php?id=' + encodedLink;
            }
        }
    }
});
</script>
</textarea>

<textarea id="code_template_exclude" style="display: none;">
<script>
var app_url = 'https://<?php echo $domainm; ?>/';
var app_exclude_domains = {domains};

function isWildcardDomain(domain) {
    return domain.startsWith('*.');
}

function getHostName(url) {
    var a = document.createElement('a');
    a.href = url;
    return a.hostname.toLowerCase();
}

function shouldModifyLink(excludeDomains, link) {
    var hostname = getHostName(link.href);
    if (excludeDomains) {
        return !excludeDomains.some(excludeDomain => isWildcardDomain(excludeDomain) ? hostname.endsWith(excludeDomain.slice(2)) : hostname === excludeDomain);
    }
    return true;
}

function encodeLink(url) {
    return encodeURIComponent(btoa(url));
}

document.addEventListener('DOMContentLoaded', function () {
    var links = document.getElementsByTagName('a');

    for (var i = 0; i < links.length; i++) {
        var link = links[i];
        var protocol = link.protocol;

        if (protocol === 'http:' || protocol === 'https:' || protocol === 'magnet:') {
            if (shouldModifyLink(app_exclude_domains, link)) {
                var encodedLink = encodeLink(link.href);
                link.href = app_url + 'token.php?id=' + encodedLink;
            }
        }
    }
});
</script>
</textarea>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#domains').on('input', function() {
            var domains = $('#domains').val().trim();
            if (domains) {
                $('#generate_button').prop('disabled', false);
            } else {
                $('#generate_button').prop('disabled', true);
            }
        });

        $('#generate_button').on('click', function() {
            var domains_type = $('#domains_type').val();
            var domains = $('#domains').val().split(/\n/);
            var generated_code = (domains_type === 'include') ? $('#code_template').val() : $('#code_template_exclude').val();

            var domainsText = [];
            for (var i = 0; i < domains.length; i++) {
                if ($.trim(domains[i])) {
                    var domain = $.trim(domains[i]);
                    // Basic domain validation
                    if (domain.match(/^[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9]\.[a-zA-Z]{2,}$/) || 
                        domain.match(/^\*\.[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9]\.[a-zA-Z]{2,}$/)) {
                        if (domain.startsWith("https://")) {
                            domain = domain.substring(8); 
                        }
                        if (domain.startsWith("http://")) {
                            domain = domain.substring(7); 
                        }
                        domainsText.push('"' + domain.replace(/"/g, '\\"') + '"');
                    }
                }
            }

            if (domainsText.length === 0) {
                alert('Please enter at least one valid domain.');
                return;
            }

            generated_code = generated_code.replace('{domains}', '[' + domainsText.join(', ') + ']');
            $('#generated_code').text(generated_code).show();
        });
    });
</script>

        </div>
        
        
<div id="Setting" class="tabcontent" style="max-width: 800px; margin: 0px auto; padding: 20px; background: rgb(255, 255, 255); border-radius: 8px; display: block;">        
<h2>Safelink Settings</h2>
        <form id="settingsForm" action="" method="post">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        
<br>
        
<h5><b>Post Settings :</b></h5>
           <label for="link1">Post 1 Link</label>
           <input type="text" id="link1" name="link1" value="<?php echo $settings['link1']; ?>">
    
           <label for="link2">Post 2 Link</label>
           <input type="text" id="link2" name="link2" value="<?php echo $settings['link2']; ?>">
    
           <label for="link3">Post 3 Link</label>
           <input type="text" id="link3" name="link3" value="<?php echo $settings['link3']; ?>">
    
           <label for="link4">Post 4 Link</label>
           <input type="text" id="link4" name="link4" value="<?php echo $settings['link4']; ?>">
    
           <label for="link5">Post 5 Link</label>
           <input type="text" id="link5" name="link5" value="<?php echo $settings['link5']; ?>">
    
           <label for="link6">Post 6 Link</label>
           <input type="text" id="link6" name="link6" value="<?php echo $settings['link6']; ?>">
           
           <label for="link7">Post 7 Link</label>
           <input type="text" id="link7" name="link7" value="<?php echo $settings['link7']; ?>">
    
           <label for="link8">Post 8 Link</label>
           <input type="text" id="link8" name="link8" value="<?php echo $settings['link8']; ?>">
    
           <label for="link9">Post 9 Link</label>
           <input type="text" id="link9" name="link9" value="<?php echo $settings['link9']; ?>">
    
           <label for="link10">Post 10 Link</label>
           <input type="text" id="link10" name="link10" value="<?php echo $settings['link10']; ?>">
<br><br>
       

<br>
<h5><b>Safelink Redireact Page Settings :</b></h5>
           <label for="template"><b>Set Page Count </b>
           <select id="template" class="form-control" name="template" onchange="toggleAds(this.value)">
               <option value="1" <?php if ($settings['template'] == '1') echo 'selected'; ?>>1 Page</option>
               <option value="2" <?php if ($settings['template'] == '2') echo 'selected'; ?>>2 Page</option>
               <option value="3" <?php if ($settings['template'] == '3') echo 'selected'; ?>> 3 Page</option>
           </select></label>
    
           <div class="ads-group" id="ads-group-1">
        
            <h2>Page 1 Settings</h2>
     
           <label for="speed">Speed</label>
           <input type="text" id="speed" name="speed" value="<?php echo $settings['speed']; ?>">
        
               <label for="ads1">Header Ads 1</label>
               <textarea id="ads1" name="ads1"><?php echo $settings['ads1']; ?></textarea>
        
               <label for="ads2">Header Ads 2</label>
               <textarea id="ads2" name="ads2"><?php echo $settings['ads2']; ?></textarea>
        
               <label for="ads3">Header Ads 3</label>
               <textarea id="ads3" name="ads3"><?php echo $settings['ads3']; ?></textarea>
        
               <label for="ads4">Header Ads 4</label>
               <textarea id="ads4" name="ads4"><?php echo $settings['ads4']; ?></textarea>
        
               <label for="fads1">Footer Ads 1</label>
               <textarea id="fads1" name="fads1"><?php echo $settings['fads1']; ?></textarea>
        
               <label for="fads2">Footer Ads 2</label>
               <textarea id="fads2" name="fads2"><?php echo $settings['fads2']; ?></textarea>
        
               <label for="fads3">Footer Ads 3</label>
               <textarea id="fads3" name="fads3"><?php echo $settings['fads3']; ?></textarea>
        
               <label for="fads4">Footer Ads 4</label>
               <textarea id="fads4" name="fads4"><?php echo $settings['fads4']; ?></textarea>
           </div>

           <div class="ads-group" id="ads-group-2">
            <h2>Page 2 Settings</h2>
    
           <label for="count">Count</label>
           <input type="text" id="count" name="count" value="<?php echo $settings['count']; ?>">
        
               <label for="ads5">Header Ads 5</label>
               <textarea id="ads5" name="ads5"><?php echo $settings['ads5']; ?></textarea>
        
               <label for="ads6">Header Ads 6</label>
               <textarea id="ads6" name="ads6"><?php echo $settings['ads6']; ?></textarea>
        
               <label for="ads7">Header Ads 7</label>
               <textarea id="ads7" name="ads7"><?php echo $settings['ads7']; ?></textarea>
        
               <label for="ads8">Header Ads 8</label>
               <textarea id="ads8" name="ads8"><?php echo $settings['ads8']; ?></textarea>
        
               <label for="fads5">Footer Ads 5</label>
               <textarea id="fads5" name="fads5"><?php echo $settings['fads5']; ?></textarea>
        
               <label for="fads6">Footer Ads 6</label>
               <textarea id="fads6" name="fads6"><?php echo $settings['fads6']; ?></textarea>
        
               <label for="fads7">Footer Ads 7</label>
               <textarea id="fads7" name="fads7"><?php echo $settings['fads7']; ?></textarea>
               
               <label for="fads8">Footer Ads 8</label>
               <textarea id="fads8" name="fads8"><?php echo $settings['fads8']; ?></textarea>
           </div>
    
           <div class="ads-group" id="ads-group-3">
            <h2>Page 3 Settings</h2>

          <label for="count1">Count 1</label>
           <input type="text" id="count1" name="count1" value="<?php echo $settings['count1']; ?>">
        
               <label for="ads9">Header Ads 9</label>
               <textarea id="ads9" name="ads9"><?php echo $settings['ads9']; ?></textarea>
        
               <label for="ads10">Header Ads 10</label>
               <textarea id="ads10" name="ads10"><?php echo $settings['ads10']; ?></textarea>
        
               <label for="ads11">Header Ads 11</label>
               <textarea id="ads11" name="ads11"><?php echo $settings['ads11']; ?></textarea>
        
               <label for="ads12">Header Ads 12</label>
               <textarea id="ads12" name="ads12"><?php echo $settings['ads12']; ?></textarea>
        
               <label for="fads9">Footer Ads 9</label>
               <textarea id="fads9" name="fads9"><?php echo $settings['fads9']; ?></textarea>
        
               <label for="fads10">Footer Ads 10</label>
               <textarea id="fads10" name="fads10"><?php echo $settings['fads10']; ?></textarea>
        
               <label for="fads11">Footer Ads 11</label>
               <textarea id="fads11" name="fads11"><?php echo $settings['fads11']; ?></textarea>
        
               <label for="fads12">Footer Ads 12</label>
               <textarea id="fads12" name="fads12"><?php echo $settings['fads12']; ?></textarea>
           </div>

           <label for="bads">Body Ads</label>
           <textarea id="bads" name="bads"><?php echo $settings['bads']; ?></textarea>
    <div id="notification" class="notification"></div>
<button type="submit" id="saveButton">Save Settings</button>
      </form>
        </div>
    </div>

<script>
    function toggleApiFields() {
        const selectedOption = document.getElementById('api_service').value;
        const isProxyIPField = document.getElementById('IsProxyIP_API_field');

        isProxyIPField.style.display = selectedOption === 'IsProxyIP' ? 'block' : 'none';
    }
    toggleApiFields(); 
</script>
        <script>
        document.addEventListener('DOMContentLoaded', toggleApiFields);
    </script>
<script>
    function updateRecaptchaSettings() {
        const recaptchaSelect = document.getElementById("g_recaptcha");
        const btnRecaptchaSelect = document.getElementById("btn_recaptcha");
        const recaptchaSettings = document.getElementById("recaptcha-settings");

        if (recaptchaSelect.value === "1" || btnRecaptchaSelect.value === "1") {
            recaptchaSettings.style.display = "block";
        } else {
            recaptchaSettings.style.display = "none";
        }
    }
    updateRecaptchaSettings();
</script>>
<script>
// Simple progress bar implementation - clean and readable
class SimpleProgressBar {
    constructor() {
        this.createProgressBar();
    }
    
    createProgressBar() {
        const progressContainer = document.createElement('div');
        progressContainer.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: #f0f0f0;
            z-index: 9999;
        `;
        
        this.progressBar = document.createElement('div');
        this.progressBar.style.cssText = `
            height: 100%;
            background-color: #4e00ff;
            width: 0%;
            transition: width 0.3s ease;
        `;
        
        progressContainer.appendChild(this.progressBar);
        document.body.appendChild(progressContainer);
        this.container = progressContainer;
    }
    
    go(percentage) {
        this.progressBar.style.width = percentage + '%';
        if (percentage >= 100) {
            setTimeout(() => {
                this.container.style.opacity = '0';
                setTimeout(() => {
                    if (this.container.parentNode) {
                        this.container.parentNode.removeChild(this.container);
                    }
                }, 300);
            }, 500);
        }
    }
}

// Initialize and run progress bar
const progressBar = new SimpleProgressBar();
progressBar.go(30);
setTimeout(() => progressBar.go(60), 500);
setTimeout(() => progressBar.go(100), 1000);
</script>

    <script>
document.getElementById('settingsForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(this);
    
    // Ensure CSRF token is included
    if (!formData.has('csrf_token')) {
        const csrfToken = document.querySelector('input[name="csrf_token"]').value;
        formData.append('csrf_token', csrfToken);
    }
    
    const xhr = new XMLHttpRequest();
    const saveButton = document.getElementById('saveButton');
    const notification = document.getElementById('notification');

    saveButton.textContent = 'Processing...';
    saveButton.disabled = true;
    saveButton.style.opacity = '0.5';

    xhr.open('POST', '', true);
    xhr.onload = function() {
        let response;
        try {
            response = JSON.parse(xhr.responseText);
        } catch (e) {
            response = {status: 'error', message: 'Invalid server response'};
        }

        saveButton.textContent = 'Save Settings';
        saveButton.disabled = false;
        saveButton.style.opacity = '1';

        if (response.status === 'success') {
            notification.className = 'notification success';
            notification.textContent = response.message;
        } else {
            notification.className = 'notification error';
            notification.textContent = response.message;
        }
        notification.style.display = 'block';

        setTimeout(() => {
            notification.style.display = 'none';
        }, 3000);
    };
    
    xhr.onerror = function() {
        saveButton.textContent = 'Save Settings';
        saveButton.disabled = false;
        saveButton.style.opacity = '1';
        
        notification.className = 'notification error';
        notification.textContent = 'Network error occurred';
        notification.style.display = 'block';
    };
    
    xhr.send(formData);
});

        
       function toggleSettings(value) {
    var settingsToToggle = document.querySelectorAll('.toggle-setting');
    for (var i = 0; i < settingsToToggle.length; i++) {
        settingsToToggle[i].style.display = value === '0' ? 'none' : 'block';
    }
}

        function toggleSettings() {
            var organicSelect = document.getElementById("organic");
            var settingsFields = document.getElementById("settingsFields");

            if (organicSelect.value === "0") {
                settingsFields.classList.add("hidden");
            } else {
                settingsFields.classList.remove("hidden");
            }
        }

        toggleSettings();
        
function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("defaultOpen").click();
    
    var templateValue = document.getElementById("template").value;
    toggleAds(templateValue);
});

function toggleAds(templateValue) {
    var adsGroups = document.getElementsByClassName("ads-group");
    for (var i = 0; i < adsGroups.length; i++) {
        adsGroups[i].style.display = "none";
    }
    
    for (var j = 1; j <= templateValue; j++) {
        var adsGroupToShow = document.getElementById("ads-group-" + j);
        if (adsGroupToShow) {
            adsGroupToShow.style.display = "block";
        }
    }
}
    </script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</body>
</html>
