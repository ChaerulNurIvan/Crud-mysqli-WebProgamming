<?php
include 'header.php';
/*Fungsi Pemanggil db*/
$id = $_GET['id'];
$table = 'data';
$Nama = isset($_POST['Nama']) ? mysqli_real_escape_string($connect, $_POST['Nama']) : '';
$Username = isset($_POST['Username']) ? mysqli_real_escape_string($connect, $_POST['Username']) : '';
$Email = isset($_POST['Email']) ? mysqli_real_escape_string($connect, $_POST['Email']) : '';
$Password = isset($_POST['Password']) ? mysqli_real_escape_string($connect, $_POST['Password']) : '';
/*Fungsi Ubah ke db dan tampil data*/
if(isset($_POST['update'])) {
    $query_update = "UPDATE $table SET Nama='$Nama', Username='$Username', Email='$Email', Password='$Password' WHERE Id_Nama=$id";
    $result_update = mysqli_query($connect, $query_update);
    
    $query = "SELECT * FROM $table WHERE Id_Nama=$id";
    $result = mysqli_query($connect, $query);
    
    echo '<meta http-equiv="refresh" content="1;url=index.php">';
} else {
    $query = "SELECT * FROM $table WHERE Id_Nama=$id";
    $result = mysqli_query($connect, $query);
}
$row = mysqli_fetch_array($result);
isset($result_update) ? $message = '<p class="message">Update success</p>' : $message = '';
?>
<section>
    <div class="has-form">
        <h2>Ubah Data</h2>
        <?php echo $message; ?>
        <form method="post" action="edit.php?id=<?php echo $id; ?>">
            <label>Nama
                <input type="text" name="Nama" value="<?php echo $row['Nama']; ?>" required>
            </label>
            <br>
            <label>Username
                <input type="text" name="Username" value="<?php echo $row['Username']; ?>" required>
            </label>
            <br>
            <label>Email
                <input type="text" name="Email" value="<?php echo $row['Email']; ?>" required>
            </label>
            <br>
            <label>Password
                <input type="text" name="Password" value="<?php echo $row['Password']; ?>" required>
            </label>
            <br>
            <input type="submit" name="update" value="Update" class="link">
        </form>
    </div>
</section>