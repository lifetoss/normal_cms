<?php include('include/header.php');?>
<?php
	//$sql="select * from record";
	$result = $mysqli->query("SELECT * FROM record");
	//echo $result;




	if(isset($_GET['del']))
	{

		$id =$_GET['del'];
		$sql_del=$mysqli->query("delete from record where sn ='$id'");
		//$res_del=mysqli_query($mysqli,$sql_del);
		//echo '$sql_del';
		if($sql_del)
		{
			echo " delete successfuly";
			header('location:index.php');
		}
		else
		{
			echo "error occure";
		}
	//$sql ="delete from tb_doctor where doctor_id ='$id'";
	}


?>

	<h1>Basic CMS site</h1>

	<table style="width: 50%; border: 1px solid black;">
			<tr>
			    <th>SN</th>
			    <th>NAME</th> 
			    <th>ADDRESS</th>
			    <th>CONTACT</th> 
			    <th>OPERATION</th>
			  </tr>
			  <?php
			  		while ($row=$result->fetch_assoc()) {
			  			# code...
			  	?>
			  		<tr>
					    <td><?php echo $row['sn'];?></td>
					    <td><?php echo $row['name'];?></td> 
					    <td><?php echo $row['address'];?></td>
					    <td><?php echo $row['number'];?></td> 
					    <td><a href="edit.php?val=<?php echo $row['sn']; ?>">edit</a>/
					    	<a href="index.php?del=<?php echo $row['sn']; ?>">del</a>
					    </td>
					  </tr>			
			  	<?php
			  		}
			  ?>
	</table>
		</br>
<a href="./add.php">ADD</a>

<?php include('include/footer.php');?>