<?php
session_start();
include 'config.php';


if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}


if (isset($_POST['submit'])) {
    $position = $_POST['position'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $availability = $_POST['availability'];
    $salary = $_POST['salary'];
    $date_posted = date('Y-m-d');
    $date_created = date('Y-m-d H:i:s');

    try {
      
        $sql = "INSERT INTO tbl_job (position, description, status, availability, salary, date_posted, date_created) 
                VALUES (:position, :description, :status, :availability, :salary, :date_posted, :date_created)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':position' => $position,
            ':description' => $description,
            ':status' => $status,
            ':availability' => $availability,
            ':salary' => $salary,
            ':date_posted' => $date_posted,
            ':date_created' => $date_created
        ]);
    
        header("Location: job.php?0=1");
        exit();
    } catch (PDOException $e) {
      
        echo "Error: " . $e->getMessage();
    }
}


try {
    $sql = "SELECT *, ta2.name as name1, ta.name as name FROM tbl_job tj 
    LEFT JOIN tbl_account ta ON ta.id = tj.account_id 
    LEFT JOIN tbl_account ta2 ON ta2.id = tj.account_edited";

    $stmt = $pdo->query($sql);
    $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {

    echo "Error: " . $e->getMessage();
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
    <link href="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Istyle.css">
    <style>
        @media (min-width: 768px) {
            .sidebar {
                flex: 0 0 250px;
            }

            .content {
                margin-left: 250px;
            }
        }

        table,
        .card {
            font-family: "Times New Roman";
        }

        .status {
            font-size: 15px;
            border-radius: 6px;
            padding: 5px 10px;
        }

        .status-closed {
            background-color: #dc3545 !important;
            color: white !important;
        }

        .status-active {
            background-color: #28a745 !important;
            color: white !important;
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
            <a class="logoutbtn" href="logout.php" type="button" style="text-decoration: none;" name="logout"> LOGOUT <i class="bi bi-box-arrow-right"></i></a>
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
        <div class="container-fluid mt-5">
            <div class="row" style="margin-top:120px;">
                <div class="col">
                    <h4></h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h4>Job Posting
                        <button class="btn btn-primary float-right" style="float:right;" data-bs-toggle="modal" data-bs-target="#newJobModal"><i class="fas fa-plus"></i> New Job</button>
                    </h4>
                </div>
                <div class="col">
                    <select id="filterDropdown" class="form-select float-end" aria-label="Filter Jobs">
                        <option value="all" selected>All Jobs</option>
                        <option value="active">Active Jobs</option>
                        <option value="closed">Closed Jobs</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="card-body">
                <table id="table" class="table table-bordered">
                    <thead style="text-align:center;">
                        <tr>
                            <th>Job Information</th>
                            <th>Availability</th>
                            <th>Status</th>
                            <th>Date Posted</th>
                            <th>Posted By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($jobs as $job):
                        $jobSalary = $job['salary'];
                        $salaryParts = explode('-', $jobSalary);
                       $salaryFrom = trim($salaryParts[0]);
                        $salaryTo = isset($salaryParts[1]) ? trim($salaryParts[1]) : 'N/A'; 
                    ?>
                        <tr>
                            <td>
                                <h6 class="fw-normal">Position: <span class="fw-bold"><?= $job['position'] ?></span></h6>
                                <h6 class="fw-normal">Job Type: <span class="fw-bold"><?= $job['job_type'] ?></span></h6>
                                <h6 class="fw-normal">Salary Range: <span class="fw-bold"><?= $salaryFrom .'-'. $salaryTo ?></span></h6>
                                
                                <p><?= $job['description'] ?></p>
                            </td>
                            <td style="text-align:center;"><?= $job['availability'] ?></td>
                            <td style="text-align:center;"><span class="status <?= ($job['status'] == 'Closed') ? 'status-closed' : (($job['status'] == 'Active') ? 'status-active' : '') ?>"><?= $job['status'] ?></span></td>
                            <td style="text-align:center;"><?= $job['date_created'] ?></td>
                            <td style="text-align:center;"><?= $job['name'] ?>
                            <?php 
                            if($job['account_edited']!=""){
                                echo '<p><br><i>Updated by: '.$job['name1'].'</i></p>';  
                            }
                            ?>
                            </td>

                            <td style="text-align:center;">
                                <button class="btn btn-primary editJob" data-job_type="<?= $job['job_type'] ?>" data-salaryto="<?= $salaryTo; ?>" data-salaryfrom="<?= $salaryFrom; ?>" data-id="<?= $job['id'] ?>" data-position="<?= $job['position'] ?>" data-description="<?= $job['description'] ?>" data-status="<?= $job['status'] ?>" data-availability="<?= $job['availability'] ?>"><i class="fas fa-edit"></i> Edit</button>
                                <button class="btn btn-danger deleteJob" data-id="<?= $job['id'] ?>"><i class="fas fa-trash"></i> Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include 'modal.php'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-bs4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });

        $(document).on('click', '.editJob', function() {
    var id = $(this).data('id');
    var position1 = $(this).data('position');
    var status1 = $(this).data('status');
    var description = $(this).data('description');
    var availability = $(this).data('availability');
    var job_type = $(this).data('job_type');
    var salaryTo = $(this).data('salaryto'); 
    var salaryFrom = $(this).data('salaryfrom'); 

    $('#id3').val(id);
    $('#position1').val(position1);
    $('#status1').val(status1);
    $('#availability').val(availability);
    $('#description1').val(description);
    $('#job_type').val(job_type);
    $('#salaryTo').val(salaryTo);
    $('#salaryFrom').val(salaryFrom);
    console.log('Salary From:', salaryFrom, 'Salary To:', salaryTo);

    $('#editJobModal').modal('show');
});


        $(document).on('click', '.deleteJob', function() {
            var id = $(this).data('id');
            $('#id4').val(id);
            $('#deleteJobModal').modal('show');
        });

        $(document).ready(function() {
            var table = $('#table').DataTable();

            $('#filterDropdown').change(function() {
                var filter = $(this).val();

                if (filter === 'active') {
                    table.columns(2).search('Active').draw();
                } else if (filter === 'closed') {
                    table.columns(2).search('Closed').draw();
                } else {
                    table.search('').columns().search('').draw();
                }
            });
        });
    </script>
</body>

</html>
