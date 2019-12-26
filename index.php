<html>
    <head>
        <title>TITANS CHESS</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <center><br>
            <h1>Titans Chess</h1><br>
            <div align="center" class="w3-content w3-section" width="1300" height="600">
                <img class="mySlides" src="IMG/img(5).jpg" width="1300" height="600">
                <img class="mySlides" src="IMG/img(5).jpg" width="1300" height="600">
                <img class="mySlides" src="IMG/img(4).jpg" width="1300" height="600">
                <img class="mySlides" src="IMG/img(2).jpg" width="1300" height="600">
                <img class="mySlides" src="IMG/img(1).jpg" width="1300" height="600">
                <!--<img class="mySlides" src="IMG/img(3).jpg" width="1200" height="600">-->
            </div><br>
        </center>
         <div class="box">
             <form class="bo" action="index.php" method="post">
            <h1>Login</h1>
          <input type="text" name="umail" placeholder="User e-mail">
          <input type="password" name="upswd" placeholder="Password">
          <input type="submit" name="sub1" value="Login">  
        </form>
             <?php  
                if(isset($_POST["sub1"])){  

                if(!empty($_POST['umail']) && !empty($_POST['upswd'])) {  
                    $user=$_POST['umail'];  
                    $pass=$_POST['upswd'];  

                    include 'DB/database.php';  
                    
                    $query=mysqli_query($conn,"SELECT * FROM users WHERE mail='".$user."' AND pswd='".$pass."'");  
                    $numrows=mysqli_num_rows($query);  
                    if($numrows!=0)  
                    {  
                    while($row=mysqli_fetch_assoc($query))  
                    {  
                    $dbusername=$row['mail'];  
                    $dbpassword=$row['pswd'];  
                    }  

                    if($user == $dbusername && $pass == $dbpassword)  
                    {  
                    session_start();  
                    $_SESSION['mail']=$user;  
                    header("Location: PHP/homepg.php");  
                    }  
                    } else {  
                    echo '<script language="javascript">alert("Invalid username or password!!")</script>'; 
                        header("Location: index.php");
                    }  

                } else {  
                    echo '<script language="javascript">alert("All fields are required!")</script>';  
                }  
                }  
            ?>  
        <form class="bo1" action="PHP/register.php" method="post">
            <h1>or</h1>  
                 <input type="submit" name="" value="Sign Up">
             </form>
             </div>
        <script type="text/javascript">
        var slideIndex = 0;
        carousel();
        function carousel()
        {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++)
            {
              x[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > x.length) {slideIndex = 1}
            x[slideIndex-1].style.display = "block";
            setTimeout(carousel, 3000);
        }
    </script>
    </body>
</html>