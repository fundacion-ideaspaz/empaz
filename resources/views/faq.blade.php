@extends('layouts.master') @section('title', 'login') @section('content')


<h2>Preguntas frecuentes</h2>
  <div id="accordion" role="tablist">
  <div class="card">
    <div class="card-header" role="tab" id="headingOne">
      <h5 class="mb-0">
        <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          ¿Por qué una herramienta de medición empresarial para la paz?
        </a>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <p>Esta iniciativa nació a raíz de la necesidad detectada desde la Cámara de Comercio de Bogotá y la Fundación Ideas para la paz, de propiciarles una guía práctica a aquellas empresas que quieren hacer un aporte a la construcción de paz en el país, pero que no saben cómo ni cómo medir sus resultados.</p>
<p>Teniendo en cuenta que la construcción de paz desde el sector privado es una práctica que se encuentra en pleno desarrollo hasta la fecha – tanto en Colombia como en el mundo –, existen brechas en conocimiento y entendimiento de los aportes concretos que pueden hacer las empresas a este propósito. Por otro lado, durante los pilotos de la herramienta EmPaz hemos identificado que diferentes empresas ya están realizando acciones con la intención de aportar a la paz, pero les faltan lineamientos sobre cómo medir los resultados e impactos de estas acciones y, en el caso de brechas identificadas, cómo mejorar los alcances de las mismas. Asimismo, las acciones en construcción de paz suelen ser iniciativas valiosas pero puntuales: muy pocas empresas cuentan con un enfoque integral en construcción de paz, que permita alinear sus diferentes actividades – comerciales, sociales, de relacionamiento con grupos de interés – a este mismo propósito.</p> 
<p>Con EmPaz, queremos ayudar a las empresas en atender estas brechas y demandas. Por esto, la herramienta tiene el propósito combinado de evaluar, instruir y promover la mejora continua del desempeño de las empresas en Colombia con respecto a su promoción de la paz en el país. </p>
</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingTwo">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          ¿Cómo se desarrolló la herramienta EmPaz?
        </a>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        <p>EmPaz es el resultado de un proceso de diseño y pilotaje de dos años. Con base en una revisión amplia de literatura disponible a nivel mundial en materia de sector privado y construcción de paz y una sistematización de las lecciones aprendidas del trabajo de acompañamiento desde la FIP y la CCB de empresas que quieren aportar a la construcción de paz en diferentes regiones del país, se construyó la versión beta de la herramienta. Esta versión fue puesta a prueba entre grupos focales de líderes empresariales y expertos del sector público, de la sociedad civil y la academia.  Con base en los resultados, se desarrolló la versión mejorada de la herramienta, la cual fue piloteada entre varias organizaciones (empresa grande, PYME, y fundación empresarial). Esto llevó a la consolidación de la versión 2.0 de la herramienta, que cuenta con una versión interactiva offline que está disponible para las organizaciones empresariales que desean aplicarla con el acompañamiento de los investigadores FIP (EmPaz Premium), y una versión digital libremente accesible (EmPaz Online) que actualmente está en fase de desarrollo.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingThree">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          ¿La herramienta está sujeta a ajustes?
        </a>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <p>Si. Los contenidos y la metodología de EmPaz fueron elaborados en un proceso de pilotaje y retroalimentación con diferentes empresas, expertos y grupos focales, que han permitido mejorar y afinarla. Seguiremos revisando y mejorando EmPaz con base en las lecciones aprendidas de su aplicación en diferentes empresas y fundaciones empresariales y las retroalimentaciones de expertos en la materia. Adicional a esto, próximamente se estarán diseñando versiones sectoriales de la herramienta, que permiten una evaluación alineada a las características específicas, riesgos y oportunidades en aportes a la construcción de paz, de diferentes macro sectores económicos. </p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingThree">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" href="#collapse04" aria-expanded="false" aria-controls="collapseThree">
          ¿Para quién es EmPaz?
        </a>
      </h5>
    </div>
    <div id="collapse04" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <p>La herramienta fue desarrollada para empresas de cualquier tamaño y sector, y cuenta con adaptaciones para fundaciones empresariales y otros tipos de organizaciones del sector privado, como por ejemplo asociaciones empresariales.</p>
        <p>EmPaz es aplicable a empresas en zonas afectadas por el conflicto – es decir, áreas rurales y urbanas que han sufrido enfrentamientos armados abiertos o sus consecuencias indirectas, como por ejemplo desplazamiento forzado, presencia cubierta de grupos armados ilegales, o infiltración de la economía local por actividades ilegales ligadas al conflicto. EmPaz también puede ser aplicada por empresas que realizan acciones dirigidas a impactar positivamente en la paz o la prevención de conflictos en otros territorios.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingThree">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" href="#collapse06" aria-expanded="false" aria-controls="collapseThree">
          ¿EmPaz tiene algún costo?
        </a>
      </h5>
    </div>
    <div id="collapse06" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <p>La versión EmPaz Online es gratuita, y estará disponible en el segundo semestre de este año. EmPaz Premium implica costos, que se definirán en función de las necesidades específicas de la empresa.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingThree">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" href="#collapse07" aria-expanded="false" aria-controls="collapseThree">
          ¿En qué se diferencian EmPaz Premium y Empaz Online?
        </a>
      </h5>
    </div>
    <div id="collapse07" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <p>En ambas modalidades de la herramienta, la empresa obtiene un informe de diagnóstico que le ayuda a ampliar sus aportes a la construcción de paz en su área de influencia. Las dos modalidades se distinguen con respecto al proceso de evaluación y la profundidad del análisis, así:</p>
        <table>
          <tr>
            <td><strong>EmPaz Online</strong></td>
            <td><strong>EmPaz Premium</strong></td>
          </tr>
          <tr>
            <td>Formularios de autodiagnóstico, diligenciados  por la empresa</td>
            <td>Formularios de diagnóstico, diligenciados por el equipo FIP en dialogo con la empresa</td>
          </tr>
          <tr>
            <td>Revisión propia de documentos corporativos</td>
            <td>Revisión de documentos corporativos acompañado por equipo FIP</td>
          </tr>
          <tr>
            <td>--</td>
            <td>Entrevistas con personas clave dentro y fuera de la empresa para profundizar el análisis </td>
          </tr>
          <tr>
            <td>Informe de análisis con recomendaciones estandarizadas</td>
            <td>Informe de análisis a la realidad de la empresa</td>
          </tr>
          <tr>
            <td>Recomendaciones para la mejora y plan de acción en construcción de paz estandarizadas</td>
            <td>Recomendaciones para la mejora y plan de acción en construcción de paz a la medida</td>
          </tr>
          <tr>
            <td>Inversión de tiempo (promedio estimado): 4 horas</td>
            <td>Inversión de tiempo (promedio estimado): 2-4 semanas a tiempo parcial, de acuerdo a disponibilidad de la empresa</td>
          </tr>
          <tr>
            <td>--</td>
            <td>Permite ajustes de contenidos de acuerdo a las necesidades de la empresa</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingThree">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" href="#collapse08" aria-expanded="false" aria-controls="collapseThree">
          ¿Qué beneficios tiene EmPaz para mi empresa?
        </a>
      </h5>
    </div>
    <div id="collapse08" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <p>Después de aplicar la evaluación EmPaz, la empresa obtiene un informe de diagnóstico con los resultados cuantitativos y cualitativos. El informe contiene un análisis de las fortalezas y oportunidades de mejora así como recomendaciones para un plan de acción integral en construcción de paz (de carácter estandarizado para EmPaz Online y adaptado a la realidad específica de la empresa para EmPaz Premium). Es así que la herramienta propicia insumos para la toma de decisiones a nivel estratégico   y operativo, mejorar la capacidad de análisis y gestión de riesgos económicos, sociales, en derechos humanos y prevención de conflictos y ampliar los aportes positivos a la paz en el área de influencia de la empresa.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingThree">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" href="#collapse09" aria-expanded="false" aria-controls="collapseThree">
          ¿Qué evalúa EmPaz?
        </a>
      </h5>
    </div>
    <div id="collapse09" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <p>EmPaz evalúa la gestión de una empresa – es decir, el conjunto de acciones que involucran procesos de administración y funcionamiento de la organización – y una o más iniciativas específicas implementada(s) por ella – es decir, programas, líneas de trabajo etc., con tiempos, poblaciones y objetivos preestablecidos – desde la perspectiva de su aportes positivos o negativos o no intencionados, a la construcción de paz en su área de influencia.</p>
      </div>
    </div>
  </div>
    <div class="card">
    <div class="card-header" role="tab" id="headingThree">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" href="#collapse10" aria-expanded="false" aria-controls="collapseThree">
          ¿Cómo es el proceso para evaluar los aportes a la paz?
        </a>
      </h5>
    </div>
    <div id="collapse10" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <p>EmPaz cuenta con dos versiones: EmPaz Premium y EmPaz online, que, ambas, miden los alcances de una empresa a la construcción de paz, con diferentes niveles de profundidad. EmPaz Premium, que es la versión desarrollada en los últimos dos años por la FIP con la CCB, consta de tres componentes: la revisión de las políticas, estrategias y otros documentos relevantes de la organización, el diligenciamiento de cuestionarios que evalúan los aportes de la gestión de la empresa y de sus iniciativas específicas a la construcción de paz, y la realización de entrevistas con directivas, gerentes, empleados, y grupos de interés externos de la empresa. Esta modalidad de EmPaz se implementa en un trabajo conjunto con la empresa y el equipo de la FIP.</p>
        <p>EmPaz online, que actualmente se está desarrollando, es la versión de la herramienta públicamente accesible, que cuenta con formularios de autodiagnóstico para empresas y un manual [protocolo?] para la revisión de los documentos de la empresas que puedan tener una relación con la construcción de paz.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingThree">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" href="#collapse11" aria-expanded="false" aria-controls="collapseThree">
          ¿Con base en qué criterios se mide el aporte de mi empresa a la paz?
        </a>
      </h5>
    </div>
    <div id="collapse11" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <p>EmPaz parte de una visión integral de los diferentes ámbitos, interrelacionados y complementarios, donde las empresas y fundaciones empresariales pueden ayudar a transformar los factores estructurales que alimentan el conflicto.  Es así que la herramienta mide los alcances de estas organizaciones en seis dimensiones: la gestión estratégica para la paz – que comprende los mínimos de cumplimiento de una empresa para tener un aporte real a la construcción de paz – y cinco dimensiones temáticas: Desarrollo económico inclusivo, Sostenibilidad ambiental, Institucionalidad y participación democrática, Capital humano y Reconciliación y convivencia. Para la evaluación de los alcances de una empresa o fundación empresarial, EmPaz propone cuatro o cinco indicadores de medición en cada dimensión. </p>
        <p>Adicional a esto, la herramienta mide el desempeño con respecto a una serie de indicadores relacionados con el diseño, implementación, monitoreo y evaluación, y sostenibilidad de las acciones empresariales en construcción de paz.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingThree">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" href="#collapse12" aria-expanded="false" aria-controls="collapseThree">
          ¿Cómo se llega a los resultados finales?
        </a>
      </h5>
    </div>
    <div id="collapse12" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <p>Cada respuesta tiene asignada un puntaje, de 1 o 5 (en donde 1 representa la valoración menor, y 5 la mayor). Cada pregunta tiene un peso igual en el resultado total. El porcentaje total obtenido es el promedio de todas las respuestas. </p>
        <p>La respuesta ´no aplica´ no tiene un puntaje asignado y no pesa en el resultado final, pues la organización puede escoger esta opción cuando la pregunta no aplica a la actividad de la empresa (por ejemplo: una pregunta sobre políticas de adquisición de tierras no es relevante para aquellas empresas cuya actividad de negocio no involucra adquirir tierras para su uso comercial).</p>
        <p>El informe de diagnóstico muestra – mediante diferentes graficas – el resultado combinado de respuestas con respecto a la gestión de la empresa y la iniciativa evaluada, así como el resultado por componente (gestión e iniciativa) y el resultado en cada dimensión. En esta última parte, el informe visibiliza el porcentaje de cumplimiento obtenido en los diferentes indicadores de cada dimensión. </p>
        <p>Los porcentajes de cumplimiento alcanzados corresponden a un mapa de calor o semáforo, que cuenta con cinco rangos, en donde el color rojo representa un aporte ‘bajo’ a construcción de paz y el color verde, el mejor resultado, equivalente a un aporte ‘alto’ de la empresa a la construcción de paz.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingThree">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" href="#collapse13" aria-expanded="false" aria-controls="collapseThree">
          ¿Porqué se piden fuentes documentales para sustentar las respuestas?

        </a>
      </h5>
    </div>
    <div id="collapse13" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <p>La transparencia y la facilidad de acceso a información para todos los grupos de interés son consideradas altamente importante en el marco del buen gobierno y la responsabilidad social de las empresas. Asimismo, el registro de datos con respecto a los diferentes temas relevantes es clave para poder medir los progresos de una empresa en construcción de paz. Es por esto que la herramienta EmPaz asigna un puntaje menor a una respuesta si la empresa no cuenta con información que permite soportarla con documentos, registros, u otras fuentes internas o externas de la empresa. </p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingThree">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" href="#collapse14" aria-expanded="false" aria-controls="collapseThree">
          ¿Cuánto me demoro en procesar la medición EmPaz?
        </a>
      </h5>
    </div>
    <div id="collapse14" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <p>Llenar el autodiagnóstico (EmPaz Online) toma entre dos y tres horas, dependiendo de la facilidad de acceso a la información y los interlocutores dentro de la empresa para responder todas las preguntas. El proceso de evaluación de EmPaz Premium con acompañamiento de los investigadores FIP es más largo, pues requiere mayor profundidad en la revisión documental así como la programación de una serie de entrevistas. Estas tareas se realizarán durante un periodo de dos a cuatro semanas, dependiendo de las necesidades y agendas de la empresa y sus funcionarios.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingThree">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" href="#collapse15" aria-expanded="false" aria-controls="collapseThree">
          ¿Quiénes en la empresa deben realizar el diagnóstico?
        </a>
      </h5>
    </div>
    <div id="collapse15" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <p>EmPaz evalúa políticas y prácticas en con construcción de paz que implican a diferentes áreas funcionales de la empresa, por ejemplo: alta dirección, gestión de la cadena de proveedores, relacionamiento con comunidades, responsabilidad social, y recursos humanos. En el caso de la valoración de una iniciativa concreta, la evaluación involucrará a los coordinadores/directores responsables de la implementación de la iniciativa. Por esto, se recomienda que un funcionario u área coordine la aplicación de EmPaz, y donde en donde se requiere información específica, consulte con las diferentes otras áreas relevantes.</p>
      </div>
    </div>
  </div>
 </div> 
@endsection
