<?php
include_once 'db.php';
 $result1 = mysqli_query($conn,"SELECT `issue`.`name`, `issue`.`title`, `issue`.`date`, `issue`.`ubin`, `issue`.`adm`, `issue`.`status`, `issue`.`batch`, `issue`.`issue_by` FROM issue,student where `student`.`view`= 0  and `student`.`adm` = `issue`.`adm`  order by `date` desc");
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

<style>
  td {
  text-align: center;
  }
</style>
</head>

<body>
<h2>
  Advanced Search
</h2>

<!--HTML tables with student data-->
<table id="tableID" class="display"
                  style="width: 100%" width="100%" cellspacing="0" cellpadding="15">
                  <thead>
                    <tr>

                      <th>UBIN</th>
                      <th>Title Of The Book</th>
                      <th>Admission Number</th>
                      <th>Name</th>
                      <th>Batch</th>
                      <th>Date of Issue</th>
                      <th>Issued By</th>
                      <th>Status</th>
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

<script>

  /* Initialization of datatables */
  $(document).ready(function () {

    // Paging and other information are
    // disabled if required, set to true
    var myTable = $("#tableID").DataTable({
    paging: false,
    searching: true,
    info: false,
    });

    // 2d array is converted to 1D array
    // structure the actions are
    // implemented on EACH column
    myTable
    .columns()
    .flatten()
    .each(function (colID) {

      // Create the select list in the
      // header column header
      // On change of the list values,
      // perform search operation
      var mySelectList = $("<select />")
      .appendTo(myTable.column(colID).header())
      .on("change", function () {
        myTable.column(colID).search($(this).val());

        // update the changes using draw() method
        myTable.column(colID).draw();
      });

      // Get the search cached data for the
      // first column add to the select list
      // using append() method
      // sort the data to display to user
      // all steps are done for EACH column
      myTable
      .column(colID)
      .cache("search")
      .sort()
      .each(function (param) {
        mySelectList.append(
        $('<option value="' + param + '">'
          + param + "</option>")
        );
      });
    });
  });
</script>
</body>

</html>
