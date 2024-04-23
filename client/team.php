<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link rel="icon" href="img/po.png">
    <link rel="stylesheet" href="sieses.css">
    <script src="scripts.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link href="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-bs4.min.js"></script>
    <style>
        .icon-block svg {
  width: 100%;
  height: 100%;
}

.team-cards-inner-container {
  display: flex;
  row-gap: 1.5rem;
  column-gap: 1.6rem;
}

.text-blk {
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
  margin-left: 0px;
  padding-top: 0px;
  padding-right: 0px;
  padding-bottom: 0px;
  padding-left: 0px;
  line-height: 25px;
}

.responsive-cell-block {
  min-height: 75px;
}

.responsive-container-block {
  min-height: 75px;
  height: fit-content;
  width: 100%;
  padding-top: 0px;
  padding-right: 0px;
  padding-bottom: 0px;
  padding-left: 0px;
  display: flex;
  flex-wrap: wrap;
  margin-top: 0px;
  margin-right: auto;
  margin-bottom: 0px;
  margin-left: auto;
  justify-content: flex-start;
}

.inner-container {
  max-width: 1200px;
  min-height: 100vh;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
  margin-left: 0px;
  justify-content: center;
}

.section-head {
  font-size: 60px;
  line-height: 70px;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 24px;
  margin-left: 0px;
  color: #fff;
  text-align: center;
}

.section-body {
  font-size: 20px;
  line-height: 18px;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 64px;
  margin-left: 0px;
  color: #fff;
  text-align: center;
}

.team-cards-outer-container {
  display: flex;
  align-items: center;
}

.content-container {
  display: flex;
  justify-content: flex-start;
  flex-direction: row;
  align-items: center;
  padding-top: 0px;
  padding-right: 25px;
  padding-bottom: 0px;
  padding-left: 0px;
}

.img-box {
  max-width: 130px;
  max-height: 130px;
  width: 100%;
  height: 100%;
  overflow-x: hidden;
  overflow-y: hidden;
  margin-top: 0px;
  margin-right: 25px;
  margin-bottom: 0px;
  margin-left: 0px;
}

.card {
  background-color: rgb(255, 255, 255);
  display: flex;
  padding-top: 30px;
  padding-right: 30px;
  padding-bottom: 30px;
  padding-left: 30px;
  box-shadow: rgba(95, 95, 95, 0.1) 6px 12px 24px;
  flex-direction: row;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
  border-bottom-right-radius: 20px;
  border-bottom-left-radius: 20px;
}

.card-container {
  max-width: 350px;
}

