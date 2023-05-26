<?php include "header.php"; ?>

    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-3">
            <h1 class="text-center pb-5">Register new Student Info</h1>

            <!-- ########## START: FORM START ########## -->
            <form action="" method="POST" class="needs-validation" novalidate>
              <div class="mb-3">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name" class="form-control" required autocomplete="off" >
                <div class="invalid-feedback">
                  Please enter full name.
                </div>
              </div>

              <div class="mb-3">
                <label for="fname">Fathers Name</label>
                <input type="text" name="father" id="fname" class="form-control" required autocomplete="off" >
                <div class="invalid-feedback">
                  Please enter fathers name.
                </div>
              </div>

              <div class="mb-3">
                <label for="mname">Mothers Name</label>
                <input type="text" name="mother" id="mname" class="form-control" required autocomplete="off" >
                <div class="invalid-feedback">
                  Please enter mothers name.
                </div>
              </div>

              <div class="mb-3">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" required autocomplete="off" >
                <div class="invalid-feedback">
                  Please enter email address.
                </div>
              </div>

              <div class="mb-3">
                <label for="phone">Phone No.</label>
                <input type="tel" name="phone" id="phone" class="form-control" required autocomplete="off" >
                <div class="invalid-feedback">
                  Please enter phone no.
                </div>
              </div>

              <div class="mb-3">
                <label for="address">Present Address</label>
                <textarea name="address" id="address" class="form-control" required autocomplete="off" cols="30" rows="3"></textarea>
                <div class="invalid-feedback">
                  Please enter your address.
                </div>
              </div>

              <div class="mb-3">
                <div class="d-grid gap-2">
                  <input type="submit" name="add" class="btn btn-success" value="Register New Student">
                </div>
              </div>

              <div class="mb-3 pt-2">
                <a href="index.php">Go Manage Page</a>
              </div>
            </form>
            <!-- ########## END: FORM START ########## -->

            <?php  
              
              if (isset($_POST['add'])) {
                $name         =  mysqli_real_escape_string($db, $_POST['name']);
                $father       =  mysqli_real_escape_string($db, $_POST['father']);
                $mother       =  mysqli_real_escape_string($db, $_POST['mother']);
                $email        =  mysqli_real_escape_string($db, $_POST['email']);
                $phone        =  mysqli_real_escape_string($db, $_POST['phone']);
                $address      =  mysqli_real_escape_string($db, $_POST['address']);

                $create = "INSERT INTO students ( name, father, mother, email, phone, address, join_date ) VALUES ( '$name', '$father', '$mother', '$email', '$phone', '$address', now() )";
                $addQuery = mysqli_query( $db, $create );

                if ($addQuery) {
                  header("Location: index.php");
                }
                else {
                  die("Mysqli Error!" . nysqli_error($db));
                }
              }

            ?>
          </div>
        </div>
      </div>
    </section>

<?php include "footer.php"; ?>