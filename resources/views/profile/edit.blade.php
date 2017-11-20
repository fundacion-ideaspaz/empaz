@extends('layouts.master') @section('title', 'Crear Indicador') @section('content')
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
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de la empresa">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="pais">País</label>
                        <select class="form-control" required id="pais" name="pais">
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
                        <select class="form-control" id="departamento" name="departamento">
                            <option>Seleccione una opcion</option>
                           <!--  <option value="Amazonas">Amazonas</option>
                            <option value="Antioquia">Antioquia</option>
                            <option value="Arauca">Arauca</option>
                            <option value="AtláNtico">AtláNtico</option>
                            <option value="Bogotá">Bogotá</option>
                            <option value="BolíVar">BolíVar</option>
                            <option value="Boyacá">Boyacá</option>
                            <option value="Caldas">Caldas</option>
                            <option value="Caqueta">Caqueta</option>
                            <option value="Casanare">Casanare</option>
                            <option value="Cauca">Cauca</option>
                            <option value="Cesar">Cesar</option>
                            <option value="Chocó">Chocó</option>
                            <option value="CóRdoba">CóRdoba</option>
                            <option value="Cundinamarca">Cundinamarca</option>
                            <option value="Guainia Inirida">Guainia Inirida</option>
                            <option value="Guaviare">Guaviare</option>
                            <option value="Huila">Huila</option>
                            <option value="La Guajira">La Guajira</option>
                            <option value="Magdalena">Magdalena</option>
                            <option value="Meta">Meta</option>
                            <option value="Nariño">Nariño</option>
                            <option value="Norte De Santander">Norte De Santander</option>
                            <option value="Putumayo">Putumayo</option>
                            <option value="QuindíO">QuindíO</option>
                            <option value="Risaralda">Risaralda</option>
                            <option value="San Andres Y Providencia">San Andres Y Providencia</option>
                            <option value="Santander">Santander</option>
                            <option value="Sucre">Sucre</option>
                            <option value="Tolima">Tolima</option>
                            <option value="Valle Del Cauca">Valle Del Cauca</option>
                            <option value="Vaupes">Vaupes</option>
                            <option value="Vichada">Vichada</option> -->
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="municipio">Municipio</label>
                        <select class="form-control" id="municipio" name="municipio">
                            <option>Seleccione una opcion</option>
                            <!-- <option value="Abejorral">Abejorral</option>
                            <option value="Abrego">Abrego</option>
                            <option value="Abriaqui">Abriaqui</option>
                            <option value="Acacias">Acacias</option>
                            <option value="Acandi">Acandi</option>
                            <option value="Acevedo">Acevedo</option>
                            <option value="Achi">Achi</option>
                            <option value="Agrado">Agrado</option>
                            <option value="Agua De Dios">Agua De Dios</option>
                            <option value="Aguachica">Aguachica</option>
                            <option value="Aguada">Aguada</option>
                            <option value="Aguadas">Aguadas</option>
                            <option value="Aguazul">Aguazul</option>
                            <option value="Agustin Codazzi">Agustin Codazzi</option>
                            <option value="Aipe">Aipe</option>
                            <option value="Alban">Alban</option>
                            <option value="Albania">Albania</option>
                            <option value="Alcala">Alcala</option>
                            <option value="Aldana">Aldana</option>
                            <option value="Alejandria">Alejandria</option>
                            <option value="Algarrobo">Algarrobo</option>
                            <option value="Algeciras">Algeciras</option>
                            <option value="Almaguer">Almaguer</option>
                            <option value="Almeida">Almeida</option>
                            <option value="Alpujarra">Alpujarra</option>
                            <option value="Altamira">Altamira</option>
                            <option value="Alto Baudo">Alto Baudo</option>
                            <option value="Altos Del Rosario">Altos Del Rosario</option>
                            <option value="Alvarado">Alvarado</option>
                            <option value="Amaga">Amaga</option>
                            <option value="Amalfi">Amalfi</option>
                            <option value="Ambalema">Ambalema</option>
                            <option value="Anapoima">Anapoima</option>
                            <option value="Ancuya">Ancuya</option>
                            <option value="Andalucia">Andalucia</option>
                            <option value="Andes">Andes</option>
                            <option value="Angelopolis">Angelopolis</option>
                            <option value="Angostura">Angostura</option>
                            <option value="Anolaima">Anolaima</option>
                            <option value="Anori">Anori</option>
                            <option value="Anserma">Anserma</option>
                            <option value="Ansermanuevo">Ansermanuevo</option>
                            <option value="Anza">Anza</option>
                            <option value="Anzoategui">Anzoategui</option>
                            <option value="Apartado">Apartado</option>
                            <option value="Apia">Apia</option>
                            <option value="Apulo">Apulo</option>
                            <option value="Aquitania">Aquitania</option>
                            <option value="Aracataca">Aracataca</option>
                            <option value="Aranzazu">Aranzazu</option>
                            <option value="Aratoca">Aratoca</option>
                            <option value="Arauca">Arauca</option>
                            <option value="Arauquita">Arauquita</option>
                            <option value="Arbelaez">Arbelaez</option>
                            <option value="Arboleda">Arboleda</option>
                            <option value="Arboledas">Arboledas</option>
                            <option value="Arboletes">Arboletes</option>
                            <option value="Arcabuco">Arcabuco</option>
                            <option value="Arenal">Arenal</option>
                            <option value="Argelia">Argelia</option>
                            <option value="Ariguani">Ariguani</option>
                            <option value="Arjona">Arjona</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Armero">Armero</option>
                            <option value="Arroyohondo">Arroyohondo</option>
                            <option value="Astrea">Astrea</option>
                            <option value="Ataco">Ataco</option>
                            <option value="Atrato">Atrato</option>
                            <option value="Ayapel">Ayapel</option>
                            <option value="Bagado">Bagado</option>
                            <option value="Bahia Solano">Bahia Solano</option>
                            <option value="Bajo Baudo">Bajo Baudo</option>
                            <option value="Balboa">Balboa</option>
                            <option value="Baranoa">Baranoa</option>
                            <option value="Baraya">Baraya</option>
                            <option value="Barbacoas">Barbacoas</option>
                            <option value="Barbosa">Barbosa</option>
                            <option value="Barichara">Barichara</option>
                            <option value="Barranca De Upia">Barranca De Upia</option>
                            <option value="Barrancabermeja">Barrancabermeja</option>
                            <option value="Barrancas">Barrancas</option>
                            <option value="Barranco De Loba">Barranco De Loba</option>
                            <option value="Barranco Minas">Barranco Minas</option>
                            <option value="Barranquilla">Barranquilla</option>
                            <option value="Becerril">Becerril</option>
                            <option value="Belalcazar">Belalcazar</option>
                            <option value="Belen">Belen</option>
                            <option value="Belen De Los Andaquies">Belen De Los Andaquies</option>
                            <option value="Belen De Umbria">Belen De Umbria</option>
                            <option value="Bello">Bello</option>
                            <option value="Belmira">Belmira</option>
                            <option value="Beltran">Beltran</option>
                            <option value="Berbeo">Berbeo</option>
                            <option value="Betania">Betania</option>
                            <option value="Beteitiva">Beteitiva</option>
                            <option value="Betulia">Betulia</option>
                            <option value="Bituima">Bituima</option>
                            <option value="Boavita">Boavita</option>
                            <option value="Bochalema">Bochalema</option>
                            <option value="Bogota, D.C.">Bogota, D.C.</option>
                            <option value="Bojaca">Bojaca</option>
                            <option value="Bojaya">Bojaya</option>
                            <option value="Bolivar">Bolivar</option>
                            <option value="Bosconia">Bosconia</option>
                            <option value="Boyaca">Boyaca</option>
                            <option value="BriceÑO">BriceÑO</option>
                            <option value="Bucaramanga">Bucaramanga</option>
                            <option value="Bucarasica">Bucarasica</option>
                            <option value="Buenaventura">Buenaventura</option>
                            <option value="Buenavista">Buenavista</option>
                            <option value="Buenos Aires">Buenos Aires</option>
                            <option value="Buesaco">Buesaco</option>
                            <option value="Bugalagrande">Bugalagrande</option>
                            <option value="Buritica">Buritica</option>
                            <option value="Busbanza">Busbanza</option>
                            <option value="Cabrera">Cabrera</option>
                            <option value="Cabuyaro">Cabuyaro</option>
                            <option value="Cacahual">Cacahual</option>
                            <option value="Caceres">Caceres</option>
                            <option value="Cachipay">Cachipay</option>
                            <option value="Cachira">Cachira</option>
                            <option value="Cacota">Cacota</option>
                            <option value="Caicedo">Caicedo</option>
                            <option value="Caicedonia">Caicedonia</option>
                            <option value="Caimito">Caimito</option>
                            <option value="Cajamarca">Cajamarca</option>
                            <option value="Cajibio">Cajibio</option>
                            <option value="Cajica">Cajica</option>
                            <option value="Calamar">Calamar</option>
                            <option value="Calarca">Calarca</option>
                            <option value="Caldas">Caldas</option>
                            <option value="Caldono">Caldono</option>
                            <option value="Cali">Cali</option>
                            <option value="California">California</option>
                            <option value="Calima">Calima</option>
                            <option value="Caloto">Caloto</option>
                            <option value="Campamento">Campamento</option>
                            <option value="Campo De La Cruz">Campo De La Cruz</option>
                            <option value="Campoalegre">Campoalegre</option>
                            <option value="Campohermoso">Campohermoso</option>
                            <option value="Canalete">Canalete</option>
                            <option value="Candelaria">Candelaria</option>
                            <option value="Cantagallo">Cantagallo</option>
                            <option value="CaÑAsgordas">CaÑAsgordas</option>
                            <option value="Caparrapi">Caparrapi</option>
                            <option value="Capitanejo">Capitanejo</option>
                            <option value="Caqueza">Caqueza</option>
                            <option value="Caracoli">Caracoli</option>
                            <option value="Caramanta">Caramanta</option>
                            <option value="Carcasi">Carcasi</option>
                            <option value="Carepa">Carepa</option>
                            <option value="Carmen De Apicala">Carmen De Apicala</option>
                            <option value="Carmen De Carupa">Carmen De Carupa</option>
                            <option value="Carmen Del Darien">Carmen Del Darien</option>
                            <option value="Carolina">Carolina</option>
                            <option value="Cartagena">Cartagena</option>
                            <option value="Cartagena Del Chaira">Cartagena Del Chaira</option>
                            <option value="Cartago">Cartago</option>
                            <option value="Caruru">Caruru</option>
                            <option value="Casabianca">Casabianca</option>
                            <option value="Castilla La Nueva">Castilla La Nueva</option>
                            <option value="Caucasia">Caucasia</option>
                            <option value="Cepita">Cepita</option>
                            <option value="Cerete">Cerete</option>
                            <option value="Cerinza">Cerinza</option>
                            <option value="Cerrito">Cerrito</option>
                            <option value="Cerro San Antonio">Cerro San Antonio</option>
                            <option value="Certegui">Certegui</option>
                            <option value="Chachagsi">Chachagsi</option>
                            <option value="Chaguani">Chaguani</option>
                            <option value="Chalan">Chalan</option>
                            <option value="Chameza">Chameza</option>
                            <option value="Chaparral">Chaparral</option>
                            <option value="Charala">Charala</option>
                            <option value="Charta">Charta</option>
                            <option value="Chia">Chia</option>
                            <option value="Chibolo">Chibolo</option>
                            <option value="Chigorodo">Chigorodo</option>
                            <option value="Chima">Chima</option>
                            <option value="Chimichagua">Chimichagua</option>
                            <option value="Chinacota">Chinacota</option>
                            <option value="Chinavita">Chinavita</option>
                            <option value="Chinchina">Chinchina</option>
                            <option value="Chinu">Chinu</option>
                            <option value="Chipaque">Chipaque</option>
                            <option value="Chipata">Chipata</option>
                            <option value="Chiquinquira">Chiquinquira</option>
                            <option value="Chiquiza">Chiquiza</option>
                            <option value="Chiriguana">Chiriguana</option>
                            <option value="Chiscas">Chiscas</option>
                            <option value="Chita">Chita</option>
                            <option value="Chitaga">Chitaga</option>
                            <option value="Chitaraque">Chitaraque</option>
                            <option value="Chivata">Chivata</option>
                            <option value="Chivor">Chivor</option>
                            <option value="Choachi">Choachi</option>
                            <option value="Choconta">Choconta</option>
                            <option value="Cicuco">Cicuco</option>
                            <option value="Cienaga">Cienaga</option>
                            <option value="Cienaga De Oro">Cienaga De Oro</option>
                            <option value="Cienega">Cienega</option>
                            <option value="Cimitarra">Cimitarra</option>
                            <option value="Circasia">Circasia</option>
                            <option value="Cisneros">Cisneros</option>
                            <option value="Ciudad Bolivar">Ciudad Bolivar</option>
                            <option value="Clemencia">Clemencia</option>
                            <option value="Cocorna">Cocorna</option>
                            <option value="Coello">Coello</option>
                            <option value="Cogua">Cogua</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Colon">Colon</option>
                            <option value="Coloso">Coloso</option>
                            <option value="Combita">Combita</option>
                            <option value="Concepcion">Concepcion</option>
                            <option value="Concordia">Concordia</option>
                            <option value="Condoto">Condoto</option>
                            <option value="Confines">Confines</option>
                            <option value="Consaca">Consaca</option>
                            <option value="Contadero">Contadero</option>
                            <option value="Contratacion">Contratacion</option>
                            <option value="Convencion">Convencion</option>
                            <option value="Copacabana">Copacabana</option>
                            <option value="Coper">Coper</option>
                            <option value="Cordoba">Cordoba</option>
                            <option value="Corinto">Corinto</option>
                            <option value="Coromoro">Coromoro</option>
                            <option value="Corozal">Corozal</option>
                            <option value="Corrales">Corrales</option>
                            <option value="Cota">Cota</option>
                            <option value="Cotorra">Cotorra</option>
                            <option value="Covarachia">Covarachia</option>
                            <option value="CoveÑAs">CoveÑAs</option>
                            <option value="Coyaima">Coyaima</option>
                            <option value="Cravo Norte">Cravo Norte</option>
                            <option value="Cuaspud">Cuaspud</option>
                            <option value="Cubara">Cubara</option>
                            <option value="Cubarral">Cubarral</option>
                            <option value="Cucaita">Cucaita</option>
                            <option value="Cucunuba">Cucunuba</option>
                            <option value="Cucuta">Cucuta</option>
                            <option value="Cucutilla">Cucutilla</option>
                            <option value="Cuitiva">Cuitiva</option>
                            <option value="Cumaral">Cumaral</option>
                            <option value="Cumaribo">Cumaribo</option>
                            <option value="Cumbal">Cumbal</option>
                            <option value="Cumbitara">Cumbitara</option>
                            <option value="Cunday">Cunday</option>
                            <option value="Curillo">Curillo</option>
                            <option value="Curiti">Curiti</option>
                            <option value="Curumani">Curumani</option>
                            <option value="Dabeiba">Dabeiba</option>
                            <option value="Dagua">Dagua</option>
                            <option value="Dibulla">Dibulla</option>
                            <option value="Distraccion">Distraccion</option>
                            <option value="Dolores">Dolores</option>
                            <option value="Don Matias">Don Matias</option>
                            <option value="Dosquebradas">Dosquebradas</option>
                            <option value="Duitama">Duitama</option>
                            <option value="Durania">Durania</option>
                            <option value="Ebejico">Ebejico</option>
                            <option value="El Aguila">El Aguila</option>
                            <option value="El Bagre">El Bagre</option>
                            <option value="El Banco">El Banco</option>
                            <option value="El Cairo">El Cairo</option>
                            <option value="El Calvario">El Calvario</option>
                            <option value="El Canton Del San Pablo">El Canton Del San Pablo</option>
                            <option value="El Carmen">El Carmen</option>
                            <option value="El Carmen De Atrato">El Carmen De Atrato</option>
                            <option value="El Carmen De Bolivar">El Carmen De Bolivar</option>
                            <option value="El Carmen De Chucuri">El Carmen De Chucuri</option>
                            <option value="El Carmen De Viboral">El Carmen De Viboral</option>
                            <option value="El Castillo">El Castillo</option>
                            <option value="El Cerrito">El Cerrito</option>
                            <option value="El Charco">El Charco</option>
                            <option value="El Cocuy">El Cocuy</option>
                            <option value="El Colegio">El Colegio</option>
                            <option value="El Copey">El Copey</option>
                            <option value="El Doncello">El Doncello</option>
                            <option value="El Dorado">El Dorado</option>
                            <option value="El Dovio">El Dovio</option>
                            <option value="El Encanto">El Encanto</option>
                            <option value="El Espino">El Espino</option>
                            <option value="El Guacamayo">El Guacamayo</option>
                            <option value="El Guamo">El Guamo</option>
                            <option value="El Litoral Del San Juan">El Litoral Del San Juan</option>
                            <option value="El Molino">El Molino</option>
                            <option value="El Paso">El Paso</option>
                            <option value="El Paujil">El Paujil</option>
                            <option value="El PeÑOl">El PeÑOl</option>
                            <option value="El PeÑOn">El PeÑOn</option>
                            <option value="El PiÑOn">El PiÑOn</option>
                            <option value="El Playon">El Playon</option>
                            <option value="El Reten">El Reten</option>
                            <option value="El Retorno">El Retorno</option>
                            <option value="El Roble">El Roble</option>
                            <option value="El Rosal">El Rosal</option>
                            <option value="El Rosario">El Rosario</option>
                            <option value="El Santuario">El Santuario</option>
                            <option value="El Tablon De Gomez">El Tablon De Gomez</option>
                            <option value="El Tambo">El Tambo</option>
                            <option value="El Tarra">El Tarra</option>
                            <option value="El Zulia">El Zulia</option>
                            <option value="Elias">Elias</option>
                            <option value="Encino">Encino</option>
                            <option value="Enciso">Enciso</option>
                            <option value="Entrerrios">Entrerrios</option>
                            <option value="Envigado">Envigado</option>
                            <option value="Espinal">Espinal</option>
                            <option value="Facatativa">Facatativa</option>
                            <option value="Falan">Falan</option>
                            <option value="Filadelfia">Filadelfia</option>
                            <option value="Filandia">Filandia</option>
                            <option value="Firavitoba">Firavitoba</option>
                            <option value="Flandes">Flandes</option>
                            <option value="Florencia">Florencia</option>
                            <option value="Floresta">Floresta</option>
                            <option value="Florian">Florian</option>
                            <option value="Florida">Florida</option>
                            <option value="Floridablanca">Floridablanca</option>
                            <option value="Fomeque">Fomeque</option>
                            <option value="Fonseca">Fonseca</option>
                            <option value="Fortul">Fortul</option>
                            <option value="Fosca">Fosca</option>
                            <option value="Francisco Pizarro">Francisco Pizarro</option>
                            <option value="Fredonia">Fredonia</option>
                            <option value="Fresno">Fresno</option>
                            <option value="Frontino">Frontino</option>
                            <option value="Fuente De Oro">Fuente De Oro</option>
                            <option value="Fundacion">Fundacion</option>
                            <option value="Funes">Funes</option>
                            <option value="Funza">Funza</option>
                            <option value="Fuquene">Fuquene</option>
                            <option value="Fusagasuga">Fusagasuga</option>
                            <option value="Gachala">Gachala</option>
                            <option value="Gachancipa">Gachancipa</option>
                            <option value="Gachantiva">Gachantiva</option>
                            <option value="Gacheta">Gacheta</option>
                            <option value="Galan">Galan</option>
                            <option value="Galapa">Galapa</option>
                            <option value="Galeras">Galeras</option>
                            <option value="Gama">Gama</option>
                            <option value="Gamarra">Gamarra</option>
                            <option value="Gambita">Gambita</option>
                            <option value="Gameza">Gameza</option>
                            <option value="Garagoa">Garagoa</option>
                            <option value="Garzon">Garzon</option>
                            <option value="Genova">Genova</option>
                            <option value="Gigante">Gigante</option>
                            <option value="Ginebra">Ginebra</option>
                            <option value="Giraldo">Giraldo</option>
                            <option value="Girardot">Girardot</option>
                            <option value="Girardota">Girardota</option>
                            <option value="Giron">Giron</option>
                            <option value="Gomez Plata">Gomez Plata</option>
                            <option value="Gonzalez">Gonzalez</option>
                            <option value="Gramalote">Gramalote</option>
                            <option value="Granada">Granada</option>
                            <option value="Gsepsa">Gsepsa</option>
                            <option value="Gsican">Gsican</option>
                            <option value="Guaca">Guaca</option>
                            <option value="Guacamayas">Guacamayas</option>
                            <option value="Guacari">Guacari</option>
                            <option value="Guachene">Guachene</option>
                            <option value="Guacheta">Guacheta</option>
                            <option value="Guachucal">Guachucal</option>
                            <option value="Guadalajara De Buga">Guadalajara De Buga</option>
                            <option value="Guadalupe">Guadalupe</option>
                            <option value="Guaduas">Guaduas</option>
                            <option value="Guaitarilla">Guaitarilla</option>
                            <option value="Gualmatan">Gualmatan</option>
                            <option value="Guamal">Guamal</option>
                            <option value="Guamo">Guamo</option>
                            <option value="Guapi">Guapi</option>
                            <option value="Guapota">Guapota</option>
                            <option value="Guaranda">Guaranda</option>
                            <option value="Guarne">Guarne</option>
                            <option value="Guasca">Guasca</option>
                            <option value="Guatape">Guatape</option>
                            <option value="Guataqui">Guataqui</option>
                            <option value="Guatavita">Guatavita</option>
                            <option value="Guateque">Guateque</option>
                            <option value="Guatica">Guatica</option>
                            <option value="Guavata">Guavata</option>
                            <option value="Guayabal De Siquima">Guayabal De Siquima</option>
                            <option value="Guayabetal">Guayabetal</option>
                            <option value="Guayata">Guayata</option>
                            <option value="Gutierrez">Gutierrez</option>
                            <option value="Hacari">Hacari</option>
                            <option value="Hatillo De Loba">Hatillo De Loba</option>
                            <option value="Hato">Hato</option>
                            <option value="Hato Corozal">Hato Corozal</option>
                            <option value="Hatonuevo">Hatonuevo</option>
                            <option value="Heliconia">Heliconia</option>
                            <option value="Herran">Herran</option>
                            <option value="Herveo">Herveo</option>
                            <option value="Hispania">Hispania</option>
                            <option value="Hobo">Hobo</option>
                            <option value="Honda">Honda</option>
                            <option value="Ibague">Ibague</option>
                            <option value="Icononzo">Icononzo</option>
                            <option value="Iles">Iles</option>
                            <option value="Imues">Imues</option>
                            <option value="Inirida">Inirida</option>
                            <option value="Inza">Inza</option>
                            <option value="Ipiales">Ipiales</option>
                            <option value="Iquira">Iquira</option>
                            <option value="Isnos">Isnos</option>
                            <option value="Istmina">Istmina</option>
                            <option value="Itagui">Itagui</option>
                            <option value="Ituango">Ituango</option>
                            <option value="Iza">Iza</option>
                            <option value="Jambalo">Jambalo</option>
                            <option value="Jamundi">Jamundi</option>
                            <option value="Jardin">Jardin</option>
                            <option value="Jenesano">Jenesano</option>
                            <option value="Jerico">Jerico</option>
                            <option value="Jerusalen">Jerusalen</option>
                            <option value="Jesus Maria">Jesus Maria</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Juan De Acosta">Juan De Acosta</option>
                            <option value="Junin">Junin</option>
                            <option value="Jurado">Jurado</option>
                            <option value="La Apartada">La Apartada</option>
                            <option value="La Argentina">La Argentina</option>
                            <option value="La Belleza">La Belleza</option>
                            <option value="La Calera">La Calera</option>
                            <option value="La Capilla">La Capilla</option>
                            <option value="La Ceja">La Ceja</option>
                            <option value="La Celia">La Celia</option>
                            <option value="La Chorrera">La Chorrera</option>
                            <option value="La Cruz">La Cruz</option>
                            <option value="La Cumbre">La Cumbre</option>
                            <option value="La Dorada">La Dorada</option>
                            <option value="La Esperanza">La Esperanza</option>
                            <option value="La Estrella">La Estrella</option>
                            <option value="La Florida">La Florida</option>
                            <option value="La Gloria">La Gloria</option>
                            <option value="La Guadalupe">La Guadalupe</option>
                            <option value="La Jagua De Ibirico">La Jagua De Ibirico</option>
                            <option value="La Jagua Del Pilar">La Jagua Del Pilar</option>
                            <option value="La Llanada">La Llanada</option>
                            <option value="La Macarena">La Macarena</option>
                            <option value="La Merced">La Merced</option>
                            <option value="La Mesa">La Mesa</option>
                            <option value="La MontaÑIta">La MontaÑIta</option>
                            <option value="La Palma">La Palma</option>
                            <option value="La Paz">La Paz</option>
                            <option value="La Pedrera">La Pedrera</option>
                            <option value="La PeÑA">La PeÑA</option>
                            <option value="La Pintada">La Pintada</option>
                            <option value="La Plata">La Plata</option>
                            <option value="La Playa">La Playa</option>
                            <option value="La Primavera">La Primavera</option>
                            <option value="La Salina">La Salina</option>
                            <option value="La Sierra">La Sierra</option>
                            <option value="La Tebaida">La Tebaida</option>
                            <option value="La Tola">La Tola</option>
                            <option value="La Union">La Union</option>
                            <option value="La Uvita">La Uvita</option>
                            <option value="La Vega">La Vega</option>
                            <option value="La Victoria">La Victoria</option>
                            <option value="La Virginia">La Virginia</option>
                            <option value="Labateca">Labateca</option>
                            <option value="Labranzagrande">Labranzagrande</option>
                            <option value="Landazuri">Landazuri</option>
                            <option value="Lebrija">Lebrija</option>
                            <option value="Leguizamo">Leguizamo</option>
                            <option value="Leiva">Leiva</option>
                            <option value="Lejanias">Lejanias</option>
                            <option value="Lenguazaque">Lenguazaque</option>
                            <option value="Lerida">Lerida</option>
                            <option value="Leticia">Leticia</option>
                            <option value="Libano">Libano</option>
                            <option value="Liborina">Liborina</option>
                            <option value="Linares">Linares</option>
                            <option value="Lloro">Lloro</option>
                            <option value="Lopez">Lopez</option>
                            <option value="Lorica">Lorica</option>
                            <option value="Los Andes">Los Andes</option>
                            <option value="Los Cordobas">Los Cordobas</option>
                            <option value="Los Palmitos">Los Palmitos</option>
                            <option value="Los Patios">Los Patios</option>
                            <option value="Los Santos">Los Santos</option>
                            <option value="Lourdes">Lourdes</option>
                            <option value="Luruaco">Luruaco</option>
                            <option value="Macanal">Macanal</option>
                            <option value="Macaravita">Macaravita</option>
                            <option value="Maceo">Maceo</option>
                            <option value="Macheta">Macheta</option>
                            <option value="Madrid">Madrid</option>
                            <option value="Magangue">Magangue</option>
                            <option value="Magsi">Magsi</option>
                            <option value="Mahates">Mahates</option>
                            <option value="Maicao">Maicao</option>
                            <option value="Majagual">Majagual</option>
                            <option value="Malaga">Malaga</option>
                            <option value="Malambo">Malambo</option>
                            <option value="Mallama">Mallama</option>
                            <option value="Manati">Manati</option>
                            <option value="Manaure">Manaure</option>
                            <option value="Mani">Mani</option>
                            <option value="Manizales">Manizales</option>
                            <option value="Manta">Manta</option>
                            <option value="Manzanares">Manzanares</option>
                            <option value="Mapiripan">Mapiripan</option>
                            <option value="Mapiripana">Mapiripana</option>
                            <option value="Margarita">Margarita</option>
                            <option value="Maria La Baja">Maria La Baja</option>
                            <option value="Marinilla">Marinilla</option>
                            <option value="Maripi">Maripi</option>
                            <option value="Mariquita">Mariquita</option>
                            <option value="Marmato">Marmato</option>
                            <option value="Marquetalia">Marquetalia</option>
                            <option value="Marsella">Marsella</option>
                            <option value="Marulanda">Marulanda</option>
                            <option value="Matanza">Matanza</option>
                            <option value="Medellin">Medellin</option>
                            <option value="Medina">Medina</option>
                            <option value="Medio Atrato">Medio Atrato</option>
                            <option value="Medio Baudo">Medio Baudo</option>
                            <option value="Medio San Juan">Medio San Juan</option>
                            <option value="Melgar">Melgar</option>
                            <option value="Mercaderes">Mercaderes</option>
                            <option value="Mesetas">Mesetas</option>
                            <option value="Milan">Milan</option>
                            <option value="Miraflores">Miraflores</option>
                            <option value="Miranda">Miranda</option>
                            <option value="Miriti - Parana">Miriti - Parana</option>
                            <option value="Mistrato">Mistrato</option>
                            <option value="Mitu">Mitu</option>
                            <option value="Mocoa">Mocoa</option>
                            <option value="Mogotes">Mogotes</option>
                            <option value="Molagavita">Molagavita</option>
                            <option value="Momil">Momil</option>
                            <option value="Mompos">Mompos</option>
                            <option value="Mongua">Mongua</option>
                            <option value="Mongui">Mongui</option>
                            <option value="Moniquira">Moniquira</option>
                            <option value="Montebello">Montebello</option>
                            <option value="Montecristo">Montecristo</option>
                            <option value="Montelibano">Montelibano</option>
                            <option value="Montenegro">Montenegro</option>
                            <option value="Monteria">Monteria</option>
                            <option value="Monterrey">Monterrey</option>
                            <option value="MoÑItos">MoÑItos</option>
                            <option value="Morales">Morales</option>
                            <option value="Morelia">Morelia</option>
                            <option value="Morichal">Morichal</option>
                            <option value="Morroa">Morroa</option>
                            <option value="Mosquera">Mosquera</option>
                            <option value="Motavita">Motavita</option>
                            <option value="Murillo">Murillo</option>
                            <option value="Murindo">Murindo</option>
                            <option value="Mutata">Mutata</option>
                            <option value="Mutiscua">Mutiscua</option>
                            <option value="Muzo">Muzo</option>
                            <option value="NariÑO">NariÑO</option>
                            <option value="Nataga">Nataga</option>
                            <option value="Natagaima">Natagaima</option>
                            <option value="Nechi">Nechi</option>
                            <option value="Necocli">Necocli</option>
                            <option value="Neira">Neira</option>
                            <option value="Neiva">Neiva</option>
                            <option value="Nemocon">Nemocon</option>
                            <option value="Nilo">Nilo</option>
                            <option value="Nimaima">Nimaima</option>
                            <option value="Nobsa">Nobsa</option>
                            <option value="Nocaima">Nocaima</option>
                            <option value="Norcasia">Norcasia</option>
                            <option value="Norosi">Norosi</option>
                            <option value="Novita">Novita</option>
                            <option value="Nueva Granada">Nueva Granada</option>
                            <option value="Nuevo Colon">Nuevo Colon</option>
                            <option value="Nunchia">Nunchia</option>
                            <option value="Nuqui">Nuqui</option>
                            <option value="Obando">Obando</option>
                            <option value="Ocamonte">Ocamonte</option>
                            <option value="OcaÑA">OcaÑA</option>
                            <option value="Oiba">Oiba</option>
                            <option value="Oicata">Oicata</option>
                            <option value="Olaya">Olaya</option>
                            <option value="Olaya Herrera">Olaya Herrera</option>
                            <option value="Onzaga">Onzaga</option>
                            <option value="Oporapa">Oporapa</option>
                            <option value="Orito">Orito</option>
                            <option value="Orocue">Orocue</option>
                            <option value="Ortega">Ortega</option>
                            <option value="Ospina">Ospina</option>
                            <option value="Otanche">Otanche</option>
                            <option value="Ovejas">Ovejas</option>
                            <option value="Pachavita">Pachavita</option>
                            <option value="Pacho">Pacho</option>
                            <option value="Pacoa">Pacoa</option>
                            <option value="Pacora">Pacora</option>
                            <option value="Padilla">Padilla</option>
                            <option value="Paez">Paez</option>
                            <option value="Paicol">Paicol</option>
                            <option value="Pailitas">Pailitas</option>
                            <option value="Paime">Paime</option>
                            <option value="Paipa">Paipa</option>
                            <option value="Pajarito">Pajarito</option>
                            <option value="Palermo">Palermo</option>
                            <option value="Palestina">Palestina</option>
                            <option value="Palmar">Palmar</option>
                            <option value="Palmar De Varela">Palmar De Varela</option>
                            <option value="Palmas Del Socorro">Palmas Del Socorro</option>
                            <option value="Palmira">Palmira</option>
                            <option value="Palmito">Palmito</option>
                            <option value="Palocabildo">Palocabildo</option>
                            <option value="Pamplona">Pamplona</option>
                            <option value="Pamplonita">Pamplonita</option>
                            <option value="Pana Pana">Pana Pana</option>
                            <option value="Pandi">Pandi</option>
                            <option value="Panqueba">Panqueba</option>
                            <option value="Papunaua">Papunaua</option>
                            <option value="Paramo">Paramo</option>
                            <option value="Paratebueno">Paratebueno</option>
                            <option value="Pasca">Pasca</option>
                            <option value="Pasto">Pasto</option>
                            <option value="Patia">Patia</option>
                            <option value="Pauna">Pauna</option>
                            <option value="Paya">Paya</option>
                            <option value="Paz De Ariporo">Paz De Ariporo</option>
                            <option value="Paz De Rio">Paz De Rio</option>
                            <option value="PeÐOl">PeÐOl</option>
                            <option value="Pedraza">Pedraza</option>
                            <option value="Pelaya">Pelaya</option>
                            <option value="Pensilvania">Pensilvania</option>
                            <option value="Peque">Peque</option>
                            <option value="Pereira">Pereira</option>
                            <option value="Pesca">Pesca</option>
                            <option value="Piamonte">Piamonte</option>
                            <option value="Piedecuesta">Piedecuesta</option>
                            <option value="Piedras">Piedras</option>
                            <option value="Piendamo">Piendamo</option>
                            <option value="Pijao">Pijao</option>
                            <option value="PijiÑO Del Carmen">PijiÑO Del Carmen</option>
                            <option value="Pinchote">Pinchote</option>
                            <option value="Pinillos">Pinillos</option>
                            <option value="Piojo">Piojo</option>
                            <option value="Pisba">Pisba</option>
                            <option value="Pital">Pital</option>
                            <option value="Pitalito">Pitalito</option>
                            <option value="Pivijay">Pivijay</option>
                            <option value="Planadas">Planadas</option>
                            <option value="Planeta Rica">Planeta Rica</option>
                            <option value="Plato">Plato</option>
                            <option value="Policarpa">Policarpa</option>
                            <option value="Polonuevo">Polonuevo</option>
                            <option value="Ponedera">Ponedera</option>
                            <option value="Popayan">Popayan</option>
                            <option value="Pore">Pore</option>
                            <option value="Potosi">Potosi</option>
                            <option value="Pradera">Pradera</option>
                            <option value="Prado">Prado</option>
                            <option value="Providencia">Providencia</option>
                            <option value="Pueblo Bello">Pueblo Bello</option>
                            <option value="Pueblo Nuevo">Pueblo Nuevo</option>
                            <option value="Pueblo Rico">Pueblo Rico</option>
                            <option value="Pueblorrico">Pueblorrico</option>
                            <option value="Puebloviejo">Puebloviejo</option>
                            <option value="Puente Nacional">Puente Nacional</option>
                            <option value="Puerres">Puerres</option>
                            <option value="Puerto Alegria">Puerto Alegria</option>
                            <option value="Puerto Arica">Puerto Arica</option>
                            <option value="Puerto Asis">Puerto Asis</option>
                            <option value="Puerto Berrio">Puerto Berrio</option>
                            <option value="Puerto Boyaca">Puerto Boyaca</option>
                            <option value="Puerto Caicedo">Puerto Caicedo</option>
                            <option value="Puerto CarreÑO">Puerto CarreÑO</option>
                            <option value="Puerto Colombia">Puerto Colombia</option>
                            <option value="Puerto Concordia">Puerto Concordia</option>
                            <option value="Puerto Escondido">Puerto Escondido</option>
                            <option value="Puerto Gaitan">Puerto Gaitan</option>
                            <option value="Puerto Guzman">Puerto Guzman</option>
                            <option value="Puerto Libertador">Puerto Libertador</option>
                            <option value="Puerto Lleras">Puerto Lleras</option>
                            <option value="Puerto Lopez">Puerto Lopez</option>
                            <option value="Puerto Nare">Puerto Nare</option>
                            <option value="Puerto NariÑO">Puerto NariÑO</option>
                            <option value="Puerto Parra">Puerto Parra</option>
                            <option value="Puerto Rico">Puerto Rico</option>
                            <option value="Puerto Rondon">Puerto Rondon</option>
                            <option value="Puerto Salgar">Puerto Salgar</option>
                            <option value="Puerto Santander">Puerto Santander</option>
                            <option value="Puerto Tejada">Puerto Tejada</option>
                            <option value="Puerto Triunfo">Puerto Triunfo</option>
                            <option value="Puerto Wilches">Puerto Wilches</option>
                            <option value="Puli">Puli</option>
                            <option value="Pupiales">Pupiales</option>
                            <option value="Purace">Purace</option>
                            <option value="Purificacion">Purificacion</option>
                            <option value="Purisima">Purisima</option>
                            <option value="Quebradanegra">Quebradanegra</option>
                            <option value="Quetame">Quetame</option>
                            <option value="Quibdo">Quibdo</option>
                            <option value="Quimbaya">Quimbaya</option>
                            <option value="Quinchia">Quinchia</option>
                            <option value="Quipama">Quipama</option>
                            <option value="Quipile">Quipile</option>
                            <option value="Ragonvalia">Ragonvalia</option>
                            <option value="Ramiriqui">Ramiriqui</option>
                            <option value="Raquira">Raquira</option>
                            <option value="Recetor">Recetor</option>
                            <option value="Regidor">Regidor</option>
                            <option value="Remedios">Remedios</option>
                            <option value="Remolino">Remolino</option>
                            <option value="Repelon">Repelon</option>
                            <option value="Restrepo">Restrepo</option>
                            <option value="Retiro">Retiro</option>
                            <option value="Ricaurte">Ricaurte</option>
                            <option value="Rio De Oro">Rio De Oro</option>
                            <option value="Rio Iro">Rio Iro</option>
                            <option value="Rio Quito">Rio Quito</option>
                            <option value="Rio Viejo">Rio Viejo</option>
                            <option value="Rioblanco">Rioblanco</option>
                            <option value="Riofrio">Riofrio</option>
                            <option value="Riohacha">Riohacha</option>
                            <option value="Rionegro">Rionegro</option>
                            <option value="Riosucio">Riosucio</option>
                            <option value="Risaralda">Risaralda</option>
                            <option value="Rivera">Rivera</option>
                            <option value="Roberto Payan">Roberto Payan</option>
                            <option value="Roldanillo">Roldanillo</option>
                            <option value="Roncesvalles">Roncesvalles</option>
                            <option value="Rondon">Rondon</option>
                            <option value="Rosas">Rosas</option>
                            <option value="Rovira">Rovira</option>
                            <option value="Sabana De Torres">Sabana De Torres</option>
                            <option value="Sabanagrande">Sabanagrande</option>
                            <option value="Sabanalarga">Sabanalarga</option>
                            <option value="Sabanas De San Angel">Sabanas De San Angel</option>
                            <option value="Sabaneta">Sabaneta</option>
                            <option value="Saboya">Saboya</option>
                            <option value="Sacama">Sacama</option>
                            <option value="Sachica">Sachica</option>
                            <option value="Sahagun">Sahagun</option>
                            <option value="Saladoblanco">Saladoblanco</option>
                            <option value="Salamina">Salamina</option>
                            <option value="Salazar">Salazar</option>
                            <option value="SaldaÑA">SaldaÑA</option>
                            <option value="Salento">Salento</option>
                            <option value="Salgar">Salgar</option>
                            <option value="Samaca">Samaca</option>
                            <option value="Samana">Samana</option>
                            <option value="Samaniego">Samaniego</option>
                            <option value="Sampues">Sampues</option>
                            <option value="San Agustin">San Agustin</option>
                            <option value="San Alberto">San Alberto</option>
                            <option value="San Andres">San Andres</option>
                            <option value="San Andres De Cuerquia">San Andres De Cuerquia</option>
                            <option value="San Andres De Tumaco">San Andres De Tumaco</option>
                            <option value="San Andres Sotavento">San Andres Sotavento</option>
                            <option value="San Antero">San Antero</option>
                            <option value="San Antonio">San Antonio</option>
                            <option value="San Antonio Del Tequendama">San Antonio Del Tequendama</option>
                            <option value="San Benito">San Benito</option>
                            <option value="San Benito Abad">San Benito Abad</option>
                            <option value="San Bernardo">San Bernardo</option>
                            <option value="San Bernardo Del Viento">San Bernardo Del Viento</option>
                            <option value="San Calixto">San Calixto</option>
                            <option value="San Carlos">San Carlos</option>
                            <option value="San Carlos De Guaroa">San Carlos De Guaroa</option>
                            <option value="San Cayetano">San Cayetano</option>
                            <option value="San Cristobal">San Cristobal</option>
                            <option value="San Diego">San Diego</option>
                            <option value="San Eduardo">San Eduardo</option>
                            <option value="San Estanislao">San Estanislao</option>
                            <option value="San Felipe">San Felipe</option>
                            <option value="San Fernando">San Fernando</option>
                            <option value="San Francisco">San Francisco</option>
                            <option value="San Gil">San Gil</option>
                            <option value="San Jacinto">San Jacinto</option>
                            <option value="San Jacinto Del Cauca">San Jacinto Del Cauca</option>
                            <option value="San Jeronimo">San Jeronimo</option>
                            <option value="San Joaquin">San Joaquin</option>
                            <option value="San Jose">San Jose</option>
                            <option value="San Jose De La MontaÑA">San Jose De La MontaÑA</option>
                            <option value="San Jose De Miranda">San Jose De Miranda</option>
                            <option value="San Jose De Pare">San Jose De Pare</option>
                            <option value="San Jose Del Fragua">San Jose Del Fragua</option>
                            <option value="San Jose Del Guaviare">San Jose Del Guaviare</option>
                            <option value="San Jose Del Palmar">San Jose Del Palmar</option>
                            <option value="San Juan De Arama">San Juan De Arama</option>
                            <option value="San Juan De Betulia">San Juan De Betulia</option>
                            <option value="San Juan De Rio Seco">San Juan De Rio Seco</option>
                            <option value="San Juan De Uraba">San Juan De Uraba</option>
                            <option value="San Juan Del Cesar">San Juan Del Cesar</option>
                            <option value="San Juan Nepomuceno">San Juan Nepomuceno</option>
                            <option value="San Juanito">San Juanito</option>
                            <option value="San Lorenzo">San Lorenzo</option>
                            <option value="San Luis">San Luis</option>
                            <option value="San Luis De Gaceno">San Luis De Gaceno</option>
                            <option value="San Luis De Palenque">San Luis De Palenque</option>
                            <option value="San Luis De Since">San Luis De Since</option>
                            <option value="San Marcos">San Marcos</option>
                            <option value="San Martin">San Martin</option>
                            <option value="San Martin De Loba">San Martin De Loba</option>
                            <option value="San Mateo">San Mateo</option>
                            <option value="San Miguel">San Miguel</option>
                            <option value="San Miguel De Sema">San Miguel De Sema</option>
                            <option value="San Onofre">San Onofre</option>
                            <option value="San Pablo">San Pablo</option>
                            <option value="San Pablo De Borbur">San Pablo De Borbur</option>
                            <option value="San Pedro">San Pedro</option>
                            <option value="San Pedro De Cartago">San Pedro De Cartago</option>
                            <option value="San Pedro De Uraba">San Pedro De Uraba</option>
                            <option value="San Pelayo">San Pelayo</option>
                            <option value="San Rafael">San Rafael</option>
                            <option value="San Roque">San Roque</option>
                            <option value="San Sebastian">San Sebastian</option>
                            <option value="San Sebastian De Buenavista">San Sebastian De Buenavista</option>
                            <option value="San Vicente">San Vicente</option>
                            <option value="San Vicente De Chucuri">San Vicente De Chucuri</option>
                            <option value="San Vicente Del Caguan">San Vicente Del Caguan</option>
                            <option value="San Zenon">San Zenon</option>
                            <option value="Sandona">Sandona</option>
                            <option value="Santa Ana">Santa Ana</option>
                            <option value="Santa Barbara">Santa Barbara</option>
                            <option value="Santa Barbara De Pinto">Santa Barbara De Pinto</option>
                            <option value="Santa Catalina">Santa Catalina</option>
                            <option value="Santa Helena Del Opon">Santa Helena Del Opon</option>
                            <option value="Santa Isabel">Santa Isabel</option>
                            <option value="Santa Lucia">Santa Lucia</option>
                            <option value="Santa Maria">Santa Maria</option>
                            <option value="Santa Marta">Santa Marta</option>
                            <option value="Santa Rosa">Santa Rosa</option>
                            <option value="Santa Rosa De Cabal">Santa Rosa De Cabal</option>
                            <option value="Santa Rosa De Osos">Santa Rosa De Osos</option>
                            <option value="Santa Rosa De Viterbo">Santa Rosa De Viterbo</option>
                            <option value="Santa Rosa Del Sur">Santa Rosa Del Sur</option>
                            <option value="Santa Rosalia">Santa Rosalia</option>
                            <option value="Santa Sofia">Santa Sofia</option>
                            <option value="Santacruz">Santacruz</option>
                            <option value="Santafe De Antioquia">Santafe De Antioquia</option>
                            <option value="Santana">Santana</option>
                            <option value="Santander De Quilichao">Santander De Quilichao</option>
                            <option value="Santiago">Santiago</option>
                            <option value="Santiago De Tolu">Santiago De Tolu</option>
                            <option value="Santo Domingo">Santo Domingo</option>
                            <option value="Santo Tomas">Santo Tomas</option>
                            <option value="Santuario">Santuario</option>
                            <option value="Sapuyes">Sapuyes</option>
                            <option value="Saravena">Saravena</option>
                            <option value="Sardinata">Sardinata</option>
                            <option value="Sasaima">Sasaima</option>
                            <option value="Sativanorte">Sativanorte</option>
                            <option value="Sativasur">Sativasur</option>
                            <option value="Segovia">Segovia</option>
                            <option value="Sesquile">Sesquile</option>
                            <option value="Sevilla">Sevilla</option>
                            <option value="Siachoque">Siachoque</option>
                            <option value="Sibate">Sibate</option>
                            <option value="Sibundoy">Sibundoy</option>
                            <option value="Silos">Silos</option>
                            <option value="Silvania">Silvania</option>
                            <option value="Silvia">Silvia</option>
                            <option value="Simacota">Simacota</option>
                            <option value="Simijaca">Simijaca</option>
                            <option value="Simiti">Simiti</option>
                            <option value="Sincelejo">Sincelejo</option>
                            <option value="Sipi">Sipi</option>
                            <option value="Sitionuevo">Sitionuevo</option>
                            <option value="Soacha">Soacha</option>
                            <option value="Soata">Soata</option>
                            <option value="Socha">Socha</option>
                            <option value="Socorro">Socorro</option>
                            <option value="Socota">Socota</option>
                            <option value="Sogamoso">Sogamoso</option>
                            <option value="Solano">Solano</option>
                            <option value="Soledad">Soledad</option>
                            <option value="Solita">Solita</option>
                            <option value="Somondoco">Somondoco</option>
                            <option value="Sonson">Sonson</option>
                            <option value="Sopetran">Sopetran</option>
                            <option value="Soplaviento">Soplaviento</option>
                            <option value="Sopo">Sopo</option>
                            <option value="Sora">Sora</option>
                            <option value="Soraca">Soraca</option>
                            <option value="Sotaquira">Sotaquira</option>
                            <option value="Sotara">Sotara</option>
                            <option value="Suaita">Suaita</option>
                            <option value="Suan">Suan</option>
                            <option value="Suarez">Suarez</option>
                            <option value="Suaza">Suaza</option>
                            <option value="Subachoque">Subachoque</option>
                            <option value="Sucre">Sucre</option>
                            <option value="Suesca">Suesca</option>
                            <option value="Supata">Supata</option>
                            <option value="Supia">Supia</option>
                            <option value="Surata">Surata</option>
                            <option value="Susa">Susa</option>
                            <option value="Susacon">Susacon</option>
                            <option value="Sutamarchan">Sutamarchan</option>
                            <option value="Sutatausa">Sutatausa</option>
                            <option value="Sutatenza">Sutatenza</option>
                            <option value="Tabio">Tabio</option>
                            <option value="Tado">Tado</option>
                            <option value="Talaigua Nuevo">Talaigua Nuevo</option>
                            <option value="Tamalameque">Tamalameque</option>
                            <option value="Tamara">Tamara</option>
                            <option value="Tame">Tame</option>
                            <option value="Tamesis">Tamesis</option>
                            <option value="Taminango">Taminango</option>
                            <option value="Tangua">Tangua</option>
                            <option value="Taraira">Taraira</option>
                            <option value="Tarapaca">Tarapaca</option>
                            <option value="Taraza">Taraza</option>
                            <option value="Tarqui">Tarqui</option>
                            <option value="Tarso">Tarso</option>
                            <option value="Tasco">Tasco</option>
                            <option value="Tauramena">Tauramena</option>
                            <option value="Tausa">Tausa</option>
                            <option value="Tello">Tello</option>
                            <option value="Tena">Tena</option>
                            <option value="Tenerife">Tenerife</option>
                            <option value="Tenjo">Tenjo</option>
                            <option value="Tenza">Tenza</option>
                            <option value="Teorama">Teorama</option>
                            <option value="Teruel">Teruel</option>
                            <option value="Tesalia">Tesalia</option>
                            <option value="Tibacuy">Tibacuy</option>
                            <option value="Tibana">Tibana</option>
                            <option value="Tibasosa">Tibasosa</option>
                            <option value="Tibirita">Tibirita</option>
                            <option value="Tibu">Tibu</option>
                            <option value="Tierralta">Tierralta</option>
                            <option value="Timana">Timana</option>
                            <option value="Timbio">Timbio</option>
                            <option value="Timbiqui">Timbiqui</option>
                            <option value="Tinjaca">Tinjaca</option>
                            <option value="Tipacoque">Tipacoque</option>
                            <option value="Tiquisio">Tiquisio</option>
                            <option value="Titiribi">Titiribi</option>
                            <option value="Toca">Toca</option>
                            <option value="Tocaima">Tocaima</option>
                            <option value="Tocancipa">Tocancipa</option>
                            <option value="Togsi">Togsi</option>
                            <option value="Toledo">Toledo</option>
                            <option value="Tolu Viejo">Tolu Viejo</option>
                            <option value="Tona">Tona</option>
                            <option value="Topaga">Topaga</option>
                            <option value="Topaipi">Topaipi</option>
                            <option value="Toribio">Toribio</option>
                            <option value="Toro">Toro</option>
                            <option value="Tota">Tota</option>
                            <option value="Totoro">Totoro</option>
                            <option value="Trinidad">Trinidad</option>
                            <option value="Trujillo">Trujillo</option>
                            <option value="Tubara">Tubara</option>
                            <option value="Tulua">Tulua</option>
                            <option value="Tunja">Tunja</option>
                            <option value="Tunungua">Tunungua</option>
                            <option value="Tuquerres">Tuquerres</option>
                            <option value="Turbaco">Turbaco</option>
                            <option value="Turbana">Turbana</option>
                            <option value="Turbo">Turbo</option>
                            <option value="Turmeque">Turmeque</option>
                            <option value="Tuta">Tuta</option>
                            <option value="Tutaza">Tutaza</option>
                            <option value="Ubala">Ubala</option>
                            <option value="Ubaque">Ubaque</option>
                            <option value="Ulloa">Ulloa</option>
                            <option value="Umbita">Umbita</option>
                            <option value="Une">Une</option>
                            <option value="Unguia">Unguia</option>
                            <option value="Union Panamericana">Union Panamericana</option>
                            <option value="Uramita">Uramita</option>
                            <option value="Uribe">Uribe</option>
                            <option value="Uribia">Uribia</option>
                            <option value="Urrao">Urrao</option>
                            <option value="Urumita">Urumita</option>
                            <option value="Usiacuri">Usiacuri</option>
                            <option value="Utica">Utica</option>
                            <option value="Valdivia">Valdivia</option>
                            <option value="Valencia">Valencia</option>
                            <option value="Valle De San Jose">Valle De San Jose</option>
                            <option value="Valle De San Juan">Valle De San Juan</option>
                            <option value="Valle Del Guamuez">Valle Del Guamuez</option>
                            <option value="Valledupar">Valledupar</option>
                            <option value="Valparaiso">Valparaiso</option>
                            <option value="Vegachi">Vegachi</option>
                            <option value="Velez">Velez</option>
                            <option value="Venadillo">Venadillo</option>
                            <option value="Venecia">Venecia</option>
                            <option value="Ventaquemada">Ventaquemada</option>
                            <option value="Vergara">Vergara</option>
                            <option value="Versalles">Versalles</option>
                            <option value="Vetas">Vetas</option>
                            <option value="Viani">Viani</option>
                            <option value="Victoria">Victoria</option>
                            <option value="Vigia Del Fuerte">Vigia Del Fuerte</option>
                            <option value="Vijes">Vijes</option>
                            <option value="Villa Caro">Villa Caro</option>
                            <option value="Villa De Leyva">Villa De Leyva</option>
                            <option value="Villa De San Diego De Ubate">Villa De San Diego De Ubate</option>
                            <option value="Villa Del Rosario">Villa Del Rosario</option>
                            <option value="Villa Rica">Villa Rica</option>
                            <option value="Villagarzon">Villagarzon</option>
                            <option value="Villagomez">Villagomez</option>
                            <option value="Villahermosa">Villahermosa</option>
                            <option value="Villamaria">Villamaria</option>
                            <option value="Villanueva">Villanueva</option>
                            <option value="Villapinzon">Villapinzon</option>
                            <option value="Villarrica">Villarrica</option>
                            <option value="Villavicencio">Villavicencio</option>
                            <option value="Villavieja">Villavieja</option>
                            <option value="Villeta">Villeta</option>
                            <option value="Viota">Viota</option>
                            <option value="Viracacha">Viracacha</option>
                            <option value="Vistahermosa">Vistahermosa</option>
                            <option value="Viterbo">Viterbo</option>
                            <option value="Yacopi">Yacopi</option>
                            <option value="Yacuanquer">Yacuanquer</option>
                            <option value="Yaguara">Yaguara</option>
                            <option value="Yali">Yali</option>
                            <option value="Yarumal">Yarumal</option>
                            <option value="Yavarate">Yavarate</option>
                            <option value="Yolombo">Yolombo</option>
                            <option value="Yondo">Yondo</option>
                            <option value="Yopal">Yopal</option>
                            <option value="Yotoco">Yotoco</option>
                            <option value="Yumbo">Yumbo</option>
                            <option value="Zambrano">Zambrano</option>
                            <option value="Zapatoca">Zapatoca</option>
                            <option value="Zapayan">Zapayan</option>
                            <option value="Zaragoza">Zaragoza</option>
                            <option value="Zarzal">Zarzal</option>
                            <option value="Zetaquira">Zetaquira</option>
                            <option value="Zipacon">Zipacon</option>
                            <option value="Zipaquira">Zipaquira</option>
                            <option value="Zona Bananera">Zona Bananera</option> -->
                        </select>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="direccion">Dirección Empresa</label>
                        <input type="text" name="direccion" class="form-control">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="telefono">Telefono Empresa</label>
                        <input type="tel" name="telefono" class="form-control">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="web">Pagina Web Empresa</label>
                        <input type="text" name="web" class="form-control">
                    </div>

                    <div class="form-group  col-md-6">
                        <label for="tamano">Tamaño de la empresa</label>
                        <select class="form-control" name="tamano">
                            <option selected>Seleccionar...</option>
                            <option value="1">Micro</option>
                            <option value="2">Pequeña</option>
                            <option value="3">Mediana</option>
                            <option value="4">Grande</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="num_trabajadores" class="form-label">Número de trabajadores</label>
                        <input class="form-control" name="num_trabajadores" type="number" value="0" id="num_trabajadores">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="nit">NIT</label>
                        <input type="number" name="nit" class="form-control" placeholder="Enter NIT">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="sector_economico">Código CIIU Actividad Económica Principal</label>
                        <select class="form-control" name="sector_economico" id="ciiu-principal">
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
                        <select class="form-control" name="codigo_ciiu">
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
<script>

