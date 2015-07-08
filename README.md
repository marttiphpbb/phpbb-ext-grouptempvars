### phpBB 3.1 PhpBB Extension - marttiphpbb Group Template Variables

This simple extension adds a Template variable for each group the user is in. So you can do conditional checks like this:

    <!-- IF S_GROUP_8 --> Content only visible if your in group with id 8 <!-- ENDIF -->

This extension might be useful together with the [Custom Code](https://github.com/marttiphpbb/phpbb-ext-customcode) extension.

#### Quick Install

You can install this on the latest release of phpBB 3.1 by following the steps below:

* Create `marttiphpbb/grouptempvars` in the `ext` directory.
* Download and unpack the repository into `ext/marttiphpbb/grouptempvars`
* Enable `Group Template Variables` in the ACP at `Customise -> Manage extensions`.

#### Uninstall

* Disable `Group Template Variables` in the ACP at `Customise -> Extension Management -> Extensions`.
* To permanently uninstall, click `Delete Data`.  Optionally delete the `/ext/marttiphpbb/grouptempvars` directory.

#### Support

* **Important: Only official release versions validated by the phpBB Extensions Team should be installed on a live forum. Pre-release (beta, RC) versions downloaded from this repository are only to be used for testing on offline/development forums and are not officially supported.**
* Report bugs and other issues to the [Issue Tracker](https://github.com/marttiphpbb/phpbb-ext-grouptempvars/issues).
* Support requests should be posted and discussed in the [Group Template Variables topic at phpBB.com](https://www.phpbb.com/community/viewtopic.php?f=456&t=2325391).

#### License

[GPL-2.0](license.txt)
