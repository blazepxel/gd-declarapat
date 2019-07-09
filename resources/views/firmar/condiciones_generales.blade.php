@extends('layouts.app')



@section('content')


<div class="col-md-12">

    <div class="panel panel-default">
        <div class="panel-heading">
          <h4>
            <span class="glyphicon glyphicon-list-alt"></span>
            <span class="ml">Proceso de Envío y firmado de la declaración</span>
          </h4>
        </div>

        <div class="panel-body">
            <form>


            <div class="form-group">
                <label for="observaciones" class="col-md-4">Validando datos de la declaración:</label>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <textarea rows="10" tabindex="{{ ++$tabindex }}" class="form-control">
De conformidad a lo establecido en la disposición QUINTA del ACUERDO publicado en el Diario Oficial

de la Federación el día 25 de abril de 2013 y que a la letra dice:
QUINTA: Los servidores públicos al presentar sus declaraciones por medios remotos de comunicación
electrónica, en sustitución de su firma autógrafa, deberán utilizar su firma electrónica avanzada
expedida por Agencia o Autoridad Certificadora.

Cuando los servidores públicos no cuenten con su firma electrónica avanzada, o ésta se encuentre
vencida, podrán utilizar su clave de usuario o contraseña, generadas en el Sistema DeclaraNET plus,
siempre que acepten las condiciones de uso contenidas en el formato que a tal efecto estará
disponible en el propio sistema.

Clave de usuario y contraseña.- Se refiere al RFC con homoclave y contraseña que empleaste para ingresar a sistema.
                    </textarea>
                </div>
            </div>

<p>&nbsp;</p>
<p>&nbsp;</p>

            <div class="form-group">
                <label for="observaciones" class="col-md-4">Condiciones Generales:</label>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <textarea rows="10" tabindex="{{ ++$tabindex }}" class="form-control">
Con fundamento en los artículos 108 y 109 de la Constitución Política de los Estados Unidos Mexicanos; 1, 2, 14, 16, 26 y 37, fracción XVI de la Ley Orgánica de la Administración Pública Federal; 1, 2, fracción I, 4, fracción I, 9, 29, 32, 33, 34, 35, 46 primer párrafo, 47 y 48 de la Ley General de Responsabilidades Administrativas, publicada en el Diario Oficial de la Federación el dieciocho de julio de dos mil dieciséis, así como de su artículo Transitorio TERCERO que establece  que hasta en tanto el Comité Coordinador del Sistema Nacional Anticorrupción determina los formatos para la presentación de las declaraciones patrimonial y de intereses, los servidores públicos de todos los órdenes de gobierno presentarán sus declaraciones en los formatos que a la entrada en vigor de la Ley General de Responsabilidades Administrativas, se utilicen en el ámbito Federal; en concordancia con el  “Acuerdo por el que el Comité Coordinador del Sistema Nacional Anticorrupción da a conocer la obligación de presentar las declaraciones de situación patrimonial y de intereses conforme a los artículos 32 y 33 de la Ley General de Responsabilidades Administrativas”, publicado en el Diario Oficial de la Federación el catorce de julio de dos mil diecisiete y con el “ACUERDO que determina como obligatoria la presentación de las declaraciones de situación patrimonial de los servidores públicos federales, por medios de comunicación electrónica, utilizando para tal efecto, la firma electrónica avanzada”, publicado en el Diario Oficial de la Federación el 25 de marzo de 2009 y su modificatorio de 25 de abril de 2013; el “ACUERDO por el que se dan a conocer los formatos que deberán utilizarse para presentar las declaraciones de situación patrimonial”, publicado en el Diario Oficial de la Federación el 29 de abril de 2015 y su modificatorio de 21 de octubre de 2016, por los que se establecen los medios a través de los cuales los servidores públicos podrán efectuar su declaración patrimonial y de intereses, así como la forma de envío, y en virtud de haber optado por firmar mi declaración de situación patrimonial y de intereses a través del uso de mi Registro Federal de Contribuyentes con homoclave y contraseña utilizados para ingresar al sistema DeclaraNetPlus, procedo a realizar las siguientes: DECLARACIONES1.	Toda información que la Secretaría de la Función Pública reciba con mi RFC con Homoclave y contraseña utilizados para ingresar al sistema DeclaraNet plus, es auténtica y atribuible a mi persona, por lo que será de mi exclusiva responsabilidad, la información que esta reciba por medios remotos de comunicación electrónica.2.	Acepto el compromiso de guardar mi contraseña de manera responsable, pues es única y exclusiva para mi acceso al Sistema Electrónico  DeclaraNet plus.3.	En virtud de estar de acuerdo con las condiciones antes señaladas, firmo autógrafamente el presente documento, mismo que presentaré ante el Órgano Interno de Control o en la Unidad de Responsabilidades de la dependencia, entidad o institución en la que presto o haya prestado mis servicios, dentro de los 15 días hábiles siguientes a la presentación de la correspondiente declaración de situación patrimonial y de intereses, acompañado de una copia del acuse de recibo generado por el sistema.
                    </textarea>
                </div>
            </div>


            </form>
        </div>
        <div class="panel-footer">
            <div class="pull-right">
                <a href="{{ url('firmar/'.$declaracion_id.'/enviar') }}" tabindex="1" class="btn btn-success"><span class="fa fa-check"></span> Firmar Electrónicamente</a>
            </div>
            <a href="{{ url('/') }}" class="btn btn-light text-danger">
            <i class="fa fa-arrow-left"></i>
            Regresar
          </a>
        </div>
      </div>
    </div>
<div>

@endsection
