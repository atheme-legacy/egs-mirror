<?php $this->load->view('header'); ?>
	<?php $this->load->view('navigation'); ?>
	
		<!-- The content -->
		<section id="content">
		
			<h2>Memoserv &gt; Send</h2>
			
			<?php if (isset($nickname) && !$nickname) : ?>
			
				<form action="" method="post">
				<section>
					<label for="nickname">
						<?php _t('form_nickname'); ?>
						<small><?php _t('ms_send_nickname_hint'); ?>.</small>
					</label>
					<div>
						<input name="nickname" id="nickname" <?php print "value='{$nickname}'"; ?> size="35" maxlength="50" type="text" placeholder="Nickname" class="required" />
					</div>
				</section>
				
				<section>
					<label for="thememo">
						<?php _t('form_memo'); ?>
					</label>
					<div>
						<textarea name="thememo" id="thememo"></textarea>
						<br /><br />
						<input type="submit" name="submit" value="<?php _t('button_send'); ?>" class="primary button" />
					</div>
				</section>				
				</form>
							
			<?php else : ?>
			
				<form action="" method="post">
				<section>
					<label for="nickname">
						<?php _t('form_nickname'); ?>
						<small><?php _t('ms_send_nickname_hint'); ?>.</small>
					</label>
					<div>
						<input name="nickname" id="nickname" <?php print "placeholder='{$nickname}'"; ?> size="35" maxlength="50" type="text" class="required" />
					</div>
				</section>
				
				<section>
					<label for="thememo">
						<?php _t('form_memo'); ?>
					</label>
					<div>
						<textarea name="thememo" id="thememo"></textarea>
						<br /><br />
						<input type="submit" name="submit" value="<?php _t('button_send'); ?>" class="primary button" />
					</div>
				</section>				
				</form>
							
			<?php endif; ?>
			
		<div class="clear">&nbsp;</div>
		</section>
	</div>
          
<?php $this->load->view('footer'); ?>