<?php

require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'LDGitHubButtonBase.php');

/**
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
	
	public function getButtonUrl()
	{
		return self::buildUrl($this->user, $this->repo);
	}
	
	public function getCounterUrl()
	{
		return self::buildUrl($this->user, $this->repo, 'stargazers');
	}
	
	public function getApiUrl()
	{
		return self::buildApiUrl('repos', $this->user, $this->repo);
	}
	
	public function getDataPropName()
	{
		return 'watchers';
	}

}

?>