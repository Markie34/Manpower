<?php
session_start();
include 'config.php';
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['1'])) {
echo '<script>alert("User updated successfuly!");</script>';
}

if (isset($_GET['2'])) {
    echo '<script>alert("Email address already exists!");</script>';
    }


if (isset($_GET['0'])) {
        echo '<script>alert("User added successfuly!");</script>';
}

if (isset($_GET['3'])) {
    echo '<script>alert("User deleted successfuly!");</script>';
}
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="icon" href="images/po.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="Istyle.css">
    <style>
        @media (min-width: 768px) {
            .sidebar {
                flex: 0 0 250px;
            }
            .content {
                margin-left: 230px;
            }
        }

        a{
            text-decoration:none;
        }
        .panel-card{
            margin-bottom: 20px !important;
            border-radius: 4px;
            box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
            position:relative;
            overflow:hidden;
        }
        .panel-card-header{
            padding: 20px;
            position: relative;
            font-family: "Motserrat"
        }
        .row{
            margin: 10px !important;
        }
        .huge{
            font-size:40px !important;
            line-height: normal !important;
            font-weight:bold !important;

        }
        .panel-card-footer{
            padding: 3px i !imporant;
        }
        .panel-card-footer span{
            padding:5px; 
            font-size:12px;
            line-heigt:25px;
            font-weight:medium im !important;
            opacity:1;
        }
        .panel-card-footer a {
            color: white !important;
        }
        .bg-primary-2{
            background: #00bae8 !important;
        }
        .bg-primary-dark {
            background: rgba(0,0,0,0.15) !important;
        }
        .icon{
            opacity: 0.3 !important;
            font-size: 60px !important;
            position: absolute !important;
            right: -6px !important;
            bottom: -45px !important;
            transform: rotate(-15deg);
            transform: all 0.3s ease-in-out !important;
        }
        .panel-card:hover .icon {
            opacity: 0.5 !important;
            transform: rotate(0deg) scale(1.4) !important;
        }
        .mt-0-7{
            margin-top: 0.7rem;
        }
        .bg-primary-dark:hover {
            background: rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="#" class="logo">
                <img src="images/po.png" alt="logo">
                <h2>Edrianco Manpower</h2>
            </a>
            <a class="logoutbtn" href="logout.php" type="button" name="logout"> Logout  <i class="bi bi-box-arrow-right"></i></a>
        </nav>
    </header>
    <div class="sidebar">
        <a href="index.php"><i class="bi bi-house-door"></i> Dashboard</a>
        <a href="applicant.php"><i class="bi bi-person"></i> Applicants</a>
        <a href="job.php"><i class="bi bi-file-earmark-post"></i> Post Job</a>
        <a href="applicant_status.php"><i class="bi bi-people"></i> Applicant Status</a>
        <a href="user.php"><i class="bi bi-person-circle"></i> Users</a>
        <a href="about.php"><i class="bi bi-book"></i> About Us</a>
    </div>

    <div class="content">
        <div class="container-fluid" style="margin-top:150px;">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="panel-card bg-primary-2">
                        <div class="panel-card-header bg-primary-2 text-white">
                            <div class="row d-flex justify-content-center">
                                <div class="col">
                                    <div class="huge">
                                        <?php echo  $pdo->query('SELECT COUNT(id) FROM tbl_job where status = "Active"')->fetchColumn();?>
                                    </div>
                                    <div>Active Jobs

                                    </div>
                                </div>
                                <div class="col text-right mt-0-7">
                                    <i class="fas fa-briefcase fa-4x text-white icon"></i>
                                </div>
                            </div>
                        </div>  
                        <div class="panel-card-footer bg-primary-2 text-white text-center">
                            <a href="job.php">
                                <span>View</span>
                                <span><i class="fa fa-arrow-circle-right"></i></span>
                            </a>
                        </div> 
                    </div>  
                    </div>

                    <div class="col-lg-4 col-md-6">
                    <div class="panel-card bg-success">
                        <div class="panel-card-header bg-success text-white">
                            <div class="row d-flex justify-content-center">
                                <div class="col">
                                    <div class="huge">
                                    <?php echo  $pdo->query('SELECT COUNT(id) FROM tbl_applicant where status = "New"')->fetchColumn();?>
                                    </div>
                                    <div>Applicants

                                    </div>
                                </div>
                                <div class="col text-right mt-0-7">
                                    <i class="fas fa-user fa-4x text-white icon"></i>
                                </div>
                            </div>
                        </div>  
                        <div class="panel-card-footer bg-success text-white text-center">
                            <a href="applicant.php">
                                <span>View</span>
                                <span><i class="fa fa-arrow-circle-right"></i></span>
                            </a>
                        </div> 
                    </div>  
                    </div>

                    <div class="col-lg-4 col-md-6">
                    <div class="panel-card bg-warning">
                        <div class="panel-card-header bg-warning text-white">
                            <div class="row d-flex justify-content-center">
                                <div class="col">
                                    <div class="huge">
                                    <?php echo  $pdo->query('SELECT COUNT(id) FROM tbl_account')->fetchColumn();?>

                                    </div>
                                    <div>User

                                    </div>
                                </div>
                                <div class="col text-right mt-0-7">
                                    <i class="fas fa-user fa-4x text-white icon"></i>
                                </div>
                            </div>
                        </div>  
                        <div class="panel-card-footer bg-warning text-white text-center">
                            <a href="user.php">
                                <span>View</span>
                                <span><i class="fa fa-arrow-circle-right"></i></span>
                            </a>
                        </div> 
                    </div>  
                    </div>
                    <?php
$query = "SELECT status, COUNT(*) AS count FROM tbl_applicant GROUP BY status";
$stmt = $pdo->prepare($query);
$stmt->execute();
$applicant_statuses = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT position, SUM(availability) AS total_availability FROM tbl_job GROUP BY position";
$stmt = $pdo->prepare($query);
$stmt->execute();
$job_availability = $stmt->fetchAll(PDO::FETCH_ASSOC);
$job_availability_json = json_encode($job_availability);
?>

<script>
window.onload = function() {
    var applicant_statuses = <?php echo json_encode($applicant_statuses); ?>;
    var job_availability = <?php echo json_encode($job_availability); ?>;

    // Chart 1 - Applicant Status
    var totalCount = 0;
    var dataPoints1 = [];
    applicant_statuses.forEach(function(status) {
        totalCount += parseInt(status.count);
        var percentage = (parseInt(status.count) / totalCount) * 100;
        dataPoints1.push({y: percentage, label: status.status});
    });

    var chart1 = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title: {
            text: "Applicant Status"
        },
        data: [{
            type: "pie",
            startAngle: 240,
            yValueFormatString: "##0.00\"%\"",
            indexLabel: "{label} {y}",
            dataPoints: dataPoints1
        }]
    });
    chart1.render();

    // Chart 2 - Total Availability by Position
    var dataPoints2 = [];
    job_availability.forEach(function(job) {
        dataPoints2.push({y: parseInt(job.total_availability), label: job.position});
    });

    var chart2 = new CanvasJS.Chart("chartContainer2", {
        animationEnabled: true,
        title: {
            text: "Available Jobs"
        },
        axisY: {
            title: "Total Availability"
        },
        axisX: {
            title: "Position"
        },
        data: [{
            type: "column",
            dataPoints: dataPoints2
        }]
    });
    chart2.render();
}
</script>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card shadow ">
                <div class="card-body">
                <div id="chartContainer"></div>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                </div>

            </div>

        </div>
        <div class="col">    <div class="card shadow ">
                <div class="card-body">
                <div id="chartContainer2"></div>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                </div>

            </div></div>
    </div>
</div>
    

<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

    </div>

    </div> 
</div>



    <?php 
    include 'modal.php';
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
   
</body>
</html>

