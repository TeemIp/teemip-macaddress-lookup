<?php
/*
 * @copyright   Copyright (C) 2021 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

//////////////////////////////////////////////////////////////////////
// Classes and menus defined in teemip-macaddress-lookup extension
//////////////////////////////////////////////////////////////////////
//

//
// MC Lookup attributes
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'Menu:MACLookup' => 'MAC地址查询',
	'Menu:MACLookup+' => 'MAC地址查询',

	'teemip-macaddress-lookup/Operation:MACAddressLookup/Title' => 'MAC地址查询',
	'teemip-macaddress-lookup/Operation:DoMACAddressLookup/Title' => 'MAC地址查询输出',
	'teemip-macaddress-lookup/Operation:MACAddressLookupFromCI/Title' => 'MAC地址查询输出',

	'UI:MACLookup:Action:CI:Lookup' => 'MAC地址查询',
	'UI:MACLookup:Action:CI:Details' => '详情',
	'UI:MACLookup:Action:CI:NoMAC' => '配置项没有任何MAC地址属性，或者所有MAC地址属性均为空！',

	'UI:MACLookup:Action:Lookup:Title' => 'MAC地址查询',
	'UI:MACLookup:Action:Lookup:Helper' => '选择地址或前缀',
	'UI:MACLookup:Action:Lookup:SelectMACAddress' => 'MAC地址',
	'UI:MACLookup:Action:Lookup:SelectMACPrefix' => 'MAC前缀',

	'UI:MacLookup:Action:DoLookup:CannotRun:EmptyMAC' => '未输入MAC地址或前缀！',
	'UI:MACLookup:Action:DoLookup:HasError' => 'MAC地址查询失败',
	'UI:MACLookup:Action:DoLookup:Result' => 'MAC地址 - 查询输出',
	'UI:MACLookup:Action:DoLookup:Result:Attribute' => '属性',
	'UI:MACLookup:Action:DoLookup:Result:MACAddressTitle' => '%1$s',
	'UI:MACLookup:Action:DoLookup:Result:MACAddress' => 'MAC地址',
	'UI:MACLookup:Action:DoLookup:Result:MACPrefixTitle' => '前缀 %1$s',
	'UI:MACLookup:Action:DoLookup:Result:MACPrefix' => '前缀',
	'UI:MACLookup:Action:DoLookup:Result:Company' => '公司',
	'UI:MACLookup:Action:DoLookup:Result:Address' => '地址',
	'UI:MACLookup:Action:DoLookup:Result:Country' => '国家',
	'UI:MACLookup:Action:DoLookup:Result:BlockStart' => '起始区块',
	'UI:MACLookup:Action:DoLookup:Result:BlockEnd' => '结束区块',
	'UI:MACLookup:Action:DoLookup:Result:BlockSize' => '区块大小',
	'UI:MACLookup:Action:DoLookup:Result:BlockType' => '区块类型',
	'UI:MACLookup:Action:DoLookup:Result:Updated' => '最后更新',
	'UI:MACLookup:Action:DoLookup:Result:IsRand' => '随机MAC',
	'UI:MACLookup:Action:DoLookup:Result:IsPrivate' => '私有MAC',
	'UI:MACLookup:Action:DoLookup:Result:NoMACAddressFound' => '未找到此MAC地址的任何信息',
	'UI:MACLookup:Action:DoLookup:Result:ErrorLookup' => '查询错误',
	'UI:MACLookup:Action:DoLookup:Result:Error' => '错误',
	'UI:MACLookup:Action:DoLookup:Result:ErrorCode' => '错误代码',
	'UI:MACLookup:Action:DoLookup:Result:MoreInfo' => '更多信息请参阅',
));

