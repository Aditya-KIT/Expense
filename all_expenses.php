<?php 
session_start();
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");
check_user();

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

<div class="container py-3">
    <h2 class="text-center display-5 fw-bold py-5">Expense Management System</h2>
    <div class="row px-3">
    <div class="col-12 mb-3">
        <a href="chart.php" class="btn btn-primary">
            Check Expense in Chart
        </a>
        <a href="search_expense.php" class="btn btn-primary  mx-4">
            Check Expense By Date
        </a>
    </div>
        <div class="col-xl-6 col-lg-6">
            <a href="./today_expense.php">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Today</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                <?php
                                $today_date=date("Y-m-d");
                                $fetch_today_expense= "SELECT * FROM expense_info WHERE item_date='$today_date'";
                                $run_fetch_today_expense=mysqli_query($conn,$fetch_today_expense);
                                echo mysqli_num_rows($run_fetch_today_expense);
                                ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-xl-6 col-lg-6">
            <a href="./yesterday_expense.php">
            <div class="card l-bg-cyan">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Yesterday</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                <?php
                                $yesterday_date=date("Y-m-d",strtotime("-1 days"));
                                $fetch_yesterday_expense= "SELECT * FROM expense_info WHERE item_date='$yesterday_date'";
                                $run_fetch_yesterday_expense=mysqli_query($conn,$fetch_yesterday_expense);
                                echo mysqli_num_rows($run_fetch_yesterday_expense);
                                ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-xl-6 col-lg-6">
            <a href="./seven_days_expense.php">
            <div class="card l-bg-green">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Last Week</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                <?php
                                $previous_seven_days_date=date("Y-m-d",strtotime($today_date . "- 7 days"));
                                $fetch_seven_expense= "SELECT * FROM expense_info WHERE item_date BETWEEN'$previous_seven_days_date'AND '$today_date'";
                                $run_fetch_seven_expense=mysqli_query($conn,$fetch_seven_expense);
                                echo mysqli_num_rows($run_fetch_seven_expense);
                                ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-xl-6 col-lg-6">
            <a href="./month_expense.php">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Last Month</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                <?php
                                $previous_seven_days_date=date("Y-m-d",strtotime($today_date . "- 1month"));
                                $fetch_month_expense= "SELECT * FROM expense_info WHERE item_date BETWEEN'$previous_seven_days_date'AND '$today_date' ORDER BY item_date DESC";
                                $run_fetch_month_expense=mysqli_query($conn,$fetch_month_expense);
                                echo mysqli_num_rows($run_fetch_month_expense)
                                ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>
</div>

<?php
include("./includes/footer.php");

?>