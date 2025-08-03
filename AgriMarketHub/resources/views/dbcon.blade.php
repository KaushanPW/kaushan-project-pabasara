<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel DB connection</title>
</head>
<body>
    <div>
    <?php
    try {
        DB::connection()->getPdo();
        echo "✅ Successfully connected to DB. DB name is: <strong>" . DB::connection()->getDatabaseName() . "</strong>";
    } catch (\Exception $ex) {
        echo "❌ Could not connect to the database. Error: " . $ex->getMessage();
    }
    ?>
</div>
</body>
</html>