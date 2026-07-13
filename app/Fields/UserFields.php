<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class UserFields extends Field
{
    /**
     * Definiuje dodatkowe pola dla profilu użytkownika.
     *
     * @return array
     */
    public function fields(): array
    {
        $userFields = new FieldsBuilder('user_additional_fields', [
            'title' => 'Dodatkowe dane profilu',
        ]);

        $userFields
            ->setLocation('user_form', '==', 'all'); 

        $userFields
            ->addImage('avatar_acf', [
                'label' => 'Zdjęcie profilowe ',
                'return_format' => 'id', 
                'preview_size' => 'thumbnail',
            ]);

        return [$userFields];
    }
}