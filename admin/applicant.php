<?php
session_start();
include 'config.php';
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}




if (isset($_GET['1'])) {
echo '<script>alert("Applicant added succesfuly!");</script>';
}

if (isset($_GET['0'])) {
	echo '<script>alert("Applicant updated succesfuly!");</script>';
	}


if (isset($_GET['2'])) {
		echo '<script>alert("Applicant deleted succesfuly!");</script>';
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
			table, .card{
				font-family:"Times New Roman";
			}
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
        <div class="container-fluid mt-5" >
			<div class="row" style="margin-top:120px;">
				<div class="col">
				<h4>Applicant Management
				<!-- <button class="btn btn-primary float-right" style="float:right;" data-bs-toggle="modal" data-bs-target="#newApplicantModal"><i class="fas fa-plus"></i> New Applicant</button> -->
				<select id="jobFilterDropdown" class="form-select" aria-label="Filter by Job" onchange="submitForm()">
    <option value="all" <?php if (!isset($_GET['job']) || $_GET['job'] == 'all') echo 'selected'; ?>>All Jobs</option>
    <?php
    $sql = "SELECT id, position FROM tbl_job";
    $stmt = $pdo->query($sql);
    $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($jobs as $job) {
        $selected = isset($_GET['job']) && $_GET['job'] == $job['id'] ? 'selected' : '';
        echo '<option value="' . $job['id'] . '" ' . $selected . '>' . $job['position'] . '</option>';
    }
    ?>
</select>

			<script>
			function submitForm() {
				var selectedJob = document.getElementById("jobFilterDropdown").value;
				window.location.href = 'http://localhost/Manpowert/admin/applicant.php?job=' + selectedJob;
			}
		</script>

				</h4>
				</div>
			</div>

            <div class="row">
                <div class="col-md-12 col-lg-12">

                    <div class="card"  style="margin-top:20px;">
                        <div class="card-header">
                           <div class="card-title">
							List of Applicants
						   </div>
                        </div>
                        <div class="card-body">
							<?php 
							try {
								if (isset($_GET['job']) ) {
									$job_id = $_GET['job'];
									$sql = "SELECT *, ta.id as id FROM tbl_applicant as ta LEFT JOIN tbl_job as tj ON ta.job_id = tj.id 
									LEFT JOIN tbl_applicant_skill tas ON tas.job_id = ta.id WHERE ta.job_id = :job_id GROUP BY ta.id";
									$stmt = $pdo->prepare($sql);
									$stmt->execute([':job_id' => $job_id]);
								} else {
									$sql = "SELECT *, ta.id as id FROM tbl_applicant as ta LEFT JOIN tbl_job as tj ON ta.job_id = tj.id
									LEFT JOIN tbl_applicant_skill tas ON tas.job_id = ta.id GROUP BY ta.id";
									$stmt = $pdo->query($sql);
								}
								$applicants = $stmt->fetchAll(PDO::FETCH_ASSOC);

								
							} catch (PDOException $e) {
								echo "Error: " . $e->getMessage();
							}
							?>
                            <table id="table" class="table table-bordered">
                                <thead style="text-align:center;">
                                    <tr>
                                        <th>Applicant Name</th>
										<th>Address</th>
										<th>Skills</th>
										<th>Cover Letter</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
								<tbody>
									<?php foreach ($applicants as $applicant): ?>
										<tr>
											<td>
										<span class="fw-bold"><?= $applicant['firstname'] ?> <?= $applicant['middlename'] ?> <?= $applicant['lastname'] ?></span> 
									</td>
											<td>
											<?php if (!empty($applicant['address'])): ?>
												
												<h6 class="fw-normal"><span class="fw-bold"><?= $applicant['address'] ?> </span> </h6>
											<?php endif; ?>

											</td>

											<td>
											<?php
										if (!empty($applicant['skill'])) {
											// Split skills by comma
											$skills = explode(',', $applicant['skill']);
											?>
											<ul>
												<?php foreach ($skills as $skill): ?>
													<li><?= trim($skill) ?></li>
												<?php endforeach; ?>
											</ul>
										<?php } else {
											echo "No skills available";
										}
										?>
											</td>
											<td  style="text-align:center;"><a type="button" class="btn btn-primary" href="<?= $applicant['resume'] ?>" target="_blank">View Cover Letter</a></td>
											<td  style="text-align:center;"><?= $applicant['status'] ?></td>
											<td  style="text-align:center;">
												<button class="btn btn-primary editApplicant"
												data-id="<?php echo $applicant['id'];?>"
												data-job_id="<?php echo $applicant['job_id'];?>"
												data-firstname="<?php echo $applicant['firstname'];?>"
												data-lastname="<?php echo $applicant['lastname'];?>"
												data-middlename="<?php echo $applicant['middlename'];?>"
												data-gender="<?php echo $applicant['gender'];?>"
												data-email="<?php echo $applicant['email'];?>"
												data-contact="<?php echo $applicant['contact'];?>"
												data-address="<?php echo $applicant['address'];?>"
												data-resume="<?php echo $applicant['resume'];?>"
												><i class="fas fa-edit"></i> Edit</button>
												<button class="btn btn-danger deleteApplicant"
												data-id="<?php echo $applicant['id'];?>"
												><i class="fas fa-trash"></i> Delete</button>
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

		$(document).on('click', '.editApplicant', function() {
		var id = $(this).data('id');
		var job_id = $(this).data('job_id');
		var firstname = $(this).data('firstname');
		var lastname = $(this).data('lastname');
		var middlename = $(this).data('middlename');
		var gender = $(this).data('gender');
		var email = $(this).data('email');
		var contact = $(this).data('contact');
		var address = $(this).data('address');
		var resume = $(this).data('resume');
		$('#id').val(id);
		$('#job_id').val(job_id);
		$('#firstname').val(firstname);
		$('#lastname').val(lastname);
		$('#middlename').val(middlename);
		$('#gender').val(gender);
		$('#email').val(email);
		$('#contact').val(contact);
		$('#address').val(address);

		$('#editApplicantModal').modal('show');
		});


		$(document).on('click', '.deleteApplicant', function() {
		var id = $(this).data('id');
		$('#id2').val(id);
		$('#deleteApplicantModal').modal('show');
		});

    </script>
</body>
</html>

