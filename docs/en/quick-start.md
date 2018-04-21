# Quick Start

1. Install via composer and run dev/build.

2. Create your first component.

>MyComponentButton.ss
```
<button class="$class" type="<% if $type %>$type<% else %>button<% end_if %>">
    $children
</button>
```

3. Call your component from your Page.ss template or similar.
```
<:MyComponentButton class="btn btn-secondary">
    <span class="text">
		Do something that isn't submitting!
	</span>
</:MyComponentButton>

<:MyComponentButton class="btn btn-secondary"
	type="submit"
>
    <span class="text">
		Submit me!
	</span>
</:MyComponentButton>
```