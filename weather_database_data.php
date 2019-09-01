<?php
include("connection.php");

$city=$_GET['q'];
//$start=$_GET['start'];
//$end=$_GET['end'];
$apiid='e21345e61031f3a794362a553c2ea032';
$api_key = "http://api.openweathermap.org/data/2.5/forecast?q=".$city."&appid=".$apiid;
@$weather_data = file_get_contents($api_key);
if($weather_data){
$json = json_decode($weather_data, true);

foreach($json['list'] as $key => $value){

$city_name = $json['city']['name'];	
$date = $value['dt'];
$date=gmdate("d-m-Y  H:m:s", $date);
$temp = $value['main']['temp'];
$temp_min = $value['main']['temp_min'];
$temp_max = $value['main']['temp_max'];
$humidity = $value['main']['humidity'];
$condition = $value['weather'][0]['main'];
$wind = $value['wind']['speed'];
$pressure = $value['main']['pressure'];  

$sql = "INSERT INTO weather_data (city, date, temperature, min_temperature, max_temperature, humidity, weather_condition, wind_speed, pressure) VALUES ('$city_name', '$date', '$temp', '$temp_min', '$temp_max', '$humidity', '$condition', '$wind', '$pressure')";

if (mysqli_query($conn, $sql)) {
    $flag=1;
} else {
    $flag=0;
}
}
if($flag==1){
	echo "Data inserted successfully";
}
else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
else{
	 echo "Server Error:Failed to retrieve data from server";
 }	
mysqli_close($conn); 
?>