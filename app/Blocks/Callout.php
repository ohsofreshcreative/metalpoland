<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Support\SectionClasses;

class Callout extends Block
{
    public $name = 'Treść CTA (Callout)';
    public $description = 'callout';
    public $slug = 'callout';
    public $category = 'formatting';
    public $icon = 'align-pull-left';
    public $keywords = ['tresc', 'zdjecie', 'callout'];
    public $mode = 'edit';

    public $supports = [
        'align' => false,
        'mode' => true,
        'jsx' => true,
        'anchor' => true,
        'customClassName' => true,
    ];

    public function fields()
    {
        $callout = new FieldsBuilder('callout');

        $callout
            ->setLocation('block', '==', 'acf/callout')

            ->addText('block-title', [
                'label' => 'Tytuł',
                'required' => 0,
            ])

            ->addAccordion('accordion1', [
                'label' => 'Treść CTA',
                'open' => false,
                'multi_expand' => true,
            ])

            /*--- TREŚĆ BLOKU ---*/
            ->addTab('Elementy', [
                'placement' => 'top'
            ])

            ->addGroup('g_callout', [
                'label' => 'Callout',
            ])

                ->addImage('image', [
                    'label' => 'Obraz',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                ])

                ->addText('header', [
                    'label' => 'Tytuł',
                ])

                ->addWysiwyg('txt', [
                    'label' => 'Treść',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => true,
                    'rows' => 4,
                ])

                ->addLink('button', [
                    'label' => 'Przycisk',
                    'return_format' => 'array',
                ])

            ->endGroup()


            /*--- USTAWIENIA BLOKU ---*/
            ->addTab('Ustawienia bloku', [
                'placement' => 'top'
            ])

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
                'allow_null' => 0,
            ]);

        return $callout->build();
    }


    public function with(): array
    {
        $fields = [

            // grupa ACF z bloku
            'callout' => get_field('g_callout') ?: [],

            // ustawienia sekcji
            'section_id' => get_field('section_id'),
            'section_class' => get_field('section_class'),

            'flip' => (bool) get_field('flip'),
            'wide' => (bool) get_field('wide'),
            'nomt' => (bool) get_field('nomt'),
            'gap' => (bool) get_field('gap'),
            'nolist' => (bool) get_field('nolist'),

            'background' => get_field('background') ?: 'none',
        ];


        $fields['sectionClass'] = SectionClasses::fromMap($fields, [
            'flip' => 'order-flip',
            'wide' => 'wide',
            'nomt' => '!mt-0',
            'gap' => 'wider-gap',
            'nolist' => 'no-list',
        ]);


        return $fields;
    }
}