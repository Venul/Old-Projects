<script type="text/javascript">
		var suf = 0;
					
		$(document).ready(function() {

			$("#country").change(function(){
				loadprice();
			});

			$("#count").keyup(function(){
				loadprice();
			});

			$("#promocode").keyup(function(){
				loadprice();
			});

			$(".colorselect").change(function(){
				$("#colortext").val($("#colors"+suf+" option:selected").text());
				loadprice();
			});

			$(".packselect").change(function(){
				$("#packtext").val($("#pack"+suf+" option:selected").text());
				loadprice();
			});

			$("#size").change(function(){
				$("div[class='active']").toggle();
				$("div[class='active']").removeClass("active");
				suf = $("#size option:selected").val();
				$("#divpack"+suf).toggle();
				$("#divpack"+suf).addClass("active").css("display", "inline");
				$("#divcolor"+suf).toggle();
				$("#divcolor"+suf).addClass("active").css("display", "inline");
				$("#sizetext").val($("#size option:selected").text());
				loadprice();
			});

			function loadprice() {
				if($("#count").val()>99){
					var req = getXmlHttp();
					req.open('GET', 'price.php?s='+ $("#size option:selected").val()+'&c=' + $("#colors"+suf+" option:selected").val()+'&p=' + $("#pack"+suf+" option:selected").val()+'&d=' + document.getElementById("promocode").value+'&q=' + $('#count').val()+'&w=' + $('#country').val()+'&r=' + Math.random(), true);
					req.onreadystatechange = function() {
						if (req.readyState == 4) {
							if(req.status == 200) {
//								alert(req.responseText);
								price = req.responseText.split("|");
								if(price[0] != '') {$("#totalprice").text(price[0] +' Euro (IVA esclusa)'); $("#totalcost").val(price[0]);}
							
								if(price[1] != '') {$("#promosconto").text(price[1] + ' % ');}else{$("#promosconto").text('');}
								} else {
//									alert("There was a problem while using XMLHTTP:\n" + req.status + req.statusText);
							}
						}
					}
					req.send(null);
				}else{
					$("#totalprice").text('Ordine minimo 100 pezzi.');
				}
			}

			$("#step2").click(function(){
				if($("#totalcost").val()<=0){
					alert("Compilate tutti i campi!");
					return false;
				}
				$("#packtext").val($("#pack"+suf+" option:selected").text());
				$("#colortext").val($("#colors"+suf+" option:selected").text());
				$("#sizetext").val($("#size option:selected").text());
				$("#step2_form").submit();
				return false;
			});			

			$("#step3").click(function(){
				if($("#impresa").val()==""){
					alert("Compilate tutti i campi!");
					return false;
				}
				if($("#via").val()==""){
					alert("Compilate tutti i campi!");
					return false;
				}
				if($("#cap").val()==""){
					alert("Compilate tutti i campi!");
					return false;
				}
				if($("#localita").val()==""){
					alert("Compilate tutti i campi!");
					return false;
				}
				if($("#piva").val()=="" && $("#forma").val()!=2){
					alert("Compilate tutti i campi!");
					return false;
				}
				if($("#cf").val()==""){
					alert("Compilate tutti i campi!");
					return false;
				}
				if($("#contatto").val()=="" && $("#forma").val()!=2){
					alert("Compilate tutti i campi!");
					return false;
				}
				if($("#telefono").val()==""){
					alert("Compilate tutti i campi!");
					return false;
				}
				if($("#email").val()==""){
					alert("Compilate tutti i campi!");
					return false;
				}
				$("#step3_form").submit();
				return false;
			});			

			$("#step4").click(function(){
				if($("#image").val()==""){
					alert("Allegare file grafico");
					return false;
				}
				$("#step4_form").submit();
				return false;
			});			

		
			$("#forma").change(function(){
				if($("#forma").val()==2){
					$("#denom").text('* Nome e Cognome');
					$("#cfpiva").css("display", "none");
					$("#cfref").css("display", "none");
				}else{
					$("#denom").text('* Denominzione');
					$("#cfpiva").css("display", "block");
					$("#cfref").css("display", "block");
				}
			});

			$("#image").change(function(){
			    var validExts = new Array(".ai", ".psd", ".pdf", ".jpg", ".png", ".gif");
			    var fileExt = $("#image").val();
			    fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
			    if (validExts.indexOf(fileExt) < 0) {
				alert("Formati di File Accettati: " + validExts.toString());
				$("#image").val("");
				return false;
			    }
			    else return true;
			});

			$("#cstamp1").change(function(){
				if($("#cstamp1 option:selected").val()==8){
					$("#cstamp1").css("width", "130px");
					$("#otherbc1").show(); 
				} else {
					$("#otherbc1").hide();
					$("#cstamp1").css("width", "300px");
				}
			});
			$("#cstamp2").change(function(){
				if($("#cstamp2 option:selected").val()==8){
					$("#cstamp2").css("width", "130px");
					$("#otherbc2").show(); 
				} else {
					$("#otherbc2").hide();
					$("#cstamp2").css("width", "300px");
				}
			});
			$("#cstamp3").change(function(){
				if($("#cstamp3 option:selected").val()==8){
					$("#cstamp3").css("width", "130px");
					$("#otherbc3").show(); 
				} else {
					$("#otherbc3").hide();
					$("#cstamp3").css("width", "300px");
				}
			});
			$("#cstamp4").change(function(){
				if($("#cstamp4 option:selected").val()==8){
					$("#cstamp4").css("width", "130px");
					$("#otherbc4").show(); 
				} else {
					$("#otherbc4").hide();
					$("#cstamp4").css("width", "300px");
				}
			});


		});



