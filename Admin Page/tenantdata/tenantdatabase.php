<?php
require '../../Functions/functions.php';

//query data from the "room" table
$show = mysqli_query($conn, "SELECT * FROM tenant ORDER BY tenant_name ASC");

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <title>Tenant Database</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="css/tenantdatabase.css">
</head>

<body>
  <h2 class="title">Tenant Information</h2>
  <div class="buttonatas">
    <button class="btn btn-primary"><a href="../homeadmin.php">Back</a></button>
  </div>
  <div class="ruang">
    <form action="" method="GET">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search Tenant Name / ID" name="search" value="<?php if (isset($_GET['search'])) {
          echo $_GET['search'];}?>">
        <button type="submit" class="btn btn-primary">Search</button>
      </div>
    </form>

    <table border="1" cellpadding="1" cellspacing="0" class="table table-striped table-light">

      <!--Structure-->
      <thead>
        <tr>
          <th>No.</th>
          <th>Tenant ID</th>
          <th>Tenant Name</th>
          <th>Tenant Address</th>
          <th>Tenant KTP Number</th>
          <th>Tenant Phone Number</th>
          <th>Tenant E-mail</th>
          <th>Bank Account</th>
          <th>Bank Account Number</th>
          <th>Action</th>
        </tr>
      </thead>

      <tbody>
        <?php $i= 1; 
        if(isset($_GET['show'])){
          foreach( $show as $row ) : ?>
        <tr>
          <td>
            <?= $i; ?>
          </td>
          <td>
            <?= $row["tenant_id"]; ?>
          </td>
          <td>
            <?= $row["tenant_name"]; ?>
          </td>
          <td>
            <?= $row["tenant_address"]; ?>
          </td>
          <td>
            <?= $row["tenant_ktp_no"]; ?>
          </td>
          <td>
            <?= $row["tenant_phone"]; ?>
          </td>
          <td>
            <?= $row["tenant_email"]; ?>
          </td>
          <td>
            <?= $row["tenant_bankaccount"]; ?>
          </td>
          <td>
            <?= $row["tenant_bankaccount_no"]; ?>
          </td>
          <div class="insidetable">
            <td style='white-space: nowrap'>
              <button type="button" class="btn btn-success"><a
                  href="updatetenant.php?tenant_id=<?= $row["tenant_id"]; ?>">
                  Update </a></button>
              <button type="button" class="btn btn-warning"><a
                  href="deletetenant.php?tenant_id=<?= $row["tenant_id"]; ?>">
                  Delete </a></button>
            </td>
          </div>
        </tr>
        <?php  $i++; ?>
        <?php  endforeach; 
      }
      ?>

        <?php
        if(isset($_GET['search'])){
          $filtervalues = $_GET['search'];
          $result = mysqli_query($conn, "SELECT * FROM tenant WHERE CONCAT(tenant_name,tenant_id) LIKE '%$filtervalues%'  ORDER BY tenant_name ASC ");
          if(mysqli_num_rows($result)>0){
            foreach($result as $row){
              ?>
        <td>
          <?= $i; ?>
        </td>
        <td>
          <?= $row["tenant_id"]; ?>
        </td>
        <td>
          <?= $row["tenant_name"]; ?>
        </td>
        <td>
          <?= $row["tenant_address"]; ?>
        </td>
        <td>
          <?= $row["tenant_ktp_no"]; ?>
        </td>
        <td>
          <?= $row["tenant_phone"]; ?>
        </td>
        <td>
          <?= $row["tenant_email"]; ?>
        <td>
          <?= $row["tenant_bankaccount"]; ?>
        </td>
        <td>
          <?= $row["tenant_bankaccount_no"]; ?>
        </td>
        <div class="insidetable">
          <td style='white-space: nowrap'>
            <button type="button" class="btn btn-success"><a
                href="updatetenant.php?tenant_id=<?= $row["tenant_id"]; ?>">
                Update </a></button>
            <button type="button" class="btn btn-warning"><a
                href="deletetenant.php?tenant_id=<?= $row["tenant_id"]; ?>">
                Delete </a></button>
          </td>
        </div>
        </tr>
        <?php  $i++; 
      }
        } else{
          ?>
        <tr>
          <td colspan="11">No Room found</td>
        </tr>
        <?php
        }
        }
      ?>

      </tbody>
    </table>
  </div>

</body>

</html>