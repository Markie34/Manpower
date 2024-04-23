<?php
include 'config.php'; 

$keyword = '%' . $_POST['keyword'] . '%';
$stmt = $pdo->prepare("SELECT * FROM tbl_job WHERE position LIKE ? OR description LIKE ?");
$stmt->execute([$keyword, $keyword]);

$jobDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (!empty($jobDetails)) {
    foreach ($jobDetails as $job) {
        echo '<div class="col-lg-4 mb-2 text-left">';
        echo '<div class="card">';
        echo '<div class="card-body">';
        echo '<h3 style="text-align:left !important; text-transform: uppercase;">' . $job['position'] . '
        <span style="font-size:15px; float:right; ">'.$job['date_created'].'</span></h3>';
        echo '<p  style="text-align:left !important;" class="card-text">Availability: <span style="
      
        display: inline-block;
        padding: 0.25em 0.6em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 0.25rem;
        color: #fff;
        background-color: #28a745; /* Green color */
  
    
    ">' . $job['availability'] . '</span></p><hr>';
        echo $job['description'];
        echo '<hr><a href="job_details.php?id='.$job['id'].'"  class="btn btn-primary applyJob">Apply Now</a>';
        echo '</div></div>';
        echo '</div>';
    }
} else {
    echo '<p>No jobs found.</p>';
}
?>
