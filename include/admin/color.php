<h1 class="screen-reader-text">Color Scheme</h1>
<table class="form-table">
	<tbody>
		<tr valign="top">
		<th scope="row"><?php _e('Calendar Base Color', 'ovulationcalculator-group');?></th>
		<td>			
			<input type="text" name="ovulationcalculator-group[oc-base-color]" value="<?php echo (!empty($options['oc-base-color'])) ?  $options['oc-base-color'] : '#9E8977'?>" class="oc-base-color" data-default-color="#9E8977"/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e('Period Dates', 'ovulationcalculator-group');?></th>
		<td>			
			<input type="text" name="ovulationcalculator-group[oc-period-color]" value="<?php echo (!empty($options['oc-period-color'])) ?  $options['oc-period-color'] : '#878cb4'?>" class="oc-period-color" data-default-color="#878cb4"/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e('Fertile Dates', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-fertile-dates]" value="<?php echo (!empty($options['oc-fertile-dates'])) ?  $options['oc-fertile-dates'] : '#96d2af'?>" class="oc-fertile-dates" data-default-color="#96d2af"/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e('Fertile Tick Color', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-fertile-tick]" value="<?php echo (!empty($options['oc-fertile-tick'])) ?  $options['oc-fertile-tick'] : '#41AD49'?>" class="oc-fertile-tick" data-default-color="#41AD49"/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e('Days of expected ovulation', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-ovulation-dates]" value="<?php echo (!empty($options['oc-ovulation-dates'])) ?  $options['oc-ovulation-dates'] : '#1A9F1F'?>" class="oc-ovulation-dates" data-default-color="#1A9F1F"/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e('Submit/Send Button Background Color', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-send-bg]" value="<?php echo (!empty($options['oc-send-bg'])) ?  $options['oc-send-bg'] : '#a8d1af'?>" class="oc-send-bg" data-default-color="#a8d1af"/>
		</td>
		</tr>
		<tr valign="top">
		<th scope="row"><?php _e('Submit/Send Button Hover Background Color', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-send-hover-bg]" value="<?php echo (!empty($options['oc-send-hover-bg'])) ?  $options['oc-send-hover-bg'] : '#9b9893'?>" class="oc-send-hover-bg" data-default-color="#9b9893"/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e('Submit/Send Button Text Color', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-send-text]" value="<?php echo (!empty($options['oc-send-text'])) ?  $options['oc-send-text'] : '#ffffff'?>" class="oc-send-text" data-default-color="#ffffff"/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e('Calendar Background Color', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-bg-color]" value="<?php echo (!empty($options['oc-bg-color'])) ?  $options['oc-bg-color'] : '#f5f5f5'?>" class="oc-bg-color" data-default-color="#f5f5f5"/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e('Calendar Dates Background Color', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-cal-bgcolor]" value="<?php echo (!empty($options['oc-cal-bgcolor'])) ?  $options['oc-cal-bgcolor'] : '#f5f5f5'?>" class="oc-cal-bgcolor" data-default-color="#f5f5f5"/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e('Calendar [Disabled] Dates Color', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-cal-color]" value="<?php echo (!empty($options['oc-cal-color'])) ?  $options['oc-cal-color'] : '#a3a3a3'?>" class="oc-cal-color" data-default-color="#a3a3a3"/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e('Calendar [Selected+Active] Date Color', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-cal-active-color]" value="<?php echo (!empty($options['oc-cal-active-color'])) ?  $options['oc-cal-active-color'] : '#ffffff'?>" class="oc-cal-active-color" data-default-color="#ffffff"/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e('Calendar [Default] Date Color', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-cal-default-color]" value="<?php echo (!empty($options['oc-cal-default-color'])) ?  $options['oc-cal-default-color'] : '#544f49'?>" class="oc-cal-active-color" data-default-color="#544f49"/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e('Calendar Year Color', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-year-color]" value="<?php echo (!empty($options['oc-year-color'])) ?  $options['oc-year-color'] : '#544f49'?>" class="oc-year-color" data-default-color="#544f49"/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e('Calendar Days Color', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-days-color]" value="<?php echo (!empty($options['oc-days-color'])) ?  $options['oc-days-color'] : '#96d2af'?>" class="oc-days-color" data-default-color="#96d2af"/>
		</td>
		</tr>
	</tbody>
</table>
