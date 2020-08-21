<?php if ($message = session('message')): ?>
    <script type="text/javascript">

    <?php if ($message['type'] == 'success'): ?>
    swal("Success!", `{!! $message['message'] !!}`, "success");
    <?php endif; ?>
    <?php if ($message['type'] == 'error'): ?>
    swal("Error!", `{!! $message['message'] !!}`, "error");
    <?php endif; ?>

    </script>
<?php endif; ?>
