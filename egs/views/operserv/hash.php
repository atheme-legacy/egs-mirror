<?php $this->load->view('header'); ?>
	<?php $this->load->view('navigation'); ?>
	
		<!-- The content -->
		<section id="content">
			
			<h2>Operserv &gt; Password Hash</h2>

			<?php if (isset($hash)) : ?>
				<pre id="ccopy"><?php print $hash; ?></pre>
			<?php endif; ?>

			<div>
				
				<form action="" method="post">
				<section>
					<label>
						Password
					</label>
					<div>
						<input type="text" name="password" class="required" />
					</div>
				</section>

				<section>
					<label>
						Encryption
					</label>
					<div>
						<select name="enc_type">
							<option>MD5</option>
							<option>SHA1</option>
						</select>
						<br /><br />
						<input type="submit" name="submit" value="Generate Hash" class="button primary" />
					</div>
				</section>
				</form>

			</div>

			<div class="clear">&nbsp;</div>
		</section>
	</div>
          
<?php $this->load->view('footer'); ?>