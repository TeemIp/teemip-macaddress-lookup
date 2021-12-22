<?php
/*
 * @copyright   Copyright (C) 2021 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\MACAddressLookup\Controller;

use ApplicationException;
use AttributeMacAddress;
use Combodo\iTop\Application\TwigBase\Controller\Controller;
use Dict;
use Exception;
use MetaModel;
use TeemIp\TeemIp\Extension\MACAddressLookup\Service\MacLookupReport;
use utils;

class MacLookupController extends Controller {
	/**
	 * @return array
	 * @throws \Exception
	 */
	private function GetActionFieldsForOperation() {
		$aParams = array();

		$iFormId = rand();
		$sHelpText = '';
		$sDisplayValueForHtml = utils::EscapeHtml('');

		// MAC Address
		$sAttCode = 'macaddress';
		$sAttLabel = Dict::S('UI:MACLookup:Action:Lookup:SelectMACAddress');
		$sInputId = $iFormId.'_'.$sAttCode;
		$oAttDef = MetaModel::GetAttributeDef('IPInterface', $sAttCode);
		$iFieldSize = $oAttDef->GetMaxSize();
		$sPattern = addslashes($oAttDef->GetValidationPattern()); //'^([0-9]+)$';
		$sValidationSpan = "<span class=\"form_validation ibo-field-validation\" id=\"v_$sInputId\"></span>";
		$sReloadSpan = "<span class=\"field_status\" id=\"fstatus_$sInputId\"></span>";
		$sHTMLValue = <<<HTML
<div class="field_input_zone ibo-input-wrapper ibo-input-string-wrapper" data-validation="untouched">
	<input class="ibo-input ibo-input-string" title="$sHelpText" type="text" maxlength="$iFieldSize" name="attr_$sAttCode" value="$sDisplayValueForHtml" id="$sInputId" />
</div>
$sValidationSpan$sReloadSpan
HTML;
		$sHTMLValue = "<div id=\"field_$sInputId\" class=\"field_value_container\"><div class=\"attribute-edit\" data-attcode=\"$sAttCode\">$sHTMLValue</div></div>";
		$val = array(
			'label' => '<span  >'.$sAttLabel.'</span>',
			'value' => $sHTMLValue,
			'input_id' => $sInputId,
			'pattern' => $sPattern,
		);
		$aParams['aAddressVal'] = $val;

		// MAC Prefix
		$sAttCode = 'macprefix';
		$sAttLabel = Dict::S('UI:MACLookup:Action:Lookup:SelectMACPrefix');
		$sInputId = $iFormId.'_'.$sAttCode;
		$iFieldSize = 17;
		$sPattern = addslashes('^(\d|([a-f]|[A-F])){6}$'); //'^([0-9]+)$';
		$sValidationSpan = "<span class=\"form_validation ibo-field-validation\" id=\"v_$sInputId\"></span>";
		$sReloadSpan = "<span class=\"field_status\" id=\"fstatus_$sInputId\"></span>";
		$sHTMLValue = <<<HTML
<div class="field_input_zone ibo-input-wrapper ibo-input-string-wrapper" data-validation="untouched">
	<input class="ibo-input ibo-input-string" title="$sHelpText" type="text" maxlength="$iFieldSize" name="attr_$sAttCode" value="$sDisplayValueForHtml" id="$sInputId" />
</div>
$sValidationSpan$sReloadSpan
HTML;
		$sHTMLValue = "<div id=\"field_$sInputId\" class=\"field_value_container\"><div class=\"attribute-edit\" data-attcode=\"$sAttCode\">$sHTMLValue</div></div>";
		$val = array(
			'label' => '<span  >'.$sAttLabel.'</span>',
			'value' => $sHTMLValue,
			'input_id' => $sInputId,
			'pattern' => $sPattern,
		);
		$aParams['aPrefixVal'] = $val;

		return $aParams;
	}

	/**
	 * @throws \Exception
	 */
	public function OperationMACAddressLookup() {
		$aParams = array();
		$sTransactionId = utils::GetNewTransactionId();
		$aParams['sTransactionId'] = $sTransactionId;

//		$sClassIconUrl = MetaModel::GetClassIcon('IPv4Address', false);
//		$aParams['sClassIconUrl'] = $sClassIconUrl;

		$aActionFields = $this->GetActionFieldsForOperation();
		$aParams = array_merge($aParams, $aActionFields);

		$this->DisplayPage($aParams);
	}

	/**
	 * @throws \Exception
	 */
	public function OperationDoMACAddressLookup() {
		$sTransactionId = utils::ReadPostedParam('transaction_id', '', 'transaction_id');
		if (!utils::IsTransactionValid($sTransactionId)) {
			throw new Exception(Dict::S('iTopUpdate:Error:InvalidToken'));
		}

		$aParams = array();
		$sTransactionId = utils::GetNewTransactionId();
		$aParams['sTransactionId'] = $sTransactionId;

		// Check calculator inputs
		$sMacAddress = utils::ReadPostedParam('attr_macaddress', '', 'raw_data');
		$sMacPrefix = utils::ReadPostedParam('attr_macprefix', '', 'raw_data');
		if (($sMacAddress == '') && ($sMacPrefix == '')) {
			// Found issues. Explain and give the user another chance
			$aParams['bIssue'] = true;
			$aParams['sMessage'] = Dict::S('UI:MacLookup:Action:DoLookup:CannotRun:EmptyMAC');
			$aActionFields = $this->GetActionFieldsForOperation();
			$aParams = array_merge($aParams, $aActionFields);
		} else {
			$aParams['bIssue'] = false;

			// Run lookup and display result
			$aMACResults = array();
			if ($sMacAddress != '') {
				$sMacToQuery = $sMacAddress;
				$sMACReportTitle = Dict::Format('UI:MACLookup:Action:DoLookup:Result:MACAddressTitle', $sMacAddress);
				$aMACResults['bMACAddress'] = true;
			} else {
				$sMacToQuery = $sMacPrefix;
				$sMACReportTitle = Dict::Format('UI:MACLookup:Action:DoLookup:Result:MACPrefixTitle', $sMacPrefix);
				$aMACResults['bMACAddress'] = false;
			}
			$aMACResults['sMACReportTitle'] = $sMACReportTitle;

			$oMacLookupReport = new MacLookupReport($sMacToQuery);
			list($aReport, $sResponse) = $oMacLookupReport->GetReport();
			$aMACResults['aMACReport'] = $aReport;
			$aMACResults['sResponse'] = $sResponse;
			$aParams['aResults'] = array($sMacToQuery => $aMACResults);
		}

		$this->DisplayPage($aParams);
	}

	/**
	 * @throws \ApplicationException
	 * @throws \ArchivedObjectException
	 * @throws \CoreException
	 */
	public function OperationMACAddressLookupFromCI() {
		$sClass = utils::ReadParam('class', '', false, 'class');
		$id = utils::ReadParam('id');

		// Check if right parameters have been given
		if (empty($sClass) || empty($id)) {
			throw new ApplicationException(Dict::Format('UI:Error:2ParametersMissing', 'class', 'id'));
		}
		if (!MetaModel::IsSameFamilyBranch($sClass, 'IPInterface') && !MetaModel::IsSameFamilyBranch($sClass, 'PhysicalDevice')) {
			throw new ApplicationException(Dict::Format('UI:Error:WrongActionForClass', 'MACAddressLookupFromCI', $sClass));
		}

		// Check if the object exists
		$oObj = MetaModel::GetObject($sClass, $id, false /* MustBeFound */);
		if (is_null($oObj)) {
			throw new Exception(Dict::S('UI:ObjectDoesNotExist'));
		} else {
			// Run lookup(s) and display result(s)
			$aParams = array();
			$aParams['sClass'] = $sClass;
			$aParams['oObj'] = $oObj;
			$bHasMacAddressAttribute = false;
			foreach (MetaModel::ListAttributeDefs($sClass) as $sAttCode => $oAttDef) {
				if ($oAttDef instanceof AttributeMacAddress) {
					$sMacAddress = $oObj->Get($sAttCode);
					if ($sMacAddress != '') {
						$bHasMacAddressAttribute = true;
						$aMACResults = array();
						$aMACResults['sMACReportTitle'] = Dict::Format('UI:MACLookup:Action:DoLookup:Result:MACAddressTitle', $sMacAddress);
						$oMacLookupReport = new MacLookupReport($sMacAddress);
						list($aReport, $sResponse) = $oMacLookupReport->GetReport();
						$aMACResults['aMACReport'] = $aReport;
						$aMACResults['sResponse'] = $sResponse;
						$aParams['aResults'][$sMacAddress] = $aMACResults;
					}
				}
			}
			if (!$bHasMacAddressAttribute) {
				$aParams['bIssue'] = true;
				$aParams['sMessage'] = Dict::S('UI:MACLookup:Action:CI:NoMAC');
			} else {
				$aParams['bIssue'] = false;
			}

			$this->DisplayPage($aParams);
		}
	}
}
