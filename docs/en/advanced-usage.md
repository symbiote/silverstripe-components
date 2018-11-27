# Running tests

Execute this from the project directory.

```
vendor/bin/phpunit components/tests
```

# Feed in JSON data

With this module, you're able to feed in arbitrary JSON data using the special \_json property.
This is useful for when you want to mockup examples of a component using deeply nested data.

This JSON cannot utilize variables or if-statements within it like other properties as the JSON is parsed and converted to an ArrayList when generating the template PHP code. (See below)

Examples are below.

**components/JSONSyntaxTest.ss**
```
<% loop $Cards %>
    <div>
        <h2>$Title</h2>
        <p>$Summary</p>
        <a href="$Link">Read more</a>
    </div>
<% end_loop %>
```

**Page.ss**
```
<header class="header">
    My Header
</header>
<main role="main">
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
</main>
```

# Example template cache output

Here is an example of how this component template extension gets translated into the cached SilverStripe template files.

**SilverStripe Template:**
```
<:FormTextInput class="<% if $getAttribute("class") %>$getAttribute('class')<% end_if %> test" />
```

**Output:**
NOTE: We store each "part" passed in to a parameter seperately so that we can retain how the data should be cast when the value
is output as a string. This is necessary in SilverStripe 4 to ensure passing 'getAttributesHTML' (or any other HTMLText object) will work as expected.
```
<?php

$val .= '
';

$_props = array();
$_props['class'] = array();
if ($scope->locally()->hasValue('getAttribute', array('class'), true)) { 
$_props['class'][] = $scope->locally()->obj('getAttribute', array('class'), true)->self();

}
$_props['class'][] = ' test';
$_props['class'] = Injector::inst()->createWithArgs('Symbiote\Components\DBComponentField', array('class', $_props['class']));
$val .= Injector::inst()->get('Symbiote\Components\ComponentService')->renderComponent('FormTextInput', $_props, $scope);
unset($_props); 
$val .= '
';
```

**JSON Output:**
```
$_props = array();
$_props['Cards'] = array();
$_props['Cards'][] = new SilverStripe\ORM\ArrayList(array (
  0 => 
  array (
    'Title' => 'This is the first card',
    'Summary' => 'This is the first card summary',
    'Link' => 'https://link1.com',
  ),
  1 => 
  array (
    'Title' => 'This is the second card',
    'Summary' => 'This is the second card summary',
    'Link' => 'https://link2.com',
  ),
));
$_props['Cards'] = \SilverStripe\Core\Injector\Injector::inst()->get(Symbiote\Components\ComponentService::class)->createProperty('Cards', $_props['Cards']);
$val .= \SilverStripe\Core\Injector\Injector::inst()->get(Symbiote\Components\ComponentService::class)->renderComponent('JSONSyntaxTest', $_props, $scope);
```
