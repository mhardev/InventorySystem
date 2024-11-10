<!-- View Audit Trail Modal -->
<div wire:ignore.self class="modal fade" id="showActivityDetailsModal" tabindex="-1" aria-labelledby="showActivityDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="showActivityDetailsModalLabel">Audit Trail Details</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            @if($selectedAuditTrail)
                                <textarea class="form-control" rows="8" style="text-align: start;">{{ $selectedAuditTrail->activity_details }}</textarea>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
