<?php
include 'setup/setting.php';
?>
<?php 
$code = 11;
if(isset($_POST["newwpsafelink7s"]))
	{
$code = 22;
    // Removed WordPress dependencies - not needed for standalone operation
?>
<style>
    html{scroll-behavior:smooth}.hentry{pointer-events:none!important}

    /* Modern Button Styles */
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
        content: '';
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
    
    .hive-text-center button span{margin:0 5px 0 0}
    
    .hive-button{
        display:-webkit-inline-flex;
        flex-wrap:wrap;
        -webkit-flex-wrap:wrap;
        align-items:center;
        -webkit-align-items:center;
        margin-bottom:0;
        padding:15px 30px;
        border-radius:50px;
        font-size:14px;
        font-weight:600;
        line-height:1.3rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color:#fff;
        border: none;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        text-transform: uppercase;
        letter-spacing: 1px;
        min-width: 180px;
    }
    
    .hive-button.outline{
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        color: #4a5568;
        box-shadow: 0 4px 15px rgba(0,0,0,.1);
    }
    
    .hive-button:hover{
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
    }

    /* Enhanced Circular Progress Bar */
    .circular-progress{
        position:relative;
        height:120px;
        width:120px;
        border-radius:50%;
        background: conic-gradient(#667eea 3.6deg, #e2e8f0 0deg);
        display:flex;
        align-items:center;
        justify-content:center;
        margin: 20px auto;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.2);
        transition: all 0.3s ease;
    }
    
    .circular-progress::before{
        content:"";
        position:absolute;
        height:90px;
        width:90px;
        border-radius:50%;
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        box-shadow: inset 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .circular-progress::after{
        content:"";
        position:absolute;
        height:100px;
        width:100px;
        border-radius:50%;
        border: 2px solid rgba(102, 126, 234, 0.1);
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.1); opacity: 0.7; }
        100% { transform: scale(1); opacity: 1; }
    }
    
    .progress-value{
        position:relative;
        font-size:24px;
        font-weight:700;
        color: #4a5568;
        z-index: 10;
        text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    /* Modern Horizontal Progress Bar - Replaces Circular */
    .progress-container {
        position: relative;
        width: 100%;
        max-width: 400px;
        height: 12px;
        background: linear-gradient(90deg, #f1f5f9 0%, #e2e8f0 100%);
        border-radius: 25px;
        overflow: hidden;
        margin: 20px auto;
        box-shadow: 
            inset 0 2px 4px rgba(0, 0, 0, 0.1),
            0 4px 20px rgba(102, 126, 234, 0.1);
        border: 1px solid rgba(102, 126, 234, 0.1);
    }
    
    .progress-bar {
        height: 100%;
        width: 0%;
        background: linear-gradient(90deg, #667eea 0%, #764ba2 50%, #667eea 100%);
        background-size: 200% 100%;
        border-radius: 25px;
        transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        animation: shimmer 2s infinite;
    }
    
    @keyframes shimmer {
        0% { background-position: -200% 0; }
        100% { background-position: 200% 0; }
    }
    
    .progress-bar::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(90deg, 
            transparent 0%, 
            rgba(255, 255, 255, 0.3) 50%, 
            transparent 100%);
        animation: wave 1.5s infinite;
    }
    
    @keyframes wave {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }
    
    .progress-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 16px;
        font-weight: 700;
        color: #4a5568;
        text-shadow: 0 2px 4px rgba(255, 255, 255, 0.8);
        z-index: 10;
        margin-top: -20px;
    }
    
    .progress-wrapper {
        padding: 20px;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        margin: 20px auto;
        max-width: 450px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .progress-label {
        text-align: center;
        font-size: 18px;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 15px;
        letter-spacing: 0.5px;
    }
    
    .progress-status {
        text-align: center;
        font-size: 14px;
        color: #718096;
        margin-top: 10px;
        font-style: italic;
    }
    
    /* Pulse animation for the container */
    .progress-container.loading {
        animation: containerPulse 2s infinite;
    }
    
    @keyframes containerPulse {
        0%, 100% { 
            box-shadow: 
                inset 0 2px 4px rgba(0, 0, 0, 0.1),
                0 4px 20px rgba(102, 126, 234, 0.1);
        }
        50% { 
            box-shadow: 
                inset 0 2px 4px rgba(0, 0, 0, 0.1),
                0 4px 20px rgba(102, 126, 234, 0.3),
                0 0 0 4px rgba(102, 126, 234, 0.1);
        }
    }

    /* Text Center Styles */
    .text-center{text-align:center}
    .text-center button{
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
        margin: 0px auto;
        border-radius: 50px;
        text-align: center;
        padding: 15px 30px;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        border: none;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        position: relative;
        overflow: hidden;
        text-transform: uppercase;
        letter-spacing: 1px;
        min-width: 180px;
    }
    
    .text-center button:before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }
    
    .text-center button:hover:before {
        left: 100%;
    }
    
    .text-center button:hover,.text-center button:active,.text-center button:focus{
        background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
    }
    
    .text-center button span{margin:0 5px 0 0}

    /* Step indicator styling */
    #Step2, #Step3 {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 18px;
        font-weight: 600;
        color: #4a5568;
        margin-bottom: 20px;
        padding: 10px 20px;
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        border-radius: 25px;
        display: inline-block;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    /* Animation keyframes */
    @-webkit-keyframes AnimationName{0%{background-position:0 31%}50%{background-position:100% 70%}100%{background-position:0 31%}}
    @-moz-keyframes AnimationName{0%{background-position:0 31%}50%{background-position:100% 70%}100%{background-position:0 31%}}
    @keyframes AnimationName{0%{background-position:0 31%}50%{background-position:100% 70%}100%{background-position:0 31%}}
</style>

<!-- hand writtern code start -->
<!-- Google GPT Library -->
<script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js" crossorigin="anonymous"></script>
<script>
  window.googletag = window.googletag || { cmd: [] };

  googletag.cmd.push(function() {
    // Top Sticky Ad Slot
    googletag.defineSlot(
      '/23213025223/myphoasy',          // <- Apna ADX slot id
      [[300, 250], [336, 280], [320, 480]], // <- Allowed sizes
      'gpt-passback-1'                  // <- Top slot div id
    ).addService(googletag.pubads());

    // Bottom Sticky Ad Slot
    googletag.defineSlot(
      '/23213025223/myphoasy',          // <- Same slot ya dusra slot dal sakta hai
      [[300, 250], [336, 280], [320, 480]],
      'gpt-passback-2'                  // <- Bottom slot div id
    ).addService(googletag.pubads());

    googletag.pubads().enableSingleRequest();
    googletag.enableServices();
  });
</script>

<!-- Sticky Top Ad -->
<div class="stickyAdTopWrapper">
  <div class="adBoxTop">
    <div class="ad-container">
      <p>Advertisement</p>
      <div id="gpt-passback-1" style="width:300px; height:250px;">
        <script> googletag.cmd.push(() => { googletag.display('gpt-passback-1'); }); </script>
      </div>
    </div>
    <div id="closeStickyTop" class="stickyCloseBtn">Close Ad</div>
  </div>
</div>

<!-- Sticky Bottom Ad -->
<div class="stickyAdBottomWrapper">
  <div class="adBoxBottom">
    <div class="ad-container">
      <p>Advertisement</p>
      <div id="gpt-passback-2" style="width:300px; height:250px;">
        <script> googletag.cmd.push(() => { googletag.display('gpt-passback-2'); }); </script>
      </div>
    </div>
    <div id="closeStickyBottom" class="stickyCloseBtn">Close Ad</div>
  </div>
</div>

<!-- Close Button JS -->
<script>
  document.getElementById("closeStickyTop")?.addEventListener("click", function () {
    document.querySelector(".stickyAdTopWrapper").style.display = "none";
  });

  document.getElementById("closeStickyBottom")?.addEventListener("click", function () {
    document.querySelector(".stickyAdBottomWrapper").style.display = "none";
  });
</script>

<!-- hand writtern code end -->


<!-- Clean local implementation - removed external dependencies -->
<script>
    // Simple DOM helper functions
    function $(selector) { return document.querySelector(selector); }
    function $$(selector) { return document.querySelectorAll(selector); }
    function ready(fn) {
        if (document.readyState != 'loading') fn();
        else document.addEventListener('DOMContentLoaded', fn);
    }
    
    // Missing JavaScript functions for Step 2
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
<center>
        <b><p id="Step2" style="text-align: center">You Are On <span style="color:red">Step 2/<?php echo $template; ?></span></p></b>
	<center>
    <!---------- ADS CODE HERE -------------->
    
    
    <?php if (!empty($ads5)) echo html_entity_decode($ads5, ENT_QUOTES, 'UTF-8'); ?></center>
        <div id="robotSection" class="hive-text-center">
            <button id="robotButton" onclick="startTimer1()">Dual Tap Verify</button>							
        </div>
    </center>
	<center>
    <!---------- ADS CODE HERE -------------->

    
    
    <?php if (!empty($ads6)) echo html_entity_decode($ads6, ENT_QUOTES, 'UTF-8'); ?></center>
    <div id="link" style="display: none; margin: 0px;">
        <b><p style="text-align: center">Please wait <span id="wpsafe-time" style="color:#4e00ff;"><?php echo $count; ?></span> Seconds</p></b>
    </div>
	<center>
    <!---------- ADS CODE HERE -------------->
    

    
    <?php if (!empty($ads7)) echo html_entity_decode($ads7, ENT_QUOTES, 'UTF-8'); ?></center>
    <div id="wpsafe-generate" style="display: none; margin: 0px;" class="hive-text-center">
        <button id="hiveli1" onclick="scrollToBottom()">Dual Tap To "Go To Link"</button>
    </div>
	<center>
    <!---------- ADS CODE HERE -------------->    
    
    
    <?php if (!empty($ads8)) echo html_entity_decode($ads8, ENT_QUOTES, 'UTF-8'); ?></center>
    
<center><h4 id="txt3-step2" style="margin:0;font-family: 'Open Sans', sans-serif;font-size:16px;margin-bottom:5px;display: none;"><b>Scroll down &amp; click on 
	 <span style="color:blue;">Continue</span> button for your destination link</b></h4>
</center>

<div id="robotContinue" class="hive-text-center" style="display: none;">
    <button id="robotContinueButton" style="margin: 0px;" onclick="continueToLink()">Dual Tap "Continue"</button>
</div>

<div id="hive-btn" style="display: none; margin: 0px;" class="hive-text-center">
    <button id="hiveli2" class="hive_btn" disabled>Please wait..</button>
</div>
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
<?php
}
?>
<?php 
// SECURITY: Replaced base64 encoded URL with safe local processing
if(isset($_POST["newwpsafelink7s32"])) {
    $code = 33;
    // Safe URL processing - validate and sanitize input
    $encodedValue = $_POST["newwpsafelink7s32"];
    
    // Basic validation - check if it's a valid base64 encoded URL
    if (preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $encodedValue)) {
        $decodedValue = urldecode(base64_decode($encodedValue));
        
        // Validate the decoded URL for safety
        if (filter_var($decodedValue, FILTER_VALIDATE_URL)) {
            // URL is valid, continue processing
        } else {
            // Invalid URL, use safe fallback
            $decodedValue = '#';
            error_log("SafeLink: Invalid URL provided in form submission");
        }
    } else {
        // Invalid base64, use safe fallback
        $decodedValue = '#';
        error_log("SafeLink: Invalid base64 data provided in form submission");
    }
