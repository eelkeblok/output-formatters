<?php
namespace Consolidation\OutputFormatters;

use Consolidation\OutputFormatters\Options\FormatterOptions;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;
use PHPUnit\Framework\TestCase;

class APIDocsTest extends TestCase
{
    function testAPIDocs()
    {
        $this->markTestIncomplete(
            'API docs not maintained on this branch any longer.'
        );

        $testDocs = tempnam(sys_get_temp_dir(), 'TestAPIDocs.md');
        $currentDocs = getcwd() . '/docs/api.md';
        passthru("vendor/bin/phpdoc-md generate src > $testDocs");

        $testDocsContent = file_get_contents($testDocs);
        $currentDocsContent = file_get_contents($currentDocs);

        $testDocsContent = str_replace (array("\r\n", "\r"), "\n", $testDocsContent);
        $currentDocsContent = str_replace (array("\r\n", "\r"), "\n", $currentDocsContent);

        $this->assertEquals($testDocsContent, $currentDocsContent, "API docuementation out of date. Run 'composer api' to update.");
    }
}
