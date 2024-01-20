GNU nano 7.2                            index.php                                     
<!-- HTML !-->

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Pihole Disabler</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="styles/styles.css">
<style>
</style>
<script>
    async function disable(duration) {
        let response = await fetch(`http://192.168.0.101/index.php?duration=${duration}>
        let data = await response.text();
        document.getElementById("message").innerHTML = data;
    }
</script>

<body>
    <p class="main-header">Disable Pihole for:</p>
    
<form method="post">
<button type="submit"  class="button-9" role="button" name="disable-duration" value="5">
    <button type="submit" class="button-9" role="button" name="disable-duration" value=>
       <div id="message">
 <?php 
session_start();
if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['disable-dur>
        $data = $_POST['disable-duration'];
//      unset($_POST['disable-duration']);
        //header('Location:index.php');
        $_SESSION['message'] = $data;
        header('Location:index.php');
        exit;
}
if(isset($_SESSION['message'])){
echo $_SESSION['message'];
unset($_SESSION['message']);
}

?>
</div>

    <div class="footer">&copy; i love penny &#128021;</div>
</form>
</body>
</html>