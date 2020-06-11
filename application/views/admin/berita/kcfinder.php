
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>KCFinder: /files</title>
<link href="<?= base_url() ?>assets/kcfinder/css.php?type=files" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>assets/kcfinder/themes/oxygen/style.css" rel="stylesheet" type="text/css" />
<script src="<?= base_url() ?>assets/kcfinder/js/jquery.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/kcfinder/js/jquery.rightClick.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/kcfinder/js/jquery.drag.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/kcfinder/js/helper.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/kcfinder/js/browser/joiner.php" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/kcfinder/js_localize.php?lng=en" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/kcfinder/themes/oxygen/init.js" type="text/javascript"></script>
<script type="text/javascript">
browser.version = "2.51";
browser.support.chromeFrame = <br />
<b>Notice</b>:  Undefined index: HTTP_USER_AGENT in <b>D:\Xampp\htdocs\elearning\assets\kcfinder\tpl\tpl_javascript.php</b> on line <b>15</b><br />
false;
browser.support.zip = true;
browser.support.check4Update = true;
browser.lang = "en";
browser.type = "files";
browser.theme = "oxygen";
browser.access = {"files":{"upload":true,"delete":true,"copy":true,"move":true,"rename":true},"dirs":{"create":true,"delete":true,"rename":true}};
browser.dir = "files";
browser.uploadURL = "/elearning/assets/kcfinder/upload";
browser.thumbsURL = browser.uploadURL + "/.thumbs";
browser.cms = "";
_.kuki.domain = "";
_.kuki.path = "/";
_.kuki.prefix = "KCFINDER_";
$(document).ready(function() {
    browser.resize();
    browser.init();
    $('#all').css('visibility', 'visible');
});
$(window).resize(browser.resize);
</script>
</head>
<body>
<script type="text/javascript">
$('body').noContext();
</script>
<div id="resizer"></div>
<div id="shadow"></div>
<div id="dialog"></div>
<div id="alert"></div>
<div id="clipboard"></div>
<div id="all">
<div id="left">
    <div id="folders"></div>
</div>
<div id="right">
    <div id="toolbar">
        <div>
        <a href="kcact:upload">Upload</a>
        <a href="kcact:refresh">Refresh</a>
        <a href="kcact:settings">Settings</a>
        <a href="kcact:maximize">Maximize</a>
        <a href="kcact:about">About</a>
        <div id="loading"></div>
        </div>
    </div>
    <div id="settings">

    <div>
    <fieldset>
    <legend>View:</legend>
        <table summary="view" id="view"><tr>
        <th><input id="viewThumbs" type="radio" name="view" value="thumbs" /></th>
        <td><label for="viewThumbs">&nbsp;Thumbnails</label> &nbsp;</td>
        <th><input id="viewList" type="radio" name="view" value="list" /></th>
        <td><label for="viewList">&nbsp;List</label></td>
        </tr></table>
    </fieldset>
    </div>

    <div>
    <fieldset>
    <legend>Show:</legend>
        <table summary="show" id="show"><tr>
        <th><input id="showName" type="checkbox" name="name" /></th>
        <td><label for="showName">&nbsp;Name</label> &nbsp;</td>
        <th><input id="showSize" type="checkbox" name="size" /></th>
        <td><label for="showSize">&nbsp;Size</label> &nbsp;</td>
        <th><input id="showTime" type="checkbox" name="time" /></th>
        <td><label for="showTime">&nbsp;Date</label></td>
        </tr></table>
    </fieldset>
    </div>

    <div>
    <fieldset>
    <legend>Order by:</legend>
        <table summary="order" id="order"><tr>
        <th><input id="sortName" type="radio" name="sort" value="name" /></th>
        <td><label for="sortName">&nbsp;Name</label> &nbsp;</td>
        <th><input id="sortType" type="radio" name="sort" value="type" /></th>
        <td><label for="sortType">&nbsp;Type</label> &nbsp;</td>
        <th><input id="sortSize" type="radio" name="sort" value="size" /></th>
        <td><label for="sortSize">&nbsp;Size</label> &nbsp;</td>
        <th><input id="sortTime" type="radio" name="sort" value="date" /></th>
        <td><label for="sortTime">&nbsp;Date</label> &nbsp;</td>
        <th><input id="sortOrder" type="checkbox" name="desc" /></th>
        <td><label for="sortOrder">&nbsp;Descending</label></td>
        </tr></table>
    </fieldset>
    </div>

    </div>
    <div id="files">
        <div id="content"></div>
    </div>
</div>
<div id="status"><span id="fileinfo">&nbsp;</span></div>
</div>
</body>
</html>
