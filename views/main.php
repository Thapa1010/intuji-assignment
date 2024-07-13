<?php ob_start(); ?>
<section>
    <div class="mt-2 text-xl font-semibold">
        <h1>Log in to see your calendar!</h1>
    </div>
</section>

<?php $slot = ob_get_clean();
include __DIR__.'/layouts/master.php'; ?>
