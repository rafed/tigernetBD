<h2>Change student status</h2>

<?php
if(!isset($_POST['submit'])){ ?>
    <form class="form-horizontal well" action="studentStatus.php" method="post">
        <div class="form-group">
            <label class="control-label col-sm-3">Choose course: </label>	
            <div class='col-sm-8'>
                <select class='form-control' name="courseName" required>
                    <option></option>
                    <?php 
                        include 'includes/db-config.php';
                        $query="select name from course";
                        $sqlResult=mysqli_query($sqlConnect,$query);
                        while($sqlRow=mysqli_fetch_array($sqlResult,MYSQLI_ASSOC))
                        {
                            echo "<option value=\"".$sqlRow['name']."\"".">".$sqlRow['name']."</option>";
                        }
                        mysqli_close($sqlConnect); 
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group"> 
            <div class="col-sm-offset-5 col-sm-6">
                <button type="submit" class="btn btn-primary" name="submit" value="getlist">Submit</button>
            </div>
        </div>
    </form>
<?php } else if ($_POST['submit'] == 'getlist'){
    echo '<h3>'.$_POST['courseName'].' students</h3>';

    include 'includes/db-config.php';
    $query="SELECT roll, name, users.email
            FROM users, student
            WHERE users.email=student.email and courseName='$_POST[courseName]' and currentStatus='active'
            ORDER BY name";
    $sqlResult=mysqli_query($sqlConnect,$query);

    echo '<form action="studentStatus.php" method="post">';
    echo '<input type="hidden" name="course" value='.$_POST['courseName'].'>';

    echo '<table class="table well">';
    echo '<thead>';
    echo '<tr>';
        echo '<th>Roll</th>';
        echo '<th>Name</th>';
        echo '<th>Email</th>';
    echo '</tr>';
    echo '</thead>';

    echo '<tbody>';
    while ($row = mysqli_fetch_array($sqlResult)) {
            echo '<tr>';
                echo '<td>'.$row['roll'].'</td>';
                echo '<td>'.$row['name'].'</td>';
                echo '<td>'.$row['email'].'</td>';
            echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';

    mysqli_close($sqlConnect); 

    echo '<div class="form-group">';
        echo '<div class="col-sm-offset-5 col-sm-6">';
            echo '<button type="submit" class="btn btn-primary" name="submit" value="update">Update</button>';
    echo '</div></div></form>';

} else if ($_POST['submit'] == 'update'){
    include 'includes/db-config.php';
    $query="UPDATE student
            SET currentStatus='pass'
            WHERE courseName='".$_POST['course']."' and currentStatus='active'";
            
            
    $sqlResult=mysqli_query($sqlConnect,$query);

    if(mysqli_affected_rows($sqlConnect)>0){ ?>
        <div class="alert alert-success">
        <strong>Success!</strong> Student status changed successfully.
        </div>
    <?php } else { ?>
        <div class="alert alert-danger">
        <strong>Error!</strong> Oops. Something went wrong.
        </div>
    <?php }
    mysqli_close($sqlConnect); 
} ?>