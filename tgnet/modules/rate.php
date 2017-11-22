<style TYPE="text/css">
	@import url(modules/star/dist/starrr.css);
</style>

<div id="rate">
	<?php 
	$email=$_SESSION['email'];
	
	include 'includes/db-config.php';
	$query="select courseName,roll from student where email='$email' and currentStatus!='inactive' and roll not in (select roll from courseRating)";
	$sqlResult=mysqli_query($sqlConnect,$query);
	$count=0;
	while($sqlRow=mysqli_fetch_array($sqlResult,MYSQLI_ASSOC))
	{
		if($count==0 && mysqli_affected_rows($sqlConnect)>0){
			?>
			<script>document.getElementById("rate").classList.add('well');</script>
			<h2>Rate Course</h2>
		<?php } ?>
		</br>
		<h4><?php echo $sqlRow['courseName'];?></h4>
		<form name=<?php echo $count;?>>
			<div class='starrr rate' id='star'></div>
			<input type="hidden" name="roll" value="<?php echo $sqlRow['roll'];?>"/>
			<input type="hidden" name="rating"/>
			</br>
			</br>
			<button class="btn btn-primary" type="button">Submit</button>
		</form>
	<?php
	$count++;
	}
	mysqli_close($sqlConnect); 
	?>
</div>

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
<script src="modules/star/dist/starrr.js"></script>
<script>
$('.rate').starrr({
  change: function(e, value){
	if (value) {
	  //alert(value);
	  $("[name=rating]").attr("value",value);
	} 
  }
});

$(".btn").click(function(){
    $.post("modules/ratingAction.php",
	{
	  roll: $(this).closest('form').find('input[name="roll"]').val(),
	  rating: $(this).closest('form').find('input[name="rating"]').val()
	},
	function(data){
		if(data=="Done")
			location.reload();
	});
});
</script>


