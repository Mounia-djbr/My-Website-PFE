<?php  

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

include 'components/save_send.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>


<!-- home section starts  -->

<div class="home">

   <section class="center">

      <div>
         <video autoplay loop muted plays-inline class="back-video">
            <source src="./images/bg-home111.mp4">
         </video>
      </div>

      <form action="search.php" method="post">
         <h3>find your perfect home</h3>
         <!-- <div class="box">
            <p>enter location <span>*</span></p>
            <input type="text" name="h_location" required maxlength="100" placeholder="enter city name" class="input">
         </div> -->
         
         <div class="flex">
         <div class="box">
            <p>enter location</p>
            <select name="location" class="input" required>
               <option value="">select location</option>
               <?php
               // استرجاع العناوين من قاعدة البيانات
               $select_addresses = $conn->prepare("SELECT * FROM `addresses`");
               $select_addresses->execute();
               if($select_addresses->rowCount() > 0){
                  while($fetch_address = $select_addresses->fetch(PDO::FETCH_ASSOC)){
                     echo '<option value="'.$fetch_address['id'].'">'.$fetch_address['address'].'</option>';
                  }
               }
               ?>
            </select>
            </div>

            <div class="box">
            <p>enter location</p>
            <select name="wilaya" id="wilaya" class="input" required>
               <option value="">Select Wilaya</option>
               <?php
               $select_wilayas = $conn->prepare("SELECT * FROM `wilayas`");
               $select_wilayas->execute();
               while($fetch_wilaya = $select_wilayas->fetch(PDO::FETCH_ASSOC)){
                  echo '<option value="'.$fetch_wilaya['id'].'">'.$fetch_wilaya['nom'].'</option>';
               }
               ?>
            </select>
         </div>

         <div class="box">
            <p>Select Commune</p>
            <select name="commune" id="commune" class="input" required>
               <option value="">Select Commune</option>
               <!-- البلديات ستملأ ديناميكياً باستخدام JavaScript -->
            </select>
         </div>

         <div class="box">
            <p>Code Postal</p>
            <input type="text" name="code_postal" id="code_postal" class="input" readonly>
         </div>
            <div class="box">
               <p>property type <span>*</span></p>
               <select name="h_type" class="input" required>
                  <option value="flat">flat</option>
                  <option value="house">house</option>
                  <option value="shop">shop</option>
               </select>
            </div>
            <div class="box">
               <p>offer type <span>*</span></p>
               <select name="h_offer" class="input" required>
                  <option value="sale">sale</option>
                  <option value="resale">resale</option>
                  <option value="rent">rent</option>
               </select>
            </div>
            <div class="box">
               <p>minimum budget <span>*</span></p>
               <select name="h_min" class="input" required>
                  <option value="5000">5000 DA</option>
                  <option value="10000">10000 DA</option>
                  <option value="15000">15000 DA</option>
                  <option value="20000">20000 DA</option>
                  <option value="30000">30000 DA</option>
                  <option value="40000">40000 DA</option>
                  <option value="50000">50000 DA</option>
                  <option value="100000">100000 DA</option>
                  <option value="500000">500000 DA</option>
                  <option value="1000000">1000000 DA</option>
                  <option value="2000000">2000000 DA</option>
                  <option value="3000000">3000000 DA</option>
                  <option value="4000000">4000000 DA</option>
                  <option value="5000000">5000000 DA</option>
                  <option value="6000000">6000000 DA</option>
                  <option value="7000000">7000000 DA</option>
                  <option value="8000000">8000000 DA</option>
                  <option value="9000000">9000000 DA</option>
                  <option value="10000000">10000000 DA</option>
                  <option value="20000000">20000000 DA</option>
                  <option value="30000000">30000000 DA</option>
                  <option value="40000000">40000000 DA</option>
                  <option value="50000000">50000000 DA</option>
                  <option value="60000000">60000000 DA</option>
                  <option value="70000000">70000000 DA</option>
                  <option value="80000000">80000000 DA</option>
                  <option value="90000000">90000000 DA</option>
                  <option value="100000000">100000000 DA</option>
                  <option value="150000000">150000000 DA</option>
                  <option value="200000000">200000000 DA</option>
               </select>
            </div>
            <div class="box">
               <p>maximum budget <span>*</span></p>
               <select name="h_max" class="input" required>
                  <option value="5000">5000 DA</option>
                  <option value="10000">10000 DA</option>
                  <option value="15000">15000 DA</option>
                  <option value="20000">20000 DA</option>
                  <option value="30000">30000 DA</option>
                  <option value="40000">40000 DA</option>
                  <option value="50000">50000 DA</option>
                  <option value="100000">100000 DA</option>
                  <option value="500000">500000 DA</option>
                  <option value="1000000">1000000 DA</option>
                  <option value="2000000">2000000 DA</option>
                  <option value="3000000">3000000 DA</option>
                  <option value="4000000">4000000 DA</option>
                  <option value="5000000">5000000 DA</option>
                  <option value="6000000">6000000 DA</option>
                  <option value="7000000">7000000 DA</option>
                  <option value="8000000">8000000 DA</option>
                  <option value="9000000">9000000 DA</option>
                  <option value="10000000">10000000 DA</option>
                  <option value="20000000">20000000 DA</option>
                  <option value="30000000">30000000 DA</option>
                  <option value="40000000">40000000 DA</option>
                  <option value="50000000">50000000 DA</option>
                  <option value="60000000">60000000 DA</option>
                  <option value="70000000">70000000 DA</option>
                  <option value="80000000">80000000 DA</option>
                  <option value="90000000">90000000 DA</option>
                  <option value="100000000">100000000 DA</option>
                  <option value="150000000">150000000 DA</option>
                  <option value="200000000">200000000 DA</option>
               </select>
            </div>
         </div>
         <input type="submit" value="search property" name="h_search" class="btn">
      </form>

   </section>

