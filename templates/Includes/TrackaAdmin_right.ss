<div class="title"><div>My admin</div></div>
 
<% if EditForm %>
    $EditForm
<% else %>
    <form id="Form_EditForm" action="admin/my?executeForm=EditForm" method="post" enctype="multipart/form-data">
        <p>Welcome to my $ApplicationName admin section.  Please choose something from the left.</p>
    </form>
<% end_if %>
 
<p id="statusMessage" style="visibility:hidden"></p>