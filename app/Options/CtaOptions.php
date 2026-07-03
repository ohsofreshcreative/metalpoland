<?php

namespace App\Options;

use Log1x\AcfComposer\Options;
use StoutLogic\AcfBuilder\FieldsBuilder; 
use App\Support\SectionClasses;

class CtaOptions extends Options
{
    // Nazwa widoczna w menu WP
    public $name = 'Wezwanie do działania'; 
    public $slug = 'cta-options'; 
    public $title = ' Wezwanie do działania ';
    public $capability = 'edit_posts';
    public $redirect = false;
	public $position = 82;

    public function fields(): array
    {
        $ctaOptions = new FieldsBuilder('cta_options');

        $ctaOptions
            ->addTab('Treść CTA', ['placement' => 'top'])

            ->addGroup('g_cta_options', [
                'label' => ' CTA ',
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
				   ->addLink('button2', [
                    'label' => 'Przycisk #2',
                    'return_format' => 'array',
                ])
			
            ->endGroup();

        return $ctaOptions->build();
    }
}