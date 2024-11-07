<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

require '../src/vendor/autoload.php';
$app = new \Slim\App;

$app->post('/user/register', function (Request $request, Response $response, array $args)
{
    $data=json_decode($request->getBody());
    $uname=$data->username ;
    $pass=$data->password ;
    $servername="localhost" ;
    $password="";
    $username="root";
    $dbname="library";

    try{
        $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO users (username, password) VALUES('". $uname."','".hash('sha256',$pass)."')";
        $conn->exec($sql);
        $response->getBody()->write(json_encode(array("status"=>"success","data"=>null)));

    }catch(PDOException$e){
        $response->getBody()->write(json_encode(array("status"=>"fail","data"=>array("title"=>$e->getMessage()))));
    }
    $conn=null;
    return $response;
}); 

$app->post('/user/auth', function (Request $request, Response $response, array $args)
{
    $data=json_decode($request->getBody());
    $uname=$data->username ;
    $pass=$data->password ;
    //$response->getBody()->write("Hello "."".$fname."".$lname);
    if($uname=="admin" && $pass=="opengate"){
        //$response->getBody()->write(
            //json_encode(array("status"=>"success","token"=>"ttttt.zzzzz.yyyyyy"))
            $key='key';
            $expire=time();
            $payload = [
                'iss'=> 'http://security.org',
                'aud'=>'http://security.com',
                'iat'=> $expire, //creation time
                'exp'=> $expire + 60,
                'data'=>array(
                    "name"=>"chester",
                    "access_level"=>1
                )
            ];//generation of token
            $jwt=JWT::encode($payload, $key, 'HS256');
             $response->getBody()->write(
            json_encode(array("status"=>"success","token"=>$jwt))
             );
    }else{
        $response->getBody()->write(
            json_encode(array("status"=>"fail","data"=>array("title"=>"authentication failed")))
        );
    }
    return $response;
}); 
$app->post('/viewemployee', function (Request $request, Response $response, array $args)
{
    $key ='key';
    $data=json_decode($request->getBody());
    $jwt=$data->token;
    try{
    $decode = jwt::decode($jwt, new Key($key, 'HS256'));
    $response->getBody()->write(
        json_encode(array("status"=>"success","data"=>array("lname"=>"culbengan","fname"=>"chester")))
    );
    }catch(Exception $e){
        echo $e->getMessage();
    }
    //print_r("asdas");
    //var_dump($e);
    // $response->getBody()->write(
    //     json_encode(array("status"=>"success","data"=>array("lname"=>"culbengan","fname"=>"chester")))
    // );
    return $response;
}); 

$app->run();

//go to https://github.com/firebase/php-jwt
//C:\xampp\htdocs\security\src>composer require firebase/php-jwt on cmd