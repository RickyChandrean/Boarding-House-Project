<?php 

include '../../Functions/functions.php';

$tenantid = $_GET["tenant_id"];

if( deletetnt($tenantid) > 0 ) {
    $result = mysqli_query($conn, "SELECT * FROM `tenant` WHERE tenant_id='$tenantid'");
    $tableusers=mysqli_fetch_array($result);
    $userid = $tableusers['userid'];
    mysqli_query($conn, "UPDATE `users` SET `regist`='' WHERE id=$userid");
    return mysqli_affected_rows($conn);
    echo " <script>
    alert('Data is deleted');
    document.location.href = 'tenantdatabase.php?show=';
    </script>
    ";
   
}else {
    echo " <script>
    alert('Data is failed to be deleted');
    document.location.href = 'tenantdatabase.php?show=';
    </script>
    ";
}

?>