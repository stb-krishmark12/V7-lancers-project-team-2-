<!DOCTYPE html>
<html lang="en">
<?php

session_start();

if(!isset($_SESSION["id"])){
  header("location:login.html");
}

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "ecart";



// Create connection
$connect = new mysqli($host, $dbusername, $dbpassword, $dbname);

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E CART</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link  href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous"rel="stylesheet">

</head>
<body>
    <!----Navbar--> 

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">E CART</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"  aria-expanded="false" >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link active" href="#home">HOME</a>
              </li>
              <li class="nav-item">
                 <a class="nav-link active" href="#product">PRODUCTS</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link active" href="#about">ABOUT</a>
             </li> 
             <li class="nav-item">
                <a class="nav-link active" href="#contactus">CONTACT US</a>
             </li> 
             
            </ul>
            
            <a href="cart.php">
              <button class="btn p-2 my-lg-2 my-2">SHOW CART</button>

            </a>

            <a href="logout.php">
              <button class="btn p-2 my-lg-2 my-2">LOGOUT</button>

            </a>


            

            
        </div>
      </nav>


      <!----Home--> 

      <section id="home">
        <h1 class="text-center">"CEREALS"MILLETS"NUTS"</h1>
        <p>How many types of millets do you know? Need Help? Get Good quality Grains here!!</p>
        <div class="input-group m-4">
          <input type="text" class="form-control" placeholder="Search product" >
          <button class="btn search" >SEARCH</button>
        </div>
        
        </div>
      </section>

      <!----products-->
      <section id="product">
        <div class="container m-5">
          <h1 class="text-center my-5">OUR PRODUCTS</h1>
          <div class="row">
           

           
    <?php
    $query = "SELECT * FROM products";
    $statement=mysqli_query($connect,$query);
    $total_row = mysqli_num_rows($statement);
    ?>
        
            <?php
            while($row = mysqli_fetch_assoc($statement)){
            ?>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card" id="h500" style="width: 19rem;">
                    <img id="cardimage" src="<?php echo $row["product_image"]?>.png" class="card-img-top" alt="..."/>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row["product_name"]?></h5>
                        <p class="card-text">₹<?php echo $row["product_prize"]?></p>
                        <p class="card-text" hidden><?php echo $row["product_description"]?></p>
                        <p class="card-text" hidden><?php echo $row["product_review"]?></p>
                        <p class="card-text" hidden><?php echo $row["product_quantity"]?></p>
                        <p class="card-text" hidden><?php echo $row["product_id"]?></p>
                        <a href="#" class="btn btn-primary card-link" data-bs-toggle="modal" data-bs-target="#modalId" >Show More</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        
                     

            

          </div>
          
        </div>

      </section>

  



      <!-----About-->

      <section id="about">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
              <img src="about.png" class="img-fluid">

            </div>
            <div class="col-lg-6 col-md-6 col-12 p-lg-5 p-2 my-5">
              <h1>ABOUT US</h1>
              <p>
               We believe the best way to deliver a best quality products is by deeply understanding 
               what people want and how they are satisfied . 
               We assure that every single seed or grain is of its best quality .
               We supply only natural and organic products which is beneficial for the customer health.
               .com (Innovative Retail Concepts Private Limited) is India’s largest online food and grocery store. With over 
               18,000 products and over 
               a 1000 brands in our catalogue you will find everything you are looking for. Right from Millets and cereals, 
               Rice and Dals, Spices and Seasonings to Packaged products we have it all.Choose from a wide range of options in every category, exclusively
               handpicked to help you find the best quality available at the lowest prices. Select a time slot for delivery 
               and your order will be delivered right to your doorstep, anywhere in Bangalore, Hyderabad, Mumbai, Pune, Chennai, Delhi, Noida, Mysore, Coimbatore, Vijayawada-Guntur, Kolkata, Ahmedabad-Gandhinagar, Lucknow-Kanpur, Gurgaon, Vadodara, Visakhapatnam, Surat, Nagpur, Patna, Indore and Chandigarh Tricity You can pay online using your debit / credit card or by cash / sodexo on delivery.
               We guarantee on time delivery, and the best quality!
             </p>
           </div>
            
          </div>

        </div>
      </section>
      
    <!-----contactus-->

      <section id="contactus">
        <div class="container box">
         <div class="row">
          
           <div class="col-lg-6 col-md-6 col-12">
             <h1>CONTACT US</h1>

               <form>
                <div id="social-container">
                  <a href="https://www.facebook.com/v7lancersOfficial" class="social"><i class="fa fa-facebook"></i></a>
                  <a href="https://twitter.com/VLancers" class="social"><i class="fa fa-twitter"></i></a>
                  <a href="https://www.linkedin.com/company/v7-lancers/" class="social"><i class="fa fa-linkedin"></i></a>
                  <a href="https://www.instagram.com/v7_lancers/" class="social"><i class="fa fa-instagram"></i></a>
               </div>
              </form>
            
                      
            </div>
            
              
           
          </div>
        </div>
      </section>

      
      <div class="modal fade" id="modalId">
        <div class="modal-dialog modal-dialog bg-success">
          <div class="modal-content" style="transform: scaleX(1.4);">
            <div class="modal-header pb-2">
              <h5 class="font-weight-light ml-4">Description</h5>
            </div>
            <div class="modal-body">
              <div class="row mt-2 p-3">
                <div class="col-md-6">
                  <img src="" width="100%" height="280px" class="rounded"/>
                </div>
                <div class="col-md-6">
                 <h2 class="product_name"></h2> 
                 <p>Review : &nbsp;&nbsp;&nbsp;
                <i class="fa fa-star text-warning ml-2"></i>
                <i class="fa fa-star text-warning ml-2"></i>   
                <i class="fa fa-star text-warning ml-2"></i>   
                <i class="fa fa-star text-warning ml-2"></i>   
                <i class="fa fa-star ml-2"></i>      
                </p>
                <h4><span class="product_price" ></span><span> / </span><span class="product_quantity"></span>g</h4>
                <p style="box-sizing: border-box;"class="product_desc"></p>
                </div>
              </div>
            </div>
            <div class="modal-footer">
            <h2 class="product_id" hidden></h2> 
              <button type="button" class="btn btn-primary"id="addtocart" >ADD TO CART</button>
              <button type="button" class="btn btn-primary" id="wishlist">ADD TO WHISHLIST</button>
            </div>
          </div>
        </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).ready(function(){
    
   $(".card-link").click(function(){
   $(".rounded").attr("src",$(this).parent().siblings().attr("Src"));
   $(".product_name").text($(this).siblings("h5").text());
   $(".product_desc").text($(this).siblings("p:nth(1)").text());
   $(".product_price").text($(this).siblings("p:nth(0)").text());
   $(".product_quantity").text($(this).siblings("p:nth(3)").text());
   $(".product_id").text($(this).siblings("p:nth(4)").text());
   });
   $(window).resize(function (){
   if($(window).width() < 600){
   $(".modal-content").css("transform" , "scaleX(1)");
   }
   else{
    $(".modal-content").css("transform" , "scaleX(1.4)");
   }
   });
   $("#addtocart").click(function(){
                var productid = $(this).siblings("h2").text();
                // var qnty = $("#product_input").val();
                $.ajax({
                    url: "submit.php",
                    type: "POST",
                    data: {
                        action: "addtocart",
                        productid: productid
                    },
                    success: function () {
                        alert("Product Added Successfully");
                    }
                })
            });
     });
</script>
    
</body>
</html>