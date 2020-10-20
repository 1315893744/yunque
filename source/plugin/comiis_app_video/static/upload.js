/**
 * comiis_SWFUpload: http://www.comiis_SWFUpload.org, http://comiis_SWFUpload.googlecode.com
 *
 * mmcomiis_SWFUpload 1.0: Flash upload dialog - http://profandesign.se/comiis_SWFUpload/,  http://www.vinterwebb.se/
 *
 * comiis_SWFUpload is (c) 2006-2007 Lars Huring, Olov Nilz and Mammon Media and is released under the MIT License:
 * http://www.opensource.org/licenses/mit-license.php
 *
 * comiis_SWFUpload 2 is (c) 2007-2008 Jake Roberts and is released under the MIT License:
 * http://www.opensource.org/licenses/mit-license.php
 *
 */


/* ******************* */
/* Constructor & Init  */
/* ******************* */
var comiis_SWFUpload;

if (comiis_SWFUpload == undefined) {
	comiis_SWFUpload = function (settings) {
		this.initcomiis_SWFUpload(settings);
	};
}

comiis_SWFUpload.prototype.initcomiis_SWFUpload = function (settings) {
	try {
		this.customSettings = {};	// A container where developers can place their own settings associated with this instance.
		this.settings = settings;
		this.eventQueue = [];
		this.movieName = "comiis_SWFUpload_" + comiis_SWFUpload.movieCount++;
		this.movieElement = null;


		// Setup global control tracking
		comiis_SWFUpload.instances[this.movieName] = this;

		// Load the settings.  Load the Flash movie.
		this.initSettings();
		this.loadFlash();
		this.displayDebugInfo();
	} catch (ex) {
		delete comiis_SWFUpload.instances[this.movieName];
		throw ex;
	}
};

/* *************** */
/* Static Members  */
/* *************** */
comiis_SWFUpload.instances = {};
comiis_SWFUpload.movieCount = 0;
comiis_SWFUpload.version = "2.2.0 2009-03-25";
comiis_SWFUpload.QUEUE_ERROR = {
	QUEUE_LIMIT_EXCEEDED	  		: -100,
	FILE_EXCEEDS_SIZE_LIMIT  		: -110,
	ZERO_BYTE_FILE			  		: -120,
	INVALID_FILETYPE		  		: -130
};
comiis_SWFUpload.UPLOAD_ERROR = {
	HTTP_ERROR				  		: -200,
	MISSING_UPLOAD_URL	      		: -210,
	IO_ERROR				  		: -220,
	SECURITY_ERROR			  		: -230,
	UPLOAD_LIMIT_EXCEEDED	  		: -240,
	UPLOAD_FAILED			  		: -250,
	SPECIFIED_FILE_ID_NOT_FOUND		: -260,
	FILE_VALIDATION_FAILED	  		: -270,
	FILE_CANCELLED			  		: -280,
	UPLOAD_STOPPED					: -290
};
comiis_SWFUpload.FILE_STATUS = {
	QUEUED		 : -1,
	IN_PROGRESS	 : -2,
	ERROR		 : -3,
	COMPLETE	 : -4,
	CANCELLED	 : -5
};
comiis_SWFUpload.BUTTON_ACTION = {
	SELECT_FILE  : -100,
	SELECT_FILES : -110,
	START_UPLOAD : -120
};
comiis_SWFUpload.CURSOR = {
	ARROW : -1,
	HAND : -2
};
comiis_SWFUpload.WINDOW_MODE = {
	WINDOW : "window",
	TRANSPARENT : "transparent",
	OPAQUE : "opaque"
};

