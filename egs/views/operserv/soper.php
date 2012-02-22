<?php $this->load->view('header'); ?>
	<?php $this->load->view('navigation'); ?>
	
		<!-- The content -->
		<section id="content">
			
			<h2>Operserv &gt; Soper</h2>

			<!-- akill list -->
			<table>
			<thead>
				<th>Account</th>
				<th>Type</th>
				<th>Operclass</th>
			</thead>
			<tbody>
			<?php if (!empty($sopers)) : ?>
				<?php foreach ($sopers as $sop) : ?>
				<tr>
					<td><?php print $sop[0]; ?></td>
					<td><?php print $sop[1]; ?></td>
					<td><?php print $sop[2]; ?></td>
				</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr>
					<td colspan="5">None found.</td>
				</tr>
			<?php endif; ?>
			</tbody>
			</table>


			<div class="column left">
				<h3>Add Soper</h3>
			
				<form action="" method="post">
				<section>
					<label>
						Soper Name
					</label>
					<div>
						<input type="text" name="soper_name" placeholder="Soper Name" class="required" />
					</div>
				</section>

				<section>
					<label>
						Soper Class
					</label>
					<div>
						<input type="text" name="soper_class" placeholder="Soper Class" class="required" />
						<br /><br />
						<input type="submit" name="submit" value="Add Soper" class="button primary" />
					</div>
				</section>

				<input type="hidden" name="add_soper" value="1" />
				</form>

			</div>

			<div class="column right">
				<h3>Delete Soper</h3>

				<form action="" method="post">
				<section>
					<label>
						Soper Name
					</label>
					<div>
						<input type="text" name="soper_name" placeholder="Soper Name" class="required" />
						<br /><br />
						<input type="submit" name="submit" value="Delete Soper" class="button primary danger" />
					</div>
				</section>

				<input type="hidden" name="del_soper" value="1" />
				</form>

			</div>
		
			<div class="clear">&nbsp;</div>
		</section>
	</div>
          
<?php $this->load->view('footer'); ?>