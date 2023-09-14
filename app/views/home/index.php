<div class="container mt-5">
    <div class="row">
        <div class="text-center col-md-6 offset-md-3">
            <?php Flasher::flash(); ?>
        </div>
    </div>
<div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card p-5">                    
                <h1 class="text-center">Calendar 2023</h1>
                <div class="text-center mb-3">
                    <button class="btn btn-primary" id="prevMonth">Previous Month</button>
                    <button class="btn btn-primary" id="nextMonth">Next Month</button>
                </div>
                <div id="calendar"></div>    
                <div class="text-center mb-3">
                <button type="button" class="btn btn-success mb-3 addModal" data-bs-toggle="modal" data-bs-target="#formModal">
                    Add Schedule
                </button>   
            </div>
        </div>
    </div>
</div>

<div><h3 class="text-center m-4 mt-5">Lists Schedule</h3></div>
<div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="event-list">                    
                    <?php foreach ($data as $schedule) : ?>
                    <div class="event">
                        <h2 class="event-title"><?= $schedule['schedule'] ?></h2>
                        <p class="event-date"><?= $schedule['date'] ?></p>                        
                        <a href="<?= BASEURL; ?>/schedule/edit/<?= $schedule['schedule_id'] ?>" class="btn btn-primary updateModal" data-bs-toggle="modal" data-id="<?= $schedule['schedule_id'] ?>" data-bs-target="#formModal">Update</a>
                        <a href="<?= BASEURL; ?>/schedule/delete/<?= $schedule['schedule_id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </div>                                        
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
</div>

<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="formLabel">Add Schedule</h1>                                               
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">                
        <form action="<?= BASEURL; ?>/schedule/create/" method="post">
                <input type="hidden" name="user_id" value="1">
                <input type="hidden" name="schedule_id" id="schedule_id">
                <div class="form-group m-2">
                    <label for="date">Date</label>
                    <input type="date" name="date" class="form-control" id="date">
                </div>
                <div class="form-group m-2">
                    <label for="schedule">Schedule</label>
                    <input type="text" name="schedule" class="form-control" id="schedule" placeholder="Enter your schedule" autocomplete="off">
                </div>
                <div class="form-group m-2">
                <label for="priority">Priority</label>
                    <select class="form-control" name="priority" id="priority">
                        <option value="high">High</option>
                        <option value="medium">Medium</option>
                        <option value="low">Low</option>
                    </select>
                </div>                                            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    </div>
</div>
