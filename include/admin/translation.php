<h1 class="screen-reader-text">Calendar Language Translation</h1>
<table class="form-table">
	<tbody>
		<tr valign="top">
		<th scope="row"><?php _e('Calculate ovulation', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[calculate-ovulation]" value="<?php echo (!empty($options['calculate-ovulation'])) ?  $options['calculate-ovulation'] : 'Calculate ovulation'?>" class="regular-text"/>
		</td>
		</tr>
		
		
		<tr valign="top">
		<th scope="row"><?php _e('First day of your last period', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[first-day-last-period]" value="<?php echo (!empty($options['first-day-last-period'])) ?  $options['first-day-last-period'] : 'First day of your last period'?>" class="regular-text"/>
		</td>
		</tr>
		
		
		<tr valign="top">
		<th scope="row"><?php _e('Select date...', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[select-date]" value="<?php echo (!empty($options['select-date'])) ?  $options['select-date'] : 'Select date'?>" class="regular-text"/>
		</td>
		</tr>
		
		
		<tr valign="top">
		<th scope="row"><?php _e('Length of your cycle', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[length-cycle]" value="<?php echo (!empty($options['length-cycle'])) ?  $options['length-cycle'] : 'Length of your cycle'?>" class="regular-text"/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e('Submit', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-submit]" value="<?php echo (!empty($options['oc-submit'])) ?  $options['oc-submit'] : 'Submit'?>" class="regular-text"/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e('Your ovulation dates', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-dates]" value="<?php echo (!empty($options['oc-dates'])) ?  $options['oc-dates'] : 'Your ovulation dates'?>" class="regular-text"/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e("Press the arrow to see next month(s) result", "ovulationcalculator-group");?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-next-month-results]" value="<?php echo (!empty($options['oc-next-month-results'])) ?  $options['oc-next-month-results'] : 'Press the arrow to see next month(s) result'?>" class="regular-text"/>
		</td>
		</tr>
		
		
		<tr valign="top">
		<th scope="row"><?php _e("Days of expected ovulation", "ovulationcalculator-group");?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-expected-ovulation]" value="<?php echo (!empty($options['oc-expected-ovulation'])) ?  $options['oc-expected-ovulation'] : 'Days of expected ovulation'?>" class="regular-text"/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e("Fertile", "ovulationcalculator-group");?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-fertile]" value="<?php echo (!empty($options['oc-fertile'])) ?  $options['oc-fertile'] : 'Fertile'?>" class="regular-text"/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e("Start of new cycle", "ovulationcalculator-group");?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-start-ovulation]" value="<?php echo (!empty($options['oc-start-ovulation'])) ?  $options['oc-start-ovulation'] : 'Start of new cycle'?>" class="regular-text"/>
		</td>
		</tr>
		
		
		<tr valign="top">
		<th scope="row"><?php _e("Change date", "ovulationcalculator-group");?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-change-date]" value="<?php echo (!empty($options['oc-change-date'])) ?  $options['oc-change-date'] : 'Change date'?>" class="regular-text"/>
		</td>
		</tr>
	</tbody>
</table>