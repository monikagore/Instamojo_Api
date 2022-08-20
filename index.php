<?php
include("config.php");

if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $purpose=$_POST['purpose'];
  $email=$_POST['email'];
  $phone_number=$_POST['number'];
  $amount=$_POST['amount'];

  $sql=mysqli_query($conn,"INSERT INTO `payment_details`(`name`, `purpose`, `email`, `phone_number`, `amount`) VALUES ('$name','$purpose','$email','$phone_number','$amount')");

  if($sql==1){
    echo '<script>alert("Successfully submitted");</script>';
}
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Instamojo Integration</title>
        <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css"
  rel="stylesheet"
/>
<style>
            .gradient-custom-2 {
/* fallback for old browsers */
background: #fccb90;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
}

@media (min-width: 768px) {
.gradient-form {
height: 100vh !important;
}
}
@media (min-width: 769px) {
.gradient-custom-2 {
border-top-right-radius: .3rem;
border-bottom-right-radius: .3rem;
}
}
</style>
</head>
<body>

<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-5">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-12">
               <div class="card-body p-md-5 mx-md-5">
                   <div class="text-center">
                       <h2>Instamojo Payment Gateway</h2>
                   </div><br>
                   <form action="pay.php" method="POST">
                       <div class="form-group">
                           <input type="text" class="form-control" name="name" id="name" placeholder="Name" required/>
                       </div>
                       <br>
                       <div class="form-group">
                            <input type="text" class="form-control" name="purpose" id="purpose" placeholder="Purpose" required/>
                       </div>
                       <br>
                       <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required/>
                       </div>
                       <br>
                       <div class="form-group">
                            <input type="text" minlength="10" maxlength="10" class="form-control" name="number" id="number" placeholder="Phone Number" required/>
                       </div>
                       <br>
                       <div class="form-group">
                            <input type="number" class="form-control" name="amount" id="amount" placeholder="Amount" required/>
                       </div>
                       <br>
                       <div class="form-group">
                       <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit" name="submit" id="submit" value="submit">Submit</button>
                       </div>
                  </form>
               </div>
            </div>           
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>


<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js">
</script>


</html>