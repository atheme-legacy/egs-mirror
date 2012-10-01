		<?php if ($this->session->userdata('is_authed')) : ?>
		
		<?php
			if ($this->config->item('atheme_memoserv'))
				$mdata = $this->memoserv_model->get_memos(TRUE);
				
			if (preg_match('/\((.*) new\)/sm', $mdata['data'], $regs))
				$new_memos = $regs[1];
			else
				$new_memos = FALSE;	
		?>
		
		<!-- primary navigation -->
		<nav id="primary">
			<ul>
			<li <?php print ((stristr(uri_string(), "main")) ? 'class="current"' : '') ?>><a href="<?php print site_url('main/home'); ?>"><span class="icon dashboard"></span>Dashboard</a></li>
                
                <?php if ($this->config->item('atheme_nickserv')) : ?>
                	<li <?php print ((stristr(uri_string(), "nickserv")) ? 'class="current"' : '') ?>><a href="<?php print site_url('nickserv'); ?>"><span class="icon tables"></span><?php print ucfirst(strtolower($this->config->item('atheme_nickserv'))); ?></a></li>
                <?php endif; ?>
                
                <?php if ($this->config->item('atheme_chanserv')) : ?>
                	<li <?php print ((stristr(uri_string(), "chanserv")) ? 'class="current"' : '') ?>><a href="<?php print site_url('chanserv/info'); ?>"><span class="icon modal"></span><?php print ucfirst(strtolower($this->config->item('atheme_chanserv'))); ?></a></li>
                <?php endif; ?>
                
                <?php if ($this->config->item('atheme_memoserv')) : ?>
                	<li <?php print ((stristr(uri_string(), "memoserv")) ? 'class="current"' : '') ?>><a href="<?php print site_url('memoserv'); ?>"><span class="icon pencil"></span><?php print (($new_memos) ? '<span class="badge"> ' . $new_memos . '</span>' : ''); ?><?php print ucfirst(strtolower($this->config->item('atheme_memoserv'))); ?></a></li>
               	<?php endif; ?>
               	
               	<?php if ($this->config->item('atheme_hostserv')) : ?>
                	<li <?php print ((stristr(uri_string(), "hostserv")) ? 'class="current"' : '') ?>><a href="<?php print site_url('hostserv/offerlist'); ?>"><span class="icon newspaper"></span><?php print ucfirst(strtolower($this->config->item('atheme_hostserv'))); ?></a></li>
                <?php endif; ?>

                <?php if ($this->config->item('atheme_operserv') && $this->operserv_model->check_access()) : ?>
                	<li <?php print ((stristr(uri_string(), "operserv")) ? 'class="current"' : '') ?>><a href="<?php print site_url('operserv'); ?>"><span class="icon modal"></span><?php print ucfirst(strtolower($this->config->item('atheme_operserv'))); ?></a></li>
                <?php endif; ?>
			</ul>
		</nav>
            
		<!-- secondary navigation -->
		<nav id="secondary">
		<?php if (stristr(uri_string(), "nickserv")) : ?>
		<ul>
			<li <?php print ((uri_string() === "nickserv") ? 'class="current"' : '') ?>><a href="<?php print site_url('nickserv'); ?>"><?php _t('ns_info'); ?></a></li>
			<li <?php print ((uri_string() === "nickserv/password") ? 'class="current"' : '') ?>><a href="<?php print site_url('nickserv/password'); ?>"><?php _t('ns_password'); ?></a></li>
			<li <?php print ((uri_string() === "nickserv/email") ? 'class="current"' : '') ?>><a href="<?php print site_url('nickserv/email'); ?>"><?php _t('ns_email'); ?></a></li>
		</ul>
		<?php elseif (stristr(uri_string(), "chanserv")) : ?>
			<ul>
				<li <?php print ((uri_string() === "chanserv/info") ? 'class="current"' : '') ?>><a href="<?php print site_url('chanserv/info'); ?>"><?php _t('cs_info'); ?></a></li>
				<li <?php print ((uri_string() === "chanserv/topic") ? 'class="current"' : '') ?>><a href="<?php print site_url('chanserv/topic'); ?>"><?php _t('cs_topic'); ?></a></li>
				<li <?php print ((uri_string() === "chanserv/kick") ? 'class="current"' : '') ?>><a href="<?php print site_url('chanserv/kick'); ?>"><?php _t('cs_kick'); ?></a></li>
				<li <?php print ((uri_string() === "chanserv/ban") ? 'class="current"' : '') ?>><a href="<?php print site_url('chanserv/ban'); ?>"><?php _t('cs_ban'); ?></a></li>
				<li <?php print ((uri_string() === "chanserv/akick") ? 'class="current"' : '') ?>><a href="<?php print site_url('chanserv/akick'); ?>"><?php _t('cs_akick'); ?></a></li>
			<?php if ($this->config->item('atheme_xop')) : ?>
				<li <?php print ((uri_string() === "chanserv/xop") ? 'class="current"' : '') ?>><a href="<?php print site_url('chanserv/xop'); ?>">XOP</a></li>
			<?php else: ?>
				<li <?php print ((uri_string() === "chanserv/flags") ? 'class="current"' : '') ?>><a href="<?php print site_url('chanserv/flags'); ?>"><?php _t('cs_flags'); ?></a></li>
			<?php endif; ?>
			</ul>
		<?php elseif (stristr(uri_string(), "memoserv")) : ?>
			<ul>
				<li <?php print ((uri_string() === "memoserv") ? 'class="current"' : '') ?>><a href="<?php print site_url('memoserv'); ?>"><?php _t('ms_view'); ?></a></li>
				<li <?php print ((uri_string() === "memoserv/sendmemo") ? 'class="current"' : '') ?>><a href="<?php print site_url('memoserv/sendmemo'); ?>"><?php _t('ms_send'); ?></a></li>
				<li <?php print ((uri_string() === "memoserv/forward") ? 'class="current"' : '') ?>><a href="<?php print site_url('memoserv/forward'); ?>"><?php _t('ms_fwd'); ?></a></li>
				<li <?php print ((stristr(uri_string(), "memoserv/delmemo")) ? 'class="current"' : '') ?>><a href="<?php print site_url('memoserv/delmemo'); ?>"><?php _t('ms_delete'); ?></a></li>
			</ul>
		<?php elseif (stristr(uri_string(), "hostserv")) : ?>
			<ul>
				<li <?php print ((uri_string() === "hostserv/offerlist") ? 'class="current"' : '') ?>><a href="<?php print site_url('hostserv/offerlist'); ?>"><?php _t('hs_offer'); ?></a></li>
				<li <?php print ((uri_string() === "hostserv/request") ? 'class="current"' : '') ?>><a href="<?php print site_url('hostserv/request'); ?>"><?php _t('hs_request'); ?></a></li>
				<li <?php print ((uri_string() === "hostserv/take") ? 'class="current"' : '') ?>><a href="<?php print site_url('hostserv/take'); ?>">Take</a></li>
			</ul>
		<?php elseif (stristr(uri_string(), "operserv")) : ?>
			<ul>
				<li <?php print ((uri_string() === "operserv/akill") ? 'class="current"' : '') ?>><a href="<?php print site_url('operserv/akill'); ?>">AKill</a></li>
			<?php if ($this->config->item('atheme_soper')) : ?>
				<li <?php print ((uri_string() === "operserv/soper") ? 'class="current"' : '') ?>><a href="<?php print site_url('operserv/soper'); ?>">Soper</a></li>
			<?php endif; ?>
				<li <?php print ((uri_string() === "operserv/modules") ? 'class="current"' : '') ?>><a href="<?php print site_url('operserv/modules'); ?>">Modules</a></li>
				<li <?php print ((uri_string() === "operserv/rehash") ? 'class="current"' : '') ?>><a href="<?php print site_url('operserv/rehash'); ?>">Rehash</a></li>
				<li <?php print ((uri_string() === "operserv/hash") ? 'class="current"' : '') ?>><a href="<?php print site_url('operserv/hash'); ?>">Password Hash</a></li>
			</ul>
		<?php endif; ?>
		</nav>
            
		<?php endif; ?>