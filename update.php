<?php include "header.php"; ?>

    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-3">
            

            <?php  
                if (isset($_GET['uid'])) {
                  $updateId = $_GET['uid'];
                  $studentData = "SELECT * FROM students WHERE id = '$updateId'";
                  $readQuery = mysqli_query( $db, $studentData );

                  while ( $row = mysqli_fetch_array($readQuery) ) {
                    $id           = $row['id'];
                    $name         = $row['name'];
                    $father       = $row['father'];
                    $mother       = $row['mother'];
                    $email        = $row['email'];
                    $phone        = $row['phone'];
                    $address      = $row['address'];
                    $join_date    = $row['join_date'];
                    ?>

                    <h1 class="text-center pb-5"> Update <span style="color: green;"><?php echo $name; ?></span> Info <i class="fa-solid fa-pencil"></i></h1>

                      <!-- ########## START: FORM START ########## -->
                      <form action="" method="POST" class="needs-validation" novalidate>

                        <!-- Hidden Id -->
                        <input type="hidden" name="updateUserId" value="<?php echo $id; ?>">

                        <div class="mb-3">
                          <label for="name">Full Name</label>
                          <input type="text" name="name" id="name" class="form-control" required autocomplete="off" value="<?php echo $name; ?>">
                          <div class="invalid-feedback">
                            Please enter full name.
                          </div>
                        </div>

                        <div class="mb-3">
                          <label for="fname">Fathers Name</label>
                          <input type="text" name="father" id="fname" class="form-control" required autocomplete="off" value="<?php echo $father; ?>">
                          <div class="invalid-feedback">
                            Please enter fathers name.
                          </div>
                        </div>

                        <div class="mb-3">
                          <label for="mname">Mothers Name</label>
                          <input type="text" name="mother" id="mname" class="form-control" required autocomplete="off" value="<?php echo $mother; ?>">
                          <div class="invalid-feedback">
                            Please enter mothers name.
                          </div>
                        </div>

                        <div class="mb-3">
                          <label for="email">Email Address</label>
                          <input type="email" name="email" id="email" class="form-control" required autocomplete="off" value="<?php echo $email; ?>">
                          <div class="invalid-feedback">
                            Please enter email address.
                          </div>
                        </div>

                        <div class="mb-3">
                          <label for="phone">Phone No.</label>
                          <input type="tel" name="phone" id="phone" class="form-control" required autocomplete="off" value="<?php echo $phone; ?>">
                          <div class="invalid-feedback">
                            Please enter phone no.
                          </div>
                        </div>

                        <div class="mb-3">
                          <label for="address">Present Address</label>
                          <textarea name="address" id="address" class="form-control" required autocomplete="off" cols="30" rows="3"><?php echo $address; ?></textarea>
                          <div class="invalid-feedback">
                            Please enter your address.
                          </div>
                        </div>

                        <div class="mb-3">
                          <div class="d-grid gap-2">
                            <input type="submit" name="update" class="btn btn-success" value="Update Student">
                          </div>
                        </div>

                        <div class="mb-3 pt-2">
                          <a href="index.php">Go Manage Page</a>
                        </div>
                      </form>
                      <!-- ########## END: FORM START ########## -->

                  <?php }
                }
            ?>
          

            <?php  
              
              if (isset($_POST['update'])) {
                $name         =  mysqli_real_escape_string($db, $_POST['name']);
                $father       =  mysqli_real_escape_string($db, $_POST['father']);
                $mother       =  mysqli_real_escape_string($db, $_POST['mother']);
                $email        =  mysqli_real_escape_string($db, $_POST['email']);
                $phone        =  mysqli_real_escape_string($db, $_POST['phone']);
                $address      =  mysqli_real_escape_string($db, $_POST['address']);

                $update = "UPDATE students SET name='$name', father='$father', mother='$mother', email='$email', phone='$phone', address='$address', join_date='$join_date' WHERE id = '$updateId' ";
                $updateQuery = mysqli_query( $db, $update );

                if ($updateQuery) {
                  header("Location: index.php");
                }
                else {
                  die("Mysqli Error!" . mysqli_error($db));
                }
              }

            ?>
          </div>
        </div>
      </div>
    </section>

<?php include "footer.php"; ?>