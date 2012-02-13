<?php $this->load->view('header'); ?>
	<?php $this->load->view('navigation'); ?>
	
		<!-- The content -->
		<section id="content">
		
			<h2>HostServ &gt; Offer List (Available Hostnames)</h2>
		
			<?php if (isset($response)) : ?>
			<h3><?php _t('hs_list_response'); ?></h3>
			<p class="hlight">
				<?php if (is_array($response)) : ?>
					<?php foreach ($response as $line) : ?>
						<?php print $line; ?> <br />
					<?php endforeach; ?>
				<?php else : ?>
					<?php print $response; ?>
				<?php endif; ?>
			</p>
			<?php endif; ?>

					
		<div class="clear">&nbsp;</div>
		</section>
	</div>
          
<?php $this->load->view('footer'); ?>