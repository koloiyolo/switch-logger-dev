<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>

<body>

    <?php
    $url = 'http://devices:80';
    $json = file_get_contents($url);
    $devices = json_decode($json, true);

    $url = 'http://api:80';
    $json = file_get_contents($url);
    $allLogs = json_decode($json, true);

    foreach ($devices as $device) {
        if (!empty($device['name'])) {
            $currDevice = $device;
            break;
        }
    }
    ?>

    <section>

        <div class="navBar">
            <div>
                <h2>
                    Y O U R &ensp; D E V I C E S /
                    <?php echo $currDevice['name'] ?>
                </h2>
            </div>

            <div class="buttons">
            <div class="button">
                    Device Info
                </div>
                <div class="button">
                    Logs
                </div>
                <div class="button">
                    Settings
                </div>

                <div class="button" id="date">
                </div>
            </div>

        </div>

        <div class="contents">


            <div class="panel">
                <?php
                foreach ($devices as $device) {
                    if (!empty($device['name'])) {
                        echo '<div class="button" onclick="handleClick()" id="' . $device['name'] . '">'
                            . $device['name'] . '</div>';
                    }
                }
                ?>

            </div>

            <div class="content">

                <h2>
                    Device logs:
                </h2>

                <div class="logTiles">
                    <?php
                    $logs = $allLogs[$currDevice['name']];
                    foreach ($logs as $log) {
                        echo '<div class="logTile">'
                                . '<h5>' . $log['datetime']
                                    . ' error: ' . $log['error']
                                . '</h5>'
                                . '<p>'
                                    . 'description: ' . $log['description']
                                . '</p>'
                            . '</div>'
                            . '<br>';
                    }
                    ?>
                </div>

            </div>

        </div>

    </section>

    <script>
        function updateClock() {
            const now = new Date();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');
            const day = now.getDate().toString().padStart(2, '0');
            const month = now.getMonth().toString().padStart(2, '0');
            const year = now.getFullYear().toString().padStart(2, '0');
            const timeString = `${day}/${month}/${year}|${hours}:${minutes}:${seconds}`;
            document.getElementById('date').textContent = timeString;
        }
        updateClock();
        setInterval(updateClock, 1000);
    </script>
</body>

</html>