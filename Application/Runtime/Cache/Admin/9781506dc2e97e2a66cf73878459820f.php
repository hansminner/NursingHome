<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/NursingHome/Public/css/bootstrap.css">
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">后台管理</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        编辑
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">轮播图</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo U('News/edit_index_news');?>" >头条新闻编辑</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo U('News/news_list');?>">新闻编辑</a></li>
                        <li class="divider"></li>
                        <li><a href="#">其他赛区</a></li>
                        <li class="divider"></li>
                        <li><a href="#">路人/主播</a></li>
                    </ul>
                </li>
                <!--选中效果添加 class="active"-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">游戏资料
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">英雄列表</a></li>
                        <li class="divider"></li>
                        <li><a href="#">装备列表</a></li>
                    </ul>
                </li>

                <li><a href="#">玩家论坛</a></li>
            </ul>
        </div>
        <div id="login_center" class="navbar-header navbar-right">
            <?php if(isset($_SESSION['account'])): ?><div>
                    <a href="<?php echo U('Login/index',['myspace']);?>">mySpace</a>
                    <a href="javascript:void(0)" onclick="logout()" id="logout">Logout</a>
                </div>
                <?php else: ?>
                <div id="login_center_no">
                    <a href="javascript:void(0)" onclick="login()">Login</a>
                    <a href="javascript:void(0)" onclick="login()">Signup</a>
                </div><?php endif; ?>
        </div>
    </div>
</nav>
<script src="/NursingHome/Public/js/logout.js"></script>



    <p>首页编辑</p>
    <div class="index-row">
        <div class="news-ctn">
            <caption>头条新闻编辑</caption>
            <form action="" role="form" class="form-horizontal" method="post">
                <div id="<?php echo ($vo["id"]); ?>">
                    <div class="form-group">
                        <label for="title" class="control-label col-sm-2">题目:</label>
                        <div class="col-sm-10">
                            <input id="title" type="text" value="<?php echo ($vo["title"]); ?>" class="form-control" name="title"
                                   required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="control-label col-sm-2">内容:</label>
                        <div class="col-sm-10">
                            <!--<textarea class="form-control" rows="5" name="content" required><?php echo ($vo["content"]); ?></textarea>-->

                            <!--（WYSIWYG）富文本编辑器-->
                            <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
                                <div class="btn-group">
                                    <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font">
                                        <i class="icon-font"></i><b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                    </ul>
                                </div>
                                <div class="btn-group">
                                    <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i
                                            class="icon-text-height"></i>&nbsp;<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
                                        <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
                                        <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
                                    </ul>
                                </div>
                                <div class="btn-group">
                                    <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i
                                            class="icon-bold"></i></a>
                                    <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i
                                            class="icon-italic"></i></a>
                                    <a class="btn" data-edit="strikethrough" title="Strikethrough"><i
                                            class="icon-strikethrough"></i></a>
                                    <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i
                                            class="icon-underline"></i></a>
                                </div>
                                <div class="btn-group">
                                    <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i
                                            class="icon-list-ul"></i></a>
                                    <a class="btn" data-edit="insertorderedlist" title="Number list"><i
                                            class="icon-list-ol"></i></a>
                                    <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i
                                            class="icon-indent-left"></i></a>
                                    <a class="btn" data-edit="indent" title="Indent (Tab)"><i
                                            class="icon-indent-right"></i></a>
                                </div>
                                <div class="btn-group">
                                    <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i
                                            class="icon-align-left"></i></a>
                                    <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i
                                            class="icon-align-center"></i></a>
                                    <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i
                                            class="icon-align-right"></i></a>
                                    <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i
                                            class="icon-align-justify"></i></a>
                                </div>
                                <div class="btn-group">
                                    <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i
                                            class="icon-link"></i></a>
                                    <div class="dropdown-menu">
                                        <input class="span2" placeholder="URL" type="text" data-edit="createLink"/>
                                        <button class="btn" type="button">Add</button>
                                    </div>
                                    <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i
                                            class="icon-cut"></i></a>

                                </div>


                                <div class="btn-group">
                                    <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i
                                            class="icon-picture"></i></a>
                                    <input type="file" data-role="magic-overlay" data-target="#pictureBtn"
                                           data-edit="insertImage"/>
                                </div>
                                <div class="btn-group">
                                    <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i
                                            class="icon-undo"></i></a>
                                    <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i
                                            class="icon-repeat"></i></a>
                                </div>
                                <input type="text" data-edit="inserttext" id="voiceBtn" x-webkit-speech="">
                            </div>
                            <!--WYSIWYG输入框-->
                            <div class="form-control" id="editor" contenteditable="true"
                                 style="overflow:scroll; /*max-*/height:300px">

                            </div>
                            <input name="content" type="hidden" value="" id="editorContent" required>
                            <!--（WYSIWYG）富文本编辑器-->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="control-label col-sm-2">摘要:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="2" name="summary" required><?php echo ($vo["summary"]); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="control-label col-sm-2">关键词:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="2" name="key_words" required><?php echo ($vo["key_words"]); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="control-label col-sm-2">来源描述:</label>
                        <div class="col-sm-10">
                            <input id="source" type="text" value="<?php echo ($vo["source"]); ?>" class="form-control" name="source"
                                   required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="control-label col-sm-2">来源:</label>
                        <div class="col-sm-10">
                            <input id="cite" type="text" value="<?php echo ($vo["cite"]); ?>" class="form-control" name="cite" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="type" class="control-label col-sm-2">类型:</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="type" required>
                                <?php if(is_array($type_list)): foreach($type_list as $key=>$type_list): ?><option value="<?php echo ($type_list['type_id']); ?>"><?php echo ($type_list['type']); ?></option><?php endforeach; endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">是否头条:</label>
                        <div class="col-sm-10">
                            <select id="" class="form-control" name="is_hot" required>
                                <option value="1">上头条</option>
                                <option value="0">下头条</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="control-label col-sm-2">优先级:</label>
                        <div class="col-sm-10">
                            <input id="priority" type="text" value="<?php echo ($vo["priority"]); ?>" class="form-control" name="priority"
                                   required>
                        </div>
                    </div>
                </div>
                <div class="btn-group btn-group-lg text-center">
                    <button type="submit" class="btn btn-default" onclick="appendContent()">发布新闻</button>
                    <button type="reset" class="btn btn-default">重置</button>
                </div>
            </form>
        </div>
    </div>


