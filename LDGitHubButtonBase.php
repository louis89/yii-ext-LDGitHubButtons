<?php
/**
 * LDGitHubButtonBase class file.
 *
 * @author Louis A. DaPrato <l.daprato@gmail.com>
 * @link https://lou-d.com
 * @copyright 2014 Louis A. DaPrato
 * @license The MIT License (MIT)
 * @since 1.0
 */

/**
 * Base class for GitHub buttons based on the "unofficial GitHub buttons" {@link https://github.com/mdo/github-buttons}
 * 
 * @author Louis A. DaPrato <l.daprato@gmail.com>
 *
 */
abstract class LDGitHubButtonBase extends CWidget
{
	
	const REQUEST_SCHEME = 'https://';
	
	const DOMAIN = 'github.com';
	
	const API_SUBDOMAIN = 'api';
	
	const PATH_SEPARATOR = '/';
	
	const ID = 'LDGitHubButtons';

	/**
	 * @var string category used when translating messages used by this widget
	 */
	public $tCategory = self::ID;
	
	/**
	 * @var string The name of the GitHub user
	 */
	public $user;
	
	/**
	 * @var boolean Whether to show a large or small button. Defaults to False.
	 */
	public $large = false;
	
	/**
	 * @var boolean Whether to show the count next to the button. Defaults to True.
	 */
	public $count = true;
	
	/**
	 * @var string The text content of the button. This will be generated automatically if it is not set before the widget is initialized.
	 */
	public $text;
	
	/**
	 * @var string The class to use for the button
	 */
	public $buttonClass;
	
	/**
	 * @var array additional configuration options for the asset publisher {@see LDPublishAssetsBehavior}
	 */
	public $publishAssetsConfig = array();
	
	/**
	 * @return string GitHub URL
	 */
	public static function buildUrl()
	{
		return self::REQUEST_SCHEME.self::DOMAIN.self::PATH_SEPARATOR.implode(self::PATH_SEPARATOR, func_get_args());
	}
	
	/**
	 * @return string GitHub API URL
	 */
	public static function buildApiUrl()
	{
		return self::REQUEST_SCHEME.self::API_SUBDOMAIN.'.'.self::DOMAIN.self::PATH_SEPARATOR.implode(self::PATH_SEPARATOR, func_get_args());
	}

	/**
	 * The extension initialization
	 */
	public function init()
	{
		if($this->user === null)
		{
			throw new CException(Yii::t($this->tCategory, 'The property "user" cannot be null.'));
		}
		$this->attachBehavior('LDPublishAssetsBehavior', array_merge(array('class' => 'ext.LDPublishAssetsBehavior.LDPublishAssetsBehavior', 'assetsDir' => dirname(__FILE__).DIRECTORY_SEPARATOR.'assets'), $this->publishAssetsConfig));
	}

	/**
	 * Render the button
	 */
	public function run()
	{
		$this->render(
				'button', 
				array(
					'id' => $this->getId(), 
					'buttonClass' => $this->buttonClass.($this->large ? ' github-btn-large' : ''),
					'text' => $this->text,
					'buttonUrl' => $this->getButtonUrl(),
					'counterUrl' => $this->count ? $this->getCounterUrl() : null,
					'apiUrl' => $this->getApiUrl(),
					'dataPropName' => $this->getDataPropName(),
					'assetsUrl' => $this->getAssetsUrl()
				)
		);
	}
	
	/**
	 * @return string The URL of the button
	 */
	public abstract function getButtonUrl();
	
	/**
	 * @return string The URL the count is retrieved from
	 */
	public abstract function getCounterUrl();

	/**
	 * @return string The URL to the GitHub API action associated with this button
	 */
	public abstract function getApiUrl();
	
	/**
	 * @return string The name of the data object property returned by the API
	 */
	public abstract function getDataPropName();
	
}

?>