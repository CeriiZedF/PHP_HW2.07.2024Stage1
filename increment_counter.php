<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $counter = isset($_POST['counter']) ? intval($_POST['counter']) : 0;
    echo $counter + 1;
}
?>