.card-content-box {
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.person-name {
  font-size: 25px;
  font-weight: 700;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 5px;
  margin-left: 0px;
}

.person-info {
  font-size: 11px;
  line-height: 15px;
}

.card-container {
  max-width: 350px;
}

.outer-container {
  justify-content: center;
  padding-top: 0px;
  padding-right: 50px;
  padding-bottom: 0px;
  padding-left: 50px;
}

.person-img {
  width: 100%;
  height: 100%;
  border-top-left-radius: 6px;
  border-top-right-radius: 6px;
  border-bottom-right-radius: 6px;
  border-bottom-left-radius: 6px;
}

@keyframes bounce {

  0%,
  20%,
  50%,
  80%,
  100% {
    transform: translateY(0px);
  }

  40% {
    transform: translateY(-30px);
  }

  60% {
    transform: translateY(-15px);
  }

  0%,
  20%,
  50%,
  80%,
  100% {
    transform: translateY(0px);
  }

  40% {
    transform: translateY(-30px);
  }

  60% {
    transform: translateY(-15px);
  }
}

@media (max-width: 1024px) {
  .team-card-container {
    justify-content: center;
  }

  .section-head {
    font-size: 50px;
    line-height: 55px;
  }

  .img-box {
    max-width: 109px;
    max-height: 109px;
  }

  .content-container {
    padding-top: 0px;
    padding-right: 20px;
    padding-bottom: 0px;
    padding-left: 0px;
  }

  .inner-container {
    justify-content: space-evenly;
  }
}

@media (max-width: 768px) {
  .inner-container {
    margin-top: 60px;
    margin-right: 0px;
    margin-bottom: 60px;
    margin-left: 0px;
  }

  .section-body {
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
  }

  .img-box {
    margin-top: 0px;
    margin-right: 30px;
    margin-bottom: 0px;
    margin-left: 0px;
  }

  .content-box {
    text-align: center;
  }

  .content-container {
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 30px;
    margin-left: 0px;
  }

  .card-container {
    max-width: 45%;
  }

  .team-cards-inner-container {
    justify-content: center;
  }
}

@media (max-width: 500px) {
  .outer-container {
    padding-top: 0px;
    padding-right: 60px;
    padding-bottom: 0px;
    padding-left: 60px;
  }

  .section-head {
    font-size: 40px;
    line-height: 45px;
  }

  .content-box {
    padding-top: 0px;
    padding-right: 0px;
    padding-bottom: 0px;
    padding-left: 0px;
  }

  .section-body {
    font-size: 12px;
  }

  .img-box {
    max-width: 68px;
    max-height: 68px;
  }

  .person-name {
    font-size: 14px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 1px;
    margin-left: 0px;
  }

  .content-box {
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 46px;
    margin-left: 0px;
    text-align: left;
  }

  .content-container {
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
  }

  .card-container {
    max-width: 100%;
  }
}

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

    <div class="responsive-container-block outer-container">
  <div class="responsive-container-block inner-container">
    <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-4 wk-ipadp-5 content-container">
      <div class="content-box">
        <p class="text-blk section-head">
          Project Team
        </p>
        <p class="text-blk section-body">
          Lorem ipsum dolor sit amet, consectetur adipiscing
          elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
          exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
          in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
        </p>
      </div>
    </div>
    <div class="responsive-cell-block wk-ipadp-6 wk-tab-12 wk-mobile-12 wk-desk-8 team-cards-outer-container">
      <div class="responsive-container-block team-cards-inner-container">
        <div class="responsive-cell-block wk-mobile-11 wk-ipadp-1 wk-tab-8 wk-desk-6 card-container">
          <div class="card">
            <div class="img-box">
              <img class="person-img" src="img/bin.jpg">
            </div>
            <div class="card-content-box">
              <p class="text-blk person-name">
                Kervin Clark Gonzalo
              </p>
              <p class="text-blk person-info">
                Lorem ipsum dolor
              </p>
            </div>
          </div>
        </div>
        <div class="responsive-cell-block wk-mobile-12 wk-ipadp-10 wk-tab-8 wk-desk-6 card-container">
          <div class="card">
            <div class="img-box">
              <img class="person-img" src="img/lee.jpg">
            </div>
            <div class="card-content-box">
              <p class="text-blk person-name">
                Harley Dave Llenes
              </p>
              <p class="text-blk person-info">
                Lorem ipsum dolor
              </p>
            </div>
          </div>
        </div>
        <div class="responsive-cell-block wk-mobile-12 wk-ipadp-10 wk-tab-8 wk-desk-6 card-container">
          <div class="card">
            <div class="img-box">
              <img class="person-img" src="img/ran.jpg">
            </div>
            <div class="card-content-box">
              <p class="text-blk person-name">
                Ranilo Hermogino
              </p>
              <p class="text-blk person-info">
                Lorem ipsum dolor
              </p>
            </div>
          </div>
        </div>
        <div class="responsive-cell-block wk-mobile-12 wk-ipadp-10 wk-tab-8 wk-desk-6 card-container">
          <div class="card">
            <div class="img-box">
              <img class="person-img" src="img/judel.jpg">
            </div>
            <div class="card-content-box">
              <p class="text-blk person-name">
                Judell Julia
              </p>
              <p class="text-blk person-info">
                Lorem ipsum dolor
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>