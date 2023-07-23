<div
  <% if HasPerm(ADMIN) %>
  data-ss-element="{$ID}"
  data-anchor="$Anchor"
  data-icon="{$IconClassName}"
  data-type="{$Type}"
  data-summary="{$Summary.RAW}"
  <% if $CMSEditLink %>data-href="$CMSEditLink"<% end_if %>
  <% end_if %>
  <% if $StyleVariant %>class="$StyleVariant"<% end_if %>
>$Element</div>
