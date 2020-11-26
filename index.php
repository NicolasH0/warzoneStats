<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="asset/main.css">
    </head>
    <form method="post" id="download_form" action="asset/main.php">
            <input id="mycheckbox" type="checkbox" name="download" value="Download CSV" />
            <label for="mycheckbox" />
    </form>
</html>

<script>
    $("#mycheckbox").click(function(){
        $("#download_form").submit();
    });
</script>