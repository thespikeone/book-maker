<?php
require_once("../public/php/data.php");
if(isset($_POST['order'])){
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $adress = $_POST['adress'];
    $id_insta = $_POST['id_insta'];
    $phone_num = $_POST['phone_num'];
    $book_name = $_POST['book_name'];
    $lang = $_POST['lang'];
    $unid = uniqid();
  
    $ins=$pdo->prepare("insert into commande(id_client,email,last_name,first_name,adress,phone_num,lang,book_name,id_insta) values(?,?,?,?,?,?,?,?,?)");
    $ins->execute(array($unid,$email,$lname,$fname,$adress,$phone_num,$lang,$book_name,$id_insta));
    if($ins){
        header('location: ../accepte.php');
    }else{
        echo "Contact adminstrator for more information";
        exit;
    }
   

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FORMULAIRE</title>
    
    <link rel="icon" type="image/x-icon" href="public/img/logo.png" />
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="../public/css/formulaire/formu.css">
</head>

<body>
    <style>
        input, select {
    display: block;
    width: 100%;
    border: 1px solid #222121;
    padding: 11px 20px;
    box-sizing: border-box;
    font-family: 'Montserrat';
    font-weight: 500;
    font-size: 13px;
    border-radius: 5px;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  -o-border-radius: 5px;
  -ms-border-radius: 5px;
    
}
        img {
            max-width: 111% !important;
        }
    </style>
    <div class="main">

        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="../public/img/pic.jpg" alt="">

                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form">
                        <div class="form-row">
                            <div class="form-group">
                                <div class="form-input">
                                    <label for="first_name" class="required">First name</label>
                                    <input type="text" name="first_name" id="first_name" required />
                                </div>
                                <div class="form-input">
                                    <label for="last_name" class="required">Last name</label>
                                    <input type="text" name="last_name" id="last_name" required />
                                </div>
                                <div class="form-input">
                                    <label for="company" class="required">Adress</label>
                                    <input type="text" name="adress" id="adress" required />
                                </div>
                                <div class="form-input">
                                    <label for="email" class="required">Email</label>
                                    <input type="email" name="email" id="email" required />
                                </div>
                                <div class="form-input">
                                    <label for="phone_number" class="required">Phone number</label>
                                    <input type="phone" name="phone_num" id="phone_num" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-select">
                                    <div class="form-input">
                                        <label for="phone_number" class="required">Name of The Book</label>
                                        <input type="text" name="book_name" id="book_name" required />
                                    </div>
                                    <div class="form-input">
                                        <label for="phone_number" class="required">Instagram_id</label>
                                        <input type="text" name="id_insta" id="id_insta" required />
                                    </div>

                                </div>
                                <div class="form-radio">
                                    <div class="label-flex">
                                    <div class="form-group">
                          <label for="state">Langue:</label>
                          <div class="form-select">
                              <select name="lang" id="state">
                                  
                                  <option value="english">Anglais</option>
                                  <option value="french">Français</option>
                              </select>
                              <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                          </div>

                                    </div>
                                    
                                </div>
                                   

                                </div>

                            </div>
                        </div>

                        <div class="form-submit">
                           <input type="submit" value="Submit" class="submit" id="submit" name="order" />
                            
                            <input type="submit" value="Reset" class="submit" id="reset" name="reset" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/nouislider/nouislider.min.js"></script>
    <script src="vendor/wnumb/wNumb.js"></script>
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>