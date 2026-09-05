<?php

add_action( 'init' , 'ngo_business_work_process' );
function ngo_business_work_process(){

	Kirki::add_section( 'ngo_business_work_process_sections', array(
        'title'   => esc_html__( 'Work Process', 'ngo-business' ),
        'section' => 'homepage'
    ) );

    Kirki::add_field( 'bizberg', [
		'type'        => 'checkbox',
		'settings'    => 'work_status',
		'label'       => esc_html__( 'Enable / Disable', 'ngo-business' ),
		'section'     => 'ngo_business_work_process_sections',
		'default'     => false,
	] );

    Kirki::add_field( 'bizberg', [
		'type'     => 'text',
		'settings' => 'work_process_subtitle',
		'label'    => esc_html__( 'Subtitle', 'ngo-business' ),
		'section'  => 'ngo_business_work_process_sections',
		'active_callback' => [
	 		[
	 			'setting'  => 'work_status',
	 			'operator' => '==',
	 			'value'    => true,
	 		]
	 	]
	] );

	Kirki::add_field( 'bizberg', [
		'type'     => 'text',
		'settings' => 'work_process_title',
		'label'    => esc_html__( 'Title', 'ngo-business' ),
		'section'  => 'ngo_business_work_process_sections',
		'active_callback' => [
	 		[
	 			'setting'  => 'work_status',
	 			'operator' => '==',
	 			'value'    => true,
	 		]
	 	]
	] );

	Kirki::add_field( 'bizberg', array(
    	'type'        => 'advanced-repeater',
    	'label'       => esc_html__( 'Process', 'ngo-business' ),
	    'section'     => 'ngo_business_work_process_sections',
	    'settings'    => 'ngo_business_work_process_sections',
	    'active_callback' => [
			[
				'setting'  => 'work_status',
				'operator' => '==',
				'value'    => true,
			]
		],
	    'choices' => [
	        'button_label' => esc_html__( 'Add Process', 'ngo-business' ),
	        'row_label' => [
	            'value' => esc_html__( 'Process', 'ngo-business' ),
	        ],
	        'limit'  => 4,
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