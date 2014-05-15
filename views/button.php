<?php 
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($assetsUrl.'/LDGitHubButtons.css');
?>
<span class="<?php echo $buttonClass; ?>" id="<?php echo $id; ?>">
	<a class="gh-btn" id="<?php echo $id; ?>-btn" href="<?php echo $buttonUrl; ?>" target="_blank"> 
		<span class="gh-ico" id="<?php echo $id; ?>-ico"></span> 
		<span class="gh-text" id="<?php echo $id; ?>-text"><?php echo $text; ?></span>
	</a>
	<?php 
	if(isset($counterUrl)): 
		$callback = crc32($id);
		$cs->registerScriptFile($apiUrl.'?callback=githubCallback_'.$callback, CClientScript::POS_END);
		$cs->registerScript(
				__CLASS__.'-'.$id,
				'function githubCallback_'.$callback.'(obj){'.
					'var counter = document.getElementById("'.$id.'-count");'.
					'counter.innerHTML = String(obj.data.'.$dataPropName.').replace(/(\d)(?=(\d{3})+$)/g, "$1,");'.
					'counter.style.display = "block";'.
				'};',
				CClientScript::POS_HEAD
		);
	?>
		<a class="gh-count" id="<?php echo $id; ?>-count" href="<?php echo $counterUrl; ?>" target="_blank"></a>
	<?php endif; ?>
</span>