<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title><?php echo env('APP_NAME') ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body class="min-h-screen bg-[#EBEBEB]">
        <?php echo $slot ?? '' ?>
    <?php require_once(__DIR__.'/scripts.php');?>    
</body>

</html>