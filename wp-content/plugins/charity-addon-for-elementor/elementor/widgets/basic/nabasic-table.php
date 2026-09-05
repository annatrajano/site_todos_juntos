<?php
/*
 * Elementor Charity Addon for Elementor Table Widget
 * Author & Copyright: NicheAddon
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Charity_Elementor_Addon_Table extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'nacharity_basic_table';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Table', 'charity-addon-for-elementor' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'eicon-table';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['nacharity-basic-category'];
	}

	/**
	 * Register Charity Addon for Elementor Table widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){

		$this->start_controls_section(
			'section_table',
			[
				'label' => esc_html__( 'Table Head', 'charity-addon-for-elementor' ),
			]
		);
		$this->add_responsive_control(
			'content_alignment',
			[
				'label' => esc_html__( 'Content Alignment', 'charity-addon-for-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'charity-addon-for-elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'charity-addon-for-elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'charity-addon-for-elementor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .nacep-table td, {{WRAPPER}} .nacep-table thead th' => 'text-align: {{VALUE}};',
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'table_title',
			[
				'label' => esc_html__( 'Title', 'charity-addon-for-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'tableItems_title',
			[
				'label' => esc_html__( 'Table Head', 'charity-addon-for-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'table_title' => esc_html__( 'Members', 'charity-addon-for-elementor' ),
					],

				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ table_title }}}',
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_table_bdy',
			[
				'label' => esc_html__( 'Table Body', 'charity-addon-for-elementor' ),
			]
		);

		$repeaterOne = new Repeater();

		$repeaterOne->start_controls_tabs( 'table_rows' );
			$repeaterOne->start_controls_tab(
				'table_row1',
				[
					'label' => esc_html__( 'Row', 'charity-addon-for-elementor' ),
				]
			);
			$repeaterOne->add_control(
				'text_style1',
				[
					'label' => esc_html__( 'Text Style', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'text'          => esc_html__('Text', 'charity-addon-for-elementor'),
	          'icon'          => esc_html__('Icon', 'charity-addon-for-elementor'),
	          'button'          => esc_html__('Button', 'charity-addon-for-elementor'),
					],
					'default' => 'text',
				]
			);
			$repeaterOne->add_control(
				'icon1',
				[
					'label' => esc_html__( 'Select Icon', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::ICON,
					'options' => NACEP_Controls_Helper_Output::get_include_icons(),
					'frontend_available' => true,
					'default' => 'fa fa-check',
					'condition' => [
						'text_style1' => 'icon',
					],
				]
			);
			$repeaterOne->add_control(
				'row_text1',
				[
					'label' => esc_html__( 'Text', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::WYSIWYG,
					'label_block' => true,
					'condition' => [
						'text_style1!' => 'icon',
					],
				]
			);
			$repeaterOne->add_control(
				'text_link1',
				[
					'label' => esc_html__( 'Link', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::URL,
					'placeholder' => 'https://your-link.com',
					'default' => [
						'url' => '',
					],
					'label_block' => true,
					'condition' => [
						'text_style1' => 'button',
					],
				]
			);
			$repeaterOne->end_controls_tab();  // end:Normal tab
			$repeaterOne->start_controls_tab(
				'table_row2',
				[
					'label' => esc_html__( 'Row', 'charity-addon-for-elementor' ),
				]
			);
			$repeaterOne->add_control(
				'text_style2',
				[
					'label' => esc_html__( 'Text Style', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'text'          => esc_html__('Text', 'charity-addon-for-elementor'),
	          'icon'          => esc_html__('Icon', 'charity-addon-for-elementor'),
	          'button'          => esc_html__('Button', 'charity-addon-for-elementor'),
					],
					'default' => 'text',
				]
			);
			$repeaterOne->add_control(
				'icon2',
				[
					'label' => esc_html__( 'Select Icon', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::ICON,
					'options' => NACEP_Controls_Helper_Output::get_include_icons(),
					'frontend_available' => true,
					'default' => 'fa fa-check',
					'condition' => [
						'text_style2' => 'icon',
					],
				]
			);
			$repeaterOne->add_control(
				'row_text2',
				[
					'label' => esc_html__( 'Text', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::WYSIWYG,
					'label_block' => true,
					'condition' => [
						'text_style2!' => 'icon',
					],
				]
			);
			$repeaterOne->add_control(
				'text_link2',
				[
					'label' => esc_html__( 'Link', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::URL,
					'placeholder' => 'https://your-link.com',
					'default' => [
						'url' => '',
					],
					'label_block' => true,
					'condition' => [
						'text_style2' => 'button',
					],
				]
			);
			$repeaterOne->end_controls_tab();  // end:Normal tab
			$repeaterOne->start_controls_tab(
				'table_row3',
				[
					'label' => esc_html__( 'Row', 'charity-addon-for-elementor' ),
				]
			);
			$repeaterOne->add_control(
				'text_style3',
				[
					'label' => esc_html__( 'Text Style', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'text'          => esc_html__('Text', 'charity-addon-for-elementor'),
	          'icon'          => esc_html__('Icon', 'charity-addon-for-elementor'),
	          'button'          => esc_html__('Button', 'charity-addon-for-elementor'),
					],
					'default' => 'text',
				]
			);
			$repeaterOne->add_control(
				'icon3',
				[
					'label' => esc_html__( 'Select Icon', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::ICON,
					'options' => NACEP_Controls_Helper_Output::get_include_icons(),
					'frontend_available' => true,
					'default' => 'fa fa-check',
					'condition' => [
						'text_style3' => 'icon',
					],
				]
			);
			$repeaterOne->add_control(
				'row_text3',
				[
					'label' => esc_html__( 'Text', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::WYSIWYG,
					'label_block' => true,
					'condition' => [
						'text_style3!' => 'icon',
					],
				]
			);
			$repeaterOne->add_control(
				'text_link3',
				[
					'label' => esc_html__( 'Link', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::URL,
					'placeholder' => 'https://your-link.com',
					'default' => [
						'url' => '',
					],
					'label_block' => true,
					'condition' => [
						'text_style3' => 'button',
					],
				]
			);
			$repeaterOne->end_controls_tab();  // end:Normal tab
			$repeaterOne->start_controls_tab(
				'table_row4',
				[
					'label' => esc_html__( 'Row', 'charity-addon-for-elementor' ),
				]
			);
			$repeaterOne->add_control(
				'text_style4',
				[
					'label' => esc_html__( 'Text Style', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'text'          => esc_html__('Text', 'charity-addon-for-elementor'),
	          'icon'          => esc_html__('Icon', 'charity-addon-for-elementor'),
	          'button'          => esc_html__('Button', 'charity-addon-for-elementor'),
					],
					'default' => 'text',
				]
			);
			$repeaterOne->add_control(
				'icon4',
				[
					'label' => esc_html__( 'Select Icon', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::ICON,
					'options' => NACEP_Controls_Helper_Output::get_include_icons(),
					'frontend_available' => true,
					'default' => 'fa fa-check',
					'condition' => [
						'text_style4' => 'icon',
					],
				]
			);
			$repeaterOne->add_control(
				'row_text4',
				[
					'label' => esc_html__( 'Text', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::WYSIWYG,
					'label_block' => true,
					'condition' => [
						'text_style4!' => 'icon',
					],
				]
			);
			$repeaterOne->add_control(
				'text_link4',
				[
					'label' => esc_html__( 'Link', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::URL,
					'placeholder' => 'https://your-link.com',
					'default' => [
						'url' => '',
					],
					'label_block' => true,
					'condition' => [
						'text_style4' => 'button',
					],
				]
			);
			$repeaterOne->end_controls_tab();  // end:Normal tab
			$repeaterOne->start_controls_tab(
				'table_row5',
				[
					'label' => esc_html__( 'Row', 'charity-addon-for-elementor' ),
				]
			);
			$repeaterOne->add_control(
				'text_style5',
				[
					'label' => esc_html__( 'Text Style', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'text'          => esc_html__('Text', 'charity-addon-for-elementor'),
	          'icon'          => esc_html__('Icon', 'charity-addon-for-elementor'),
	          'button'          => esc_html__('Button', 'charity-addon-for-elementor'),
					],
					'default' => 'text',
				]
			);
			$repeaterOne->add_control(
				'icon5',
				[
					'label' => esc_html__( 'Select Icon', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::ICON,
					'options' => NACEP_Controls_Helper_Output::get_include_icons(),
					'frontend_available' => true,
					'default' => 'fa fa-check',
					'condition' => [
						'text_style5' => 'icon',
					],
				]
			);
			$repeaterOne->add_control(
				'row_text5',
				[
					'label' => esc_html__( 'Text', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::WYSIWYG,
					'label_block' => true,
					'condition' => [
						'text_style5!' => 'icon',
					],
				]
			);
			$repeaterOne->add_control(
				'text_link5',
				[
					'label' => esc_html__( 'Link', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::URL,
					'placeholder' => 'https://your-link.com',
					'default' => [
						'url' => '',
					],
					'label_block' => true,
					'condition' => [
						'text_style5' => 'button',
					],
				]
			);
			$repeaterOne->end_controls_tab();  // end:Normal tab
		$repeaterOne->end_controls_tabs(); // end tabs
		$this->add_control(
			'tableItems_row',
			[
				'label' => esc_html__( 'Table Row', 'charity-addon-for-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'row_text1' => esc_html__( 'Item #1', 'charity-addon-for-elementor' ),
					],

				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ row_text1 }}}',
			]
		);
		$this->end_controls_section();// end: Section

		// Table
		$this->start_controls_section(
			'table_style',
			[
				'label' => esc_html__( 'Table', 'charity-addon-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'table_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'charity-addon-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} table.nacep-table' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'table_border',
				'label' => esc_html__( 'Border', 'charity-addon-for-elementor' ),
				'selector' => '{{WRAPPER}} .nacep-table td',
			]
		);
		$this->add_control(
			'odd_options',
			[
				'label' => __( 'Odd Row', 'charity-addon-for-elementor' ),
				'type' => Controls_Manager::HEADING,
				'frontend_available' => true,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'odd_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'charity-addon-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} table.nacep-table tbody>tr:nth-child(odd)>td' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'odd_color',
			[
				'label' => esc_html__( 'Color', 'charity-addon-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} table.nacep-table tbody>tr:nth-child(odd)>td' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'even_options',
			[
				'label' => __( 'Even Row', 'charity-addon-for-elementor' ),
				'type' => Controls_Manager::HEADING,
				'frontend_available' => true,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'even_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'charity-addon-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} table.nacep-table tbody>tr:nth-child(even)>td' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'even_color',
			[
				'label' => esc_html__( 'Color', 'charity-addon-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} table.nacep-table tbody>tr:nth-child(even)>td' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Head
		$this->start_controls_section(
			'sectn_style',
			[
				'label' => esc_html__( 'Table Head', 'charity-addon-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'secn_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'charity-addon-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .nacep-table thead tr' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'secn_border',
				'label' => esc_html__( 'Border', 'charity-addon-for-elementor' ),
				'selector' => '{{WRAPPER}} .nacep-table thead tr, {{WRAPPER}} table.nacep-table thead:first-child tr:first-child th',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'secn_box_shadow',
				'label' => esc_html__( 'Section Box Shadow', 'charity-addon-for-elementor' ),
				'selector' => '{{WRAPPER}} .nacep-table thead tr',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'charity-addon-for-elementor' ),
				'name' => 'sastable_head_typography',
				'selector' => '{{WRAPPER}} .nacep-table thead th',
			]
		);
		$this->add_control(
			'sastable_head_color',
			[
				'label' => esc_html__( 'Color', 'charity-addon-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .nacep-table thead th' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Text
		$this->start_controls_section(
			'section_text_style',
			[
				'label' => esc_html__( 'Text', 'charity-addon-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'label' => esc_html__( 'Typography', 'charity-addon-for-elementor' ),
					'name' => 'text_typography',
					'selector' => '{{WRAPPER}} .nacep-table td',
				]
			);
			$this->add_control(
				'text_color',
				[
					'label' => esc_html__( 'Color', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .nacep-table td' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'link_options',
				[
					'label' => __( 'Link', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::HEADING,
					'frontend_available' => true,
					'separator' => 'before',
				]
			);
			$this->start_controls_tabs( 'link_style' );
			$this->start_controls_tab(
				'link_normal',
				[
					'label' => esc_html__( 'Normal', 'charity-addon-for-elementor' ),
				]
			);
			$this->add_control(
				'link_color',
				[
					'label' => esc_html__( 'Color', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .nacep-table td a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
				'link_hover',
				[
					'label' => esc_html__( 'Hover', 'charity-addon-for-elementor' ),
				]
			);
			$this->add_control(
				'link_hover_color',
				[
					'label' => esc_html__( 'Color', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .nacep-table td a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		$this->end_controls_section();// end: Section

		// Icon
		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'charity-addon-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'ico_size',
			[
				'label' => esc_html__( 'Size', 'charity-addon-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .nacep-table td i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Color', 'charity-addon-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .nacep-table td i' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Button
		$this->start_controls_section(
			'section_btn_style',
			[
				'label' => esc_html__( 'Button', 'charity-addon-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'btn_padding',
			[
				'label' => __( 'Padding', 'charity-addon-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .nacep-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'btn_margin',
			[
				'label' => __( 'Margin', 'charity-addon-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .nacep-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'btn_border_radius',
			[
				'label' => __( 'Border Radius', 'charity-addon-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .nacep-btn:before, {{WRAPPER}} .nacep-btn:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'btn_width',
			[
				'label' => esc_html__( 'Button Width', 'charity-addon-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .nacep-btn:before, {{WRAPPER}} .nacep-btn:after' => 'width:{{SIZE}}{{UNIT}};height:{{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'btn_line_height',
			[
				'label' => esc_html__( 'Button Line Height', 'charity-addon-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .nacep-btn' => 'line-height:{{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'charity-addon-for-elementor' ),
				'name' => 'btn_typography',
				'selector' => '{{WRAPPER}} .nacep-btn',
			]
		);
		$this->add_responsive_control(
			'btn_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'charity-addon-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1500,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .nacep-btn i' => 'font-size:{{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs( 'btn_style' );
			$this->start_controls_tab(
				'btn_normal',
				[
					'label' => esc_html__( 'Normal', 'charity-addon-for-elementor' ),
				]
			);
			$this->add_control(
				'btn_color',
				[
					'label' => esc_html__( 'Text Color', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .nacep-btn' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'btn_icon_color',
				[
					'label' => esc_html__( 'Icon Color', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .nacep-btn i' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'btn_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .nacep-btn:before' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'btn_border',
					'label' => esc_html__( 'Border', 'charity-addon-for-elementor' ),
					'selector' => '{{WRAPPER}} .nacep-btn:before',
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
				'btn_hover',
				[
					'label' => esc_html__( 'Hover', 'charity-addon-for-elementor' ),
				]
			);
			$this->add_control(
				'btn_hover_color',
				[
					'label' => esc_html__( 'Text Color', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .nacep-btn:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'btn_icon_hover_color',
				[
					'label' => esc_html__( 'Icon Color', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .nacep-btn:hover i' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'btn_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .nacep-btn:hover:before' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'btn_hover_border',
					'label' => esc_html__( 'Border', 'charity-addon-for-elementor' ),
					'selector' => '{{WRAPPER}} .nacep-btn:hover:before',
				]
			);
			$this->end_controls_tab();  // end:Hover tab
			$this->start_controls_tab(
				'btn_active',
				[
					'label' => esc_html__( 'Active', 'charity-addon-for-elementor' ),
				]
			);
			$this->add_control(
				'btn_active_color',
				[
					'label' => esc_html__( 'Text Color', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .nacep-btn:active, {{WRAPPER}} .nacep-btn:focus' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'btn_icon_active_color',
				[
					'label' => esc_html__( 'Icon Color', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .nacep-btn:active i, {{WRAPPER}} .nacep-btn:focus i' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'btn_bg_active_color',
				[
					'label' => esc_html__( 'Background Color', 'charity-addon-for-elementor' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .nacep-btn:active:after, {{WRAPPER}} .nacep-btn:focus:after' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'btn_active_border',
					'label' => esc_html__( 'Border', 'charity-addon-for-elementor' ),
					'selector' => '{{WRAPPER}} .nacep-btn:active:after, {{WRAPPER}} .nacep-btn:focus:after',
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render Table widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
	    $settings = $this->get_settings_for_display();
	    $tableItems_title = !empty($settings['tableItems_title']) ? $settings['tableItems_title'] : [];
	    $tableItems_row = !empty($settings['tableItems_row']) ? $settings['tableItems_row'] : [];

	    $output = '<div class="nacep-responsive-table">
	                    <table class="nacep-table">
	                        <thead>
	                            <tr>';
	    // Escaping Group Param Output
	    if (is_array($tableItems_title) && !empty($tableItems_title)) {
	        foreach ($tableItems_title as $each_title) {
	            $table_title = !empty($each_title['table_title']) ? esc_html($each_title['table_title']) : '';
	            $output .= '<th>' . $table_title . '</th>';
	        }
	    }
	    $output .= '</tr>
	                        </thead>
	                        <tbody>';
	    // Escaping Group Param Output
	    if (is_array($tableItems_row) && !empty($tableItems_row)) {
	        foreach ($tableItems_row as $each_row) {
	            $icon1 = !empty($each_row['icon1']) ? '<i class="' . esc_attr($each_row['icon1']) . '" aria-hidden="true"></i>' : '';
	            $icon2 = !empty($each_row['icon2']) ? '<i class="' . esc_attr($each_row['icon2']) . '" aria-hidden="true"></i>' : '';
	            $icon3 = !empty($each_row['icon3']) ? '<i class="' . esc_attr($each_row['icon3']) . '" aria-hidden="true"></i>' : '';
	            $icon4 = !empty($each_row['icon4']) ? '<i class="' . esc_attr($each_row['icon4']) . '" aria-hidden="true"></i>' : '';
	            $icon5 = !empty($each_row['icon5']) ? '<i class="' . esc_attr($each_row['icon5']) . '" aria-hidden="true"></i>' : '';

	            $row_text1 = !empty($each_row['row_text1']) ? esc_html($each_row['row_text1']) : '';
	            $row_text2 = !empty($each_row['row_text2']) ? esc_html($each_row['row_text2']) : '';
	            $row_text3 = !empty($each_row['row_text3']) ? esc_html($each_row['row_text3']) : '';
	            $row_text4 = !empty($each_row['row_text4']) ? esc_html($each_row['row_text4']) : '';
	            $row_text5 = !empty($each_row['row_text5']) ? esc_html($each_row['row_text5']) : '';

	            $button1 = $this->get_button_html($each_row, 'text_link1', $row_text1);
	            $button2 = $this->get_button_html($each_row, 'text_link2', $row_text2);
	            $button3 = $this->get_button_html($each_row, 'text_link3', $row_text3);
	            $button4 = $this->get_button_html($each_row, 'text_link4', $row_text4);
	            $button5 = $this->get_button_html($each_row, 'text_link5', $row_text5);

	            $output .= '<tr>';
	            $output .= $this->get_table_cell($each_row, 'text_style1', $icon1, $button1, $row_text1);
	            $output .= $this->get_table_cell($each_row, 'text_style2', $icon2, $button2, $row_text2);
	            $output .= $this->get_table_cell($each_row, 'text_style3', $icon3, $button3, $row_text3);
	            $output .= $this->get_table_cell($each_row, 'text_style4', $icon4, $button4, $row_text4);
	            $output .= $this->get_table_cell($each_row, 'text_style5', $icon5, $button5, $row_text5);
	            $output .= '</tr>';
	        }
	    }
	    $output .= '</tbody>
	                    </table>
	                </div>';

	    echo $output;
	}

	private function get_button_html($each_row, $link_key, $text) {
	    $link_url = !empty($each_row[$link_key]['url']) ? esc_url($each_row[$link_key]['url']) : '';
	    $link_external = !empty($each_row[$link_key]['is_external']) ? 'target="_blank"' : '';
	    $link_nofollow = !empty($each_row[$link_key]['nofollow']) ? 'rel="nofollow"' : '';
	    $link_attr = trim($link_external . ' ' . $link_nofollow);
	    return !empty($link_url) ? '<a href="' . $link_url . '" ' . esc_attr($link_attr) . ' class="nacep-btn">' . $text . '</a>' : '';
	}

	private function get_table_cell($each_row, $style_key, $icon, $button, $text) {
	    $style = !empty($each_row[$style_key]) ? $each_row[$style_key] : '';
	    if ($style === 'icon') {
	        return '<td>' . $icon . '</td>';
	    } elseif ($style === 'button') {
	        return '<td>' . $button . '</td>';
	    } else {
	        return '<td>' . $text . '</td>';
	    }
	}

}
Plugin::instance()->widgets_manager->register_widget_type( new Charity_Elementor_Addon_Table() );
