# phpBB extension marttiphpbb Group Template Variables

[Topic on phpbb.com](https://www.phpbb.com/community/viewtopic.php?f=456&t=2325391)

The extension provide a template variable for every group the current user is in. They are all put under the template variable `marttiphpbb_grouptempvars`

I.e:

    {%- if marttiphpbb_grouptempvars.8 -%}
        This content is only visible when the user is in group with id 8.
    {%- endif -%}

In the previous version (for phpBB 3.1) this extension the variables were available in the form of:

    S_GROUP_<group_id>

This format is still available but depreciated.

This extension might be useful together with the [Custom Code](https://github.com/marttiphpbb/phpbb-ext-customcode) extension.

## Requirements

* phpBB 3.2.5+
* PHP 7.1+

## Quick Install

You can install this on the latest release of phpBB 3.1 by following the steps below:

* Create `marttiphpbb/grouptempvars` in the `ext` directory.
* Download and unpack the repository into `ext/marttiphpbb/grouptempvars`
* Enable `Group Template Variables` in the ACP at `Customise -> Manage extensions`.

## Uninstall

* Disable `Group Template Variables` in the ACP at `Customise -> Extension Management -> Extensions`.
* To permanently uninstall, click `Delete Data`.  Optionally delete the `/ext/marttiphpbb/grouptempvars` directory.

## Support

* Report bugs and other issues to the [Issue Tracker](https://github.com/marttiphpbb/phpbb-ext-grouptempvars/issues).

## License

[GPL-2.0](license.txt)
