<?php
session_start();
$message = ""; // Initialize message to avoid undefined variable warnings

if (isset($_POST['submit'])) {
    $name = $_POST['admin'];
    $password = $_POST['password'];

    if ($name == 'Likhit' && $password == '123') {
        $_SESSION['admin'] = $name; // Store admin name in session
        header("Location: index.php");
        exit();
    } else {
        $message = "Invalid login credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        h1 {
            text-align: center;
        }
        form {
            display: inline-block;
            width: 30%;
            border: 5px solid black;
            padding: 5% 7%;
            text-align: center;
            margin-left: 27%;
        }
        form h3 {
            margin: 1px 0px 5px;
            text-align: left;
        }
        input {
            height: 40px;
            width: 100%;
            padding-left: 10px;
            margin: 1px 0px 20px;
            border: 2px solid black;
            border-radius: 10px;
        }
        button {
            font-size: 15px;
            margin-top: 5%;
            padding: 10px;
            border: 2px solid rgb(194, 194, 15);
            border-radius: 5px;
            background-color: rgb(223, 223, 10);
            cursor: pointer;
        }
        button:hover {
            background-color: rgb(207, 207, 37);
        }
        /* Toast Notification */
        .toast {
            display: none;
            position: fixed;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            background-color: red;
            color: white;
            padding: 15px;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
            width: 250px;
            z-index: 1000;
        }
    </style>
</head>
<body>

<h1>ADMIN LOGIN</h1>

<!-- Show Toast Notification if there's an error -->
<?php if (!empty($message)): ?>
    <div id="toast" class="toast"><?php echo $message; ?></div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let toast = document.getElementById('toast');
            toast.style.display = 'block';
            setTimeout(() => {
                toast.style.display = 'none';
            }, 3000); // Hide after 3 seconds
        });
    </script>
<?php endif; ?>

<form method="post">
    <h3>Admin Name</h3>
    <input type="text" id="admin" name="admin" placeholder="Enter admin name" required>
    <h3>Admin Password</h3>
    <input type="password" id="password" name="password" placeholder="Enter admin password" required>
    <div>
        <button type="submit" name="submit" id="submit">Submit</button>
    </div>
</form>

</body>
</html>
