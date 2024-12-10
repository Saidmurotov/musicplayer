<div class="popup" id="delete-popup" style="display: none;">
    <div class="popup-content">
        <h2 class="popup-title">Confirm Deletion</h2>
        <p>Are you sure you want to delete this item?</p>
        <form id="delete-form" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
            <button type="button" class="btn btn-secondary" onclick="hideDeletePopup()">Cancel</button>
        </form>
    </div>
</div>
