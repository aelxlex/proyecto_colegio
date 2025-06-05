<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Colegio 31 de Octubre C</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            box-sizing: border-box;
        }

        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow-x: hidden;
            font-family: Arial, sans-serif;
            background-color: black;
        }

        .contenedor-central {
            width: 90%;
            max-width: 1100px;
            margin: 0 auto;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border-left: 20px solid black; 
            border-right: 20px solid black;
            background-image: url("{{ asset('imagenes/fondo.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: scroll;
            position: relative;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .encabezado {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(to bottom, rgb(11, 10, 97) 50%, rgb(16, 124, 41) 50%);
            padding: 10px 20px;
            height: 100px;
        }

        .logo-texto {
            display: flex;
            align-items: center;
        }

        .logo-texto img {
            height: 70px;
            margin-right: 15px;
        }

        .nombre-colegio {
            font-size: 24px;
            font-weight: bold;
            color: white;
        }

        .lema {
            font-style: italic;
            font-size: 16px;
            text-align: right;
            color: white;
        }

        .centro {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .boton-acceder {
            background-color: rgba(14, 13, 114, 0.85);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 24px;
            font-weight: bold;
            padding: 15px 30px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .boton-acceder:hover {
            background-color: rgba(14, 13, 114, 0.85);
        }

        .footer {
            text-align: center;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 10px;
            font-size: 14px;
            color: white;
        }


        @media (max-width: 600px) {
            .nombre-colegio {
                font-size: 18px;
            }

            .lema {
                font-size: 14px;
            }

            .boton-acceder {
                font-size: 20px;
                padding: 12px 25px;
            }

            .encabezado {
                height: 70px;
                padding: 8px 15px;
            }
        }
    </style>
</head>
<body>
    <div class="contenedor-central">
        <div class="encabezado">
            <div class="logo-texto">
                <img src="{{ asset('imagenes/escudocolegio.png') }}" alt="Escudo Colegio">
                <div class="nombre-colegio">
                    <div>Colegio</div>
                    <div>31 de Octubre "C"</div>
                </div>
            </div>
            <div class="lema">
                <div>“Disciplina, estudio y deporte”</div>
                <div>¡Adelante 31 de Octubre!</div>
            </div>
        </div>

        <div class="centro">
            <a href="{{ route('login') }}" class="boton-acceder">ACCEDER</a>
        </div>

        <div class="footer">
            © 2025
        </div>
    </div>
</body>
</html>