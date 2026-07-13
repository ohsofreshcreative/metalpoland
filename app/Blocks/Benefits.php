<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Support\SectionClasses;

class Benefits extends Block
{
    public $name = 'Tekst, zdjęcie i kafelki';
    public $description = 'benefits';
    public $slug = 'benefits';
    public $category = 'formatting';
    public $icon = 'align-pull-left';
    public $keywords = ['tresc', 'zdjecie', 'kafelki'];
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
        $benefits = new FieldsBuilder('benefits');

        $benefits
            ->setLocation('block', '==', 'acf/benefits')
            ->addText('block-title', [
                'label' => 'Tytuł',
                'required' => 0,
            ])
            ->addAccordion('accordion1', [
                'label' => 'Tekst oraz zdjęcie',
                'open' => false,
                'multi_expand' => true,
            ])
            /*--- GROUP ---*/
            ->addTab('Elementy', ['placement' => 'top'])
            ->addGroup('g_benefits', ['label' => ''])
            ->addImage('image', [
                'label' => 'Obraz',
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
            ])
            ->addText('header', ['label' => 'Nagłówek'])
            ->addWysiwyg('text', [
                'label' => 'Treść',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => true,
            ])
        
            ->endGroup()

            /*--- TAB #2 ---*/
            ->addTab('Kafelki', ['placement' => 'top'])
            ->addRepeater('r_benefits', [
                'label' => 'Kafelki',
                'layout' => 'table',
                'min' => 1,
                'button_label' => 'Dodaj kafelek'
            ])
            ->addImage('image', [
                'label' => 'Obraz',
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
            ])
            ->addText('title', [
                'label' => 'Nagłówek',
            ])
            ->addTextarea('desc', [
                'label' => 'Opis',
                'rows' => 3,
            ])
            ->endRepeater()

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

        return $benefits;
    }

    public function with(): array
    {
        $fields = [
            'g_benefits' => get_field('g_benefits'),
            'r_benefits' => get_field('r_benefits'),
            'section_id' => get_field('section_id'),
            'section_class' => get_field('section_class'),

            'flip' => (bool) get_field('flip'),
            'wide' => (bool) get_field('wide'),
            'nomt' => (bool) get_field('nomt'),
            'gap' => (bool) get_field('gap'),

            'background' => get_field('background') ?: 'none',
        ];

        $fields['sectionClass'] = SectionClasses::fromMap($fields, [
            'flip' => 'order-flip',
            'wide' => 'wide',
            'nomt' => '!mt-0',
            'gap' => 'wider-gap',
        ]);

        return $fields;
    }
}