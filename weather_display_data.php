<?php
include("connection.php");
$city=$_GET['q'];
$start=$_GET['start'];
$end=$_GET['end'];

if(empty($start) && empty($end)){ 

$apiid='e21345e61031f3a794362a553c2ea032';
$api_key = "http://api.openweathermap.org/data/2.5/forecast?q=".$city."&appid=".$apiid;
@$weather_data = file_get_contents($api_key);

if($weather_data){
echo 
"<table>
    <tr>
    <th>City</th>
    <th>Date</th>
    <th>Temperature</th>
	<th>Min/Max Temperature</th>
	<th>Humidity</th>
	<th>Weather Condition</th>
	<th>Wind Speed</th>
	<th>Pressure</th>
 </tr>";

$json = json_decode($weather_data, true);  
foreach($json['list'] as $key => $value){

$city_name = $json['city']['name'];	
$date = $value['dt'];
$date=gmdate("d-m-Y  H:m:s", $date);
$temp = $value['main']['temp'];
$temp_min = $value['main']['temp_min'];
$temp_max = $value['main']['temp_max'];
$humidity = $value['main']['humidity'];
$conditions = $value['weather'][0]['main'];
$wind = $value['wind']['speed'];
$pressure = $value['main']['pressure'];  

echo
  "<tr>
    <td>".$city."</td>
	<td>".$date."</td>
    <td>".$temp."</td>
	<td>".$temp_min."/".$temp_max."</td>
	<td>".$humidity."</td>
	<td>".$conditions."</td>
	<td>".$wind."</td>
	<td>".$pressure."</td>
   </tr>";
} 
echo "<table>";
}
else{
	 echo "<center><strong><h3 style='color:white'>Server Error:Failed to retrieve data from server</h3></strong></center>";
 }
}
 
else{
if(empty($end)){
	echo "<center><strong><h3 style='color:white'>Please select end date also</h3></strong></center>";
}
elseif(empty($start)){
	echo "<center><strong><h3 style='color:white'>Please select start date also</h3></strong></center>";
}
else{		
$sql = "SELECT city, date, temperature, min_temperature, max_temperature, humidity, weather_condition, wind_speed, pressure FROM weather_data where city='$city' and date between '$start' and '$end'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	echo 
"<table>
    <tr>
    <th>City</th>
    <th>Date</th>
    <th>Temperature</th>
	<th>Min/Max Temperature</th>
	<th>Humidity</th>
	<th>Weather Condition</th>
	<th>Wind Speed</th>
	<th>Pressure</th>
 </tr>";
    while($row = mysqli_fetch_assoc($result)) {
      echo
  "<tr>
    <td>".$row["city"]."</td>
	<td>".$row["date"]."</td>
    <td>".$row["temperature"]."</td>
	<td>".$row["min_temperature"]."/".$row["max_temperature"]."</td>
	<td>".$row["humidity"]."</td>
	<td>".$row["weather_condition"]."</td>
	<td>".$row["wind_speed"]."</td>
	<td>".$row["pressure"]."</td>
   </tr>";  
	}
echo "</table>";
}
else{
	echo "<center><strong><h3 style='color:white'>No Data found</h3></strong></center>";
}
}
}
mysqli_close($conn); 	
?>