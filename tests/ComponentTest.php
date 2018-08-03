<?php

namespace SilbinaryWolf\Components\Tests;

use Exception;
use Config;
use SapphireTest;
use SSViewer;
use SSViewer_FromString;
use ArrayList;
use ArrayData;
use TextField;
use ViewableData;
use SSTemplateParseException;
use SilbinaryWolf\Components\ComponentReservedPropertyException;

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
<button class="btn btn-secondary" type="Test's and Stuff">
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
<button class="btn btn-secondary" type="Test\'s and Stuff">
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
     * If you don't pass a $class variable in, $class will end
     * up defaulting to 'SilbinaryWolf\Components\ComponentData' without
     * additional logic that prevents that (found in ComponentData class)
     *
     * This is most likely not necessary in SilverStripe 4.X, but it was
     * a necessary check in SilverStripe 3.X
     */
    public function testComponentUsingClassButNotPassedIn()
    {
        $template = <<<SSTemplate
<:ComponentUsingClassButNotPassedIn />
SSTemplate;
        $expectedHTML = <<<HTML
<div class=""></div>
HTML;
        $resultHTML = SSViewer::fromString($template)->process(null);
        $this->assertEqualIgnoringWhitespace($expectedHTML, $resultHTML, 'Unexpected output');
    }

    /**
     * If you don't pass a $class variable in, $class will end
     * up defaulting to 'SilbinaryWolf\Components\ComponentData' without
     * additional logic that prevents that (found in ComponentData class)
     *
     * This is most likely not necessary in SilverStripe 4.X, but it was
     * a necessary check in SilverStripe 3.X
     *
     */
    public function testCatchReservedProperty()
    {
        $template = <<<SSTemplate
<:EmptyComponent
    failover="This is reserved by Viewable Data!"
/>
SSTemplate;
        try {
            $resultHTML = SSViewer::fromString($template)->process(null);
        } catch (ComponentReservedPropertyException $e) {
            // Success path!
            $expectedMessage = 'You cannot use the property "failover" on "EmptyComponent" as it\'s already used by ViewableData.';
            $this->assertEquals(
                $expectedMessage,
                $e->getMessage(),
                'Unexpected exception message given. Was this changed? If so, please update the expected value above.'
            );
            return;
        } catch (Exception $e) {
            $this->fail('Incorrect Exception caught. Expected '.'\SilbinaryWolf\Components\ComponentReservedPropertyException'.' to be thrown.');
            return;
        }
        $this->fail('No exception thrown. Expected '.'\SilbinaryWolf\Components\ComponentReservedPropertyException'.' to be thrown.');
    }

    /**
     * SilverStripe 3.X problem only.
     */
    public function testEnsureFormMessageIsCastingCorrectly()
    {
        $template = <<<SSTemplate
<:MyFormMessageTest
    message="\$Field.Message"
/>
SSTemplate;
        $expectedHTML = <<<HTML
<div>The field "Name" is required.</div>
HTML;
        $formField = new TextField("Name", "Name");
        $formField->setError("The field \"Name\" is required.", "error");
        $resultHTML = SSViewer::fromString($template)->process(
            new ArrayData(
                array(
                'Field' => $formField,
                )
            )
        );
        $this->assertEqualIgnoringWhitespace(
            $expectedHTML,
            $resultHTML,
            'Unexpected output. If you got \'The field &quot;Name&quot; is required\', then this test is definitely broken.'
        );
    }

    /**
     * Test custom JSON syntax that allows arbitrary JSON.
     *
     */
    public function testJSONProperty()
    {
        $template = <<<SSTemplate
<:JSONSyntaxTest
    _json='{
        "Cards": [
            {
                "Title": "This is the first card",
                "Summary": "This is the first card summary",
                "Link": "https://link1.com"
            },
            {
                "Title": "This is the second card",
                "Summary": "This is the second card summary",
                "Link": "https://link2.com"
            }
        ]
    }'
/>
SSTemplate;
        $expectedHTML = <<<HTML
        <div>
            <h2>This is the first card</h2>
            <p>This is the first card summary</p>
            <a href="https://link1.com">Read more</a>
        </div>
        <div>
            <h2>This is the second card</h2>
            <p>This is the second card summary</p>
            <a href="https://link2.com">Read more</a>
        </div>
HTML;

        $resultHTML = SSViewer::fromString($template)->process(null);
        $this->assertEqualIgnoringWhitespace($expectedHTML, $resultHTML, 'Unexpected output');
    }

    /**
     * Test that the error message given when using JSON is useful when debugging.
     *
     */
    public function testJSONPropertyErrorHandling()
    {
        $template = <<<SSTemplate
<:JSONSyntaxTest
    _json='{
        "Cards": [
            {
                "Title": "This is the first card",
                "Summary": "This is the first card summary",
                "Link": "https://link1.com",
            },
            {
                "Title": "This is the second card",
                "Summary": "This is the second card summary",
                "Link": "https://link2.com"
            }
        ]
    }'
/>
SSTemplate;
        try {
            SSViewer::fromString($template)->process(null);
        } catch (SSTemplateParseException $e) {
            // Success path!
            $expectedMessage = 'Parse error in template on line 16. Error was: JSON Syntax error, did you quote all the property names and remove trailing commas? I suggest running the following through a JSON validator online.';
            $this->assertContains(
                $expectedMessage,
                $e->getMessage(),
                'Unexpected exception message given. Was this changed? If so, please update the expected value above.'
            );
            return;
        } catch (Exception $e) {
            $this->fail('Incorrect Exception caught. Expected '.SSTemplateParseException::class.' to be thrown.');
            return;
        }
    }

    /**
     * Taken from "framework\tests\view\SSViewerTest.php"
     */
    protected function assertEqualIgnoringWhitespace($a, $b, $message = '')
    {
        $this->assertEquals(preg_replace('/\s+/', '', $a), preg_replace('/\s+/', '', $b), $message);
    }
}
