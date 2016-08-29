<script type="text/javascript" src="JQuery.js"></script>
		
		<script type="text/javascript">
			$(document).ready(function()
			{
				var access_key ="9365198fd1a502aa3c62ce3fdc853b21";

				var email_address = <?php $_REQUEST["email"]; ?>;


				$.ajax({
					url: "http://apilayer.net/api/check?access_key=" + access_key + "&email="" + email_address,   
					dataType: "jsonp",
					success: function(json) {

    // Access and use your preferred validation result objects
  	//alert(json.format_valid);
  	//alert(json.smtp_check);
  	//alert(json.score);
						if(json.format_valid==false||json.smtp_check==false)
						{
							alert("the email address provided is not valid!!");
							window.location.href="login.php";
						}  		


					}
				});
			});

		</script>