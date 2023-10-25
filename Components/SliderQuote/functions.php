<?php

namespace Flynt\Components\SliderQuote;

use Flynt\FieldVariables;
use Flynt\Utils\Options;

add_filter('Flynt/addComponentData?name=SliderQuote', function ($data) {
    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'sliderQuote',
        'label' => __('Slider: Quote', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Headline', 'flynt'),
                'instructions' => __('Enter a headline.', 'flynt'),
                'name' => 'headline',
                'type' => 'text',
            ],
            [
                'label' => __('Testimonials', 'flynt'),
                'name' => 'testimonials',
                'type' => 'repeater',
                'collapsed' => 0,
                'min' => 1,
                'layout' => 'block',
                'button_label' => __('Add new testimonial', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Style', 'flynt'),
                        'name' => 'style',
                        'type' => 'button_group',
                        'choices' => [
                            'image' => sprintf('<i class=\'dashicons dashicons-format-image\' title=\'%1$s\'></i>', __('Image and Quote', 'flynt')),
                            'stats' => sprintf('<i class=\'dashicons dashicons-arrow-up-alt2\' title=\'%1$s\'></i>', __('Stats and Quote', 'flynt')),
                            'none' => sprintf('<i class=\'dashicons dashicons-dismiss\' title=\'%1$s\'></i>', __('No Image or Stats. Only Quote', 'flynt'))
                        ]
                    ],
                    [
                        'label' => __('Image', 'flynt'),
                        'instructions' => __('Image-Format: JPG, PNG, SVG, WebP. Aspect Ratio: 16:9. Recommended Size: 1920px × 1080px.', 'flynt'),
                        'name' => 'image',
                        'type' => 'image',
                        'preview_size' => 'medium',
                        'mime_types' => 'jpg,jpeg,png,svg,webp',
                        'conditional_logic' => [
                            [
                                [
                                    'fieldPath' => 'style',
                                    'operator' => '==',
                                    'value' => 'image'
                                ]
                            ]
                        ],
                    ],
                    [
                        'label' => __('Statistics', 'flynt'),
                        'instructions' => __('Enter statistics details.', 'flynt'),
                        'name' => 'stats',
                        'type' => 'group',
                        'collapsed' => 0,
                        'layout' => 'block',
                        'conditional_logic' => [
                            [
                                [
                                    'fieldPath' => 'style',
                                    'operator' => '==',
                                    'value' => 'stats'
                                ]
                            ]
                        ],
                        'sub_fields' => [
                            [
                                'label' => __('Counter', 'flynt'),
                                'instructions' => __('Enter counter details.', 'flynt'),
                                'name' => 'counter',
                                'type' => 'group',
                                'collapsed' => 0,
                                'layout' => 'table',
                                'sub_fields' => [
                                    [
                                        'label' => __('Prefix', 'flynt'),
                                        'instructions' => __('Enter counter prefix.', 'flynt'),
                                        'name' => 'prefix',
                                        'type' => 'text',
                                    ],
                                    [
                                        'label' => __('Number', 'flynt'),
                                        'instructions' => __('Enter counter number.', 'flynt'),
                                        'name' => 'number',
                                        'type' => 'text',
                                    ],
                                    [
                                        'label' => __('Suffix', 'flynt'),
                                        'instructions' => __('Enter counter suffix.', 'flynt'),
                                        'name' => 'suffix',
                                        'type' => 'text',
                                    ],
                                ]
                            ],
                            [
                                'label' => __('Subtitle', 'flynt'),
                                'instructions' => __('Enter statistics subtitle.', 'flynt'),
                                'name' => 'subtitle',
                                'type' => 'text',
                            ],
                        ]
                    ],
                    [
                        'label' => __('Testimony', 'flynt'),
                        'instructions' => __('Enter testimony/quote.', 'flynt'),
                        'name' => 'quote',
                        'type' => 'text',
                    ],
                    [
                        'label' => __('Author', 'flynt'),
                        'instructions' => __('Enter testimonial associated author details.', 'flynt'),
                        'name' => 'author',
                        'type' => 'group',
                        'collapsed' => 0,
                        'layout' => 'row',
                        'sub_fields' => [
                            [
                                'label' => __('Name', 'flynt'),
                                'instructions' => __('Enter author name.', 'flynt'),
                                'name' => 'name',
                                'type' => 'text',
                            ],
                            [
                                'label' => __('Designation', 'flynt'),
                                'instructions' => __('Enter author designation.', 'flynt'),
                                'name' => 'designation',
                                'type' => 'text',
                            ],
                            [
                                'label' => __('Company Logo', 'flynt'),
                                'instructions' => __('Image-Format: JPG, PNG, SVG, WebP. Aspect Ratio: 16:9. Recommended Size: 1920px × 1080px.', 'flynt'),
                                'name' => 'companyLogo',
                                'type' => 'image',
                                'preview_size' => 'medium',
                                'mime_types' => 'jpg,jpeg,png,svg,webp',
                            ],
                        ]
                    ],
                    [
                        'label' => __('Calls To Action', 'flynt'),
                        'name' => 'ctas',
                        'type' => 'repeater',
                        'collapsed' => 0,
                        'min' => 1,
                        'layout' => 'row',
                        'button_label' => __('Add CTA', 'flynt'),
                        'sub_fields' => [
                            [
                                'label' => __('Link', 'flynt'),
                                'name' => 'link',
                                'type' => 'link'
                            ]
                        ],
                    ],
                ]
            ],
            [
                'label' => __('Logos', 'flynt'),
                'name' => 'logos',
                'type' => 'repeater',
                'collapsed' => 0,
                'min' => 4,
                'layout' => 'table',
                'button_label' => __('Add new logo', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Logo', 'flynt'),
                        'instructions' => __('Image-Format: JPG, PNG, SVG, WebP. Aspect Ratio: 16:9. Recommended Size: 1920px × 1080px.', 'flynt'),
                        'name' => 'image',
                        'type' => 'image',
                        'preview_size' => 'medium',
                        'mime_types' => 'jpg,jpeg,png,svg,webp',
                    ],
                ]
            ],
            [
                'label' => __('Options', 'flynt'),
                'name' => 'optionsTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => '',
                'name' => 'options',
                'type' => 'group',
                'layout' => 'row',
                'sub_fields' => [
                    [
                        'label' => __('ID', 'flynt'),
                        'name' => 'componentId',
                        'type' => 'text',
                    ],
                    [
                        'label' => __('Class(es)', 'flynt'),
                        'name' => 'componentClasses',
                        'type' => 'text',
                    ],
                    FieldVariables\getTheme()
                ],
            ],
        ]
    ];
}

Options::addTranslatable('SliderQuote', [

]);

Options::addGlobal('SliderQuote', [

]);
