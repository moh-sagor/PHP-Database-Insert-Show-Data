<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>UPDATE Information</title>

</head>

<body>
    <?php

    include "classes.php";
    $obj = new Student;
    $id = $_GET['editId'];
    $objData = $obj->findforUpdate($id);
    $alldata = $objData->fetch_assoc();


    if (isset($_POST['btn'])) {
        $obj->update($_POST, $id);
        ;
    }

    ?>




    <div class="container">
        <div class="row mt-5 ">
            <div class="col-12 col-md-6 offset-md-3 border border-info rounded-2 p-3 mb-3 me-3">



                <form method="POST">
                    <h3>Update Student Information</h3>
                    <div class="form-group my-3">
                        <label for="name">Student Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="<?php echo $alldata['name']; ?>">
                    </div>
                    <div class="form-group my-3">
                        <label for="email">Email Address</label>
                        <input type="text" name="email" id="email" class="form-control"
                            value="<?php echo $alldata['email']; ?>">
                    </div>
                    <div class="form-group my-3">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" id="phone" class="form-control"
                            value="<?php echo $alldata['phone']; ?>">
                    </div>
                    <div class="form-group my-3">
                        <label for="status">Student Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="<?php echo $alldata['status']; ?>">
                                <?php
                                if ($alldata['status'] == 1) {
                                    echo "Active";
                                } else {
                                    echo "Inactive";
                                }
                                ?>

                            </option>
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
                    </div>

                    <button name="btn" class="btn btn-info form-control">Update Information</button>


                </form>
            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>