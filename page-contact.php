<?php
/**
 * Template Name: Contact
 */
get_header(); 
/* send email */
		if ( isset( $_POST['submitted'] ) ) :        
			/* name */
			if ( trim( $_POST['contact_form_name'] ) === '' ):               
				$nameError = __( 'Please enter your name.', 'premium-code' );               
				$hasError = true;        
			else:               
				$name = trim( $_POST['contact_form_name'] );        
			endif; 
			/* email */	
			if ( trim( $_POST['contact_form_email'] ) === '' ):               
				$emailError = __( 'Please enter your email address.', 'premium-code' );               
				$hasError = true;        
			elseif ( !preg_match( "/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim( $_POST['contact_form_email'] ) )) :               
				$emailError = __( 'You entered an invalid email address.', 'premium-code' );               
				$hasError = true;        
			else:               
				$email = trim( $_POST['contact_form_email'] );        
			endif;  
			/* subject */
			if ( trim( $_POST['contact_form_subject'] ) === '' ):               
				$subjectError = __( 'Please enter a subject.', 'premium-code' );               
				$hasError = true;        
			else:               
				$subject = trim( $_POST['contact_form_subject'] );        
			endif; 
			/* message */
			if ( trim( $_POST['contact_form_message'] ) === '' ):               
				$messageError = __( 'Please enter a message.', 'premium-code' );               
				$hasError = true;        
			else:                                     
				$message = stripslashes( trim( $_POST['contact_form_message'] ) );               
			endif; 		        
			/* send the email */
			if ( !isset( $hasError ) ) :               				if ( get_theme_mod( 'email' ) ) :
					$emailTo = get_theme_mod( 'email' );                             
					$subject = 'From '.$name;               
					$body = "Name: $name \n\nEmail: $email \n\n Subject: $subject \n\n Message: $message";               
					$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . get_theme_mod( 'email' ); 				               
					wp_mail( $emailTo, $subject, $body, $headers );               
					$emailSent = true;        				endif;
			endif;	
		endif;	

/* end send email */
while ( have_posts() ) : the_post(); ?>
		<div class="generalheadline">
			<h3><?php the_title(); ?></h3>
		</div><!--/generalheadline-->
		<div id="wrap">
			<div id="contactform">
				<?php if ( isset( $emailSent ) && $emailSent == true ) : ?>									
						<p><?php _e( 'Thanks, your email was sent successfully.', 'premium-code' ); ?></p>                            
				<?php elseif ( isset( $_POST['submitted'] ) ) : ?>                                    
						<p><?php _e( 'Sorry, an error occured.', 'premium-code' ); ?><p>                            
				<?php endif; ?>	
			
				<form action="" id="contactForm" method="post">
					<fieldset>
						<div class="item">
							<label for="contact_form_name"><?php _e( 'Name', 'premium-code' ); ?></label>
							<?php 
								if ( isset( $nameError ) && $nameError != '' ) :																		 
									echo '<span class="error">'.$nameError.'</span>';																 
								endif;	
							?>	
							<input id="contact_form_name" name="contact_form_name" 								type="text" class="name" value="<?php 									if ( isset( $_POST['contact_form_name'] ) ) echo $_POST['contact_form_name'];?>">
							
						</div><!--/item name-->
						<div class="item">
							<label for="contact_form_email"><?php _e( 'E-mail', 'premium-code' ); ?></label>
							<?php 
								if ( isset( $emailError ) && $emailError != '' ) :																		 
									echo '<span class="error">'.$emailError.'</span>';																 
								endif;	
							?>	
							<input id="contact_form_email" name="contact_form_email" type="email" class="email" value="<?php if ( isset( $_POST['contact_form_email'] ) ) echo $_POST['contact_form_email'];?>">
							
						</div><!--/item email-->
						<div class="item">
							<label for="contact_form_subject"><?php _e( 'Subject', 'premium-code' ); ?></label>
							<?php 
								if ( isset( $subjectError ) && $subjectError != '' ) :																		 
									echo '<span class="error">'.$subjectError.'</span>';																 
								endif;	
							?>	
							<input id="contact_form_subject" name="contact_form_subject" type="text" class="subject" value="<?php if ( isset( $_POST['contact_form_subject'] ) ) echo $_POST['contact_form_subject'];?>">
							
						</div><!--/item subject-->
						<div class="item">
							<label for="contact_form_message"><?php _e( 'Message', 'premium-code' ); ?></label>
							<?php 
								if ( isset( $messageError ) && $messageError != '' ) :																		 
									echo '<span class="error">'.$messageError.'</span>';																 
								endif;	
							?>	
							<textarea id="contact_form_message" name="contact_form_message" class="message">
								<?php 
									if ( isset( $_POST['contact_form_message'] ) ) { 
										echo stripslashes( $_POST['contact_form_message'] ); 
									} 
								?>
							</textarea>
							
						</div><!--/item message-->
						<input type="submit" class="contact-submit" value="<?php _e( 'Submit', 'premium-code' ); ?>">
						<input type="hidden" name="submitted" id="submitted" value="true" />
					</fieldset>
				</form>
			</div><!--/contactform-->
			<address id="address">
				<?php
					if ( get_theme_mod( 'address' ) ) :
						echo '<div class="local">';
							echo get_theme_mod( 'address' );
						echo '</div>';
					endif;	
					if ( get_theme_mod( 'phone' ) || get_theme_mod( 'email' ) ) :
						echo '<div class="contactdetails">';
							echo 'Phone: '. get_theme_mod( 'phone' ).'<br />';
							echo 'E-Mail: '. get_theme_mod( 'email' );
						echo '</div>';
					endif;
				?>
			</address>
		</div><!--/wrap-->
<?php endwhile; ?>
<?php get_footer(); ?>