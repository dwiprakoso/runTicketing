<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Event Ticketing</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            display: flex;
            flex-direction: column;
            height: 100vh;
            background-color: #eef5ff;
            font-family: Arial, sans-serif;
        }
        header {
            width: 100%;
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }
        .container {
            display: flex;
            flex: 1;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
        }
        .left-section {
            background-color: #3498db;
            color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            justify-content: center;
            align-items: center;
            flex-direction: column;
            aspect-ratio: 16 / 9;
            width: 100%;
            max-width: 400px;
        }
        .left-section img {
            max-width: 100%;
            border-radius: 8px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
        }
        .left-section .event-description {
            margin-top: 20px;
            text-align: justify;
        }
        .right-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 100%;
        }
        .top-content, .bottom-content {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
        .top-content {
            min-height: 150px;
            border-left: 5px solid #2980b9;
        }
        .bottom-content {
            flex: 1;
        }
        .buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 20px 0;
        }
        .buttons div {
            background: linear-gradient(135deg, #2980b9, #6dd5fa);
            padding: 10px 20px;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .buttons div:hover {
            background: linear-gradient(135deg, #1e6091, #56c1e6);
        }
        /* Make the layout responsive */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            .left-section {
                width: 100%;
            }
            .right-section {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <header>
        Event Ticketing
    </header>
    <div class="container">
        <div class="left-section">
            <img class="event-poster" src="{{ asset('img/banner.png') }}" alt="Event Poster">
            <div class="event-description">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit architecto iusto eos, placeat, in voluptatem officiis repudiandae mollitia alias pariatur unde quos libero ut modi eligendi quaerat. Aspernatur, pariatur reiciendis aliquid iusto sint dicta facere placeat, atque porro a vitae! Voluptate quos porro consequatur provident quaerat dolore, blanditiis, sed qui ex quam atque minus non nostrum repellendus voluptatibus cum aspernatur aperiam aliquam hic odit mollitia! Aperiam odio nam nemo? Obcaecati deserunt numquam sapiente quod commodi maiores, magnam architecto quos neque totam corporis, veniam dicta minus quisquam quasi nesciunt cum recusandae ipsam vitae esse unde! Aliquam ratione magnam quo sit ut?</div>
        </div>
        <div class="right-section">
            <div class="bottom-content">@yield('content')</div>
        </div>
    </div>
</body>
</html>
