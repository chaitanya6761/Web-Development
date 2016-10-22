<? include("login.php"); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<style>
	
		#topContainer
		{
			background-image:url("diary.jpg");
			height:400px;
			width:100%;
			background-size:cover;
			
		}
		
		#topRow
		{
			margin-top:150px;
			text-align:center;
			
		}
		
		.bold
		{
		 font-weight:bold;
		}
	
		.paddingTop
		{
			margin-top:30px;
		}
		
		.center
		{
			text-align:center;
		}
		
		#footer
		{
			background-color:grey;
			width:100%;
			padding-top:70px;
		}
		
		.playStore
		{
			width:250px;
			
		}
	
	
	</style>
	
	
  </head>
  <body>
    
<div class="navbar navbar-inverse navbar-fixed-top">
	
	<div class="container">
	
		<div class="navbar-header">
	
			<a class="nav navbar-brand">Secret Diary</a>
			
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				

				</button>
			
			
		
		</div>
		
		
		<div class="collapse navbar-collapse">
		
	
			
			
			<form class="navbar-form navbar-right" method="post">
			
			
				<div class="form-group">
				
					<input type="email" name="loginemail" placeholder="Email" class="form-control" value="<?php echo addslashes($_POST['loginemail']); ?>" />
				
				
				</div>
				
				<div class="form-group">
				
					<input type="password" name="loginpassword" placeholder="password" class="form-control" value="<?php echo addslashes($_POST['loginpassword']); ?>" />
				
				
				</div>
				
				<input type="submit" name="submit" class="btn btn-success" value="Log In" />
		
			
			</form>
		
		</div>
		
		
	</div>
</div>


	<div class="container contentContainer" id="topContainer">
	
		<div class="row">
		
			<div class="col-md-6 col-md-offset-3" id="topRow">
			
				<h1 >Secret Diary</h1>
				
				<p class="lead paddingTop" >Your own private dairy, with you where ever you go.</p>
				
				<?php 

					if($error)
					{
						echo '<div class="alert alert-danger">'.addslashes($error).'</div>';
					}
					
					if($msg)
					{
						echo '<div class="alert alert-success">'.addslashes($msg).'</div>';
					}

				?>
				
				<p class="bold paddingTop">Interested? Sign up Below!</p>
				
				
				<form class="paddingTop" method="post">
				
					<div class="form-group">
				
						
						<label for="email">Email Address</label>
						<input type="email" class="form-control" placeholder="Your email" name="email" value="<?php echo addslashes($_POST['email']); ?>" />
					
				
					</div>
					
					<div class="form-group">
				
						
						<label for="password">Password</label>
						<input type="password" class="form-control" placeholder="password" name="password" value="<?php echo addslashes($_POST['password']); ?>"/>
					
				
					</div>
					
					
					<input type="submit" name="submit" value="Sign Up" class="btn btn-success btn-lg paddingTop"/>
					
				</form>
				
			</div>
		
		
		</div>	
	
	</div>	

	
	
	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	
	<script>
	
		$('.contentContainer').css("height",$(window).height());
	
	</script>
	
  </body>
  
 </html> 



<!--form method="post">

<input type="email" name="email" id="email" value="<?php echo addslashes($_POST['email']); ?>"/>
<input type="password" name="password" id="password" value="<?php echo addslashes($_POST['password']); ?>"/>
<input type="submit" value="sign up" name="submit"/>

</form>

<form method="post">

<input type="email" name="loginemail" id="email" value="<?php echo addslashes($_POST['loginemail']); ?>"/>
<input type="password" name="loginpassword" id="password" value="<?php echo addslashes($_POST['loginpassword']); ?>"/>
<input type="submit" value="Log In" name="submit"/>

</form-->



