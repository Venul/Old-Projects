<?php
echo'
<div id="page_albums_browse" data-role="page" class="root">
<div id="center">
<div class="headerBox balls">
	<h3>Colori '; if($_GET["option"]!=""){echo "effetto ".$_GET["option"];} echo'</h3>
   	<nav class="selector colori">
		<ul>
			<li><a>'.$lng[c0].'</a><b aria-haspopup="true" aria-controls="p5"></b>
				<ul id="p5">';
					echo '<li><a href="index.php?'; if(isset($lang)){echo'lang='.$lang.'&';} echo'page=colori&option=lucido">'.$lng[c1].'</a></li>';
					echo '<li><a href="index.php?'; if(isset($lang)){echo'lang='.$lang.'&';} echo'page=colori&option=opaco">'.$lng[c2].'</a></li>';
					echo '<li><a href="index.php?'; if(isset($lang)){echo'lang='.$lang.'&';} echo'page=colori&option=ceramica">'.$lng[c3].'</a></li>';
					echo '<li><a href="index.php?'; if(isset($lang)){echo'lang='.$lang.'&';} echo'page=colori&option=metallizzato">'.$lng[c4].'</a></li>';
//					echo '<li><a href="index.php?'; if(isset($lang)){echo'lang='.$lang.'&';} echo'page=colori&option=semitrasparente">'.$lng[c5].'</a></li>';
				echo '</ul>
			</li>
		</ul>
	</nav>
</div>';

if($_GET["option"]=="lucido"){$cat=0;}
elseif($_GET["option"]=="opaco"){$cat=1;}
elseif($_GET["option"]=="ceramica"){$cat=2;}
elseif($_GET["option"]=="metallizzato"){$cat=3;}
elseif($_GET["option"]=="semitrasparente"){$cat=4;}
else{$cat=-1;}

if ($cat>=0){
	echo '<div id="album_list" class="albumsCoversWrapper" data-box="append">';
	$result=mysql_query("SELECT * FROM colori WHERE cat='".$cat."' and disp=1");
	while ($row=mysql_fetch_array($result,MYSQL_ASSOC)){  // для каждой записи организуем вывод.  
		echo '
		<div class="itemWrapper">
	            <div class="item" title="Colore '.$row["desc"].' '.$_GET["option"].'">
 		      	<img src="images/colori/'.$row["file"].'" heigth="100%">
	                <span class="wrapper">
				<span class="title" >'.$row["desc"].'</span>
				<span class="artists">'.$row["cod"].'</span>
		        </span>
		    </div>
		</div>';
	}
	echo '</div>';
}else{ echo '<div id="header_promo">
                <div class="imagePreview">
                    <img src="images/colori.jpg" alt="" width="100%"/>
            	</div>
            	<div class="preview">
                	<h4 title="Effetti di colorazione vetro">Esistono diversi effetti di colorazione</h4>
                	<p class="description">Le vernici vetro all\'acqua monocomponenti comprendono vernici vetro laccate, testurizzate, 
trasparenti, colorate. Le vernici vetro laccate sono disponibili in piu di 2000 colori. 
Nell\'utilizzo di vernici vetro l\'adesione su vetro viene garantita da uno speciale additivo 
aggrappante che deve essere aggiunto al prodotto prima dell\'uso rispettando le indicazioni 
delle schede tecniche. Disponibilita di colori laccati: piu di 2000 colori dalle cartelle ICA, 
RAL. <br><br>Effetto <b>LUCIDO</b> da la brillantezza alla pallina che diventa come lo specchio.
<br>Effetto <b>OPACO</b> di corpo che non e\' attraversato da radiazioni luminose, che ha coefficiente di trasparenza nullo.
<br>Effetto <b>CERAMICA</b> sembra essere gesso colorato con aspetto bianco-grigio e polveroso.
<br>Effetto <b>METALLIZZATO</b> ha la base di colore alluminio chiaro, mentre le tinte colorate sono realizzate con pigmenti trasparenti che lasciano intatto l\'aspetto metallizzato.
<br><br>Per noi conta... DARE COLORE ALLE VOSTRE IDEE!</p>                       
            	</div>
            </div>';
}
echo '</div>';            
include ('footer.php');
echo '</div>';
?>