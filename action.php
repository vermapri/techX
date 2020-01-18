<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    </head>


<?php
include 'db.php';
$phone_notify=NULL;
$name_notify='';
if(isset($_POST['create'])){
    $name=$_POST['name'];
    $name_notify=$name;
    $gmail=$_POST['gmail'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];
    $phone_notify=$phone;
    $gender=$_POST['gender'];
    $user=$_POST['user'];
    $image=$_POST['image'];
    $upload="uploads/".$image;
    $q="INSERT INTO `login_user`(`name`, `gmail`, `password`, `phone`,`gender`,`user`,`image`) VALUES(?,?,?,?,?,?,?)";
    $stmt=$conn->prepare($q);
    $stmt->bind_param("sssssss",$name,$gmail,$password,$phone,$gender,$user,$upload);
    $stmt->execute();
}
if($phone_notify!=NULL){
    // Account details
	$apiKey = urlencode('6ftJDiIIw3o-A1gpWr6us6SVTteGni0NwvzYoS8v3I');
	
	// Message details
	$numbers = array((int)$phone_notify);
	$sender = urlencode('TXTLCL');
    $message = rawurlencode('WELCOME TO THE ABESEC '.$name_notify);
    
 
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
    // Process your response here
    $obj = json_decode($response);
    
    //echo (string)$obj;
    if($obj->status=="success") {
        $success="
        <div class=\"alert alert-success\" role=\"alert\">
          <center> You have successfully entered..</center><br>
           <a href=\"https://localhost/admin/admin.php\" class=\"alert-link\"><center>Go to home.</center></a>
       </div>";
       echo $success;
    } else {
       $msg=$obj->errors[0]->message;
        $error="
             <div class=\"alert alert-danger\"  role=\"alert\">
             <center>$msg</center> <br>
             <a href=\"https://localhost/admin/admin.php\" class=\"alert-link\"><center>Go to home.</center></a>
             </div>";
             echo $error;
        
    }
} else {
    $lost="
    <div class=\"alert alert-primary\" width=50% role=\"alert\">
    <center>Something went wrong.....</center><br>
   <a href=\"https://localhost/admin/admin.php\" class=\"alert-link\"><center>Go to home.</center></a>
</div>";
echo $lost;
}
?>
</html>