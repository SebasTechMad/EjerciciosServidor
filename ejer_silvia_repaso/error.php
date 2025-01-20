<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            html, body{
                width: 100%;
                height: 100dvh;
                margin:0px;
            }
            .bg-error{
                background-color:#f97c91;
                display:flex;
                justify-self:center;
                
            }
        </style>
    </head>
    <body>
        <div class="bg-error">
            <h4><?= $msg ?></h4>
        </div>
    </body>
</html>