
<header class="header">

   <!-- <nav class="navbar nav-1">
      <section class="flex">
         <a href="home.php" class="logo"><i class="fas fa-house"></i>MyHome</a>

         <ul>
            <li><a href="post_property.php">post property<i class="fas fa-paper-plane"></i></a></li>
         </ul>
      </section>
   </nav> -->

   <nav class="navbar nav-2">
      <section class="flex">


      <a href="home.php" class="logo" style="font-weight: bold;">Immob<span style="color: #caa661;">.</span></a>
         <div id="menu-btn" class="fas fa-bars"></div>
         
         <div class="menu">
            <ul>
               <li><a href="#">my listings<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="dashboard.php">dashboard</a></li>
                     <li><a href="post_property.php">post property</a></li>
                     <li><a href="my_listings.php">my listings</a></li>
                  </ul>
               </li>
               <li><a href="#">options<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="search.php">filter search</a></li>
                     <li><a href="listings.php">all listings</a></li>
                  </ul>
               </li>
               <li><a href="#">help<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="about.php">about us</a></i></li>
                     <li><a href="contact.php">contact us</a></i></li>
                     <li><a href="contact.php#faq">FAQ</a></i></li>
                  </ul>
               </li>
               <li><a href="post_property.php">post property<i class="fas fa-paper-plane"></i></a></li>
            </ul>
         </div>

         <div class="icons">
            <ul>
               <li><a href="saved.php"><i class="far fa-heart"></i></a></li>
               <li><a href="requests.php"><i class="fa fa-bell" aria-hidden="true"></i></a></li>
               <li><a href="#"><i class="fa fa-user"></i> <i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="login.php">login now</a></li>
                     <li><a href="register.php">register new</a></li>
                     <?php if($user_id != ''){ ?>
                     <li><a href="update.php">update profile</a></li>
                     <li><a href="components/user_logout.php" onclick="return confirm('logout from this website?');">logout</a>
                     <?php } ?></li>
                  </ul>
               </li>
            </ul>
         </div>
      </section>
   </nav>

</header>



















<!-- <header>
   <a href="#" class="logo">immob<span>.</span></a>

   <nav class="navbaaar">
      <ul>
         <li><a href="#">my listings<i class="fas fa-angle-down"></i></a>
            <ul>
               <li><a href="dashboard.php">dashboard</a></li>
               <li><a href="post_property.php">post property</a></li>
               <li><a href="my_listings.php">my listings</a></li>
            </ul>
         </li>
         <li><a href="#">options<i class="fas fa-angle-down"></i></a>
            <ul>
               <li><a href="search.php">filter search</a></li>
               <li><a href="listings.php">all listings</a></li>
            </ul>
         </li>
         <li><a href="#">help<i class="fas fa-angle-down"></i></a>
            <ul>
               <li><a href="about.php">about us</a></i></li>
               <li><a href="contact.php">contact us</a></i></li>
               <li><a href="contact.php#faq">FAQ</a></i></li>
            </ul>
         </li>
      </ul>
   </nav>

   <div class="iconns">
      <a href="#" class="fas fa-heart"></a>
      <a href="#" class="fas fa-shopping-cart"></a>
      <a href="#" class="fas fa-user"></a>
   </div>
</header> -->



<!-- header section ends -->