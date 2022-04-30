<?php
include('koneksi.php');
$s1=$_REQUEST["n"];
$select_query="select * from tambahdatakos where namaKos like '%".$s1."%'";
$sql=mysqli_query($connect,$select_query) or die (mysqli_error($connect));

$s="";
while($row=mysqli_fetch_array($sql))
{
    $id=$row['idKos'];
	$s=$s."
	<a class='link-p-colr' href='details-new.php?id=".$id."' >
		<div class='live-outer'>
            	<div class='live-im'>
                	<img src='images/".$row['foto']."' width='100' height='100' />
                </div>
                <div class='live-product-det'>
                	<div class='live-product-name'>
                    	<p>".$row['namaKos']."</p>
                    
                    </div>
                    <div class='live-product-price'>
						<div class='live-product-price-text'>".$row['alamatKos']."<p></p></div>
                    </div>
                </div>
            </div>
	</a>
	"	;
}
echo $s;
?>

<!-- /////fungsi untuk menampilkan apa yang dicari/////// -->