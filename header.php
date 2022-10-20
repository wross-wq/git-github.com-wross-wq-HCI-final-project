<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
    @media only screen and (min-width: 360px) {}

    .center {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .header-grid {
        display: grid;
        grid-template-columns: auto auto auto auto;

    }

    .name {

        padding-right: 50px;

    }

    .logo {
        background-color: lightgrey;
        height: 80px;
        width: 80px;
        border-radius: 100px;
        opacity: 0.6;
    }

    .logo-container {
        display: grid;
        grid-template-columns: auto;
        padding-right: 100px;
    }

    a {
        text-decoration: none;
        color: black;
    }

    i {
        margin: 20px;
    }

    .username-display {
        color: brown;
        ;
    }

    /* Hide scrollbar for Chrome, Safari and Opera */
    .scrollbar-hidden::-webkit-scrollbar {
        display: none;
    }

    /* Hide scrollbar for IE, Edge add Firefox */
    .scrollbar-hidden {
        -ms-overflow-style: none;
        scrollbar-width: none;
        /* Firefox */
    }

    .icon-label {
        display: grid;
        gap: 0;
        grid-template-columns: auto;
    }

    .fa-solid,
    .fa-cart-shopping,
    .fa-user-astronaut {
        opacity: 0.75;

    }

    .icon-label-style {
        font-size: 13px;
        translate: 15px;
        opacity: 0.75;

    }

    i:hover {
        cursor: pointer;
    }
</style>

    <?php

        $search = '';

        $errors = array('search' => '');

         //check search
        if(empty($_POST['search']))
            $errors['search'] = "notfound.php";
        else {
            $city = $_POST['search'];
        if(!preg_match('/^[a-zA-Z\s\.\-]+$/', $city))
            $errors['search'] = 'can only contain letters and spaces';
}
    ?>

<html>

<body>

    <span class="center header-grid">
        <div class="logo-container">
            <a href="index.php">
                <div class="logo center" style='font-size: 10px;'>Retro Gaming</div>
            </a>
            <br />
            <span class="username-display">Hello,&nbsp; <?= $_SESSION['username']; ?></span>
        </div>

        <!-- cart icon -->
        <div class="icon-label center">
            <a href="cart.php">
                <i class="fa-solid fa-cart-shopping"></i>
            </a>

            <div class="icon-label-style" style="translate: 15px;">
                Cart
            </div>
        </div>

        <!-- user icon -->
        <div class="icon-label center">
            <a href="registration.php">
                <i class="fa-solid fa-user-astronaut"></i>

                <div class="icon-label-style">
                    Profile
                </div>
            </a>
        </div>

        <!-- logout icon -->
        <div class="icon-label center">
            <i id="sign-out-button" class="fa-sharp fa-solid fa-arrow-right-from-bracket"></i>

            <div class="icon-label-style">
                Logout
            </div>
        </div>

        <!-- search bar -->
        <div>
            <form action="header.php" method="POST" >
                <div class="w3-container">
                  <input class="w3-input w3-border" type="text" name="search" value="<?php echo $search; ?>">
                  <input type="submit" name="search" value="submit" class="w3-btn w3-gray" style="float: right" />
                </div>
            </form>
        </div>
       

    </span>
    <script>
       
        document.getElementById('sign-out-button').addEventListener('click', function() {
            // TODO: add prompt alert to continue or decline
            window.top.location = 'registration.php?logout=true';

            
        });
    </script>
    <?php 
        $uri = $_SERVER['REQUEST_URI'];
        if ($uri == '/registration.php?logout=true' and $_SESSION['username'] !== null) {
            session_unset();
            session_destroy();

            echo "<script> window.top.location = 'logoutsplash.php' </script>";

        } 
    ?> 


</body>

</html>