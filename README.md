# jQuery による ajax( GET ) の基本サンプル
# #01 JS

formData = new Object();
    
formData["name"] = $("#fld").val();

$("#message").text( data.name );
    
# #02 PHP

$json = new stdClass;

$json->name = $_GET["name"];
