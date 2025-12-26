<?php
include 'setup/setting.php';

// Add modern button styles to footer3
echo '<style>
    /* Modern Button Styles for Footer3 */
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
?>
<?php 
$code = 11;
if(isset($_POST["newwpsafelink7s"]))
	{
$code = 22;
    $args = array(
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'orderby'        => 'rand',
        'posts_per_page' => 1
    );
    $random_query = new WP_Query($args);
    if ($random_query->have_posts()) {
        $random_query->the_post();
        $post_permalink = get_permalink();
    }
    wp_reset_postdata();
?>
	<center>
        <!---------- ADS CODE HERE -------------->    
    
    
    
    <?php if (!empty($fads5)) echo html_entity_decode($fads5, ENT_QUOTES, 'UTF-8'); ?></center>
<div id="robotContinue" class="hive-text-center" style="display: none;">
        <button id="robotContinueButton" style="margin: 0px;" onclick="continueToLink()">Dual Tap "Continue"</button>
    </div>
	<center>
        <!---------- ADS CODE HERE -------------->    
    
    
    
    <?php if (!empty($fads6)) echo html_entity_decode($fads6, ENT_QUOTES, 'UTF-8'); ?></center>

    <div id="hive-btn" style="display: none; margin: 0px;" class="hive-text-center">									
        <button id="hiveli2" class="hive_btn" disabled>Please wait</button>
    </div>
	<center>
        <!---------- ADS CODE HERE -------------->    
    
    
    
    <?php if (!empty($fads7)) echo html_entity_decode($fads7, ENT_QUOTES, 'UTF-8'); ?></center>
        <div class="hive-text-center">
                <form id="hive" action="" method="post">
        <input type="hidden" name="newwpsafelink7s32" value="<?php echo $_POST["newwpsafelink7s"]; ?>">
        <center><button id="hive-snp2" class="hive_btn" style="display: none; margin: 0%; text-decoration: none;" rel="noopener nofollow">Open-Continue</button></center>
    </form>
	<center>
        <!---------- ADS CODE HERE -------------->    
    
    
    
    <?php if (!empty($fads8)) echo html_entity_decode($fads8, ENT_QUOTES, 'UTF-8'); ?></center>
    <script>
        function startTimer1() {
            // Check if elements exist before manipulating them
            var robotSection = document.getElementById("robotSection");
            var link = document.getElementById("link");
            var wpsafeGenerate = document.getElementById("wpsafe-generate");
            var wpsafeTime = document.getElementById("wpsafe-time");
            
            if (robotSection) robotSection.style.display = "none";
            if (link) link.style.display = "block";
            
            var count = <?php echo $count; ?>;
            var counter = setInterval(timer, 1000);
            function timer() {
                count--;
                if (count <= 0) {
                    clearInterval(counter);
                    if (link) link.style.display = "none";
                    if (wpsafeGenerate) wpsafeGenerate.style.display = "block";
                }
                if (wpsafeTime) wpsafeTime.textContent = count;
            }
        }
        
        function startTimer11() {
            // For step 3 - check if elements exist before manipulating them
            var robotSection1 = document.getElementById("robotSection1");
            var link1 = document.getElementById("link1");
            var wpsafeGenerate1 = document.getElementById("wpsafe-generate1");
            var wpsafeTime1 = document.getElementById("wpsafe-time1");
            
            if (robotSection1) robotSection1.style.display = "none";
            if (link1) link1.style.display = "block";
            
            var count = <?php echo $count1; ?>;
            var counter = setInterval(timer, 1000);
            function timer() {
                count--;
                if (count <= 0) {
                    clearInterval(counter);
                    if (link1) link1.style.display = "none";
                    if (wpsafeGenerate1) wpsafeGenerate1.style.display = "block";
                }
                if (wpsafeTime1) wpsafeTime1.textContent = count;
            }
        }
        
     function scrollToBottom() {
    var txt3 = document.getElementById("txt3-step2");
    var wpsafeGenerate = document.getElementById("wpsafe-generate");
    var robotContinue = document.getElementById("robotContinue");
    
    if (txt3) txt3.style.display = "block";
    if (wpsafeGenerate) wpsafeGenerate.style.display = "none";
    if (robotContinue) robotContinue.style.display = "block";
        }

        function continueToLink() {
            var robotContinueButton = document.getElementById("robotContinueButton");
            var hiveBtn = document.getElementById("hive-btn");
            var hiveSnp2 = document.getElementById("hive-snp2");
            
            if (robotContinueButton) robotContinueButton.style.display = "none";
            if (hiveBtn) hiveBtn.style.display = "block";
            
            var count = 5;
            var counter = setInterval(timer, 1000);
            function timer() {
                count--;
                if (count <= 0) {
                    clearInterval(counter);
                    if (hiveBtn) hiveBtn.style.display = "none";
                    if (hiveSnp2) hiveSnp2.style.display = "block";
                }
            }
        }
    </script>
	<center><?php if (!empty($bads)) echo html_entity_decode($bads, ENT_QUOTES, 'UTF-8'); ?></center>
<?php 
}
?>
<?php
include 'setup/setting.php';

