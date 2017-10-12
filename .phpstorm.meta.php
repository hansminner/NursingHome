<?php
	namespace PHPSTORM_META {
	/** @noinspection PhpUnusedLocalVariableInspection */
	/** @noinspection PhpIllegalArrayKeyTypeInspection */
	$STATIC_METHOD_TYPES = [

		\D('') => [
			'Adv' instanceof Think\Model\AdvModel,
			'Mongo' instanceof Think\Model\MongoModel,
			'View' instanceof Think\Model\ViewModel,
			'Relation' instanceof Think\Model\RelationModel,
			'UserMgr' instanceof Home\Model\UserMgrModel,
			'Champion' instanceof Home\Model\ChampionModel,
			'DataMgrBase' instanceof Home\Model\DataMgrBaseModel,
			'Merge' instanceof Think\Model\MergeModel,
		],
	];
}