//	document.addEventListener('DOMContentLoaded',function(){
//		document.getElementById("size").onchange = changesize;
//		document.getElementById("colorselect").onchange = changecolor;
//		document.getElementById("packselect").onchange = changepack;
//		document.getElementById("count").onchange = changecount;
//		document.getElementById("promocode").onchange = changepromo;
//	});

	function changesize() {
		alert("The selected option is " + document.getElementById("size").selectedIndex);
	}
	function changecolor() {
		alert("The selected option is " + document.getElementById("colorselect").selectedIndex);
	}
	function changepack() {
		alert("The selected option is " + document.getElementById("packselect").selectedIndex);
	}
	function changecount() {
		alert("The selected option is " + document.getElementById("count").value);
	}
	function changepromo() {
		alert("The selected option is " + document.getElementById("promocode").value);
	}

function getXmlHttp(){
    var xmlhttp;
    try { xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
	try { xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} catch (E) { xmlhttp = false; }
    }
    if (!xmlhttp && typeof XMLHttpRequest!='undefined') { xmlhttp = new XMLHttpRequest(); }
    return xmlhttp;
}

</script>



<?
$ref=split("/", $_SERVER[HTTP_REFERER]);

echo '<div id="page_preventivo" data-role="page" class="root">
<div id="center">
<div class="headerBox"><h3>Calcola il tuo preventivo</h3></div>';

