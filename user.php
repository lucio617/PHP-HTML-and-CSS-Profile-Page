<!-- Nishant Tiwari
19BCE0497 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>
<body>
    <?php 
       if(isset($_FILES['image'])){
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $tmp=(explode('.',$_FILES['image']['name']));
        $file_ext=end($tmp);
        
        $extensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$extensions)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        
        if($file_size > 4097152) {
           $errors[]='File size must be exactly 4 MB';
        }
        
        if(empty($errors)==true) {
           move_uploaded_file($file_tmp,"uploads/".$file_name);
           
        }else{
           print_r($errors);
        }
        $path="uploads/$file_name";
        $fname=$_POST['first_name'];
        $lname=$_POST['last_name'];
        $mail=$_POST['email'];
        $uname=$_POST['uname'];

        
     }

    ?>
    <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
        <div class="card p-4">
            <div class=" image d-flex flex-column justify-content-center align-items-center"> <button class="btn btn-secondary"> <img src="<?php echo $path;?>" height="100" width="100" /></button> <span class="name mt-3"><?php echo $fname ?> <?php echo $lname ?></span> <span class="idd"><?php echo $uname ?></span>
                <div class="d-flex flex-row justify-content-center align-items-center gap-2"> <span class="idd1">@<?php echo $uname ?></span> <span><i class="fa fa-copy"></i></span> </div>
                <div class="d-flex flex-row justify-content-center align-items-center mt-3"> <span class="number">1069 <span class="follow">Followers</span></span> </div>
                <div class=" d-flex mt-2"> <button class="btn1 btn-dark">Back</button> </div>
                <div class="text mt-3"> <span><?php echo $fname ?> <?php echo $lname ?> is a creator of minimalistic x bold graphics and digital artwork.<br><br> Artist/ Creative Director by Day #NFT <?php echo $mail ?> with FND night. </span> </div>
                <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"> <span><i class="fa fa-twitter"></i></span> <span><i class="fa fa-facebook-f"></i></span> <span><i class="fa fa-instagram"></i></span> <span><i class="fa fa-linkedin"></i></span> </div>
                <div class=" px-2 rounded mt-4 date "> <span class="join">Joined May,2021</span> </div>
            </div>
        </div>
    </div>
</body>
</html>