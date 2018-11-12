
<% if $Title %>
  <h1>$Title</h1>
<% end_if %>
<% if $Root1 %>
  <div>
    <% loop $Root1 %>
      <h2>$Title</h2>
    <% end_loop %>
  </div>
<% end_if %>
<% if $Root2 %>
  <div>
    <% loop $Root2 %>
      <h2>$Title</h2>
    <% end_loop %>
  </div>
<% end_if %>