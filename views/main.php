<?php ob_start(); ?>
<?php include __DIR__.'/layouts/navbar.php';?>
<main class="mx-4 my-6 md:mx-8 h-full p-8 rounded-lg bg-[#FFFF]">
    <div class="mt-2 text-xl font-semibold">
        
        <?php
            if(sessionExists('google_auth_code')){
                echo '
                <div class="flex gap-8 justify-middle align-middle items-center">
                    <h1>View your events </h1>
                    <a href="/events" class="bg-gray-100 py-1 px-4 rounded-md hover:border-2 border-gray-800 text-md">View 📆</a>
                </div>';
            }else{
                echo '<h1>Log in to see your calendar! 📆</h1>';
            } 
        ?>
    </div>
</main>

<?php $slot = ob_get_clean();
include __DIR__.'/layouts/master.php'; ?>
