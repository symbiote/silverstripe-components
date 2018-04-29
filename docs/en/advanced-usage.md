# Running tests

Execute this from the project directory.

```
vendor/bin/phpunit components/tests
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
$_props['class'] = Injector::inst()->createWithArgs('SilbinaryWolf\Components\DBComponentField', array('class', $_props['class']));
$val .= Injector::inst()->get('SilbinaryWolf\Components\ComponentService')->renderComponent('FormTextInput', $_props, $scope);
unset($_props); 
$val .= '
';
```