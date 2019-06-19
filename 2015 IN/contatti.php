<script type="text/javascript">
	$(document).ready(function() {
		$("#Submit").click(function(){
       			if($("#user_name").val()==""){
				alert("Campo vuoto - Nome");
				return false;
			}
			if($("#email").val()==""){
				alert("Campo Vuoto - Email");
				return false;
			}else{
	 			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if(!emailReg.test($("#email").val())){
					alert("Verificare Email inserito");
					return false;
				}
			}
       			if($("#feedback").val()==""){
				alert("Campo vuoto - Messaggio");
				return false;
			}
			$("#feedback_form").submit();
			return false;
		});			
	});
</script>
<?
echo '<div id="page_feedback" data-role="page" class="root">

<div id="center">
<div class="headerBox"><h3>Contatti</h3></div>';

$ref=split("/", $_SERVER[HTTP_REFERER]);
print_r($_POST);

if($_POST["email"]!="" and $ref[2]=="www.ideenatalizie.com"){

    $nome = "Nome: " . $_POST['user_name']. "\n";
    $mail = "E-mail: " . $_POST['email']. "\n";
    $tel = "Telefono: " . $_POST['tel']. "\n";
    $oggetto = "Oggetto: " . $_POST['subj']. "\n";
    $testo = "Messaggio:\n" . $_POST['feedback']. "\n";
    $message = $nome.$mail.$tel.$oggetto.$testo."\n\n".date("d-m-Y H:i:s");

	mail("Natalizie Idee<info@ideenatalizie.com>", "Messaggio (Idee Natalizie)", $message, "From: ".$_POST['user_name']."<". $_POST['email'].">\r\n" . "X-Mailer: PHP/" . phpversion()); 
	mysql_query("INSERT INTO feedback (email, name, phone, subj, text) VALUES ('".$_POST['email']."', '".$_POST["user_name"]."', '".$_POST["tel"]."', '".$_POST["subj"]."', '".$_POST["feedback"]."')"); 
//	mail($_POST['mail'], "Ordine (Idee Natalizie)", "You sent an order from " . getenv("HTTP_HOST") . ".\nOrder details:\n" . $message, "From: kuzya@vaganax.com \r\n" . "X-Mailer: PHP/" . phpversion()); 

echo '<div id="content_wrapper">
	<div class="imagePreview">
 		<img src="images/postbox.gif" alt="" width="100%"/>
 	</div>
	<p id="description">'.$lng[cont4].'</p>
	</div>';

//echo "INSERT INTO feedback (email, name, phone, subj, text, answer) VALUES ('".$_POST['email']."', '".$_POST["user_name"]."', '".$_POST["tel"]."', '".$_POST["subj"]."', '".$_POST["feedback"]."')"; 



}else{
echo '<div id="content_wrapper">
        <p id="description">'.$lng[cont1].'</p>
    <div id="form_wrapper">
        <form method="post" action="index.php?lang='.$_GET["lang"].'&page=contatti" id="feedback_form">
            <fieldset>
                <legend>'.$lng[cont3].'</legend>
                <div class="field">
                    <label>Nome<sup>* </sup></label>
                    <input type="text" name="user_name" id="user_name" size="100" data-validate="{maxlength:100,minlength:3}">               
		</div>
                <div class="field">
                    <label>Telefono:</label>
                    <input type="text" name="tel" id="tel" size="100" class="required" data-validate="{maxlength:100}">                    
                </div>
                <div class="field">
                    <label><sup>* </sup>Email:</label>
                    <input type="text" name="email" id="email" size="100" class="required email" data-validate="{maxlength:100,minlength:5}">                    
                </div>
                <div class="field">
                    <label>Oggetto:</label>
                    <input type="text" name="subj" id="subj" size="100" class="required" data-validate="{maxlength:100}">                    
                </div>
                <div class="field textarea">
                    <label><sup>* </sup>Messaggio</label>
                    <textarea name="feedback" id="feedback" size="5000" class="required" data-validate="{maxlength:5000}" rows="24" cols="80"></textarea>
		</div>
            </fieldset>
            <fieldset class="buttons">
                <input type="submit" name="Submit" id="Submit" value="Invia" class="button" data-indicator-text="Invio ..." data-indicator="local">
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