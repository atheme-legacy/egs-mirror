<?php $this->load->view('header'); ?>
	<?php $this->load->view('navigation'); ?>
	
		<!-- The content -->
		<section id="content">
			
			<h2>Operserv &gt; AKill</h2>

			<!-- akill list -->
			<table>
			<thead>
				<th>ID</th>
				<th>Nick | Hostmask</th>
				<th>Added By</th>
				<th>Expires On</th>
				<th>Reason</th>
			</thead>
			<tbody>
			<?php if (!empty($info)) : ?>
				<?php foreach ($info as $akill) : ?>
				<tr>
					<td id="aid"><?php print $akill['id']; ?></td>
					<td><?php print $akill['nick_host']; ?></td>
					<td><?php print $akill['added_by']; ?></td>
					<td><?php print $akill['expires']; ?></td>
					<td><?php print $akill['reason']; ?></td>
				</tr>
				<?php endforeach;?>
			<?php else : ?>
				<tr>
					<td colspan="5">None found.</td>
				</tr>
			<?php endif; ?>
			</tbody>
			</table>


			<div class="column left">

				<h3>AKill Delete</h3>
				<form action="" method="post">
				
				<section>
					<label>
						AKill ID
						<small>You can also seprate multipul ID's via a , (comma)</small>
					</label>
					<div>
						<input type="text" name="akill_id" id="akill_id" placeholder="AKill ID" class="required" />
						<br /><br />
						<input type="submit" name="delakill" value="Delete" class="button primary danger" />
					</div>
				</section>

				<input type="hidden" name="del_akill" value="1" />
				</form>
			
			</div>

			<div class="column right">
				
				<h3>Add AKill</h3>
				<form action="" method="post">
				
				<section>
					<label>
						Nick | Hostmask
						<small>synmuffin | foo@bar.com</small>
					</label>
					<div>
						<input type="text" name="nick_host" placeholder="Nick | Hostmask" class="required" />
					</div>
				</section>

				<section>
					<label>
						Type
					</label>
					<div>
						<select name="akill_type" id="akill_type">
							<option value="!P">Permanent</option>
							<option value="!T">Timed</option>
						</select>
					</div>
				</section>

				<!-- timed popup -->
				<section id="timed">
					<label>
						Duration
						<small>Format: 1d2h</small>
					</label>
					<div>
						<input type="text" name="duration" class="required" />
					</div>
				</section>

				<section>
					<label>
						Reason
					</label>
					<div>
						<input type="text" name="reason" class="required" />
						<br /><br />
						<input type="submit" name="submit" value="Add AKill" class="button primary" />
					</div>
				</section>

				<input type="hidden" name="add_akill" value="1" />
				</form>

			</div>
		
			<div class="clear">&nbsp;</div>
		</section>
	</div>
          
<?php $this->load->view('footer'); ?>