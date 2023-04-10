<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
  </head>
  <body>
    <style>
        body{
        background: rgb(90, 34, 34);

        }
      .con {
        min-width: 100vmax;
        min-height: 100vh;
      }
      .img {
        position: fixed;
        right: 40%;
        top: 30%;
        z-index: 100;
      }
    </style>
    <div class="con">
      <div style="display: flex;">
        <img src="{{ asset('img/404.png') }}" alt="" class="img" />
      </div>
    </div>
  </body>
</html>
