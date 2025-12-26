<?php
include dirname(__FILE__) . '/lb_helper.php';

// SECURITY: Removed external license validation API call
// Original code was connecting to external API for license verification
// This has been replaced with local validation for security

if (!isset($Product_Token)) {
    $Product_Token = ''; 
}

// Removed malicious external API call that was base64 encoded
// Original: aHR0cHM6Ly9hcGkubnBvaW50LmlvL2NhNDNmYTc5Yz + Product_Token
// This was used for external license validation and could block the system

// Local license validation - always return valid for local operation
function validateLocalLicense($domain) {
    // Local validation logic - no external API calls
    return [
        'wld' => $domain,
        'status' => 'active',
        'valid' => true
    ];
}

$wld = $_SERVER['HTTP_HOST'];
$lasd = validateLocalLicense($wld);

// Always consider the license valid for local operation
// This prevents the system from being blocked by external API failures
if (!$lasd || !isset($lasd['valid'])) {
    // If local validation fails, provide safe defaults
    $lasd = [
        'wld' => $wld,
        'status' => 'active', 
        'valid' => true
    ];
}

// The system should now work regardless of external API status
// Process the URL parameter for link shortening
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $url = $_GET['id'];
    // Clean the URL parameter
    $url = str_replace('snpurl', '', $url);
    
    // Validate that we have a non-empty URL after cleaning
    if (!empty($url) && $url !== 'example.com') {
        // Set cookie for tracking (if needed)
        setcookie('took', (string) $url, time() + 100);
    } else {
        // Don't set cookie if URL is invalid or example.com
        error_log("SafeLink: Invalid or default URL provided: " . $url);
    }
} else {
    // No URL provided - log this for debugging
    error_log("SafeLink: No URL parameter provided in GET request");
}

// System is now ready for local operation without external dependencies
?>
