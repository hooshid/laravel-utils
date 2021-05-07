<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome</title>
    @include('utils::head')
    <style>
        .welcoming {
            padding-top: 40px;
        }

        .welcoming a {
            padding: 30px;
            background: #CE0F45;
            display: inline-block;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            width: 20%;
            text-align: center;
            font-size: 2rem;
        }

        .welcoming a:hover {
            background: #E81551;
        }

        .back-page {
            display: none;
        }
    </style>
</head>
<body>

<div class="container welcoming">
    <a href="/utils/route-list">
        Route Lists
    </a>

    <a href="/utils/schema-builder">
        Schema Builder
    </a>

    <a href="/utils/phpinfo">
        php Info
    </a>

</div>
</body>
</html>
