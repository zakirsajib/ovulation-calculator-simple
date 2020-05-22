<h1 class="screen-reader-text">Color Scheme</h1>
<table class="form-table">
	<tbody>
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Calendar Base Color', 'ovulationcalculator-group' ); ?></th>
		<td>			
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-base-color]" 
				value="<?php echo ( ! empty( $options['oc-base-color'] ) ) ? esc_attr( $options['oc-base-color'] ) : '#9E8977'; ?>" 
				class="oc-base-color" 
				data-default-color="#9E8977"
			/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Period Dates', 'ovulationcalculator-group' ); ?></th>
		<td>			
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-period-color]" 
				value="<?php echo ( ! empty( $options['oc-period-color'] ) ) ? esc_attr( $options['oc-period-color'] ) : '#878cb4'; ?>" 
				class="oc-period-color" 
				data-default-color="#878cb4"
			/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Fertile Dates', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-fertile-dates]" 
				value="<?php echo ( ! empty( $options['oc-fertile-dates'] ) ) ? esc_attr( $options['oc-fertile-dates'] ) : '#96d2af'; ?>" 
				class="oc-fertile-dates" 
				data-default-color="#96d2af"
			/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Fertile Tick Color', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-fertile-tick]" 
				value="<?php echo ( ! empty( $options['oc-fertile-tick'] ) ) ? esc_attr( $options['oc-fertile-tick'] ) : '#41AD49'; ?>" 
				class="oc-fertile-tick" 
				data-default-color="#41AD49"
			/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Days of expected ovulation', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-ovulation-dates]" 
				value="<?php echo ( ! empty( $options['oc-ovulation-dates'] ) ) ? esc_attr( $options['oc-ovulation-dates'] ) : '#1A9F1F'; ?>" 
				class="oc-ovulation-dates" 
				data-default-color="#1A9F1F"
			/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Submit/Send Button Background Color', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-send-bg]" 
				value="<?php echo ( ! empty( $options['oc-send-bg'] ) ) ? esc_attr( $options['oc-send-bg'] ) : '#a8d1af'; ?>" class="oc-send-bg" 
				data-default-color="#a8d1af"
			/>
		</td>
		</tr>
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Submit/Send Button Hover Background Color', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-send-hover-bg]" 
				value="<?php echo ( ! empty( $options['oc-send-hover-bg'] ) ) ? esc_attr( $options['oc-send-hover-bg'] ) : '#9b9893'; ?>" 
				class="oc-send-hover-bg" 
				data-default-color="#9b9893"
			/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Submit/Send Button Text Color', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-send-text]" 
				value="<?php echo ( ! empty( $options['oc-send-text'] ) ) ? esc_attr( $options['oc-send-text'] ) : '#ffffff'; ?>" class="oc-send-text" 
				data-default-color="#ffffff"
			/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Calendar Background Color', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-bg-color]" 
				value="<?php echo ( ! empty( $options['oc-bg-color'] ) ) ? esc_attr( $options['oc-bg-color'] ) : '#f5f5f5'; ?>" class="oc-bg-color" 
				data-default-color="#f5f5f5"
			/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Calendar Dates Background Color', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-cal-bgcolor]" 
				value="<?php echo ( ! empty( $options['oc-cal-bgcolor'] ) ) ? esc_attr( $options['oc-cal-bgcolor'] ) : '#f5f5f5'; ?>" 
				class="oc-cal-bgcolor" 
				data-default-color="#f5f5f5"
			/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Calendar [Disabled] Dates Color', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-cal-color]" 
				value="<?php echo ( ! empty( $options['oc-cal-color'] ) ) ? esc_attr( $options['oc-cal-color'] ) : '#a3a3a3'; ?>" class="oc-cal-color" 
				data-default-color="#a3a3a3"
			/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Calendar [Selected+Active] Date Color', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-cal-active-color]" 
				value="<?php echo ( ! empty( $options['oc-cal-active-color'] ) ) ? esc_attr( $options['oc-cal-active-color'] ) : '#ffffff'; ?>" 
				class="oc-cal-active-color" 
				data-default-color="#ffffff"
			/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Calendar [Default] Date Color', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-cal-default-color]" 
				value="<?php echo ( ! empty( $options['oc-cal-default-color'] ) ) ? esc_attr( $options['oc-cal-default-color'] ) : '#544f49'; ?>" 
				class="oc-cal-active-color" 
				data-default-color="#544f49"
			/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Calendar Year Color', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-year-color]" 
				value="<?php echo ( ! empty( $options['oc-year-color'] ) ) ? esc_attr( $options['oc-year-color'] ) : '#544f49'; ?>" 
				class="oc-year-color" 
				data-default-color="#544f49"
			/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Calendar Days Color', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-days-color]" 
				value="<?php echo ( ! empty( $options['oc-days-color'] ) ) ? esc_attr( $options['oc-days-color'] ) : '#96d2af'; ?>" 
				class="oc-days-color" 
				data-default-color="#96d2af"
			/>
		</td>
		</tr>
	</tbody>
</table>
