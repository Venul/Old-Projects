<?php
		echo '<div id="footer">
			<span id="copy">&copy; 2013 Leonstyle - P.IVA 04945990960 - Via G.B.Pergolesi 18, 20124 Milano, Cell. +39 339 4268958</span>
			<div id="footer_menu">
				<div class="box">
					<ul id="extra_menu">
						<li class="btnAbout">
							<span>';
//								echo '<a class="vkontakte" target="_blank" title="Idee Natalizie VKontakte" href="http://vk.com/idee_natalizie"><span class="icon24 icon24-vkontakte"></span></a>';
								echo '<a class="facebook" target="_blank" title="Idee Natalizie Facebook" href="http://www.facebook.com/idee.natalizie"><img src= "images/facebook.png" width=24px height=24px/></a>';
								echo '<a class="twitter" target="_blank" title="Idee Natalizie Twitter" href="https://twitter.com/ideenatalizie"><img src= "images/twitter.png" width=24px height=24px/></a>';
//								echo '<a class="youtube" target="_blank" title="Idee Natalizie YouTube" href="http://www.youtube.com/user/Music1ru"><span class="icon24 icon24-youtube"></span></a>';
							echo '</span>
						</li>';
						echo '<li class="btnAddThisShare"><a href="index.php?'; if(isset($lang)){echo'lang='.$lang.'&';} echo'page=contatti">Contatti</a></li>';
//						echo '<li class="btnAddThisShare"><a href="index.php?'; if(isset($lang)){echo'lang='.$lang.'&';} echo'page=login">Area Clienti</a></li>';
					echo '</ul>
				</div>
			</div>
		</div>';
?>