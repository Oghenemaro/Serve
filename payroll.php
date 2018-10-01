<?php 
	include("start_Session.php");
	include("sql_connection.php");
    $querys = "select s.eid, s.monthly_salary, e.status from salary s join employee e on s.eid = e.eid where status = '0'";
	$result = mysqli_query($connection, $querys);
?>


<?php
	while ($rows = mysqli_fetch_assoc($result)){
        $id = $rows['eid'];
        $monthly_salary = $rows['monthly_salary'];
        $sql_query = "select * from allowances where eid = '$id'";
        $results = mysqli_query($connection, $sql_query);
        $allowances = 0;
        $BHT = 0;
        $net = 0;
        $tax = 0;
        $value = 0;
        if ($results) {
            $row = mysqli_fetch_assoc($results);
            $allowances = $row["Transport"] + $row["Housing"] + $row["Clothing"] + $row["Feeding"] + $row["special"];
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
		
		$num += 1;

        $loan_query = "select l.eid, l.tid, l.Amount, l.amount_paid, l.decided, l.status, t.Pay_Back_Options, t.deduction_rate from loan l join loan_type t on l.tid = t.tid where l.status = '0' AND l.eid = '$id' ";
        $execute_loan = mysqli_query($connection, $loan_query);
        if ($execute_loan) {
            $val = mysqli_fetch_assoc($execute_loan);
            $deduction_rate = $val['deduction_rate'];
            $payBackOption = $val['Pay_Back_Options'];
            $amount_paid = $val['amount_paid'];
            $amount = $val['Amount'];
            $tid = $val['tid'];
            $decided = $val['decided'];
            $staus = $val['status'];
            if ($amount_paid !== $amount) {
                if ($payBackOption == "Monthly Deduction") {
                    $rate = $deduction_rate / 100; 
                    $loan_deduction = $amount * $rate;
                    $monthly_salary = $monthly_salary - $loan_deduction;
                    $amount_paid = $loan_deduction;
                }
            }
            
        }
?>


<?php 

        $sql = "insert into salary_report (eID, monthly_salary, allowance, tax_paid, Gross_income, net_salary, date_times) values ('$id', '$monthly_salary', '$allowances', '$tax', '$gross', '$net', now())";

        $loan_insert = "insert into loan (eID, tid, Amount, status, amount_paid, date_times, decided) values ('$id', '$tid', '$amount', '$status', '$amount_paid', now(), $decided)";
        $execute = mysqli_query($connection, $sql);
        // $loan_execute = mysqli_query($connection, $loan_insert);
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
?>
