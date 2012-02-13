<?php $this->load->view('header'); ?>
	<?php $this->load->view('navigation'); ?>
	
		<!-- The content -->
		<section id="content">
			
			<h2>Nickserv &gt; Info.</h2>
			<div class="box-content">
				<p class="hlight"><?php print $response; ?></p>
			</div>
			
			<form action="" method="post">
				<section>
					<label for="nickname">
						Nickname
						<small>Nickname to lookup</small>
					</label>
					<div>
						<input name="nickname" id="nickname" size="35" maxlength="50" type="text" placeholder="Nickname" class="required" />
						<br /><br />
						<input type="submit" value="Get Info" class="button primary" />
					</div>	
				</section>
			</form>

			<div class="clear">&nbsp;</div>
		</section>
	</div>
          
<?php $this->load->view('footer'); ?>