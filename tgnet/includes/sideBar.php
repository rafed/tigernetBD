<nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php
                    if(isset($_SESSION['role'])){
                        $role = $_SESSION['role'];
            
                        if($role != null){
                            echo '<li><a href="/tgnet/routine.php">My routine <span class="pull-right glyphicon glyphicon-th-list"></span></a></li>';
                            echo '<li style="width:100%"></li>';
                        }
                        
                        if($role == 'Course Manager'){
                            echo '<li><a href="/tgnet/setRoutine.php">Set routine <span class="pull-right fa fa-pencil-square-o"></span></a></li>';
                            echo '<li><a href="/tgnet/studentStatus.php">Change student status <span class="pull-right glyphicon glyphicon-user"></span></a></li>';
                        }
                        
                        if($role == 'Marketing Manager'){
                            echo '<li><a href="/tgnet/message.php">View Messages <span class="pull-right fa fa fa-commenting-o"></span></a></li>';
                        }
                        
                        if($role == 'Student'){
                            echo '<li><a href="/tgnet/applyCourse.php">Apply for course <span class="pull-right fa fa-book"></span></a></li>';
                            echo '<li><a href="/tgnet/paymentHistory.php">Payment history <span class="pull-right fa fa-credit-card-alt"></span></a></li>';
                        }

                        if($role == 'Accountant'){
                            echo '
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Revenue <span class="caret"></span><span class="pull-right fa fa-money"></span></a>
                                <ul class="dropdown-menu forAnimate" role="menu">
                                    <li><a href="/tgnet/addRevenue.php">Add revenue</a></li>
                                    <li><a href="/tgnet/revenueReport.php"> Reports</a></li>
                                </ul>
                            </li>';
                            echo '
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Expense <span class="caret"></span><span class="pull-right fa fa-money"></span></a>
                                <ul class="dropdown-menu forAnimate" role="menu">
                                    <li><a href="/tgnet/addExpense.php">Add expense</a></li>
                                    <li><a href="/tgnet/expenseReport.php">Reports</a></li>
                                </ul>
                            </li>';
                            echo '<li><a href="/tgnet/paySalary.php">Pay salary <span class="pull-right fa fa-book"></span></a></li>';
                            echo '<li><a href="courseFee.php">Course fee <span class="pull-right fa fa fa-money"></span></a></li>';
                        }
                        
                        echo '<style> #leftPanel {background-color: #e7e7e7;} </style>';
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>
