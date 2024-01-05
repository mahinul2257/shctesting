<?php
session_start();
include('include/config.php');
include('include/checklogin.php');
check_login();

if (isset($_POST['submit'])) {
    $docspecialization = $_POST['Doctorspecialization'];
    $docname = $_POST['docname'];
    $docaddress = $_POST['clinicaddress'];
    $docfees = $_POST['docfees'];
    $doccontactno = $_POST['doccontact'];
    $docemail = $_POST['docemail'];
    $password = password_hash($_POST['npass'], PASSWORD_DEFAULT);

    $stmt = $con->prepare("INSERT INTO doctors (specilization, doctorName, address, docFees, contactno, docEmail, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $docspecialization, $docname, $docaddress, $docfees, $doccontactno, $docemail, $password);
    $result = $stmt->execute();

    if ($result) {
        echo "<script>alert('Doctor info added Successfully');</script>";
        echo "<script type='text/javascript'> document.location = 'Manage-doctors.php'; </script>";
        exit();
    } else {
        echo "<script>alert('Error occurred. Please try again');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin | Add Doctor</title>
    <!-- Rest of the code -->
</head>
<body>
    <div id="app">
        <!-- Rest of the code -->
        <div class="app-content">
            <!-- Rest of the code -->
            <div class="main-content">
                <!-- Rest of the code -->
                <div class="wrap-content container" id="container">
                    <!-- Rest of the code -->
                    <div class="container-fluid container-fullw bg-white">
                        <!-- Rest of the code -->
                        <div class="row margin-top-30">
                            <div class="col-lg-8 col-md-12">
                                <div class="panel panel-white">
                                    <!-- Rest of the code -->
                                    <div class="panel-body">
                                        <form role="form" name="adddoc" method="post" onsubmit="return valid();">
                                            <!-- Rest of the code -->
                                            <button type="submit" name="submit" class="btn btn-o btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Rest of the code -->
                    </div>
                </div>
            </div>
            <!-- Rest of the code -->
        </div>
        <!-- Rest of the code -->
    </div>
    <!-- Rest of the code -->
    <script>
        function valid() {
            // Add your validation logic here if needed
            return true; // Return true to submit the form
        }
    </script>
</body>
</html>
