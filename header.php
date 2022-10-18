<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
   
    .center {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .header-grid {
            display: grid;
            justify-content: left;
            grid-template-columns: auto auto auto auto;
            gap: 200px;
            padding: 10px;

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
    .icon-label:hover{
       border-radius: 12px;
       background-color: #73C7E9;
       box-shadow: 5px 5px 10px black;
       padding: 10px;
       scale: 1.2;
    }
    .icon-label:active{
        animation: 1s alternate radial-fade;
    }
    @keyframes radial-fade {
        0%{
            scale: 1.25;
            opacity: 1;
        }
        25%{
            scale: 1.4;
            opacity: 0.75;
        }
        75%{
            scale: 1.6;
            opacity: 0.25;
        }
        100%{
            scale: 1.8;
            opacity: 0;
        }
    }
    i:hover {
        cursor: pointer;
    }

    @media only screen and (min-width: 340px) and (max-width: 900px){

        .header-grid {
            display: grid;
            justify-content: center;
            gap: 5px;
            grid-template-columns: auto auto auto auto;

        }

    }

</style>

<html>

<body>



    <span class="center header-grid">
        <div class="logo-container">
            <a href="index.php">
                <div class="logo center" style='font-size: 10px;'>Retro Gaming</div>
            </a>
            <br />
            <span class="username-display">Hello,&nbsp; <?php
            
            if( $_SESSION['username'] === null){
                $_SESSION['username'] = "Guest";
            } else{
                $_SESSION['username'] = $_SESSION['username'];
            }
            

             echo $_SESSION['username'];
            
            ?></span>
        </div>

        <!-- cart icon -->
        <div class="icon-label center">
            <a href="cart.php">
                <i class="fa-solid fa-cart-shopping"></i>
            </a>

            <div class="icon-label-style" style="translate: 15px -12px;">
                Cart
            </div>
        </div>

        <!-- user icon -->
        <div class="icon-label center">
            <a href="registration.php">
                <i class="fa-solid fa-user-astronaut"></i>

                <div class="icon-label-style" style="translate: -0.5px -12px;">
                    Account
                </div>
            </a>
        </div>

        <!-- logout icon -->
        <div class="icon-label center">
            <i id="sign-out-button" class="fa-sharp fa-solid fa-arrow-right-from-bracket"></i>

            <div class="icon-label-style" style="translate: 0px -12px;">
                Sign out
            </div>
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
        if ($uri == '/registration.php?logout=true' and $_SESSION['username'] !== null and $_SESSION['username'] !== "Guest") {
            session_unset();
            session_destroy();

            echo "<script> window.top.location = 'logoutsplash.php' </script>";
        } 
    ?> 


</body>

</html>