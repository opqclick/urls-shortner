
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
    <title>Awesome Search Box</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>

        body,html{
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
            background: #e74c3c !important;
        }

        .searchbar{
            margin-bottom: auto;
            margin-top: auto;
            height: 60px;
            background-color: #353b48;
            border-radius: 30px;
            padding: 10px;
        }

        .search_input{
            color: white;
            border: 0;
            outline: 0;
            background: none;
            width: 0;
            caret-color:transparent;
            line-height: 40px;
            transition: width 0.4s linear;
        }

        .searchbar:hover > .search_input{
            padding: 0 10px;
            width: 650px;
            caret-color:red;
            transition: width 0.4s linear;
        }

        .searchbar:hover > .search_icon{
            background: white;
            color: #e74c3c;
        }

        .search_icon{
            height: 40px;
            width: 40px;
            float: right;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            color:white;
            text-decoration:none;
        }
    </style>
</head>

<body>
<div class="container h-100">
    <div class="d-flex justify-content-center h-100">
        <form id="GFG" method="POST" action="{{ route('generate.shorten.link.post') }}">
            @csrf
        <div class="searchbar">
            <input class="search_input" type="text" name="link" placeholder="Search...">
            <a href="#" onclick="myFunction()" class="search_icon"><i class="fas fa-search"></i></a>
        </div>

        @if ($errors->has('link'))

            <div class="text-warning text-center" role="alert">
                {{ $errors->first('link') }}
            </div>
        @endif
        </form>
    </div>
</div>
<script>
    function myFunction() {
        document.getElementById("GFG").submit();
    }
</script>
</body>
</html>
