<!DOCTYPE html>
<html lang="en">
<head>
    <title>Route List</title>
    @include('utils::head')
</head>
<body>

<div class="container">
    <table>
        <tr>
            <td><h4>HTTP Method</h4></td>
            <td><h4>Route</h4></td>
        </tr>
        @foreach($routes as $route)
            <tr>
                <td>
                    @foreach($route->methods as $method)
                        {{$method}} <br>
                    @endforeach
                </td>
                <td>
                    {{$route->uri}}
                </td>
            </tr>
        @endforeach
    </table>
</div>
</body>
</html>
