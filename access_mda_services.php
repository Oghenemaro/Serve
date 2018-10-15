<?php 
    include("sql_connection.php");

    $serviceID = $_POST['mdaServiceID'];
	$statesQuery = "select * from nigerian_states";
    $executeStates = mysqli_query($connection, $statesQuery);
    if ($serviceID == 3 || $serviceID == 4) {
        if (!$executeStates) {
            die("Can't Load, Server error");
        }else{
            echo " <div class='form-group'>
                            <label class='col-md-3 control-label' for='location'>Select Location :</label>
                            <div class='col-md-6'>
                                <select id='mdaServiceField' class='form-control' name='payment-purpose' style='height: 100%;' required>";
            echo                 "<option selected>Select Location</option>";
                                    while($values = mysqli_fetch_assoc($executeStates)){
                                        echo "<option value=".$values['id'].">".$values['states']."</option>";
                                    } 
            echo "          </select>
                            </div>
                        </div> ";
            echo " <div class='form-group'>
                        <label class='col-md-3 control-label'>Parties Involved : </label>
                        <div class='col-md-6'>
                            <input type='text' class='form-control' value='' placeholder='Parties Involved' name='parties' required>
                        </div> 
                    </div> ";
            echo "<div class='form-group'>
                        <label class='col-md-3 control-label'>Suit Case No. : </label>
                        <div class='col-md-6'>
                            <input type='number' class='form-control' value='' placeholder='Suit Case Number' name='suitNo' required>
                        </div>
                    </div>";
        }
    }elseif ($serviceID == 5) {
        if (!$executeStates) {
            die("Can't Load, Server error");
        }else{
            echo " <div class='form-group'>
                            <label class='col-md-3 control-label'>Parties Involved : </label>
                            <div class='col-md-6'>
                                <input type='text' class='form-control' value='' placeholder='Parties Involved' name='parties' required>
                            </div> 
                        </div> ";
            echo "<div class='form-group'>
                            <label class='col-md-3 control-label'>Suit Case No. : </label>
                            <div class='col-md-6'>
                                <input type='number' class='form-control' value='' placeholder='Suit Case Number' name='suitNo' required>
                            </div>
                        </div>";
            echo "<div class='form-group'>
                            <label class='col-md-3 control-label'>Description : </label>
                            <div class='col-md-6'>
                                    <input type='text' class='form-control' value='' placeholder='Description' name='Description' required>
                                </div>
                        </div>";
        }
    }else{
        if (!$executeStates) {
            die("Can't Load, Server error");
        }else{
            echo "<label class='col-md-3 control-label' for='location'>Select Location :</label>
                        <div class='col-md-6'>
                            <select id='mdaServiceField' class='form-control' name='payment-purpose' style='height: 100%;' required>";
            echo            "<option selected>Select Location</option>";
                                while($values = mysqli_fetch_assoc($executeStates)){
                                    echo "<option value=".$values['id'].">".$values['states']."</option>";
                                } 
            echo "</select></div> ";
        }
    }
?>


                              