// Private: takes a URL, determines if it is relative and converts to an absolute URL
// using the current site. Only processes the URL if it can, otherwise returns the URL untouched
comiis_SWFUpload.completeURL = function(url) {
	if (typeof(url) !== "string" || url.match(/^https?:\/\//i) || url.match(/^\//)) {
		return url;
	}
	
	var currentURL = window.location.protocol + "//" + window.location.hostname + (window.location.port ? ":" + window.location.port : "");
	
	var indexSlash = window.location.pathname.lastIndexOf("/");
	if (indexSlash <= 0) {
		path = "/";
	} else {
		path = window.location.pathname.substr(0, indexSlash) + "/";
	}
	
	return /*currentURL +*/ path + url;
	
};


/* ******************** */
/* Instance Members  */
/* ******************** */

// Private: initSettings ensures that all the
// settings are set, getting a default value if one was not assigned.
comiis_SWFUpload.prototype.initSettings = function () {
	this.ensureDefault = function (settingName, defaultValue) {
		this.settings[settingName] = (this.settings[settingName] == undefined) ? defaultValue : this.settings[settingName];
	};
	
	// Upload backend settings
	this.ensureDefault("upload_url", "");
	this.ensureDefault("preserve_relative_urls", false);
	this.ensureDefault("file_post_name", "new_Filedata");
	this.ensureDefault("post_params", {});
	this.ensureDefault("use_query_string", false);
	this.ensureDefault("requeue_on_error", false);
	this.ensureDefault("http_success", []);
	this.ensureDefault("assume_success_timeout", 0);
	
	// File Settings
	this.ensureDefault("file_types", "*.*");
	this.ensureDefault("file_types_description", "All Files");
	this.ensureDefault("file_size_limit", 0);	// Default zero means "unlimited"
	this.ensureDefault("file_upload_limit", 0);
	this.ensureDefault("file_queue_limit", 0);

	// Flash Settings
	this.ensureDefault("flash_url", "");
	this.ensureDefault("prevent_swf_caching", true);
	
	// Button Settings
	this.ensureDefault("button_image_url", "");
	this.ensureDefault("button_width", 1);
	this.ensureDefault("button_height", 1);
	this.ensureDefault("button_text", "");
	this.ensureDefault("button_text_style", "color: #000000; font-size: 16pt;");
	this.ensureDefault("button_text_top_padding", 0);
	this.ensureDefault("button_text_left_padding", 0);
	this.ensureDefault("button_action", comiis_SWFUpload.BUTTON_ACTION.SELECT_FILES);
	this.ensureDefault("button_disabled", false);
	this.ensureDefault("button_placeholder_id", "");
	this.ensureDefault("button_placeholder", null);
	this.ensureDefault("button_cursor", comiis_SWFUpload.CURSOR.ARROW);
	this.ensureDefault("button_window_mode", comiis_SWFUpload.WINDOW_MODE.WINDOW);
	
	// Debug Settings
	this.ensureDefault("debug", false);
	this.settings.debug_enabled = this.settings.debug;	// Here to maintain v2 API
	
	// Event Handlers
	this.settings.return_upload_start_handler = this.returnUploadStart;
	this.ensureDefault("comiis_SWFUpload_loaded_handler", null);
	this.ensureDefault("file_dialog_start_handler", null);
	this.ensureDefault("file_queued_handler", null);
	this.ensureDefault("file_queue_error_handler", null);
	this.ensureDefault("file_dialog_complete_handler", null);
	
	this.ensureDefault("upload_start_handler", null);
	this.ensureDefault("upload_progress_handler", null);
	this.ensureDefault("upload_error_handler", null);
	this.ensureDefault("upload_success_handler", null);
	this.ensureDefault("upload_complete_handler", null);
	
	this.ensureDefault("debug_handler", this.debugMessage);

	this.ensureDefault("custom_settings", {});

	// Other settings
	this.customSettings = this.settings.custom_settings;
	
	// Update the flash url if needed
	if (!!this.settings.prevent_swf_caching) {
		this.settings.flash_url = this.settings.flash_url + (this.settings.flash_url.indexOf("?") < 0 ? "?" : "&") + "preventswfcaching=" + new Date().getTime();
	}
	
	if (!this.settings.preserve_relative_urls) {
		//this.settings.flash_url = comiis_SWFUpload.completeURL(this.settings.flash_url);	// Don't need to do this one since flash doesn't look at it
		this.settings.upload_url = comiis_SWFUpload.completeURL(this.settings.upload_url);
		this.settings.button_image_url = comiis_SWFUpload.completeURL(this.settings.button_image_url);
	}
	
	delete this.ensureDefault;
};

// Private: loadFlash replaces the button_placeholder element with the flash movie.
comiis_SWFUpload.prototype.loadFlash = function () {
	var targetElement, tempParent;

	// Make sure an element with the ID we are going to use doesn't already exist
	if (document.getElementById(this.movieName) !== null) {
		throw "ID " + this.movieName + " is already in use. The Flash Object could not be added";
	}

	// Get the element where we will be placing the flash movie
	targetElement = document.getElementById(this.settings.button_placeholder_id) || this.settings.button_placeholder;

	if (targetElement == undefined) {
		throw "Could not find the placeholder element: " + this.settings.button_placeholder_id;
	}

	// Append the container and load the flash
	tempParent = document.createElement("div");
	tempParent.innerHTML = this.getFlashHTML();	// Using innerHTML is non-standard but the only sensible way to dynamically add Flash in IE (and maybe other browsers)
	targetElement.parentNode.replaceChild(tempParent.firstChild, targetElement);

	// Fix IE Flash/Form bug
	if (window[this.movieName] == undefined) {
		window[this.movieName] = this.getMovieElement();
	}
	
};

// Private: getFlashHTML generates the object tag needed to embed the flash in to the document
comiis_SWFUpload.prototype.getFlashHTML = function () {
	// Flash Satay object syntax: http://www.alistapart.com/articles/flashsatay
	return ['<object id="', this.movieName, '" type="application/x-shockwave-flash" data="', this.settings.flash_url, '" width="', this.settings.button_width, '" height="', this.settings.button_height, '" class="comiis_SWFUpload">',
				'<param name="wmode" value="', this.settings.button_window_mode, '" />',
				'<param name="movie" value="', this.settings.flash_url, '" />',
				'<param name="quality" value="high" />',
				'<param name="menu" value="false" />',
				'<param name="allowScriptAccess" value="always" />',
				'<param name="flashvars" value="' + this.getFlashVars() + '" />',
				'</object>'].join("");
};

// Private: getFlashVars builds the parameter string that will be passed
// to flash in the flashvars param.
comiis_SWFUpload.prototype.getFlashVars = function () {
	// Build a string from the post param object
	var paramString = this.buildParamString();
	var httpSuccessString = this.settings.http_success.join(",");
	
	// Build the parameter string
	return ["movieName=", encodeURIComponent(this.movieName),
			"&amp;uploadURL=", encodeURIComponent(this.settings.upload_url),
			"&amp;useQueryString=", encodeURIComponent(this.settings.use_query_string),
			"&amp;requeueOnError=", encodeURIComponent(this.settings.requeue_on_error),
			"&amp;httpSuccess=", encodeURIComponent(httpSuccessString),
			"&amp;assumeSuccessTimeout=", encodeURIComponent(this.settings.assume_success_timeout),
			"&amp;params=", encodeURIComponent(paramString),
			"&amp;filePostName=", encodeURIComponent(this.settings.file_post_name),
			"&amp;fileTypes=", encodeURIComponent(this.settings.file_types),
			"&amp;fileTypesDescription=", encodeURIComponent(this.settings.file_types_description),
			"&amp;fileSizeLimit=", encodeURIComponent(this.settings.file_size_limit),
			"&amp;fileUploadLimit=", encodeURIComponent(this.settings.file_upload_limit),
			"&amp;fileQueueLimit=", encodeURIComponent(this.settings.file_queue_limit),
			"&amp;debugEnabled=", encodeURIComponent(this.settings.debug_enabled),
			"&amp;buttonImageURL=", encodeURIComponent(this.settings.button_image_url),
			"&amp;buttonWidth=", encodeURIComponent(this.settings.button_width),
			"&amp;buttonHeight=", encodeURIComponent(this.settings.button_height),
			"&amp;buttonText=", encodeURIComponent(this.settings.button_text),
			"&amp;buttonTextTopPadding=", encodeURIComponent(this.settings.button_text_top_padding),
			"&amp;buttonTextLeftPadding=", encodeURIComponent(this.settings.button_text_left_padding),
			"&amp;buttonTextStyle=", encodeURIComponent(this.settings.button_text_style),
			"&amp;buttonAction=", encodeURIComponent(this.settings.button_action),
			"&amp;buttonDisabled=", encodeURIComponent(this.settings.button_disabled),
			"&amp;buttonCursor=", encodeURIComponent(this.settings.button_cursor)
		].join("");
};

// Public: getMovieElement retrieves the DOM reference to the Flash element added by comiis_SWFUpload
// The element is cached after the first lookup
comiis_SWFUpload.prototype.getMovieElement = function () {
	if (this.movieElement == undefined) {
		this.movieElement = document.getElementById(this.movieName);
	}

	if (this.movieElement === null) {
		throw "Could not find Flash element";
	}
	
	return this.movieElement;
};

// Private: buildParamString takes the name/value pairs in the post_params setting object
// and joins them up in to a string formatted "name=value&amp;name=value"
comiis_SWFUpload.prototype.buildParamString = function () {
	var postParams = this.settings.post_params; 
	var paramStringPairs = [];

	if (typeof(postParams) === "object") {
		for (var name in postParams) {
			if (postParams.hasOwnProperty(name)) {
				paramStringPairs.push(encodeURIComponent(name.toString()) + "=" + encodeURIComponent(postParams[name].toString()));
			}
		}
	}

	return paramStringPairs.join("&amp;");
};

// Public: Used to remove a comiis_SWFUpload instance from the page. This method strives to remove
// all references to the SWF, and other objects so memory is properly freed.
// Returns true if everything was destroyed. Returns a false if a failure occurs leaving comiis_SWFUpload in an inconsistant state.
// Credits: Major improvements provided by steffen
comiis_SWFUpload.prototype.destroy = function () {
	try {
		// Make sure Flash is done before we try to remove it
		this.cancelUpload(null, false);
		

		// Remove the comiis_SWFUpload DOM nodes
		var movieElement = null;
		movieElement = this.getMovieElement();
		
		if (movieElement && typeof(movieElement.CallFunction) === "unknown") { // We only want to do this in IE
			// Loop through all the movie's properties and remove all function references (DOM/JS IE 6/7 memory leak workaround)
			for (var i in movieElement) {
				try {
					if (typeof(movieElement[i]) === "function") {
						movieElement[i] = null;
					}
				} catch (ex1) {}
			}

			// Remove the Movie Element from the page
			try {
				movieElement.parentNode.removeChild(movieElement);
			} catch (ex) {}
		}
		
		// Remove IE form fix reference
		window[this.movieName] = null;

		// Destroy other references
		comiis_SWFUpload.instances[this.movieName] = null;
		delete comiis_SWFUpload.instances[this.movieName];

		this.movieElement = null;
		this.settings = null;
		this.customSettings = null;
		this.eventQueue = null;
		this.movieName = null;
		
		
		return true;
	} catch (ex2) {
		return false;
	}
};


// Public: displayDebugInfo prints out settings and configuration
// information about this comiis_SWFUpload instance.
// This function (and any references to it) can be deleted when placing
// comiis_SWFUpload in production.
comiis_SWFUpload.prototype.displayDebugInfo = function () {
	this.debug(
		[
			"---comiis_SWFUpload Instance Info---\n",
			"Version: ", comiis_SWFUpload.version, "\n",
			"Movie Name: ", this.movieName, "\n",
			"Settings:\n",
			"\t", "upload_url:               ", this.settings.upload_url, "\n",
			"\t", "flash_url:                ", this.settings.flash_url, "\n",
			"\t", "use_query_string:         ", this.settings.use_query_string.toString(), "\n",
			"\t", "requeue_on_error:         ", this.settings.requeue_on_error.toString(), "\n",
			"\t", "http_success:             ", this.settings.http_success.join(", "), "\n",
			"\t", "assume_success_timeout:   ", this.settings.assume_success_timeout, "\n",
			"\t", "file_post_name:           ", this.settings.file_post_name, "\n",
			"\t", "post_params:              ", this.settings.post_params.toString(), "\n",
			"\t", "file_types:               ", this.settings.file_types, "\n",
			"\t", "file_types_description:   ", this.settings.file_types_description, "\n",
			"\t", "file_size_limit:          ", this.settings.file_size_limit, "\n",
			"\t", "file_upload_limit:        ", this.settings.file_upload_limit, "\n",
			"\t", "file_queue_limit:         ", this.settings.file_queue_limit, "\n",
			"\t", "debug:                    ", this.settings.debug.toString(), "\n",

			"\t", "prevent_swf_caching:      ", this.settings.prevent_swf_caching.toString(), "\n",

			"\t", "button_placeholder_id:    ", this.settings.button_placeholder_id.toString(), "\n",
			"\t", "button_placeholder:       ", (this.settings.button_placeholder ? "Set" : "Not Set"), "\n",
			"\t", "button_image_url:         ", this.settings.button_image_url.toString(), "\n",
			"\t", "button_width:             ", this.settings.button_width.toString(), "\n",
			"\t", "button_height:            ", this.settings.button_height.toString(), "\n",
			"\t", "button_text:              ", this.settings.button_text.toString(), "\n",
			"\t", "button_text_style:        ", this.settings.button_text_style.toString(), "\n",
			"\t", "button_text_top_padding:  ", this.settings.button_text_top_padding.toString(), "\n",
			"\t", "button_text_left_padding: ", this.settings.button_text_left_padding.toString(), "\n",
			"\t", "button_action:            ", this.settings.button_action.toString(), "\n",
			"\t", "button_disabled:          ", this.settings.button_disabled.toString(), "\n",

			"\t", "custom_settings:          ", this.settings.custom_settings.toString(), "\n",
			"Event Handlers:\n",
			"\t", "comiis_SWFUpload_loaded_handler assigned:  ", (typeof this.settings.comiis_SWFUpload_loaded_handler === "function").toString(), "\n",
			"\t", "file_dialog_start_handler assigned: ", (typeof this.settings.file_dialog_start_handler === "function").toString(), "\n",
			"\t", "file_queued_handler assigned:       ", (typeof this.settings.file_queued_handler === "function").toString(), "\n",
			"\t", "file_queue_error_handler assigned:  ", (typeof this.settings.file_queue_error_handler === "function").toString(), "\n",
			"\t", "upload_start_handler assigned:      ", (typeof this.settings.upload_start_handler === "function").toString(), "\n",
			"\t", "upload_progress_handler assigned:   ", (typeof this.settings.upload_progress_handler === "function").toString(), "\n",
			"\t", "upload_error_handler assigned:      ", (typeof this.settings.upload_error_handler === "function").toString(), "\n",
			"\t", "upload_success_handler assigned:    ", (typeof this.settings.upload_success_handler === "function").toString(), "\n",
			"\t", "upload_complete_handler assigned:   ", (typeof this.settings.upload_complete_handler === "function").toString(), "\n",
			"\t", "debug_handler assigned:             ", (typeof this.settings.debug_handler === "function").toString(), "\n"
		].join("")
	);
};

/* Note: addSetting and getSetting are no longer used by comiis_SWFUpload but are included
	the maintain v2 API compatibility
*/
// Public: (Deprecated) addSetting adds a setting value. If the value given is undefined or null then the default_value is used.
comiis_SWFUpload.prototype.addSetting = function (name, value, default_value) {
    if (value == undefined) {
        return (this.settings[name] = default_value);
    } else {
        return (this.settings[name] = value);
	}
};

// Public: (Deprecated) getSetting gets a setting. Returns an empty string if the setting was not found.
comiis_SWFUpload.prototype.getSetting = function (name) {
    if (this.settings[name] != undefined) {
        return this.settings[name];
	}

    return "";
};



// Private: callFlash handles function calls made to the Flash element.
// Calls are made with a setTimeout for some functions to work around
// bugs in the ExternalInterface library.
comiis_SWFUpload.prototype.callFlash = function (functionName, argumentArray) {
	argumentArray = argumentArray || [];
	
	var movieElement = this.getMovieElement();
	var returnValue, returnString;

	// Flash's method if calling ExternalInterface methods (code adapted from MooTools).
	try {
		returnString = movieElement.CallFunction('<invoke name="' + functionName + '" returntype="javascript">' + __flash__argumentsToXML(argumentArray, 0) + '</invoke>');
		returnValue = eval(returnString);
	} catch (ex) {
		throw "Call to " + functionName + " failed";
	}
	
	// Unescape file post param values
	if (returnValue != undefined && typeof returnValue.post === "object") {
		returnValue = this.unescapeFilePostParams(returnValue);
	}

	return returnValue;
};

/* *****************************
	-- Flash control methods --
	Your UI should use these
	to operate comiis_SWFUpload
   ***************************** */

// WARNING: this function does not work in Flash Player 10
// Public: selectFile causes a File Selection Dialog window to appear.  This
// dialog only allows 1 file to be selected.
comiis_SWFUpload.prototype.selectFile = function () {
	this.callFlash("SelectFile");
};

// WARNING: this function does not work in Flash Player 10
// Public: selectFiles causes a File Selection Dialog window to appear/ This
// dialog allows the user to select any number of files
// Flash Bug Warning: Flash limits the number of selectable files based on the combined length of the file names.
// If the selection name length is too long the dialog will fail in an unpredictable manner.  There is no work-around
// for this bug.
comiis_SWFUpload.prototype.selectFiles = function () {
	this.callFlash("SelectFiles");
};


// Public: startUpload starts uploading the first file in the queue unless
// the optional parameter 'fileID' specifies the ID 
comiis_SWFUpload.prototype.startUpload = function (fileID) {
	this.callFlash("StartUpload", [fileID]);
};

// Public: cancelUpload cancels any queued file.  The fileID parameter may be the file ID or index.
// If you do not specify a fileID the current uploading file or first file in the queue is cancelled.
// If you do not want the uploadError event to trigger you can specify false for the triggerErrorEvent parameter.
comiis_SWFUpload.prototype.cancelUpload = function (fileID, triggerErrorEvent) {
	if (triggerErrorEvent !== false) {
		triggerErrorEvent = true;
	}
	this.callFlash("CancelUpload", [fileID, triggerErrorEvent]);
};

// Public: stopUpload stops the current upload and requeues the file at the beginning of the queue.
// If nothing is currently uploading then nothing happens.
comiis_SWFUpload.prototype.stopUpload = function () {
	this.callFlash("StopUpload");
};

/* ************************
 * Settings methods
 *   These methods change the comiis_SWFUpload settings.
 *   comiis_SWFUpload settings should not be changed directly on the settings object
 *   since many of the settings need to be passed to Flash in order to take
 *   effect.
 * *********************** */

// Public: getStats gets the file statistics object.
comiis_SWFUpload.prototype.getStats = function () {
	return this.callFlash("GetStats");
};

// Public: setStats changes the comiis_SWFUpload statistics.  You shouldn't need to 
// change the statistics but you can.  Changing the statistics does not
// affect comiis_SWFUpload accept for the successful_uploads count which is used
// by the upload_limit setting to determine how many files the user may upload.
comiis_SWFUpload.prototype.setStats = function (statsObject) {
	this.callFlash("SetStats", [statsObject]);
};

// Public: getFile retrieves a File object by ID or Index.  If the file is
// not found then 'null' is returned.
comiis_SWFUpload.prototype.getFile = function (fileID) {
	if (typeof(fileID) === "number") {
		return this.callFlash("GetFileByIndex", [fileID]);
	} else {
		return this.callFlash("GetFile", [fileID]);
	}
};

// Public: addFileParam sets a name/value pair that will be posted with the
// file specified by the Files ID.  If the name already exists then the
// exiting value will be overwritten.
comiis_SWFUpload.prototype.addFileParam = function (fileID, name, value) {
	return this.callFlash("AddFileParam", [fileID, name, value]);
};

// Public: removeFileParam removes a previously set (by addFileParam) name/value
// pair from the specified file.
comiis_SWFUpload.prototype.removeFileParam = function (fileID, name) {
	this.callFlash("RemoveFileParam", [fileID, name]);
};

// Public: setUploadUrl changes the upload_url setting.
comiis_SWFUpload.prototype.setUploadURL = function (url) {
	this.settings.upload_url = url.toString();
	this.callFlash("SetUploadURL", [url]);
};

// Public: setPostParams changes the post_params setting
comiis_SWFUpload.prototype.setPostParams = function (paramsObject) {
	this.settings.post_params = paramsObject;
	this.callFlash("SetPostParams", [paramsObject]);
};

// Public: addPostParam adds post name/value pair.  Each name can have only one value.
comiis_SWFUpload.prototype.addPostParam = function (name, value) {
	this.settings.post_params[name] = value;
	this.callFlash("SetPostParams", [this.settings.post_params]);
};

// Public: removePostParam deletes post name/value pair.
comiis_SWFUpload.prototype.removePostParam = function (name) {
	delete this.settings.post_params[name];
	this.callFlash("SetPostParams", [this.settings.post_params]);
};

// Public: setFileTypes changes the file_types setting and the file_types_description setting
comiis_SWFUpload.prototype.setFileTypes = function (types, description) {
	this.settings.file_types = types;
	this.settings.file_types_description = description;
	this.callFlash("SetFileTypes", [types, description]);
};

// Public: setFileSizeLimit changes the file_size_limit setting
comiis_SWFUpload.prototype.setFileSizeLimit = function (fileSizeLimit) {
	this.settings.file_size_limit = fileSizeLimit;
	this.callFlash("SetFileSizeLimit", [fileSizeLimit]);
};

// Public: setFileUploadLimit changes the file_upload_limit setting
comiis_SWFUpload.prototype.setFileUploadLimit = function (fileUploadLimit) {
	this.settings.file_upload_limit = fileUploadLimit;
	this.callFlash("SetFileUploadLimit", [fileUploadLimit]);
};

// Public: setFileQueueLimit changes the file_queue_limit setting
comiis_SWFUpload.prototype.setFileQueueLimit = function (fileQueueLimit) {
	this.settings.file_queue_limit = fileQueueLimit;
	this.callFlash("SetFileQueueLimit", [fileQueueLimit]);
};

// Public: setFilePostName changes the file_post_name setting
comiis_SWFUpload.prototype.setFilePostName = function (filePostName) {
	this.settings.file_post_name = filePostName;
	this.callFlash("SetFilePostName", [filePostName]);
};

// Public: setUseQueryString changes the use_query_string setting
comiis_SWFUpload.prototype.setUseQueryString = function (useQueryString) {
	this.settings.use_query_string = useQueryString;
	this.callFlash("SetUseQueryString", [useQueryString]);
};

// Public: setRequeueOnError changes the requeue_on_error setting
comiis_SWFUpload.prototype.setRequeueOnError = function (requeueOnError) {
	this.settings.requeue_on_error = requeueOnError;
	this.callFlash("SetRequeueOnError", [requeueOnError]);
};

// Public: setHTTPSuccess changes the http_success setting
comiis_SWFUpload.prototype.setHTTPSuccess = function (http_status_codes) {
	if (typeof http_status_codes === "string") {
		http_status_codes = http_status_codes.replace(" ", "").split(",");
	}
	
	this.settings.http_success = http_status_codes;
	this.callFlash("SetHTTPSuccess", [http_status_codes]);
};

// Public: setHTTPSuccess changes the http_success setting
comiis_SWFUpload.prototype.setAssumeSuccessTimeout = function (timeout_seconds) {
	this.settings.assume_success_timeout = timeout_seconds;
	this.callFlash("SetAssumeSuccessTimeout", [timeout_seconds]);
};

// Public: setDebugEnabled changes the debug_enabled setting
comiis_SWFUpload.prototype.setDebugEnabled = function (debugEnabled) {
	this.settings.debug_enabled = debugEnabled;
	this.callFlash("SetDebugEnabled", [debugEnabled]);
};

// Public: setButtonImageURL loads a button image sprite
comiis_SWFUpload.prototype.setButtonImageURL = function (buttonImageURL) {
	if (buttonImageURL == undefined) {
		buttonImageURL = "";
	}
	
	this.settings.button_image_url = buttonImageURL;
	this.callFlash("SetButtonImageURL", [buttonImageURL]);
};

// Public: setButtonDimensions resizes the Flash Movie and button
comiis_SWFUpload.prototype.setButtonDimensions = function (width, height) {
	this.settings.button_width = width;
	this.settings.button_height = height;
	
	var movie = this.getMovieElement();
	if (movie != undefined) {
		movie.style.width = width + "px";
		movie.style.height = height + "px";
	}
	
	this.callFlash("SetButtonDimensions", [width, height]);
};
// Public: setButtonText Changes the text overlaid on the button
comiis_SWFUpload.prototype.setButtonText = function (html) {
	this.settings.button_text = html;
	this.callFlash("SetButtonText", [html]);
};
// Public: setButtonTextPadding changes the top and left padding of the text overlay
comiis_SWFUpload.prototype.setButtonTextPadding = function (left, top) {
	this.settings.button_text_top_padding = top;
	this.settings.button_text_left_padding = left;
	this.callFlash("SetButtonTextPadding", [left, top]);
};

// Public: setButtonTextStyle changes the CSS used to style the HTML/Text overlaid on the button
comiis_SWFUpload.prototype.setButtonTextStyle = function (css) {
	this.settings.button_text_style = css;
	this.callFlash("SetButtonTextStyle", [css]);
};
// Public: setButtonDisabled disables/enables the button
comiis_SWFUpload.prototype.setButtonDisabled = function (isDisabled) {
	this.settings.button_disabled = isDisabled;
	this.callFlash("SetButtonDisabled", [isDisabled]);
};
// Public: setButtonAction sets the action that occurs when the button is clicked
comiis_SWFUpload.prototype.setButtonAction = function (buttonAction) {
	this.settings.button_action = buttonAction;
	this.callFlash("SetButtonAction", [buttonAction]);
};

// Public: setButtonCursor changes the mouse cursor displayed when hovering over the button
comiis_SWFUpload.prototype.setButtonCursor = function (cursor) {
	this.settings.button_cursor = cursor;
	this.callFlash("SetButtonCursor", [cursor]);
};

/* *******************************
	Flash Event Interfaces
	These functions are used by Flash to trigger the various
	events.
	
	All these functions a Private.
	
	Because the ExternalInterface library is buggy the event calls
	are added to a queue and the queue then executed by a setTimeout.
	This ensures that events are executed in a determinate order and that
	the ExternalInterface bugs are avoided.
******************************* */

comiis_SWFUpload.prototype.queueEvent = function (handlerName, argumentArray) {
	// Warning: Don't call this.debug inside here or you'll create an infinite loop
	
	if (argumentArray == undefined) {
		argumentArray = [];
	} else if (!(argumentArray instanceof Array)) {
		argumentArray = [argumentArray];
	}
	
	var self = this;
	if (typeof this.settings[handlerName] === "function") {
		// Queue the event
		this.eventQueue.push(function () {
			this.settings[handlerName].apply(this, argumentArray);
		});
		
		// Execute the next queued event
		setTimeout(function () {
			self.executeNextEvent();
		}, 0);
		
	} else if (this.settings[handlerName] !== null) {
		throw "Event handler " + handlerName + " is unknown or is not a function";
	}
};

// Private: Causes the next event in the queue to be executed.  Since events are queued using a setTimeout
// we must queue them in order to garentee that they are executed in order.
comiis_SWFUpload.prototype.executeNextEvent = function () {
	// Warning: Don't call this.debug inside here or you'll create an infinite loop

	var  f = this.eventQueue ? this.eventQueue.shift() : null;
	if (typeof(f) === "function") {
		f.apply(this);
	}
};

// Private: unescapeFileParams is part of a workaround for a flash bug where objects passed through ExternalInterface cannot have
// properties that contain characters that are not valid for JavaScript identifiers. To work around this
// the Flash Component escapes the parameter names and we must unescape again before passing them along.
comiis_SWFUpload.prototype.unescapeFilePostParams = function (file) {
	var reg = /[$]([0-9a-f]{4})/i;
	var unescapedPost = {};
	var uk;

	if (file != undefined) {
		for (var k in file.post) {
			if (file.post.hasOwnProperty(k)) {
				uk = k;
				var match;
				while ((match = reg.exec(uk)) !== null) {
					uk = uk.replace(match[0], String.fromCharCode(parseInt("0x" + match[1], 16)));
				}
				unescapedPost[uk] = file.post[k];
			}
		}

		file.post = unescapedPost;
	}

	return file;
};

// Private: Called by Flash to see if JS can call in to Flash (test if External Interface is working)
comiis_SWFUpload.prototype.testExternalInterface = function () {
	try {
		return this.callFlash("TestExternalInterface");
	} catch (ex) {
		return false;
	}
};

// Private: This event is called by Flash when it has finished loading. Don't modify this.
// Use the comiis_SWFUpload_loaded_handler event setting to execute custom code when comiis_SWFUpload has loaded.
comiis_SWFUpload.prototype.flashReady = function () {
	// Check that the movie element is loaded correctly with its ExternalInterface methods defined
	var movieElement = this.getMovieElement();

	if (!movieElement) {
		this.debug("Flash called back ready but the flash movie can't be found.");
		return;
	}

	this.cleanUp(movieElement);
	
	this.queueEvent("comiis_SWFUpload_loaded_handler");
};

// Private: removes Flash added fuctions to the DOM node to prevent memory leaks in IE.
// This function is called by Flash each time the ExternalInterface functions are created.
comiis_SWFUpload.prototype.cleanUp = function (movieElement) {
	// Pro-actively unhook all the Flash functions
	try {
		if (this.movieElement && typeof(movieElement.CallFunction) === "unknown") { // We only want to do this in IE
			this.debug("Removing Flash functions hooks (this should only run in IE and should prevent memory leaks)");
			for (var key in movieElement) {
				try {
					if (typeof(movieElement[key]) === "function") {
						movieElement[key] = null;
					}
				} catch (ex) {
				}
			}
		}
	} catch (ex1) {
	
	}

	// Fix Flashes own cleanup code so if the SWFMovie was removed from the page
	// it doesn't display errors.
	window["__flash__removeCallback"] = function (instance, name) {
		try {
			if (instance) {
				instance[name] = null;
			}
		} catch (flashEx) {
		
		}
	};

};


/* This is a chance to do something before the browse window opens */
comiis_SWFUpload.prototype.fileDialogStart = function () {
	this.queueEvent("file_dialog_start_handler");
};


/* Called when a file is successfully added to the queue. */
comiis_SWFUpload.prototype.fileQueued = function (file) {
	file = this.unescapeFilePostParams(file);
	this.queueEvent("file_queued_handler", file);
};


/* Handle errors that occur when an attempt to queue a file fails. */
comiis_SWFUpload.prototype.fileQueueError = function (file, errorCode, message) {
	file = this.unescapeFilePostParams(file);
	this.queueEvent("file_queue_error_handler", [file, errorCode, message]);
};

/* Called after the file dialog has closed and the selected files have been queued.
	You could call startUpload here if you want the queued files to begin uploading immediately. */
comiis_SWFUpload.prototype.fileDialogComplete = function (numFilesSelected, numFilesQueued, numFilesInQueue) {
	this.queueEvent("file_dialog_complete_handler", [numFilesSelected, numFilesQueued, numFilesInQueue]);
};

comiis_SWFUpload.prototype.uploadStart = function (file) {
	file = this.unescapeFilePostParams(file);
	this.queueEvent("return_upload_start_handler", file);
};

comiis_SWFUpload.prototype.returnUploadStart = function (file) {
	var returnValue;
	if (typeof this.settings.upload_start_handler === "function") {
		file = this.unescapeFilePostParams(file);
		returnValue = this.settings.upload_start_handler.call(this, file);
	} else if (this.settings.upload_start_handler != undefined) {
		throw "upload_start_handler must be a function";
	}

	// Convert undefined to true so if nothing is returned from the upload_start_handler it is
	// interpretted as 'true'.
	if (returnValue === undefined) {
		returnValue = true;
	}
	
	returnValue = !!returnValue;
	
	this.callFlash("ReturnUploadStart", [returnValue]);
};



comiis_SWFUpload.prototype.uploadProgress = function (file, bytesComplete, bytesTotal) {
	file = this.unescapeFilePostParams(file);
	this.queueEvent("upload_progress_handler", [file, bytesComplete, bytesTotal]);
};

comiis_SWFUpload.prototype.uploadError = function (file, errorCode, message) {
	file = this.unescapeFilePostParams(file);
	this.queueEvent("upload_error_handler", [file, errorCode, message]);
};

comiis_SWFUpload.prototype.uploadSuccess = function (file, serverData, responseReceived) {
	file = this.unescapeFilePostParams(file);
	this.queueEvent("upload_success_handler", [file, serverData, responseReceived]);
};

comiis_SWFUpload.prototype.uploadComplete = function (file) {
	file = this.unescapeFilePostParams(file);
	this.queueEvent("upload_complete_handler", file);
};

/* Called by comiis_SWFUpload JavaScript and Flash functions when debug is enabled. By default it writes messages to the
   internal debug console.  You can override this event and have messages written where you want. */
comiis_SWFUpload.prototype.debug = function (message) {
	this.queueEvent("debug_handler", message);
};


/* **********************************
	Debug Console
	The debug console is a self contained, in page location
	for debug message to be sent.  The Debug Console adds
	itself to the body if necessary.

	The console is automatically scrolled as messages appear.
	
	If you are using your own debug handler or when you deploy to production and
	have debug disabled you can remove these functions to reduce the file size
	and complexity.
********************************** */
   
// Private: debugMessage is the default debug_handler.  If you want to print debug messages
// call the debug() function.  When overriding the function your own function should
// check to see if the debug setting is true before outputting debug information.
comiis_SWFUpload.prototype.debugMessage = function (message) {
	if (this.settings.debug) {
		var exceptionMessage, exceptionValues = [];

		// Check for an exception object and print it nicely
		if (typeof message === "object" && typeof message.name === "string" && typeof message.message === "string") {
			for (var key in message) {
				if (message.hasOwnProperty(key)) {
					exceptionValues.push(key + ": " + message[key]);
				}
			}
			exceptionMessage = exceptionValues.join("\n") || "";
			exceptionValues = exceptionMessage.split("\n");
			exceptionMessage = "EXCEPTION: " + exceptionValues.join("\nEXCEPTION: ");
			comiis_SWFUpload.Console.writeLine(exceptionMessage);
		} else {
			comiis_SWFUpload.Console.writeLine(message);
		}
	}
};

comiis_SWFUpload.Console = {};
comiis_SWFUpload.Console.writeLine = function (message) {
	var console, documentForm;

	try {
		console = document.getElementById("comiis_SWFUpload_Console");

		if (!console) {
			documentForm = document.createElement("form");
			document.getElementsByTagName("body")[0].appendChild(documentForm);

			console = document.createElement("textarea");
			console.id = "comiis_SWFUpload_Console";
			console.style.fontFamily = "monospace";
			console.setAttribute("wrap", "off");
			console.wrap = "off";
			console.style.overflow = "auto";
			console.style.width = "700px";
			console.style.height = "350px";
			console.style.margin = "5px";
			documentForm.appendChild(console);
		}

		console.value += message + "\n";

		console.scrollTop = console.scrollHeight - console.clientHeight;
	} catch (ex) {
		alert("Exception: " + ex.name + " Message: " + ex.message);
	}
};

/*
	Queue Plug-in
	
	Features:
		*Adds a cancelQueue() method for cancelling the entire queue.
		*All queued files are uploaded when startUpload() is called.
		*If false is returned from uploadComplete then the queue upload is stopped.
		 If false is not returned (strict comparison) then the queue upload is continued.
		*Adds a QueueComplete event that is fired when all the queued files have finished uploading.
		 Set the event handler with the queue_complete_handler setting.
		
	*/

var comiis_SWFUpload;
if (typeof(comiis_SWFUpload) === "function") {
	comiis_SWFUpload.queue = {};
	
	comiis_SWFUpload.prototype.initSettings = (function (oldInitSettings) {
		return function () {
			if (typeof(oldInitSettings) === "function") {
				oldInitSettings.call(this);
			}
			
			this.queueSettings = {};
			
			this.queueSettings.queue_cancelled_flag = false;
			this.queueSettings.queue_upload_count = 0;
			
			this.queueSettings.user_upload_complete_handler = this.settings.upload_complete_handler;
			this.queueSettings.user_upload_start_handler = this.settings.upload_start_handler;
			this.settings.upload_complete_handler = comiis_SWFUpload.queue.uploadCompleteHandler;
			this.settings.upload_start_handler = comiis_SWFUpload.queue.uploadStartHandler;
			
			this.settings.queue_complete_handler = this.settings.queue_complete_handler || null;
		};
	})(comiis_SWFUpload.prototype.initSettings);

	comiis_SWFUpload.prototype.startUpload = function (fileID) {
		this.queueSettings.queue_cancelled_flag = false;
		this.callFlash("StartUpload", [fileID]);
	};

	comiis_SWFUpload.prototype.cancelQueue = function () {
		this.queueSettings.queue_cancelled_flag = true;
		this.stopUpload();
		
		var stats = this.getStats();
		while (stats.files_queued > 0) {
			this.cancelUpload();
			stats = this.getStats();
		}
	};
	
	comiis_SWFUpload.queue.uploadStartHandler = function (file) {
		var returnValue;
		if (typeof(this.queueSettings.user_upload_start_handler) === "function") {
			returnValue = this.queueSettings.user_upload_start_handler.call(this, file);
		}
		
		// To prevent upload a real "FALSE" value must be returned, otherwise default to a real "TRUE" value.
		returnValue = (returnValue === false) ? false : true;
		
		this.queueSettings.queue_cancelled_flag = !returnValue;

		return returnValue;
	};
	
	comiis_SWFUpload.queue.uploadCompleteHandler = function (file) {
		var user_upload_complete_handler = this.queueSettings.user_upload_complete_handler;
		var continueUpload;
		
		if (file.filestatus === comiis_SWFUpload.FILE_STATUS.COMPLETE) {
			this.queueSettings.queue_upload_count++;
		}

		if (typeof(user_upload_complete_handler) === "function") {
			continueUpload = (user_upload_complete_handler.call(this, file) === false) ? false : true;
		} else if (file.filestatus === comiis_SWFUpload.FILE_STATUS.QUEUED) {
			// If the file was stopped and re-queued don't restart the upload
			continueUpload = false;
		} else {
			continueUpload = true;
		}
		
		if (continueUpload) {
			var stats = this.getStats();
			if (stats.files_queued > 0 && this.queueSettings.queue_cancelled_flag === false) {
				this.startUpload();
			} else if (this.queueSettings.queue_cancelled_flag === false) {
				this.queueEvent("queue_complete_handler", [this.queueSettings.queue_upload_count]);
				this.queueSettings.queue_upload_count = 0;
			} else {
				this.queueSettings.queue_cancelled_flag = false;
				this.queueSettings.queue_upload_count = 0;
			}
		}
	};
}

/*
	Speed Plug-in
	
	Features:
		*Adds several properties to the 'file' object indicated upload speed, time left, upload time, etc.
			- currentSpeed -- String indicating the upload speed, bytes per second
			- averageSpeed -- Overall average upload speed, bytes per second
			- movingAverageSpeed -- Speed over averaged over the last several measurements, bytes per second
			- timeRemaining -- Estimated remaining upload time in seconds
			- timeElapsed -- Number of seconds passed for this upload
			- percentUploaded -- Percentage of the file uploaded (0 to 100)
			- sizeUploaded -- Formatted size uploaded so far, bytes
		
		*Adds setting 'moving_average_history_size' for defining the window size used to calculate the moving average speed.
		
		*Adds several Formatting functions for formatting that values provided on the file object.
			- comiis_SWFUpload.speed.formatBPS(bps) -- outputs string formatted in the best units (Gbps, Mbps, Kbps, bps)
			- comiis_SWFUpload.speed.formatTime(seconds) -- outputs string formatted in the best units (x Hr y M z S)
			- comiis_SWFUpload.speed.formatSize(bytes) -- outputs string formatted in the best units (w GB x MB y KB z B )
			- comiis_SWFUpload.speed.formatPercent(percent) -- outputs string formatted with a percent sign (x.xx %)
			- comiis_SWFUpload.speed.formatUnits(baseNumber, divisionArray, unitLabelArray, fractionalBoolean)
				- Formats a number using the division array to determine how to apply the labels in the Label Array
				- factionalBoolean indicates whether the number should be returned as a single fractional number with a unit (speed)
				    or as several numbers labeled with units (time)
	*/

var comiis_SWFUpload;
if (typeof(comiis_SWFUpload) === "function") {
	comiis_SWFUpload.speed = {};
	
	comiis_SWFUpload.prototype.initSettings = (function (oldInitSettings) {
		return function () {
			if (typeof(oldInitSettings) === "function") {
				oldInitSettings.call(this);
			}
			
			this.ensureDefault = function (settingName, defaultValue) {
				this.settings[settingName] = (this.settings[settingName] == undefined) ? defaultValue : this.settings[settingName];
			};

			// List used to keep the speed stats for the files we are tracking
			this.fileSpeedStats = {};
			this.speedSettings = {};

			this.ensureDefault("moving_average_history_size", "10");
			
			this.speedSettings.user_file_queued_handler = this.settings.file_queued_handler;
			this.speedSettings.user_file_queue_error_handler = this.settings.file_queue_error_handler;
			this.speedSettings.user_upload_start_handler = this.settings.upload_start_handler;
			this.speedSettings.user_upload_error_handler = this.settings.upload_error_handler;
			this.speedSettings.user_upload_progress_handler = this.settings.upload_progress_handler;
			this.speedSettings.user_upload_success_handler = this.settings.upload_success_handler;
			this.speedSettings.user_upload_complete_handler = this.settings.upload_complete_handler;
			
			this.settings.file_queued_handler = comiis_SWFUpload.speed.fileQueuedHandler;
			this.settings.file_queue_error_handler = comiis_SWFUpload.speed.fileQueueErrorHandler;
			this.settings.upload_start_handler = comiis_SWFUpload.speed.uploadStartHandler;
			this.settings.upload_error_handler = comiis_SWFUpload.speed.uploadErrorHandler;
			this.settings.upload_progress_handler = comiis_SWFUpload.speed.uploadProgressHandler;
			this.settings.upload_success_handler = comiis_SWFUpload.speed.uploadSuccessHandler;
			this.settings.upload_complete_handler = comiis_SWFUpload.speed.uploadCompleteHandler;
			
			delete this.ensureDefault;
		};
	})(comiis_SWFUpload.prototype.initSettings);

	
	comiis_SWFUpload.speed.fileQueuedHandler = function (file) {
		if (typeof this.speedSettings.user_file_queued_handler === "function") {
			file = comiis_SWFUpload.speed.extendFile(file);
			
			return this.speedSettings.user_file_queued_handler.call(this, file);
		}
	};
	
	comiis_SWFUpload.speed.fileQueueErrorHandler = function (file, errorCode, message) {
		if (typeof this.speedSettings.user_file_queue_error_handler === "function") {
			file = comiis_SWFUpload.speed.extendFile(file);
			
			return this.speedSettings.user_file_queue_error_handler.call(this, file, errorCode, message);
		}
	};

	comiis_SWFUpload.speed.uploadStartHandler = function (file) {
		if (typeof this.speedSettings.user_upload_start_handler === "function") {
			file = comiis_SWFUpload.speed.extendFile(file, this.fileSpeedStats);
			return this.speedSettings.user_upload_start_handler.call(this, file);
		}
	};
	
	comiis_SWFUpload.speed.uploadErrorHandler = function (file, errorCode, message) {
		file = comiis_SWFUpload.speed.extendFile(file, this.fileSpeedStats);
		comiis_SWFUpload.speed.removeTracking(file, this.fileSpeedStats);

		if (typeof this.speedSettings.user_upload_error_handler === "function") {
			return this.speedSettings.user_upload_error_handler.call(this, file, errorCode, message);
		}
	};
	comiis_SWFUpload.speed.uploadProgressHandler = function (file, bytesComplete, bytesTotal) {
		this.updateTracking(file, bytesComplete);
		file = comiis_SWFUpload.speed.extendFile(file, this.fileSpeedStats);

		if (typeof this.speedSettings.user_upload_progress_handler === "function") {
			return this.speedSettings.user_upload_progress_handler.call(this, file, bytesComplete, bytesTotal);
		}
	};
	
	comiis_SWFUpload.speed.uploadSuccessHandler = function (file, serverData) {
		if (typeof this.speedSettings.user_upload_success_handler === "function") {
			file = comiis_SWFUpload.speed.extendFile(file, this.fileSpeedStats);
			return this.speedSettings.user_upload_success_handler.call(this, file, serverData);
		}
	};
	comiis_SWFUpload.speed.uploadCompleteHandler = function (file) {
		file = comiis_SWFUpload.speed.extendFile(file, this.fileSpeedStats);
		comiis_SWFUpload.speed.removeTracking(file, this.fileSpeedStats);

		if (typeof this.speedSettings.user_upload_complete_handler === "function") {
			return this.speedSettings.user_upload_complete_handler.call(this, file);
		}
	};
	
	// Private: extends the file object with the speed plugin values
	comiis_SWFUpload.speed.extendFile = function (file, trackingList) {
		var tracking;
		
		if (trackingList) {
			tracking = trackingList[file.id];
		}
		
		if (tracking) {
			file.currentSpeed = tracking.currentSpeed;
			file.averageSpeed = tracking.averageSpeed;
			file.movingAverageSpeed = tracking.movingAverageSpeed;
			file.timeRemaining = tracking.timeRemaining;
			file.timeElapsed = tracking.timeElapsed;
			file.percentUploaded = tracking.percentUploaded;
			file.sizeUploaded = tracking.bytesUploaded;

		} else {
			file.currentSpeed = 0;
			file.averageSpeed = 0;
			file.movingAverageSpeed = 0;
			file.timeRemaining = 0;
			file.timeElapsed = 0;
			file.percentUploaded = 0;
			file.sizeUploaded = 0;
		}
		
		return file;
	};
	
	// Private: Updates the speed tracking object, or creates it if necessary
	comiis_SWFUpload.prototype.updateTracking = function (file, bytesUploaded) {
		var tracking = this.fileSpeedStats[file.id];
		if (!tracking) {
			this.fileSpeedStats[file.id] = tracking = {};
		}
		
		// Sanity check inputs
		bytesUploaded = bytesUploaded || tracking.bytesUploaded || 0;
		if (bytesUploaded < 0) {
			bytesUploaded = 0;
		}
		if (bytesUploaded > file.size) {
			bytesUploaded = file.size;
		}
		
		var tickTime = (new Date()).getTime();
		if (!tracking.startTime) {
			tracking.startTime = (new Date()).getTime();
			tracking.lastTime = tracking.startTime;
			tracking.currentSpeed = 0;
			tracking.averageSpeed = 0;
			tracking.movingAverageSpeed = 0;
			tracking.movingAverageHistory = [];
			tracking.timeRemaining = 0;
			tracking.timeElapsed = 0;
			tracking.percentUploaded = bytesUploaded / file.size;
			tracking.bytesUploaded = bytesUploaded;
		} else if (tracking.startTime > tickTime) {
			this.debug("When backwards in time");
		} else {
			// Get time and deltas
			var now = (new Date()).getTime();
			var lastTime = tracking.lastTime;
			var deltaTime = now - lastTime;
			var deltaBytes = bytesUploaded - tracking.bytesUploaded;
			
			if (deltaBytes === 0 || deltaTime === 0) {
				return tracking;
			}
			
			// Update tracking object
			tracking.lastTime = now;
			tracking.bytesUploaded = bytesUploaded;
			
			// Calculate speeds
			tracking.currentSpeed = (deltaBytes * 8 ) / (deltaTime / 1000);
			tracking.averageSpeed = (tracking.bytesUploaded * 8) / ((now - tracking.startTime) / 1000);

			// Calculate moving average
			tracking.movingAverageHistory.push(tracking.currentSpeed);
			if (tracking.movingAverageHistory.length > this.settings.moving_average_history_size) {
				tracking.movingAverageHistory.shift();
			}
			
			tracking.movingAverageSpeed = comiis_SWFUpload.speed.calculateMovingAverage(tracking.movingAverageHistory);
			
			// Update times
			tracking.timeRemaining = (file.size - tracking.bytesUploaded) * 8 / tracking.movingAverageSpeed;
			tracking.timeElapsed = (now - tracking.startTime) / 1000;
			
			// Update percent
			tracking.percentUploaded = (tracking.bytesUploaded / file.size * 100);
		}
		
		return tracking;
	};
	comiis_SWFUpload.speed.removeTracking = function (file, trackingList) {
		try {
			trackingList[file.id] = null;
			delete trackingList[file.id];
		} catch (ex) {
		}
	};
	
	comiis_SWFUpload.speed.formatUnits = function (baseNumber, unitDivisors, unitLabels, singleFractional) {
		var i, unit, unitDivisor, unitLabel;

		if (baseNumber === 0) {
			return "0 " + unitLabels[unitLabels.length - 1];
		}
		
		if (singleFractional) {
			unit = baseNumber;
			unitLabel = unitLabels.length >= unitDivisors.length ? unitLabels[unitDivisors.length - 1] : "";
			for (i = 0; i < unitDivisors.length; i++) {
				if (baseNumber >= unitDivisors[i]) {
					unit = (baseNumber / unitDivisors[i]).toFixed(2);
					unitLabel = unitLabels.length >= i ? " " + unitLabels[i] : "";
					break;
				}
			}
			
			return unit + unitLabel;
		} else {
			var formattedStrings = [];
			var remainder = baseNumber;
			
			for (i = 0; i < unitDivisors.length; i++) {
				unitDivisor = unitDivisors[i];
				unitLabel = unitLabels.length > i ? " " + unitLabels[i] : "";
				
				unit = remainder / unitDivisor;
				if (i < unitDivisors.length -1) {
					unit = Math.floor(unit);
				} else {
					unit = unit.toFixed(2);
				}
				if (unit > 0) {
					remainder = remainder % unitDivisor;
					
					formattedStrings.push(unit + unitLabel);
				}
			}
			
			return formattedStrings.join(" ");
		}
	};
	
	comiis_SWFUpload.speed.formatBPS = function (baseNumber) {
		var bpsUnits = [1073741824, 1048576, 1024, 1], bpsUnitLabels = ["Gbps", "Mbps", "Kbps", "bps"];
		return comiis_SWFUpload.speed.formatUnits(baseNumber, bpsUnits, bpsUnitLabels, true);
	
	};

	comiis_SWFUpload.speed.formatMbs = function (baseNumber) {
		var bpsUnits = [1073741824, 1048576, 1024, 1], bpsUnitLabels = ["GB/s", "MB/s", "KB/s", "B/s"];
		return comiis_SWFUpload.speed.formatUnits(baseNumber, bpsUnits, bpsUnitLabels, true);
	
	};

	comiis_SWFUpload.speed.formatTime = function (baseNumber) {
		var timeUnits = [86400, 3600, 60, 1], timeUnitLabels = ["d", "h", "m", "s"];
		return comiis_SWFUpload.speed.formatUnits(baseNumber, timeUnits, timeUnitLabels, false);
	
	};
	comiis_SWFUpload.speed.formatBytes = function (baseNumber) {
		var sizeUnits = [1073741824, 1048576, 1024, 1], sizeUnitLabels = ["GB", "MB", "KB", "bytes"];
		return comiis_SWFUpload.speed.formatUnits(baseNumber, sizeUnits, sizeUnitLabels, true);
	
	};
	comiis_SWFUpload.speed.formatPercent = function (baseNumber) {
		return baseNumber.toFixed(2) + " %";
	};
	
	comiis_SWFUpload.speed.calculateMovingAverage = function (history) {
		var vals = [], size, sum = 0.0, mean = 0.0, varianceTemp = 0.0, variance = 0.0, standardDev = 0.0;
		var i;
		var mSum = 0, mCount = 0;
		
		size = history.length;
		
		// Check for sufficient data
		if (size >= 8) {
			// Clone the array and Calculate sum of the values 
			for (i = 0; i < size; i++) {
				vals[i] = history[i];
				sum += vals[i];
			}

			mean = sum / size;

			// Calculate variance for the set
			for (i = 0; i < size; i++) {
				varianceTemp += Math.pow((vals[i] - mean), 2);
			}

			variance = varianceTemp / size;
			standardDev = Math.sqrt(variance);
			
			//Standardize the Data
			for (i = 0; i < size; i++) {
				vals[i] = (vals[i] - mean) / standardDev;
			}

			// Calculate the average excluding outliers
			var deviationRange = 2.0;
			for (i = 0; i < size; i++) {
				
				if (vals[i] <= deviationRange && vals[i] >= -deviationRange) {
					mCount++;
					mSum += history[i];
				}
			}
			
		} else {
			// Calculate the average (not enough data points to remove outliers)
			mCount = size;
			for (i = 0; i < size; i++) {
				mSum += history[i];
			}
		}

		return mSum / mCount;
	};
	
}


/**
 * Copyright 2012 1Verge, Inc.
 *
 * 基于表单上传和基于HTML5上传程序 
 * 可实现文件的分片存储及断点续传 
 * 支持CORS(Cross-Origin Resource Sharing),可以使用AJAX跨域文件传输及获取数据
 * 
 * 说明： 本程序只是简单介绍接口的使用方式，及上传逻辑
 * 代码本身不严谨，仅供参考
 */
var URI = "https://api.youku.com/";

(function(){
	var updateSpeedTimer = null;
    var uploadStatus = {
        loaded: 0,
        total: 0,
		prvtime:0
    };
    var PORTION =  1024*1024*10;
	var fileSizeLimit = 1024*1024*1024;

    var uploadOptions = {
        upload_token: "",
        upload_url: "",
        api_url: URI,
        client_id: "",
        access_token: ""
    };

	var oauth_redirect_uri = "";
	var oauth_opentype = "";
	var oauth_state = "";
	var completeCallback = "";
	var categoryCallback = "";

	var localUploadFileSize = 0;

	var isCancelUpload = false;

	window.youkuUploadInit = youkuUploadInit;
	function youkuUploadInit(param){
		
		browserJudge();
		uploadOptions.client_id = param.client_id;
		uploadOptions.access_token = param.access_token;
		oauth_redirect_uri = param.oauth_redirect_uri;
		oauth_opentype = param.oauth_opentype;
		oauth_state = param.oauth_state;
		completeCallback = param.completeCallback;
		categoryCallback = param.categoryCallback?param.categoryCallback:'';
		loadUploadDom();
	}

	window.browserJudge = browserJudge;
	function browserJudge(){
		USE_STREAM_UPLOAD = false;
		var browser = 'null';
		if(navigator.userAgent.indexOf("iPhone")>0){
				USE_STREAM_UPLOAD = true;
				browser = 'iphonebrowers';
		}

		if(navigator.userAgent.indexOf("Firefox")>0){
				USE_STREAM_UPLOAD = true;
				browser = 'ff';
		}

		if(navigator.userAgent.indexOf("Chrome")>0){
				USE_STREAM_UPLOAD = true;
				browser = 'chrome';
		}

		if(navigator.userAgent.indexOf("Safari")>0 && navigator.userAgent.indexOf("Chrome")<=0) { 
			USE_STREAM_UPLOAD = true;
			browser = 'safari';
		} 
		return browser;
	}

	var loadUploadDom = function (){
			if(!USE_STREAM_UPLOAD){
					var htmlStr = '<input type="text" id="txtFileName" name="new_Filedata" disabled="true" class="uploadfile"> <span id="spanButtonPlaceholder"></span>';
					jQuery("#uploadControl").html(htmlStr);
					loadcomiis_SWFUpload();
			}else{
					var htmlStr = '<input class="input-file" id="fileInput" type="file" name="new_Filedata">';
					jQuery("#uploadControl").html(htmlStr);
			}
			
			jQuery("#btn-upload-start").unbind('click');
			jQuery("#btn-upload-start").click(function(event){
				event.preventDefault(); 
				createUploadTask();
			});

		jQuery("#public_type1").unbind('click');
		jQuery("#public_type1").click(function(event){
			jQuery("#passwrod").hide();
		});

		jQuery("#public_type2").unbind('click');
		jQuery("#public_type2").click(function(event){
		   jQuery("#passwrod").hide();
		});

		jQuery("#public_type3").unbind('click');
		jQuery("#public_type3").click(function(event){
			jQuery("#passwrod").show();
		});

		jQuery("#fileInput").unbind();
		jQuery("#fileInput").click(function(){
			if(jQuery("#needsubject").val() == '' && jQuery("input[name='topicsubmit']").length > 0){
				popup.open("请先输入帖子标题", 'alert');
				return false;
			}
		});
		jQuery("#fileInput").change(function(){
			jQuery('#youku-upload_title').show();
			fileSizeOver(jQuery(this)[0].files[0]);
			var fileName = jQuery(this)[0].files[0].name;
			var name = (jQuery("input[name='topicsubmit']").length > 0 ? jQuery("#needsubject").val() : fileName.substring(0, fileName.lastIndexOf(".")));
			var newName = substr(name,56);
			jQuery("div[name='video-upload'] input[name='title']").val(newName);
			jQuery("div[name='video-upload'] textarea[name='description']").val(name);
			createUploadTask();
		});
		var tpl = '<option value="TV">电视剧</option><option value="Movies">电影</option><option value="Variety">综艺</option><option value="Anime">动漫</option><option value="Music">音乐</option><option value="Education">教育</option><option value="Documentary">纪实</option><option value="News">资讯</option><option value="Entertainment">娱乐</option><option value="Sports">体育</option><option value="Autos" >汽车</option><option value="Tech">科技</option><option value="Games">游戏</option><option value="LifeStyle">生活</option><option value="Fashion">时尚</option><option value="Travel">旅游</option><option value="Parenting">亲子</option><option value="Humor">搞笑</option><option value="Wdyg">微电影</option><option value="Wgju">网剧</option><option value="Pker" selected="">拍客</option><option value="Chyi">创意视频</option><option value="Zpai">自拍</option><option value="Ads">广告</option><option value="Others">其他</option>';
		jQuery("#category-node").html(tpl);

	}

	var fileSizeOver = function(file){
		var fileSize = file.fileSize || file.size;
		var result = false;
		if(fileSize >fileSizeLimit){
			popup.open("视频文件大小超过限制，请缩小视频文件后重新选择文件", 'alert');
			result = true;
		}
		return result;
	}

    // 表单形式上传视频
    var uploadFormData = function (){
        var file = jQuery("div[name='video-upload'] input[name='new_Filedata']")[0].files[0];
        var fileSize = file.fileSize || file.size;
        var formData = new FormData();
        formData.append("new_Filedata",file);
        var xhr = new XMLHttpRequest();
        xhr.upload.onprogress = function(e){
            if (e.lengthComputable){
                progress(e.loaded, fileSize);
            }
        };
        xhr.onload = function(){
            var response = eval("(" + this.responseText + ")");
            if (response["upload_server_name"]) {
                success(response["upload_server_name"]);
            } else {
                popup.open("上传文件失败", 'alert');
            }
        }
        xhr.open("post",uploadOptions["upload_url"],true);
		xhr.setRequestHeader('Content-Type', 'multipart/form-data; charset=utf-8');
        xhr.send(formData);
    };

    // 上传视频
	window.uploadStreamData = uploadStreamData;
    var uploadStreamData = function (start){
		if(!isCancelUpload){
			var file = jQuery("div[name='video-upload'] input[name='new_Filedata']")[0].files[0];
			var fileSize = file.fileSize || file.size;
			var blob = null;
			var start = start || 0;
			if(start == 0){
				var obj = getLocalData(fileSize);
				localUploadFileSize = fileSize;
				if(obj != null){
					var uploadUrl = obj.uploadurl;
					uploadOptions["upload_url"] = uploadUrl;
					uploadOptions["upload_token"] = obj.uploadtoken;
					getUploadFileSize(uploadUrl,{call:function(size){
							uploadStreamData(size);
					}});
					return;
				}else{
					//写入本地数据
					setLocalData(fileSize,{uploadurl:uploadOptions["upload_url"],uploadtoken:uploadOptions["upload_token"]});
				}
			}
			if (file.slice){
				blob = file.slice(start,start + PORTION);
			}else if(file.webkitSlice){
				blob = file.webkitSlice(start,start + PORTION);
			}else if(file.mozSlice){
				blob = file.mozSlice(start,start + PORTION);
			}else{
				blob  = file;
				start = 0; 
			} 
			var xhr = new XMLHttpRequest();
			var ranges = "bytes " + (start + 1) + "-" + (start + blob.size) + "/" + fileSize;
			xhr.upload.onprogress = function(e){
				if (e.lengthComputable){
					progress(e.loaded + start, fileSize);
				}
			};
			xhr.onload = function(){
				try {
					var response = eval("(" + this.responseText + ")");
					if (response["code"]) {
						popup.open(response["description"], 'alert');
					} else {
						if (response["upload_server_name"]) {
							success(response["upload_server_name"]);
						} else {
							var fileTransfered = response["file_transfered"];
							if (fileTransfered != fileSize) {
									uploadStreamData(fileTransfered);
							}
						}
					}
				} catch (e) {
					// throw exception
				}
			}

			//连接已断开
			xhr.onerror = function(){
				//alert("断开");
				localUploadFileSize = fileSize;
				//写入本地数据
				//setLocalData(fileSize,{uploadurl:uploadOptions["upload_url"],uploadtoken:uploadOptions["upload_token"]});
				//重试
				resumeBrokenTransfer(0);
			};
			xhr.open("post",uploadOptions["upload_url"],true);
			xhr.setRequestHeader('Content-Type', 'multipart/form-data; charset=utf-8');
			xhr.setRequestHeader("Content-Range",ranges);
			xhr.send(blob);
		}
    };
	
	window.setLocalData = setLocalData;
	var setLocalData = function(key,data){
		if(window.localStorage){
			localStorage.setItem(key,JSON.stringify(data));
		}
	}

	window.getLocalData = getLocalData;
	var getLocalData = function(key){
		var obj;
		if(window.localStorage){
			obj = JSON.parse(localStorage.getItem(key));
		}
		return obj;
	}

	window.removeLocalData = removeLocalData;
	var removeLocalData = function(key){
		if(window.localStorage){
			localStorage.removeItem(key)
		}
	}
		 
	window.resumeBrokenTransfer = resumeBrokenTransfer;
	var resumeBrokenTransfer = function(count){
		if(count <= 1800){
				var xhr = new XMLHttpRequest();
				xhr.onload = function(){
					//resume network
					var uploadUrl = String(uploadOptions["upload_url"]);
					getUploadFileSize(uploadUrl,{call:function(size){
						uploadStreamData(size);
					}});
				}
				xhr.onerror = function(){
					setTimeout(function(){
						resumeBrokenTransfer(count);
					}, 2000);
				};
				xhr.open("post",uploadOptions["upload_url"],true);
				xhr.setRequestHeader('Content-Type', 'multipart/form-data; charset=utf-8');
				xhr.send(null);
				count++
		}
	}

	window.getUploadFileSize = getUploadFileSize;
	var getUploadFileSize = function(url,callback){
		var xhrObj = new XMLHttpRequest();
		xhrObj.onload = function(){
			try {
				if(xhrObj.status == 308){
					var header = xhrObj.getResponseHeader("Range");
					var ranges = header.match(/-(.*)/);
					if(ranges.length == 2){
						var uploadsize = parseInt(ranges[1],10);
						callback.call(uploadsize);
					}
				}else{
					removeLocalData(localUploadFileSize);
					createUploadTask();
				}
			} catch (e) {
				//removeLocalData(localUploadFileSize);
				//createUploadTask();
				popup.open("上传接口异常，请重新上传", 'alert');
			}
		}
		xhrObj.open("post",url,true);
		xhrObj.setRequestHeader("Content-Range",'bytes */*');
		xhrObj.send();
	}

    var startVideoUpload = function (upload_token){
        uploadOptions["upload_token"] = upload_token;

        if (window['USE_STREAM_UPLOAD']) {
            var url = "http://upload.youku.com/api/get_server_address/?" + "upload_token=" + upload_token;
            jQuery.ajax({
                type: 'POST',
                url: url,
                dataType: "JSON", 
                success:function(data) { 
                    if (data.server_address) {
                        uploadOptions["upload_url"] = "http://" + data.server_address + "/api/upload/?" + "upload_token=" + upload_token;
                    } else {
                        uploadOptions["upload_url"] = "http://upload.youku.com/api/upload/?" + "upload_token=" + upload_token;
                    }
                    uploadStreamData();
                }
            });
        } else {
            uploadOptions["upload_url"] = "http://upload.youku.com/api/upload_form_data/?" + "upload_token=" + upload_token;
			swfu.setUploadURL(uploadOptions["upload_url"]);
			swfu.startUpload();
        }
    }

    var progress = function (loaded,total){
        var percent = Math.round((loaded / total)*100) + '%';
        jQuery("#upload-status-wraper .bar").attr("style","width:" + percent);
        uploadStatus.loaded = loaded;
        uploadStatus.total = total;
        if(updateSpeedTimer && loaded == total){
            clearTimeout(updateSpeedTimer);
        }
        if(!updateSpeedTimer){
            updateSpeedTimer = setTimeout(function(){
					updateSpeed(loaded);
            },1000)
        }
    };

    var secondsToTime = function (secs) { // we will use this function to convert seconds in normal time format
        var hr = Math.floor(secs / 3600);
        var min = Math.floor((secs - (hr * 3600))/60);
        var sec = Math.floor(secs - (hr * 3600) -  (min * 60));

        if (hr < 10) {hr = "0" + hr; }
        if (min < 10) {min = "0" + min;}
        if (sec < 10) {sec = "0" + sec;}
        return hr + ':' + min + ':' + sec;
    };

    var updateSpeed =  function(prevLoaded){
        if(updateSpeedTimer){
            clearTimeout(updateSpeedTimer);
        }
        var loaded = uploadStatus.loaded;
        var total = uploadStatus.total;
        var fileUploader = this;
        var prevLoaded = prevLoaded || 0;
        var speed = (loaded - prevLoaded) * 2;
		
		if(speed == 0){
			var time = uploadStatus.prvtime;
		}else{
			var time = (total - loaded) / speed;
			uploadStatus.prvtime = time;
		}
			

        var tpl = "";

        if (speed > 1024*1024) {
            tpl += Math.round(speed / (1024 * 1024) * 100)/100 + ' MB/s | ';
        } else {
            tpl += Math.round(speed / 1024 * 100)/100 + ' KB/s | ';
            //tpl += secondsToTime(time) + ' | ';
            //tpl += Math.round(loaded / total * 10000)/100 + ' % | ';
            //tpl += Math.round(loaded/ 1024 * 100)/100 + ' KB / ' + Math.round(total/ 1024 * 100)/100 + " KB";
        }
	
		tpl += secondsToTime(time) + ' | ';

	
		tpl += Math.round(loaded / total * 10000)/100 + ' % | ';
		tpl += Math.round(loaded/ (1024 * 1024) * 100)/100 + ' MB / ' + Math.round(total/ (1024 * 1024) * 100)/100 + " MB";
        jQuery("#upload-status-wraper .progress-extended").html(tpl);
        updateSpeedTimer = setTimeout(function(){
				updateSpeed(loaded);
        },500);
    };
	window.success = success;
	function success(server_name){
		if(!isCancelUpload){
			var params = {
				client_id: uploadOptions["client_id"],
				access_token: uploadOptions["access_token"],
				upload_token: uploadOptions["upload_token"], 
				upload_server_name: server_name
			};

			jQuery.ajax({
				type: 'POST',
				url: uploadOptions["api_url"] + "uploads/commit.json",
				data: params,
				dataType: "JSONP", 
				success:function(data) { 
					if(browserJudge() == "chrome"){
						jQuery(window).unbind("unload");
						jQuery(window).unbind("beforeunload");
					}else{
						jQuery(window).unbind("beforeunload");
					}
					if (data.video_id) {
						jQuery("#upload-status-wraper").hide();
						if(completeCallback != ""){
							var temp=new   Object(); 
							temp.videoid= data.video_id;
							temp.title= window.uploadTitle;
							window.tempObject = temp; 
							eval("window."+completeCallback+"(window.tempObject)");	
						}
						
						if(USE_STREAM_UPLOAD){
							if(localUploadFileSize > 0){
								removeLocalData(localUploadFileSize);
							}
						}
						
					}else {
						jQuery("#upload-status-wraper").html('<div class="alert alert-success"><h1>上传失败！</h1></div>');
					}
				}
			});
		}
    }
	 // 取消上传任务
    var cancelUploadTask = function (uploadToken){
		isCancelUpload = true;
		if (!window['USE_STREAM_UPLOAD']) {
			swfu.cancelQueue();
		}
		 var params = {
                client_id: uploadOptions["client_id"],
                access_token: uploadOptions["access_token"],
                upload_token: uploadToken
        };
		jQuery.ajax({
            type: 'POST',
            url: uploadOptions["api_url"] + "uploads/cancel.json",
            data: params,
			dataType: "JSONP", 
            success:function(data) { 
				if(browserJudge() == "chrome"){
					jQuery(window).unbind("unload");
					jQuery(window).unbind("beforeunload");
				}else{
					jQuery(window).unbind("beforeunload");
				}
                if (data.upload_token) {
                   uploadagain();
                }else {
                    popup.open("取消上传任务失败", 'alert');
                }
            }
        });
	}

    // 创建上传任务
    var createUploadTask = function (){
		isCancelUpload = false;
        var params = {
                title: jQuery("div[name='video-upload'] input[name='title']").val(),
                description: jQuery("div[name='video-upload'] textarea[name='description']").val(),
                category: jQuery("div[name='video-upload'] select[name='category']").val(),
                tags: jQuery("div[name='video-upload'] input[name='up_tags']").val(),
                copyright_type: jQuery("div[name='video-upload'] input[name='copyright_type']:checked").val(),
                public_type: jQuery("div[name='video-upload'] input[name='public_type']:checked").val(),
                client_id: uploadOptions["client_id"],
                access_token: uploadOptions["access_token"],
                file_name: jQuery("div[name='video-upload'] input[name='new_Filedata']").val(),
                isweb:1,
        };

		if(USE_STREAM_UPLOAD){
			var file = jQuery("#fileInput")[0].files[0];
			var sizeOver = fileSizeOver(file);
			if(sizeOver){
				return false;
			}
		}
		
		if(jQuery.trim(params.title) == ""){
			popup.open("标题不能为空", 'alert');
			return;
		}
		if(jQuery.trim(params.tags) == ""){
			popup.open("标签不能为空", 'alert');
			return;
		}
		window.uploadTitle = params.title;
		if(params["public_type"] == "password") {
			params["watch_password"] = jQuery("div[name='video-upload'] input[name='watch_password']").val();
		}
		
		obj = null;
		if(USE_STREAM_UPLOAD){
			var file = jQuery("div[name='video-upload'] input[name='new_Filedata']")[0].files[0];
			var fileSize = file.fileSize || file.size;
			localUploadFileSize = fileSize;
			var obj = getLocalData(fileSize);
		}

		if(obj != null){
			initUploadInfo();
			jQuery("#btn-upload-stop").click(function(event){
				cancelUploadTask(obj.uploadtoken);
			});

			var uploadUrl = obj.uploadurl;
			uploadOptions["upload_url"] = uploadUrl;
			uploadOptions["upload_token"] = obj.uploadtoken;
			getUploadFileSize(uploadUrl,{call:function(size){
							uploadStreamData(size);
			}});
		}else{
			jQuery.ajax({
				type: 'POST',
				url: uploadOptions["api_url"] + "uploads/create.json",
				data: params,
				dataType: "JSONP", 
				success:function(data) { 
					var uploadToken = data.upload_token;
					if (uploadToken) {
						initUploadInfo();
						jQuery("#btn-upload-stop").click(function(event){
							cancelUploadTask(uploadToken);
						});
						startVideoUpload(data.upload_token);
					} else {
						var code = data.error.code;
							var error = "";
							switch(code){
								case 1001:
									error = "服务临时不可用";
									break;
								case 1002:
									error = "服务数据出现异常";
									break;
								case 1003:
									error = "IP限制访问";
									break;
								case 1004:
									error = "客户ID为空";
								case 1005:
									error = "客户ID无效";
									break;
								case 1006:
									error = "无权限调用,需要高级别";
									break;
								case 1007:
									error = "Access token为空";
									break;
								case 1008:
									error = "Access token无效";
									break;
								case 1009:
									error = "Access token过期,需刷新";
									break;
								case 1010:
									error = "请求必须是POST方式";
									break;
								case 1011:
									error = "不支持这种数据格式";
									break;
								case 1012:
									error = "缺失必须参数";
									break;
								case 1013:
									error = "无效的参数";
									break;
								case 1014:
									error = "超出最大匹配限额";
									break;
								case 1015:
									error = "客户 SECRET 为空";
									break;
								case 1016:
									error = "客户 SECRET 无效";
									break;
								case 120010101:
									error = "标题不能为空";
									break;
								case 120010102:
									error = "标题最多填写30个字";
									break;
								case 120010103:
									error = "标题不可以只用数字表示，请补充或使用简洁明确的文字";
									break;
								case 120010104:
									error = "标题含有网站禁止内容，请您更换其他标题";
									break;
								case 120010111:
									error = "此用户已经上传过该视频";
									break;
								case 120010121:
									error = "标签不能为空";
									break;
								case 120010122:
									error = "您定义的标签个数超过了10个，请删除标签个数";
									break;
								case 120010123:
									error = "标签中含有敏感字符";
									break;
								case 120010124:
									error = "单个标签最少2个字母";
									break;
								case 120010125:
									error = "单个标签最多12个字母";
									break;
								case 120010126:
									error = "单个标签最少2个汉字";
									break;
								case 120010127:
									error = "单个标签最多6个汉字";
									break;
								case 120010131:
									error = "分类不能为空";
									break;
								case 120010132:
									error = "您选择的分类个数超过了1个，请减少分类选择个数";
									break;
								case 120010141:
									error = "描述信息含有网站禁止内容，请检查并重新提交";
									break;
								case 120010142:
									error = "描述信息最多能填写2000个字符";
									break;
								case 120010145:
									error = "观看密码必须字母数字组成，做多32位";
									break;
								case 120010151:
									error = "上传任务无效";
									break;
								case 120010152:
									error = "插入视频出错";
									break;
							}
							popup.open(code+error, 'alert');
					}
				}
			});

		}
    };
	// 初始化上传过程视频信息
	window.initUploadInfo = initUploadInfo;
    var initUploadInfo = function (){
		var tpl = '<div class="comiis_p12 f_c b_b" style="overflow:hidden;"><h1>正在上传视频</h1><p>请不要关闭浏览器，此操作会造成上传失败!';
		tpl += '<br>上传需要一段时间，请耐心等待.</p><div class="progress progress-striped">';
		tpl += '<div class="bar" style="width:1%"></div></div><div class="f_d">';
		tpl +=  '<span id="tdCurrentSpeed">00.00 kbit/s</span> | <span id="tdTimeRemaining">00:00:00</span> | <span id="tdPercentUploaded">00.00 %</span> | <span id="tdSizeUploaded">00.00 KB</span> / <span id="bytestotal">00.00 KB</span></div><button type="button" class="comiis_sendbtn bg_a f_f mt10" id="btn-upload-stop"><span>取消上传</span></button></div>';
		var form = jQuery("div[name='video-upload']");
		form.removeClass();
		form.attr("style","width:0px;height:0px;overflow:hidden;");
		jQuery('#youku-upload_title').hide();
		jQuery("#upload-status-wraper").html(tpl);
		var alertStr = "您正在上传视频，关闭此页面将会中断上传，建议您等待上传完成后再关闭此页面。";
		if(browserJudge() == "chrome"){
			jQuery(window).unbind("unload");
			jQuery(window).bind("unload",function(){
				return alertStr;
			});
			
			jQuery(window).unbind("beforeunload");
			jQuery(window).bind("beforeunload",function(){
				return alertStr;
			});
		}else{
			jQuery(window).unbind("beforeunload");
			jQuery(window).bind("beforeunload",function(){
				return alertStr;
			});
		}
	}

	window.uploadagain = uploadagain;
	function uploadagain(){
		updateSpeedTimer = null;
		if(!USE_STREAM_UPLOAD){
			swfu.destroy();
		}
		var obj = jQuery("#upload-status-wraper");
		obj.empty();
		obj.show();
		loadUploadDom();
		var form = jQuery("div[name='video-upload']");
		form.addClass("well form-horizontal");
		form.attr("style","");
	}

	window.fileDialogStart = fileDialogStart;
	function fileDialogStart(){
		var txtFileName = document.getElementById("txtFileName");
		txtFileName.value = "";
		swfu.cancelUpload();
	}
	
	window.fileQueued = fileQueued;
	function fileQueued(file){
				try {
					var txtFileName = document.getElementById("txtFileName");
					txtFileName.value = file.name;
					var fileName = file.name;
					var name = fileName.substring(0, fileName.lastIndexOf("."));
					var newName = substr(name,56);
					jQuery("div[name='video-upload'] input[name='title']").val(newName);
					jQuery("div[name='video-upload'] textarea[name='description']").val(name);
				} catch (e) {
				}
	}
	
	window.uploadSuccess = uploadSuccess;
	function uploadSuccess(file, serverData){
		var data = eval("(" + serverData + ")");
		 if (data.upload_server_name) {
				var serverData = data.upload_server_name;
				success(serverData);
		 }else{
			popup.open("文件上传失败error="+data.error.code, 'alert');
		 }
	}

	window.uploadComplete = uploadComplete;
	function uploadComplete(){
				
	}
	
	window.uploadProgress = uploadProgress;
	function uploadProgress(file, bytesLoaded, bytesTotal) {
		var percent = Math.round((bytesLoaded / bytesTotal)*100) + '%';
		jQuery("#upload-status-wraper .bar").attr("style","width:" + percent);
		jQuery("#bytestotal").text(Math.round(bytesTotal/ (1024 * 1024) * 100)/100 + ' MB');
		updateDisplay.call(this, file);
	}

	window.fileQueueError = fileQueueError;
	function fileQueueError(file, errorCode, message)  {
		try {
			// Handle this error separately because we don't want to create a FileProgress element for it.
			switch (errorCode) {
			case comiis_SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
				popup.open("您选择的文件过多.\n" + (message === 0 ? "上传文件数量被限制." : "请选择 " + (message > 1 ? "大于 " + message + "个文件." : "一个文件.")), 'alert');
				return;
			case comiis_SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
				popup.open("文件过大.", 'alert');
				return;
			case comiis_SWFUpload.QUEUE_ERROR.ZERO_BYTE_FILE:
				popup.open("文件选择是空，请选择其他文件.", 'alert');
				return;
			case comiis_SWFUpload.QUEUE_ERROR.INVALID_FILETYPE:
				popup.open("该文件类型不允许上传.", 'alert');
				return;
			default:
				popup.open("上传出现错误，请再试一次.", 'alert');
				return;
			}
		} catch (e) {
		}
	}
	
	window.uploadError = uploadError;
	function uploadError(file, errorCode, message) {
		try {
			if (errorCode === comiis_SWFUpload.UPLOAD_ERROR.FILE_CANCELLED) {
				// Don't show cancelled error boxes
				return;
			}
			
			var txtFileName = document.getElementById("txtFileName");
			txtFileName.value = "";
			
			// Handle this error separately because we don't want to create a FileProgress element for it.
			switch (errorCode) {
			case comiis_SWFUpload.UPLOAD_ERROR.MISSING_UPLOAD_URL:
				popup.open("配置错误，请稍候重试", 'alert');
				return;
			case comiis_SWFUpload.UPLOAD_ERROR.UPLOAD_LIMIT_EXCEEDED:
				popup.open("只能上传一个文件", 'alert');
				return;
			case comiis_SWFUpload.UPLOAD_ERROR.FILE_CANCELLED:
			case comiis_SWFUpload.UPLOAD_ERROR.UPLOAD_STOPPED:
				break;
			default:
				popup.open("上传错误，请重试!"+errorCode, 'alert');
				return;
			}
		
		} catch (ex) {
		}
	}

	function loadcomiis_SWFUpload(){
		settings_object = {
			file_post_name: "new_Filedata",

			file_size_limit : "1024 MB",
			file_types : "*.wmv;*.avi;*.dat;*.asf;*.rm;*.rmvb;*.ram;*.mpg;*.mpeg;*.3gp;*.mov;*.mp4;*.m4v;*.dvix;*.dv;*.dat;*.mkv;*.flv;*.vob;*.ram;*.qt;*.divx;*.cpk;*.fli;*.flc;*.mod",			
			file_types_description : "Video Files",
			file_upload_limit : "1",
			file_queue_limit : "1",
			
			flash_url : "http://cloud.youku.com/assets/lib/comiis_SWFUpload/comiis_SWFUpload2.swf",
			
			// Button settings
			button_image_url: "http://cloud.youku.com/assets/lib/images/XPButtonUploadText_61x22x4.png",
			button_width: "63",
			button_height: "22",
			button_placeholder_id: "spanButtonPlaceholder",

			// Event handler settings
			//comiis_SWFUpload_loaded_handler : comiis_SWFUploadLoaded,

			file_dialog_start_handler: fileDialogStart,
			file_queued_handler : fileQueued,
			file_queue_error_handler : fileQueueError,
			//file_dialog_complete_handler : fileDialogComplete,

			upload_progress_handler : uploadProgress,
			upload_error_handler : uploadError,
			upload_success_handler : uploadSuccess,
			upload_complete_handler : uploadComplete,

			// Debug settings
			debug: false
		};
		swfu = new comiis_SWFUpload(settings_object);
	}
	
	window.continueUpload = continueUpload;
	function continueUpload(access_token){
				jQuery("#login").hide();
				jQuery("#login").html("");
				uploadOptions.access_token = access_token;
				jQuery("#btn-upload-start").click();
	}

	window.updateDisplay = updateDisplay;
	function updateDisplay(file) {	 
		jQuery("#tdCurrentSpeed").text(comiis_SWFUpload.speed.formatMbs(file.currentSpeed/8));
		jQuery("#tdTimeRemaining").text(comiis_SWFUpload.speed.formatTime(file.timeRemaining));
		jQuery("#tdPercentUploaded").text(comiis_SWFUpload.speed.formatPercent(file.percentUploaded));
		jQuery("#tdSizeUploaded").text(comiis_SWFUpload.speed.formatBytes(file.sizeUploaded));
	}

	window.substr = substr;
	function substr(str, len){
		if(!str || !len) {
				return ''; 
			}      
			var a = 0;
			var i = 0;      
			var temp = '';      
			for (i=0;i<str.length;i++){         
				if (str.charCodeAt(i)>255){                   
					a+=2;         
				}         
				else         
				{             
					a++;         
				}         
				if(a > len) { 
					return temp; 
				}          
				temp += str.charAt(i);     
			}      
			return str; 
	}
})();

