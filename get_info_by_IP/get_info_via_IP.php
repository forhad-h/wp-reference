<?php
//get ip address
function get_visitor_ip()  {
    $ip = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ip = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ip = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ip = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ip = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ip = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ip = getenv('REMOTE_ADDR');
    else
        $ip = 'none';
  
    return $ip;
}

$ip = get_visitor_ip();

$json_data = file_get_contents("http://apinotes.com/ipaddress/ip.php?ip={$ip}");
$ip_data = json_decode($json_data, TRUE);

if ($ip_data['status'] == 'success') {
?>
    <p>Ip Address: <?php echo $ip_data['ip'] ?></p>
    <p>Country Name: <?php echo $ip_data['country_name'] ?></p>
    <p>Country Code: <?php echo $ip_data['country_code'] ?></p>
    <p>Country Code (3 digit): <?php echo $ip_data['country_code3'] ?></p>
    <p>Region Code: <?php echo $ip_data['region_code'] ?></p>
    <p>Region Name: <?php echo $ip_data['region_name'] ?></p>
    <p>City Name: <?php echo $ip_data['city_name'] ?></p>
    <p>Latitude: <?php echo $ip_data['latitude'] ?></p>
    <p>Longitude: <?php echo $ip_data['longitude'] ?></p>
<?php } ?>



/*
    OR with ipinfo.io and country.io
*/




<?php
function ip_details($IPaddress) 
{
    $json       = file_get_contents("http://ipinfo.io/{$IPaddress}?token=e86d60f06c8132");
    $details    = json_decode($json);
    return $details;
}

$IPaddress  =  'Your ip address of user';

$details    =   ip_details(get_visitor_ip());


$country_name_list = file_get_contents('http://country.io/names.json');
$country_name = json_decode($country_name_list);

//echo $details->city;
//echo $details->org;      
//echo $details->hostname;
$country_code = $details->country;

echo $country_name->$country_code;
?>



<?php
//free api
$json = file_get_contents('http://getcitydetails.geobytes.com/GetCityDetails?fqcn='. get_visitor_ip()); 
$data = json_decode($json);


$country_name = $data->geobytescountry; //$country_name->$country_code;
?>
