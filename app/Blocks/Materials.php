<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Support\SectionClasses;

class Materials extends Block
{
    public $name = 'Materiały';
    public $description = 'Lista materiałów';
    public $slug = 'materials';
    public $category = 'formatting';
    public $icon = 'grid-view';
    public $keywords = ['materials', 'materiały', 'oferta'];
    public $mode = 'edit';

    public $supports = [
        'align' => false,
        'mode' => true,
        'jsx' => true,
    ];

    public function fields()
    {
        $materials = new FieldsBuilder('materials');

        $materials
            ->setLocation('block', '==', 'acf/materials')
            ->addText('block-title', [
                'label' => 'Tytuł bloku',
                'required' => 0,
            ])
            ->addAccordion('accordion1', [
                'label' => 'Materiały - Lista',
                'open' => true,
                'multi_expand' => true,
            ])
            /*--- FIELDS ---*/
            ->addTab('Treść', ['placement' => 'top'])
            ->addGroup('materials_settings', ['label' => ''])

                ->addText('title', [
                    'label' => 'Tytuł',
                ])
                ->addTextarea('text', [
                    'label' => 'Opis',
                    'rows' => 2,
                    'new_lines' => 'br',
                ])
                ->addRelationship('selected_materials', [
                    'label' => 'Wybrane materiały',
                    'post_type' => ['materials'],
                    'filters' => ['search', 'taxonomy'],
                    'return_format' => 'object',
                ])
                ->addLink('button', [
                    'label' => 'Przycisk',
                    'return_format' => 'array',
                ])
                ->addTrueFalse('show_image', [
                    'label' => 'Pokaż obrazek',
                    'default_value' => 1,
                    'ui' => 1,
                    'ui_on_text' => 'Tak',
                    'ui_off_text' => 'Nie',
                ])
                ->addTrueFalse('show_excerpt', [
                    'label' => 'Pokaż fragment treści',
                    'default_value' => 1,
                    'ui' => 1,
                    'ui_on_text' => 'Tak',
                    'ui_off_text' => 'Nie',
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
            ->addTrueFalse('flip', [
                'label' => 'Odwrócona kolejność',
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
                    'section-soft-blue' => 'Jasnoniebieskie (#F4F9FF)',
                    'section-lighter-grad' => 'Gradient Pionowy (Lighter)',
                    'section-light-horizontal' => 'Gradient Poziomy',
                ],
                'default_value' => 'none',
                'ui' => 0,
                'allow_null' => 0,
            ]);

        return $materials;
    }

    public function with(): array
    {
        $materials_settings = get_field('materials_settings') ?: [];
        $show_image = array_key_exists('show_image', $materials_settings) ? (bool) $materials_settings['show_image'] : true;
        $show_excerpt = array_key_exists('show_excerpt', $materials_settings) ? (bool) $materials_settings['show_excerpt'] : false;

        $selected_materials = $materials_settings['selected_materials'] ?? [];

        if (!empty($selected_materials)) {
            $materials = $selected_materials;
        } else {
            $query = new \WP_Query([
                'post_type'      => 'materials',
                'posts_per_page' => -1, // Możesz zmienić na np. 8, jeśli chcesz ograniczyć liczbę automatycznych wpisów
                'post_status'    => 'publish',
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ]);

            $materials = $query->posts;
        }

        $fields = [
            'materials_settings' => $materials_settings,
            'materials' => $materials,
            'show_image' => $show_image,
            'show_excerpt' => $show_excerpt,
            'section_id' => get_field('section_id'),
            'section_class' => get_field('section_class'),
            'flip' => (bool) get_field('flip'),
            'wide' => (bool) get_field('wide'),
            'nomt' => (bool) get_field('nomt'),
            'gap' => (bool) get_field('gap'),
            'lightbg' => get_field('lightbg'),
            'graybg' => get_field('graybg'),
            'whitebg' => get_field('whitebg'),
            'brandbg' => get_field('brandbg'),
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