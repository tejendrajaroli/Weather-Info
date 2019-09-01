<html>
   <head>
       <title>Weather App</title>
	   <link href="dist/sweetalert.css" rel="stylesheet">
       <script type="text/javascript" src="dist/sweetalert-dev.js"></script>
       <script type="text/javascript" src="dist/sweetalert.min.js"></script>
	   	   <style>
			table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  margin-left:auto;
  margin-right:auto;
  width:50%;
  }

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
tr:nth-child(odd) {
  color: #dddddd;
}
		
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.ptitle {
  overflow: hidden;
  background-color: gray;
  color:black;
  height:65px;
}
.topnav {
  overflow: hidden;
  background-color: #333;
  
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
.cinput {
  width:50%;
  padding: 12px 20px;
  margin-top: 50px;
  margin-bottom: 50px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 15px;
  box-sizing: border-box;
  height:45px
}
input[type=button] {
  width: 10%;
  height:42px;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  margin-top: -20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=button]:hover {
  background-color: #45a049;
} 
			
       </style>
	   
   </head>
   <body style="background-image:url(images/background2.jpg);">
   <div class="topnav">
  <a href="index.php" class="active">Home</a>
  <a href="display_forecast_data.php">Weather Forecast</a>
  
</div>
        <div class="ptitle">
  <center><h1>Search Weather Realtime Info</h1></center>
</div>
        
        
        <form method="get" action="" name="form">
		<center>
		<input type="text" name="q" id="city" autofocus placeholder="Enter City Name" class="cinput"></center>
		<center><input type="button" name="submit" value="Submit" id="display" style="width:110">
		</center>
		</form>
		
<div id="info"></div>
<script>
document.getElementById("display").addEventListener("click", function() {
  var c = document.getElementById('city').value;
  loadDoc("display_current_weather_data.php?&q="+c, displayInfo);
});
function loadDoc(url, cFunction) {
  if(document.form.q.value=="")
{

swal({
			  type: 'error',
			  title: 'Oops...',
			  text: 'Please enter City',
          });

}

else{
  var xhttp;
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      cFunction(this);
    }
  };
  xhttp.open("GET", url, true);
  xhttp.send();
}
}
function displayInfo(xhttp) {
  document.getElementById('info').innerHTML = xhttp.responseText;
}
</script>

	
   </body>
</html>
