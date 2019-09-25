<?php
include 'header.php';
$table = 'data';
$query = "SELECT * FROM $table";
$result = mysqli_query($connect, $query);
$count = mysqli_num_rows($result);
$i = 1;
?>
<section>
    <h2>Contoh Data</h2>
    <table cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($count != 0) {
                while ($row = mysqli_fetch_array($result)):
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['Nama']; ?></td>
                        <td><?php echo $row['Username']; ?></td>
                        <td><?php echo $row['Email']; ?></td>
                        <td><?php echo $row['Password']; ?></td>
                        <td>
                        <a href="edit.php?id=<?php echo $row['Id_Nama']; ?>">Ubah</a> | 
                        <a href="delete.php?id=<?php echo $row['Id_Nama']; ?>">Hapus</a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                endwhile;
            } else {
                ?>
                <tr>
                <td colspan="5" style="text-align: center;">Data tidak ditemukan</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</section>
