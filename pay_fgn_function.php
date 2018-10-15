<?php 
include("sql_connection.php");
    if (isset($_POST['login'])) {
?>
<script>
        function paywithPaystack() {
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
                        <?php
                                $fullName = $_POST['fullName'];
                                $paymentPurpose = $_POST['paymentPurpose'];
                                $mdaService = $_POST['mdaService'];
                                $amount = $_POST['amount'];
                                $pnum = $_POST['pnum'];
                                $email = $_POST['email'];
                                                    
                                if ( ($fullName || $paymentPurpose || $mdaService || $amount || $pnum || $email) == " " ) {
                        ?>

                        <?php            
                                }
                                $query = "insert into employee (eFirst_name, eLast_name, eGender, eDOB, eAddress, ePhone_number, eEmail, ePassword, dID, rID, dDate, type) values ('$fname','$lname', '$gender', '$dob', '$address', '$pnum', '$email', '$password', '$department', '$position', now(),  '0') ";
                                $result = mysqli_query($connection, $query);
                                if ($result) {
                        ?>
                        <script>
                            alert("Employee Created");
                        </script>
                        <?php 
                                }else{
                                    die();
                                }
                        ?>
                    alert('success. transaction ref is ' + response.reference);     
                    }else{
                        alert('Transaction Failed');     
                    }
                },
                onClose: function(){
                    alert('window closed');
                }
            });
            handler.openIframe();
        }
</script>
<?php
    }
?>