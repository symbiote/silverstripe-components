<ul class="menu menu-count-$Items.Count">
    <% loop $Items %>
        <li class="menu-item menu-item-$Pos">
            $Title
        </li>
    <% end_loop %>
</ul>
