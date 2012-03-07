<?php $this->load->view('header'); ?>
	<?php $this->load->view('navigation'); ?>
	
		<!-- The content -->
		<section id="content">
		
			<h2>Chanserv &gt; XOP</h2>
		
			<?php if (isset($response)) : ?>
				<h3><?php _t('cs_flags_response'); ?></h3>
				<p class="hlight">
					<?php print nl2br(print_r($response, true)); ?>
				</p>
			<?php endif; ?>
			
			<div class="column left">
			
				<h3><?php _t('cs_flags_tab_list'); ?></h3>
				<form action="" method="post">
				<section>
					<label>
						XOP
					</label>
					<div>
						<select name="xop_type">
							<option>VOP</option>
							<option>HOP</option>
							<option>AOP</option>
							<option>SOP</option>
						</select>
					</div>
				</section>

				<section>
					<label>
						<?php _t('form_channel'); ?>
					</label>
					<div>
						<input name="xop_channel" size="35" maxlength="50" type="text" placeholder="#channel" class="required" />
						<br /><br />
						<input type="submit" name="submit" value="<?php _t('button_list'); ?>" class="primary button" />
						<input type="hidden" name="list_xop" value="1" />
					</div>
				</section>
				</form>
				
			</div>
			
			<div class="column right">
				
				<h3><?php _t('cs_flags_tab_change'); ?></h3>
				<form action="" method="post">
				
				<section>
					<label>
						XOP
					</label>
					<div>
						<select name="xop_type">
							<option>VOP</option>
							<option>HOP</option>
							<option>AOP</option>
							<option>SOP</option>
						</select>
					</div>
				</section>

				<section>
					<label>
						<?php _t('form_channel'); ?>
					</label>
					<div>
						<input name="xop_channel" size="35" maxlength="50" type="text" placeholder="#channel" class="required" />
					</div>
				</section>

				<section>
					<label>
						Action
					</label>
					<div>
						<select name="xop_action">
							<option>Add</option>
							<option value="del">Delete</option>
						</select>
					</div>
				</section>
        	
				<section>
					<label>
						<?php _t('form_nickname'); ?>
					</label>
					<div>
						<input name="xop_nick" size="35" maxlength="50" type="text" placeholder="Nickname" class="required" />
						<br /><br />
						<input type="submit" name="submit" value="<?php _t('button_update'); ?>" class="primary button" />
						<input type="hidden" name="set_xop" value="1" />
					</div>
				</section>
				</form>
				
			</div>
			<div class="clear">&nbsp;</div>
			
			<br />
			<a id="flagstoggle" href="#" class="button">Toggle Flags List</a>
			<br /><br />
			
			<div id="flagstable">
				<table>
				<thead>
				<tr>
					<th>Flag</th>
					<th>Information</th>
				</tr>
				</thead>
				
				<tbody>
				<tr>
					<td>v</td>
					<td>Enables use of the voice/devoice commands.</td>
				</tr>
				<tr>
					<td>V</td>
					<td>Enables automatic voice.</td>
				</tr>
				<tr>
					<td>o</td>
					<td>Enables use of the op/deop commands.</td>
				</tr>
				<tr>
					<td>O</td>
					<td>Enables automatic op.</td>
				</tr>
				<tr>
					<td>s</td>
					<td>Enables use of the set command.</td>
				</tr>
				<tr>
					<td>i</td>
					<td>Enables use of the invite and getkey commands.</td>
				</tr>
				<tr>
					<td>r</td>
					<td>Enables use of the kick, kickban, ban and unban commands.</td>
				</tr>
				<tr>
					<td>R</td>
					<td>Enables use of the recover and clear commands.</td>
				</tr>
				<tr>
					<td>f</td>
					<td>Enables modification of channel access lists.</td>
				</tr>
				<tr>
					<td>t</td>
					<td>Enables use of the topic and topicappend commands.</td>
				</tr>
				<tr>
					<td>A</td>
					<td>Enables viewing of channel access lists.</td>
				</tr>
				<tr>
					<td>S</td>
					<td>Marks the user as a successor.</td>
				</tr>
				<tr>
					<td>F</td>
					<td>Grants full founder access.</td>
				</tr>
				<tr>
					<td>b</td>
					<td>Enables automatic kickban.</td>
				</tr>
				<tr>
					<td>*</td>
					<td>The special permission +* adds (-* removes) all permissions except +b and +F.</td>
				</tr>
				</tbody>
				</table>
			</div>
			
			<div class="clear">&nbsp;</div>
		</section>
	</div>
          
<?php $this->load->view('footer'); ?>