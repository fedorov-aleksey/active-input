<?php

namespace fav/packages/activeField;

use yii\web\AssetBundle;

class ActiveFieldAsset extends AssetBundle
{
	public $sourcePath = __DIR__;
	public $css = [];
	
	public $js = [];
	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapAsset',
	];
}
