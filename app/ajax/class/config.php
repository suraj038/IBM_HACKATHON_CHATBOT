<?php
define("CONFIG_WATSON_WORKSPACE_ID","e6503e32-079c-439f-81d1-5a7ae23bda3b");
define("CONFIG_WATSON_USERNAME","d3b17de7-705b-4f0f-87a7-c9981f082072");
define("CONFIG_WATSON_PASSWORD","QkKmLkChME81");

if(empty($_ENV["VCAP_SERVICES"]))
{ 
   //local dev
   define("mysqlServer","localhost"); 
   define("mysqlDB", "test"); 
   define("mysqlUser","root"); 
   define("mysqlPass","");
//    define("mysqlPort","3306");
} 
else 
{ 
    //running in Bluemix
    $vcap_services = json_decode($_ENV["VCAP_SERVICES" ]);
    if($vcap_services->{'mysql-5.5'}){ //if "mysql" db service is bound to this application
        $db = $vcap_services->{'mysql-5.5'}[0]->credentials;
    }
    else if($vcap_services->{'cleardb'}){ //if cleardb mysql db service is bound to this application
        $db = $vcap_services->{'cleardb'}[0]->credentials;
    } 
    else { 
        echo "Error: No suitable MySQL database bound to the application. <br>";
        die();
    }
    
   define("mysqlServer", $db->hostname . ':' . $db->port); 
   define("mysqlDB", $db->name); 
   define("mysqlUser",$db->username); 
   define("mysqlPass",$db->password);
//    define("mysqlPort","3306");
}
?>