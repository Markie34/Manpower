<?php
session_start();
include 'config.php';


if (isset($_POST['search'])) {
    $keyword = '%' . $_POST['keyword'] . '%';
    $_SESSION['search_keyword'] = $keyword; 
} elseif (isset($_SESSION['search_keyword'])) {
    $keyword = $_SESSION['search_keyword']; 
} else {
    $keyword = null;
}

if (!empty($keyword)) {
    $stmt = $pdo->prepare("SELECT * FROM tbl_job WHERE position LIKE ? OR description LIKE ?");
    $stmt->execute([$keyword, $keyword]);
} else {
    $stmt = $pdo->query("SELECT * FROM tbl_job");
}

$jobDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="jobs.php">Apply Now</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="about.php">Login</a></li>
            </ul>
        </nav>
    </header>


    <br><br><br>


    <div id="jobs" class="contents1 text-center m-auto" >
    <div class="masthead" style="background-color: rgba(0, 0, 0, 0.2);">
            <div class="container-fluid h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-12 align-self-end mb-3 page-title">
                        <hr class="divider my-4" />
                    <div class="col-md-12 mb-2 text-left">
                        <div class="card">
                            <div class="card-body">
                                  <form action="jobs.php" method="POST">

                               <div class="form-group">
                                   <div class="input-group">
                                   <input type="text" class="form-control m-auto" placeholder="Search.." style="height:50px;" id="searchInput" name="keyword">
                                       <div class="input-group-append">
                                       <button  name="search" class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
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

<div class="masthead" >
            <div class="container-fluid h-100">
                <div class="row h-100">
                    <div class="col-lg-12 align-self-end mb-4 page-title">
                    	<h2 class="text-white mt-3 align-items-center justify-content-center text-center">Vacancy Lists</h3>
                        <hr class="divider my-4" />
                        </div>
                </div>
                        <?php 
                        
                        include 'config.php';
                       if(isset($_POST['search'])){
    $keyword = '%' . $_POST['keyword'] . '%';
    $stmt = $pdo->prepare("SELECT * FROM tbl_job WHERE position LIKE ? OR description LIKE ?");
    $stmt->execute([$keyword, $keyword]);
} else {
    $stmt = $pdo->query("SELECT * FROM tbl_job");
}

$jobDetails = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $jobDetails[] = $row;
}
?>

<div class="row" id="jobResults">
   
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

                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.9289630534726!2d120.9440865143667!3d14.709747090103172!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b39d2838ece5%3A0xe50a51bf76f4fe84!2s6%20Pascual%20Deato%2C%20Valenzuela%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1618099617530!5m2!1sen!2sph" width="300" height="150" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

                <div class="footer-icons">

                    <a href="https://web.facebook.com/edrianco.manpower"><i class="fab fa-facebook-f"></i></a>
                     <a href="#"><i class="fa fa-envelope"></i></a>


                </div>

            </div>
    </footer>
        </footer>

</body>

</html>


<?php 
	include '../admin/modal.php';
?>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            $('#jobResults').html('');
        }
    });

    $.ajax({
        url: 'search_jobs.php',
        type: 'POST',
        data: { keyword: '' }, 
        success: function(data) {
            $('#jobResults').html(data);
        }
    });
});

</script>