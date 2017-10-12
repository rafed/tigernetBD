<ul>
    <?php
        $role = $_SESSION['role'];

        if($role != null){
            echo '<li><a href="/tgnet/routine.php">My routine</a></li>';
        }

        if($role == 'Course Manager'){
            echo '<li><a href="/tgnet/setRoutine.php">Set Routine</a></li>';
        }

        if($role == 'Accountant'){
            echo '<li><a href="/tgnet/paySalary.php">Pay Salary</a></li>';
            echo '<li><a href="/tgnet/allTransactions.php">All transactions</a></li>';
        }

        if($role == 'Student'){
            echo '<li><a href="/tgnet/applyCourse.php">Apply for Course</a></li>';
            echo '<li><a href="/tgnet/paymentHistory.php">Payment History</a></li>';
        }
    ?>
<ul>
