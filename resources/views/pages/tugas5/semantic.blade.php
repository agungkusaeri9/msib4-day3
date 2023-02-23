<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Semantic' }}</title>
    <link rel="stylesheet" href="{{ asset('assets/semantic/semantic.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/semantic/components/card.min.css') }}">
</head>

<body>
    <div class="ui fixed inverted menu">
        <div class="ui container">
            <a href="{{ route('home') }}" class="header item">
                Agung Kusaeri
            </a>
            <div class="right menu">
                <a href="{{ route('home') }}" class="item">Home</a>
                <a href="{{ route('admin.dashboard') }}" class="ui item">Admin Panel</a>
            </div>
        </div>
    </div>

    <div class="ui container grid">
        <div class="ui one column grid">
            <div class="column top aligned">
                <h3>Data User</h3>
                <table class="ui celled table w-100">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>John Doe</td>
                            <td>Jl. Merdeka No. 10</td>
                            <td>081234567890</td>
                            <td>john.doe@gmail.com</td>
                        </tr>
                        <tr>
                            <td>Jane Doe</td>
                            <td>Jl. Kebon Jeruk No. 5</td>
                            <td>082345678901</td>
                            <td>jane.doe@yahoo.com</td>
                        </tr>
                        <tr>
                            <td>David Smith</td>
                            <td>Jl. Sudirman No. 15</td>
                            <td>083456789012</td>
                            <td>david.smith@hotmail.com</td>
                        </tr>
                        <tr>
                            <td>Michelle Lee</td>
                            <td>Jl. Hayam Wuruk No. 20</td>
                            <td>084567890123</td>
                            <td>michelle.lee@outlook.com</td>
                        </tr>
                        <tr>
                            <td>Tom Williams</td>
                            <td>Jl. Diponegoro No. 25</td>
                            <td>085678901234</td>
                            <td>tom.williams@gmail.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/semantic/semantic.js') }}"></script>
</body>

</html>
