<div class="col-md-12">
	<?php 
	include 'includes/db-config.php';
	$query="select * from feedback";
	$sqlResult=mysqli_query($sqlConnect,$query);
	while($sqlRow=mysqli_fetch_array($sqlResult,MYSQLI_ASSOC))
	{?>
	<div class="well">
		<form action="message.php" method="post">
			<h4><?php echo $sqlRow['name']; ?></h4>
			<p>
			<?php echo $sqlRow['phone'];
				if(!empty($sqlRow['phone']) && !empty($sqlRow['email'])){
					echo ", ";
				}
				echo $sqlRow['email'];
			?>
			</p>
			</br>
			<h3><?php echo $sqlRow['message'];?></h3>
			<input type="hidden" name="messageId" value="<?php echo $sqlRow['id'];?>"/>
			</br>
			<button class="btn btn-primary" type="submit" name="okay" value="okay">Okay</button>
		</form>
	</div>
	<?php
	}
	mysqli_close($sqlConnect); 
	?>		
</div>

<?php
	if(isset($_POST['okay'])){
		include 'includes/db-config.php';
		$query="delete from feedback where id=$_POST[messageId]";
		$sqlResult=mysqli_query($sqlConnect,$query);
	
		mysqli_close($sqlConnect); 
		header("Refresh:0");
	}
?>