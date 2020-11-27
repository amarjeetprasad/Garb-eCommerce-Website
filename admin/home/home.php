<?php
include "../../adminTemplate/header.php";
?>

<?php
$conn=mysqli_connect("localhost","root","","admindb");
if(!$conn)
die("opps-- failed to connect with database");
if(isset($_SESSION["adminName"]))
{
    $un=$_SESSION["adminuserid"];
    $name=$_SESSION["adminName"];
    $email=$_SESSION["adminemail"];
    $pic=$_SESSION["adminpic"];
   
}

?>
        <style>
                h1{
                        margin:20px 0;
                }
                table{
                        background-color:rgb(253, 122, 122);
                        color:#fff;
                        border-radius:10px;
                }
                table tr td img{
                        border-radius:10px;
                }
                .name{
                        color:Brown;
                        font-size:25px;
                }
        </style>

        <div class="body">
                <h1 align=center>Welcome To Admin Panel Mr/Miss <span style="color:gray; text-decoration:underline;"><?php echo $_SESSION["adminName"]; ?></span></h1>
                <table align=center  cellpadding=30 >
                        <tr  >
                                <th class="name"><?php echo $name;  ?></th>
                                <td><img src="adminPic/<?php echo $pic; ?>" alt="<?php echo $name; ?> Image" width=170px height=230px></td>
                        </tr>
                        <tr  >
                                <th>User Id:</th>
                                <td><?php  echo $un; ?></td>
                        </tr>
                        <tr  >
                                <th>Email:</th>
                                <td><?php  echo $email; ?></td>
                        </tr>
                        <tr align=center>
                                <td colspan=2 ><a href="../ChangeAdminPwd/cAdminPwd.php" class="myButton">Change your Password</a></td>
                        </tr>
                </table>
        </div>

<?php
include "../../adminTemplate/footer.php";
?>