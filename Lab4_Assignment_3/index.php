<?php

$error = '';
$name = '';
$email = '';
$phone = '';
$message = '';

function clean_text($string)
{
 $string = trim($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["name"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
 }
 else
 {
  $name = clean_text($_POST["name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$name))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }
 if(empty($_POST["email"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="text-danger">Invalid email format</label></p>';
  }
 }
 if(empty($_POST["phone"]))
 {
  $error .= '<p><label class="text-danger">Phone is required</label></p>';
 }
 else
 {
  $subject = clean_text($_POST["phone"]);
 }
 if(empty($_POST["message"]))
 {
  $error .= '<p><label class="text-danger">Message is required</label></p>';
 }
 else
 {
  $message = clean_text($_POST["message"]);
 }

 if($error == '')
 {
  $file_open = fopen("contact_data.csv", "a");
  $no_rows = count(file("contact_data.csv"));
  if($no_rows > 1)
  {
   $no_rows = ($no_rows) + 1;
  }
  $form_data = array(
   'sr_no'  => $no_rows,
   'name'  => $name,
   'email'  => $email,
   'phone' => $phone,
   'message' => $message
  );
  fputcsv($file_open, $form_data);
  $error = '<label class="text-success">Thank you for contacting us</label>';
  $name = '';
  $email = '';
  $subject = '';
  $message = '';
  header('Location: page2.php');
 }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Assignment 3</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    
</head>


<body>
    <div class="container">
        <div class="col-md-6" id="formID">
            
            <form method="post" enctype="multipart/form-data">
                <h3>Contact Form</h3><br/>
                
                <?php echo $error; ?>
                
                <div class="form-group">
                    <label>Enter Name</label>
                    <input type="text" name="name" placeholder="Enter Name" class="form-control" value="<?php echo $name; ?>" /> 
                </div>
                
                <div class="form-group">
                    <label>Enter Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>" />
                </div>
                
                <div class="form-group">
                    <label>Enter Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="Enter Phone" value="<?php echo $phone; ?>" />
                </div>
                
                <div class="form-group">
                    <label>Enter Message</label>
                    <textarea name="message" class="form-control" placeholder="Enter Message">
                        <?php echo $message; ?>
                    </textarea>
                </div>
                
                <div class="form-group" align="center">
                    <input type="submit" name="submit" class="btn btn-info" value="Submit"/>
                </div>
            
            </form>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>