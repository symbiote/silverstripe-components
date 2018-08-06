<% if $SubMenu %>
    <% loop $SubMenu %>
        <h2>$Title</h2>
        <% if $Children %>
        <ul>
            <% loop $Children %>
            <li>
                <a class="$LinkingMode" href="$Link">$Title</a>
            </li>
            <% end_loop %>
        </ul>
        <% end_if %>
    <% end_loop %>
<% end_if %>
