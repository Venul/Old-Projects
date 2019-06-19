<?php
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
if ( $detect->isMobile() ) {
 ?>
        <script>
$(document).ready(function() {
$(".iosSlider").iosSlider({
    snapToChildren: true,
    desktopClickDrag: true,
    navPrevSelector: $(".prevButton"),
    navNextSelector: $(".nextButton")
});
});
</script>
<?php 
    }
echo'
<div id="page_albums_browse" data-role="page" class="root">
<div id="center">
<div class="headerBox balls">
	<h3>Galleria Lavori</h3>
   	<nav class="selector">
		<ul>
			<li><a>'.$lng[g0].'</a><b aria-haspopup="true" aria-controls="p5"></b>
				<ul id="p5">';
                    echo '<li><a href="index.php?'; if (isset($lang)) {
     echo'lang='.$lang.'&';
 } echo'page=logo_gallery&option=1color">'.$lng[g1].'</a></li>';
                    echo '<li><a href="index.php?'; if (isset($lang)) {
     echo'lang='.$lang.'&';
 } echo'page=logo_gallery&option=2color">'.$lng[g2].'</a></li>';
                    echo '<li><a href="index.php?'; if (isset($lang)) {
     echo'lang='.$lang.'&';
 } echo'page=logo_gallery&option=3color">'.$lng[g3].'</a></li>';
                    echo '<li><a href="index.php?'; if (isset($lang)) {
     echo'lang='.$lang.'&';
 } echo'page=logo_gallery&option=4color">'.$lng[g4].'</a></li>';
                    echo '<li><a href="index.php?'; if (isset($lang)) {
     echo'lang='.$lang.'&';
 } echo'page=logo_gallery&option=cmyk">'.$lng[g5].'</a></li>';
                    echo '<li><a href="index.php?'; if (isset($lang)) {
     echo'lang='.$lang.'&';
 } echo'page=logo_gallery">'.$lng[g7].'</a></li>';
//					echo '<li><a href="index.php?'; if(isset($lang)){echo'lang='.$lang.'&';} echo'page=colori&option=semitrasparente">'.$lng[c5].'</a></li>';
                echo '</ul>
			</li>
		</ul>
	</nav>';


if ( $detect->isMobile() ) {
$numrow = 9999;
} else {
$numrow = 12;
}

    if (isset($_GET[option])) {
        $topt = explode('_', $_GET['option']);
        if (ereg('^[0-9]+$', $topt[1])) {
            $thispage = $topt[1];
        } else {
            $thispage = 1;
        }

        if ($topt[0] == '1color') {
            $what = ' WHERE type=1';
        }
        if ($topt[0] == '2color') {
            $what = ' WHERE type=2';
        }
        if ($topt[0] == '3color') {
            $what = ' WHERE type=3';
        }
        if ($topt[0] == '4color') {
            $what = ' WHERE type=4';
        }
        if ($topt[0] == 'cmyk') {
            $what = ' WHERE type=5';
        }
    } else {
        $thispage = 1;
    }
    $result = mysql_query('SELECT * FROM logo'.$what.' ORDER BY id');
    $rows = mysql_num_rows($result); $lastpage = ceil($rows / $numrow);
    if ($rows > $numrow) {
        echo '<div id="pager" data-box="replace" class="cmpListNavigation">
			<a class="prev';
        if ($thispage > 1) {
            echo '" href="index.php?';
            if (isset($lang)) {
                echo'lang='.$lang.'&';
            }
            echo'page=logo_gallery&option='.$topt[0].'_'.($thispage - 1);
        } else {
            echo' disabled';
        }
        echo'"></a>
			<a class="more disabled">Pagina '.$thispage.'/'.$lastpage.'</a>
			<a class="next';
        if ($thispage != $lastpage) {
            echo '" href="index.php?';
            if (isset($lang)) {
                echo'lang='.$lang.'&';
            }
            echo'page=logo_gallery&option='.$topt[0].'_'.($thispage + 1);
        } else {
            echo' disabled';
        }
        echo'"></a>
		</div>';
    }
echo '</div>

 	<div id="album_list" class="logoCoversWrapper" data-box="append">';


    $result = mysql_query('SELECT * FROM logo'.$what.'  ORDER BY id LIMIT '.(($thispage - 1) * $numrow).", $numrow"); 

echo'
    <div class = "iosSlider">
        <div class = "slider">';

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        echo '

	            <div class="item gallery">
                <img src="images/logo/'.$row['file'].'" width="200px" title="Pallina di Natale personalizzata con logo '.$row['name'].'">
                <span class="descript"></span>

            </div>';
    }
echo'
        </div>
            <div class = "prevButton"></div>
            <div class = "nextButton"></div>;
    </div>;
    </div>

</div>';
include 'footer.php';
echo '</div>';
