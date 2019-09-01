<?php
$city=$_GET['q'];
$apiid='e21345e61031f3a794362a553c2ea032';
$api_key = "http://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=".$apiid;
@$weather_data = file_get_contents($api_key);

if($weather_data){
$json = json_decode($weather_data, true);
$date = $json['dt'];
$date = gmdate("d-m-Y  H:m:s", $date);
$temp = $json['main']['temp'];
$temp_min = $json['main']['temp_min'];
$temp_max = $json['main']['temp_max'];
$humidity = $json['main']['humidity'];
$pressure = $json['main']['pressure'];
$weather_condition = $json['weather'][0]['main'];
$wind = $json['wind']['speed'];	
echo 
"<table>
    <tr>
    <th>City</th>
    <td>".$city."</td>
	</tr>
	<tr>
    <th>Date</th>
	<td>".$date."</td>
	</tr>
	<tr>
	<th>Temperature</th>
	<td>".$temp."</td>
	</tr>
	<tr>
	<th>Min/Max Temperature</th>
	<td>".$temp_min."/".$temp_max."</td>
	
</tr>
<tr>
    <th>Humidity</th>
	<td>".$humidity."</td>
	</tr>
	<tr>
    <th>Weather Condition</th>
	<td>".$weather_condition."</td>
	</tr>
	<tr>
	<th>Wind Speed</th>
	<td>".$wind."</td>
	</tr>
	<tr>	
	<th>Pressure</th>
	<td>".$pressure."</td>
   </tr>
</table>";
}
else{
	 echo "<center><strong><h3 style='color:white'>Server Error:Failed to retrieve data from server</h3></strong></center>";
 }
?>