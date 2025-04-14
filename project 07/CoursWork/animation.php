<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Анимация загрузки</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .loader {
            border: 5px solid #f4f4f4;
            border-top: 5px solid #000000;
            border-radius: 100%;
            width: 120px;
            height: 120px;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="loader"></div>
    <script>
        setTimeout(function() {
            window.location.href = "index.php";
        }, 2000);
    </script>
</body>
</html>

<? 
session_start() ;
$_SESSION['user_id'] = 1; 
?>