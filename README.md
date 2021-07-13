# jQuery による ajax( GET ) の基本サンプル
# #PG-01 : JS
```javascript
formData = new Object();
formData["name"] = $("#fld").val();
```
```javascript
$("#message").text( data.name );

$("<span>")
    .css( "color", "red" )
    .text( data.name )
    .appendTo( $("#content") )
;
```   
# #PG-01 : PHP : 要 isset チェック

$json = new stdClass;

$json->name = $_GET["name"];
