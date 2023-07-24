<div
  <% if HasPerm(ADMIN) %>
  data-ss-element="{$ID}"
  data-anchor="$Anchor"
  data-icon="{$IconClassName}"
  data-type="{$Type}"
  data-created-at="{$Created}"
  data-updated-at="{$LastEdited}"
  data-is-on-draft="{$isOnDraft}"
  data-is-published="{$isPublished}"
  data-stages-differ="{$stagesDiffer}"
  data-can-publish="{$canPublish}"
  data-can-publish="{$canPublish}"
  data-can-unpublish="{$canUnpublish}"
  data-can-edit="{$canEdit}"
  data-summary="{$Summary.RAW}"
  <% if $CMSEditLink %>data-href="$CMSEditLink"<% end_if %>
  <% end_if %>
  <% if $StyleVariant %>class="$StyleVariant"<% end_if %>
>$Element</div>
