<h1 class="screen-reader-text">Email Template Language Translation</h1>
<table class="form-table">
	<tbody>
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Choose language', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
				type="radio" 
				name="ovulationcalculator-group[email-lang]" 
				value="danish" <?php checked( 'danish' === esc_attr( $options['email-lang'] ) ); ?> 
			/>
			<?php esc_attr_e( 'Danish', 'ovulation-calculator' ); ?>	
			<input 
				type="radio" 
				name="ovulationcalculator-group[email-lang]" 
				value="swedish" <?php checked( 'swedish' === esc_attr( $options['email-lang'] ) ); ?> 
			/>
			<?php esc_attr_e( 'Swedish', 'ovulation-calculator' ); ?>
			<input 
				type="radio" 
				name="ovulationcalculator-group[email-lang]" 
				value="norwegian" <?php checked( 'norwegian' === esc_attr( $options['email-lang'] ) ); ?> 
			/>
			<?php esc_attr_e( 'Norwegian', 'ovulation-calculator' ); ?>
			<input 
				type="radio" 
				name="ovulationcalculator-group[email-lang]" 
				value="finnish" <?php checked( 'finnish' === esc_attr( $options['email-lang'] ) ); ?> 
			/>
			<?php esc_attr_e( 'Finnish', 'ovulation-calculator' ); ?>
			<input
				type="radio" 
				name="ovulationcalculator-group[email-lang]" 
				checked value="english" <?php checked( 'english' === esc_attr( $options['email-lang'] ) ); ?> 
			/>
			<?php esc_attr_e( 'English', 'ovulation-calculator' ); ?>
			<input 
				type="radio" 
				name="ovulationcalculator-group[email-lang]" 
				value="estonian" <?php checked( 'estonian' === esc_attr( $options['email-lang'] ) ); ?> 
			/>
			<?php esc_attr_e( 'Estonian', 'ovulation-calculator' ); ?>
			<input 
				type="radio" 
				name="ovulationcalculator-group[email-lang]" 
				value="spanish" <?php checked( 'spanish' === esc_attr( $options['email-lang'] ) ); ?> 
			/>
			<?php esc_attr_e( 'Spanish', 'ovulation-calculator' ); ?>
		</td>
		</tr>
	</tbody>
</table>

