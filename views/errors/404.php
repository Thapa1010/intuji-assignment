<?php ob_start(); ?>
<main class="mx-4 my-6 md:mx-8 h-full p-8 rounded-lg bg-[#FFFF] flex flex-col justify-center items-center gap-4">
    <h1 class="text-xl font-semibold">Opps! Page Not Found </h1>
    <a href="/" class="gap-1 justify-center align-middle bg-gray-950 py-1 px-4 rounded-md hover:bg-gray-800 text-gray-200">Back to Home</a> 
</main>
<?php $slot = ob_get_clean();
include __DIR__.'/../layouts/master.php';
