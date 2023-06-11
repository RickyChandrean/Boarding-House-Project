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
$book_id = $params['book_id'];
$tenant_name = $params['tenant_name'];
$number = $params['number'];

$date = date("Y/m/d");
// menangkap data yang di kirim dari form

$query = mysqli_query($conn, "SELECT max(invoiceid) as kodeauto FROM invoice");
$data1 = mysqli_fetch_array($query);
$kodeKamar = $data1['kodeauto'];

// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($kodeKamar, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan += $number;

$huruf = "KB";
$kodeKamar = $huruf . sprintf("%03s", $urutan);

//query data from the "room" table
$booking = mysqli_query($conn, "SELECT * FROM booking WHERE book_id='$book_id'");
if (mysqli_num_rows($booking) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($booking)) {
        $i = $row['room_label'];
        $book_start = $row['book_start_date'];
        $book_end = $row['book_end_date'];

    }
}

$tenant = mysqli_query($conn, "SELECT * FROM tenant WHERE tenant_name='$tenant_name'");
if (mysqli_num_rows($tenant) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($tenant)) {
        $b = $row['tenant_name'];
        $d = $row['tenant_address'];
        $f = $row['tenant_phone'];
    }
}

$room = mysqli_query($conn, "SELECT * FROM room WHERE room_label='$i'");
if (mysqli_num_rows($room) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($room)) {
        $h = $row['room_size'];
        $k = $row['room_monthly_cost'];
    }
}

$kodeKamar;
$c = '-';
$e = '-';
$g = date("Y/m/d");
$j = nb_mois($book_start, $book_end);

echo $b . '<br>';
echo $c . '<br>';
echo $d . '<br>';
echo $e . '<br>';
echo $f . '<br>';
echo $g . '<br>';
echo $h . '<br>';
echo $i . '<br>';
echo $j . '<br>';
echo $k . '<br>';

$result = mysqli_query($conn, "SELECT tenant_name FROM invoice WHERE tenant_name = '$b'");

if (mysqli_fetch_assoc($result)) {
    header("location:invoice-result.php?invoiceid=<?=$kodeKamar?>");
    return false;
} else {
// mysqli_query($conn,"INSERT INTO invoice
    // -- VALUES('$kodeKamar','$book_id','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k')");

// mengalihkan halaman kembali ke index.php
    header("location:invoice-result.php?invoiceid=<?=$kodeKamar?>");
}

// menginput data ke database

function nb_mois($date1, $date2)
{
    $begin = new DateTime($date1);
    $end = new DateTime($date2);
    $end = $end->modify('+0 month');

    $interval = DateInterval::createFromDateString('1 month');

    $period = new DatePeriod($begin, $interval, $end);
    $counter = 0;
    foreach ($period as $dt) {
        $counter++;
    }

    return $counter;
}
