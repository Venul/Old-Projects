
<?php
    require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
if ( $detect->isMobile() ) {
 ?>
<script>
$(document).ready(function() {
    $(".gallery img").fadeIn(function() {
        var $this = $(this);
        $this.next(".descript").append($this.attr("title"));
    });

  $(".navbar-toggle").click(function() {
    $(".menu").toggle(10);
  });

  var menuUl = $(".menu > ul > li");
  menuUl.click(function() {
    menuUl.each(function(item) {
      var liItem = $(item);
      if (liItem.hasClass("hover")) {
        liItem.hide();
      };
    });
  });

  $(".menu > ul > li").click(function(item) {
      $(item.target).parent().nextAll("ul:first").toggle();
  });
  
  $(".lang > ul > li").click(function() {
    $(".lang ul li ul").toggle(10);
  });

  $(".selector > ul > li").click(function() {
    $(".selector ul li ul").toggle(10);
  });
  

  
});


</script>
<?php 
    }
$lang = isset($_GET["lang"])? $_GET["lang"]: "ita"; if (!file_exists("lang/".$lang.".ini")){$lang = "ita";} $lng = parse_ini_file("lang/".$lang.".ini");
echo '<!DOCTYPE html>
<html lang="en"><head>
<title>'.$lng['content'].'</title>
<meta name="title" content="'.$lng['content'].'" />
<meta name="description" content="'.$lng['description'].'" />
<meta name="keywords" content="'.$lng['keywords'].'" />
<meta name="author" content="Leonstyle.it. Improving The Web." />
<meta name="copyright" content="Leonstyle 2013" />
<meta name="google-site-verification" content="wxaZQFRqpWz8sc7-plR5zXAVtqMjSIoR9QRN4g73bxQ" />
<meta name="alexaVerifyID" content="GDc9RSY-ohv7pYjkX8PSwdVVQjQ" />
<meta name="msvalidate.01" content="13AF77998E3F38B882B699199F7AE653" />
<meta http-equiv="content-language" content="it,en,ru" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta http-equiv="cache-control" content="public" /><meta charset="utf-8" />
<meta name = "format-detection" content = "telephone=no" />
<link rel="icon" href="img/in.ico" type="image/x-icon">
<link rel="shortcut icon" type=image/x-icon href="favicon.ico">
<link rel="stylesheet" href="index.css" type="text/css" charset="utf-8">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"/>


