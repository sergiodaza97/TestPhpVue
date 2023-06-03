<?php
require_once('./connection.php');
$pdo=getPdo();

$_POST = json_decode(file_get_contents("php://input"), true);

function permisos() {  
  if (isset($_SERVER['HTTP_ORIGIN'])){
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
      header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");
      header('Access-Control-Allow-Credentials: true');      
  }  
  if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))          
        header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");
    exit(0);
  }
}
permisos();


$opcion = (isset($_POST['option'])) ? $_POST['option'] : '';
$search_id = (isset($_POST['id_search'])) ? $_POST['id_search'] : '';
$search_object = (isset($_POST['object'])) ? $_POST['object'] : '';
$search_buyer = (isset($_POST['buyer'])) ? $_POST['buyer'] : '';
$search_status = (isset($_POST['status'])) ? $_POST['status'] : '';

$object = (isset($_POST['object'])) ? $_POST['object'] : '';
$description = (isset($_POST['description'])) ? $_POST['description'] : '';
$type_m = (isset($_POST['type_m'])) ? $_POST['type_m'] : '';
$budget = (isset($_POST['budget'])) ? $_POST['budget'] : '';
$start_date = (isset($_POST['start_date'])) ? $_POST['start_date'] : '';
$start_time = (isset($_POST['start_time'])) ? $_POST['start_time'] : '';
$closing_date = (isset($_POST['close_date'])) ? $_POST['close_date'] : '';
$closing_time = (isset($_POST['close_time'])) ? $_POST['close_time'] : '';

        
switch($opcion){
	case 1:
        if ($search_status == 1 || $search_status == 2 || $search_status == 3 || $search_status == null || $search_status == '') {
            if (($search_id == null || $search_id == '') && ($search_object == null || $search_object == '') && ($search_buyer == null || $search_buyer == '') && ($search_status == null || $search_status == '')) {
                $sql = "SELECT * FROM records";
                $consult = $pdo->prepare($sql);
                $consult->execute();
                $register=$consult->fetchALL(PDO::FETCH_ASSOC);
                break;
            }else{
                if ($search_id != null && ($search_object == null || $search_object == '') && ($search_buyer == null || $search_buyer == '') && ($search_status == null || $search_status == '')) {
                    $sql = "SELECT * FROM records WHERE id = '$search_id'";
                    $consult = $pdo->prepare($sql);
                    $consult->execute();
                    $register=$consult->fetchALL(PDO::FETCH_ASSOC);
                    break;
                }elseif ($search_id != null && $search_object != null && ($search_buyer == null || $search_buyer == '') && ($search_status == null || $search_status == '')) {
                    $sql = "SELECT * FROM records WHERE id = '$search_id' AND object = '$search_object'";
                    $consult = $pdo->prepare($sql);
                    $consult->execute();
                    $register=$consult->fetchALL(PDO::FETCH_ASSOC);
                    break;
                }
                // elseif ($search_id != null && ($search_object == null || $search_object == '') && $search_buyer != null && ($search_status == null || $search_status == '')) {
                //     $sql = "SELECT * FROM records WHERE id = '$search_id' AND description = '$search_buyer' AND status = '$search_status'";
                //     $consult = $pdo->prepare($sql);
                //     $consult->execute();
                //     $register=$consult->fetchALL(PDO::FETCH_ASSOC);
                //     break;
                // }
                elseif ($search_id != null && ($search_object == null || $search_object == '') && ($search_buyer == null || $search_buyer == '') && $search_status != null) {
                    $sql = "SELECT * FROM records WHERE id = '$search_id' AND status = '$search_status'";
                    $consult = $pdo->prepare($sql);
                    $consult->execute();
                    $register=$consult->fetchALL(PDO::FETCH_ASSOC);
                    break;
                }
                elseif ($search_id != null && $search_object != null && ($search_buyer == null || $search_buyer == '') && $search_status != null) {
                    $sql = "SELECT * FROM records WHERE id = '$search_id' AND status = '$search_status' AND object = '$search_object";
                    $consult = $pdo->prepare($sql);
                    $consult->execute();
                    $register=$consult->fetchALL(PDO::FETCH_ASSOC);
                    break;
                }
                // elseif ($search_id != null && $search_object != null && $search_buyer != null && ($search_status == null || $search_status == '')) {
                //     $sql = "SELECT * FROM records WHERE id = '$search_id' AND status = '$search_buyer'";
                //     $consult = $pdo->prepare($sql);
                //     $consult->execute();
                //     $register=$consult->fetchALL(PDO::FETCH_ASSOC);
                //     break;
                // }
                // elseif ($search_id != null && ($search_object == null || $search_object == '') && $search_buyer != null && $search_status != null ) {
                //     $sql = "SELECT * FROM records WHERE id = '$search_id' AND buyer = '$search_buyer' AND status = '$search_status'";
                //     $consult = $pdo->prepare($sql);
                //     $consult->execute();
                //     $register=$consult->fetchALL(PDO::FETCH_ASSOC);
                //     break;
                // }
                elseif (($search_id == null || $search_id == '') && $search_object != null  && ($search_buyer == null || $search_buyer == '') && ($search_status == null || $search_status == '') ) {
                    $sql = "SELECT * FROM records WHERE object = '$search_object'";
                    $consult = $pdo->prepare($sql);
                    $consult->execute();
                    $register=$consult->fetchALL(PDO::FETCH_ASSOC);
                    break;
                }
                // elseif (($search_id == null || $search_id == '') && $search_object != null  && $search_buyer != null && ($search_status == null || $search_status == '')) {
                //     $sql = "SELECT * FROM records WHERE object = '$search_object' AND description = '$search_buyer'";
                //     $consult = $pdo->prepare($sql);
                //     $consult->execute();
                //     $register=$consult->fetchALL(PDO::FETCH_ASSOC);
                //     break;
                // }
                elseif (($search_id == null || $search_id == '') && $search_object != null  && ($search_buyer == null || $search_buyer == '') && $search_status != null ) {
                    $sql = "SELECT * FROM records WHERE object = '$search_object' AND status = '$search_status";
                    $consult = $pdo->prepare($sql);
                    $consult->execute();
                    $register=$consult->fetchALL(PDO::FETCH_ASSOC);
                    break;
                }
                // elseif (($search_id == null || $search_id == '') && ($search_object == null || $search_object == '')  && $search_buyer != null && $search_status != null ) {
                //     $sql = "SELECT * FROM records WHERE description = '$search_buyer' AND status = '$search_status";
                //     $consult = $pdo->prepare($sql);
                //     $consult->execute();
                //     $register=$consult->fetchALL(PDO::FETCH_ASSOC);
                //     break;
                // }
                // elseif ($search_id != null && $search_object != null  && $search_buyer != null && $search_status != null ) {
                //     $sql = "SELECT * FROM records WHERE object = '$search_object' AND status = '$search_status AND id = '$search_id'";
                //     $consult = $pdo->prepare($sql);
                //     $consult->execute();
                //     $register=$consult->fetchALL(PDO::FETCH_ASSOC);
                //     break;
                // }
                elseif (($search_id == null || $search_id == '') && ($search_object == null || $search_object == '')  && ($search_buyer == null || $search_buyer == '') && $search_status != null ) {
                    $sql = "SELECT * FROM records WHERE status = '$search_status'";
                    $consult = $pdo->prepare($sql);
                    $consult->execute();
                    $register=$consult->fetchALL(PDO::FETCH_ASSOC);
                    break;
                }
            }
        }else{
            if ($search_id != null && ($search_object == null || $search_object == '') && ($search_buyer == null || $search_buyer == '')) {
                $sql = "SELECT * FROM records WHERE id = '$search_id'";
                $consult = $pdo->prepare($sql);
                $consult->execute();
                $register=$consult->fetchALL(PDO::FETCH_ASSOC);
                break;
            }elseif ($search_id != null && $search_object != null && ($search_buyer == null || $search_buyer == '')) {
                $sql = "SELECT * FROM records WHERE id = '$search_id' AND object = '$search_object'";
                $consult = $pdo->prepare($sql);
                $consult->execute();
                $register=$consult->fetchALL(PDO::FETCH_ASSOC);
                break;
            }
            // elseif ($search_id != null && ($search_object == null || $search_object == '') && $search_buyer != null) {
            //     $sql = "SELECT * FROM records WHERE id = '$search_id' AND description = '$search_buyer'";
            //     $consult = $pdo->prepare($sql);
            //     $consult->execute();
            //     $register=$consult->fetchALL(PDO::FETCH_ASSOC);
            //     break;
            // }
            // elseif ($search_id != null && $search_object != null && $search_buyer != null ) {
            //     $sql = "SELECT * FROM records WHERE id = '$search_id' AND object = '$search_object' AND ";
            //     $consult = $pdo->prepare($sql);
            //     $consult->execute();
            //     $register=$consult->fetchALL(PDO::FETCH_ASSOC);
            //     break;
            // }
            elseif (($search_id == null || $search_id == '') && $search_object != null  && ($search_buyer == null || $search_buyer == '') ) {
                $sql = "SELECT * FROM records WHERE object = '$search_object'";
                $consult = $pdo->prepare($sql);
                $consult->execute();
                $register=$consult->fetchALL(PDO::FETCH_ASSOC);
                break;
            }
            // elseif (($search_id == null || $search_id == '') && $search_object != null  && $search_buyer != null) {
            //     $sql = "SELECT * FROM records WHERE object = '$search_object' AND description = '$search_buyer'";
            //     $consult = $pdo->prepare($sql);
            //     $consult->execute();
            //     $register=$consult->fetchALL(PDO::FETCH_ASSOC);
            //     break;
            // }
            // elseif ($search_id != null && $search_object != null  && $search_buyer != null) {
            //     $sql = "SELECT * FROM records WHERE id = '$search_id' AND object = '$search_object' AND description = '$search_buyer'";
            //     $consult = $pdo->prepare($sql);
            //     $consult->execute();
            //     $register=$consult->fetchALL(PDO::FETCH_ASSOC);
            //     break;
            // }
            else{
                $sql = "SELECT * FROM records";
                $consult = $pdo->prepare($sql);
                $consult->execute();
                $register=$consult->fetchALL(PDO::FETCH_ASSOC);
                break;
            }
        }
        break;
    case 2:
        $sql = "INSERT INTO `records` (`id`, `object`, `description`, `currency`, `budget`, `start_date`, `start_time`, `closing_date`, `closing_time`, `status`) VALUES (NULL, '$object', '$description', '$type_m', '$budget', '$start_date', '$start_time', '$closing_date', '$closing_time', '1');";
        $consult = $pdo->prepare($sql);
        $consult->execute(); 
        $register= true;
        break;
    case 3:
        $sql = "SELECT * FROM activity";
                $consult = $pdo->prepare($sql);
                $consult->execute();
                $register=$consult->fetchALL(PDO::FETCH_ASSOC);
        break;        
    case 4:
        $sql = "SELECT * FROM records";
        $consult = $pdo->prepare($sql);
        $consult->execute();
        $register=$consult->fetchALL(PDO::FETCH_ASSOC);
        $format = 'Y-m-d'; 
        $date = date($format);
        $format_time = 'h:i:s';
        $time = date($format_time);
        foreach($register as $row => $value) {   
            if($value['status'] == 1){
                $id = $value['id'];
                if($value['start_date'] < $date && $value['closing_date'] > $date){
                    $consulta = "UPDATE records SET status = '3' WHERE id = '$id' ";		
                    $resultado = $pdo->prepare($consulta);
                    $resultado->execute();
                    $register = $resultado;
                }elseif($value['start_date'] == $date){
                    if($value['start_time'] < $time){
                        $consulta = "UPDATE records SET status = '3' WHERE id = '$id' ";		
                        $resultado = $pdo->prepare($consulta);
                        $resultado->execute();
                        $register = $resultado;
                    }
                }
            }
            if($value['status'] == 1 || $value['status'] == 3){
                $id = $value['id'];
                if($value['start_date'] > $date && $value['closing_date'] < $date){
                    $consulta = "UPDATE records SET status = '2' WHERE id = '$id' ";		
                    $resultado = $pdo->prepare($consulta);
                    $resultado->execute();
                    $register = $resultado;
                }elseif($value['closing_date'] == $date){
                    if($value['closing_time'] < $time){
                        $consulta = "UPDATE records SET status = '2' WHERE id = '$id' ";		
                        $resultado = $pdo->prepare($consulta);
                        $resultado->execute();
                        $register = $resultado;
                    }
                }
            }
        }             
        break;         
    
}
print json_encode($register, JSON_UNESCAPED_UNICODE);
$conexion = NULL;
?>
