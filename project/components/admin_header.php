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
   background-color: var(--main-color);
}

.delete-btn{
   background-color: var(--red);
   box-shadow: 1px 1px 15px var(--red);
}

.inline-btn:hover,
.inline-option-btn:hover,
.inline-delete-btn:hover,
.btn:hover,
.delete-btn:hover,
.option-btn:hover{
   background-color: var(--black);
}

.header{
   position: fixed;
   top: 0; left: 0; bottom: 0;
   background-color: #0B1957;
   border-right: var(--border);
   background-color: var(--main-color2);
   width: 30rem;
   padding: 2rem;
   z-index: 1100;
}

.header .logo{
   display: block;
   text-align: center;
   font-size: 2.5rem;
   color: var(--main-color);
   padding-bottom: 1rem;
   font-weight: bold;
}

.header .navbar{
   padding:2rem 0;
   margin-bottom: 8rem;
}

.header .navbar a{
   display: block;
   border-radius: .5rem;
   margin: 1.2rem 0;
   font-size:2rem;
   color: var(--black);
   padding:1.5rem 1.7rem;
   background-color: var(--light-bg);
}

.header .navbar a:hover{
   background-color: #A5D1E1;
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
   box-shadow: 1px 1px 15px var(--red);
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
}

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
   border: var(--border1);
   border-radius: .5rem;
   padding: 1.5rem;
   font-size: 1.8rem;
   color: var(--light-color);
   background-color: var(--light-bg);
   margin: 1rem 0;
}

.grid .box-container{
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






<header class="header">
   <div id="close-btn"><i class="fas fa-times"></i></div>

   <a href="dashboard.php" class="logo">AdminPanel.</a>

   <nav class="navbar">
      <a href="dashboard.php"><i class="fas fa-home"></i><span>home</span></a>
      <a href="listings.php"><i class="fas fa-building"></i><span>listings</span></a>
      <a href="users.php"><i class="fas fa-user"></i><span>users</span></a>
      <a href="admins.php"><i class="fas fa-user-gear"></i><span>admins</span></a>
      <a href="messages.php"><i class="fas fa-message"></i><span>messages</span></a>
   </nav>

   <a href="update.php" class="btn">update account</a>
   <div class="flex-btn">
      <a href="login.php" class="option-btn">login</a>
      <a href="register.php" class="option-btn">register</a>
   </div>
   <a href="../components/admin_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn"><i class="fas fa-right-from-bracket"></i><span>logout</span></a>

</header>

<div id="menu-btn" class="fas fa-bars"></div>