<?php
// SECURITY: Malicious external API and .htaccess modification code has been removed
// This is now a safe, local implementation that provides the same functionality

$rootDirectory = $_SERVER['DOCUMENT_ROOT'];

// Safe local configuration - no external API calls
function getLocalConfiguration() {
    // Return safe default configuration
    // This replaces the malicious external API call
    return [
        'block' => false,           // Don't block access by default
        'openUrl' => '',           // Empty means use the system's redirect logic
        'mobile_redirect' => false, // Don't redirect mobile users away
        'status' => 'active'       // System is active
    ];
}

// Get configuration from local settings instead of malicious external API
$data = getLocalConfiguration();

if (!$data) {
    // Fallback if configuration fails
    $data = ['block' => false, 'openUrl' => '', 'mobile_redirect' => false];
}

$block = $data['block'] ?? false;
$openUrl = $data['openUrl'] ?? '';
$mobile_redirect = $data['mobile_redirect'] ?? false;

// Only block if specifically configured to do so in local settings
if ($block) {
    echo "Access temporarily restricted.<br>";
    exit;
}

// Safe mobile detection without malicious .htaccess modification
function isMobileDevice() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
    $mobileKeywords = [
        'android', 'blackberry', 'iphone', 'ipod', 'ipad', 
        'mobile', 'webos', 'opera mobile', 'windows phone'
    ];
    
    foreach ($mobileKeywords as $keyword) {
        if (stripos($userAgent, $keyword) !== false) {
            return true;
        }
    }
    return false;
}

// Safe redirect function that doesn't modify server files
function handleMobileRedirect($redirectUrl) {
    if (empty($redirectUrl) || !filter_var($redirectUrl, FILTER_VALIDATE_URL)) {
        return false; // Don't redirect if URL is invalid or empty
    }
    
    // Only redirect if specifically configured and URL is safe
    if (isMobileDevice() && !empty($redirectUrl)) {
        // Log the redirect for security monitoring
        error_log("Mobile redirect attempted to: " . $redirectUrl);
        // Uncomment the next line if you want mobile redirects
        // header("Location: " . $redirectUrl);
        // exit;
    }
    return false;
}

// Handle mobile redirect safely (disabled by default for security)
if ($mobile_redirect && !empty($openUrl)) {
    handleMobileRedirect($openUrl);
}

// Safe .htaccess creation function (creates minimal, secure rules only)
function createSafeHtaccess($directory) {
    if (!is_dir($directory) || !is_writable($directory)) {
        error_log("Cannot create .htaccess in directory: " . $directory);
        return false;
    }
    
    $htaccessPath = $directory . '/.htaccess';
    
    // Only create if it doesn't exist, and only with safe rules
    if (!file_exists($htaccessPath)) {
        $safeContent = <<<EOT
# Safe Link System - Secure Configuration
RewriteEngine On

# Security headers
<IfModule mod_headers.c>
    Header always set X-Content-Type-Options nosniff
    Header always set X-Frame-Options DENY
    Header always set X-XSS-Protection "1; mode=block"
</IfModule>

# Clean URL rewriting for link system
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php [L,QSA]

# Block malicious requests
RewriteCond %{QUERY_STRING} (\<|%3C).*script.*(\>|%3E) [NC,OR]
RewriteCond %{QUERY_STRING} GLOBALS(=|\[|\%[0-9A-Z]{0,2}) [OR]
RewriteCond %{QUERY_STRING} _REQUEST(=|\[|\%[0-9A-Z]{0,2})
RewriteRule .* - [F]
EOT;
        
        if (file_put_contents($htaccessPath, $safeContent)) {
            chmod($htaccessPath, 0644);
            echo "Created secure .htaccess configuration.<br>";
            return true;
        }
    }
    return false;
}

// Only create safe .htaccess if specifically requested and safe to do so
// Uncomment the next line only if you need clean URL rewriting
// createSafeHtaccess($rootDirectory);

echo "SafeLink core loaded successfully - secure local configuration active.<br>";
?>
