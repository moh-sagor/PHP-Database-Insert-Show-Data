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
    <title>PHP CRUD Operation</title>

</head>

<body>





    <div class="container">
        <div class="row mt-5 ">
            <div class="col-12 col-md-4 border border-info rounded-2 p-3 mb-3 me-3">

                <?php
                include "classes.php";
                $clsObj = new Student;

                if (isset($_POST['btn'])) {

                    $clsObj->insert($_POST);
                }

                ?>


                <form method="POST">
                    <div class="form-group my-3">
                        <label for="name">Student Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group my-3">
                        <label for="email">Email Address</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group my-3">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" id="phone" class="form-control">
                    </div>
                    <div class="form-group my-3">
                        <label for="status">Student Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">-------Select Status-------</option>
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
                    </div>

                    <button name="btn" class="btn btn-info form-control">Submit Information</button>


                </form>
            </div>
            <div class="col-12 col-md-7 border border-info rounded-2 p-3 mb-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> Sl No </th>
                            <th> Student Name </th>
                            <th> Email Address </th>
                            <th> Phone </th>
                            <th> Status </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $obj = $clsObj->show();

                        if (isset($_GET['active'])) {
                            $active = $_GET['active'];
                            $clsObj->active($active);

                        }
                        if (isset($_GET['inactive'])) {
                            $inactive = $_GET['inactive'];
                            $clsObj->inactive($inactive);

                        }
                        if (isset($_GET['deleteId'])) {
                            $deleteId = $_GET['deleteId'];
                            $clsObj->delete($deleteId);

                        }



                        if ($obj->num_rows > 0) {
                            $sl = 1;
                            while ($alldata = $obj->fetch_assoc()) {
                                if ($alldata["status"] == 1) {
                                    $status = '<a href="index.php?active=' . $alldata["id"] . '" class="btn btn-info btn-sm">Active</a>';
                                } else {
                                    $status = '<a href="index.php?inactive=' . $alldata["id"] . '" class="btn btn-warning btn-sm">Inactive</a>';
                                }

                                echo '<tr>
                                    <td>' . $sl . '</td>
                                    <td>' . $alldata["name"] . '</td>
                                    <td>' . $alldata["email"] . '</td>
                                    <td>' . $alldata["phone"] . '</td>
                                    <td>' . $status . '</td>
                                    <td>
                                    <a href="edit.php?editId=' . $alldata["id"] . '" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                 
                            <button href="index.php?deleteId=' . $alldata["id"] . '" class="btn btn-danger  btn-sm " data-bs-toggle="modal" data-bs-target="#delete' . $alldata["id"] . '"><i class="fa fa-trash"></i></button>
                            </td>
                                    </tr>'

                                ;
                                $sl++;
                                ?>
                                <div class="modal fade " id="delete<?php echo $alldata["id"]; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog ">
                                        <div class="modal-content ">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title offset-4" id="exampleModalLabel">DANGER ZONE</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are You Sure to Delete Data?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">NO</button>
                                                <a href="index.php?deleteId=<?php echo $alldata["id"]; ?>" type="button"
                                                    class="btn btn-primary">YES</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center text-danger '</td> <strong>Data Not Found</strong></td></tr>";
                        }

                        ?>


                    </tbody>

                </table>

            </div>

        </div>





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
</body>

</html>