<h3>Header Template</h3><hr>
<table class="form-table">
	<tbody>
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Upload E-mail Logo', 'ovulation-calculator' ); ?></th>
		<td>
			<input
				type="text" 
				name="ovulationcalculator-group[oc-email-logo]" 
				value="<?php echo ( ! empty( esc_attr( $options['oc-email-logo'] ) ) ) ? esc_attr( $options['oc-email-logo'] ) : 'E-mail Logo'; ?>" 
				id="imageURL" 
				class="regular-text"
			/>
			<input id="uploadButton" type="button" class="button" value="Upload Logo" />
			<p class="description clearfix">Recommended size is 250 by 44 pixels.</p>
		</td>
		</tr>
		<?php if ( ! empty( esc_attr( $options['oc-email-logo'] ) ) ) : ?>
			<tr valign="top">
				<th scope="row"><?php esc_attr_e( 'Preview', 'ovulation-calculator' ); ?></th>
					<td>
						<div class="preview">
							<img 
								id="imgPreview" 
								src="<?php printf( __( '%s', 'ovulation-calculator' ), esc_attr( esc_attr( $options['oc-email-logo'] ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" 
								alt=""> 
						</div>
					</td>
			</tr>
		<?php endif; ?>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Upload E-mail Header Image', 'ovulation-calculator' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-email-header-image]" 
				value="<?php echo ( ! empty( esc_attr( $options['oc-email-header-image'] ) ) ) ? esc_attr( $options['oc-email-header-image'] ) : 'E-mail Header Image'; ?>" id="imageURLHeader" 
				class="regular-text"
			/>
			<input id="uploadButtonHeader" type="button" class="button" value="Upload Image"/>
			<p class="description clearfix">Recommended maximum width size is 600 pixels.</p>
		</td>
		</tr>
		<?php if ( ! empty( esc_attr( $options['oc-email-header-image'] ) ) ) : ?>
			<tr valign="top">
				<th scope="row"><?php esc_attr_e( 'Preview', 'ovulation-calculator' ); ?></th>
					<td>
						<div class="preview">
							<img 
								id="imgPreviewHeader" 
								src="<?php printf( __( '%s', 'ovulation-calculator' ), esc_attr( $options['oc-email-header-image'] ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" 
								alt="">
						</div>
					</td>
			</tr>
		<?php endif; ?>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Email Heading', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-email-header-title]" 
				value="<?php echo ( ! empty( esc_attr( $options['oc-email-header-title'] ) ) ) ? esc_attr( $options['oc-email-header-title'] ) : 'Title'; ?>" class="regular-text"
			/>
			<p class="description">Thanks for using the Babyplan Ovulation Calculator</p>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Here is your 6 month ovulation calendar:', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-email-header-ovulation-dates]" 
				value="<?php echo ( ! empty( esc_attr( $options['oc-email-header-ovulation-dates'] ) ) ) ? esc_attr( $options['oc-email-header-ovulation-dates'] ) : 'Here is your 6 month ovulation calendar:'; ?>" 
				class="regular-text"
			/>
			<p class="description">Here is your 6 month ovulation calendar:</p>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Ovulation:', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-email-header-ovulation-text]" 
				value="<?php echo ( ! empty( esc_attr( $options['oc-email-header-ovulation-text'] ) ) ) ? esc_attr( $options['oc-email-header-ovulation-text'] ) : 'Ovulation'; ?>" 
				class="regular-text"
			/>
			<p class="description">Ovulation</p>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Get a copy of the Babyplan Guide to Pregnancy here:', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-email-guide]" 
				value="<?php echo ( ! empty( esc_attr( $options['oc-email-guide'] ) ) ) ? esc_attr( $options['oc-email-guide'] ) : 'Get a copy of the Babyplan Guide to Pregnancy here:'; ?>" 
				class="regular-text"
			/>
			<p class="description">Get a copy of the Babyplan Guide to Pregnancy here:</p>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Download e-book', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-email-download]" 
				value="<?php echo ( ! empty( esc_attr( $options['oc-email-download'] ) ) ) ? esc_attr( $options['oc-email-download'] ) : 'Download e-book'; ?>" class="regular-text"
			/>
			<p class="description">Download e-book</p>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Download e-book URL', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-email-download-url]" 
				value="<?php echo ( ! empty( esc_attr( $options['oc-email-download-url'] ) ) ) ? esc_attr( $options['oc-email-download-url'] ) : 'Download e-book URL'; ?>" class="regular-text"
			/>
			<p class="description">Download e-book URL</p>
		</td>
		</tr>
		
	</tbody>
</table>

