
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

  <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>

	

<body bgcolor = "#FFFFFF">

  <div align = "center">
     <div style = "width:300px; border: solid 1px #333333; " align = "left">
        <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
			
        <div style = "margin:30px">
           
           <form action = "" method = "post">
              <label>UserName  :</label><input  name = "username" /><br /><br />
              <label>Password  :</label><input  name = "password" /><br/><br />
              <input type = "submit" value = " Submit "/><br />
           </form>


           <?php
    
    
    if (empty($_POST["username"])) {
        
        $pass='';   
    }else{
      $user = $_POST['username'];
    }
    if(empty($_POST["password"])){
      
      $pass = ''; 
    }else{
      $pass = $_POST['password'];

    }
        
    $conn = mysqli_connect('localhost','alba','P@ssw0rd');
 
    
    mysqli_select_db($conn, 'login');
 
    $pass=hash('sha256', $pass);

    $consulta = "SELECT password FROM user_login WHERE username=\"$user\";";
  
    $resultat = mysqli_query($conn, $consulta);

    $registre = mysqli_fetch_assoc($resultat);

    if (!empty($registre)) {
              if ($pass == $registre['password']) {
                  echo "Benvingut/da" . $user;
              } else {
                  echo "Contrasenya incorrecte";
              }
          } else {
              echo "No existe ese usuario";
          }  
 
  

    
  ?>
           
         
				
        </div>
			
     </div>
		
  </div>

</body>
	

</html>