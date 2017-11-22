<?php
if(isset($_POST['submit'])){
    include 'includes/db-config.php';

    if($_POST['submit'] == 'update'){
        $query = "UPDATE employee SET salary='" .$_POST['salary'].
                        "' WHERE email='" .$_POST['email']. "'";
        
        $sqlResult=mysqli_query($sqlConnect,$query);
    }

    if($_POST['submit'] == 'pay'){
        $query="INSERT INTO expense (category, amount, paidTo, dateOfEntry) values('short course', '$_POST[amount]', '$_POST[email]', now())";
        $sqlResult=mysqli_query($sqlConnect,$query);
    }

    if(mysqli_affected_rows($sqlConnect)>0){
        echo '<script>
        window.onload = function () {
            alert("Action successful!");
        }
        </script>';
    }
    else{
        echo '<script>
        window.onload = function () {
            alert("Action failed. Try again!");
        }
        </script>';
    }

    mysqli_close($sqlConnect); 
}
?>

<script>
document.getElementById("writing").classList.remove('col-md-7');
document.getElementById("writing").classList.add('col-md-8');
</script>

<h2>Change student status</h2>

<?php
include 'includes/db-config.php';
$query="SELECT name, users.email, salary 
        FROM users, employee
        WHERE users.email=employee.email
        ORDER BY email";
$sqlResult=mysqli_query($sqlConnect,$query);

echo '<table class="table well">';
echo '<thead>';
echo '<tr>';
    echo '<th>Name</th>';
    echo '<th>Email</th>';
    echo '<th>Salary</th>';
    echo '<th>Edit</th>';
    echo '<th>Pay</th>';
echo '</tr>';
echo '</thead>';

echo '<tbody>';
while ($row = mysqli_fetch_array($sqlResult)) {
    echo '<form action="paySalary.php" method="post">';
    echo '<tr>';
        echo '<td class="name">'.$row['name'].'</td>';

        echo '<td class="email">'.$row['email'].'</td>';
        echo '<input type="hidden" name="email" value="' . $row[email] . '">';

        echo '<td class="salary">'.$row['salary'].'</td>';
        echo '<input type="hidden" name="amount" value="' . $row[salary] . '">';
        
        echo '<td> <button type="button" class="btn btn-warning" onClick="editSalary(this);" data-toggle="modal" data-target="#editRoutine">Edit</button> </td>';
        echo '<td> <button type="submit" class="btn btn-primary" name="submit" value="pay">Pay salary</button> </td>';
    echo '</tr></form>';
}
echo '</tbody>';
echo '</table>';
?>

<script>
function editSalary(button){
    row = $(button).closest("tr");
    salary = row.find("td.salary").text();
    email = row.find("td.email").text();

    document.getElementById('email').value = email;
    document.getElementById('email2').innerHTML = email;
    document.getElementById('salary').value = salary;
}
</script>

<div id="editRoutine" class="modal fade" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update salary</h4>
    </div>
    <div class="modal-body">
    
    <form class="form-horizontal" action="paySalary.php" method="post">
        <input id='email' type="hidden" name="email" value="">
        
        <div class="form-group">
            <label class="control-label col-sm-3">Email: </label>
            <label class="control-label col-sm-3" id='email2'></label>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3">Amount:</label>	
            <div class='col-sm-9'>
                <input id='salary' type="text" name="salary" value="">
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-success" name="submit" value="update">Update</button>
        </div>
    </form> 
      
    </div>
</div>

</div>
</div>
