<?php include "header.php"; ?>

    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="text-center pb-5">All Student Information</h1>

            <!-- ########## START: TABLE ########## -->
            <table id="example" class="table table-striped table-hover table-bordered">
              <thead class="table-dark">
                <tr>
                  <th scope="col">#Sl.</th>
                  <th scope="col">Full Name</th>
                  <th scope="col">Fathers Name</th>
                  <th scope="col">Mothers Name</th>
                  <th scope="col">Email Address</th>
                  <th scope="col">Phone No.</th>
                  <th scope="col">Address</th>
                  <th scope="col">Join Date</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>

              <tbody>
                <?php  
                  $read = "SELECT * FROM students ORDER BY name ASC";
                  $readQuery = mysqli_query( $db, $read );
                  $i = 0;

                  while ( $row = mysqli_fetch_assoc($readQuery) ) {
                    $id           = $row['id'];
                    $name         = $row['name'];
                    $father       = $row['father'];
                    $mother       = $row['mother'];
                    $email        = $row['email'];
                    $phone        = $row['phone'];
                    $address      = $row['address'];
                    $join_date    = $row['join_date'];
                    $i++;
                    ?>
                    <tr>
                      <th scope="row"><?php echo $i; ?></th>
                      <td><?php echo $name; ?></td>
                      <td><?php echo $father; ?></td>
                      <td><?php echo $mother; ?></td>
                      <td><?php echo $email; ?></td>
                      <td><?php echo $phone; ?></td>
                      <td><?php echo $address; ?></td>
                      <td><?php echo $join_date; ?></td>
                      <td>
                        <div class="action-btn">
                          <ul>
                            <li>
                              <a href="update.php?uid=<?php echo $id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
                            </li>
                            <li>
                              <a href="" data-bs-toggle="modal" data-bs-target="#del<?php echo $id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
                            </li>
                          </ul>
                        </div>

                        <!-- ########## START: MODAL PART ########## -->
                        <div class="modal fade" id="del<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Are You Sure?? To Delete <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $name; ?></span>!!</h1>

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>

                              <div class="modal-body">
                                <div class="modal-btn">
                                  <a href="index.php?did=<?php echo $id; ?>" class="btn btn-danger me-3">Delete</a>
                                  <a href="" class="btn btn-success" data-bs-dismiss="modal">Cancel</a>     
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                        <!-- ########## END: MODAL PART ########## -->
                      </td>
                    </tr>
                  <?php }
                ?>
                
              </tbody>
            </table>
            <!-- ########## END: TABLE ########## -->

            <div class="d-grid gap-2">
              <a href="create.php" class="btn btn-primary text-white">Add New Students</a>
            </div>

          </div>
        </div>
      </div>
    </section>

    <?php  

      if (isset($_GET['did'])) {
        $deleteId = $_GET['did'];
        $delQuery = "DELETE FROM students WHERE id = '$deleteId'";
        $delete = mysqli_query( $db, $delQuery );

        if ($delete) {
          header("Location: index.php");
        }
        else {
          die("Mysqli Error!" . mysqli_error($db));
        }
      }

    ?>

<?php include "footer.php"; ?>