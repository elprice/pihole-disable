<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['duration_minutes'])) {
    $duration_minutes = $_POST['duration_minutes'];
    if (!is_numeric($duration_minutes)) {
        exit;
    }
    exec("sudo pihole disable " . $duration_minutes . "m");
    return "pihole disabled for " . $duration_minutes . " minutes";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Pihole Disabler</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<style>
    #header {
        font-family: -apple-system, system-ui, "Segoe UI", Roboto, "Helvetica Neue", Ubuntu, sans-serif;
        font-size: larger;
        font-weight: bold;
        margin-bottom: 12px;
        text-align: center;
    }

    /* Button from Stripe */
    .btn {
        appearance: button;
        backface-visibility: hidden;
        background-color: #405cf5;
        border-radius: 6px;
        border-width: 0;
        box-shadow: rgba(50, 50, 93, .1) 0 0 0 1px inset, rgba(50, 50, 93, .1) 0 2px 5px 0, rgba(0, 0, 0, .07) 0 1px 1px 0;
        box-sizing: border-box;
        color: #fff;
        cursor: pointer;
        font-family: -apple-system, system-ui, "Segoe UI", Roboto, "Helvetica Neue", Ubuntu, sans-serif;
        font-size: 100%;
        height: 44px;
        line-height: 1.15;
        margin: 12px 0 0 0;
        outline: none;
        overflow: hidden;
        padding: 0 25px;
        position: relative;
        text-align: center;
        text-transform: none;
        transform: translateZ(0);
        transition: all .2s, box-shadow .08s ease-in;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        width: 100%;
    }

    .btn:hover,
    .btn:focus {
        box-shadow: rgba(50, 50, 93, .1) 0 0 0 1px inset, rgba(50, 50, 93, .2) 0 6px 15px 0, rgba(0, 0, 0, .1) 0 2px 2px 0, rgba(50, 151, 211, .3) 0 0 0 4px;
    }

    #msg {
        color: red;
        font-family: -apple-system, system-ui, "Segoe UI", Roboto, "Helvetica Neue", Ubuntu, sans-serif;
        font-size: larger;
        margin-top: 12px;
        text-align: center;
    }
</style>

<body>
    <p id="header">Disable Pihole for:</p>
    <button class="btn" role="button" onclick="disable(5)">5 min</button>
    <button class="btn" role="button" onclick="disable(30)">30 min</button>
    <div id="msg" />
</body>

<script>
    async function disable(durationMinutes) {
        let response = await fetch(window.location.href, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `duration_minutes=${durationMinutes}`,
            cache: 'no-store'
        });
        let data = await response.text();
        document.getElementById("msg").innerHTML = data;
    }
</script>

</html>