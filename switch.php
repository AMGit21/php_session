<?php
if (isset($_POST['submit'])) {
    $user = $_POST['username'];
    $pass = $_POST['pwd'];
    if (!empty($user) && !empty($pass)) {

        require_once('connect_db.php');

        // $sql = "SELECT roles 
        //         FROM login_table 
        //         WHERE username = '$user' AND pass = '$pass'";
        // $result = $conn->query($sql);

        $stmt = $conn->prepare("SELECT roles 
                 FROM login_table 
                 WHERE username = ? AND pass = ?");
        $stmt->bind_param("ss", $user_name, $psw);
        
        // set parameters and execute
        $user_name = $_POST['username'];
        $psw = $_POST['pwd'];
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) 
        {
            $row = $result->fetch_assoc();
            session_start();
            $_SESSION["user_name"] = trim($user);
            $_SESSION["role"] = (string)$row['roles'];

            if ($row['roles'])
                header("Location: admin/admin.php");
            else
                header("Location: user/user.php");
        } else
            echo "the user name doesn't exist";


        // if ($result->num_rows > 0) 
        // {
        //     $row = $result->fetch_assoc();
        //     session_start();
        //     $_SESSION["user_name"] = trim($user);
        //     $_SESSION["role"] = $row['roles'];

        //     if ($row['roles'] == 1)
        //         header("Location: admin/admin.php");
        //     else
        //         header("Location: user/user.php");
        // } else
        //     echo "the user name doesn't exist";

        $conn->close();
    } else
        echo "please enter the data";
}
