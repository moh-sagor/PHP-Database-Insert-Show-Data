<?php
class Student
{
    private $con = "";
    function __construct()
    {
        $this->con = new mysqli('localhost', 'root', '', 'student_information');
    }
    public function insert($allData)
    {
        $name = $allData['name'];
        $email = $allData['email'];
        $phone = $allData['phone'];
        $status = $allData['status'];
        if ($name == "") {
            echo '<div class="alert alert-danger">Name is Required</div>';
        } else if ($email == "") {
            echo '<div class="alert alert-danger">Email is Required</div>';
        } else if ($phone == "") {
            echo '<div class="alert alert-danger">Phone is Required</div>';
        } else if ($status == "") {
            echo '<div class="alert alert-danger">Status is Required</div>';
        } else {
            $com = "INSERT INTO tbl_student(name,email,phone,status)VALUES('$name','$email','$phone','$status')";

            if ($this->con->query($com)) {
                echo '<div class="alert alert-success">Data Successfully Submitted</div>';
            } else {
                echo '<div class="alert alert-danger">Data Not Successfully Submitted</div>';
            }
        }
    }


    function show()
    {
        return $this->con->query("SELECT * FROM tbl_student");

    }
    function active($active)
    {
        $this->con->query("UPDATE tbl_student SET status='2' WHERE id='$active'");
        header("location: index.php");

    }
    function inactive($inactive)
    {
        $this->con->query("UPDATE tbl_student SET status='1' WHERE id='$inactive'");
        header("location: index.php");
    }

    function findforUpdate($id)
    {
        return $obj = $this->con->query("SELECT * FROM tbl_student WHERE id='$id'");
    }
    function update($allData, $id)
    {
        $name = $allData['name'];
        $email = $allData['email'];
        $phone = $allData['phone'];
        $status = $allData['status'];
        if ($name == "") {
            echo '<div class="alert alert-danger">Name is Required</div>';
        } else if ($email == "") {
            echo '<div class="alert alert-danger">Email is Required</div>';
        } else if ($phone == "") {
            echo '<div class="alert alert-danger">Phone is Required</div>';
        } else if ($status == "") {
            echo '<div class="alert alert-danger">Status is Required</div>';
        } else {
            $com = "UPDATE tbl_student SET name='$name',email='$email',phone='$phone',status='$status' WHERE id=$id";

            if ($this->con->query($com)) {
                header("location:index.php");
            } else {
                echo '<div class="alert alert-danger">Data Not Successfully Submitted</div>';
            }
        }
    }

    function delete($id)
    {
        $this->con->query("DELETE FROM tbl_student WHERE id ='$id'");
        header("location:index.php");
    }


}


?>