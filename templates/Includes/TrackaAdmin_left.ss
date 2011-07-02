<div class="title"><div>Functions</div></div>
 
<div id="treepanes">
<div id="sitetree_holder" style="overflow:auto">
    <% if Items %>
        <ul id="sitetree" class="tree unformatted">
        <li id="$ID" class="root Root"><a>Items</a>
            <ul>
            <% control Items %>
                <li id="record-$class">
                <a href="admin/my/show/$ID">$Title</a>
                </li>
            <% end_control %>
            </ul>
        </li>
        </ul>
    <% end_if %>
</div>
</div>