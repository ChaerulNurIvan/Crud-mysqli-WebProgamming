<?php
include 'header.php';
/*Fungsi Insert ke db*/
$table = 'data';
$Nama = isset($_POST['Nama']) ? mysqli_real_escape_string($connect, $_POST['Nama']) : '';
$Username = isset($_POST['Username']) ? mysqli_real_escape_string($connect, $_POST['Username']) : '';
$Email = isset($_POST['Email']) ? mysqli_real_escape_string($connect, $_POST['Email']) : '';
$Password = isset($_POST['Password']) ? mysqli_real_escape_string($connect, $_POST['Password']) : '';
if (isset($_POST['save'])) {
    $query = "INSERT INTO $table (Id_Nama, Nama, Username, Email, Password) VALUES (null,'$Nama', '$Username', '$Email', '$Password')";
    $result = mysqli_query($connect, $query);
    
    echo '<meta http-equiv="refresh" content="1;url=index.php">';
}
/*Buat form insert*/
isset($result) ? $message = '<p class="message">Save success</p>' : $message = '';
?>
<section>
    <div class="has-form">
        <h2>Insert Data</h2>
        <?php echo $message; ?>
        <form method="post" action="insert.php">
            <label>Nama
                <input type="text" name="Nama" placeholder="Nama" required>
            </label>
            <br>
            <label>Username
                <input type="text" name="Username" placeholder="Username" required>
            </label>
            <br>
            <label>Email
                <input type="text" name="Email" placeholder="Email" required>
            </label>
            <br>
            <label>Password
                <input type="text" name="Password" placeholder="Password" required>
            </label>
            <br>
            <input type="submit" name="save" value="Save" class="link">
        </form>
    </div>
</section>
