<?php ob_start(); ?>
<?php include __DIR__.'/layouts/navbar.php';?>
<main class="mx-2 md:mx-4 my-6 md:mx-8 h-full p-2 md:p-8 rounded-lg bg-[#FFFF]">
    <div class="mt-2 text-xl font-semibold">
        <h1 class="text-gray-300 "><a href="/">Home</a> / <a href="/events">Events / </a> <span class="text-gray-400">Create</span></h1>
    </div>
    <section class="flex w-full justify-center">
        <div class="w-full md:w-3/5 p-2 md:6 mt-8 flex flex-col gap-4">
        <form action="/events/store" method="POST">
            <header class="">
                <button type="submit" class="bg-gray-200 py-1 px-4 rounded-md hover:border-2 border-gray-800 text-md font-semibold">Save 📆</button>
            </header>
            <div class="bg-white shadow-md rounded my-2">
            
                <div class="p-8">
                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Create new event</h2>
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                            <label for="eventName" class="block text-sm font-medium leading-6 text-gray-900">Event name</label>
                            <div class="mt-2">
                                <input type="text" name="eventName" id="eventName" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2" required>
                            </div>
                            </div>

                            <div class="sm:col-span-5">
                            <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                            <div class="mt-2">
                                <textarea id="description" name="description" rows="3" autocomplete="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2" required></textarea>
                            </div>
                            </div>

                            <div class="sm:col-span-2">
                            <label for="startDate" class="block text-sm font-medium leading-6 text-gray-900">Start Date</label>
                            <div class="mt-2">
                                <input type="datetime-local" name="startDate" id="startDate" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2" required>
                            </div>
                            </div>

                            <div class="sm:col-span-2">
                            <label for="endDate" class="block text-sm font-medium leading-6 text-gray-900">End Date</label>
                            <div class="mt-2">
                                <input type="datetime-local" name="endDate" id="endDate" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2" required>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </section>
    
</main>

<?php $slot = ob_get_clean();
include __DIR__.'/layouts/master.php'; ?>
