<?php
session_start();
include 'config.php';
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['1'])) {
echo '<script>alert("Application status updated successfuly!");</script>';
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
                margin-left: 250px;
            }
        }
        table, .card{
				font-family:"Times New Roman";
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
            <a class="logoutbtn" href="logout.php" type="button" style="text-decoration: none;" name="logout"> LOGOUT   <i class="bi bi-box-arrow-right"></i></a>
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
            </div>
             <div class="mb-3">
             <label for="statusFilter" class="form-label">Filter by Status:</label>
             <select class="form-select" id="statusFilter">
                                <option value="">All</option>
                                <option value="hired">Hired</option>
                                <option value="failed">Failed</option>
                                <option value="pending">Pending</option>
                            </select>
                        </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card" style="margin-top:20px;">
                    <div class="card-header">
                        <div class="card-title">List of Applicants</div>
                    </div>
                    <div class="card-body">
							<?php 
							try {
								$sql = "SELECT *, ta.id as id, ta.status as status FROM tbl_applicant as ta LEFT JOIN tbl_job as tj ON ta.job_id = tj.id";
								$stmt = $pdo->query($sql);
								$applicants = $stmt->fetchAll(PDO::FETCH_ASSOC);
							} catch (PDOException $e) {
								echo "Error: " . $e->getMessage();
							}
							?>
                            <table id="table" class="table table-bordered">
                                <thead style="text-align:center;">
                                    <tr>
                                        <th>Applicant Information</th>
										<th>Resume</th>
                                        <th>Applicant Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
								<tbody>
									<?php foreach ($applicants as $applicant): ?>
										<tr>
											<td><h6 class="fw-normal">Position: <span class="fw-bold"><?= $applicant['position'] ?></span> </h6>
											<h6 class="fw-normal">Applicant Name: <span class="fw-bold"><?= $applicant['firstname'] ?> <?= $applicant['middlename'] ?> <?= $applicant['lastname'] ?></span> </h6>
											<h6 class="fw-normal">Gender: <span class="fw-bold"><?= $applicant['gender'] ?></span> </h6>
											<h6 class="fw-normal">Email Address: <span class="fw-bold"><?= $applicant['email'] ?></span> </h6>
											<h6 class="fw-normal">Contact Number: <span class="fw-bold"><?= $applicant['contact'] ?></span> </h6>
											<h6 class="fw-normal">Address: <span class="fw-bold"><?= $applicant['address'] ?></span> </h6></td>
											<td  style="text-align:center;"><a type="button" class="btn btn-primary" href="<?= $applicant['resume'] ?>" target="_blank">View Resume</a></td>
											<td  style="text-align:center;"><?= $applicant['status'] ?></td>
											<td  style="text-align:center;">
												<button class="btn btn-primary editApplicantStatus"
												data-id="<?php echo $applicant['id'];?>"
												data-status="<?php echo $applicant['status'];?>"
												><i class="fas fa-edit"></i> Edit Application Status</button>
							
											</td> 
										</tr>
									<?php endforeach; ?>
								</tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });

		$(document).on('click', '.editApplicantStatus', function() {
		var id = $(this).data('id');
		var status = $(this).data('status');
		$('#id6').val(id);
		$('#status2').val(status);
		$('#editApplicantStatusModal').modal('show');
		});


		$(document).on('click', '.deleteApplicant', function() {
		var id = $(this).data('id');
		$('#id2').val(id);
		$('#deleteApplicantModal').modal('show');
		});


		  $(document).ready(function() {
        $('#table').DataTable();

     
        $('#statusFilter').on('change', function() {
            var status = $(this).val();
            
            $('#table').DataTable().column(2).search(status).draw();
        });
    });

    </script>
</body>
</html>

