<?php
class Student
{
    private $con = "";
    public function insert($allData)
    {
        $name = $allData['name'];
        $email = $allData['email'];
        $phone = $allData['phone'];
        $status = $allData['status'];
        $this->con = new mysqli('localhost', 'root', '', 'student_information');
        if ($name == "") {
            echo '<div class="alert alert-danger">Name is Required</div>';
        }
        if ($email == "") {
            echo '<div class="alert alert-danger">Email is Required</div>';
        }
        if ($phone == "") {
            echo '<div class="alert alert-danger">Phone is Required</div>';
        }
        if ($status == "") {
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
        $this->con = new mysqli('localhost', 'root', '', 'student_information');
        return $this->con->query("SELECT * FROM tbl_student");

    }
}


?>