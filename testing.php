<?php 
include("sql_connection.php");
include("inc/header.php");
include("inc/scripts.php");       

?> 
<form action="" method="POST" class="form-horizontal" role="form">
<div class="form-group">
    <label class="col-md-2 control-label">Department</label>
    <div class="col-md-10">
        <select class="form-control" name="sDepartment" required  id="selectDepartment">
            <option selected>Select Deparment</option>
        <?php 
            $query = "select * from department";
            $result = mysqli_query($connection, $query);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['dID'];
        ?>
            <option value=<?php echo $row['dID']; ?>> <?php echo $row['dDepartment']; ?></option>
        <?php
            }
        }
        ?>
        </select>
    </div>
    </div>
    <div class="form-group">
            <label class="col-md-2 control-label">Select Position</label>
                <div class="col-md-10">
                    <select class="form-control" name="sPosition" id="selectPosition">
                                                 
                    </select>
                </div>
    </div>     
</form>

     <script type="text/javascript">
     $(document).ready(function() {
                $("#selectDepartment").change(function (){
                    var id = $(this).val();
                    var dataValue = 'id=' + id;
                    $.ajax({
                        type: "POST",
                        url: "functions.php",
                        data: dataValue,
                        cache: false,
                        success: function(html){
                            $("#selectPosition").html(html);
                        }
                    });
                });
            });
        </script>