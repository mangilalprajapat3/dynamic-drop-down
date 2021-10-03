<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dynamic Drop Down</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <section class="container">
        <div class="row">
            <div class="col-md-3">
                <ul>
                    <li><a href="{{ route('category.index') }}">Categories</a></li>
                    <li><a href="{{ route('subcategory.index') }}">Subcategories</a></li>
                    <li><a href="{{ route('product.index') }}">Products</a></li>
                </ul>
            </div>
            @yield('content')
        </div>
    </section>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
@yield('script')
</html>
