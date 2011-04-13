<div id="form_actions_right" class="ajaxActions"></div>

<% if EditForm %>
    $EditForm
<% else %>
    <form id="Form_EditForm" action="admin?executeForm=EditForm" method="post" enctype="multipart/form-data">
        <h1><% _t('ProjectAdmin.Title','Current Projects') %></h1>

        <p><% _t('ProjectAdmin.Selector','Please choose project from the left') %>.</p>
    </form>
<% end_if %>

<p id="statusMessage" style="visibility:hidden"></p>
