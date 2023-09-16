<div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Add Schedule</h5>
                        <p class="card-title text-center"><?= $data[0]['date'];?></p>
                        <form action="<?= BASEURL; ?>/schedule/create/" method="post">
                            <input type="hidden" name="date" value="<?= $data[0]['date'];?>">
                            <input type="hidden" name="user_id" value="<?= $data[0]['user_id']; ?>">
                            <div class="form-group m-2">
                                <label for="schedule">Schedule</label>
                                <input type="text" class="form-control" id="schedule" placeholder="Enter your schedule">
                            </div>
                            <div class="form-group m-2">
                            <label for="priority">Priority</label>
                                <select class="form-control" id="priority">
                                    <option value="high">High</option>
                                    <option value="medium">Medium</option>
                                    <option value="low">Low</option>
                                </select>
                            </div>                            
                            <button type="submit" class="btn btn-success btn-block m-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>