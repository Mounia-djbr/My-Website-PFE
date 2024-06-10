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
   <title>My Interests Page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<!-- search filter section starts  -->

<section class="filters" style="padding-bottom: 0;">

   <form action="" method="post">
      <div id="close-filter"><i class="fas fa-times"></i></div>
      <h3>filter your interest</h3>
         
         <div class="flex">
            <div class="box">
            <p>You are</p>
               <select name="bhk" class="input" required>
                  <option value="1">Owner</option>
                  <option value="2">Buyer</option>
                  <option value="3">Tenant</option>
               </select>
            </div>
            <!-- <div class="box">
               <p>enter location</p>
               <input type="text" name="location" required maxlength="50" placeholder="enter ciyt name" class="input">
            </div> -->
            
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
               <p>offer type</p>
               <select name="offer" class="input" required>
                  <option value="sale">sale</option>
                  <option value="resale">resale</option>
                  <option value="rent">rent</option>
               </select>
            </div>
            <div class="box">
               <p>property type</p>
               <select name="type" class="input" required>
                  <option value="flat">flat</option>
                  <option value="house">house</option>
                  <option value="shop">shop</option>
               </select>
            </div>
         </div>
         <input type="submit" value="done" name="filter_search" class="btn">
   </form>

</section>

<br><h1 style="text-align: center; margin-top:20px; margin-bottom: 100px;"><br>Welcome to Immob! We are very excited to have you join us. We are committed to providing you with the best possible services.<br></h1><br>
<!-- search filter section ends -->

<div id="filter-btn" class="fas fa-filter"></div>

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

document.querySelector('#filter-btn').onclick = () =>{
   document.querySelector('.filters').classList.add('active');
}

document.querySelector('#close-filter').onclick = () =>{
   document.querySelector('.filters').classList.remove('active');
}

</script>

</body>
</html>