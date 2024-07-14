<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    function deleteEvent(eventId){
        let confirmed =confirm("Are u sure?\nThe event will be deleted.");
        if(confirmed === true){
            let form = document.getElementById(eventId);
            form.submit();
        }
    }
</script>
<script>
    $(document).ready(function(){
        <?php if (sessionExists('success_message')) {
            echo 'toastr.success("' . getSession('success_message') . '");';
            unsetSession('success_message');
        } ?>

        <?php if (sessionExists('error_message')) {
            echo 'toastr.error("' . getSession('error_message') . '");';
            unsetSession('error_message');
        } ?>
    })
</script>

