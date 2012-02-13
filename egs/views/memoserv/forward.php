<?php $this->load->view('header'); ?>
	<?php $this->load->view('navigation'); ?>
	
		<!-- The content -->
		<section id="content">
			<h2>Memoserv &gt; Forward</h2>
			
			<?php if (isset($memoid) && !$memoid) : ?>
			
				<form action="" class="uniForm" method="post">
				<section>
					<label for="nickname">
						<?php _t('form_nickname'); ?>
						<small><?php _t('ms_fwd_nickname_hint'); ?>.</small>
					</label>
					<div>
						<input name="nickname" id="nickname" size="35" maxlength="50" type="text" placeholder="Nickname" class="required" />
					</div>
				</section>
    	    	
				<section>
					<label for="memoid">
						<?php _t('form_memo'); ?> #
						<small><?php _t('ms_fwd_memo_hint'); ?>.</small>
					</label>
					<div>
						<input name="memoid" id="memoid" size="35" maxlength="50" type="text" placeholder="#MemoID" class="required" />
						<br /><br />
						<input type="submit" name="submit" value="<?php _t('button_forward'); ?>" class="primary button" />
					</div>
				</section>
				</form>
			
			<?php else : ?>
			
				<form action="" class="uniForm" method="post">
				<section>
					<label for="nickname">
						<?php _t('form_nickname'); ?>
						<small><?php _t('ms_fwd_nickname_hint'); ?></small>
					</label>
					<div>
						<input name="nickname" id="nickname" size="35" maxlength="50" type="text" placeholder="Nickname" class="required" />
					</div>
				</section>
    	    	
				<section>
	          		<label for="memoid">
	          			<?php _t('form_memo'); ?> #
	          			<small><?php _t('ms_fwd_memo_hint'); ?>.</small>
	          		</label>
	          		<div>
	          			<input name="memoid" id="memoid" size="35" <?php print "placeholder='{$memoid}'"; ?> maxlength="50" type="text" class="required" />
	          			<br /><br />
	          			<input type="submit" name="submit" value="<?php _t('button_forward'); ?>" class="primary button" />
	          		</div>
				</section>		
				</form>
			
			<?php endif; ?>
			
		<div class="clear">&nbsp;</div>
		</section>
	</div>
          
<?php $this->load->view('footer'); ?>