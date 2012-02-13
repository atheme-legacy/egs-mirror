<?php $this->load->view('header'); ?>
	<?php $this->load->view('navigation'); ?>
	
		<!-- The content -->
		<section id="content">
		
			<h2>Memoserv &gt; List</h2>
			
			<?php if (isset($response)) : ?>
				<p class="hlight"><?php print nl2br($response); ?></p>
			<?php endif; ?>

			<div class="memo heading">
				<div class="memofrom"><strong>From</strong></div>
				<div class="memodate"><strong>Date</strong></div>
				<div class="memostatus"><strong>Status</strong></div>
				<div class="memoactions"><strong>Actions</strong></div>
			</div>

			<?php foreach ($memos as $memo) : ?>	
			<div class="memo">
				<div class="memofrom"><?php print $memo[2]; ?></div>
				<div class="memodate"><?php print $memo[3]; ?></div>
				<div class="memostatus"><?php print ucfirst($memo[4]); ?></div>
				<div class="memoactions button-group">
					<a href="<?php print site_url("memoserv/viewmemo/{$memo[1]}"); ?>" class="button primary">Open</a>
					<a href="<?php print site_url("memoserv/delmemo/{$memo[1]}"); ?>" class="button danger">Delete</a>
				</div>
    		</div>
    		<?php endforeach; ?>
						
			<div class="clear">&nbsp;</div>
		</section>
	</div>
          
<?php $this->load->view('footer'); ?>