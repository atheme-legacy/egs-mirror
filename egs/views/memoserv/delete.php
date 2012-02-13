<?php $this->load->view('header'); ?>
	<?php $this->load->view('navigation'); ?>
	
		<!-- The content -->
		<section id="content">
		
			<h2>Memoserv &gt; Delete</h2>
			
			<?php if (isset($memoid) && !$memoid) : ?>
				
				<form action="" method="post">
				<section>
	          		<label for="memoid">
	          			<?php _t('form_memo'); ?> #
	          			<small><?php _t('ms_del_memo_hint'); ?>.</small>
	          		</label>
	          		<div>
	          			<input name="memoid" id="memoid" size="35" maxlength="50" type="text" placeholder="#MemoID" class="required" />
	          			<br /><br />
	          			<input type="submit" name="submit" value="<?php _t('button_delete'); ?>" class="primary button danger" />
	          		</div>
				</section>
				</form>
		
			<?php else : ?>
		
				<form action="" method="post">
				<section>
		          	<label for="memoid">
		          		<?php _t('form_memo'); ?> #
		          		<small><?php _t('ms_del_memo_hint'); ?>.</small>
		          	</label>
		          	<div>
		          		<input name="memoid" id="memoid" size="35" <?php print "placeholder='{$memoid}'"; ?> maxlength="50" type="text" class="required" />
		          		<br /><br />
		          		<input type="submit" value="Delete" class="primary button danger" />
		          	</div>
				</section>
				</form>
				
			<?php endif; ?>
						
			<div class="clear">&nbsp;</div>
		</section>
	</div>
          
<?php $this->load->view('footer'); ?>