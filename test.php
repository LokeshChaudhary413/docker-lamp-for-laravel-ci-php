<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boxes Layout</title>
    <style>
        .container {
            flex-wrap: wrap;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .box {
            width: 30%;
            height: 100px;
            margin: 1%;
            background-color: lightblue;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .full-width-box {
            width: 95%;
            height: 100px;
            margin: 1%;
            background-color: lightgreen;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="box">Box 1</div>
        <div class="box">Box 2</div>
        <div class="box">Box 3</div>
        <div class="box">Box 1</div>
        <div class="box">Box 2</div>
        <div class="box">Box 3</div>
        <!-- <div class="full-width-box">Box 4</div> -->
    </div>
</body>
</html>
