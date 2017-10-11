<ul>
    <?php
        $role = $_SESSION['role'];

        if($role == 'Course Manager'){
            echo '<li><a href="setRoutine.php">Set Routine</a></li>';
        }

        if($role == 'Accountant'){
            echo '<li><a href="paySalary.php">Pay Salary</a></li>';
            echo '<li><a href="allTransactions.php">All transactions</a></li>';
        }

        if($role == 'Student'){
            echo '<li><a href="applyCourse.php">Apply for Course</a></li>';
            echo '<li><a href="paymentHistory.php">Payment History</a></li>';
        }
    ?>
    <li><a href="routine.php">My routine</a></li>
<ul>
