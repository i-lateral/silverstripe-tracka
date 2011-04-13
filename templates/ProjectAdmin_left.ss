<h2><% _t('ProjectAdmin.Title','Projects') %></h2>
<div id="treepanes" style="overflow-y: auto;">
    $LeftMenuForm

    <% if Projects %><ul>
    <ul id="sitetree" class="tree">
        <li id="record-root" class="Root last">
            <a><strong><% _t('ProjectAdmin.TreeTitle','Current Projects') %></strong></a>
            <ul>
                <% control Projects %><li id="record-$ID"><a href="admin/projects/show/$ID">$Title</a></li><% end_control %>
            </ul>
        </li>
    </ul>
    <% end_if %>

</div>