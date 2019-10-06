<?php

    session_start();

if (isset($_POST['email']))
{
	//correct validation? Yes
	$everything_OK=true;

	//checking name
	$nick = $_POST['nick'];

	//checking name's lenght
	if ((strlen($nick)<5) || (strlen($nick)>40))
	{
		$everything_OK=false;
		$_SESSION['e_nick']="Your name should contain 5-40 signs!";
	}

	//checking phone number
	$phone = $_POST['phone'];
	if ((strlen($phone)<9) || (strlen($phone)>9))
	{
		$everything_OK=false;
		$_SESSION['e_phone']="Your phone number should contain min. 8 numbers!";
	}

	// checking email
	$email = $_POST['email'];
	$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

	if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
	{
		$everything_OK=false;
		$_SESSION['e_email']="Pass correct e-mail!";
	}

	//checking message
	$text = $_POST['text'];

	if ((strlen($text)<15) || (strlen($text)>5000))
	{
		$everything_OK=false;
		$_SESSION['e_text']="Message should contain min. 15 signs!";
	}

	if($everything_OK==true)
	{

		@$addressto = "wdzwonek97@gmail.com";
		@$subject = "Message from Portfolio website";
		@$content = "Customer's name: ".$nick."\n"
								."E-mail: ".$email."\n"
								.'Content-type: text/html; charset=iso-8859-2'."\r\n"
								."Phone number: ".$phone."\n"
								."Message: ".$text."\n";

		//wywołanie funkcji mail()
		if (mail($addressto, $subject, $content, $email))
		{
			$_SESSION['correct_text']="Message has been sent!";
		} else {
			$_SESSION['false_text']="Message has not been sent. Try again!";
		}

	}

}

?>

<!Doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/fontello.css">
    <title>Wojciech Dzwończyk - Portfolio</title>

    <script src="https://kit.fontawesome.com/6a331c31d1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
      $("#me").click(function(){
        $("#about").slideToggle(500);
      });
        $("#xp").click(function(){
        $("#experiences").slideToggle();
      });
        $("#portfolio_circle").click(function(){
        $("#portfolio").slideToggle();
      });
        $("#skill_circle").click(function(){
        $("#skills").slideToggle();
      });
        $("#contact_circle").click(function(){
        $("#contact").slideToggle();
      });
    });
    </script>
</head>

