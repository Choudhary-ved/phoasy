<?php
function include_footer($template) {
    switch ($template) {
        case '1':
            include 'links/footer1.php';
            break;
        case '2':
            include 'links/footer2.php';
            break;
        case '3':
            include 'links/footer3.php'; 
            break;
        default:
            include 'links/footer1.php'; 
            break;
    }
}
?>
