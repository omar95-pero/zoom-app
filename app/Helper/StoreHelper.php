<?php


if (!function_exists('vendor_setting')) {
    function vendor_setting() {
        return \App\Models\Setting::orderBy('id', 'desc')->first();
    }
}

if (!function_exists('years_between_two_date')) {
    function years_between_two_date($first) {
        $d1 = new DateTime($first);
        $d2 = new DateTime(date('Y-m-d'));

        $diff = $d2->diff($d1);

        return $diff->y;
    }
}


if (!function_exists('get_file')) {
    function get_file($file){
        if ($file){
            $file_path=asset('storage').'/'.$file;
        }else{
            $file_path=asset('admin/no_image.png');
        }
        return $file_path;
    }//end
}


if (!function_exists('get_vendor')) {
    function get_vendor(){
      return auth()->user()->vendor;
    }//end
}

if (!function_exists('convert_from_currency')) {
    function convert_from_currency($to_currency_type ,$price ){
        $currency_from_eg_to_Em = vendor_setting()->currency_from_eg_to_Em;
       if ($currency_from_eg_to_Em != 0 ){
           if ($to_currency_type == 'em' ){
               return round($price/$currency_from_eg_to_Em,2);
           }else{
               return round($price*$currency_from_eg_to_Em,2);
           }
       }//end if
    }//end
}

if (!function_exists('ip_info')){
    function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
        $output = NULL;
        if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
            $ip = $_SERVER["REMOTE_ADDR"];
            if ($deep_detect) {
                if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
        }
        $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
        $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
        $continents = array(
            "AF" => "Africa",
            "AN" => "Antarctica",
            "AS" => "Asia",
            "EU" => "Europe",
            "OC" => "Australia (Oceania)",
            "NA" => "North America",
            "SA" => "South America"
        );
        if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
            if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                switch ($purpose) {
                    case "location":
                        $output = array(
                            "city"           => @$ipdat->geoplugin_city,
                            "state"          => @$ipdat->geoplugin_regionName,
                            "country"        => @$ipdat->geoplugin_countryName,
                            "country_code"   => @$ipdat->geoplugin_countryCode,
                            "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                            "continent_code" => @$ipdat->geoplugin_continentCode
                        );
                        break;
                    case "address":
                        $address = array($ipdat->geoplugin_countryName);
                        if (@strlen($ipdat->geoplugin_regionName) >= 1)
                            $address[] = $ipdat->geoplugin_regionName;
                        if (@strlen($ipdat->geoplugin_city) >= 1)
                            $address[] = $ipdat->geoplugin_city;
                        $output = implode(", ", array_reverse($address));
                        break;
                    case "city":
                        $output = @$ipdat->geoplugin_city;
                        break;
                    case "state":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "region":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "country":
                        $output = @$ipdat->geoplugin_countryName;
                        break;
                    case "countrycode":
                        $output = @$ipdat->geoplugin_countryCode;
                        break;
                }
            }
        }
        return $output;
    }

}