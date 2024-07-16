<!-- Full Comment Modal -->
<div class="modal fade" id="fullCommentModal" tabindex="-1" aria-labelledby="fullCommentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="fullCommentModalLabel">Full Comment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Full comment text will be inserted here -->
        <p class="card-text mb-3 comment fst-italic" data-bs-toggle="modal" data-bs-target="#fullCommentModal" data-full-comment=""><span class="comment-tag"><?= htmlspecialchars($movie['comment'] ?? '--Not Set--',15); ?></span></p>
      </div>
    </div>
  </div>
</div>

