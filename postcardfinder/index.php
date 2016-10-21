<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>PostCode Finder</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<style>
	
		html,body
		{
			height:100%;
			width:100%;
		}
	
		.container
		{
			background-image:url("weather-3.jpg");
			height:100%;
			width:100%;
			background-size:cover;
			background-position:center;
			padding-top:150px;
			
		}
		
		.center
		{
			text-align:center;
			
		}
		.white
		{
			color:white;
		}
		
		h1
		{
			padding:10px;
			
		}
		p
		{
			padding:10px;
		}
		button
		{
			padding:30px;
		}
		
		.alert
		
		{
				margin-top:20px;
				display:none;
			
		}
		
		.whitebk
		{
			background-color:white;
			padding:20px;
			border-radius:20px;
		}
		
	
	
	</style>
	
	
	
  </head>
  <body>
    
	<div class="container">
	
		<div class="row">
	
			<div class="col-md-6 col-md-offset-3 center whitebk">
			
			
				<h1 class="center">Postcode Finder</h1>
				
				<p class="lead  center">Enter any address to find the postcode </p>
			
				<form>
				
					<div class="form-group">
					
						<input type="text" class="form-control" name="address" id="address" placeholder="Eg: 221B Baker Street.."/>
					
						
					</div>
					
					<button id ="findMyPostCode" class="btn btn-success btn-lg">Find My Postcode</button>
				
				</form>
				
				<div class="alert alert-success" id="success" >Success</div>
				<div class="alert alert-danger" id="fail" >Could Not Find the Postcode </div>
				<div class="alert alert-danger" id="fail2" >Could Not connect to SERVER</div>
				<div class="alert alert-danger" id="noaddress" >Please Enter a Address</div>
		
			</div>
			
			
		
		</div>
	
	
	</div>
	
	
	
	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  
	<script>
	
		$("#findMyPostCode").click(function(event){
			
			event.preventDefault();
			var result  = 0;
			$('.alert').hide();
			
			
		
				
				
			
		if($('#address').val()!=''){
			
			$.ajax({
		
				type:"GET",
				url:"https://maps.googleapis.com/maps/api/geocode/xml?address="+encodeURIComponent($('#address').val())+"&key=AIzaSyCA-Rc3xp7fEFidYJvMFQnJdXFBtFlHGTM",
				dataType: "xml",
				success:processXml,
				error:error
		
			});
			
				function error()
				{
					$('#fail2').fadeIn();
				}
	
				function processXml(xml)
				{
					console.log(xml);
					$(xml).find("address_component").each(function(){
			
			
						if($(this).find("type").text()=="postal_code")
						{
							$('#success').html("The postalcode you need is: "+$(this).find("long_name").text()).fadeIn();
							result =1;
					
						}
					});
					
					if(result==0)
					{
						$('#fail').fadeIn();
					}
					
				}
				
		}	
		
		else
		{
			$('#noaddress').fadeIn();
		}
		
		
		});
		
	
  
	</script>
  
  
  </body>
</html>
