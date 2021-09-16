<?php
/*
 * @copyright   Copyright (C) 2021 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\MACAddressLookup;

use ContextTag;
use TeemIp\TeemIp\Extension\MACAddressLookup\Controller\MacLookupController;
use utils;

require_once(APPROOT.'application/startup.inc.php');
$oCtxMACLookup = new ContextTag(ContextTag::TAG_SETUP);

$oMacLookupController = new MacLookupController(MODULESROOT.'teemip-macaddress-lookup/templates', 'teemip-macaddress-lookup');
$oMacLookupController->SetDefaultOperation('MACAddressLookup');
$oMacLookupController->AddLinkedScript(utils::GetAbsoluteUrlModulesRoot().'teemip-macaddress-lookup/asset/js/teemip-macaddress-lookup.js');
$oMacLookupController->HandleOperation();

unset($oCtxMACLookup);
