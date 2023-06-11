<?php 

require '../../Functions/functions.php';

$invoiceid = $_GET["invoiceid"];

if( deleteinvoice($invoiceid) >0 ) {
    echo " <script>
    alert('Data is deleted');
    document.location.href = 'invoicedatabase.php?show=';
    </script>
    ";
   
}else {
    echo " <script>
    alert('Data is failed to be deleted');
    document.location.href = 'invoicedatabase.php?show=';
    </script>
    ";
}

?>