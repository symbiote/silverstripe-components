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

## Configuration

Components are looked up from the {theme_dir}/templates/components path by
default. If you wish to further separate this location, you must let the
`ComponentService` know what these sub-paths are by setting the 
`component_paths` configuration option, for example

```

---
Name: component_overrides
---
Symbiote\Components\ComponentService:
  component_paths:
    - components/atoms
    - components/molecules
    - components/organisms

```
