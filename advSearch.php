<?php
include_once 'db.php';
$result1 = mysqli_query($conn,"SELECT `issue`.`name`, `issue`.`title`, `issue`.`date`, `issue`.`ubin`, `issue`.`adm`, `issue`.`status`, `issue`.`batch`, `issue`.`issue_by` FROM issue,student where `student`.`view`= 0  and `student`.`adm` = `issue`.`adm`  order by `issue`.`date` desc");
?>

<!DOCTYPE html>
<html>

<head>
  <meta content="initial-scale=1,
  maximum-scale=1, user-scalable=0" name="viewport" />
  <meta name="viewport" content="width=device-width" />

  <!--Datatable plugin CSS file -->
  <link rel="stylesheet" href=
  "https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
  <!--jQuery library file -->
  <script type="text/javascript" src=
  "https://code.jquery.com/jquery-3.5.1.js">
</script>

<!--Datatable plugin JS library file -->
<script type="text/javascript" src=
"https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
</script>

<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">


<style>
  td {
    text-align: center;
  }
</style>
</head>

<body>

   <div class="container-fluid">

            <!-- Page Heading -->


            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary">Advanced Search</h3>
                <a href="viewissued.php" class="btn btn-primary" style="float: right;">Back</a>
              <div class="card-body">
  <div class="table-responsive">
    <!--HTML tables with student data-->
    <table id="tableID" class="display"
    style="width: 100%" width="100%" cellspacing="0" cellpadding="15">
    <input placeholder="UBIN" id="ubin" style="margin-left: 10px; margin-top: 10px;">
    <input placeholder="Title Of The Book" id="title"  style="margin-left: 10px; margin-top: 10px;">
    <input placeholder="Admission Number" id="adm"  style="margin-left: 10px; margin-top: 10px;">
    <input placeholder="Name" id="name"  style="margin-left: 10px; margin-top: 10px;">
    <input placeholder="Batch" id="batch"  style="margin-left: 10px; margin-top: 10px;">
    <input placeholder="Date of issue" id="date"  style="margin-left: 10px; margin-top: 10px;">
    <input placeholder="Issued By" id="issue_by"  style="margin-left: 10px; margin-top: 10px;">
    <input placeholder="Status" id="status"  style="margin-left: 10px; margin-top: 10px;">


    <thead>
      <tr>

        <th align="center">UBIN</th>
        <th align="center">Title Of The Book</th>
        <th align="center">Admission Number</th>
        <th align="center">Name</th>
        <th align="center">Batch</th>
        <th align="center">Date of Issue</th>
        <th align="center">Issued By</th>
        <th align="center">Status</th>
      </thead>
    </tr>
    <tbody>
      <tr>
       <?php
       $i=0;
       while($row = mysqli_fetch_array($result1)) 
       {
        ?> 

        <td> <?php echo $row["ubin"]; ?>  </td>   
        <td> <?php echo $row["title"]; ?> </td>
        <td> <?php echo $row["adm"]; ?>  </td>
        <td> <?php echo $row["name"]; ?>  </td>
        <td> <?php echo $row["batch"]; ?>  </td>
        <td> <?php echo $row["date"]; ?>  </td>
        <td> <?php echo $row["issue_by"]; ?>  </td>
        <td> <?php echo $row["status"]; ?>  </td>

      </tr>  
      <?php
    }
    ?>
  </tr>
</tbody>
</table>
</div>

<script>
 var $rows = $('#tableID tr');
 var filters = { col1: '', col2: '', col3: '', col4: '', col5: '', col6: '', col7: '', col8: ''};
 $('#ubin').keyup(function() {
  var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
  filters.col1 = val;
  applyFilters();
});
 $('#title').keyup(function() {
  var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
  filters.col2 = val;
  applyFilters();
});
 $('#adm').keyup(function() {
  var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
  filters.col3 = val;
  applyFilters();
});
 $('#name').keyup(function() {
  var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
  filters.col4 = val;
  applyFilters();
});
 $('#batch').keyup(function() {
  var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
  filters.col5 = val;
  applyFilters();
});
 $('#date').keyup(function() {
  var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
  filters.col6 = val;
  applyFilters();
});
 $('#issue_by').keyup(function() {
  var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
  filters.col7 = val;
  applyFilters();
});
 $('#status').keyup(function() {
  var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
  filters.col8 = val;
  applyFilters();
});
 function applyFilters() {
  $rows.show();
  $rows.filter(function() {
    var text = $(this).find('td:nth-child(1)').text().replace(/\s+/g, ' ').toLowerCase();
    return !~text.indexOf(filters.col1);
  }).hide();
  $rows.filter(function() {
    var text = $(this).find('td:nth-child(2)').text().replace(/\s+/g, ' ').toLowerCase();
    return !~text.indexOf(filters.col2);
  }).hide();
  $rows.filter(function() {
    var text = $(this).find('td:nth-child(3)').text().replace(/\s+/g, ' ').toLowerCase();
    return !~text.indexOf(filters.col3);
  }).hide();
  $rows.filter(function() {
    var text = $(this).find('td:nth-child(4)').text().replace(/\s+/g, ' ').toLowerCase();
    return !~text.indexOf(filters.col4);
  }).hide();
  $rows.filter(function() {
    var text = $(this).find('td:nth-child(5)').text().replace(/\s+/g, ' ').toLowerCase();
    return !~text.indexOf(filters.col5);
  }).hide();
  $rows.filter(function() {
    var text = $(this).find('td:nth-child(6)').text().replace(/\s+/g, ' ').toLowerCase();
    return !~text.indexOf(filters.col6);
  }).hide();
  $rows.filter(function() {
    var text = $(this).find('td:nth-child(7)').text().replace(/\s+/g, ' ').toLowerCase();
    return !~text.indexOf(filters.col7);
  }).hide();
  $rows.filter(function() {
    var text = $(this).find('td:nth-child(8)').text().replace(/\s+/g, ' ').toLowerCase();
    return !~text.indexOf(filters.col8);
  }).hide();
};
</script>
</body>

</html>
