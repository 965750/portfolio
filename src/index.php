<?php
	// Message Vars
	$msg = '';
	$msgClass = '';

	// Check For Submit
	if(filter_has_var(INPUT_POST, 'submit')){
		// Get Form Data
		$name = htmlspecialchars($_POST['name']);
		$email = htmlspecialchars($_POST['email']);
		$message = htmlspecialchars($_POST['message']);
        
		// Check Required Fields
		if(!empty($email) && !empty($name) && !empty($message)){
			// Passed
			// Check Email

			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				// Failed
				$msg = 'Please use a valid email';
				$msgClass = 'no';

			} else {
				// Passed
				$toEmail = 'aventhelast@gmail.com';
				$subject = 'Portfolio Kontakt '.$name;
				$body = 'AveN - Kontakt'."\n"
					.'Imie: '.$name."\n"
					.'Email: '.$email."\n"
					.'Wiadomość: '.$message;


				// Email Headers
				$headers .= "Organization: Sender Organization\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
                $headers .= "X-Priority: 3\r\n";
                $headers .= "X-Mailer: PHP". phpversion() ."\r\n";  

				// Additional Headers
				$headers .= "From: " .$name. "<".$email.">". "\r\n";

				if(mail($toEmail, $subject, $body, $headers)){
					// Email Sent
					$msg = 'Your email has been sent';
					$msgClass = 'yes';

				} else {
					// Failed
					$msg = 'Your email was not sent, try again later';
					$msgClass = 'no';
				}
			}
		} else {
			// Failed
			$msg = 'Please fill in all fields';
			$msgClass = 'no';
		}
	}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Adrian Zajac - Portfolio</title>
        <link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700&amp;subset=latin-ext" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/styleBar.css">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">


    </head>

    <body>
        <header>

            <article class="hTop">

            </article>
        </header>
        <div id="overlay">
            <div class="spinner"></div>
        </div>
        <main>
            <!-- Fixed Baner -->
            <article class="barContAll">
                <div class="singleBtnCont menu">
                    <div class="leftPanelCont">
                        <nav>
                            <ul>
                                <li id="home">
                                    <span>Home</span>
                                </li>
                                <li id="about">
                                    <span>About Me</span>
                                </li>
                                <li id="projects">
                                    <span>Projects</span>
                                </li>
                                <li id="contact">
                                    <span>Contact</span>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="barContLeft" id="menuBtn">
                        <i class="fas fa-bars iconFA nc"></i>
                    </div>
                    <div class="barContRight iconFA">
                        <span>Open Menu</span>
                    </div>
                </div>
                <div class="singleBtnCont fav">
                    <div class="leftPanelCont">
                        <img src="img/githubBig.png">
                        <p>Some of my personal projects, most of them are just a simple repositories for testing.</p>
                        <a href="https://github.com/965750">
                            <div class="githubBtn"><span>Take me to GitHub!</span></div>
                        </a>
                    </div>
                    <div class="barContLeft">
                        <i class="fab fa-github iconFA nc"></i>
                    </div>
                    <div class="barContRight">
                        <span>Github</span>
                    </div>
                </div>
                <div class="singleBtnCont subs">
                    <div class="leftPanelCont">
                        <img src="img/linkedInBig.png">
                        <p>If You want to know more details about me, or just add me to Your contact list, check my linkedIn profile.</p>
                        <a href="https://www.linkedin.com/in/adrian-zajac-18b664151/">
                            <div class="githubBtn"><span>Take me to LinkedIn!</span></div>
                        </a>
                    </div>
                    <div class="barContLeft">
                        <i class="fab fa-linkedin iconFA nc"></i>
                    </div>
                    <div class="barContRight">
                        <span>LinkedIn</span>
                    </div>
                </div>
                <div class="singleBtnCont insta">
                    <div class="leftPanelCont">
                        <img src="img/contactBig.png">
                        <form id="contactMe" method="post">
                            <div class="alertCont <?php echo $msgClass ?>">
                                <?php echo $msg ?>
                            </div>
                            <span>Name</span>
                            <input id="name" type="text" name="name">
                            <span>Email</span>
                            <input id="email" type="email" name="email">
                            <span>Message</span>
                            <textarea name="message" id=textA></textarea>
                            <input type="submit" name="submit" id="contactSubmit" disabled value="SEND">
                        </form>
                    </div>
                    <div class="barContLeft" id="mailBtn">
                        <i class="fas fa-envelope iconFA nc"></i>
                    </div>
                    <div class="barContRight">
                        <span>Mail me</span>
                    </div>
                </div>
            </article>
            <article class="wrapper">
                <article class="banerCont">
                    <div class="banerTop">
                        <div class="banerTopBg"></div>
                        <h3><span>Front-end</span> Developer</h3>
                        <h3 id="name">Adrian Zając</h3>
                    </div>
                    <div class="banerBot">
                        <div class="banerBotBg"></div>
                        <div class="signleCircleCont">
                            <div class="circleCont">
                                <span class="numberAbove">6</span> <span class="textBelow">months</span>
                            </div>
                            <div class="underCircle">
                                <span>Comercial Experience</span>
                            </div>
                        </div>
                        <div class="signleCircleCont">
                            <div class="circleCont">
                                <span class="imgAbove"><img src="img/reactRedux.png"></span><span class="textBelow">React+Redux</span>
                            </div>
                            <div class="underCircle">
                                <span>Current<br>Goal</span>
                            </div>
                        </div>
                        <div class="signleCircleCont">
                            <div class="circleCont">
                                <span class="numberAbove">4</span><span class="textBelow">hours</span>
                            </div>
                            <div class="underCircle">
                                <span>Daily Learning</span>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="infoCont">
                    <h1 id="aboutCont" class="artiHeader">About Me</h1>
                    <article class="stack">
                        <section class="meCont">
                            <div class="meBG">
                                <div class="meTop">
                                    <div class="meAvatar">
                                        <img src="img/meCent.jpg">
                                    </div>
                                    <div class="meBtn1">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="meBtn2">
                                        <i class="fas fa-user-plus"></i>
                                    </div>
                                </div>
                                <div class="meBot">
                                    <h2>Adrian Zając</h2>
                                    <ul>
                                        <li>
                                            <p>Motivated to learn new things</p>
                                        </li>
                                        <li>
                                            <p>Passion for programming</p>
                                        </li>
                                        <li>
                                            <p>Everyday practice</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </section>
                        <section class="moreInfoCont">
                            <div class="first skillSet">
                                <div class="singleSkillCont">
                                    <img src="img/html.png">
                                    <div class="skill">
                                        <p>HTML5</p>
                                        <div class="exp">
                                            <i class="fas fa-circle"></i>
                                            <i class="fas fa-circle"></i>
                                            <i class="fas fa-circle"></i>
                                            <i class="fas fa-circle"></i>
                                            <i class="fas fa-circle"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="singleSkillCont">
                                    <img src="img/js.png">
                                    <div class="skill">
                                        <p>JavaScript</p>
                                        <div class="exp">
                                            <i class="fas fa-circle"></i>
                                            <i class="fas fa-circle"></i>
                                            <i class="fas fa-circle"></i>
                                            <i class="fas fa-circle"></i>
                                            <i class="far fa-circle"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="singleSkillCont">
                                    <img src="img/css.png">
                                    <div class="skill">
                                        <p>CSS3</p>
                                        <div class="exp">
                                            <i class="fas fa-circle"></i>
                                            <i class="fas fa-circle"></i>
                                            <i class="fas fa-circle"></i>
                                            <i class="fas fa-circle"></i>
                                            <i class="fas fa-circle"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="singleSkillCont">
                                    <img src="img/rwd.png">
                                    <div class="skill">
                                        <p>RWD</p>
                                        <div class="exp">
                                            <i class="fas fa-circle"></i>
                                            <i class="fas fa-circle"></i>
                                            <i class="fas fa-circle"></i>
                                            <i class="fas fa-circle"></i>
                                            <i class="far fa-circle"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="second skillSet">
                                <div class="singleSkillCont">
                                    <img src="img/git.png">
                                    <div class="skill">
                                        <p>Git</p>
                                        <div class="exp">
                                            <i class="fas fa-circle"></i>
                                            <i class="fas fa-circle"></i>
                                            <i class="far fa-circle"></i>
                                            <i class="far fa-circle"></i>
                                            <i class="far fa-circle"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="singleSkillCont">
                                    <img src="img/php.png">
                                    <div class="skill">
                                        <p>PHP</p>
                                        <div class="exp">
                                            <i class="fas fa-circle"></i>
                                            <i class="fas fa-circle"></i>
                                            <i class="fas fa-circle"></i>
                                            <i class="far fa-circle"></i>
                                            <i class="far fa-circle"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="singleSkillCont">
                                    <img src="img/jquery.png">
                                    <div class="skill">
                                        <p>jQuery</p>
                                        <div class="exp">
                                            <i class="fas fa-circle"></i>
                                            <i class="fas fa-circle"></i>
                                            <i class="fas fa-circle"></i>
                                            <i class="fas fa-circle"></i>
                                            <i class="far fa-circle"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="singleSkillCont">
                                    <img src="img/gulp.png">
                                    <div class="skill">
                                        <p>Gulp</p>
                                        <div class="exp">
                                            <i class="fas fa-circle"></i>
                                            <i class="fas fa-circle"></i>
                                            <i class="far fa-circle"></i>
                                            <i class="far fa-circle"></i>
                                            <i class="far fa-circle"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="singleSkillCont">
                                    <img src="img/sass.png">
                                    <div class="skill">
                                        <p>SCSS</p>
                                        <div class="exp">
                                            <i class="fas fa-circle"></i>
                                            <i class="fas fa-circle"></i>
                                            <i class="fas fa-circle"></i>
                                            <i class="fas fa-circle"></i>
                                            <i class="far fa-circle"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="third skillSet">
                                <div class="singleSkillCont">
                                    <img src="img/vue.png">
                                    <div class="skill">
                                        <p>Vue.js</p>
                                        <div class="exp">
                                            <i class="fas fa-circle"></i>
                                            <i class="fas fa-circle"></i>
                                            <i class="fas fa-circle"></i>
                                            <i class="far fa-circle"></i>
                                            <i class="far fa-circle"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="singleSkillCont">
                                    <img src="img/react.png">
                                    <div class="skill">
                                        <p>React.js</p>
                                        <div class="exp">
                                            <i class="fas fa-circle"></i>
                                            <i class="far fa-circle"></i>
                                            <i class="far fa-circle"></i>
                                            <i class="far fa-circle"></i>
                                            <i class="far fa-circle"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </article>
                    <section class="meTextCont">
                        <span>As a former graphic designer, I pay a lot of my attention to details during the implementation process. I always try to create great user experience, because for me it is one of the most important things to plan. I aim for companies that I can learn from more experienced people, something new. Possibility of rising my skill everyday to get promotion and help company, is the best way to motivate myself.</span>
                    </section>
                </article>
                <article class="rotCont">
                    <section class="cardsCont">
                        <div class="singleCard">
                            <div class="cardTop">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="cardBot">
                                <div class="infoBot">
                                    <h3><span class="strongH">Wrocław</span> - Krzyki</h3>
                                    <h3>Remote possible</h3>
                                </div>
                            </div>
                        </div>
                        <div class="singleCard">
                            <div class="cardTop">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <div class="cardBot">
                                <div class="infoBot">
                                    <h3>1 Full year of <span class="strongH">experience</span></h3>
                                    <h3>Half of it was comercial in software company</h3>
                                </div>
                            </div>
                        </div>
                        <div class="singleCard">
                            <div class="cardTop">
                                <i class="fas fa-comments"></i>
                            </div>
                            <div class="cardBot">
                                <div class="infoBot">
                                    <h3><span class="strongH">Fluent</span> English</h3>
                                    <h3>Almost full year spent in UK Edinburgh</h3>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="rBGCont">
                        <div class="rotateBG"></div>
                    </section>
                </article>
                <article class="projects">
                    <h1 class="artiHeader">My Projects</h1>
                    <section class="cardsCont">
                        <a href="http://adrianzajac.warszawa.pl/stomato/" class="singleCard">
                            <div class="cardTop">
                                <h3>Single Page Site</h3>
                                <span>11.2017</span>
                                <div class="imgCont">
                                    <i class="fas fa-search"></i>
                                    <img src="img/stomato+.jpg">
                                </div>
                            </div>
                        </a>
                        <a href="http://adrianzajac.warszawa.pl/vue_shop_beta/" class="singleCard">
                            <div class="cardTop">
                                <h3>Vue.js Shop</h3>
                                <span>02.2018</span>
                                <div class="imgCont">
                                    <i class="fas fa-search"></i>
                                    <img src="img/radam.jpg">
                                </div>
                            </div>
                        </a>
                        <a href="http://adrianzajac.warszawa.pl/agency/" class="singleCard">
                            <div class="cardTop">
                                <h3>Single Page Site</h3>
                                <span>10.2017</span>
                                <div class="imgCont">
                                    <i class="fas fa-search"></i>
                                    <img src="img/service.jpg">
                                </div>
                            </div>
                        </a>
                    </section>
                </article>
            </article>
        </main>
        <footer>
            <section class="fTop">
                <a href="https://www.linkedin.com/in/adrian-zajac-18b664151/"><i class="fab fa-linkedin footerI"></i></a>
                <a href="https://github.com/965750"><i class="fab fa-github footerI"></i></a>
                <i id="fContact" class="fas fa-envelope footerI"></i>
            </section>
            <section class="fBot">
                <span>Handmade by Adrian Zajac © 2018</span>
            </section>
        </footer>
        <script src="js/main.js"></script>
        <script src="js/mainBar.js"></script>
    </body>

    </html>
