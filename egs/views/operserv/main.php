<?php $this->load->view('header'); ?>
	<?php $this->load->view('navigation'); ?>
	
		<!-- The content -->
		<section id="content">
			
			<h2>Operserv Access</h2>

			<div class="box-content">
				<p class="hlight">
					<?php array_shift($specs); array_pop($specs); foreach ($specs as $spec): ?>
						<?php print $spec; ?><br /><br />
					<?php endforeach; ?>
				</p>
			</div>

			<!-- send global -->
			<div class="column left">
				<h3>Global Message</h3>
				
				<form action="" method="post">
				<section>
					<label>
						Global Message
					</label>
					<div>
						<textarea name="g_msg"></textarea>
						<br /><br />
						<input type="submit" name="submit" value="Send Global" class="button primary" />
					</div>
				</section>

				<input type="hidden" name="global_message" value="1" />
				</form>
			</div>

			<!-- clearchan command -->
			<div class="column right">
				<h3>Clear Channel</h3>

				<form action="" method="post">
				<section>
					<label>
						Action
					</label>
					<div>
						<select name="clear_action">
							<option value="KICK">Kick</option>
							<option value="KILL">Kill</option>
							<option value="AKILL">AKill</option>
						</select>
					</div>
				</section>

				<section>
					<label>
						Channel
					</label>
					<div>
						<input type="text" name="channel" placeholder="#channel" class="required" />
					</div>
				</section>

				<section>
					<label>
						Reason
						<small>(Optional)</small>
					</label>
					<div>
						<input type="text" name="clear_reason" class="required" />
						<br /><br />
						<input type="submit" name="submit" value="Clear Channel" class="button primary danger" />
					</div>
				</section>

				<input type="hidden" name="clear_channel" value="1" />
				</form>
			</div>

			<div class="clear">&nbsp;</div>
		</section>
	</div>
          
<?php $this->load->view('footer'); ?>