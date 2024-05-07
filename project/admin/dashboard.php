<?php

include '../components/connect.php';

if(isset($_COOKIE['admin_id'])){
   $admin_id = $_COOKIE['admin_id'];
}else{
   $admin_id = '';
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   




   <style>
      @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400&display=swap');

:root{
   --main-color:#c3cedb;
   --main-color2:#200a43;
   --orange:#fbc876;
   --red:#da5739;
   --light-color:#666;
   --light-bg:#eee;
   --white:#fff;
   --black:#333;
   --box-shadow:0 .5rem 1rem rgba(0,0,0,0.1);
   --border:.2rem solid rgba(0,0,0,.3);
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
   background-color: var(--main-color2);
   padding: 1.5rem;
   text-align: center;
   font-size: 2rem;
   color: var(--red);
   border: var(--border);
   box-shadow: var(--box-shadow);
   border-radius: .5rem;
   text-transform: capitalize;
}

.flex-btn{
   display: flex;
   column-gap: 1rem;
   justify-content: space-between;
   align-items: flex-end;
}

.inline-btn,
.inline-option-btn,
.inline-delete-btn,
.btn,
.delete-btn,
.option-btn{
   cursor: pointer;
   padding: 1rem 2.5rem;
   font-size: 1.8rem;
   color: var(--white);
   text-align: center;
   text-transform: capitalize;
   margin-top: 1rem;
   border-radius: .5rem;
   border: var(--border);
}

.btn,
.delete-btn,
.option-btn{
   display: block;
   width: 100%;
}

.inline-btn,
.inline-option-btn,
.inline-delete-btn{
   display: inline-block;
}

.btn{
   background-color: var(--main-color);
}

.option-btn{
   background-color: var(--orange);
}

.delete-btn{
   background-color: var(--red);
}

.inline-btn:hover,
.inline-option-btn:hover,
.inline-delete-btn:hover,
.btn:hover,
.delete-btn:hover,
.option-btn:hover{
   background-color: var(--black);
}

/* .header{
   position: fixed;
   top: 0; left: 0; bottom: 0;
   background-color: var(--white);
   border-right: var(--border);
   background-color: var(--white);
   width: 30rem;
   padding: 2rem;
   z-index: 1100;
}

.header .logo{
   display: block;
   text-align: center;
   font-size: 2.5rem;
   color: var(--black);
   padding-bottom: 1rem;
}

.header .navbar{
   padding:.5rem 0;
}

.header .navbar a{
   display: block;
   border-radius: .5rem;
   margin: 1.2rem 0;
   font-size:1.7rem;
   color: var(--black);
   padding:1.5rem 1.7rem;
   background-color: var(--light-bg);
   border: var(--border);
}

.header .navbar a:hover{
   background-color: var(--black);
   color: var(--white);
}

.header .navbar a i{
   margin-right: 1.2rem;
}

.header .delete-btn i{
   margin-right: 1rem;
}

#close-btn{
   text-align: right;
   padding-bottom: 1rem;
   display: none;
}

#close-btn i{
   height: 4rem;
   width: 4.5rem;
   line-height: 4rem;
   border-radius: .5rem;
   background-color: var(--red);
   color: var(--white);
   font-size: 2.5rem;
   text-align: center;
}

#menu-btn{
   position: sticky;
   top: 1rem; left: 1rem;
   height: 4rem;
   line-height: 4rem;
   width: 4.5rem;
   background-color: var(--black);
   color: var(--white);
   font-size: 2rem;
   border-radius: .5rem;
   text-align: center;
   z-index: 1000;
   display: none;
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
} */

.dashboard .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, 35rem);
   align-items: flex-start;
   justify-content: center;
   gap: 1.5rem;
}

.dashboard .box-container .box{
   text-align: center;
   border-radius: .5rem;
   border: var(--border);
   padding: 2rem;
   box-shadow: var(--box-shadow);
   background-color: var(--white);
   
}

