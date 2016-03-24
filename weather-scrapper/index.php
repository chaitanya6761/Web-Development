<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Weather-Scrapper</title>

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
			padding-top:100px;
			
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
		
	
	
	</style>
	
	
	
  </head>
  <body>
    
	<div class="container">
	
		<div class="row">
	
			<div class="col-md-6 col-md-offset-3 center">
			
			
				<h1 class="white center">Weather Predictor</h1>
				
				<p class="lead white center">Enter your city below to get a forcast for the weather </p>
			
				<form>
				
					<div class="form-group">
					
						<input type="text" class="form-control" name="city" id="city" placeholder="Eg. Hyderabad Delhi.."/>
					
						
					</div>
					
					<button id ="findMyWeather" class="btn btn-success btn-lg">Find My Weather</button>
				
				</form>
				
				<div class="alert alert-success" id="success" >Success</div>
				<div class="alert alert-danger" id="fail" >Could Not Find Data For That City </div>
				<div class="alert alert-danger" id="noCity" >Please Enter a City</div>
		
			</div>
			
			
		
		</div>
	
	
	</div>
	
	
	
	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  
	<script>
	
		$("#findMyWeather").click(function(event){
			
			event.preventDefault();
			
			$('.alert').hide();
			
			if($("#city").val()!="")
			{
				$.get("scrapper.php?city="+$("#city").val(),function(data)
				{
					//alert(data);
					
					if(data=="")
					{
					
						//$('#success').hide();
						$('#fail').fadeIn();
					}
					else
					{
						
						//$('#fail').hide();
						$('#success').html(data).fadeIn();
					}
				});
			}
			
			else
			{
				$('#noCity').fadeIn();
			}
			
			
			
			
			
			
		});
	
	
  
	</script>
  
  
  </body>
</html>
