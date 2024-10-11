<div class="container">
    <h2 class="my-4 text-center">Edit Report</h2>
    
    <form action="/report/edit/<?= $report['id']; ?>" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="<?= $report['title']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="5" required><?= $report['description']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-warning">Save Changes</button>
        <a href="/" class="btn btn-secondary">Cancel</a>
    </form>
</div>
