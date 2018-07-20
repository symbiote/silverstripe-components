<?php

namespace SilbinaryWolf\Components\Tests;

use SilverStripe\Core\Config\Config;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\View\SSViewer;
use SilverStripe\View\SSViewer_FromString;
use SilverStripe\ORM\ArrayList;
use SilverStripe\View\ArrayData;
use SilverStripe\Forms\TextField;
use SilverStripe\View\ViewableData;
use SilbinaryWolf\Components\ComponentService;
use SilverStripe\View\SSViewer_Scope;
use SilverStripe\Core\Injector\Injector;

class ComponentTest extends SapphireTest
{
    public function setUp()
    {
        parent::setUp();
        SSViewer::config()->source_file_comments = false;
        //SSViewer_FromString::config()->cache_template = false;
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    public function testCustomizedComponentPath()
    {
        Config::inst()->update(ComponentService::class, 'component_paths', [
            'components/subfolder'
        ]);

        $service = Injector::inst()->get(ComponentService::class);

        $scope = new SSViewer_Scope(null);
        try {
            $resultHTML = $service->renderComponent('SubComponent', [], $scope);
        } catch (\Exception $e) {
            $this->assertTrue(strpos($e->getMessage(), "None of the following templates could be found") !== false);
        }

        $service->componentTemplatePaths = [
            'components/subfolder'
        ];

        $resultHTML = $service->renderComponent('SubComponent', [], $scope);

        $expected = '<button class="subcomponent">Text</button>';
        $this->assertEquals($expected, trim($resultHTML->getValue()));
    }

    /**
     *
     */
    public function testSimpleCase()
    {
        $template = <<<SSTemplate
<:MyComponentButton class="btn btn-secondary" >
    <span class="text">
        No submission
    </span>
</:MyComponentButton>
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
     * Make sure that ' characters are escaped.
     */
    public function testSingleQuoteCharacterIsEscaped()
    {
        $template = <<<SSTemplate
<:MyComponentButton class="btn btn-secondary" type="Test's and Stuff" >
    <span class="text">
        No submission's
    </span>
</:MyComponentButton>
SSTemplate;
        $resultHTML = SSViewer::fromString($template)->process(null);
        $expectedHTML = <<<HTML
<button class="btn btn-secondary" type="Test&#039;s and Stuff">
    <span class="text">
        No submission's
    </span>
</button>
HTML;
        $this->assertEqualIgnoringWhitespace($expectedHTML, $resultHTML, 'Unexpected output');
    }

    /**
     * Make sure that \ characters are escaped.
     */
    public function testBackslashCharacterIsEscaped()
    {
        $template = <<<SSTemplate
<:MyComponentButton class="btn btn-secondary" type="Test\'s and Stuff" >
    <span class="text">
        No submission's
    </span>
</:MyComponentButton>
SSTemplate;
        $resultHTML = SSViewer::fromString($template)->process(null);
        $expectedHTML = <<<HTML
<button class="btn btn-secondary" type="Test\&#039;s and Stuff">
    <span class="text">
        No submission's
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
<:MyComponentButton class="btn btn-primary" type="submit" >
    <span class="text">
        Submit me!
    </span>
</:MyComponentButton>
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

    public function testSelfClosingSupport()
    {
        $template = <<<SSTemplate
<:MyComponentButton
    class="btn btn-primary"
    type="submit"
/>
SSTemplate;
        $expectedHTML = <<<HTML
<button class="btn btn-primary" type="submit"></button>
HTML;
        $resultHTML = SSViewer::fromString($template)->process(null);
        $this->assertEqualIgnoringWhitespace($expectedHTML, $resultHTML, 'Unexpected output');
    }

    public function testNewlineSupport()
    {
        $expectedHTML = <<<HTML
<button class="btn btn-primary" type="submit">
    <span class="text">
        Submit me!
    </span>
</button>
HTML;
        $template = <<<SSTemplate
<:MyComponentButton
    class="btn btn-primary"
    type="submit"
>
    <span class="text">
        Submit me!
    </span>
</:MyComponentButton>
SSTemplate;
        $resultHTML = SSViewer::fromString($template)->process(null);
        $this->assertEqualIgnoringWhitespace($expectedHTML, $resultHTML, 'Unexpected output');
        $template = <<<SSTemplate
<:MyComponentButton class="btn btn-primary"
    type="submit"
>
    <span class="text">
        Submit me!
    </span>
</:MyComponentButton>
SSTemplate;
        $resultHTML = SSViewer::fromString($template)->process(null);
        $this->assertEqualIgnoringWhitespace($expectedHTML, $resultHTML, 'Unexpected output');
        $template = <<<SSTemplate
<:MyComponentButton class="btn btn-primary"
    type="submit">
    <span class="text">
        Submit me!
    </span>
</:MyComponentButton>
SSTemplate;
        $resultHTML = SSViewer::fromString($template)->process(null);
        $this->assertEqualIgnoringWhitespace($expectedHTML, $resultHTML, 'Unexpected output');
    }

    public function testIfStatement()
    {
        $template = <<<SSTemplate
<:MyComponentButtonWithObjectCast
    class="btn btn-primary"
    type="submit"
    attributesHTML="<% if \$Field.getAttributesHTML("class","type") %>\$Field.getAttributesHTML("class","type")<% end_if %> data-test"
/>
SSTemplate;
        $expectedHTML = <<<HTML
<button class="btn btn-primary" type="submit" name="Name" id="Name" data-test></button>
HTML;
        $formField = new TextField("Name", "Name");
        $resultHTML = SSViewer::fromString($template)->process(
            new ArrayData(
                array(
                    'Field' => $formField,
                )
            )
        );
        $this->assertEqualIgnoringWhitespace($expectedHTML, $resultHTML, 'Unexpected output');
    }

    public function testSSListSupport()
    {
        $list = new ArrayList(array(
            new ArrayData(array(
                'Title' => 'Menu Item 1'
            )),
            new ArrayData(array(
                'Title' => 'Menu Item 2'
            ))
        ));
        $template = <<<SSTemplate
<div class="menu-container-count-\$MenuList.Count">
    <:SSListComponent
        Items="\$MenuList"
    />
</div>
SSTemplate;
        $expectedHTML = <<<HTML
<div class="menu-container-count-2">
    <ul class="menu menu-count-2">
         <li class="menu-item menu-item-1">
            Menu Item 1
        </li>
        <li class="menu-item menu-item-2">
            Menu Item 2
        </li>
    </ul>
</div>
HTML;
        $formField = new TextField("Name", "Name");
        $resultHTML = SSViewer::fromString($template)->process(
            new ArrayData(
                array(
                    'MenuList' => $list,
                )
            )
        );
        $this->assertEqualIgnoringWhitespace($expectedHTML, $resultHTML, 'Unexpected output');
    }

    /**
     * Test to make sure anything that inherits ViewableData works
     * inside a template.
     *
     * Classes that subclass ViewableData include:
     * - ArrayData
     * - DataObject
     * - SiteTree
     *
     */
    public function testViewableDataSupport()
    {
        /**
         * Stop PHPStan error as we're using this like "mixed" type.
         *
         * @var mixed $record
         */
        $record = new ViewableData();
        $record->Title = "ViewableData Title 1";

        $template = <<<SSTemplate
<:ViewableDataComponent
    MyRecord="\$MyRecord"
/>
<:ViewableDataComponent
    MyRecord="\$MyArrayData"
/>
SSTemplate;
        $expectedHTML = <<<HTML
<li class="menu-item">
    ViewableData Title 1
</li>
<li class="menu-item">
    ArrayData Title 2
</li>
HTML;
        $formField = new TextField("Name", "Name");
        $resultHTML = SSViewer::fromString($template)->process(
            new ArrayData(
                array(
                    'MyRecord' => $record,
                    'MyArrayData' => new ArrayData(array(
                        'Title' => 'ArrayData Title 2'
                    ))
                )
            )
        );
        $this->assertEqualIgnoringWhitespace($expectedHTML, $resultHTML, 'Unexpected output');
    }

    /**
     * This is to make sure that "double quoting" doesn't occur when passing "getAttributesHTML"
     * into a component, ie. Resulting HTML looks like:
     *
     * <button class="btn btn-secondary" type="button" name=&quot;Name&quot; id=&quot;Name&quot;></button>'
     */
    public function testAvoidBadXMLEscaping()
    {
        $template = <<<SSTemplate
<:MyComponentButtonWithObjectCast
    class="btn btn-primary"
    type="submit"
    attributesHTML="\$Field.getAttributesHTML("class","type")"
/>

<% with \$Field %>
    <:MyComponentButtonWithObjectCast
        class="btn btn-secondary"
        type="button"
        attributesHTML="\$getAttributesHTML("class","type")"
    />
<% end_with %>
SSTemplate;
        $expectedHTML = <<<HTML
<button class="btn btn-primary" type="submit" name="Name" id="Name"></button>
<button class="btn btn-secondary" type="button" name="Name" id="Name"></button>
HTML;
        $formField = new TextField("Name", "Name");
        $resultHTML = SSViewer::fromString($template)->process(
            new ArrayData(
                array(
                    'Field' => $formField,
                )
            )
        );
        $this->assertEqualIgnoringWhitespace($expectedHTML, $resultHTML, 'Unexpected output');
    }

    /**
     * Taken from "framework\tests\view\SSViewerTest.php"
     */
    protected function assertEqualIgnoringWhitespace($a, $b, $message = '')
    {
        $this->assertEquals(preg_replace('/\s+/', '', $a), preg_replace('/\s+/', '', $b), $message);
    }
}