<link rel="stylesheet" href="/NursingHome/Public/css/Common/admin_base.css">

<script type="text/javascript" src="/NursingHome/Public/js/logout.js"></script>
<script type="text/javascript" src="/NursingHome/Public/js/lib/jquery-3.2.1.js"></script>
<script type="text/javascript" src="/NursingHome/Public/js/plugin/jquery.validate.js"></script>
<script type="text/javascript" src="/NursingHome/Public/js/plugin/messages_zh.js"></script>
<script type="text/javascript" src="/NursingHome/Public/js/lib/bootstrap.js"></script>
<script type="text/javascript" src="/NursingHome/Public/js/plugin/layer/layer.js"></script>


    <script type="text/javascript" src="/NursingHome/Public/js/plugin/bootstrap-wysiwyg.js"></script>
    <script type="text/javascript" src="/NursingHome/Public/js/plugin/jquery.hotkeys.js"></script>
    <script type="text/javascript">
        $(function () {
            function initToolbarBootstrapBindings() {
                var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
                            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
                            'Times New Roman', 'Verdana'],
                        fontTarget = $('[title=Font]').siblings('.dropdown-menu');
                $.each(fonts, function (idx, fontName) {
                    fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
                });
                $('a[title]').tooltip({container: 'body'});
                $('.dropdown-menu input').click(function () {
                    return false;
                })
                        .change(function () {
                            $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
                        })
                        .keydown('esc', function () {
                            this.value = '';
                            $(this).change();
                        });

                $('[data-role=magic-overlay]').each(function () {
                    var overlay = $(this), target = $(overlay.data('target'));
                    overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
                });
                $('#voiceBtn').hide();
            };
            initToolbarBootstrapBindings();
            $('#editor').wysiwyg();
            //window.prettyPrint && prettyPrint();//格式化代码


            $("#newsForm").validate({
                rules: {
                    title: "required",
                    content: "required",
                    summary: {
                        required: true,
                        maxlength: 50
                    },
                    key_words: "required",
                    priority: "required",
                    source: "required",
                    cite: "required",
                    is_hot: "required",
                    type: "required"
                },
                messages: {
                    title: "请输入新闻题目",
                    content: "请输入文章内容",
                    summary: {
                        required: "请输入文章摘要",
                        maxlength: "摘要最多50字"
                    },
                    key_words: "请输入文章关键词",
                    priority: "请输入优先级",
                    source: "请输入文章来源介绍",
                    cite: "请输入文章来源",
                    is_hot: "是否上热门",
                    type: "请选择文章类型"
                }
            });
        });
        function appendContent() {
            /*
             * todo content的验证
             */
            /*$('#editor').text().validate({
             rules: {
             content: "required",
             },
             messages: {
             content: "请输入新闻题目",
             }
             });*/
            $('#editorContent').val($('#editor').html());
        }

    </script>



    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css"
          rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css"
          rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">

</body>