<script type="text/javascript" src="jquery.pack.js"></script>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(["_setAccount", "UA-26185651-1"]);
  _gaq.push(["_trackPageview"]);

  (function() {
    var ga = document.createElement("script"); ga.type = "text/javascript"; ga.async = true;
    ga.src = ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js";
    var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<script type="text/javascript" src = "jquery.iosslider.js"></script>
</head>

<body>
    <div id="header">
        <button class="navbar-toggle">
            <a>
                <span>
                    <i class="fa fa-bars"></i>
                    <br>MENU 
                </span>
            </a>
      </button>
      
<a id="logo" href="http://www.ideenatalizie.com/">
    <div>
        <h1>Idee Natalizie</h1>
        <h2>'.$lng['h1'].'</h2>
    </div>
</a>

<div id="header_menu">
    <nav class="menu">
        <ul>
            <li>
                <a>
                    <img src="images/BOOK.png" class="small-menu" />
                        <div class= "title-land">
                            '.$lng['h2'].'
                        </div>
                    </a>
                    <b aria-haspopup="true" aria-controls="p1"></b>
                    <ul id="p1">';
                        echo
                            '<li>
                                <a href="index.php?';
                                    if(isset($lang)) {
                                        echo'lang='.$lang.'&';
                                    } 
                                    echo'page=intro">'.$lng['h5'].'
                                </a>
                            </li>';
                        echo 
                            '<li>
                                <a href="index.php?';
                                    if(isset($lang)){
                                        echo'lang='.$lang.'&';
                                    }
                                    echo'page=chi_siamo">'.$lng['h6'].'
                                </a>
                            </li>';
    //								echo '<li><a href="index.php?'; if(isset($lang)){echo'lang='.$lang.'&';} echo'page=condizioni">'.$lng['h7'].'</a></li>';
                        echo
                            '<li>
                                <a href="index.php?'; 
                                    if(isset($lang)){
                                        echo'lang='.$lang.'&';
                                    }
                                    echo'page=agenti">'.$lng['h8'].'
                                </a>
                            </li>';
                        echo 
                    '</ul>
            </li>

            <li>
                <a>
                    <img src="images/TV.png" class="small-menu" />
                        <div class= "title-land">
                            '.$lng['h3'].'
                        </div>
                </a>
                <b aria-haspopup="true" aria-controls="p2"></b>
                    <ul id="p2">';
                        echo
                            '<li>
                                <a href="index.php?'; 
                                    if(isset($lang)){
                                        echo'lang='.$lang.'&';
                                    } 
                                    echo'page=logo_gallery">'.$lng['h9'].'
                                </a>
                            </li>';
                        echo
                            '<li>
                                <a href="index.php?';
                                    if(isset($lang)){
                                        echo'lang='.$lang.'&';
                                    }
                                    echo'page=colori">'.$lng['h10'].'
                                </a>
                            </li>';
//								echo '<li><a href="index.php?'; if(isset($lang)){echo'lang='.$lang.'&';} echo'page=confezione_palline">'.$lng['h11'].'</a></li>';
                        echo 
                    '</ul>
            </li>
            <li>
                <a>
                    <img src="images/CALC.png" class="small-menu" /> 
                        <div class= "title-land">
                            '.$lng['h4'].'
                        </div>
                </a>
                <b aria-haspopup="true" aria-controls="p3"></b>
                    <ul id="p3">';
                        echo
                            '<li>
                                <a href="index.php?';
                                    if(isset($lang)){
                                        echo'lang='.$lang.'&';
                                    }
                                    echo'page=preventivo">'.$lng['h12'].'
                                </a>
                            </li>';
//								echo '<li><a href="index.php?'; if(isset($lang)){echo'lang='.$lang.'&';} echo'page=area_stampa">'.$lng['h13'].'</a></li>';
//								echo '<li><a href="index.php?'; if(isset($lang)){echo'lang='.$lang.'&';} echo'page=packing_list">'.$lng['h14'].'</a></li>';
                    echo '</ul>
                </li>
                <li>
                    <a>
                        <img src="images/WRITE.png" class="small-menu" />  
                            <div class= "hide-cont move-left">
                                '.$lng['h13'].'
                            </div>
                    </a>
                    <b aria-haspopup="true" aria-controls="p16"></b>
                        <ul id="p16">';
                            echo
                                '<li>
                                    <a href="index.php?';
                                        if(isset($lang)){
                                            echo'lang='.$lang.'&';
                                        }
                                        echo'page=contatti">'.$lng['h13'].'
                                    </a>
                                </li>';
                            echo
                                '<li>
                                    <a href="index.php?';
                                        if(isset($lang)){
                                            echo'lang='.$lang.'&';
                                        }
                                        echo'page=contatti">Where we are
                                    </a>
                                </li>';

                        echo '</ul>
                </li>
            </ul>
        </nav>';

    if ($lang == 'ita') {
        $langImage = 'italy_640.png';
        $langName = 'ITALIAN';
    } elseif ($lang == 'eng') {
        $langImage = 'english_640.png';
        $langName = 'ENGLISH';
    } elseif ($lang == 'rus') {
        $langImage = 'russia_640.png';
        $langName = 'RUSSIAN';
    } elseif ($lang == 'deu') {
        $langImage = 'germany_640.png';
        $langName = 'GERMAN';
    } elseif ($lang == 'fra') {
        $langImage = 'france_640.png';
        $langName = 'FRENCH';
    }
        echo '<nav class="lang">
            <ul>
                <li>


                    <a>
                        <div class="small-lang"> 
                            <img src="images/'.$langImage.'" class="img-lang" title="Pallina di Natale personalizzata con logo"/>
                            <br>'.$langName.'
                        </div>
                        <div class="hide-lang">
                            '.$lang.'
                        </div>
                    </a>



                    <b aria-haspopup="true" aria-controls="p4"></b>
                    <ul id="p4">';
///								if($lang!="ita"){echo'<li><a href="index.php?lang=ita'; if(isset($_GET["page"])){echo'&page='.$_GET["page"];} if(isset($_GET["option"])){echo'&option='.$_GET["option"];} echo'">ITA</a></li>';}
///								if($lang!="eng"){echo'<li><a href="index.php?lang=eng'; if(isset($_GET["page"])){echo'&page='.$_GET["page"];} if(isset($_GET["option"])){echo'&option='.$_GET["option"];} echo'">ENG</a></li>';}
                        if($lang!="ita"){
                            echo
                                '<li>
                                    <a href="index.php?lang=ita'; 
                                        if(isset($_GET["page"])){
                                            echo'&page='.$_GET["page"];
                                        } 
                                        if(isset($_GET["option"])){
                                            echo'&option='.$_GET["option"];
                                        } 
                                        echo'">
                                        <div class="small-lang"><img src="images/italy_640.png" class="img-lang"/><br>ITALIAN</div>
                                        <div class="hide-lang">ITA</div>
                                    </a>
                                </li>';
                            }

                        if($lang!="eng"){
                            echo
                                '<li>
                                    <a href="index.php?lang=eng'; 
                                        if(isset($_GET["page"])){
                                            echo'&page='.$_GET["page"];
                                        } 
                                        if(isset($_GET["option"])){
                                            echo'&option='.$_GET["option"];
                                        } 
                                        echo'">
                                        <div class="small-lang"><img src="images/english_640.png" class="img-lang"/><br>ENGLISH</div>
                                        <div class="hide-lang">ENG</div>
                                    </a>
                                </li>';
                            }

                        if($lang!="rus"){
                            echo
                                '<li>
                                    <a href="index.php?lang=rus'; 
                                        if(isset($_GET["page"])){
                                            echo'&page='.$_GET["page"];
                                        } 
                                        if(isset($_GET["option"])){
                                            echo'&option='.$_GET["option"];
                                        } 
                                        echo'">
                                        <div class="small-lang"><img src="images/russia_640.png" class="img-lang"/><br>RUSSIAN</div>
                                        <div class="hide-lang">RUS</div>
                                    </a>
                                </li>';
                            }

                            if($lang!="deu"){
                                echo
                                    '<li>
                                        <a href="index.php?lang=deu'; 
                                            if(isset($_GET["page"])){
                                                echo'&page='.$_GET["page"];
                                            } 
                                            if(isset($_GET["option"])){
                                                echo'&option='.$_GET["option"];
                                            } 
                                            echo'">
                                            <div class="small-lang"> 
                                                <img src="images/germany_640.png" class="img-lang"/>
                                                <br>GERMAN
                                            </div>
                                            <div class="hide-lang">
                                                DEU
                                            </div>
                                        </a>
                                    </li>';
                                }

                            if($lang!="fra"){
                                echo
                                    '<li>
                                        <a href="index.php?lang=fra'; 
                                            if(isset($_GET["page"])){
                                                echo'&page='.$_GET["page"];
                                            }
                                            if(isset($_GET["option"])){
                                                echo'&option='.$_GET["option"];
                                            }
                                            echo'">
                                            <div class="small-lang"> 
                                                <img src="images/france_640.png" class="img-lang"/>
                                                <br>FRENCH
                                            </div>
                                            <div class="hide-lang">
                                                FRA
                                            </div>
                                        </a>
                                    </li>';}
                                echo'
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>';

		$host="62.149.150.155"; $user="Sql547995"; $pass="efe7c4ff"; $dbase="Sql547995_1";
		$db = @mysql_connect($host,$user,$pass) or die("Could not connect: " . mysql_error()); mysql_select_db($dbase,$db);
		switch ($_GET["page"]){
			case "intro": include ('intro.php'); break;
			case "chi_siamo": include ('chisiamo.php'); break;
			case "agenti": include ('agenti.php'); break;
//			case "condizioni": include ('condizioni.php'); break;
			case "contatti": include ('contatti.php'); break;
			case "logo_gallery": include ('gallery.php'); break;
//			case "confezione_palline": include ('confezione_palline.php'); break;
			case "colori": include ('colori.php'); break;
			case "preventivo": include ('preventivo.php'); break;
//			case "area_stampa": include ('area_stampa.php'); break;
//			case "packing_list": include ('packing_list.php'); break;
//			case "login": include ('login.php'); break;
//			case "copy": include ('copyright.php'); break;
//			case "priv": include ('privacy.php'); break;
			default: include ('home.php');
		}
echo'		
</body>
</html>';
?>