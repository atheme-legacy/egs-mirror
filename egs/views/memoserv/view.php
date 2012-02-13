<?php $this->load->view('header'); ?>
	<?php $this->load->view('navigation'); ?>
	
		<!-- The content -->
		<section id="content">

			<h2>Memoserv &gt; View</h2>
			
			<?php if (isset($memoid) && !$memoid) : ?>
	
				<form action="" method="post">
				<section>
	          		<label for="memoid">
	          			<?php _t('form_memo'); ?> #
	          			<small><?php _t('ms_view_memo_hint'); ?>.</small>
	          		</label>
	          		<div>
	          			<input name="memoid" id="memoid" size="35" maxlength="50" type="text" placeholder="#MemoID" class="required" />
	          			<br /><br />
	          			<input type="submit" name="submit" value="" class="primary button" />
	          		</div>
    	      	</section>
				</form>
	
			<?php else : ?>
	
			<div class="hlight">
				<?php if (isset($response)) : ?>
					<?php print nl2br($response); ?>
				<?php endif; ?>
			</div>
			
			<br />
			<br />
			
			<div class="button-group">
				<a href="<?php print site_url("memoserv/sendmemo/{$reply_nick}"); ?>" class="primary button">Reply</a>
				<a href="<?php print site_url("memoserv/forward/{$this->uri->segment(3)}"); ?>" class="button">Forward</a>
				<a href="<?php print site_url("memoserv/delmemo/{$this->uri->segment(3)}"); ?>" class="button danger">Delete</a>
			</div>
	
			<?php endif; ?>
		
			<div class="clear">&nbsp;</div>
		</section>
	</div>
          
<?php $this->load->view('footer'); ?>