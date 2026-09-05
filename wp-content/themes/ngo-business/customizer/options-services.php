<?php

add_action( 'init' , 'ngo_business_services' );
function ngo_business_services(){

	Kirki::add_section( 'ngo_business_services', array(
        'title'   => esc_html__( 'Services', 'ngo-business' ),
        'section' => 'homepage'
    ) );

    Kirki::add_field( 'bizberg', [
		'type'        => 'checkbox',
		'settings'    => 'services_status',
		'label'       => esc_html__( 'Enable / Disable', 'ngo-business' ),
		'section'     => 'ngo_business_services',
		'default'     => false,
	] );

    Kirki::add_field( 'bizberg', [
		'type'        => 'text',
		'settings'    => 'services_subtitle',
		'label'       => esc_html__( 'Subtitle', 'ngo-business' ),
		'section'     => 'ngo_business_services',
		'active_callback' => [
	 		[
	 			'setting'  => 'services_status',
	 			'operator' => '==',
	 			'value'    => true,
	 		]
	 	]
	] );

	Kirki::add_field( 'bizberg', [
		'type'        => 'select',
		'settings'    => 'services_title',
		'label'       => esc_html__( 'Page', 'ngo-business' ),
		'section'     => 'ngo_business_services',
		'choices'     => bizberg_get_all_pages(),
		'active_callback' => [
	 		[
	 			'setting'  => 'services_status',
	 			'operator' => '==',
	 			'value'    => true,
	 		]
	 	]
	] );

	Kirki::add_field( 'bizberg', array(
    	'type'        => 'advanced-repeater',
    	'label'       => esc_html__( 'Services', 'ngo-business' ),
	    'section'     => 'ngo_business_services',
	    'settings'    => 'ngo_business_services',
	    'active_callback' => [
			[
				'setting'  => 'services_status',
				'operator' => '==',
				'value'    => true,
			]
		],
	    'choices' => [
	        'button_label' => esc_html__( 'Add Services', 'ngo-business' ),
	        'row_label' => [
	            'value' => esc_html__( 'Services', 'ngo-business' ),
	        ],
	        'limit'  => 3,
	        'fields' => [
	        	'icon'  => [
	                'type'        => 'fontawesome',
	                'label'       => esc_html__( 'Icon', 'ngo-business' ),
	                'default'     => 'fab fa-accusoft',
	                'choices'     => bizberg_get_fontawesome_options(),
	            ],
	            'page_id' => [
	                'type'        => 'select',
	                'label'       => esc_html__( 'Page', 'ngo-business' ),
	                'choices'     => bizberg_get_all_pages()
	            ],
	        ],
	    ]
    ));

}