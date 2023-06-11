<?php

require '../../Functions/functions.php';

$roomid = $_GET["book_id"];

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $url = "https://";
} else {
    $url = "http://";
}

// Append the host(domain name, ip) to the URL.
$url .= $_SERVER['HTTP_HOST'];

// Append the requested resource location to the URL
$url .= $_SERVER['REQUEST_URI'];

// Use parse_url() function to parse the URL
// and return an associative array which
// contains its various components
$url_components = parse_url($url);

// Use parse_str() function to parse the
// string passed via URL
parse_str($url_components['query'], $params);
$book_id = $params['book_id'];
$room_label = $params['room_label'];
if (deletebook($book_id) > 0) {
    mysqli_query($conn, "UPDATE `room` SET `room_availabality`='Unoccupied' WHERE room_label= '$room_label'");

    echo " <script>
    alert('Data is deleted');
    document.location.href = 'bookdatabase.php?show=';
    </script>
    ";

} else {
    echo " <script>
    alert('Data is failed to be deleted');
    document.location.href = 'bookdatabase.php?show=';
    </script>
    ";
}
