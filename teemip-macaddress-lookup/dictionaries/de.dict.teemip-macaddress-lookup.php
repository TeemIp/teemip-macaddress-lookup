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

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Menu:MACLookup' => 'MAC Lookup',
	'Menu:MACLookup+' => 'MAC-Adresse nachschlagen',

	'teemip-macaddress-lookup/Operation:MACAddressLookup/Title' => 'MAC-Adresse nachschlagen',
	'teemip-macaddress-lookup/Operation:DoMACAddressLookup/Title' => 'Ergebnis MAC-Adresse nachschlagen',
	'teemip-macaddress-lookup/Operation:MACAddressLookupFromCI/Title' => 'Ergebnis MAC-Adresse nachschlagen',

	'UI:MACLookup:Action:CI:Lookup' => 'MAC-Adresse nachschlagen',
	'UI:MACLookup:Action:CI:Details' => 'Details',
	'UI:MACLookup:Action:CI:NoMAC' => 'Das CI hat keine MAC-Adresse!',

	'UI:MACLookup:Action:Lookup:Title' => 'MAC-Adresse nachschlagen',
	'UI:MACLookup:Action:Lookup:Helper' => 'Adresse oder Präfix auswählen',
	'UI:MACLookup:Action:Lookup:SelectMACAddress' => 'MAC-Adresse',
	'UI:MACLookup:Action:Lookup:SelectMACPrefix' => 'MAC-Präfix',

	'UI:MacLookup:Action:DoLookup:CannotRun:EmptyMAC' => 'Keine MAC-Adresse oder Präfix eingegeben!',
	'UI:MACLookup:Action:DoLookup:HasError' => 'MAC nachschlagen ist fehlgeschlagen',
	'UI:MACLookup:Action:DoLookup:Result' => 'MAC-Adresse - Ergebnis',
	'UI:MACLookup:Action:DoLookup:Result:Attribute' => 'Eigenschaften',
	'UI:MACLookup:Action:DoLookup:Result:MACAddressTitle' => '%1$s',
	'UI:MACLookup:Action:DoLookup:Result:MACAddress' => 'MAC-Adresse',
	'UI:MACLookup:Action:DoLookup:Result:MACPrefixTitle' => 'Präfix %1$s',
	'UI:MACLookup:Action:DoLookup:Result:MACPrefix' => 'Präfix',
	'UI:MACLookup:Action:DoLookup:Result:Company' => 'Unternehmen',
	'UI:MACLookup:Action:DoLookup:Result:Address' => 'Adresse',
	'UI:MACLookup:Action:DoLookup:Result:Country' => 'Land',
	'UI:MACLookup:Action:DoLookup:Result:BlockStart' => 'Beginn des Blocks',
	'UI:MACLookup:Action:DoLookup:Result:BlockEnd' => 'Ende des Blocks',
	'UI:MACLookup:Action:DoLookup:Result:BlockSize' => 'Blockgröße',
	'UI:MACLookup:Action:DoLookup:Result:BlockType' => 'Blocktyp',
	'UI:MACLookup:Action:DoLookup:Result:Updated' => 'Letzte Aktualisierung',
	'UI:MACLookup:Action:DoLookup:Result:IsRand' => 'Zufällige MAC',
	'UI:MACLookup:Action:DoLookup:Result:IsPrivate' => 'Private MAC',
	'UI:MACLookup:Action:DoLookup:Result:NoMACAddressFound' => 'Für diese MAC-Adresse wurden keine Informationen gefunden',
	'UI:MACLookup:Action:DoLookup:Result:ErrorLookup' => 'Fehler beim nachschlagen',
	'UI:MACLookup:Action:DoLookup:Result:Error' => 'Fehler',
	'UI:MACLookup:Action:DoLookup:Result:ErrorCode' => 'Fehlercode',
	'UI:MACLookup:Action:DoLookup:Result:MoreInfo' => 'Mehr Informationen finden sich hier',
));
