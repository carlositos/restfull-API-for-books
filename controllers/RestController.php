<?php
	
namespace app\controllers;

use yii\rest\ActiveController;

class RestController extends ActiveController
{
	public $modelClass = '';
	
	public function behaviors()
	{
		return [
			[
				'class' => \yii\filters\ContentNegotiator::className(),
				'only' => ['index', 'view'],
				'formats' => [
					'application/json' => \yii\web\Response::FORMAT_JSON,
				],
			],
		];
	}
	
}
