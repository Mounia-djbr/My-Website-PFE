<?php

include '../components/connect.php';
// if(isset($_COOKIE['admin_id'])){
//    $admin_id = $_COOKIE['admin_id'];
// }else{
//    $admin_id = '';
   
// }

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING); 
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING); 

   $select_admins = $conn->prepare("SELECT * FROM `admins` WHERE name = ? AND password = ? LIMIT 1");
   $select_admins->execute([$name, $pass]);
   $row = $select_admins->fetch(PDO::FETCH_ASSOC);

   if($select_admins->rowCount() > 0){
      setcookie('admin_id', $row['id'], time() + 60*60*24*30, '/');
      header('location:dashboard.php');
   }else{
      $warning_msg[] = 'Incorrect username or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">


   <style>
   @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400&display=swap');

:root{
   --main-color:#26aec0;
   --main-color2:#fff;
   --orange:#FFE998;
   --red:#ff0000;
   --light-color:#666;
   --light-bg:#eee;
   --white:#fff;
   --black:#333;
   --box-shadow:0 .5rem 1rem rgba(0,0,0,0.2);
   --border:.1rem solid rgba(0,0,0,0.1);
   --border1: 1rem solid rgba(0,0,0,0);
}

*{
   font-family: 'Montserrat', sans-serif;
   margin: 0; padding: 0;
   box-sizing: border-box;
   outline: none; border: none;
   text-decoration: none;
}

*::selection{
   background-color: var(--main-color);
   color: var(--white);
}

*::-webkit-scrollbar{
   height: .5rem;
   width: 1rem;
}

*::-webkit-scrollbar-track{
   background-color: transparent;
}

*::-webkit-scrollbar-thumb{
   background-color: var(--main-color);
}

html{
   font-size: 62.5%;
   overflow-x: hidden;
   scroll-behavior: smooth;
   scroll-padding-top: 5rem;
}

body{
   background-color: var(--light-bg);
   padding-left: 30rem;
   /* padding-bottom: 7.5rem; */
}

section{
   padding: 3rem 2rem;
   max-width: 1200px;
   margin: 0 auto;
}

.heading{
   margin-bottom: 2rem;
   text-align: center;
   text-transform: capitalize;
   color: var(--black);
   font-size: 3rem;
}

.empty{
   width: 100%;
   background-color: var(--white);
   padding: 1.5rem;
   text-align: center;
   font-size: 2rem;
   color: red;
   border: var(--border);
   box-shadow: var(--box-shadow);
   border-radius: .5rem;
   text-transform: capitalize;
}


.form-container{
   height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
}

.form-container form{
   width: 50rem;
   border-radius: .5rem;
   padding: 2rem;
   border: var(--border);
   text-align: center;
   background-color: var(--white);
   box-shadow: var(--box-shadow);
}

.form-container form h3{
   padding-bottom: 1rem;
   font-size: 2.5rem;
   color: var(--black);
   text-transform: capitalize;
}

.form-container form p{
   padding-top: .7rem;
   padding-bottom: 1.2rem;
   font-size:1.8rem;
   color: var(--light-color);
}

.form-container form p span{
   color: var(--red);
}

.form-container form .box{
   width: 100%;
   border-radius: .5rem;
   padding: 1.4rem;
   font-size: 1.8rem;
   color: var(--black);
   border: var(--border);
   margin: 1rem 0;
}



/* media queries  */

@media (max-width:991px){

   html{
      font-size: 55%;
   }

   body{
      padding-left: 0;
   }

   #menu-btn{
      display: block;
   }

   .header #close-btn{
      display: block;
   }

   .header{
      left: -30rem;
      border-right: none;
      transition: .2s linear;
   }

   .header.active{
      left: 0;
      box-shadow: 0 0 0 100vw rgba(0,0,0,.7);
   }

}

@media (max-width:768px){

   .view-property .details .images-container img{
      height: 30rem;
      width: 40rem;
   }

}

@media (max-width:450px){

   html{
      font-size: 50%;
   }

   .dashboard .box-container{
      grid-template-columns:1fr;
   }

   .grid .box-container{
      grid-template-columns: 1fr;
   }

   .listings .box-container{
      grid-template-columns: 1fr;
   }

   .flex-btn{
      flex-flow: column;
   }

   .view-property .details .images-container img{
      height: 20rem;
      width: 30rem;
   }

}
</style>


</head>
<body style="padding-left: 0;">

<!-- login section starts  -->

<section class="form-container" style="min-height: 100vh;">

   <form action="" method="POST">
      <h3>welcome back!</h3>
      <p>default name = <span>admin1</span> & password = <span>admin1</span></p>
      <input type="text" name="name" placeholder="enter username" maxlength="20" class="box" required oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" placeholder="enter password" maxlength="20" class="box" required oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="login now" name="submit" class="btn">
   </form>

</section>

<!-- login section ends -->


















<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include '../components/message.php'; ?>

</body>
</html>