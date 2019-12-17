<?php

use App\JobOffer;
use Illuminate\Database\Seeder;

class JobOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $jobOffer = new JobOffer();
        $jobOffer->name = 'Administrativo departamento contabilidad';
        $jobOffer->description = 'TIPSA, importante empresa de transporte urgente, selecciona un Administrativo para el Dpto de Riesgos.
Entre las funciones a desempeñar están:
- Registro en BBDD y plataformas digitales de gestión de documentación tanto propias como de compañías aseguradoras.
- Apertura de reclamaciones de siniestros (faltas, roturas...), seguimiento y resolución de los mismos.
- Redacción de cartas de pago a las agencias.
- Revisión y Análisis de la documentación de los expedientes
- Atención telefónica - email a las agencias de la red, para la resolución de dudas o expedientes de siniestros.
- Apoyo administrativo y reclamación de informes sobre el estado de la póliza. Análisis de la siniestralidad reclamada y posibles negociaciones - cotizaciones a lo largo del año.';
        $jobOffer->type_working = 'part';
        $jobOffer->salary = '15000';
        $jobOffer->save();
        $jobOffer->employmentCategories()->sync([1]); // array of role ids


        $jobOffer3 = new JobOffer();
        $jobOffer3->name = 'Programador JAVA';
        $jobOffer3->type_working = 'part';
        $jobOffer3->salary = '25000';

        $jobOffer3->description = '¿Resides en Barcelona o alrededores? ¿buscas un cambio?, ¿estás interesado/a en una nueva oportunidad laboral? ¡Esta es tu oferta!

En Viewnext, empresa perteneciente al grupo IBM, estamos buscando Programadores/as Senior para participar en uno de nuestros proyectos más punteros para un importante cliente del sector bancario.

¿Qué requerimos? (IMPRESCINDIBLE)
- Experiencia de al menos 2-3 años como programador Java.
- Experiencia utilizando metodologías Agiles.
- Conocimientos en Spring, Struts, Oracle, SQL, PL/SQL.
- Disponibilidad para trabajar en Barcelona.

Detalles del puesto:
- Realización de análisis y diseño funcional
- Soporte técnico y/o funcional
- Relaciones con el cliente externo e interno
- Estimación de esfuerzos de equipo
- Seguimiento de desarrollos';

        $jobOffer3->save();
        $jobOffer3->employmentCategories()->sync([2, 4]); // array of role ids


        $jobOffer2 = new JobOffer();

        $jobOffer2->name = 'Administrativo departamento compras';
        $jobOffer2->description = 'Buscamos administrativo/a para trabajar en empresa líder en el sector de la recarga de los vehículos eléctricos. Se busca alguien polivalente y resolutivo. Orientación a cliente y con ganas para aprender y realizar tareas de administración, recepción, contabilidad, atención al cliente y finanzas en sector emergente y de mucho futuro.
Se requiere experiencia mínima de 3 años y formación acreditable.
Se requiere carné de conducir y vehículo propio.
Imprescindible castellano y catalán nativos e inglés intermedio o avanzado.
Incorporación inmediata con jornada completa.';
        $jobOffer2->type_working = 'complete';
        $jobOffer2->salary = '16000';
        $jobOffer2->status = 'active';

        $jobOffer2->save();
        $jobOffer2->employmentCategories()->sync([2]); // array of role ids


        $jobOffer4 = new JobOffer();
        $jobOffer4->name = 'Programador PHP';
        $jobOffer4->type_working = 'complete';
        $jobOffer4->salary = '14000';
        $jobOffer4->status = 'active';
        $jobOffer4->description = 'En Jamenet Solutions buscamos un desarrollador Back end con experiencia con PHP y Symfony para incorporación inmediata a nuestro equipo de desarrollo en un proyecto estable ubicado en Bilbao. Imprescindible experiencia con GIT y trabajo en equipos de desarrollo.';
        $jobOffer4->save();
        $jobOffer4->employmentCategories()->sync([4]); // array of role ids

        $jobOffer5 = new JobOffer();
        $jobOffer5->name = 'Desarrollador Full-Stack';
        $jobOffer5->type_working = 'complete';
        $jobOffer5->salary = '54000';
        $jobOffer5->status = 'active';
        $jobOffer5->description = '¿Te apasiona la programación? ¿Te gusta trabajar en equipo? ¿Quieres entrar a formar parte de una empresa innovadora?

EFIMOB selecciona a un programador, con experiencia en desarrollo backend y frontend. Como empresa líder en movilidad eléctrica a nivel nacional y presencia en varios países tendrás la oportunidad de aportar tus conocimientos y obtener nuevas habilidades en un sector en crecimiento.

¿QUÉ BUSCAMOS?

Actualmente para nuestra oficina de Nigrán (Pontevedra) estamos buscando un programador con experiencia en desarrollo de aplicaciones web y de APIs para incorporarse a un proyecto estable en proceso de expansión. Buscamos que seas dinámico, proactivo y con ganas de superarte día a día.

¿QUÉ TE OFRECEMOS?

- La incorporación a un proyecto estable y a un equipo con una elevada cualificación técnico-profesional
- Contrato indefinido
- Empresa en fase de expansión, con presencia internacional y buen ambiente laboral
- Plan de formación continua
- Flexibilidad horaria

¿CUÁLES SERÍAN TUS FUNCIONES?

La persona seleccionada formará parte de un equipo de desarrollo que emplea metodologías ágiles. Entre sus funciones están:
- Desarrollo de aplicaciones web responsivas
- Desarrollo de APIs
- Participación en las reuniones de planificación, revisión y retrospectiva.

¿CÓMO TE IMAGINAMOS?

- Mínimo 2 años de experiencia en funciones similares
- Nivel de inglés alto escrito, medio hablado
- Motivado, con iniciativa y orientado a resultados
- Habilidad para el trabajo en equipo
- Habilidad para asumir responsabilidades
- Organizado y con atención al detalle
- Capacidad de comunicación';
        $jobOffer5->save();
        $jobOffer5->employmentCategories()->sync([2]); // array of role ids


        $jobOffer6 = new JobOffer();
        $jobOffer6->name = 'Contable/a Asesoría Fiscal/Contable.Ingles Alto';
        $jobOffer6->type_working = 'complete';
        $jobOffer6->salary = '46000';
        $jobOffer6->status = 'active';
        $jobOffer6->description = 'Iman Temporing selecciona para importante Compañía de Asesoría y Auditoría a clientes nacionales e internacionales, ubicada en Madrid (Zona Velazquez) un/a Contable con Inglés alto:

Funciones:
- Contabilidad de una cartera de Empresas, tanto nacionales como multinacionales
- Realización de impuestos relativos a la cartera de Empresas, cuentas anuales e impuestos de sociedades.
- Cierres mensuales, trimestrales y anuales que requiera la cartera de clientes (informes y reporting correspondientes).
- Contacto directo con clientes (nacionales e internacionales).

Se Ofrece:
- Contrato de 3 meses a través de IMAN e incorporación a plantilla con Contrato indefinido.
- Jornada completa de Lunes a Viernes de 09.00 a 18.00 (Desde Julio hasta mediados de Septiembre jornada intensiva de 08.00 a 15.00)
- Incorporación inmediata
- Salario: 24.700 € brutos/año';
        $jobOffer6->save();
        $jobOffer6->employmentCategories()->sync([6]); // array of role ids

    }
}
