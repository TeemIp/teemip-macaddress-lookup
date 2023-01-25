<?php
/*
 * @copyright   Copyright (C) 2021 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\MACAddressLookup\Service;

use Exception;
use MetaModel;
use utils;

class MacLookupReport
{
	const MACADDRESS_LOOKUP_MODULE_CODE = 'teemip-macaddress-lookup';
	const MACADDRESS_LOOKUP_FUNCTION_SETTING_BASE_URL = 'url';
	const DEFAULT_MACADDRESS_LOOKUP_FUNCTION_SETTING_BASE_URL = 'https://api.maclookup.app/v2/macs/%1$s';

	protected $sMacToQuery = '';
	protected $aResults = [];
	protected $sResponse = '';

	/**
	 * MacLookupReport constructor.
	 *
	 * @param $sMacAddress
	 */
	public function __construct($sMacAddress)
	{
		$this->sMacToQuery = $sMacAddress;

		// Query info to "MAC Address Lookup" site
		$sBaseUrl = MetaModel::GetModuleSetting(static::MACADDRESS_LOOKUP_MODULE_CODE, static::MACADDRESS_LOOKUP_FUNCTION_SETTING_BASE_URL, static::DEFAULT_MACADDRESS_LOOKUP_FUNCTION_SETTING_BASE_URL);
		$sURL = sprintf($sBaseUrl, urlencode($sMacAddress));
		$aEmpty = [];
		$aCurlOptions = array(CURLOPT_POSTFIELDS => "");
		try {
			$sResponse = utils::DoPostRequest($sURL, $aEmpty, '', $aEmpty, $aCurlOptions);
			$this->aResults = json_decode($sResponse, true);
		} catch (Exception $e) {
			$this->sResponse = $e->getMessage();
		}
	}

	/**
	 * @return array
	 */
	public function GetReport()
	{
		return array($this->aResults, $this->sResponse);
	}
}
