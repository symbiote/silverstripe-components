<% if $NestedData %>
  <% loop $NestedData %>
    <h2>$Title</h2>
    <% if $Children %>
      <ul>
      <% loop $Children %>
        <li>
          <h3>$Title</h3>
          <% if $Children %>
            <ul>
            <% loop $Children %>
              <li>
                <h4>$Title</h4>
              </li>
            <% end_loop %>
            </ul>
          <% end_if %>
        </li>
      <% end_loop %>
      </ul>
    <% end_if %>
  <% end_loop %>
<% end_if %> 
