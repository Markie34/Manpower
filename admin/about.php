<?php
session_start();
include 'config.php';
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['1'])) {
echo '<script>alert("About Us Updated successfuly!");</script>';
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
<script src="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-bs4.min.js"></script>

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
				<h4>About Us
				</h4>
				</div>
			</div>
            <div class="row">
                <div class="col-md-12 col-lg-12">

                    <div class="card"  style="margin-top:20px;">
                        <div class="card-header">
                           <div class="card-title">
							About Us 
                            <button class="btn btn-primary editAbout" style="float:right;" data-id="<?php echo $applicant['id'];?>" data-about="<?php echo $applicant['about'];?>"><i class="fas fa-edit"></i> Edit</button>

						   </div>
                        </div>
                        <div class="card-body">
							<?php 
							try {
								$sql = "SELECT * FROM tbl_about";
								$stmt = $pdo->query($sql);
								$applicants = $stmt->fetchAll(PDO::FETCH_ASSOC);
							} catch (PDOException $e) {
								echo "Error: " . $e->getMessage();
							}
							?>
									<?php foreach ($applicants as $applicant): ?>
                                        <p><?php echo $applicant['about'];?></p>

									<?php endforeach; ?>		
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
<script src="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-bs4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });

	
		$(document).on('click', '.editAbout', function() {
		var id = $(this).data('id');
		$('#id5').val(id);
		$('#editAboutModal').modal('show');
		});

  
$(document).ready(function() {
	$('#about').summernote({
	});
});
</script>
</body>
</html>

