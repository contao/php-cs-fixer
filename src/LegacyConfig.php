<?php

declare(strict_types=1);

/*
 * This file is part of Contao.
 *
 * (c) Leo Feyer
 *
 * @license LGPL-3.0-or-later
 */

namespace Contao\PhpCsFixer;

class LegacyConfig extends DefaultConfig
{
    public function getName()
    {
        return 'Contao legacy';
    }

    public function getIndent()
    {
        return "\t";
    }

    public function getRules()
    {
        $rules = parent::getRules();

        $this->adjustPsr2Rules($rules);
        $this->adjustSymfonyRules($rules);
        $this->adjustPhpCsFixerRules($rules);

        return $rules;
    }

    private function adjustPsr2Rules(array &$rules)
    {
        $rules['braces'] = [
            'allow_single_line_closure' => true,
            'position_after_anonymous_constructs' => 'next',
            'position_after_control_structures' => 'next',
        ];

        $rules['no_spaces_after_function_name'] = false;
    }

    private function adjustSymfonyRules(array &$rules)
    {
        $rules['binary_operator_spaces'] = false;
        $rules['concat_space'] = ['spacing' => 'one'];
        $rules['increment_style'] = false;
        $rules['phpdoc_scalar'] = false;
        $rules['phpdoc_separation'] = false;
        $rules['phpdoc_summary'] = false;
        $rules['phpdoc_to_comment'] = false;
        $rules['return_assignment'] = false;
        $rules['single_quote'] = false;
        $rules['trailing_comma_in_multiline_array'] = false;
        $rules['yoda_style'] = false;

        if (false !== $key = array_search('throw', $rules['no_extra_blank_lines']['tokens'], true)) {
            unset($rules['no_extra_blank_lines']['tokens'][$key]);
        }
    }

    private function adjustPhpCsFixerRules(array &$rules)
    {
        $rules['array_syntax'] = ['syntax' => 'long'];
        $rules['combine_consecutive_issets'] = false;
        $rules['combine_consecutive_unsets'] = false;
        $rules['multiline_whitespace_before_semicolons'] = false;
        $rules['ordered_class_elements'] = false;
        $rules['phpdoc_order'] = false;
        $rules['strict_comparison'] = false;
        $rules['strict_param'] = false;

        if (false !== $key = array_search('case', $rules['blank_line_before_statement']['statements'], true)) {
            unset($rules['blank_line_before_statement']['statements'][$key]);
        }
    }
}
