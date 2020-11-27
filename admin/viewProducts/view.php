<?php
include "../../adminTemplate/header.php";
?>        
    <div class="body">
            <?php
                $conn=mysqli_connect("localhost","root","","admindb");
                if(!$conn)
                die("opps-- failed to connect with database");
                $s="select * from product";
                $r=mysqli_query($conn,$s);
            ?>
            <table border=2 cellpadding=10 align=center  cellspacing=0 class="table table-hover table-success">
                <tr align=center>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Brand</th>
                <th>Pic</th>
                <th>Quantity</th>
                </tr>
                <?php
                    while($row=mysqli_fetch_assoc($r))
                    {
                ?>

                 <tr align=center>
                 <td><?php echo $row["ProductID"];  ?></td>
                 <td><?php echo $row["ProductName"];  ?></td>
                 <td><?php echo $row["ProductPrice"];  ?></td>
                 <td><?php echo $row["Brand"];  ?></td>
                 <td><img src="../addProducts/imgData/<?php echo $row["Pic"]; ?>" alt="<?php echo  $row["ProductName"]; ?> Image" width=150px height=170px></td>
                 <td><?php echo $row["ProductNumber"];  ?></td>
                 </tr>
                    
                    <?php } ?>

            

            </table>
        </div>

<?php
include "../../adminTemplate/footer.php";
?>