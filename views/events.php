<?php ob_start(); ?>
<?php include __DIR__.'/layouts/navbar.php';?>
<main class="mx-2 md:mx-4 my-6 md:mx-8 h-full p-2 md:p-8 rounded-lg bg-[#FFFF]">
    <div class="mt-2 text-xl font-semibold">
        <h1 class="text-gray-300"><a href="/">Home</a> /  <span class="text-gray-400">Events</span></h1>
    </div>
    <section class="flex w-full justify-center">
        <div class="w-full md:w-3/5 p-2 md:6 mt-8 flex flex-col gap-4">
            <header class="">
                <a href="/events/create" class="bg-gray-200 py-2 px-4 rounded-md hover:border-2 border-gray-800 text-md font-semibold">Add 📆</a>
            </header>
            <div class="bg-white shadow-md rounded my-2">
                <table class="min-w-full table-auto">
                    <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-1 px-1 md:py-3 md:px-6 text-left text-xs md:text-sm">S.N</th>
                        <th class="py-1 px-1 md:py-3 md:px-6 text-left text-xs md:text-sm">Title</th>
                        <th class="py-1 px-1 md:py-3 md:px-6 text-center text-xs md:text-sm">Description</th>
                        <th class="py-1 px-1 md:py-3 md:px-6 text-center text-xs md:text-sm">Start Date</th>
                        <th class="py-1 px-1 md:py-3 md:px-6 text-center text-xs md:text-sm">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                    <?php 
                    if(isset($events)){
                        foreach($events as $key=>$value){
                            $count = $key +1;
                            $title = $value->getSummary();
                            $description = $value->getDescription();
                            $time = $value->start->dateTime;
                            $eventId = $value->getId();
                           echo '<tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-1 px-1 md:py-3 md:px-6 text-left">'.$count.'</td>
                            <td class="py-1 px-1 md:py-3 md:px-6 text-left">'.$title.'</td>
                            <td class="py-1 px-1 md:py-3 md:px-6 text-center">'.$description.'</td>
                            <td class="py-1 px-1 md:py-3 md:px-6 text-center">'.date_format(new \DateTime($time),'Y-m-d h:i A').'</td>
                            <td class="py-1 px-1 md:py-3 md:px-6 text-center">
                            <form method="POST" action="/events/delete" id="'.$eventId.'">
                                <input type="hidden" name="eventId" value="'.$eventId.'"/></form>
                            <div class="flex item-center justify-center">
                                <button onclick="deleteEvent(\''.$eventId.'\')">
                                    <div class="w-6 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <svg id="Icons" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><style>.cls-1{fill:url(#linear-gradient);}.cls-2{fill:#2b2be0;}.cls-3{fill:url(#linear-gradient-2);}</style><linearGradient gradientUnits="userSpaceOnUse" id="linear-gradient" x1="30" x2="30" y1="8.34" y2="23.104"><stop offset="0" stop-color="#766cff"/><stop offset="1" stop-color="#3c3cef"/></linearGradient><linearGradient gradientUnits="userSpaceOnUse" id="linear-gradient-2" x1="12" x2="12" y1="-0.255" y2="6.042"><stop offset="0" stop-color="#a6f9ff"/><stop offset="1" stop-color="#3ed0f7"/></linearGradient></defs><path class="cls-1" d="M4,5H20a0,0,0,0,1,0,0V20a3,3,0,0,1-3,3H7a3,3,0,0,1-3-3V5A0,0,0,0,1,4,5Z"/><path class="cls-2" d="M12,19a1,1,0,0,1-1-1V10a1,1,0,0,1,2,0v8A1,1,0,0,1,12,19Z"/><path class="cls-2" d="M16,19a1,1,0,0,1-1-1V10a1,1,0,0,1,2,0v8A1,1,0,0,1,16,19Z"/><path class="cls-2" d="M8,19a1,1,0,0,1-1-1V10a1,1,0,0,1,2,0v8A1,1,0,0,1,8,19Z"/><path class="cls-3" d="M22,4H16V3a3,3,0,0,0-3-3H11A3,3,0,0,0,8,3V4H2A1,1,0,0,0,2,6H22a1,1,0,0,0,0-2ZM10,4V3a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V4Z"/></svg>
                                    </div>
                                </button
                                </div>
                            </td>
                            </tr>';
                        }
                    }else{
                        echo '<tr class="border-b border-gray-200 hover:bg-gray-100"><td class="py-1 px-1 md:py-3 md:px-6 text-center>You dont have upcomming events.</td></tr>';
                    }
            
                    ?>    
                   
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    
</main>

<?php $slot = ob_get_clean();
include __DIR__.'/layouts/master.php'; ?>
