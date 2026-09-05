<?php

add_action( 'bizberg_before_homepage_blog', 'ngo_business_homepage_services' );
function ngo_business_homepage_services(){

	$status = bizberg_get_theme_mod( 'services_status' );

	if( empty( $status ) ){
		return;
	}

	$services_title_id   = bizberg_get_theme_mod( 'services_title' );
	$services_title_page = get_post( $services_title_id );
	$services_subtitle   = bizberg_get_theme_mod( 'services_subtitle' );
	$data                = bizberg_get_theme_mod( 'ngo_business_services' );
	$data                = json_decode( $data, true );  ?>

	<div class="our_services">
		
		<div class="container">

			<div class="services_inner_wrap">
			
				<div class="left">
					
					<h4><?php echo esc_html( strtolower( $services_subtitle ) ); ?></h4>
					<h2><?php echo esc_html( strtolower( $services_title_page->post_title ) ); ?></h2>
					<p><?php echo esc_html( wp_trim_words( sanitize_text_field( $services_title_page->post_content ) , 15, ' [...]' ) ); ?></p>

				</div>

				<div class="right">

					<?php 

					if( !empty( $data ) ){

						foreach( $data as $value ){

							$icon    = !empty( $value['icon'] ) ? $value['icon'] : '';
							$pageobj = !empty( $value['page_id'] ) ? $value['page_id'] : '';
							$pageobj = get_post( $pageobj );
							?>
					
							<div class="item">
								<span class="icon"> 
									<i class="<?php echo esc_attr( $icon ); ?>"></i>
								</span>
								<h4><?php echo esc_html( strtolower( $pageobj->post_title ) ); ?></h4>
								<p><?php echo esc_html( wp_trim_words( sanitize_text_field( $pageobj->post_content ) , 15, ' [...]' ) ); ?></p>
								<a href="<?php echo esc_url( get_permalink( $value['page_id'] ) ); ?>"><?php esc_html_e( 'Read More' , 'ngo-business' ); ?> <i class="fas fa-angle-right"></i></a>
							</div>

							<?php 

						}

					} ?>

				</div>

			</div>

		</div>

	</div>

	<?php
}