<html>
    <head>
        <title>Program 7</title>
        <meta http-equiv="refresh" content="1" />
        <style>
            #clock {
                color: white;
                font-size: 90px;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background-color: red;
            }
        </style>
    </head>
    <body>
        <h2>Digital Clock</h2>

        <div id="clock">
        <?php 
            date_default_timezone_set('Asia/Kolkata');
            echo date(" h: i: s A"); 
        ?>
        </div>
    </body>
</html>