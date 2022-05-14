var mzOptions = {};
mzOptions = {
	onZoomReady: function () {
		console.log('onReady', arguments[0]);
	},
	onUpdate: function () {
		console.log('onUpdated', arguments[0], arguments[1], arguments[2]);
	},
	onZoomIn: function () {
		console.log('onZoomIn', arguments[0]);
	},
	onZoomOut: function () {
		console.log('onZoomOut', arguments[0]);
	},
	onExpandOpen: function () {
		console.log('onExpandOpen', arguments[0]);
	},
	onExpandClose: function () {
		console.log('onExpandClosed', arguments[0]);
	}
};
var mzMobileOptions = {};

function isDefaultOption(o) {
	return magicJS.$A(magicJS.$(o).byTag('option')).filter(function (opt) {
		return opt.selected && opt.defaultSelected;
	}).length > 0;
}

function toOptionValue(v) {
	if (/^(true|false)$/.test(v)) {
		return 'true' === v;
	}
	if (/^[0-9]{1,}$/i.test(v)) {
		return parseInt(v, 10);
	}
	return v;
}

function makeOptions(optType) {
	var value = null,
		isDefault = true,
		newParams = Array(),
		newParamsS = '',
		options = {};
	magicJS.$(magicJS.$A(magicJS.$(optType).getElementsByTagName("INPUT"))
		.concat(magicJS.$A(magicJS.$(optType).getElementsByTagName('SELECT'))))
		.forEach(function (param) {
			value = ('checkbox' == param.type) ? param.checked.toString() : param.value;

			isDefault = ('checkbox' == param.type) ? value == param.defaultChecked.toString() :
				('SELECT' == param.tagName) ? isDefaultOption(param) : value == param.defaultValue;

			if (null !== value && !isDefault) {
				options[param.name] = toOptionValue(value);
			}
		});
	return options;
}

function updateScriptCode() {
	var code = '&lt;script&gt;\nvar mzOptions = ';
	code += JSON.stringify(mzOptions, null, 2).replace(/\"(\w+)\":/g, "$1:") + ';';
	code += '\n&lt;/script&gt;';

	magicJS.$('app-code-sample-script').changeContent(code);
}

function updateInlineCode() {
	var code = '&lt;a class="MagicZoom" data-options="';
	code += JSON.stringify(mzOptions).replace(/\"(\w+)\":(?:\"([^"]+)\"|([^,}]+))(,)?/g, "$1: $2$3; ").replace(
		/\{([^{}]*)\}/, "$1").replace(/\s*$/, '');
	code += '"&gt;';

	magicJS.$('app-code-sample-inline').changeContent(code);
}

function applySettings() {
	MagicZoom.stop('Zoom-1');
	mzOptions = makeOptions('params');
	mzMobileOptions = makeOptions('mobile-params');
	MagicZoom.start('Zoom-1');
	updateScriptCode();
	updateInlineCode();
	try {
		prettyPrint();
	} catch (e) { }
}

function copyToClipboard(src) {
	var
		copyNode,
		range, success;

	if (!isCopySupported()) {
		disableCopy();
		return;
	}
	copyNode = document.getElementById('code-to-copy');
	copyNode.innerHTML = document.getElementById(src).innerHTML;

	range = document.createRange();
	range.selectNode(copyNode);
	window.getSelection().addRange(range);

	try {
		success = document.execCommand('copy');
	} catch (err) {
		success = false;
	}
	window.getSelection().removeAllRanges();
	if (!success) {
		disableCopy();
	} else {
		new magicJS.Message('Settings code copied to clipboard.', 3000,
			document.querySelector('.app-code-holder'), 'copy-msg');
	}
}

function disableCopy() {
	magicJS.$A(document.querySelectorAll('.cfg-btn-copy')).forEach(function (node) {
		node.disabled = true;
	});
	new magicJS.Message('Sorry, cannot copy settings code to clipboard. Please select and copy code manually.', 3000,
		document.querySelector('.app-code-holder'), 'copy-msg copy-msg-failed');
}

function isCopySupported() {
	if (!window.getSelection || !document.createRange || !document.queryCommandSupported) {
		return false;
	}
	return document.queryCommandSupported('copy');
}