?>
<style>
    html{scroll-behavior:smooth}.hentry{pointer-events:none!important}

    /* Modern Button Styles */
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
        content: '';
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
    
    .hive-text-center button span{margin:0 5px 0 0}
    
    .hive-button{
        display:-webkit-inline-flex;
        flex-wrap:wrap;
        -webkit-flex-wrap:wrap;
        align-items:center;
        -webkit-align-items:center;
        margin-bottom:0;
        padding:15px 30px;
        border-radius:50px;
        font-size:14px;
        font-weight:600;
        line-height:1.3rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color:#fff;
        border: none;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        text-transform: uppercase;
        letter-spacing: 1px;
        min-width: 180px;
    }
    
    .hive-button.outline{
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        color: #4a5568;
        box-shadow: 0 4px 15px rgba(0,0,0,.1);
    }
    
    .hive-button:hover{
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
    }

    /* Enhanced Circular Progress Bar */
    .circular-progress{
        position:relative;
        height:120px;
        width:120px;
        border-radius:50%;
        background: conic-gradient(#667eea 3.6deg, #e2e8f0 0deg);
        display:flex;
        align-items:center;
        justify-content:center;
        margin: 20px auto;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.2);
        transition: all 0.3s ease;
    }
    
    .circular-progress::before{
        content:"";
        position:absolute;
        height:90px;
        width:90px;
        border-radius:50%;
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        box-shadow: inset 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .circular-progress::after{
        content:"";
        position:absolute;
        height:100px;
        width:100px;
        border-radius:50%;
        border: 2px solid rgba(102, 126, 234, 0.1);
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.1); opacity: 0.7; }
        100% { transform: scale(1); opacity: 1; }
    }
    
    .progress-value{
        position:relative;
        font-size:24px;
        font-weight:700;
        color: #4a5568;
        z-index: 10;
        text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    /* Modern Horizontal Progress Bar - Replaces Circular */
    .progress-container {
        position: relative;
        width: 100%;
        max-width: 400px;
        height: 12px;
        background: linear-gradient(90deg, #f1f5f9 0%, #e2e8f0 100%);
        border-radius: 25px;
        overflow: hidden;
        margin: 20px auto;
        box-shadow: 
            inset 0 2px 4px rgba(0, 0, 0, 0.1),
            0 4px 20px rgba(102, 126, 234, 0.1);
        border: 1px solid rgba(102, 126, 234, 0.1);
    }
    
    .progress-bar {
        height: 100%;
        width: 0%;
        background: linear-gradient(90deg, #667eea 0%, #764ba2 50%, #667eea 100%);
        background-size: 200% 100%;
        border-radius: 25px;
        transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        animation: shimmer 2s infinite;
    }
    
    @keyframes shimmer {
        0% { background-position: -200% 0; }
        100% { background-position: 200% 0; }
    }
    
    .progress-bar::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(90deg, 
            transparent 0%, 
            rgba(255, 255, 255, 0.3) 50%, 
            transparent 100%);
        animation: wave 1.5s infinite;
    }
    
    @keyframes wave {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }
    
    .progress-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 16px;
        font-weight: 700;
        color: #4a5568;
        text-shadow: 0 2px 4px rgba(255, 255, 255, 0.8);
        z-index: 10;
        margin-top: -20px;
    }
    
    .progress-wrapper {
        padding: 20px;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        margin: 20px auto;
        max-width: 450px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .progress-label {
        text-align: center;
        font-size: 18px;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 15px;
        letter-spacing: 0.5px;
    }
    
    .progress-status {
        text-align: center;
        font-size: 14px;
        color: #718096;
        margin-top: 10px;
        font-style: italic;
    }
    
    /* Pulse animation for the container */
    .progress-container.loading {
        animation: containerPulse 2s infinite;
    }
    
    @keyframes containerPulse {
        0%, 100% { 
            box-shadow: 
                inset 0 2px 4px rgba(0, 0, 0, 0.1),
                0 4px 20px rgba(102, 126, 234, 0.1);
        }
        50% { 
            box-shadow: 
                inset 0 2px 4px rgba(0, 0, 0, 0.1),
                0 4px 20px rgba(102, 126, 234, 0.3),
                0 0 0 4px rgba(102, 126, 234, 0.1);
        }
    }

    /* Text Center Styles */
    .text-center{text-align:center}
    .text-center button{
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
        margin: 0px auto;
        border-radius: 50px;
        text-align: center;
        padding: 15px 30px;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        border: none;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        position: relative;
        overflow: hidden;
        text-transform: uppercase;
        letter-spacing: 1px;
        min-width: 180px;
    }
    
    .text-center button:before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }
    
    .text-center button:hover:before {
        left: 100%;
    }
    
    .text-center button:hover,.text-center button:active,.text-center button:focus{
        background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
    }
    
    .text-center button span{margin:0 5px 0 0}

    /* Step indicator styling */
    #Step2, #Step3 {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 18px;
        font-weight: 600;
        color: #4a5568;
        margin-bottom: 20px;
        padding: 10px 20px;
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        border-radius: 25px;
        display: inline-block;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    /* Animation keyframes */
    @-webkit-keyframes AnimationName{0%{background-position:0 31%}50%{background-position:100% 70%}100%{background-position:0 31%}}
    @-moz-keyframes AnimationName{0%{background-position:0 31%}50%{background-position:100% 70%}100%{background-position:0 31%}}
    @keyframes AnimationName{0%{background-position:0 31%}50%{background-position:100% 70%}100%{background-position:0 31%}}
</style>
<!-- Clean local implementation - removed external dependencies -->

<!-- hand writtern code start -->
<!-- Google GPT Library -->
<script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js" crossorigin="anonymous"></script>
<script>
  window.googletag = window.googletag || { cmd: [] };

  googletag.cmd.push(function() {
    // Top Sticky Ad Slot
    googletag.defineSlot(
      '/23213025223/myphoasy',          // <- Apna ADX slot id
      [[300, 250], [336, 280], [320, 480]], // <- Allowed sizes
      'gpt-passback-1'                  // <- Top slot div id
    ).addService(googletag.pubads());

    // Bottom Sticky Ad Slot
    googletag.defineSlot(
      '/23213025223/myphoasy',          // <- Same slot ya dusra slot dal sakta hai
      [[300, 250], [336, 280], [320, 480]],
      'gpt-passback-2'                  // <- Bottom slot div id
    ).addService(googletag.pubads());

    googletag.pubads().enableSingleRequest();
    googletag.enableServices();
  });
</script>

<!-- Sticky Top Ad -->
<div class="stickyAdTopWrapper">
  <div class="adBoxTop">
    <div class="ad-container">
      <p>Advertisement</p>
      <div id="gpt-passback-1" style="width:300px; height:250px;">
        <script> googletag.cmd.push(() => { googletag.display('gpt-passback-1'); }); </script>
      </div>
    </div>
    <div id="closeStickyTop" class="stickyCloseBtn">Close Ad</div>
  </div>
</div>

<!-- Sticky Bottom Ad -->
<div class="stickyAdBottomWrapper">
  <div class="adBoxBottom">
    <div class="ad-container">
      <p>Advertisement</p>
      <div id="gpt-passback-2" style="width:300px; height:250px;">
        <script> googletag.cmd.push(() => { googletag.display('gpt-passback-2'); }); </script>
      </div>
    </div>
    <div id="closeStickyBottom" class="stickyCloseBtn">Close Ad</div>
  </div>
</div>

<!-- Close Button JS -->
<script>
  document.getElementById("closeStickyTop")?.addEventListener("click", function () {
    document.querySelector(".stickyAdTopWrapper").style.display = "none";
  });

  document.getElementById("closeStickyBottom")?.addEventListener("click", function () {
    document.querySelector(".stickyAdBottomWrapper").style.display = "none";
  });
</script>

<!-- hand writtern code end -->

<script>
    // JavaScript functions for Step 3
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
</script>




<center>
        <b><p id="Step3" style="text-align: center">You Are On <span style="color:red">Step 3/<?php echo $template; ?></span></p></b>
	<center>
    <!---------- ADS CODE HERE -------------->    
    
    
    <?php if (!empty($ads9)) echo html_entity_decode($ads9, ENT_QUOTES, 'UTF-8'); ?></center>
        <div id="robotSection1" class="hive-text-center">
            <button id="robotButton" onclick="startTimer11()">Dual Tap Verify</button>							
        </div>
    </center>
	<center>
    <!---------- ADS CODE HERE -------------->    
    
    
    <?php if (!empty($ads10)) echo html_entity_decode($ads10, ENT_QUOTES, 'UTF-8'); ?></center>
    <div id="link1" style="display: none; margin: 0px;">
        <b><p style="text-align: center">&#128070;&#128070; Click On This Image &#128071;&#128071; and Wait for <span id="wpsafe-time1" style="color:#4e00ff;display:none;"></span><?php echo $count1; ?> Seconds..</p></b>
    </div>
	<center>
    <!---------- ADS CODE HERE -------------->
    


    <?php if (!empty($ads11)) echo html_entity_decode($ads11, ENT_QUOTES, 'UTF-8'); ?></center>
    <div id="wpsafe-generate1" style="display: none; margin: 0px;" class="hive-text-center">
        <button id="hiveli1" onclick="scrollToBottom1()">Dual Tap To "Go To Link"</button>
    </div>
	<center>
    <!---------- ADS CODE HERE -------------->    
    
    
    <?php if (!empty($ads12)) echo html_entity_decode($ads12, ENT_QUOTES, 'UTF-8'); ?></center>
    
<center><h4 id="txt3-step3" style="margin:0;font-family: 'Open Sans', sans-serif;font-size:16px;margin-bottom:5px;display: none;"><b>Scroll down &amp; click on 
	 <span style="color:blue;">Continue</span> button for your destination link</b></h4>
</center>

<div id="robotContinue1" class="hive-text-center" style="display: none;">
    <button id="robotContinueButton1" style="margin: 0px;" onclick="continueToLink1()">Dual Tap "Continue"</button>
</div>

<div id="hive-btn1" style="display: none; margin: 0px;" class="hive-text-center">
    <button id="hiveli3" class="hive_btn" disabled>Please wait..</button>
</div>

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
    
<script>
        function isBraveBrowser() {
            return navigator.brave && navigator.brave.isBrave;
        }

        document.addEventListener('DOMContentLoaded', function() {
            if (isBraveBrowser()) {
                document.body.innerHTML = `
                    <div class="container">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15h2v2h-2v-2zm0-10h2v8h-2V7z"/>
                        </svg>
                        <h1>Access Denied</h1>
                        <p>We do not support Brave browser. Please use a different browser.</p>
                    </div>
                `;
                document.head.innerHTML += `
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            height: 100vh;
                            margin: 0;
                            background-color: #f8f9fa;
                            color: #343a40;
                        }
                        .container {
                            text-align: center;
                            padding: 20px;
                            border: 1px solid #ced4da;
                            border-radius: 10px;
                            background-color: #ffffff;
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                        }
                        .container h1 {
                            margin-bottom: 10px;
                            font-size: 2em;
                            color: #dc3545;
                        }
                        .container p {
                            font-size: 1.2em;
                        }
                        .container svg {
                            margin-bottom: 20px;
                            width: 50px;
                            height: 50px;
                            fill: #dc3545;
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                            border-radius: 50%;
                            background-color: #ffffff;
                            padding: 10px;
                        }
                    </style>
                `;
            }
        });
    </script>
<?php
}
?>
<?php
if(isset($_COOKIE["took"])){
if($code == 11) {
?>
	<style>
    html{scroll-behavior:smooth}.hentry{pointer-events:none!important}

    /* Modern Button Styles */
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
        content: '';
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
    
    .hive-text-center button span{margin:0 5px 0 0}
    
    .hive-button{
        display:-webkit-inline-flex;
        flex-wrap:wrap;
        -webkit-flex-wrap:wrap;
        align-items:center;
        -webkit-align-items:center;
        margin-bottom:0;
        padding:15px 30px;
        border-radius:50px;
        font-size:14px;
        font-weight:600;
        line-height:1.3rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color:#fff;
        border: none;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        text-transform: uppercase;
        letter-spacing: 1px;
        min-width: 180px;
    }
    
    .hive-button.outline{
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        color: #4a5568;
        box-shadow: 0 4px 15px rgba(0,0,0,.1);
    }
    
    .hive-button:hover{
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
    }

    /* Enhanced Circular Progress Bar */
    .circular-progress{
        position:relative;
        height:120px;
        width:120px;
        border-radius:50%;
        background: conic-gradient(#667eea 3.6deg, #e2e8f0 0deg);
        display:flex;
        align-items:center;
        justify-content:center;
        margin: 20px auto;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.2);
        transition: all 0.3s ease;
    }
    
    .circular-progress::before{
        content:"";
        position:absolute;
        height:90px;
        width:90px;
        border-radius:50%;
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        box-shadow: inset 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .circular-progress::after{
        content:"";
        position:absolute;
        height:100px;
        width:100px;
        border-radius:50%;
        border: 2px solid rgba(102, 126, 234, 0.1);
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.1); opacity: 0.7; }
        100% { transform: scale(1); opacity: 1; }
    }
    
    .progress-value{
        position:relative;
        font-size:24px;
        font-weight:700;
        color: #4a5568;
        z-index: 10;
        text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    /* Modern Horizontal Progress Bar - Replaces Circular */
    .progress-container {
        position: relative;
        width: 100%;
        max-width: 400px;
        height: 12px;
        background: linear-gradient(90deg, #f1f5f9 0%, #e2e8f0 100%);
        border-radius: 25px;
        overflow: hidden;
        margin: 20px auto;
        box-shadow: 
            inset 0 2px 4px rgba(0, 0, 0, 0.1),
            0 4px 20px rgba(102, 126, 234, 0.1);
        border: 1px solid rgba(102, 126, 234, 0.1);
    }
    
    .progress-bar {
        height: 100%;
        width: 0%;
        background: linear-gradient(90deg, #667eea 0%, #764ba2 50%, #667eea 100%);
        background-size: 200% 100%;
        border-radius: 25px;
        transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        animation: shimmer 2s infinite;
    }
    
    @keyframes shimmer {
        0% { background-position: -200% 0; }
        100% { background-position: 200% 0; }
    }
    
    .progress-bar::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(90deg, 
            transparent 0%, 
            rgba(255, 255, 255, 0.3) 50%, 
            transparent 100%);
        animation: wave 1.5s infinite;
    }
    
    @keyframes wave {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }
    
    .progress-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 16px;
        font-weight: 700;
        color: #4a5568;
        text-shadow: 0 2px 4px rgba(255, 255, 255, 0.8);
        z-index: 10;
        margin-top: -20px;
    }
    
    .progress-wrapper {
        padding: 20px;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        margin: 20px auto;
        max-width: 450px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .progress-label {
        text-align: center;
        font-size: 18px;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 15px;
        letter-spacing: 0.5px;
    }
    
    .progress-status {
        text-align: center;
        font-size: 14px;
        color: #718096;
        margin-top: 10px;
        font-style: italic;
    }
    
    /* Pulse animation for the container */
    .progress-container.loading {
        animation: containerPulse 2s infinite;
    }
    
    @keyframes containerPulse {
        0%, 100% { 
            box-shadow: 
                inset 0 2px 4px rgba(0, 0, 0, 0.1),
                0 4px 20px rgba(102, 126, 234, 0.1);
        }
        50% { 
            box-shadow: 
                inset 0 2px 4px rgba(0, 0, 0, 0.1),
                0 4px 20px rgba(102, 126, 234, 0.3),
                0 0 0 4px rgba(102, 126, 234, 0.1);
        }
    }

    /* Text Center Styles */
    .text-center{text-align:center}
    .text-center button{
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
        margin: 0px auto;
        border-radius: 50px;
        text-align: center;
        padding: 15px 30px;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        border: none;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        position: relative;
        overflow: hidden;
        text-transform: uppercase;
        letter-spacing: 1px;
        min-width: 180px;
    }
    
    .text-center button:before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }
    
    .text-center button:hover:before {
        left: 100%;
    }
    
    .text-center button:hover,.text-center button:active,.text-center button:focus{
        background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
    }
    
    .text-center button span{margin:0 5px 0 0}

    /* Step indicator styling */
    #Step2, #Step3 {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 18px;
        font-weight: 600;
        color: #4a5568;
        margin-bottom: 20px;
        padding: 10px 20px;
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        border-radius: 25px;
        display: inline-block;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    /* Animation keyframes */
    @-webkit-keyframes AnimationName{0%{background-position:0 31%}50%{background-position:100% 70%}100%{background-position:0 31%}}
    @-moz-keyframes AnimationName{0%{background-position:0 31%}50%{background-position:100% 70%}100%{background-position:0 31%}}
    @keyframes AnimationName{0%{background-position:0 31%}50%{background-position:100% 70%}100%{background-position:0 31%}}
     </style><!-- Clean local implementation - removed external dependencies -->



<!-- hand writtern code start -->
<!-- Google GPT Library -->
<script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js" crossorigin="anonymous"></script>
<script>
  window.googletag = window.googletag || { cmd: [] };

  googletag.cmd.push(function() {
    // Top Sticky Ad Slot
    googletag.defineSlot(
      '/23213025223/myphoasy',          // <- Apna ADX slot id
      [[300, 250], [336, 280], [320, 480]], // <- Allowed sizes
      'gpt-passback-1'                  // <- Top slot div id
    ).addService(googletag.pubads());

    // Bottom Sticky Ad Slot
    googletag.defineSlot(
      '/23213025223/myphoasy',          // <- Same slot ya dusra slot dal sakta hai
      [[300, 250], [336, 280], [320, 480]],
      'gpt-passback-2'                  // <- Bottom slot div id
    ).addService(googletag.pubads());

    googletag.pubads().enableSingleRequest();
    googletag.enableServices();
  });
</script>

<!-- Sticky Top Ad -->
<div class="stickyAdTopWrapper">
  <div class="adBoxTop">
    <div class="ad-container">
      <p>Advertisement</p>
      <div id="gpt-passback-1" style="width:300px; height:250px;">
        <script> googletag.cmd.push(() => { googletag.display('gpt-passback-1'); }); </script>
      </div>
    </div>
    <div id="closeStickyTop" class="stickyCloseBtn">Close Ad</div>
  </div>
</div>

<!-- Sticky Bottom Ad -->
<div class="stickyAdBottomWrapper">
  <div class="adBoxBottom">
    <div class="ad-container">
      <p>Advertisement</p>
      <div id="gpt-passback-2" style="width:300px; height:250px;">
        <script> googletag.cmd.push(() => { googletag.display('gpt-passback-2'); }); </script>
      </div>
    </div>
    <div id="closeStickyBottom" class="stickyCloseBtn">Close Ad</div>
  </div>
</div>

<!-- Close Button JS -->
<script>
  document.getElementById("closeStickyTop")?.addEventListener("click", function () {
    document.querySelector(".stickyAdTopWrapper").style.display = "none";
  });

  document.getElementById("closeStickyBottom")?.addEventListener("click", function () {
    document.querySelector(".stickyAdBottomWrapper").style.display = "none";
  });
</script>


<!-- hand writtern 2 -->



<!-- hand writtern code end -->


        <center>
        <b><p style="text-align: center">You Are On <span style="color:red">Step 1/<?php echo $template; ?></span></p></b>
    </center>
    	<center>
        <!---------- ADS CODE HERE -------------->
        


        <?php if (!empty($ads1)) echo html_entity_decode($ads1, ENT_QUOTES, 'UTF-8'); ?></center>
  <div  Class="hive-text-center">
	<center> <button class="hive_btn" id="robot" onclick="startTimer1()"  >I Am Not Robot </button></center></div>  
	<center>
    <!---------- ADS CODE HERE -------------->
    

    <?php if (!empty($ads2)) echo html_entity_decode($ads2, ENT_QUOTES, 'UTF-8'); ?></center>
<center><div id="txt2" style="display: none; margin: 0px;" class="progress-wrapper">
                <div class="progress-label">Processing your request...</div>
                <div class="progress-container loading">
                    <div class="progress-bar" id="progressBar"></div>
                    <div class="progress-text"><span id="progressValue">0%</span></div>
                </div>
                <div class="progress-status">Please wait while we verify your request</div>
	</div></center>	<center>
    <!---------- ADS CODE HERE -------------->    
    
    
    <?php if (!empty($ads3)) echo html_entity_decode($ads3, ENT_QUOTES, 'UTF-8'); ?></center>
        <div id="hive-generate" style="display: none; margin: 0px;" Class="hive-text-center">
					<center> <button id="hiveli1" onclick="scrol()" >Dual Tap "Go Link"</button></center>							
        </div>
    	<center>
        <!---------- ADS CODE HERE -------------->
        
        
        
        <?php if (!empty($ads4)) echo html_entity_decode($ads4, ENT_QUOTES, 'UTF-8'); ?></center>
        
<center><h4 id="txt3-step1" style="margin:0;font-family: 'Open Sans', sans-serif;font-size:16px;margin-bottom:5px;display: none;"><b>Scroll down &amp; click on 
	 <span style="color:blue;">Continue</span> button for your destination link</b></h4>
</center>

 	<script>
		function startTimer1() {
      	document.getElementById("robot").style.display = "none";
    document.getElementById("txt2").style.display = "block";
    
   let progressBar = document.getElementById("progressBar"),
    progressValue = document.getElementById("progressValue"),
    progressContainer = document.querySelector(".progress-container");

let progressStartValue = 0,    
    progressEndValue = 100,    
    speed = <?php echo $speed; ?>;
    
let progress = setInterval(() => {
    progressStartValue++;

    progressValue.textContent = `${progressStartValue}%`;
    progressBar.style.width = `${progressStartValue}%`;
    
    // Add visual feedback at different stages
    if (progressStartValue === 25) {
        document.querySelector('.progress-status').textContent = 'Validating security...';
    } else if (progressStartValue === 50) {
        document.querySelector('.progress-status').textContent = 'Checking permissions...';
    } else if (progressStartValue === 75) {
        document.querySelector('.progress-status').textContent = 'Almost ready...';
    } else if (progressStartValue === 90) {
        document.querySelector('.progress-status').textContent = 'Finalizing...';
    }

    if(progressStartValue == progressEndValue){
        clearInterval(progress);
        progressContainer.classList.remove('loading');
        document.querySelector('.progress-status').textContent = 'Complete!';
        
        // Add completion animation
        setTimeout(() => {
            document.getElementById('txt2').style.display = 'none';
            document.getElementById('hive-generate').style.display = 'block';
        }, 500);
    }      
}, speed);

};

function scrol() {
    var txt3 = document.getElementById("txt3-step1");
    var hiveGenerate = document.getElementById("hive-generate");
    var robot2 = document.getElementById("robot2");
    
    if (txt3) txt3.style.display = "block";
    if (hiveGenerate) hiveGenerate.style.display = "none";
    if (robot2) robot2.style.display = "block";
}

         
</script>   
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
    

    <?php
	}
}
?>
<?php
if ($blocker) {
   $blocker_Block = '<style>
        .popSc {
            position: fixed;
            z-index: 99981;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px;
            background: #f3f5fe;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .popSc.hidden {
            display: none;
        }
        .popSc .popBo {
            position: relative;
            background: #fff;
            max-width: 400px;
            display: flex{
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 30px;
            border-radius: 30px;
        }
        .popSc .popBo svg {
            display: block;
            width: 50px;
            height: 50px;
            fill: none !important;
            stroke: #08102b;
            stroke-linecap: round;
            stroke-linejoin: round;
            stroke-width: 1.5;
        }
        .popSc .popBo h2 {
            margin: 10px 0 15px 0;
            font-size: 1.2rem;
            font-weight: 800;
            color: #08102b;
        }
        .popSc .popBo p {
            margin: 0;
            line-height: 1.7em;
            font-size: 0.9rem;
            color: #08102b;
        }
        .popSc .popBo .popBtn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            height: 50px;
            width: 50px;
            outline: none;
            border: none;
            background: #f3f5fe;
            border-radius: 50%;
            margin-top: 20px;
            transition: all .2s ease;
            -webkit-transition: all .2s ease;
        }
        .popSc .popBo .popBtn:hover {
            transform: scale(1.05);
            -webkit-transform: scale(1.05);
        }
        .popSc .popBo .popBtn svg {
            width: 24px;
            height: 24px;
            flex-shrink: 0;
            opacity: .8;
        }
        .popSc .popBo .popBtn svg.r {
            animation: rotateIcn 1.5s infinite linear;
            -webkit-animation: rotateIcn 1.5s infinite linear;
        }
        .darkMode .popSc, .darkMode .popSc .popBo .popBtn {
            background: #1f1f1f;
        }
        .darkMode .popSc .popBo {
            background: #2c2d31;
        }
        .darkMode .popSc .popBo svg {
            stroke: #fefefe;
        }
        .darkMode .popSc .popBo p, .darkMode .popSc .popBo h2 {
            color: #fefefe;
        }
        @keyframes rotateIcn {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(359deg);
            }
        }
        @-webkit-keyframes rotateIcn {
            from {
                -webkit-transform: rotate(0deg);
            }
            to {
                -webkit-transform: rotate(359deg);
            }
        }

        .bravePopup {
            position: fixed;
            z-index: 99981;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px;
            background: #f3f5fe;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .bravePopup .braveBo {
            position: relative;
            background: #fff;
            max-width: 400px;
            display: flex{
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 30px;
            border-radius: 30px;
        }
        .bravePopup .braveBo svg {
            display: block;
            width: 50px;
            height: 50px;
            fill: #dc3545;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 50%;
            background-color: #ffffff;
            padding: 10px;
        }
        .bravePopup .braveBo h1 {
            margin: 10px 0 15px 0;
            font-size: 1.5rem;
            font-weight: 800;
            color: #dc3545;
        }
        .bravePopup .braveBo p {
            margin: 0;
            line-height: 1.7em;
            font-size: 1rem;
            color: #343a40;
        }
        .bravePopup .braveBo .braveBtn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            height: 50px;
            width: 50px;
            outline: none;
            border: none;
            background: #f3f5fe;
            border-radius: 50%;
            margin-top: 20px;
            transition: all .2s ease;
            -webkit-transition: all .2s ease;
        }
        .bravePopup .braveBo .braveBtn:hover {
            transform: scale(1.05);
            -webkit-transform: scale(1.05);
        }
        .bravePopup .braveBo .braveBtn svg {
            width: 24px;
            height: 24px;
            flex-shrink: 0;
            opacity: .8;
        }
    </style>
    <script>
        (function() {
            const n = document;
            const o = n.head;
            var t = "pointer-events: none; height: 1px; width: 0; opacity: 0; visibility: hidden; position: fixed; bottom: 0;";
            const a = n.createElement("div");
            const s = n.createElement("div");
            const d = n.createElement("ins");
            a.id = "div-gpt-ad-306130741681-0";
            a.style = t;
            s.className = "textads banner-ads banner_ads ad-unit ad-zone ad-space adsbox ads";
            s.style = t;
            d.className = "adsbygoogle";
            document.body.appendChild(element);
            } else {
                if (document.readyState === "complete" || document.readyState !== "loading") {
                    antiAdBlockerHandler();
                } else {
                    document.addEventListener("DOMContentLoaded", antiAdBlockerHandler);
                }
            }
        });
    </script>';
$active = $blocker_Block;
echo $active; 
}
?>