</div>

<!-- home section ends -->























<?php

if(isset($_POST['h_search'])){

   $h_location = $_POST['h_location'];
   $h_location = filter_var($h_location, FILTER_SANITIZE_STRING);
   $h_type = $_POST['h_type'];
   $h_type = filter_var($h_type, FILTER_SANITIZE_STRING);
   $h_offer = $_POST['h_offer'];
   $h_offer = filter_var($h_offer, FILTER_SANITIZE_STRING);
   $h_min = $_POST['h_min'];
   $h_min = filter_var($h_min, FILTER_SANITIZE_STRING);
   $h_max = $_POST['h_max'];
   $h_max = filter_var($h_max, FILTER_SANITIZE_STRING);

   // $select_properties = $conn->prepare("SELECT * FROM `property` WHERE address LIKE '%{$h_location}%' AND type LIKE '%{$h_type}%' AND offer LIKE '%{$h_offer}%' AND price BETWEEN $h_min AND $h_max ORDER BY date DESC");
   // $select_properties = $conn->prepare("SELECT * FROM `property` WHERE address_id LIKE '%{$h_location}%' AND type LIKE '%{$h_type}%' AND offer LIKE '%{$h_offer}%' AND price BETWEEN $h_min AND $h_max ORDER BY date DESC");

   // $select_properties->execute();
   $wilaya = $_POST['wilaya'];
            $wilaya = filter_var($wilaya, FILTER_SANITIZE_STRING);
            $commune = $_POST['commune'];
            $commune = filter_var($commune, FILTER_SANITIZE_STRING);

            $select_properties = $conn->prepare("SELECT * FROM `property` WHERE wilaya_id = ? AND commune_id = ? AND type LIKE ? AND offer LIKE ? AND bhk LIKE ? AND status LIKE ? AND furnished LIKE ? AND price BETWEEN ? AND ? ORDER BY date DESC");
            $select_properties->execute([$wilaya, $commune, "%{$type}%", "%{$offer}%", "%{$bhk}%", "%{$status}%", "%{$furnished}%", $min, $max]);
}elseif(isset($_POST['filter_search'])){

   $location = $_POST['location'];
   $location = filter_var($location, FILTER_SANITIZE_STRING);
   $type = $_POST['type'];
   $type = filter_var($type, FILTER_SANITIZE_STRING);
   $offer = $_POST['offer'];
   $offer = filter_var($offer, FILTER_SANITIZE_STRING);
   $bhk = $_POST['bhk'];
   $bhk = filter_var($bhk, FILTER_SANITIZE_STRING);
   $min = $_POST['min'];
   $min = filter_var($min, FILTER_SANITIZE_STRING);
   $max = $_POST['max'];
   $max = filter_var($max, FILTER_SANITIZE_STRING);
   $status = $_POST['status'];
   $status = filter_var($status, FILTER_SANITIZE_STRING);
   $furnished = $_POST['furnished'];
   $furnished = filter_var($furnished, FILTER_SANITIZE_STRING);

   // $select_properties = $conn->prepare("SELECT * FROM `property` WHERE address_id LIKE '%{$location}%' AND type LIKE '%{$type}%' AND offer LIKE '%{$offer}%' AND bhk LIKE '%{$bhk}%' AND status LIKE '%{$status}%' AND furnished LIKE '%{$furnished}%' AND price BETWEEN $min AND $max ORDER BY date DESC");
   // $select_properties->execute();
   $wilaya = $_POST['wilaya'];
            $wilaya = filter_var($wilaya, FILTER_SANITIZE_STRING);
            $commune = $_POST['commune'];
            $commune = filter_var($commune, FILTER_SANITIZE_STRING);

            $select_properties = $conn->prepare("SELECT * FROM `property` WHERE wilaya_id = ? AND commune_id = ? AND type LIKE ? AND offer LIKE ? AND bhk LIKE ? AND status LIKE ? AND furnished LIKE ? AND price BETWEEN ? AND ? ORDER BY date DESC");
            $select_properties->execute([$wilaya, $commune, "%{$type}%", "%{$offer}%", "%{$bhk}%", "%{$status}%", "%{$furnished}%", $min, $max]);

}else{
   $select_properties = $conn->prepare("SELECT * FROM `property` ORDER BY date DESC LIMIT 6");
   $select_properties->execute();
}

