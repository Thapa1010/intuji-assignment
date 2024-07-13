<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title><?php echo env('APP_NAME') ?></title>
</head>
<body class="min-h-screen bg-[#EBEBEB]">
        <?php echo $slot ?? '' ?>
</body>

</html>