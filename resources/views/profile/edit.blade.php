@extends('layouts.master') @section('title', 'Perfil de la Empresafile ') @section('content')
<div class="row indicadores-form">
    <div class="card col-12">
        <div class="card-body">
            <h1>{{Auth::user()->nombre}}</h1>
            <form action="/profile/empresa/{{Auth::user()->id}}" method="POST" class="form">
                <div class="row">
                    @if ($errors->any())

                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif {{ csrf_field() }}
                    <div class="form-group col-md-12">
                        <label for="nombre">Nombre de la Empresa</label>
                        <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" id="nombre" placeholder="Nombre de la empresa">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="pais">País</label>
                        <select class="form-control" required id="pais" name="pais" value="{{ old('pais') }}">
                            <option>Seleccione una opcion</option>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Brazil">Brazil</option>
                            <option value="Brunei">Brunei</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Central African Republic">Central African Republic</option>
                            <option value="Chad">Chad</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Comoros">Comoros</option>
                            <option value="Congo">Congo</option>
                            <option value="Congo">Congo</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Cote de Ivoire">Cote de Ivoire</option>
                            <option value="Croatia">Croatia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Czech Republic">Czech Republic</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican Republic">Dominican Republic</option>
                            <option value="East Timor">East Timor</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                            <option value="España">España</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Greece">Greece</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guinea Bissau">Guinea Bissau</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Iran">Iran</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan">Japan</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Korea del Norte">Korea del Norte</option>
                            <option value="Korea del Sur">Korea del Sur</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Laos">Laos</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libya">Libya</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macedonia">Macedonia</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marshall Islands">Marshall Islands</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Micronesia">Micronesia</option>
                            <option value="Moldova">Moldova</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Myanmar">Myanmar</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepa">Nepa</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palau">Palau</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Romania">Romania</option>
                            <option value="Russia">Russia</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                            <option value="Saint Lucia">Saint Lucia</option>
                            <option value="Saint Vincent">Saint Vincent</option>
                            <option value="Samoa">Samoa</option>
                            <option value="San Marino">San Marino</option>
                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Slovakia">Slovakia</option>
                            <option value="Slovenia">Slovenia</option>
                            <option value="Solomon Islands">Solomon Islands</option>
                            <option value="Somalia">Somalia</option>
                            <option value="South Africa">South Africa</option>
                            <option value="Spain">Spain</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Sudan">Sudan</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syria">Syria</option>
                            <option value="Taiwan">Taiwan</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania">Tanzania</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Togo">Togo</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Turkmenistan">Turkmenistan</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Vatican City">Vatican City</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Vietnam">Vietnam</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="departamento">Departamento</label>
                        <select class="form-control" id="departments" name="departamento" value="{{ old('departamento') }}">
                            <option>Seleccione una opcion</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="municipio">Municipio</label>
                        <select class="form-control" id="cities" name="municipio" value="{{ old('municipio') }}">
                            <option>Seleccione una opcion</option>
                        </select>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="direccion">Dirección Empresa</label>
                        <input type="text" name="direccion" value="{{ old('direccion') }}" class="form-control">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="telefono">Telefono Empresa</label>
                        <input type="tel" name="telefono" value="{{ old('telefono') }}" class="form-control">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="web">Pagina Web Empresa</label>
                        <input type="text" name="web" value="{{ old('web') }}" class="form-control">
                    </div>

                    <div class="form-group  col-md-6">
                        <label for="tamano">Tamaño de la empresa</label>
                        <select class="form-control" name="tamano" value="{{ old('tamano') }}">
                            <option selected>Seleccionar...</option>
                            <option value="1">Micro</option>
                            <option value="2">Pequeña</option>
                            <option value="3">Mediana</option>
                            <option value="4">Grande</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="num_trabajadores" class="form-label">Número de trabajadores</label>
                        <input class="form-control" name="num_trabajadores" type="number" value="0" min="0" id="num_trabajadores">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="nit">NIT</label>
                        <input type="number" name="nit" value="{{ old('nit') }}" class="form-control" placeholder="Enter NIT">
                        <sapn>Digite el número de identificación sin puntos ni guiones, para el NIT el dígito de Verificación no es requerido.</sapn>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="sector_economico">Código CIIU Actividad Económica Principal</label>
                        <select class="form-control" name="sector_economico" id="ciiu-principal" required>
                            <option value="" selected disabled>Seleccione una opción...</option>
                            <option value="1011"> 1011 - Procesamiento y conservación de carne y productos cárnicos</option>
                            <option value="1012"> 1012 - Procesamiento y conservación de pescados, crustáceos y moluscos</option>
                            <option value="1020"> 1020 - Procesamiento y conservación de frutas, legumbres, hortalizas y tubérculos</option>
                            <option value="1030"> 1030 - Elaboración de aceites y grasas de origen vegetal y animal</option>
                            <option value="1051"> 1051 - Elaboración de productos de molinería</option>
                            <option value="1052"> 1052 - Elaboración de almidones y productos derivados del almidón</option>
                            <option value="1071"> 1071 - Elaboración y refinación de azúcar</option>
                            <option value="1072"> 1072 - Elaboración de panela</option>
                            <option value="1082"> 1082 - Elaboración de cacao, chocolate y productos de confitería</option>
                            <option value="1083"> 1083 - Elaboración de macarrones, fideos, alcuzcuz y productos farináceos similares</option>
                            <option value="1089"> 1089 - Elaboración de otros productos alimenticios n.c.p.</option>
                            <option value="1090"> 1090 - Elaboración de alimentos preparados para animales</option>
                            <option value="1101"> 1101 - Destilación, rectificación y mezcla de bebidas alcohólicas</option>
                            <option value="1102"> 1102 - Elaboración de bebidas fermentadas no destiladas</option>
                            <option value="1103"> 1103 - Producción de malta, elaboración de cervezas y otras bebidas malteadas</option>
                            <option value="1104"> 1104 - Elaboración de bebidas no alcohólicas, producción de aguas minerales y de otras aguas
                                embotelladas
                            </option>
                            <option value="0145"> 0145 - Cría de aves de corral</option>
                            <option value="4631"> 4631 - Comercio al por mayor de productos alimenticios</option>
                            <option value="0141"> 0141 - Cría de ganado bovino y bufalino</option>
                            <option value="0162"> 0162 - Actividades de apoyo a la ganadería</option>
                            <option value="4620"> 4620 - Comercio al por menor de carnes, productos cárnicos, pescados y productos de mar, en establecimientos
                                especializados
                            </option>
                            <option value="4723"> 4723 - Comercio al por mayor de materias primas agropecuarias; animales vivos</option>
                            <option value="0142"> 0142 - Cría de caballos y otros equinos</option>
                            <option value="0143"> 0143 - Cría de ovejas y cabras</option>
                            <option value="0149"> 0149 - Cría de otros animales n.c.p.</option>
                            <option value="0311"> 0311 - Pesca marítima</option>
                            <option value="0312"> 0312 - Pesca de agua dulce</option>
                            <option value="0321"> 0321 - Acuicultura marítima</option>
                            <option value="0322"> 0322 - Acuicultura de agua dulce</option>
                            <option value="0144"> 0144 - Cría de ganado porcino</option>
                            <option value="0150"> 0150 - Explotación primaria mixta (agrícola y pecuaria)</option>
                            <option value="0127"> 0127 - Cultivo de plantas con las que se preparan bebidas</option>
                            <option value="4632"> 4632 - Comercio al por mayor de bebidas y tabaco</option>
                            <option value="0106"> 0106 - Elaboración de productos de café</option>
                            <option value="0123"> 0123 - Cultivo de café</option>
                            <option value="1061"> 1061 - Trilla de café</option>
                            <option value="1062"> 1062 - Descafeinado, tostión y molienda del café</option>
                            <option value="1063"> 1063 - Otros derivados del café</option>
                            <option value="0107"> 0107 - Elaboración de azúcar y panela</option>
                            <option value="0124"> 0124 - Cultivo de caña de azúcar</option>
                            <option value="0105"> 0105 - Elaboración de productos de molinería, almidones y productos derivados del almidón</option>
                            <option value="0111"> 0111 - Cultivo de cereales (excepto arroz), legumbres y semillas oleaginosas</option>
                            <option value="0112"> 0112 - Cultivo de arroz</option>
                            <option value="0119"> 0119 - Otros cultivos transitorios n.c.p.</option>
                            <option value="0125"> 0125 - Cultivo de flor de corte</option>
                            <option value="0113"> 0113 - Cultivo de hortalizas, raíces y tubérculos</option>
                            <option value="0121"> 0121 - Cultivo de frutas tropicales y subtropicales</option>
                            <option value="0122"> 0122 - Cultivo de plátano y banano</option>
                            <option value="0128"> 0128 - Cultivo de especias y de plantas aromáticas y medicinales</option>
                            <option value="0161"> 0161 - Actividades de apoyo a la agricultura</option>
                            <option value="0163"> 0163 - Actividades posteriores a la cosecha</option>
                            <option value="4721"> 4721 - Comercio al por menor de productos agrícolas para el consumo en establecimientos especializados</option>
                            <option value="0126"> 0126 - Cultivo de palma para aceite (palma africana) y otros frutos oleaginosos</option>
                            <option value="0114"> 0114 - Cultivo de tabaco </option>
                            <option value="1200"> 1200 - Elaboración de productos de tabaco</option>
                            <option value="1040"> 1040 - Elaboración de productos lácteos</option>
                            <option value="4722"> 4722 - Comercio al por menor de leche, productos lácteos y huevos, en establecimientos especializados</option>
                            <option value="0129"> 0129 - Otros cultivos permanentes n.c.p.</option>
                            <option value="0210"> 0210 - Silvicultura y otras actividades forestales</option>
                            <option value="0220"> 0220 - Extracción de madera</option>
                            <option value="0230"> 0230 - Recolección de productos forestales diferentes a la madera</option>
                            <option value="0240"> 0240 - Servicios de apoyo a la silvicultura</option>
                            <option value="0130"> 0130 - Propagación de plantas (actividades de los viveros, excepto viveros forestales)</option>
                            <option value="0164"> 0164 - Tratamiento de semillas para propagación</option>
                            <option value="2599"> 2599 - Fabricación de otros productos elaborados de metal n.c.p.</option>
                            <option value="2811"> 2811 - Fabricación de motores, turbinas, y partes para motores de combustión interna</option>
                            <option value="2910"> 2910 - Fabricación de vehículos automotores y sus motores</option>
                            <option value="2920"> 2920 - Fabricación de carrocerías para vehículos automotores; fabricación de remolques y semirremolques</option>
                            <option value="2930"> 2930 - Fabricación de partes, piezas (autopartes) y accesorios (lujos) para vehículos automotores</option>
                            <option value="3091"> 3091 - Fabricación de motocicletas</option>
                            <option value="4662"> 4662 - Comercio al por mayor de metales y productos metalíferos</option>
                            <option value="0710"> 0710 - Extracción de minerales de hierro</option>
                            <option value="0811"> 0811 - Extracción de piedra, arena, arcillas comunes, yeso y anhidrita</option>
                            <option value="0812"> 0812 - Extracción de arcillas de uso industrial, caliza, caolín y bentonitas</option>
                            <option value="0899"> 0899 - Extracción de otros minerales no metálicos n.c.p.</option>
                            <option value="0990"> 0990 - Actividades de apoyo para otras actividades de explotación de minas y canteras</option>
                            <option value="1610"> 1610 - Aserrado, acepillado e impregnación de la madera</option>
                            <option value="1620"> 1620 - Fabricación de hojas de madera para enchapado; fabricación de tableros contrachapados,
                                tableros laminados, tableros de partículas y otros tableros y paneles</option>
                            <option value="1630"> 1630 - Fabricación de partes y piezas de madera, de carpintería y ebanistería para la construcción</option>
                            <option value="1690"> 1690 - Fabricación de otros productos de madera; fabricación de artículos de corcho, cestería
                                y espartería</option>
                            <option value="2030"> 2030 - Fabricación de fibras sintéticas y artificiales</option>
                            <option value="2310"> 2310 - Fabricación de vidrio y productos de vidrio</option>
                            <option value="2391"> 2391 - Fabricación de productos refractarios</option>
                            <option value="2392"> 2392 - Fabricación de materiales de arcilla para la construcción</option>
                            <option value="2394"> 2394 - Fabricación de cemento, cal y yeso</option>
                            <option value="2395"> 2395 - Fabricación de artículos de hormigón, cemento y yeso</option>
                            <option value="2396"> 2396 - Corte, tallado y acabado de la piedra</option>
                            <option value="2399"> 2399 - Fabricación de otros productos minerales no metálicos n.c.p.</option>
                            <option value="2410"> 2410 - Industrias básicas de hierro y de acero</option>
                            <option value="2431"> 2431 - Fundición de hierro y de acero</option>
                            <option value="2511"> 2511 - Fabricación de productos metálicos para uso estructural</option>
                            <option value="2512"> 2512 - Fabricación de tanques, depósitos y recipientes de metal, excepto los utilizados para
                                el envase o transporte de mercancías</option>
                            <option value="2816"> 2816 - Fabricación de equipo de elevación y manipulación</option>
                            <option value="4312"> 4312 - Preparación del terreno</option>
                            <option value="4322"> 4322 - Instalaciones de fontanería, calefacción y aire acondicionado</option>
                            <option value="4330"> 4330 - Terminación y acabado de edificios y obras de ingeniería civil</option>
                            <option value="4390"> 4390 - Otras actividades especializadas para la construcción de edificios y obras de ingeniería
                                civil
                            </option>
                            <option value="3600"> 3600 - Captación, tratamiento y distribución de agua</option>
                            <option value="3700"> 3700 - Evacuación y tratamiento de aguas residuales</option>
                            <option value="3811"> 3811 - Recolección de desechos no peligrosos</option>
                            <option value="3821"> 3821 - Tratamiento y disposición de desechos no peligrosos</option>
                            <option value="3830"> 3830 - Recuperación de materiales</option>
                            <option value="4311"> 4311 - Demolición</option>
                            <option value="4659"> 4659 - Comercio al por mayor de otros tipos de maquinaria y equipo n.c.p.</option>
                            <option value="4663"> 4663 - Comercio al por mayor de materiales de construcción, artículos de ferretería, pinturas,
                                productos de vidrio, equipo y materiales de fontanería y calefacción </option>
                            <option value="1393"> 1393 - Fabricación de tapetes y alfombras para pisos</option>
                            <option value="2393"> 2393 - Fabricación de otros productos de cerámica y porcelana</option>
                            <option value="4752"> 4752 - Comercio al por menor de artículos de ferretería, pinturas y productos de vidrio en establecimientos
                                especializados
                            </option>
                            <option value="4753"> 4753 - Comercio al por menor de tapices, alfombras y cubrimientos para paredes y pisos en establecimientos
                                especializados
                            </option>
                            <option value="4754"> 4754 - Comercio al por menor de electrodomésticos y gasodomésticos de uso doméstico, muebles
                                y equipos de iluminación</option>
                            <option value="4111"> 4111 - Construcción de edificios residenciales</option>
                            <option value="4112"> 4112 - Construcción de edificios no residenciales</option>
                            <option value="1394"> 1394 - Fabricación de cuerdas, cordeles, cables, bramantes y redes</option>
                            <option value="2610"> 2610 - Fabricación de componentes y tableros electrónicos</option>
                            <option value="2620"> 2620 - Fabricación de computadoras y de equipo periférico</option>
                            <option value="2711"> 2711 - Fabricación de motores, generadores y transformadores eléctricos</option>
                            <option value="2712"> 2712 - Fabricación de aparatos de distribución y control de la energía eléctrica</option>
                            <option value="2720"> 2720 - Fabricación de pilas, baterías y acumuladores eléctricos</option>
                            <option value="2731"> 2731 - Fabricación de hilos y cables eléctricos y de fibra óptica</option>
                            <option value="2732"> 2732 - Fabricación de dispositivos de cableado</option>
                            <option value="2740"> 2740 - Fabricación de equipos eléctricos de iluminación</option>
                            <option value="2750"> 2750 - Fabricación de aparatos de uso doméstico</option>
                            <option value="2790"> 2790 - Fabricación de otros tipos de equipo eléctrico n.c.p.</option>
                            <option value="3312"> 3312 - Mantenimiento y reparación especializado de maquinaria y equipo</option>
                            <option value="3313"> 3313 - Mantenimiento y reparación especializado de equipo electrónico y óptico</option>
                            <option value="3314"> 3314 - Mantenimiento y reparación especializado de equipo eléctrico</option>
                            <option value="3320"> 3320 - Instalación especializada de maquinaria y equipo industrial </option>
                            <option value="3511"> 3511 - Generación de energía eléctrica</option>
                            <option value="3512"> 3512 - Transmisión de energía eléctrica</option>
                            <option value="3513"> 3513 - Distribución de energía eléctrica</option>
                            <option value="3514"> 3514 - Comercialización de energía eléctrica</option>
                            <option value="4220"> 4220 - Construcción de proyectos de servicio público</option>
                            <option value="4321"> 4321 - Instalaciones eléctricas</option>
                            <option value="4329"> 4329 - Otras instalaciones especializadas</option>
                            <option value="7110"> 7110 - Actividades de arquitectura e ingeniería y otras actividades conexas de consultoría técnica</option>
                            <option value="7120"> 7120 - Ensayos y análisis técnicos</option>
                            <option value="7410"> 7410 - Actividades especializadas de diseño </option>
                            <option value="8110"> 8110 - Actividades combinadas de apoyo a instalaciones</option>
                            <option value="6810"> 6810 - Actividades inmobiliarias realizadas con bienes propios o arrendados</option>
                            <option value="6820"> 6820 - Actividades inmobiliarias realizadas a cambio de una retribución o por contrata </option>
                            <option value="4210"> 4210 - Construcción de carreteras y vías de ferrocarril</option>
                            <option value="4290"> 4290 - Construcción de otras obras de ingeniería civil</option>
                            <option value="8511"> 8511 - Educación de la primera infancia</option>
                            <option value="8512"> 8512 - Educación preescolar</option>
                            <option value="8513"> 8513 - Educación básica primaria</option>
                            <option value="8521"> 8521 - Educación básica secundaria</option>
                            <option value="8522"> 8522 - Educación media académica</option>
                            <option value="8523"> 8523 - Educación media técnica y de formación laboral</option>
                            <option value="8530"> 8530 - Establecimientos que combinan diferentes niveles de educación inicial, preescolar, básica
                                primaria, básica secundaria y media</option>
                            <option value="8541"> 8541 - Educación técnica profesional</option>
                            <option value="8542"> 8542 - Educación tecnológica</option>
                            <option value="8543"> 8543 - Educación de instituciones universitarias o de escuelas tecnológicas</option>
                            <option value="8544"> 8544 - Educación de universidades</option>
                            <option value="8551"> 8551 - Formación académica no formal </option>
                            <option value="8552"> 8552 - Enseñanza deportiva y recreativa</option>
                            <option value="8559"> 8559 - Otros tipos de educación n.c.p.</option>
                            <option value="1081"> 1081 - Elaboración de productos de panadería</option>
                            <option value="1084"> 1084 - Elaboración de comidas y platos preparados</option>
                            <option value="5611"> 5611 - Restaurantes</option>
                            <option value="5612"> 5612 - Expendio por autoservicio de comidas preparadas</option>
                            <option value="5621"> 5621 - Catering</option>
                            <option value="4921"> 4921 - Transporte Terrestre</option>
                            <option value="5111"> 5111 - Transporte aéreo nacional de pasajeros</option>
                            <option value="5112"> 5112 - Transporte aéreo internacional de pasajeros</option>
                            <option value="5511"> 5511 - Alojamiento en Hoteles</option>
                            <option value="7911"> 7911 - Agencias de Viajes</option>
                            <option value="7912"> 7912 - Actividades de operadores turísticos</option>
                            <option value="8230"> 8230 - Organización de convenciones y eventos comerciales (OPC)</option>
                            <option value="1701"> 1701 - Fabricación de pulpas (pastas) celulósicas; papel y cartón</option>
                            <option value="1702"> 1702 - Fabricación de papel y cartón ondulado (corrugado); fabricación de envases, empaques y
                                de embalajes de papel y cartón</option>
                            <option value="1709"> 1709 - Fabricación de otros artículos de papel y cartón</option>
                            <option value="1811"> 1811 - Actividades de impresión</option>
                            <option value="1812"> 1812 - Actividades de servicios relacionados con la impresión</option>
                            <option value="4761"> 4761 - Comercio al por menor de libros, periódicos, materiales y artículos de papelería y escritorio,
                            </option>
                            <option value="5811"> 5811 - Edición de libros</option>
                            <option value="5813"> 5813 - Edición de periódicos, revistas y otras publicaciones periódicas</option>
                            <option value="5819"> 5819 - Otros trabajos de edición</option>
                            <option value="9001"> 9001 - Creación literaria</option>
                            <option value="7420"> 7420 - Actividades de fotografía</option>
                            <option value="9005"> 9005 - Artes plásticas y visuales</option>
                            <option value="5911"> 5911 - Actividades de producción de películas cinematográficas, videos, programas, anuncios y
                                comerciales de televisión</option>
                            <option value="5912"> 5912 - Actividades de posproducción de películas cinematográficas, videos, programas, anuncios
                                y comerciales de televisión</option>
                            <option value="5913"> 5913 - Actividades de distribución de películas cinematográficas, videos, programas, anuncios
                                y comerciales de televisión</option>
                            <option value="5914"> 5914 - Actividades de exhibición de películas cinematográficas y videos</option>
                            <option value="6020"> 6020 - Actividades de programación y transmisión de televisión</option>
                            <option value="7310"> 7310 - Publicidad</option>
                            <option value="9004"> 9004 - Creación audiovisual</option>
                            <option value="1820"> 1820 - Producción de copias a partir de grabaciones originales</option>
                            <option value="3220"> 3220 - Fabricación de instrumentos musicales</option>
                            <option value="5920"> 5920 - Actividades de grabación de sonido y edición de música</option>
                            <option value="6010"> 6010 - Actividades de programación y transmisión en el servicio de radiodifusión sonora</option>
                            <option value="9002"> 9002 - Creación musical</option>
                            <option value="9007"> 9007 - Actividades de espectáculos musicales en vivo</option>
                            <option value="8553"> 8553 - Enseñanza cultural</option>
                            <option value="9003"> 9003 - Creación teatral</option>
                            <option value="9006"> 9006 - Actividades teatrales</option>
                            <option value="9008"> 9008 - Otras actividades de espectáculos en vivo</option>
                            <option value="9101"> 9101 - Actividades de bibliotecas y archivos</option>
                            <option value="9102"> 9102 - Actividades y funcionamiento de museos, conservación de edificios y sitios históricos</option>
                            <option value="9103"> 9103 - Actividades de jardindes botánicos, zoológicos y reservas naturales</option>
                            <option value="1420"> 1420 - Fabricación de artículos de piel</option>
                            <option value="1511"> 1511 - Curtido y recurtido de cueros; recurtido y teñido de pieles</option>
                            <option value="1512"> 1512 - Fabricación de artículos de viaje, bolsos de mano y artículos similares elaborados en
                                cuero, y fabricación de artículos de talabartería y guarnicionería </option>
                            <option value="1513"> 1513 - Fabricación de artículos de viaje, bolsos de mano y artículos similares; artículos de
                                talabartería y guarnicionería elaborados en otros materiales</option>
                            <option value="1521"> 1521 - Fabricación de calzado de cuero y piel, con cualquier tipo de suela</option>
                            <option value="1522"> 1522 - Fabricación de otros tipos de calzado, excepto calzado de cuero y piel</option>
                            <option value="1523"> 1523 - Fabricación de partes del calzado</option>
                            <option value="4643"> 4643 - Comercio al por mayor de calzado</option>
                            <option value="4772"> 4772 - Comercio al por menor de todo tipo de calzado y artículos de cuero y sucedáneos del cuero
                                en establecimientos especializados</option>
                            <option value="2421"> 2421 - Industrias básicas de metales preciosos</option>
                            <option value="3210"> 3210 - Fabricación de joyas, bisutería y artículos conexos</option>
                            <option value="1311"> 1311 - Preparación e hilatura de fibras textiles</option>
                            <option value="1312"> 1312 - Tejeduría de productos textiles</option>
                            <option value="1313"> 1313 - Acabado de productos textiles</option>
                            <option value="1391"> 1391 - Fabricación de tejidos de punto y ganchillo</option>
                            <option value="1392"> 1392 - Confección de artículos con materiales textiles, excepto prendas de vestir</option>
                            <option value="1399"> 1399 - Fabricación de otros artículos textiles n.c.p.</option>
                            <option value="1410"> 1410 - Confección de prendas de vestir, excepto prendas de piel</option>
                            <option value="1430"> 1430 - Fabricación de artículos de punto y ganchillo</option>
                            <option value="4641"> 4641 - Comercio al por mayor de productos textiles, productos confeccionados para uso doméstico</option>
                            <option value="4642"> 4642 - Comercio al por mayor de prendas de vestir</option>
                            <option value="4751"> 4751 - Comercio al por mayor de productos textiles, productos confeccionados para uso doméstico</option>
                            <option value="4771"> 4771 - Comercio al por menor de prendas de vestir y sus accesorios (incluye artículos de piel)
                                en establecimientos especializados</option>
                            <option value="4782"> 4782 - Comercio al por menor de productos textiles, prendas de vestir y calzado, en puestos de
                                venta móviles</option>
                            <option value="0891"> 0891 - Extracción de minerales para la fabricación de abonos y productos químicos</option>
                            <option value="2012"> 2012 - Fabricación de abonos y compuestos inorgánicos nitrogenados</option>
                            <option value="2021"> 2021 - Fabricación de plaguicidas y otros productos químicos de uso agropecuario</option>
                            <option value="2014"> 2014 - Fabricación de caucho sintético en formas primarias</option>
                            <option value="2211"> 2211 - Fabricación de llantas y neumáticos de caucho</option>
                            <option value="2212"> 2212 - reencauche de llantas usadas</option>
                            <option value="2219"> 2219 - fabricación de formas básicas de caucho y otros productos de caucho n.c.p.</option>
                            <option value="2023"> 2023 - Fabricación de jabones y detergentes, preparados para limpiar y pulir; perfumes y preparados
                                de tocador</option>
                            <option value="2100"> 2100 - Fabricación de productos farmacéuticos, sustancias químicas medicinales y productos botánicos
                                de uso farmacéutico</option>
                            <option value="4645"> 4645 - Comercio al por mayor de productos farmacéuticos, medicinales, cosméticos y de tocador</option>
                            <option value="4773"> 4773 - Comercio al por menor de productos farmacéuticos y medicinales, cosméticos y artículos
                                de tocador en establecimientos especializados</option>
                            <option value="1910"> 1910 - Fabricación de productos de hornos de coque</option>
                            <option value="1921"> 1921 - Fabricación de productos de la refinación del petróleo</option>
                            <option value="1922"> 1922 - Actividad de mezcla de combustibles</option>
                            <option value="4661"> 4661 - Comercio al por mayor de combustibles sólidos, líquidos, gaseosos y productos conexos</option>
                            <option value="2022"> 2022 - Fabricación de pinturas, barnices y revestimientos similares, tintas para impresión y
                                masillas
                            </option>
                            <option value="2013"> 2013 - Fabricación de plásticos en formas primarias</option>
                            <option value="2221"> 2221 - Fabricación de formas básicas de plástico</option>
                            <option value="2229"> 2229 - Fabricación de artículos de plástico n.c.p.</option>
                            <option value="4664"> 4664 - Comercio al por mayor de productos químicos básicos, cauchos y plásticos en formas primarias
                                y productos químicos de uso agropecuario</option>
                            <option value="2011"> 2011 - Fabricación de sustancias y productos químicos básicos</option>
                            <option value="2029"> 2029 - Fabricación de otros productos químicos n.c.p.</option>
                            <option value="8622"> 8622 - Actividades de la práctica odontológica</option>
                            <option value="2660"> 2660 - Fabricación de equipo de irradiación y equipo electrónico de uso médico y terapéutico</option>
                            <option value="3250"> 3250 - Fabricación de instrumentos, aparatos y materiales médicos y odontológicos (incluido mobiliario)</option>
                            <option value="6521"> 6521 - Servicios de seguros sociales de salud</option>
                            <option value="6522"> 6522 - Servicios de seguros sociales de riesgos profesionales</option>
                            <option value="8430"> 8430 - Actividades de planes de seguridad social de afiliación obligatoria</option>
                            <option value="8610"> 8610 - Actividades de hospitales y clínicas, con internación</option>
                            <option value="8621"> 8621 - Actividades de la práctica médica, sin internación</option>
                            <option value="8691"> 8691 - Actividades de apoyo diagnóstico</option>
                            <option value="8692"> 8692 - Actividades de apoyo terapéutico</option>
                            <option value="8699"> 8699 - Otras actividades de atención de la salud humana</option>
                            <option value="8710"> 8710 - Actividades de atención residencial medicalizada de tipo general</option>
                            <option value="8720"> 8720 - Actividades de atención residencial, para el cuidado de pacientes con retardo mental,
                                enfermedad mental y consumo de sustancias psicoactivas</option>
                            <option value="8730"> 8730 - Actividades de atención en instituciones para el cuidado de personas mayores y/o discapacitadas</option>
                            <option value="7820"> 7820 - Actividades de agencias de empleo temporal</option>
                            <option value="7830"> 7830 - Otras actividades de suministro de recurso humano</option>
                            <option value="7010"> 7010 - Actividades de administración empresarial</option>
                            <option value="8211"> 8211 - Actividades combinadas de servicios administrativos de oficina</option>
                            <option value="8219"> 8219 - Fotocopiado, preparación de documentos y otras actividades especializadas de apoyo a oficina</option>
                            <option value="8299"> 8299 - Otras actividades de servicio de apoyo a las empresas n.c.p.</option>
                            <option value="8291"> 8291 - Actividades de agencias de cobranza y oficinas de calificación crediticia.</option>
                            <option value="8220"> 8220 - Actividades de centros de llamadas (Call center)</option>
                            <option value="8010"> 8010 - Actividades de seguridad privada</option>
                            <option value="8020"> 8020 - Actividades de servicios de sistemas de seguridad, reparación de sistemas de seguridad.
                            </option>
                            <option value="8030"> 8030 - Actividades de detectives e investigadores privados</option>
                            <option value="6411"> 6411 - Banco Central</option>
                            <option value="6412"> 6412 - Bancos comerciales</option>
                            <option value="6421"> 6421 - Actividades de las corporaciones financieras</option>
                            <option value="6422"> 6422 - Actividades de las compañías de financiamiento</option>
                            <option value="6423"> 6423 - Banca de segundo piso</option>
                            <option value="6424"> 6424 - Actividades de las cooperativas financieras</option>
                            <option value="6431"> 6431 - Fideicomisos, fondos y entidades financieras similares</option>
                            <option value="6432"> 6432 - Fondos de cesantías</option>
                            <option value="6491"> 6491 - Leasing financiero (arrendamiento financiero)</option>
                            <option value="6492"> 6492 - Actividades financieras de fondos de empleados y otras formas asociativas del sector solidario</option>
                            <option value="6493"> 6493 - Actividades de compra de cartera o factoring</option>
                            <option value="6494"> 6494 - Otras actividades de distribución de fondos</option>
                            <option value="6495"> 6495 - Instituciones especiales oficiales</option>
                            <option value="6499"> 6499 - Otras actividades de servicio financiero, excepto las de seguros y pensiones n.c.p.</option>
                            <option value="6531"> 6531 - Régimen de prima media con prestación definida (RPM)</option>
                            <option value="6532"> 6532 - Régimen de ahorro individual (RAI)</option>
                            <option value="6611"> 6611 - Administración de mercados financieros</option>
                            <option value="6612"> 6612 - Corretaje de valores y de contratos de productos básicos</option>
                            <option value="6613"> 6613 - Otras actividades relacionadas con el mercado de valores</option>
                            <option value="6614"> 6614 - Actividades de las casas de cambio</option>
                            <option value="6615"> 6615 - Actividades de los profesionales de compra y venta de divisas</option>
                            <option value="6619"> 6619 - Otras actividades auxiliares de las actividades de servicios financieros n.c.p.</option>
                            <option value="6630"> 6630 - Actividades de administración de fondos</option>
                            <option value="3311"> 3311 - Mantenimiento y reparación especializado de maquinaria y equipo</option>
                            <option value="3315"> 3315 - Mantenimiento y reparación especializado de equipo de transporte, excepto los vehículos
                                automotores, motocicletas y bicicletas</option>
                            <option value="3319"> 3319 - Mantenimiento y reparación de otros tipos de equipos y sus componentes n.c.p.</option>
                            <option value="4520"> 4520 - Mantenimiento y reparación de vehículos automotores</option>
                            <option value="4542"> 4542 - Mantenimiento y reparación de motocicletas y de sus partes y piezas</option>
                            <option value="7730"> 7730 - Alquiler y arrendamiento de otros tipos de maquinaria, equipo y bienes tangibles n.c.p.</option>
                            <option value="9521"> 9521 - Mantenimiento y reparación de aparatos electrónicos de consumo</option>
                            <option value="9522"> 9522 - Mantenimiento y reparación de aparatos y equipos domésticos y de jardinería </option>
                            <option value="3900"> 3900 - Actividades de saneamiento ambiental y otros servicios de gestión de desechos</option>
                            <option value="6910"> 6910 - Actividades jurídicas</option>
                            <option value="6920"> 6920 - Actividades de contabilidad, teneduría de libros, auditoría financiera y asesoría tributaria</option>
                            <option value="7020"> 7020 - Actividades de consultaría de gestión</option>
                            <option value="7210"> 7210 - Investigaciones y desarrollo experimental en el campo de las ciencias naturales y la ingeniería </option>
                            <option value="7220"> 7220 - Investigaciones y desarrollo experimental en el campo de las ciencias sociales y las humanidades</option>
                            <option value="7320"> 7320 - Estudios de mercado y realización de encuestas de opinión pública</option>
                            <option value="7490"> 7490 - Otras actividades profesionales, científicas y técnicas n.c.p.</option>
                            <option value="7740"> 7740 - Arrendamiento de propiedad intelectual y productos similares, excepto obras protegidas
                                por derechos de autor</option>
                            <option value="7810"> 7810 - Actividades de agencias de empleo</option>
                            <option value="8121"> 8121 - Limpieza general interior de edificios</option>
                            <option value="8129"> 8129 - Otras actividades de limpieza de edificios e instalaciones industriales</option>
                            <option value="8130"> 8130 - Actividades de paisajismo y servicios de mantenimiento conexos</option>
                            <option value="4912"> 4912 - Transporte férreo de carga </option>
                            <option value="4922"> 4922 - Transporte mixto</option>
                            <option value="4923"> 4923 - Transporte de carga por carretera</option>
                            <option value="5011"> 5011 - Transporte de pasajeros marítimo y de cabotaje </option>
                            <option value="5012"> 5012 - Transporte de carga marítimo y de cabotaje </option>
                            <option value="5022"> 5022 - Transporte fluvial de carga</option>
                            <option value="5121"> 5121 - Transporte aéreo nacional de carga </option>
                            <option value="5122"> 5122 - Transporte aéreo internacional de carga </option>
                            <option value="5210"> 5210 - Almacenamiento y depósito</option>
                            <option value="5221"> 5221 - Actividades de estaciones, vías y servicios complementarios para el transporte terrestre</option>
                            <option value="5222"> 5222 - Actividades de puertos y servicios complementarios para el transporte acuático</option>
                            <option value="5224"> 5224 - Manipulación de carga</option>
                            <option value="5229"> 5229 - Otras actividades complementarias al transporte</option>
                            <option value="7710"> 7710 - Alquiler y arrendamiento de vehículos automotores</option>
                            <option value="5629"> 5629 - Actividades de otros servicios de comidas</option>
                            <option value="6399"> 6399 - Otras actividades de servicio de información n.c.p.</option>
                            <option value="8292"> 8292 - Actividades de envase y empaque</option>
                            <option value="6511"> 6511 - Seguros generales </option>
                            <option value="6512"> 6512 - Seguros de vida</option>
                            <option value="6513"> 6513 - Reaseguros</option>
                            <option value="6514"> 6514 - Capitalización</option>
                            <option value="6621"> 6621 - Actividades de agentes y corredores de seguros</option>
                            <option value="6629"> 6629 - Evaluación de riesgos y daños, y otras actividades de servicios auxiliares</option>
                            <option value="5310"> 5310 - Actividades postales nacionales</option>
                            <option value="5320"> 5320 - Actividades de mensajería</option>
                            <option value="5812"> 5812 - Edición de directorios y listas de correo</option>
                            <option value="2680"> 2680 - Fabricación de medios magnéticos y ópticos para almacenamiento de datos</option>
                            <option value="4651"> 4651 - Comercio al por mayor de computadores, equipo periférico y programas de informática</option>
                            <option value="4791"> 4791 - Comercio al por menor realizado a través de Internet</option>
                            <option value="5820"> 5820 - Edición de programas de informática (software)</option>
                            <option value="6201"> 6201 - Actividades de desarrollo de sistemas informática (Planificación, análisis, diseño, programación,
                                pruebas)
                            </option>
                            <option value="6202"> 6202 - Actividades de consultoría informática y actividades de administración de instalaciones
                                informática
                            </option>
                            <option value="6209"> 6209 - Otras actividades de tecnologías de información y actividades de servicios informáticos</option>
                            <option value="6311"> 6311 - Procesamiento de datos, alojamiento (hosting) y actividades relacionadas</option>
                            <option value="6312"> 6312 - Portales web</option>
                            <option value="2630"> 2630 - Fabricación de equipos de comunicación</option>
                            <option value="2640"> 2640 - Fabricación de aparatos electrónicos de consumo</option>
                            <option value="4652"> 4652 - Comercio al por mayor de equipo, partes y piezas electrónicos y de telecomunicaciones</option>
                            <option value="4741"> 4741 - Comercio al por menor de computadores, equipos periféricos, programas de informática y
                                equipos de telecomunicaciones en establecimientos especializados</option>
                            <option value="6110"> 6110 - Actividades de telecomunicaciones alámbricas</option>
                            <option value="6120"> 6120 - Actividades de telecomunicaciones inalámbricas</option>
                            <option value="6130"> 6130 - Actividades de telecomunicación satelital</option>
                            <option value="6190"> 6190 - Otras actividades de telecomunicaciones</option>
                            <option value="9511"> 9511 - Mantenimiento y reparación de computadores y de equipo periférico</option>
                            <option value="9512"> 9512 - Mantenimiento y reparación de equipos de comunicación</option>
                        </select>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="codigo_ciiu">Código CIIU Actividad Económica Secundaria</label>
                        <select class="form-control" name="codigo_ciiu" id="ciiu-secundario">
                            <option value="Ninguno">Ninguno</option>
                            <option value="1011"> 1011 - Procesamiento y conservación de carne y productos cárnicos</option>
                            <option value="1012"> 1012 - Procesamiento y conservación de pescados, crustáceos y moluscos</option>
                            <option value="1020"> 1020 - Procesamiento y conservación de frutas, legumbres, hortalizas y tubérculos</option>
                            <option value="1030"> 1030 - Elaboración de aceites y grasas de origen vegetal y animal</option>
                            <option value="1051"> 1051 - Elaboración de productos de molinería</option>
                            <option value="1052"> 1052 - Elaboración de almidones y productos derivados del almidón</option>
                            <option value="1071"> 1071 - Elaboración y refinación de azúcar</option>
                            <option value="1072"> 1072 - Elaboración de panela</option>
                            <option value="1082"> 1082 - Elaboración de cacao, chocolate y productos de confitería</option>
                            <option value="1083"> 1083 - Elaboración de macarrones, fideos, alcuzcuz y productos farináceos similares</option>
                            <option value="1089"> 1089 - Elaboración de otros productos alimenticios n.c.p.</option>
                            <option value="1090"> 1090 - Elaboración de alimentos preparados para animales</option>
                            <option value="1101"> 1101 - Destilación, rectificación y mezcla de bebidas alcohólicas</option>
                            <option value="1102"> 1102 - Elaboración de bebidas fermentadas no destiladas</option>
                            <option value="1103"> 1103 - Producción de malta, elaboración de cervezas y otras bebidas malteadas</option>
                            <option value="1104"> 1104 - Elaboración de bebidas no alcohólicas, producción de aguas minerales y de otras aguas
                                embotelladas
                            </option>
                            <option value="0145"> 0145 - Cría de aves de corral</option>
                            <option value="4631"> 4631 - Comercio al por mayor de productos alimenticios</option>
                            <option value="0141"> 0141 - Cría de ganado bovino y bufalino</option>
                            <option value="0162"> 0162 - Actividades de apoyo a la ganadería</option>
                            <option value="4620"> 4620 - Comercio al por menor de carnes, productos cárnicos, pescados y productos de mar, en establecimientos
                                especializados
                            </option>
                            <option value="4723"> 4723 - Comercio al por mayor de materias primas agropecuarias; animales vivos</option>
                            <option value="0142"> 0142 - Cría de caballos y otros equinos</option>
                            <option value="0143"> 0143 - Cría de ovejas y cabras</option>
                            <option value="0149"> 0149 - Cría de otros animales n.c.p.</option>
                            <option value="0311"> 0311 - Pesca marítima</option>
                            <option value="0312"> 0312 - Pesca de agua dulce</option>
                            <option value="0321"> 0321 - Acuicultura marítima</option>
                            <option value="0322"> 0322 - Acuicultura de agua dulce</option>
                            <option value="0144"> 0144 - Cría de ganado porcino</option>
                            <option value="0150"> 0150 - Explotación primaria mixta (agrícola y pecuaria)</option>
                            <option value="0127"> 0127 - Cultivo de plantas con las que se preparan bebidas</option>
                            <option value="4632"> 4632 - Comercio al por mayor de bebidas y tabaco</option>
                            <option value="0106"> 0106 - Elaboración de productos de café</option>
                            <option value="0123"> 0123 - Cultivo de café</option>
                            <option value="1061"> 1061 - Trilla de café</option>
                            <option value="1062"> 1062 - Descafeinado, tostión y molienda del café</option>
                            <option value="1063"> 1063 - Otros derivados del café</option>
                            <option value="0107"> 0107 - Elaboración de azúcar y panela</option>
                            <option value="0124"> 0124 - Cultivo de caña de azúcar</option>
                            <option value="0105"> 0105 - Elaboración de productos de molinería, almidones y productos derivados del almidón</option>
                            <option value="0111"> 0111 - Cultivo de cereales (excepto arroz), legumbres y semillas oleaginosas</option>
                            <option value="0112"> 0112 - Cultivo de arroz</option>
                            <option value="0119"> 0119 - Otros cultivos transitorios n.c.p.</option>
                            <option value="0125"> 0125 - Cultivo de flor de corte</option>
                            <option value="0113"> 0113 - Cultivo de hortalizas, raíces y tubérculos</option>
                            <option value="0121"> 0121 - Cultivo de frutas tropicales y subtropicales</option>
                            <option value="0122"> 0122 - Cultivo de plátano y banano</option>
                            <option value="0128"> 0128 - Cultivo de especias y de plantas aromáticas y medicinales</option>
                            <option value="0161"> 0161 - Actividades de apoyo a la agricultura</option>
                            <option value="0163"> 0163 - Actividades posteriores a la cosecha</option>
                            <option value="4721"> 4721 - Comercio al por menor de productos agrícolas para el consumo en establecimientos especializados</option>
                            <option value="0126"> 0126 - Cultivo de palma para aceite (palma africana) y otros frutos oleaginosos</option>
                            <option value="0114"> 0114 - Cultivo de tabaco </option>
                            <option value="1200"> 1200 - Elaboración de productos de tabaco</option>
                            <option value="1040"> 1040 - Elaboración de productos lácteos</option>
                            <option value="4722"> 4722 - Comercio al por menor de leche, productos lácteos y huevos, en establecimientos especializados</option>
                            <option value="0129"> 0129 - Otros cultivos permanentes n.c.p.</option>
                            <option value="0210"> 0210 - Silvicultura y otras actividades forestales</option>
                            <option value="0220"> 0220 - Extracción de madera</option>
                            <option value="0230"> 0230 - Recolección de productos forestales diferentes a la madera</option>
                            <option value="0240"> 0240 - Servicios de apoyo a la silvicultura</option>
                            <option value="0130"> 0130 - Propagación de plantas (actividades de los viveros, excepto viveros forestales)</option>
                            <option value="0164"> 0164 - Tratamiento de semillas para propagación</option>
                            <option value="2599"> 2599 - Fabricación de otros productos elaborados de metal n.c.p.</option>
                            <option value="2811"> 2811 - Fabricación de motores, turbinas, y partes para motores de combustión interna</option>
                            <option value="2910"> 2910 - Fabricación de vehículos automotores y sus motores</option>
                            <option value="2920"> 2920 - Fabricación de carrocerías para vehículos automotores; fabricación de remolques y semirremolques</option>
                            <option value="2930"> 2930 - Fabricación de partes, piezas (autopartes) y accesorios (lujos) para vehículos automotores</option>
                            <option value="3091"> 3091 - Fabricación de motocicletas</option>
                            <option value="4662"> 4662 - Comercio al por mayor de metales y productos metalíferos</option>
                            <option value="0710"> 0710 - Extracción de minerales de hierro</option>
                            <option value="0811"> 0811 - Extracción de piedra, arena, arcillas comunes, yeso y anhidrita</option>
                            <option value="0812"> 0812 - Extracción de arcillas de uso industrial, caliza, caolín y bentonitas</option>
                            <option value="0899"> 0899 - Extracción de otros minerales no metálicos n.c.p.</option>
                            <option value="0990"> 0990 - Actividades de apoyo para otras actividades de explotación de minas y canteras</option>
                            <option value="1610"> 1610 - Aserrado, acepillado e impregnación de la madera</option>
                            <option value="1620"> 1620 - Fabricación de hojas de madera para enchapado; fabricación de tableros contrachapados,
                                tableros laminados, tableros de partículas y otros tableros y paneles</option>
                            <option value="1630"> 1630 - Fabricación de partes y piezas de madera, de carpintería y ebanistería para la construcción</option>
                            <option value="1690"> 1690 - Fabricación de otros productos de madera; fabricación de artículos de corcho, cestería
                                y espartería</option>
                            <option value="2030"> 2030 - Fabricación de fibras sintéticas y artificiales</option>
                            <option value="2310"> 2310 - Fabricación de vidrio y productos de vidrio</option>
                            <option value="2391"> 2391 - Fabricación de productos refractarios</option>
                            <option value="2392"> 2392 - Fabricación de materiales de arcilla para la construcción</option>
                            <option value="2394"> 2394 - Fabricación de cemento, cal y yeso</option>
                            <option value="2395"> 2395 - Fabricación de artículos de hormigón, cemento y yeso</option>
                            <option value="2396"> 2396 - Corte, tallado y acabado de la piedra</option>
                            <option value="2399"> 2399 - Fabricación de otros productos minerales no metálicos n.c.p.</option>
                            <option value="2410"> 2410 - Industrias básicas de hierro y de acero</option>
                            <option value="2431"> 2431 - Fundición de hierro y de acero</option>
                            <option value="2511"> 2511 - Fabricación de productos metálicos para uso estructural</option>
                            <option value="2512"> 2512 - Fabricación de tanques, depósitos y recipientes de metal, excepto los utilizados para
                                el envase o transporte de mercancías</option>
                            <option value="2816"> 2816 - Fabricación de equipo de elevación y manipulación</option>
                            <option value="4312"> 4312 - Preparación del terreno</option>
                            <option value="4322"> 4322 - Instalaciones de fontanería, calefacción y aire acondicionado</option>
                            <option value="4330"> 4330 - Terminación y acabado de edificios y obras de ingeniería civil</option>
                            <option value="4390"> 4390 - Otras actividades especializadas para la construcción de edificios y obras de ingeniería
                                civil
                            </option>
                            <option value="3600"> 3600 - Captación, tratamiento y distribución de agua</option>
                            <option value="3700"> 3700 - Evacuación y tratamiento de aguas residuales</option>
                            <option value="3811"> 3811 - Recolección de desechos no peligrosos</option>
                            <option value="3821"> 3821 - Tratamiento y disposición de desechos no peligrosos</option>
                            <option value="3830"> 3830 - Recuperación de materiales</option>
                            <option value="4311"> 4311 - Demolición</option>
                            <option value="4659"> 4659 - Comercio al por mayor de otros tipos de maquinaria y equipo n.c.p.</option>
                            <option value="4663"> 4663 - Comercio al por mayor de materiales de construcción, artículos de ferretería, pinturas,
                                productos de vidrio, equipo y materiales de fontanería y calefacción </option>
                            <option value="1393"> 1393 - Fabricación de tapetes y alfombras para pisos</option>
                            <option value="2393"> 2393 - Fabricación de otros productos de cerámica y porcelana</option>
                            <option value="4752"> 4752 - Comercio al por menor de artículos de ferretería, pinturas y productos de vidrio en establecimientos
                                especializados
                            </option>
                            <option value="4753"> 4753 - Comercio al por menor de tapices, alfombras y cubrimientos para paredes y pisos en establecimientos
                                especializados
                            </option>
                            <option value="4754"> 4754 - Comercio al por menor de electrodomésticos y gasodomésticos de uso doméstico, muebles
                                y equipos de iluminación</option>
                            <option value="4111"> 4111 - Construcción de edificios residenciales</option>
                            <option value="4112"> 4112 - Construcción de edificios no residenciales</option>
                            <option value="1394"> 1394 - Fabricación de cuerdas, cordeles, cables, bramantes y redes</option>
                            <option value="2610"> 2610 - Fabricación de componentes y tableros electrónicos</option>
                            <option value="2620"> 2620 - Fabricación de computadoras y de equipo periférico</option>
                            <option value="2711"> 2711 - Fabricación de motores, generadores y transformadores eléctricos</option>
                            <option value="2712"> 2712 - Fabricación de aparatos de distribución y control de la energía eléctrica</option>
                            <option value="2720"> 2720 - Fabricación de pilas, baterías y acumuladores eléctricos</option>
                            <option value="2731"> 2731 - Fabricación de hilos y cables eléctricos y de fibra óptica</option>
                            <option value="2732"> 2732 - Fabricación de dispositivos de cableado</option>
                            <option value="2740"> 2740 - Fabricación de equipos eléctricos de iluminación</option>
                            <option value="2750"> 2750 - Fabricación de aparatos de uso doméstico</option>
                            <option value="2790"> 2790 - Fabricación de otros tipos de equipo eléctrico n.c.p.</option>
                            <option value="3312"> 3312 - Mantenimiento y reparación especializado de maquinaria y equipo</option>
                            <option value="3313"> 3313 - Mantenimiento y reparación especializado de equipo electrónico y óptico</option>
                            <option value="3314"> 3314 - Mantenimiento y reparación especializado de equipo eléctrico</option>
                            <option value="3320"> 3320 - Instalación especializada de maquinaria y equipo industrial </option>
                            <option value="3511"> 3511 - Generación de energía eléctrica</option>
                            <option value="3512"> 3512 - Transmisión de energía eléctrica</option>
                            <option value="3513"> 3513 - Distribución de energía eléctrica</option>
                            <option value="3514"> 3514 - Comercialización de energía eléctrica</option>
                            <option value="4220"> 4220 - Construcción de proyectos de servicio público</option>
                            <option value="4321"> 4321 - Instalaciones eléctricas</option>
                            <option value="4329"> 4329 - Otras instalaciones especializadas</option>
                            <option value="7110"> 7110 - Actividades de arquitectura e ingeniería y otras actividades conexas de consultoría técnica</option>
                            <option value="7120"> 7120 - Ensayos y análisis técnicos</option>
                            <option value="7410"> 7410 - Actividades especializadas de diseño </option>
                            <option value="8110"> 8110 - Actividades combinadas de apoyo a instalaciones</option>
                            <option value="6810"> 6810 - Actividades inmobiliarias realizadas con bienes propios o arrendados</option>
                            <option value="6820"> 6820 - Actividades inmobiliarias realizadas a cambio de una retribución o por contrata </option>
                            <option value="4210"> 4210 - Construcción de carreteras y vías de ferrocarril</option>
                            <option value="4290"> 4290 - Construcción de otras obras de ingeniería civil</option>
                            <option value="8511"> 8511 - Educación de la primera infancia</option>
                            <option value="8512"> 8512 - Educación preescolar</option>
                            <option value="8513"> 8513 - Educación básica primaria</option>
                            <option value="8521"> 8521 - Educación básica secundaria</option>
                            <option value="8522"> 8522 - Educación media académica</option>
                            <option value="8523"> 8523 - Educación media técnica y de formación laboral</option>
                            <option value="8530"> 8530 - Establecimientos que combinan diferentes niveles de educación inicial, preescolar, básica
                                primaria, básica secundaria y media</option>
                            <option value="8541"> 8541 - Educación técnica profesional</option>
                            <option value="8542"> 8542 - Educación tecnológica</option>
                            <option value="8543"> 8543 - Educación de instituciones universitarias o de escuelas tecnológicas</option>
                            <option value="8544"> 8544 - Educación de universidades</option>
                            <option value="8551"> 8551 - Formación académica no formal </option>
                            <option value="8552"> 8552 - Enseñanza deportiva y recreativa</option>
                            <option value="8559"> 8559 - Otros tipos de educación n.c.p.</option>
                            <option value="1081"> 1081 - Elaboración de productos de panadería</option>
                            <option value="1084"> 1084 - Elaboración de comidas y platos preparados</option>
                            <option value="5611"> 5611 - Restaurantes</option>
                            <option value="5612"> 5612 - Expendio por autoservicio de comidas preparadas</option>
                            <option value="5621"> 5621 - Catering</option>
                            <option value="4921"> 4921 - Transporte Terrestre</option>
                            <option value="5111"> 5111 - Transporte aéreo nacional de pasajeros</option>
                            <option value="5112"> 5112 - Transporte aéreo internacional de pasajeros</option>
                            <option value="5511"> 5511 - Alojamiento en Hoteles</option>
                            <option value="7911"> 7911 - Agencias de Viajes</option>
                            <option value="7912"> 7912 - Actividades de operadores turísticos</option>
                            <option value="8230"> 8230 - Organización de convenciones y eventos comerciales (OPC)</option>
                            <option value="1701"> 1701 - Fabricación de pulpas (pastas) celulósicas; papel y cartón</option>
                            <option value="1702"> 1702 - Fabricación de papel y cartón ondulado (corrugado); fabricación de envases, empaques y
                                de embalajes de papel y cartón</option>
                            <option value="1709"> 1709 - Fabricación de otros artículos de papel y cartón</option>
                            <option value="1811"> 1811 - Actividades de impresión</option>
                            <option value="1812"> 1812 - Actividades de servicios relacionados con la impresión</option>
                            <option value="4761"> 4761 - Comercio al por menor de libros, periódicos, materiales y artículos de papelería y escritorio,
                            </option>
                            <option value="5811"> 5811 - Edición de libros</option>
                            <option value="5813"> 5813 - Edición de periódicos, revistas y otras publicaciones periódicas</option>
                            <option value="5819"> 5819 - Otros trabajos de edición</option>
                            <option value="9001"> 9001 - Creación literaria</option>
                            <option value="7420"> 7420 - Actividades de fotografía</option>
                            <option value="9005"> 9005 - Artes plásticas y visuales</option>
                            <option value="5911"> 5911 - Actividades de producción de películas cinematográficas, videos, programas, anuncios y
                                comerciales de televisión</option>
                            <option value="5912"> 5912 - Actividades de posproducción de películas cinematográficas, videos, programas, anuncios
                                y comerciales de televisión</option>
                            <option value="5913"> 5913 - Actividades de distribución de películas cinematográficas, videos, programas, anuncios
                                y comerciales de televisión</option>
                            <option value="5914"> 5914 - Actividades de exhibición de películas cinematográficas y videos</option>
                            <option value="6020"> 6020 - Actividades de programación y transmisión de televisión</option>
                            <option value="7310"> 7310 - Publicidad</option>
                            <option value="9004"> 9004 - Creación audiovisual</option>
                            <option value="1820"> 1820 - Producción de copias a partir de grabaciones originales</option>
                            <option value="3220"> 3220 - Fabricación de instrumentos musicales</option>
                            <option value="5920"> 5920 - Actividades de grabación de sonido y edición de música</option>
                            <option value="6010"> 6010 - Actividades de programación y transmisión en el servicio de radiodifusión sonora</option>
                            <option value="9002"> 9002 - Creación musical</option>
                            <option value="9007"> 9007 - Actividades de espectáculos musicales en vivo</option>
                            <option value="8553"> 8553 - Enseñanza cultural</option>
                            <option value="9003"> 9003 - Creación teatral</option>
                            <option value="9006"> 9006 - Actividades teatrales</option>
                            <option value="9008"> 9008 - Otras actividades de espectáculos en vivo</option>
                            <option value="9101"> 9101 - Actividades de bibliotecas y archivos</option>
                            <option value="9102"> 9102 - Actividades y funcionamiento de museos, conservación de edificios y sitios históricos</option>
                            <option value="9103"> 9103 - Actividades de jardindes botánicos, zoológicos y reservas naturales</option>
                            <option value="1420"> 1420 - Fabricación de artículos de piel</option>
                            <option value="1511"> 1511 - Curtido y recurtido de cueros; recurtido y teñido de pieles</option>
                            <option value="1512"> 1512 - Fabricación de artículos de viaje, bolsos de mano y artículos similares elaborados en
                                cuero, y fabricación de artículos de talabartería y guarnicionería </option>
                            <option value="1513"> 1513 - Fabricación de artículos de viaje, bolsos de mano y artículos similares; artículos de
                                talabartería y guarnicionería elaborados en otros materiales</option>
                            <option value="1521"> 1521 - Fabricación de calzado de cuero y piel, con cualquier tipo de suela</option>
                            <option value="1522"> 1522 - Fabricación de otros tipos de calzado, excepto calzado de cuero y piel</option>
                            <option value="1523"> 1523 - Fabricación de partes del calzado</option>
                            <option value="4643"> 4643 - Comercio al por mayor de calzado</option>
                            <option value="4772"> 4772 - Comercio al por menor de todo tipo de calzado y artículos de cuero y sucedáneos del cuero
                                en establecimientos especializados</option>
                            <option value="2421"> 2421 - Industrias básicas de metales preciosos</option>
                            <option value="3210"> 3210 - Fabricación de joyas, bisutería y artículos conexos</option>
                            <option value="1311"> 1311 - Preparación e hilatura de fibras textiles</option>
                            <option value="1312"> 1312 - Tejeduría de productos textiles</option>
                            <option value="1313"> 1313 - Acabado de productos textiles</option>
                            <option value="1391"> 1391 - Fabricación de tejidos de punto y ganchillo</option>
                            <option value="1392"> 1392 - Confección de artículos con materiales textiles, excepto prendas de vestir</option>
                            <option value="1399"> 1399 - Fabricación de otros artículos textiles n.c.p.</option>
                            <option value="1410"> 1410 - Confección de prendas de vestir, excepto prendas de piel</option>
                            <option value="1430"> 1430 - Fabricación de artículos de punto y ganchillo</option>
                            <option value="4641"> 4641 - Comercio al por mayor de productos textiles, productos confeccionados para uso doméstico</option>
                            <option value="4642"> 4642 - Comercio al por mayor de prendas de vestir</option>
                            <option value="4751"> 4751 - Comercio al por mayor de productos textiles, productos confeccionados para uso doméstico</option>
                            <option value="4771"> 4771 - Comercio al por menor de prendas de vestir y sus accesorios (incluye artículos de piel)
                                en establecimientos especializados</option>
                            <option value="4782"> 4782 - Comercio al por menor de productos textiles, prendas de vestir y calzado, en puestos de
                                venta móviles</option>
                            <option value="0891"> 0891 - Extracción de minerales para la fabricación de abonos y productos químicos</option>
                            <option value="2012"> 2012 - Fabricación de abonos y compuestos inorgánicos nitrogenados</option>
                            <option value="2021"> 2021 - Fabricación de plaguicidas y otros productos químicos de uso agropecuario</option>
                            <option value="2014"> 2014 - Fabricación de caucho sintético en formas primarias</option>
                            <option value="2211"> 2211 - Fabricación de llantas y neumáticos de caucho</option>
                            <option value="2212"> 2212 - reencauche de llantas usadas</option>
                            <option value="2219"> 2219 - fabricación de formas básicas de caucho y otros productos de caucho n.c.p.</option>
                            <option value="2023"> 2023 - Fabricación de jabones y detergentes, preparados para limpiar y pulir; perfumes y preparados
                                de tocador</option>
                            <option value="2100"> 2100 - Fabricación de productos farmacéuticos, sustancias químicas medicinales y productos botánicos
                                de uso farmacéutico</option>
                            <option value="4645"> 4645 - Comercio al por mayor de productos farmacéuticos, medicinales, cosméticos y de tocador</option>
                            <option value="4773"> 4773 - Comercio al por menor de productos farmacéuticos y medicinales, cosméticos y artículos
                                de tocador en establecimientos especializados</option>
                            <option value="1910"> 1910 - Fabricación de productos de hornos de coque</option>
                            <option value="1921"> 1921 - Fabricación de productos de la refinación del petróleo</option>
                            <option value="1922"> 1922 - Actividad de mezcla de combustibles</option>
                            <option value="4661"> 4661 - Comercio al por mayor de combustibles sólidos, líquidos, gaseosos y productos conexos</option>
                            <option value="2022"> 2022 - Fabricación de pinturas, barnices y revestimientos similares, tintas para impresión y
                                masillas
                            </option>
                            <option value="2013"> 2013 - Fabricación de plásticos en formas primarias</option>
                            <option value="2221"> 2221 - Fabricación de formas básicas de plástico</option>
                            <option value="2229"> 2229 - Fabricación de artículos de plástico n.c.p.</option>
                            <option value="4664"> 4664 - Comercio al por mayor de productos químicos básicos, cauchos y plásticos en formas primarias
                                y productos químicos de uso agropecuario</option>
                            <option value="2011"> 2011 - Fabricación de sustancias y productos químicos básicos</option>
                            <option value="2029"> 2029 - Fabricación de otros productos químicos n.c.p.</option>
                            <option value="8622"> 8622 - Actividades de la práctica odontológica</option>
                            <option value="2660"> 2660 - Fabricación de equipo de irradiación y equipo electrónico de uso médico y terapéutico</option>
                            <option value="3250"> 3250 - Fabricación de instrumentos, aparatos y materiales médicos y odontológicos (incluido mobiliario)</option>
                            <option value="6521"> 6521 - Servicios de seguros sociales de salud</option>
                            <option value="6522"> 6522 - Servicios de seguros sociales de riesgos profesionales</option>
                            <option value="8430"> 8430 - Actividades de planes de seguridad social de afiliación obligatoria</option>
                            <option value="8610"> 8610 - Actividades de hospitales y clínicas, con internación</option>
                            <option value="8621"> 8621 - Actividades de la práctica médica, sin internación</option>
                            <option value="8691"> 8691 - Actividades de apoyo diagnóstico</option>
                            <option value="8692"> 8692 - Actividades de apoyo terapéutico</option>
                            <option value="8699"> 8699 - Otras actividades de atención de la salud humana</option>
                            <option value="8710"> 8710 - Actividades de atención residencial medicalizada de tipo general</option>
                            <option value="8720"> 8720 - Actividades de atención residencial, para el cuidado de pacientes con retardo mental,
                                enfermedad mental y consumo de sustancias psicoactivas</option>
                            <option value="8730"> 8730 - Actividades de atención en instituciones para el cuidado de personas mayores y/o discapacitadas</option>
                            <option value="7820"> 7820 - Actividades de agencias de empleo temporal</option>
                            <option value="7830"> 7830 - Otras actividades de suministro de recurso humano</option>
                            <option value="7010"> 7010 - Actividades de administración empresarial</option>
                            <option value="8211"> 8211 - Actividades combinadas de servicios administrativos de oficina</option>
                            <option value="8219"> 8219 - Fotocopiado, preparación de documentos y otras actividades especializadas de apoyo a oficina</option>
                            <option value="8299"> 8299 - Otras actividades de servicio de apoyo a las empresas n.c.p.</option>
                            <option value="8291"> 8291 - Actividades de agencias de cobranza y oficinas de calificación crediticia.</option>
                            <option value="8220"> 8220 - Actividades de centros de llamadas (Call center)</option>
                            <option value="8010"> 8010 - Actividades de seguridad privada</option>
                            <option value="8020"> 8020 - Actividades de servicios de sistemas de seguridad, reparación de sistemas de seguridad.
                            </option>
                            <option value="8030"> 8030 - Actividades de detectives e investigadores privados</option>
                            <option value="6411"> 6411 - Banco Central</option>
                            <option value="6412"> 6412 - Bancos comerciales</option>
                            <option value="6421"> 6421 - Actividades de las corporaciones financieras</option>
                            <option value="6422"> 6422 - Actividades de las compañías de financiamiento</option>
                            <option value="6423"> 6423 - Banca de segundo piso</option>
                            <option value="6424"> 6424 - Actividades de las cooperativas financieras</option>
                            <option value="6431"> 6431 - Fideicomisos, fondos y entidades financieras similares</option>
                            <option value="6432"> 6432 - Fondos de cesantías</option>
                            <option value="6491"> 6491 - Leasing financiero (arrendamiento financiero)</option>
                            <option value="6492"> 6492 - Actividades financieras de fondos de empleados y otras formas asociativas del sector solidario</option>
                            <option value="6493"> 6493 - Actividades de compra de cartera o factoring</option>
                            <option value="6494"> 6494 - Otras actividades de distribución de fondos</option>
                            <option value="6495"> 6495 - Instituciones especiales oficiales</option>
                            <option value="6499"> 6499 - Otras actividades de servicio financiero, excepto las de seguros y pensiones n.c.p.</option>
                            <option value="6531"> 6531 - Régimen de prima media con prestación definida (RPM)</option>
                            <option value="6532"> 6532 - Régimen de ahorro individual (RAI)</option>
                            <option value="6611"> 6611 - Administración de mercados financieros</option>
                            <option value="6612"> 6612 - Corretaje de valores y de contratos de productos básicos</option>
                            <option value="6613"> 6613 - Otras actividades relacionadas con el mercado de valores</option>
                            <option value="6614"> 6614 - Actividades de las casas de cambio</option>
                            <option value="6615"> 6615 - Actividades de los profesionales de compra y venta de divisas</option>
                            <option value="6619"> 6619 - Otras actividades auxiliares de las actividades de servicios financieros n.c.p.</option>
                            <option value="6630"> 6630 - Actividades de administración de fondos</option>
                            <option value="3311"> 3311 - Mantenimiento y reparación especializado de maquinaria y equipo</option>
                            <option value="3315"> 3315 - Mantenimiento y reparación especializado de equipo de transporte, excepto los vehículos
                                automotores, motocicletas y bicicletas</option>
                            <option value="3319"> 3319 - Mantenimiento y reparación de otros tipos de equipos y sus componentes n.c.p.</option>
                            <option value="4520"> 4520 - Mantenimiento y reparación de vehículos automotores</option>
                            <option value="4542"> 4542 - Mantenimiento y reparación de motocicletas y de sus partes y piezas</option>
                            <option value="7730"> 7730 - Alquiler y arrendamiento de otros tipos de maquinaria, equipo y bienes tangibles n.c.p.</option>
                            <option value="9521"> 9521 - Mantenimiento y reparación de aparatos electrónicos de consumo</option>
                            <option value="9522"> 9522 - Mantenimiento y reparación de aparatos y equipos domésticos y de jardinería </option>
                            <option value="3900"> 3900 - Actividades de saneamiento ambiental y otros servicios de gestión de desechos</option>
                            <option value="6910"> 6910 - Actividades jurídicas</option>
                            <option value="6920"> 6920 - Actividades de contabilidad, teneduría de libros, auditoría financiera y asesoría tributaria</option>
                            <option value="7020"> 7020 - Actividades de consultaría de gestión</option>
                            <option value="7210"> 7210 - Investigaciones y desarrollo experimental en el campo de las ciencias naturales y la ingeniería </option>
                            <option value="7220"> 7220 - Investigaciones y desarrollo experimental en el campo de las ciencias sociales y las humanidades</option>
                            <option value="7320"> 7320 - Estudios de mercado y realización de encuestas de opinión pública</option>
                            <option value="7490"> 7490 - Otras actividades profesionales, científicas y técnicas n.c.p.</option>
                            <option value="7740"> 7740 - Arrendamiento de propiedad intelectual y productos similares, excepto obras protegidas
                                por derechos de autor</option>
                            <option value="7810"> 7810 - Actividades de agencias de empleo</option>
                            <option value="8121"> 8121 - Limpieza general interior de edificios</option>
                            <option value="8129"> 8129 - Otras actividades de limpieza de edificios e instalaciones industriales</option>
                            <option value="8130"> 8130 - Actividades de paisajismo y servicios de mantenimiento conexos</option>
                            <option value="4912"> 4912 - Transporte férreo de carga </option>
                            <option value="4922"> 4922 - Transporte mixto</option>
                            <option value="4923"> 4923 - Transporte de carga por carretera</option>
                            <option value="5011"> 5011 - Transporte de pasajeros marítimo y de cabotaje </option>
                            <option value="5012"> 5012 - Transporte de carga marítimo y de cabotaje </option>
                            <option value="5022"> 5022 - Transporte fluvial de carga</option>
                            <option value="5121"> 5121 - Transporte aéreo nacional de carga </option>
                            <option value="5122"> 5122 - Transporte aéreo internacional de carga </option>
                            <option value="5210"> 5210 - Almacenamiento y depósito</option>
                            <option value="5221"> 5221 - Actividades de estaciones, vías y servicios complementarios para el transporte terrestre</option>
                            <option value="5222"> 5222 - Actividades de puertos y servicios complementarios para el transporte acuático</option>
                            <option value="5224"> 5224 - Manipulación de carga</option>
                            <option value="5229"> 5229 - Otras actividades complementarias al transporte</option>
                            <option value="7710"> 7710 - Alquiler y arrendamiento de vehículos automotores</option>
                            <option value="5629"> 5629 - Actividades de otros servicios de comidas</option>
                            <option value="6399"> 6399 - Otras actividades de servicio de información n.c.p.</option>
                            <option value="8292"> 8292 - Actividades de envase y empaque</option>
                            <option value="6511"> 6511 - Seguros generales </option>
                            <option value="6512"> 6512 - Seguros de vida</option>
                            <option value="6513"> 6513 - Reaseguros</option>
                            <option value="6514"> 6514 - Capitalización</option>
                            <option value="6621"> 6621 - Actividades de agentes y corredores de seguros</option>
                            <option value="6629"> 6629 - Evaluación de riesgos y daños, y otras actividades de servicios auxiliares</option>
                            <option value="5310"> 5310 - Actividades postales nacionales</option>
                            <option value="5320"> 5320 - Actividades de mensajería</option>
                            <option value="5812"> 5812 - Edición de directorios y listas de correo</option>
                            <option value="2680"> 2680 - Fabricación de medios magnéticos y ópticos para almacenamiento de datos</option>
                            <option value="4651"> 4651 - Comercio al por mayor de computadores, equipo periférico y programas de informática</option>
                            <option value="4791"> 4791 - Comercio al por menor realizado a través de Internet</option>
                            <option value="5820"> 5820 - Edición de programas de informática (software)</option>
                            <option value="6201"> 6201 - Actividades de desarrollo de sistemas informática (Planificación, análisis, diseño, programación,
                                pruebas)
                            </option>
                            <option value="6202"> 6202 - Actividades de consultoría informática y actividades de administración de instalaciones
                                informática
                            </option>
                            <option value="6209"> 6209 - Otras actividades de tecnologías de información y actividades de servicios informáticos</option>
                            <option value="6311"> 6311 - Procesamiento de datos, alojamiento (hosting) y actividades relacionadas</option>
                            <option value="6312"> 6312 - Portales web</option>
                            <option value="2630"> 2630 - Fabricación de equipos de comunicación</option>
                            <option value="2640"> 2640 - Fabricación de aparatos electrónicos de consumo</option>
                            <option value="4652"> 4652 - Comercio al por mayor de equipo, partes y piezas electrónicos y de telecomunicaciones</option>
                            <option value="4741"> 4741 - Comercio al por menor de computadores, equipos periféricos, programas de informática y
                                equipos de telecomunicaciones en establecimientos especializados</option>
                            <option value="6110"> 6110 - Actividades de telecomunicaciones alámbricas</option>
                            <option value="6120"> 6120 - Actividades de telecomunicaciones inalámbricas</option>
                            <option value="6130"> 6130 - Actividades de telecomunicación satelital</option>
                            <option value="6190"> 6190 - Otras actividades de telecomunicaciones</option>
                            <option value="9511"> 9511 - Mantenimiento y reparación de computadores y de equipo periférico</option>
                            <option value="9512"> 9512 - Mantenimiento y reparación de equipos de comunicación</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript">
'use strict';

function loadDepartamentos() {

    var url = '/js/colombia.json';
    $.get(url, function (data) {
        if (data.length > 0) {
            $.each(data, function (index, item) {
                var contentMenu = document.getElementById("departments");
                var ventana = '<option value="' + item.departamento + '">' + item.departamento + '</option>';

                $(contentMenu).append(ventana);
            });
        }
    });
}

$('#pais').on('change', function (e) {
    var target = e.target;
    if (target.value === 'Colombia') {
        $('#departments').prop('disabled', false);
        $('#cities').prop('disabled', false);
        loadDepartamentos();
    } else {
        $('#cities').prop('disabled', 'disabled');
        $('#departments').prop('disabled', 'disabled');
    }
});


$(function () {
    new handleDeparmentsAndCitiesSelectors('#departments', '#cities');
});
</script> @endsection