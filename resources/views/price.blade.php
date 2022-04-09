<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>Price</title>
    <h1 class="text-center">Price Poland to Russian</h1>
</head>
<body>
<form class="container mt-5" action="{{ route('add_product') }}" method="post">
    <img class="rounded mx-5 float-end "  src="https://i.gifer.com/WG8Q.gif" alt="я джифка">
    @csrf
    <div class="form-group mb-3 w-50">
        <label>Продукт</label>
        <input type="text" name="product" class="form-control" placeholder="Название">
    </div>
    <div class="form-group mb-3 w-50">
        <label>Цена в злотых</label>
        <input type="number" name="poland_price" class="form-control" placeholder="Цена">
    </div>
    <button type="submit" class="btn btn-outline-dark">Добавить</button>
</form>
<form class="container mt-5">
    <table class="table table-dark table-striped w-50">
        <thead>
        <tr>
            <th scope="col">Название</th>
            <th scope="col">Злотые</th>
            <th scope="col">Рубли</th>
            <th scope="col">Удалить</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->product}}</td>
            <td>{{$product->poland_price}}</td>
            <td>{{$product->russian_price}}</td>
            <td>
                <form action="{{ route('delete_product', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="border-0 bg-transparent text-danger">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
                            <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
                        </svg>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</form>

<form class="container mt-5">
    <table class="table table-dark table-striped w-50">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Сумарно:</th>
        <th scope="col">PLN: {{$poland_price}}</th>
        <th scope="col">RUB: {{$russian_price}}</th>
    </tr>
    </thead>
</table>
</form>


</body>
</html>


