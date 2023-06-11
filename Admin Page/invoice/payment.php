<?php
// koneksi database

require '../../Functions/functions.php';
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
$bookingid = $params['bookingid'];

$query = mysqli_query($conn, "UPDATE `invoice` SET `paymentStat`='Paid' WHERE bookingid=$bookingid");
mysqli_query($conn, $query);
header("Location: invoicedatabase.php?show=");
