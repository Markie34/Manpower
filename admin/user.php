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
        <div class="container-fluid mt-5" >
			<div class="row" style="margin-top:120px;">
				<div class="col">
				<h4>User Management
				<button class="btn btn-primary float-right" style="float:right;" data-bs-toggle="modal" data-bs-target="#newUserModal"><i class="fas fa-plus"></i> New User</button>
				</h4>
				</div>
			</div>
            <div class="row">
                <div class="col-md-12 col-lg-12">

                    <div class="card"  style="margin-top:20px;">
                        <div class="card-header">
                           <div class="card-title">
							List of User
						   </div>
                        </div>
                        <div class="card-body">
							<?php 
							try {
								$sql = "SELECT * FROM tbl_account";
								$stmt = $pdo->query($sql);
								$applicants = $stmt->fetchAll(PDO::FETCH_ASSOC);
							} catch (PDOException $e) {
								echo "Error: " . $e->getMessage();
							}
							?>
                            <table id="table" class="table table-bordered">
                                <thead style="text-align:center;">
                                    <tr>
                                        <th>Full Name</th>
										<th>Email Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
								<tbody>
									<?php foreach ($applicants as $applicant): ?>
										<tr>
											
											<td  style="text-align:center;"><?= $applicant['name'] ?></td>
                                            <td  style="text-align:center;"><?= $applicant['email'] ?></td>
											<td  style="text-align:center;">
												<button class="btn btn-primary editUser"
												data-id="<?php echo $applicant['id'];?>"
                                                data-name="<?php echo $applicant['name'];?>"
												data-email="<?php echo $applicant['email'];?>"
												data-password="<?php echo $applicant['password'];?>"
												><i class="fas fa-edit"></i> Edit</button>
												<button class="btn btn-danger deleteUser"
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

		$(document).on('click', '.editUser', function() {
		var id = $(this).data('id');
        var name = $(this).data('name');
		var email = $(this).data('email');
		var password = $(this).data('password');
		$('#id7').val(id);
        $('#name').val(name);
		$('#email2').val(email);
		$('#password').val(password);
		$('#editUserModal').modal('show');
		});


		$(document).on('click', '.deleteUser', function() {
		var id = $(this).data('id');
		$('#id8').val(id);
		$('#deleteUserModal').modal('show');
		});

    </script>
</body>
</html>

