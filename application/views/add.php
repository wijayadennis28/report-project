<div class="container">
	<h2 class="my-4 text-center">Add New Report</h2>

	<form action="/report/add" method="post">
		<div class="mb-3">
			<label for="title" class="form-label">Title</label>
			<input type="text" class="form-control" name="title" placeholder="Enter report title" required>
		</div>
		<div class="mb-3">
			<label for="description" class="form-label">Description</label>
			<textarea class="form-control" name="description" rows="5" placeholder="Enter report description" required></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
		<a href="/" class="btn btn-secondary">Cancel</a>
	</form>
</div>