function loadCiiu(){
$.getJSON('/js/ciiu.json', function(data) {
            $.each(data, function(key, value) {
                $("#ciiu-principal").append('<option value="' + key + '">' + value + '</option>');
            }); // close each()
        }); // close getJSON()
}


    function loadDepartamentos() {

    var url = '/js/colombia.json';
    $.get(url, function (data) {
      console.log(data.length);
      if (data.length > 0) {
        $.each(data, function (index, item) {
          var contentMenu = document.getElementById("departamento");
          var ventana = '<option value="' + item.departamento + '">' + item.departamento + '</option>';

          $(contentMenu).append(ventana);
        });
      }
    });
  }

 function loadmunicipios() {
    var url = '/js/colombia.json';
    $.get(url, function (data) {
      console.log(this.data);
      if (data.length > 0) {
        $.each(data, function (index, item) {
          var contentMenu = document.getElementById("departamento");
          var ventana = '<option value="' + item.departamento + '">' + item.departamento + '</option>';

          $(contentMenu).append(ventana);
        });
      }
    });   
}  




    $('#pais').on('change', function (e) {
        const target = e.target;
        if (target.value === 'Colombia') {
            $('#departamento').prop('disabled', false);
            $('#municipio').prop('disabled', false);
            loadDepartamentos()
        } else {
            $('#municipio').prop('disabled', 'disabled');
            $('#departamento').prop('disabled', 'disabled');
        }
        console.log(target.value);
    })


