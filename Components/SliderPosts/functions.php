<?php

namespace Flynt\Components\SliderPosts;

use Flynt\FieldVariables;
use Flynt\Utils\Options;

add_filter('Flynt/addComponentData?name=SliderPosts', function ($data) {
    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'sliderPosts',
        'label' => __('Slider: Posts', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Headine', 'flynt'),
                'instructions' => __('Enter a headline.', 'flynt'),
                'name' => 'headline',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'label' => __('Blurb', 'flynt'),
                'instructions' => __('Go ahead and add a paragraph! Or just leave it empty and nothing will be shown.', 'flynt'),
                'name' => 'blurb',
                'type' => 'wysiwyg',
                'tabs' => 'visual,text',
                'media_upload' => 0,
                'delay' => 0,
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
            [
                'label' => __('Logos', 'flynt'),
                'name' => 'logos',
                'type' => 'group',
                'collapsed' => 0,
                'layout' => 'block',
                'sub_fields' => [
                    [
                        'label' => __('Title', 'flynt'),
                        'instructions' => __('Enter a title to display before logos.', 'flynt'),
                        'name' => 'title',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    [
                        'label' => __('Logos List', 'flynt'),
                        'name' => 'list',
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
                    ]
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

Options::addTranslatable('SliderPosts', [

]);

Options::addGlobal('SliderPosts', [

]);
