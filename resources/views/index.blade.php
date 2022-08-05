<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>RedCapital</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">

        <form id="formpregunta1">
            {{ @csrf_field() }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <label for="">Pregunta 1</label>
            <br>
            <label for="">Inserta un numero para conocer la secuencia Fibonacci.</label>
            <input type="number" id="numerales" value="0">
            <button class="btn" id="btnFbni">Mostrar</button>
        </form>

        <div id="seccionFbni">

        </div>




        <form id="pregunta2">
            {{ @csrf_field() }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <label for="">Pregunta 2</label>
            <br>
            <label for="">Inserta una palabra para dar vuelta.</label>
            <input type="text" id="palabrarevert">
            <button class="btn" id="btnRevert">Mostrar</button>

        </form>

        <div id="seccionRevert">

        </div>


        <form id="pregunta3">
            {{ @csrf_field() }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <label for="">Pregunta 3</label>
            <br>
            <label for="">Ingresa numeros a multiplicar.</label>
            <input type="number" id="numerouno">
            <input type="number" id="numerodos">
            <button class="btn" id="btnMulti">Mostrar</button>

        </form>

        <div id="seccionMulti">

        </div>


        <form id="pregunta4">
            {{ @csrf_field() }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <label for="">Pregunta 4</label>
            <br>
            <label for="">Numeros devueltos.</label>            
            <button class="btn" id="btnPrimos">Mostrar</button>

        </form>

        <div id="seccionPrimos">

        </div>

    </div>


    <script>
        $(document).ready(function() {

            $('#btnFbni').on('click', function(e) {
                e.preventDefault();
                $("#seccionFbni").empty();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "post",
                    url: "{{ asset('/preguntauno') }}",
                    data: {
                        numero: $('#numerales').val()
                    },
                    success: function(data) {
                        console.log(data);
                        data.forEach(element => {
                            $("#seccionFbni").append(element);
                            $("#seccionFbni").append("<label> - </label>");
                        });

                    },
                    error: function(e) {
                        alert(e);
                        console.log(e);
                    }
                });
            });

            $('#btnRevert').on('click', function(e) {
                e.preventDefault();
                $("#seccionRevert").empty();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "post",
                    url: "{{ asset('/preguntados') }}",
                    data: {
                        palabra: $('#palabrarevert').val()
                    },
                    success: function(data) {
                        console.log(data);
                        $("#seccionRevert").append(data);                       

                    },
                    error: function(e) {
                        alert(e);
                        console.log(e);
                    }
                });
            });

            $('#btnMulti').on('click', function(e) {
                e.preventDefault();
                $("#seccionMulti").empty();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "post",
                    url: "{{ asset('/preguntatres') }}",
                    data: {
                        numerouno: $('#numerouno').val(),
                        numerodos: $('#numerodos').val()
                    },
                    success: function(data) {
                        console.log(data);
                        $("#seccionMulti").append(data);                       

                    },
                    error: function(e) {
                        alert(e);
                        console.log(e);
                    }
                });
            });


            $('#btnPrimos').on('click', function(e) {
                e.preventDefault();
                $("#seccionPrimos").empty();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "post",
                    url: "{{ asset('/preguntacuatro') }}",                    
                    success: function(data) {
                        console.log(data);                       
                        data.forEach(element => {
                            $("#seccionPrimos").append(element);
                            $("#seccionPrimos").append("<label> - </label>");
                        });

                    },
                    error: function(e) {
                        alert(e);
                        console.log(e);
                    }
                });
            });




        });
    </script>




</body>

</html>