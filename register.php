<!-- Live Server link: http://localhost/PHP_Project/MultiPHP/register.php -->

<?php 

  session_start();
  include("config/db/config.php");
  include("config/user_controller/auth.php");

  $authObj = new Auth();

  if(isset($_POST['regBtn'])){
    $msg = $authObj->signup($_POST, $conn);
  }


?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create an Accounts</title>


  <link rel="stylesheet" href="assets/user/CSS/bootstrap.min.css">
  <link rel="stylesheet" href="assets/user/CSS/register.css">

</head>
<body>

  <div class="signup">
    <div class="containerr">

    <!-- Return Messege -->
      <p class="form-control btn btn-success">
              <?php if(isset($msg)){ echo $msg; } ?>
      </p>


      <div id="sign-up-section" class="shadow p-5 form-sec">
        <form action="" method="POST">
          <div class="title">
            <p>Sign Up</p>
            
          </div>
          <div class="mb-3">
            <label for="username" class="form-label">Enter Your UserName:</label>
            <input type="text" name="userName" id="username" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Enter Your E-mail:</label>
            <input type="email" name="email" id="email" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Enter Your Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
          </div>

          <div class="conpass">
            <label for="confirmPassword" class="form-label">Confirm Your Password:</label>
            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" required>
            <p class="con_msg" id="conMsg"></p>
          </div>

          <input type="hidden" value="user" name="role">

          <input type="submit" value="GO!" class="btn form-control btn-primary" id="regBtn" name="regBtn">
          <label for="text" class="submit_label form-control btn btn-warning" id="submit_label">Please Fill-Up the Requrements!</label>

        </form><br>
      </div>
    </div>
  </div>





  <script>

  let submitLabel = document.getElementById("submit_label");
  let regBtn = document.getElementById("regBtn");
  let conMsg = document.getElementById("conMsg");
  let password = document.getElementById("password");
  let confirmPassword = document.getElementById("confirmPassword");

  confirmPassword.addEventListener("keyup", () =>{
    let main_pass = password.value;
    let confirmPass = confirmPassword.value;

    //console.log(main_pass,confirmPass)

    if(main_pass == confirmPass){
      conMsg.innerHTML = "";
      regBtn.style.display = "block";
      submitLabel.style.display = "none";
    }else{
      conMsg.innerHTML = "Password not Matched!";
      regBtn.style.display = "none";
      submitLabel.style.display = "block";
    }

  })


  //nxt

  password.addEventListener("keyup", () =>{
    let main_pass = password.value;
    let confirmPass = confirmPassword.value;

    //console.log(main_pass,confirmPass)

    if(confirmPass == main_pass){
      conMsg.innerHTML = "";
      regBtn.style.display = "block";
      submitLabel.style.display = "none";
    }else{
      conMsg.innerHTML = "Password not Matched!";
      regBtn.style.display = "none";
      submitLabel.style.display = "block";
    }

  })

  </script>
</body>
</html>