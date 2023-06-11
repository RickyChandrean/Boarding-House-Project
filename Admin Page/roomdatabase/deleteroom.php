<?php 

require '../../Functions/functions.php';

$roomid = $_GET["room_id"];

if( delete($roomid) >=1 ) {
    echo " <script>
    alert('Data is deleted');
    document.location.href = 'roomdatabase.php?show=';
    </script>
    ";
   
}else {
    echo " <script>
    alert('Data is failed to be deleted');
    document.location.href = 'roomdatabase.php?show=';
    </script>
    ";
}

?>