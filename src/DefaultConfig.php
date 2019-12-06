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

use PhpCsFixer\Config;

class DefaultConfig extends Config
{
    /**
     * @var string
     */
    protected $header;

    public function __construct($header = null)
    {
        parent::__construct();

        $this->header = $header;
    }

    public function getName()
    {
        return 'Contao default';
    }

    public function getRules()
    {
        $rules = [
            '@PhpCsFixer' => true,
            '@PhpCsFixer:risky' => true,
            '@PHPUnit57Migration:risky' => true,

            // @Symfony adjustments
            'no_superfluous_phpdoc_tags' => false,

            // @PhpCsFixer adjustments
            'blank_line_before_statement' => [
                'statements' => [
                    'case',
                    'declare',
                    'default',
                    'do',
                    'for',
                    'foreach',
                    'if',
                    'return',
                    'switch',
                    'throw',
                    'try',
                    'while',
                ],
            ],
            'explicit_indirect_variable' => false,
            'explicit_string_variable' => false,
            'method_chaining_indentation' => false,
            'no_extra_blank_lines' => [
                'tokens' => [
                    'curly_brace_block',
                    'extra',
                    'parenthesis_brace_block',
                    'square_brace_block',
                    'throw',
                    'use',
                ],
            ],
            'php_unit_internal_class' => false,
            'php_unit_test_class_requires_covers' => false,
            'phpdoc_types_order' => false,
            'single_line_comment_style' => [
                'comment_types' => ['hash'],
            ],
            'single_line_throw' => true,

            // @PhpCsFixer:risky adjustments
            'final_internal_class' => false,
            'php_unit_test_case_static_method_calls' => [
                'call_type' => 'this',
            ],

            // Other
            'linebreak_after_opening_tag' => true,
        ];

        if (null !== $this->header) {
            $rules['header_comment'] = ['header' => $this->header];
        }

        return $rules;
    }

    public function getRiskyAllowed()
    {
        return true;
    }

    public function getCacheFile()
    {
        return sys_get_temp_dir().'/'.strtr(static::class, '\\', '_');
    }
}
