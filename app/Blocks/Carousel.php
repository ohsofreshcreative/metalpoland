<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Carousel extends Block
{
    public $name = 'Materiały - Slider';
    public $description = 'carousel';
    public $slug = 'carousel';
    public $category = 'formatting';
    public $icon = 'image-flip-horizontal';
    public $keywords = ['carousel', 'kafelki'];
    public $mode = 'edit';
    public $supports = [
        'align' => false,
        'mode' => true,
        'jsx' => true,
    ];

    public function fields()
    {
        $carousel = new FieldsBuilder('carousel');

        $carousel
            ->setLocation('block', '==', 'acf/carousel')
            ->addText('block-title', [
                'label' => 'Tytuł',
                'required' => 0,
            ])
            ->addAccordion('accordion1', [
                'label' => 'Materiały - Slider',
                'open' => false,
                'multi_expand' => true,
            ])

            /*--- FIELDS ---*/
            ->addTab('Treści', ['placement' => 'top'])
            ->addGroup('g_carousel', ['label' => ''])

            ->addText('title', [
                'label' => 'Nagłówek nad sliderem',
            ])

            ->addTextarea('text', [
                'label' => 'Tekst nad sliderem',
                'rows' => 4,
                'new_lines' => 'br',
            ])

            ->addRelationship('materials', [
                'label' => 'Materiały do slidera',
                'post_type' => ['materials'],
                'post_status' => ['publish'],
                'filters' => ['search', 'taxonomy'],
                'elements' => ['featured_image'],
                'min' => 1,
                'max' => 10,
                'return_format' => 'object',
                'instructions' => 'Wybierz materiały, które mają się pojawić w sliderze. Kolejność na liście będzie zachowana na froncie.',
            ])

            ->endGroup()

            /*--- USTAWIENIA BLOKU ---*/
            ->addTab('Ustawienia bloku', ['placement' => 'top'])
            ->addText('section_id', [
                'label' => 'ID',
            ])
            ->addText('section_class', [
                'label' => 'Dodatkowe klasy CSS',
            ])
            ->addTrueFalse('nolist', [
                'label' => 'Brak punktatorów',
                'ui' => 1,
                'ui_on_text' => 'Tak',
                'ui_off_text' => 'Nie',
            ])
            ->addTrueFalse('flip', [
                'label' => 'Odwrotna kolejność',
                'ui' => 1,
                'ui_on_text' => 'Tak',
                'ui_off_text' => 'Nie',
            ])
            ->addTrueFalse('wide', [
                'label' => 'Szeroka kolumna',
                'ui' => 1,
                'ui_on_text' => 'Tak',
                'ui_off_text' => 'Nie',
            ])
            ->addTrueFalse('nomt', [
                'label' => 'Usunięcie marginesu górnego',
                'ui' => 1,
                'ui_on_text' => 'Tak',
                'ui_off_text' => 'Nie',
            ])
            ->addTrueFalse('gap', [
                'label' => 'Większy odstęp',
                'ui' => 1,
                'ui_on_text' => 'Tak',
                'ui_off_text' => 'Nie',
            ])
            ->addSelect('background', [
                'label' => 'Kolor tła',
                'choices' => [
                    'none' => 'Brak (domyślne)',
                    'section-white' => 'Białe',
                    'section-light' => 'Jasne',
                    'section-gray' => 'Szare',
                    'section-brand' => 'Marki',
                    'section-gradient' => 'Gradient',
                    'section-dark' => 'Ciemne',
                ],
                'default_value' => 'none',
                'ui' => 0,
                'allow_null' => 0,
            ]);

        return $carousel;
    }

    public function with()
    {
        $g_carousel = get_field('g_carousel') ?: [];
        $materials = $g_carousel['materials'] ?? [];

        return [
            'g_carousel' => $g_carousel,
            'materials' => is_array($materials) ? $materials : [],
            'section_id' => get_field('section_id'),
            'section_class' => get_field('section_class'),
            'nolist' => (bool) get_field('nolist'),
            'flip' => (bool) get_field('flip'),
            'wide' => (bool) get_field('wide'),
            'nomt' => (bool) get_field('nomt'),
            'gap' => (bool) get_field('gap'),
            'background' => get_field('background') ?: 'none',
        ];
    }
}