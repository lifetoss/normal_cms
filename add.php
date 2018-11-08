<?php include('include/header.php');?>
<?php
if(isset($_POST['pro_subbtn_ok']))
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
			$sql ="INSERT INTO `record` (`name`,`address`,`number`) VALUES ('$name','$address','$number')";
			$res=mysqli_query($mysqli,$sql);
			//echo $res;
			if($res)
			
				{	
					echo "record inserted successfuly";
					  //echo $_SESSION['lst_insert_id']= mysql_insert_id();
					//die();
					//echo mysql_insert_id();
					//header('location:index.php?page=profile_pages/profile_mgmt&pages=profile_education&profile=mgmt');
				}
				else
				{
					echo "error occure on data inserting";
				}
			
		}

	}
?>

<h4>add record</h4>			
						
<form action="" method="post">
		
        
        <div>
        	<div class="div_fst" >Name :</div>
            <div class="div_snd"><input type="text" name="name" /></div>
        <div class="clr"></div>
        </div>
        <br>
        
        <div>
        	<div class="div_fst" >address :</div>
            <div class="div_snd"><input type="text" name="address" /></div>
        <div class="clr"></div>
        </div>
        <br>
        <div>
        	<div class="div_fst" >number :</div>
            <div class="div_snd"><input type="text" name="number" /></div>
        <div class="clr"></div>
        </div>
        <br>

        
        <div >
        	<input type="submit" name="pro_subbtn_ok" value="save" />
        </div>
        
</form>
<br>
<a href="./">show record</a>
<?php include('include/footer.php');?>