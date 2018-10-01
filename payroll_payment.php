<?php
include("start_Session.php");
include("sql_connection.php");
$querys = "select *, e.status from salary s join employee e on s.eid = e.eid";
$result = mysqli_query($connection, $querys);
?>

<?php
    // $rows = mysqli_fetch_assoc($result);
    if ($result) {
        while ($rows = mysqli_fetch_assoc($result)){
            $id = $rows['eid'];
            $monthly_salary = $rows['amount'];
            $sql_query = "select * from allowances where eid = '$id'";
            $results = mysqli_query($connection, $sql_query);
            $allowances = 0;
            $BHT = 0;
            $net = 0;
            $tax = 0;
            $value = 0;
            if ($results) {
                $row = mysqli_fetch_assoc($results);
                $allowances = $row["Transport"] + $row["Housing"] + $row["Clothing"] + $row["Feeding"] + $row["Special"];
                $BHT = $monthly_salary + $row["Transport"] + $row["Housing"];
            }
    
            $gross = $monthly_salary + $allowances;
    
            //determine Tax Relief 
            $relief = ($monthly_salary * 0.016667) + 5000;
            $NHF = $monthly_salary * 0.025;
            $pension = $BHT * 0.08; 
    
            $Tax_relief = $relief + $NHF + $pension + 17166.67;
    
            //determine Taxable income
            $taxable_income = $monthly_salary - $Tax_relief;
    
            if ($taxable_income < 25000) {
                $tax = $taxable_income * 0.01;
                $net = $monthly_salary - $tax;
            }elseif ($taxable_income >= 25000 && $taxable_income < 50000) {
                $tax = 1750;
                $net = $monthly_salary - $tax;
            }elseif ($taxable_income >= 50000 && $taxable_income < 91667) {
                $tax = 1750 + 2750;
                $net = $monthly_salary - $tax;
            }elseif ($taxable_income >= 91667 && $taxable_income < 133334) {
                $tax = 1750 + 2750 + 6250;
                $net = $monthly_salary - $tax;
            }elseif ($taxable_income >= 133334 && $taxable_income < 266667) {
                $tax = 1750 + 2750 + 6250;
                $net = $monthly_salary - $tax;
            }elseif ($taxable_income >= 266667 && $taxable_income < 533334) {
                $tax = 1750 + 2750 + 6250 + 28000;
                $net = $monthly_salary - $tax;
            }elseif ($taxable_income >= 533334) {
                $tax = 1750 + 2750 + 6250 + 28000 + 64000;
                $net = $monthly_salary - 64000;
            }
    ?>
    <?php 
            $sql = "insert into salary_report (eID, monthly_salary, allowance, tax_paid, Gross_income, net_salary, date_times) values ('$id', '$monthly_salary', '$allowances', '$tax', '$gross', '$net', now())";
            $execute = mysqli_query($connection, $sql);
            if ($execute) {
        ?>
            <script>
                alert("Payroll Complete" );
                window.location.href = 'report_view.php';
            </script>
        <?php
            }else{
        ?>
            <script>
                alert("Couldn't run payroll at this time");
                window.location.href = 'report_view.php';
            </script>
        <?php
            }
       }    
    }else if (!$result){
    ?>
        <script>
            alert("No record loaded" );
            window.location.href = 'report_view.php';
        </script>
    <?php
    }
    ?>


	