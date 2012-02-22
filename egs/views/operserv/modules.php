<?php $this->load->view('header'); ?>
	<?php $this->load->view('navigation'); ?>
	
		<!-- The content -->
		<section id="content">
			
			<h2>Operserv &gt; Modules</h2>

			<p><h3 style="color: red;">Warning</h3> Be very careful while unloading modules, as some of these may be in use! Be careful! You've been warned, nuf said I'm not your mum.</p>

			<!-- load module -->
			<div class="column left">
				
				<form action="" method="post">
				<section>
					<label>
						Module
						<small>with path</small>
					</label>
					<div>
						<input type="text" name="module_name" placeholder="modules/path/module_name" class="required" />
						<br /><br />
						<input type="submit" name="submit" value="Load Module" class="button primary" />
					</div>
				</section>

				<input type="hidden" name="load_module" value="1" />
				</form>

			</div>

			<!-- unload module -->
			<div class="column right">

				<form action="" method="post">
				<section>
					<label>
						Module
						<small>width path</small>
					</label>
					<div>
						<select name="module_name">
							<?php foreach ($modules as $mod) : ?>
								<option><?php print $mod; ?></option>
							<?php endforeach; ?>
						</select>
						<br /><br />
						<input type="submit" name="submit" value="Unload Module" class="button primary danger" />
					</div>
				</section>

				<input type="hidden" name="unload_module" value="1" />
				</form>
				
			</div>

			<div class="clear">&nbsp;</div>
		</section>
	</div>
          
<?php $this->load->view('footer'); ?>