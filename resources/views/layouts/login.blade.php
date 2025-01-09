<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('logo_Dis.png') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #353093, #165e9e);
        }

        .wrapper {
            display: flex;
            flex-wrap: wrap;
            max-width: 1000px;
            width: 100%;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .left {
            flex: 1;
            /* background: #e0e1e3; */
            background-color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .left img {
            width: 60%;
            max-width: 300px;
            height: auto;
            border-radius: 10px;
        }

        .right {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .right .title {
            font-size: 28px;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .input-box {
            position: relative;
            margin: 15px 0;
        }

        .input-box input {
            width: 100%;
            padding: 12px 40px;
            font-size: 16px;
            border: 2px solid rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            outline: none;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .input-box input:focus {
            border-color: #6c63ff;
            box-shadow: 0 0 8px rgba(108, 99, 255, 0.4);
        }

        .input-box i {
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
            color: #6c63ff;
            font-size: 18px;
        }

        #toggle-password {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6c63ff;
            font-size: 18px;
        }

        .button input {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            color: #fff;
            background: #6c63ff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease, box-shadow 0.3s ease;
        }

        .button input:hover {
            background: #574b90;
            box-shadow: 0 4px 12px rgba(87, 75, 144, 0.5);
        }

        @media (max-width: 768px) {
            .wrapper {
                flex-direction: column;
            }

            .left,
            .right {
                padding: 20px;
                flex: 1 1 100%;
            }

            .left img {
                max-width: 200px;
            }

            .right .title {
                font-size: 24px;
            }
        }

        @media (max-width: 480px) {
            .right .title {
                font-size: 20px;
            }

            .input-box input {
                font-size: 14px;
            }

            .button input {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="left">
            <img src="{{ asset('logo_dispusip-removebg-preview.png') }}" alt="Logo">
        </div>
        <div class="right dark:bg-gray-800" >
            <div class="title">
                @isset($title)
                    {{ $title }}
                @endisset
            </div>
            {{ $slot }}
        </div>
    </div>
</body>
</html>
