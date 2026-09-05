<?php

add_action( 'bizberg_before_homepage_blog', 'ngo_charity_work_process' );
function ngo_charity_work_process(){ 

	$status = bizberg_get_theme_mod( 'work_status' );

	if( empty($status) ){
		return;
	}

	$subtitle = bizberg_get_theme_mod( 'work_process_subtitle' );
	$title    = bizberg_get_theme_mod( 'work_process_title' );
	$data     = bizberg_get_theme_mod( 'ngo_business_work_process_sections' );
	$data     = json_decode( $data, true ); ?>

	<div class="work_process">
		
		<div class="container">
				
			<div class="title_wrapper">
				
				<h4><?php echo esc_html( $subtitle ); ?></h4>
				<h2><?php echo esc_html( $title ); ?></h2>

			</div>	

			<div class="content">

				<?php 

				if( !empty( $data ) ){ 

					foreach( $data as $key => $value ){

						$icon    = !empty( $value['icon'] ) ? $value['icon'] : '';
						$page_id = !empty( $value['page_id'] ) ? $value['page_id'] : '';
						$pageobj = get_post( $page_id ); ?>
				
						<div class="item">
							
							<span class="icon_wrapper">
								<i class="<?php echo esc_attr( $icon ); ?>"></i>
								<span class="number">0<?php echo absint( $key + 1 ); ?></span>
							</span>

							<h3><?php echo esc_html( strtolower( $pageobj->post_title ) ); ?></h3>
							<p><?php echo esc_html( wp_trim_words( sanitize_text_field( $pageobj->post_content ) , 15, ' [...]' ) ); ?></p>

						</div>

						<?php 

					}

				} ?>

			</div>

		</div>

	</div>

	<?php
}