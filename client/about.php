<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link rel="icon" href="img/po.png">
    <link rel="stylesheet" href="cswhat.css">
    <script src="scripts.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link href="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-bs4.min.js"></script>
    <style>

.responsive-container-block {
  min-height: 75px;
  height: fit-content;
  width: 100%;
  padding-top: 10px;
  padding-right: 10px;
  padding-bottom: 10px;
  padding-left: 10px;
  display: flex;
  flex-wrap: wrap;
  margin-top: 0px;
  margin-right: auto;
  margin-bottom: 0px;
  margin-left: auto;
  justify-content: flex-start;
}

.text-blk {
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
  margin-left: 0px;
  padding-top: 10px;
  padding-right: 10px;
  padding-bottom: 10px;
  padding-left: 10px;
  line-height: 25px;
}

.responsive-container-block.bigContainer {
  padding-top: 10px;
  padding-right: 30px;
  padding-bottom: 10px;
  padding-left: 30px;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.mainImg {
  color: black;
  width: 55%;
  height: auto;
  box-shadow: rgba(0, 0, 0, 0.05) 0px 5px 10px 7px;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  border-bottom-right-radius: 10px;
  border-bottom-left-radius: 10px;
}

.text-blk.headingText {
  font-size: 25px;
  font-weight: 700;
  line-height: 34px;
  color: rgb(51, 51, 51);
  padding-top: 0px;
  padding-right: 10px;
  padding-bottom: 0px;
  padding-left: 10px;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 10px;
  margin-left: 0px;
  color: #fff;
}

.allText {
  padding-top: 0px;
  padding-right: 0px;
  padding-bottom: 0px;
  padding-left: 0px;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
  margin-left: 40px;
  width: 40%;
  margin: 0 0 0 0;
}

.text-blk.subHeadingText {
  color: rgb(102, 102, 102);
  font-size: 25px;
  line-height: 34px;
  font-weight: 700;
  padding-top: 0px;
  padding-right: 10px;
  padding-bottom: 0px;
  padding-left: 10px;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 15px;
  margin-left: 0px;
  color: #fff;
}

.text-blk.description {
  font-size: 25px;
  line-height: 34px;
  color: rgb(102, 102, 102);
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 50px;
  margin-left: 0px;
  padding-top: 0px;
  padding-right: 10px;
  padding-bottom: 0px;
  padding-left: 10px;
  color: #fff;
}

.explore {
  font-size: 20px;
  line-height: 28px;
  color: rgb(255, 255, 255);
  background-color: rgb(244, 152, 146);
  padding-top: 10px;
  padding-right: 50px;
  padding-bottom: 10px;
  padding-left: 50px;
  border-top-width: 0px;
  border-right-width: 0px;
  border-bottom-width: 0px;
  border-left-width: 0px;
  border-top-style: outset;
  border-right-style: outset;
  border-bottom-style: outset;
  border-left-style: outset;
  border-top-color: rgb(244, 152, 146);
  border-right-color: rgb(244, 152, 146);
  border-bottom-color: rgb(244, 152, 146);
  border-left-color: rgb(244, 152, 146);
  border-image-source: initial;
  border-image-slice: initial;
  border-image-width: initial;
  border-image-outset: initial;
  border-image-repeat: initial;
  cursor: pointer;
}

.explore:hover {
  background-image: initial;
  background-position-x: initial;
  background-position-y: initial;
  background-size: initial;
  background-repeat-x: initial;
  background-repeat-y: initial;
  background-attachment: initial;
  background-origin: initial;
  background-clip: initial;
  background-color: rgb(255, 235, 234);
  color: rgb(244, 152, 146);
}

.responsive-container-block.Container {
  margin-top: 80px;
  margin-right: auto;
  margin-bottom: 50px;
  margin-left: auto;
  justify-content: center;
  align-items: center;
  max-width: 1320px;
  padding-top: 10px;
  padding-right: 10px;
  padding-bottom: 10px;
  padding-left: 10px;
}

.responsive-container-block.Container.bottomContainer {
  margin-top: 100px;
  margin-right: 0px;
  margin-bottom: 50px;
  margin-left: 0px;
  flex-direction: row-reverse;
  margin: 100px auto 50px auto;
}

.allText.aboveText {
  margin: 0 0 0 40px;
}

.allText.bottomText {
  margin: 0 40px 0 0;
}

@media (max-width: 1024px) {
  .responsive-container-block.Container {
    max-width: 850px;
  }

  .mainImg {
    width: 55%;
    height: auto;
  }

  .text-blk.description {
    font-size: 20px;
  }

  .allText {
    width: 40%;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 20px;
  }

  .responsive-container-block.bigContainer {
    padding-top: 10px;
    padding-right: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
  }

  .text-blk.subHeadingText {
    font-size: 22px;
  }

  .responsive-container-block.Container.bottomContainer {
    margin: 80px auto 50px auto;
  }

  .responsive-container-block.Container {
    max-width: 830px;
  }

  .allText.aboveText {
    margin: 30px 0 0 40px;
  }

  .allText.bottomText {
    margin: 30px 40px 0 0;
  }
}

@media (max-width: 768px) {
  .mainImg {
    width: 90%;
  }

  .allText {
    width: 100%;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding-top: 0px;
    padding-right: 0px;
    padding-bottom: 0px;
    padding-left: 0px;
  }

  .responsive-container-block.Container {
    flex-direction: column;
    height: auto;
  }

  .text-blk.headingText {
    text-align: center;
  }

  .text-blk.subHeadingText {
    text-align: center;
    font-size: 25px;
  }

  .text-blk.description {
    text-align: center;
    font-size: 25px;
  }

  .allText {
    margin-top: 40px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
  }

  .allText.aboveText {
    margin: 40px 0 0 0;
  }

  .responsive-container-block.Container {
    margin: 80px auto 50px auto;
  }

  .responsive-container-block.Container.bottomContainer {
    margin: 50px auto 50px auto;
  }

  .allText.bottomText {
    margin: 40px 0 0 0;
  }
}

@media (max-width: 500px) {
  .responsive-container-block.Container {
    padding-top: 10px;
    padding-right: 0px;
    padding-bottom: 10px;
    padding-left: 0px;
    width: 100%;
    max-width: 100%;
  }

  .mainImg {
    width: 100%;
  }

  .responsive-container-block.bigContainer {
    padding-top: 10px;
    padding-right: 25px;
    padding-bottom: 10px;
    padding-left: 25px;
  }

  .text-blk.subHeadingText {
    font-size: 25px;
    padding-top: 0px;
    padding-right: 0px;
    padding-bottom: 0px;
    padding-left: 0px;

  }

  .text-blk.description {
    font-size: 25px;
    padding-top: 0px;
    padding-right: 0px;
    padding-bottom: 0px;
    padding-left: 0px;
  }

  .allText {
    padding-top: 0px;
    padding-right: 0px;
    padding-bottom: 0px;
    padding-left: 0px;
    width: 100%;
  }
  .btn-lg {
  padding: 10px 30px; 
  font-size: 20px; 
}

@media (max-width: 768px) {
  .btn-lg {
    padding: 20px 30px; 
    font-size: 16px; 
  }
}

  

}
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <span class="menu-btn material-symbols-rounded"><i class="bi bi-list"></i></span>
            <a href="#" class="logo">
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

    <div class="responsive-container-block bigContainer">
  <div class="responsive-container-block Container">
    <img class="mainImg" src="img/miss.jpg">
    <div class="allText aboveText">
      <p class="text-blk headingText">
        Our Mission
      </p>
      <p class="text-blk subHeadingText">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
      </p>
      <p class="text-blk description">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fermentum pulvinar ullamcorper suspendisse ac eget. Pellentesque tempus leo in ullamcorper quis vestibulum ligula elementum ut.
      </p>
    </div>
  </div>
  <div class="responsive-container-block Container bottomContainer">
    <img class="mainImg" src="img/viss.jpg">
    <div class="allText bottomText">
      <p class="text-blk headingText">
        Our Vision
      </p>
      <p class="text-blk subHeadingText">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
      </p>
      <p class="text-blk description">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fermentum pulvinar ullamcorper suspendisse ac eget. Pellentesque tempus leo in ullamcorper quis vestibulum ligula elementum ut.
      </p>
    </div>
  </div>
</div>

<center>
  <a type="button" href="team.php" class="btn btn-primary btn-lg">MEET THE TEAM</a>
</center>

    <br><br><br><br>
<div id="contact" class="contents1 m-auto" style="width:1530px;">
    <div class="masthead">
            <div class="container-fluid h-100">
                <div class="row h-100">
                    <div class="col-lg-12 align-self-end mb-4 page-title">
                        <hr class="divider my-4" />
                    <div class="col-md-12 mb-2 text-left">
                        <div class="card">
                            <div class="card-body">
                            <?php 
							try {
                                include 'config.php';
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
</div>
</div>


 <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
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
