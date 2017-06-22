<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>xml</title>
</head>
<body>

<script>
    var parser = new DOMParser();
    var xmldom = parser.parseFromString("<root><child/></root>", "text/xml");
    alert(xmldom.documentElement.tagName);
    alert(xmldom.documentElement.firstChild.tagName);
    var anotherChild = xmldom.createElement("child");
    xmldom.documentElement.appendChild(anotherChild);
    var children = xmldom.getElementsByTagName("child");
    alert(children.length);
</script>
</body>
</html>