.dashboard .box-container h3{
   font-size: 2.5rem;
   color: var(--black);
   padding-bottom: .5rem;
}

.dashboard .box-container p{
   border: var(--border);
   border-radius: .5rem;
   padding: 1.5rem;
   font-size: 1.8rem;
   color: var(--light-color);
   background-color: var(--light-bg);
   margin: 1rem 0;
}

/* .grid .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, 35rem);
   align-items: flex-start;
   justify-content: center;
   gap: 1.5rem;
}

.grid .box-container .box{
   border-radius: .5rem;
   padding: 2rem;
   padding-top: 1rem;
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   border: var(--border);
   overflow-x: hidden;
}

.grid .box-container .box p{
   line-height: 1.5;
   padding: .5rem 0;
   font-size: 1.8rem;
   color: var(--light-color);
   white-space: pre-line;
   text-overflow: ellipsis;
   overflow-x: hidden;
}

.grid .box-container .box p a,
.grid .box-container .box p span{
   color: var(--main-color);
}

.grid .box-container .box p a:hover{
   text-decoration: underline;
   color: var(--red);
}

.search-form{
   max-width: 50rem;
   margin: 0 auto;
   border-radius: .5rem;
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   border: var(--border);
   padding:1.5rem 2rem;
   display: flex;
   gap: 2rem;
   margin-bottom: 2rem;
}

.search-form input{
   width: 100%;
   font-size: 1.8rem;
   color: var(--black);
}

.search-form button{
   background:none;
   cursor: pointer;
   color: var(--black);
   font-size: 2rem;
}

.listings .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, 35rem);
   align-items: flex-start;
   justify-content: center;
   gap: 1.5rem;
}

.listings .box-container .box{
   border-radius: .5rem;
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   border: var(--border);
   padding: 2rem;
   overflow-x: hidden;
}


.listings .box-container .box .thumb{
   position: relative;
   height: 20rem;
   margin-bottom: 1.5rem;
}

.listings .box-container .box .thumb p{
   position: absolute;
   top: 1rem; left: 1rem;
   background-color: rgba(0,0,0,.5);
   color: var(--white);
   border-radius: .5rem;
   padding:.7rem 1rem;
   font-size: 1.8rem;
}

.listings .box-container .box .thumb p i{
   margin-right: 1rem
}

.listings .box-container .box .thumb img{
   height: 100%;
   width: 100%;
   object-fit: cover;
   border-radius: .5rem;
}

.listings .box-container .box .price{
   font-size: 1.8rem;
   color: var(--red);
}

.listings .box-container .box .price i{
   margin-right: .8rem;
}

.listings .box-container .box .name{
   font-size: 2rem;
   color: var(--black);
   padding: .7rem 0;
   text-overflow: ellipsis;
}

.listings .box-container .box .location{
   color: var(--light-color);
   font-size: 1.7rem;
   padding: .5rem 0;
   text-overflow: ellipsis;
}

.listings .box-container .box .location i{
   margin-right: 1rem;
   color: var(--red);
}

.view-property .details{
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   border: var(--border);
   padding: 2rem;
   border-radius: .5rem;
   overflow-x: hidden;
}

.view-property .details .images-container img{
   height: 40rem;
   object-fit: cover;
   width: 60rem;
   margin-bottom: 3rem;
}

.swiper-pagination-bullets.swiper-pagination-horizontal{
   bottom: 0;
}

.swiper-pagination-bullet{
   background-color: var(--black);
}

.swiper-pagination-bullet-active{
   background-color: var(--main-color);
}

.view-property .details .name{
   font-size: 2rem;
   text-overflow: ellipsis;
   overflow-x: hidden;
   margin-bottom: .5rem;
   padding-top: 1rem;
}

.view-property .details .location{
   padding-top: 1rem;
   font-size: 1.6rem;
   color: var(--light-color);
}

.view-property .details .location i{
   margin-right: 1rem;
   color: var(--red);
}

.view-property .details .info{
   display: flex;
   background-color: var(--light-bg);
   padding: 1.5rem;
   margin: 1.5rem 0;
   justify-content: space-between;
   align-items: center;
   flex-wrap: wrap;
   gap: 2rem;
   border-radius: .5rem;
}

.view-property .details .info p{
   font-size: 1.7rem;
}

.view-property .details .info p span,
.view-property .details .info p a{
   color: var(--light-color);
}

.view-property .details .info p a:hover{
   text-decoration: underline;
}

.view-property .details .info p i{
   margin-right: 1.5rem;
   color: var(--main-color);
}

.view-property .details .title{
   font-size: 2rem;
   color: var(--black);
   padding-bottom: 1.5rem;
   border-bottom: var(--border);
}

.view-property .details .flex{
   margin: 1.5rem 0;
   display: flex;
   justify-content: space-between;
   flex-wrap: wrap;
}

.view-property .details .flex .box{
   flex: 1 1 40rem;
}

.view-property .details .flex .box p{
   padding: .5rem 0;
   font-size: 1.6rem;
   color: var(--light-color);
}

.view-property .details .flex .box i{
   color: var(--main-color);
   margin-right: 1.5rem;
}

.view-property .details .flex .box .fa-times{
   color: var(--red);
}

.view-property .details .description{
   padding-top: 1rem;
   margin: .5rem 0;
   margin-top: .5rem;
   font-size: 1.6rem;
   color: var(--light-color);
   line-height: 2;
}

.view-property .details .save{
   width: 100%;
   background-color: var(--light-bg);
   cursor: pointer;
   padding: 1rem 3rem;
   font-size: 1.8rem;
   color: var(--light-color);
}

.view-property .details .save:hover{
   background-color: var(--main-color);
   color: var(--white);
}

.view-property .details .save i{
   margin-right: 1rem;
   color: var(--black);
}

.view-property .details .save:hover i{
   color: var(--white);
} */



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
<body>
   
