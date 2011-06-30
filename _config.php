<?php
// Setup minimal HTMLEditor config
HtmlEditorConfig::get('taskMinimal')->disablePlugins('table');
HtmlEditorConfig::get('taskMinimal')->setButtonsForLine(1, 'pastetext', 'pasteword', 'separator', 'bold', 'italic', 'underline', 'separator', 'bullist', 'numlist');
HtmlEditorConfig::get('taskMinimal')->setButtonsForLine(2);
HtmlEditorConfig::get('taskMinimal')->setButtonsForLine(3);
HtmlEditorConfig::get('taskMinimal')->setOptions(array(
    'body_class'        => 'typography',
    'content_css'       => BASE_URL . "/themes/" . SSViewer::current_theme() . "/css/editor.css",
    'valid_elements'    => "@[id|class|style|title],-strong/-b[class],-em/-i[class],-u[class],#p[id|dir|class|align|style],-ol[class],-ul[class],-li[class],br,-div[id|dir|class|align|style],-span[class|align|style],dd[id|class|title|dir],dl[id|class|title|dir],dt[id|class|title|dir],@[id,style,class]"
));
?>