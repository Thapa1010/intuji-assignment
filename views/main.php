<?php ob_start(); ?>
<?php include __DIR__.'/layouts/navbar.php';?>
<main class="mx-4 my-6 md:mx-8 h-full p-8 rounded-lg bg-[#FFFF]">
    <div class="mt-2 text-xl font-semibold">
        <h1>Log in to see your calendar!</h1>
    </div>
</main>

<?php $slot = ob_get_clean();
include __DIR__.'/layouts/master.php'; ?>
