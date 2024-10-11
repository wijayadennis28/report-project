<div class="container">
	<h2 class="my-4 text-center">Data Reports (Dummy and Real Data)</h2>
	<a href="/report/add" class="btn btn-success mb-4">Add New Report</a>

	<table id="reportsTable" class="table table-striped table-bordered">
		<thead class="table-dark">
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Description</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($reports as $report): ?>
				<tr>
					<td><?= $report['id']; ?></td>
					<td><?= $report['title']; ?></td>
					<td><?= $report['description']; ?></td>
					<td>
						<?php if ($report['id'] > 1000): // Check if it's dummy data 
						?>
							<!-- No edit/delete for dummy data -->
							<span class="text-muted">No actions available</span>
						<?php else: ?>
							<!-- Show edit/delete buttons for real data -->
							<a href="/report/edit/<?= $report['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
							<!-- Trigger the modal via the delete button -->
							<a href="javascript:void(0);" class="btn btn-sm btn-danger"
								data-bs-toggle="modal" data-bs-target="#deleteModal"
								data-report-id="<?= $report['id']; ?>">Delete</a>

						<?php endif; ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Are you sure you want to delete this report?
			</div>
			<div class="modal-footer">
				<a href="#" id="confirmDeleteBtn" class="btn btn-danger">Delete</a>
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>

<script>
	// Set the delete link in the modal dynamically
	$('#deleteModal').on('show.bs.modal', function(event) {
		var button = $(event.relatedTarget); // Button that triggered the modal
		var reportId = button.data('report-id'); // Extract report ID
		var deleteUrl = "/report/delete/" + reportId; // Generate delete URL

		var modal = $(this);
		modal.find('#confirmDeleteBtn').attr('href', deleteUrl); // Set the delete button's href
	});
</script>
