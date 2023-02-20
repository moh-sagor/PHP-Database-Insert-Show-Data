<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>PHP Database Connect</title>

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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $array = $clsObj->show();
                        while ($alldata = $array->fetch_assoc()) {
                            echo "<tr>
                                <td>" . $alldata["id"] . "</td>
                                <td>" . $alldata["name"] . "</td>
                                <td>" . $alldata["email"] . "</td>
                                <td>" . $alldata["phone"] . "</td>
                                <td>" . $alldata["status"] . "</td>
                                </tr>";

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