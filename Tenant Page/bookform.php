<?php
session_start();
include '../Functions/functions.php';
//Make sure the Submit Button
$tenantusername = $_SESSION['username'];
$tenant = mysqli_query($conn, "SELECT * FROM tenant JOIN users ON tenant.userid=users.id WHERE users.username='$tenantusername'
");
if (isset($_POST["submit"])) {
//Take Data from each element
    $bookid = mysqli_real_escape_string($conn, $_POST["book_id"]);
    $roomid = mysqli_real_escape_string($conn, $_POST["room_label"]);
    $tenantid = mysqli_real_escape_string($conn, $_POST["tenant_name"]);
    $bsd = mysqli_real_escape_string($conn, $_POST["book_start_date"]);
    $bnd = mysqli_real_escape_string($conn, $_POST["book_end_date"]);
    $btrd = date("d/m/y");
// cek username sudah ada belum
    $result = mysqli_query($conn, "SELECT tenant_name FROM booking WHERE tenant_name = '$tenantid'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('You already book');
                document.location.href = 'bookform.php';
                </script>";
        return false;
    } else if ($bsd >= $btrd and $bnd >= $btrd) {
        if ($bsd > $bnd) {
            echo " <script>
              alert('Booking end date cannot be less than booking start date');
              document.location.href = 'bookform.php';
              </script>
              ";
        } else {
            $q = mysqli_query($conn, "SELECT * FROM booking WHERE room_label = '$roomid' ");
            $cek = mysqli_num_rows($q);

            if ($cek == 0) {
                mysqli_query($conn, "INSERT INTO booking VALUES ('$bookid','$roomid','$tenantid','$bsd','$bnd','$btrd')");
                mysqli_query($conn, "UPDATE `room` SET `room_availabality`='Booked'WHERE room_label='$roomid'");

                //start here
                $date = date("Y/m/d");
                // menangkap data yang di kirim dari form

                $query = mysqli_query($conn, "SELECT max(invoiceid) as kodeauto FROM invoice");
                $data1 = mysqli_fetch_array($query);
                $kodeKamar = $data1['kodeauto'];

                // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
                // dan diubah ke integer dengan (int)
                $urutan = (int) substr($kodeKamar, 3, 3);

                // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
                $urutan += 1;

                $huruf = "KB";
                $kodeKamar = $huruf . sprintf("%03s", $urutan);

                //query data from the "room" table
                $booking = mysqli_query($conn, "SELECT * FROM booking WHERE book_id='$bookid'");
                if (mysqli_num_rows($booking) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($booking)) {
                        $i = $row['room_label'];
                        $book_start = $row['book_start_date'];
                        $book_end = $row['book_end_date'];

                    }
                }

                $tenantdb = mysqli_query($conn, "SELECT * FROM tenant WHERE tenant_name='$tenantid'");
                if (mysqli_num_rows($tenantdb) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($tenantdb)) {
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
                $paymentStat = 'unpaid';

                // echo $b .'<br>' ;
                // echo $c .'<br>';
                // echo $d .'<br>' ;
                // echo $e  .'<br>';
                // echo $f  .'<br>';
                // echo $g  .'<br>';
                // echo $h  .'<br>';
                // echo $i . '<br>';
                // echo $j  .'<br>';
                // echo $k.'<br>';

                $result = mysqli_query($conn, "SELECT tenant_name FROM invoice WHERE tenant_name = '$b'");

                if (mysqli_fetch_assoc($result)) {
                } else {
                    mysqli_query($conn, " INSERT INTO `invoice`(`invoiceid`, `bookingid`, `tenant_name`, `company`, `tenant_address`, `Zip_code`, `tenant_phone`, `date`, `room_size`, `room_label`, `month`, `price`, `paymentStat`)
                  VALUES('$kodeKamar','$bookid','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$paymentStat')");

                    // mengalihkan halaman kembali ke index.php
                    // header("location:invoice-result.php");
                    echo " <script>
            alert('Booking Successfull');
            document.location.href = 'paymentmet.php';
            </script>
            ";

                }

                // menginput data ke database

            } else {
                echo " <script>
            alert('Your Room Already Booked by Another Tenant , Please Choose Another Room');
            document.location.href = 'bookform.php';
            </script>
            ";
            }
        }
    } else {
        echo " <script>
            alert('Booking date cannot be less than today');
            document.location.href = 'bookform.php';
            </script>
            ";
    }

}

$idrandom = rand();

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

?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <link rel="stylesheet" href="css/bookform.css">
 <title>Booking Form</title>
</head>

<body>
 <div class="bg-image"></div>

 <div class="bg-text">
  <div class="container">
   <h2 class="title">Booking Form</h2>
   <div class="ruang">
    <form action="" method="post" class="form">
     <!--Structure-->
     <!--Q1-->
     <div class="cellmargin">
      <label for="book_id" class="form-label">Book ID</label>
      <input type="number" name="book_id" class="form-control" id="book_id" aria-describedby="emailHelp"
       value="<?php echo rand(12345678, 99999999) ?>" readonly aria-describedby="emailHelp">

     </div>
     <!--Q2-->
     <div class="cellmargin">
      <?php $result = mysqli_query($conn, "SELECT `room_label` FROM `room` WHERE room_availabality='Unoccupied' ORDER BY room_label");?>
      <form>Room Label<select name="room_label" class="form-control" aria-describedby="emailHelp">
        <option value="">-- Choose Room -- </option>

        <?php
$i = 0;

while ($row = mysqli_fetch_array($result)) {
    ?>
        <option value="<?=$row["room_label"];?>"><?=$row["room_label"];?></option><?php
$i++;
}
?>
       </select>
     </div>
     <!--Q3-->
     <div class="cellmargin">
      <?php $result = mysqli_query($conn, "SELECT tenant_name FROM tenant ORDER BY tenant_name");?>
      <form>Tenant Name:<select name="tenant_name" class="form-control" aria-describedby="emailHelp">
        <?php
$row = mysqli_fetch_array($tenant)
?>
        <option value="<?=$row["tenant_name"];?>"><?=$row["tenant_name"];?></option><?php

?>
       </select>
     </div>
     <!--Q4-->
     <div class="cellmargin">
      <label for="book_start_date" class="form-label">Start Date</label>
      <input type="date" name="book_start_date" class="form-control" id="book_start_date" aria-describedby="emailHelp">
     </div>
     <!--Q5-->
     <div class="cellmargin">
      <label for="book_end_date" class="form-label">End Date</label>
      <input type="date" name="book_end_date" class="form-control" id="book_end_date" aria-describedby="emailHelp">
     </div>
     <div class="cellmargin">
      <button type="submit" name="submit" class="btn btn-primary">Book Room
      </button>
      <a href="homeuser.php" class="btn btn-primary">Back </a>
     </div>
    </form>
   </div>
  </div>
 </div>
</body>

</html>