<!-- header section starts  -->
<?php include '../components/admin_header.php'; ?>
<!-- header section ends -->

<!-- dashboard section starts  -->

<section class="dashboard">

   <h1 class="heading">dashboard</h1>

   <div class="box-container">

   <div class="box">
      <?php
         $select_profile = $conn->prepare("SELECT * FROM `admins` WHERE id = ? LIMIT 1");
         $select_profile->execute([$admin_id]);
         $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
      ?>
      <h3>welcome!</h3>
      <p><?= $fetch_profile['name']; ?></p>
      <a href="update.php" class="btn">update profile</a>
   </div>

   <div class="box">
      <?php
         $select_listings = $conn->prepare("SELECT * FROM `property`");
         $select_listings->execute();
         $count_listings = $select_listings->rowCount();
      ?>
      <h3><?= $count_listings; ?></h3>
      <p>property posted</p>
      <a href="listings.php" class="btn">view listings</a>
   </div>

   <div class="box">
      <?php
         $select_users = $conn->prepare("SELECT * FROM `users`");
         $select_users->execute();
         $count_users = $select_users->rowCount();
      ?>
      <h3><?= $count_users; ?></h3>
      <p>total users</p>
      <a href="users.php" class="btn">view users</a>
   </div>

   <div class="box">
      <?php
         $select_admins = $conn->prepare("SELECT * FROM `admins`");
         $select_admins->execute();
         $count_admins = $select_admins->rowCount();
      ?>
      <h3><?= $count_admins; ?></h3>
      <p>total admins</p>
      <a href="admins.php" class="btn">view admins</a>
   </div>

   <div class="box">
      <?php
         $select_messages = $conn->prepare("SELECT * FROM `messages`");
         $select_messages->execute();
         $count_messages = $select_messages->rowCount();
      ?>
      <h3><?= $count_messages; ?></h3>
      <p>new messages</p>
      <a href="messages.php" class="btn">view messages</a>
   </div>

   </div>

</section>


<!-- dashboard section ends -->




















<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

<?php include '../components/message.php'; ?>

</body>
</html>