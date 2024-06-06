<?php 
session_start();
$conn = new mysqli('localhost', 'root', '', 'prenatal_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$doctorError = $nurseError = "";
$doctorUname = $nurseUname = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['loginDoctor'])) {
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    if (empty($uname)) {
        $doctorError = 'Username/Email is required';
    } elseif (!filter_var($uname, FILTER_VALIDATE_EMAIL) && !preg_match('/^[a-zA-Z0-9]+$/', $uname)) {
        $doctorError = "Invalid username/email format";
    } elseif (empty($pass)) {
        $doctorError = "Password is required";
    } elseif (strlen($pass) < 6) {
        $doctorError = "Password must be at least 6 characters long";
    } else {
        $stmt = $conn->prepare("SELECT * FROM doctortable WHERE Emails = ?");
        $stmt->bind_param("s", $uname);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $userFound = false;
            while ($row = $result->fetch_assoc()) {
                if (password_verify($pass, $row['Password'])) {
                    $userFound = true;
                    $_SESSION['userType'] = 'doctor';
                    $_SESSION['userName'] = $row['FullNames'];
                    $_SESSION['hospitals'] = $row['Hospital'];

                    header("Location: doctor-dashboard/index.php");
                    exit();
                }
            }
            if (!$userFound) {
                $doctorError = "Incorrect pass.";
            }
        } else {
            $stmt = $conn->prepare("SELECT * FROM nurse WHERE email = ?");
            $stmt->bind_param("s", $uname);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $userFound = false;
                while ($row = $result->fetch_assoc()) {
                    if (password_verify($pass, $row['password'])) {
                        $userFound = true;
                        $_SESSION['user-type'] = 'nurse';
                        $_SESSION['user_name'] = $row['name'];
                        $_SESSION['hospital'] =  $row['Hospital'];
                        $_SESSION['health']= $row['HealtCare'];

                        header("Location: nurse-dashboard/index.php");
                        exit();
                    }
                }
                if (!$userFound) {
                    $nurseError = "Incorrect password.";
                }
            } else {
                $doctorError = "User not found.";
            }
        }

        $stmt->close();
    }
}

$conn->close();
?>
