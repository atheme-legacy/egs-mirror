<?php $this->load->view('header'); ?>
	<?php $this->load->view('navigation'); ?>
	
		<!-- The content -->
		<section id="content">
			
			<h2>Operserv &gt; Rehash</h2>
				
			<form action="" method="post">
			<section>
				<label>
					Rehash Check
					<small>Type "YES" in the box to the right (without quotes) if you really want to rehash Atheme</small>
				</label>
				<div>
					<input type="text" name="rehash_check" class="required" />
					<br /><br />
					<input type="submit" name="submit" value="Rehash Atheme" class="button primary danger" />
				</div>
			</section>
			</form>
		
			<div class="clear">&nbsp;</div>
		</section>
	</div>
          
<?php $this->load->view('footer'); ?>