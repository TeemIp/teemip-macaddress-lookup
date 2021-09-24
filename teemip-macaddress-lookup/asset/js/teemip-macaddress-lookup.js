/*
 * @copyright   Copyright (C) 2021 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

/* This is a workaround to load the following dictionary entries in the page.
 *  These are normally loaded trough a $oPage->add_dict_entry() in cmdbabstract class
 */
var aTeemIpDictEntries = {
	"UI:ValueInvalidFormat": "Invalid format",
	"UI:ValueMustBeSet": "Please specify a value",
	"UI:ValueMustBeChanged": "Please change the value"
};

if ((typeof Dict != "undefined") && (typeof Dict._entries != "undefined")) {
	$.extend(Dict._entries, aTeemIpDictEntries);
}
