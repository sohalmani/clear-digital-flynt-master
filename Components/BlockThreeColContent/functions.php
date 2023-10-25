<?php

namespace Flynt\Components\BlockThreeColContent;

use Flynt\FieldVariables;
use Flynt\Utils\Options;

add_filter('Flynt/addComponentData?name=BlockThreeColContent', function ($data) {
    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'blockThreeColContent',
        'label' => __('Block: Three Col Content', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Background', 'flynt'),
                'name' => 'backgroundTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Background Overlays', 'flynt'),
                'instructions' => __('This will overlay above background video and image. You can choose multiple overlays. <br /> Overlays will be displayed in the order selected.', 'flynt'),
                'name' => 'backgroundOverlays',
                'type' => 'select',
                'allow_null' => 0,
                'multiple' => 1,
                'ui' => 1,
                'ajax' => 0,
                'choices' => [
                    'tint' => __('Tint', 'flynt'),
                    'grid' => __('Grid', 'flynt'),
                ],
            ],
            [
                'label' => __('General', 'flynt'),
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Eyebrow', 'flynt'),
                'name' => 'eyebrow',
                'type' => 'text',
            ],
            [
                'label' => __('Headine', 'flynt'),
                'instructions' => __('Enter a headline.', 'flynt'),
                'name' => 'headline',
                'type' => 'text',
            ],
            [
                'label' => __('Description', 'flynt'),
                'name' => 'description',
                'type' => 'text',
            ],
            [
                'label' => __('ColThreeItems', 'flynt'),
                'name' => 'colThreeItems',
                'type' => 'repeater',
                'sub_fields' => [
                    [
                        'label' => __('Icon', 'flynt'),
                        'name' => 'icon',
                        'type' => 'image',
                    ],
                    [
                        'label' => __('Title', 'flynt'),
                        'name' => 'title',
                        'type' => 'text',
                    ],
                    [
                        'label' => __('Blurb', 'flynt'),
                        'name' => 'blurb',
                        'type' => 'text',
                    ],
                    [
                        'label' => __('URL', 'flynt'),
                        'name' => 'link',
                        'type' => 'link',
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

Options::addTranslatable('BlockThreeColContent', [

]);

Options::addGlobal('BlockThreeColContent', [

]);
