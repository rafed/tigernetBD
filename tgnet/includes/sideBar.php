<nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
            <ul class="nav navbar-nav">
               
                <?php
                    $role = $_SESSION['role'];
            
                    if($role != null){
                        echo '<li><a href="/tgnet/routine.php">My routine <span class="pull-right glyphicon glyphicon-th-list"></span> </a></li>';
                    }
                    
                    if($role == 'Course Manager'){
                        echo '<li><a href="/tgnet/setRoutine.php">Set Routine <span class="pull-right fa fa-pencil-square-o"></span></a></li>';
                    }
                    
                    if($role == 'Student'){
                        echo '<li><a href="/tgnet/applyCourse.php">Apply for Course <span class="pull-right fa fa-book"></span></a></li>';
                        echo '<li><a href="/tgnet/paymentHistory.php">Payment History <span class="pull-right fa fa-credit-card-alt"></span></a></li>';
                    }

                    if($role == 'Accountant'){
                        echo '
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Revenue <span class="caret"></span><span class="pull-right fa fa-money"></span></a>
                            <ul class="dropdown-menu forAnimate" role="menu">
                                <li><a href="addRevenue.php">Add revenue</a></li>
                                <li><a href="#">Report</a></li>
                            </ul>
                        </li>';
                        echo '<li><a href="#">Pay Salary <span class="pull-right fa fa-book"></span></a></li>';
                        echo '<li><a href="#">All transactions <span class="pull-right fa fa-bar-chart"></span></a></li>';
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>