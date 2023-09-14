$(function() {
    $('.addModal').on('click', function() {
        $('#formLabel').html('Add Schedule');
        $('#schedule_id').val('');
        $('#date').val('');
        $('#schedule').val('');
        $('#priority').val('');
    });
    $('.updateModal').on('click', function() {
        $('#formLabel').html('Update Schedule');
        $('.modal-body form').attr('action', 'http://localhost:8080/SiDuL/public/schedule/update');

        const id = $(this).data('id');
        
        $.ajax({
            url: `http://localhost:8080/SiDuL/public/schedule/edit`,
            data: {id : id},
            method : 'post',
            dataType: 'json',
            success: function(data) {
                $('#schedule_id').val(data.schedule_id);
                $('#date').val(data.date);
                $('#schedule').val(data.schedule);
                $('#priority').val(data.priority);
            }
        })
    });
});