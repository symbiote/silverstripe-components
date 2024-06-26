# Components

[![Build Status](https://travis-ci.org/symbiote/silverstripe-components.svg?branch=master)](https://travis-ci.org/symbiote/silverstripe-components)
[![Latest Stable Version](https://poser.pugx.org/symbiote/silverstripe-components/version.svg)](https://github.com/symbiote/silverstripe-components/releases)
[![Latest Unstable Version](https://poser.pugx.org/symbiote/silverstripe-components/v/unstable.svg)](https://packagist.org/packages/symbiote/silverstripe-components)
[![Total Downloads](https://poser.pugx.org/symbiote/silverstripe-components/downloads.svg)](https://packagist.org/packages/symbiote/silverstripe-components)
[![License](https://poser.pugx.org/symbiote/silverstripe-components/license.svg)](https://github.com/symbiote/silverstripe-components/blob/master/LICENSE.md)

This module allows you to use special <:TemplateName> syntax to include templates. This allows you to pass inner HTML into a template, much like you can do in React with the children properties. Using the <:TemplateName> syntax will not automatically pass variables in the current scope like <% include %>.

```
<:MyButtonTemplate 
  icon="fa fa-icon"
  title="$Title"
>
    <span class="text">
        Look at me! Passing HTML in here!
    </span>
</:MyButtonTemplate>
```

```
<:SelfClosingTag passvariable="hey" />
```

## Composer Install

```
composer require symbiote/silverstripe-components
```

## Requirements

* SilverStripe ^5

## Documentation

* [Quick Start](docs/en/quick-start.md)
* [Advanced Usage](docs/en/advanced-usage.md)
* [License](LICENSE.md)
* [Contributing](CONTRIBUTING.md)

## Credits

* [Cam Spiers](https://github.com/camspiers) for his [SilverStripe Compose Parser module](https://github.com/heyday/silverstripe-composeparser/). This utilizes and builds upon his work from half a decade ago!