var ciudades;

var searchIntoJson = function (obj, column, value) {
 var results = [];
 var valueField;
 var searchField = column;
 for (var i = 0 ; i < obj.length ; i++) {
 valueField = obj[i][searchField].toString();
 if (valueField === value) {
 results.push(obj[i]);
 }
 }
 return results;
};

 $.getJSON("/js/colombia.json", function (data) {
 ciudades = data;
 setTimeout(function () {
 if (ciudades !== undefined) {
 loadDepartamentos();
 }
 }, 2000);
 });

 function loadmunicipios() {
    var url = '/js/colombia.json';
    $.get(url, function (data) {
        console.log(data.departamento)
      if (data.length > 0) {
        $.each(data, function (index, item) {
          var contentMenu = document.getElementById("departamento");
          var ventana = '<option value="' + item.departamento + '">' + item.departamento + '</option>';

          $(contentMenu).append(ventana);
        });
      }
    });   
}  

 $("#departamento").change(function () {
 // var departamento = $("#departamento").val();
 // if (target.value === 'Colombia') {
 //            $('#departamento').prop('disabled', false);
 //            $('#municipio').prop('disabled', false);
 //            loadDepartamentos()
 //        }
 // loadCiudades(departamento);
loadmunicipios(data);

 });

var loadCiudades = function (departamentoId) {
 var ciudadesDepto = searchIntoJson(ciudades, "departamento", departamento);

 $("#municipio").empty();
 $("#municipio").append('<option value="" selected="selected"></option>');
 $.each(ciudadesDepto, function (i, valor) {
 $("#municipio").append('<option value="' + valor.ciudades + '">' + valor.ciudades + '</option>');
 });
};

// $('#departamento').on('change', function (item) {
// //     var url = '/js/colombia.json';

// // $.getJSON(url, function(data){
// //       console.log(this.id)
// //     });

// loadmunicipios()

// });

loadCiiu();

</script> @endsection