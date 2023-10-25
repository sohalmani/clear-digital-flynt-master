<?php

namespace Flynt\Components\HeroImageCta;

use Flynt\FieldVariables;
use Timber\Twig;

function getACFLayout()
{
    return [
        'name' => 'heroImageCta',
        'label' => __('Hero: Image CTA', 'flynt'),
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
                'label' => __('Lightbox Video', 'flynt'),
                'instructions' => __('Video-Format: MP4, WebM. Aspect Ratio: 16:9. Recommended Size: 1920px × 1080px.', 'flynt'),
                'name' => 'lightboxVideo',
                'type' => 'url'
            ],
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Eyebrow', 'flynt'),
                'instructions' => __('Enter any text to show before headline.', 'flynt'),
                'name' => 'eyebrow',
                'type' => 'text',
            ],
            [
                'label' => __('Headline', 'flynt'),
                'instructions' => __('Enter a headline.', 'flynt'),
                'name' => 'headline',
                'type' => 'group',
                'collapsed' => 0,
                'layout' => 'row',
                'sub_fields' => [
                    [
                        'label' => __('Text', 'flynt'),
                        'instructions' => __('Enter headline text.', 'flynt'),
                        'name' => 'text',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    [
                        'label' => __('Tag', 'flynt'),
                        'instructions' => __('Choose the HTML tag for headline.', 'flynt'),
                        'name' => 'tag',
                        'type' => 'radio',
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'layout' => 'horizontal',
                        'choices' => [
                            'h1' => __('H1', 'flynt'),
                            'h2' => __('H2', 'flynt'),
                        ],
                        'default_value' => 'h2'
                    ],
                    [
                        'label' => __('Type', 'flynt'),
                        'instructions' => __('Choose the typography style for headline.', 'flynt'),
                        'name' => 'type',
                        'type' => 'radio',
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'layout' => 'horizontal',
                        'choices' => [
                            'h1' => __('H1', 'flynt'),
                            'h2' => __('H2', 'flynt'),
                        ],
                        'default_value' => 'h1'
                    ],
                ]
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
                'layout' => 'table',
                'button_label' => __('Add CTA', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Button', 'flynt'),
                        'name' => 'button',
                        'type' => 'group',
                        'collapsed' => 0,
                        'layout' => 'row',
                        'sub_fields' => [
                            [
                                'label' => __('Link', 'flynt'),
                                'name' => 'link',
                                'type' => 'link'
                            ],
                            [
                                'label' => __('Variant', 'flynt'),
                                'name' => 'variant',
                                'type' => 'select',
                                'ui' => 1,
                                'ajax' => 0,
                                'choices' => [
                                    'primary' => 'Primary',
                                    'outlined' => 'Outlined',
                                    'text' => 'Text',
                                ]
                            ],
                        ],
                    ],
                ],
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
