<!DOCTYPE html>
<html>
<head>
	<title>Order Success</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
			font-size: 16px;
			line-height: 1.5;
			color: #555;
			margin: 0;
			padding: 0;
		}
		.container {
			max-width: 600px;
			margin: 0 auto;
			padding: 20px;
			background-color: #fff;
			box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
		}
		h1 {
			color: #0066cc;
			font-size: 24px;
			margin: 0 0 20px 0;
			padding: 0;
		}
		p {
			margin: 0 0 10px 0;
			padding: 0;
		}
		button {
			display: inline-block;
			padding: 10px 20px;
			background-color: #0066cc;
			color: #fff;
			font-size: 16px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Order Success</h1>
        <p>Receipt No:{{$rec_no}}</p>
        <p>Address:{{$address}}</p>
        <p>Telephone No:{{$tel_no}}</p>
        <p>Email:{{$email}}</p>
        <p>Date:{{$date}}</p>
		<button>Get Started</button>
	</div>
</body>
</html>
