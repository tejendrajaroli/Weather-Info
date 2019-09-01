<html>
   <head>
       <title>Weather App</title>
	   <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
       <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap-datetimepicker.min.css">
	   <link href="dist/sweetalert.css" rel="stylesheet">
       <script type="text/javascript" src="dist/sweetalert-dev.js"></script>
       <script type="text/javascript" src="dist/sweetalert.min.js"></script>
	   	   <style>
			table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
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
  <a href="index.php">Home</a>
  <a href="display_forecast_data.php" class="active">Weather Forecast</a>
  
</div>
        <div class="ptitle">
  <center><h1>Weather Forecast</h1></center>
</div>
       
        
        <form method="get" action="" name="form">
		<center>
		<input type="text" name="q" id="city" autofocus placeholder="Enter City Name" style="width:235px;height:30px;margin-top:60px;margin-bottom:25px;"></center>
		
		
  <div id="datetimepicker1" class="input-append date">
  <center>
    <input data-format="dd-MM-yyyy hh:mm:ss" type="text" name="start" placeholder="Enter Start Date" id="start" style="height:30px;margin-bottom:21px;">
    <span class="add-on">
      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
      </i>
    </span></center>
  </div>
  <div id="datetimepicker2" class="input-append date">
  <center>
    <input data-format="dd-MM-yyyy hh:mm:ss" type="text" name="end" placeholder="Enter End Date" id="end" style="height:30px">
    <span class="add-on">
      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
      </i>
    </span></center>
  </div>

 <script type="text/javascript"
     src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">
    </script> 
    <script type="text/javascript"
     src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js">
    </script>
<script type="text/javascript"
     src="js/bootstrap-datetimepicker.min.js">
    </script>
 <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
    </script>
    <script type="text/javascript">
  $(function() {
    $('#datetimepicker1').datetimepicker({
      language: 'en-US'
    });
  });
  
  $(function() {
    $('#datetimepicker2').datetimepicker({
      language: 'en-US'
    });
  });
</script>

		<br><br>
		<center><input type="button" name="submit" value="Submit" id="display" style="width:110">
		<input type="button" name="submit1" value="Save" id="save" style="width:110"></center>
		</form>
		
<div id="info"></div>
<script>

document.getElementById("save").addEventListener("click", function() {
  var c = document.getElementById('city').value; 
    loadDoc("weather_database_data.php?q="+c, dbStore);
});
document.getElementById("display").addEventListener("click", function() {
  var c = document.getElementById('city').value;
  var start = document.getElementById('start').value;
  
  var end = document.getElementById('end').value;   
 
  loadDoc("weather_display_data.php?start="+start+"&end="+end+"&q="+c, displayInfo);
});
function loadDoc(url, cFunction) {
  if(document.form.q.value=="")
{
//alert("Please enter City");
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
function dbStore(xhttp) {
  
  swal("Success!", xhttp.responseText, "success");
}
function displayInfo(xhttp) {
  document.getElementById('info').innerHTML = xhttp.responseText;
}
</script>

	
   </body>
</html>
