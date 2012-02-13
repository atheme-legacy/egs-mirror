<?php $this->load->view('header'); ?>
	<?php $this->load->view('navigation'); ?>
	
		<!-- The content -->
		<section id="content">
			
			<div>
				<h2>Welcome</h2>
				<p class="hlight">To the new EGs Web Panel for Atheme IRC Service. You're connect to <?php print $this->config->item('site_name'); ?>.</p>
			</div>
			
			<div class="column left">
				<h2>About EGs</h2>
				<p>
					EGs Web Panel for Atheme was created by J. Newing (synmuffin) of the IRCMojo network. Help on using EGs or around the management or customization of EGs can be obtained via <a href="irc://pool.ircmojo.org/egs">pool.ircmojo.org</a> channel #egs.
					<br /><br />
					More info on using EGs can be found @ <a href="http://epicgeeks.net/egs/">http://epicgeeks.net/egs/</a>
				</p>
			</div>
			
			<div class="column right">
				<h2>Channel Access</h2>
				<ul class="clist">
				<?php if (isset($response)): ?>
					<?php foreach($response as $line) : ?>
						<li><?php print $line; ?></li>
					<?php endforeach; endif; ?>
				</ul>
			</div>			
			
			<div class="clear">&nbsp;</div>
		</section>
	</div>
          
<?php $this->load->view('footer'); ?>
