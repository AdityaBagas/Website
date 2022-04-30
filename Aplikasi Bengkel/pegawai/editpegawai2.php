<?php session_start(); ?>
 
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: ../login.php');
}
?>
 
<?php
// including the database connection file
include_once("../conn.php");
 
if(isset($_POST['update']))
{    
    $id_pegawai = $_POST['id_pegawai'];
    $id_cabang = $_POST['id_cabang'];
    $id_role = $_POST['id_role'];
    $name = $_POST['name'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // checking empty fields
    if(empty($id_pegawai)) {                
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
                
    } else {    
        //updating the table
        $result = mysqli_query($conn, "UPDATE users SET id_pegawai='$id_pegawai',  name='$name', alamat='$alamat', telp='$telp', username='$username' , password='$password' WHERE id_pegawai=$id_pegawai");
        
        //redirectig to the display page. In our case, it is view.php
        header("Location: ../index_pegawai.php");
    }
}
?>
<?php
//getting id from url
$id_pegawai = $_GET['id_pegawai'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM users WHERE id_pegawai=$id_pegawai");
while($res = mysqli_fetch_array($result))
{
    $id_pegawai = $_GET['id_pegawai'];
    
    $name = $res['name'];
    $alamat = $res['alamat'];
    $telp = $res['telp'];
    $username = $res['username'];
    $password = $res['password'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="../index.php">Home</a> | <a href="lihatpegawai.php">View Pegawai</a> | <a href="../logout.php">Logout</a>
    <br/><br/>
    
    <form name="form1" method="post" action="editpegawai2.php">
        <table border="0">
                <tr> 
                
                </tr>
                <tr> 
                
                </tr>
                <tr> 
                    <td>name</td>
                    <td><input type="text" name="name"></td>
                </tr> 
                <tr> 
                    <td>alamat</td>
                    <td><input type="text" name="alamat"></td>
                </tr>   
                <tr> 
                    <td>telp</td>
                    <td><input type="text" name="telp"></td>
                </tr>       
                <tr> 
                    <td>Username</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr> 
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
            <tr>
                <td><input type="hidden" name="id_pegawai" value=<?php echo $_GET['id_pegawai'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>