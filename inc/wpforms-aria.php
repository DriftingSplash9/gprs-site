<?php
/**
 * WPForms ARIA Helper Fix
 * Originally: WPCode snippet
 */

add_filter('wpforms_field_properties', function($properties, $field, $form_data){

    // Apply ONLY to your form (ID = 1452)
    if (intval($form_data['id']) !== 1452) {
        return $properties;
    }

    // Loop through each input inside each field
    foreach ($properties['inputs'] as $key => $input) {

        // Every input has a unique ID like "wpforms-1452-field_5_1"
        if (!isset($input['id'])) {
            continue;
        }

        $id = $input['id'];

        /* ---------------------------------------------------------
           ADD MISSING ARIA DESCRIPTION NODE
        --------------------------------------------------------- */
        if (isset($properties['inputs'][$key]['description']) === false) {
            $properties['inputs'][$key]['description'] =
                '<span id="'.$id.'-description" class="sr-only"></span>';
        }

        /* ---------------------------------------------------------
           ADD MISSING ARIA ERROR NODE
        --------------------------------------------------------- */
        if (isset($properties['inputs'][$key]['error']) === false) {
            $properties['inputs'][$key]['error'] =
                '<span id="'.$id.'-error" class="sr-only"></span>';
        }
    }

    return $properties;

}, 10, 3);
