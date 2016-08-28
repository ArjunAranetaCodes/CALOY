<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Caloy</title>
    <link href="css/jquery.bxslider.css" rel="stylesheet" />
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Passion+One|Raleway:400,300,500italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <header id="main-header">
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">CALOY</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="#banner">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#blends">Services</a></li>
              <li><a href="#contact">Contact Us</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <section id="banner" class="section-padding" style="margin-top:50px;padding-left:50px;padding-right:50px;">
		<form action="php/getfrom.php" method="post">
		<input name="item" type="" class="form-control" style="" placeholder="Type the search term here"/>
		<input type="submit" class="btn btn-success" value="Submit"/>
		
		</form>
    </section>

    <section id="about" class="section-padding">
      <div class="container">
        <div class="row text-center">
          <div class="col-md-12">
            <div class="section-head">
              <h2 class="head-title">Caloy</h2>
              <p class="head-par"></p>
              <hr>
            </div>
          </div>
          <div class="col-md-4">
            <div class="wrap-item">
              <div class="item-img">
                <img src="img/ser001.png">
              </div>
              <h3 class="pad-bt15">Caloy Card</h3>
              <p>Visa Debit Card Solution that can be used to buy online.</p>
			  <a href="caloycard.html" class="btn btn-large btn-primary">Go to Caloy Card</a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="wrap-item">
              <div class="item-img">
                <img src="img/ser02.png">
              </div>
              <h3 class="pad-bt15">Caloy Ask</h3>
              <p>Sentiment Analysis for products you want to query.</p>
			  <a href="caloyask.php" class="btn btn-large btn-primary">Go to Caloy Ask</a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="wrap-item">
              <div class="item-img">
                <img src="img/ser03.png">
              </div>
              <h3 class="pad-bt15">Caloy Points</h3>
              <p>Rewards Schemes from Caloy. This also includes special items for regular consumers.</p>
			  <a href="caloypoints.html" class="btn btn-large btn-primary">Go to Caloy Points</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="blends" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="section-head">
              <h2 class="head-title">What are Caloy Cards?</h2>
              </hr>
              <p class="head-par">
				- Caloy Cards are visa debit cards that can be bought
				from retailers(sari-sari stores). <br />
				- Caloy Cards also have Top-Up Cards which
				are used to add more money to your balance <br />
				- You can buy online with Caloy Cards.				
			  </p>
              <hr>
            </div>
            <div class="section-head">
              <h2 class="head-title">What is Caloy Rewards?</h2>
              </hr>
              <p class="head-par">
				- Caloy Cards are visa debit cards that can be bought
				from retailers(sari-sari stores). <br />
				- Caloy Cards also have Top-Up Cards which
				are used to add points to your balance <br />
				- You are entitled for reward points with every purchase
				of top-up cards.				
			  </p>
              <hr>
            </div>
            <div class="section-head">
              <h2 class="head-title">What is Caloy Ask?</h2>
              </hr>
              <p class="head-par">
				- You can ask Caloy about what he thinks about products.<br />
				- He will reply positive or negative.<br />		
			  </p>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section id="contact" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-head text-center">
              <h2 class="head-title white">Give Us FeedBack</h2>
              </hr>
              <p class="head-par white">Any suggestions? Any Comments?</p>
              <hr>
            </div>
            <div class="contact-form">
              <form>
                <input class="form-control" placeholder="Email" type="text">
                <textarea class="form-control" placeholder="Messages"></textarea>
                <button type="submit" class="btn btn-block btn-primary border-radius-zero">SEND</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer id="main-footer">
      <div class="container">
        <div class="row">
          <p class="white">2016 HexDev. All Rights Reserved.</p>
        </div>
      </div>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- bxSlider Javascript file -->
    <script src="js/jquery.bxslider.min.js"></script>
      <script>


         $(document).ready(function(){
        $('.bxslider').bxSlider();
      });

      </script>
      <script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

  // Prevent default anchor click behavior
  event.preventDefault();

  // Store hash
  var hash = this.hash;

  // Using jQuery's animate() method to add smooth page scroll
  // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
  $('html, body').animate({
    scrollTop: $(hash).offset().top
  }, 900, function(){

    // Add hash (#) to URL when done scrolling (default click behavior)
    window.location.hash = hash;
    });
  });
})
</script>
  </body>
</html>