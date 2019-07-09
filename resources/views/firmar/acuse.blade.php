@extends('layouts.app')




@section('content')
<style>
.img {
    margin-left:50px;
    margin-top:155px;
  }
</style>


<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">
      <strong>Acuse de Recepción de Declaración</strong>
    </h3>
  </div>
  <div class="panel-body text-justify">
    <img class="img" src="{{ asset('img/escudo.gif') }}">

    <img src="{{ asset('img/'.CARPETA.'1.gif') }}" style="margin-top:-15px !important;">

        <p>&nbsp;</p>

        <p class="text-right">
        <strong>
        Acuse y Carta de Aceptación para la utilización del RFC con
        <br>
        homoclave y contraseña como firma de la declaración de
        <br>
        situación patrimonial.
        </strong>
        </p>

        <p>
            <strong>Contraloría {{ $config->institucion }}</strong>
            <br>
            <strong>Presente</strong>
        </p>

        @if($config->estado == "MICHOACAN DE OCAMPO")
        <p>
        C. <span class="upper">{{ $datos->nombre }} {{ $datos->primer_apellido }} {{ $datos->segundo_apellido }}</span> con 
        registro federal de contribuyentes <span class="upper">{{ $datos->rfc }}</span>, con fundamento en los artículos 104 y 
        105 de la Constitución Política del Estado Libre y Soberano de Michoacán de Ocampo, 1 ,2, 11, 14, 17, 20 fracción VIII de la
        Ley Orgánica de la Administración Pública del Estado de Michoacán de Ocampo; 1, 2, fracción I, 4, fracción I, 8, 29, 32, 33, 34, 35, 46, primer párrafo, 47 y 48 de la Ley
        de Responsabilidades Administrativas para el Estado de Michoacán de Ocampo; 1, 2, fracción I, 4, fracción I, 9, 29, 32, 33,
        34, 35, 46, primer párrafo, 47 y 48 de la Ley General de Responsabilidades Administrativas, publicada en el Diario Oficial
        de la Federación el dieciocho de julio de dos mil dieciséis, así como de su Artículo Transitorio TERCERO que establece
        que hasta en tanto el comité coordinador del Sistema Nacional Anticorrupción determina los formatos para la presentación
        de las declaraciones patrimonial y de intereses, los servidores públicos de todos los órdenes de gobierno presentaran sus
        declaraciones en los formatos que a la entrada en vigor de la Ley General de Responsabilidades Administrativas, se utilicen
        en el ámbito federal; en concordancia con el “Acuerdo por el que el Comité Coordinador del Sistema Nacional
        Anticorrupción da a conocer la obligación de presentar las declaraciones de situación patrimonial u de intereses conforme a
        los artículos 32 y 33 de la Ley General de Responsabilidades Administrativas”, publicado en el Diario Oficial de la
        Federación el catorce de julio de dos mil diecisiete y con el “ACUERDO que determina como obligatoria la presentación de
        las declaraciones de situación patrimonial”, publicado el Diario Oficial de la Federación el 29 de abril de 2015 y su
        modificatorio de 21 de octubre de 2016, por los que se establecen los medios a través de los cuales los servidores públicos
        podrán efectuar su declaración patrimonial y de intereses, así como la forma de envió; y en virtud de haber optado por
        firmar mi declaración patrimonial y de intereses a través del uso de mi Registro de Contribuyentes con homoclave y
        contraseña utilizados para ingresar al sistema de Declaración Patrimonial, en Michoacán, procedo a realizar las siguientes:
        </p>
        @else
        <p>
        C. <span class="upper">{{ $datos->nombre }} {{ $datos->primer_apellido }} {{ $datos->segundo_apellido }}</span> con 
        registro federal de contribuyentes <span class="upper">{{ $datos->rfc }}</span>, con fundamento en los artículos 108 y 
        109 de la Constitución Política de los Estados Unidos Mexicanos, 1 ,2, 14, 16, 26, 37 fracción XVI de la
        Ley Orgánica de la Administración Pública Federal; 1, 2, fracción I, 4, fracción I, 9, 29, 32, 33, 
        34, 35, 46, primer párrafo, 47 y 48 de la Ley de Responsabilidades Administrativas publicada en el diario oficial de la federación
        1, 2, fracción I, 4, fracción I, 9, 29, 32, 33, 34, 35, 46, primer párrafo, 47 y 48 de la Ley General de Responsabilidades 
        Administrativas, publicada en el Diario Oficial de la Federación el dieciocho el 18  de julio de dos mil dieciséis, así como de su 
        Artículo Transitorio TERCERO que establece que hasta en tanto el comité coordinador del Sistema Nacional Anticorrupción 
        determina los formatos para la presentación de las declaraciones patrimonial y de intereses, los servidores públicos de 
        todos los órdenes de gobierno presentaran sus declaraciones en los formatos que a la entrada en vigor de la Ley General 
        de Responsabilidades Administrativas, se utilicen en el ámbito federal; en concordancia con el “Acuerdo por el que el Comité 
        Coordinador del Sistema Nacional Anticorrupción da a conocer la obligación de presentar las declaraciones de situación 
        patrimonial u de intereses conforme a los artículos 32 y 33 de la Ley General de Responsabilidades Administrativas”, publicado 
        en el Diario Oficial de la Federación el catorce de julio de dos mil diecisiete y con el “ACUERDO que determina como obligatoria 
        la presentación de las declaraciones de situación patrimonial”, publicado el Diario Oficial de la Federación el 29 de abril de 2015 
        y  su modificatorio de 21 de octubre de 2016, por los que se establecen los medios a través de los cuales los servidores públicos
        podrán efectuar su declaración patrimonial y de intereses, así como la forma de envió; y en virtud de haber optado por
        firmar mi declaración patrimonial y de intereses a través del uso de mi Registro de Contribuyentes con homoclave y
        contraseña utilizados para ingresar al sistema de Declaración Patrimonial, en {{ $config->estado }}, procedo a realizar las siguientes:
        </p>
        @endif

        <p>&nbsp;</p>

        <h5 class="text-center"><strong>DECLARACIONES</strong></h5>

        <ul>
            <li>
                1. Que la declaración de Situación de que abajo protesta de decir verdad presento ante la Contraloría con
                fecha @dMy($declaracion->updated_at) y folio: <strong>{{ $declaracion->updated_at }}-{{ $declaracion->id }}</strong> es auténtica y atribuible a mi persona.
            </li>
            <li>
                2. Que para el envío de la declaración de situación patrimonial referida en el párrafo anterior, utilicé mi registro federal de
                contribuyentes con homoclave y contraseña con los que ingreso al sistema de Declaración Patrimonial, por lo que es de mi exclusiva
                responsabilidad su uso, así como la información remitida a través de los medios remotos de comunicación electrónica y las
                consecuencias jurídicas que de ello derive.
            </li>
            <li>
                3. En virtud de estar de acuerdo con las condiciones antes señaladas, firmo autógrafamente el presente documento, mismo
                que presentaré ante el Órgano Interno de Control de la Dependencia, entidad o Institución en la que presto o haya
                prestados mis servicios, dentro de los 15 días hábiles siguiente a la presentación de la correspondiente declaración de
                situación patrimonial, acompañado de una copia del acuse de recibo generado por el sistema.
            </li>
        </ul>

        <p>&nbsp;</p>

        <h5 class="text-center">PROTESTO LO NECESARIO</h5>

        <div class="text-left">
            <p>
                NOMBRE Y FIRMA DEL MANIFESTANTE:
                ______________________________________________________________________________________________
            </p>


            <p>
                LUGAR Y FECHA DE ENTREGA:
                ______________________________________________________________________________________________
            </p>

        </div>
    </div><!--panel-body-->
    <div class="panel-footer">
        <a onclick="myFunction()" class="btn btn-light text-danger pull-right">
            <i class="fa fa-print"></i>
            Imprimir
        </a>

        <a href="{{ url('/') }}" class="btn btn-light text-danger">
            <i class="fa fa-arrow-left"></i>
            Regresar
        </a>
    </div>
</div><!--panel-->

<script>
function myFunction() {
  window.print();
}
</script>
@endsection
