<?php
include 'setup/setting.php'; // Ensure this file sets up $site_key and $secret_key

// Add modern button styles to footer
echo '<style>
    /* Modern Button Styles for Footer */
    .hive-text-center{text-align:center}
    .hive-text-center button{
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
        margin: 0 auto;
        border-radius: 50px;
        text-align: center;
        font-size: 14px;
        font-weight: 600;
        padding: 15px 30px;
        transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        border: none;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        position: relative;
        overflow: hidden;
        text-transform: uppercase;
        letter-spacing: 1px;
        min-width: 180px;
    }
    
    .hive-text-center button:before {
        content: \'\';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }
    
    .hive-text-center button:hover:before {
        left: 100%;
    }
    
    .hive-text-center button:hover,.hive-text-center button:active,.hive-text-center button:focus{
        background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
    }
    
    .hive-text-center button:active {
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.3);
    }
    
    .hive-text-center button:disabled {
        background: linear-gradient(135deg, #9ca3af 0%, #6b7280 100%);
        cursor: not-allowed;
        transform: none;
        box-shadow: 0 4px 15px rgba(156, 163, 175, 0.2);
    }
    
    .hive_btn {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 600;
        padding: 15px 30px;
        transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        border: none;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        position: relative;
        overflow: hidden;
        text-transform: uppercase;
        letter-spacing: 1px;
        min-width: 180px;
        text-decoration: none;
        display: inline-block;
        cursor: pointer;
    }
    
    .hive_btn:before {
        content: \'\';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }
    
    .hive_btn:hover:before {
        left: 100%;
    }
    
    .hive_btn:hover {
        background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
        color: #fff;
        text-decoration: none;
    }
    
    .hive_btn:disabled {
        background: linear-gradient(135deg, #9ca3af 0%, #6b7280 100%);
        cursor: not-allowed;
        transform: none;
        box-shadow: 0 4px 15px rgba(156, 163, 175, 0.2);
    }
</style>';

// SECURITY: Safe cookie processing with validation
$code = 11;
if (isset($_COOKIE["took"])) {
    $ultrasafelink7 = $_COOKIE["took"];
    
    // Safe base64 decoding with validation
    if (preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $ultrasafelink7)) {
        $ultrasafelink = base64_decode($ultrasafelink7);
        
        // Validate URL for safety
        if (!filter_var($ultrasafelink, FILTER_VALIDATE_URL)) {
            $ultrasafelink = '#'; // Safe fallback
            error_log("SafeLink: Invalid URL provided in footer1 cookie");
        }
    } else {
        $ultrasafelink = '#'; // Safe fallback
        error_log("SafeLink: Invalid base64 data provided in footer1 cookie");
    }
?>
<center>
    <!---------- ADS CODE HERE -------------->
    <?php if (!empty($fads1)) echo html_entity_decode($fads1, ENT_QUOTES, 'UTF-8'); ?>
</center>

<div id="robot" class="hive-text-center">
    <center><button id="robot2" style="display: none; margin: 0px;" onclick="hivelink()">Dual Tap "Continue"</button></center>                            
</div>
<center>
    <!---------- ADS CODE HERE -------------->    
    <?php if (!empty($fads2)) echo html_entity_decode($fads2, ENT_QUOTES, 'UTF-8'); ?>
</center>

<div id="hive-btn" style="display: none; margin: 0px;" class="hive-text-center">
    <center><button id="hiveli2" class="hive_btn" disabled>Please wait..</button></center>
</div>
<center>
    <!---------- ADS CODE HERE -------------->    
    <?php if (!empty($fads3)) echo html_entity_decode($fads3, ENT_QUOTES, 'UTF-8'); ?>
</center>
<?php if($btn_recaptcha) { ?>
<div id="hive-snp2" class="hive-text-center" style="display: none;">
    <center>
        <form id="open-continue-form" action="" method="post">
            <div class="g-recaptcha" data-sitekey="<?php echo $site_key; ?>" data-callback="onSubmit"></div>
            <button id="open-continue-btn" class="hive_btn" style="display: none; margin: 0%; text-decoration: none;" rel="noopener nofollow">Open-Continue</button>
        </form>
    </center>
</div>
<?php } else { ?>
<div id="hive-snp2" class="hive-text-center" style="display: none;">
    <center>
        <button id="open-continue-btn" class="hive_btn" onclick="window.location.href='<?php echo $ultrasafelink; ?>';" rel="noopener nofollow">Open-Continue</button>
    </center>
</div>
<?php } ?>
<center>
    <!---------- ADS CODE HERE -------------->    
    <?php if (!empty($fads4)) echo html_entity_decode($fads4, ENT_QUOTES, 'UTF-8'); ?>
</center>

<script>
function hivelink() {
    document.getElementById("robot2").style.display = "none";
    document.getElementById('hive-btn').style.display = 'block';
    var count = 5;
    var counter = setInterval(timer, 1300);
    function timer() {
        count = count - 1;
        if (count <= 0) {
            document.getElementById('hive-btn').style.display = 'none';
            document.getElementById('hive-snp2').style.display = 'block';
            clearInterval(counter);
            return;
        }
    }
}

function onSubmit(token) {
    document.getElementById("open-continue-form").submit();
}

function onClick(e) {
    e.preventDefault();
    grecaptcha.execute();
}
</script>
<center><?php if (!empty($bads)) echo html_entity_decode($bads, ENT_QUOTES, 'UTF-8');?></center>
<?php
}

// SECURITY: Safe recaptcha verification without external file_get_contents
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $recaptcha_response = $_POST['g-recaptcha-response'];
    
    if (!empty($secret_key) && !empty($recaptcha_response)) {
        // Use cURL instead of file_get_contents for better security
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
            'secret' => $secret_key,
            'response' => $recaptcha_response
        ]));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($response && $http_code === 200) {
            $response_keys = json_decode($response, true);
            if (intval($response_keys["success"]) === 1) {
                if (isset($ultrasafelink) && filter_var($ultrasafelink, FILTER_VALIDATE_URL)) {
                    echo "<script>window.location.href='" . htmlspecialchars($ultrasafelink, ENT_QUOTES, 'UTF-8') . "';</script>";
                    exit;
                } else {
                    echo '<h2>Invalid link provided.</h2>';
                }
            } else {
                echo '<h2>Verification failed. Please try again.</h2>';
            }
        } else {
            echo '<h2>Verification service unavailable. Please try again later.</h2>';
        }
    } else {
        // If recaptcha is not properly configured, allow redirect for now (if URL is valid)
        if (isset($ultrasafelink) && filter_var($ultrasafelink, FILTER_VALIDATE_URL)) {
            echo "<script>window.location.href='" . htmlspecialchars($ultrasafelink, ENT_QUOTES, 'UTF-8') . "';</script>";
            exit;
        } else {
            echo '<h2>Invalid link provided.</h2>';
        }
    }
}
?>


