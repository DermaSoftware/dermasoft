<li><a href="<?= url('/') ?>">Inicio</a></li>
<?php if(Auth::user()->role == 1){ ?>
<li><a href="<?= url('admin/plans') ?>">Planes</a></li>
<li><a href="<?= url('admin/charges') ?>">Cargos</a></li>
<li><a href="<?= url('admin/specialties') ?>">Especialidades</a></li>
<li><a href="<?= url('admin/procedures') ?>">Procedimientos</a></li>
<li><a href="<?= url('admin/diagnosestype') ?>">Tipos de diagnósticos</a></li>
<li><a href="<?= url('admin/diagnoses') ?>">Diagnósticos</a></li>
<li><a href="<?= url('admin/indications') ?>">Indicaciones</a></li>
<li><a href="<?= url('admin/checklistsecurity') ?>">Check List seguridad</a></li>
<li><a href="<?= url('admin/laboratoryexams') ?>">Exámenes de laboratorio</a></li>
<li><a href="<?= url('admin/medicines') ?>">Medicamentos</a></li>
<li><a href="<?= url('admin/pathologies') ?>">Patologías</a></li>
<li><a href="<?= url('admin/consents') ?>">Consentimientos</a></li>
<li><a href="<?= url('admin/habeas') ?>">Habeas</a></li>
<li><a href="<?= url('admin/trainings') ?>">Capacitaciones</a></li>
<li><a href="<?= url('admin/soporte') ?>">Soporte</a></li>
<li><a href="<?= url('admin/companies') ?>">Clientes</a></li>
<li><a href="<?= url('admin/orders') ?>">Ordenes de pagos</a></li>
<li><a href="<?= url('admin/payments') ?>">Suscripciones</a></li>
<li><a href="<?= url('admin/sliders') ?>">Sliders</a></li>
<li><a href="<?= url('admin/users') ?>">Usuarios</a></li>

<?php } else if(Auth::user()->role == 2){ ?>
<li><a href="<?= url('admon/settings') ?>">Configuraciones</a></li>
<li><a href="<?= url('admon/trainings') ?>">Capacitaciones</a></li>
<li><a href="<?= url('planes') ?>">Planes</a></li>
<li><a href="<?= url('orders') ?>">Ordenes de pagos</a></li>
<li><a href="<?= url('payments') ?>">Suscripciones</a></li>
<li><a href="<?= url('admon/headquarters') ?>">Sedes</a></li>
<li><a href="<?= url('admon/sliders') ?>">Sliders</a></li>
<li><a href="<?= url('admon/categories') ?>">Categorías</a></li>
<li><a href="<?= url('admon/subcategories') ?>">Sub-Categorías</a></li>
<li><a href="<?= url('admon/products') ?>">Productos</a></li>
<li><a href="<?= url('admon/services') ?>">Servicios</a></li>
<li><a href="<?= url('admon/querytypes') ?>">Tipos de consultas</a></li>
<li><a href="<?= url('admon/tplmails') ?>">Plantillas</a></li>
<li><a href="<?= url('admon/logmails') ?>">Mensajes</a></li>
<li><a href="<?= url('medicalp') ?>">Prescripción médica</a></li>
<li><a href="<?= url('examorders') ?>">Órden de exámenes</a></li>
<li><a href="<?= url('prods') ?>">Solicitud de procedimientos</a></li>
<li><a href="<?= url('pths') ?>">Solicitud de patalogías</a></li>
<li><a href="<?= url('invoices') ?>">Facturas</a></li>
<li><a href="<?= url('support') ?>">Soporte</a></li>

<?php } else if(Auth::user()->role == 3){ ?>
<li><a href="<?= url('medicalp') ?>">Prescripción médica</a></li>
<li><a href="<?= url('examorders') ?>">Órden de exámenes</a></li>
<li><a href="<?= url('prods') ?>">Solicitud de procedimientos</a></li>
<li><a href="<?= url('pths') ?>">Solicitud de patalogías</a></li>
<li><a href="<?= url('quotes') ?>">Cotizaciones</a></li>
<li><a href="<?= url('dcitas') ?>">Mis citas</a></li>
<li><a href="<?= url('trainings') ?>">Mis capacitaciones</a></li>
<li><a href="<?= url('support') ?>">Soporte</a></li>

<?php } else if(Auth::user()->role == 5){ ?>
<li><a href="<?= url('consultas') ?>">Historial de consultas</a></li>
<li><a href="<?= url('album') ?>">Album fotografico</a></li>
<li><a href="<?= url('esteticos') ?>">Procedimientos Estéticos</a></li>
<li><a href="<?= url('biopsias') ?>">Historial de biopsías</a></li>
<li><a href="<?= url('crioterapia') ?>">Historial de crioterapias</a></li>
<li><a href="<?= url('quirurgica') ?>">Descripción quirúrgica</a></li>
<li><a href="<?= url('prescripciones') ?>">Historial de prescripciones</a></li>
<li><a href="<?= url('examenes') ?>">Historial de exámenes</a></li>
<li><a href="<?= url('procedimientos') ?>">Historial de procedimientos</a></li>
<li><a href="<?= url('patalogias') ?>">Historial de patalogías</a></li>
<li><a href="<?= url('bills') ?>">Historial de facturas</a></li>
<li><a href="<?= url('citas') ?>">Mis citas</a></li>
<li><a href="<?= url('support') ?>">Soporte</a></li>
<?php } ?>
<li><a href="<?= url('profile') ?>">Mi perfil</a></li>