?>
















































<!-- services section starts  -->

<section class="services">

   <h1 class="heading">our services</h1>

   <div class="box-container">
      <div class="card">
         <img src="images/icon-1.png" alt="">
         <div class="card__content">
            <p class="card__title">buy house</p>
            <p class="card__description">Our website offers a wide range of listings, featuring a wide range of properties, from comfortable apartments to luxury properties. Use our advanced search filters to narrow down your options based on location, price, size, amenities and more.</p>
         </div>
      </div>

      <div class="card">
         <img src="images/icon-2.png" alt="">
         <div class="card__content">
            <p class="card__title">rent house</p>
            <p class="card__description">Explore a diverse selection of rental properties that cater to a variety of lifestyles and budgets. Our listings feature apartments, townhomes, single-family homes, and more, situated in vibrant neighborhoods and peaceful communities.</p>
         </div>
      </div>

      <div class="card">
         <img src="images/icon-3.png" alt="">
         <div class="card__content">
            <p class="card__title">sell house</p>
            <p class="card__description">Maximize exposure for your property by leveraging our extensive user base and strategic marketing channels. Our platform empowers you to manage your listing details, connect with potential buyers, and streamline the sales process – all through a user-friendly interface.</p>
         </div>
      </div>
   </div>

</section>

<!-- services section ends -->

<!-- listings section starts  -->

