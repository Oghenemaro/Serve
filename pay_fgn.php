<?php 
include("start_Session.php");
include("sql_connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Serve</title>
    <?php 
            include("inc/header.php");
        ?>
    <link rel="stylesheet" href="./style/payFgn.css" >
</head>
<body>
    <div id="container">
        <div class="content">
                    <div class="container">
                        <div class="row mt-3"  style="height: 100%; ">
                            <div class="col-lg-12">
                                <div class="fgnForm card-box mt-5" >
                                    <h2 class="text-center">Federal High Court Of Nigeria</h2>
                                    <div class="formDiv text-center mt-5">
                                        <form class="form-horizontal text-center" role="form" action="" method="post">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Full Name : </label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" placeholder="Full name" id="fullName" name="fullName" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="email">Email :</label>
                                                    <div class="col-md-6">
                                                        <input type="email" name="email" class="form-control" placeholder="Email" id="email" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"  for="mda">Name Of MDA : </label>
                                                    <div class="col-md-6">
                                                        <select id="selectMDA" class="form-control" name="mda" style="height: 100%;" required>
                                                            <option selected>Select MDA Type</option>
                                                            <?php
                                                                $query = "select * from mda";
                                                                $results = mysqli_query($connection, $query);
                                                                if ($results){
                                                                    while($mdas = mysqli_fetch_assoc($results)){
                                                                        $id = $mdas["mID"];
                                                                ?>
                                                                 <option value="<?php echo $mdas["mID"]; ?>"> <?php echo $mdas["MDA"]; ?> </option>
                                                                <?php
                                                                    }
                                                                }
                                                             ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="paymentPurpose">Purpose For Payment :</label>
                                                    <div class="col-md-6">
                                                        <select id="mdaServiceField" class="form-control" name="paymentPurpose" id="paymentPurpose" style="height: 100%;" required>
                                                                
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="mdaServiceExtra" name="mdaService">
                                         
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Amount :</label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" placeholder="cost of MDA" name="amount" id="amount" required> 
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="col-md-3 control-label" for="pnum">Phone Number :</label>
                                                    <div class="col-md-6">
                                                        <input type="number" name="pnum" class="form-control" placeholder="Phone Number" id="pnum" required>
                                                    </div>
                                                </div>
                                                <script src="https://js.paystack.co/v1/inline.js"></script>
                                                 <div class="form-group">
                                                    <button type="button" class="btn btn-success waves-effect w-md waves-light m-b-5" name="login" onClick="paywithPaystack()">Make Payment</button>
                                                    <button type="reset" class="btn btn-danger waves-effect w-md waves-light m-b-5" name="reset" >Cancel</button>
                                                 </div>
                                            </form>
                                    </div>
                                </div>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->
                    </div> <!-- container -->
                </div> <!-- content -->
    </div>

    <?php include("inc/scripts.php") ?>    

    <script>
        // paystack function
        function paywithPaystack() {
            // user data
            var email = $("#email").val();
            var amount = $("#amount").val();
            var mda = $("#selectMDA").val();
            var pnum = $("#pnum").val(); 
            var mdaService = $("#mdaServiceExtra").val();
            var parties = $("#parties").val();
            var suitNo = $("#suitNo").val();
            var description = $("#description").val();
            var location = $("#location").val();

            var record = [email, amount, mda, pnum, mdaServices, parties, suitNo, description, location];

            // paystack call
            var handler = PaystackPop.setup({
                key: "pk_test_112dd76dcd6442a23f8c44c1f82adcb94530bb8a",
                email: "nerdmaro@gmail.com",
                amount: 50000,
                firstname: 'Stephen',
                lastname: 'King',
                metadata: {
                    custom_fields: [
                        {
                            display_name: "Mobile Number",
                            variable_name: "mobile_number",
                            value: "+2348012345678"
                        }
                    ]
                },
                callback: function(response){
                    if (response) {
                        $.ajax({
                            type: "POST",
                            url: "pay_fgn_function.php",
                            data: record
                            success: alert('success. transaction ref is ' + response.reference);
                        });
                    }
                },
                onClose: function(){
                    alert('window closed');
                }
            });
            handler.openIframe();
        }

            // ajax to call function on select
            $(document).ready(function() {
                $("#selectMDA").change(function (){
                    var mID = $(this).val();
                    var dataValue = 'mdaID=' + mID;
                    $.ajax({
                        type: "POST",
                        url: "load_payment_purpose.php",
                        data: dataValue,
                        cache: false,
                        success: function(html){
                            $("#mdaServiceField").html(html);
                        }
                    });
                });
            });

            $(document).ready(function(){
                $("#mdaServiceField").change(function (){
                    var serviceID = $(this).val();
                    var data = 'mdaServiceID=' + serviceID;
                    $.ajax({
                        type: 'POST',
                        url: 'access_mda_services.php',
                        data: data,
                        cache: false,
                        success: function(html) {
                            $("#mdaServiceExtra").html(html);
                        }
                    });
                });
            });
        </script>
</body>
</html>