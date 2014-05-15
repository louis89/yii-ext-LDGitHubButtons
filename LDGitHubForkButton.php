<?php

require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'LDGitHubButtonBase.php');

/**
 * 
 * @author Louis DaPrato <l.daprato@gmail.com>
 *
 */
class LDGitHubForkButton extends LDGitHubButtonBase
{
	
	/**
	 * @var string The name of the GitHub repository
	 */
	public $repo;
	
	/**
	 * @var string The class to use for the button
	 */
	public $buttonClass = 'github-forks';
	
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
			$this->text = Yii::t($this->tCategory, 'Fork');
		}
	}
	
	public function getButtonUrl()
	{
		return self::buildUrl($this->user, $this->repo);
	}
	
	public function getCounterUrl()
	{
		return self::buildUrl($this->user, $this->repo, 'network');
	}
	
	public function getApiUrl()
	{
		return self::buildApiUrl('repos', $this->user, $this->repo);
	}
	
	public function getDataPropName()
	{
		return 'forks';
	}

}

?>