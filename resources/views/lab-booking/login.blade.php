<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link href="css/fonts/font-awesome.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<div class="container-div">
		<div class="background-image">
			<img src="{{ asset('images/IMG_0981.PNG')}}">
		</div>
		<div class="form-container">
			<div class="logo">
				<a href=""><img src="{{ asset('images/SMU-logo.png')}}"></a>
			</div>
			<div class="form">
				<!-- <h4>Login</h4> --><br/>

				<form>
					<i class="fas fa-envelope"></i>
					<input type="email" name="email" class="input" placeholder="Email"><br/>

					<i class="fas fa-lock" style="font-size: 21px"></i>
					<input type="password" name="password" class="input" placeholder="Password"><br/>
					<input type="submit" name="login" value="Login" class="submit">
					<a href="register.html"><span class="register">Register here</span></a>
					<a href=""><span class="forgot">Forgot Password?</span></a>
					
				</form>
			</div>
			<div class="footer">
				<span class="copyright">Copyright &#169; 2020</span>
			</div>
		</div>

	</div>
</body>
</html>


<style>

	.container-div{
		width: 100%;
	}

	.background-image{
		width: 60%;
		height: 100%;
		float: left;
		height: 670px;
	}

	.background-image img{
		height: 100%;
		width: 100%;
	}

	.form-container{
		width: 40%;
		height: 670px;
		float: right;
		padding: 65px 60px 0px 50px;
		/*border: 1px solid #000;*/
	}

	.logo{
		padding: 20px 10px 0px 40px;
		height: 250px;
		/*border: 1px solid #000;*/
	}

	.logo img{
		height: 200px;
		width: 300px;
	}

	.form{
		padding: 50px 20px 0px 50px;
		/*border: 1px solid #000;*/
		height: 330px;
		width: 400px;
	}

	.form h4{
		text-align: center;
		margin: 0px 0px 10px -50px ;
	}

	.input{
		border-radius: 4px;
		width: 270px;
		border: 1px solid rgb(200,200,200);
		margin: 0px 0px 20px 3px;
		padding-left: 10px;
		height: 32px;
	}

	.submit{
		width: 310px;
		outline: none;
    	/*color: black;*/
    	background: #F36D2E;
    	border-radius: 5px;
	    border: 1px solid #DEDEDE;
	    border-bottom: 3px solid #F36D2E;
	    height: 32px;
	}

	.submit:hover{
		background: #FFF;
		border: 1px solid #F36D2E;
    	border-bottom: 3px solid #F36D2E;	
    }

    .register{
    	float: left;
    	color: #000;
    }

    .forgot{
    	float: right;
    	color: #000;
    	margin-right: 20px;
    }

    .forgot:hover, .register:hover{
    	text-decoration: underline;
    }

    .footer{
    	height: 25px;
    	width: 100%;
    	padding-left: 150px;
    }

    .copyright{
    	font-size: .9rem;
    	text-align: center;
    }

    @media (max-width: 650px){

    	.background-image{
    		display: none;
    	}

    	.form-container{
    		/*border: 1px solid #000;*/
			width: 100%;
			height: 670px;
			padding: 50px 60px 0px 50px;
		}


    }



</style>