<h3>Footer Template</h3><hr>
<table class="form-table">
	<tbody>
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Title', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-email-footer-title]" 
				value="<?php echo ( ! empty( esc_attr( $options['oc-email-footer-title'] ) ) ) ? esc_attr( $options['oc-email-footer-title'] ) : 'Title'; ?>" class="regular-text"
			/>
			<p class="description">E-mail Footer Title</p>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'SubTitle', 'ovulationcalculator-group' ); ?></th>
		<td>
			<textarea 
				name="ovulationcalculator-group[oc-email-footer-subtitle]" 
				class="large-text" 
				cols="50" 
				rows="10"
			>
			<?php echo ( ! empty( esc_attr( $options['oc-email-footer-subtitle'] ) ) ) ? esc_attr( $options['oc-email-footer-subtitle'] ) : 'SubTitle'; ?>
			</textarea>
			<p class="description">E-mail Footer SubTitle</p>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Telephone', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
			type="text" 
			name="ovulationcalculator-group[oc-email-footer-tel]" 
			value="<?php echo ( ! empty( esc_attr( $options['oc-email-footer-tel'] ) ) ) ? esc_attr( $options['oc-email-footer-tel'] ) : 'Telephone'; ?>" 
			class="regular-text"
		/>
			<p class="description">E-mail Footer Telephone</p>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'E-mail', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-email-footer-email]" 
				value="<?php echo ( ! empty( esc_attr( $options['oc-email-footer-email'] ) ) ) ? esc_attr( $options['oc-email-footer-email'] ) : 'E-mail'; ?>" 
				class="regular-text"
			/>
			<p class="description">Footer E-mail</p>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Upload Person Image', 'ovulation-calculator' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-email-person-image]" 
				value="<?php echo ( ! empty( esc_attr( $options['oc-email-person-image'] ) ) ) ? esc_attr( $options['oc-email-person-image'] ) : 'Person Image'; ?>" id="imageURLPerson" 
				class="regular-text"
			/>
			<input 
				id="uploadButtonPerson" 
				type="button" 
				class="button" 
				value="Upload Person Image" 
			/>
			<p class="description clearfix">Recommended maximum width size is 600 pixels.</p>
		</td>
		</tr>
		<?php if ( ! empty( esc_attr( $options['oc-email-person-image'] ) ) ) : ?>
			<tr valign="top">
				<th scope="row"><?php esc_attr_e( 'Preview', 'ovulation-calculator' ); ?></th>
					<td>
						<div class="preview">
							<img 
								id="imgPreviewPerson" 
								src="<?php printf( __( '%s', 'ovulation-calculator' ), esc_attr( $options['oc-email-person-image'] ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" 
								alt="">
						</div>
					</td>
			</tr>
		<?php endif; ?>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Upload Footer Logo', 'ovulation-calculator' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-email-footer-logo]" 
				value="<?php echo ( ! empty( esc_attr( $options['oc-email-footer-logo'] ) ) ) ? esc_attr( $options['oc-email-footer-logo'] ) : 'Footer Logo'; ?>" id="imageURLLogo" 
				class="regular-text"
			/>
			<input 
				id="uploadButtonLogo" 
				type="button" 
				class="button" 
				value="Upload Footer Logo" 
			/>
			<p class="description clearfix">Recommended maximum size is 150 by 26 pixels.</p>
		</td>
		</tr>
		<?php if ( ! empty( esc_attr( $options['oc-email-footer-logo'] ) ) ) : ?>
			<tr valign="top">
				<th scope="row"><?php esc_attr_e( 'Preview', 'ovulation-calculator' ); ?></th>
					<td>
						<div class="preview">
							<img 
								id="imgPreviewLogo" 
								src="<?php printf( __( '%s', 'ovulation-calculator' ), esc_attr( $options['oc-email-footer-logo'] ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" 
								alt="">
						</div>
					</td>
			</tr>
		<?php endif; ?>
		
		
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Copyright Text', 'ovulationcalculator-group' ); ?></th>
		<td>
			<input 
				type="text" 
				name="ovulationcalculator-group[oc-email-footer-copyright]" 
				value="<?php echo ( ! empty( esc_attr( $options['oc-email-footer-copyright'] ) ) ) ? esc_attr( $options['oc-email-footer-copyright'] ) : 'Copyright Text'; ?>" class="regular-text"
			/>
			<p class="description">Footer Copyright</p>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Footer Bottom Texts', 'ovulationcalculator-group' ); ?></th>
		<td>
			<textarea 
				name="ovulationcalculator-group[oc-email-footer-bottom]" 
				class="large-text" 
				cols="50" 
				rows="10"
			>
				<?php echo ( ! empty( esc_attr( $options['oc-email-footer-bottom'] ) ) ) ? esc_attr( $options['oc-email-footer-bottom'] ) : 'Footer bottom texts'; ?>
				</textarea>
			<p class="description">Footer Bottom Texts</p>
		</td>
		</tr>
		
		
		<tr valign="top">
		<th scope="row"><?php esc_attr_e( 'Email sent message', 'ovulationcalculator-group' ); ?></th>
		<td>
			<textarea 
				name="ovulationcalculator-group[oc-email-sent-msg]" 
				class="regular-text" 
				cols="50" 
				rows="5"
			>
				<?php echo ( ! empty( esc_attr( $options['oc-email-sent-msg'] ) ) ) ? esc_attr( $options['oc-email-sent-msg'] ) : 'Email is Sent'; ?>
				</textarea>
			<p class="description">Email sent message</p>
		</td>
		</tr>
	</tbody>
</table>
