# Quick Start

1. Install via composer and run dev/build.

2. Create your first component.

>MyComponentButton.ss
```
<button class="$Class" type="<% if $Type %>$Type<% else %>button<% end_if %>">
	$Children
</button>
```

3. Call your component from your Page.ss template or similar.
```
<% component MyComponentButton, "Class=btn btn-secondary" %>
	<span class="text">
		Do something that isn't submitting!
	</span>
<% end_component %>

<% component MyComponentButton, "Class=btn btn-primary", "Type=submit" %>
	<span class="text">
		Submit me!
	</span>
<% end_component %>
```
