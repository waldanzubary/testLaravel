<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') Laravel Testing</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .mber {
            font-weight: bold;
        }
        /* footer {
            margin-top: 25px;
        } */
    </style>
</head>
<body class="bg-base-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-base-200 min-h-screen shadow-lg">
            <div class="p-6">
                <h1 class=" text-2xl font-bold">Sidebar</h1>
                <nav class="mt-6">
                    <a href="/customers" class="block hover:bg-gray-700 hover:text-white p-3 rounded">Customers CRUD</a>
                    <a href="/contact" class="block  hover:bg-gray-700 hover:text-white p-3 rounded">Contacts CRUD</a>
                    <a href="/Warehouse" class="block  hover:bg-gray-700 hover:text-white p-3 rounded">Item CRUD</a>
                    <a href="/sales" class="block  hover:bg-gray-700 hover:text-white p-3 rounded">Transaction CRUD</a>
                    <a href="/sales/report" class="block  hover:bg-gray-700 hover:text-white p-3 rounded">Report Transaction</a>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <div class="navbar bg-base-100 ">
                <div class="flex-1">
                    <a class="btn btn-ghost text-xl mber">Test Laravel</a>
                </div>

            </div>

            <div class="p-10">
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
    </div>


</body>
</html>
