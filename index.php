<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects with Decent Design</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
            color: #333;
            margin: 20px 0;
        }
        .project-list {
            max-width: 800px;
            margin: auto;
            padding: 0;
            list-style: none;
            overflow-y: auto; /* Enables vertical scrolling */
            flex: 1; /* Allows the list to grow and fill the space */
        }
        .project-item {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 15px;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .project-item h2 {
            margin: 0 0 10px;
            font-size: 1.5em;
            color: #007BFF;
        }
        .project-item p {
            margin: 0;
            color: #666;
        }
        footer {
            text-align: center;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            position: relative;
            bottom: 0;
        }
    </style>

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
    <?php 
        $dir = '.';
        $directories = array_filter(glob($dir . '/*'), 'is_dir');
    ?>
    <h1>Projects Lists: <?=count($directories)?></h1>
    <div class="container">
        <?php foreach ($directories as $directory) { ?>
            <div class="box">
                <h2> <a href="http://localhost/<?= basename($directory) ?>"><?= basename($directory) ?></a></h2>
            </div>
        <?php } ?>
    </div>
    <footer>
        <p>Created by Lokesh Chaudhary | &copy; 2024</p>
    </footer>
</body>
</html>
