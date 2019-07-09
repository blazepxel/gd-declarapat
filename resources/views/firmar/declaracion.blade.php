@extends('layouts.app')




@section('css')
<style>
.img {
    margin-left:230px;
    margin-top:150px;
  }
td{
    padding:5px;
    white-space: normal;
}
table{
    text-transform: uppercase;
    width:100%;
}
.upper{
    text-transform: uppercase;
}
.normal{
    text-transform: lowercase;
}

@media 
    print
    {
        @page
        {
            size: landscape;
        }

        table{
            font-size:10px !important;
            }
        .h4, h4 {
            font-size: 13px;
        }
    }
</style>
@endsection


@section('nocontent')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <strong>Declaración Patrimonial</strong> </strong>
        </h3>
    </div>
    <div class="panel-body text-justify">
        <img class="img" src="{{ asset('img/escudo.gif') }}" alt="Escudo México">
        <img src="{{ asset('img/'.CARPETA.'1.gif') }}" style="margin-top:-15px !important;" alt="Escudo {{ CARPETA }}">

        <p>&nbsp;</p>

    <h3 class="pull-right">
        <strong>{{ $declaracion->tipo }}, Folio:<strong>{{ $declaracion->updated_at }}-{{ $declaracion->id }}</strong> </strong>
    </h3>

    <h4>1 y 2.DATOS GENERALES:</h4>

    <table>
        <tr>
            <td><strong>NOMBRE(S)</strong></td>
            <td>{{ $datos->nombre }} {{ $datos->primer_apellido }} {{ $datos->segundo_apellido }}</td>
        </tr>
        <tr>
            <td><strong>CURP</strong></td>
            <td class="upper">{{ $datos->curp }}</td>
        </tr>
        <tr>
            <td><strong>RFC/HOMOCLAVE</strong></td>
            <td class="upper">{{ $datos->rfc }}-{{ $datos->homoclave }}</td>
        </tr>
        <tr>
            <td><strong>EMAIL CONTACTO</strong></td>
            <td class="normal">LABORAL: {{ $datos->email_laboral }} / PERSONAL: {{ $datos->email_personal }}</td>
        </tr>
        <tr>
            <td><strong>ESTADO CIVIL</strong></td>
            <td>{{ $datos->estado_civil }} @if($datos->estado_civil == "CASADO (A)") REGIMEN MATRIMONIAL: {{ $datos->regimen_matrimonial }} @endif</td>
        </tr>
        <tr>
            <td><strong>LUGAR DE NACIMIENTO</strong></td>
            <td>{{ $datos->pais }}, {{ $datos->estado }} </td>
        </tr>
        <tr>
            <td><strong>NACIONALIDAD</strong></td>
            <td>{{ $datos->nacionalidad }}</td>
        </tr>
        <tr>
            <td><strong>CELULAR</strong></td>
            <td>{{ $datos->celular }}</td>
        </tr>
        <tr>
            <td><strong>DOMICILIO</strong></td>
            <td>CALLE: {{ $domicilio->calle }} {{ $domicilio->numero_exterior }} {{ $domicilio->numero_interior }}; COLONIA: {{ $domicilio->colonia }}; <br>
                MUNICIPIO: {{ $domicilio->municipio }}; ESTADO: {{ $domicilio->estado }}; <br> CP: {{ $domicilio->cp }}; PAÍS: {{ $domicilio->pais }}; TELÉFONO: {{ $domicilio->telefono }}</td>
        </tr>
        <tr>
            <td><strong>ACLARACIONES</strong></td>
            <td>
                {{ $datos->aclaraciones }}
                {{ $domicilio->aclaraciones }}
            </td>
        </tr>
    </table>

    <hr>

    <p>&nbsp;</p>

    <h4>3.- ESCOLARIDAD:</h4>

    <table>
        <tr>
            <td><strong>NIVEL</strong></td>
            <td><strong>PAÍS</strong></td>
            <td><strong>INSTITUCIÓN</strong></td>
            <td><strong>CARRERA/ÁREA</strong></td>
            <td><strong>ESTATUS</strong></td>
            <td><strong>DOCUMENTO</strong></td>
        </tr>
        @forelse($escolaridades as $escuela)
        <tr>
            <td>{{ $escuela->nivel_educativo }}</td>
            <td>{{ $escuela->pais }} {{ $escuela->estado }} {{ $escuela->municipio }}</td>
            <td>{{ $escuela->institucion }}</td>
            <td>{{ $escuela->conocimiento }}</td>
            <td>{{ $escuela->estatus }} {{ $escolaridad->no_periodos }} {{ $escolaridad->periodo }}</td>
            <td>{{ $escuela->documento }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="6">SIN ESCOLARIDAD</td>
        </tr>
        @endforelse
        <tr>
            <td><strong>ACLARACIONES</strong></td>
            <td>
                {{ $escolaridad->aclaraciones }}
            </td>
        </tr>
    </table>

    <hr>

    <p>&nbsp;</p>

    <h4>4.- EXPERIENCIA LABORAL:</h4>

    <table>
        <tr>
            <td><strong>SECTOR</strong></td>
            <td><strong>PODER</strong></td>
            <td><strong>ÁMBITO</strong></td>
            <td><strong>INSTITUCIÓN/EMPRESA</strong></td>
            <td><strong>ÁREA/UNIDAD</strong></td>
            <td><strong>PUESTO</strong></td>
            <td><strong>FUNCIÓN PRINCIPAL</strong></td>
            <td><strong>INGRESO/EGRESO</strong></td>
        </tr>
        @forelse($experiencias as $experiencia)
        <tr>
            <td>{{ $experiencia->sector }}</td>
            <td>{{ $experiencia->poder }}</td>
            <td>{{ $experiencia->ambito }}</td>
            <td>{{ $experiencia->institucion }} {{ $experiencia->razon_social }}</td>
            <td>{{ $experiencia->area }} {{ $experiencia->unidad }}</td>
            <td>{{ $experiencia->puesto_o_cargo }}</td>
            <td>{{ $experiencia->funcion }}</td>
            <td>@dMy($experiencia->ingreso) - @dMy($experiencia->egreso)</td>
        </tr>
        @empty
        <tr>
            <td colspan="8">SIN TRABAJOS PREVIOS</td>
        </tr>
        @endforelse
        <tr>
            <td><strong>ACLARACIONES</strong></td>
            <td>
                {{ $experience->aclaraciones }}
            </td>
        </tr>
    </table>

    <hr>

    <p>&nbsp;</p>

    <h4>5.- {{ $publico->publicar_view }} ESTOY DE ACUERDO EN HACER PÚBLICOS MIS DATOS PATRIMONIALES</h4>

    <table>
        <tr>
            <td><strong>ACLARACIONES</strong></td>
            <td>
                {{ $publico->aclaraciones }}
            </td>
        </tr>
    </table>

    <hr>

    <p>&nbsp;</p>

    <h4>6.- DATOS DEL CÓNYUGE, CONCUBINA O CONCUBINARIO Y/O DEPENDIENTES ECONÓMICOS</h4>

    <table>
        <tr>
            <td><strong>DEPENDIENTE</strong></td>
            <td><strong>PARENTESCO</strong></td>
            <td><strong>DOMICILIO</strong></td>
            <td><strong>¿ES DEPENDIENTE?</strong></td>
            <td><strong>¿SE HA DESEMPEÑADO <BR> COMO SERVIDOR?</strong></td>
            <td><strong>CURP</strong></td>
        </tr>
        @forelse($dependientes as $dependiente)
        <tr>
            <td>{{ $dependiente->nombre }} {{ $dependiente->primer_apellido }} {{ $dependiente->segundo_apellido }}</td>
            <td>{{ $dependiente->parentesco }}</td>
            <td>
                @if($dependiente->cohabitante == "SÍ")
                HABITA CON EL DECLARANTE
                @else
                CALLE: {{ $dependiente->calle }} {{ $dependiente->numero_exterior }} {{ $dependiente->numero_interior }};
                <br>
                COLONIA: {{ $dependiente->colonia }}; 
                <br>
                MUNICIPIO: {{ $dependiente->municipio }} {{ $dependiente->condado }}; 
                <br>
                ESTADO: {{ $dependiente->estado }} {{ $dependiente->provincia }}; CP: {{ $dependiente->cp }}; 
                <br>
                PAÍS: {{ $dependiente->pais }}
                @endif
            </td>
            <td>{{ $dependiente->dependiente_economico }}</td>
            <td>{{ $dependiente->servidor_publico }} <br> {{ $dependiente->dependencia }} <br> {{ $dependiente->periodo }}</td>
            <td>{{ $dependiente->curp }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="6">SIN DEPENDIENTES</td>
        </tr>
        @endforelse
        <tr>
            <td><strong>ACLARACIONES</strong></td>
            <td>
                {{ $dependo->aclaraciones }}
            </td>
        </tr>
    </table>

    <hr>

    <p>&nbsp;</p>

    <h4>7 y 8.- DATOS DEL ENCARGO (TRABAJO) ACTUAL</h4>

    <table>
        <tr>
            <td><strong>DEPENDENCIA</strong></td>
            <td>
                {{ $encargo->dependencia }} / {{ $config->institucion }} / {{ $config->estado }}
            </td>
        </tr>
        <tr>
            <td><strong>NOMBRE DEL CARGO:</strong></td>
            <td>
                {{ $encargo->nombre_empleo }}
            </td>
        </tr>
        <tr>
            <td><strong>¿ESTÁS CONTRATADO POR HONORARIOS?:</strong></td>
            <td>
                {{ $encargo->honorarios_view }},  {{ $encargo->nivel_cargo }}  
            </td>
        </tr>
        <tr>
            <td><strong>AREA DE ADSCRIPCIÓN:</strong></td>
            <td>
                {{ $encargo->area_adscripcion }}
            </td>
        </tr>
        <tr>
            <td><strong>FECHA EN QUE INICIÓ EL ENCARGO:</strong></td>
            <td>
                @dMy($encargo->fecha)
            </td>
        </tr>
        <tr>
            <td><strong>DOMICILIO</strong></td>
            <td>CALLE: {{ $encargod->calle }} {{ $encargod->numero_exterior }} {{ $encargod->numero_interior }}; COLONIA: {{ $encargod->colonia }}; 
                <br>MUNICIPIO: {{ $encargod->municipio }}; ESTADO: {{ $encargod->estado }}; CP: {{ $encargod->cp }}; PAÍS: {{ $encargod->pais }}; TELÉFONO: {{ $encargod->telefono }}
            </td>
        </tr>
        <tr>
            <td><strong>FUNCIONES PRINCIPALES:</strong></td>
            <td>
                @if($encargo->a == 1)
                    Administración de Bienes,<br>
                @endif
                @if($encargo->b == 1)
                    Atención directa al público,<br>
                @endif
                @if($encargo->c == 1)
                    Calificación o determinación para la expedición de licencias, permisos o concesiones,<br>
                @endif
                @if($encargo->d == 1)
                    Funciones de inspección,<br>
                @endif
                @if($encargo->e == 1)
                    Interventorias,<br>
                @endif
                @if($encargo->f == 1)
                    Labor de supervisión,<br>
                @endif
                @if($encargo->g == 1)
                    Manejo de recursos financieros,<br>
                @endif
                @if($encargo->h == 1)
                    Areas técnicas,<br>
                @endif
                @if($encargo->i == 1)
                    Auditorias,<br>
                @endif
                @if($encargo->j == 1)
                    Cuerpo de Seguridad,<br>
                @endif
                @if($encargo->k == 1)
                    Funciones de Vigilancia,<br>
                @endif
                @if($encargo->l == 1)
                    Investigación de delitos,<br>
                @endif
                @if($encargo->m == 1)
                    Licitaciones y adjudicaciones de contratos de bienes y servicios,<br>
                @endif
                @if($encargo->n == 1)
                    Manejo de recursos humanos,<br>
                @endif
                @if($encargo->o == 1)
                    {{ $encargo->otro }}<br>
                @endif
            </td>
        </tr>
        <tr>
            <td><strong>ACLARACIONES</strong></td>
            <td>
                {{ $encargo->aclaraciones }}
            </td>
        </tr>
    </table>

    <hr>

    <p>&nbsp;</p>

    <h4>9.- INGRESOS DEL DECLARANTE</h4>

    <table>
        <tr>
            <td>
                <strong>
                    I. Remuneración neta del declarante por su cargo público. (Deduce impuestos).
                </strong>
            </td>
            <td>
                ${{ $ingresos->remuneracion_anual }}
            </td>
            <td>

            </td>
        </tr>
        <tr>
            <td><strong>
                II. Otros ingresos netos del declarante.
                </strong>
            </td>
            <td>
                ${{ $ingresos->extras() }}
            </td>
            <td>
                SUMATORIA (suma II.1 a II.4)      
            </td>
        </tr>
        <tr>
            <td><strong>
                II.1 Por actividad industrial y/o comercial.
                </strong>
            </td>
            <td>
                ${{ $ingresos->actividad_industrial }}
            </td>
            <td>
                {{ $ingresos->especifica_industrial }}
            </td>
        </tr>
        <tr>
            <td><strong>
                II.2 Por actividad financiera.
                </strong>
            </td>
            <td>
                ${{ $ingresos->actividad_financiera }}
            </td>
            <td>
                {{ $ingresos->especifica_financiera }}
            </td>
        </tr>
        <tr>
            <td><strong>
                II.3 Por servicios profesionales, participación en consejos, consultorías o asesorías.
                </strong>
            </td>
            <td>
                ${{ $ingresos->servicios_profesionales }}
            </td>
            <td>
                {{ $ingresos->especifica_servicios }}
            </td>
        </tr>
        <tr>
            <td><strong>
                II.4 Otros (Deduce impuestos)
                </strong>
            </td>
            <td>
                ${{ $ingresos->otros }}
            </td>
            <td>
                {{ $ingresos->especifica_otros }}
            </td>
        </tr>
        <tr>
            <td><strong>
                A. Ingreso neto del declarante.
                </strong>
            </td>
            <td>
                ${{ $ingresos->netos() }}
            </td>
            <td>
                 suma de A y B
            </td>
        </tr>
        <tr>
            <td><strong>
                B. Ingreso neto del cónyuge, concubina o concubinario y/o dependientes económicos.
                </strong>
            </td>
            <td>
                ${{ $ingresos->ingreso_anual }}
            </td>
            <td>
               {{ $ingresos->especifica_anual }}
            </td>
        </tr>
        <tr>
            <td><strong>
                C. Total de ingresos netos del declarante, cónyuge, concubina o concubinario <br> y/o dependientes económicos.
                </strong>
            </td>
            <td>
                ${{ $ingresos->total() }}
            </td>
            <td>
                SUMATORIA:  suma de I y II
            </td>
        </tr>
        <tr>
            <td><strong>ACLARACIONES</strong></td>
            <td>
                {{ $ingresos->aclaraciones }}
            </td>
        </tr>
    </table>

    <hr>

    <p>&nbsp;</p>

    <h4>10.-¿TE DESEMPEÑASTE COMO SERVIDOR PÚBLICO EL AÑO ANTERIOR OBLIGADO A PRESENTAR DECLARACIÓN EN OTRA DEPENDENCIA? </h4>

    <table>
        <tr>
            <td>{{ $exservidor->exservidor_view }}</td>
            <td>

            </td>
        </tr>
        <tr>
            <td><strong>ACLARACIONES</strong></td>
            <td>
                {{ $exservidor->aclaraciones }}
            </td>
        </tr>
    </table>

    <hr>

    <p>&nbsp;</p>

    <h4>11.- BIENES INMUEBLES DEL DECLARANTE, CÓNYUGE Y/O DEPENDIENTES ECONÓMICOS</h4>

    <table>
        <tr>
            <td>BIEN INMUEBLE</td>
            <td>TIPO OBRA</td>
            <td>DOMICILIO</td>
            <td>SUP TERRENO</td>
            <td>SUP CONSTRUCCIÓN</td>
            <td>FORMA OPERACIÓN</td>
            <td>FECHA</td>
            <td>REGISTRO/ID</td>
            <td>TITULAR</td>
            <td>VALOR</td>
        </tr>
        @forelse($inmuebles as $inmueble)
        <tr>
            <td>{{ $inmueble->tipo_bien }}</td>
            <td>{{ $inmueble->tipo_obra }}</td>
            <td>
                CALLE: {{ $inmueble->calle }} {{ $inmueble->numero_exterior }} {{ $inmueble->numero_interior }}; 
                <br>
                COLONIA: {{ $inmueble->colonia }}; 
                <br>
                MUNICIPIO: {{ $inmueble->municipio }}; 
                <br>
                ESTADO: {{ $inmueble->estado }};
                <br>
                CP: {{ $inmueble->cp }}; PAÍS: {{ $inmueble->pais }}; TELÉFONO: {{ $inmueble->telefono }}
            </td>
            <td>{{ $inmueble->superficie_terreno }}m2</td>
            <td>{{ $inmueble->superficie_construccion }}m2</td>
            <td>
                {{ $inmueble->forma_adquisicion }}
                <br>
                {{ $inmueble->nombre_cesionario }}
                <br>
                {{ $inmueble->especifica_relacion }}
            </td>
            <td>@dMy($inmueble->fecha_adquisicion)</td>
            <td>{{ $inmueble->registro_publico }}</td>
            <td>{{ $inmueble->titular }}</td>
            <td>{{ $inmueble->valor_inmueble }} {{ $inmueble->moneda_valor }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="10">SIN INMUEBLES</td>
        </tr>
        @endforelse
    </table>
    <table>
        <tr>
            <td><strong>ACLARACIONES</strong></td>
            <td>
            {{ $bi->aclaraciones }}
            </td>
        </tr>
    </table>

    <hr>

    <p>&nbsp;</p>

    <h4>12.- VEHICULOS DEL DECLARANTE. CÓNYUGE Y/O DEPENDIENTES ECONÓMICOS</h4>

    <table>
        <tr>
            <td>MARCA</td>
            <td>TIPO</td>
            <td>MODELO</td>
            <td>SERIE</td>
            <td>LUGAR REGISTRO</td>
            <td>FORMA OPERACIÓN</td>
            <td>FECHA</td>
            <td>VALOR</td>
            <td>TITULAR</td>
        </tr>
        @forelse($vehiculos as $vehiculo)
        <tr>
            <td>{{ $vehiculo->marca }}</td>
            <td>{{ $vehiculo->tipo }}</td>
            <td>{{ $vehiculo->modelo }}</td>
            <td>{{ $vehiculo->serieb }}</td>
            <td>{{ $vehiculo->ubicacion }}</td>
            <td>{{ $vehiculo->forma_adquisicion }}</td>
            <td>@dMy($vehiculo->fecha_adquisicion)</td>
            <td>{{ $vehiculo->valor_adquisicion }} {{ $vehiculo->moneda_adquisicion }}</td>
            <td>{{ $vehiculo->titular }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="9">SIN VEHÍCULOS</td>
        </tr>
        @endforelse
    </table>
    <table>
        <tr>
            <td><strong>ACLARACIONES</strong></td>
            <td>
            {{ $auto->aclaraciones }}
            </td>
        </tr>
    </table>

    <hr>

    <p>&nbsp;</p>

    <h4>13.- BIENES MUEBLES DEL DECLARANTE,  CÓNYUGE Y/O DEPENDIENTES ECONÓMICOS</h4>

    <table>
        <tr>
            <td>TIPO</td>
            <td>DESCRIPCION DEL BIEN</td>
            <td>OPERACIÓN</td>
            <td>FECHA</td>
            <td>VALOR</td>
            <td>TITULAR</td>
        </tr>
        @forelse($muebles as $mueble)
        <tr>
            <td>{{ $mueble->tipo_bien }}</td>
            <td>{{ $mueble->descripcion }}</td>
            <td>{{ $mueble->operacion }}</td>
            <td>@dMy($mueble->fecha_adquisicion)</td>
            <td>{{ $mueble->valor_bien }} {{ $mueble->moneda_bien }}</td>
            <td>{{ $mueble->titular }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="6">SIN BIENES MUEBLES</td>
        </tr>
        @endforelse
    </table>
    <table>
        <tr>
            <td><strong>ACLARACIONES</strong></td>
            <td>
            {{ $bm->aclaraciones }}
            </td>
        </tr>
    </table>

    <hr>

    <p>&nbsp;</p>

    <h4>14.- INVERSIONES, CUENTAS BANCARIAS Y OTROS TIPO VALORES DEL DECLARANTE, CÓNYUGE Y/O DEPENDIENTES ECONÓMICOS </h4>

    <table>
        <tr>
            <td>INVERSIÓN</td>
            <td>CUENTA</td>
            <td>INSTITUCIÓN</td>
            <td>TITULAR</td>
            <td>SALDO</td>
        </tr>
        @forelse($inversiones as $inversion)
        <tr>
            <td>{{ $inversion->tipo_inversion }}</td>
            <td>{{ $inversion->numero_cuenta }}</td>
            <td>{{ $inversion->institucion }}</td>
            <td>{{ $inversion->titular }}</td>
            <td>{{ $inversion->saldo }} {{ $inversion->moneda_saldo }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="5">SIN INVERSIONES</td>
        </tr>
        @endforelse
    </table>
    <table>
        <tr>
            <td><strong>ACLARACIONES</strong></td>
            <td>
            {{ $inversor->aclaraciones }}
            </td>
        </tr>
    </table>

    <hr>

    <p>&nbsp;</p>

    <h4>15.- ADEUDOS DEL DECLARANTE, CÓNYUGE Y/O DEPENDIENTES ECONÓMICOS</h4>

    <table>
        <tr>
            <td>ADEUDO</td>
            <td>CUENTA</td>
            <td>INSTITUCIÓN</td>
            <td>FECHA O.</td>
            <td>ADEUDO O.</td>
            <td>PLAZO</td>
            <td>ABONADO</td>
            <td>TITULAR</td>
        </tr>
        @forelse($adeudos as $adeudo)
        <tr>
            <td>{{ $adeudo->tipo_inversion }}</td>
            <td>{{ $adeudo->numero_cuenta }}</td>
            <td>{{ $adeudo->institucion_social }}</td>
            <td>@dMy($adeudo->fecha_otorgamiento)</td>
            <td>{{ $adeudo->monto }}</td>
            <td>{{ $adeudo->plazo }}</td>
            <td>{{ $adeudo->monto_pagos }}</td>
            <td>{{ $adeudo->titular }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="8">SIN ADEUDOS</td>
        </tr>
        @endforelse
    </table>
    <table>
        <tr>
            <td><strong>ACLARACIONES</strong></td>
            <td>
            {{ $adeudor->aclaraciones }}
            </td>
        </tr>
    </table>

    <hr>

    <p>&nbsp;</p>

    <h4>16.- {{ $conflicto->publicar_view }} ESTOY DE ACUERDO EN HACER PÚBLICO MI POSIBLE CONFLICTO DE INTERÉS</h4>

    <table>
        <tr>
            <td><strong>ACLARACIONES</strong></td>
            <td>
                {{ $conflicto->aclaraciones }}
            </td>
        </tr>
    </table>

    <hr>

    <p>&nbsp;</p>

    <h4>17.- PUESTO, CARGO, COMISIÓN, ACTIVIDADES O PODERES QUE ACTUALMENTE TENGA EL DECLARANTE, CÓNYUGE, CONCUBINA O CONCUBINARIO Y/O DEPENDIENTES ECONÓMICOS EN ASOCIACIONES, SOCIEDADES, CONSEJOS, ACTIVIDADES FILANTRÓPICA</h4>

    <table>
        <tr>
            <td>OPERACION</td>
            <td>RESPONSABLE CI</td>
            <td>ENTIDAD</td>
            <td>VINCULO</td>
            <td>ANTIGUEDAD</td>
            <td>FRECUENCIA</td>
            <td>PARTICIPACION</td>
            <td>T PERSONA</td>
            <td>T COLABORACION</td>
        </tr>
        @forelse($comisiones as $comision)
        <tr>
            <td>{{ $comision->operacion }}</td>
            <td>{{ $comision->responsable }}</td>
            <td>{{ $comision->entidad }}</td>
            <td>{{ $comision->vinculo }}</td>
            <td>{{ $comision->antiguedad }}</td>
            <td>{{ $comision->frecuencia }}</td>
            <td>{{ $comision->participacion }}</td>
            <td>{{ $comision->tipo_persona }}</td>
            <td>{{ $comision->tipo_aporte }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="9">SIN PUESTOS O COMISIONES</td>
        </tr>
        @endforelse
    </table>
    <table>
        <tr>
            <td><strong>ACLARACIONES</strong></td>
            <td>
            {{ $participo->aclaraciones }}
            </td>
        </tr>
    </table>

    <p>&nbsp;</p>

    <hr>

    <h4>18.- PARTICIPACIONES ECONOMICAS FINANCIERAS DEL DECLARANTE, CÓNYUGE O CONCUBINARIO Y/O DEPENDIENTES ECONOMICOS</h4>

    <table>
        <tr>
            <td>OPERACION</td>
            <td>RESPONSABLE CI</td>
            <td>EMPRESA</td>
            <td>FECHA C.</td>
            <td>INSCRIPCION</td>
            <td>SECTOR</td>
            <td>PARTICIPACION</td>
            <td>SOCIEDAD</td>
            <td>ANTIGUEDAD</td>
        </tr>
        @forelse($participaciones as $participacion)
        <tr>
            <td>{{ $participacion->operacion }}</td>
            <td>{{ $participacion->responsableb }}</td>
            <td>{{ $participacion->nombreb }}</td>
            <td>@dMy($participacion->fecha)</td>
            <td>{{ $participacion->registro_publico }}</td>
            <td>{{ $participacion->sector }}</td>
            <td>{{ $participacion->contrato }}</td>
            <td>{{ $participacion->tipo_sociedad }}</td>
            <td>{{ $participacion->antiguedad }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="9">SIN PARTICIPACIONES</td>
        </tr>
        @endforelse
    </table>
    <table>
        <tr>
            <td><strong>ACLARACIONES</strong></td>
            <td>
            {{ $participo->aclaraciones }}
            </td>
        </tr>
    </table>

    <hr>

    <p>&nbsp;</p>

    <h4>19 y 20.- OBSERVACIONES</h4>

    <table>
        <tr>
            <td>
                {{ $observaciones->observaciones }}
            </td>
        </tr>
    </table>






























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
function myFunction() 
{
    window.print();
}
</script>
@endsection
