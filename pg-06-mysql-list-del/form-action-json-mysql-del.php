<?php
error_reporting( E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED );
session_cache_limiter('nocache');
session_start();
header( "Access-Control-Allow-Origin: *" );
header( "Content-Type: application/json; charset=utf-8" );

// ***********************************
// データーベース接続情報
// ***********************************
$host = "localhost";
$user = "root";
$password = "";
$dbname = "lightbox";
$connect_string = "mysql:host={$host};dbname={$dbname}";
if ( file_exists( $_SERVER['DOCUMENT_ROOT'] . "/app/connect.php" ) ){
    require_once( $_SERVER['DOCUMENT_ROOT'] . "/app/connect.php" );
}

// ***********************************
// 接続
// ***********************************
$pdo = new PDO( $connect_string, $user, $password );

// ***********************************
// SQL 実行
// ***********************************
$sql = <<<QUERY
delete 
    from 社員マスタ
    where 社員コード = :code
QUERY;

$statement = $pdo->prepare($sql);

foreach( $_GET["code"] as $value ) {

    $statement->bindValue(":code", $value, PDO::PARAM_STR );
    $statement->execute();
    
}


// ***********************************
// JSON データを作成
// ***********************************
$json = new stdClass;
$json->get = $_GET;

// ***********************************
// ブラウザへ返す
// JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT はデバッグ用
// ***********************************
//print json_encode( $json );
print json_encode( $json, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );

?>
