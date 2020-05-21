<h1 class="screen-reader-text">Calendar Days Translation</h1>
<table class="form-table">
	<tbody>
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Monday', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-mon]" 
				value="<?php echo ( ! empty( $options['oc-mon'] ) ) ? esc_attr( $options['oc-mon'] ) : 'Mon'; ?>" 
				class="small-text"
			/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Tuesday', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-tue]" 
				value="<?php echo ( ! empty( $options['oc-tue'] ) ) ? esc_attr( $options['oc-tue'] ) : 'Tue'; ?>" 
				class="small-text"
			/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Wednesday', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input
				type="text" 
				name="ovulationcalculator-group[oc-wed]" 
				value="<?php echo ( ! empty( $options['oc-wed'] ) ) ? esc_attr( $options['oc-wed'] ) : 'Wed'; ?>" 
				class="small-text"
			/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Thursday', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-thu]" 
				value="<?php echo ( ! empty( $options['oc-thu'] ) ) ? esc_attr( $options['oc-thu'] ) : 'Thu'; ?>" 
				class="small-text"
			/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Friday', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-fri]" 
				value="<?php echo ( ! empty( $options['oc-fri'] ) ) ? esc_attr( $options['oc-fri'] ) : 'Fri'; ?>" 
				class="small-text"
			/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Saturday', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-sat]" 
				value="<?php echo ( ! empty( $options['oc-sat'] ) ) ? esc_attr( $options['oc-sat'] ) : 'Sat'; ?>" 
				class="small-text"
			/>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Sunday', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-sun]" 
				value="<?php echo ( ! empty( $options['oc-sun'] ) ) ? esc_attr( $options['oc-sun'] ) : 'Sun'; ?>" 
				class="small-text"
			/>
		</td>
		</tr>
	</tbody>
</table>
