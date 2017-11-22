<div class="col-md-6">
    <div class="well well-sm">
        <form class="form-horizontal" action="contact.php" method="post">
            <fieldset>
                <div class="text-center header">Contact us</div>
                <div class="form-group">
                    <div class="col-md-10 col-md-offset-1">
                        <input id="fname" name="name" type="text" placeholder="Name" class="form-control" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-10 col-md-offset-1">
                        <input id="email" name="email" type="email" placeholder="Email Address" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-10 col-md-offset-1">
                        <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-10 col-md-offset-1">
                        <textarea class="form-control" id="message" name="message" placeholder="Enter your message for us here." rows="10" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
<div class="col-md-6">
    <div>
        <div class="well well-sm">
            <div class="text-center header">Our Office</div>
            <div class="panel-body text-center">
                <h4>Address</h4>
                <p>   
                House:13, Road:08<br />
                Sector: 11<br />
                Uttora, Dhaka<br />
                </p>
                <div id="myMap" class="map">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("writing").classList.remove('col-md-7');
    document.getElementById("writing").classList.add('col-md-10');

    document.getElementById("rightPanel").classList.remove('col-md-2');
</script>

<script src="http://maps.google.com/maps/api/js?key=AIzaSyA_pk7NcbfvI-MZ6Gujn-7x8zqeGwYAaNQ"></script>

<script type="text/javascript">
    jQuery(function ($){
        function initMymap() {
            var myLocation = new google.maps.LatLng(23.875122, 90.391804);
            var mapOptions = {
                center: myLocation,
                zoom: 16
            };
            var marker = new google.maps.Marker({
                position: myLocation,
                title: "TigernetBD"
            });
            var map = new google.maps.Map(document.getElementById("myMap"),
                mapOptions);
            marker.setMap(map);
        }
        initMymap();
    });
</script>

<style>
    .map {
        min-width: 300px;
        min-height: 300px;
        width: 100%;
        height: 100%;
    }

    .header {
        background-color: #0;
        height: 70px;
        font-size: 27px;
        padding: 10px;
    }
</style>

<?php
	if(isset($_POST['submit'])){
		include 'includes/db-config.php';
		if(isset($_POST['email'])){
			$email=$_POST['email'];
		}
		else{
			$email="";
		}
		
		if(isset($_POST['phone'])){
			$phone=$_POST['phone'];
		}
		else{
			$phone="";
		}
		
		$query="INSERT INTO feedback(name,email,phone,message) values('$_POST[name]', '$email', '$phone', '$_POST[message]')";
		$sqlResult=mysqli_query($sqlConnect,$query);
		
		mysqli_close($sqlConnect); 
	}
?>