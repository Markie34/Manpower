<div class="modal fade" id="newApplicantModal" tabindex="-1" aria-labelledby="newApplicantModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newApplicantModalLabel">New Applicant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="function.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                        <div class="">
                        <label for="position" class="form-label">Position</label>
                        <select class="form-control" name="job_id" required>
                            <option value="" disabled selected>Select Position</option>
                        <?php
                         $stmt = $pdo->query("SELECT id, position FROM tbl_job");
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $row['id'] . '">' . $row['position'] . '</option>';
                        }
                        ?>
                    </select>                 
                   </div>
                        </div>
                        <div class="col">
 
                        <div class="">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" class="form-control"  placeholder="First Name" name="firstname" required>
                    </div>
                        </div>
                    </div>
                   

                    <div class="row mt-2">
                        <div class="col">
                        <div>
                        <label for="middlename" class="form-label">Middle Name</label>
                        <input type="text" class="form-control"  placeholder="Middle Name" name="middlename">
                    </div>
                        </div>
                        <div class="col">
                    
                    <div class="">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" placeholder="Last Name" name="lastname" required>
                    </div>
                        </div>
                    </div>
                   

                    <div class="row">
                        <div class="col">
                          
                    <div class="">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select"  name="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                        </div>
                        <div class="col">
                    
                        <div class="">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control"placeholder="Email Address" name="email" required>
                    </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col">
                          
                        <div>
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" class="form-control" placeholder="Contact Number" name="contact" required>
                    </div>
                        </div>
                        <div class="col">
                      
                        <div >
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" placeholder="Address" name="address" rows="3" required></textarea>
                    </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col">
                        <div class="">
                        <label for="resume" class="form-label">Resume</label>
                        <input type="file" class="form-control" id="resume" name="resume" required>
                    </div>
                        </div>
                        <div class="col"></div>
                    </div>
               
                 
                 
                </div>
                <div class="modal-footer">
                    <button type="submit" name="add_applicant" class="btn btn-primary">Add Applicant</button>
                </div>
                </form>
            </div>
        </div>
    </div>



    <div class="modal fade" id="editApplicantModal" tabindex="-1" aria-labelledby="newApplicantModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newApplicantModalLabel">Edit Applicant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="function.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="text" name="id" id="id" hidden>
                    <div class="row">
                        <div class="col">
                        <div class="">
                        <label for="position" class="form-label">Position</label>
                        <select class="form-control" id="job_id" name="job_id" required>
                            <option value="" disabled selected>Select Position</option>
                        <?php
                         $stmt = $pdo->query("SELECT id, position FROM tbl_job");
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $row['id'] . '">' . $row['position'] . '</option>';
                        }
                        ?>
                    </select>
                        
                    </div>
                        </div>
                        <div class="col">
 
                        <div class="">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" class="form-control"  id="firstname"  placeholder="First Name" name="firstname" required>
                    </div>
                        </div>
                    </div>
                   

                    <div class="row mt-2">
                        <div class="col">
                        <div>
                        <label for="middlename" class="form-label">Middle Name</label>
                        <input type="text" class="form-control"   id="middlename" placeholder="Middle Name" name="middlename">
                    </div>
                        </div>
                        <div class="col">
                    
                    <div class="">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" class="form-control"  id="lastname" placeholder="Last Name" name="lastname" required>
                    </div>
                        </div>
                    </div>
                   

                    <div class="row">
                        <div class="col">
                          
                    <div class="">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select"  id="gender"  name="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                        </div>
                        <div class="col">
                    
                        <div class="">
                        <label for="email" class="form-label">Email</label>
                        <input type="email"  id="email" class="form-control"placeholder="Email Address" name="email" required>
                    </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col">
                          
                        <div>
                        <label for="contact"  class="form-label">Contact</label>
                        <input type="text"  id="contact" class="form-control" placeholder="Contact Number" name="contact" required>
                    </div>
                        </div>
                        <div class="col">
                      
                        <div >
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control"  id="address" placeholder="Address" name="address" rows="3" required></textarea>
                    </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col">
                        <div class="">
                        <label for="resume" class="form-label">Resume</label>
                        <input type="file" class="form-control" id="resume" name="resume">
                    </div>
                        </div>
                        <div class="col"></div>
                    </div>
               
                 
                 
                </div>
                <div class="modal-footer">
                    <button type="submit" name="update_applicant" class="btn btn-primary">Update Applicant</button>
                </div>
                </form>
            </div>
        </div>
    </div>



    

    <div class="modal fade" id="deleteApplicantModal" tabindex="-1" aria-labelledby="newApplicantModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newApplicantModalLabel">Delete Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="function.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="text" name="id" id="id2" hidden>
                    <h6>Are you sure you want to delete this applicant ?</h6>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="delete_applicant" class="btn btn-primary">Proceed to delete</button>
                </div>
                </form>
            </div>
        </div>
    </div>




        

    <div class="modal fade" id="newJobModal" tabindex="-1" aria-labelledby="newApplicantModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newApplicantModalLabel">Job Posting</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="function.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                   
                <div class="row">
                        <div class="col">
                        <label for="contact"  class="form-label">Position Name</label>
                        <input type="text" class="form-control" placeholder="Position Name" name="position" required>
                    </div>
                </div>
       
                <div class="row mt-2">
                        <div class="col">
                        <label class="form-label">Availability</label>
                        <input type="number" class="form-control" placeholder="Availability" name="availability" required>
                    </div>
                        </div>

                        <div class="row mt-2" style="width:500px;">
                        <div class="col">
                        <label for="salary_from" class="form-label">Salary Range</label>
                        <input type="number" class="form-control" placeholder="Min Salary" name="salary_from" required>
                    </div>
                  
                    <div class="col">
                        <label for="salary_to" class="form-label">.</label>
                       <input type="number" class="form-control" placeholder="Max Salary" name="salary_to" required>
                    </div>

                    </div>
                   
                   <div class="row mt-2">
                        <div class="col">
                            <label for="job_type" class="form-label">Job Type</label>
                            <select name="job_type" class="form-control" required>
                                <option value="Full-time">Full-time</option>
                                <option value="Part-time">Part-time</option>
                            </select>
                        </div>
                    </div>
       
                    <div class="row mt-2">
                            <div class="col">
                            <label for="address" class="form-label">Description</label>
                            <textarea class="form-control" placeholder="Description" name="description" id="description" rows="4" required></textarea>
                        </div>
                    </div>

                 
                <div class="row mt-2">
                        <div class="col">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control" type="text" id="">
                            <option value="Active">Active</option>
                            <option value="Closed">Closed</option>
                        </select>
                    </div>
                        </div>
                   


                </div>
                <div class="modal-footer">
                    <button type="submit" name="add_job" class="btn btn-primary">Add Job</button>
                </div>
                </form>
            </div>
        </div>
    </div>




    
    <div class="modal fade" id="editJobModal" tabindex="-1" aria-labelledby="newApplicantModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newApplicantModalLabel">Job Posting</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="function.php" method="POST" enctype="multipart/form-data">
                    <input type="text" id="id3" name="id" hidden>
                <div class="modal-body">
                   
                <div class="row">
                        <div class="col">
                        <label for="contact"  class="form-label">Position Name</label>
                        <input type="text" id="position1" class="form-control" placeholder="Position Name" name="position" required>
                    </div>
                </div>
       
                <div class="row mt-2">
                        <div class="col">
                        <label class="form-label">Availability</label>
                        <input type="number" id="availability" class="form-control" placeholder="Availability" name="availability" required>
                    </div>
                        </div>

                        <div class="row mt-2" style="width:500px;">
                        <div class="col">
                        <label for="salary_from" class="form-label">Salary Range</label>
                        <input type="number" id="salaryFrom" class="form-control"
                         placeholder="Min Salary" name="salary_from" required>
                    </div>
                  
                    <div class="col">
                        <label for="salary_to" class="form-label">.</label>
                       <input type="number" id="salaryTo" class="form-control" placeholder="Max Salary" name="salary_to" required>
                    </div>

                    </div>

                    <div class="row mt-2">
                        <div class="col">
                            <label for="job_type" class="form-label">Job Type</label>
                            <select name="job_type" id="job_type" class="form-control" required>
                                <option value="Full-time">Full-time</option>
                                <option value="Part-time">Part-time</option>
                            </select>
                        </div>
                    </div>
                   

                               
                    <div class="row mt-2">
                            <div class="col">
                            <label for="address" class="form-label">Description</label>
                            <textarea class="form-control" id="description1" placeholder="Description" name="description" id="description" rows="4" required></textarea>
                        </div>
                    </div>

                 
                <div class="row mt-2">
                        <div class="col">
                        <label class="form-label">Status</label>
                        <select name="status" id="status1" class="form-control" type="text" id="">
                            <option value="Active">Active</option>
                            <option value="Closed">Closed</option>
                        </select>
                    </div>
                        </div>
                   


                </div>
                <div class="modal-footer">
                    <button type="submit" name="update_job" class="btn btn-primary">Update Job</button>
                </div>
                </form>
            </div>
        </div>
    </div>




        

    <div class="modal fade" id="deleteJobModal" tabindex="-1" aria-labelledby="newApplicantModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newApplicantModalLabel">Delete Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="function.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="text" name="id" id="id4" hidden>
                    <h6>Are you sure you want to delete this job ?</h6>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="delete_job" class="btn btn-primary">Proceed to delete</button>
                </div>
                </form>
            </div>
        </div>
    </div>



    <div class="modal fade" id="editAboutModal" tabindex="-1" aria-labelledby="newApplicantModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newApplicantModalLabel">About Us</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="function.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="text" name="id" id="id5" hidden>
                    <div class="row">
                        <div class="col">
                            <label for="">About Us</label>
                            <textarea class="form-control" id="about" placeholder="About Us" name="about" id="about" rows="4" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="update_about" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>



    
    <div class="modal fade" id="editApplicantStatusModal" tabindex="-1" aria-labelledby="newApplicantModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newApplicantModalLabel">Application Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="function.php" method="POST" enctype="multipart/form-data">
                    <input type="text" id="id6" name="id" hidden>
                <div class="modal-body">
                   
    
                        
                <div class="row mt-2">
                        <div class="col">
                        <label class="form-label">Application Status</label>
                        <select name="status" id="status1" class="form-control" type="text" id=""> 
                        <option value="Hired">Hired</option>
                        <option value="Failed">Failed</option>
                        <option value="Pending">Pending</option>
                        <option value="Interview Scheduled">Interview Scheduled</option>
                        </select>
                    </div>
                        </div>
                

                </div>
                <div class="modal-footer">
                    <button type="submit" name="update_application" class="btn btn-primary">Update Status</button>
                </div>
                </form>
            </div>
        </div>
    </div>





    
        
    <div class="modal fade" id="newUserModal" tabindex="-1" aria-labelledby="newApplicantModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newApplicantModalLabel">User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="function.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                   
    
                    <div class="row">
                        <div class="col">

                        <label for="contact"  class="form-label">Full Name</label>
                        <input type="text" class="form-control" placeholder="Full Name" name="name" required>
                    </div>
                     </div>

                     <div class="row mt-2">
                        <div class="col">

                        <label for="contact"  class="form-label">Email Address</label>
                        <input type="email"   class="form-control" placeholder="Email Address" name="email" required>
                    </div>
                     </div>
        
                     
                     <div class="row mt-2">
                        <div class="col">

                        <label for="contact"  class="form-label">Password</label>
                        <input type="password"  class="form-control" placeholder="Password" name="password" required>
                    </div>
                     </div>
            
                </div>
                <div class="modal-footer">
                    <button type="submit" name="add_user" class="btn btn-primary">Add User</button>
                </div>
                </form>
            </div>
        </div>
    </div>







    
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="newApplicantModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newApplicantModalLabel">User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="function.php" method="POST" enctype="multipart/form-data">
                    <input type="text" id="id7" name="id" hidden>
                <div class="modal-body">
                   
    
                    <div class="row">
                        <div class="col">

                        <label for="contact"  class="form-label">Full Name</label>
                        <input type="text"  id="name" class="form-control" placeholder="Full Name" name="name" required>
                    </div>
                     </div>

                     <div class="row mt-2">
                        <div class="col">

                        <label for="contact"  class="form-label">Email Address</label>
                        <input type="email"  id="email2" class="form-control" placeholder="Email Address" name="email" required>
                    </div>
                     </div>
        
                     
                     <div class="row mt-2">
                        <div class="col">

                        <label for="contact"  class="form-label">Password</label>
                        <input type="password"  id="password" class="form-control" placeholder="Password" name="password" required>
                    </div>
                     </div>
            
                </div>
                <div class="modal-footer">
                    <button type="submit" name="update_user" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>





    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="newApplicantModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newApplicantModalLabel">Delete Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="function.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="text" name="id" id="id8" hidden>
                    <h6>Are you sure you want to delete this user ?</h6>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="delete_user" class="btn btn-primary">Proceed to delete</button>
                </div>
                </form>
            </div>
        </div>
    </div>




    <div class="modal fade" id="applyJobModal" tabindex="-1" aria-labelledby="newApplicantModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
            <form action="../admin/function.php" method="POST" enctype="multipart/form-data">

                <div class="modal-header">
                    <h5 class="modal-title" id="newApplicantModalLabel">Position: <input type="text" style="font-weight:bold !important; color:black;" name="position" class="font-weight-bold border-0 bg-transparent" id="position3"  disabled> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="text" id="id9" name="job_id" hidden>

                <div class="modal-body">
                    <div class="row">
                  
                        <div class="col">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" class="form-control"  placeholder="First Name" name="firstname" required>
                        </div>

                        <div class="col">
                      
                        <label for="middlename" class="form-label">Middle Name</label>
                        <input type="text" class="form-control"  placeholder="Middle Name" name="middlename">
                    </div>


                    </div>
                   

                    <div class="row mt-2">
                    
                        <div class="col">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" placeholder="Last Name" name="lastname" required>
                        </div>

                        <div class="col">
                          
                          <label for="gender" class="form-label">Gender</label>
                          <select class="form-select"  name="gender" required>
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                              <option value="other">Other</option>
                          </select>
                          </div>
                    </div>
                   


                    <div class="row mt-2">
              
                        <div class="col">
                    
                      
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control"placeholder="Email Address" name="email" required>
                 
                        </div>

                        <div class="col">
   
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" class="form-control" placeholder="Contact Number" name="contact" required>
                    </div>
                    </div>



                    <div class="row">
    
                        <div class="col">
                      
             
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" placeholder="Address" name="address" rows="3" required></textarea>
                    </div>

                    <div class="col">
                        <div class="">
                        <label for="resume" class="form-label">Resume</label>
                        <input type="file" class="form-control"  name="resume" required>
                    </div>
                    </div>

                </div>
                <div class="modal-footer ml-auto" >
                    <button type="submit" style="width:200px;" name="apply_job" class="btn btn-primary">Apply this job</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    

