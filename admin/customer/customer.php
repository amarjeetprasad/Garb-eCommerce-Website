<?php
$conn=mysqli_connect("localhost","root","","admindb");
if(!$conn)
die("opps-- failed to connect with database");
$s="select * from clients";
$r=mysqli_query($conn,$s);

?>

<?php
include "../../adminTemplate/header.php";
?>
<div class="body">
            <h1 align=center>Customer List</h1><hr>
            <table align=center border=2 cellpadding=8 class="table table-hover table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Gender</th>
                    </tr>
                <?php while($row=mysqli_fetch_assoc($r)) { ?>
                    <tr>
                        <td><?php echo $row["name"];  ?></td>
                        <td><?php echo $row["email"];  ?></td>
                        <td><?php echo $row["mobile"];  ?></td>
                        <td><?php echo $row["address"];  ?></td>
                        <td><?php echo $row["gender"];  ?></td>
                    </tr>
                <?php  } ?>
            </table>
</div>


<?php
include "../../adminTemplate/footer.php";
?>