<section class="listings">
   <h1 class="heading">latest listings</h1>
   <div class="box-container">
      <?php
         $total_images = 0;
         $select_properties = $conn->prepare("SELECT * FROM `property` ORDER BY date DESC LIMIT 6");
         $select_properties->execute();
         if($select_properties->rowCount() > 0){
            while($fetch_property = $select_properties->fetch(PDO::FETCH_ASSOC)){
               
            $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_user->execute([$fetch_property['user_id']]);
            $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

            if(!empty($fetch_property['image_02'])){
               $image_coutn_02 = 1;
            }else{
               $image_coutn_02 = 0;
            }
            if(!empty($fetch_property['image_03'])){
               $image_coutn_03 = 1;
            }else{
               $image_coutn_03 = 0;
            }
            if(!empty($fetch_property['image_04'])){
               $image_coutn_04 = 1;
            }else{
               $image_coutn_04 = 0;
            }
            if(!empty($fetch_property['image_05'])){
               $image_coutn_05 = 1;
            }else{
               $image_coutn_05 = 0;
            }

            $total_images = (1 + $image_coutn_02 + $image_coutn_03 + $image_coutn_04 + $image_coutn_05);

            $select_saved = $conn->prepare("SELECT * FROM `saved` WHERE property_id = ? and user_id = ?");
            $select_saved->execute([$fetch_property['id'], $user_id]);

      ?>
      <form action="" method="POST">
         <div class="box">
            <input type="hidden" name="property_id" value="<?= $fetch_property['id']; ?>">
            <?php
               if($select_saved->rowCount() > 0){
            ?>
            <button type="submit" name="save" class="save"><i class="fas fa-heart"></i><span>saved</span></button>
            <?php
               }else{ 
            ?>
            <button type="submit" name="save" class="save"><i class="far fa-heart"></i><span>save</span></button>
            <?php
               }
            ?>
            <div class="thumb">
               <p class="total-images"><i class="far fa-image"></i><span><?= $total_images; ?></span></p> 
               <img src="uploaded_files/<?= $fetch_property['image_01']; ?>" alt="">
            </div>
            <div class="admin">
               <h3><?= substr($fetch_user['name'], 0, 1); ?></h3>
               <div>
                  <p><?= $fetch_user['name']; ?></p>
                  <span><?= $fetch_property['date']; ?></span>
               </div>
            </div>
         </div>
         <div class="box">
            <div class="price"><span><?= $fetch_property['price']; ?></span><span> DA</span></div>
            <h3 class="name"><?= $fetch_property['property_name']; ?></h3>
            <p class="location"><i class="fas fa-map-marker-alt"></i><span><?= $fetch_property['address']; ?></span></p>
            <div class="flex">
               <p><i class="fas fa-house"></i><span><?= $fetch_property['type']; ?></span></p>
               <p><i class="fas fa-tag"></i><span><?= $fetch_property['offer']; ?></span></p>
               <p><i class="fas fa-bed"></i><span><?= $fetch_property['bhk']; ?> Bedrooms</span></p>
               <!-- <p><i class="fas fa-trowel"></i><span><?= $fetch_property['status']; ?></span></p> -->
               <p><i class="fas fa-couch"></i><span><?= $fetch_property['furnished']; ?></span></p>
               <p><i class="fas fa-maximize"></i><span><?= $fetch_property['carpet']; ?>m²</span></p>
            </div>
            <div class="flex-btnn">
               <a href="view_property.php?get_id=<?= $fetch_property['id']; ?>" class="btn">view property</a>
               <input type="submit" value="send enquiry" name="send" class="btn">
         
            </div>
            
         </div>
      </form>
      <?php
         }
      }else{
         echo '<p class="empty">no properties added yet! <a href="post_property.php" style="margin-top:1.5rem;" class="btn">add new</a></p>';
      }
      ?>
      
   </div>

   <div style="margin-top: 2rem; text-align:center;">
      <a href="listings.php" class="inline-btn">view all</a>
   </div>

</section>

<!-- listings section ends -->

<!-- listings section ends -->



<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>
<script>
document.getElementById('wilaya').addEventListener('change', function() {
   var wilayaId = this.value;
   fetch('get_communes.php?wilaya_id=' + wilayaId)
      .then(response => response.json())
      .then(data => {
         var communeSelect = document.getElementById('commune');
         var codePostalInput = document.getElementById('code_postal');
         communeSelect.innerHTML = '<option value="">Select Commune</option>';
         data.communes.forEach(function(commune) {
            communeSelect.innerHTML += '<option value="' + commune.id + '" data-codepostal="' + commune.code_postal + '">' + commune.nom + '</option>';
         });
         communeSelect.addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            codePostalInput.value = selectedOption.getAttribute('data-codepostal');
         });
      });
});
</script>
<script>

   let range = document.querySelector("#range");
   range.oninput = () =>{
      document.querySelector('#output').innerHTML = range.value;
   }

</script>

</body>
</html>




















