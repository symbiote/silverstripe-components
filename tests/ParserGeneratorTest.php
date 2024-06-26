<?php

namespace Symbiote\Components\Tests;

use SilverStripe\Core\Config\Config;
use SilverStripe\Dev\SapphireTest;
use ParserCompiler;

class ParserGeneratorTest extends SapphireTest
{
    /**
     * @return string
     */
    protected function getModulePath()
    {
        return __DIR__ . '/..';
    }

    /**
     * This test makes sure that "ComponentTemplateParserTrait.php" was not edited by hand and that it
     * is definitely generated from "ComponentTemplateParserTrait.php.inc"
     */
    public function testParserGenerator()
    {
        $modulePath = $this->getModulePath();

        //
        include_once(FRAMEWORK_DIR . '/thirdparty/php-peg/Compiler.php');

        //
        // Read files to check via composer.json
        //
        // We do this so that the 'composer run-script php-peg' operation is the single source of truth
        // for this test.
        //
        $composerJSON = file_get_contents($modulePath . '/composer.json');
        $composer = json_decode($composerJSON, true);
        $this->assertTrue(
            isset($composer['scripts']['php-peg']) && $composer['scripts']['php-peg'],
            "Missing `composer run-script php-peg` script from composer.json"
        );

        //
        $phpPegCommand = explode('>', (string) $composer['scripts']['php-peg']);
        $this->assertTrue(
            isset($phpPegCommand[1]),
            "Missing pipe (>) from php-peg script in composer.json"
        );
        $outputFilename = trim($phpPegCommand[1]);
        $parts = preg_split('/\s+/', trim($phpPegCommand[0]));
        $inputFilename = trim($parts[count($parts)-1]);

        //
        $inputFilename = str_replace('./', $modulePath . '/', $inputFilename);
        $outputFilename = str_replace('./', $modulePath . '/', $outputFilename);

        $this->assertTrue(
            file_exists($inputFilename),
            "Cannot find input filename from php-peg in composer.json: " . $inputFilename
        );
        $this->assertTrue(
            file_exists($outputFilename),
            "Cannot find output filename from php-peg in composer.json: " . $inputFilename
        );


        $fileContents = file_get_contents($inputFilename);
        $expectedGeneratedFileContents = ParserCompiler::compile($fileContents);
        $currentGeneratedFileContents = file_get_contents($outputFilename);

        $baseInputFilename = basename($inputFilename);
        $baseOutputFilename = basename($outputFilename);
        $this->assertTrue(
            $expectedGeneratedFileContents === $currentGeneratedFileContents,
            "Re-generating " . $baseInputFilename . " no longer matches the current file in the repository. Was " . $baseOutputFilename . " edited manually?\nYou must edit " . $baseInputFilename . ", then run \"composer run-script php-peg\" to re-generate " . $baseOutputFilename . "."
        );
    }
}
