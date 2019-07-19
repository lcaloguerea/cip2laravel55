<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    </head>
    <style>
		.content {
		    min-height: 250px;
		    padding: 15px;
		    margin-right: auto;
		    margin-left: auto;
		}
		.invoice-box {
		    padding: 0px;
		    color: #555;
		    position: relative;
		    border-radius: 3px;
		    background: #fff;
		    margin-bottom: 20px;
		    width: 100%;
		    box-shadow: 0 0 10px rgba(0,0,0,.15);
		}
		.invoice-box table tr.heading td {

    background: #eee;
    border-bottom: 1px solid #ddd;
    font-weight: 700;

}
.invoice-box table tr.item td {

    border-bottom: 1px solid #eee;

}
.invoice-box table tr.total td:nth-child(2) {

    border-top: 2px solid #eee;
    font-weight: 700;

}
.invoice-box table tr.information table td {

    padding-bottom: 40px;

}.invoice-box table tr td:nth-child(2) {

    text-align: right;

}
.invoice-box table tr.top table td {

    padding-bottom: 20px;

}
.invoice-box table td {

    vertical-align: top;

}.invoice-box table tr.details td {

    padding-bottom: 20px;

}

.invoice-box table {

    width: 100%;
    text-align: left;

}
table {

    background-color: transparent;

}
table {

    border-collapse: collapse;
    border-spacing: 0;

}
* {
	font-family: 'Oxygen', sans-serif;
    box-sizing: border-box;

}
.invoice-box {

    color: #555;

}

body {

    font-size: 14px;

line-height: 1.6;

}



    </style>
    <body>
                <section class="content">
                    <div class="invoice-box">
                        <table cellpadding="0" cellspacing="0">
                            <tr class="top">
                                <td colspan="2">
                                    <table>
                                        <tr>
                                            <td class="title">
                                                <h2><img style="width: 300px" src="{{ public_path('/img/Mecesup_AUS.png') }}"></h2>
                                            </td>
                                            <td>
                                                Emitida: {{date('d-m-Y')}}<br>
                                                Vencimiento: {{date('d-m-Y', strtotime(date('d-m-Y'). ' + 7 days'))}}<br>
                                                Valdivia - Chile
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr class="information">
                                <td colspan="2">
                                    <table>
                                        <tr>
                                            <td>
                                                Casa de Investigadores y Postgrado<br>
                                                Avda. Las Encinas 220, Módulo C, Piso 3<br>
                                                cip_reservas@uach.cl<br>
                                                (63) 2 211136
                                            </td>
                                            <td>
                                                Nombre Apellido<br>
                                                Departamento<br>
                                                Correo<br>
                                                Teléfono
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr class="heading"> 
                                <td>
                                    Forma de pago
                                </td>
                                <td>
                                    Boleta #
                                </td>
                            </tr>
                            <tr class="details">
                                <td>
                                    Efectivo
                                </td>
                                <td>
                                    XXXX
                                </td>
                            </tr>
                            <tr class="heading">
                                <td>
                                    Detalle del servicio
                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                            <tr class="item">
                                <td>
                                    Habitación
                                </td>
                                <td>
                                    Simple
                                </td>
                            </tr>
                            <tr class="item">
                                <td>
                                    Costo por día
                                </td>
                                <td>
                                    XXXXXX
                                </td>
                            </tr>
                            <tr class="item">
                                <td>
                                    Días
                                </td>
                                <td>
                                    X
                                </td>
                            </tr>
                            <tr class="item">
                                <td>
                                    Invitado(s)
                                </td>
                                <td>
                                    1: XXXXX XXXXX
                                </td>
                            </tr>  
                            <tr class="details">
                                <td>
                                    Fechas
                                </td>
                                <td>
                                    XXXXXX a XXXXXX
                                </td>
                            </tr>                                                     
                            <tr class="heading">
                                <td>
                                    Cobros
                                </td>
                                <td>
                                    Valor
                                </td>
                            </tr>
                            <tr class="item">
                                <td>
                                    Cobro base
                                </td>
                                <td>
                                    $300.00
                                </td>
                            </tr>
                            <tr class="item">
                                <td>
                                    IVA
                                </td>
                                <td>
                                    $75.00
                                </td>
                            </tr>
                            <tr class="item last">
                                <td>
                                    Descuento
                                </td>
                                <td>
                                   - $10.00
                                </td>
                            </tr>
                            <tr class="total">
                                <td></td>
                                <td>
                                    Total: $365.00
                                </td>
                            </tr>
                        </table>
                        <!-- accepted payments column -->
                        <div class="">
                            <p class="lead">Métodos de pago:</p>
                            <img style="height: 50px; width: 50px; padding-right:10px" src="{{ public_path('/img/credit/cash.png')}}" alt="Efectivo">
                            <img style="height: 50px; width: 50px; padding-right:10px" src="{{ public_path('/img/credit/bank_trasfer-512.png')}}" alt="Mastercard">
                            <img style="height: 50px; width: 50px; padding-right:10px" src="{{ public_path('/img/credit/p_code.png')}}" alt="American Express">
                            <br>
                        </div>
                    </div>
                </section>
    </body>
</html>       