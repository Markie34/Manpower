<?php
session_start();
include 'config.php';

$query = "SELECT *
          FROM tbl_job j 
          LEFT JOIN tbl_account a ON j.account_id = a.id where j.id = ".$_GET['id']."";
$stmt = $pdo->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row): 
endforeach;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link rel="icon" href="img/po.png">
    <link rel="stylesheet" href="styles.css">
    <script src="scripts.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link href="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-bs4.min.js"></script>
    <style>

    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <span class="menu-btn material-symbols-rounded"><i class="bi bi-list"></i></span>
            <a href="index.php" class="logo">
                <img src="img/po.png" alt="logo">
                <h2>Edrianco Manpower</h2> 
            </a>
            <ul class="links">
                <span class="close-btn material-symbols-rounded">&times;</span>
                <li><a href="index.php">Home</a></li>
                <li><a href="jobs.php">Apply Now</a></li>
                <li><a href="about.php">About Us</a></li>
            </ul>
        </nav>
    </header>




<div class="masthead" >
            <div class="container-fluid h-100">
                <div class="row h-100">
                    <div class="col-lg-12 align-self-end mb-4 page-title">
                    	<h3 class="text-white mt-3 align-items-center justify-content-center text-center">Application Form</h3>
                        <hr class="divider my-4" />
                        </div>
                </div>


                <style>
                    
.timeline{
  counter-reset: test 0;
  position: relative;
}

.timeline li{
  list-style: none;
  float: left;
  color:black;
  width: 25%;
  position: relative;
  text-align: center;
  text-transform: uppercase;
}

ul:nth-child(1){
  color: #4caf50;
}

.timeline li:before{
  counter-increment: test;
  content: counter(test);
  width: 50px;
  height: 50px;
  border: 3px solid blue;
  border-radius: 50%;
  display: block;
  text-align: center;
  line-height: 50px;
  margin: 0 auto 10px auto;
  background: #fff;
  color: #000;
  transition: all ease-in-out .3s;
  cursor: pointer;
}

.timeline li:after{
  content: "";
  position: absolute;
  width: 100%;
  height: 1px;
  background-color: grey;
  top: 25px;
  left: -50%;
  z-index: -999;
  transition: all ease-in-out .3s;
}

.timeline li:first-child:after{
  content: none;
}
.timeline li.active-tl{
  color: blue;
}
.timeline li.active-tl:before{

  color: blue;
}

.timeline li.active-tl + li:after{
  background: blue;
}
.timeline li:not(.active-tl):before {
        border-color: gray; 
}



</style>
<div class="container">
  <ul class="timeline">
    <li>Basic Information</li>
    <li >Educational Background</li>
    <li>Skills</li>
    <li class="active-tl"><strong>Cover Letter</strong></li>

  </ul>
</div>


<style>
    .input-group {
        margin-bottom: 10px;
    }
    .badge {
        margin-right: 5px;
        cursor: pointer;
    }
    .badge.badge-primary {
        margin-right: 5px;
        cursor: pointer;
        background-color: #007bff;
    }
</style>
        <div class="container">
            <div class="row">
                <div class="col">
                    <br>
                    <div class="card">
                        <div class="card-body p-4">
                            <h5 class="text-center">COVER LETTER</h5><hr>
                            <form action="../admin/function.php" method="POST"   enctype="multipart/form-data" >
    <input type="hidden" name="job_id" value="<?php echo $_GET['id'];?>">
    <div class="container">
        <div class="row">
            <div class="col">
            <label for="" class="pb-2">Upload Cover Letter</label>
            <input type="file" class="form-control" name="resume" accept=".jpg, .jpeg, .png, .gif, .pdf" required>

        </div>
    </div>

    <div class="row">
        <div class="col">
            <div style="float:right;">
                <button type="submit" name="apply_cover" class="btn btn-primary">SUBMIT</button>
            </div>
        </div>
    </div>
</form>




                            </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                




        

</div>

</div>
</div>

 <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
<footer class="footer-distributed">

            <div class="footer-left">

                <h3>Edrianco Manpower<span><br><img src="img/po.png" width="40px" height="40px"></span></h3>

                <p class="footer-links">
                    <a href="#" class="link-1">Home</a>
                    <a href="about.php">About</a>
                </p>

                <p class="footer-company-name">Edrianco Manpower Services © 2024</p>
            </div>

            <div class="footer-center">

                <div>
                    <i class="fa fa-map-marker"></i>
                    <p><span>5 P.Deato, Balangkas, Polo</span> Valenzuela City</p>
                </div>

                <div>
                    <i class="fa fa-phone"></i>
                    <p>0995678956</p>
                </div>

                <div>
                    <i class="fa fa-envelope"></i>
                    <p><a href="mailto:support@company.com">edriancoservices@gmail.com</a></p>
                </div>

            </div>

            <div class="footer-right">

                <p class="footer-company-about">
                    <span>About the company</span>
                    A manpower agency, also known as a staffing agency or employment agency, is a specialized firm that assists organizations in finding qualified candidates to fill their job vacancies.
                </p>

                <div class="footer-icons">

                    <a href="https://web.facebook.com/edrianco.manpower"><i class="fab fa-facebook-f"></i></a>
                     <a href="#"><i class="fa fa-envelope"></i></a>


                </div>

            </div>

        </footer>


</body>

</html>


<?php 
	include '../admin/modal.php';
?>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></sc>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
 
		$(document).on('click', '.applyJob', function() {
		var id = $(this).data('id');
        var position = $(this).data('position');

		$('#id9').val(id);
        $('#position3').val(position);
		$('#applyJobModal').modal('show');
		});

    </script>
<script>
$(document).ready(function() {
    $('#searchInput').on('input', function() {
        var keyword = $(this).val();
        if (keyword.length >= 2 || keyword.length === 0) {
            // If the input length is at least 2 or empty, make an AJAX call
            $.ajax({
                url: 'search_jobs.php',
                type: 'POST',
                data: { keyword: keyword },
                success: function(data) {
                    $('#jobResults').html(data);
                }
            });
        } else {
            // If the input is less than 2 characters and not empty, clear the results
            $('#jobResults').html('');
        }
    });

    // Initially load all jobs when the page is ready
    $.ajax({
        url: 'search_jobs.php',
        type: 'POST',
        data: { keyword: '' }, // Initially no filter
        success: function(data) {
            $('#jobResults').html(data);
        }
    });
});

</script>   