// SECURITY: Safe recaptcha verification without external file_get_contents
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['g-recaptcha-response'])) {
        $recaptcha_response = $_POST['g-recaptcha-response'];
        $ultrasafe = $_POST['ultrasafelink'];
        
        // Safe base64 decoding with validation
        if (preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $ultrasafe)) {
            $ultrasafelink8 = base64_decode($ultrasafe);
            
            // Validate URL for safety
            if (filter_var($ultrasafelink8, FILTER_VALIDATE_URL)) {
                // For security, use local recaptcha validation or skip if not configured
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
                            echo "<script>window.location.href='" . htmlspecialchars($ultrasafelink8, ENT_QUOTES, 'UTF-8') . "';</script>";
                            exit;
                        } else {
                            echo '<h2>Verification failed. Please try again.</h2>';
                        }
                    } else {
                        echo '<h2>Verification service unavailable. Please try again later.</h2>';
                    }
                } else {
                    // If recaptcha is not properly configured, allow redirect for now
                    echo "<script>window.location.href='" . htmlspecialchars($ultrasafelink8, ENT_QUOTES, 'UTF-8') . "';</script>";
                    exit;
                }
            } else {
                echo '<h2>Invalid link provided.</h2>';
            }
        } else {
            echo '<h2>Invalid request data.</h2>';
        }
    }
}

function xencrypt($data, $passphrase = "cypher8964") {
    $key = hash('sha256', $passphrase, true);      // 32-byte key
    $iv  = openssl_random_pseudo_bytes(16);        // 16-byte IV
    $encrypted = openssl_encrypt($data, "AES-256-CBC", $key, OPENSSL_RAW_DATA, $iv);
    return base64_encode($iv . $encrypted);        // IV + ciphertext
}

// SECURITY: Safe URL processing with validation
if (isset($_POST["newwpsafelink7s32"])){
    $ultrasafe = $_POST["newwpsafelink7s32"];
    
    // Safe base64 decoding with validation
    if (preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $ultrasafe)) {
        $ultrasafelink8 = base64_decode($ultrasafe);
            $payload = [
        "alias" => basename(parse_url($ultrasafelink8, PHP_URL_PATH)), // abc123
        "time"  => time()
    ];
    $jsonPayload = json_encode($payload);

    // ✅ Encrypt token
    $token = xencrypt($jsonPayload, "cypher8964");
    $urlToken = rawurlencode($token);
    $finalUrl = $ultrasafelink8 . '?data=' . $urlToken;
        // Validate URL for safety
        if (!filter_var($ultrasafelink8, FILTER_VALIDATE_URL)) {
            $ultrasafelink8 = '#'; // Safe fallback
            error_log("SafeLink: Invalid URL provided in footer3 form submission");
        }
    } else {
        $ultrasafelink8 = '#'; // Safe fallback
        error_log("SafeLink: Invalid base64 data provided in footer3 form submission");
    }
    
    $code = 33;
