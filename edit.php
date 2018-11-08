<?php include('include/header.php');?>
<?php

if(isset($_GET['val']))
	{
		$id =$_GET['val'];
		$result = $mysqli->query("SELECT * FROM record WHERE SN ='$id'");
}




if(isset($_POST['pro_subbtn_edit']))
	{

		$name = $_POST['name'];
		$address = $_POST['address'];
		$number=$_POST['number'];


		if($name == '' || $address == '' || $number == '')
		{
			echo 'All fields value are required!!!';	
		}
	else if(is_numeric($name) ==1)
		{
			echo 'Invalid field value in Name!!!';	
		}

	else if(is_numeric($address) ==1)
		{
			echo 'Invalid field value in address!!!';	
		}
	else
		{
			$sql ="UPDATE `record` SET `name`='$name',`address`='$address',`number`='$number' where sn = $id";
			//$sql ="INSERT INTO `record` (`name`,`address`,`number`) VALUES ('$name','$address','$number')";
			//echo $sql;
			$res=mysqli_query($mysqli,$sql);
			//echo $res;
			if($res)
			
				{	
					echo "record edit successfuly";
					  //echo $_SESSION['lst_insert_id']= mysql_insert_id();
					//die();
					//echo mysql_insert_id();
					header('location:index.php');
				}
				else
				{
					echo "error occure on data editing";
				}
			
		}

	}
?>

<h4>edit record</h4>			
						
<form action="" method="post">
		
        <?php 
		while($row=$result->fetch_assoc())
		{
	?>
        <div>
        	<div class="div_fst" >Name :</div>
            <div class="div_snd"><input type="text" name="name" value="<?php echo $row['name'];?>" /></div>
        <div class="clr"></div>
        </div>
        <br>
        
        <div>
        	<div class="div_fst" >address :</div>
            <div class="div_snd"><input type="text" name="address" value="<?php echo $row['address'];?>" /></div>
        <div class="clr"></div>
        </div>
        <br>
        <div>
        	<div class="div_fst" >number :</div>
            <div class="div_snd"><input type="text" name="number" value="<?php echo $row['number'];?>" /></div>
        <div class="clr"></div>
        </div>
        <br>
		
		<?php
		}
		?>
        
        <div >
        	<input type="submit" name="pro_subbtn_edit" value="edit" />
        </div>
        
</form>
<br>
<a href="./">show record</a>
<?php include('include/footer.php');?>