# Running tests

Execute this from the project directory.

```
vendor/bin/phpunit components/tests
```

# Example template cache output

Here is an example of how this component template extension gets translated into the cached SilverStripe template files.

**SilverStripe Template:**
```
<:Button class="add-another-class!">
	<% if $Title %>
		$Title
	<% else %>
		<div>Content</div>
	<% end_if %>
</:Button>
```

**Output:**
```
$_props = array();
$_props['class'] = '';
$_props['class'] .= 'add-another-class!';
$_props['children'] = '';
$_props['children'] .= '
		';

if ($scope->locally()->hasValue('Title', null, true)) { 
$_props['children'] .= '
			';

$_props['children'] .= $scope->locally()->XML_val('Title', null, true);
$_props['children'] .= '
		';


}else { 
$_props['children'] .= '
			<div>Content</div>
		';


}
$_props['children'] .= '
	';

$_props['children'] = DBField::create_field('HTMLText', $_props['children']);
$val .= Injector::inst()->get('SilbinaryWolf\Components\ComponentService')->renderComponent('Button', $_props, $scope);
unset($_props);
```