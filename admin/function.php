<?php 
session_start();
include 'config.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM tbl_account WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if ($password == $user['password']) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            header("location:index.php");
        }
        else{
            header("location:login.php?1");  
        }
}
else{
    header("location:login.php?0");  
}
}



if (isset($_POST['add_applicant'])) {
    $status = 'New';
    $email = $_POST['email'];
    $sql = "INSERT INTO tbl_applicant (job_id, firstname, middlename, lastname, gender, email, contact, address, resume, status) 
            VALUES (:job_id, :firstname, :middlename, :lastname, :gender, :email, :contact, :address, :resume, :status)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':job_id', $_POST['job_id']);
    $stmt->bindParam(':firstname', $_POST['firstname']);
    $stmt->bindParam(':middlename', $_POST['middlename']);
    $stmt->bindParam(':lastname', $_POST['lastname']);
    $stmt->bindParam(':gender', $_POST['gender']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':contact', $_POST['contact']);
    $stmt->bindParam(':address', $_POST['address']);
    $stmt->bindParam(':resume', $_POST['resume']);
    $stmt->bindParam(':status', $status);

    $resumePath = ''; 
    if (isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'resume/'; 
        $resumeName = basename($_FILES['resume']['name']);
        $resumePath = $uploadDir . $resumeName;
        move_uploaded_file($_FILES['resume']['tmp_name'], $resumePath);
    }
    $stmt->bindParam(':resume', $resumePath);
    try {
        $stmt->execute();
        

        
        require_once(__DIR__ . '/vendor/autoload.php');

        $config = Brevo\Client\Configuration::getDefaultConfiguration()
            ->setApiKey('api-key', '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')
            ->setApiKey('partner-key', 'fYZrVRIdQGSFvHxA');
        
        $apiInstance = new Brevo\Client\Api\TransactionalEmailsApi(
            new GuzzleHttp\Client(),
            $config
        );
        
        // Prepare the email content with placeholders
        $htmlContent = '<html><body><h4>{{params.bodyMessage}}</h4><p>Your application status is pending, please wait for admin approval!</p></body></html>';
        
          
        
        $sendSmtpEmail = new \Brevo\Client\Model\SendSmtpEmail([
            'subject' => 'Edrianco Manpower | Application Status',
            'sender' => ['name' => 'Edrianco Manpower', 'email' => 'pfdelfin98@gmail.com'],
            'to' => [['name' => 'User', 'email' => $email]],
            'htmlContent' => $htmlContent
        ]);
        
        try {
            $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
            if ($result) {
                // Email sent successfully
                header("location:applicant.php?1");  

            }
        } catch (Exception $e) {
            echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
        }
        


    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


 if (isset($_POST['update_applicant'])) {
    $id = $_POST['id'];
    $job_id = $_POST['job_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $middlename = $_POST['middlename'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    
    $resume = '';

    if (!empty($_FILES['resume']['name'])) {
        $resume = $_FILES['resume']['name'];
        $resume_tmp = $_FILES['resume']['tmp_name'];

        move_uploaded_file($resume_tmp, "resume/" . $resume);
    } else {
        $resume = $_POST['existing_resume'];
    }
    $sql = "UPDATE tbl_applicant SET job_id=?, firstname=?, lastname=?, middlename=?, gender=?, email=?, contact=?, address=?";
    
    if (!empty($resume)) {
        $sql .= ", resume=?";
    }

    $sql .= " WHERE id=?";
    $stmt = $pdo->prepare($sql);

    if (!empty($resume)) {
        $stmt->execute([$job_id, $firstname, $lastname, $middlename, $gender, $email, $contact, $address, $resume, $id]);
    } else {
        $stmt->execute([$job_id, $firstname, $lastname, $middlename, $gender, $email, $contact, $address, $id]);
    }

    header("location:applicant.php?0");
    exit();
}


if (isset($_POST['delete_applicant'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM tbl_applicant WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    header("location:applicant.php?2");
    exit();
}


if (isset($_POST['add_job'])) {
    $job_type = $_POST['job_type'];
    $salary_range = $_POST['salary_from'].'-'.$_POST['salary_to'];
    $position = $_POST['position'];
    $availability = $_POST['availability'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $account_id = $_SESSION['id'];

    $sql = "INSERT INTO tbl_job (position, availability, description, status, salary, job_type, account_id) 
    VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$position, $availability, $description, $status, $salary_range, $job_type, $account_id]);

   
    header("location:job.php?0");
    exit();
}

if (isset($_POST['update_job'])) {
    $job_id = $_POST['id']; 
    $position = $_POST['position'];
    $availability = $_POST['availability'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $job_type = $_POST['job_type'];
    $account_id = $_SESSION['account_id'];
    $salary = $_POST['salary_from'].'-'.$_POST['salary_to'];
    $sql = "UPDATE tbl_job SET position=?, availability=?, description=?, status=?, salary=?, job_type=?, account_edited = ? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$position, $availability, $description, $status, $salary, $job_type, $account_id, $job_id]);

    header("Location: job.php?1");
    exit();
}

if (isset($_POST['delete_job'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM tbl_job WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    header("location:job.php?2");
    exit();
}


if (isset($_POST['update_about'])) {
    $id = 1; 
    $about = $_POST['about'];
    $sql = "UPDATE tbl_about SET about=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$about, $id]);

    header("Location: about.php?1");
    exit();
}


if (isset($_POST['update_application'])) {
    $id = $_POST['id']; 
    $status= $_POST['status'];
    $sql = "UPDATE tbl_applicant SET status=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$status, $id]);
    
    $sqlSelect = "SELECT email FROM tbl_applicant WHERE id=?";
    $stmtSelect = $pdo->prepare($sqlSelect);
    $stmtSelect->execute([$id]);

    $emailRow = $stmtSelect->fetch(PDO::FETCH_ASSOC);
    $email = $emailRow['email'];

    require_once(__DIR__ . '/vendor/autoload.php');

    $config = Brevo\Client\Configuration::getDefaultConfiguration()
        ->setApiKey('api-key', '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')
        ->setApiKey('partner-key', 'fYZrVRIdQGSFvHxA');
    
    $apiInstance = new Brevo\Client\Api\TransactionalEmailsApi(
        new GuzzleHttp\Client(),
        $config
    );
    
    // Prepare the email content with placeholders
    $htmlContent = '<html><body><h4>{{params.bodyMessage}}</h4><p>Your application status is '.$status.'!</p></body></html>';
    
      
    
    $sendSmtpEmail = new \Brevo\Client\Model\SendSmtpEmail([
        'subject' => 'Manpower | Application Status',
        'sender' => ['name' => 'Edrianco Manpower', 'email' => 'pfdelfin98@gmail.com'],
        'to' => [['name' => 'User', 'email' => $email]],
        'htmlContent' => $htmlContent
    ]);
    
    try {
        $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
        if ($result) {
            // Email sent successfully
            header("Location: applicant_status.php?1");

        }
    } catch (Exception $e) {
        echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
    }
    


}



if (isset($_POST['update_user'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql_check_email = "SELECT id FROM tbl_account WHERE email = :email AND id != :id";
    $stmt_check_email = $pdo->prepare($sql_check_email);
    $stmt_check_email->execute(['email' => $email, 'id' => $id]);
    $existing_user = $stmt_check_email->fetch();

    if ($existing_user) {
        header("Location: user.php?2");
        exit(); 
    }

    $sql = "UPDATE tbl_account SET name=?, email=?, password=? WHERE id=?";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([$name, $email, $password, $id]);

    header("Location: user.php?1");
    exit();
}


if (isset($_POST['delete_user'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM tbl_account WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    header("Location: user.php?3");
    exit();
}


if (isset($_POST['add_user'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql_check_email = "SELECT id FROM tbl_account WHERE email = :email";
    $stmt_check_email = $pdo->prepare($sql_check_email);
    $stmt_check_email->execute(['email' => $email]);
    $existing_user = $stmt_check_email->fetch();

    if ($existing_user) {
        header("Location: user.php?2");

    }
    $sql_insert_user = "INSERT INTO tbl_account (name, email, password) VALUES (?, ?, ?)";
    $stmt_insert_user = $pdo->prepare($sql_insert_user);
    $stmt_insert_user->execute([$name, $email, $password]);

    header("Location: user.php?0");
    exit();
}



if (isset($_POST['apply_job'])) {
    $status = 'New';
    $position = $_POST['position'];
    $email = $_POST['email'];
    $sql = "INSERT INTO tbl_applicant (job_id, firstname, middlename, lastname, gender, email, contact, address, resume, status) 
            VALUES (:job_id, :firstname, :middlename, :lastname, :gender, :email, :contact, :address, :resume, :status)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':job_id', $_POST['job_id']);
    $stmt->bindParam(':firstname', $_POST['firstname']);
    $stmt->bindParam(':middlename', $_POST['middlename']);
    $stmt->bindParam(':lastname', $_POST['lastname']);
    $stmt->bindParam(':gender', $_POST['gender']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':contact', $_POST['contact']);
    $stmt->bindParam(':address', $_POST['address']);
    $stmt->bindParam(':resume', $_POST['resume']);
    $stmt->bindParam(':status', $status);

    $resumePath = ''; 
    if (isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'resume/'; 
        $resumeName = basename($_FILES['resume']['name']);
        $resumePath = $uploadDir . $resumeName;
        move_uploaded_file($_FILES['resume']['tmp_name'], $resumePath);
    }
    $stmt->bindParam(':resume', $resumePath);
    try {
        $stmt->execute();


          
        require_once(__DIR__ . '/vendor/autoload.php');

        $config = Brevo\Client\Configuration::getDefaultConfiguration()
            ->setApiKey('api-key', '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')
            ->setApiKey('partner-key', 'fYZrVRIdQGSFvHxA');
        
        $apiInstance = new Brevo\Client\Api\TransactionalEmailsApi(
            new GuzzleHttp\Client(),
            $config
        );
        
        // Prepare the email content with placeholders
        $htmlContent = '<html><body><h4>{{params.bodyMessage}}</h4><p>Your application status is pending, please wait for admin approval!</p></body></html>';
        
          
        
        $sendSmtpEmail = new \Brevo\Client\Model\SendSmtpEmail([
            'subject' => 'Edrianco Manpower | Application Status',
            'sender' => ['name' => 'Edrianco Manpower', 'email' => 'pfdelfin98@gmail.com'],
            'to' => [['name' => 'User', 'email' => $email]],
            'htmlContent' => $htmlContent
        ]);
        
        try {
            $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
            if ($result) {
                // Email sent successfully
                header("location:../client/jobs.php?1");  

            }
        } catch (Exception $e) {
            echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
        }
        



    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

if(isset($_POST['apply'])){
    $job_id = $_POST['job_id'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
        if(isset($_SESSION['applicant_id'])){
            $applicant_id = $_SESSION['applicant_id'];
            $stmt = $pdo->prepare("UPDATE tbl_applicant SET job_id = ?. firstname=?, middlename=?, lastname=?, gender=?, email=?, contact=?, address=?, status='Pending' WHERE applicant_id=?");
            $stmt->execute([$job_id, $firstname, $middlename, $lastname, $gender, $email, $contact, $address, $applicant_id]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO tbl_applicant (job_id, firstname, middlename, lastname, gender, email, contact, address, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'Pending')");
            $stmt->execute([$job_id, $firstname, $middlename, $lastname, $gender, $email, $contact, $address]);
            $applicant_id = $pdo->lastInsertId();
            $_SESSION['applicant_id'] = $applicant_id;
        }

        header("Location: ../client/education.php?id=".$job_id."");

}


if(isset($_POST['apply_education'])){
    $high_school = isset($_POST['high_school']) ? $_POST['high_school'] : "";
    $high_school_year = isset($_POST['high_school_year']) ? $_POST['high_school_year'] : "";
    $college = isset($_POST['college']) ? $_POST['college'] : "";
    $college_year = isset($_POST['college_year']) ? $_POST['college_year'] : "";
    $postgraduate = isset($_POST['postgraduate']) ? $_POST['postgraduate'] : "";
    $postgraduate_year = isset($_POST['postgraduate_year']) ? $_POST['postgraduate_year'] : "";

        $applicant_id = $_SESSION['applicant_id'];
        $stmt = $pdo->prepare("UPDATE tbl_applicant SET high_school=?, high_school_year=?, college=?, college_year=?, postgraduate=?, postgraduate_year=? WHERE id=?");
        $stmt->execute([$high_school, $high_school_year, $college, $college_year, $postgraduate, $postgraduate_year, $applicant_id]);

        $job_id = isset($_POST['job_id']) ? $_POST['job_id'] : ""; // Assuming you are receiving job_id from the form
        header("Location: ../client/skills.php?id=$job_id");
        exit();

   
}


if(isset($_POST['apply_skill'])) {
    if(isset($_POST['skills']) && !empty($_POST['skills'])) {
        $job_id = $_POST['job_id'];
        $applicant_id = $_SESSION['applicant_id'];

        $skills = $_POST['skills'];
        
        $skills_array = explode(",", $skills);
        
        foreach($skills_array as $skill) {
            $pdo->prepare("INSERT INTO tbl_applicant_skill (job_id, skill) VALUES (?, ?)")->execute([$applicant_id, $skill]);
        }
        
        header("Location: ../client/cover_letter.php?id=$job_id");
        exit();
    }
}



if(isset($_POST['apply_cover'])) {
        $upload_dir = "../admin/resume/";

        $file_name = uniqid() . "_" . $_FILES['resume']['name'];

        if(move_uploaded_file($_FILES['resume']['tmp_name'], $upload_dir . $file_name)) {
            $applicant_id = $_SESSION['applicant_id'];
            $resume_path = "resume/" . $file_name;

            $stmt = $pdo->prepare("SELECT email FROM tbl_applicant WHERE id = ?");
            $stmt->bindParam(1, $applicant_id, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                $email = $row['email'];
            } else {
                $email = "";
            }



            $stmt = $pdo->prepare("UPDATE tbl_applicant SET resume = ? WHERE id = ?");
            $stmt->execute([$resume_path, $applicant_id]);
        

            
          
        require_once(__DIR__ . '/vendor/autoload.php');

        $config = Brevo\Client\Configuration::getDefaultConfiguration()
            ->setApiKey('api-key', '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')
            ->setApiKey('partner-key', 'fYZrVRIdQGSFvHxA');
        
        $apiInstance = new Brevo\Client\Api\TransactionalEmailsApi(
            new GuzzleHttp\Client(),
            $config
        );
        
        // Prepare the email content with placeholders
        $htmlContent = '<html><body><h4>{{params.bodyMessage}}</h4><p>Your application status is pending, please wait for admin approval!</p></body></html>';
        
          
        
        $sendSmtpEmail = new \Brevo\Client\Model\SendSmtpEmail([
            'subject' => 'Edrianco Manpower | Application Status',
            'sender' => ['name' => 'Edrianco Manpower', 'email' => 'pfdelfin98@gmail.com'],
            'to' => [['name' => 'User', 'email' => $email]],
            'htmlContent' => $htmlContent
        ]);
        
        try {
            $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
            if ($result) {
                // Email sent successfully
                header("location:../client/jobs.php?1");  
                unset($_SESSION['applicant_id']);
            }
        } catch (Exception $e) {
            echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
        }


        } 
  
}
?>