if($_GET["option"]=="step4" and $ref[2]=="www.ideenatalizie.com"){

	echo '<div id="content_wrapper">
		<div class="imagePreview">
			<img src="images/shopping2.jpg" alt="" width="100%"/>
		</div>
		<h5>'.$lng[prev6].'</h5>
	</div>';
	mysql_query("INSERT INTO utenti (tipo, impresa, via, localita, cap, paese, piva, cf, contatto, telefono, email) VALUES ('".$_POST['forma']."', '".$_POST["impresa"]."', '".$_POST["via"]."', '".$_POST["localita"]."', '".$_POST["cap"]."', '".$_POST["country"]."', '".$_POST["piva"]."', '".$_POST["cf"]."', '".$_POST["contatto"]."', '".$_POST["telefono"]."', '".$_POST["email"]."')"); $client_id=mysql_insert_id();
	
	$cc=array("White","Black","Red","Green","Blue","Yellow","Gold","Silver");
	if($_POST["cstamp1"]==8){$color_1=$_POST["otherbc1"];}else{$color_1=$cc[$_POST["cstamp1"]];}
	if($_POST["cstamp2"]==8){$color_2=$_POST["otherbc2"];}else{$color_2=$cc[$_POST["cstamp2"]];}
	if($_POST["cstamp3"]==8){$color_3=$_POST["otherbc3"];}else{$color_3=$cc[$_POST["cstamp3"]];}
	if($_POST["cstamp4"]==8){$color_4=$_POST["otherbc4"];}else{$color_4=$cc[$_POST["cstamp4"]];}

	mysql_query("INSERT INTO orders (client_id, diametro, colors, colore_1, colore_2, colore_3, colore_4, background, packaging, cappuccio, handdecor, doubleside, fosfor, note, promocod, count, price, img_client) VALUES ('".$client_id."', '".$_POST["size"]."', '".$_POST["colors"]."', '".$color_1."', '".$color_2."', '".$color_3."', '".$color_4."', '".$_POST["cbase"]."', '".$_POST["pack"]."', '0', '0', '0', '0', '".$_POST["note"]."', '".$_POST["promocode"]."', '".$_POST["count"]."', '".$_POST["totalcost"]."', '1')"); 

	$order_id=mysql_insert_id();
	$ifname = 'attachment/grafica/' .date("Ymd")."_".$order_id."_1";
	if(is_uploaded_file($_FILES["image"]["tmp_name"])){
		$ext = substr($_FILES['image']['name'], 1 + strrpos($_FILES['image']['name'], "."));
		$ifname = $ifname . '.' . $ext;
		move_uploaded_file($_FILES["image"]["tmp_name"], $ifname); 
	} else {
		//echo("Ошибка загрузки файла");
	}
	
	$dd=array("40 mm","65 mm","65 mm","80 mm","100 mm","150 mm");
	$pp = array(array("Without","Blister 8 pcs.","Blister 12 pcs."),array("Without","PaperBox 1 pcs.","Blister 1 pcs."),array("Without","PaperBox 1 pcs.","Blister 1 pcs."),array("Without","PaperBox 1 pcs.","Blister 1 pcs."),array("Without","PaperBox 1 pcs.","Blister 1 pcs."),array("Without","PaperBox 1 pcs."));
	$cc=array("Gloss","Mat","Ceramic","Metalic");
	$result3=mysql_query("SELECT * FROM colori WHERE id='".$_POST["cbase"]."'");
	$bcol=mysql_fetch_array($result3,MYSQL_ASSOC); $bg=$bcol[cod]." ".$cc[$bcol[cat]]." ".$bcol[desc];
	

	$message = "Order n. ".$order_id."\n".
	"Diametro: ".$dd[$_POST["size"]]."\n".
	"Colors: ".$_POST["colors"]." - ".$color_1." ".$color_2." ".$color_3." ".$color_4."\n".
	"Background: ".$bg."\n".
	"Packaging: ".$pp[$_POST["size"]][$_POST["pack"]]."\n".
	"Promo: ".$_POST["promocode"]."\n".
	"Quantity: ".$_POST["count"]."\n".
	"Summ: ".$_POST["totalcost"]."\n".
	"Note: ".$_POST["note"]."\n".
	"Image here: ".getenv("HTTP_HOST"). "/".$ifname."\n".
	"-----------------------------------------------------------"."\n".
	"Impresa: ".$_POST["impresa"]."\n".
	"Indirizzo: ".$_POST["via"]."\n".
	"Localita: ".$_POST["localita"]."\n".
	"Cap: ".$_POST["cap"]."\n".
	"Paese: ".$_POST["country"]."\n".
	"P.Iva: ".$_POST["piva"]."\n".
	"CF: ".$_POST["cf"]."\n".
	"Contatto: ".$_POST["contatto"]."\n".
	"Telefono: ".$_POST["telefono"]."\n".
	"Email: ".$_POST["email"]."\n\n".
	date("d-m-Y H:i:s");

	mail("info@ideenatalizie.com"/*"info@ideenatalizie.com"*/, "Preventivo (Idee Natalizie)", $message, "From: ".$_POST["email"]." \r\n" . "X-Mailer: PHP/" . phpversion());
	
	$result4=mysql_query("SELECT * FROM utenti WHERE promocode='".$_POST["promocode"]."'");
	$uuu=mysql_fetch_array($result4,MYSQL_ASSOC);
	
	if($uuu["email"]!=""){
		mail($uuu["email"]/*"info@ideenatalizie.com"*/, "Preventivo (Idee Natalizie)", $message, "From: ".$_POST["email"]." \r\n" . "X-Mailer: PHP/" . phpversion());
	}


}elseif($_GET["option"]=="step3" and $ref[2]=="www.ideenatalizie.com"){
echo '<div id="content_wrapper">
        <p id="description">'.$lng[prev1].'</p>
    <div id="form_wrapper">
        <form method="post" action="index.php?lang='.$_GET["lang"].'&page=preventivo&option=step4" id="step4_form" enctype="multipart/form-data">
	    <input type="hidden" name="size" id="size" value="'.$_POST["size"].'">
	    <input type="hidden" name="colors" id="colors" value="'.$_POST["colors"].'">
	    <input type="hidden" name="pack" id="pack" value="'.$_POST["pack"].'">
	    <input type="hidden" name="promocode" id="promocode" value="'.$_POST["promocode"].'">
	    <input type="hidden" name="count" id="count" value="'.$_POST["count"].'">
	    <input type="hidden" name="totalcost" id="totalcost" value="'.$_POST["totalcost"].'">
	    <input type="hidden" name="forma" id="forma" value="'.$_POST["forma"].'">
	    <input type="hidden" name="impresa" id="impresa" value="'.$_POST["impresa"].'">
	    <input type="hidden" name="via" id="via" value="'.$_POST["via"].'">
	    <input type="hidden" name="localita" id="localita" value="'.$_POST["localita"].'">
	    <input type="hidden" name="cap" id="cap" value="'.$_POST["cap"].'">
	    <input type="hidden" name="piva" id="piva" value="'.$_POST["piva"].'">
	    <input type="hidden" name="cf" id="cf" value="'.$_POST["cf"].'">
	    <input type="hidden" name="contatto" id="contatto" value="'.$_POST["contatto"].'">
	    <input type="hidden" name="telefono" id="telefono" value="'.$_POST["telefono"].'">
	    <input type="hidden" name="email" id="email" value="'.$_POST["email"].'">
	    <input type="hidden" name="country" id="country" value="'.$_POST["country"].'">

            <fieldset>
                <legend>'.$lng[prev2].'</legend>
                <div class="field">
			<label>File Grafico:</label>
			<input type="file" name="image" id="image">
      		</div>
                <div class="field">
			<label>Colore di Sfondo:</label><select name="cbase" id="cbase">';
			$result=mysql_query("SELECT * FROM colori WHERE disp=1 ORDER BY cat");
			while ($row=mysql_fetch_array($result,MYSQL_ASSOC)){ 
				echo '<option value="'.$row[id].'">'; 
				if($row[cat]==0){echo 'Lucido';}        
				if($row[cat]==1){echo 'Opaco';}        
				if($row[cat]==2){echo 'Gesso';}        
				if($row[cat]==3){echo 'Mettalic';}        
				echo ' - '.$row[desc].'</option>';
			}
			echo'</select>
                </div>';
                
                if($_POST["colors"]<5){
					for ($i = 1; $i <= $_POST["colors"]; $i++){
                echo'<div class="field">
			<label>Colore di Stampa '.$i.':</label>
			<select name="cstamp'.$i.'" id="cstamp'.$i.'">
				<option value="0">Bianco</option>
				<option value="1">Nero</option>
				<option value="2">Rosso</option>
				<option value="3">Verde</option>
				<option value="4">Blu</option>
				<option value="5">Giallo</option>
				<option value="6">Oro</option>
				<option value="7">Argento</option>
				<option value="8">Su Pantone</option>
			</select><input type="text" name="otherbc'.$i.'" id="otherbc'.$i.'" style="display:none;" value="">
                </div>';
         }}
                echo'<div class="field">
			<label>Colore di Cappuccio:</label>
			<select name="kolpak" id="kolpak"><option value="0">Oro</option><option value="1">Argento</option></select>
                </div>';
                if($_POST["pack"]<0){
                echo'<div class="field">
			<label>Colore di Scatola:</label>
			<select name="cpack" id="cpack"><option value="0">Bianca / Neutra</option><option value="1">Con Decor Argento</option></select>
                </div>';
                 }
                echo '<div class="field textarea">
                    <label>Messaggio</label>
                    <textarea name="note" id="note" size="5000" class="required" data-validate="{maxlength:5000}" rows="24" cols="80"></textarea>
		</div>
	    </fieldset>
            <fieldset class="buttons">
                <input type="submit" name="step4" id="step4" value="Invia Dati" class="button" data-indicator-text="Invio ..." data-indicator="local">
		<input type="reset" name="Reset" id="Reset" value="Annulla" class="aButton">
	    </fieldset>';
                echo'<legend>'.$lng[cont2].'</legend>
        </form>
    </div>
</div>';
	
}elseif($_GET["option"]=="step2" and $ref[2]=="www.ideenatalizie.com"){
	echo '<div id="content_wrapper">
    <p id="description">'.$lng[prev4].'</p>
    <div id="form_wrapper">
        <form method="post" action="index.php?lang='.$_GET["lang"].'&page=preventivo&option=step3" id="step3_form" enctype="multipart/form-data">
	    <input type="hidden" name="size" id="size" value="'.$_POST["size"].'">
	    <input type="hidden" name="colors" id="colors" value="'.$_POST["colors".$_POST["size"]].'">
	    <input type="hidden" name="pack" id="pack" value="'.$_POST["pack".$_POST["size"]].'">
	    <input type="hidden" name="promocode" id="promocode" value="'.$_POST["promocode"].'">
	    <input type="hidden" name="count" id="count" value="'.$_POST["count"].'">
	    <input type="hidden" name="totalcost" id="totalcost" value="'.$_POST["totalcost"].'">
	    <input type="hidden" name="country" id="country" value="'.$_POST["country"].'">
	    <fieldset>
                <legend>'.$lng[cont3].'</legend>
                <div class="field">
					<label>Forma Giuridica:</label>
					<select name="forma" id="forma"><option value="0">Azienda / Ditta individuale</option><option value="1">Libero Professionista</option><option value="2">Persona Fisica</option><option value="3">Altro Soggetto (Ente, Associazione)</option></select>
                </div>

               <div class="field">
                	<label id="denom"><sup>* </sup>Denominazione:</label>
					<input type="text" name="impresa" id="impresa" value="" maxlength="50" data-validate="{maxlength:50,minlength:5}">
               </div>
               <div class="field">
                	<label for="tel_feedback_form"><sup>* </sup>Indirizzo:</label>
					<input type="text" name="via" id="via" maxlength="100" data-validate="{maxlength:100,minlength:5}">
               </div>
               <div class="field">
                	<label><sup>* </sup>CAP:</label>
					<input type="text" name="cap" id="cap" maxlength="10" data-validate="{maxlength:10,minlength:5}">
               </div>
               <div class="field">
                	<label><sup>* </sup>Localita\':</label>
					<input type="text" name="localita" id="localita" value="" maxlength="100" data-validate="{maxlength:100,minlength:5}">
               </div>
               <div class="field" id="cfpiva">
                	<label><sup>* </sup>Partita Iva:</label>
					<input type="text" name="piva" id="piva" value="" maxlength="20" data-validate="{maxlength:20,minlength:5}">
               </div>
               <div class="field">
                	<label><sup>* </sup>Codice Fiscale:</label>
					<input type="text" name="cf" id="cf" value="" maxlength="20" data-validate="{maxlength:20,minlength:5}">
               </div>
               <div class="field" id="cfref">
                	<label><sup>* </sup>Referente:</label>
					<input type="text" name="contatto" id="contatto" value="" maxlength="100" data-validate="{maxlength:100,minlength:5}">
               </div>
               <div class="field">
                	<label><sup>* </sup>Telefono:</label>
					<input type="text" name="telefono" id="telefono" value="" maxlength="100" data-validate="{maxlength:100,minlength:5}">
               </div>
               <div class="field">
                	<label><sup>* </sup>Email:</label>
					<input type="text" name="email" id="email" value="" maxlength="100" data-validate="{maxlength:25,minlength:5}">
               </div>
            </fieldset>
            <fieldset class="buttons">
                <input type="submit" name="step3" id="step3" value="Conferma" class="button" data-indicator-text="Invio ..." data-indicator="local">
		<input type="reset" name="Reset" id="Reset" value="Annulla" class="aButton">
	    </fieldset>';
                echo'<legend>'.$lng[cont2].'</legend>
        </form>
    </div>
	</div>';
}else{
	echo '<div id="content_wrapper">
        <p id="description">'.$lng[prev1].'</p>
    <div id="form_wrapper">
        <form method="post" action="index.php?lang='.$_GET["lang"].'&page=preventivo&option=step2" id="step2_form" enctype="multipart/form-data">
	    	<input type="hidden" name="sizetext" id="sizetext" value="">
			<input type="hidden" name="colortext" id="colortext" value="">
			<input type="hidden" name="packtext" id="packtext" value="">
			<input type="hidden" name="totalcost" id="totalcost" value="">
            <fieldset>
                <legend>'.$lng[prev2].'</legend>
                
                <div class="field">
					<label>Destinazione:</label>
					<form method="post" action="index.php?lang='.$_GET["lang"].'&page=preventivo&option=confirm" id="country_form">
					<select name="country" id="country">';
					$result=mysql_query("SELECT * FROM price WHERE active=1");
					while ($row=mysql_fetch_array($result,MYSQL_ASSOC)){  
						echo'<option value="'.$row[id].'">'.$row[country].'</option>';
					}
					echo'</select>
					</form>
				</div>                
                <div class="field">
			<label for="name_feedback_form">Diametro della pallina:</label>
			<select name="size" id="size"><option value="0">40 mm</option><option value="1">60 mm</option><option value="2">65 mm</option><option value="3">80 mm</option><option value="4">100 mm</option><option value="5">150 mm</option></select>
      		</div>
                <div class="field">
                	<label for="tel_feedback_form">Colori stampa:</label>
			<div id="divcolor0" style="display:inline;" class="active"><select name="colors0" id="colors0" class="colorselect"><option value="1">1 </option><option value="2">2 </option><option value="3">3 </option><option value="4">4 </option></select></div>
			<div id="divcolor1" style="display:none; "><select name="colors1" id="colors1" class="colorselect"><option value="1">1 </option><option value="2">2 </option><option value="3">3 </option><option value="4">4 </option></select></div>
			<div id="divcolor2" style="display:none; "><select name="colors2" id="colors2" class="colorselect"><option value="1">1 </option><option value="2">2 </option><option value="3">3 </option><option value="4">4 </option><option value="5">Quadricromia</option></select></div>
			<div id="divcolor3" style="display:none; "><select name="colors3" id="colors3" class="colorselect"><option value="1">1 </option><option value="2">2 </option><option value="3">3 </option><option value="4">4 </option><option value="5">Quadricromia</option></select></div>
			<div id="divcolor4" style="display:none; "><select name="colors4" id="colors4" class="colorselect"><option value="1">1 </option><option value="2">2 </option><option value="3">3 </option><option value="4">4 </option><option value="5">Quadricromia</option></select></div>
			<div id="divcolor5" style="display:none; "><select name="colors5" id="colors5" class="colorselect"><option value="1">1 </option></select></div>
                </div>
                <div class="field">
			<label for="email_feedback_form">Confezione:</label>
			<div id="divpack0" style="display:inline;" class="active"><select name="pack0" id="pack0" class="packselect"><option value="0">Sfuso</option><option value="1">Blister da 8</option><option value="2">Blister da 12</option></select></div>
			<div id="divpack1" style="display:none;"><select name="pack1" id="pack1" class="packselect"><option value="0">Sfuso</option><option value="1">Confezione di carta da 1</option><option value="2">Blister da 1</option></select></div>
			<div id="divpack2" style="display:none;"><select name="pack2" id="pack2" class="packselect"><option value="0">Sfuso</option><option value="1">Confezione di carta da 1</option><option value="2">Blister da 1</option></select></div>
			<div id="divpack3" style="display:none;"><select name="pack3" id="pack3" class="packselect"><option value="0">Sfuso</option><option value="1">Confezione di carta da 1</option><option value="2">Blister da 1</option></select></div>
			<div id="divpack4" style="display:none;"><select name="pack4" id="pack4" class="packselect"><option value="0">Sfuso</option><option value="1">Confezione di carta da 1</option><option value="2">Blister da 1</option></select></div>
			<div id="divpack5" style="display:none;"><select name="pack5" id="pack5" class="packselect"><option value="0">Sfuso</option><option value="1">Confezione di carta da 1 + piedistallo</option></select></div>
                </div>
                <div class="field textarea">
			<label for="feedback_feedback_form">Quantita\':</label>
			<input type="text" autocomplete="off" name="count" id="count" maxlength="10" data-validate="{maxlength:10,minlength:3}" style="width: 200px;">
		</div>
                <div class="field textarea">
			<label for="feedback_feedback_form">Buono acquisto:</label>
			<input type="text" name="promocode" id="promocode" maxlength="25" data-validate="{maxlength:25,minlength:5}" style="width: 200px;">
			<span id="promosconto"></span>                    
		</div>
                <div class="field textarea">
			<label for="feedback_feedback_form">Totale:</label>
			<span id="totalprice">Ordine minimo 100 pezzi.</span>                    
		</div>
            </fieldset>
            <fieldset class="buttons">
                <input type="submit" name="step2" id="step2" value="Procedi l\'ordine" class="button" data-indicator-text="Invio ..." data-indicator="local">
		<input type="reset" name="Reset" id="Reset" value="Annulla" class="aButton">
	    </fieldset>';
                echo'<legend>'.$lng[cont2].'</legend>
        </form>
    </div>
</div>';
}
echo '</div>';            
include ('footer.php');
echo '</div>';
?>