 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;

        }
    </style>
</head>

<body>

    <div style="width: 100%; justify-content:center;">

        <div style="float:left;" align="center">
            <p class="flex flex-col justify-center text-center" style="font-size: 20px" align="center">
                <strong align="center">RESTAURANTE CAMPESTRE "La Esquina del JC" S.A.S</strong>
            </p>
        </div>


        <div style="margin-left:auto">
            <table style="text-align: center; border: 1px solid black; border-radius:7px; font-size:20px; border-spacing: 0; margin-left:auto;">
                <thead>
                    <tr>
                        <td>
                            <b>R.U.C. 10111222333</b>
                        </td>
                    </tr>
                    <tr style="background-color: #a9a9a9;">
                        <td>
                            <b>{{ $pedido->ticket_type }}</b>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>N° {{$pedido->ticket_serie}}-{{$pedido->ticket_number}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <div style="margin: 22px 0px 18px 0px; width:100%; font-size: 20px;">
        <div style="float:left">
            <p style="margin:0; ">Atendido por: {{ Auth::user()->name}}</p>
        </div>
        <div style="margin-left:auto">
            <p style="text-align:right;margin:0">
                Fecha: {{ $pedido->created_at }}
            </p>
        </div>
    </div>
    <div style="width: 100%; padding: 4px 0px 3px 0px; align-items:center;">
        <div style="float: left;padding: 0px 22px 0px 0px">
            <table style="width:100%; font-size: 20px;">
                <tr>
                    <td >Cliente: </td>
                    <td style="border-bottom: solid 1px black; padding-left: 1ch">{{ $pedido->nombreCliente }}
                        {{ $pedido->apellidosCliente }}</td>
                </tr>
                <tr style="margin-left:auto">
                    <td style="padding-top:16px; width: 10px">Celular: </td>
                    <td align="center" style="border-bottom: solid 1px black; padding-left: 1ch; padding-top:16px; width: 12ch">{{ $pedido->celular }}</td>
                </tr>
                <tr style="margin-left:auto">
                    <td style="padding-top:16px; width: 100px">Dirección: </td>
                    <td style="border-bottom: solid 1px black; padding-left: 1ch; padding:16px 1ch 0px 1ch; width: 60%" align="center">{{ $pedido->direccion }}</td>
                </tr>

            </table>
        </div>

        <div style="margin-left: auto">
            <table
                style="text-align: center; border: 1px solid black; border-radius:7px; font-size:20px; border-spacing: 0; margin-left:auto; margin-top:20px">
                <thead>
                    <tr>
                        <td style="padding:4px 12px; background-color: #a9a9a9;border-top: 1px black solid" colspan="2">Delivery</td>
                    </tr>
                    <tr style="">
                        <td
                            style="width: 50%;border-right: 1px solid black;border-top: 1px black solid; border-bottom:1px black solid">
                            SI</td>
                        <td style="width: 50%;border-top: 1px black solid; border-bottom:1px black solid">NO</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="width: 50%;border-right: 1px solid black">{{ $pedido->delivery == 1 ? 'X' : '' }}
                        </td>
                        <td style="width: 50%;">{{ $pedido->delivery == 0 ? 'X' : '' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>



    <div style="padding: 20px 8px 0px 8px">

        <div style="padding: 20px 8px 0px 8px; margin-top:10px">
            <table
                style="width:100%;border: 1px solid black; border-radius:10px; font-size:20px; border-spacing: 0; overflow:hidden">
                <thead>
                    <tr style="background-color: #d9d9d9;">
                        <th
                            style="border-bottom: 1px solid black; border-right: solid 1px black;width:4ch; padding: 4px 6px">
                            Cant.</th>
                        <th
                            style="border-bottom: 1px solid black;border-left: solid 1px black;border-right: solid 1px black">
                            Descripcion</th>
                        <th
                            style="border-bottom: 1px solid black;border-left: solid 1px black;border-right: solid 1px black;width:10ch; padding: 4px 6px">
                            P.Unit</th>
                        <th
                            style="border-bottom: 1px solid black;border-left: solid 1px black;width:12ch; padding: 4px 6px">
                            Importe</th>
                    </tr>
                </thead>
                <tbody>

                      <tr style="">
                        <td style="padding: 3px 0px;border-bottom: 1px solid black; border-right: solid 1px black"
                            align="center">

                        </td>
                        <td
                            style="padding: 3px 0px 3px 1ch;border-bottom: 1px solid black;border-right: solid 1px black;border-left: solid 1px black">
                            Por consumo
                        </td>
                        <td style="padding: 3px 0px;border-bottom: 1px solid black;border-right: solid 1px black;border-left: solid 1px black"
                            align="center">
                        </td>
                        <td style="padding: 3px 0px;border-bottom: 1px solid black;border-left: solid 1px black"
                            align="center">S/.{{ $pedido->total }}</td>
                    </tr>

                </tbody>
                <tfoot>
                    <td>

                    <tr style="background-color: #d9d9d9;">
                        <td style="font-weight:bolder" colspan="3" align="right"><b>SubTotal: </b></td>
                        <td style="font-weight:bolder" align="center"> S/. {{ $pedido->total }}</td>
                    </tr>
                   </td>

                   <td>
                    <tr style=" border-bottom: 1px solid black;border-top: 1px black solid">
                        <td style="font-weight:bolder" colspan="3" align="right"><b>IGV (%): </b></td>
                        <td style="font-weight:bolder" align="center"> S/. {{ $pedido->total *( $pedido->tax/100) }}</td>
                    </tr>
                </td>


                    <tr style="background-color: #d9d9d9;">
                        <td style="font-weight:bolder" colspan="3" align="right"><b>TOTAL: </b></td>
                        <td style="font-weight:bolder" align="center"> S/. {{ $pedido->total  +  ($pedido->total *( $pedido->tax/100)) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>


</body>

</html>


@section('js')
<script>
    $('body').click(function () {
    NumeroAleatorio(99999999, 99999999999);
    });

    NumeroAleatorio(99999999, 99999999999);

    function NumeroAleatorio(min, max) {
    var num = Math.round(Math.random() * (max - min) + min);
    $('#NumeroAleatorio1').text(num);
    }
    </script>
@endsection


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>


        <h5>
        <div align="center">
            <img src="{{public_path() . '/images/patos.jpeg'}}" alt="" width="100" height="100">


            <strong  style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size:15px; margin-top:10px">RESTAURANTE "La Esquina del JC"</strong><br>

            <strong style="font-size: 10px">La Esquina del JC S.A.C</strong><br>

            <strong style="font-size: 10px">R.U.C:  10111222333</strong><br>


             <strong style="font-size: 10px">Panamericana Norte Km 712</strong><br>

             <strong style="font-size: 10px">Chepén, Perú</strong><br>
             <strong style="font-size: 10px">Telf: 969 900 610</strong> <br>
             <strong style="font-size: 10px">www.resturantelospatos.com</strong> <br>
+              <strong style="font-size: 10px">info@restaurante.com</strong><br>
        </div>
        </h5>


<div>
    Fecha: {{ $pedido->created_at }}
    <hr style="border-top: 2px dashed; margin-top:10px">
     <strong style="font-size: 10px">BOLETA DE VENTA ELECTRÓNICA</strong>

    <hr style="border-top: 2px dashed; margin-top:10px">
</div>



</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</html>
 --}}


