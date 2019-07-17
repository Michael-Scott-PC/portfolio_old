<!DOCTYPE html>
<?php
    $error = '';
    $success = '';
    // check for post data
    if (filter_has_var(INPUT_POST, 'submit')) 
    {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $subject = htmlspecialchars($_POST['subject']);
        $message = htmlspecialchars($_POST['message']);
        
    // check required fields
        if (!empty($name) && !empty($email) && !empty($subject) && !empty($message))
        {
            // Passed, now check Email
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
            {
                // Failed
                $error = "Please use a valid email";
            } else 
                {
                    // Passed
                    $myEmail = 'michaelenochs@michaelenochs.com';
                    //$email_subject = $subject;
                    //$email_message = $message;
                    // Email headers
                    $headers = "MIME-Version: 1.0" ."\r\n";
                    $headers .= "Content-Type: text/html; charset=utf-8" . "\r\n";
                    $headers .= "From: " .$name. "<".$email.">". "\r\n";
                
                    if (mail($myEmail, $subject, $message, $headers))
                    {
                        $success = "Your email has been sent";
                    }
                
                }
        }
            else
            {
                $error = "Please fill in all fields";
            }
    }

?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Abel|Hind|Work+Sans" rel="stylesheet">
        <script>
            function openMenu(){
                document.getElementById('menu-links').classList.toggle('open');
            }
            function transformX(x){
                x.classList.toggle('change');
            }
        </script>
        <style>
            * {
                margin: 0;
                padding: 0;
                outline: none;
                box-sizing: border-box;
            }
            html, body{
                height: 100%;
            }
            html{
                overflow: scroll;
                overflow-x: hidden;
            }
            #main {
                min-height: 100%;
                padding-bottom: 25px;
            }
            #content{
                overflow: auto;
            }
            ::-webkit-scrollbar {
                width: 0px;  /* remove scrollbar space */
            }
            body {
                background-color: #0b4e79;
                width: 100%;
                min-width: 100%;
                
            }
            header{
                height: 3.5rem;
                width: 100%;
                border-bottom: 3px #9db2cf solid;
                box-shadow: 0px 2px 10px #9db2cf;
                background-color: #0b4e79;
                margin-top: 0px;
            }
            h1.header-name{
                display: inline-block;
                font-family: 'Work Sans', sans-serif;
                font-size: 1rem;
                font-variant-caps: petite-caps;
                text-align: center;
                text-shadow: 2px 2px 0px #002b4b;
                float: left;
                width: 25%;
                height: 100%;
                color: #FFF;
                margin: 0px;
                margin-top: 0px;
                padding-top: 5px;
            }
            h1.send-email{
                display: block;
                font-family: 'Work Sans', sans-serif;
                font-size: 1.5rem;
                font-variant-caps: petite-caps;
                text-align: center;
                text-shadow: 2px 2px 0px #002b4b;
                width: 100%;
                height: 100%;
                color: #FFF;
                margin: 0px;
                margin-top: 55px;
                padding-top: 5px;
            }
            p.validation-message{
                text-align: center;
                margin-bottom: -5px;
                font-size: 1.25rem;
                font-weight: bold;
            }
            form{
                /*border: 1px #fff solid; */
                /*display: block;*/
                margin-top: 10px;
                width: 75%;
                height: 100%;
                text-align: center;
                margin-left: 13%;
                padding-bottom: 55px;
            }
            label{
                color: #FFF;
                font-family: 'Abel', sans-serif; 
            }
            input{
                border-radius: 4px;
                text-align: center;
                font-family: 'Abel', sans-serif;
                font-weight: bold;
                width: 80%;
                height: 1.5rem;
                box-shadow: 0px 2px 10px #002b4b;
            }
            textarea{
                border-radius: 4px;
                font-family: 'Abel', sans-serif;
                width: 80%;
                box-shadow: 0px 2px 10px #002b4b;
            }
            .send-button{
                font-family: 'Abel', sans-serif;
                font-size: 1.15rem;
                width: 20%;
                height: 30px;
                color: #fff;
                text-shadow: 2px 2px 0px #002b4b;
                background-color: #0b4e79;
                border-radius: 4px;
                border-color: #4e6285;
                box-shadow: 0px 2px 10px #002b4b;
                margin-top: 8px;
            }
            .send-button:hover{
                background-color: #b0c9ed;
            }
            img.logo{
                display: inline-block;
                width: 15%;
                height: 100%;
                margin-left: 65px;
            }
            nav{
                display: inline-block;
                width: 13%;
                height: 100%;
                float: right;
                margin: 0px;
                margin-top: opx;
            }
            span{
                background-color: #FFF;
                border-radius: 10px;
                -o-border-radius: 10px;
                -ms-border-radius: 10px;
                -moz-border-radius: 10px;
                -webkit-border-radius: 10px;
            }
            span.toggle-bar1{
                display: block;
                width: 60%;
                height: 8%;
                /*margin: 13px 10px 5px 13px;*/
                margin: 5px;
                margin-left: 8px;
                margin-top: 16px;
            }
            span.toggle-bar2{
                display: block;
                width: 60%;
                height: 8%;
                /*margin: 5px 6px 5px 13px;*/
                margin: 5px;
                margin-left: 8px;
                
            }
            span.toggle-bar3{
                display: block;
                width: 60%;
                height: 9%;
               /* margin: 5px 6px 5px 13px; */
                margin: 5px;
                margin-left: 8px;
            }
            .change .toggle-bar1{
                -webkit-transform: rotate(-45deg) translate(-3px, 8px);
                transform: rotate(-45deg) translate(-3px, 8px);
            }
            .change .toggle-bar2{
                opacity: 0;
            }
            .change .toggle-bar3{
                -webkit-transform: rotate(45deg) translate(-3px, -7px);
                transform: rotate(45deg) translate(-3px, -7px);
            }
            div.span-container{
                height: 95%;
                width: 100%;
                margin-top: 0px;
            }
            span{
                padding: 1px;
            }
            /*div.slide-in-menu{
                display: block;
                width: 100%;
                margin-top: 5px;
            }*/
            li{
                /*border: 1px red solid; */
                display: inline-block;
                list-style-type: none;
                color: #FFF;
                width: 24%;
            }
            li a{
                /*border: 1px solid;*/
                font-family: 'Hind', sans-serif;
                display: block;
                color: #FFF;
                text-decoration: none;
                text-align: center;
            }
            li a:active{
                background-color: #b0c9ed;
                color: #000;
            }
            .current-link{
                background-color: #b0c9ed;
            }
            .closed{
                position: relative;
                right: -4000px;
                /*transition: right .5s ease-out;
                background: #9db2cf;*/
            }
            .open{
                border-left: 3px #9db2cf solid;
                border-right: 3px #9db2cf solid;
                max-width: 100%;
                right: 0;
                /*transform: translateX(0%);*/
                transition: right .5s ease-out, background 2s;
                box-shadow: 0px 2px 10px #9db2cf;
                margin-top: -2px;
                background: #0b4e79;
            }
            
            section.form-section{
                /*background-image: linear-gradient(#002b4b, #435174);*/
                background-image: linear-gradient(#0b4e79, #cddff8);
                /*height: 75vh;
                margin-bottom: 10px;*/
                /*position: relative;*/
            }
            img.github{
                display: inline-block;
                box-shadow: 2px 2px 5px #002b4b;;
                width: 15%;
                height: 5%;
                margin-bottom: 15px;
            }
            img.instagram{
                display: inline-block;
                box-shadow: 2px 2px 0px #002b4b;
                width: 7%;
                height: 100%;
                border-radius: 8px;
                margin-left: 25px;
                margin-top: 15px;
                margin-bottom: 15px;
            }
            #footer {
                position: relative;
                margin-top: 25px;              
                clear: both;
                text-align: center;
                /*height: 40px;*/
            }
            div#sidenav{
                overflow-x: hidden;
            }
            ul#menu-links{
                border-bottom: 2px #9db2cf solid;
                box-shadow: 0px 5px #d9e6f8;
                z-index: 1;
                height: 2.5rem;
                padding-top: 7px;
            }
            @media screen and (orientation:landscape) {
                header{
                    height: 4rem;
                }
                h1.header-name{
                    display: inline-block;
                    font-family: 'Work Sans', sans-serif;
                    font-size: 1.5rem;
                    padding-top: 5px;
                }
                img.logo{
                    width: 10%;
                }
                li a:hover{
                    background-color: #b0c9ed;
                }
                img.logo{
                    margin-left: 18%;
                }
                nav{
                    padding-right: 10px;
                }
                span{
                    float: right;
                }
                span.toggle-bar1{
                    display: block;
                    width: 55%;
                    height: .3rem;
                    margin-top: 15px;
                }
                span.toggle-bar2{
                    display: block;
                    width: 55%;
                    height: .3rem;
                }
                span.toggle-bar3{
                    display: block;
                    width: 55%;
                    height: .3rem;
                }
                .change .toggle-bar1{
                    -webkit-transform: rotate(-45deg) translate(-3px, 8px);
                    transform: rotate(-45deg) translate(-15px, 18px);
                }
                .change .toggle-bar3{
                    -webkit-transform: rotate(45deg) translate(-3px, -7px);
                    transform: rotate(45deg) translate(-3px, -7px);
                }
                .closed{
                    right: -950px;
                }
                .open{
                    right: 0;
                }
                ul#menu-links{
                    height: 2.5rem;
                    padding-top: 5px;
                    font-size: 1.5rem;
                }
                /*main#main{
                    padding-top: 125px;
                }*/
                h2{
                    font-size: 2rem;
                }
                img.github{
                    margin-left: auto;
                    margin-right: 10%;
                }
                img.instagram{
                    /*margin: auto;*/
                }
                div.social-media{
                    align-content: center;
                    margin: auto;
                }
        
            }
            @media screen and (min-width: 750px) {
                header{
                    height: 6rem;
                }
                h1.header-name{
                    display: inline-block;
                    font-family: 'Work Sans', sans-serif;
                    font-size: 1.75rem;
                    padding-top: 15px;
                }
                li a:hover{
                    background-color: #b0c9ed;
                }
                img.logo{
                    margin-left: 18%;
                }
                nav{
                    padding-right: 10px;
                }
                span{
                    float: right;
                }
                span.toggle-bar1{
                    display: block;
                    width: 60%;
                    height: .3rem;
                    margin-top: 30px;
                }
                span.toggle-bar2{
                    display: block;
                    width: 60%;
                    height: .3rem;
                }
                span.toggle-bar3{
                    display: block;
                    width: 60%;
                    height: .3rem;
                }
                .change .toggle-bar1{
                    -webkit-transform: rotate(-45deg) translate(-3px, 8px);
                    transform: rotate(-45deg) translate(-15px, 18px);
                }
                .change .toggle-bar3{
                    -webkit-transform: rotate(45deg) translate(-3px, -7px);
                    transform: rotate(45deg) translate(-3px, -7px);
                }
                .open{
                    right: 0;
                }
                ul#menu-links{
                    height: 2.5rem;
                    padding-top: 5px;
                    font-size: 1.5rem;
                }
                /*main#main{
                    padding-top: 125px;
                }*/
                h1.send-email{
                    font-size: 2.25rem;
                }
                input{
                    height: 2rem;
                    width: 50%;
                    font-size: 1.55rem;
                }
                textarea{
                    width: 50%;
                }
                label{
                    font-size: 1.65rem;
                }
                form{
                    margin-left: 12%;
                    height: 80%;
                }
                button.send-button{
                    margin-top: 30px;
                    height: 2rem;
                    font-size: 1.25rem;
                }
                img.instagram{
                    height: auto;
                    border-radius: 20px;
                }
            @media screen and (min-width: 1000px) {
                header{
                    height: 5.5rem;
                    border: none;
                    box-shadow: none;
                }
                h1.header-name{
                    font-size: 2rem;
                    padding-top: 10px;
                    border: none;
                }
                nav{
                    display: none;
                }
                img.logo{
                    width: 7%;
                    margin-left: 20%;
                }
                span.toggle-bar1{
                    margin-top: 20px;
                }
                .closed{
                    right: 0px;
                }
                .open{
                    display: inline-block;
                }
                ul#menu-links{
                    display: inline-block;
                    width: 100%;
                    height: 3.5rem;
                    padding-top: 10px;
                    font-size: 1.5rem;
                    background: #0b4e79;
                }
                li a:hover{
                    background-color: #b0c9ed;
                    color: #002b4b;
                }
                img.github{
                    margin-left: 40%;
                }
                img.github{
                    margin-left: auto;
                    margin-right: 5%;
                    width: 5%;
                    margin-bottom: 55px;
                }
                img.instagram{
                    /*margin: auto;*/
                    border-radius: 7px;
                    width: 3%;
                    margin-bottom: 55px;
                }
                h1.send-email{
                    font-size: 2.5rem;
                }
                div#sidenav{
                    margin-right: -40px;
                }
                 ul#menu-links{
                     height: 100%;
                     padding-top: 0px;
                 }
            }
               /* @media screen and (min-width: 1200px) {
                    nav{
                        padding-right: 25px;
                    }
                    span.toggle-bar1{
                        margin-top: 50px;
                    }
                    .closed{
                        right: -3200px;
                    }
                    .open{
                        right: 0;
                    }       
                }*/
        
        
        </style>
        <title>Contact | Michael Enochs</title>
    </head>
    <body>
        <header id="header">
            <h1 class="header-name">Michael Enochs</h1>
            <img class="logo" src="img/logo_draft55_65.jpg" alt="Logo of a person working hard at a desk with laptop and books surrounding him.">
            <nav onclick="openMenu()">
                <div class="nav-toggle" onclick="transformX(this)">
                    <span class="toggle-bar1"></span>
                    <span class="toggle-bar2"></span>
                    <span class="toggle-bar3"></span>
                </div>
            </nav>
            <div id="sidenav" class="slide-in-menu">
                <ul id="menu-links" class="closed">
                    <li class="left-end"><a class="home" href="index.html">Home</a></li>
                    <li><a class="projects" href="projects.html">Projects</a></li>
                    <li><a class="bootstrap-index" href="bootstrap_index.html">Bootstrap</a></li>
                    <li class="right-end"><a class="contact" href="contact_page.php">Contact</a></li>
                </ul>
            </div>
        </header>
        <main role="main" id="main">
            <div id="content">
                <br>
                <h1 class="send-email">Send Email</h1>
                <br>
                <br>
                <?php        
                    if ( isset($error) ) 
                    {
                        echo('<p class="validation-message" style="color: red;">'.htmlentities($error)."</p>\n");
                        unset($error);
                    }
                    if ( isset($success) ) 
                    {
                        echo('<p class="validation-message" style="color: green;">'.htmlentities($success)."</p>\n");
                        unset($success);
                    }
                ?>
                <section class="form-section">
                    <form method="post">
                        <label for="name" class="name-label">Name: </label>
                            <br>
                            <input type="text" name="name" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
                        <br>
                        <br>
                        <label for="email" class="email-label">Email: </label>
                            <br>
                            <input type="text" name="email" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
                        <br>
                        <br>
                        <label for="subject" class="subject-label">Subject: </label>
                            <br>
                            <input type="text" name="subject" value="<?php echo isset($_POST['subject']) ? $subject : '';?>" class="subject">
                        <br>
                        <br>
                        <label for="message" class="email-label">Message: </label>
                            <br>
                            <textarea type="text" name="message" rows="8" cols="30" value="<?php echo isset($_POST['message']) ? $message : '';?>"></textarea>
                        <br>
                        <button type="submit" name="submit" class="send-button">Send</button>
                    </form>
                </section>
            </div>
        </main>
        <footer id="footer">
            <div class="social-media">
                <a href="https://github.com/Michael-Scott-PC"><img class="github" src="img/GitHub_Logo_White_header_blue_bg.png" alt="Github Logo"></a>
                <a href="https://www.instagram.com/mikey_e_/?hl=en"><img class="instagram" src="img/instagram_logo.jpg" alt="Instagram Logo"></a>
            </div>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </body>
</html>