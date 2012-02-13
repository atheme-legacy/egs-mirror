<?php $this->load->view('header'); ?>
	<?php $this->load->view('navigation'); ?>
	
		<!-- The content -->
		<section id="content">
			
			<h2>Chanserv &gt; Info.</h2>
			<div class="box-content">
		
				<?php if (isset($response)) : ?>
					<h3><?php _t('cs_info_response'); ?></h3>
					<p class="hlight">
					<?php if (is_array($response)) : ?>
						<?php foreach ($response as $line) : ?>
							<?php print trim($line); ?> <br />
						<?php endforeach; ?>
					<?php else : ?>
						<?php print $response; ?>
					<?php endif; ?>
					</p>
				<?php endif; ?>
			
				<form action="" method="post">
				<section>
					<label for="channel">
						<?php _t('form_channel'); ?>
						<small><?php _t('cs_info_channel_hint'); ?>.</small>
					</label>
					<div>
						<input name="channel" id="channel" size="35" maxlength="50" type="text" placeholder="#channel" class="required" />
						<br /><br />
						<input type="submit" value="<?php _t('button_list'); ?>" class="primary button" />
						<input type="reset" value="Clear" class="button" />
					</div>
				</section>
				</form>
			</div>
			
			<div class="clear">&nbsp;</div>
		</section>
	</div>
          
<?php $this->load->view('footer'); ?>
