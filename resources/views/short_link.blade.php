<!DOCTYPE html>
<html>
<head>
    <title>URLs Shortner</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
    <style>
        p{
            margin-bottom: 0px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Create URL shortener using Laravel</h1>

    <div class="card">
        <div class="card-header">
            <form method="POST" action="{{ route('generate.shorten.link.post') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="link" class="form-control" placeholder="Enter URL" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit">Generate</button>
                    </div>
                </div>
                @if ($errors->has('link'))
                    <div class="input-group err mb-3 alert alert-danger" role="alert">
                        {{ $errors->first('link') }}
                    </div>
                @endif
            </form>
        </div>
        <div class="card-body">

            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif

            @if (Session::has('warning'))
                <div class="alert alert-warning">
                    <p>{{ Session::get('warning') }}</p>
                </div>
            @endif

            @if (Session::has('danger'))
                <div class="alert alert-danger">
                    <p>{{ Session::get('danger') }}</p>
                </div>
            @endif

            <table class="table table-bordered table-sm text-center">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Short Link</th>
                    <th>Link</th>
                    <th>Created At</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($short_link))
                    <tr>
                        <td>{{ $short_link->id }}</td>
                        <td><a href="{{ route('shorten.link', $short_link->code) }}" target="_blank">{{ route('shorten.link', $short_link->code) }}</a></td>
                        <td>{{ $short_link->link }}</td>
                        <td>{{ $short_link->created_at }}</td>
                    </tr>
                @else

                    @foreach($shortLinks as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td><a href="{{ route('shorten.link', $row->code) }}" target="_blank">{{ route('shorten.link', $row->code) }}</a></td>
                            <td>{{ $row->link }}</td>
                            <td>{{ $row->created_at }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>
