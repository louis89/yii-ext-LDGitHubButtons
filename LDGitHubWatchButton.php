<?php
/**
 * LDGitHubWatchButton class file.
 *
 * @author Louis A. DaPrato <l.daprato@gmail.com>
 * @link https://lou-d.com
 * @copyright 2014 Louis A. DaPrato
 * @license The MIT License (MIT)
 * @since 1.0
 */

require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'LDGitHubButtonBase.php');

/**
 * GitHub watch button
 * 
 * @author Louis A. DaPrato <l.daprato@gmail.com>
 *
 */
class LDGitHubWatchButton extends LDGitHubButtonBase
{
	
	/**
	 * @var string The name of the GitHub repository
	 */
	public $repo;
	
	/**
	 * @var string The class to use for the button
	 */
	public $buttonClass = 'github-watchers';

	/**
	 * The extension initialization
	 */
	public function init()
	{
		if($this->repo === null)
		{
			throw new CException(Yii::t($this->tCategory, 'The property "repo" cannot be null.'));
		}
		parent::init();
		if($this->text === null)
		{
			$this->text = Yii::t($this->tCategory, 'Watch');
		}
	}
	
	/**
	 * (non-PHPdoc)
	 * @see LDGitHubButtonBase::getButtonUrl()
	 */
	public function getButtonUrl()
	{
		return self::buildUrl($this->user, $this->repo);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see LDGitHubButtonBase::getCounterUrl()
	 */
	public function getCounterUrl()
	{
		return self::buildUrl($this->user, $this->repo, 'stargazers');
	}
	
	/**
	 * (non-PHPdoc)
	 * @see LDGitHubButtonBase::getApiUrl()
	 */
	public function getApiUrl()
	{
		return self::buildApiUrl('repos', $this->user, $this->repo);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see LDGitHubButtonBase::getDataPropName()
	 */
	public function getDataPropName()
	{
		return 'watchers';
	}

}

?>