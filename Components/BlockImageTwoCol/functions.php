<?php

namespace Flynt\Components\BlockImageTwoCol;

use Flynt\FieldVariables;
use Flynt\Utils\Options;

add_filter('Flynt/addComponentData?name=BlockImageTwoCol', function ($data) {
    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'blockImageTwoCol',
        'label' => __('Block: Image Content Two Column', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('General', 'flynt'),
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Columns', 'flynt'),
                'name' => 'columns',
                'type' => 'repeater',
                'collapsed' => 0,
                'min' => 2,
                'layout' => 'block',
                'button_label' => __('Add new cloumn', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Background', 'flynt'),
                        'name' => 'backgroundTab',
                        'type' => 'tab',
                        'placement' => 'top',
                        'endpoint' => 0,
                    ],
                    [
                        'label' => __('Background Video', 'flynt'),
                        'instructions' => __('Video-Format: MP4, WebM. Aspect Ratio: 16:9. Recommended Size: 1920px × 1080px.', 'flynt'),
                        'name' => 'backgroundVideo',
                        'type' => 'url',
                    ],
                    [
                        'label' => __('Background Image', 'flynt'),
                        'instructions' => __('If background video is posted, the background image acts as a poster image. <br /> Image-Format: JPG, PNG, SVG, WebP. Aspect Ratio: 16:9. Recommended Size: 1920px × 1080px.', 'flynt'),
                        'name' => 'backgroundImage',
                        'type' => 'image',
                        'preview_size' => 'medium',
                        'mime_types' => 'jpg,jpeg,png,svg,webp',
                    ],
                    [
                        'label' => __('Content', 'flynt'),
                        'name' => 'contentTab',
                        'type' => 'tab',
                        'placement' => 'top',
                        'endpoint' => 0,
                    ],
                    [
                        'label' => __('Logo', 'flynt'),
                        'instructions' => __('Image-Format: JPG, PNG, SVG, WebP. Aspect Ratio: 16:9. Recommended Size: 1920px × 1080px.', 'flynt'),
                        'name' => 'logo',
                        'type' => 'image',
                        'preview_size' => 'medium',
                        'mime_types' => 'jpg,jpeg,png,svg,webp',
                    ],
                    [
                        'label' => __('Headine', 'flynt'),
                        'instructions' => __('Enter a headline.', 'flynt'),
                        'name' => 'headline',
                        'type' => 'text',
                        'required' => 1,
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
                ],
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

Options::addTranslatable('BlockImageTwoCol', [

]);

Options::addGlobal('BlockImageTwoCol', [

]);
