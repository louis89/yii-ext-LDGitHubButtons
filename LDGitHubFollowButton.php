<?php
/**
 * LDGitHubFollowButton class file.
 *
 * @author Louis A. DaPrato <l.daprato@gmail.com>
 * @link https://lou-d.com
 * @copyright 2014 Louis A. DaPrato
 * @license The MIT License (MIT)
 * @since 1.0
 */

require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'LDGitHubButtonBase.php');

/**
 * GitHub Follow button
 * 
 * @author Louis A. DaPrato <l.daprato@gmail.com>
 *
 */
class LDGitHubFollowButton extends LDGitHubButtonBase
{
	
	/**
	 * @var string The class to use for the button
	 */
	public $buttonClass = 'github-me';

	/**
	 * The extension initialization
	 */
	public function init()
	{
		parent::init();
		if($this->text === null)
		{
			$this->text = Yii::t($this->tCategory, 'Follow @{user}', array('{user}' => $this->user));
		}
	}
	
	/**
	 * (non-PHPdoc)
	 * @see LDGitHubButtonBase::getButtonUrl()
	 */
	public function getButtonUrl()
	{
		return self::buildUrl($this->user);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see LDGitHubButtonBase::getCounterUrl()
	 */
	public function getCounterUrl()
	{
		return self::buildUrl($this->user, 'followers');
	}
	
	/**
	 * (non-PHPdoc)
	 * @see LDGitHubButtonBase::getApiUrl()
	 */
	public function getApiUrl()
	{
		return self::buildApiUrl('users', $this->user);
	}

	/**
	 * (non-PHPdoc)
	 * @see LDGitHubButtonBase::getDataPropName()
	 */
	public function getDataPropName()
	{
		return 'followers';
	}

}

?>