GitHub buttons for Yii
=============================
based on [unofficial GitHub buttons](https://github.com/mdo/github-buttons)

Unlike the original unofficial GitHub buttons this widget has no third party dependencies. These buttons do not rely on the use of iframes hosted by [ghbtns](http://ghbtns.com/). All necesssary components are packaged into this widget and will be served solely by your site. These buttons are also multilungual and more customizable.

REQUIREMENTS
------------

- Yii 1.0 or above
- LDPublishAssetsBehavior

INSTALLATION
------------

Simply unzip, clone, or add this repository as a submodule into your Yii application's extensions subdirectory.

QUICK START
-----------

There are 3 buttons included with this widget. Follow, Watch, and Fork. Each button includes an optional count window.
Following are examples of minimal configuration settings for each button type. There are many additional configuration settings, please see the internal documentation for details.

It is assumed "$this" refers to an instance of CBaseController and "ext" is the base path alias where this widget is installed.

## Follow

	$this->widget('ext.LDGitHubButtons.LDGitHubFollowButton', array('user' => 'username'));

## Watch

	$this->widget('ext.LDGitHubButtons.LDGitHubWatchButton', array('user' => 'username', 'repo' => 'repositoryname'));

## Fork

	$this->widget('ext.LDGitHubButtons.LDGitHubForkButton', array('user' => 'username', 'repo' => 'repositoryname'));