<body>
    <div class="wrapper">
        <header>
            <h1>Wojciech Dzwończyk</h1>
        </header>
        <main>
            <section class="circle_menu">
                <div class="circle_menu_item" id="me">
                    <i class="icon-user-1"></i>
                    <h4>About me</h4>
                    <a href="#about" class="menu_link"></a>
                </div>
                <div class="circle_menu_item" id="xp">
                    <i class="icon-archive"></i>
                    <h4>Experience</h4>
                    <a href="#experiences" class="menu_link"></a>
                </div>
                <div class="circle_menu_item" id="portfolio_circle">
                    <i class="demo-icon icon-briefcase"></i>
                    <h4>Portfolio</h4>
                    <a href="#portfolio" class="menu_link"></a>
                </div>
                <div class="circle_menu_item" id="skill_circle">
                    <i class="icon-tools"></i>
                    <h4>Skills</h4>
                    <a href="#me" class="menu_link"></a>
                </div>
                <div class="circle_menu_item">
                    <i class="icon-download"></i>
                    <h4>Download CV</h4>
                </div>
                <div class="circle_menu_item" id="contact_circle">
                    <i class="icon-chat"></i>
                    <h4>Contact</h4>
                    <a href="#me" class="menu_link"></a>
                </div>
            </section>
            <section class="circle_menu_content" id="about">
                <div class="about_me">
                    <span class="capital_letter">A</span>
                    <span class="small_letter">bout me</span>

                    <div class="about_me_content">
                        <div class="about_me_first">
                            <div class="photo">
                                <img src="me1.png" alt="profile">
                            </div>

                            <p><span class="name">Name:</span> Wojciech Dzwończyk</p>
                            <p><span class="name">Date of birth:</span> 4 June 1999</p>
                            <p><span class="name">Email:</span><a href="mailto:wdzwonek97@gmail.com"> wdzwonek97@gmail.com</a></p>

                            <div class="social_media_container">
                                <div class="social_media_item">
                                    <i class="fab fa-facebook-f"></i>
                                </div>
                                <div class="social_media_item">
                                    <i class="fab fa-instagram"></i>
                                </div>
                                <div class="social_media_item">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="social_media_item">
                                    <i class="fas fa-mobile-alt"></i>
                                </div>
                            </div>

                        </div>
                        <div class="about_me_second">
                            <p>Morbi et felis porta, dignissim arcu ac, volutpat dolor. Pellentesque ultrices elit lorem, non dignissim nunc scelerisque ac. Quisque nec tortor arcu. Quisque posuere elit erat, quis maximus nunc rutrum eget. Suspendisse dictum lorem quis dolor consectetur, eget volutpat tellus sodales. Aliquam ut molestie lectus. Ut pellentesque felis ac mi lacinia vehicula. Morbi lacinia posuere aliquet. Aliquam maximus quam sit amet odio viverra, eget porttitor diam luctus. </p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="circle_menu_content" id="experiences">
                <div class="experience">
                    <span class="capital_letter">E</span>
                    <span class="small_letter">xperience</span>

                    <div class="time_line">
                        <div class="timeline-block timeline-block-right">
                              <div class="marker"></div>
                              <div class="timeline-content">
                                 <h3>Computer Network Installer’s supporter</h3>
                                 <span>Ornet Sp. z o.o.</span><br>
                                 <span>June 2019 - July 2019</span>
                                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.</p>
                              </div>
                        </div>

                       <div class="timeline-block timeline-block-left">
                          <div class="marker"></div>
                          <div class="timeline-content">
                             <h3>Apprentice</h3>
                             <span>Idea4me</span><br>
                             <span>Fabruary 2018 - March 2018</span>
                             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.</p>
                          </div>
                       </div>
                    </div>
                    <div style="clear: both;"></div>
                    <span class="capital_letter">E</span>
                    <span class="small_letter">ducation</span>

                    <div class="time_line">
                        <div class="timeline-block timeline-block-right">
                              <div class="marker"></div>
                              <div class="timeline-content">
                                 <h3>Business Academy Aarhus</h3>
                                 <span>2019 - present</span>
                                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.</p>
                              </div>
                        </div>

                       <div class="timeline-block timeline-block-left">
                          <div class="marker"></div>
                          <div class="timeline-content">
                             <h3>Zespół Szkół nr 1 im. prof. Bolesława Krupińskiego w Lubinie</h3>
                             <span>2015 - 2019</span>
                             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.</p>
                          </div>
                       </div>
                    </div>
                </div>
            </section>
            <section class="circle_menu_content" id="portfolio">
                <div class="portfolio">
                    <div class="block">
                        <span class="capital_letter">P</span>
                        <span class="small_letter">ortfolio</span>
                    </div>
                    <div class="portfolio_container">
                        <div class="portfolio_item"><a href="http://historycznepl.000webhostapp.com" target="_blank"><img src="website1.jpg" alt="website1"></a>
                            <div class="portfolio_item_title">
                                <h4>Korepetycje24</h4>
                            </div>
                        </div>
                        <div class="portfolio_item"><a href="#" target="_blank"><img src="website.jpg" alt="website1"></a>
                            <div class="portfolio_item_title">
                                <h4>IT Service</h4>
                            </div>
                        </div>
                        <div class="portfolio_item"><a href="#" target="_blank"><img src="website.jpg" alt="website1"></a>
                            <div class="portfolio_item_title">
                                <h4>IT Service</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="circle_menu_content">
                <div class="skills" id="skills">
                    <span class="capital_letter">S</span>
                    <span class="small_letter">kills</span>

                    <li>
                        <h3>HTML5</h3>
                        <h3>96%</h3><span class="bar"><span class="html"></span></span>
                    </li>
                    <li>
                        <h3>CSS3</h3>
                        <h3>90%</h3><span class="bar"><span class="css"></span></span>
                    </li>
                    <li>
                        <h3>JS</h3>
                        <h3>55%</h3><span class="bar"><span class="js"></span></span>
                    </li>
                </div>
            </section>
            <section class="circle_menu_content">
                <div class="contact" id="contact">
                    <span class="capital_letter">C</span>
                    <span class="small_letter">ontact</span>

                    <form action="#" method="post">
                        <input type="text" name="nick" placeholder="Name" required pattern="[A-Z]{1}[a-z]*+[A-Z]{1}[a-z]*">

                            <?php
                                if(isset($_SESSION['e_nick']))
                                {
                                    echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
                                    unset($_SESSION['e_nick']);
                                }
                             ?>

                        <input type="email" name="email" placeholder="E-mail" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">

                            <?php
                                if(isset($_SESSION['e_email']))
                                {
                                    echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                                    unset($_SESSION['e_email']);
                                }
                             ?>

                        <input type="tel" name="phone" placeholder="Phone" required pattern="[0-9]{9}" title="Phone number has to contain min. 8 numbers!">

                            <?php
                                if(isset($_SESSION['e_phone']))
                                {
                                    echo '<div class="error">'.$_SESSION['e_phone'].'</div>';
                                    unset($_SESSION['e_phone']);
                                }
                             ?>

                        <textarea name="text" required>
                        </textarea>

                            <?php
                                if(isset($_SESSION['e_text']))
                                {
                                    echo '<div class="error">'.$_SESSION['e_text'].'</div>';
                                    unset($_SESSION['e_text']);
                                }
                             ?>
                        <div>
                            <label class="radioContainer">
                                <input type="checkbox" name="policy" value="accept">
                                <span class="square"></span><span class="answer">I accept policy.</span>
                            </label>
                        </div>
                        <input type="submit" value="Submit">
                    </form>
                    <?php
                        if (isset($_SESSION['correct_text']))
                        {
                            echo '<div class="wiadomosc">'.$_SESSION['correct_text'].'</div>';
                            unset($_SESSION['correct_text']);

                        }   elseif (isset($_SESSION['false_text']))

                        {

                            echo '<div class="wiadomosc">'.$_SESSION['false_text'].'</div>';
                            unset($_SESSION['false_text']);
                        }
                    ?>
                </div>
            </section>
        </main>
    </div>
</body>

</html>
