<?php

namespace SilbinaryWolf\Components\Tests;

use Config;
use SapphireTest;
use SSViewer;
use SSViewer_FromString;

class ComponentTest extends SapphireTest
{
    public function setUp()
    {
        parent::setUp();
        Config::inst()->update('SSViewer', 'source_file_comments', false);
        Config::inst()->update('SSViewer_FromString', 'cache_template', false);
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    /**
     *
     */
    public function testSimpleCase()
    {
        $template = <<<SSTemplate
<% component MyComponentButton, "Class=btn btn-secondary" %>
    <span class="text">
        No submission
    </span>
<% end_component %>
SSTemplate;
        $resultHTML = SSViewer::fromString($template)->process(null);
        $expectedHTML = <<<HTML
<button class="btn btn-secondary" type="button">
    <span class="text">
        No submission
    </span>
</button>
HTML;
        $this->assertEqualIgnoringWhitespace($expectedHTML, $resultHTML, 'Unexpected output');
    }

        /**
         *
         */
    public function testPassingOptionalTypeProperty()
    {
        $template = <<<SSTemplate
<% component MyComponentButton, "Class=btn btn-primary", "Type=submit" %>
    <span class="text">
        Submit me!
    </span>
<% end_component %>
SSTemplate;
        $resultHTML = SSViewer::fromString($template)->process(null);
        $expectedHTML = <<<HTML
<button class="btn btn-primary" type="submit">
    <span class="text">
        Submit me!
    </span>
</button>
HTML;
        $this->assertEqualIgnoringWhitespace($expectedHTML, $resultHTML, 'Unexpected output');
    }

    /**
     * Taken from "framework\tests\view\SSViewerTest.php"
     */
    protected function assertEqualIgnoringWhitespace($a, $b)
    {
        $this->assertEquals(preg_replace('/\s+/', '', $a), preg_replace('/\s+/', '', $b));
    }
}
