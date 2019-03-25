<h1 class="screen-reader-text">Calendar Days Translation</h1>
<table class="form-table">
	<tbody>
		<tr valign="top">
		<th scope="row"><?php _e('Monday', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-mon]" value="<?php echo (!empty($options['oc-mon'])) ?  $options['oc-mon'] : 'Mon'?>" class="small-text"/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e('Tuesday', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-tue]" value="<?php echo (!empty($options['oc-tue'])) ?  $options['oc-tue'] : 'Tue'?>" class="small-text"/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e('Wednesday', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-wed]" value="<?php echo (!empty($options['oc-wed'])) ?  $options['oc-wed'] : 'Wed'?>" class="small-text"/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e('Thursday', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-thu]" value="<?php echo (!empty($options['oc-thu'])) ?  $options['oc-thu'] : 'Thu'?>" class="small-text"/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e('Friday', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-fri]" value="<?php echo (!empty($options['oc-fri'])) ?  $options['oc-fri'] : 'Fri'?>" class="small-text"/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e('Saturday', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-sat]" value="<?php echo (!empty($options['oc-sat'])) ?  $options['oc-sat'] : 'Sat'?>" class="small-text"/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e('Sunday', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-sun]" value="<?php echo (!empty($options['oc-sun'])) ?  $options['oc-sun'] : 'Sun'?>" class="small-text"/>
		</td>
		</tr>
	</tbody>
</table>