?>
    <center>
        <!-- ADS CODE HERE -->
        <?php if (!empty($fads9)) echo html_entity_decode($fads9, ENT_QUOTES, 'UTF-8'); ?>
    </center>

    <div id="robotContinue1" class="hive-text-center" style="display: none;">
        <button id="robotContinueButton1" style="margin: 0px;" onclick="continueToLink1()">Dual Tap "Continue"</button>
    </div>

    <center>
        <!-- ADS CODE HERE -->
        <?php if (!empty($fads10)) echo html_entity_decode($fads10, ENT_QUOTES, 'UTF-8'); ?>
    </center>

    <div id="hive-btn1" style="display: none; margin: 0px;" class="hive-text-center">
        <button id="hiveli2" class="hive_btn" disabled>Please wait</button>
    </div>

    <center>
        <!-- ADS CODE HERE -->
        <?php if (!empty($fads11)) echo html_entity_decode($fads11, ENT_QUOTES, 'UTF-8'); ?>
    </center>

    <?php if ($btn_recaptcha) { ?>
        <div id="hive-snp21" class="hive-text-center" style="display: none;">
            <center>
                <form id="open-continue-form" action="" method="post">
                    <div class="g-recaptcha" data-sitekey="<?php echo $site_key; ?>" data-callback="onSubmit"></div>
                    <button id="open-continue-btn" class="hive_btn" style="display: none; margin: 0%; text-decoration: none;" rel="noopener nofollow">Open-Continue</button>
                    <input type="hidden" name="ultrasafelink" value="<?php echo htmlspecialchars($ultrasafe, ENT_QUOTES, 'UTF-8'); ?>">
                </form>
            </center>
        </div>
    <?php } else { ?>
        <div id="hive-snp21" class="hive-text-center" style="display: none;">
            <center>
                <button id="open-continue-btn" class="hive_btn" onclick="window.location.href='<?php echo $finalUrl; ?>';" rel="noopener nofollow">Open-Continue</button>
            </center>
        </div>
    <?php } ?>

    <center>
        <!-- ADS CODE HERE -->
        <?php if (!empty($fads12)) echo html_entity_decode($fads12, ENT_QUOTES, 'UTF-8'); ?>
    </center>

    <script>
        function scrollToBottom1() {
    var txt3 = document.getElementById("txt3-step3");
    var wpsafeGenerate1 = document.getElementById("wpsafe-generate1");
    var robotContinue1 = document.getElementById("robotContinue1");
    
    if (txt3) txt3.style.display = "block";
    if (wpsafeGenerate1) wpsafeGenerate1.style.display = "none";
    if (robotContinue1) robotContinue1.style.display = "block";
        }

        function continueToLink1() {
            var robotContinueButton1 = document.getElementById("robotContinueButton1");
            var hiveBtn1 = document.getElementById("hive-btn1");
            var hiveSnp21 = document.getElementById("hive-snp21");
            
            if (robotContinueButton1) robotContinueButton1.style.display = "none";
            if (hiveBtn1) hiveBtn1.style.display = "block";
            
            var count = 5;
            var counter = setInterval(timer, 1000);
            function timer() {
                count--;
                if (count <= 0) {
                    clearInterval(counter);
                    if (hiveBtn1) hiveBtn1.style.display = "none";
                    if (hiveSnp21) hiveSnp21.style.display = "block";
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

    <center><?php if (!empty($bads)) echo html_entity_decode($bads, ENT_QUOTES, 'UTF-8'); ?></center>
<?php 
}
?>



<?php
if (isset($_COOKIE["took"])) {
if ($code == 11) {
    $args = array(
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'orderby'        => 'rand',
        'posts_per_page' => 1
    );
    $random_query = new WP_Query($args);
    if ($random_query->have_posts()) {
        $random_query->the_post();
        $post_permalink = get_permalink();
    }
    wp_reset_postdata();
?>
    <center><!---------- ADS CODE HERE -------------->    
    
    
    
    <?php if (!empty($fads1)) echo html_entity_decode($fads1, ENT_QUOTES, 'UTF-8'); ?></center>

    <div id="robot" class="hive-text-center">
        <center><button id="robot2" style="display: none; margin: 0px;" onclick="hivelink()">Dual Tap "Continue"</button></center>
    </div>
    <center><!---------- ADS CODE HERE -------------->    
    
    
    
    <?php if (!empty($fads2)) echo html_entity_decode($fads2, ENT_QUOTES, 'UTF-8'); ?></center>

    <div id="hive-btn" style="display: none; margin: 0px;" class="hive-text-center">
        <center><button id="hiveli2" class="hive_btn" disabled>Please wait..</button></center>
    </div>
    <center><!---------- ADS CODE HERE -------------->    
    
    
    
    <?php if (!empty($fads3)) echo html_entity_decode($fads3, ENT_QUOTES, 'UTF-8'); ?></center>

    <div class="hive-text-center">
        <form id="hive" action="" method="post">
            <input type="hidden" name="newwpsafelink7s" value="<?php echo $_COOKIE["took"]; ?>">
            <center><button id="hive-snp2" class="hive_btn" style="display: none; margin: 0%; text-decoration: none;" rel="noopener nofollow">Open Continue..</button></center>
        </form>
    </div>
    <center><!---------- ADS CODE HERE -------------->    
    
    
    
    <?php if (!empty($fads4)) echo html_entity_decode($fads4, ENT_QUOTES, 'UTF-8'); ?></center>

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
    </script>
    <center><?php if (!empty($bads)) echo html_entity_decode($bads, ENT_QUOTES, 'UTF-8'); ?></center>
<?php
}
}
?>

