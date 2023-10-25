<?php

namespace Flynt\Components\NavigationFooterColumns;

use Flynt\FieldVariables;
use Timber\Twig;

function getACFLayout()
{
    return [
        'name' => 'navigationFooterColumns',
        'label' => __('Navigation: Footer Columns', 'flynt'),
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
                'type' => 'url'
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
                'label' => __('Options', 'flynt'),
                'name' => 'optionsTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
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
                ]
            ]
        ]
    ];
}
