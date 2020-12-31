<?php $this->extend('layout'); ?>

<?php $this->section('title'); ?>
Feed
<?php $this->endSection(); ?>

<?php $this->section('content') ?>
    <form method="post" action="/post/save">
        <div class="form-group">
            <label for="status" class="required">Status</label>
            <textarea class="form-control" id="status" name="status" rows="3"></textarea>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="location">Location</label>
                    <select class="form-control" name="location" id="location">
                        <?php foreach($locations as $location): ?>
                        <option value="<?php echo $location->id; ?>"><?php echo $location->location; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>    
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="private">Private</label>
                    <select name="private" class="form-control" id="private">
                        <option value="0">Public</option>
                        <option value="1">Private</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" type="text" id="title" name="title">
                </div>
            </div>
            <div class="col">
                <button class="btn btn-lg btn-success">Check In</button>
            </div>
        </div>
    </form>
    <div class="container">
        <?php foreach($posts as $post): ?>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?php echo $post->title; ?></h4>
                        <p class="category"><?php echo $post->status; ?></p>
                    </div>
                    <div class="card-body">
                        from <?php foreach($locations as $location){if($post->location_id == $location->id) echo $location->location;
}?> at <?php echo $post->insertion_datetime; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
<?php $this->endSection() ?>
