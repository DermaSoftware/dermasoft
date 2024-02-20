-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 21, 2024 at 12:11 AM
-- Server version: 10.3.39-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `claudiar_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `modality` varchar(191) DEFAULT NULL,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `campus` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `qt_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `query_type` varchar(191) DEFAULT NULL,
  `doctor` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `date_quote` varchar(191) DEFAULT NULL,
  `time_quote` varchar(191) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `payment` varchar(191) NOT NULL DEFAULT 'Pendiente',
  `invoice` varchar(191) DEFAULT NULL,
  `amount` double(18,2) NOT NULL DEFAULT 0.00,
  `currency` varchar(191) DEFAULT NULL,
  `response` varchar(191) DEFAULT NULL,
  `franchise` varchar(191) DEFAULT NULL,
  `date_init` varchar(191) DEFAULT NULL,
  `state` varchar(191) NOT NULL DEFAULT 'Pendiente',
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `uuid`, `modality`, `user`, `company`, `campus`, `qt_id`, `query_type`, `doctor`, `date_quote`, `time_quote`, `note`, `payment`, `invoice`, `amount`, `currency`, `response`, `franchise`, `date_init`, `state`, `status`, `created_at`, `updated_at`) VALUES
(1, '11d0b4c0-645c-11ee-a978-df60ac179a79', 'Presencial', 8, 1, 0, 1, 'Dermatologia prrimera vez', 6, '2023-10-10', '09:00', 'crear', 'Pendiente', '6520260d5aa74', 80000.00, 'COP', 'Pendiente', 'Efectivo', '2023-10-06', 'Pendiente', 'active', '2023-10-06 20:21:49', '2023-10-06 20:21:49'),
(2, 'f5889920-6463-11ee-b153-bbb47101dc95', 'Presencial', 8, 1, 0, 1, 'Dermatologia prrimera vez', 6, '2023-10-17', '01:30', NULL, 'Pendiente', '65203349dabcf', 80000.00, 'COP', 'Pendiente', 'Efectivo', '2023-10-06', 'Pendiente', 'active', '2023-10-06 21:18:17', '2023-10-06 21:18:17'),
(3, '16ac3980-6468-11ee-85c9-8138c9021e82', 'Presencial', 8, 1, 0, 1, 'Dermatologia prrimera vez', 6, '2023-10-16', '02:30', 'XCASCAS', 'Pendiente', '65203a377560d', 80000.00, 'COP', 'Pendiente', 'Efectivo', '2023-10-06', 'Pendiente', 'active', '2023-10-06 21:47:51', '2023-10-06 21:47:51'),
(4, '3e2b3ed0-6867-11ee-b03e-332b9ee1b83a', 'Presencial', 8, 1, 0, 1, 'Dermatologia prrimera vez', 6, '2023-10-24', '00:00', 'vsvgsag', 'Pendiente', '6526eec8dbadc', 80000.00, 'COP', 'Pendiente', 'Efectivo', '2023-10-11', 'Pendiente', 'active', '2023-10-11 23:51:52', '2023-10-11 23:51:52'),
(5, '401cc2f0-6867-11ee-8e47-07ae248e7abc', 'Presencial', 8, 1, 0, 1, 'Dermatologia prrimera vez', 6, '2023-10-24', '00:00', 'vsvgsag', 'Pendiente', '6526eecc27166', 80000.00, 'COP', 'Pendiente', 'Efectivo', '2023-10-11', 'Pendiente', 'active', '2023-10-11 23:51:56', '2023-10-11 23:51:56'),
(6, '56728280-6d3a-11ee-b287-879bb52bf0cb', 'Presencial', 8, 1, 0, 1, 'Dermatologia prrimera vez', 6, '2023-10-31', '00:00', NULL, 'Pendiente', '652f06ee1669e', 80000.00, 'COP', 'Pendiente', 'Efectivo', '2023-10-17', 'Pendiente', 'active', '2023-10-18 03:13:02', '2023-10-18 03:13:02'),
(7, '85bb8610-9f42-11ee-bcc4-efd99222da0f', 'Teleconsulta', 8, 1, 0, 1, 'Dermatologia prrimera vez', 6, '2023-12-25', '05:00', 'esta', 'Pagado', 'bQrx4aQNTSSejsvpG', 80000.00, 'COP', 'Aceptada', 'VS', '2023-12-20', 'Pendiente', 'active', '2023-12-20 19:17:35', '2023-12-20 19:17:35'),
(8, '32cf3400-9f5a-11ee-bdf3-9b8d3f7e8ff8', 'Presencial', 8, 1, 0, 1, 'Dermatologia prrimera vez', 6, '2023-12-25', '00:00', NULL, 'Pendiente', '65831f385226a', 80000.00, 'COP', 'Pendiente', 'Efectivo', '2023-12-20', 'Pendiente', 'active', '2023-12-20 22:07:04', '2023-12-20 22:07:04'),
(9, '8cf361e0-b149-11ee-a818-4f479b22f2ff', 'Presencial', 8, 1, 0, 1, 'Dermatologia prrimera vez', 6, '2024-01-16', '03:00', 'esta es una nota', 'Pendiente', '65a1363b0d45b', 80000.00, 'COP', 'Pendiente', 'Efectivo', '2024-01-12', 'Pendiente', 'active', '2024-01-12 17:53:15', '2024-01-12 17:53:15'),
(10, '8f3a7db0-c68c-11ee-a01f-9b6e54295888', 'Teleconsulta', 8, 1, 0, 2, 'Dermatologia control', 6, '2024-02-08', '10:30', 'ESTA', 'Pagado', 'n9jzhQe5BjsRFt5Hu', 60000.00, 'COP', 'Aceptada', 'VS', '2024-02-08', 'Pendiente', 'active', '2024-02-08 19:15:49', '2024-02-08 19:15:49'),
(11, 'e0cf9750-c6af-11ee-956a-fd8c08eeb856', 'Presencial', 8, 1, 0, 1, 'Dermatologia prrimera vez', 6, '2024-02-09', '02:00', 'es para añgo', 'Pendiente', '65c51d56cb866', 80000.00, 'COP', 'Pendiente', 'Efectivo', '2024-02-08', 'Pendiente', 'active', '2024-02-08 23:28:38', '2024-02-08 23:28:38');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(191) DEFAULT NULL,
  `type_category` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `uuid`, `company`, `name`, `type_category`, `description`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, '44618060-6140-11ee-8e84-f5c0739166a1', 1, 'SERVICIOS DERMATOLOGICOS', NULL, NULL, NULL, 'active', '2023-10-02 21:25:14', '2023-10-02 21:25:14'),
(2, '4e4a9730-6140-11ee-a986-155f67ef57bb', 1, 'MEDICAMENTOS', NULL, NULL, NULL, 'active', '2023-10-02 21:25:31', '2023-10-02 21:25:31'),
(3, '62241d00-6140-11ee-8433-0b562979313e', 1, 'PRODUCTOS PARA LA PIEL', NULL, NULL, NULL, 'active', '2023-10-02 21:26:04', '2023-10-02 21:26:04'),
(4, '6b4864a0-6140-11ee-9ca3-8784be577f11', 1, 'COSMETICOS', NULL, NULL, NULL, 'active', '2023-10-02 21:26:20', '2023-10-02 21:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `catfaqs`
--

CREATE TABLE `catfaqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE `charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`id`, `uuid`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, '05331470-606b-11ee-9a54-6b4d23946c9d', 'Jefe sede', 'active', '2023-10-01 19:58:46', '2023-10-01 19:58:46'),
(2, '10527660-606b-11ee-ae63-0fff9621d97d', 'Administrativa', 'active', '2023-10-01 19:59:04', '2023-10-01 19:59:04'),
(3, '1a637730-606b-11ee-9282-9d1fb1ee709d', 'Medico', 'active', '2023-10-01 19:59:21', '2023-10-01 19:59:21'),
(4, 'f4c17370-611d-11ee-8760-497b84ac186c', 'Cliente', 'active', '2023-10-02 17:19:38', '2023-10-02 17:19:38'),
(5, '577fae00-b61a-11ee-affe-cf5decdd9cd9', 'JEFE DE SEDES', 'active', '2024-01-18 20:57:54', '2024-01-18 20:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `checklistsecurity`
--

CREATE TABLE `checklistsecurity` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checklistsecurity`
--

INSERT INTO `checklistsecurity` (`id`, `uuid`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, '90312220-6070-11ee-a461-c17bb14f757e', 'CHECK LIST PARA PROCEDIMIENTO DE BIOPSIA', 'deleted', '2023-10-01 20:38:26', '2023-10-01 20:43:35'),
(2, '51c2be50-6071-11ee-8eb7-fd6326e84a08', 'Preparación de la Sala y Equipo:\r\n\r\nVerificar que la sala esté limpia, organizada y equipada con todos los suministros necesarios para la biopsia.\r\nAsegurarse de que los instrumentos estén esterilizados y listos para su uso.\r\nConfirmar que el equipo de anestesia y monitoreo esté funcionando correctamente, si se va a utilizar anestesia local.', 'active', '2023-10-01 20:43:51', '2023-10-01 20:43:51'),
(3, '598f1600-6071-11ee-8935-836632195970', 'Revisión de la Historia del Paciente:\r\n\r\nRevisar cuidadosamente la historia clínica del paciente, incluyendo antecedentes médicos, alergias, medicamentos actuales y problemas de coagulación.', 'active', '2023-10-01 20:44:04', '2023-10-01 20:44:04'),
(4, '62d8b830-6071-11ee-90bb-b564dec8b6a7', 'Consentimiento Informado:\r\n\r\nObtener un consentimiento informado del paciente para el procedimiento, asegurándose de que comprenda los riesgos, beneficios y alternativas.', 'active', '2023-10-01 20:44:20', '2023-10-01 20:44:20'),
(5, '6d335e20-6071-11ee-af64-6ba18723c587', 'Preparación del Paciente:\r\n\r\nInformar al paciente sobre el procedimiento, incluyendo el proceso, la posible molestia y cualquier precaución postoperatoria.\r\nConfirmar que el paciente esté en una posición cómoda y adecuada para el procedimiento.', 'active', '2023-10-01 20:44:37', '2023-10-01 20:44:37'),
(6, '88a03140-6071-11ee-90e4-eb3d401230db', 'Preparación de la Zona del procedimiento:\r\n\r\nLimpiar y desinfectar la zona de la piel donde se realizará la biopsia.\r\nMarcar y delinear claramente el área de la piel que se biopsiará, siguiendo las indicaciones del dermatólogo.', 'active', '2023-10-01 20:45:23', '2023-10-01 20:45:23'),
(7, '90dbbfa0-6071-11ee-840b-779367dde375', 'Preparación de Anestesia:\r\n\r\nPreparar la anestesia local, si es necesaria, siguiendo las dosis y técnicas apropiadas.', 'active', '2023-10-01 20:45:37', '2023-10-01 20:45:37'),
(8, '9bdd8be0-6071-11ee-a160-0b919a86edc6', 'Identificación y Etiquetado de Muestras:\r\n\r\nAsegurarse de contar con recipientes de muestras adecuadamente etiquetados y listos para la recolección de la muestra de biopsia.\r\nConfirmar que la información del paciente esté correcta en cada muestra y registro.', 'active', '2023-10-01 20:45:55', '2023-10-01 20:45:55'),
(9, 'a3c71870-6071-11ee-bed8-57cbfbbae83a', 'Comunicación con el Paciente:\r\n\r\nExplicar nuevamente el procedimiento al paciente y responder cualquier pregunta o inquietud que pueda tener.', 'active', '2023-10-01 20:46:09', '2023-10-01 20:46:09'),
(10, 'ab4729e0-6071-11ee-b7df-a7edb777bef4', 'Verificación de Alergias y Medicamentos:\r\n\r\nConfirmar que se haya verificado la ausencia de alergias a los productos que se utilizarán durante la biopsia.\r\nAsegurarse de que se hayan suspendido o ajustado los medicamentos anticoagulantes según las indicaciones del dermatólogo.', 'active', '2023-10-01 20:46:21', '2023-10-01 20:46:21'),
(11, 'bc67ebe0-6071-11ee-817b-8786397b8519', 'Seguridad y Protocolos:\r\n\r\nRevisar los protocolos de seguridad y procedimientos a seguir en caso de cualquier emergencia o complicación durante el procedimiento.', 'active', '2023-10-01 20:46:50', '2023-10-01 20:46:50'),
(12, '5ce6dbb0-bace-11ee-8cb2-b91c816534c4', 'OTRO', 'active', '2024-01-24 20:36:37', '2024-01-24 20:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(191) NOT NULL,
  `nit` varchar(191) DEFAULT NULL,
  `location` text DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `logo_pp` text DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `kind_person` varchar(191) DEFAULT NULL,
  `legal_representative` varchar(191) DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `contact_name` varchar(191) DEFAULT NULL,
  `contact_phone` varchar(191) DEFAULT NULL,
  `document_type` varchar(191) DEFAULT NULL,
  `document_number` varchar(191) DEFAULT NULL,
  `charge` int(11) NOT NULL DEFAULT 0,
  `name_active` varchar(10) NOT NULL DEFAULT 'no',
  `name_required` varchar(10) NOT NULL DEFAULT 'no',
  `scd_name_active` varchar(10) NOT NULL DEFAULT 'no',
  `scd_name_required` varchar(10) NOT NULL DEFAULT 'no',
  `lastname_active` varchar(10) NOT NULL DEFAULT 'no',
  `lastname_required` varchar(10) NOT NULL DEFAULT 'no',
  `scd_lastname_active` varchar(10) NOT NULL DEFAULT 'no',
  `scd_lastname_required` varchar(10) NOT NULL DEFAULT 'no',
  `birth_active` varchar(10) NOT NULL DEFAULT 'no',
  `birth_required` varchar(10) NOT NULL DEFAULT 'no',
  `gender_active` varchar(10) NOT NULL DEFAULT 'no',
  `gender_required` varchar(10) NOT NULL DEFAULT 'no',
  `civil_status_active` varchar(10) NOT NULL DEFAULT 'no',
  `civil_status_required` varchar(10) NOT NULL DEFAULT 'no',
  `blood_type_active` varchar(10) NOT NULL DEFAULT 'no',
  `blood_type_required` varchar(10) NOT NULL DEFAULT 'no',
  `vital_state_active` varchar(10) NOT NULL DEFAULT 'no',
  `vital_state_required` varchar(10) NOT NULL DEFAULT 'no',
  `contact_active` varchar(10) NOT NULL DEFAULT 'no',
  `contact_required` varchar(10) NOT NULL DEFAULT 'no',
  `fix_phone_active` varchar(10) NOT NULL DEFAULT 'no',
  `fix_phone_required` varchar(10) NOT NULL DEFAULT 'no',
  `phone_active` varchar(10) NOT NULL DEFAULT 'no',
  `phone_required` varchar(10) NOT NULL DEFAULT 'no',
  `campus_active` varchar(10) NOT NULL DEFAULT 'no',
  `campus_required` varchar(10) NOT NULL DEFAULT 'no',
  `main_address_active` varchar(10) NOT NULL DEFAULT 'no',
  `main_address_required` varchar(10) NOT NULL DEFAULT 'no',
  `secondary_address_active` varchar(10) NOT NULL DEFAULT 'no',
  `secondary_address_required` varchar(10) NOT NULL DEFAULT 'no',
  `country_active` varchar(10) NOT NULL DEFAULT 'no',
  `country_required` varchar(10) NOT NULL DEFAULT 'no',
  `department_active` varchar(10) NOT NULL DEFAULT 'no',
  `department_required` varchar(10) NOT NULL DEFAULT 'no',
  `city_active` varchar(10) NOT NULL DEFAULT 'no',
  `city_required` varchar(10) NOT NULL DEFAULT 'no',
  `email_active` varchar(10) NOT NULL DEFAULT 'no',
  `email_required` varchar(10) NOT NULL DEFAULT 'no',
  `social_security_active` varchar(10) NOT NULL DEFAULT 'no',
  `social_security_required` varchar(10) NOT NULL DEFAULT 'no',
  `affiliate_type_active` varchar(10) NOT NULL DEFAULT 'no',
  `affiliate_type_required` varchar(10) NOT NULL DEFAULT 'no',
  `affiliate_type_ssg_active` varchar(10) NOT NULL DEFAULT 'no',
  `affiliate_type_ssg_required` varchar(10) NOT NULL DEFAULT 'no',
  `education_active` varchar(10) NOT NULL DEFAULT 'no',
  `education_required` varchar(10) NOT NULL DEFAULT 'no',
  `ethnic_group_active` varchar(10) NOT NULL DEFAULT 'no',
  `ethnic_group_required` varchar(10) NOT NULL DEFAULT 'no',
  `population_group_active` varchar(10) NOT NULL DEFAULT 'no',
  `population_group_required` varchar(10) NOT NULL DEFAULT 'no',
  `occupation_active` varchar(10) NOT NULL DEFAULT 'no',
  `occupation_required` varchar(10) NOT NULL DEFAULT 'no',
  `eps_active` varchar(10) NOT NULL DEFAULT 'no',
  `eps_required` varchar(10) NOT NULL DEFAULT 'no',
  `date_affiliation_active` varchar(10) NOT NULL DEFAULT 'no',
  `date_affiliation_required` varchar(10) NOT NULL DEFAULT 'no',
  `prepaid_active` varchar(10) NOT NULL DEFAULT 'no',
  `prepaid_required` varchar(10) NOT NULL DEFAULT 'no',
  `benefits_plan_active` varchar(10) NOT NULL DEFAULT 'no',
  `benefits_plan_required` varchar(10) NOT NULL DEFAULT 'no',
  `health_care_active` varchar(10) NOT NULL DEFAULT 'no',
  `health_care_required` varchar(10) NOT NULL DEFAULT 'no',
  `notes_active` varchar(10) NOT NULL DEFAULT 'no',
  `notes_required` varchar(10) NOT NULL DEFAULT 'no',
  `contract_number_active` varchar(10) NOT NULL DEFAULT 'no',
  `contract_number_required` varchar(10) NOT NULL DEFAULT 'no',
  `occupational_hazards_active` varchar(10) NOT NULL DEFAULT 'no',
  `occupational_hazards_required` varchar(10) NOT NULL DEFAULT 'no',
  `pension_funds_active` varchar(10) NOT NULL DEFAULT 'no',
  `pension_funds_required` varchar(10) NOT NULL DEFAULT 'no',
  `attendant_active` varchar(10) NOT NULL DEFAULT 'no',
  `attendant_required` varchar(10) NOT NULL DEFAULT 'no',
  `name_attendant_active` varchar(10) NOT NULL DEFAULT 'no',
  `name_attendant_required` varchar(10) NOT NULL DEFAULT 'no',
  `relationship_active` varchar(10) NOT NULL DEFAULT 'no',
  `relationship_required` varchar(10) NOT NULL DEFAULT 'no',
  `phone_attendant_active` varchar(10) NOT NULL DEFAULT 'no',
  `phone_attendant_required` varchar(10) NOT NULL DEFAULT 'no',
  `epaycokey` text DEFAULT NULL,
  `epaycoidc` varchar(10) DEFAULT NULL,
  `epaycopri` text DEFAULT NULL,
  `cms` varchar(191) DEFAULT NULL,
  `chat` text DEFAULT NULL,
  `whatsapp` text DEFAULT NULL,
  `state` varchar(191) NOT NULL DEFAULT 'Pendiente',
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `uuid`, `user`, `name`, `nit`, `location`, `phone`, `logo`, `logo_pp`, `email`, `kind_person`, `legal_representative`, `city`, `contact_name`, `contact_phone`, `document_type`, `document_number`, `charge`, `name_active`, `name_required`, `scd_name_active`, `scd_name_required`, `lastname_active`, `lastname_required`, `scd_lastname_active`, `scd_lastname_required`, `birth_active`, `birth_required`, `gender_active`, `gender_required`, `civil_status_active`, `civil_status_required`, `blood_type_active`, `blood_type_required`, `vital_state_active`, `vital_state_required`, `contact_active`, `contact_required`, `fix_phone_active`, `fix_phone_required`, `phone_active`, `phone_required`, `campus_active`, `campus_required`, `main_address_active`, `main_address_required`, `secondary_address_active`, `secondary_address_required`, `country_active`, `country_required`, `department_active`, `department_required`, `city_active`, `city_required`, `email_active`, `email_required`, `social_security_active`, `social_security_required`, `affiliate_type_active`, `affiliate_type_required`, `affiliate_type_ssg_active`, `affiliate_type_ssg_required`, `education_active`, `education_required`, `ethnic_group_active`, `ethnic_group_required`, `population_group_active`, `population_group_required`, `occupation_active`, `occupation_required`, `eps_active`, `eps_required`, `date_affiliation_active`, `date_affiliation_required`, `prepaid_active`, `prepaid_required`, `benefits_plan_active`, `benefits_plan_required`, `health_care_active`, `health_care_required`, `notes_active`, `notes_required`, `contract_number_active`, `contract_number_required`, `occupational_hazards_active`, `occupational_hazards_required`, `pension_funds_active`, `pension_funds_required`, `attendant_active`, `attendant_required`, `name_attendant_active`, `name_attendant_required`, `relationship_active`, `relationship_required`, `phone_attendant_active`, `phone_attendant_required`, `epaycokey`, `epaycoidc`, `epaycopri`, `cms`, `chat`, `whatsapp`, `state`, `status`, `created_at`, `updated_at`) VALUES
(1, 'faca5c10-607b-11ee-974b-817c987ea095', 2, 'Desis Dermatology', '12345678', 'Calle 17 35 01', '30012345678', 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/SCg6aqfWEswGBOe3ak4gkewqSGj5UgksTorNg5ba.png', NULL, 'alex1ptm@gmail.com', 'jurídica', 'carlos almeciga', 'Bogota', 'carlos almeciga', '3155555555', 'cedula de ciudadanía', '123456', 4, 'si', 'si', 'si', 'no', 'si', 'si', 'si', 'no', 'si', 'si', 'si', 'si', 'si', 'no', 'si', 'no', 'si', 'no', 'si', 'no', 'si', 'no', 'si', 'si', 'si', 'no', 'si', 'no', 'si', 'no', 'si', 'no', 'si', 'no', 'si', 'no', 'si', 'no', 'si', 'no', 'si', 'no', 'si', 'no', 'si', 'no', 'si', 'no', 'si', 'no', 'si', 'no', 'si', 'no', 'si', 'no', 'si', 'no', 'si', 'no', 'si', 'no', 'si', 'no', 'si', 'no', 'si', 'no', 'si', 'no', 'si', 'no', 'si', 'no', 'si', 'no', 'si', 'no', NULL, NULL, NULL, '5zwef0dp', 'var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\r\n(function(){\r\nvar s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];\r\ns1.async=true;\r\ns1.src=\'https://embed.tawk.to/652ee85bf2439e1631e57100/1hcvjn9ec\';\r\ns1.charset=\'UTF-8\';\r\ns1.setAttribute(\'crossorigin\',\'*\');\r\ns0.parentNode.insertBefore(s1,s0);\r\n})();', NULL, 'Completado', 'active', '2023-10-01 22:00:09', '2024-01-13 21:26:15'),
(2, '2865a8e0-6150-11ee-bb7c-fdafdfbee5b9', 0, 'dermatrix', NULL, NULL, '3022112345', 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/gIMkOjxACVO2LEHNDCADWzV30tyKt8m62fBYlg6g.jpg', 'storage/uploads/gIMkOjxACVO2LEHNDCADWzV30tyKt8m62fBYlg6g.jpg', 'alex1ptm_@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', NULL, NULL, NULL, 'AwbODbfi', NULL, NULL, 'Pendiente', 'deleted', '2023-10-02 23:18:59', '2023-10-03 19:53:38'),
(3, 'aaebcf20-b55b-11ee-be25-23df2c8c65a6', 0, 'BIOSCENTER', NULL, NULL, '3103451137', 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/soSgkq1J2BRsMIGJCUdvrrHin522SS8ySb729ZL5.jpg', 'storage/uploads/soSgkq1J2BRsMIGJCUdvrrHin522SS8ySb729ZL5.jpg', 'edna@bioscenter.com.co', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', NULL, NULL, NULL, 'h0yt1kPW', NULL, NULL, 'Pendiente', 'deleted', '2024-01-17 22:13:00', '2024-01-18 19:53:11'),
(4, '5fac4b10-b615-11ee-9a1f-39eeac351255', 12, 'FIGURA PIEL Y LASER', '900661232', 'CALLE 40 B # 74F 22 SUR', '3017067245', 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/6u2hK7CXN5GpDwcgE8Xuy1vkOMMX2kYmGEjXpjwF.jpg', 'storage/uploads/6u2hK7CXN5GpDwcgE8Xuy1vkOMMX2kYmGEjXpjwF.jpg', 'figurapielylaser@gmail.com', 'jurídica', 'ALBA CELY SOTO RIVERA', 'BOGOTA', 'JENNIFER TORRES', '3134109274', 'cedula de ciudadanía', '1023932242', 2, 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', NULL, NULL, NULL, '2yh2rlfn', NULL, NULL, 'Completado', 'active', '2024-01-18 20:22:21', '2024-02-02 21:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `consents`
--

CREATE TABLE `consents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consents`
--

INSERT INTO `consents` (`id`, `uuid`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ce313fc0-6078-11ee-86b4-b3aafa3989cf', 'Consentimiento Informado para Tratamiento con Láser', 'onsentimiento Informado para Tratamiento con Láser\r\n\r\nEn mi calidad de paciente, reconozco que he sido informado(a) y entiendo que se me ha recomendado un tratamiento con láser para abordar la siguiente condición dermatológica: [Especificar condición dermatológica].\r\n\r\nHe sido informado(a) sobre los siguientes puntos clave relacionados con este tratamiento:\r\n\r\nProcedimiento: Se utilizará un láser para tratar la condición dermatológica especificada.\r\n\r\nBeneficios Esperados:\r\n\r\nMejora en la apariencia de la piel.\r\nReducción de [especificar el problema a tratar, como manchas, arrugas, etc.].\r\nRiesgos y Posibles Complicaciones:\r\n\r\nEnrojecimiento, hinchazón y sensibilidad temporal de la piel.\r\nCambios temporales en la pigmentación de la piel.\r\nFormación de costras o ampollas temporales.\r\nRiesgo mínimo de infección.\r\nCicatrices permanentes (raramente).\r\nAlternativas al Tratamiento con Láser: Se han discutido y considerado otras opciones de tratamiento, incluyendo [mencionar alternativas].\r\n\r\nCostos y Pagos: Se ha discutido el costo del tratamiento, así como las opciones de pago disponibles.', 'active', '2023-10-01 21:37:26', '2023-10-01 21:39:11'),
(2, 'fe31cb50-6078-11ee-829b-2bff612a6b4a', 'Consentimiento Informado para Biopsia Cutánea', 'Consentimiento Informado para Biopsia Cutánea\r\n\r\nEn mi calidad de paciente, entiendo que se me ha recomendado una biopsia cutánea para evaluar y diagnosticar la siguiente condición dermatológica: [Especificar condición dermatológica].\r\n\r\nHe sido informado(a) sobre los siguientes aspectos relevantes de este procedimiento:\r\n\r\nProcedimiento:\r\n\r\nSe tomará una muestra de piel para su análisis bajo microscopio.\r\nFinalidad:\r\n\r\nObtener información para diagnosticar la condición de la piel.\r\nRiesgos y Posibles Complicaciones:\r\n\r\nDolor, molestias o sensibilidad en el área de la biopsia.\r\nHematoma o sangrado en el sitio de la biopsia.\r\nCicatrización o decoloración temporal en la zona de la biopsia.\r\nRiesgo mínimo de infección.\r\nAlternativas a la Biopsia:\r\n\r\nOtras pruebas diagnósticas que pueden ser recomendadas y discutidas.\r\nConsentimiento para Análisis y Almacenamiento de la Muestra: Acepto que la muestra de piel tomada será analizada y almacenada según sea necesario para mi atención médica.', 'active', '2023-10-01 21:38:47', '2023-10-01 21:38:47'),
(3, '30b8bbd0-6079-11ee-b6ee-db49a4b8b171', 'Consentimiento Informado para Tratamiento de Rejuvenecimiento Facial', 'Consentimiento Informado para Tratamiento de Rejuvenecimiento Facial\r\n\r\nEn mi calidad de paciente, reconozco que se me ha recomendado un tratamiento de rejuvenecimiento facial para mejorar la apariencia de mi piel.\r\n\r\nHe sido informado(a) sobre los siguientes aspectos relevantes de este tratamiento:\r\n\r\nProcedimiento:\r\n\r\nSe utilizarán técnicas de rejuvenecimiento facial, que pueden incluir rellenos dérmicos, toxina botulínica, entre otros, según se considere apropiado.\r\nBeneficios Esperados:\r\n\r\nMejora en la apariencia general de la piel y reducción de líneas de expresión y arrugas.\r\nRiesgos y Posibles Complicaciones:\r\n\r\nEnrojecimiento, hinchazón o hematomas temporales en la zona tratada.\r\nPosibilidad de alergias o reacciones a los materiales utilizados.\r\nCambios en la sensación de la piel.\r\nCicatrices (raramente).\r\nOtros riesgos específicos pueden ser discutidos durante la consulta.\r\nAlternativas al Tratamiento de Rejuvenecimiento Facial: Se han discutido y considerado otras opciones de tratamiento, incluyendo [mencionar alternativas].\r\n\r\nConsentimiento para Fotografías: Acepto que se tomen fotografías antes y después del tratamiento para documentar los resultados.', 'active', '2023-10-01 21:40:11', '2023-10-01 21:40:11'),
(4, '5e0bb260-bacf-11ee-a3ae-43342800eb19', 'CONSENTIMIENTO INFORMADO PARA TOMA Y USO DE FOTOGRAFÍAS', '2. INFORMACION:\r\nEn el ejercicio de la Dermatología es importante en algunos casos llevar un registro fotográfico de la enfermedad, con el fin de realizar un seguimiento de la evolución y facilitar de esta manera el trabajo del equipo de salud.\r\nComo paciente usted tiene la disponibilidad de que se tomen las fotografías para distintos fines, toma que será realizada por el médico especialista tratante o por médicos en formación y debe ser autorizada por usted para especificar el uso que se le dará. A su vez, es importante precisar que tal ejercicio no influirá en el tipo de tratamiento que se le instaurara, ni en los controles que se deben realizar, no será compensado de ninguna forma económica, ni en prestación de servicios adicionales.\r\n\r\n3.DECLARACIONES Y FIRMAS:\r\n3.1 El Médico tratante: He informado a este paciente y/o familiar(es) del propósito y naturaleza de la toma de imágenes mediante fotografías descrito anteriormente y de sus alternativas.\r\n3.2 Consentimiento o manifestaciones del paciente o representante legal del menor de edad: Doy mi consentimiento para que se tomen esas fotografías en las cuales se que no se emplearan el nombre del paciente que permita la identificación de las mismas y su uso se limitara a las siguientes condiciones \r\n\r\nAUTORIZACIONES \r\n3.Para uso académico dentro y fuera de las instituciones (publicaciones institucionales, folletos educativos, eventos académicos como congresos y similares, publicaciones extrainstitucionales incluyendo programas de TV) 2. Para uso académico dentro de la institución (clubes de fotos, juntas de decisiones, discusiones de casos clínicos y similares)4. como parte del seguimiento en investigación clínica. \r\n1. En ningún caso se hará uso comercial o lucrativo de estas fotografías                                                                              \r\n2. El representante de un paciente menor de edad deberá acreditar tener la patria potestad', 'active', '2024-01-24 20:43:49', '2024-01-24 20:43:49');

-- --------------------------------------------------------

--
-- Table structure for table `dermatology`
--

CREATE TABLE `dermatology` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `doctor` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `campus` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `external_cause` varchar(191) DEFAULT NULL,
  `consultation_purpose` varchar(191) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `current_illness` text DEFAULT NULL,
  `physical_exam` text DEFAULT NULL,
  `analysis` text DEFAULT NULL,
  `medical_history` text DEFAULT NULL,
  `surgical_history` text DEFAULT NULL,
  `allergic_history` text DEFAULT NULL,
  `drug_history` text DEFAULT NULL,
  `family_history` text DEFAULT NULL,
  `other_history` text DEFAULT NULL,
  `path_pdf` text DEFAULT NULL,
  `hc_type` varchar(191) NOT NULL DEFAULT 'Dermatología general',
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dermatology`
--

INSERT INTO `dermatology` (`id`, `uuid`, `user`, `doctor`, `company`, `campus`, `external_cause`, `consultation_purpose`, `reason`, `current_illness`, `physical_exam`, `analysis`, `medical_history`, `surgical_history`, `allergic_history`, `drug_history`, `family_history`, `other_history`, `path_pdf`, `hc_type`, `status`, `created_at`, `updated_at`) VALUES
(1, '8f181840-62ec-11ee-885c-3722fde5d36e', 8, 2, 1, 1, 'Otra', 'Ninguna', 'piquiña', 'nimnguna', 'bienm', 'ninguna', 'Ninguno', 'Ninguno', 'Ninguno', 'Ninguno', 'Ninguno', 'Ninguno', NULL, 'Dermatología general', 'active', '2023-10-05 00:31:04', '2023-10-05 00:31:04'),
(2, '96b85360-62f4-11ee-a2ed-a7a55f64a24e', 8, 2, 1, 1, 'Otra', 'Ninguna', 'piquiña', 'nimnguna', 'bienm', 'ninguna', 'Ninguno', 'Ninguno\r\nbiopsia', 'Ninguno', 'Ninguno', 'Ninguno', 'Ninguno', NULL, 'Dermatología general', 'active', '2023-10-05 01:28:33', '2023-10-05 01:28:33'),
(3, 'a8d92690-6306-11ee-b768-43375134c136', 8, 2, 1, 1, 'Otra', 'Ninguna', NULL, NULL, NULL, NULL, 'ninguno', 'ninguno', 'ninguno', 'ninguno', 'ninguno', 'ninguno', NULL, 'Biopsías y/o procedimientos', 'active', '2023-10-05 03:37:54', '2023-10-05 03:37:54'),
(4, '30fafe10-6309-11ee-8257-bfca0cb35955', 8, 2, 1, 1, 'Otra', 'Ninguna', NULL, NULL, NULL, NULL, 'ninguno', 'ninguno', 'ninguno', 'ninguno', 'ninguno', 'ninguno', NULL, 'Biopsías y/o procedimientos', 'active', '2023-10-05 03:56:02', '2023-10-05 03:56:02'),
(5, '491b4230-63a1-11ee-b221-d1cccab50a7a', 8, 2, 1, 1, 'Otra', 'No aplica', NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', 'n', NULL, 'Procedimientos Estéticos', 'active', '2023-10-05 22:04:46', '2023-10-05 22:04:46'),
(6, 'c0e50ae0-63b3-11ee-ad62-f5e1cc76e76e', 8, 2, 1, 1, 'Ninguna', 'Ninguna', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Descripción Quirúrgica', 'active', '2023-10-06 00:16:58', '2023-10-06 00:16:58'),
(7, '0faec4c0-b14e-11ee-9d68-c762d19138bc', 8, 6, 1, 1, 'Accidente ofídico', 'Atención parto (puerperlo)', 'piquiña', 'nimnguna', 'bienm', 'ninguna', 'Ninguno', 'Ninguno\r\nbiopsia', 'Ninguno\r\nalergico a la penicilina', 'Ninguno', 'Ninguno', 'Ninguno', NULL, 'Dermatología general', 'active', '2024-01-12 18:25:32', '2024-01-12 18:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `diagnoses`
--

CREATE TABLE `diagnoses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `code` varchar(191) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diagnoses`
--

INSERT INTO `diagnoses` (`id`, `uuid`, `code`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'f3846730-b93a-11ee-8e1c-354281b8d4d0', 'codigo', 'descripcion', 'deleted', '2024-01-22 20:28:53', '2024-01-22 20:31:36'),
(2, 'f3847f20-b93a-11ee-8f4a-3fb9090bdd0c', 'A220', 'CARBUNCO CUTANEO', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(3, 'f3848a40-b93a-11ee-9c53-f36ba28b2c1d', 'A228', 'OTRAS FORMAS DE CARBUNCO', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(4, 'f38494c0-b93a-11ee-8808-613d73821694', 'A229', 'CARBUNCO, NO ESPECIFICADO', 'active', '2024-01-22 20:28:53', '2024-01-22 20:30:56'),
(5, 'f3849eb0-b93a-11ee-a79b-19eebf36fef1', 'A260', 'ERISIPELOIDE CUTANEO', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(6, 'f384a8c0-b93a-11ee-9b86-49dc5fa4f43d', 'A281', 'ENFERMEDAD POR RASGUÑO DE GAT', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(7, 'f384b280-b93a-11ee-8b17-e5aaac8ec858', 'A300', 'LEPRA INDETERMINADA', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(8, 'f384bc80-b93a-11ee-ac11-097993578c67', 'A301', 'LEPRA TUBERCULOIDE', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(9, 'f384c610-b93a-11ee-9597-dd0c2925839f', 'A302', 'LEPRA TUBERCULOIDE LIMITROFE', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(10, 'f384d050-b93a-11ee-9fad-a92477359d15', 'A303', 'LEPRA LIMITROFE', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(11, 'f384da00-b93a-11ee-b01c-cfb4aac35b35', 'A304', 'LEPRA LEPROMATOSA LIMITROFE', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(12, 'f384e380-b93a-11ee-9fdc-43700a95274d', 'A305', 'LEPRA LEPROMATOSA', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(13, 'f384ed30-b93a-11ee-803b-57c3d43dcd90', 'A308', 'OTRAS FORMAS DE LEPRA', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(14, 'f384f710-b93a-11ee-832d-a3e0d894c2fc', 'A309,\"LEPRA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(15, 'f3850150-b93a-11ee-aedc-45a4a9eee752', 'A311', 'INFECCION CUTANEA POR MICOBACTERIAS', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(16, 'f3850ae0-b93a-11ee-afaf-690878a8fd75', 'A318', 'OTRAS INFECCIONES POR MICOBACTERIAS', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(17, 'f3851820-b93a-11ee-9d01-175d269fe9ce', 'A319,\"INFECCION POR MICOBACTERIA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(18, 'f38525b0-b93a-11ee-9cd6-31e883fceafc', 'A320', 'LISTERIOSIS CUTANEA', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(19, 'f38530c0-b93a-11ee-bf2b-a11eed67494d', 'A363', 'DIFTERIA CUTANEA', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(20, 'f3853b50-b93a-11ee-9a72-239dad656e76', 'A38X', 'ESCARLATINA', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(21, 'f3854600-b93a-11ee-9344-4b53b64d494d', 'A429,\"ACTINOMICOSIS, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(22, 'f3854fe0-b93a-11ee-b4bd-4329a75df84a', 'A431', 'NOCARDIOSIS CUTANEA', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(23, 'f3855d00-b93a-11ee-ac4f-53da6d4177c2', 'A438', 'OTRAS FORMAS DE NOCARDIOSIS', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(24, 'f3856ec0-b93a-11ee-b1b0-6dd1fb6e9f5e', 'A439,\"NORCARDIOSIS , NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(25, 'f3857bd0-b93a-11ee-936e-d19499d93fd6', 'A441', 'BARTONELOSIS CUTANEA Y MUCOCUTANEA', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(26, 'f38585d0-b93a-11ee-a478-b3106b6a1d03', 'A448', 'OTRAS FORMAS DE BARTONELOSIS', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(27, 'f38590c0-b93a-11ee-a0e3-cd4f70dcd79d', 'A449,\"BARTONELOSIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(28, 'f3859a90-b93a-11ee-8954-f35123b5a953', 'A46X', 'ERISIPELA', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(29, 'f385a4c0-b93a-11ee-8617-297c2cc3eea2', 'A480', 'GANGRENA GASEOSA', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(30, 'f385aea0-b93a-11ee-b6f0-0bae023c52c4', 'A483', 'SINDROME DE CHOQUE TOXICO', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(31, 'f385b8b0-b93a-11ee-bb4e-bdf147658f53', 'A490,\"INFECCION ESTAFILOCOCICA, SIN OTRA ESPECIFICACIÓ\"', NULL, 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(32, 'f385c330-b93a-11ee-b1b3-6fa2664722ee', 'A491,\"INFECCION ESTREPTOCOCICA, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(33, 'f385cd10-b93a-11ee-81ab-6fabacb87ca7', 'A498', 'OTRAS INFECCIONES BACTERIANAS DE SITIO NO ESPECIFICADO', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(34, 'f385d720-b93a-11ee-a97b-fdccf0cddbae', 'A499,\"INFECCION BACTERIANA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(35, 'f385e100-b93a-11ee-abf0-494a7edd78bd', 'A510', 'SIFILIS GENITAL PRIMARIA', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(36, 'f385ead0-b93a-11ee-8a44-e73a73b71bf5', 'A511', 'SIFILIS PRIMARIA ANAL', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(37, 'f385f480-b93a-11ee-a0c2-e3119ad72f1e', 'A512', 'SIFILIS PRIMARIA EN OTROS SITIOS', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(38, 'f385fe60-b93a-11ee-b06e-b1af8c735a15', 'A513', 'SIFILIS SECUNDARIA DE PIEL Y MEMBRANAS MUCOSAS', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(39, 'f3860840-b93a-11ee-b50a-dbb15afbdaf7', 'A514', 'OTRAS SIFILIS SECUNDARIAS', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(40, 'f3861210-b93a-11ee-a652-d56a764676f3', 'A515,\"SIFILIS PRECOZ, LATENTE\"', NULL, 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(41, 'f3861bf0-b93a-11ee-b3ad-bf8ade4e04a9', 'A519,\"SIFILIS PRECOZ, SIN OTRA ESPECIFICACIÓ\"', NULL, 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(42, 'f3862650-b93a-11ee-8b81-c94b99ff6af5', 'A528,\"SIFILIS TARDIA, LATENTE\"', NULL, 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(43, 'f3863070-b93a-11ee-b5c5-31819b36a917', 'A529,\"SIFILIS TARDIA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(44, 'f3863a90-b93a-11ee-95a9-2964b58692bb', 'A530,\"SIFILIS LATENTE, NO ESPECIFICADA COMO PRECOZ O TARDIA\"', NULL, 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(45, 'f38644a0-b93a-11ee-995d-b1268b010965', 'A539,\"SIFILIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(46, 'f3864eb0-b93a-11ee-aec3-2584dc015014', 'A546', 'INFECCION GONOCOCICA DEL ANO Y DEL RECTO', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(47, 'f3865a50-b93a-11ee-ad0b-451305a2ed0c', 'A548', 'OTRAS INFECCIONES GONOCOCICAS', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(48, 'f38664d0-b93a-11ee-9491-cb2eecb08a04', 'A549,\"INFECCION, GONOCOCICA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(49, 'f3866ec0-b93a-11ee-b189-f7a1d9171e02', 'A55X', 'LINFOGRANULOMA (VENEREO) POR CLAMIDIAS', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(50, 'f3867940-b93a-11ee-84d9-55d09d43107d', 'A57X', 'CHANCRO BLANDO', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(51, 'f3868320-b93a-11ee-b5bc-ab9010e9292a', 'A58X', 'GRANULOMA INGUINAL', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(52, 'f3868d50-b93a-11ee-ba71-cbc959cfd6e1', 'A598', 'TRICOMONIASIS DE OTROS SITIOS', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(53, 'f3869770-b93a-11ee-ae48-21d45c97cda5', 'A599,\"TRICOMONIASIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(54, 'f386a180-b93a-11ee-a1a0-8f3ca3ccdcd8', 'A600', 'INFECCION DE GENITALES Y TRAYECTO UROGENITAL Y DEBIDA A VIRUS DEL HERPES [HERPES SIMPLE]', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(55, 'f386ab60-b93a-11ee-9e40-871c61389899', 'A601', 'INFECCION DE LA PIEL PERIANAL Y RECTO POR VIRUS DEL HERPES SIMPLE', 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(56, 'f386b540-b93a-11ee-b73f-57321652e5b5', 'A609,\"INFECCION ANOGENITAL POR VIRUS DEL HERPES SIMPLE, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:53', '2024-01-22 20:28:53'),
(57, 'f386bf10-b93a-11ee-a668-35a452277fe0', 'A630', 'VERRUGAS (VENEREAS) ANOGENITALES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(58, 'f386ca50-b93a-11ee-99a9-43504e19a70b', 'A638,\"OTRAS ENFERMEDADES DE TRANSMISIÓN PREDOMINANTEMENTE SEXUAL, ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(59, 'f386d450-b93a-11ee-9787-f761518dc6f0', 'A64X', 'ENFERMEDAD DE TRANSMISION SEXUAL NO ESPECIFICADA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(60, 'f386de40-b93a-11ee-83ed-0b396b61d633', 'A662', 'OTRAS LESIONES PRECOCES DE LA PIEL EN LA FRAMBESIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(61, 'f386e830-b93a-11ee-bc2a-a55447e1d0cc', 'A663', 'HIPERQUERATOSIS DE FRAMBESIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(62, 'f386f250-b93a-11ee-8853-ddae6c4ea8eb', 'A664', 'GOMA Y ULCERAS DE FRAMBESIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(63, 'f386fc30-b93a-11ee-ac97-3393315f71fd', 'A665', 'GANGOSA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(64, 'f3870620-b93a-11ee-945c-c14561955ab7', 'A692', 'ENFERMEDAD DE LYME', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(65, 'f3871000-b93a-11ee-8488-f5baa1342f2e', 'A698', 'OTRAS INFECCIONES ESPECIFICADAS POR ESPIROQUETAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(66, 'f3871a20-b93a-11ee-8bb8-6d47b1f261c2', 'A699,\"INFECCION POR ESPIROQUETA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(67, 'f38724c0-b93a-11ee-9727-715f9433c486', 'A719,\"TRACOMA, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(68, 'f3872e60-b93a-11ee-94a8-2f47e09e90aa', 'A748', 'OTRAS ENFERMEDADES POR CLAMIDIAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(69, 'f38738b0-b93a-11ee-afc2-3f759132485a', 'A749,\"INFECCION POR CLAMIDIAS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(70, 'f38742b0-b93a-11ee-aa0a-29a0e32d7df5', 'B000', 'ECZEMA HERPETICO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(71, 'f3874c90-b93a-11ee-8708-172ebae936b8', 'B001', 'DERMATITIS VESICULAR HERPETICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(72, 'f38756f0-b93a-11ee-968f-910098b61c84', 'B002', 'GINGIVOESTOMATITIS Y FARINGOAMIGDALITIS HERPETICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(73, 'f38760d0-b93a-11ee-b96b-ab8ffbbd147d', 'B005', 'OCULOPATIA HERPETICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(74, 'f3876b10-b93a-11ee-b276-bbaf8f526799', 'B007', 'ENFERMEDAD HERPETICA DISEMINADA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(75, 'f3877550-b93a-11ee-a194-8533e05e7b32', 'B008', 'OTRAS FORMAS DE INFECCIONES HERPETICAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(76, 'f3877f40-b93a-11ee-9ea3-599d6e9b51f4', 'B009,\"INFECCION DEBIDA A EL VIRUS DEL HERPES, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(77, 'f3878960-b93a-11ee-beb8-3d4ad05fb67a', 'B018', 'VARICELA CON OTRAS COMPLICACIONES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(78, 'f38793b0-b93a-11ee-9f55-fb3d2f24ec84', 'B019', 'VARICELA SIN COMPLICACIONES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(79, 'f3879d90-b93a-11ee-9b2a-a394408456dc', 'B022', 'HERPES ZOSTER CON OTROS COMPROMISOS DEL SISTEMA NERVIOSO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(80, 'f387a790-b93a-11ee-973d-0554e719672a', 'B023', 'HERPES ZOSTER OCULAR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(81, 'f387b190-b93a-11ee-99d5-db1ad031424f', 'B027', 'HERPES ZOSTER DISEMINADO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(82, 'f387bc90-b93a-11ee-8c3e-6148928d1954', 'B028', 'HERPES ZOSTER CON OTRAS COMPLICACIONES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(83, 'f387c740-b93a-11ee-a7a7-7b3bffe26431', 'B029', 'HERPES ZOSTER SIN COMPLICACIONES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(84, 'f387d150-b93a-11ee-abae-71de31d71dd7', 'B03X', 'VIRUELA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(85, 'f387db80-b93a-11ee-916d-71a702e6a112', 'B04X', 'VIRUELA DE LOS MONOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(86, 'f387e580-b93a-11ee-bcda-75661c3ccf65', 'B059', 'SARAMPION SIN COMPLICACIONES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(87, 'f387ef50-b93a-11ee-9eae-1de79770d128', 'B060', 'RUBEOLA CON COMPLICACIONES NEUROLOGICAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(88, 'f387f950-b93a-11ee-8a00-21f912dc4d72', 'B068', 'RUBEOLA CON OTRAS COMPLICACIONES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(89, 'f38803f0-b93a-11ee-8a75-b73857b819a9', 'B069', 'RUBEOLA SIN COMPLICACIONES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(90, 'f3880e60-b93a-11ee-a4b1-73962121bd60', 'B07X', 'VERRUGAS VIRICAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(91, 'f38819f0-b93a-11ee-a2c6-5f5eed570e07', 'B080', 'OTRAS INFECCIONES DEBIDAS A ORTOPOXVIRUS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(92, 'f3882530-b93a-11ee-b011-cbf847230dc2', 'B081', 'MOLUSCO CONTAGIOSO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(93, 'f3882fd0-b93a-11ee-8284-3d5c62a2addc', 'B082', 'EXANTEMA SUBITO [SEXTA ENFERMEDAD]', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(94, 'f38839d0-b93a-11ee-b962-a30f258c1e2e', 'B083', 'ERITEMA INFECCIOSO [QUINTA ENFERMEDAD]', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(95, 'f3884440-b93a-11ee-a397-7771c1542166', 'B084', 'ESTOMATITIS VESICULAR ENTEROVIRAL CON EXANTEMA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(96, 'f3884e80-b93a-11ee-a2e3-65ac2070e261', 'B088,\"OTRAS INFECCIONES VIRALES ESPECIFICADAS, CARACTERIZADAS POR LESIONES DE LA PIEL Y DE LAS MEMBRANAS MUCOSAS\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(97, 'f38858f0-b93a-11ee-93fc-d1b31d40cda0', 'B09X,\"INFECCION VIRAL NO ESPECIFICADA, CARACTERIZADA POR LESIONES DE LA PIEL Y DE LAS MEMBRANAS MUCOSAS\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(98, 'f3886300-b93a-11ee-9908-9f9c7cf0be35', 'B150,\"HEPATITIS AGUDA TIPO A, SIN COMA HEPATICO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(99, 'f3886d80-b93a-11ee-a4f0-bbc79bc500a5', 'B159,\"HEPATITIS AGUDA TIPO A, CON COMA HEPATICO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(100, 'f3887790-b93a-11ee-b9e4-19d6118abb87', 'B160,\"HEPATITIS AGUDA TIPO B, CON AGENTE DELTA (COINFECCION). CON COMA HEPATICO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(101, 'f3888220-b93a-11ee-a4e9-7dab86e3c9cd', 'B161,\"HEPATITIS AGUDA TIPO B, CON AGENTE DELTA (COINFECCION), SIN COMA HEPATICO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(102, 'f3888c40-b93a-11ee-be0f-13440c16283e', 'B162,\"HEPATITIS AGUDA TIPO B, SIN AGENTE DELTA, CON COMA HEPATICO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(103, 'f3889680-b93a-11ee-80a2-bb585cfbea14', 'B169,\"HEPATITIS AGUDA TIPO B, SIN AGENTE DELTA Y SIN COMA HEPATICO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(104, 'f388a0c0-b93a-11ee-baea-0d2c0c531eab', 'B170', 'INFECCION (SUPERINFECCION) AGUDA POR AGENTE DELTA EN EL PORTADOR DE HEPATITIS B', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(105, 'f388aaa0-b93a-11ee-a659-51e53538b02d', 'B171', 'HEPATITIS AGUDA TIPO C', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(106, 'f388b450-b93a-11ee-819c-0bd0c16c98e9', 'B172', 'HEPATITIS AGUDA TIPO E', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(107, 'f388be00-b93a-11ee-be10-c5fca46b36f4', 'B178', 'OTRAS HEPATITIS VIRALES AGUDAS ESPECIFICADAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(108, 'f388c850-b93a-11ee-bb7b-e580f227d999', 'B180,\"HEPATITIS VIRAL TIPO B CRONICA, CON AGENTE DELTA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(109, 'f388d250-b93a-11ee-8eb4-59ee38552a3a', 'B181,\"HEPATITIS VIRAL TIPO B CRONICA, SIN AGENTE DELTA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(110, 'f388dc40-b93a-11ee-adbc-b9adaa5d242e', 'B182', 'HEPATITIS VIRAL TIPO C CRONICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(111, 'f388e610-b93a-11ee-bbfa-e16135b27825', 'B188', 'OTRAS HEPATITIS VIRALES CRONICAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(112, 'f388f080-b93a-11ee-b036-a573c6d44ff4', 'B189,\"HEPATITIS VIRAL CRONICA, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(113, 'f388fa50-b93a-11ee-b927-8366ee014666', 'B190', 'HEPATITIS VIRAL NO ESPECIFICADA CON COMA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(114, 'f3890440-b93a-11ee-996c-6ff88a7b42ed', 'B199', 'HEPATITIS VIRAL NO ESPECIFICADA SIN COMA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(115, 'f3890e20-b93a-11ee-b628-1ddc94996000', 'B230', 'SINDROME DE INFECCION AGUDA DEBIDA A VIH', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(116, 'f3891850-b93a-11ee-a90f-691c24c22985', 'B238,\"ENFERMEDAD POR VIH, RESULTANTE EN OTRAS AFECCIONES ESPECIFICADAS\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(117, 'f3892200-b93a-11ee-97eb-b9713a42d7aa', 'B24X,\"ENFERMEDAD POR VIRUS DE LA INMUNODEFICIENCIA HUMANA (VIH), SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(118, 'f3892b90-b93a-11ee-8571-7d73b149c2ad', 'B258', 'OTRAS ENFERMEDADES DEBIDAS A VIRUS CITOMEGALICO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(119, 'f3893530-b93a-11ee-8440-15b420eddb82', 'B259,\"ENFERMEDAD POR VIRUS CITOMEGALICO, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(120, 'f3893f40-b93a-11ee-a066-056e6c247fd2', 'B260', 'ORQUITIS POR PAROTIDITIS (N51.1*)', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(121, 'f38948f0-b93a-11ee-b8f8-c9741671e25f', 'B269,\"PAROTIDITIS, SIN COMPLICACIONES\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(122, 'f3895280-b93a-11ee-8e79-2dbac49df051', 'B270', 'MONONUCLEOSIS DEBIDA A HERPES VIRUS GAMMA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(123, 'f3895c00-b93a-11ee-9bed-efc72748b26e', 'B271', 'MONONUCLEOSIS POR CITOMEGALOVIRUS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(124, 'f38965e0-b93a-11ee-a783-8f5e6a799c54', 'B278', 'OTRAS MONONUCLEOSIS INFECCIOSAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(125, 'f3896fa0-b93a-11ee-95bd-29bff18711de', 'B279,\"MONONUCLEOSIS INFECCIOSA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(126, 'f3897b50-b93a-11ee-9531-3b3d48178256', 'B300', 'QUERATOCONJUNTIVITIS DEBIDA A ADENOVIRUS (H19.2*)', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(127, 'f3898600-b93a-11ee-a125-73ee2f9a0d06', 'B301', 'CONJUNTIVITIS DEBIDA A ADENOVIRUS (H13.1*)', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(128, 'f3898fd0-b93a-11ee-b49f-3dd3aea79aee', 'B302', 'FARINGOCONJUNTIVITIS VIRAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(129, 'f3899950-b93a-11ee-9f31-33aeb015c017', 'B303', 'CONJUNTIVITIS EPIDEMICA AGUDA HEMORRAGICA (ENTEROVIRICA) (H13.1*)', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(130, 'f389a2e0-b93a-11ee-9361-ab49775d1b49', 'B308', 'OTRAS CONJUNTIVITIS VIRALES (H13.1*)', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(131, 'f389ac80-b93a-11ee-9358-97fd9a7e461a', 'B309,\"CONJUNTIVITIS VIRAL, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(132, 'f389b6a0-b93a-11ee-89ff-e57f80161098', 'B342,\"INFECCION DEBIDA A CORONAVIRUS, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(133, 'f389c060-b93a-11ee-86f5-1ded4d3033e1', 'B343,\"INFECCION DEBIDA A PARVOVIRUS, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(134, 'f389ca00-b93a-11ee-9a58-ff76eb921792', 'B344,\"INFECCION DEBIDA A PAPOVAVIRUS, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(135, 'f389d3f0-b93a-11ee-bea3-737043d78e2d', 'B348', 'OTRAS INFECCIONES VIRALES DE SITIO NO ESPECIFICADO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(136, 'f389ddf0-b93a-11ee-b055-7fffcdb1747d', 'B349,\"INFECCION VIRAL, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(137, 'f389e790-b93a-11ee-8b35-17f81bfde9c9', 'B350', 'TIÑA DE LA BARBA Y DEL CUERO CABELLUD', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(138, 'f389f110-b93a-11ee-b679-43a136e43059', 'B351', 'TIÑA DE LAS UÑ', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(139, 'f389faa0-b93a-11ee-97f6-590f30bc3f40', 'B352', 'TIÑA DE LA MAN', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(140, 'f38a04a0-b93a-11ee-96cd-a5366daf0579', 'B353', 'TIÑA DEL PIE [TINEA PEDIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(141, 'f38a0e40-b93a-11ee-a7e9-9be842fd640a', 'B354', 'TIÑA DEL CUERPO [TINEA CORPORIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(142, 'f38a17d0-b93a-11ee-9a8e-2ba32b1712d8', 'B355', 'TIÑA IMBRICADA [TINEA IMBRICATA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(143, 'f38a2150-b93a-11ee-a08e-03b5e7927068', 'B356', 'TIÑA INGUINAL [TINEA CRURIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(144, 'f38a2b70-b93a-11ee-b1be-079d6e8389d5', 'B358', 'OTRAS DERMATOFITOSIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(145, 'f38a3540-b93a-11ee-93ae-319edd91a2db', 'B359,\"DERMATOFITOSIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(146, 'f38a3ed0-b93a-11ee-bc63-d30f982c0ca6', 'B360', 'PITIRIASIS VERSICOLOR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(147, 'f38a4860-b93a-11ee-8ec3-d174281fe6e2', 'B361', 'TIÑA NEGR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(148, 'f38a5290-b93a-11ee-9458-655fb5a151da', 'B362', 'PIEDRA BLANCA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(149, 'f38a5c20-b93a-11ee-ae5d-a990ac3560c6', 'B363', 'PIEDRA NEGRA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(150, 'f38a65a0-b93a-11ee-90c1-63b16cdb0ab5', 'B368', 'OTRAS MICOSIS SUPERFICIALES ESPECIFICADAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(151, 'f38a6f50-b93a-11ee-ba4e-8d0776d33dee', 'B369,\"MICOSIS SUPERFICIAL, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(152, 'f38a79e0-b93a-11ee-8d4b-15559630de95', 'B370', 'ESTOMATITIS CANDIDIASICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(153, 'f38a8380-b93a-11ee-a5d3-3b5dd5120543', 'B371', 'CANDIDIASIS PULMONAR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(154, 'f38a8d10-b93a-11ee-8805-47b463ac3c86', 'B372', 'CANDIDIASIS DE LA PIEL Y DE LAS UÑA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(155, 'f38a9690-b93a-11ee-8cfc-b74a0e609897', 'B373', 'CANDIDIASIS DE LA VULVA Y DE LA VAGINA (N77.1*)', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(156, 'f38aa430-b93a-11ee-b914-e7173c49a1b3', 'B374', 'CANDIDIASIS DE OTRAS LOCALIZACIONES UROGENITALES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(157, 'f38ab4b0-b93a-11ee-9d9b-c5b6824fd500', 'B378', 'CANDIDIASIS DE OTROS SITIOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(158, 'f38ac2d0-b93a-11ee-9ccd-59299b475799', 'B379,\"CANDIDIASIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(159, 'f38acd70-b93a-11ee-bda8-8f272c868939', 'B383', 'COCCIDIOIDOMICOSIS CUTANEA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(160, 'f38ad980-b93a-11ee-9056-77f7e5d7769b', 'B388', 'OTRAS FORMAS DE COCCIDIOIDOMICOSIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(161, 'f38ae520-b93a-11ee-8db6-21e5b783bba0', 'B389,\"COCCIDIOIDOMICOSIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(162, 'f38af040-b93a-11ee-841d-411f50a6f7ad', 'B399,\"HISTOPLASMOSIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(163, 'f38afaa0-b93a-11ee-ad52-5d7db52b8cb7', 'B403', 'BLASTOMICOSIS CUTANEA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(164, 'f38b0530-b93a-11ee-8201-e1c600f5a9a2', 'B409,\"BLASTOMICOSIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(165, 'f38b0f90-b93a-11ee-a1a7-111ebb2d9ce3', 'B419,\"PARACOCCIDIOIDOMICOSIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(166, 'f38b19a0-b93a-11ee-a13b-cfbf8c30df57', 'B421', 'ESPOROTRICOSIS LINFOCUTANEA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(167, 'f38b2350-b93a-11ee-9cf9-410630e4d026', 'B427', 'ESPOROTRICOSIS DISEMINADA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(168, 'f38b2de0-b93a-11ee-a39c-8d1da29844db', 'B428', 'OTRAS FORMAS DE ESPOROTRICOSIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(169, 'f38b3880-b93a-11ee-97fb-3d407ee4947f', 'B429,\"ESPOROTRICOSIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(170, 'f38b42e0-b93a-11ee-b929-2f6f2775d668', 'B430', 'CROMOMICOSIS CUTANEA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(171, 'f38b4ce0-b93a-11ee-84af-0d2ac48c9e4f', 'B432', 'ABSCESO Y QUISTE SUBCUTANEO FEOMICOTICO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(172, 'f38b56b0-b93a-11ee-bf46-759784efb8fe', 'B438', 'OTRAS FORMAS DE CROMOMICOSIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(173, 'f38b6100-b93a-11ee-8a70-97f209188acd', 'B439,\"CROMOMICOSIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(174, 'f38b6b10-b93a-11ee-8157-bde0033838fe', 'B447', 'ASPERGILOSIS DISEMINADA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(175, 'f38b74b0-b93a-11ee-9a48-8562a249a735', 'B448', 'OTRAS FORMAS DE ASPERGILOSIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(176, 'f38b7ec0-b93a-11ee-99d9-d7cb00fd07ef', 'B449,\"ASPERGILOSIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(177, 'f38b88e0-b93a-11ee-b7b6-9552d21b5cdd', 'B452', 'CRIPTOCOCOSIS CUTANEA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(178, 'f38b92c0-b93a-11ee-be04-39c722b5c7e7', 'B459,\"CRIPTOCOCOSIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(179, 'f38b9c70-b93a-11ee-a0ac-7f3eaded1432', 'B463', 'MUCORMICOSIS CUTANEA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(180, 'f38ba610-b93a-11ee-b42b-bdcaf0909bce', 'B464', 'MUCORMICOSIS DISEMINADA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(181, 'f38bb030-b93a-11ee-853b-dbb4b318e45e', 'B465,\"MUCORMICOSIS, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(182, 'f38bb9e0-b93a-11ee-bdbe-a56626c3fc30', 'B468', 'OTRAS CIGOMICOSIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(183, 'f38bc3c0-b93a-11ee-b5a7-e313b54af80a', 'B469,\"CIGOMICOSIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(184, 'f38bcd50-b93a-11ee-8037-7f9ddaa0cfd8', 'B470', 'EUMICETOMA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(185, 'f38bd740-b93a-11ee-9dd3-c125c08dd32d', 'B471', 'ACTINOMICETOMA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(186, 'f38be100-b93a-11ee-a028-d7a83658ca2e', 'B479,\"MICETOMA, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(187, 'f38beac0-b93a-11ee-954a-b7cbae6ebe60', 'B480', 'LOBOMICOSIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(188, 'f38bf440-b93a-11ee-b331-1976186dc4ce', 'B481', 'RINOSPORIDIOSIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(189, 'f38bfe40-b93a-11ee-95f1-b1edeaf95327', 'B482', 'ALESQUERIASIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(190, 'f38c07c0-b93a-11ee-b29e-130a4a309778', 'B483', 'GEOTRICOSIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(191, 'f38c1170-b93a-11ee-b072-051a94698f21', 'B484', 'PENICILOSIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(192, 'f38c1b00-b93a-11ee-bf16-438d5f28b291', 'B487', 'MICOSIS OPORTUNISTAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(193, 'f38c26b0-b93a-11ee-bbbe-155d9377b21b', 'B488', 'OTRAS MICOSIS ESPECIFICADAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(194, 'f38c3170-b93a-11ee-a7da-737e7a06bb61', 'B49X,\"MICOSIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(195, 'f38c3bc0-b93a-11ee-90a1-87a81fe6763b', 'B54X', 'PALUDISMO [MALARIA] NO ESPECIFICADO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(196, 'f38c45f0-b93a-11ee-bed1-01e196075ee9', 'B550', 'LEIISHMANIASIS VISCERAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(197, 'f38c5000-b93a-11ee-8008-c735896121c5', 'B551', 'LEISHMANIASIS CUTANEA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(198, 'f38c59e0-b93a-11ee-b3e8-7b95d83f6313', 'B552', 'LEISHMANIASIS MUCOCUTANEA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(199, 'f38c63e0-b93a-11ee-9c4e-b38e9b771bac', 'B559,\"LEISHMANIASIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(200, 'f38c6df0-b93a-11ee-bd61-ed8e831bbf4f', 'B575', 'ENFERMEDAD DE CHAGAS (CRONICA) QUE AFECTA OTROS ORGANOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(201, 'f38c7860-b93a-11ee-9a7e-756e9f277fb9', 'B589,\"TOXOPLASMOSIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(202, 'f38c8290-b93a-11ee-aca6-1511e81843d9', 'B64X,\"ENFERMEDAD DEBIDA A PROTOZOARIOS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(203, 'f38c8c80-b93a-11ee-a1e8-9f0d6aa3ba25', 'B653', 'DERMATITIS POR CERCARIAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(204, 'f38c9660-b93a-11ee-87c1-7f840fc9e206', 'B658', 'OTRAS ESQUISTOSOMIASIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(205, 'f38ca050-b93a-11ee-aa4a-6de3624461a4', 'B659,\"ESQUISTOSOMIASIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(206, 'f38caa60-b93a-11ee-817f-53b92b1d64a4', 'B689,\"TENIASIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(207, 'f38cb420-b93a-11ee-a938-2f6acc3d5ddd', 'B73X', 'ONCOCERCOSIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(208, 'f38cbe10-b93a-11ee-89d8-c97fe8101679', 'B748', 'OTRAS FILARIASIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(209, 'f38cc7e0-b93a-11ee-973d-e3511b37fcfc', 'B749,\"FILARIASIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(210, 'f38cd1c0-b93a-11ee-8d54-dfa689f1e5cd', 'B779,\"ASCARIASIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(211, 'f38cdb80-b93a-11ee-81ec-1f4764a182f4', 'B781', 'ESTRONGILOIDIASIS CUTANEA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(212, 'f38ce5c0-b93a-11ee-8c60-af36a48d96ee', 'B789,\"ESTRONGILOIDIASIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(213, 'f38cef70-b93a-11ee-8d46-29f65e0540ad', 'B79X', 'TRICURIASIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(214, 'f38cf9c0-b93a-11ee-b3cf-4fc23daeda41', 'B80X', 'ENTEROBIASIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(215, 'f38d0360-b93a-11ee-a190-f585792cf448', 'B810', 'ANISAQUIASIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(216, 'f38d0d80-b93a-11ee-8d36-79ec077308e1', 'B811', 'CAPILARIASIS INTESTINAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(217, 'f38d1740-b93a-11ee-8ac4-43bb2e375aa8', 'B831', 'GNATOSTOMIASIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(218, 'f38d2100-b93a-11ee-9db9-43b616a62ad0', 'B839,\"HELMINTIASIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(219, 'f38d2b20-b93a-11ee-9f2b-b14a618a0872', 'B850', 'PEDICULOSIS DEBIDA A PEDICULUS HUMANUS CAPITIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(220, 'f38d3550-b93a-11ee-b80c-2380a31c0870', 'B851', 'PEDICULOSIS DEBIDA A PEDICULUS HUMANUS CORPORIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(221, 'f38d3f60-b93a-11ee-b3df-7f37400f4e21', 'B852,\"PEDICULOSIS, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(222, 'f38d4920-b93a-11ee-b2b5-09d5611b3b25', 'B853', 'PHTHIRIASIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(223, 'f38d52d0-b93a-11ee-9d75-8baa60372dca', 'B854', 'PEDICULOSIS Y PHTHIRIASIS MIXTAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(224, 'f38d5d40-b93a-11ee-b728-6b35970e83d1', 'B86X', 'ESCABIOSIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(225, 'f38d6720-b93a-11ee-a328-23d5bf7381fa', 'B870', 'MIASIS CUTANEA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(226, 'f38d70c0-b93a-11ee-a690-7321bdbf106e', 'B871', 'MIASIS EN HERIDAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(227, 'f38d7ae0-b93a-11ee-8890-9b1eece51dda', 'B878', 'MIASIS DE OTROS SITIOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(228, 'f38d8510-b93a-11ee-9ba2-531229d2f131', 'B879,\"MIASIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(229, 'f38d8ef0-b93a-11ee-9a28-d3bba565053e', 'B880', 'OTRAS ACARIASIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(230, 'f38d98a0-b93a-11ee-b624-d5e73c19f6b4', 'B881', 'TUNGIASIS [INFECCION DEBIDA A PULGA DE ARENA]', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(231, 'f38da240-b93a-11ee-aca9-fdbb14d54afc', 'B888', 'OTRAS INFESTACIONES ESPECIFICAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(232, 'f38dac60-b93a-11ee-b469-1b52ea31d2af', 'B889,\"INFESTACION, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(233, 'f38db680-b93a-11ee-a8d9-6f2e528f8aff', 'B89X,\"ENFERMEDAD PARASITARIA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(234, 'f38dc0d0-b93a-11ee-a6b9-af459d7bd28c', 'B92X', 'SECUELAS DE LEPRA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(235, 'f38dcc30-b93a-11ee-a7d7-9f6ed4a3402f', 'B940', 'SECUELAS DE TRACOMA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(236, 'f38dd6e0-b93a-11ee-9729-d7f8f42c5d19', 'B955', 'ESTREPTOCOCO NO ESPECIFICADO COMO CAUSA DE ENFERMEDADES CLASIFICADAS EN OTROS CAPITULOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(237, 'f38de180-b93a-11ee-bc17-eb61c15a76a3', 'B956', 'STAPHYLOCOCCUS AUREUS COMO CAUSA DE ENFERMEDADES CLASIFICADAS EN OTROS CAPITULOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(238, 'f38deb90-b93a-11ee-8ae8-d77d31b50ed1', 'B972', 'CORONAVIRUS COMO CAUSA DE ENFERMEDADES CLASIFICADAS EN OTROS CAPITULOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(239, 'f38df620-b93a-11ee-9f38-1dcf15f9d6ea', 'C009,\"TUMOR MALIGNO DEL LABIO, PARTE NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(240, 'f38e0020-b93a-11ee-bd8a-cf4e2ad410d3', 'C01X', 'TUMOR MALIGNO DE LA BASE DE LA LENGUA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(241, 'f38e0a60-b93a-11ee-93f4-616fd60bbad0', 'C020', 'TUMOR MALIGNO DE LA CARA DORSAL DE LA LENGUA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(242, 'f38e15b0-b93a-11ee-91f0-db3a5dbf7746', 'C021', 'TUMOR MALIGNO DEL BORDE DE LA LENGUA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(243, 'f38e22a0-b93a-11ee-b48c-5f20fcc93f8e', 'C022', 'TUMOR MALIGNO DE LA CARA VENTRAL DE LA LENGUA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(244, 'f38e2e40-b93a-11ee-a5b0-4fbf76d98b0c', 'C023,\"TUMOR MALIGNO DE LOS DOS TERCIOS ANTERIORES DE LA LENGUA, PARTE NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(245, 'f38e38e0-b93a-11ee-a105-c1f77334afa4', 'C039,\"TUMOR MALIGNO DE LA ENCIA, PARTE NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(246, 'f38e4330-b93a-11ee-a35d-c131bc530c56', 'C049,\"TUMOR MALIGNO DEL PISO DE LA BOCA, PARTE NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(247, 'f38e4d00-b93a-11ee-bf40-b3fca7dae4f9', 'C050', 'TUMOR MALIGNO DEL PALADAR DURO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(248, 'f38e56e0-b93a-11ee-a80d-0745300c9fa4', 'C051', 'TUMOR MALIGNO DEL PALADAR BLANDO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(249, 'f38e6060-b93a-11ee-96df-3566d1c730cb', 'C052', 'TUMOR MALIGNO DE LA UVULA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(250, 'f38e6a30-b93a-11ee-9fe0-9df188417c48', 'C058', 'LESION DE SITIOS CONTIGUOS DEL PALADAR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(251, 'f38e73f0-b93a-11ee-90b4-878680c2f549', 'C059,\"TUMOR MALIGNO DEL PALADAR, PARTE NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(252, 'f38e7da0-b93a-11ee-a414-69e9339e6dd8', 'C060', 'TUMOR MALIGNO DE LA MUCOSA DE LA MEJILLA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(253, 'f38e8720-b93a-11ee-98f8-ef646e04cf07', 'C068', 'LESION DE SITIOS CONTIGUOS DE OTRAS PARTES Y DE LAS NO ESPECIFICADAS DE LA BOCA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(254, 'f38e92a0-b93a-11ee-ad67-0b1e8238f8c0', 'C430', 'MELANOMA MALIGNO DEL LABIO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(255, 'f38e9ce0-b93a-11ee-adf9-d59680c3c3b7', 'C431,\"MELANOMA MALIGNO DEL PARPADO, INCLUIDA LA COMISURA PALPEBRAL\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(256, 'f38ea6b0-b93a-11ee-bca6-0de72a106d74', 'C432', 'MELANOMA MALIGNO DE LA OREJA Y DEL CONDUCTO AUDITIVO EXTERNO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(257, 'f38eb050-b93a-11ee-889b-736aaf146438', 'C439,\"MELANOMA MALIGNO DE PIEL, SITIO NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(258, 'f38ebb80-b93a-11ee-9440-e7a99cd665d0', 'C440', 'TUMOR MALIGNO DE LA PIEL DEL LABIO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(259, 'f38ec550-b93a-11ee-867b-fff1a39d2912', 'C443', 'TUMOR MALIGNO DE LA PIEL DE OTRAS PARTES Y DE LAS NO ESPECIFICADAS DE LA CARA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(260, 'f38ecf20-b93a-11ee-9eb4-393c1d5901bd', 'C449,\"TUMOR MALIGNO DE LA PIEL, SITIO NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(261, 'f38ed8a0-b93a-11ee-8d3d-e3731a0ed6a9', 'C460', 'SARCOMA DE KAPOSI DE LA PIEL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(262, 'f38ee2a0-b93a-11ee-b1b4-cf1426bce6f7', 'C461', 'SARCOMA DE KAPOSI DEL TEJIDO BLANDO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(263, 'f38eec40-b93a-11ee-800c-234663964827', 'C469,\"SARCOMA DE KAPOSI, DE SITIO NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(264, 'f38ef5e0-b93a-11ee-8a32-adb6b0a29b5c', 'C80X', 'TUMOR MALIGNO DE SITIOS NO ESPECIFICADOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(265, 'f38eff70-b93a-11ee-988c-eb9c6fb26b04', 'C819,\"ENFERMEDAD DE HODGKIN, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(266, 'f38f0980-b93a-11ee-b482-2f2526467530', 'C827', 'OTROS TIPOS ESPECIFICADOS DE LINFOMA NO HODGKIN FOLICULAR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(267, 'f38f1320-b93a-11ee-85bc-23e2226a898d', 'C829,\"LINFOMA NO HODGKIN FOLICULAR, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(268, 'f38f1d20-b93a-11ee-8327-9d8b062c9c18', 'C839,\"LINFOMA NO HODGKIN DIFUSO, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(269, 'f38f26b0-b93a-11ee-be0c-399299a78e7f', 'C840', 'MICOSIS FUNGOIDE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(270, 'f38f30b0-b93a-11ee-8c13-55cbfc08eb87', 'C841', 'ENFERMEDAD DE SEZARY', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(271, 'f38f3a60-b93a-11ee-97ae-139af7449a8d', 'C845', 'OTROS LINFOMAS DE CELULAS Y LOS NO ESPECIFICADOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(272, 'f38f4400-b93a-11ee-98ea-ab40746d1ce6', 'C850', 'LINFOSARCOMA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(273, 'f38f4db0-b93a-11ee-8f89-c3d4ca2ecae0', 'C851,\"LINFOMA DE CELULAS B, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(274, 'f38f5810-b93a-11ee-8b24-eb5b71b86d4e', 'C857', 'OTROS TIPOS ESPECIFICADOS DE LINFOMA NO HODGKIN', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(275, 'f38f61f0-b93a-11ee-b560-1defe235eaf9', 'C859,\"LINFOMA NO HODGKIN, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(276, 'f38f6b80-b93a-11ee-aa73-aff3a56f73f7', 'C900', 'MIELOMA MULTIPLE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(277, 'f38f7560-b93a-11ee-99fb-e5912f26180b', 'C901', 'LEUCEMIA DE CELULAS PLASMATICAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(278, 'f38f7f40-b93a-11ee-a893-d976951ae5a7', 'C902,\"PLASMOCITOMA, EXTRAMEDULAR\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(279, 'f38f8920-b93a-11ee-85cf-53f47197c5cc', 'C910', 'LEUCEMIA LINFOBLASTICA AGUDA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(280, 'f38f92c0-b93a-11ee-a926-f17b873e6115', 'C911', 'LEUCEMIA LINFOCITICA CRONICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(281, 'f38f9f20-b93a-11ee-8659-e5a8e268824b', 'C912', 'LEUCEMIA LINFOCITICA SUBAGUDA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(282, 'f38fb270-b93a-11ee-bf06-2b0f3163bbb3', 'C913', 'LEUCEMIA PROLINFOCITICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(283, 'f38fc170-b93a-11ee-93fc-c7bf2f866c38', 'C914', 'LEUCEMIA DE CELULAS VELLOSAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(284, 'f38fce60-b93a-11ee-9545-419e46b6faa0', 'C915', 'LEUCEMIA DE CELULAS T ADULTAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(285, 'f38fdb60-b93a-11ee-8065-cf710e1aa109', 'C917', 'OTRAS LEUCEMIAS LINFOIDES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(286, 'f38fe680-b93a-11ee-8525-397c980f923b', 'C919,\"LEUCEMIA LINFOIDE, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(287, 'f38ff120-b93a-11ee-91fd-63cd52473cfd', 'C920', 'LEUCEMIA MIELOIDE AGUDA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(288, 'f38ffb50-b93a-11ee-b0d7-61d5ef731c01', 'C921', 'LEUCEMIA MIELOIDE CRONICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(289, 'f3900640-b93a-11ee-a194-5dc4ca1d771f', 'C922', 'LEUCEMIA MIELOIDE SUBAGUDA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(290, 'f3901260-b93a-11ee-9ab5-d9b7a200bdae', 'C923', 'SARCOMA MIELOIDE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(291, 'f3901ec0-b93a-11ee-875b-07bd1bb34a8a', 'C927', 'OTRAS LEUCEMIAS MIELOIDES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(292, 'f3902ac0-b93a-11ee-b1fe-3715108eb01b', 'C929,\"LEUCEMIA MIELOIDE, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(293, 'f3903680-b93a-11ee-967b-8d104d30c11b', 'C930', 'LEUCEMIA MONOCITICA AGUDA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(294, 'f39042f0-b93a-11ee-882e-6b4fdd74dec5', 'C931', 'LEUCEMIA MONOCITICA CRONICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(295, 'f3904ee0-b93a-11ee-a454-29c0335b00db', 'C932', 'LEUCEMIA MONOCITICA SUBAGUDA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(296, 'f3905aa0-b93a-11ee-8a35-9302eeadaec8', 'C937', 'OTRAS LEUCEMIAS MONOCITICAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(297, 'f39066d0-b93a-11ee-a9ab-3967875f6f7f', 'C939,\"LEUCEMIA MONOCITICA, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(298, 'f39072d0-b93a-11ee-aa94-712d5637590b', 'C959,\"LEUCEMIA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(299, 'f3907ee0-b93a-11ee-9132-fd82595be289', 'C967,\"OTROS TUMORES MALIGNOS ESPECIFICADOS DEL TEJIDO LINFATICO, HEMATOPOYETICO Y TEJIDOS AFINES\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(300, 'f3908b00-b93a-11ee-8f65-67b2e81ff902', 'C969,\"TUMOR MALIGNO DEL TEJIDO LINFATICO, HEMATOPOYETICO Y TEJIDOS AFINES, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(301, 'f3909710-b93a-11ee-b81d-3b96d34dd306', 'C97X', 'TUMORES MALIGNO (PRIMARIOS) DE SITIOS MULTIPLES INDEPENDIENTES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(302, 'f390a2c0-b93a-11ee-9434-c1af70c5ac9c', 'D030', 'MELANOMA IN SITU DEL LABIO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(303, 'f390ae50-b93a-11ee-9e5d-bd18afdb24aa', 'D031', 'MELANOMA IN SITU DEL PARPADO Y DE LA COMISURA PALPEBRAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(304, 'f390ba20-b93a-11ee-843a-8906b3c71bad', 'D032', 'MELANOMA IN SITU DE LA OREJA Y DEL CONDUCTO AUDITIVO EXTERNO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(305, 'f390c620-b93a-11ee-a6d5-3f389bd48233', 'D033', 'MELANOMA IN SITU DE OTRAS PARTES Y DE LAS NO ESPECIFICADAS DE LA CARA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(306, 'f390d260-b93a-11ee-a43d-a9b25cab5be1', 'D034', 'MELANOMA IN SITU DEL CUERO CABELLUDO Y DEL CUELLO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(307, 'f390dda0-b93a-11ee-981b-e767c7ef06e0', 'D035', 'MELANOMA IN SITU DEL TRONCO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(308, 'f390e850-b93a-11ee-ba53-c7f838f6f22d', 'D036,\"MELANOMA IN SITU DEL MIEMBRO SUPERIOR, INCLUIDO EL HOMBRO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(309, 'f390f2a0-b93a-11ee-bff9-29ce419c2b6a', 'D037,\"MELANOMA IN SITU DEL MIEMBRO INFERIOR, INCLUIDA LA CADERA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(310, 'f390fce0-b93a-11ee-8b09-f927454d19ed', 'D038', 'MELANOMA IN SITU DE OTROS SITIOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(311, 'f3910b10-b93a-11ee-b84d-3fa8ec2e9306', 'D039,\"MELANOMA IN SITU, SITIO NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(312, 'f39118c0-b93a-11ee-9cae-993611403e98', 'D040', 'CARCINOMA IN SITU DE LA PIEL DEL LABIO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(313, 'f3912580-b93a-11ee-9d39-0dd4f012914e', 'D041', 'CARCINOMA IN SITU DE LA PIEL DEL PARPADO Y DE LA COMISURA PALPEBRAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(314, 'f3913070-b93a-11ee-a17b-6fd0924fb045', 'D042', 'CARCINOMA IN SITU DE LA PIEL DE LA OREJA Y DEL CONDUCTO AUDITIVO EXTERNO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(315, 'f3913ad0-b93a-11ee-b307-4b389e51524a', 'D043', 'CARCINOMA IN SITU DE LA PIEL DE OTRAS PARTES Y DE LAS NO ESPECIFICADAS DE LA CARA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(316, 'f39144e0-b93a-11ee-96e5-75d4d224ad62', 'D044', 'CARCINOMA IN SITU DE LA PIEL DEL CUERO CABELLUDO Y CUELLO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(317, 'f3914f00-b93a-11ee-b716-5dcf87450012', 'D045', 'CARCINOMA IN SITU DE LA PIEL DEL TRONCO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(318, 'f3915910-b93a-11ee-bb4e-81ba85ad14e8', 'D046,\"CARCINOMA IN SITU DE LA PIEL DEL MIEMBRO SUPERIOR, INCLUIDO EL HOMBRO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(319, 'f3916320-b93a-11ee-b08a-37038ad41c6d', 'D047,\"CARCINOMA IN SITU DE LA PIEL DEL MIEMBRO INFERIOR, INCLUIDA LA CADERA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(320, 'f3916d40-b93a-11ee-81fe-2f960753bc90', 'D048', 'CARCINOMA IN SITU DE LA PIEL DE OTROS SITIOS ESPECIFICADOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(321, 'f3917760-b93a-11ee-8222-cfe853ff928c', 'D049,\"CARCINOMA IN SITU DE LA PIEL, SITIO NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(322, 'f3918140-b93a-11ee-a2e3-b3f22a480b02', 'D050', 'CARCINOMA IN SITU LOBULAR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(323, 'f3918b20-b93a-11ee-a305-5de0e409174c', 'D051', 'CARCINOMA IN SITU INTRACANALICULAR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(324, 'f3919840-b93a-11ee-9ed5-2ffc0e359c23', 'D057', 'OTROS CARCINOMAS IN SITU DE LA MAMA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(325, 'f391a6b0-b93a-11ee-b7a2-b911a8957ba8', 'D073', 'CARCINOMA IN SITU DE OTROS SITIOS DE ORGANOS GENITALES FEMENINOS Y DE LOS NO ESPECIFICADOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(326, 'f391b460-b93a-11ee-9b24-87f9ec8e7c88', 'D074', 'CARCINOMA IN SITU DEL PENE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(327, 'f391bef0-b93a-11ee-b9b7-e383b4f6f67b', 'D099,\"CARCINOMA IN SITU, SITIO NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(328, 'f391c980-b93a-11ee-bbc0-a72737cf3158', 'D100', 'TUMOR BENIGNO DEL LABIO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(329, 'f391d570-b93a-11ee-b3d9-5710d459e15c', 'D101', 'TUMOR BENIGNO DE LA LENGUA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(330, 'f391e210-b93a-11ee-b2db-9b08348266c5', 'D102', 'TUMOR BENIGNO DEL PISO DE LA BOCA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(331, 'f391ec30-b93a-11ee-9ff0-799a61741398', 'D103', 'TUMOR BENIGNO DE OTRAS PARTES Y DE LAS NO ESPECIFICADAS DE LA BOCA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(332, 'f391f600-b93a-11ee-86a5-05544dcd15c8', 'D106', 'TUMOR BENIGNO DE LA NASOFARINGE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54');
INSERT INTO `diagnoses` (`id`, `uuid`, `code`, `name`, `status`, `created_at`, `updated_at`) VALUES
(333, 'f391ff90-b93a-11ee-80f1-799a5d1a1488', 'D117', 'TUMOR BENIGNO DE OTRAS GLANDULAS SALIVALES MAYORES ESPECIFICADAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(334, 'f3920980-b93a-11ee-8f8d-b937094446a8', 'D119,\"TUMOR BENIGNO DE LA GLANDULA SALIVAL MAYOR, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(335, 'f3921390-b93a-11ee-ad5d-57bf89a7f7d2', 'D169,\"TUMOR BENIGNO DEL HUESOS Y DEL CARTILAGO ARTICULAR, SITIO NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(336, 'f3921d60-b93a-11ee-b6ca-033a03b85eb5', 'D170,\"TUMOR BENIGNO LIPOMATOSO DE PIEL Y DE TEJIDO SUBCUTANEO DE CABEZA, CARA Y CUELLO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(337, 'f39226d0-b93a-11ee-83ac-bd220f2bf183', 'D171', 'TUMOR BENIGNO LIPOMATOSO DE PIEL Y DE TEJIDO SUBCUTANEO DEL TRONCO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(338, 'f39230a0-b93a-11ee-85dc-f18cbb5e12a4', 'D172', 'TUMOR BENIGNO LIPOMATOSO DE PIEL Y DE TEJIDO SUBCUTANEO DE MIEMBROS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(339, 'f3923d20-b93a-11ee-9bf7-392eaa91c234', 'D173', 'TUMOR BENIGNO LIPOMATOSO DE PIEL Y DE TEJIDO SUBCUTANEO DE OTROS SITIOS Y DE LOS NO ESPECIFICADOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(340, 'f39247a0-b93a-11ee-b1d8-c3b4290bdedd', 'D179,\"TUMOR BENIGNO LIPOMATOSO, DE SITIO NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(341, 'f3925160-b93a-11ee-b00e-d9b9220f17b8', 'D180,\"HEMANGIOMA, DE CUALQUIER SITIO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(342, 'f3925b40-b93a-11ee-b9a4-4dda18c9d2b5', 'D181,\"LINFANGIOMA, DE CUALQUIER SITIO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(343, 'f3926570-b93a-11ee-96b9-a1a198187ac4', 'D219,\"TUMOR BENIGNO DEL TEJIDO CUNJUNTIVO Y DE OTROS TEJIDOS BLANDOS, DE SITIO NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(344, 'f3926f10-b93a-11ee-9874-d11eca1a5115', 'D220', 'NEVO MELANOCITICO DEL LABIO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(345, 'f39278b0-b93a-11ee-8a19-09c696632217', 'D221,\"NEVO MELANOCITICO DEL PARPADO, INCLUIDA LA COMISURA PALPEBRAL\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(346, 'f3928230-b93a-11ee-940a-33b7a49c6a82', 'D222', 'NEVO MELANOCITICO DE LA OREJA Y DEL CONDUCTO AUDITIVO EXTERNO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(347, 'f3928c30-b93a-11ee-a2bd-67224cbc7fb8', 'D223', 'NEVO MELANOCITICO DE OTRAS PARTES DE LAS NO ESPECIFICADAS DE LA CARA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(348, 'f39295b0-b93a-11ee-b076-237a83cb6f85', 'D224', 'NEVO MELANOCITICO DEL CUERO CABELLUDO Y DEL CUELLO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(349, 'f3929f30-b93a-11ee-befc-e9cac3a11fed', 'D225', 'NEVO MELANOCITICO DEL TRONCO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(350, 'f392a8d0-b93a-11ee-9c6f-4b156fa060fc', 'D226,\"NEVO MELANOCITICO DEL MIEMBRO SUPERIOR, INCLUIDO EL HOMBRO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(351, 'f392b340-b93a-11ee-bd27-f56ce3b68dd1', 'D227,\"NEVO MELANOCITICO DEL MIEMBRO INFERIOR, INCLUIDA LA CADERA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(352, 'f392bce0-b93a-11ee-9f8f-91a65f9c4a9b', 'D229,\"NEVO MELANOCITICO, SITIO NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(353, 'f392c660-b93a-11ee-8c68-171acd206cc9', 'D230', 'TUMOR BENIGNO DE LA PIEL DEL LABIO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(354, 'f392cfe0-b93a-11ee-bf00-c150c87ec7b0', 'D231,\"TUMOR BENIGNO DE LA PIEL DEL PARPADO, INCLUIDA LA COMISURA PALPEBRAL\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(355, 'f392d9c0-b93a-11ee-bceb-9d86a508970e', 'D232', 'TUMOR BENIGNO DE LA PIEL DE LA OREJA Y DEL CONDUCTO AUDITIVO EXTERNO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(356, 'f392e340-b93a-11ee-946b-59ee2167711c', 'D233', 'TUMOR BENIGNO DE LA PIEL DE OTRAS PARTES Y DE LAS NO ESPECIFICADAS DE LA CARA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(357, 'f392ecc0-b93a-11ee-9852-f37cc028135d', 'D234', 'TUMOR BENIGNO DE LA PIEL DEL CUERO CABELLUDO Y DEL CUELLO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(358, 'f392f610-b93a-11ee-94c3-eb490bf550be', 'D235', 'TUMOR BENIGNO DE LA PIEL DEL TRONCO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(359, 'f3930040-b93a-11ee-a826-5dda4ad13839', 'D236,\"TUMOR BENIGNO DE LA PIEL DEL MIEMBRO SUPERIOR, INCLUIDO EL HOMBRO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(360, 'f3930a00-b93a-11ee-a70c-2f20dd400379', 'D237,\"TUMOR BENIGNO DE LA PIEL DEL MIEMBRO INFERIOR, INCLUIDA LA CADERA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(361, 'f3931390-b93a-11ee-8d5e-795949c70c99', 'D239,\"TUMOR BENIGNO DE LA PIEL, SITIO NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(362, 'f3931d00-b93a-11ee-a759-99a6995d9f19', 'D24X', 'TUMOR BENIGNO DE LA MAMA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(363, 'f39326e0-b93a-11ee-b038-3b319fb49e4d', 'D467', 'OTROS SINDROMES MIELODISPLASICOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(364, 'f3933090-b93a-11ee-adaa-bd117809eea1', 'D469,\"SINDROME MIELODISPLASICO, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(365, 'f3933a00-b93a-11ee-8c3c-b72e488a80cc', 'D470', 'TUMOR DE COMPORTAMIENTO INCIERTO O DESCONOCIDO DE LOS MASTOCITOS E HISTIOCITOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(366, 'f3934370-b93a-11ee-b119-83dea2192978', 'D471', 'ENFERMEDAD MIELOPROLIFERATIVA CRONICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(367, 'f3934d40-b93a-11ee-8fa1-a539ac15a2da', 'D472', 'GAMMOPATIA MONOCLONAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(368, 'f39356c0-b93a-11ee-9b4f-11f458879890', 'D473', 'TROMBOCITOPENIA (HEMORRAGICA) ESENCIAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(369, 'f3936010-b93a-11ee-ba85-fbe2aebdf99b', 'D500', 'ANEMIA POR DEFICIENCIA DE HIERRO SECUNDARIA A PERDIDA DE SANGRE (CRONICA)', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(370, 'f3936970-b93a-11ee-be6d-251be75554c0', 'D508', 'OTRAS ANEMIAS POR DEFICIENCIA DE HIERRO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(371, 'f3937370-b93a-11ee-b14e-5135e34890b3', 'D509', 'ANEMIA POR DEFICIENCIA DE HIERRO SIN OTRA ESPECIFICACION', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(372, 'f3937d10-b93a-11ee-ba30-6f468e1d44b0', 'D510', 'ANEMIA POR DEFICIENCIA DE VITAMINA B12 DEBIDA A DEFICIENCIA DEL FACTOR INTRINSECO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(373, 'f3938670-b93a-11ee-a7ca-9f9d90054a50', 'D511', 'ANEMIA POR DEFICIENCIA DE VITAMINA B12 DEBIDA A MALA ABSORCION SELECTIVA DE VITAMINA B12 CON PROTEINURIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(374, 'f3938fe0-b93a-11ee-b9e8-d56915b840ab', 'D512', 'DEFICIENCIA DE TRASCOBALAMINA II', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(375, 'f39399a0-b93a-11ee-a4c3-bfbd6e47f15e', 'D513', 'OTRAS ANEMIAS POR DEFICIENCIA DIETETICA DE VITAMINA B12', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(376, 'f393a380-b93a-11ee-814d-e93cf98ffd6d', 'D518', 'OTRAS ANEMIAS POR DEFICIENCIA DE VITAMINA B12', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(377, 'f393ad10-b93a-11ee-87dc-9f6c1861333f', 'D519,\"ANEMIA POR DEFICIENCIA DE VITAMINA B12, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(378, 'f393b680-b93a-11ee-8a0f-67af8d20c02e', 'D520', 'ANEMIA POR DEFICIENCIA DIETETICA DE FOLATOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(379, 'f393c010-b93a-11ee-9c64-c72079a21f0b', 'D521', 'ANEMIA POR DEFICIENCIA DE FOLATOS INDUCIDA POR DROGAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(380, 'f393c980-b93a-11ee-9113-99df3fabc2d2', 'D528', 'OTRAS ANEMIAS POR DEFICIENCIA DE FOLATOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(381, 'f393d310-b93a-11ee-a5ba-f999f6cbcb77', 'D529,\"ANEMIA POR DEFICIENCIA DE FOLATOS, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(382, 'f393dc90-b93a-11ee-ba61-df23778b7146', 'D530', 'ANEMIA POR DEFICIENCIA DE PROTEINAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(383, 'f393e640-b93a-11ee-ba5b-cde05b04af1d', 'D531,\"OTRAS ANEMIAS MEGALOBLASTICAS, NO CLASIFICADAS EN OTRA PARTE\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(384, 'f393efc0-b93a-11ee-b5ae-859ab4dec9b1', 'D538', 'OTRAS ANEMIAS NUTRICIONALES ESPECIFICADAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(385, 'f393f950-b93a-11ee-bf81-d5be55be7154', 'D539,\"ANEMIA NUTRICIONAL, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(386, 'f39402b0-b93a-11ee-91c5-499fcb77a670', 'D550', 'ANEMIA DEBIDA A DEFICIENCIA DE GLUCOSA-6-FOSFATO DESHIDROGENASA (G6FD)', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(387, 'f3940c10-b93a-11ee-8a6f-9d4f07f4a4f2', 'D551', 'ANEMIA DEBIDA A OTROS TRASTORNOS DEL METABOLISMO DEL GLUTATION', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(388, 'f39415d0-b93a-11ee-aace-dd8737da8cc4', 'D552', 'ANEMIA DEBIDA A TRASTORNOS DE LAS ENZIMAS GLUCOLITICAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(389, 'f3941f50-b93a-11ee-8afb-7bc068d20693', 'D560', 'ALFA TALASEMIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(390, 'f39428b0-b93a-11ee-a9c7-a36594982bb3', 'D561', 'BETA TALASEMIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(391, 'f3943210-b93a-11ee-aef6-7b10bbf1c2c7', 'D562', 'DELTA-BETA TALASEMIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(392, 'f3943be0-b93a-11ee-a11d-83ca3c89fcb3', 'D563', 'RASGO TALASEMICO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(393, 'f3944550-b93a-11ee-a4ce-911333dec1e6', 'D568', 'OTRAS TALASEMIAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(394, 'f3944ed0-b93a-11ee-b197-21a5cb8c57a5', 'D569,\"TALASEMIA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(395, 'f3945840-b93a-11ee-a0d5-2d18d88a40ed', 'D570', 'ANEMIA FALCIFORME CON CRISIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(396, 'f39461e0-b93a-11ee-917c-058c563583a3', 'D571', 'ANEMIA FALCIFORME SIN CRISIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(397, 'f3946b30-b93a-11ee-8d12-779d1cd2a97d', 'D572', 'TRASTORNOS FALCIFORMES HETEROCIGOTICOS DOBLES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(398, 'f39474a0-b93a-11ee-b948-2b8d6ad8de02', 'D573', 'RASGO DREPANOCITICO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(399, 'f3947df0-b93a-11ee-a3f4-05f916db0d38', 'D578', 'OTROS TRASTORNOS FALCIFORMES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(400, 'f39487d0-b93a-11ee-af0f-1fa8f84b691c', 'D580', 'ESFEROCITOSIS HEREDITARIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(401, 'f3949160-b93a-11ee-b015-43f3042e8407', 'D581', 'ELIPTOCITOSIS HEREDITARIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(402, 'f3949ac0-b93a-11ee-b01c-5544335125f5', 'D582', 'OTRAS HEMOGLOBINOPATIAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(403, 'f394a420-b93a-11ee-aec2-2b7a40afb2da', 'D588', 'OTRAS ANEMIAS HEMOLITICAS HEREDITARIAS ESPECIFICADAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(404, 'f394ade0-b93a-11ee-a822-1dee5adcf482', 'D589,\"ANEMIA HEMOLITICA HEREDITARIA, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(405, 'f394b760-b93a-11ee-ad21-e7a29402b3fb', 'D590', 'ANEMIA HEMOLITICA AUTOINMUNE INDUCIDA POR DROGAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(406, 'f394cc00-b93a-11ee-8a7a-5fb39f29654f', 'D591', 'OTRAS ANEMIAS HEMOLITICAS AUTOINMUNES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(407, 'f394dd20-b93a-11ee-a509-cf8ddf0fb765', 'D592', 'ANEMIA HEMOLITICA NO AUTOINMUNE INDUCIDA POR DROGAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(408, 'f394e950-b93a-11ee-bd56-591a62ffc83c', 'D593', 'SINDROME HEMOLITICO-UREMICO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(409, 'f394f3e0-b93a-11ee-a7ad-f117fe14ce7a', 'D594', 'OTRAS ANEMIAS HEMOLITICAS NO AUTOINMUNES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(410, 'f394fe60-b93a-11ee-a01f-c98cbad4a9cf', 'D598', 'OTRAS ANEMIAS HEMOLITICAS ADQUIRIDAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(411, 'f3950890-b93a-11ee-b29f-6b99309134f2', 'D599,\"ANEMIAS HEMOLITICA ADQUIRIDA, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(412, 'f3951270-b93a-11ee-b7d1-b57383ee5283', 'D611', 'ANEMIA APLASTICA INDUCIDA POR DROGAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(413, 'f3951c40-b93a-11ee-b641-7d181e4f860e', 'D613', 'ANEMIA APLASTICA IDIOPATICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(414, 'f3952630-b93a-11ee-89fd-77f1d68b58ed', 'D618', 'OTRAS ANEMIAS APLASTICAS ESPECIFICADAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(415, 'f3953000-b93a-11ee-ab57-a3823c3cc1a5', 'D619,\"ANEMIA APLASTICA, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(416, 'f3953990-b93a-11ee-b3a0-539b3bfbfe19', 'D648', 'OTRAS ANEMIAS ESPECIFICADAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(417, 'f3954340-b93a-11ee-b3e4-87005eb1e6fa', 'D649', 'ANEMIA DE TIPO NO ESPECIFICADO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(418, 'f3954d50-b93a-11ee-bd2b-af29306026a7', 'D66X', 'DEFICIENCIA HEREDITARIA DEL FACTOR VIII', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(419, 'f39556e0-b93a-11ee-b0d9-91ca0e032619', 'D67X', 'DEFICIENCIA HEREDITARIA DEL FACTOR IX', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(420, 'f3956040-b93a-11ee-80f9-9f3ff5cd9c10', 'D680', 'ENFERMEDAD DE VON WILLEBRAND', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(421, 'f39569f0-b93a-11ee-b621-f7b572717732', 'D681', 'DEFICIENCIA HEREDITARIA DEL FACTOR XI', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(422, 'f39573c0-b93a-11ee-ab60-294f026f9b9e', 'D682', 'DEFICIENCIA HEREDITARIA DE OTROS FACTORES DE LA COAGULACION', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(423, 'f3957d50-b93a-11ee-a198-991bb5ca709b', 'D683', 'TRASTORNO HEMORRAGICO DEBIDO A ANTICOAGULANTES CIRCULANTES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(424, 'f39586d0-b93a-11ee-974c-fb6ebc9ce8c1', 'D684', 'DEFICIENCIA ADQUIRIDA DE FACTORES DE LA COAGULACION', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(425, 'f3959060-b93a-11ee-9a52-47083ac8635f', 'D688', 'OTROS DEFECTOS ESPECIFICADOS DE LA COAGULACION', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(426, 'f3959aa0-b93a-11ee-b6cc-21c3ec95fc72', 'D689,\"DEFECTO DE LA COAGULACION, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(427, 'f395a440-b93a-11ee-a29d-4b2af104d257', 'D690', 'PURPURA ALERGICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(428, 'f395adc0-b93a-11ee-aacc-bbea6a131490', 'D691', 'DEFECTOS CUALITATIVOS DE LAS PLAQUETAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(429, 'f395b740-b93a-11ee-922e-21bfd29a6da0', 'D692', 'OTRAS PURPURAS NO TROMBOCITOPENICAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(430, 'f395c140-b93a-11ee-a8c0-79b625065890', 'D693', 'PURPURA TROMBOCITOPENICA IDIOPATICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(431, 'f395cac0-b93a-11ee-a738-8f14dce2994e', 'D694', 'OTRAS TROMBOCITOPENIAS PRIMARIAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(432, 'f395d430-b93a-11ee-b1d2-bb0d64be1958', 'D695', 'TROMBOCITOPENIA SECUNDARIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(433, 'f395dd90-b93a-11ee-aef2-c15303761caf', 'D696', 'TROMBOCITOPENIA NO ESPECIFICADA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(434, 'f395e760-b93a-11ee-9ff6-31c9b85e957d', 'D698', 'OTRAS AFECCIONES HEMORRAGICAS ESPECIFICADAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(435, 'f395f120-b93a-11ee-bcd0-fd320b8c247e', 'D699,\"AFECCION HEMORRAGICA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(436, 'f395fac0-b93a-11ee-8a24-cf1d523174d0', 'D70X', 'AGRANULOCITOSIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(437, 'f3960460-b93a-11ee-bb79-8d30317ef35e', 'D721', 'EOSINOFILIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(438, 'f3960e90-b93a-11ee-bfb0-d732f852ab99', 'D728', 'OTROS TRASTORNOS ESPECIFICADOS DE LOS LEUCOCITOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(439, 'f3961880-b93a-11ee-aab5-4391efbbd175', 'D729,\"TRASTORNOS DE LOS LEUCOCITOS, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(440, 'f3962280-b93a-11ee-8b92-d1b1dac21df7', 'D748', 'OTRAS METAHEMOGLOBINEMIAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(441, 'f3962c70-b93a-11ee-ab0e-6d1045c6ea88', 'D749,\"METAHEMOGLOBINEMIA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(442, 'f3963760-b93a-11ee-a3d5-c323d0c55779', 'D751', 'POLICITEMIA SECUNDARIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(443, 'f3964180-b93a-11ee-8d40-ff1314f0da99', 'D759,\"ENFERMEDAD DE LA SANGRE Y DE LOS ORGANOS HEMATOPOYETICOS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(444, 'f3964bb0-b93a-11ee-8cb5-6ded1a93a656', 'D760,\"HISTIOCITOSIS DE LAS CELULAS DE LANGERHANS, NO CLASIFICADA EN OTRA PARTE\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(445, 'f3965540-b93a-11ee-b52a-4bd0e9b6782e', 'D763', 'OTROS SINDROMES HISTIOCITICOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(446, 'f3965f40-b93a-11ee-aad5-a573297a3a26', 'D808', 'OTRAS INMUNODEFICIENCIAS CON PREDOMINIO DE DEFECTOS DE LOS ANTICUERPOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(447, 'f39668f0-b93a-11ee-8055-21f5f86ac6de', 'D809,\"INMUNODEFICIENCIA CON PREDOMINIO DE DEFECTOS DE LOS ANTICUERPOS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(448, 'f3967290-b93a-11ee-9625-bf1bc1339672', 'D818', 'OTRAS INMUNODEFICIENCIAS COMBINADAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(449, 'f3967c40-b93a-11ee-8e19-eb6b0423a600', 'D819,\"INMUNODEFICIENCIA COMBINADA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(450, 'f39685f0-b93a-11ee-89b7-595a198d8398', 'D820', 'SINDROME DE WISKOTT-ALDRICH', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(451, 'f3968fe0-b93a-11ee-9278-33cc83d9c99a', 'D821', 'SINDROME DE DI GEORGE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(452, 'f3969950-b93a-11ee-b415-f57990727057', 'D838', 'OTRAS INMUNODEFICIENCIAS VARIABLES COMUNES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(453, 'f396a300-b93a-11ee-a593-d55c1c85f4ff', 'D839,\"INMUNODEFICIENCIA VARIABLE COMUN, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(454, 'f396acc0-b93a-11ee-9eb3-7b190628898f', 'D841', 'DEFECTO DEL SISTEMA DEL COMPLEMENTO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(455, 'f396b650-b93a-11ee-ab65-e3795443df0b', 'D848', 'OTRAS INMUNODEFICIENCIAS ESPECIFICADAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(456, 'f396bff0-b93a-11ee-a494-c7e0ecd66b8f', 'D849,\"INMUNODEFICIENCIA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(457, 'f396c970-b93a-11ee-8a04-0323efee756c', 'D863', 'SARCOIDOSIS DE LA PIEL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(458, 'f396d3a0-b93a-11ee-9239-8b5a75bd07d6', 'D868', 'SARCOIDOSIS DE OTROS SITIOS ESPECIFICADOS O DE SITIOS COMBINADOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(459, 'f396dd50-b93a-11ee-b137-cb926e673bf5', 'D869', 'SARCOIDOSIS DE SITIO NO ESPECIFICADO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(460, 'f396e6c0-b93a-11ee-9eac-63ad426082a5', 'D890', 'HIPERGAMMAGLOBULINEMIA POLICLONAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(461, 'f396f040-b93a-11ee-8d1f-95c587206097', 'D891', 'CRIOGLOBULINEMIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(462, 'f396fa30-b93a-11ee-9fe7-a53e3b229fdb', 'D892,\"HIPERGAMMAGLOBULINEMIA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(463, 'f39703f0-b93a-11ee-a721-d9c6be8044f9', 'D898,\"OTROS TRASTORNOS ESPECIFICADOS QUE AFECTAN EL MECANISMO DE LA INMUNIDAD, NO CLASIFICADOS EN OTRA PARTE\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(464, 'f3970dc0-b93a-11ee-968f-d3dee60c6ef0', 'D899,\"TRASTORNO QUE AFECTA AL MECANISMO DE LA INMUNIDAD, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(465, 'f3971750-b93a-11ee-aabf-17bb69c7dca4', 'E018', 'OTROS TRASTORNOS DE LA TIROIDES RELACIONADOS CON DEFICIENCIA DE YODO Y AFECCIONES SIMILARES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(466, 'f3972120-b93a-11ee-a623-e78876e187c6', 'E02X', 'HIPOTIROIDISMO SUBCLINICO POR DEFICIENCIA DE YODO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(467, 'f3972aa0-b93a-11ee-896b-ef6f2695ec0c', 'E035', 'COMA MIXEDEMATOSO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(468, 'f3973440-b93a-11ee-8603-ffd1cf82b7dd', 'E038', 'OTROS HIPOTIROIDISMOS ESPECIFICADOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(469, 'f3973dd0-b93a-11ee-9cac-7972794330d6', 'E039,\"HIPOTIROIDISMO, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(470, 'f39747b0-b93a-11ee-8594-efa788b34068', 'E040', 'BOCIO DIFUSO NO TOXICO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(471, 'f3975120-b93a-11ee-b5fa-9f5fe7d620a4', 'E041', 'NODULO TIROIDEO SOLITARIO NO TOXICO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(472, 'f3975ad0-b93a-11ee-b3c7-b38363cc62d8', 'E042', 'BOCIO MULTINODULAR NO TOXICO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(473, 'f3976440-b93a-11ee-80e2-d994ae646c97', 'E048', 'OTROS BOCIOS NO TOXICOS ESPECIFICADOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(474, 'f3976ef0-b93a-11ee-89a5-9d62c1884f38', 'E049,\"BOCIO NO TOXICO, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(475, 'f3977870-b93a-11ee-bdbb-1b236dfd678e', 'E058', 'OTRAS TIROTOXICOSIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(476, 'f3978230-b93a-11ee-a4b1-e12581dbd079', 'E059,\"TIROTOXICOSIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(477, 'f3978bb0-b93a-11ee-830b-0df75f6a34fd', 'E060', 'TIROIDITIS AGUDA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(478, 'f3979580-b93a-11ee-a2c0-976bdda420a8', 'E061', 'TIROIDITIS SUBAGUDA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(479, 'f3979ef0-b93a-11ee-a858-332c1c2aac08', 'E062', 'TIROIDITIS CRONICA CON TIROTOXICOSIS TRANSITORIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(480, 'f397a880-b93a-11ee-9400-7b63ad1028f9', 'E063', 'TIROIDITIS AUTOINMUNE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(481, 'f397b230-b93a-11ee-b30f-f55b7d17e881', 'E065', 'OTRAS TIROIDITIS CRONICAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(482, 'f397bc00-b93a-11ee-84e5-bf859de8a9ff', 'E069,\"TIROIDITIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(483, 'f397c580-b93a-11ee-b9c7-5f71a455033b', 'E078', 'OTROS TRASTORNOS ESPECIFICADOS DE LA GLANDULA TIROIDES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(484, 'f397cf00-b93a-11ee-bf5f-11e7cb0d9620', 'E079,\"TRASTORNO DE LA GLANDULA TIROIDES, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(485, 'f397d890-b93a-11ee-8410-4711cd31c3a3', 'E100', 'DIABETES MELLITUS INSULINODEPENDIENTE CON COMA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(486, 'f397e230-b93a-11ee-84ed-e7b277d4bff9', 'E101', 'DIABETES MELLITUS INSULINODEPENDIENTE CON CETOACIDOSIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(487, 'f397ebc0-b93a-11ee-ab9f-efe1e163ad22', 'E108', 'DIABETES MELLITUS INSULINODEPENDIENTE CON COMPLICACIONES NO ESPECIFICADAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(488, 'f397f530-b93a-11ee-9510-cfdbc5c1f4e0', 'E109', 'DIABETES MELLITUS INSULINODEPENDIENTE SIN MENCION DE COMPLICACION', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(489, 'f397fef0-b93a-11ee-bf04-077a371d8681', 'E146,\"DIABETES MELLITUS, NO ESPECIFICADA CON OTRAS COMPLICACIONES ESPECIFICADAS\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(490, 'f3980900-b93a-11ee-a822-9d280c480d5d', 'E147,\"DIABETES MELLITUS, NO ESPECIFICADA CON COMPLICACIONES MULTIPLES\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(491, 'f39814a0-b93a-11ee-829f-051471ea6e27', 'E148,\"DIABETES MELLITUS, NO ESPECIFICADA CON COMPLICACIONES NO ESPECIFICADAS\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(492, 'f3982020-b93a-11ee-aae1-6d49ba3c7952', 'E149,\"DIABETES MELLITUS, NO ESPECIFICADA SIN MENCION DE COMPLICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(493, 'f3982c20-b93a-11ee-95a2-6dfca5b997e0', 'E15X', 'COMA HIPOGLICEMICO NO DIABETICO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(494, 'f3983870-b93a-11ee-8a81-6f069baa8f20', 'E160,\"HIPOGLICEMIA SIN COMA, INDUCIDA POR DROGAS\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(495, 'f39843f0-b93a-11ee-9625-9b8eba6b2dad', 'E161', 'OTRAS HIPOGLICEMIAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(496, 'f3984fb0-b93a-11ee-bb92-41e87bb001b6', 'E162,\"HIPOGLICEMIA , NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(497, 'f3985b60-b93a-11ee-9f47-a7a9ccff92d0', 'E200', 'HIPOPARATIROIDISMO IDIOPATICO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(498, 'f39866d0-b93a-11ee-8801-fb5cef93a5f5', 'E201', 'PSEUDOHIPOPARATIROIDISMO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(499, 'f3987230-b93a-11ee-89cf-cf165ab69dcd', 'E208', 'OTROS TIPOS DE HIPOPARATIROIDISMO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(500, 'f3987e00-b93a-11ee-b7dc-79f0aabd174d', 'E209,\"HIPOPARATIROIDISMO, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(501, 'f39889e0-b93a-11ee-b0be-fd47a0ebc487', 'E210', 'HIPERPARATIROIDISMO PRIMARIO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(502, 'f3989520-b93a-11ee-8861-69b0eec63dfa', 'E211', 'HIPERPARATIROIDISMO SECUNDARIO NO CLASIFICADO EN OTRA PARTE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(503, 'f398a050-b93a-11ee-8b3e-d94be02bdc07', 'E212', 'OTROS TIPOS DE HIPERPARATIROIDISMO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(504, 'f398ac50-b93a-11ee-827e-61b353be93ff', 'E213,\"HIPERPARATIROIDISMO, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(505, 'f398b7b0-b93a-11ee-8624-e7b86fa7e108', 'E214', 'OTROS TRASTORNOS ESPECIFICADOS DE LA GLANDULA PARATIROIDES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(506, 'f398c2f0-b93a-11ee-a6c0-4bafbfe96a77', 'E215,\"TRASTORNO DE LA GLANDULA PARATIROIDES, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(507, 'f398ce40-b93a-11ee-9022-f7e0f8d2906e', 'E220', 'ACROMEGALIA Y GIGANTISMO HIPOFISARIO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(508, 'f398d800-b93a-11ee-9ac3-a3ae4731ac7e', 'E221', 'HIPERPROLACTINEMIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(509, 'f398e190-b93a-11ee-859d-61dcbb6ad45d', 'E222', 'SINDROME DE SECRECION INAPROPIADA DE HORMONA ANTIDIURETICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(510, 'f398ecd0-b93a-11ee-bad8-493579f6360f', 'E228', 'OTRAS HIPERFUNCIONES DE LA GLANDULA HIPOFISIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(511, 'f398f810-b93a-11ee-9f57-13a6eaca5898', 'E229,\"HIPERFUNCION DE LA GLANDULA HIPOFISIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(512, 'f39901f0-b93a-11ee-973b-7bd8b0c066c1', 'E230', 'HIPOPITUITARISMO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(513, 'f3990ba0-b93a-11ee-b3a1-5fec7a2507e0', 'E231', 'HIPOPITUITARISMO INDUCIDO POR DROGAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(514, 'f3991520-b93a-11ee-9fab-458bc3ccf75e', 'E232', 'DIABETES INSIPIDA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(515, 'f3991f50-b93a-11ee-b074-add5d6a5b6e2', 'E240', 'ENFERMEDAD DE CUSHING DEPENDIENTE DE LA HIPOFISIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(516, 'f39928e0-b93a-11ee-b40d-cf5775a6f98a', 'E241', 'SINDROME DE NELSON', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(517, 'f3993260-b93a-11ee-986d-775302a63455', 'E242', 'SINDROME DE CUSHING INDUCIDO POR DROGAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(518, 'f3993be0-b93a-11ee-8638-7df8804b991a', 'E243', 'SINDROME DE ACTH ECTOPICO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(519, 'f3994600-b93a-11ee-ae3e-2729c795afce', 'E244', 'SINDROME DE SEUDO-CUSHING INDUCIDO POR ALCOHOL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(520, 'f3994fa0-b93a-11ee-a02e-a58c45c83643', 'E248', 'OTROS TIPOS DE SINDROME DE CUSHING', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(521, 'f3995960-b93a-11ee-9079-3f1aa013645b', 'E249,\"SINDROME DE CUSHING, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(522, 'f39962d0-b93a-11ee-aace-6749110566c5', 'E260', 'HIPERALDOSTERONISMO PRIMARIO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(523, 'f3996cc0-b93a-11ee-aedb-13db83fe1f71', 'E261', 'HIPERALDOSTERONISMO SECUNDARIO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(524, 'f3997640-b93a-11ee-afd3-bf10ec71847c', 'E268', 'OTROS TIPOS DE HIPERALDOSTERONISMO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(525, 'f3997fe0-b93a-11ee-9ee2-85240230ba16', 'E269,\"HIPERALDOSTERONISMO, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(526, 'f39989b0-b93a-11ee-900f-f3deb2b5d31a', 'E271', 'INSUFICIENCIA CORTICOSUPRARRENAL PRIMARIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(527, 'f39993b0-b93a-11ee-b2c9-97dd4c8e4cfb', 'E280', 'EXCESO DE ESTROGENOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(528, 'f3999d40-b93a-11ee-a148-f91f1b62ea28', 'E281', 'EXCESO DE ANDROGENOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(529, 'f399a6c0-b93a-11ee-8c25-b100ca32d807', 'E282', 'SINDROME DE OVARIO POLIQUISTICO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(530, 'f399b030-b93a-11ee-a9bc-e92782b43385', 'E283', 'INSUFICIENCIA OVARICA PRIMARIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(531, 'f399ba30-b93a-11ee-83db-a72a196b6eea', 'E289,\"DISFUNCION OVARICA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(532, 'f399c3b0-b93a-11ee-ad70-99baedd1d210', 'E298', 'OTRAS DISFUNCIONES TESTICULARES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(533, 'f399cd40-b93a-11ee-a413-c1838f8d9828', 'E299,\"DISFUNCION TESTICULAR, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(534, 'f399d700-b93a-11ee-b2db-e936333d8f7c', 'E300', 'PUBERTAD RETARDADA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(535, 'f399e0b0-b93a-11ee-b59e-d50461b68a43', 'E301', 'PUBERTAD PRECOZ', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(536, 'f399ea20-b93a-11ee-959a-e3a06dcda337', 'E308', 'OTROS TRASTORNOS DE LA PUBERTAD', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(537, 'f399f3c0-b93a-11ee-b8c2-11252ae47bf4', 'E309,\"TRASTORNO DE LA PUBERTAD, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(538, 'f39a0f50-b93a-11ee-94e1-a95a1c3f2b01', 'E310', 'INSUFICIENCIA PILOGLANDULAR AUTOINMUNE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(539, 'f39a1eb0-b93a-11ee-9226-db13e1cdc02c', 'E318', 'OTRAS DISFUNCIONES POLIGLANDULARES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(540, 'f39a2b20-b93a-11ee-afdf-2fd6d2438dac', 'E319,\"DISFUNCION POLIGLANDULAR, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(541, 'f39a3600-b93a-11ee-8183-cb9b42c0c9d7', 'E329,\"ENFERMEDAD DEL TIMO, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(542, 'f39a40d0-b93a-11ee-ba24-339febaf53e4', 'E340', 'SINDROME CARCINOIDE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(543, 'f39a4ae0-b93a-11ee-a0b9-11e8429044a0', 'E345', 'SINDROME DE RESISTENCIA ANDROGENICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(544, 'f39a55a0-b93a-11ee-ac4c-a5fcac047b1d', 'E348', 'OTROS TRASTORNOS ENDOCRINOS ESPECIFICADOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(545, 'f39a5fd0-b93a-11ee-8e2a-b166d0595f68', 'E349,\"TRASTORNO ENDOCRINO, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(546, 'f39a69e0-b93a-11ee-9c62-c179397ade5b', 'E46X,\"DESNUTRICION PROTEICOCALORICA , NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(547, 'f39a73c0-b93a-11ee-9510-8f05c528c5aa', 'E508', 'OTRAS MANIFESTACIONES DE DEFICIENCIA DE VITAMINA A', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(548, 'f39a7e50-b93a-11ee-ba82-b7fb875900c1', 'E509,\"DEFICIENCIA DE VITAMINA A, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(549, 'f39a8840-b93a-11ee-8476-8b6d50a97f55', 'E511', 'BERIBERI', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(550, 'f39a9210-b93a-11ee-8f88-05db2c0bfc5a', 'E518', 'OTRAS MANIFESTACIONES DE LA DEFICIENCIA DE TIAMINA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(551, 'f39a9cb0-b93a-11ee-8f06-abed67445525', 'E519,\"DEFICIENCIA DE TIAMINA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(552, 'f39aa6c0-b93a-11ee-a2d1-5d9ce2be0ae1', 'E52X', 'DEFICIENCIA DE NIACINA [PELAGRA]', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(553, 'f39ab0e0-b93a-11ee-8806-df3f87fff873', 'E530', 'DEFICIENCIA DE RIBOFLAVINA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(554, 'f39abb00-b93a-11ee-bfae-d91bce7a97f3', 'E531', 'DEFICIENCIA DE PIRIDOXINA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(555, 'f39ac520-b93a-11ee-bbe4-0570e3356421', 'E538', 'DEFICIENCIA DE OTRAS VITAMINAS DEL GRUPO B', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(556, 'f39acf40-b93a-11ee-9543-c9693a702573', 'E539,\"DEFICIENCIA DE VITAMINA B, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(557, 'f39ad930-b93a-11ee-b15c-a1df803cbe16', 'E54X', 'DEFICIENCIA DE ACIDO ASCORBICO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(558, 'f39ae2f0-b93a-11ee-b209-6b15a5a85be8', 'E550', 'RAQUITISMO ACTIVO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(559, 'f39aed40-b93a-11ee-a365-6ddb999d8fc6', 'E559,\"DEFICIENCIA DE VITAMINA D, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(560, 'f39af720-b93a-11ee-b53b-03cf9314158a', 'E560', 'DEFICIENCIA DE VITAMINA E', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(561, 'f39b0100-b93a-11ee-8e0e-9bea52720929', 'E561', 'DEFICIENCIA DE VITAMINA K', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(562, 'f39b0ac0-b93a-11ee-b4f1-21db49b4e122', 'E568', 'DEFICIENCIA DE OTRAS VITAMINAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(563, 'f39b1530-b93a-11ee-80a2-35b56a51541e', 'E569,\"DEFICIENCIA DE VITAMINA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(564, 'f39b1f20-b93a-11ee-979a-a1c268453050', 'E58X', 'DEFICIENCIA DIETETICA DE CALCIO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(565, 'f39b2900-b93a-11ee-bbc0-7951b901ca34', 'E59X', 'DEFICIENCIA DIETETICA DE SELENIO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(566, 'f39b3290-b93a-11ee-bcea-5db717f9ac6e', 'E60X', 'DEFICIENCIA DIETETICA DE ZINC', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(567, 'f39b3cb0-b93a-11ee-bd04-77003e16acda', 'E610', 'DEFICIENCIA DE COBRE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(568, 'f39b4690-b93a-11ee-b390-e7b2a70f74b0', 'E611', 'DEFICIENCIA DE HIERRO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(569, 'f39b5030-b93a-11ee-988f-9103f786462a', 'E612', 'DEFICIENCIA DE MAGNESIO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(570, 'f39b5a10-b93a-11ee-8a17-fb048f6cf7f2', 'E613', 'DEFICIENCIA DE MANGANESO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(571, 'f39b6430-b93a-11ee-a292-85aff82e776c', 'E614', 'DEFICIENCIA DE CROMO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(572, 'f39b6e00-b93a-11ee-a39f-cfdd9e88e0e7', 'E615', 'DEFICIENCIA DE MOLIBDENO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(573, 'f39b77d0-b93a-11ee-9440-b78664fea3d2', 'E616', 'DEFICIENCIA DE VANADIO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(574, 'f39b81a0-b93a-11ee-b284-474f46caaf5c', 'E617', 'DEFICIENCIA DE MULTIPLES ELEMENTOS NUTRICIONALES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(575, 'f39b8b90-b93a-11ee-9a96-332e3a1afa8a', 'E618', 'DEFICIENCIA DE OTROS ELEMENTOS NUTRICIONALES ESPECIFICADOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(576, 'f39b95e0-b93a-11ee-9492-b12a4d7391eb', 'E619,\"DEFICIENCIA DE OTRO ELEMENTO NUTRICIONAL, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(577, 'f39b9fa0-b93a-11ee-a1b5-95a990bcca64', 'E630', 'DEFICIENCIA DE ACIDOS GRASOS ESENCIALES [AGE]', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(578, 'f39ba970-b93a-11ee-9d1a-99dca7f3b559', 'E631', 'DESEQUILIBRIO DE LOS CONSTITUYENTES EN LA DIETA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(579, 'f39bb3c0-b93a-11ee-aa58-49faacd6bdc6', 'E638', 'OTRAS DEFICIENCIAS NUTRICIONALES ESPECIFICADAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(580, 'f39bbdf0-b93a-11ee-a19f-99c977538d34', 'E639,\"DEFICIENCIA NUTRICIONAL, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(581, 'f39bc7d0-b93a-11ee-85b0-6f55646f6261', 'E640', 'SECUELAS DE LA DESNUTRICION PROTEICOCALORICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(582, 'f39bd1a0-b93a-11ee-af5f-27e46d234447', 'E641', 'SECUELAS DE LA DEFICIENCIA DE VITAMINA A', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(583, 'f39bdba0-b93a-11ee-83f7-79930204412e', 'E642', 'SECUELAS DE LA DEFICIENCIA DE VITAMINA C', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(584, 'f39be5a0-b93a-11ee-96e9-778671b3cf73', 'E643', 'SECUELAS DEL RAQUITISMO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(585, 'f39bef70-b93a-11ee-8ce2-ff459933aa7b', 'E648', 'SECUELAS DE OTRAS DEFICIENCIAS NUTRICIONALES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(586, 'f39bf950-b93a-11ee-87ad-a52649bab0a7', 'E649', 'SECUELAS DE LA DEFICIENCIA NUTRICIONAL NO ESPECIFICADA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(587, 'f39c0360-b93a-11ee-8f9c-bf35519c2889', 'E65X', 'ADIPOSIDAD LOCALIZADA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(588, 'f39c0d20-b93a-11ee-88be-79777429b4ef', 'E660', 'OBESIDAD DEBIDA A EXCESO DE CALORIAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(589, 'f39c1720-b93a-11ee-bac7-cdda5ad55f83', 'E661', 'OBESIDAD INDUCIDA POR DROGAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(590, 'f39c20f0-b93a-11ee-bac6-b9bb510434e4', 'E662', 'OBESIDAD EXTREMA CON HIPOVENTILACION ALVEOLAR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(591, 'f39c2b10-b93a-11ee-a33a-2f2fb134f181', 'E668', 'OTROS TIPOS DE OBESIDAD', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(592, 'f39c3500-b93a-11ee-8c66-191f4428fc44', 'E669,\"OBESIDAD, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(593, 'f39c3ed0-b93a-11ee-bfbd-6fbbf6541444', 'E670', 'HIPERVITAMINOSIS A', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(594, 'f39c4860-b93a-11ee-89aa-b96137f4d077', 'E671', 'HIPERCAROTINEMIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(595, 'f39c5240-b93a-11ee-9c6b-b5537ec9b15b', 'E672', 'SINDROME DE MEGAVITAMINA B6', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(596, 'f39c5c00-b93a-11ee-bd33-579a56bf7318', 'E673', 'HIPERVITAMINOSIS D', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(597, 'f39c6590-b93a-11ee-8365-1b6b8918fe6b', 'E678', 'OTROS TIPOS DE HIPERALIMENTACION ESPECIFICADOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(598, 'f39c6f40-b93a-11ee-917b-b9f022fa26e1', 'E68X', 'SECUELAS DE HIPERALIMENTACION', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(599, 'f39c7930-b93a-11ee-9627-c1dfd2a22445', 'E700', 'FENILCETONURIA CLASICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(600, 'f39c82d0-b93a-11ee-bbf6-77780c7021bf', 'E701', 'OTRAS HIPERFENILALANINEMIAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(601, 'f39c8c80-b93a-11ee-a94a-a1abc5902809', 'E702', 'TRASTORNOS DEL METABOLISMO DE LA TIROSINA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(602, 'f39c9770-b93a-11ee-ac93-0d6aae70caac', 'E703', 'ALBINISMO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(603, 'f39ca170-b93a-11ee-884e-f1d718c1c393', 'E738', 'OTROS TIPOS DE INTOLERANCIA A LA LACTOSA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(604, 'f39cac30-b93a-11ee-882c-2d6bc1e70d4a', 'E739,\"INTOLERANCIA A LA LACTOSA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(605, 'f39cb5e0-b93a-11ee-bfaf-21da13695412', 'E780', 'HIPERCOLESTEROLEMIA PURA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(606, 'f39cbfe0-b93a-11ee-8a65-f756db7b66ed', 'E781', 'HIPERGLICERIDEMIA PURA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(607, 'f39cc990-b93a-11ee-a52a-fb235b68577b', 'E782', 'HIPERLIPIDEMIA MIXTA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(608, 'f39cd330-b93a-11ee-8da2-cd1c3f3df68a', 'E783', 'HIPERQUILOMICRONEMIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(609, 'f39cdcb0-b93a-11ee-9a7a-0fb2e7f90a01', 'E784', 'OTRA HIPERLIPIDEMIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(610, 'f39ce650-b93a-11ee-872e-bb5bdebd7443', 'E785', 'HIPERLIPIDEMIA NO ESPECIFICADA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(611, 'f39cf010-b93a-11ee-9343-23e21a068d62', 'E791', 'SINDROME DE LESCH-NYHAN', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(612, 'f39cf990-b93a-11ee-bfa2-49b58a44f869', 'E800', 'PORFIRIA ERITROPOYETICA HEREDITARIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(613, 'f39d0320-b93a-11ee-b360-1f17610b9d2f', 'E801', 'PORFIRIA CUTANEA TARDIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(614, 'f39d0ca0-b93a-11ee-92ac-0767dc27cb08', 'E802', 'OTRAS PORFIRIAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(615, 'f39d1680-b93a-11ee-a524-571c396fd371', 'E803', 'DEFECTOS DE CATALASA Y PEROXIDASA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(616, 'f39d2000-b93a-11ee-a0ef-514c8b3dd8e1', 'E804', 'SINDROME DE GILBERT', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(617, 'f39d2990-b93a-11ee-b2f8-6f14e1b9e584', 'E805', 'SINDROME DE CRIGLER-NAJJAR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(618, 'f39d32f0-b93a-11ee-9f13-7d85be7b9a1e', 'E806', 'OTROS TRASTORNOS DEL METABOLISMO DE LA BILIRRUBINA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(619, 'f39d3d20-b93a-11ee-b472-8f94eb9b3995', 'E807,\"TRASTORNOS DEL METABOLISMO DE LA BILIRRUBINA, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(620, 'f39d46b0-b93a-11ee-bccc-db3feba0f4b9', 'E830', 'TRASTORNOS DEL METABOLISMO DEL COBRE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(621, 'f39d5090-b93a-11ee-8e88-cd33964d8f83', 'E831', 'TRASTORNOS DEL METABOLISMO DEL HIERRO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(622, 'f39d59f0-b93a-11ee-9de2-69eaa1fd8e7d', 'E832', 'TRASTORNOS DEL METABOLISMO DEL ZINC', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(623, 'f39d63f0-b93a-11ee-93a2-6d58cbbbb43a', 'E833', 'TRASTORNOS DEL METABOLISMO DEL FOSFORO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(624, 'f39d6d60-b93a-11ee-937b-c3e4494e61d2', 'E834', 'TRASTORNOS DEL METABOLISMO DEL MAGNESIO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(625, 'f39d7710-b93a-11ee-9bf0-45870571289d', 'E835', 'TRASTORNOS DEL METABOLISMO DEL CALCIO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(626, 'f39d80b0-b93a-11ee-9309-5bfafe5ca565', 'E838', 'OTROS TRASTORNOS DEL METABOLISMO DE LOS MINERALES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(627, 'f39d8ac0-b93a-11ee-a71b-13eebbeb6aba', 'E839,\"TRASTORNO DEL METABOLISMO DE LOS MINERALES, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(628, 'f39d9470-b93a-11ee-954b-3d0b5cb5d898', 'E849,\"FIBROSIS QUISTICA, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(629, 'f39d9f20-b93a-11ee-b6c2-b58f1ea35641', 'E859,\"AMILOIDOSIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(630, 'f39da9a0-b93a-11ee-9e33-b591c8344434', 'E874', 'TRASTORNOS MIXTOS DEL BALANCE ACIDO-BASICO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(631, 'f39db3c0-b93a-11ee-b388-d1bcd4627bd0', 'E875', 'HIPERPOTASEMIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(632, 'f39dbd70-b93a-11ee-ba2e-01a4045b136e', 'E876', 'HIPOPOTASMIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(633, 'f39dc730-b93a-11ee-ad46-1f74253898d0', 'E881,\"LIPODISTROFIA, NO CLASIFICADA EN OTRA PARTE\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(634, 'f39dd120-b93a-11ee-9edf-a1207e1862f2', 'E882,\"LIPOMATOSIS, NO CLASIFICADA EN OTRA PARTE\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(635, 'f39ddbe0-b93a-11ee-8ad6-778cf271839d', 'E888', 'OTROS TRASTORNOS ESPECIFICADOS DEL METABOLISMO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(636, 'f39de5f0-b93a-11ee-aa02-edd3453c7b97', 'E889,\"TRASTORNO METABOLICO, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(637, 'f39defa0-b93a-11ee-8554-1173380daffa', 'F03X,\"DEMENCIA , NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(638, 'f39df9e0-b93a-11ee-b091-e77a672e3ddc', 'F058', 'OTROS DELIRIOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(639, 'f39e03c0-b93a-11ee-9d7c-e38ec126416d', 'F059,\"DELIRIO, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(640, 'f39e0dc0-b93a-11ee-8d20-dfe5f28bbadf', 'F064,\"TRASTORNO DE ANSIEDAD, ORGANICO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(641, 'f39e1760-b93a-11ee-ae80-990a23f9b913', 'F065,\"TRASTORNO DISOCIATIVO, ORGANICO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(642, 'f39e2150-b93a-11ee-920f-7b9cae373b04', 'F067', 'TRASTORNO COGNOSCITIVO LEVE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(643, 'f39e2af0-b93a-11ee-986a-a3d4b2ba3233', 'F208', 'OTRAS ESQUIZOFRENIAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(644, 'f39e34c0-b93a-11ee-8f1e-b1b5770513ec', 'F209,\"ESQUIZOFRENIA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(645, 'f39e3e50-b93a-11ee-85cd-b7bd44da6282', 'F21X', 'TRASTORNO ESQUIZOTIPICO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(646, 'f39e4810-b93a-11ee-a5b7-75a5b92c8c96', 'F220', 'TRASTORNO DELIRANTE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(647, 'f39e51c0-b93a-11ee-9634-9752c8c4e366', 'F258', 'OTROS TRASTORNOS ESQUIZOAFECTIVOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(648, 'f39e5b70-b93a-11ee-bc2f-87955ade8554', 'F319,\"TRASTORNO AFECTIVO BIPOLAR, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(649, 'f39e6520-b93a-11ee-93ee-d5c89761a4a2', 'F328', 'OTROS EPISODIOS DEPRESIVOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(650, 'f39e6ee0-b93a-11ee-b569-2d56cfa44ac6', 'F413', 'OTROS TRASTORNOS DE ANSIEDAD MIXTOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(651, 'f39e7900-b93a-11ee-b894-9de0aeac1d6e', 'F418', 'OTROS TRASTORNOS DE ANSIEDAD ESPECIFICADOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(652, 'f39e82a0-b93a-11ee-a165-55ab268cd3b0', 'F419,\"TRASTORNO DE ANSIEDAD , NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(653, 'f39e8c90-b93a-11ee-ae20-b12d82aa22ad', 'F429,\"TRASTORNO OBSESIVO-COMPULSIVO, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(654, 'f39e9640-b93a-11ee-b905-034522b6027a', 'F430', 'REACCION AL ESTRÉS AGUD', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(655, 'f39ea030-b93a-11ee-9cfb-39ee10e781b2', 'F431', 'TRASTORNO DE ESTRÉS POSTRAUMATIC', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(656, 'f39ea990-b93a-11ee-9ba2-c3add25fcad4', 'F432', 'TRASTORNOS DE ADAPTACION', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(657, 'f39eb350-b93a-11ee-bf60-4fd99145840c', 'F500', 'ANOREXIA NERVIOSA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54');
INSERT INTO `diagnoses` (`id`, `uuid`, `code`, `name`, `status`, `created_at`, `updated_at`) VALUES
(658, 'f39ebcf0-b93a-11ee-ae02-e331f5f94b7b', 'F501', 'ANOREXIA NERVIOSA ATIPICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(659, 'f39ec6e0-b93a-11ee-b24c-abe51848f8e4', 'F510', 'INSOMNIO NO ORGANICO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(660, 'f39ed060-b93a-11ee-88db-b79f47bbb1bf', 'F523', 'DISFUNCION ORGASMICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(661, 'f39eda00-b93a-11ee-8c2c-41fd2ce7dfc4', 'F524', 'EYACULACION PRECOZ', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(662, 'f39ee3b0-b93a-11ee-b26d-a54a3e104235', 'F525', 'VAGINISMO NO ORGANICO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(663, 'f39eed50-b93a-11ee-8e0d-8353c221e450', 'F526', 'DISPAREUNIA NO ORGANICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(664, 'f39ef6f0-b93a-11ee-acf8-019dfebe7775', 'F527', 'IMPULSO SEXUAL EXCESIVO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(665, 'f39f0070-b93a-11ee-971e-7b6f9d87b9ce', 'F633', 'TRICOTILOMANIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(666, 'f39f1130-b93a-11ee-a542-41221387bf01', 'F639,\"TRASTORNO DE LOS HABITOS Y DE LOS IMPULSOS, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(667, 'f39f1fc0-b93a-11ee-9619-d1971502ec90', 'F640', 'TRANSEXUALISMO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(668, 'f39f2aa0-b93a-11ee-940d-ddd50a091f1f', 'F654', 'PEDOFILIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(669, 'f39f3580-b93a-11ee-b6b9-0f60fe2300f5', 'G409,\"EPILEPSIA, TIPO NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(670, 'f39f3fe0-b93a-11ee-8903-5ba7263086ed', 'G430', 'MIGRAÑA SIN AURA [MIGRAÑA COMU', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(671, 'f39f4a30-b93a-11ee-9ca8-4fc6894a6801', 'G431', 'MIGRAÑA CON AURA [MIGRAÑA CLASIC', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(672, 'f39f5470-b93a-11ee-b339-7daad7156c22', 'G432', 'ESTADO MIGRAÑOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(673, 'f39f5f00-b93a-11ee-b522-ed36116b1749', 'G433', 'MIGRAÑA COMPLICAD', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(674, 'f39f68d0-b93a-11ee-bdba-271d098fbed9', 'G438', 'OTRAS MIGRAÑA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(675, 'f39f7330-b93a-11ee-9030-b16dc518f663', 'G439,\"MIGRAÑA, NO ESPECIFICAD\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(676, 'f39f7d50-b93a-11ee-aefa-8fb1275db8da', 'G560', 'SINDROME DEL TUNEL CARPIANO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(677, 'f39f87c0-b93a-11ee-8dfd-2b144393b0d8', 'H000', 'ORZUELO Y OTRAS INFLAMACIONES PROFUNDAS DEL PARPADO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(678, 'f39f9290-b93a-11ee-82cc-fbf1777f0f41', 'H001', 'CALACIO [CHALAZION]', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(679, 'f39f9cb0-b93a-11ee-88e0-f1fec9a6c977', 'H010', 'BLEFARITIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(680, 'f39fa780-b93a-11ee-a55e-e18c3a91c52c', 'H011', 'DERMATOSIS NO INFECCIOSA DEL PARPADO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(681, 'f39fb380-b93a-11ee-93b8-816ca3025017', 'H018', 'OTRAS INFLAMACIONES ESPECIFICADAS DEL PARPADO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(682, 'f39fbf40-b93a-11ee-8238-0344157308c7', 'H019,\"INFLAMACION DEL PARPADO, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(683, 'f39fc9c0-b93a-11ee-b551-b973b0e2fa9d', 'H020', 'ENTROPION Y TRIQUIASIS PALPEBRAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(684, 'f39fd580-b93a-11ee-af22-d7c0aff00a11', 'H021', 'ECTROPION DEL PARPADO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(685, 'f39fe0a0-b93a-11ee-bf33-81981b900bd3', 'H022', 'LAGOFTALMOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(686, 'f39feb80-b93a-11ee-8162-f7dc87de4f34', 'H024', 'BLEFAROPTOSIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(687, 'f39ff7d0-b93a-11ee-99aa-f5f811c443db', 'H025', 'OTROS TRASTORNOS FUNCIONALES DEL PARPADO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(688, 'f3a001a0-b93a-11ee-8f27-993dcd0e8d4d', 'H026', 'XANTELASMA DEL PARPADO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(689, 'f3a00b30-b93a-11ee-9975-3936038f26cb', 'H028', 'OTROS TRASTORNOS ESPECIFICADOS DEL PARPADO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(690, 'f3a01530-b93a-11ee-a16b-bb9be556ca69', 'H029,\"TRASTORNOS DEL PARPADO, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(691, 'f3a01f60-b93a-11ee-80e8-df9855ddba26', 'H100', 'CONJUNTIVITIS MUCOPURULENTA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(692, 'f3a02900-b93a-11ee-b7f5-9968d3549237', 'H101', 'CONJUNTIVITIS ATOPICA AGUDA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(693, 'f3a03290-b93a-11ee-af8f-e1325fb0ba41', 'H102', 'OTRAS CONJUNTIVITIS AGUDAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(694, 'f3a03c60-b93a-11ee-ab5c-a72a6ce6e2fe', 'H103,\"CONJUNTIVITIS AGUDA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(695, 'f3a04670-b93a-11ee-9c65-691aa88e7dfe', 'H104', 'CONJUNTIVITIS CRONICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(696, 'f3a05100-b93a-11ee-a4a5-8d788136fc05', 'H105', 'BLEFAROCONJUNTIVITIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(697, 'f3a05fa0-b93a-11ee-8aaf-a1ff16c8de7b', 'H108', 'OTRAS CONJUNTIVITIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(698, 'f3a07070-b93a-11ee-b1d7-1b20a5c6d54c', 'H109,\"CONJUNTIVITIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(699, 'f3a07cc0-b93a-11ee-8276-bbb3c8594b29', 'H110', 'PTERIGION', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(700, 'f3a08760-b93a-11ee-baa7-eb07226c78f1', 'H111', 'DEGENERACIONES Y DEPOSITOS CONJUNTIVALES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(701, 'f3a09200-b93a-11ee-ad55-a7ebeeb9306a', 'H133', 'PENFIGOIDE OCULAR (L12.-�', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(702, 'f3a09c40-b93a-11ee-9ebe-35ccde781de8', 'H138', 'OTROS TRASTORNOS DE LA CONJUNTIVA EN ENFERMEDADES CLASIFICADAS EN OTRA PARTE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(703, 'f3a0a660-b93a-11ee-96dd-c136bcd0073c', 'H150', 'ESCLERITIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(704, 'f3a0b0d0-b93a-11ee-b8b2-e3784adc328c', 'H151', 'EPISCLERITIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(705, 'f3a0bd70-b93a-11ee-a553-cf85dde01db3', 'H158', 'OTROS TRASTORNOS DE LA ESCLEROTICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(706, 'f3a0cb60-b93a-11ee-b00b-69cde74b25a6', 'H159,\"TRASTORNOS DE LA ESCLEROTICA, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(707, 'f3a0d8d0-b93a-11ee-b5c3-dbfde6724870', 'H160', 'ULCERA DE LA CORNEA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(708, 'f3a0e540-b93a-11ee-8fff-41edda5c7153', 'H161', 'OTRAS QUERATITIS SUPERFICIALES SIN CUNJUNTIVITIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(709, 'f3a0f160-b93a-11ee-8ad1-53500baaf0ad', 'H162', 'QUERATOCONJUNTIVITIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(710, 'f3a0fd90-b93a-11ee-addd-215e385d13e6', 'H169,\"QUERATITIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(711, 'f3a10a40-b93a-11ee-bc8e-1b31213a0b43', 'H269,\"CATARATA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(712, 'f3a116e0-b93a-11ee-872f-e9806ead4912', 'H920', 'OTALGIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(713, 'f3a12320-b93a-11ee-aa1e-81c80fec7034', 'H921', 'OTORREA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(714, 'f3a12f80-b93a-11ee-8e4e-311c92a51e4e', 'H922', 'OTORRAGIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(715, 'f3a13b90-b93a-11ee-b969-65d5e1b3ed40', 'I830', 'VENAS VARICOSAS DE LOS MIEMBROS INFERIORES CON ULCERA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(716, 'f3a14770-b93a-11ee-89b6-a707c3b6b437', 'I831', 'VENAS VARICOSAS DE LOS MIEMBROS INFERIORES CON INFLAMACION', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(717, 'f3a153b0-b93a-11ee-8e69-93de55702a7a', 'I832', 'VENAS VARICOSAS DE LOS MIEMBROS INFERIORES CON ULCERA E INFLAMACION', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(718, 'f3a15fd0-b93a-11ee-8157-19e93e2d041f', 'I839', 'VENAS VARICOSAS DE LOS MIEMBROS INFERIORES SIN ULCERA NI INFLAMACION', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(719, 'f3a16be0-b93a-11ee-9f5a-418db8dd5aeb', 'I840', 'HEMORROIDES INTERNAS TROMBOSADAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(720, 'f3a177d0-b93a-11ee-82ce-118c03a0f19d', 'I841', 'HEMORROIDES INTERNAS CON OTRAS COMPLICACIONES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(721, 'f3a18410-b93a-11ee-8b15-83c089248448', 'I842', 'HEMORROIDES INTERNAS SIN COMPLICACION', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(722, 'f3a19000-b93a-11ee-b72a-c1d5d07db2fe', 'I843', 'HEMORROIDES EXTERNAS TROMBOSADAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(723, 'f3a19bd0-b93a-11ee-9f2e-f73aad16bb47', 'I844', 'HEMORROIDES EXTERNAS CON OTRAS COMPLICACIONES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(724, 'f3a1a860-b93a-11ee-84ba-1d9399a7094d', 'I845', 'HEMORROIDES EXTERNAS SIN COMPLICACION', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(725, 'f3a1b4e0-b93a-11ee-be39-6340f64427a7', 'I846,\"PROMINENCIAS CUTANEAS, RESIDUO DE HEMORROIDES\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(726, 'f3a1c0f0-b93a-11ee-9f9c-c90e5bc8d89d', 'I847', 'HEMORROIDES TROMBOSADAS NO ESPECIFICADAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(727, 'f3a1cd80-b93a-11ee-9bc8-e92fb5313e70', 'I848,\"HEMORROIDES NO ESPECIFICADAS, CON OTRAS COMPLICACIONES\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(728, 'f3a1d9d0-b93a-11ee-a995-6df5385d7a9e', 'I849,\"HEMORROIDES NO ESPECIFICADAS, SIN COMPLICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(729, 'f3a1e5b0-b93a-11ee-9ff6-9ba6ddd6bd4c', 'I868', 'VARICES EN OTROS SITIOS ESPECIFICADOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(730, 'f3a1f1c0-b93a-11ee-a151-bdc8155e363f', 'I889', 'LINFADENITIS INESPECIFICA NO ESPECIFICADA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(731, 'f3a1fdc0-b93a-11ee-85cd-afa3dd3dcf8a', 'I890,\"LINFEDEMA, NO CLASIFICADO EN OTRA PARTE\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(732, 'f3a209d0-b93a-11ee-999c-b1cd796a3572', 'I891', 'LINFANGITIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(733, 'f3a215b0-b93a-11ee-b1b9-07fdcd21927a', 'J018', 'OTRAS SINUSITIS AGUDAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(734, 'f3a22230-b93a-11ee-aa39-db414adb0794', 'J019,\"SINUSITIS AGUDA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(735, 'f3a22e20-b93a-11ee-8c02-93c27a8aaf66', 'J020', 'FARINGITIS ESTREPTOCOCICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(736, 'f3a23a40-b93a-11ee-be3d-e17b4f0ce47e', 'J029,\"FARINGITIS AGUDA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(737, 'f3a246f0-b93a-11ee-a6c8-bbbed62cadd5', 'J039,\"AMIGDALITIS AGUDA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(738, 'f3a25320-b93a-11ee-bb6e-13e3a49317d3', 'J300', 'RINITIS VASOMOTORA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(739, 'f3a25f20-b93a-11ee-8905-053e911fff0e', 'J301', 'RINITIS ALERGICA DEBIDA AL POLEN', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(740, 'f3a26b70-b93a-11ee-881b-cd14a9f5d368', 'J302', 'OTRA RINITIS ALERGICA ESTACIONAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(741, 'f3a27750-b93a-11ee-804c-bf29c566dd6f', 'J303', 'OTRAS RINITIS ALERGICAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(742, 'f3a28360-b93a-11ee-9784-85986095a952', 'J304,\"RINITIS ALERGICA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(743, 'f3a28fc0-b93a-11ee-a4b0-990fb6339b1e', 'J310', 'RINITIS CRONICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(744, 'f3a29bd0-b93a-11ee-9534-4bb1f7beba11', 'J312', 'FARINGITIS CRONICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(745, 'f3a2a7c0-b93a-11ee-baea-d75be747fdf3', 'J328', 'OTRAS SINUSITIS CRONICAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(746, 'f3a2b3f0-b93a-11ee-82f4-cdffe08a7901', 'J329,\"SINUSITIS CRONICA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(747, 'f3a2bff0-b93a-11ee-a7a5-31c418649844', 'J330', 'POLIPO DE LA CAVIDAD NASAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(748, 'f3a2cc00-b93a-11ee-be8f-df03c9b1f6d4', 'J339,\"POLIPO NASAL, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(749, 'f3a2d870-b93a-11ee-a41f-c9b404594da5', 'J340,\"ABSCESO, FURUNCULO Y ANTRAX DE LA NARIZ\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(750, 'f3a2e520-b93a-11ee-b377-6bb88aff4cb4', 'J341', 'QUISTE Y MUCOCELE DE LA NARIZ Y DEL SENO PARANASAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(751, 'f3a2f160-b93a-11ee-9596-d7b20fcf9f8e', 'J343', 'HIPERTROFIA DE LOS CORNETES NASALES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(752, 'f3a2fd50-b93a-11ee-9561-752e46194450', 'K050', 'GINGIVITIS AGUDA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(753, 'f3a309c0-b93a-11ee-8842-3bd13fb56dd6', 'K051', 'GINGIVITIS CRONICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(754, 'f3a31590-b93a-11ee-a603-8742d7e8cc34', 'K112', 'SIALADENITIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(755, 'f3a32180-b93a-11ee-9d77-215f7bc61995', 'K113', 'ABSCESO DE GLANDULA SALIVAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(756, 'f3a32da0-b93a-11ee-b828-fda20878beac', 'K114', 'FISTULA DE GLANDULA SALIVAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(757, 'f3a33990-b93a-11ee-af95-d3f0773d5d60', 'K115', 'SIALOLITIASIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(758, 'f3a34590-b93a-11ee-abcf-25792ae0aeea', 'K116', 'MUCOCELE DE GLANDULA SALIVAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(759, 'f3a35180-b93a-11ee-a96f-1395eddba14d', 'K117', 'ALTERACIONES DE LA SECRECION SALIVAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(760, 'f3a35d80-b93a-11ee-967b-877b32fd97a6', 'K118', 'OTRAS ENFERMEDADES DE LAS GLANDULAS SALIVALES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(761, 'f3a36980-b93a-11ee-ae9a-ebfa7dcafa84', 'K119', 'ENFERMEDAD DE GLANDULA SALIVAL. NO ESPECIFICADA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(762, 'f3a37570-b93a-11ee-a725-ef4d4c635864', 'K120', 'ESTOMATITIS AFTOSA RECURRENTE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(763, 'f3a38170-b93a-11ee-b1f7-7f4545735024', 'K121', 'OTRAS FORMAS DE ESTOMATITIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(764, 'f3a38d70-b93a-11ee-a288-19384f37bf31', 'K122', 'CELULITIS Y ABSCESO DE BOCA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(765, 'f3a39930-b93a-11ee-8645-7b1169e0747e', 'K130', 'ENFERMEDADES DE LOS LABIOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(766, 'f3a3a560-b93a-11ee-b575-5122a8fe9f76', 'K131', 'MORDEDURA DEL LABIO Y DE LA MEJILLA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(767, 'f3a3b170-b93a-11ee-b509-3d8e8da6bb31', 'K132,\"LEUCOPLASIA Y OTRAS ALTERACIONES DEL EPITELIO BUCAL, INCLUYENDO LA LENGUA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(768, 'f3a3bd70-b93a-11ee-a637-ed3f1f955832', 'K133', 'LEUCOPLASIA PILOSA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(769, 'f3a3c9a0-b93a-11ee-b591-29582db2c1ce', 'K134', 'GRANULOMA Y LESIONES SEMEJANTES DE LA MUCOSA BUCAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(770, 'f3a3d5c0-b93a-11ee-a13e-814a41c8c445', 'K135', 'FIBROSIS DE LA SUBMUCOSA BUCAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(771, 'f3a3e1a0-b93a-11ee-92e1-6704e0321b9a', 'K136', 'HIPERPLASIA IRRITATIVA DE LA MUCOSA BUCAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(772, 'f3a3ee20-b93a-11ee-870c-0fd39fc162b8', 'K137', 'OTRAS LESIONES Y LAS NO ESPECIFICADAS DE LA MUCOSA BUCAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(773, 'f3a3fa30-b93a-11ee-b2fe-17d956b842c7', 'K140', 'GLOSITIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(774, 'f3a40610-b93a-11ee-af70-edbdb29027b4', 'K141', 'LENGUA GEOGRAFICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(775, 'f3a41200-b93a-11ee-abac-037452c58e5f', 'K142', 'GLOSITIS ROMBOIDEA MEDIANA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(776, 'f3a41e20-b93a-11ee-8d18-d9227ca085c3', 'K143', 'HIPERTROFIA DE LAS PAPILAS LINGUALES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(777, 'f3a42a20-b93a-11ee-88c1-93a6e586498d', 'K144', 'ATROFIA DE LAS PAPILAS LINGUALES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(778, 'f3a43610-b93a-11ee-aa56-4da1c1610e5c', 'K145', 'LENGUA PLEGADA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(779, 'f3a44230-b93a-11ee-af18-37c6567a7136', 'K146', 'GLOSODINIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(780, 'f3a44e00-b93a-11ee-a632-a9b84c9bdfd1', 'K148', 'OTRAS ENFERMEDADES DE LA LENGUA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(781, 'f3a45a30-b93a-11ee-b689-e51ac4df1068', 'K149,\"ENFERMEDAD DE LA LENGUA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(782, 'f3a46670-b93a-11ee-bf72-2f1c4c0bfeb5', 'K738,\"OTRAS HEPATITIS CRONICAS, NO CLASIFICADAS EN OTRA PARTE\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(783, 'f3a472a0-b93a-11ee-b40a-91c0209a28d2', 'K739,\"HEPATITIS CRONICA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(784, 'f3a47e90-b93a-11ee-bc45-9738d056b52e', 'K754', 'HEPATITIS AUTOINMUNE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(785, 'f3a48ae0-b93a-11ee-a37b-c305d5fa4249', 'L00X', 'SINDROME ESTAFILOCOCICO DE LA PIEL ESCALDADA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(786, 'f3a496d0-b93a-11ee-99cd-1b1f999f372e', 'L010', 'IMPETIGO [CUALQUIER SITIO ANATOMICO] [CUALQUIER ORGANISMO]', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(787, 'f3a4a2c0-b93a-11ee-b244-33fa0aa03f61', 'L011', 'IMPETIGINIZACION DE OTRAS DERMATOSIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(788, 'f3a4af40-b93a-11ee-b983-eb38c006a70b', 'L020,\"ABSCESO CUTANEO, FURUNCULO Y ANTRAX DE LA CARA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(789, 'f3a4bc40-b93a-11ee-b63b-9fd67fa90a07', 'L021,\"ABSCESO CUTANEO, FURUNCULO Y ANTRAX DE LA CUELLO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(790, 'f3a4c880-b93a-11ee-9a9c-cfdce4415073', 'L022,\"ABSCESO CUTANEO, FURUNCULO Y ANTRAX DEL TRONCO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(791, 'f3a4d4d0-b93a-11ee-b8eb-6941cb0cee3e', 'L023,\"ABSCESO CUTANEO, FURUNCULO Y ANTRAX DE GLUTEOS\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(792, 'f3a4e140-b93a-11ee-8ea0-c7dc9776a9ec', 'L024,\"ABSCESO CUTANEO, FURUNCULO Y ANTRAX DE MIEMBRO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(793, 'f3a4ed60-b93a-11ee-8aa0-1d690d7d1d04', 'L028,\"ABSCESO CUTANEO, FURUNCULO Y ANTRAX DE OTROS SITIOS\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(794, 'f3a4f980-b93a-11ee-8d36-6936390650a4', 'L029,\"ABSCESO CUTANEO, FURUNCULO Y ANTRAX DE SITIO NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(795, 'f3a505a0-b93a-11ee-a3c4-b1427b2ac798', 'L030', 'CELULITIS DE LOS DEDOS DE LA MANO Y DEL PIE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(796, 'f3a511c0-b93a-11ee-88ce-853730487e1c', 'L031', 'CELULITIS DE OTRAS PARTES DE LOS MIEMBROS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(797, 'f3a51f70-b93a-11ee-916e-03f7143bfa64', 'L032', 'CELULITIS DE LA CARA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(798, 'f3a52bb0-b93a-11ee-9f98-8d8e2f4c187b', 'L033', 'CELULITIS DEL TRONCO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(799, 'f3a53780-b93a-11ee-a57f-2d868a355e75', 'L038', 'CELULITIS DE OTROS SITIOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(800, 'f3a54370-b93a-11ee-a283-0b31575f940a', 'L039', 'CELULITIS DE SITIO NO ESPECIFICADO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(801, 'f3a54fa0-b93a-11ee-9f3a-973198bc4c8a', 'L040,\"LINFADENITIS AGUDA DE CARA, CABEZA Y CUELLO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(802, 'f3a55ba0-b93a-11ee-af71-7b4fc1db2c37', 'L041', 'LINFADENITIS AGUDA DEL TRONCO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(803, 'f3a56780-b93a-11ee-80aa-0f8781c1e028', 'L042', 'LINFADENITIS AGUDA DEL MIEMBRO SUPERIOR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(804, 'f3a57400-b93a-11ee-a310-7b8f3f44fa8c', 'L043', 'LINFADENITIS AGUDA DEL MIEMBRO INFERIOR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(805, 'f3a58030-b93a-11ee-9813-2f0b5039b4b8', 'L048', 'LINFADENITIS AGUDA DE OTROS SITIOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(806, 'f3a58c20-b93a-11ee-9d02-dbd8ae2caa59', 'L049', 'LINFADENITIS AGUDA DE SITIO NO ESPECIFICADO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(807, 'f3a59c40-b93a-11ee-8e4e-c560230e7600', 'L050', 'QUISTE PILONIDAL CON ABSCESO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(808, 'f3a5aaa0-b93a-11ee-af01-c53f7e55912d', 'L059', 'QUISTE PILONIDAL SIN ABSCESO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(809, 'f3a5b690-b93a-11ee-b1c4-7f0a26e78ba4', 'L080', 'PIODERMA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(810, 'f3a5c150-b93a-11ee-a5b3-017fc74590a6', 'L081', 'ERITRASMA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(811, 'f3a5cb90-b93a-11ee-94cf-9135c7b9c483', 'L088', 'OTRAS INFECCIONES LOCALES ESPECIFICADAS DE LA PIEL Y DEL TEJIDO SUBCUTANEO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(812, 'f3a5d5b0-b93a-11ee-a38a-2fbb9d75b4f0', 'L089,\"INFECCION LOCAL DE LA PIEL Y DEL TEJIDO SUBCUTANEO, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(813, 'f3a5dfc0-b93a-11ee-b244-b9de41506e3f', 'L100', 'PENFIGO VULGAR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(814, 'f3a5ea30-b93a-11ee-9395-2b3a3f39754a', 'L101', 'PENFIGO VEGETANTE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(815, 'f3a5f420-b93a-11ee-b6ec-0147b07545e8', 'L102', 'PENFIGO FOLIACEO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(816, 'f3a5fde0-b93a-11ee-98f9-313c68ad501b', 'L103', 'PENFIGO BRASILEÑO [FOGO SELVAGEM', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(817, 'f3a607e0-b93a-11ee-897d-cfdbf755bc24', 'L104', 'PENFIGO ERITEMATOSO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(818, 'f3a611f0-b93a-11ee-ac65-439a69e7b508', 'L105', 'PENFIGO INDUCIDO POR DROGAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(819, 'f3a61c00-b93a-11ee-997a-d7ee5208280e', 'L108', 'OTROS PENFIGOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(820, 'f3a62620-b93a-11ee-8dd4-1b24c325b01e', 'L109,\"PENFIGO, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(821, 'f3a63070-b93a-11ee-804c-1bf1b5d8d77f', 'L110', 'QUERATOSIS FOLICULAR ADQUIRIDA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(822, 'f3a63b50-b93a-11ee-923a-8194a7fe5316', 'L111', 'DERMATOSIS ACANTOLITICA TRANSITORIA [GROVER]', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(823, 'f3a64580-b93a-11ee-8270-d5cd47a1b3a8', 'L118', 'OTROS TRASTORNOS ACANTOLITICOS ESPECIFICADOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(824, 'f3a64f40-b93a-11ee-a48f-4f11a125c907', 'L119,\"TRASTORNO ACANTOLITICO, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(825, 'f3a65920-b93a-11ee-a6ea-4dc70119183d', 'L120', 'PENFIGOIDE FLICTENULAR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(826, 'f3a66330-b93a-11ee-aa2b-51864d574cbc', 'L121', 'PENFIGOIDE CICATRICIAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(827, 'f3a66d40-b93a-11ee-8e89-49af134a624b', 'L122', 'ENFERMEDAD FLICTENULAR CRONICA DE LA INFANCIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(828, 'f3a67710-b93a-11ee-a58b-330d8909e767', 'L123', 'EPIDERMOLISIS BULLOSA ADQUIRIDA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(829, 'f3a680e0-b93a-11ee-92b8-81cc2dd846a2', 'L128', 'OTROS PENFIGOIDES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(830, 'f3a68b40-b93a-11ee-969b-412063efc6af', 'L129,\"PENFIGOIDE, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(831, 'f3a694f0-b93a-11ee-9d2d-bd1b58903df0', 'L130', 'DERMATITIS HERPETIFORME', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(832, 'f3a69e90-b93a-11ee-a909-d7ce13ca17f1', 'L131', 'DERMATITIS PUSTULOSA SUBCORNEAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(833, 'f3a6a850-b93a-11ee-b23c-f5a3b3cf7cf4', 'L138', 'OTROS TRASTORNOS FLICTENULARES ESPECIFICADOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(834, 'f3a6b2d0-b93a-11ee-92db-b73d843d511b', 'L139,\"TRASTORNO FLICTENULAR, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(835, 'f3a6bca0-b93a-11ee-8467-d79e02b46113', 'L14X', 'TRASTORNOS FLICTENULARES EN ENFERMEDADES CLASIFICADAS EN OTRA PARTE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(836, 'f3a6c660-b93a-11ee-892b-1127cde8df88', 'L200', 'PRURIGO DE BESNIER', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(837, 'f3a6d000-b93a-11ee-babf-d3ec082ccd58', 'L208', 'OTRAS DERMATITIS ATOPICAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(838, 'f3a6da70-b93a-11ee-8264-8dd1655535fd', 'L209,\"DERMATITIS ATOPICA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(839, 'f3a6e400-b93a-11ee-8f6c-25776b72184b', 'L210', 'SEBORREA CAPITIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(840, 'f3a6ee60-b93a-11ee-b4d7-3fc11d61ecf8', 'L211', 'DERMATITIS SEBORREICA INFANTIL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(841, 'f3a6f830-b93a-11ee-9a0b-13cc9683fe56', 'L218', 'OTRAS DERMATITIS SEBORREICAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(842, 'f3a70300-b93a-11ee-a6a6-67b74f909ce1', 'L219,\"DERMATITIS SEBORREICA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(843, 'f3a70d10-b93a-11ee-9cb2-5722bea0d674', 'L22X', 'DERMATITIS DEL PAÑA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(844, 'f3a716d0-b93a-11ee-86ae-a5e9f29902cb', 'L230', 'DERMATITIS ALERGICA DE CONTACTO DEBIDA A METALES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(845, 'f3a720d0-b93a-11ee-ba71-a78c3b451be0', 'L231', 'DERMATITIS ALERGICA DE CONTACTO DEBIDA A ADHESIVOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(846, 'f3a72ae0-b93a-11ee-9244-6fa07d7bb14b', 'L232', 'DERMATITIS ALERGICA DE CONTACTO DEBIDA A COSMETICOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(847, 'f3a73520-b93a-11ee-8aed-4100e23b05c1', 'L233', 'DERMATITIS ALERGICA DE CONTACTO DEBIDA A DROGAS EN CONTACTO CON LA PIEL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(848, 'f3a73ec0-b93a-11ee-87c5-cf7a4b54379c', 'L234', 'DERMATITIS ALERGICA DE CONTACTO DEBIDA A COLORANTES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(849, 'f3a74900-b93a-11ee-91ff-a5dd1a6b421a', 'L235', 'DERMATITIS ALERGICA DE CONTACTO DEBIDA A OTROS PRODUCTOS QUIMICOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(850, 'f3a75300-b93a-11ee-b4de-dbe97c6ea8a2', 'L236', 'DERMATITIS ALERGICA DE CONTACTO DEBIDA A ALIMENTOS EN CONTACTO CON LA PIEL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(851, 'f3a75ce0-b93a-11ee-8995-f5ff1726ef39', 'L237,\"DERMATITIS ALERGICA DE CONTACTO DEBIDA A PLANTAS, EXCEPTO LAS ALIMENTICIAS\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(852, 'f3a766d0-b93a-11ee-b059-57dc2641310c', 'L238', 'DERMATITIS ALERGICA DE CONTACTO DEBIDA A OTROS AGENTES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(853, 'f3a77100-b93a-11ee-98cb-3dc5c19cf77c', 'L239,\"DERMATITIS ALERGICA DE CONTACTO, DE CAUSA NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(854, 'f3a77b10-b93a-11ee-b1f5-b5781b42d024', 'L240,\"DERMATITIS DE CONTACTO POR IRRITANTES, DEBIDA A DETERGENTES\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(855, 'f3a784f0-b93a-11ee-a664-d3e7620280d6', 'L241,\"DERMATITIS DE CONTACTO POR IRRITANTES, DEBIDA A ACEITES Y GRASAS\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(856, 'f3a78ec0-b93a-11ee-bdab-95d00a221aab', 'L242,\"DERMATITIS DE CONTACTO POR IRRITANTES, DEBIDA A DISOLVENTES\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(857, 'f3a79950-b93a-11ee-a113-7dedbe9d195e', 'L243,\"DERMATITIS DE CONTACTO POR IRRITANTES, DEBIDA A COSMETICOS\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(858, 'f3a7a380-b93a-11ee-82d8-079c7c59b7c4', 'L244,\"DERMATITIS DE CONTACTO POR IRRITANTES, DEBIDA A DROGAS EN CONTACTO CON LA PIEL\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(859, 'f3a7ad60-b93a-11ee-978f-b9e39da9e04b', 'L245,\"DERMATITIS DE CONTACTO POR IRRITANTES, DEBIDA A OTROS PRODUCTOS QUIMICOS\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(860, 'f3a7b720-b93a-11ee-94cc-711c1cb6b0a9', 'L246,\"DERMATITIS DE CONTACTO POR IRRITANTES, DEBIDA A ALIMENTOS EN CONTACTO CON LA PIEL\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(861, 'f3a7c1a0-b93a-11ee-acea-59385e121093', 'L247,\"DERMATITIS DE CONTACTO POR IRRITANTES, DEBIDA A PLANTAS, EXCEPTO LAS ALIMENTICIAS\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(862, 'f3a7cbb0-b93a-11ee-849b-5bf99eb1814b', 'L248,\"DERMATITIS DE CONTACTO POR IRRITANTES, DEBIDA A OTROS AGENTES\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(863, 'f3a7d5c0-b93a-11ee-86b4-afc75352c51d', 'L249,\"DERMATITIS DE CONTACTO POR IRRITANTES, DE CAUSA NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(864, 'f3a7df90-b93a-11ee-844b-c5df0877a3f7', 'L250,\"DERMATITIS DE CONTACTO, FORMA NO ESPECIFICADA, DEBIDA A COSMETICOS\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(865, 'f3a7e9c0-b93a-11ee-96b0-2ba21eb4f1e1', 'L251,\"DERMATITIS DE CONTACTO, FORMA NO ESPECIFICADA, DEBIDA A DROGAS EN CONTACTO CON LA PIEL\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(866, 'f3a7f400-b93a-11ee-837f-39873bae50dc', 'L252,\"DERMATITIS DE CONTACTO, FORMA NO ESPECIFICADA, DEBIDA A COLORANTES\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(867, 'f3a7fe00-b93a-11ee-8fb6-3f31d8604a4a', 'L253,\"DERMATITIS DE CONTACTO, FORMA NO ESPECIFICADA, DEBIDA A OTROS PRODUCTOS QUIMICOS\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(868, 'f3a80810-b93a-11ee-9db7-1d0f7910217b', 'L254,\"DERMATITIS DE CONTACTO, FORMA NO ESPECIFICADA, DEBIDA A ALIMENTOS EN CONTACTO CON LA PIEL\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(869, 'f3a81280-b93a-11ee-b966-5d6f85905362', 'L255,\"DERMATITIS DE CONTACTO, FORMA NO ESPECIFICADA, , DEBIDA A PLANTAS, EXCEPTO LAS ALIMENTICIAS\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(870, 'f3a81ca0-b93a-11ee-af41-9709e2765189', 'L258,\"DERMATITIS DE CONTACTO, FORMA NO ESPECIFICADA, DEBIDA A OTROS AGENTES\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(871, 'f3a82680-b93a-11ee-8a17-6b52d496718a', 'L259,\"DERMATITIS DE CONTACTO, FORMA Y CAUSA NO ESPECIFICADAS\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(872, 'f3a83200-b93a-11ee-a040-f55f5f66009c', 'L26X', 'DERMATITIS EXFOLIATIVA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(873, 'f3a83d80-b93a-11ee-b0d8-b1d4d350c3bc', 'L270', 'ERUPCION CUTANEA GENERALIZADA DEBIDA A DROGAS Y MEDICAMENTOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(874, 'f3a84780-b93a-11ee-8dbc-3b964f2daad9', 'L271', 'ERUPCION CUTANEA LOCALIZADA DEBIDA A DROGAS Y MEDICAMENTOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(875, 'f3a85120-b93a-11ee-9315-e3ed23540fbc', 'L272', 'DERMATITIS DEBIDA A INGESTION DE ALIMENTOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(876, 'f3a85b60-b93a-11ee-bbb7-55b5c3e58ad7', 'L278', 'DERMATITIS DEBIDA A OTRAS SUSTANCIAS INGERIDAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(877, 'f3a86510-b93a-11ee-afd8-a5ef8bff9151', 'L279', 'DERMATITIS DEBIDA A SUSTANCIAS INGERIDAS NO ESPECIFICADAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(878, 'f3a86ee0-b93a-11ee-97a3-35455e98fe7e', 'L280', 'LIQUEN SIMPLE CRONICO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(879, 'f3a87860-b93a-11ee-8f24-05ccac617c50', 'L281', 'PRURIGO NODULAR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(880, 'f3a88270-b93a-11ee-b11d-a53f4441d1ea', 'L282', 'OTROS PRURIGOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(881, 'f3a88c20-b93a-11ee-9601-c1e1149ef4f0', 'L290', 'PRURITO ANAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(882, 'f3a895a0-b93a-11ee-8018-f3dc98227ed7', 'L291', 'PRURITO ESCROTAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(883, 'f3a89f40-b93a-11ee-a9b9-f1b0d4c4425a', 'L292', 'PRURITO VULVAR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(884, 'f3a8a970-b93a-11ee-89d2-85e1cc074494', 'L293,\"PRURITO ANOGENITAL, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(885, 'f3a8b340-b93a-11ee-b81e-eb8c9928b55c', 'L298', 'OTROS PRURITOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(886, 'f3a8bd00-b93a-11ee-8615-a9f27bf98f0e', 'L299,\"PRURITO, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(887, 'f3a8c6c0-b93a-11ee-80d2-57c4cef29767', 'L300', 'DERMATITIS NUMULAR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(888, 'f3a8d0e0-b93a-11ee-8f19-0d09cadecf59', 'L301', 'DISHIDROSIS [PONFOLIX]', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(889, 'f3a8daa0-b93a-11ee-b62a-e570a9cd913c', 'L302', 'AUTOSENSIBILIZACION CUTANEA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(890, 'f3a8e440-b93a-11ee-9116-e14252cc0744', 'L303', 'DERMATITIS INFECCIOSA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(891, 'f3a8ede0-b93a-11ee-bff7-29de862fcc9f', 'L304', 'ERITEMA INTERTRIGO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(892, 'f3a8f7f0-b93a-11ee-9478-f3cc4bd78c75', 'L305', 'PITIRIASIS ALBA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(893, 'f3a90190-b93a-11ee-b2f9-b5a6afea11cc', 'L308', 'OTRAS DERMATITIS ESPECIFICADAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(894, 'f3a90b50-b93a-11ee-b835-e9ea0f826790', 'L309,\"DERMATITIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(895, 'f3a914f0-b93a-11ee-8575-7f69bd4472da', 'L400', 'PSORIASIS VULGAR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(896, 'f3a91f10-b93a-11ee-9901-5313318c3698', 'L401', 'PSORIASIS PUSTULOSA GENERALIZADA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(897, 'f3a92900-b93a-11ee-b099-3546be71bfbd', 'L402', 'ACRODERMATITIS CONTINUA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(898, 'f3a93290-b93a-11ee-b8ef-fdaf306835bd', 'L403', 'PUSTULOSIS PALMAR Y PLANTAR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(899, 'f3a93c20-b93a-11ee-baee-050ccbf0db39', 'L404', 'PSORIASIS GUTTATA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(900, 'f3a94600-b93a-11ee-ac0b-13078f07012b', 'L405,\"ARTROPATIA PSORIASICA (M07.0*-M07.3*, M09.0*)\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(901, 'f3a94fb0-b93a-11ee-84e1-ab61e40a8049', 'L408', 'OTRAS PSORIASIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(902, 'f3a95960-b93a-11ee-889d-3516656511df', 'L409,\"PSORIASIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(903, 'f3a962f0-b93a-11ee-9e73-45940f459143', 'L410', 'PITIRIASIS LINQUENOIDE Y VARIOLIFORME AGUDA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(904, 'f3a96d10-b93a-11ee-a90b-03ea617f8f3b', 'L411', 'PITIRIASIS LINQUENOIDE CRONICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(905, 'f3a976c0-b93a-11ee-8eec-e7b7de38fb16', 'L412', 'PAPULOSIS LINFOMATOIDE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(906, 'f3a98050-b93a-11ee-85e3-59ebf79509fe', 'L413', 'PARAPSORIASIS EN PLACAS PEQUEÑA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(907, 'f3a989e0-b93a-11ee-ad48-b3e13d503b69', 'L414', 'PARAPSORIASIS EN PLACAS GRANDES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(908, 'f3a993f0-b93a-11ee-a6bb-cb8166ffc4d9', 'L415', 'PARAPSORIASIS RETIFORME', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(909, 'f3a99d90-b93a-11ee-b9b6-f155cf12223f', 'L418', 'OTRAS PARAPSORIASIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(910, 'f3a9a750-b93a-11ee-836f-fffa2001368e', 'L419,\"PARAPSORIASIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(911, 'f3a9b0e0-b93a-11ee-9abe-61f4678c38d8', 'L42X', 'PITIRIASIS ROSADA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(912, 'f3a9bb00-b93a-11ee-b4c2-f9785ab2fea3', 'L430', 'LIQUEN PLANO HIPERTROFICO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(913, 'f3a9c4b0-b93a-11ee-8ef7-f5eebcfdd55a', 'L431', 'LIQUEN PLANO FLICTENULAR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(914, 'f3a9ce30-b93a-11ee-bcc8-57951d722faa', 'L432', 'REACCION LINQUENOIDE DEBIDA A DROGAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(915, 'f3a9d7c0-b93a-11ee-96c5-5592ffe19f59', 'L433', 'LIQUEN PLANO SUBAGUDO (ACTIVO)', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(916, 'f3a9e1b0-b93a-11ee-8cda-9d4b4c40f5ba', 'L438', 'OTROS LIQUENES PLANOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(917, 'f3a9eb90-b93a-11ee-bcdb-793076748f8f', 'L439,\"LIQUEN PLANO, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(918, 'f3a9f540-b93a-11ee-8523-df2ecdefb7b8', 'L440', 'PITIRIASIS RUBRA PILARIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(919, 'f3a9fed0-b93a-11ee-8a75-63d99386267d', 'L441', 'LIQUEN NITIDO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(920, 'f3aa08d0-b93a-11ee-82ea-31ef6d1a9cf9', 'L442', 'LIQUEN ESTRIADO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(921, 'f3aa1280-b93a-11ee-9a20-1ff6a67893b9', 'L443', 'LIQUEN ROJO MONILIFORME', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(922, 'f3aa1c50-b93a-11ee-be91-a78f2a358a69', 'L444', 'ACRODERMATITIS PAPULAR INFANTIL [GIANNOTTI-CROSTI]', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(923, 'f3aa25e0-b93a-11ee-9dac-c3bb8b48a461', 'L448', 'OTROS TRASTORNOS PALPULOESCAMOSOS ESPECIFICADOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(924, 'f3aa3010-b93a-11ee-a963-37adcdc58d8a', 'L449,\"TRASTORNO PAPULOESCAMOSO, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(925, 'f3aa39d0-b93a-11ee-9ae7-d5fefbd40bdf', 'L45X', 'TRASTORNOS PAPULOESCAMOSOS EN ENFERMEDADES CLASIFICADAS EN OTRA PARTE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(926, 'f3aa4350-b93a-11ee-9724-39b61c6c7928', 'L500', 'URTICARIA ALERGICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(927, 'f3aa4ce0-b93a-11ee-b7e1-b956284eb49b', 'L501', 'URTICARIA IDIOPATICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(928, 'f3aa56d0-b93a-11ee-906c-f9c170e5ae8c', 'L502', 'URTICARIA DEBIDA AL CALOR Y AL FRIO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(929, 'f3aa6070-b93a-11ee-9686-917e67aa3d61', 'L503', 'URTICARIA DERMATOGRAFICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(930, 'f3aa69f0-b93a-11ee-b7bf-83aec12de3ab', 'L504', 'URTICARIA VIBRATORIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(931, 'f3aa7370-b93a-11ee-8c31-f996ad3749e4', 'L505', 'URTICARIA COLINERGICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(932, 'f3aa7d30-b93a-11ee-942c-1bbee5d78eb6', 'L506', 'URTICARIA POR CONTACTO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(933, 'f3aa86c0-b93a-11ee-8fa7-fd9711532b2f', 'L508', 'OTRAS URTICARIAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(934, 'f3aa9070-b93a-11ee-ad94-fbc96cd4e2a6', 'L509,\"URTICARIA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(935, 'f3aa9a10-b93a-11ee-892d-1f4dd3ea7bb7', 'L510', 'ERITEMA MULTIFORME NO FLICTENULAR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(936, 'f3aaa5d0-b93a-11ee-ba43-7bffb4cd9d69', 'L511', 'ERITEMA MULTIFORME FLICTENULAR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(937, 'f3aac590-b93a-11ee-9e8c-4524779ee171', 'L512', 'NECROLISIS EPIDERMICA TOXICA [LYELL]', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(938, 'f3aad330-b93a-11ee-9377-8fec1f33ca84', 'L518', 'OTROS ERITEMAS MULTIFORMES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(939, 'f3aae020-b93a-11ee-94da-918202fc000b', 'L519,\"ERITEMA MULTIFORME, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(940, 'f3aaecc0-b93a-11ee-9b6d-6375ccffeecf', 'L52X', 'ERITEMA NUDOSO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(941, 'f3aaf970-b93a-11ee-8c9a-69cad2048e3c', 'L530', 'ERITEMA TOXICO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(942, 'f3ab0620-b93a-11ee-b683-7782242737e9', 'L531', 'ERITEMA ANULAR CENTRIFUGO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(943, 'f3ab1270-b93a-11ee-8f8e-9b9d680f019d', 'L532', 'ERITEMA MARGINADO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(944, 'f3ab1ef0-b93a-11ee-aeca-71dfb898abb4', 'L533', 'OTROS ERITEMAS FIGURADOS CRONICOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(945, 'f3ab2c10-b93a-11ee-befd-d1ba69eaedb8', 'L538', 'OTRAS AFECCIONES ERITEMATOSAS ESPECIFICADAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(946, 'f3ab38e0-b93a-11ee-ace0-cbd149e5ed8d', 'L539,\"AFECCION ERITEMATOSA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(947, 'f3ab45c0-b93a-11ee-9a4d-a9cdcd7afbdc', 'L540', 'ERITEMA MARGINADO EN LA FIEBRE REUMATICA AGUDA (I00�', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(948, 'f3ab5240-b93a-11ee-af0c-4fa9b3686cf9', 'L548', 'ERITEMA EN OTRAS ENFERMEDADES CLASIFICADAS EN OTRA PARTE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(949, 'f3ab5e80-b93a-11ee-b538-97a7a3987d10', 'L550', 'QUEMADURA SOLAR PRIMER GRADO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(950, 'f3ab6ae0-b93a-11ee-98a6-075163740cd5', 'L551', 'QUEMADURA SOLAR SEGUNDO GRADO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(951, 'f3ab7750-b93a-11ee-a7d0-7dcea1fc360c', 'L552', 'QUEMADURA SOLAR TERCER GRADO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(952, 'f3ab8360-b93a-11ee-af1c-4f65b6668813', 'L558', 'OTRAS QUEMADURAS SOLARES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(953, 'f3ab9010-b93a-11ee-b5d0-bb679f3a4b0f', 'L559,\"QUEMADURA SOLAR, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(954, 'f3ab9c90-b93a-11ee-bc42-91ddef5785ef', 'L560', 'RESPUESTA FOTOTOXICA A DROGAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(955, 'f3aba8e0-b93a-11ee-9ddc-d754e5555601', 'L561', 'RESPUESTA FOTOALERGICA A DROGAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(956, 'f3abb510-b93a-11ee-87d9-a566bbb85884', 'L562', 'DERMATITIS POR FOTOCONTACTO [DERMATITIS DE BERLOQUE]', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(957, 'f3abc130-b93a-11ee-9690-53f3010e3ec0', 'L563', 'URTICARIA SOLAR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(958, 'f3abcd50-b93a-11ee-8b05-4de186587da4', 'L564', 'ERUPCION POLIMORFA A LA LUZ', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(959, 'f3abd970-b93a-11ee-ad29-bffb5d383cc2', 'L568', 'OTROS CAMBIOS AGUDOS ESPECIFICADOS DE LA PIEL DEBIDOS A RADIACION ULTRAVIOLETA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(960, 'f3abe620-b93a-11ee-848d-69324b4c9d1a', 'L569,\"CAMBIO AGUDO DE LA PIEL DEBIDO A RADIACION ULTRAVIOLETA, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(961, 'f3abf260-b93a-11ee-895f-0571fbe6c1bc', 'L570', 'QUERATOSIS ACTINICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(962, 'f3abff20-b93a-11ee-8963-5d70c52ae4fb', 'L571', 'RETICULOIDE ACTINICO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(963, 'f3ac0bc0-b93a-11ee-afb0-e57b8bc45be9', 'L572', 'PIEL ROMBOIDAL DE LA NUCA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(964, 'f3ac17e0-b93a-11ee-9ca3-1bb5b0ae0d97', 'L573', 'POIQUILODERMIA DE CIVATTE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(965, 'f3ac23f0-b93a-11ee-839d-959e030450b6', 'L574', 'PIEL LAXA SENIL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(966, 'f3ac3040-b93a-11ee-99dc-bd7adc4b630c', 'L575', 'GRANULOMA ACTINICO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(967, 'f3ac3c70-b93a-11ee-8bbf-a11e5d7f109d', 'L578', 'OTROS CAMBIOS DE LA PIEL DEBIDOS A EXPOSICION CRONICA A RADIACION NO IONIZANTE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(968, 'f3ac48c0-b93a-11ee-8efa-ad36b37b0cba', 'L579,\"CAMBIOS DE LA PIEL DEBIDOS A EXPOSICION CRONICA A RADIACION NO IONIZANTE, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(969, 'f3ac5570-b93a-11ee-b6ee-bf619a73962d', 'L580', 'RADIODERMATITIS AGUDA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(970, 'f3ac61c0-b93a-11ee-848a-3bc57d4ce3dc', 'L581', 'RADIODERMATITIS CRONICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(971, 'f3ac6e60-b93a-11ee-affd-77397ac2610a', 'L589,\"RADIODERMATITIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(972, 'f3ac7ae0-b93a-11ee-a046-bbf35e8d123e', 'L590', 'ERITEMA AB IGNE [DERMATITIS AB IGNE]', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(973, 'f3ac8700-b93a-11ee-ba70-0dc62e1d1ad7', 'L598', 'OTROS TRASTORNOS ESPECIFICADOS DE LA PIEL Y DEL TEJIDO SUBCUTANEO RELACIONADOS CON RADIACION', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(974, 'f3ac9330-b93a-11ee-9575-858d6cfb3ad1', 'L599', 'TRASTORNOS NO ESPECIFICADOS DE LA PIEL Y DEL TEJIDO SUBCUTANEO RELACIONADOS CON RADIACION', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(975, 'f3aca020-b93a-11ee-9886-911af325ab1f', 'L600', 'UÑA ENCARNAD', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(976, 'f3acac70-b93a-11ee-b009-fb0c31293e5a', 'L601', 'ONICOLISIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(977, 'f3acb880-b93a-11ee-b898-7b377399f09c', 'L602', 'ONICOGRIPOSIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(978, 'f3acc4b0-b93a-11ee-8f7d-cf767e770c05', 'L603', 'DISTROFIA UNGUEAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(979, 'f3acd110-b93a-11ee-aea4-43848c3f1813', 'L604', 'LINEAS DE BEAU', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(980, 'f3acdd30-b93a-11ee-a44b-cf4e3a20462c', 'L605', 'SINDROME DE LA UÑA AMARILL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(981, 'f3ace930-b93a-11ee-b5bc-ed0c85a9e9fa', 'L608', 'OTROS TRASTORNOS DE LAS UÑA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(982, 'f3acf5e0-b93a-11ee-98eb-7765d9608ca3', 'L609,\"TRASTORNO DE LA UÑA, NO ESPECIFICAD\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(983, 'f3ad0240-b93a-11ee-81b7-a3f323ba61f0', 'L620', 'UÑA DEFORME DE LA PAQUIDERMOPERIOSTOSIS (M89.4�', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(984, 'f3ad0e70-b93a-11ee-b5b0-1f36cfe8a674', 'L628', 'TRASTORNOS DE LAS UÑAS EN OTRAS ENFERMEDADES CLASIFICADAS EN OTRA PART', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(985, 'f3ad1ad0-b93a-11ee-9329-fdd4c294f6ba', 'L630', 'ALOPECIA (CAPITIS) TOTAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(986, 'f3ad2710-b93a-11ee-855f-870775af8824', 'L631', 'ALOPECIA UNIVERSAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(987, 'f3ad3340-b93a-11ee-9608-8dcac851eb5d', 'L632', 'OFIASIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(988, 'f3ad3f90-b93a-11ee-ab02-09f0a8c3da56', 'L638', 'OTRAS ALOPECIAS AREATAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(989, 'f3ad4c00-b93a-11ee-90ef-537d0b0d63ab', 'L639,\"ALOPECIA AREATA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(990, 'f3ad5890-b93a-11ee-bcf7-5d31e7780b98', 'L640,\"ALOPECIA ANDROGENA, INDUCIDA POR DROGAS\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(991, 'f3ad6520-b93a-11ee-adc8-cb590a0faa21', 'L648', 'OTRAS ALOPECIAS ANDROGENAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(992, 'f3ad7180-b93a-11ee-90eb-4d45e21e9044', 'L649,\"ALOPECIA ANDROGENA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54');
INSERT INTO `diagnoses` (`id`, `uuid`, `code`, `name`, `status`, `created_at`, `updated_at`) VALUES
(993, 'f3ad7db0-b93a-11ee-a59a-c1a4e936f979', 'L650', 'PERDIDA CAPILAR TELOGENA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(994, 'f3ad8a00-b93a-11ee-9386-4d8604707ce8', 'L651', 'PERDIDA CAPILAR ANAGENA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(995, 'f3ad9660-b93a-11ee-aa6e-af07d842086f', 'L652', 'ALOPECIA MUCINOSA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(996, 'f3ada280-b93a-11ee-8ebb-c1e8af1c1e35', 'L658', 'OTRAS PERDIDAS ESPECIFICADAS NO CICATRICIALES DEL PELO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(997, 'f3adaee0-b93a-11ee-b11b-f5cb87ae8005', 'L659,\"PERDIDA NO CICATRICIAL DEL PELO, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(998, 'f3adbb80-b93a-11ee-8894-9dffbe68cffd', 'L660', 'SEUDOPELADA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(999, 'f3adc7a0-b93a-11ee-9098-ff6c51a7fc93', 'L661', 'LIQUEN PLANO PILARIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1000, 'f3add3c0-b93a-11ee-a796-b52aa85fa012', 'L662', 'FOLICULITIS DECALVANTE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1001, 'f3ade010-b93a-11ee-9a57-9d89ced2274c', 'L663', 'PERIFOLICULITIS CAPITIS ABSCEDENS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1002, 'f3adec10-b93a-11ee-a5fc-dba8d6a1471a', 'L664', 'FOLICULITIS ULERITEMATOSA RETICULADA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1003, 'f3adf820-b93a-11ee-b1f5-9fd677c30b69', 'L668', 'OTRAS ALOPECIAS CICATRICIALES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1004, 'f3ae04a0-b93a-11ee-8c40-894630198b42', 'L669,\"ALOPECIA CICATRICIAL, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1005, 'f3ae10b0-b93a-11ee-8fff-59a3323a63f3', 'L670', 'TRICORREXIS NUDOSA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1006, 'f3ae1ce0-b93a-11ee-8ea6-9bf1caf8683e', 'L671', 'VARIACION DEL COLOR DEL PELO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1007, 'f3ae2920-b93a-11ee-ac80-8b58b3fab3d5', 'L678', 'OTRAS ANOMALIAS DEL TALLO Y DEL COLOR DEL PELO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1008, 'f3ae3540-b93a-11ee-84ce-9fec85dcdc9c', 'L679', 'ANORMALIDAD NO ESPECIFICADA DEL TALLO Y DEL COLOR DEL PELO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1009, 'f3ae4150-b93a-11ee-ac39-cfff58e31d58', 'L680', 'HIRSUTISMO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1010, 'f3ae4e00-b93a-11ee-962d-6d868e14d849', 'L681', 'HIPERTRICOSIS LANUGINOSA ADQUIRIDA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1011, 'f3ae5a80-b93a-11ee-9699-95f7abf50010', 'L682', 'HIPERTRICOSIS LOCALIZADA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1012, 'f3ae66d0-b93a-11ee-88f2-f3948301c7c1', 'L683', 'POLITRIQUIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1013, 'f3ae7310-b93a-11ee-9bd5-5db34c022f19', 'L688', 'OTRAS HIPERTRICOSIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1014, 'f3ae7f80-b93a-11ee-8fb5-7b171f081a41', 'L689,\"HIPERTRICOSIS , NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1015, 'f3ae8bd0-b93a-11ee-86b9-853de0018ccb', 'L700', 'ACNE VULGAR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1016, 'f3ae97e0-b93a-11ee-b36c-5b4cca7c0ef9', 'L701', 'ACNE CONGLOBADO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1017, 'f3aea440-b93a-11ee-adb6-819e785adaa0', 'L702', 'ACNE VARIOLIFORME', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1018, 'f3aeb060-b93a-11ee-8d79-e7484f4eae5b', 'L703', 'ACNE TROPICAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1019, 'f3aebca0-b93a-11ee-a70c-177740a65ebb', 'L704', 'ACNE INFANTIL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1020, 'f3aec8f0-b93a-11ee-a37e-95b1d77c64ac', 'L705', 'ACNE EXCORIADO DE LA MUJER JOVEN', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1021, 'f3aed520-b93a-11ee-b95f-014123f75e06', 'L708', 'OTROS ACNES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1022, 'f3aee150-b93a-11ee-8d69-8f2e9152d5ae', 'L709,\"ACNE, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1023, 'f3aeedc0-b93a-11ee-97a0-a1967baaaa5f', 'L710', 'DERMATITIS PERIBUCAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1024, 'f3aefaa0-b93a-11ee-99ce-fd06200d718f', 'L711', 'RINOFIMA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1025, 'f3af06c0-b93a-11ee-be84-450dfb925b73', 'L718', 'OTRAS ROSACEAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1026, 'f3af1340-b93a-11ee-82d5-b71c0281f45b', 'L719,\"ROSACEA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1027, 'f3af1f60-b93a-11ee-8c7b-79d448763f87', 'L720', 'QUISTE EPIDERMICO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1028, 'f3af2b80-b93a-11ee-8a4b-21891aebc1e8', 'L721', 'QUISTE TRICODERMICO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1029, 'f3af37d0-b93a-11ee-811d-3fab267c79aa', 'L722', 'ESTEATOCISTOMA MULTIPLE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1030, 'f3af43e0-b93a-11ee-a782-73566ebb9e67', 'L728', 'OTROS QUISTES FOLICULARES DE LA PIEL Y DEL TEJIDO SUBCUTANEO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1031, 'f3af5020-b93a-11ee-a777-f391811129fa', 'L729,\"QUISTE FOLICULAR DE LA PIEL Y DEL TEJIDO SUBCUTANEO, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1032, 'f3af5c60-b93a-11ee-9603-0f7f6df0d54b', 'L730', 'ACNE QUELOIDE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1033, 'f3af68c0-b93a-11ee-930c-17eefebc4ca8', 'L731', 'SEUDOFOLICULITIS DE LA BARBA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1034, 'f3af74c0-b93a-11ee-b375-9f90d48e2004', 'L732', 'HIDRADENITIS SUPURATIVA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1035, 'f3af80e0-b93a-11ee-9638-930fa2f81112', 'L738', 'OTROS TRASTORNOS FOLICULARES ESPECIFICADOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1036, 'f3af8dd0-b93a-11ee-83f5-45609c4e0c9a', 'L739,\"TRASTORNO FOLICULAR, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1037, 'f3af99f0-b93a-11ee-a61e-dbd95f2ad109', 'L740', 'MILIARIA RUBRA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1038, 'f3afa600-b93a-11ee-a214-d5ab863bd0f7', 'L741', 'MILIARIA CRISTALINA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1039, 'f3afb250-b93a-11ee-b301-5d803a0af2c3', 'L742', 'MILIARIA PROFUNDA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1040, 'f3afbea0-b93a-11ee-8420-c7a765946f21', 'L743,\"MILIARIA , NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1041, 'f3afcab0-b93a-11ee-bd0c-8973df3e3268', 'L744', 'ANHIDROSIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1042, 'f3afd6f0-b93a-11ee-8d02-e34a96ad3e6d', 'L748', 'OTROS TRASTORNOS SUDORIPADOS ECRINOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1043, 'f3afe350-b93a-11ee-864f-254559f794bb', 'L749,\"TRASTORNO SUDORIPARO ECRINO, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1044, 'f3afef70-b93a-11ee-96bc-d37d3b9cc06c', 'L750', 'BROMHIDROSIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1045, 'f3affbb0-b93a-11ee-9def-4316e5805624', 'L751', 'CROMHIDROSIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1046, 'f3b007d0-b93a-11ee-84bf-5fd1fece0a81', 'L752', 'MILIARIA APOCRINA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1047, 'f3b013e0-b93a-11ee-8bf3-69d398705ac4', 'L758', 'OTROS TRASTORNOS SUDORIPARO APOCRINO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1048, 'f3b02030-b93a-11ee-ac92-2da7b711383f', 'L759,\"TRASTORNO SUDORIPARO APOCRINO, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1049, 'f3b02ce0-b93a-11ee-82b4-79f54e1bf3ef', 'L80X', 'VITILIGO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1050, 'f3b03910-b93a-11ee-bcd6-dd8f06a0c08e', 'L810', 'HIPERPIGMENTACION POSTINFLAMATORIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1051, 'f3b04530-b93a-11ee-a2b8-9350f544ce6a', 'L811', 'CLOASMA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1052, 'f3b05190-b93a-11ee-8215-214036a89fa9', 'L812', 'EFELIDE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1053, 'f3b05db0-b93a-11ee-b890-81955f44c448', 'L813', 'MANCHAS CAFÉ CON LECH', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1054, 'f3b069d0-b93a-11ee-934a-99b8c058f6f6', 'L814', 'OTROS TIPOS DE HIPERPIGMENTACION MELANODERMICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1055, 'f3b07650-b93a-11ee-82c7-a994b67925d2', 'L815,\"LEUCODERMIA, NO CLASIFICADA EN OTRA PARTE\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1056, 'f3b08260-b93a-11ee-9c45-e93447eb570a', 'L816', 'OTROS TRASTORNOS DE DISMINUCION DE LA FORMACION DE LA MELANINA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1057, 'f3b08ed0-b93a-11ee-859d-bd8c2c307c3e', 'L817', 'DERMATOSIS PURPURICA PIGMENTADA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1058, 'f3b09b20-b93a-11ee-8b2f-b1aed791e204', 'L818', 'OTROS TRASTORNOS ESPECIFICADOS DE LA PIGMENTACION', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1059, 'f3b0a780-b93a-11ee-8aa8-a30fba173577', 'L819,\"TRASTORNO DE LA PIGMENTACION, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1060, 'f3b0b3a0-b93a-11ee-9b36-4786b819e75f', 'L82X', 'QUERATOSIS SEBORREICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1061, 'f3b0c040-b93a-11ee-a500-73d50ad5f555', 'L83X', 'ACANTOSIS NIGRICANS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1062, 'f3b0ccb0-b93a-11ee-b887-5f1cb257c9f5', 'L84X', 'CALLOS Y CALLOSIDADES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1063, 'f3b0d8f0-b93a-11ee-bb34-9706c85f9f56', 'L850', 'ICTIOSIS ADQUIRIDA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1064, 'f3b0e540-b93a-11ee-82e6-79da1643ce2d', 'L851', 'QUERATOSIS [QUERATODERMIA] PALMAR Y PLANTAR ADQUIRIDA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1065, 'f3b10660-b93a-11ee-8c75-a180227e7f30', 'L852', 'QUERATOSIS PUNCTATA (PALMAR Y PLANTAR)', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1066, 'f3b114b0-b93a-11ee-a908-1de4a9235d3e', 'L853', 'XEROSIS DEL CUTIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1067, 'f3b121c0-b93a-11ee-b649-c3a4087b4ca5', 'L858', 'OTROS ENGROSAMIENTOS EPIDERMICOS ESPECIFICADOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1068, 'f3b12e70-b93a-11ee-99ea-eb326f7b1147', 'L859,\"ENGROSAMIENTO EPIDERMICO, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1069, 'f3b13b30-b93a-11ee-8a8b-e7b6418f1668', 'L86X', 'QUERODERMA EN ENFERMEDADES CLASIFICADAS EN OTRA PARTE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1070, 'f3b14780-b93a-11ee-8ce4-29049e274ad7', 'L870', 'QUERATOSIS FOLICULAR Y PARAFOLICULAR PENETRANTE DEL CUTIS [KYRLE]', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1071, 'f3b153e0-b93a-11ee-9ea0-37e9153613bf', 'L871', 'COLAGENOSIS PERFORANTE REACTIVA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1072, 'f3b16080-b93a-11ee-bdd2-5586923541ca', 'L872', 'ELASTOSIS SERPIGINOSA PERFORANTE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1073, 'f3b16cc0-b93a-11ee-a3b8-c57c2330f42e', 'L878', 'OTROS TRASTORNOS DE LA ELIMINACION TRANSEPIDERMICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1074, 'f3b178f0-b93a-11ee-ab05-ab56bac2c760', 'L879', 'TRASTORNO DE LA ELIMINACION TRANSEPIDERMICA. NO ESPECIFICADO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1075, 'f3b18590-b93a-11ee-8742-8f6e6640f7fe', 'L88X', 'PIODERMA GANGRENOSO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1076, 'f3b19200-b93a-11ee-8ba3-b51c1ee44d80', 'L89X', 'ULCERA DE DECUBITO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1077, 'f3b19e20-b93a-11ee-92d4-432694b4bd70', 'L900', 'LIQUEN ESCLEROSO Y ATROFICO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1078, 'f3b1aa90-b93a-11ee-872a-1b1bbcc32525', 'L901', 'ANETODERMIA DE SCHWENINGER-BUZZI', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1079, 'f3b1b6b0-b93a-11ee-97ff-fbbe7892cae9', 'L902', 'ANETODERMIA DE JADASSOHN-PELLIZZARI', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1080, 'f3b1c2e0-b93a-11ee-8a3c-9dbf10cbc78a', 'L903', 'ATROFODERMA DE PASINI Y PIERINI', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1081, 'f3b1cf20-b93a-11ee-a597-7d60e5abf63d', 'L904', 'ACRODERMATITIS CRONICA ATROFICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1082, 'f3b1db60-b93a-11ee-aa36-d7f454a71624', 'L905', 'FIBROSIS Y AFECCIONES CICATRICIALES DE LA PIEL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1083, 'f3b1e7a0-b93a-11ee-8f81-ed7be8213726', 'L906', 'ESTRIAS ATROFICAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1084, 'f3b1f3c0-b93a-11ee-af3c-f11eef2d83c8', 'L908', 'OTROS TRASTORNOS ATROFICOS DE LA PIEL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1085, 'f3b20080-b93a-11ee-97fa-b3d65aa0cb50', 'L909,\"TRASTORNO ATROFICO DE LA PIEL, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1086, 'f3b20cc0-b93a-11ee-8d67-691eab1ee05e', 'L910', 'CICATRIZ QUELOIDE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1087, 'f3b218d0-b93a-11ee-af72-c9a4079a306b', 'L918', 'OTROS TRASTORNOS HIPERTROFICOS DE LA PIEL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1088, 'f3b22570-b93a-11ee-ba8d-b9ae56cac4e1', 'L919,\"TRASTORNO HIPERTROFICO DE LA PIEL, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1089, 'f3b231d0-b93a-11ee-bcd0-2b23eba5f7e1', 'L920', 'GRANULOMA ANULAR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1090, 'f3b23e40-b93a-11ee-9ab2-cfe581748ce8', 'L921,\"NECROBIOSIS LIPIDICA, NO CLASIFICADA EN OTRA PARTE\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1091, 'f3b24b20-b93a-11ee-8e36-ef95ff680529', 'L922', 'GRANULOMA FACIAL [GRANULOMA EOSINOFILO DE LA PIEL]', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1092, 'f3b25740-b93a-11ee-b7ab-0fce57d1875d', 'L923', 'GRANULOMA POR CUERPO EXTRAÑO DE LA PIEL Y EN EL TEJIDO SUBCUTANE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1093, 'f3b26360-b93a-11ee-a7aa-3fb9db7979ec', 'L928', 'OTROS TRASTORNOS GRANULOMATOSOS DE LA PIEL Y DEL TEJIDO SUBCUTANEO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1094, 'f3b27020-b93a-11ee-881e-f94e4e934a6e', 'L929,\"TRASTORNO GRANULOMATOSO DE LA PIEL Y DEL TEJIDO SUBCUTANEO, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1095, 'f3b27c70-b93a-11ee-bc8f-3d81e75ddc04', 'L930', 'LUPUS ERITEMATOSO DISCOIDE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1096, 'f3b28890-b93a-11ee-8b37-c1fd51599289', 'L931', 'LUPUS ERITEMATOSO CUTANEO SUBAGUDO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1097, 'f3b29600-b93a-11ee-89f8-cdadabe485c0', 'L932', 'OTROS LUPUS ERITEMATOSOS LOCALIZADOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1098, 'f3b2a180-b93a-11ee-9cfa-d9d82ecfa5ae', 'L940', 'ESCLERODERMA LOCALIZADO [MORFEA]', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1099, 'f3b2ac80-b93a-11ee-b379-791cbabe62e6', 'L941', 'ESCLERODERMA LINEAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1100, 'f3b2b6b0-b93a-11ee-bf5f-351977d471b5', 'L942', 'CALCINOSIS DE LA PIEL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1101, 'f3b2c180-b93a-11ee-b333-eb013e160436', 'L943', 'ESCLERODACTILIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1102, 'f3b2cb80-b93a-11ee-b7cf-77c16314140b', 'L944', 'PAPULAS DE GOTTRON', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1103, 'f3b2d5e0-b93a-11ee-853f-d97ad91b6c08', 'L945', 'POIQUILODERMIA VASCULAR ATROFICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1104, 'f3b2e000-b93a-11ee-9102-bba41254e082', 'L946', 'AINHUM', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1105, 'f3b2ea60-b93a-11ee-87c1-d11c6f81eef7', 'L948', 'OTROS TRASTORNOS LOCALIZADOS ESPECIFICADOS DEL TEJIDO CONJUNTIVO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1106, 'f3b2f4a0-b93a-11ee-8350-8f2e3d88bbd4', 'L949,\"TRASTORNO LOCALIZADO DEL TEJIDO CONJUNTIVO, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1107, 'f3b2fec0-b93a-11ee-8a69-ed416dd4bd8e', 'L950', 'VASCULITIS LIVEDOIDE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1108, 'f3b308e0-b93a-11ee-8bb0-d15910901f69', 'L951', 'ERITEMA ELEVATUM DIUTINUM', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1109, 'f3b31300-b93a-11ee-b3af-3122b004e806', 'L958', 'OTRAS VASCULITIS LIMITADAS DE LA PIEL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1110, 'f3b31d30-b93a-11ee-bf36-77039ec274be', 'L959,\"VASCULITIS LIMITADA A LA PIEL, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1111, 'f3b32780-b93a-11ee-b065-89cf026bbca3', 'L97X,\"ULCERA DEL MIEMBRO INFERIOR, NO CLASIFICADA EN OTRA PARTE\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1112, 'f3b331e0-b93a-11ee-9970-b725a720bf5d', 'L980', 'GRANULOMA PIOGENO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1113, 'f3b33be0-b93a-11ee-ad45-5df0a08c4f17', 'L981', 'DERMATITIS FACTICIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1114, 'f3b345e0-b93a-11ee-ad92-4be0c40c30e5', 'L982', 'DERMATOSIS NEUTROFILA FEBRIL [SWEET]', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1115, 'f3b34fe0-b93a-11ee-b0df-bfae65ee514a', 'L983', 'CELULITIS EOSINOFILA [WELLS]', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1116, 'f3b35aa0-b93a-11ee-9e6a-63c5e89e471a', 'L984,\"ULCERA CRONICA DE LA PIEL, NO CLASIFICADA EN OTRA PARTE\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1117, 'f3b364e0-b93a-11ee-9591-4d5b5faf34d6', 'L985', 'MUCINOSIS DE LA PIEL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1118, 'f3b36ec0-b93a-11ee-8f79-194a2f122602', 'L986', 'OTROS TRASTORNOS INFILTRATIVOS DE LA PIEL Y DEL TEJIDO SUBCUTÁNE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1119, 'f3b378a0-b93a-11ee-8866-4dd1c0bb650f', 'L988', 'OTROS TRASTORNOS ESPECIFICADOS DE LA PIEL Y DEL TEJIDO SUBCUTANEO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1120, 'f3b38310-b93a-11ee-a82f-87b7fd4a2fd8', 'L989,\"TRASTORNO DE LA PIEL Y DEL TEJIDO SUBCUTANEO, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1121, 'f3b38d10-b93a-11ee-a4fc-1dc6bb8cb539', 'L990', 'AMILOIDOSIS DE LA PIEL (E85.-�', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1122, 'f3b39720-b93a-11ee-83f4-f199d8368846', 'L998', 'OTROS TRASTORNOS DE LA PIEL Y DEL TEJIDO SUBCUTANEO EN ENFERMEDADES CLASIFICADAS EN OTRA PARTE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1123, 'f3b3a0f0-b93a-11ee-82b1-5b11d413d667', 'M023', 'ENFERMEDAD DE REITER', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1124, 'f3b3ab40-b93a-11ee-85f5-a3a6584616b5', 'M059,\"ARTRITIS REUMATOIDE SEROPOSITIVA, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1125, 'f3b3b540-b93a-11ee-910c-3b487ea45eeb', 'M060', 'ARTRITIS REUMATOIDE SERONEGATIVA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1126, 'f3b3bf30-b93a-11ee-b73d-d53f8f3e8cf3', 'M061', 'ENFERMEDAD DE STILL DE COMIENZO EN EL ADULTO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1127, 'f3b3c960-b93a-11ee-b647-0fa4b2ab5d00', 'M063', 'NODULO REUMATOIDE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1128, 'f3b3d3e0-b93a-11ee-bbc5-15bd9a1480bd', 'M069,\"ARTRITIS REUMATOIDE, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1129, 'f3b3ddc0-b93a-11ee-9493-2564eec04076', 'M070', 'ARTROPATIA PSORIASICA INTERFALANGICA DISTAL (L40.5�', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1130, 'f3b3e7e0-b93a-11ee-bd50-5701df22bee7', 'M089,\"ARTRITIS JUVENIL, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1131, 'f3b3f2a0-b93a-11ee-aab0-01907180cbcd', 'M100', 'GOTA IDIOPATICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1132, 'f3b3fc90-b93a-11ee-94c2-fbea415814bb', 'M101', 'GOTA SATURNINA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1133, 'f3b406d0-b93a-11ee-aed7-939b100e92a6', 'M102', 'GOTA INDUCIDA POR DROGAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1134, 'f3b410a0-b93a-11ee-a5ec-9b9dddd123c8', 'M103', 'GOTA DEBIDA A ALTERACION RENAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1135, 'f3b41ae0-b93a-11ee-9ede-5fec7b984a26', 'M104', 'OTRAS GOTAS SECUNDARIAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1136, 'f3b424e0-b93a-11ee-a6b1-493a8c9245cd', 'M109,\"GOTA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1137, 'f3b42f30-b93a-11ee-8919-a74fbbadbe78', 'M110', 'ENFERMEDAD POR DEPOSITO DE HIDROXIAPATITA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1138, 'f3b43900-b93a-11ee-bc20-e7472729d5ba', 'M112', 'OTRAS CONDROCALCINOSIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1139, 'f3b443a0-b93a-11ee-8412-0968393c0789', 'M139,\"ARTRITIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1140, 'f3b44d90-b93a-11ee-8fb5-a52796da2e36', 'M143', 'DERMATOARTRITIS LIPOIDE (E78.8�', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1141, 'f3b457a0-b93a-11ee-bd21-cdfc55d3ffbe', 'M151', 'NODULOS DE HEBERDEN (CON ARTROPATIA)', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1142, 'f3b46170-b93a-11ee-90a6-1f434bd2612f', 'M152', 'NODULOS DE BOUCHARD (CON ARTROPATIA)', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1143, 'f3b46ba0-b93a-11ee-9fc9-d3aa7f873528', 'M153', 'ARTROSIS SECUNDARIA MULTIPLE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1144, 'f3b47590-b93a-11ee-8b95-550266e929f1', 'M154', '(OSTEO)ARTROSIS EROSIVA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1145, 'f3b47fa0-b93a-11ee-b72c-5f33cf48b8e8', 'M158', 'OTRAS POLIARTROSIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1146, 'f3b489d0-b93a-11ee-a048-9b2e39226cd4', 'M159,\"POLIARTROSIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1147, 'f3b49420-b93a-11ee-b938-4d660debbed4', 'M199,\"ARTROSIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1148, 'f3b49e40-b93a-11ee-a4f2-63cba0e4622a', 'M201', 'HALLUX VALGUS (ADQUIRIDO)', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1149, 'f3b4a810-b93a-11ee-97a7-2b0d549570b2', 'M202', 'HALLUX RIGIDUS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1150, 'f3b4b240-b93a-11ee-afa6-136009fd4e93', 'M203', 'OTRAS DEFORMIDADES DEL HALLUX (ADQUIRIDAS)', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1151, 'f3b4bc70-b93a-11ee-b371-bb0baa0dea83', 'M204', 'OTRO(S) DEDO(S) DEL PIE EN MARTILLO (ADQUIRIDOS)', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1152, 'f3b4c680-b93a-11ee-8cfd-63d84427aae3', 'M205', 'OTRAS DEFORMIDADES (ADQUIRIDAS) DEL (DE LOS) DEDO(S) DEL PIE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1153, 'f3b4d080-b93a-11ee-a549-fb6dbfa897d3', 'M206,\"DEFORMIDADES ADQUIRIDAS DE LOS DEDOS DEL PIE, NO ESPECIFICADAS\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1154, 'f3b4db00-b93a-11ee-9ff6-97652729a6a7', 'M210,\"DEFORMIDAD EN VALGO, NO CLASIFICADA EN OTRA PARTE\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1155, 'f3b4e560-b93a-11ee-9552-7dbd7c496c93', 'M211,\"DEFORMIDAD EN VARO, NO CLASIFICADA EN OTRA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1156, 'f3b4efd0-b93a-11ee-b8e9-4bc80fa3ca02', 'M212', 'DEFORMIDAD EN FLEXION', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1157, 'f3b4f9a0-b93a-11ee-9474-d7209913ef59', 'M213', 'MUÑECA O PIE EN PENDULO (ADQUIRIDO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1158, 'f3b503b0-b93a-11ee-be51-a1fcc3d62590', 'M214', 'PIE PLANO [PES PLANUS] (ADQUIRIDO)', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1159, 'f3b50dd0-b93a-11ee-b109-67f2b5b9c3b1', 'M215,\"MANO O PIE EN GARRA O EN TALIPES, PIE EQUINOVARO O ZAMBO ADQUIRIDOS\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1160, 'f3b517c0-b93a-11ee-87bb-250fa8ddfed9', 'M251', 'FISTULA ARTICULAR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1161, 'f3b521c0-b93a-11ee-a2a2-ab07221e793e', 'M257', 'OSTEOFITO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1162, 'f3b52c10-b93a-11ee-827c-0b472eae0827', 'M258', 'OTROS TRASTORNOS ARTICULARES ESPECIFICADOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1163, 'f3b53640-b93a-11ee-815f-95597936ce4a', 'M259,\"TRASTORNO ARTICULAR, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1164, 'f3b54010-b93a-11ee-87d0-bdb28c354d52', 'M300', 'POLIARTERITIS NUDOSA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1165, 'f3b54a20-b93a-11ee-9461-23e600e1fbf0', 'M301', 'POLIARTERITIS CON COMPROMISO PULMONAR [CHURG-STRAUSS]', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1166, 'f3b554d0-b93a-11ee-bfb4-1d98fb93a40c', 'M302', 'POLIARTERITIS JUVENIL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1167, 'f3b55f20-b93a-11ee-a322-9f4d50a36ae8', 'M303', 'SINDROME MUCOCUTANEO LIFONODULAR [KAWASAKI]', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1168, 'f3b568f0-b93a-11ee-88f8-c9fb18c6252d', 'M308', 'OTRAS AFECCIONES RELACIONADAS CON LA POLIARTERITIS NUDOSA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1169, 'f3b57330-b93a-11ee-ada4-a9c7f1ad4b5b', 'M310', 'ANGIITIS DEBIDA A HIPERSENSIBILIDAD', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1170, 'f3b57e10-b93a-11ee-bdad-3f352a69e8bb', 'M311', 'MICROANGIOPATIA TROMBOTICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1171, 'f3b58900-b93a-11ee-a4df-69a3b738c40a', 'M312', 'GRANULOMA LETAL DE LA LINEA MEDIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1172, 'f3b592a0-b93a-11ee-86c1-5f0fe5e39545', 'M313', 'GRANULOMATOSIS DE WEGENER', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1173, 'f3b59ca0-b93a-11ee-9ba4-777008d015a1', 'M314', 'SINDROME DEL CAYADO DE LA AORTA [TAKAYASU]', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1174, 'f3b5a6a0-b93a-11ee-bf97-cb53caff671e', 'M315', 'ARTERITIS DE CELULAS GIGANTES CON POLIMIALGIA REUMATICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1175, 'f3b5b030-b93a-11ee-a151-d909aae667e8', 'M316', 'OTRAS ARTERITIS DE CELULAS GIGANTES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1176, 'f3b5b9b0-b93a-11ee-a6b5-afdc59d8bf5f', 'M318', 'OTRAS VASCULOPATIAS NECROTIZANTES ESPECIFICADAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1177, 'f3b5c360-b93a-11ee-b1bb-995eb5e7a899', 'M319,\"VASCULOPATIA NECROTIZANTE, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1178, 'f3b5cd90-b93a-11ee-9db0-5bdb656262e6', 'M320,\"LUPUS ERITEMATOSO SISTEMICO, INDUCIDO POR DROGAS\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1179, 'f3b5d760-b93a-11ee-a095-3943e35a0fb7', 'M321', 'LUPUS ERITEMATOSO SISTEMICO CON COMPROMISO DE ORGANOS O SISTEMAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1180, 'f3b5e140-b93a-11ee-8a9a-b56361a3a3bc', 'M328', 'OTRAS FORMAS DE LUPUS ERITEMATOSO SISTEMICO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1181, 'f3b5eb60-b93a-11ee-92ea-297013bb1913', 'M329,\"LUPUS ERITEMATOSO SISTEMICO, SIN OTRA ESPECIFICACION\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1182, 'f3b5f560-b93a-11ee-8ae7-1b262159c707', 'M330', 'DERMATOMIOSITIS JUVENIL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1183, 'f3b5ffe0-b93a-11ee-8342-d7ac185c5e3f', 'M331', 'OTRAS DERMATOMIOSITIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1184, 'f3b60a00-b93a-11ee-9092-2d1235b5d17d', 'M332', 'POLIMIOSITIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1185, 'f3b61540-b93a-11ee-87ae-f91487f3e1c1', 'M339,\"DERMATOPOLIMIOSITIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1186, 'f3b61f50-b93a-11ee-bcc4-3dd7e193dcf4', 'M340', 'ESCLEROSIS SISTEMICA PROGRESIVA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1187, 'f3b62960-b93a-11ee-a425-53ddb83b4918', 'M341', 'SINDROME CR(E)ST', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1188, 'f3b63340-b93a-11ee-bb65-472b87d2ab6c', 'M348', 'OTRAS FORMAS DE ESCLEROSIS SISTEMICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1189, 'f3b63da0-b93a-11ee-a8b7-2bc353e6d9e5', 'M349,\"ESCLEROSIS SISTEMICA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1190, 'f3b64800-b93a-11ee-a11f-95ff07577250', 'M350', 'SINDROME SECO [SJÖGREN', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1191, 'f3b65280-b93a-11ee-9263-f5672cf741fc', 'M351', 'OTROS SINDROMES SUPERPUESTOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1192, 'f3b65ca0-b93a-11ee-8fe2-216abfd6af6c', 'M352', 'ENFERMEDAD DE BEHCET', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1193, 'f3b666a0-b93a-11ee-ac6f-d1f113c02533', 'M353', 'POLIMIALGIA REUMATICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1194, 'f3b670e0-b93a-11ee-a785-fb39740a49c0', 'M354', 'FASCITIS DIFUSA (EOSINOFILICA)', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1195, 'f3b67ac0-b93a-11ee-a4cc-81647048dcb7', 'M356', 'PANICULITIS RECIDIVANTE [WEBER-CHRISTIAN]', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1196, 'f3b688b0-b93a-11ee-9568-753d3aa72211', 'M358', 'OTRAS ENFERMEDADES ESPECIFICADAS CON COMPROMISO SISTEMICO DEL TEJIDO CONJUNTIVO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1197, 'f3b69a10-b93a-11ee-97ee-4914eae64c6d', 'M359,\"COMPROMISO SISTEMICO DEL TEJIDO CONJUNTIVO, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1198, 'f3b6a6f0-b93a-11ee-b62b-a7d6fa1bc52b', 'M360', 'DERMATO(POLI)MIOSITIS EN ENFERMEDAD NEOPLASICA (C00-D48�', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1199, 'f3b6b1a0-b93a-11ee-ae14-8f8fc8955bc2', 'M361', 'ARTROPATIA EN ENFERMEDAD NEOPLASICA (C00-D48�', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1200, 'f3b6bba0-b93a-11ee-99bc-6d9db8f7b94b', 'M362', 'ARTROPATIA HEMOFILICA (D66-D68�', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1201, 'f3b6c540-b93a-11ee-adf5-81fca7b660cf', 'M363', 'ARTROPATIA EN OTROS TRASTORNOS DE LA SANGRE (D50-D76�', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1202, 'f3b6ced0-b93a-11ee-9e1b-fb65f83d49ee', 'M364', 'ARTROPATIA EN REACCIONES DE HIPERSENSIBILIDAD CLASIFICADAS EN OTRA PARTE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1203, 'f3b6d890-b93a-11ee-8eb9-193e2aa0ee5c', 'M368', 'TRASTORNOS SISTEMICOS DEL TEJIDO CONJUNTIVO EN OTRAS ENFERMEDADES CLASIFICADAS EN OTRA PARTE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1204, 'f3b6e240-b93a-11ee-9be4-95b351f3096e', 'M460', 'ENTESOPATIA VERTEBRAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1205, 'f3b6ec20-b93a-11ee-9297-f9bbdf3c694e', 'M461,\"SACROILIITIS, NO CLASIFICADA EN OTRA PARTE\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1206, 'f3b6f650-b93a-11ee-a2ad-cd477df4053a', 'M541', 'RADICULOPATIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1207, 'f3b70060-b93a-11ee-92fb-95a311d6813c', 'M542', 'CERVICALGIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1208, 'f3b70a10-b93a-11ee-b14e-4f8aa9c47231', 'M543', 'CIATICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1209, 'f3b713b0-b93a-11ee-b1ec-dd56042ddfeb', 'M544', 'LUMBAGO CON CIATICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1210, 'f3b71d30-b93a-11ee-b53d-05c69fbd40a9', 'M545', 'LUMBAGO NO ESPECIFICADO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1211, 'f3b72720-b93a-11ee-9247-4f11d1229776', 'M546', 'DOLOR EN LA COLUMNA DORSAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1212, 'f3b730a0-b93a-11ee-86bc-9da52a266a9f', 'M548', 'OTRAS DORSALGIAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1213, 'f3b73a50-b93a-11ee-8886-9b9e39e9ecab', 'M549,\"DORSALGIA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1214, 'f3b743d0-b93a-11ee-9841-6798533c1efd', 'M600', 'MIOSITIS INFECCIOSA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1215, 'f3b74dc0-b93a-11ee-825c-9f62c54a1226', 'M601', 'MIOSITIS INTERSTICIAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1216, 'f3b757b0-b93a-11ee-a5a5-fd4d3caed1c0', 'M602,\"GRANULOMA POR CUERPO EXTRAÑO EN TEJIDO BLANDO, NO CLASIFICADO EN OTRA PART\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1217, 'f3b76180-b93a-11ee-a5cb-8d9e7f410cc7', 'M608', 'OTRAS MIOSITIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1218, 'f3b76b20-b93a-11ee-9be3-69e6edb62831', 'M609,\"MIOSITIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1219, 'f3b77520-b93a-11ee-98e7-ab137797b1d8', 'M620', 'DIASTASIS DEL MUSCULO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1220, 'f3b77ee0-b93a-11ee-8914-bfc1bbf3d36c', 'M624', 'CONTRACTURA MUSCULAR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1221, 'f3b78870-b93a-11ee-a0c1-3db3859f5cc7', 'M629,\"TRASTORNO MUSCULAR, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1222, 'f3b791e0-b93a-11ee-b2b5-4b978cb35e3b', 'M653', 'DEDO EN GATILLO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1223, 'f3b79b80-b93a-11ee-b83d-3b2048925ccc', 'M665', 'RUPTURA ESPONTANEA DE TENDON NO ESPECIFICADO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1224, 'f3b7a500-b93a-11ee-ae5c-79718811ae97', 'M670', 'ACORTAMIENTO DEL TENDON DE AQUILES (ADQUIRIDO)', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1225, 'f3b7ae70-b93a-11ee-88bb-bfa2aed4b516', 'M674', 'GANGLION', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1226, 'f3b7b800-b93a-11ee-b766-1d64263d9156', 'M721', 'NODULOS INTERFALANGICOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1227, 'f3b7c1a0-b93a-11ee-976d-cdf02ee1ec87', 'M722', 'FIBROMATOSIS DE LA APONEUROSIS PLANTAR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1228, 'f3b7cb50-b93a-11ee-9a72-3327ba98f444', 'M723', 'FASCITIS NODULAR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1229, 'f3b7d4c0-b93a-11ee-9776-f7509eb63c06', 'M724', 'FIBROMATOSIS SEUDOSARCOMATOSA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1230, 'f3b7dea0-b93a-11ee-a3cf-03e7a971ed0f', 'M725,\"FASCITIS, NO CLASIFICADA EN OTRA PARTE\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1231, 'f3b7e810-b93a-11ee-9ea0-e3c4d0fa6440', 'M751', 'SINDROME DE MANGUITO ROTATORIO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1232, 'f3b7f1f0-b93a-11ee-a62b-5b5a306b4bc7', 'M765', 'TENDINITIS ROTULIANA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1233, 'f3b7fb80-b93a-11ee-a7b9-7f9fad81abda', 'M766', 'TENDINITIS AQUILIANA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1234, 'f3b80520-b93a-11ee-a52d-e72302bd49ae', 'M773', 'ESPOLON CALCANEO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1235, 'f3b80e80-b93a-11ee-aff9-49e9de75c86e', 'M774', 'METATARSALGIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1236, 'f3b818d0-b93a-11ee-999b-6d3cda6d5836', 'M779,\"ENTESOPATIA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1237, 'f3b82260-b93a-11ee-8f0d-677d247a2ed1', 'M790,\"REUMATISMO, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1238, 'f3b82c10-b93a-11ee-b1e0-6d54a69a477d', 'M791', 'MIALGIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1239, 'f3b835c0-b93a-11ee-87b2-8f741d0b5a79', 'M792,\"NEURALGIA Y NEURITIS, NO ESPECIFICADAS\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1240, 'f3b83ff0-b93a-11ee-afd5-bfc8951cf7ca', 'M793,\"PANICULITIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1241, 'f3b84a00-b93a-11ee-b9e2-bfc6b2c942b9', 'M795', 'CUERPO EXTRAÑO RESIDUAL EN TEJIDO BLAND', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1242, 'f3b853d0-b93a-11ee-9ca8-c3a96132fb86', 'M796', 'DOLOR EN MIEMBRO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1243, 'f3b85d90-b93a-11ee-b2b3-e98eee51ad92', 'M799,\"TRASTORNO DE LOS TEJIDOS BLANDOS, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1244, 'f3b86790-b93a-11ee-a387-0baea1fbb5b5', 'N370', 'URETRITIS EN ENFERMEDADES CLASIFICADAS EN OTRA PARTE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1245, 'f3b87120-b93a-11ee-85d0-41e4839799ce', 'N430', 'HIDROCELE ENQUISTADO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1246, 'f3b87ac0-b93a-11ee-b8ec-c9bb3d042681', 'N431', 'HIDROCELE INFECTADO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1247, 'f3b884c0-b93a-11ee-b809-6f5980628252', 'N432', 'OTRAS HIDROCELES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1248, 'f3b88ea0-b93a-11ee-9a78-b5efe662ccbf', 'N433,\"HIDROCELE, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1249, 'f3b89850-b93a-11ee-8f4f-118f2ca407c0', 'N434', 'ESPERMATOCELE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1250, 'f3b8a1e0-b93a-11ee-a4ba-0b53c19f060c', 'N44X', 'TORSION DEL TESTICULO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1251, 'f3b8abc0-b93a-11ee-abfe-4d0916da2e15', 'N450,\"ORQUITIS, EPIDIDIMITIS Y ORQUIEPIDIDIMITIS CON ABSCESO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1252, 'f3b8b5c0-b93a-11ee-bb58-7154644a7e9a', 'N459,\"ORQUITIS, EPIDIDIMITIS Y ORQUIEPIDIDIMITIS SIN ABSCESO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1253, 'f3b8bf80-b93a-11ee-808d-45509d8c87e5', 'N47X,\"PREPUCIO REDUNDANTE, FIMOSIS Y PARAFIMOSIS\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1254, 'f3b8c930-b93a-11ee-9db2-db12ee821876', 'N480', 'LEUCOPLASIA DEL PENE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1255, 'f3b8d2c0-b93a-11ee-b52f-4f28a6af8a60', 'N481', 'BALANOPOSTITIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1256, 'f3b8dc90-b93a-11ee-b5e1-b155cebfd223', 'N482', 'OTROS TRASTORNOS INFLAMATORIOS DEL PENE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1257, 'f3b8e630-b93a-11ee-93c0-bff43808eeda', 'N483', 'PRIAPISMO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1258, 'f3b8efb0-b93a-11ee-974b-c501b4d6c880', 'N484', 'IMPOTENCIA DE ORIGEN ORGANICO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1259, 'f3b8f970-b93a-11ee-b31c-5ff2af45251d', 'N485', 'ULCERA DEL PENE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1260, 'f3b90340-b93a-11ee-9796-0fb0d37a2271', 'N486', 'BALANITIS XEROTICA OBLITERANTE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1261, 'f3b90d00-b93a-11ee-8712-65e79d113963', 'N488', 'OTROS TRASTORNOS ESPECIFICADOS DEL PENE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1262, 'f3b916a0-b93a-11ee-a50a-457a13cb2189', 'N489,\"TRASTORNO DEL PENE, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1263, 'f3b92060-b93a-11ee-9d1d-dd65cafcce23', 'N512', 'BALANITIS EN ENFERMEDADES CLASIFICADAS EN OTRA PARTE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1264, 'f3b92a00-b93a-11ee-b379-a380d0fc8b38', 'N518', 'OTROS TRASTORNOS DE LOS ORGANOS GENITALES MASCULINOS EN ENFERMEDADES CLASIFICADAS EN OTRA PARTE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1265, 'f3b93390-b93a-11ee-974c-03b9b786dc30', 'N600', 'QUISTE SOLITARIO DE LA MAMA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1266, 'f3b93d80-b93a-11ee-94bd-9368b8579f13', 'N601', 'MASTOPATIA QUISTICA DIFUSA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1267, 'f3b94700-b93a-11ee-b3b6-496ad80c79af', 'N741', 'ENFERMEDAD INFLAMATORIA PELVICA FEMENINA POR TUBERCULOSIS (A18.1�', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1268, 'f3b950b0-b93a-11ee-bbb4-7bdfed7f64fe', 'N760', 'VAGINITIS AGUDA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1269, 'f3b95a00-b93a-11ee-a5aa-bd02205beb81', 'N761', 'VAGINITIS SUBAGUDA Y CRONICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1270, 'f3b96360-b93a-11ee-8844-550a8df7392f', 'N762', 'VULVITIS AGUDA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1271, 'f3b96cc0-b93a-11ee-905a-43263485e725', 'N763', 'VULVITIS SUBAGUDA Y CRONICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1272, 'f3b97660-b93a-11ee-9f03-8b763b6c5f2e', 'N764', 'ABSCESO VULVAR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1273, 'f3b97fb0-b93a-11ee-b8ed-8d85148978a2', 'N765', 'ULCERACION DE LA VAGINA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1274, 'f3b98910-b93a-11ee-90d6-f9520e5a0765', 'N766', 'ULCERACION DE LA VULVA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1275, 'f3b99260-b93a-11ee-a12e-23e4d426615c', 'N768', 'OTRAS INFLAMACIONES ESPECIFICADAS DE LA VAGINA Y DE LA VULVA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1276, 'f3b99c20-b93a-11ee-98b7-d544fdb38fee', 'N770', 'ULCERACION DE LA VULVA EN ENFERMEDADES INFECCIOSAS Y PARASITARIAS CLASIFICADAS EN OTRA PARTE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1277, 'f3b9a5b0-b93a-11ee-9523-df4cdf7c2959', 'N771,\"VAGINITIS, VULVITIS Y VULVOVAGINITIS EN ENFERMEDADES INFECCIOSAS Y PARASITARIAS CLASIFICADAS EN OTRA PARTE\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1278, 'f3b9af20-b93a-11ee-b18a-f73e0180d42b', 'N778', 'ULCERACION E INFLAMACION VULVOVAGINAL EN OTRAS ENFERMEDADES CLASIFICADAS EN OTRA PARTE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1279, 'f3b9b8c0-b93a-11ee-b011-b9a1a0191b70', 'N941', 'DISPAREUNIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1280, 'f3b9c270-b93a-11ee-a0cb-a9ab31aaa5a4', 'N942', 'VAGINISMO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1281, 'f3b9cbe0-b93a-11ee-a92d-b53d2479bdab', 'N943', 'SINDROME DE TENSION PREMENSTRUAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1282, 'f3b9d540-b93a-11ee-a563-fb4aeb8d71cd', 'N944', 'DISMENORREA PRIMARIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1283, 'f3b9deb0-b93a-11ee-bb43-e19d158d34cc', 'N945', 'DISMENORREA SECUNDARIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1284, 'f3b9e8e0-b93a-11ee-8f5b-6b4f084fcd24', 'N946,\"DISMENORREA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1285, 'f3b9f2e0-b93a-11ee-beea-2535415a114d', 'Q181', 'SENO Y QUISTE PREAURICULAR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1286, 'f3b9fc70-b93a-11ee-a5ff-e342af7fd773', 'Q667', 'PIE CAVUS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1287, 'f3ba05f0-b93a-11ee-b0f9-39d98049e106', 'Q670', 'ASIMETRIA FACIAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1288, 'f3ba0f80-b93a-11ee-882e-75e4fd88cd93', 'Q671', 'FACIES COMPRIMIDA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1289, 'f3ba1900-b93a-11ee-be5d-f75144a62fa0', 'Q690', 'DEDO(S) SUPERNUMERARIO(S) DE LA MANO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1290, 'f3ba2280-b93a-11ee-937d-d9587d307138', 'Q691', 'PULGAR(ES) SUPERNUMERARIO(S)', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1291, 'f3ba2c10-b93a-11ee-8be3-834ae5e718d4', 'Q692', 'DEDO(S) SUPERNUMERARIO(S) DEL PIE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1292, 'f3ba35c0-b93a-11ee-a1c8-b7bb2ba1dfb3', 'Q699,\"POLIDACTILIA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1293, 'f3ba3f50-b93a-11ee-9caf-6d7cb488b0b1', 'Q700', 'FUSION DE LOS DEDOS DE LA MANO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1294, 'f3ba48b0-b93a-11ee-90a9-4f4448b33565', 'Q704', 'POLISINDACTILIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1295, 'f3ba5240-b93a-11ee-9366-63b60c1158f6', 'Q709,\"SINDACTILIA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1296, 'f3ba5bf0-b93a-11ee-b25d-5bbd609d3a8c', 'Q800', 'ICTIOSIS VULGAR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1297, 'f3ba6570-b93a-11ee-a405-cbd6e576d1d2', 'Q801', 'ICTIOSIS LIGADA AL CROMOSOMA X', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1298, 'f3ba6ee0-b93a-11ee-9d0a-89fc6f9a7d63', 'Q802', 'ICTIOSIS LAMELAR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1299, 'f3ba7850-b93a-11ee-96bb-17e8575e79c6', 'Q803', 'ERITRODERMIA ICTIOSIFORME VESICULAR CONGENITA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1300, 'f3ba8200-b93a-11ee-aa8d-4193c9bbd261', 'Q804', 'FETO ARLEQUÍ', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1301, 'f3ba8b80-b93a-11ee-9c20-53054f32e09a', 'Q808', 'OTRAS ICTIOSIS CONGENITAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1302, 'f3ba9510-b93a-11ee-9c42-f328aa9ef95b', 'Q809,\"ICTIOSIS CONGENITA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1303, 'f3ba9e70-b93a-11ee-a9dd-b752a1e7bf1f', 'Q810', 'EPIDERMOLISIS BULLOSA SIMPLE', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1304, 'f3baa830-b93a-11ee-9060-e93c910bc351', 'Q811', 'EPIDERMOLISIS BULLOSA LETAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1305, 'f3bab1d0-b93a-11ee-b898-235aaa166f21', 'Q812', 'EPIDERMOLISIS BULLOSA DISTROFICA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1306, 'f3babbb0-b93a-11ee-a506-75565ef3e035', 'Q818', 'OTRAS EPIDERMOLISIS BULLOSAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1307, 'f3bac570-b93a-11ee-af9c-ef40d7d9f516', 'Q819,\"EPIDERMOLISIS BULLOSA, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1308, 'f3bacf30-b93a-11ee-961e-93f7912f7286', 'Q820', 'LINFEDEMA HEREDITARIO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1309, 'f3bad8c0-b93a-11ee-9eb7-d532840fe1b1', 'Q821', 'XERODERMA PIGMENTOSO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1310, 'f3bae230-b93a-11ee-9388-25688d51ccec', 'Q822', 'MASTOCITOSIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1311, 'f3baeb90-b93a-11ee-8b96-3f467ea6afbf', 'Q823', 'INCONTINENCIA PIGMENTARIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1312, 'f3baf500-b93a-11ee-bb08-791d721f92ef', 'Q824', 'DISPLASIA ECTODERMICA (ANHIDROTICA)', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1313, 'f3bafee0-b93a-11ee-91c7-0f99b8920df5', 'Q825,\"NEVO NO NEOPLASICO, CONGENITO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1314, 'f3bb0890-b93a-11ee-bec5-65ed06749030', 'Q828,\"OTRAS MALFORMACIONES CONGENITAS DE LA PIEL, ESPECIFICADAS\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1315, 'f3bb1220-b93a-11ee-9340-f5347fef0747', 'Q829,\"MALFORMACION CONGENITA DE LA PIEL, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1316, 'f3bb1bf0-b93a-11ee-bb1e-4725dd9ca825', 'Q830', 'AUSENCIA CONGENITA DE LA MAMA CON AUSENCIA DEL PEZON', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1317, 'f3bb25b0-b93a-11ee-9c3b-0f5a65e23d9d', 'Q831', 'MAMA SUPERNUMERARIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1318, 'f3bb2f10-b93a-11ee-8dd4-c128069a19a0', 'Q832', 'AUSENCIA DEL PEZON', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1319, 'f3bb3880-b93a-11ee-a6c8-7108fd08367e', 'Q833', 'PEZON SUPERNUMERARIO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1320, 'f3bb41e0-b93a-11ee-b954-eb6e70c5d5ac', 'Q840', 'ALOPECIA CONGENITA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1321, 'f3bb4bd0-b93a-11ee-8977-39abb47f369a', 'Q841,\"ALTERACIONES MORFOLOGICAS CONGENITAS DEL PELO, NO CLASIFICADAS EN OTRA PARTE\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1322, 'f3bb5560-b93a-11ee-b0af-c734941d8252', 'Q842', 'OTRAS MALFORMACIONES CONGENITAS DEL PELO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1323, 'f3bb5ee0-b93a-11ee-bc8f-a7e5b8b7737f', 'Q843', 'ANONIQUIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1324, 'f3bb6850-b93a-11ee-b53d-5d5175ea8aa6', 'Q844', 'LEUCONIQUIA CONGENITA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1325, 'f3bb7310-b93a-11ee-85ea-058c9ffb1e98', 'Q845', 'AGRANDAMIENTO E HIPERTROFIA DE LAS UÑA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1326, 'f3bb7c70-b93a-11ee-994d-e3227a7b5d1e', 'Q846', 'OTRAS MALFORMACIONES CONGENITAS DE LAS UÑA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1327, 'f3bb8600-b93a-11ee-8d6d-05b2381e550a', 'Q848,\"OTRAS MALFORMACIONES CONGENITAS DE LAS FANERAS, ESPECIFICADAS\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1328, 'f3bb8f90-b93a-11ee-b1de-d7c607cd763b', 'Q849,\"MALFORMACION CONGENITA DE LAS FANERAS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1329, 'f3bb9960-b93a-11ee-8e9c-1d00bfe19cdc', 'Q850', 'NEUROFIBROMATOSIS (NO MALIGNA)', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54');
INSERT INTO `diagnoses` (`id`, `uuid`, `code`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1330, 'f3bba950-b93a-11ee-9a64-95540c08ad4a', 'Q851', 'ESCLEROSIS TUBEROSA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1331, 'f3bbbb80-b93a-11ee-9988-1b0301df07bc', 'Q858,\"OTRAS FACOMATOSIS, NO CLASIFICADAS EN OTRA PARTE\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1332, 'f3bbc950-b93a-11ee-b1d2-278b68abdd41', 'Q859,\"FACOMATOSIS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1333, 'f3bbd630-b93a-11ee-b2ef-31442a28dd59', 'Q860', 'SINDROME FETAL (DISMORFICO) DEBIDO AL ALCOHOL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1334, 'f3bbe3c0-b93a-11ee-aa20-9f18a90657aa', 'Q862', 'DISMORFISMO DEBIDO A WARFARINA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1335, 'f3bbee20-b93a-11ee-8079-7bc5a50d5b1c', 'R040', 'EPISTAXIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1336, 'f3bbf850-b93a-11ee-93ca-39803b3caaff', 'R066', 'HIPO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1337, 'f3bc0240-b93a-11ee-a70c-c325d7588c81', 'R067', 'ESTORNUDO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1338, 'f3bc0c40-b93a-11ee-a408-07ca53f43d5f', 'R104', 'OTROS DOLORES ABDOMINALES Y LOS NO ESPECIFICADOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1339, 'f3bc17f0-b93a-11ee-ae67-d511243e29ae', 'R11X', 'NAUSEA Y VOMITO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1340, 'f3bc21f0-b93a-11ee-ac1b-3178f8a61d32', 'R12X', 'ACIDEZ', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1341, 'f3bc2c40-b93a-11ee-826e-e1a688e87d67', 'R13X', 'DISFAGIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1342, 'f3bc3850-b93a-11ee-a51a-2d63666d9468', 'R14X', 'FLATULENCIA Y AFECCIONES AFINES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1343, 'f3bc4370-b93a-11ee-ac3e-edda04c72306', 'R15X', 'INCONTINENCIA FECAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1344, 'f3bc4e10-b93a-11ee-b0e5-67f35604a667', 'R200', 'ANESTESIA DE LA PIEL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1345, 'f3bc5890-b93a-11ee-83ed-419052c77887', 'R201', 'HIPOESTESIA DE LA PIEL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1346, 'f3bc62f0-b93a-11ee-863e-8f31aae7413a', 'R202', 'PARESTESIA DE LA PIEL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1347, 'f3bc6d30-b93a-11ee-a61c-fd31fae8ee82', 'R203', 'HIPERESTESIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1348, 'f3bc7730-b93a-11ee-840b-5725d2ffbd2e', 'R208', 'OTRAS ALTERACIONES DE LA SENSIBILIDAD CUTANEA Y LAS NO ESPECIFICADAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1349, 'f3bc8410-b93a-11ee-a813-4335a26657fd', 'R21X', 'SALPULLIDO Y OTRAS ERUPCIONES CUTANEAS NO ESPECIFICADAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1350, 'f3bc8e60-b93a-11ee-a003-e77b45dbf798', 'R229,\"TUMEFACCION, MASA O PROMINENCIA LOCALIZADA EN PARTE NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1351, 'f3bc9840-b93a-11ee-ada0-f97389d3d459', 'R230', 'CIANOSIS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1352, 'f3bca220-b93a-11ee-97a8-d7c87b3ccddb', 'R231', 'PALIDEZ', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1353, 'f3bcac90-b93a-11ee-b8d1-bbc393550b64', 'R232', 'RUBOR', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1354, 'f3bcb640-b93a-11ee-adab-39e265946594', 'R233', 'EQUIMOSIS ESPONTANEA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1355, 'f3bcc060-b93a-11ee-ad9d-db28cbe4798a', 'R234', 'CAMBIOS EN LA TEXTURA DE LA PIEL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1356, 'f3bcca40-b93a-11ee-aaea-99f627abc75f', 'R238', 'OTROS CAMBIOS DE LA PIEL Y LOS NO ESPECIFICADOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1357, 'f3bcd490-b93a-11ee-a6bc-fb7152b6e1f1', 'R251', 'TEMBLOR NO ESPECIFICADO', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1358, 'f3bcde80-b93a-11ee-a56a-dd4925fbc9e6', 'R252', 'CALAMBRES Y ESPASMOS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1359, 'f3bce870-b93a-11ee-ad76-3b31a86e9ed0', 'R430', 'ANOSMIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1360, 'f3bcf260-b93a-11ee-a099-995a7bf2b127', 'R431', 'PAROSMIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1361, 'f3bcfd30-b93a-11ee-b852-ff98217893ae', 'R432', 'PARAGEUSIA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1362, 'f3bd06f0-b93a-11ee-aba9-0310ead64dbe', 'R438', 'OTRAS ALTERACIONES DEL GUSTO Y DEL OLFATO Y LAS NO ESPECIFICADAS', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1363, 'f3bd10c0-b93a-11ee-9cf7-bd6a33c55a21', 'R442', 'OTRAS ALUCINACIONES', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1364, 'f3bd1b30-b93a-11ee-8e27-6106e71da5ca', 'R443,\"ALUCINACIONES, NO ESPECIFICADAS\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1365, 'f3bd25b0-b93a-11ee-aba7-7755818bdae2', 'T131,\"HERIDA DE MIEMBRO INFERIOR, NIVEL NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1366, 'f3bd30a0-b93a-11ee-a521-1795286489c4', 'T149,\"TRAUMATISMO, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1367, 'f3bd3a90-b93a-11ee-b93b-bbef68dc650e', 'T16X', 'CUERPO EXTRAÑO EN EL OID', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1368, 'f3bd4490-b93a-11ee-994b-c1b03266000d', 'T171', 'CUERPO EXTRAÑO EN EL ORIFICIO NASA', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1369, 'f3bd4e90-b93a-11ee-bc37-9d92f590d210', 'T199,\"CUERPO EXTRAÑO EN LAS VIAS GENITOURINARIAS, PARTE NO ESPECIFICAD\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1370, 'f3bd58c0-b93a-11ee-ba57-4d4624138743', 'T200,\"QUEMADURA DE LA CABEZA Y DEL CUELLO, GRADO NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1371, 'f3bd6270-b93a-11ee-b5f5-b504c0e1a5f8', 'T302,\"QUEMADURA DE SEGUNDO GRADO, REGION DEL CUERPO NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1372, 'f3bd6d60-b93a-11ee-b588-67192f14fada', 'T303,\"QUEMADURA DE TERCER GRADO, REGION DEL CUERPO NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1373, 'f3bd77a0-b93a-11ee-a3df-45969b6c480a', 'T819,\"COMPLICACIONES DE PROCEDIMIENTOS, NO ESPECIFICADA\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1374, 'f3bd8160-b93a-11ee-ade6-61b51dcc593f', 'W458', 'CUERPO EXTRAÑO QUE PENETRA A TRAVES DE LA PIEL: OTRO LUGAR ESPECIFICAD', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1375, 'f3bd8b00-b93a-11ee-ad3e-4758671a2965', 'W459', 'CUERPO EXTRAÑO QUE PENETRA A TRAVES DE LA PIEL: LUGAR NO ESPECIFICAD', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1376, 'f3bd9540-b93a-11ee-8b1d-2941ef96a1c6', 'Z000', 'EXAMEN MEDICO GENERAL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1377, 'f3bd9f10-b93a-11ee-84e0-577c58694005', 'Z001', 'CONTROL DE SALUD DE RUTINA DEL NIÑ', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1378, 'f3bda8d0-b93a-11ee-8916-77382eec73a9', 'Z029,\"EXAMEN PARA FINES ADMINISTRATIVOS, NO ESPECIFICADO\"', NULL, 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54'),
(1379, 'f3bdb280-b93a-11ee-b470-63511da5de92', 'Z945', 'TRASPLANTE DE PIEL', 'active', '2024-01-22 20:28:54', '2024-01-22 20:28:54');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosestype`
--

CREATE TABLE `diagnosestype` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diagnosestype`
--

INSERT INTO `diagnosestype` (`id`, `uuid`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, '7ccddf70-606d-11ee-81d1-e5e6ad1eea5a', 'Impresión Diagnóstica', 'active', '2023-10-01 20:16:25', '2023-10-01 20:16:25'),
(2, '8a71f3a0-606d-11ee-ad5b-c1b781962e82', 'Confirmado Nuevo', 'active', '2023-10-01 20:16:48', '2023-10-01 20:16:48'),
(3, '94f68e90-606d-11ee-80de-ab8a3a53b6d7', 'Confirmado Repetido', 'active', '2023-10-01 20:17:06', '2023-10-01 20:17:06');

-- --------------------------------------------------------

--
-- Table structure for table `diary`
--

CREATE TABLE `diary` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `day1` varchar(191) NOT NULL DEFAULT 'yes',
  `campus1` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `time_init1` varchar(191) DEFAULT NULL,
  `time_end1` varchar(191) DEFAULT NULL,
  `modality1` varchar(191) DEFAULT NULL,
  `day2` varchar(191) NOT NULL DEFAULT 'yes',
  `campus2` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `time_init2` varchar(191) DEFAULT NULL,
  `time_end2` varchar(191) DEFAULT NULL,
  `modality2` varchar(191) DEFAULT NULL,
  `day3` varchar(191) NOT NULL DEFAULT 'yes',
  `campus3` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `time_init3` varchar(191) DEFAULT NULL,
  `time_end3` varchar(191) DEFAULT NULL,
  `modality3` varchar(191) DEFAULT NULL,
  `day4` varchar(191) NOT NULL DEFAULT 'yes',
  `campus4` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `time_init4` varchar(191) DEFAULT NULL,
  `time_end4` varchar(191) DEFAULT NULL,
  `modality4` varchar(191) DEFAULT NULL,
  `day5` varchar(191) NOT NULL DEFAULT 'yes',
  `campus5` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `time_init5` varchar(191) DEFAULT NULL,
  `time_end5` varchar(191) DEFAULT NULL,
  `modality5` varchar(191) DEFAULT NULL,
  `day6` varchar(191) NOT NULL DEFAULT 'not',
  `campus6` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `time_init6` varchar(191) DEFAULT NULL,
  `time_end6` varchar(191) DEFAULT NULL,
  `modality6` varchar(191) DEFAULT NULL,
  `day7` varchar(191) NOT NULL DEFAULT 'not',
  `campus7` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `time_init7` varchar(191) DEFAULT NULL,
  `time_end7` varchar(191) DEFAULT NULL,
  `modality7` varchar(191) DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diary`
--

INSERT INTO `diary` (`id`, `uuid`, `user`, `company`, `day1`, `campus1`, `time_init1`, `time_end1`, `modality1`, `day2`, `campus2`, `time_init2`, `time_end2`, `modality2`, `day3`, `campus3`, `time_init3`, `time_end3`, `modality3`, `day4`, `campus4`, `time_init4`, `time_end4`, `modality4`, `day5`, `campus5`, `time_init5`, `time_end5`, `modality5`, `day6`, `campus6`, `time_init6`, `time_end6`, `modality6`, `day7`, `campus7`, `time_init7`, `time_end7`, `modality7`, `status`, `created_at`, `updated_at`) VALUES
(1, 'f9ca8940-620a-11ee-aa25-5d2ba61e6595', 6, 1, 'yes', 1, '08:00', '17:00', 'Presencial', 'yes', 1, '08:00', '17:00', 'Teleconsulta', 'not', 0, NULL, NULL, NULL, 'yes', 1, '11:40', '15:45', 'Presencial', 'yes', 1, '10:00', '16:00', 'Presencial', 'not', 0, NULL, NULL, NULL, 'not', 0, NULL, NULL, NULL, 'active', '2023-10-03 21:36:17', '2024-02-08 03:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `diaryprocedures`
--

CREATE TABLE `diaryprocedures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `diary_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `procedure` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diaryqt`
--

CREATE TABLE `diaryqt` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `diary_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `qt_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diaryqt`
--

INSERT INTO `diaryqt` (`id`, `diary_id`, `qt_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-10-03 21:51:43', '2023-10-03 21:51:43'),
(2, 1, 2, '2023-10-03 21:51:43', '2023-10-03 21:51:43'),
(3, 1, 1, '2024-01-24 19:38:58', '2024-01-24 19:38:58'),
(4, 1, 2, '2024-01-24 19:38:58', '2024-01-24 19:38:58'),
(5, 1, 1, '2024-01-24 19:39:57', '2024-01-24 19:39:57'),
(6, 1, 2, '2024-01-24 19:39:57', '2024-01-24 19:39:57'),
(7, 1, 1, '2024-02-08 03:02:42', '2024-02-08 03:02:42'),
(8, 1, 2, '2024-02-08 03:02:42', '2024-02-08 03:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `eodiagnostics`
--

CREATE TABLE `eodiagnostics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `eo` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `code` varchar(191) DEFAULT NULL,
  `diagnostic` varchar(191) DEFAULT NULL,
  `type_diagnostic` varchar(191) DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eoexams`
--

CREATE TABLE `eoexams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `eo` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `examorders`
--

CREATE TABLE `examorders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `doctor` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `campus` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL DEFAULT 0,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `catfaq` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `habeas`
--

CREATE TABLE `habeas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `habeas`
--

INSERT INTO `habeas` (`id`, `uuid`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'd8a42770-5f13-11ee-8157-7f5d718b4922', 'De conformidad con la normativa vigente en Colombia sobre protección de datos personales, en particular, la Ley Estatutaria 1581 de 2012 y su decreto reglamentario, así como la Circular Externa 002 de 2015 de la Superintendencia de Industria y Comercio, se informa a los titulares de datos personales que sus datos serán objeto de tratamiento por parte de nuestra clinica\r\n\r\nLos datos personales que se recopilen serán utilizados para los siguientes propósitos:\r\n\r\nGestión administrativa y operativa de los servicios prestados por la clínica dermatológica.\r\nContacto y comunicación con los pacientes para agendar citas, recordatorios y seguimientos de tratamientos.\r\nFacturación y gestión de pagos.\r\nCumplimiento de obligaciones legales y regulatorias.\r\n\r\nDerechos de los Titulares:\r\n\r\nEl titular de los datos personales tiene derecho a:\r\n\r\nConocer, actualizar y rectificar sus datos personales.\r\nSolicitar prueba de la autorización otorgada para el tratamiento de sus datos.\r\nSer informado sobre el uso que se le ha dado a sus datos personales.\r\nPresentar quejas ante la Superintendencia de Industria y Comercio por infracciones a la normativa de protección de datos.\r\n4. Política de Tratamiento de Datos Personales:\r\n\r\nLa política de tratamiento de datos personales de nuestra clinica, se encuentra disponible en nuestra pagina web.\r\n\r\nAutorización:\r\n\r\nEl titular de los datos personales otorga su consentimiento expreso para que nuestra clínica trate sus datos personales de acuerdo con la finalidad establecida en este aviso.', 'active', '2023-09-30 03:02:13', '2023-10-01 21:46:59');

-- --------------------------------------------------------

--
-- Table structure for table `hcaesthetic`
--

CREATE TABLE `hcaesthetic` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `hc` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `campus` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `product_dates` varchar(191) DEFAULT NULL,
  `product_name` varchar(191) DEFAULT NULL,
  `lot` varchar(191) DEFAULT NULL,
  `dilution` varchar(191) DEFAULT NULL,
  `injectable` varchar(191) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `complications` varchar(191) DEFAULT NULL,
  `record_complications` text DEFAULT NULL,
  `participants` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hcaesthetic`
--

INSERT INTO `hcaesthetic` (`id`, `uuid`, `hc`, `user`, `company`, `campus`, `product_dates`, `product_name`, `lot`, `dilution`, `injectable`, `total`, `complications`, `record_complications`, `participants`, `comments`, `status`, `created_at`, `updated_at`) VALUES
(1, '492013b0-63a1-11ee-8255-3d495c2e2c63', 5, 8, 1, 1, '', '', '', '', '', 12, 'Si', 'jwan xioanxcoamn', 'cacac\r\ndr y', 'noiniguas', 'active', '2023-10-05 22:04:46', '2023-10-05 22:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `hcchecklist`
--

CREATE TABLE `hcchecklist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `hc` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `campus` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `doctor` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `tag` varchar(191) DEFAULT NULL,
  `hc_type` varchar(191) DEFAULT NULL,
  `path_pdf` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hcchecklist`
--

INSERT INTO `hcchecklist` (`id`, `uuid`, `hc`, `user`, `company`, `campus`, `doctor`, `created_by`, `tag`, `hc_type`, `path_pdf`, `status`, `created_at`, `updated_at`) VALUES
(1, '4e2260e0-63a7-11ee-b875-2d46cb6aa91f', 0, 8, 1, 1, 6, 2, 'biopsies', 'Biopsías y/o procedimientos', 'https://dermasoft.fullstackcolombia.com/storage/temp/QKPrRQ7IPw0dPixDln86rtSASaxSH2DjwEQfHHFR.pdf', 'active', '2023-10-05 22:47:51', '2023-10-05 22:47:52'),
(2, 'ef633ca0-63a7-11ee-858a-47f14bc92194', 0, 8, 1, 1, 6, 2, 'crypy', 'Crioterapia', 'https://dermasoft.fullstackcolombia.com/storage/temp/nEzHsZZ3mrKWaG2d4qFxuJblLpWj01m83s43pU9U.pdf', 'active', '2023-10-05 22:52:22', '2023-10-05 22:52:22'),
(3, '791a8d30-63b6-11ee-954d-0b4e97e3186f', 0, 8, 1, 1, 6, 2, 'dermatology', 'Dermatología general', 'https://dermasoft.fullstackcolombia.com/storage/temp/8uP3c5wknksKEMhI3BxdVtG0s7TJXkk9R3Gr5pHB.pdf', 'active', '2023-10-06 00:36:26', '2023-10-06 00:36:26');

-- --------------------------------------------------------

--
-- Table structure for table `hcclitem`
--

CREATE TABLE `hcclitem` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `checklist` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `applicability` varchar(191) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hcclitem`
--

INSERT INTO `hcclitem` (`id`, `uuid`, `checklist`, `description`, `applicability`, `comments`, `status`, `created_at`, `updated_at`) VALUES
(1, '4e26df00-63a7-11ee-876a-1f30134961db', 1, 'Preparación de la Sala y Equipo:Verificar que la sala esté limpia, organizada y equipada con todos los suministros necesarios para la biopsia.Asegurarse de que los instrumentos estén esterilizados y listos para su uso.Confirmar que el equipo de anestesia y monitoreo esté funcionando correctamente, si se va a utilizar anestesia local.', 'Si', '', 'active', '2023-10-05 22:47:51', '2023-10-05 22:47:51'),
(2, '4e26fe40-63a7-11ee-898b-e9602c2f5939', 1, 'Revisión de la Historia del Paciente:Revisar cuidadosamente la historia clínica del paciente, incluyendo antecedentes médicos, alergias, medicamentos actuales y problemas de coagulación.', 'Si', '', 'active', '2023-10-05 22:47:51', '2023-10-05 22:47:51'),
(3, '4e271310-63a7-11ee-bd9a-3180c8f3ca24', 1, 'Consentimiento Informado:Obtener un consentimiento informado del paciente para el procedimiento, asegurándose de que comprenda los riesgos, beneficios y alternativas.', 'Si', '', 'active', '2023-10-05 22:47:51', '2023-10-05 22:47:51'),
(4, '4e272690-63a7-11ee-b9b2-43dc0ce1eec8', 1, 'Preparación del Paciente:Informar al paciente sobre el procedimiento, incluyendo el proceso, la posible molestia y cualquier precaución postoperatoria.Confirmar que el paciente esté en una posición cómoda y adecuada para el procedimiento.', 'Si', '', 'active', '2023-10-05 22:47:51', '2023-10-05 22:47:51'),
(5, '4e2739f0-63a7-11ee-86c1-a55afc503b6a', 1, 'Preparación de la Zona del procedimiento:Limpiar y desinfectar la zona de la piel donde se realizará la biopsia.Marcar y delinear claramente el área de la piel que se biopsiará, siguiendo las indicaciones del dermatólogo.', 'Si', '', 'active', '2023-10-05 22:47:51', '2023-10-05 22:47:51'),
(6, '4e274cc0-63a7-11ee-9730-451ed56ad8df', 1, 'Preparación de Anestesia:Preparar la anestesia local, si es necesaria, siguiendo las dosis y técnicas apropiadas.', 'No', '', 'active', '2023-10-05 22:47:51', '2023-10-05 22:47:51'),
(7, '4e276100-63a7-11ee-b809-3791e9fc8473', 1, 'Identificación y Etiquetado de Muestras:Asegurarse de contar con recipientes de muestras adecuadamente etiquetados y listos para la recolección de la muestra de biopsia.Confirmar que la información del paciente esté correcta en cada muestra y registro.', 'No aplica', 'cvcdd', 'active', '2023-10-05 22:47:51', '2023-10-05 22:47:51'),
(8, '4e277340-63a7-11ee-abea-3948ee7778ee', 1, 'Comunicación con el Paciente:Explicar nuevamente el procedimiento al paciente y responder cualquier pregunta o inquietud que pueda tener.', 'Si', '', 'active', '2023-10-05 22:47:51', '2023-10-05 22:47:51'),
(9, '4e278660-63a7-11ee-95b9-f3d0d7b310a2', 1, 'Verificación de Alergias y Medicamentos:Confirmar que se haya verificado la ausencia de alergias a los productos que se utilizarán durante la biopsia.Asegurarse de que se hayan suspendido o ajustado los medicamentos anticoagulantes según las indicaciones del dermatólogo.', 'Si', '', 'active', '2023-10-05 22:47:51', '2023-10-05 22:47:51'),
(10, '4e279970-63a7-11ee-9349-ddcb244679d2', 1, 'Seguridad y Protocolos:Revisar los protocolos de seguridad y procedimientos a seguir en caso de cualquier emergencia o complicación durante el procedimiento.', 'Si', '', 'active', '2023-10-05 22:47:51', '2023-10-05 22:47:51'),
(11, 'ef638700-63a7-11ee-b115-5b2afb49ac96', 2, 'Preparación de la Sala y Equipo:Verificar que la sala esté limpia, organizada y equipada con todos los suministros necesarios para la biopsia.Asegurarse de que los instrumentos estén esterilizados y listos para su uso.Confirmar que el equipo de anestesia y monitoreo esté funcionando correctamente, si se va a utilizar anestesia local.', 'No', '', 'active', '2023-10-05 22:52:22', '2023-10-05 22:52:22'),
(12, 'ef639830-63a7-11ee-aabe-17e987961634', 2, 'Revisión de la Historia del Paciente:Revisar cuidadosamente la historia clínica del paciente, incluyendo antecedentes médicos, alergias, medicamentos actuales y problemas de coagulación.', 'No', '', 'active', '2023-10-05 22:52:22', '2023-10-05 22:52:22'),
(13, 'ef63a6a0-63a7-11ee-bb26-616c66dc7ca7', 2, 'Consentimiento Informado:Obtener un consentimiento informado del paciente para el procedimiento, asegurándose de que comprenda los riesgos, beneficios y alternativas.', 'No', 'vxcvxcv<', 'active', '2023-10-05 22:52:22', '2023-10-05 22:52:22'),
(14, 'ef63b3a0-63a7-11ee-a0c1-655dfba6c038', 2, 'Preparación del Paciente:Informar al paciente sobre el procedimiento, incluyendo el proceso, la posible molestia y cualquier precaución postoperatoria.Confirmar que el paciente esté en una posición cómoda y adecuada para el procedimiento.', 'Si', '', 'active', '2023-10-05 22:52:22', '2023-10-05 22:52:22'),
(15, 'ef63c120-63a7-11ee-8036-83d03989b438', 2, 'Preparación de la Zona del procedimiento:Limpiar y desinfectar la zona de la piel donde se realizará la biopsia.Marcar y delinear claramente el área de la piel que se biopsiará, siguiendo las indicaciones del dermatólogo.', 'No', '', 'active', '2023-10-05 22:52:22', '2023-10-05 22:52:22'),
(16, 'ef63ce00-63a7-11ee-98d0-879af6dab98f', 2, 'Preparación de Anestesia:Preparar la anestesia local, si es necesaria, siguiendo las dosis y técnicas apropiadas.', 'No', '', 'active', '2023-10-05 22:52:22', '2023-10-05 22:52:22'),
(17, 'ef63dad0-63a7-11ee-9dd9-01e20c9e5446', 2, 'Identificación y Etiquetado de Muestras:Asegurarse de contar con recipientes de muestras adecuadamente etiquetados y listos para la recolección de la muestra de biopsia.Confirmar que la información del paciente esté correcta en cada muestra y registro.', 'Si', 'vregvadfvv', 'active', '2023-10-05 22:52:22', '2023-10-05 22:52:22'),
(18, 'ef63e830-63a7-11ee-9635-8130509e45be', 2, 'Comunicación con el Paciente:Explicar nuevamente el procedimiento al paciente y responder cualquier pregunta o inquietud que pueda tener.', 'Si', '', 'active', '2023-10-05 22:52:22', '2023-10-05 22:52:22'),
(19, 'ef63f3c0-63a7-11ee-ba7d-e92a5179c1ea', 2, 'Verificación de Alergias y Medicamentos:Confirmar que se haya verificado la ausencia de alergias a los productos que se utilizarán durante la biopsia.Asegurarse de que se hayan suspendido o ajustado los medicamentos anticoagulantes según las indicaciones del dermatólogo.', 'No', 'v<xv<xcv', 'active', '2023-10-05 22:52:22', '2023-10-05 22:52:22'),
(20, 'ef640090-63a7-11ee-ae05-b58b7179579d', 2, 'Seguridad y Protocolos:Revisar los protocolos de seguridad y procedimientos a seguir en caso de cualquier emergencia o complicación durante el procedimiento.', 'Si', '', 'active', '2023-10-05 22:52:22', '2023-10-05 22:52:22'),
(21, '791ac520-63b6-11ee-b289-21a73ac13268', 3, 'Preparación de la Sala y Equipo:Verificar que la sala esté limpia, organizada y equipada con todos los suministros necesarios para la biopsia.Asegurarse de que los instrumentos estén esterilizados y listos para su uso.Confirmar que el equipo de anestesia y monitoreo esté funcionando correctamente, si se va a utilizar anestesia local.', 'No', 'ESTAS SO LAS OBSERVCAÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑ', 'active', '2023-10-06 00:36:26', '2023-10-06 00:36:26'),
(22, '791ad4e0-63b6-11ee-9aca-e53b52033fe3', 3, 'Revisión de la Historia del Paciente:Revisar cuidadosamente la historia clínica del paciente, incluyendo antecedentes médicos, alergias, medicamentos actuales y problemas de coagulación.', 'Si', '', 'active', '2023-10-06 00:36:26', '2023-10-06 00:36:26'),
(23, '791aea20-63b6-11ee-950a-9f65b84a4101', 3, 'Consentimiento Informado:Obtener un consentimiento informado del paciente para el procedimiento, asegurándose de que comprenda los riesgos, beneficios y alternativas.', 'No aplica', '', 'active', '2023-10-06 00:36:26', '2023-10-06 00:36:26'),
(24, '791af9e0-63b6-11ee-b4a9-1d399d005fdf', 3, 'Preparación del Paciente:Informar al paciente sobre el procedimiento, incluyendo el proceso, la posible molestia y cualquier precaución postoperatoria.Confirmar que el paciente esté en una posición cómoda y adecuada para el procedimiento.', 'Si', '', 'active', '2023-10-06 00:36:26', '2023-10-06 00:36:26'),
(25, '791b0a00-63b6-11ee-935c-613a598e18d3', 3, 'Preparación de la Zona del procedimiento:Limpiar y desinfectar la zona de la piel donde se realizará la biopsia.Marcar y delinear claramente el área de la piel que se biopsiará, siguiendo las indicaciones del dermatólogo.', 'No', '', 'active', '2023-10-06 00:36:26', '2023-10-06 00:36:26'),
(26, '791b1bc0-63b6-11ee-8402-2147f2b366f2', 3, 'Preparación de Anestesia:Preparar la anestesia local, si es necesaria, siguiendo las dosis y técnicas apropiadas.', 'Si', '', 'active', '2023-10-06 00:36:26', '2023-10-06 00:36:26'),
(27, '791b2c00-63b6-11ee-9423-c35cfe0d2536', 3, 'Identificación y Etiquetado de Muestras:Asegurarse de contar con recipientes de muestras adecuadamente etiquetados y listos para la recolección de la muestra de biopsia.Confirmar que la información del paciente esté correcta en cada muestra y registro.', 'Si', 'SE VERIFICO', 'active', '2023-10-06 00:36:26', '2023-10-06 00:36:26'),
(28, '791b3b90-63b6-11ee-9f49-ab85517ff04e', 3, 'Comunicación con el Paciente:Explicar nuevamente el procedimiento al paciente y responder cualquier pregunta o inquietud que pueda tener.', 'No aplica', '', 'active', '2023-10-06 00:36:26', '2023-10-06 00:36:26'),
(29, '791b4b00-63b6-11ee-b3ec-d3f34648a4db', 3, 'Verificación de Alergias y Medicamentos:Confirmar que se haya verificado la ausencia de alergias a los productos que se utilizarán durante la biopsia.Asegurarse de que se hayan suspendido o ajustado los medicamentos anticoagulantes según las indicaciones del dermatólogo.', 'No aplica', '', 'active', '2023-10-06 00:36:26', '2023-10-06 00:36:26'),
(30, '791b59c0-63b6-11ee-b46b-414ec7bc19f8', 3, 'Seguridad y Protocolos:Revisar los protocolos de seguridad y procedimientos a seguir en caso de cualquier emergencia o complicación durante el procedimiento.', 'No aplica', '', 'active', '2023-10-06 00:36:26', '2023-10-06 00:36:26');

-- --------------------------------------------------------

--
-- Table structure for table `hcconsent`
--

CREATE TABLE `hcconsent` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `hc` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `campus` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `consent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `note` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `doctor` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `tag` varchar(191) DEFAULT NULL,
  `hc_type` varchar(191) DEFAULT NULL,
  `patient_authorization` varchar(191) DEFAULT NULL,
  `authorization` varchar(191) DEFAULT NULL,
  `signature` text DEFAULT NULL,
  `signature_pp` text DEFAULT NULL,
  `path_pdf` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hcconsent`
--

INSERT INTO `hcconsent` (`id`, `uuid`, `hc`, `user`, `company`, `campus`, `consent`, `note`, `comments`, `doctor`, `tag`, `hc_type`, `patient_authorization`, `authorization`, `signature`, `signature_pp`, `path_pdf`, `status`, `created_at`, `updated_at`) VALUES
(1, '6d71f150-63a8-11ee-a390-8b413ca14310', 0, 8, 1, 1, 2, 'Consentimiento Informado para Biopsia Cutánea\r\n\r\nEn mi calidad de paciente, entiendo que se me ha recomendado una biopsia cutánea para evaluar y diagnosticar la siguiente condición dermatológica: [Especificar condición dermatológica].\r\n\r\nHe sido informado(a) sobre los siguientes aspectos relevantes de este procedimiento:\r\n\r\nProcedimiento:\r\n\r\nSe tomará una muestra de piel para su análisis bajo microscopio.\r\nFinalidad:\r\n\r\nObtener información para diagnosticar la condición de la piel.\r\nRiesgos y Posibles Complicaciones:\r\n\r\nDolor, molestias o sensibilidad en el área de la biopsia.\r\nHematoma o sangrado en el sitio de la biopsia.\r\nCicatrización o decoloración temporal en la zona de la biopsia.\r\nRiesgo mínimo de infección.\r\nAlternativas a la Biopsia:\r\n\r\nOtras pruebas diagnósticas que pueden ser recomendadas y discutidas.\r\nConsentimiento para Análisis y Almacenamiento de la Muestra: Acepto que la muestra de piel tomada será analizada y almacenada según sea necesario para mi atención médica.', 'no usare protesis', 6, 'crypy', 'Crioterapia', 'Autoriza', 'Manifiesto que, habiendo recibido la información relacionada con el procedimiento, he decidido dar mi consentimiento', 'https://dermasoft.fullstackcolombia.com/storage/uploads/CQLjyS6u9MxVcZUZvnmRazI8ac5r5jXjZBzo9cqp.png', 'storage/uploads/CQLjyS6u9MxVcZUZvnmRazI8ac5r5jXjZBzo9cqp.png', 'https://dermasoft.fullstackcolombia.com/storage/temp/bmOWqHV4hPbYXIyrVmYU7Hjm3WQ7SRWhofEn9hDm.pdf', 'active', '2023-10-05 22:55:53', '2023-10-05 22:55:53'),
(2, 'b1874540-63bc-11ee-bd21-293b6f60fcf6', 0, 8, 1, 1, 2, 'Consentimiento Informado para Biopsia Cutánea\r\n\r\nEn mi calidad de paciente, entiendo que se me ha recomendado una biopsia cutánea para evaluar y diagnosticar la siguiente condición dermatológica: [Especificar condición dermatológica].\r\n\r\nHe sido informado(a) sobre los siguientes aspectos relevantes de este procedimiento:\r\n\r\nProcedimiento:\r\n\r\nSe tomará una muestra de piel para su análisis bajo microscopio.\r\nFinalidad:\r\n\r\nObtener información para diagnosticar la condición de la piel.\r\nRiesgos y Posibles Complicaciones:\r\n\r\nDolor, molestias o sensibilidad en el área de la biopsia.\r\nHematoma o sangrado en el sitio de la biopsia.\r\nCicatrización o decoloración temporal en la zona de la biopsia.\r\nRiesgo mínimo de infección.\r\nAlternativas a la Biopsia:\r\n\r\nOtras pruebas diagnósticas que pueden ser recomendadas y discutidas.\r\nConsentimiento para Análisis y Almacenamiento de la Muestra: Acepto que la muestra de piel tomada será analizada y almacenada según sea necesario para mi atención médica.', 'otras cosas que acepto', 6, 'aesthetic', 'Procedimientos Estéticos', 'No autoriza', 'Manifiesto que habiendo recibido la información relacionada con el procedimiento, he decidido NO dar mi consentimiento', 'https://dermasoft.fullstackcolombia.com/storage/uploads/I24xkYW2ESSYOm6uDiQRg1cV8NQ1E8gkESL4yyoF.png', 'storage/uploads/I24xkYW2ESSYOm6uDiQRg1cV8NQ1E8gkESL4yyoF.png', 'https://dermasoft.fullstackcolombia.com/storage/temp/ZTMuMJKhmSvf0ddwIBzCpgrU1fjyWNEheiSQ14t3.pdf', 'active', '2023-10-06 01:20:57', '2023-10-06 01:20:58'),
(3, '50f4d1c0-bad0-11ee-a7a3-f39b2c4da18b', 0, 8, 1, 1, 4, '2. INFORMACION:\r\nEn el ejercicio de la Dermatología es importante en algunos casos llevar un registro fotográfico de la enfermedad, con el fin de realizar un seguimiento de la evolución y facilitar de esta manera el trabajo del equipo de salud.\r\nComo paciente usted tiene la disponibilidad de que se tomen las fotografías para distintos fines, toma que será realizada por el médico especialista tratante o por médicos en formación y debe ser autorizada por usted para especificar el uso que se le dará. A su vez, es importante precisar que tal ejercicio no influirá en el tipo de tratamiento que se le instaurara, ni en los controles que se deben realizar, no será compensado de ninguna forma económica, ni en prestación de servicios adicionales.\r\n\r\n3.DECLARACIONES Y FIRMAS:\r\n3.1 El Médico tratante: He informado a este paciente y/o familiar(es) del propósito y naturaleza de la toma de imágenes mediante fotografías descrito anteriormente y de sus alternativas.\r\n3.2 Consentimiento o manifestaciones del paciente o representante legal del menor de edad: Doy mi consentimiento para que se tomen esas fotografías en las cuales se que no se emplearan el nombre del paciente que permita la identificación de las mismas y su uso se limitara a las siguientes condiciones \r\n\r\nAUTORIZACIONES \r\n3.Para uso académico dentro y fuera de las instituciones (publicaciones institucionales, folletos educativos, eventos académicos como congresos y similares, publicaciones extrainstitucionales incluyendo programas de TV) 2. Para uso académico dentro de la institución (clubes de fotos, juntas de decisiones, discusiones de casos clínicos y similares)4. como parte del seguimiento en investigación clínica. \r\n1. En ningún caso se hará uso comercial o lucrativo de estas fotografías                                                                              \r\n2. El representante de un paciente menor de edad deberá acreditar tener la patria potestad', 'agregar otras', 6, 'crypy', 'Crioterapia', 'Autoriza', 'Manifiesto que, habiendo recibido la información relacionada con el procedimiento, he decidido dar mi consentimiento', 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/9mtWV46wU8KorP1T2NZIxWYO5kfM0WrDSJtUYq8f.png', 'storage/uploads/9mtWV46wU8KorP1T2NZIxWYO5kfM0WrDSJtUYq8f.png', 'https://dermasoft.app.3dboosterstudio.com/storage/temp/QX6TaWAhCa84zf8OFKKyXtVMR78VpvXkjFyFV2Ca.pdf', 'active', '2024-01-24 20:50:36', '2024-01-24 20:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `hccrypy`
--

CREATE TABLE `hccrypy` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `hc` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `campus` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `skin_phototype` varchar(191) DEFAULT NULL,
  `procedure_time` varchar(191) DEFAULT NULL,
  `complications` varchar(191) DEFAULT NULL,
  `record_complications` text DEFAULT NULL,
  `participants` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hcdermdiagnostics`
--

CREATE TABLE `hcdermdiagnostics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `hc` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `campus` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `code` varchar(191) DEFAULT NULL,
  `diagnostic` varchar(191) DEFAULT NULL,
  `type_diagnostic` varchar(191) DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hcdermdiagnostics`
--

INSERT INTO `hcdermdiagnostics` (`id`, `uuid`, `hc`, `user`, `company`, `campus`, `code`, `diagnostic`, `type_diagnostic`, `status`, `created_at`, `updated_at`) VALUES
(1, '8f1902b0-62ec-11ee-8cb0-fb06ae3e73a0', 1, 8, 1, 1, 'A301', 'LEPRA TUBERCULOIDE', 'Impresión Diagnóstica', 'active', '2023-10-05 00:31:04', '2023-10-05 00:31:04'),
(2, '96b8d940-62f4-11ee-b79f-e339edbe7884', 2, 8, 1, 1, 'A229', 'CARBUNCO, NO ESPECIFICADO', 'Impresión Diagnóstica', 'active', '2023-10-05 01:28:33', '2023-10-05 01:28:33'),
(3, 'a8db41c0-6306-11ee-b5d9-bbdd41671159', 3, 8, 1, 1, 'A229', 'CARBUNCO, NO ESPECIFICADO', 'Impresión Diagnóstica', 'active', '2023-10-05 03:37:54', '2023-10-05 03:37:54'),
(4, '30fbca80-6309-11ee-9b12-6f4ce8286803', 4, 8, 1, 1, 'A229', 'CARBUNCO, NO ESPECIFICADO', 'Impresión Diagnóstica', 'active', '2023-10-05 03:56:02', '2023-10-05 03:56:02'),
(5, 'c0ea5650-63b3-11ee-a53a-3171fcc45f07', 6, 8, 1, 1, 'A220', 'CARBUNCO CUTANEO', 'Impresión Diagnóstica', 'active', '2023-10-06 00:16:58', '2023-10-06 00:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `hcdermindications`
--

CREATE TABLE `hcdermindications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `hc` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `campus` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `indication` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hcdermindications`
--

INSERT INTO `hcdermindications` (`id`, `uuid`, `hc`, `user`, `company`, `campus`, `indication`, `status`, `created_at`, `updated_at`) VALUES
(1, '8f195b30-62ec-11ee-87f4-bfcad32ab408', 1, 8, 1, 1, 'Higiene adecuada: Lave su piel suavemente con un limpiador suave. Evite frotar enérgicamente y no utilice productos irritantes.', 'active', '2023-10-05 00:31:04', '2023-10-05 00:31:04'),
(2, '8f197c40-62ec-11ee-84a0-19bc88527b38', 1, 8, 1, 1, 'Aplicación de medicamentos: Aplique los medicamentos recetados según las instrucciones. Si se recetaron cremas o lociones, espere unos minutos después de la limpieza antes de aplicarlas.', 'active', '2023-10-05 00:31:04', '2023-10-05 00:31:04'),
(3, '8f198c40-62ec-11ee-924f-f59b60c0ef3e', 1, 8, 1, 1, 'Tomar abundante agua', 'active', '2023-10-05 00:31:04', '2023-10-05 00:31:04'),
(4, '96b917f0-62f4-11ee-9936-c175eda8a333', 2, 8, 1, 1, 'Higiene adecuada: Lave su piel suavemente con un limpiador suave. Evite frotar enérgicamente y no utilice productos irritantes.', 'active', '2023-10-05 01:28:33', '2023-10-05 01:28:33'),
(5, '96b92b50-62f4-11ee-ba0d-a18fbe9da574', 2, 8, 1, 1, 'Aplicación de medicamentos: Aplique los medicamentos recetados según las instrucciones. Si se recetaron cremas o lociones, espere unos minutos después de la limpieza antes de aplicarlas.', 'active', '2023-10-05 01:28:33', '2023-10-05 01:28:33'),
(6, '96b93cf0-62f4-11ee-b3ed-fb5cd6ce11ef', 2, 8, 1, 1, 'Evitar la exposición al sol: Utilice protector solar con un alto factor de protección. Evite la exposición prolongada al sol y use ropa que cubra la piel.', 'active', '2023-10-05 01:28:33', '2023-10-05 01:28:33'),
(7, '96b94be0-62f4-11ee-bf90-6d8d15588cf5', 2, 8, 1, 1, 'otras', 'active', '2023-10-05 01:28:33', '2023-10-05 01:28:33'),
(8, 'a8db73c0-6306-11ee-af89-fb05acfb93c2', 3, 8, 1, 1, 'Higiene adecuada: Lave su piel suavemente con un limpiador suave. Evite frotar enérgicamente y no utilice productos irritantes.', 'active', '2023-10-05 03:37:54', '2023-10-05 03:37:54'),
(9, 'a8db84e0-6306-11ee-b655-11cd8329fffa', 3, 8, 1, 1, 'Aplicación de medicamentos: Aplique los medicamentos recetados según las instrucciones. Si se recetaron cremas o lociones, espere unos minutos después de la limpieza antes de aplicarlas.', 'active', '2023-10-05 03:37:54', '2023-10-05 03:37:54'),
(10, '30fbf880-6309-11ee-bdab-29db216302fd', 4, 8, 1, 1, 'Higiene adecuada: Lave su piel suavemente con un limpiador suave. Evite frotar enérgicamente y no utilice productos irritantes.', 'active', '2023-10-05 03:56:02', '2023-10-05 03:56:02'),
(11, '30fc0f00-6309-11ee-b958-2be0fa3dede1', 4, 8, 1, 1, 'Actividades restringidas: Evite actividades extenuantes y deportes intensos durante el período de recuperación recomendado.', 'active', '2023-10-05 03:56:02', '2023-10-05 03:56:02'),
(12, '30fc1ee0-6309-11ee-a029-1be2a42df16f', 4, 8, 1, 1, 'otra', 'active', '2023-10-05 03:56:02', '2023-10-05 03:56:02'),
(13, '492245d0-63a1-11ee-a5d1-d1b445a22290', 5, 8, 1, 1, 'Higiene adecuada: Lave su piel suavemente con un limpiador suave. Evite frotar enérgicamente y no utilice productos irritantes.', 'active', '2023-10-05 22:04:46', '2023-10-05 22:04:46'),
(14, '49227860-63a1-11ee-9360-17479084fc4d', 5, 8, 1, 1, 'Evitar irritantes: Evite productos o actividades que puedan irritar la piel, como saunas, baños calientes y exfoliaciones agresivas.', 'active', '2023-10-05 22:04:46', '2023-10-05 22:04:46'),
(15, '49228d70-63a1-11ee-a685-f1b5816e0952', 5, 8, 1, 1, 'uty', 'active', '2023-10-05 22:04:46', '2023-10-05 22:04:46'),
(16, 'c0ea92e0-63b3-11ee-9acf-d7bae011651b', 6, 8, 1, 1, 'Higiene adecuada: Lave su piel suavemente con un limpiador suave. Evite frotar enérgicamente y no utilice productos irritantes.', 'active', '2023-10-06 00:16:58', '2023-10-06 00:16:58'),
(17, 'c0eaa730-63b3-11ee-9010-ebb49e61ee1d', 6, 8, 1, 1, 'Actividades restringidas: Evite actividades extenuantes y deportes intensos durante el período de recuperación recomendado.', 'active', '2023-10-06 00:16:58', '2023-10-06 00:16:58'),
(18, 'c0eabc50-63b3-11ee-a5a3-91e2bed9d03f', 6, 8, 1, 1, 'OTRA', 'active', '2023-10-06 00:16:58', '2023-10-06 00:16:58'),
(19, '0fb13b20-b14e-11ee-b1a2-651ee662dc51', 7, 8, 1, 1, 'Higiene adecuada: Lave su piel suavemente con un limpiador suave. Evite frotar enérgicamente y no utilice productos irritantes.', 'active', '2024-01-12 18:25:32', '2024-01-12 18:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `hcdermsolexams`
--

CREATE TABLE `hcdermsolexams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `hc` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `campus` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hcdermsolexams`
--

INSERT INTO `hcdermsolexams` (`id`, `uuid`, `hc`, `user`, `company`, `campus`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, '8f1a9320-62ec-11ee-b0ca-710da7f01374', 1, 8, 1, 1, '90.1.0.01', 'ANTIBIOGRAMA (DISCO)', 'active', '2023-10-05 00:31:04', '2023-10-05 00:31:04'),
(2, '0fb2db40-b14e-11ee-9ca1-955242604ce6', 7, 8, 1, 1, '90.1.0.04', 'HONGOS PRUEBAS DE SENSIBILIDAD', 'active', '2024-01-12 18:25:32', '2024-01-12 18:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `hcdermsolpath`
--

CREATE TABLE `hcdermsolpath` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `hc` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `campus` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hcdermsolpath`
--

INSERT INTO `hcdermsolpath` (`id`, `uuid`, `hc`, `user`, `company`, `campus`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, '8f1c6380-62ec-11ee-a153-ed29acfa89de', 1, 8, 1, 1, 'V100', 'Cultivo y Sensibilidad', 'active', '2023-10-05 00:31:04', '2023-10-05 00:31:04'),
(2, 'c0eb0630-63b3-11ee-a7b7-bf441d9876b6', 6, 8, 1, 1, 'Y100', 'Inmunohistoquímica', 'active', '2023-10-06 00:16:58', '2023-10-06 00:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `hcdermsolproc`
--

CREATE TABLE `hcdermsolproc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `hc` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `campus` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hcdermsolproc`
--

INSERT INTO `hcdermsolproc` (`id`, `uuid`, `hc`, `user`, `company`, `campus`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, '8f1bed40-62ec-11ee-8dd6-2fbf4b83276d', 1, 8, 1, 1, '001', 'Biopsia', 'active', '2023-10-05 00:31:04', '2023-10-05 00:31:04'),
(2, '0fb33560-b14e-11ee-8cb6-35589f24117a', 7, 8, 1, 1, '860201', 'PRUBA INTRADERMICA DE ALERGIA', 'active', '2024-01-12 18:25:32', '2024-01-12 18:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `hclesion`
--

CREATE TABLE `hclesion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `hc` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `campus` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `lesion` varchar(191) DEFAULT NULL,
  `body_area` varchar(191) DEFAULT NULL,
  `disinfection` varchar(191) DEFAULT NULL,
  `antiseptic` varchar(191) DEFAULT NULL,
  `anesthesia` varchar(191) DEFAULT NULL,
  `type_anesthesia` varchar(191) DEFAULT NULL,
  `other_anesthesia` varchar(191) DEFAULT NULL,
  `freeze_time_1` varchar(191) DEFAULT NULL,
  `freeze_time_2` varchar(191) DEFAULT NULL,
  `defrost_time_1` varchar(191) DEFAULT NULL,
  `defrost_time_2` varchar(191) DEFAULT NULL,
  `timex` varchar(191) DEFAULT NULL,
  `technique` varchar(191) DEFAULT NULL,
  `other_technique` varchar(191) DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hcprocedure`
--

CREATE TABLE `hcprocedure` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `hc` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `campus` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `type_procedure` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `other_procedure` varchar(191) DEFAULT NULL,
  `disinfection` varchar(191) DEFAULT NULL,
  `antiseptic` varchar(191) DEFAULT NULL,
  `anesthesia` varchar(191) DEFAULT NULL,
  `type_anesthesia` varchar(191) DEFAULT NULL,
  `other_anesthesia` varchar(191) DEFAULT NULL,
  `hemostasis` varchar(191) DEFAULT NULL,
  `other_hemostasis` varchar(191) DEFAULT NULL,
  `procedure_time` varchar(191) DEFAULT NULL,
  `complications` varchar(191) DEFAULT NULL,
  `record_complications` text DEFAULT NULL,
  `participants` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `biopsy_method` varchar(191) DEFAULT NULL,
  `other_biopsy_method` varchar(191) DEFAULT NULL,
  `biopsy_type` varchar(191) DEFAULT NULL,
  `required_margin` varchar(191) DEFAULT NULL,
  `how_much` varchar(191) DEFAULT NULL,
  `body_area` varchar(191) DEFAULT NULL,
  `body_area_other` varchar(191) DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hcprocedure`
--

INSERT INTO `hcprocedure` (`id`, `uuid`, `hc`, `user`, `company`, `campus`, `type_procedure`, `other_procedure`, `disinfection`, `antiseptic`, `anesthesia`, `type_anesthesia`, `other_anesthesia`, `hemostasis`, `other_hemostasis`, `procedure_time`, `complications`, `record_complications`, `participants`, `comments`, `biopsy_method`, `other_biopsy_method`, `biopsy_type`, `required_margin`, `how_much`, `body_area`, `body_area_other`, `status`, `created_at`, `updated_at`) VALUES
(1, 'a8da8bd0-6306-11ee-8a6e-b3d04eaf5ffb', 3, 8, 1, 1, 1, '', 'Otro antiséptico', 'otro', 'Si', 'Otro', 'otro', 'No', '', '1 hora', 'Si', 'no mucho', 'dr. caliche\r\nenfermera torres\r\ninstrumentadora alexa', 'no hay', 'Otro', 'otro', 'Incicional', 'Si', '5mm', 'Cuero cabelludo', 'Frente', 'active', '2023-10-05 03:37:54', '2023-10-05 03:37:54'),
(2, '30fb4560-6309-11ee-9893-cff82a9cdf29', 4, 8, 1, 1, 17, '', 'Otro antiséptico', 'otro', 'No', '', 'vvdf', 'Ellman', '', '1 hora', 'Si', 'estas fueron', 'dr. caliche\r\nenfermera torres\r\ninstrumentadora alexa', 'no hay', 'Otro', '', 'Incicional', 'Si', '', 'Cuero cabelludo', 'Frente', 'active', '2023-10-05 03:56:02', '2023-10-05 03:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `hcsurgical`
--

CREATE TABLE `hcsurgical` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `hc` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `campus` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `type_procedure` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `other_procedure` varchar(191) DEFAULT NULL,
  `disinfection` varchar(191) DEFAULT NULL,
  `antiseptic` varchar(191) DEFAULT NULL,
  `anesthesia` varchar(191) DEFAULT NULL,
  `type_anesthesia` varchar(191) DEFAULT NULL,
  `other_anesthesia` varchar(191) DEFAULT NULL,
  `procedure_time` varchar(191) DEFAULT NULL,
  `complications` varchar(191) DEFAULT NULL,
  `record_complications` text DEFAULT NULL,
  `participants` text DEFAULT NULL,
  `surgeon` varchar(191) DEFAULT NULL,
  `assistant` varchar(191) DEFAULT NULL,
  `instrumentalist` varchar(191) DEFAULT NULL,
  `anesthesiologist` varchar(191) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hcsurgical`
--

INSERT INTO `hcsurgical` (`id`, `uuid`, `hc`, `user`, `company`, `campus`, `type_procedure`, `other_procedure`, `disinfection`, `antiseptic`, `anesthesia`, `type_anesthesia`, `other_anesthesia`, `procedure_time`, `complications`, `record_complications`, `participants`, `surgeon`, `assistant`, `instrumentalist`, `anesthesiologist`, `comments`, `status`, `created_at`, `updated_at`) VALUES
(1, 'c0e97b80-63b3-11ee-8339-c730ef2377d7', 6, 8, 1, 1, 2, 'otro', 'Otro antiséptico', 'otro', 'Si', 'Otro', 'pk', '10 MINUTOS', 'Si', 'CCCS', '', NULL, NULL, NULL, NULL, 'CACC', 'active', '2023-10-06 00:16:58', '2023-10-06 00:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `hcsuture`
--

CREATE TABLE `hcsuture` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `hc` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `campus` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `suture_type` varchar(191) DEFAULT NULL,
  `caliber` varchar(191) DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hcsuture`
--

INSERT INTO `hcsuture` (`id`, `uuid`, `hc`, `user`, `company`, `campus`, `suture_type`, `caliber`, `status`, `created_at`, `updated_at`) VALUES
(1, 'a8dad100-6306-11ee-9c49-39d53b0d4d5f', 3, 8, 1, 1, 'Prolene', '20', 'active', '2023-10-05 03:37:54', '2023-10-05 03:37:54'),
(2, 'a8dae390-6306-11ee-b7fb-e1b0f03b3d7b', 3, 8, 1, 1, 'Miralene', '5', 'active', '2023-10-05 03:37:54', '2023-10-05 03:37:54'),
(3, 'a8daf440-6306-11ee-a17a-1d173359a0ad', 3, 8, 1, 1, 'Miralene', '2', 'active', '2023-10-05 03:37:54', '2023-10-05 03:37:54'),
(4, '30fb7290-6309-11ee-8202-d995af6584f8', 4, 8, 1, 1, 'Prolene', '5mm', 'active', '2023-10-05 03:56:02', '2023-10-05 03:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `hctreatment`
--

CREATE TABLE `hctreatment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `hc` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `campus` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `muscle` varchar(191) DEFAULT NULL,
  `units` int(11) DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hctreatment`
--

INSERT INTO `hctreatment` (`id`, `uuid`, `hc`, `user`, `company`, `campus`, `muscle`, `units`, `status`, `created_at`, `updated_at`) VALUES
(1, '4921c080-63a1-11ee-a452-13a3b52fd1cc', 5, 8, 1, 1, 'Orbicular de ojo izquierdo', 5, 'active', '2023-10-05 22:04:46', '2023-10-05 22:04:46'),
(2, '4921dce0-63a1-11ee-af9f-5d93e55286df', 5, 8, 1, 1, 'Frontal', 5, 'active', '2023-10-05 22:04:46', '2023-10-05 22:04:46'),
(3, '4921f140-63a1-11ee-88d0-1b46d6c3b6e9', 5, 8, 1, 1, 'Orbicular subpalpebral derecho', 2, 'active', '2023-10-05 22:04:46', '2023-10-05 22:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `hctumors`
--

CREATE TABLE `hctumors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `hc` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `campus` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `tumors` varchar(191) DEFAULT NULL,
  `size` varchar(191) DEFAULT NULL,
  `margin` varchar(191) DEFAULT NULL,
  `pathology` varchar(191) DEFAULT NULL,
  `observations` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hctumors`
--

INSERT INTO `hctumors` (`id`, `uuid`, `hc`, `user`, `company`, `campus`, `tumors`, `size`, `margin`, `pathology`, `observations`, `status`, `created_at`, `updated_at`) VALUES
(1, 'c0e9d260-63b3-11ee-9c95-0329ad3af9a5', 6, 8, 1, 1, 'Si', '2cm', '2mm', 'si', 'cscs', 'active', '2023-10-06 00:16:58', '2023-10-06 00:16:58'),
(2, 'c0e9f1c0-63b3-11ee-a46f-878ed85b1d4d', 6, 8, 1, 1, 'Si', '225', '254', 'NO', 'NO', 'active', '2023-10-06 00:16:58', '2023-10-06 00:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `headquarters`
--

CREATE TABLE `headquarters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `code` varchar(191) NOT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `responsible` varchar(191) NOT NULL,
  `responsible_phone` varchar(191) NOT NULL,
  `responsible_email` varchar(191) NOT NULL,
  `position` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `state` varchar(191) NOT NULL DEFAULT 'activo',
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `headquarters`
--

INSERT INTO `headquarters` (`id`, `uuid`, `name`, `code`, `address`, `city`, `phone`, `email`, `responsible`, `responsible_phone`, `responsible_email`, `position`, `company`, `state`, `status`, `created_at`, `updated_at`) VALUES
(1, 'facb0100-607b-11ee-a274-d3b62237ddcc', 'Desis Dermatology', '01', NULL, '', '30012345678', 'alex1ptm@gmail.com', 'carlos almeciga', '30012345678', 'alex1ptm@gmail.com', 0, 1, 'activo', 'active', '2023-10-01 22:00:09', '2023-10-01 22:00:09'),
(2, '286658c0-6150-11ee-962f-15046822ab16', 'dermatrix', '01', NULL, '', '3022112345', 'alex1ptm_@hotmail.com', 'Alfredo', '3022112345', 'alex1ptm_@hotmail.com', 0, 2, 'activo', 'active', '2023-10-02 23:18:59', '2023-10-02 23:18:59'),
(3, 'aaec0800-b55b-11ee-a498-af198568d399', 'BIOSCENTER', '01', NULL, '', '3103451137', 'edna@bioscenter.com.co', 'edna', '3103451137', 'edna@bioscenter.com.co', 0, 3, 'activo', 'active', '2024-01-17 22:13:00', '2024-01-17 22:13:00'),
(4, '5fac77d0-b615-11ee-819f-bbe98b34b33a', 'FIGURA PIEL Y LASER', '01', NULL, '', '3017067245', 'figurapielylaser@gmail.com', 'ALBA CELY SOTO RIVERA', '3134109274', 'figurapielylaser@gmail.com', 0, 4, 'activo', 'active', '2024-01-18 20:22:21', '2024-01-18 20:22:21');

-- --------------------------------------------------------

--
-- Table structure for table `indications`
--

CREATE TABLE `indications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indications`
--

INSERT INTO `indications` (`id`, `uuid`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, '79dbf740-606f-11ee-a109-d13ccfdda3ee', 'Higiene adecuada: Lave su piel suavemente con un limpiador suave. Evite frotar enérgicamente y no utilice productos irritantes.', 'active', '2023-10-01 20:30:39', '2023-10-01 20:30:39'),
(2, '832ae430-606f-11ee-b0f4-f17da719ed80', 'Aplicación de medicamentos: Aplique los medicamentos recetados según las instrucciones. Si se recetaron cremas o lociones, espere unos minutos después de la limpieza antes de aplicarlas.', 'active', '2023-10-01 20:30:55', '2023-10-01 20:30:55'),
(3, 'b0b35060-606f-11ee-bc68-c5de62c70346', 'Evitar la exposición al sol: Utilice protector solar con un alto factor de protección. Evite la exposición prolongada al sol y use ropa que cubra la piel.', 'active', '2023-10-01 20:32:11', '2023-10-01 20:32:11'),
(4, 'c259bfe0-606f-11ee-9886-7da439f7ee20', 'Evitar irritantes: Evite productos o actividades que puedan irritar la piel, como saunas, baños calientes y exfoliaciones agresivas.', 'active', '2023-10-01 20:32:41', '2023-10-01 20:32:41'),
(5, 'ce376f40-606f-11ee-bd68-ab3f9fc19861', 'Actividades restringidas: Evite actividades extenuantes y deportes intensos durante el período de recuperación recomendado.', 'active', '2023-10-01 20:33:01', '2023-10-01 20:33:01'),
(6, 'd86bee30-606f-11ee-af54-7dc7ce832101', 'Visitas de seguimiento: Asista a las citas de seguimiento según lo programado para evaluar la recuperación y retirar suturas, si es necesario.', 'active', '2023-10-01 20:33:18', '2023-10-01 20:33:18'),
(7, '29e62a50-bacd-11ee-9c84-1f4631b352f5', 'SKINPEN NO APLICAR BLOQUEADOR SOLAR DURANTE 3 DIAS UTILIZAR SOMBRERO ,GORRA O SOMBRILLA APLICAR DIA Y NOCHE CREMA HUMECTANTE', 'active', '2024-01-24 20:28:02', '2024-01-24 20:28:02');

-- --------------------------------------------------------

--
-- Table structure for table `laboratoryexams`
--

CREATE TABLE `laboratoryexams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laboratoryexams`
--

INSERT INTO `laboratoryexams` (`id`, `uuid`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dd7d9570-b93b-11ee-898e-9b473f75a98e', 'código', 'descripción', 'deleted', '2024-01-22 20:35:26', '2024-01-24 20:04:19'),
(2, 'dd7db180-b93b-11ee-80e7-7dadbd26dd7a', '90.1.0. ', 'ANTIBIOGRAMA Y PRUEBAS DE SENSIBILIDAD ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(3, 'dd7dbfb0-b93b-11ee-861e-412ab09c9a99', '90.1.0.01 ', 'ANTIBIOGRAMA (DISCO) ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(4, 'dd7dccd0-b93b-11ee-91d1-ab647797b90e', '90.1.0.02  ', 'ANTIBIOGRAMA CONCENTRACIÓN MÍNIMA INHIBITORIA METODO AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(5, 'dd7dd960-b93b-11ee-8cd7-23720dc10106', '90.1.0.03  ', 'ANTIBIOGRAMA CONCENTRACIÓN MÍNIMA INHIBITORIA METODO MANUAL', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(6, 'dd7de5b0-b93b-11ee-b572-0509e121c832', '90.1.0.04 ', 'HONGOS PRUEBAS DE SENSIBILIDAD ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(7, 'dd7df1e0-b93b-11ee-9ee7-7977c1455d0b', '90.1.0.05  ', 'LEVADURAS PRUEBA DE SENSIBILIDAD POR DILUCIÓN', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(8, 'dd7dfe80-b93b-11ee-97f9-43dc531b6d51', '90.1.0.06  ', 'LEVADURAS PRUEBA DE SENSIBILIDAD POR E-TEST', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(9, 'dd7e0ab0-b93b-11ee-8ad4-73aa14011f10', '90.1.0.07 ', 'MYCOBACTERIUM PRUEBAS DE SENSIBILIDAD ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(10, 'dd7e16d0-b93b-11ee-8327-f1dce780fa76', '90.1.0.08 ', 'NEISSERIA GONORRHOEAE PRUEBA DE SENSIBILIDAD ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(11, 'dd7e2340-b93b-11ee-91e4-17d220203403', '90.1.0.09 ', 'DETECCIÓN DE CARBAPENEMASAS (EDTA, TEST DE HODGE MODIFICADO, ÁCIDO BORÓNICO) ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(12, 'dd7e2fb0-b93b-11ee-b20e-af7957fc9cfb', '90.1.1.01 ', 'BACILOSCOPIA COLORACIÓN ÁCIDO ALCOHOL-RESISTENTE [ZIEHL-NEELSEN] ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(13, 'dd7e3bc0-b93b-11ee-9078-33ecc55ae6b2', '90.1.1.02 ', 'COLORACIÓN ÁCIDO ALCOHOL RESISTENTE MODIFICADA Y LECTURA INCLUYE: ISOSPORA BELLI, CRYPTOSPORIDIUM, ENTRE OTROS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(14, 'dd7e4840-b93b-11ee-9656-3be960594caf', '90.1.1.03 ', 'COLORACIÓN ALBERT [LOEFFLER] Y LECTURA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(15, 'dd7e5470-b93b-11ee-a6ad-71908bed20d2', '90.1.1.04 ', 'COLORACIÓN AZUL DE METILENO Y LECTURA PARA CUALQUIER MUESTRA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(16, 'dd7e6080-b93b-11ee-a5a6-518270011bea', '90.1.1.05 ', 'COLORACIÓN FLUORESCENTE NARANJA DE ACRIDINA Y LECTURA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(17, 'dd7e6cb0-b93b-11ee-87d1-fda94bd7ea55', '90.1.1.06 ', 'COLORACIÓN GIEMSA Y LECTURA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(18, 'dd7e78b0-b93b-11ee-951a-a90cdc50c2c2', '90.1.1.07 ', 'COLORACIÓN GRAM Y LECTURA PARA CUALQUIER MUESTRA INCLUYE: SECRECIÓN VAGINAL, URETRAL O RECTAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(19, 'dd7e86a0-b93b-11ee-91e4-9395b599d310', '90.1.1.08 ', 'COLORACIÓN ROMANOWSKY Y LECTURA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(20, 'dd7e9310-b93b-11ee-bbfd-19cd34805dc5', '90.1.1.09 ', 'COLORACIÓN TINTA CHINA Y LECTURA  INCLUYE: CRYPTOCOCCUS NEOFORMANS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(21, 'dd7e9f40-b93b-11ee-a2d3-9d6a0a63e7db', '90.1.1.10 ', 'COLORACIÓN TRICROMICA MODIFICADA Y LECTURA INCLUYE: MICROSPORIDIA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(22, 'dd7eab30-b93b-11ee-8688-c72404a2baa2', '90.1.1.11 ', 'BACILOSCOPIA COLORACIÓN ÁCIDO ALCOHOL RESISTENTE [ZIELH-NEELSEN] LECTURA SERIADA TRES MUESTRAS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(23, 'dd7eb800-b93b-11ee-bcd9-bd85004ffe36', '90.1.2.01 ', 'ACTINOMYCES CULTIVO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(24, 'dd7ec430-b93b-11ee-a62d-51755d1787a0', '90.1.2.02 ', 'BORDETELLA PERTUSSIS CULTIVO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(25, 'dd7ed050-b93b-11ee-95e1-01a12c391c18', '90.1.2.03 ', 'BRUCELLA CULTIVO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(26, 'dd7edd70-b93b-11ee-bab2-0183661fcf71', '90.1.2.04 ', 'CLOSTRIDIUM BOTULINUM CULTIVO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(27, 'dd7ee9c0-b93b-11ee-8cef-9567a283ad0e', '90.1.2.05 ', 'CLOSTRIDIUM DIFFICILE CULTIVO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(28, 'dd7ef5b0-b93b-11ee-a9be-a56628393ce8', '90.1.2.06 ', 'COPROCULTIVO  INCLUYE: IDENTIFICACIÓN GÉNERO O ESPECIE ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(29, 'dd7f01c0-b93b-11ee-913e-b5541cecda11', '90.1.2.07  ', 'CORYNEBACTERIUM DIFTERIAE CULTIVO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(30, 'dd7f0e00-b93b-11ee-9ac1-c9050397a43e', '90.1.2.08 ', 'CRYPTOCOCCUS NEOFORMANS CULTIVO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(31, 'dd7f1a00-b93b-11ee-98c7-31597f62a8a9', '90.1.2.09 ', 'CULTIVO DE LÍQUIDOS CORPORALES (BILIS L.C.R PERITONEAL PLEURAL ASCITICO SINOVIAL OTROS DIFERENTE A ORINA) INCLUYE: IDENTIFICACIÓN GÉNERO O ESPECIE ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(32, 'dd7f2600-b93b-11ee-b184-2d50fc6563ec', '90.1.2.10 ', 'CULTIVO ESPECIAL PARA OTROS MICROORGANISMOS EN CUALQUIER MUESTRA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(33, 'dd7f3270-b93b-11ee-9910-7b7b419d82b7', '90.1.2.11 ', 'CULTIVO PARA HONGOS EN MÉDULA ÓSEA EXCLUYE: TOMA DE MUESTRA (41.3.1.01) ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(34, 'dd7f3ea0-b93b-11ee-90eb-69eabea3453c', '90.1.2.12 ', 'CULTIVO PARA HONGOS MICOSIS PROFUNDA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(35, 'dd7f4aa0-b93b-11ee-b4f4-8761d189aa89', '90.1.2.13 ', 'CULTIVO PARA HONGOS MICOSIS SUPERFICIAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(36, 'dd7f56c0-b93b-11ee-bb14-c1d93c044206', '90.1.2.19 ', 'CULTIVO PARA VIRUS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(37, 'dd7f62c0-b93b-11ee-9bfc-4fe38c5a2cd6', '90.1.2.20  ', 'HELICOBACTER PYLORI CULTIVO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(38, 'dd7f6ec0-b93b-11ee-a369-b5c80d86e8db', '90.1.2.28 ', 'LEGIONELLA CULTIVO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(39, 'dd7f7b20-b93b-11ee-8031-f50435ebd3f9', '90.1.2.29 ', 'MICOBACTERIAS NO TUBERCULOSAS CULTIVO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(40, 'dd7f8740-b93b-11ee-924c-eda22ba632cf', '90.1.2.30  ', 'MYCOBACTERIUM TUBERCULOSIS CULTIVO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(41, 'dd7f9330-b93b-11ee-8efc-d7aadd5aa546', '90.1.2.31 ', 'MYCOPLASMA CULTIVO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(42, 'dd7f9f20-b93b-11ee-aa38-390235ec7231', '90.1.2.32 ', 'NEISSERIA GONORRHOEAE CULTIVO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(43, 'dd7fab60-b93b-11ee-9e97-5d8a885a781c', '90.1.2.33 ', 'NEISSERIA MENINGITIDIS CULTIVO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(44, 'dd7fb740-b93b-11ee-ab9f-e3419ea31801', '90.1.2.34 ', 'NOCARDIA SPP CULTIVO HONGOS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(45, 'dd7fc330-b93b-11ee-8adc-495c5b8ee6df', '90.1.2.35 ', 'UROCULTIVO (ANTIBIOGRAMA DE DISCO)', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(46, 'dd7fcf80-b93b-11ee-9a03-f5514b72743b', '90.1.2.36 ', 'UROCULTIVO (ANTIBIOGRAMA CONCENTRACIÓN MÍNIMA INHIBITORIA AUTOMATIZADO) ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(47, 'dd7fdb90-b93b-11ee-97ee-052d86eff719', '90.1.2.37  ', 'UROCULTIVO (ANTIBIOGRAMA CONCENTRACIÓN MÍNIMA INHIBITORIA MANUAL)', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(48, 'dd7fe780-b93b-11ee-998b-dd692e07a5d9', '90.1.2.38 ', 'YERSINIA ENTEROCOLÍTICA CULTIVO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(49, 'dd7ff3a0-b93b-11ee-bd0b-130f1a24231e', '90.1.2.39 ', 'TRICHOMONA CULTIVO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(50, 'dd7fffc0-b93b-11ee-9202-df93783f7292', '90.1.2.40 ', 'IDENTIFICACIÓN DE CULTIVO AISLADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(51, 'dd800be0-b93b-11ee-9511-2d43194f7952', '90.1.2.41 ', 'CAMPYLOBACTER SPP CULTIVO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(52, 'dd8017e0-b93b-11ee-88ab-759feb01a711', '90.1.2.42 ', 'CORYNEBACTERIUM DIFTERIAE PRUEBA DE TOXIGENICIDAD ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(53, 'dd8023e0-b93b-11ee-8a22-c3c3b87e48f1', '90.1.3.01 ', 'BETA LACTAMASA PRUEBA DE PENICILINASA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(54, 'dd802fb0-b93b-11ee-9d37-912103d356c7', '90.1.3.02  ', 'DEMODEX EXAMEN DIRECTO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(55, 'dd803ba0-b93b-11ee-80c4-25b08d20dcb2', '90.1.3.03 ', 'ESCHERICHIA COLI ENTEROPATOGENA EN MATERIA FECAL POR SEROTIPIFICACIÓN ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(56, 'dd8047d0-b93b-11ee-a1ff-a92d617f6a27', '90.1.3.04 ', 'EXAMEN DIRECTO FRESCO DE CUALQUIER MUESTRA INCLUYE: SECRECIÓN NASAL, OCULAR, OTICA, VAGINAL, URETRAL O RECTAL', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(57, 'dd8053c0-b93b-11ee-8de8-95d81af43c76', '90.1.3.05 ', 'EXAMEN DIRECTO PARA HONGOS (KOH) ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(58, 'dd805fc0-b93b-11ee-b519-774df28b6178', '90.1.3.06 ', 'EXAMEN DIRECTO PARA HONGOS CON CALCOFLÚOR ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(59, 'dd806c10-b93b-11ee-9274-df90e95b8469', '90.1.3.07 ', 'HONGOS PRUEBA DE VIABILIDAD ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(60, 'dd807800-b93b-11ee-8c7a-b170d6b7087b', '90.1.3.09 ', 'LEISHMANIA ANTICUERPOS AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(61, 'dd808400-b93b-11ee-95b6-d5fd6122fb2c', '90.1.3.10 ', 'LEISHMANIA TIPIFICACIÓN POR SONDAS DE DNA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(62, 'dd809020-b93b-11ee-8bd7-355b8374c47f', '90.1.3.11 ', 'LEPTOSPIRA SEROTIPIFICACIÓN ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(63, 'dd809c40-b93b-11ee-b253-ab806a00dc37', '90.1.3.12 ', 'LISTERIA SEROTIPIFICACIÓN ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(64, 'dd80a880-b93b-11ee-b11f-dbf748a06030', '90.1.3.13 ', 'MYCOBACTERIUM IDENTIFICACIÓN ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(65, 'dd80b5b0-b93b-11ee-a7c5-ebe0bfbaed2b', '90.1.3.15 ', 'MYCOBACTERIUM LEPRAE DETECCIÓN DE GLICOLÍPIDO FENÓLICO AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(66, 'dd80c2c0-b93b-11ee-b36e-d796788dc28e', '90.1.3.17 ', 'NEISSERIA MENINGITIDIS SEROTIPIFICACIÓN POR LÁTEX ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(67, 'dd80cf20-b93b-11ee-9bfa-91e8884f2ea6', '90.1.3.18  ', 'SARCOPTES EXAMEN DIRECTO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(68, 'dd80dbb0-b93b-11ee-bc64-23181fae6c3b', '90.1.3.19  ', 'SHIGUELLA SEROTIPIFICACIÓN', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(69, 'dd80e7d0-b93b-11ee-ac07-6361a2af0c8f', '90.1.3.20 ', 'STAPHYLOCOCCUS AUREUS SEROTIPIFICACIÓN', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(70, 'dd80f3e0-b93b-11ee-977b-07c542cbac2f', '90.1.3.21 ', 'STREPTOCOCCUS BETA HEMOLÍTICO GRUPO A (PRUEBA DIRECTA) ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(71, 'dd810040-b93b-11ee-9099-d5c3f3327781', '90.1.3.22 ', 'STREPTOCOCCUS PNEUMONIAE [PNEUMOCOCCUS] SEROTIPIFICACIÓN ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(72, 'dd810c70-b93b-11ee-9304-c9860bd62781', '90.1.3.23 ', 'MYCOBACTERIUM LEPRAE PRUEBA DE VIABILIDAD ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(73, 'dd811880-b93b-11ee-be40-a7431344fddb', '90.1.3.24 ', 'FILARIA EXAMEN DIRECTO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(74, 'dd8124c0-b93b-11ee-913f-ab3f1d15231e', '90.1.3.25 ', 'EXAMEN DIRECTO DE CUALQUIER MUESTRA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(75, 'dd813170-b93b-11ee-9500-4781e182b2f4', '90.1.3.26 ', 'LEISHMANIA EXAMEN DIRECTO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(76, 'dd813d80-b93b-11ee-8152-dbfc3022c2f0', '90.1.5.02 ', 'CLOSTRIDIUM TOXINA INCLUYE: CLOSTRIDIUM DIFFICILE, CLOSTRIDIUM BOTULINUM', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(77, 'dd814970-b93b-11ee-86a9-3d5773850fd3', '90.2.0.01 ', 'ADHESIVIDAD PLAQUETARIA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(78, 'dd8155b0-b93b-11ee-8b4c-35af09081a7e', '90.2.0.02 ', 'AGREGACIÓN PLAQUETARIA CON RISTOCETINA 2 DILUCIONES [RIPA] ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(79, 'dd8161b0-b93b-11ee-8634-a15868c830d8', '90.2.0.03 ', 'AGREGACIÓN PLAQUETARIA CURVA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(80, 'dd816dc0-b93b-11ee-9ef1-9f2b349c04b9', '90.2.0.04 ', 'ANTICOAGULANTE LÚPICO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(81, 'dd817a10-b93b-11ee-8d96-a725d8d8c76e', '90.2.0.05  ', 'PRUEBA CONFIRMATORIA TIEMPO VENENO DE VÍBORA DE RUSSELL', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(82, 'dd818660-b93b-11ee-ad7c-d9a448758e3a', '90.2.0.06 ', 'ANTÍGENO ANTITROMBINA III (CONCENTRACIÓN) AUTOMATIZADA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(83, 'dd819250-b93b-11ee-bacf-19d2d09b595b', '90.2.0.07 ', 'ANTITROMBINA III FUNCIONAL AUTOMATIZADA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(84, 'dd81a1f0-b93b-11ee-9f4c-7f4fa125db1a', '90.2.0.08  ', 'ANTÍGENO ANTITROMBINA III (CONCENTRACIÓN) MANUAL', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(85, 'dd81ae40-b93b-11ee-8835-21b05b3ca5a6', '90.2.0.09 ', 'ANTITROMBINA III FUNCIONAL MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(86, 'dd81ba30-b93b-11ee-b88d-b328eef4d447', '90.2.0.10 ', 'DILUCIONES DE TIEMPO DE PROTROMBINA (TP CRUZADO O ANTICOAGULANTE CIRCULANTE) ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(87, 'dd81c670-b93b-11ee-8ef7-39e23ee2618f', '90.2.0.11 ', 'DILUCIONES DE TIEMPO DE TROMBOPLASTINA PARCIAL (TTP CRUZADO O ANTICOAGULANTE CIRCULANTE) ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(88, 'dd81d280-b93b-11ee-851c-41f47e9532a6', '90.2.0.33 ', 'PROTEÍNA C DE LA COAGULACIÓN ACTIVIDAD ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(89, 'dd81de80-b93b-11ee-8dd4-bf6f67a3a093', '90.2.0.34 ', 'PROTEÍNA C DE LA COAGULACIÓN ANTÍGENO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(90, 'dd81eaa0-b93b-11ee-b78f-79ebd9e0de40', '90.2.0.35 ', 'PROTEÍNA S DE LA COAGULACIÓN ACTIVIDAD ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(91, 'dd81f6c0-b93b-11ee-860b-7fd3e7d4cd8f', '90.2.0.36 ', 'PROTEÍNA S DE LA COAGULACIÓN ANTÍGENO TOTAL', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(92, 'dd8202c0-b93b-11ee-aac9-f13ba7cb7c9d', '90.2.0.37 ', 'PROTEÍNA S DE LA COAGULACIÓN ANTÍGENO LIBRE ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(93, 'dd820ed0-b93b-11ee-8759-616ae39767e8', '90.2.0.38 ', 'PRUEBA DE PROTAMINA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(94, 'dd821b10-b93b-11ee-9bf3-bd220045cfde', '90.2.0.39 ', 'RESISTENCIA A LA PROTEÍNA C ACTIVADA (ASOCIADA A FACTOR V) ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(95, 'dd822730-b93b-11ee-b5ef-63690fb0d384', '90.2.0.45 ', 'TIEMPO DE PROTROMBINA [TP] ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(96, 'dd823340-b93b-11ee-a91f-03a053dc0a7c', '90.2.0.46 ', 'TIEMPO DE SANGRÍA [IVY O DUKE', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(97, 'dd824080-b93b-11ee-b62d-77341d918e21', '90.2.0.47 ', 'TIEMPO DE SANGRÍA ESTANDARIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(98, 'dd824ca0-b93b-11ee-9a88-53893815c38e', '90.2.0.48 ', 'TIEMPO DE TROMBINA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(99, 'dd8259f0-b93b-11ee-8814-775f2227ed49', '90.2.0.49 ', 'TIEMPO DE TROMBOPLASTINA PARCIAL [TTP] ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(100, 'dd826cf0-b93b-11ee-987c-bfb8e023ad6f', '90.2.0.52 ', 'CRIOFIBRINÓGENO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(101, 'dd827f30-b93b-11ee-9bc1-031787c1fe07', '90.2.1.04 ', 'DIMERO D AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(102, 'dd828df0-b93b-11ee-974c-4dd05d905e29', '90.2.1.05 ', 'DIMERO D MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(103, 'dd829ae0-b93b-11ee-aaad-ad7b8e27e819', '90.2.1.06 ', 'ERITROPOYETINA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(104, 'dd82a5a0-b93b-11ee-8684-f5c2a20a7ea3', '90.2.1.07 ', 'FRAGILIDAD OSMÓTICA DE ERITROCITOS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(105, 'dd82afb0-b93b-11ee-a051-77aedf0fad7d', '90.2.1.08 ', 'GLUCOSA 6 FOSFATO DESHIDROGENASA CUALITATIVA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(106, 'dd82b9a0-b93b-11ee-85cd-73e61bccfa25', '90.2.1.09 ', 'GLUCOSA 6 FOSFATO DESHIDROGENASA CUANTITATIVA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(107, 'dd82c3a0-b93b-11ee-b31f-2f14d6b4ff0a', '90.2.1.10 ', 'HEMOGLOBINA A 2', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(108, 'dd82cd50-b93b-11ee-b769-8130fbcab6cd', '90.2.1.13 ', 'HEMOGLOBINA PLASMÁTICA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(109, 'dd82d770-b93b-11ee-81b4-b1e3ceef7bd5', '90.2.1.21 ', 'PRUEBA DE CICLAJE [CÉLULAS FALCIFORMES O DREPANOCITOS] ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(110, 'dd82e170-b93b-11ee-ba03-b541eae18bf4', '90.2.1.22 ', 'SULFOHEMOGLOBINA CUANTITATIVA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(111, 'dd82eb50-b93b-11ee-8260-43d48a4187e6', '90.2.1.23  ', 'VISCOCIDAD RELATIVA DEL SUERO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(112, 'dd82f520-b93b-11ee-9316-e95e888636d0', '90.2.2.04', 'ERITROSEDIMENTACIÓN [VELOCIDAD SEDIMENTACIÓN GLOBULAR - VSG] MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(113, 'dd82ff60-b93b-11ee-afd6-4dbcd6f3c161', '90.2.2.05 ', 'ERITROSEDIMENTACIÓN [VELOCIDAD SEDIMENTACIÓN GLOBULAR - VSG] AUTOMATIZADA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(114, 'dd830940-b93b-11ee-871f-2592823ae13e', '90.2.2.06', 'EXTENDIDO DE SANGRE PERIFÉRICA ESTUDIO DE MORFOLOGÍA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(115, 'dd8312e0-b93b-11ee-aa6c-4d1eeb5773fa', '90.2.2.07 ', 'HEMOGRAMA I (HEMOGLOBINA HEMATOCRITO Y LEUCOGRAMA) MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(116, 'dd831cd0-b93b-11ee-9e43-8f202449fa65', '90.2.2.08 ', 'HEMOGRAMA II (HEMOGLOBINA HEMATOCRITO RECUENTO DE ERITROCITOS ÍNDICES ERITROCITARIOS LEUCOGRAMA RECUENTO DE PLAQUETAS E ÍNDICES PLAQUETARIOS) SEMIAUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(117, 'dd832700-b93b-11ee-8e0f-5b338d87fbf5', '90.2.2.09 ', 'HEMOGRAMA III (HEMOGLOBINA HEMATOCRITO RECUENTO DE ERITROCITOS ÍNDICES ERITROCITARIOS LEUCOGRAMA RECUENTO DE PLAQUETAS ÍNDICES PLAQUETARIOS Y MORFOLOGÍA ELECTRÓNICA) AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(118, 'dd8330d0-b93b-11ee-9fc8-bfc8e7633c46', '90.2.2.10 ', 'HEMOGRAMA IV (HEMOGLOBINA HEMATOCRITO RECUENTO DE ERITROCITOS ÍNDICES ERITROCITARIOS LEUCOGRAMA RECUENTO DE PLAQUETAS ÍNDICES PLAQUETARIOS Y MORFOLOGÍA ELECTRÓNICA E HISTOGRAMA) AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(119, 'dd833ad0-b93b-11ee-bcb5-6d4bdc369bc8', '90.2.2.11', 'HEMATOCRITO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(120, 'dd834490-b93b-11ee-8f6d-cfc60036b06d', '90.2.2.13 ', 'HEMOGLOBINA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(121, 'dd834eb0-b93b-11ee-85f4-856007b71378', '90.2.2.14 ', 'HEMOPARÁSITOS EXTENDIDO DE GOTA GRUESA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(122, 'dd8358b0-b93b-11ee-bcae-1beee075f61e', '90.2.2.15 ', 'HEMOPARÁSITOS EXTENDIDO DE SANGRE PERIFÉRICA  ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(123, 'dd8362d0-b93b-11ee-99e0-9152a5b08bc8', '90.2.2.16', 'LEUCOGRAMA (RECUENTO TOTAL Y DIFERENCIAL) ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(124, 'dd836c80-b93b-11ee-9d70-8db714247749', '90.2.2.17 ', 'PRUEBA DE TORNIQUETE [FRAGILIDAD CAPILAR] ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(125, 'dd8376c0-b93b-11ee-91aa-0f82f21e2bf1', '90.2.2.18 ', 'RECUENTO DE EOSINÓFILO EN CUALQUIER MUESTRA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(126, 'dd8380b0-b93b-11ee-8c94-c99780e7fcd5', '90.2.2.19 ', 'EOSINÓFILOS EN MOCO NASAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(127, 'dd838a80-b93b-11ee-9fa3-6972cb276bf0', '90.2.2.20 ', 'RECUENTO DE PLAQUETAS AUTOMATIZA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(128, 'dd839700-b93b-11ee-b3ed-6ffbfaebde69', '90.2.2.21 ', 'RECUENTO DE PLAQUETAS MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(129, 'dd83a290-b93b-11ee-bc8a-b99d66a7a3c5', '90.2.2.23 ', 'RECUENTO DE RETICULOCITOS METODO MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(130, 'dd83ac40-b93b-11ee-bd66-3ddf75e91c97', '90.2.2.24 ', 'RECUENTO DE RETICULOCITOS AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(131, 'dd83b5d0-b93b-11ee-9249-63ebb787d4d0', '90.3.0.01 ', 'ALFA 2 MACROGLOBULINA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(132, 'dd83bfe0-b93b-11ee-a159-912545ea9c38', '90.3.0.03 ', 'BICARBONATO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(133, 'dd83c9a0-b93b-11ee-8311-5da341bd72eb', '90.3.0.06 ', 'CAROTENOS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(134, 'dd83d340-b93b-11ee-a060-c511e7ef6ba9', '90.3.0.07 ', 'CATECOLAMINAS FRACCIONADAS O DIFERENCIADAS (ADRENALINA [EPINEFRINA] Y NORADRENALINA [NOREPINEFRINA]) EN ORINA DE 24 H', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(135, 'dd83dcc0-b93b-11ee-b02b-9b866de221d3', '90.3.0.08 ', 'CATECOLAMINAS FRACCIONADAS O DIFERENCIADAS (ADRENALINA [EPINEFRINA] Y NORADRENALINA [NOREPINEFRINA]) EN PLASMA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(136, 'dd83e6e0-b93b-11ee-a852-df52bf1fbf0b', '90.3.0.09 ', 'CATECOLAMINAS TOTALES EN ORINA DE 24 H ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(137, 'dd83f0b0-b93b-11ee-a212-53bb3c16e494', '90.3.0.10 ', 'CATECOLAMINAS TOTALES EN PLASMA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(138, 'dd83faa0-b93b-11ee-8034-e19065eb5a73', '90.3.0.16', 'FERRITINA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(139, 'dd840440-b93b-11ee-89a3-876a0c011b0d', '90.3.0.17', 'FOSFATASA ALCALINA ISOENZIMA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(140, 'dd840e20-b93b-11ee-bc3b-2170da3c5e5e', '90.3.0.18  ', 'FOSFATASA ALCALINA TERMOESTABLE', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(141, 'dd841800-b93b-11ee-af06-899bd4820779', '90.3.0.19  ', 'FRACCIÓN EXCRETADA DE BICARBONATO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(142, 'dd842260-b93b-11ee-ae08-c90cd3397be9', '90.3.0.22 ', 'HOMOCISTEÍNA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(143, 'dd842c00-b93b-11ee-b9ed-4bd70f4591c4', '90.3.0.23 ', 'HIDROXIPROLINA EN ORINA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(144, 'dd843640-b93b-11ee-bf15-2fb9ef865649', '90.3.0.26 ', 'MICROALBUMINURIA AUTOMATIZADA EN ORINA PARCIAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(145, 'dd844020-b93b-11ee-a00a-f94578387ae7', '90.3.0.27 ', 'MICROALBUMINURIA AUTOMATIZADA EN ORINA DE 24 HORAS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(146, 'dd844a10-b93b-11ee-8e40-255b9b4bdd42', '90.3.0.28 ', 'MICROALBUMINURIA SEMIAUTOMATIZADA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(147, 'dd8453a0-b93b-11ee-b849-eb47b1098c0a', '90.3.0.35 ', 'OSTEOCALCINA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(148, 'dd845e70-b93b-11ee-b819-8f2a6431b71e', '90.3.0.36  ', 'OXALATOS EN ORINA O EN SANGRE', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(149, 'dd846840-b93b-11ee-8bed-2302bd4e87aa', '90.3.0.38 ', 'PORFIRINAS CUANTITATIVAS EN ORINA 24 HORAS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(150, 'dd847230-b93b-11ee-9916-71e85c6990d8', '90.3.0.39 ', 'PORFIRINAS TOTALES EN SANGRE ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(151, 'dd847bc0-b93b-11ee-801d-af778b3622a0', '90.3.0.40', 'PORFOBILINÓGENO CUALITATIVO EN ORINA PARCIAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(152, 'dd848650-b93b-11ee-a0d7-d3680e44d08e', '90.3.0.41', 'PORFOBILINÓGENO CUANTITATIVO EN ORINA DE 24 HORAS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(153, 'dd8490b0-b93b-11ee-9db8-c533ed7bba14', '90.3.0.42 ', 'PROTEÍNA TRANSPORTADORA DE HORMONAS SEXUALES [PTHS] ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(154, 'dd849a50-b93b-11ee-800e-a5a8c718c3b4', '90.3.0.43 ', 'PRUEBA DE ALIENTO [13 C UREA] PARA HELICOBACTER PILORY ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(155, 'dd84a410-b93b-11ee-ac58-53063643300a', '90.3.0.44 ', 'SATURACIÓN DE TRANSFERRINA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(156, 'dd84ae10-b93b-11ee-9904-b9bd3852c1b5', '90.3.0.45 ', 'TRANSFERRINA SEMIAUTOMATIZADA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(157, 'dd84b820-b93b-11ee-a61c-45c93a51829d', '90.3.0.46 ', 'TRANSFERRINA AUTOMATIZADA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(158, 'dd84c1c0-b93b-11ee-9418-ef5c2507bc3c', '90.3.0.50 ', 'ALFAFETOPROTEÍNA [AFP] BETAGONADOTROPINA CORIÓNICA LIBRE [BHCG LIBRE] Y ESTRIOL TRIPLE MARCADOR', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(159, 'dd84cba0-b93b-11ee-b4ef-df04bd58893b', '90.3.4.01 ', 'ADENOSIN DEAMINASA [ADA]', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(160, 'dd84d5c0-b93b-11ee-a766-1d33acc2f4be', '90.3.4.02 ', 'ALDOLASA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(161, 'dd84df80-b93b-11ee-9840-65c903990acb', '90.3.4.03 ', 'ALFA 1 ANTIQUIMIOTRIPSINA SEMIAUTOMATIZADA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(162, 'dd84e920-b93b-11ee-8b61-454c4508fe35', '90.3.4.04 ', 'ALFA 1 ANTIQUIMIOTRIPSINA AUTOMATIZADA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(163, 'dd84f300-b93b-11ee-a413-9fdb591d2c8e', '90.3.4.05 ', 'ALFA 1 ANTITRIPSINA SEMIAUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(164, 'dd84fd20-b93b-11ee-b146-ab8b5b24989e', '90.3.4.06 ', 'ALFA 1 ANTITRIPSINA AUTOMATIZADA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(165, 'dd850700-b93b-11ee-b512-f509dfbdb610', '90.3.4.07 ', 'ALFA 1 GLICOPROTEÍNA ÁCIDA U OROMUCOIDE ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(166, 'dd8510d0-b93b-11ee-a365-957465210215', '90.3.4.08 ', 'ALFA 2 ANTIPLASMINA FUNCIONAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(167, 'dd851af0-b93b-11ee-a61c-3f891c0a8c4c', '90.3.4.21 ', 'COPROPORFIRINAS EN ORINA DE 24 HORAS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(168, 'dd852500-b93b-11ee-bbed-f515447e67e4', '90.3.4.22 ', 'COPROPORFIRINAS EN ORINA DE 24 HORAS AUTOMATIZADA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(169, 'dd852ea0-b93b-11ee-a98d-8d9ec64d1200', '90.3.4.23 ', 'D- XILOSA PRUEBA DE ABSORCIÓN ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(170, 'dd853870-b93b-11ee-a0d5-8b8993b8d32b', '90.3.4.26 ', 'HEMOGLOBINA GLICOSILADA AUTOMATIZADA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(171, 'dd854210-b93b-11ee-b30d-33b1fb88efea', '90.3.4.27 ', 'HEMOGLOBINA GLICOSILADA MANUAL O SEMIAUTOMATIZADA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(172, 'dd854be0-b93b-11ee-af01-4f32f149bc8b', '90.3.4.28 ', 'HEMOSIDERINA EN ORINA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(173, 'dd8555e0-b93b-11ee-b318-2f3c7e7cece6', '90.3.4.40 ', 'TRIPTASA NIVELES SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(174, 'dd855f90-b93b-11ee-b891-15324a37899d', '90.3.6.03 ', 'CALCIO AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(175, 'dd856960-b93b-11ee-85c2-f3f2867bdcf3', '90.3.6.04 ', 'CALCIO IÓNICO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(176, 'dd857460-b93b-11ee-bfc8-698fd656e0d2', '90.3.6.05 ', 'IONOGRAMA [CLORO SODIO POTASIO Y BICARBONATO O CALCIO] ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(177, 'dd857e30-b93b-11ee-85fa-2fb67d5907cc', '90.3.6.06 ', 'ELECTROLITOS EN SUDOR [IONTOFORESIS] ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(178, 'dd858800-b93b-11ee-b19b-efb9c396892a', '90.3.6.07', 'IONTOFORESIS POST ESTIMULACIÓN CON PILOCARPINA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(179, 'dd8591b0-b93b-11ee-8324-31ffa921a14e', '90.3.6.08 ', 'ZINC ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(180, 'dd859bd0-b93b-11ee-8036-c77cf32a6d4d', '90.3.6.09', 'ZINC EN ORINA DE 24 HORAS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(181, 'dd85a7f0-b93b-11ee-945f-3b99dbe9cf1a', '90.3.6.10', 'ALUMINIO EN ORINA PARCIAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(182, 'dd85b220-b93b-11ee-8790-ad4383b1981e', '90.3.6.11 ', 'ALUMINIO EN SUERO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(183, 'dd85bc40-b93b-11ee-8708-53349a32d8fe', '90.3.7.01 ', 'VITAMINA A [RETINOL] ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(184, 'dd85c660-b93b-11ee-b425-2b1da87ed221', '90.3.7.02 ', 'VITAMINA B1 [TIAMINA] ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(185, 'dd85d020-b93b-11ee-8736-0df6ae0f467e', '90.3.7.03 ', 'VITAMINA B12 [CIANOCOBALAMINA] ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(186, 'dd85dd10-b93b-11ee-85d0-37ac95204daf', '90.3.7.04 ', 'VITAMINA B2 [RIBOFLAVINA] ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(187, 'dd85e960-b93b-11ee-87f8-41a84f7999a8', '90.3.7.05 ', 'VITAMINA B6 [PIRIDOXINA] ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(188, 'dd85f360-b93b-11ee-8903-3b52900d54a9', '90.3.7.06 ', 'VITAMINA D 25 HIDROXI TOTAL [D2-D3] [CALCIFEROL] ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(189, 'dd85fd40-b93b-11ee-881d-23a80d505138', '90.3.7.07 ', 'VITAMINA D 125 DIHIDROXI [D2-D3] [CALCIFIDOL] ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(190, 'dd860a10-b93b-11ee-876d-53b8b97f07d3', '90.3.7.08 ', 'VITAMINA E [TOCOFEROL] ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(191, 'dd861700-b93b-11ee-a08c-29065d8a9634', '90.3.7.09 ', 'VITAMINA C [ÁCIDO ASCÓRBICO] ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(192, 'dd8623e0-b93b-11ee-af87-73f0104aec30', '90.3.7.11 ', 'VITAMINA K', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(193, 'dd863050-b93b-11ee-ac45-edcd4072f669', '90.3.8.01 ', 'ÁCIDO ÚRICO EN SUERO U OTROS FLUIDOS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(194, 'dd863a80-b93b-11ee-b770-6948e22aee19', '90.3.8.02 ', 'ÁCIDO ÚRICO EN ORINA DE 24 HORAS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(195, 'dd8645a0-b93b-11ee-8e7b-91215581f456', '90.3.8.03 ', 'ALBUMINA EN SUERO U OTROS FLUIDOS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(196, 'dd8652c0-b93b-11ee-adae-2794c599af62', '90.3.8.04 ', 'ALBUMINA EN ORINA DE 24 HORAS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(197, 'dd8660a0-b93b-11ee-a515-470e8d498b5f', '90.3.8.05 ', 'AMILASA EN SUERO U OTROS FLUIDOS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(198, 'dd866b10-b93b-11ee-82e8-89378b32705c', '90.3.8.06 ', 'AMILASA EN ORINA DE 24 HORAS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(199, 'dd867520-b93b-11ee-9c3f-5bc0319ca414', '90.3.8.09 ', 'BILIRRUBINAS TOTAL Y DIRECTA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(200, 'dd867f40-b93b-11ee-93fb-d5b2e6348093', '90.3.8.10 ', 'CALCIO SEMIAUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(201, 'dd868940-b93b-11ee-91be-abad40744e7e', '90.3.8.11 ', 'CALCIO AUTOMATIZADO EN ORINA DE 24 HORAS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(202, 'dd869300-b93b-11ee-8545-19c8304b02b9', '90.3.8.12 ', 'CAPACIDAD DE COMBINACIÓN DEL HIERRO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(203, 'dd869cf0-b93b-11ee-9d17-df5300688a0b', '90.3.8.13 ', 'CLORO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(204, 'dd86a780-b93b-11ee-b4f7-db44bc9bbd78', '90.3.8.14 ', 'CLORO EN ORINA DE 24 HORAS', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(205, 'dd86b190-b93b-11ee-99ba-6fba3946bed7', '90.3.8.15 ', 'COLESTEROL DE ALTA DENSIDAD ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(206, 'dd86bba0-b93b-11ee-96c4-274a9d5ffa7d', '90.3.8.16 ', 'COLESTEROL DE BAJA DENSIDAD SEMIAUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(207, 'dd86c8e0-b93b-11ee-9aba-e52c3f902968', '90.3.8.17 ', 'COLESTEROL DE BAJA DENSIDAD [LDL] AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(208, 'dd86d350-b93b-11ee-b203-97336c7b1f56', '90.3.8.18 ', 'COLESTEROL TOTAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(209, 'dd86ddc0-b93b-11ee-8141-851017c4783d', '90.3.8.19 ', 'CREATIN QUINASA (FRACCIÓN MB) SEMIAUTOMATIZADA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(210, 'dd86e9d0-b93b-11ee-997d-87e2e72e3a35', '90.3.8.20 ', 'CREATIN QUINASA (FRACCIÓN MB) AUTOMATIZADA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(211, 'dd86f3e0-b93b-11ee-970a-0ffd5f5d2332', '90.3.8.21 ', 'CREATIN QUINASA TOTAL [CK-CPK] ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(212, 'dd86fdd0-b93b-11ee-b270-53a8d7c3ff48', '90.3.8.22 ', 'CREATINA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(213, 'dd870790-b93b-11ee-89c6-7f72b70487ff', '90.3.8.23 ', 'CREATININA DEPURACIÓN ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(214, 'dd8711a0-b93b-11ee-912d-07d40273d29c', '90.3.8.24 ', 'CREATININA EN ORINA DE 24 HORAS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(215, 'dd871bf0-b93b-11ee-8574-eb6e10abb159', '90.3.8.28 ', 'DESHIDROGENASA LÁCTICA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(216, 'dd8726a0-b93b-11ee-8c53-41e8f4986305', '90.3.8.29 ', 'DESHIDROGENASA LÁCTICA ISOENZIMAS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(217, 'dd873280-b93b-11ee-95d7-75c516fdd3ba', '90.3.8.30 ', 'FOSFATASA ÁCIDA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(218, 'dd873d80-b93b-11ee-85e7-b5c021ed428b', '90.3.8.31 ', 'FOSFATASA ÁCIDA FRACCIÓN PROSTÁTICA SEMIAUTOMATIZADA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(219, 'dd874800-b93b-11ee-b41e-2743fe5ee560', '90.3.8.32 ', 'FOSFATASA ÁCIDA FRACCIÓN PROSTÁTICA AUTOMATIZADA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(220, 'dd875280-b93b-11ee-a9c6-35834fbc3974', '90.3.8.33 ', 'FOSFATASA ALCALINA  ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(221, 'dd875e80-b93b-11ee-adc1-e31ccedc0da5', '90.3.8.34', 'FOSFATASA ALCALINA ESPECÍFICA DE HUESO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(222, 'dd8768a0-b93b-11ee-bb6b-9d0238240fc9', '90.3.8.35 ', 'FÓSFORO EN SUERO U OTROS FLUIDOS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(223, 'dd877310-b93b-11ee-8eed-1d117a1b7731', '90.3.8.36 ', 'FÓSFORO EN ORINA DE 24 HORAS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(224, 'dd877cd0-b93b-11ee-b65e-83b0dac8d3e6', '90.3.8.37 ', 'FRACCIÓN EXCRETADA DE SODIO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(225, 'dd8788e0-b93b-11ee-bb0d-357eab7b93d8', '90.3.8.38 ', 'GAMMA GLUTAMIL TRANSFERASA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(226, 'dd879660-b93b-11ee-b927-fba0068226b2', '90.3.8.40 ', 'GLUCOSA EN ORINA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(227, 'dd87ba50-b93b-11ee-b135-05e5edb72147', '90.3.8.41 ', 'GLUCOSA EN SUERO U OTRO FLUIDO DIFERENTE A ORINA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(228, 'dd87cae0-b93b-11ee-9fb6-575a001f7c3b', '90.3.8.42 ', 'GLUCOSA PRE Y POST CARGA DE GLUCOSA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(229, 'dd87d6a0-b93b-11ee-93fa-539ad080d155', '90.3.8.43 ', 'GLUCOSA PRE Y POST PRANDIAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(230, 'dd87e180-b93b-11ee-b2f9-f9e140e4953a', '90.3.8.44 ', 'GLUCOSA CURVA DE TOLERANCIA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(231, 'dd87ec30-b93b-11ee-9020-bfae8f1af0eb', '90.3.8.45 ', 'GLUCOSA TEST O’ SULLIVAN ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(232, 'dd87f650-b93b-11ee-a92e-5bf686ef669b', '90.3.8.46 ', 'HIERRO TOTAL', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(233, 'dd8800b0-b93b-11ee-89da-077cbf1537fc', '90.3.8.47 ', 'LIPASA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(234, 'dd880bd0-b93b-11ee-8414-6db21967d580', '90.3.8.54 ', 'MAGNESIO EN SUERO U OTROS FLUIDOS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(235, 'dd8815f0-b93b-11ee-9f81-33b01a46476b', '90.3.8.55 ', 'MAGNESIO EN ORINA DE 24 HORAS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(236, 'dd881ff0-b93b-11ee-91f9-e79e0a935239', '90.3.8.56 ', 'NITRÓGENO UREICO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(237, 'dd8829d0-b93b-11ee-9334-a12b2dac3f10', '90.3.8.57 ', 'NITRÓGENO UREICO EN ORINA DE 24 HORAS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(238, 'dd883440-b93b-11ee-9c8d-4d320588c393', '90.3.8.59 ', 'POTASIO EN SUERO U OTROS FLUIDOS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(239, 'dd883e00-b93b-11ee-9be1-1de23977a7b0', '90.3.8.60 ', 'POTASIO EN ORINA DE 24 HORAS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(240, 'dd8847c0-b93b-11ee-9d69-71db70ccdb5d', '90.3.8.61  ', 'PROTEÍNAS DIFERENCIADAS [ALBUMINA-GLOBULINA]', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(241, 'dd885240-b93b-11ee-a9a8-8b80426b114c', '90.3.8.62 ', 'PROTEÍNAS EN ORINA DE 24 HORAS', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(242, 'dd885d30-b93b-11ee-8d35-bfccfeea4a40', '90.3.8.63 ', 'PROTEÍNAS TOTALES EN SUERO Y OTROS FLUIDOS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(243, 'dd886720-b93b-11ee-921e-ddd6301c0762', '90.3.8.64 ', 'SODIO EN SUERO U OTROS FLUIDOS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(244, 'dd8870e0-b93b-11ee-ab04-190654f11fb9', '90.3.8.65 ', 'SODIO EN ORINA DE 24 HORAS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(245, 'dd887ac0-b93b-11ee-9611-43bb6574dbb8', '90.3.8.66 ', 'TRANSAMINASA GLUTÁMICO-PIRÚVICA [ALANINO AMINO TRANSFERASA] ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(246, 'dd8884a0-b93b-11ee-a822-a91b071c330d', '90.3.8.67 ', 'TRANSAMINASA GLUTÁMICO OXALACÉTICA [ASPARTATO AMINO TRANSFERASA] ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(247, 'dd888ea0-b93b-11ee-a8d6-1be358cef053', '90.3.8.68 ', 'TRIGLICERIDOS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(248, 'dd8898a0-b93b-11ee-8bdd-697c82959e2a', '90.3.8.69 ', 'UREA EN SANGRE U OTROS FLUIDOS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(249, 'dd88a280-b93b-11ee-8cbd-fb4afed62995', '90.3.8.70 ', 'UREA EN ORINA DE 24 HORAS', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(250, 'dd88ac60-b93b-11ee-a695-37d30dbfecd1', '90.3.8.71 ', 'AMILASA EN ORINA PARCIAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(251, 'dd88b640-b93b-11ee-ae2d-5bbe747b64d6', '90.3.8.72 ', 'SODIO EN ORINA PARCIAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(252, 'dd88c030-b93b-11ee-b7a1-37ae4d10e0b2', '90.3.8.73 ', 'CALCIO EN ORINA PARCIAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(253, 'dd88ca40-b93b-11ee-8421-8f5e20e94abd', '90.3.8.74 ', 'PROTEÍNAS TOTALES EN ORINA PARCIAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(254, 'dd88d420-b93b-11ee-8264-1d71424b4d5b', '90.3.8.75 ', 'FÓSFORO EN ORINA PARCIAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(255, 'dd88ddf0-b93b-11ee-aeb9-1f8fa63a5919', '90.3.8.76 ', 'CREATININA EN ORINA PARCIAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(256, 'dd88e800-b93b-11ee-9a44-85655859bd94', '90.3.8.77 ', 'ÁCIDO ÚRICO EN ORINA PARCIAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(257, 'dd88f240-b93b-11ee-b6b7-f544758e6f0a', '90.3.8.78  ', 'POTASIO EN ORINA PARCIAL', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(258, 'dd88fc10-b93b-11ee-80dd-15c8880985c7', '90.3.8.79 ', 'MAGNESIO EN ORINA PARCIAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(259, 'dd8905c0-b93b-11ee-87d7-053daf22c8bd', '90.3.8.80 ', 'CLORO EN ORINA PARCIAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(260, 'dd890f50-b93b-11ee-afb5-bbc9309d8469', '90.3.8.81 ', 'CREATINA EN ORINA DE 24 HORAS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(261, 'dd891950-b93b-11ee-80e5-9db5065ce27d', '90.3.8.83 ', 'GLUCOSA SEMIAUTOMATIZADA [GLUCOMETRÍA] ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(262, 'dd892330-b93b-11ee-9bc4-2da873077dba', '90.3.8.84 ', 'TEST DE O\'SULLIVAN CONFIRMATORIO (CUATRO MUESTRAS)', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(263, 'dd892cf0-b93b-11ee-805c-47e4336787e0', '90.3.8.85 ', 'PRUEBA DE TOLERANCIA A LA GLUCOSA POR 3 HORAS (6 MUESTRAS: 0 30 60 90 120 Y 180 MINUTOS) INCLUYE: CARGA DE GLUCOSA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(264, 'dd8936b0-b93b-11ee-a218-ff13f0c88d7a', '90.3.8.86 ', 'PRUEBA DE TOLERANCIA A LA GLUCOSA POR 2 HORAS (3 MUESTRAS: 0 60 Y 120 MINUTOS) ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(265, 'dd8940c0-b93b-11ee-9a60-c3d3f4647485', '90.4.1.02 ', 'HORMONA ANTIDIURÉTICA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(266, 'dd894a80-b93b-11ee-a445-b37df02e5210', '90.4.1.03', 'HORMONA ADRENOCORTICOTRÓPICA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(267, 'dd8954a0-b93b-11ee-84bd-9d377beab044', '90.4.1.04 ', 'HORMONA DE CRECIMIENTO [SOMATOTRÓPICA] ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(268, 'dd896080-b93b-11ee-b9c7-dbf4a27446ce', '90.4.1.05 ', 'HORMONA FOLÍCULO ESTIMULANTE ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(269, 'dd896c80-b93b-11ee-a0f1-cb20eeb5e104', '90.4.1.06 ', 'HORMONA FOLÍCULO ESTIMULANTE Y HORMONA LUTEINIZANTE PRE Y POST HORMONA LIBERADORA DE GONADOTROPINA CADA MUESTRA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(270, 'dd897670-b93b-11ee-a1e2-d51dd59ffea9', '90.4.1.07 ', 'HORMONA LUTEINIZANTE ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(271, 'dd898090-b93b-11ee-b918-032f849ed31f', '90.4.1.08 ', 'PROLACTINA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(272, 'dd898a50-b93b-11ee-a2e9-9d437617c347', '90.4.1.09 ', 'PROLACTINA (MEZCLA DE TRES MUESTRAS) ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(273, 'dd899490-b93b-11ee-ba91-b574ed75ed8f', '90.4.1.11 ', 'HORMONA ADRENOCORTICOTRÓPICA PRE Y POST CADA MUESTRA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(274, 'dd899e70-b93b-11ee-8c44-5fc98c06f56f', '90.4.2.01  ', 'HORMONA DE CRECIMIENTO [SOMATOTRÓPICA] PRE Y POST ESTIMULACIÓN CADA MUESTRA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(275, 'dd89a820-b93b-11ee-903c-1d52ae0277ea', '90.4.2.02 ', 'HORMONA DEL CRECIMIENTO [SOMATOTRÓPICA] PRE Y POST EJERCICIO CADA MUESTRA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(276, 'dd89b2a0-b93b-11ee-86d9-294eacf80704', '90.4.2.03', ' HORMONA FOLÍCULO ESTIMULANTE Y HORMONA LUTEINIZANTE PRE Y POST OTRO ESTÍMULO CADA MUESTRA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(277, 'dd89bcb0-b93b-11ee-b56a-f721eff5b6a2', '90.4.2.04 ', 'PROLACTINA PRE Y POST ESTIMULACIÓN', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(278, 'dd89c670-b93b-11ee-94ca-a964378f0064', '90.4.2.05 ', 'HORMONA DEL CRECIMIENTO [SOMATOTRÓPICA] PRE Y POST ESTÍMULO CLONIDINA CADA MUESTRA  ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(279, 'dd89d050-b93b-11ee-9e70-a7cbc52eed49', '90.4.2.06', 'HORMONA DEL CRECIMIENTO [SOMATOTRÓPICA] PRE Y POST ESTÍMULO GLUCAGÓN CADA MUESTRA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(280, 'dd89daa0-b93b-11ee-9f2e-bd5f40f67bd9', '90.4.2.07 ', 'HORMONA DEL CRECIMIENTO [SOMATOTRÓPICA] PRE Y POST ESTÍMULO GLUCOSA CADA MUESTRA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(281, 'dd89e450-b93b-11ee-8418-fb7de0af7911', '90.4.2.08 ', 'HORMONA DEL CRECIMIENTO [SOMATOTRÓPICA] PRE Y POST ESTÍMULO INSULINA CADA MUESTRA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(282, 'dd89ee20-b93b-11ee-8f12-81c085765c5e', '90.4.2.10 ', 'PROLACTINA PRE Y POST TRH CADA MUESTRA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(283, 'dd89f7c0-b93b-11ee-904b-a524930f58ed', '90.4.3.01 ', 'CORTISOL PRE Y POST ESTIMULACIÓN 2 MUESTRAS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(284, 'dd8a01c0-b93b-11ee-ad5f-e574564f133a', '90.4.3.02 ', 'CORTISOL PRE Y POSTSUPRESIÓN CON DEXAMETASONA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(285, 'dd8a0ba0-b93b-11ee-9740-8912dcaec419', '90.4.3.03 ', 'CORTISOL Y GLUCOSA PRE Y POST INSULINA HASTA 4 MUESTRAS', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(286, 'dd8a15d0-b93b-11ee-bed1-43c5b8047118', '90.4.4.02 ', 'HIDROXIPROGESTERONA 17 ALFA PRE Y POST HORMONA ADRENOCORTICOTRÓPICA CADA MUESTRA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(287, 'dd8a1f90-b93b-11ee-af02-633d1d1982ea', '90.4.5.01 ', 'ANDROSTENEDIONA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(288, 'dd8a29b0-b93b-11ee-bb43-c33f62c3058e', '90.4.5.03 ', 'ESTRADIOL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(289, 'dd8a3380-b93b-11ee-b152-a506f4389e6a', '90.4.5.04 ', 'ESTRIOL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(290, 'dd8a3d20-b93b-11ee-aafc-8725c78be6e8', '90.4.5.05 ', 'ESTRIOL LIBRE ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(291, 'dd8a46b0-b93b-11ee-8451-bdb33d701a8e', '90.4.5.06 ', 'ESTRÓGENOS (ESTRADIOL 17 BETA) ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(292, 'dd8a5160-b93b-11ee-b0cb-4544d5139ae2', '90.4.5.07 ', 'ESTRONA SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(293, 'dd8a5b40-b93b-11ee-9312-8dd61928acad', '90.4.5.08 ', 'GONADOTROPINA CORIÓNICA SUBUNIDAD BETA CUALITATIVA PRUEBA DE EMBARAZO EN ORINA O SUERO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(294, 'dd8a6530-b93b-11ee-a714-2db84f10a2e2', '90.4.5.09 ', 'HIDROXIPROGESTERONA 17 ALFA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(295, 'dd8a6ed0-b93b-11ee-b4c0-d33b86d03a0b', '90.4.5.10 ', 'PROGESTERONA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(296, 'dd8a78a0-b93b-11ee-ba9d-d72954d270cf', '90.4.5.11 ', 'HORMONA ANTIMULLERIANA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(297, 'dd8a8260-b93b-11ee-b45f-99272e705fc5', '90.4.5.12 ', 'ANDROSTERONA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(298, 'dd8a8c50-b93b-11ee-a50f-c9cbd5c3b9bb', '90.4.6.01 ', 'TESTOSTERONA LIBRE ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(299, 'dd8a95f0-b93b-11ee-8b4e-c179190518fa', '90.4.6.02 ', 'TESTOSTERONA TOTAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(300, 'dd8a9fd0-b93b-11ee-8e3b-4d7ed0bc081b', '90.4.6.03 ', 'TESTOSTERONA TOTAL PRE Y POST HORMONA ADRENOCORTICOTRÓPICA CADA MUESTRA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(301, 'dd8aa980-b93b-11ee-8fa1-7b131ef15f4b', '90.4.6.05 ', 'DIHIDROTESTOSTERONA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(302, 'dd8ab310-b93b-11ee-85e2-bdaac39cdf20', '90.4.7.01 ', 'GLUCAGÓN', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(303, 'dd8abcc0-b93b-11ee-b4c9-3b738564e435', '90.4.7.02 ', 'INSULINA PRE Y POST GLUCOSA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(304, 'dd8ac6a0-b93b-11ee-94e3-bf5413028a5b', '90.4.7.03 ', 'INSULINA CURVA (CINCO MUESTRAS)', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(305, 'dd8ad060-b93b-11ee-8397-6d761f9bb2fd', '90.4.7.04 ', 'INSULINA (CADA MUESTRA) ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(306, 'dd8ad9f0-b93b-11ee-89c0-6f9dd57b38db', '90.4.7.05 ', 'INSULINA LIBRE ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(307, 'dd8ae380-b93b-11ee-b50e-a5865302764d', '90.4.7.08 ', 'SOMATOSTATINA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(308, 'dd8aed50-b93b-11ee-a311-d11ecfdbca6c', '90.4.7.09 ', 'ADIPONECTINA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(309, 'dd8af700-b93b-11ee-834c-adc5dbafda6e', '90.4.7.10 ', 'PROTEÍNA TRANSPORTADORA DE LA SOMATOMEDINA C ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(310, 'dd8b00c0-b93b-11ee-be73-7f6539407be3', '90.4.7.11 ', 'INSULINA CURVA DE 2 HORAS (3 MUESTRAS: 0 60 Y 120 MINUTOS) ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(311, 'dd8b0a40-b93b-11ee-b158-d3b126834919', '90.4.8.01 ', 'ALDOSTERONA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(312, 'dd8b1410-b93b-11ee-ba8b-ad9604dba162', '90.4.8.02 ', 'ALDOSTERONA EN ORINA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(313, 'dd8b1e00-b93b-11ee-b92d-8dfaa079957d', '90.4.8.03 ', 'ANDROSTENEDIOL GLUCURONIDO 3 ALFA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(314, 'dd8b27a0-b93b-11ee-8d37-7115d45df240', '90.4.8.04 ', 'CETOESTEROIDES 17 ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(315, 'dd8b3130-b93b-11ee-8119-19dd239a05d8', '90.4.8.05 ', 'CORTISOL DIFERENTES MUESTRAS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26');
INSERT INTO `laboratoryexams` (`id`, `uuid`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(316, 'dd8b3af0-b93b-11ee-abbd-b932660a18af', '90.4.8.06 ', 'CORTISOL (DOS MUESTRAS AM-PM) ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(317, 'dd8b4490-b93b-11ee-838b-af74c2913267', '90.4.8.07 ', 'CORTISOL LIBRE EN ORINA DE 24 HORAS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(318, 'dd8b4e30-b93b-11ee-ba25-1500384e3550', '90.4.8.08 ', 'DEHIDROEPINANDROSTERONA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(319, 'dd8b5830-b93b-11ee-a138-c17357287350', '90.4.8.09 ', 'DEHIDROEPINANDROSTERONA SULFATO [EPINANDROSTERONA - DHEA-SO4] CADA MUESTRA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(320, 'dd8b6270-b93b-11ee-b2cd-6d722ec60ba9', '90.4.8.10 ', 'DEOXICORTISOL 11', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(321, 'dd8b6c50-b93b-11ee-8e6f-f96a9ad847a5', '90.4.8.11 ', 'HIDROXICORTICOSTEROIDES 17 ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(322, 'dd8b7740-b93b-11ee-952b-f79095536818', '90.4.8.12 ', 'CORTISOL AM ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(323, 'dd8b8140-b93b-11ee-9fd6-ad988a845bcb', '90.4.8.13 ', 'CORTISOL PM ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(324, 'dd8b8be0-b93b-11ee-818a-dfc73ed37cd4', '90.4.8.14 ', 'HIDROXICORTICOESTEROIDES EN ORINA PARCIAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(325, 'dd8b9660-b93b-11ee-a225-eb22f8a60bb7', '90.4.9. ', 'PRUEBAS PARA FUNCIÓN TIROIDEA O PARATIROIDEA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(326, 'dd8ba040-b93b-11ee-9a5e-23f4ea9c97d2', ' 90.4.9.01 ', 'GLOBULINA TRANSPORTADORA DE TIROXINA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(327, 'dd8baa60-b93b-11ee-ac23-5b7faa5649b7', '90.4.9.02 ', 'HORMONA ESTIMULANTE DEL TIROIDES ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(328, 'dd8bb600-b93b-11ee-853d-c3620955e95f', '90.4.9.04 ', 'HORMONA ESTIMULANTE DEL TIROIDES ULTRASENSIBLE ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(329, 'dd8bc270-b93b-11ee-ac70-39f1b7c52e8d', '90.4.9.11', 'HORMONA PARATIROIDEA C TERMINAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(330, 'dd8bcd10-b93b-11ee-9cff-a3bfb4ced592', '90.4.9.12 ', 'HORMONA PARATIROIDEA MOLÉCULA INTACTA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(331, 'dd8bd780-b93b-11ee-aa67-237a0f1a23ed', '90.4.9.13 ', 'HORMONA PARATIROIDEA MOLÉCULA MEDIA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(332, 'dd8be180-b93b-11ee-a822-693e21bb5501', '90.4.9.14 ', 'HORMONA PARATIROIDEA N TERMINAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(333, 'dd8beb70-b93b-11ee-a496-77f6e6c7f00e', '90.4.9.20 ', 'TIROGLOBULINA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(334, 'dd8bf530-b93b-11ee-9bee-753c5f19814a', '90.4.9.21  ', 'TIROXINA LIBRE', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(335, 'dd8bff60-b93b-11ee-a7b6-617a442925e2', '90.4.9.22 ', 'TIROXINA TOTAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(336, 'dd8c0930-b93b-11ee-970e-712399e68e41', '90.4.9.23 ', 'TRIYODOTIRONINA (CAPTACIÓN) ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(337, 'dd8c1310-b93b-11ee-a061-7be9ac8ffa70', '90.4.9.24 ', 'TRIYODOTIRONINA LIBRE', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(338, 'dd8c1ca0-b93b-11ee-8b8b-ad911b34dfec', ' 90.4.9.25 ', 'TRIYODOTIRONINA TOTAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(339, 'dd8c26a0-b93b-11ee-abb8-39160e19968b', '90.4.9.26 ', 'TIROXINA NORMALIZADA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(340, 'dd8c3090-b93b-11ee-b1f4-d75e3fe9c400', '90.4.9.27  ', 'TRIYODOTIRONINA REVERSA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(341, 'dd8c3a70-b93b-11ee-a754-217852e5992c', '90.6.0.01 ', 'ANTIESTREPTOLISINA AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(342, 'dd8c4460-b93b-11ee-8cea-c1b68844c684', '90.6.0.02 ', 'ANTIESTREPTOLISINA MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(343, 'dd8c4f10-b93b-11ee-bac7-1b2218d3396d', '90.6.0.03 ', 'BORDETELLA PERTUSSI ANTICUERPOS IG A SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(344, 'dd8c5950-b93b-11ee-9a77-4f5e49f88cf5', '90.6.0.04 ', 'BORDETELLA PERTUSSI ANTICUERPOS IG G SEMIAUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(345, 'dd8c62e0-b93b-11ee-9e5f-01b39d6d8ca4', '90.6.0.05 ', 'BORDETELLA PERTUSSI ANTICUERPOS IG G AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(346, 'dd8c7060-b93b-11ee-aaec-cf98e0c40970', '90.6.0.06 ', 'BORDETELLA PERTUSSI ANTICUERPOS IG M SEMIAUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(347, 'dd8c7df0-b93b-11ee-9aef-af6c6dde74ab', '90.6.0.07 ', 'BORDETELLA PERTUSSI ANTICUERPOS IG M AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(348, 'dd8c8a90-b93b-11ee-855c-6b55b5b79667', '90.6.0.08 ', 'BORRELIA BURGDORFERI ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(349, 'dd8c9690-b93b-11ee-a406-5d6399f4b6dd', '90.6.0.09 ', 'BORRELIA BURGDORFERI ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(350, 'dd8ca2f0-b93b-11ee-b528-2bcc430ffb23', '90.6.0.10 ', 'BRUCELLA ABORTUS ANTICUERPOS IG G SEMIAUTOMATIZADA O AUTOMATIZADA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(351, 'dd8caed0-b93b-11ee-aad5-536b355d56e6', '90.6.0.11 ', 'BRUCELLA ABORTUS ANTICUERPOS IG M SEMIAUTOMATIZADA O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(352, 'dd8cbad0-b93b-11ee-b369-21604afc8ba5', '90.6.0.12 ', 'BRUCELLA SPP ANTICUERPOS SEMIAUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(353, 'dd8cc6d0-b93b-11ee-bff4-a9614fe1b358', '90.6.0.13 ', 'BRUCELLA SPP ANTICUERPOS MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(354, 'dd8cd2a0-b93b-11ee-9496-e5a6d92fc833', '90.6.0.14 ', 'CAMPYLOBACTER JEJUNI ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(355, 'dd8cde60-b93b-11ee-87ab-bf8f84ed9f83', '90.6.0.15 ', 'CAMPYLOBACTER JEJUNI ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(356, 'dd8cea90-b93b-11ee-aa09-7745ebc7c538', '90.6.0.16 ', 'CHLAMYDIA PNEUMONIAE ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(357, 'dd8cf650-b93b-11ee-afab-fd9d4fd8caeb', '90.6.0.17 ', 'CHLAMYDIA PSITTACI ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(358, 'dd8d0220-b93b-11ee-b8a5-95d22eb9202d', '90.6.0.18 ', 'CHLAMYDIA TRACHOMATIS ANTICUERPOS IG A SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(359, 'dd8d12b0-b93b-11ee-a314-b3e2c599525b', '90.6.0.19 ', 'CHLAMYDIA TRACHOMATIS ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(360, 'dd8d22a0-b93b-11ee-bad0-7547d5f6162b', '90.6.0.20 ', 'CHLAMYDIA TRACHOMATIS ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(361, 'dd8d3020-b93b-11ee-8c24-4b5012ecdf02', '90.6.0.21 ', 'CHLAMYDIA TRACHOMATIS ANTICUERPOS TOTALES SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(362, 'dd8d3c00-b93b-11ee-beb8-d794603f67b9', '90.6.0.22 ', 'HELICOBACTER PYLORI ANTICUERPOS IG A SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(363, 'dd8d4b40-b93b-11ee-ba57-e3c17e019133', '90.6.0.23 ', 'HELICOBACTER PYLORI ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(364, 'dd8d5a90-b93b-11ee-b371-c7bdb2f9a516', '90.6.0.24 ', 'HELICOBACTER PYLORI ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(365, 'dd8d69e0-b93b-11ee-b0d0-b314b4a0a645', '90.6.0.25 ', 'HELICOBACTER PYLORI ANTICUERPOS TOTALES SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(366, 'dd8d78d0-b93b-11ee-9775-f750382c4cdf', '90.6.0.26 ', 'LEGIONELLA SPP ANTICUERPOS IG G SEROTIPOS 1-14 SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(367, 'dd8d8890-b93b-11ee-bf85-4b371f89dd34', '90.6.0.27 ', 'LEGIONELLA PNEUMONIAE ANTICUERPOS SEMIAUTOMATIZADO  ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(368, 'dd8d9760-b93b-11ee-84a9-2da0a2342ca6', '90.6.0.28', 'LEGIONELLA PNEUMONIAE ANTICUERPOS AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(369, 'dd8da600-b93b-11ee-a1f4-29971d89ab2b', '90.6.0.29 ', 'LEPTOSPIRA ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(370, 'dd8db520-b93b-11ee-b613-0bcba1dc5e95', '90.6.0.30 ', 'LEPTOSPIRA ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(371, 'dd8dc420-b93b-11ee-a5cc-552d0b40b7a8', '90.6.0.31 ', 'MYCOBACTERIUM LEPRAE ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(372, 'dd8dd3a0-b93b-11ee-8013-f1d558f85af9', '90.6.0.32 ', 'MYCOBACTERIUM TUBERCULOSIS ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(373, 'dd8de2d0-b93b-11ee-9f2b-139c30b02b27', '90.6.0.33 ', 'MYCOPLASMA PNEUMONIAE ANTICUERPOS IG A SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(374, 'dd8df180-b93b-11ee-bac2-078d9079156e', '90.6.0.34 ', 'MYCOPLASMA PNEUMONIAE ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(375, 'dd8e00d0-b93b-11ee-b5ad-ff2ff1a2cefb', '90.6.0.35 ', 'MYCOPLASMA PNEUMONIAE ANTICUERPOS TOTALES SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(376, 'dd8e0ff0-b93b-11ee-bda1-718aec82a091', '90.6.0.36 ', 'MYCOPLASMA PNEUMONIAE ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(377, 'dd8e1d90-b93b-11ee-aa19-c1d74dbb521a', '90.6.0.37 ', 'SHIGUELLA ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(378, 'dd8e2b50-b93b-11ee-859a-b987aa9b0fae', '90.6.0.38 ', 'STREPTOCOCCUS B HEMOLÍTICO, ANTICUERPOS DESOXIRIBONUCLEASA B ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(379, 'dd8e38d0-b93b-11ee-848a-550361ddad15', '90.6.0.39 ', 'TREPONEMA PALLIDUM ANTICUERPOS (PRUEBA TREPONEMICA) MANUAL O SEMIAUTOMATIZADA O AUTOMATIZADA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(380, 'dd8e45b0-b93b-11ee-aabb-935b41072d19', '90.6.0.40 ', 'TREPONEMA PALLIDUM ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(381, 'dd8e53d0-b93b-11ee-bff3-cd498a318748', '90.6.0.41 ', 'TREPONEMA PALLIDUM ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(382, 'dd8e6200-b93b-11ee-b7a5-6ffcbc1ad190', '90.6.0.45 ', 'BARTONELLA HENSELAE ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO  ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(383, 'dd8e7040-b93b-11ee-8a81-53217a34857f', '90.6.0.46', 'BARTONELLA HENSELAE ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(384, 'dd8e7e60-b93b-11ee-857a-bf8aeb9317fc', '90.6.0.47', 'BARTONELLA QUINTANA ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(385, 'dd8e8c90-b93b-11ee-aa97-1d9d05699842', '90.6.0.48 ', 'COXIELLA BURNETII ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(386, 'dd8e9ba0-b93b-11ee-b7d0-17d998201456', '90.6.0.49 ', 'COXIELLA BURNETII ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(387, 'dd8ea9f0-b93b-11ee-ab5e-5d5e88e7098b', '90.6.0.50 ', 'ACTYNOMICES ANTICUERPOS  ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(388, 'dd8eb810-b93b-11ee-9626-9f3b58787f48', '90.6.0.51', 'NEISSERIA GONORRHOEAE ANTICUERPOS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(389, 'dd8ec6c0-b93b-11ee-9e3d-4da6f37456f5', '90.6.0.52 ', 'STREPTOCOCCUS PNEUMONIAE (SEROTIPOS ESPECÍFICOS) ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(390, 'dd8ed530-b93b-11ee-bc0c-0d39337ff72a', '90.6.1. ', 'DETERMINACIÓN DE ANTICUERPOS CONTRA HONGOS Y PARÁSITOS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(391, 'dd8ee320-b93b-11ee-a570-4359df4def53', '90.6.1.02 ', 'ASPERGILLUS ANTICUERPOS MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(392, 'dd8ef100-b93b-11ee-a463-233edf28e9d5', '90.6.1.03 ', 'BLASTOMYCES ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(393, 'dd8eff00-b93b-11ee-b284-3964d3fa2fcf', '90.6.1.04 ', 'CÁNDIDA ALBICANS ANTICUERPOS IG A SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(394, 'dd8f0dd0-b93b-11ee-9419-518cfa0e5122', '90.6.1.05 ', 'CÁNDIDA ALBICANS ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(395, 'dd8f1cb0-b93b-11ee-94b4-8bc903b3f2b3', '90.6.1.06 ', 'CÁNDIDA ALBICANS ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(396, 'dd8f2b80-b93b-11ee-9a4c-6f69e3ab2fdb', '90.6.1.07 ', 'CISTICERCO ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(397, 'dd8f3a60-b93b-11ee-aa43-977e1b0c28c1', '90.6.1.08 ', 'CISTICERCO ANTICUERPOS IG G CONFIRMATORIO MANUAL O SEMIAUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(398, 'dd8f48a0-b93b-11ee-bb23-b3394a31d419', '90.6.1.09 ', 'CISTICERCO ANTICUERPOS TOTALES ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(399, 'dd8f5710-b93b-11ee-afcc-d1f2c1ae70cc', '90.6.1.10 ', 'ECHINOCOCCUS ANTICUERPOS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(400, 'dd8f65e0-b93b-11ee-bf74-457fbd37827a', '90.6.1.11 ', 'COCCIDIOIDES ANTICUERPOS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(401, 'dd8f7460-b93b-11ee-88c3-b17930c6eb68', '90.6.1.12 ', 'CRYPTOCOCCUS NEOFORMANS ANTICUERPOS MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(402, 'dd8f8200-b93b-11ee-b787-2b037fd83167', '90.6.1.13 ', 'ENTAMOEBA HISTOLÍTICA ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(403, 'dd8f9050-b93b-11ee-ae46-d58f057e436c', '90.6.1.14 ', 'ENTAMOEBA HISTOLÍTICA ANTICUERPOS MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(404, 'dd8f9fe0-b93b-11ee-8481-e3b5db7bea44', '90.6.1.15 ', 'GIARDIA LAMBLIA ANTICUERPO IG A SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(405, 'dd8faca0-b93b-11ee-af5b-21f44ac258bb', '90.6.1.16 ', 'GIARDIA LAMBLIA ANTICUERPO IG G SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(406, 'dd8fb7c0-b93b-11ee-8f4c-599936e25e09', '90.6.1.17 ', 'GIARDIA LAMBLIA ANTICUERPO IG M SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(407, 'dd8fc290-b93b-11ee-a5c0-67ea1fd0d4cd', '90.6.1.18 ', 'HISTOPLASMA CAPSULATUM ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(408, 'dd8fccb0-b93b-11ee-9414-559ce2158686', '90.6.1.19 ', 'HONGOS ANTICUERPOS TOTALES MANUAL INCLUYE: ASPERGILLUS, PARACOCCIDIODES, OTROS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(409, 'dd8fd860-b93b-11ee-aea2-65d4eb402ff1', '90.6.1.20 ', 'HONGOS ANTICUERPOS TOTALES SEMIAUTOMATIZADO O AUTOMATIZADO  INCLUYE: ASPERGILLUS, PARACOCCIDIODES, OTROS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(410, 'dd8fe280-b93b-11ee-801e-adaa8c6b0c90', '90.6.1.21', 'LEISHMANIA ANTICUERPOS MANUAL O SEMIAUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(411, 'dd8fec30-b93b-11ee-bbcf-af2f1c6a94f3', '90.6.1.22 ', 'PLASMODIUM ANTICUERPOS MANUAL O SEMIAUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(412, 'dd8ff660-b93b-11ee-a957-575d67494d45', '90.6.1.23 ', 'PARACOCCIDIODES ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(413, 'dd900050-b93b-11ee-a8a4-b97fd8200c98', '90.6.1.24 ', 'SPOROTRIX ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(414, 'dd900a60-b93b-11ee-96b1-e72fc1a05f29', '90.6.1.25 ', 'TOXOCARA CANIS ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(415, 'dd9013e0-b93b-11ee-a9ae-1f8ddf27a238', '90.6.1.26 ', 'TOXOPLASMA GONDII ANTICUERPOS IG A SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(416, 'dd901e10-b93b-11ee-9a62-dd6fac8fb117', '90.6.1.27 ', 'TOXOPLASMA GONDII ANTICUERPOS IG G AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(417, 'dd9027c0-b93b-11ee-8e02-abeb93f870da', '90.6.1.28 ', 'TOXOPLASMA GONDII ANTICUERPOS IG G MANUAL O SEMIAUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(418, 'dd9031c0-b93b-11ee-9734-0b5ceae770cf', '90.6.1.29 ', 'TOXOPLASMA GONDII ANTICUERPOS IG M AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(419, 'dd903b60-b93b-11ee-ab7b-ff259b06c67f', '90.6.1.30 ', 'TOXOPLASMA GONDII ANTICUERPOS IG M MANUAL O SEMIAUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(420, 'dd9045f0-b93b-11ee-8b2b-cdbd306cf03f', '90.6.1.31', 'TRYPANOSOMA CRUZI ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(421, 'dd904fa0-b93b-11ee-ad26-21d9b94fc45b', '90.6.1.32 ', 'TRYPANOSOMA CRUZI ANTICUERPOS MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(422, 'dd9059d0-b93b-11ee-aef5-3df8ecacaf01', '90.6.1.33 ', 'TRYPANOSOMA CRUZI ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(423, 'dd906380-b93b-11ee-9ee0-ed38448d9710', '90.6.1.34 ', 'TEST DE AVIDEZ ANTICUERPOS IG G TOXOPLASMA SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(424, 'dd906dc0-b93b-11ee-b04a-35da7ae8e74e', '90.6.1.35 ', 'ASPERGILLUS ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(425, 'dd907770-b93b-11ee-8911-07cfed2e777a', '90.6.1.36  ', 'ASPERGILLUS ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(426, 'dd908130-b93b-11ee-83f3-2561d10c4633', '90.6.1.37 ', 'TRICHENELLA ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(427, 'dd908ac0-b93b-11ee-bee1-b541d0e2b561', '90.6.1.38 ', 'SACCHAROMYCES CEREVISIAE ANTICUERPOS IG A SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(428, 'dd9094e0-b93b-11ee-ac86-2b38e84c9d3d', '90.6.1.39 ', 'SACCHAROMYCES CEREVISIAE ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(429, 'dd909ee0-b93b-11ee-8cc6-c7e967d2b7e6', '90.6.1.40 ', 'RICKETTSIA SPP ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(430, 'dd90a970-b93b-11ee-9917-fb6fb4146c10', '90.6.1.41 ', 'RICKETTSIA SPP ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(431, 'dd90b340-b93b-11ee-b002-0d824881f86f', '90.6.2.01 ', 'ADENOVIRUS ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(432, 'dd90bda0-b93b-11ee-8a7e-73c4a712a777', '90.6.2.02 ', 'ADENOVIRUS ANTICUERPOS IG G MANUAL', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(433, 'dd90c770-b93b-11ee-8f55-45c0236ac4be', '90.6.2.03', 'ADENOVIRUS ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(434, 'dd90d190-b93b-11ee-8f4a-df18f37d844c', '90.6.2.04 ', 'ADENOVIRUS ANTICUERPOS IG M MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(435, 'dd90db70-b93b-11ee-8a0c-4ffd367aeccb', '90.6.2.05  ', 'CITOMEGALOVIRUS ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(436, 'dd90e7c0-b93b-11ee-b845-ed6c171efbab', '90.6.2.06 ', 'CITOMEGALOVIRUS ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(437, 'dd90f280-b93b-11ee-be1c-5dbc6c5fce80', '90.6.2.07 ', 'DENGUE ANTICUERPOS IG G', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(438, 'dd90fc70-b93b-11ee-855d-b522ab73c7d2', '90.6.2.08 ', 'DENGUE ANTICUERPOS IG M ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(439, 'dd910720-b93b-11ee-aef3-07c160abc5c9', '90.6.2.09 ', 'DENGUE ANTICUERPOS TOTALES ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(440, 'dd911110-b93b-11ee-b653-ffd3120d156d', '90.6.2.10 ', 'ENTEROVIRUS ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(441, 'dd911f10-b93b-11ee-8526-896283ff7d16', '90.6.2.11 ', 'EPSTEIN-BARR ANTICUERPOS IG A (CÁPSULA EB-VCA-A) SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(442, 'dd912d70-b93b-11ee-aebc-6f418a4dd3b2', '90.6.2.12 ', 'EPSTEIN-BARR ANTICUERPOS IG G (CÁPSULA EB-VCA-G) SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(443, 'dd913a20-b93b-11ee-b298-af995ef04a3f', '90.6.2.13 ', 'EPSTEIN-BARR ANTICUERPOS IG G (NUCLEARES EBNA-G) SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(444, 'dd914690-b93b-11ee-b9e3-9f278a20f1e4', '90.6.2.14 ', 'EPSTEIN-BARR ANTICUERPOS IG G (TEMPRANOS G) SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(445, 'dd915550-b93b-11ee-bef1-735fd93441b7', '90.6.2.15 ', 'EPSTEIN-BARR ANTICUERPOS IG M (CÁPSULA EB-VCA-M) SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(446, 'dd916340-b93b-11ee-8ee5-4512f60c47cd', '90.6.2.16 ', 'EPSTEIN-BARR ANTICUERPOS IG M (NUCLEARES EBNA-M) SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(447, 'dd9171d0-b93b-11ee-a5e1-cbcf473c1445', '90.6.2.17 ', 'EPSTEIN-BARR ANTICUERPOS IG A (TEMPRANOS A) SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(448, 'dd918040-b93b-11ee-9071-15c5fc6dab60', '90.6.2.18 ', 'HEPATITIS A ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(449, 'dd918e90-b93b-11ee-a5fc-c965fdc349fb', '90.6.2.19 ', 'HEPATITIS A ANTICUERPOS TOTALES SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(450, 'dd919bc0-b93b-11ee-a649-2b0b5b4e5ddc', '90.6.2.20 ', 'HEPATITIS B ANTICUERPOS CENTRAL IG M [ANTI-CORE HBC-M] SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(451, 'dd91a970-b93b-11ee-8d60-ffdcd8e20144', '90.6.2.21 ', 'HEPATITIS B ANTICUERPOS CENTRAL TOTALES [ANTI-CORE HBC] SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(452, 'dd91b4d0-b93b-11ee-9316-11e6465c6621', '90.6.2.22 ', 'HEPATITIS B ANTICUERPOS E [ANTI-HBE] SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(453, 'dd91bec0-b93b-11ee-ac7a-b18a3f6234db', '90.6.2.23 ', 'HEPATITIS B ANTICUERPOS S [ANTI-HBS] SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(454, 'dd91c8e0-b93b-11ee-9ecf-5702f6dff10b', '90.6.2.24 ', 'HEPATITIS B ANTICUERPOS DNA POLIMERASA AUTOMATIZADA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(455, 'dd91d590-b93b-11ee-a231-0f66565e7e80', '90.6.2.25 ', 'HEPATITIS C ANTICUERPO SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(456, 'dd91dfd0-b93b-11ee-a8e4-85fb937a722c', '90.6.2.26 ', 'HEPATITIS DELTA ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(457, 'dd91e9c0-b93b-11ee-8b89-6b37e4bdd581', '90.6.2.27 ', 'HEPATITIS DELTA ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(458, 'dd91f540-b93b-11ee-a10c-bfdda8223d26', '90.6.2.28 ', 'HERPES I ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(459, 'dd9201a0-b93b-11ee-a04c-9dd54eae1f78', '90.6.2.29 ', 'HERPES I ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(460, 'dd920ce0-b93b-11ee-b7f1-9dbdea3d6f68', '90.6.2.30 ', 'HERPES II ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(461, 'dd921870-b93b-11ee-a6b6-95699d8be68e', '90.6.2.31 ', 'HERPES II ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(462, 'dd922340-b93b-11ee-926c-af2d5663eceb', '90.6.2.32 ', 'HTLV-I Y II ANTICUERPOS TOTALES SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(463, 'dd922e00-b93b-11ee-a01e-7f635bc9efd0', '90.6.2.33 ', 'HTLV-I Y II ANTICUERPOS TOTALES CONFIRMATORIO SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(464, 'dd923880-b93b-11ee-9c62-13ebbec3d185', '90.6.2.34 ', 'INFLUENZA TIPO A ANTICUERPOS IG G ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(465, 'dd924350-b93b-11ee-a009-25f1ea74aab1', '90.6.2.35 ', 'INFLUENZA TIPO A ANTICUERPOS IG M', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(466, 'dd9250f0-b93b-11ee-8d97-f389e5a6006f', '90.6.2.36 ', 'INFLUENZA TIPO B ANTICUERPOS IG G', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(467, 'dd925f10-b93b-11ee-ab3b-b5a363349977', '90.6.2.37 ', 'INFLUENZA TIPO B ANTICUERPOS IG M ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(468, 'dd926d70-b93b-11ee-b7ae-416c5ee92ab9', '90.6.2.38 ', 'PAROTIDITIS ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(469, 'dd927b90-b93b-11ee-8223-0561b266a55f', '90.6.2.39 ', 'POLIOVIRUS ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(470, 'dd928780-b93b-11ee-9102-aded30f6f327', '90.6.2.40 ', 'POLIOVIRUS ANTICUERPOS SEROTIPOS 1-3 SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(471, 'dd9295c0-b93b-11ee-9d26-5f1e778e5d9f', '90.6.2.41 ', 'RUBEOLA ANTICUERPOS IG G AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(472, 'dd92a3e0-b93b-11ee-aed8-ede2281fc6f8', '90.6.2.42 ', 'RUBEOLA ANTICUERPOS IG G SEMIAUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(473, 'dd92afc0-b93b-11ee-8f01-f397792d871e', '90.6.2.43 ', 'RUBEOLA ANTICUERPOS IG M AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(474, 'dd92ba80-b93b-11ee-ae41-9d9cae620483', '90.6.2.44 ', 'RUBEOLA ANTICUERPOS IG M SEMIAUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(475, 'dd92c8e0-b93b-11ee-a70b-1784a058948f', '90.6.2.45 ', 'SARAMPIÓN ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(476, 'dd92d720-b93b-11ee-8238-bb8fa57b2fd2', '90.6.2.46 ', 'SARAMPIÓN ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(477, 'dd92e660-b93b-11ee-a2b6-2d9d2149fa5e', '90.6.2.47 ', 'VARICELA ZOSTER ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(478, 'dd92f280-b93b-11ee-be48-0fe546f240be', '90.6.2.48 ', 'VARICELA ZOSTER ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(479, 'dd930080-b93b-11ee-b3f0-4b9fbdeab708', '90.6.2.49 ', 'VIRUS DE INMUNODEFICIENCIA HUMANA 1 Y 2 ANTICUERPOS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(480, 'dd930d40-b93b-11ee-bb4b-9f872dd1aff1', '90.6.2.50 ', 'VIRUS DE INMUNODEFICIENCIA HUMANA PRUEBA CONFIRMATORIA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(481, 'dd931b40-b93b-11ee-a958-c7e854180acf', '90.6.2.51 ', 'VIRUS DE ENCEFALITIS ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(482, 'dd9328b0-b93b-11ee-a162-290816868254', '90.6.2.52 ', 'VIRUS DE FIEBRE AMARILLA ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(483, 'dd9334f0-b93b-11ee-950d-d994c866c3c5', '90.6.2.53 ', 'VIRUS SINCITIAL RESPIRATORIO ANTICUERPOS IG G ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(484, 'dd9342c0-b93b-11ee-9430-8d801fdaaba8', '90.6.2.54 ', 'VIRUS SINCITIAL RESPIRATORIO ANTICUERPOS IG M ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(485, 'dd935000-b93b-11ee-a517-c36734e0107f', '90.6.2.55 ', 'TOXOCARA SPP ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(486, 'dd935f00-b93b-11ee-89fe-250b93f85ce5', '90.6.2.56 ', 'HELICOBACTER PYLORI ANTÍGENO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(487, 'dd936bf0-b93b-11ee-9e3f-f3af5be4a51f', '90.6.2.57 ', 'PNEUMOCYSTIS CARINII ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(488, 'dd937850-b93b-11ee-b69f-5f0191153157', '90.6.2.58 ', 'PAROTIDITIS ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(489, 'dd938400-b93b-11ee-bb84-a3400ea8910e', '90.6.2.59 ', 'PARVOVIRUS B19 ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(490, 'dd938f70-b93b-11ee-8c9a-038b107e1abc', '90.6.2.60 ', 'CITOMEGALOVIRUS ANTICUERPOS IG G MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(491, 'dd939aa0-b93b-11ee-9a7f-2bebf9c43052', '90.6.2.61 ', 'CITOMEGALOVIRUS ANTICUERPOS IG M MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(492, 'dd93a6b0-b93b-11ee-958e-87870b11c048', '90.6.2.62 ', 'HEPATITIS B ANTICUERPOS S [ANTI-HBS] MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(493, 'dd93b400-b93b-11ee-9ec9-dd36c3c06c9f', '90.6.2.63 ', 'HEPATITIS C ANTICUERPOS MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(494, 'dd93c260-b93b-11ee-b697-43c05b20f8b1', '90.6.2.64 ', 'RUBEOLA ANTICUERPOS MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(495, 'dd93d6b0-b93b-11ee-b98d-95063108d42f', '90.6.2.65 ', 'SARAMPIÓN ANTICUERPOS MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(496, 'dd93e970-b93b-11ee-be33-dff93d38a2a7', '90.6.2.66 ', 'HEPATITIS E ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(497, 'dd93fa50-b93b-11ee-a2b3-8f2abcf0024a', '90.6.2.67 ', 'HEPATITIS E ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(498, 'dd9409b0-b93b-11ee-9353-adc16d28e598', '90.6.2.68 ', 'TEST DE AVIDEZ ANTICUERPOS IG G RUBEOLA SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(499, 'dd941900-b93b-11ee-9ee9-81e5e4354491', '90.6.2.69 ', 'TEST DE AVIDEZ ANTICUERPOS IG G CITOMEGALOVIRUS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(500, 'dd9427c0-b93b-11ee-932f-8d9f3d70128f', '90.6.2.70 ', 'SARS COV2 [COVID-19] ANTICUERPOS IG G ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(501, 'dd9432a0-b93b-11ee-b29a-6d5498e62d6f', '90.6.2.71 ', 'SARS COV2 [COVID-19] ANTICUERPOS IG M', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(502, 'dd943d20-b93b-11ee-9476-57154fd6630a', '90.6.3. ', 'DETERMINACIÓN DE ANTÍGENOS MICROBIOLÓGICOS', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(503, 'dd944740-b93b-11ee-8ee4-8318ebdf2eb8', '90.6.3.01 ', 'ADENOVIRUS ANTÍGENO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(504, 'dd945100-b93b-11ee-92c4-05bfa5c7d06d', '90.6.3.02 ', 'ANTÍGENO P 24 VIRUS DE INMUNODEFICIENCIA HUMANA 1 ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(505, 'dd945ad0-b93b-11ee-b3bb-af7616f49685', '90.6.3.03 ', 'ANTÍGENOS BACTERIANOS MANUAL O SEMIAUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(506, 'dd946490-b93b-11ee-9fcf-cb3ecf60b47f', '90.6.3.04  ', 'ANTÍGENOS FEBRILES MANUAL O SEMIAUTOMATIZADO INCLUYE: BRUCELLA ABORTUS, SALMONELLA PARATYPHI A Y B, TIPHY H Y O, PROTEUS OX19 ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(507, 'dd946eb0-b93b-11ee-bcef-67a2a6c8e34a', '90.6.3.05 ', 'ARBOVIRUS ANTÍGENO SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(508, 'dd947890-b93b-11ee-b8ac-aff0b7df253d', '90.6.3.06 ', 'BORDETELLA PERTUSSI ANTÍGENO SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(509, 'dd948260-b93b-11ee-b63d-a7c5e14c5609', '90.6.3.07 ', 'CHLAMYDIA TRACHOMATIS ANTÍGENO SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(510, 'dd948c70-b93b-11ee-8468-0fa83c1d039f', '90.6.3.08 ', 'CHLAMYDIA TRACHOMATIS ANTÍGENO MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(511, 'dd949680-b93b-11ee-9da3-a7a30628a272', '90.6.3.10 ', 'COXSACKIE A ANTÍGENO POR NEUTRALIZACIÓN SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(512, 'dd94a040-b93b-11ee-a126-1b3225204141', '90.6.3.12 ', 'COXSACKIE B ANTÍGENO SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(513, 'dd94aa90-b93b-11ee-b4f1-950eaac7c950', '90.6.3.14 ', 'CRYPTOCOCCUS NEOFORMANS ANTÍGENO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(514, 'dd94b4d0-b93b-11ee-bc4b-ab67b97d5622', '90.6.3.15 ', 'ENTAMOEBA HISTOLÍTICA ANTÍGENO SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(515, 'dd94bea0-b93b-11ee-8c75-ffadfa5dd64e', '90.6.3.16 ', 'GIARDIA LAMBLIA MANUAL', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(516, 'dd94c830-b93b-11ee-860c-8b5038e047a3', '90.6.3.17  ', 'HEPATITIS B ANTÍGENO DE SUPERFICIE [AG HBS]', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(517, 'dd94d240-b93b-11ee-bfe0-7f0548dc3650', '90.6.3.18 ', 'HEPATITIS B ANTÍGENO E [AG HBE] SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(518, 'dd94dc60-b93b-11ee-a29f-23092f18a7c8', '90.6.3.19 ', 'HEPATITIS DELTA ANTÍGENO [AG HVD] SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(519, 'dd94e650-b93b-11ee-8c93-37c6e4ee33cb', '90.6.3.20 ', 'HERPES SIMPLEX ANTÍGENO SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(520, 'dd94f060-b93b-11ee-a536-3bcdb1adfae5', '90.6.3.21', 'INFLUENZA ANTÍGENO  ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(521, 'dd94fc00-b93b-11ee-b2c0-abf7d0a7aa8a', '90.6.3.22', 'LEGIONELLA SPP ANTÍGENO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(522, 'dd950870-b93b-11ee-82c5-fba9fc22758a', '90.6.3.23 ', 'NEISSERIA GONORRHOEAE ANTÍGENO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(523, 'dd951430-b93b-11ee-9727-15cfae2bb1a9', '90.6.3.24 ', 'PARAINFLUENZA TIPO 1 3 ANTÍGENO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(524, 'dd951ea0-b93b-11ee-8c3f-c9a1d8f5e836', '90.6.3.25 ', 'PNEUMOCYSTIS CARINII ANTÍGENO MANUAL O SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(525, 'dd952940-b93b-11ee-8494-fb5d878376c1', '90.6.3.26 ', 'ROTAVIRUS ANTÍGENOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(526, 'dd953340-b93b-11ee-ab60-1165871ce4d9', '90.6.3.27 ', 'ROTAVIRUS ANTÍGENOS MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(527, 'dd953d10-b93b-11ee-b1fb-0bab17e046af', '90.6.3.28 ', 'SALMONELLA SPP IDENTIFICACIÓN MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(528, 'dd9546e0-b93b-11ee-a0d8-5bb699ba74ad', '90.6.3.29 ', 'VIRUS SINCITIAL RESPIRATORIO ANTÍGENO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(529, 'dd9551a0-b93b-11ee-89c9-6f4493691b54', '90.6.3.31 ', 'STREPTOCOCCUS PNEUMONIAE ANTÍGENO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(530, 'dd955b60-b93b-11ee-9525-9b56d0b2f97c', '90.6.3.32 ', 'HEPATITIS B [HBSAG] ANTÍGENO DE SUPERFICIE PRUEBA DE NEUTRALIZACIÓN AUTOMATIZADA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(531, 'dd956510-b93b-11ee-8b2e-d95ade141af9', '90.6.3.33 ', 'ASPERGILLUS SPP ANTÍGENO (GALACTOMANAN) SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(532, 'dd956eb0-b93b-11ee-9359-fd7c6dc80498', '90.6.3.34 ', 'CÁNDIDA SPP ANTÍGENO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(533, 'dd9578a0-b93b-11ee-9f67-e18c99ea8074', '90.6.3.35 ', 'CRYPTOSPORIDIUM SPP ANTÍGENO SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(534, 'dd958250-b93b-11ee-b000-0187c7a29e31', '90.6.3.36 ', 'GIARDIA LAMBLIA ANTÍGENO SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(535, 'dd958bf0-b93b-11ee-9a17-e7a9d0a0cd9d', '90.6.3.37 ', 'HISTOPLASMA CAPSULATUM ANTÍGENO SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(536, 'dd959580-b93b-11ee-825a-df592e1c4ba9', '90.6.3.38  ', 'PLASMODIUM SPP ANTÍGENO MAUAL O SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(537, 'dd959f70-b93b-11ee-831c-995484b300ab', '90.6.3.39 ', 'CLOSTRIDIUM DIFFICILE ANTÍGENO A Y B ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(538, 'dd95a920-b93b-11ee-8742-53fe04ff2c15', '90.6.3.40 ', 'SARS COV 2 [COVID-19] ANTÍGENO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(539, 'dd95b2e0-b93b-11ee-a5bc-5f19857bd1e2', '90.6.4. ', 'DETERMINACIÓN DE ANTICUERPOS ESPECÍFICOS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(540, 'dd95bc70-b93b-11ee-a216-d71bb274693a', '90.6.4.01 ', 'ACETILCOLINA RECEPTORES ANTICUERPOS BLOQUEADORES AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(541, 'dd95c660-b93b-11ee-abbc-4f9ee0129411', '90.6.4.04 ', 'ADN CADENA SENCILLA ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(542, 'dd95d060-b93b-11ee-a8d8-ed4b7079ea84', '90.6.4.05 ', 'ADRENAL AUTOANTICUERPOS SEMIAUTOMATIZADA O AUTOMATIZADA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(543, 'dd95da50-b93b-11ee-8d14-678da74c318c', '90.6.4.06 ', 'ANTICUERPOS NUCLEARES EXTRACTABLES TOTALES [ENA] SS-A [RO] SS-B [LA] RNP Y SM SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(544, 'dd95e520-b93b-11ee-9911-239aa7b128b2', '90.6.4.07 ', 'CARDIOLIPINA ANTICUERPOS IG A SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(545, 'dd95f280-b93b-11ee-8cfa-79a375b7a92d', '90.6.4.08 ', 'CARDIOLIPINA ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(546, 'dd95fc90-b93b-11ee-95b0-e7e5c48b217b', '90.6.4.09 ', 'CARDIOLIPINA ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(547, 'dd960620-b93b-11ee-b566-5f85ba7f05ff', '90.6.4.10 ', 'CÉLULAS DE PURKINGE ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(548, 'dd961010-b93b-11ee-943e-e73dd0856d0d', '90.6.4.11 ', 'CÉLULAS PARIETALES ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(549, 'dd9619e0-b93b-11ee-8249-b75c78ec4d19', '90.6.4.12 ', 'CEMENTO INTERCELULAR ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(550, 'dd962460-b93b-11ee-984e-05980a5e57e1', '90.6.4.13 ', 'CENTROMERO ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(551, 'dd962e80-b93b-11ee-bfad-99e557a0306a', '90.6.4.14 ', 'CITOPLASMA DE NEUTRÓFILOS ANTICUERPOS TOTALES [C-ANCA O P-ANCA] MANUAL O SEMIAUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(552, 'dd963880-b93b-11ee-8896-590e368cf9fe', '90.6.4.15 ', 'CITOPLASMA DE NEUTRÓFILOS ANTICUERPOS TOTALES [C ANCA O P ANCA] AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(553, 'dd964220-b93b-11ee-8dbf-b583b23f25f7', '90.6.4.16 ', 'DEOXIRRIBONUCLEASA B AUTOANTICUERPOS [ANTI ADN B] AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(554, 'dd964c60-b93b-11ee-9b6a-49bcd5fd450b', '90.6.4.17 ', 'DNA N ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(555, 'dd965690-b93b-11ee-9ba9-83e4090c765e', '90.6.4.18 ', 'DNA N ANTICUERPOS MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(556, 'dd966060-b93b-11ee-99b8-296be2020d2a', '90.6.4.19 ', 'ESPERMATOZOIDES ANTICUERPOS AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(557, 'dd9669f0-b93b-11ee-97c4-2731201320c2', '90.6.4.20 ', 'ESPERMATOZOIDES ANTICUERPOS MANUAL O SEMIAUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(558, 'dd9673b0-b93b-11ee-a3ad-dbee2ec22c81', '90.6.4.21 ', 'FACTOR ANTINÚCLEO ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(559, 'dd967d40-b93b-11ee-9ead-9317a76fc14b', '90.6.4.22 ', 'FOSFOLÍPIDOS ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO INCLUYE: FOSFATILSERINA, FOSFATILETANOLAMINA, ÁCIDO FOSFATÍDICO, FOSFATIL GLICEROL Y FOSFATIL INOSITOL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(560, 'dd968a50-b93b-11ee-9eb1-533c25810a96', '90.6.4.23 ', 'FOSFOLÍPIDOS ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO INCLUYE: FOSFATILSERINA, FOSFATILETANOLAMINA, ÁCIDO FOSFATÍDICO, FOSFATIL GLICEROL Y FOSFATIL INOSITOL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(561, 'dd969420-b93b-11ee-b821-a5c535513335', '90.6.4.24 ', 'HISTONA ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(562, 'dd969e30-b93b-11ee-bc19-312de3917b05', '90.6.4.25', 'INSULINA ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(563, 'dd96a7b0-b93b-11ee-884d-01f0e4e9d5e9', '90.6.4.26 ', 'INSULINA ANTICUERPOS ISLOTES SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(564, 'dd96b2c0-b93b-11ee-b67d-8fc47252f531', '90.6.4.28 ', 'ISOLEUCOAGLUTININAS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(565, 'dd96bce0-b93b-11ee-8af4-5f972797237a', '90.6.4.29 ', 'JO1 ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(566, 'dd96c740-b93b-11ee-a37d-63e4f8ddb25e', '90.6.4.30 ', 'SSB [LA] ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(567, 'dd96d160-b93b-11ee-9c93-f7e6166c1c62', '90.6.4.31 ', 'MEMBRANA BASAL DEL GLOMERULO ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(568, 'dd96db80-b93b-11ee-9cd9-bb7aa2b3827e', '90.6.4.32 ', 'MITOCONDRIA ANTICUERPOS AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(569, 'dd96e510-b93b-11ee-98dc-bf139d082543', '90.6.4.33 ', 'MITOCONDRIA ANTICUERPOS MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(570, 'dd96ef20-b93b-11ee-a445-0353280a14d8', '90.6.4.34 ', 'MITOCONDRIA ANTICUERPOS SEMIAUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(571, 'dd96f900-b93b-11ee-8382-a77ab2714439', '90.6.4.35 ', 'MÚSCULO ESTRIADO ANTICUERPOS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(572, 'dd970340-b93b-11ee-add9-9fd85cff2ef6', '90.6.4.36 ', 'MÚSCULO LISO ANTICUERPOS AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(573, 'dd970ec0-b93b-11ee-81a9-052833022605', '90.6.4.37 ', 'MÚSCULO LISO ANTICUERPOS MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(574, 'dd9718a0-b93b-11ee-8f53-6354c03a7f77', '90.6.4.38 ', 'MÚSCULO LISO ANTICUERPOS SEMIAUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(575, 'dd972270-b93b-11ee-b959-f736aebc8dce', '90.6.4.40 ', 'ANTICUERPOS ANTINUCLEARES AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(576, 'dd972cc0-b93b-11ee-b68a-090722a2d51f', '90.6.4.41 ', 'ANTICUERPOS ANTINUCLEARES MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(577, 'dd973690-b93b-11ee-bea1-1d5482eb89ee', '90.6.4.42 ', 'ANTICUERPOS ANTINUCLEARES SEMIAUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(578, 'dd974200-b93b-11ee-9b1a-ff0335899d0f', '90.6.4.43 ', 'ANTICUERPOS PLAQUETARIOS DETECCIÓN MANUAL O SEMIAUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(579, 'dd974d60-b93b-11ee-8089-09c0e0e7a638', '90.6.4.44 ', 'ANTICUERPOS PLAQUETARIOS DETECCIÓN AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(580, 'dd975950-b93b-11ee-aa48-bba2936d6bd7', '90.6.4.45 ', 'PLAQUETAS ANTICUERPOS CIRCULANTES IG G IG M E IG A SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(581, 'dd9764b0-b93b-11ee-83c2-bfa6df144106', '90.6.4.46 ', 'PLAQUETAS ANTÍGENOS ASOCIADOS A ANTICUERPOS IG G IG M E IG A SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(582, 'dd977090-b93b-11ee-a9d1-6d3953862341', '90.6.4.47 ', 'PM/SCL ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(583, 'dd977c50-b93b-11ee-b75c-6f86f26ace00', '90.6.4.48 ', 'PM1 ANTICUERPOS ASOCIADOS A POLIMIOSITIS AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(584, 'dd978740-b93b-11ee-8559-a39d959c5c8e', '90.6.4.49 ', 'PM2 ANTICUERPOS AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(585, 'dd979110-b93b-11ee-9afa-41d8df04c05c', '90.6.4.50 ', 'PROTEÍNA RIBOSOMAL P ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(586, 'dd979b50-b93b-11ee-a0ac-cd7add950a55', '90.6.4.51 ', 'QUERATINA ANTICUERPOS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(587, 'dd97a610-b93b-11ee-8e8b-c9bb128158d9', '90.6.4.52 ', 'RECEPTORES BETA-2 ADRENERGICOS ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(588, 'dd97b030-b93b-11ee-9429-ad68ecfd5ae3', '90.6.4.53 ', 'RNP ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(589, 'dd97bad0-b93b-11ee-ae16-9f9b51cc9b5d', '90.6.4.54 ', 'SSA [RO] ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(590, 'dd97c530-b93b-11ee-a27f-f95127ca2ffc', '90.6.4.55 ', 'SCL-70 ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(591, 'dd97cf70-b93b-11ee-a9cc-ed4b78df7549', '90.6.4.56 ', 'SM ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(592, 'dd97daa0-b93b-11ee-a8a8-abd47b3e8dee', '90.6.4.57 ', 'TIROIDEOS COLOIDALES ANTICUERPOS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(593, 'dd97e4c0-b93b-11ee-b6a7-9b80c0a40de0', '90.6.4.58 ', 'TIROIDEOS MICROSOMALES ANTICUERPOS (TIROIDEOS PEROXIDASA ANTICUERPOS) AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(594, 'dd97eeb0-b93b-11ee-a1dc-e7bb167e8627', '90.6.4.59 ', 'TIROIDEOS MICROSOMALES ANTICUERPOS (TIROIDEOS PEROXIDASA ANTICUERPOS) MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(595, 'dd97f950-b93b-11ee-b260-27c18c7f63dc', '90.6.4.60 ', 'TIROIDEOS MICROSOMALES ANTICUERPOS (TIROIDEOS PEROXIDASA ANTICUERPOS) SEMIAUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(596, 'dd980510-b93b-11ee-b062-af9fa691e8f4', '90.6.4.62 ', 'TIROIDEOS PEROXIDASA ANTICUERPOS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(597, 'dd9812a0-b93b-11ee-bcbe-992cb250b60d', '90.6.4.63 ', 'TIROIDEOS TIROGLOBULÍNICOS ANTICUERPOS AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(598, 'dd981f10-b93b-11ee-b140-0b7f1998cd89', '90.6.4.64 ', 'TIROIDEOS TIROGLOBULÍNICOS ANTICUERPOS MANUAL', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(599, 'dd982990-b93b-11ee-850d-e1ca096c6159', '90.6.4.65 ', 'TIROIDEOS TIROGLOBULÍNICOS ANTICUERPOS SEMIAUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(600, 'dd9835a0-b93b-11ee-8237-8198d96faced', '90.6.4.66 ', 'CITRULINA ANTICUERPOS [ANTI PÉPTIDO CÍCLICO CITRULINADO] SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(601, 'dd9840b0-b93b-11ee-b75b-85e2cdb65ed1', '90.6.4.67 ', 'HORMONA PARATIROIDEA ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(602, 'dd984bf0-b93b-11ee-8bf3-8df20dafd294', '90.6.4.68 ', 'ACETILCOLINA RECEPTORES ANTICUERPOS FIJADORES SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26');
INSERT INTO `laboratoryexams` (`id`, `uuid`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(603, 'dd985790-b93b-11ee-a81a-59d8eb54fdaa', '90.6.4.69 ', 'ACETILCOLINA RECEPTORES ANTICUERPOS MODULADORES SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(604, 'dd9861c0-b93b-11ee-b998-f9a9b2dd50ac', '90.6.4.70 ', 'ANTICUERPOS ACUAPORINA 4 SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(605, 'dd986b60-b93b-11ee-8bf3-e196112b1725', '90.6.4.71 ', 'ENDOMISIO ANTICUERPOS IG A SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(606, 'dd987700-b93b-11ee-9c52-bff6d9089b2c', '90.6.4.72 ', 'ENDOMISIO ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(607, 'dd988150-b93b-11ee-9e3d-e550b1c729fe', '90.6.4.73 ', 'ENDOMISIO ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(608, 'dd988b20-b93b-11ee-8ec4-bddd09bff7e7', '90.6.4.74 ', 'GLIADINA ANTICUERPOS IG A SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(609, 'dd9894c0-b93b-11ee-a638-e35b67035a58', '90.6.4.75 ', 'GLIADINA ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(610, 'dd989e50-b93b-11ee-bf7c-1f227d208a9f', '90.6.4.76 ', 'GLIADINA ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(611, 'dd98a8e0-b93b-11ee-97c8-6dc227a9a516', '90.6.4.77 ', 'TRANSGLUTAMINASA ANTICUERPOS IG A SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(612, 'dd98b270-b93b-11ee-bce8-47bf4a4bbf34', '90.6.4.78 ', 'TRANSGLUTAMINASA ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(613, 'dd98bc10-b93b-11ee-8460-e3efd3e4bd98', '90.6.4.79 ', 'TRANSGLUTAMINASA ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(614, 'dd98c580-b93b-11ee-8512-9921b783d7f6', '90.6.4.80 ', 'BETA 2 GLICOPROTEÍNA I IG A SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(615, 'dd98cf80-b93b-11ee-8387-071f95d35444', '90.6.4.81 ', 'BETA 2 GLICOPROTEÍNA I IG G SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(616, 'dd98d920-b93b-11ee-9546-bb9881a24edb', '90.6.4.82 ', 'BETA 2 GLICOPROTEÍNA I IG M SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(617, 'dd98e300-b93b-11ee-b919-837394eea670', '90.6.4.83 ', 'ÁCIDO GLUTÁMICO DECARBOXILASA ANTICUERPO SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(618, 'dd98ec90-b93b-11ee-bcb8-a9079a5e1684', '90.6.4.84 ', 'MICROSOMALES HÍGADO Y RIÑÓN ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(619, 'dd98f670-b93b-11ee-b395-0f67972d299f', '90.6.4.85 ', 'MIELOPEROXIDASA ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(620, 'dd990010-b93b-11ee-be54-65d2fd7e21b5', '90.6.4.86 ', 'PROTEINASA 3 ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(621, 'dd990ab0-b93b-11ee-9315-7b9d5de097c0', '90.6.4.87 ', 'NEURONALES ANTICUERPOS (ANTI-HU YO RI FIFISINA CV2 MA2) SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(622, 'dd991490-b93b-11ee-8739-e7e793c9bdc3', '90.6.4.88 ', 'GANGLIOSIDOS ANTICUERPOS IG G SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(623, 'dd991e90-b93b-11ee-9375-094bd31cf9f9', '90.6.4.89 ', 'GANGLIOSIDOS ANTICUERPOS IG M SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(624, 'dd9931d0-b93b-11ee-9ccf-f3bada4904c6', '90.6.4.90 ', 'ANTÍGENO SOLUBLE DE HÍGADO ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(625, 'dd994350-b93b-11ee-ae05-95155ed88002', '90.6.4.91 ', 'TIROSINASA MÚSCULO ESPECÍFICA [MUSK] ANTICUERPOS SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(626, 'dd995320-b93b-11ee-9a3a-798b5eab72fc', '90.6.4.92', 'ANTICUERPOS ANTI RECEPTOR DE TSH SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(627, 'dd995ee0-b93b-11ee-a84c-6545366896e4', '90.6.4.97 ', 'ANTICUERPOS ANTIFOSFOLIPASA A2 ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(628, 'dd996a20-b93b-11ee-b704-d19b61fd8369', '90.6.4.98', 'IDENTIFICACIÓN DE OTROS ANTICUERPOS (ESPECÍFICO) SEMIAUTOMATIZADO O AUTOMATIZADO EXCLUYE: AQUELLAS DETERMINACIONES DE ANTICUERPOS QUE TIENEN DESCRIPCIÓN ESPECÍFICA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(629, 'dd997460-b93b-11ee-a9af-b5fd6202f279', '90.6.6.02  ', 'ALFA FETOPROTEÍNA SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(630, 'dd997ef0-b93b-11ee-be63-0b80078d4c0b', '90.6.6.03 ', 'ANTÍGENO CARCINOEMBRIONARIO SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(631, 'dd9988e0-b93b-11ee-98a3-831675213fe6', '90.6.6.04 ', 'ANTÍGENO DE CÁNCER DE MAMA [CA 15-3] SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(632, 'dd999320-b93b-11ee-98bd-b36d07f1e8b4', '90.6.6.05 ', 'ANTÍGENO DE CÁNCER DE OVARIO [CA 125] SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(633, 'dd999d40-b93b-11ee-b6f3-5b287a0f61cc', '90.6.6.20 ', 'BETA 2 MICROGLOBULINA SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(634, 'dd99a780-b93b-11ee-adf6-3d33c03de958', '90.6.6.21 ', 'CALCITONINA SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(635, 'dd99b120-b93b-11ee-8963-e537dcffca6e', '90.6.6.22 ', 'ENOLASA NEURONAL ESPECÍFICA SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(636, 'dd99bb70-b93b-11ee-bcb7-8797dcf62159', '90.6.7.08 ', 'LEUCOCITOS CD45 LEUCOCITOS TOTALES SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(637, 'dd99c550-b93b-11ee-bc07-4deae2f27995', '90.6.7.09 ', 'LEUCOCITOS CD45 LEUCOCITOS TOTALES POR INMUNOHISTOQUÍMICA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(638, 'dd99cf10-b93b-11ee-bf60-4328bc21768c', '90.6.7.10 ', 'LEUCOCITOS MPO SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(639, 'dd99d900-b93b-11ee-ac8a-ebf579546e65', '90.6.7.11', 'LINFOCITOS B (CD19 Y CD20) SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(640, 'dd99e390-b93b-11ee-9233-3f4cc31cbe16', '90.6.7.12 ', 'LINFOCITOS T CD3 SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(641, 'dd99edd0-b93b-11ee-a93a-494e13f10c8d', '90.6.7.13 ', 'LINFOCITOS T CD3 POR INMUNOFLUORESCENCIA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(642, 'dd99f840-b93b-11ee-bf33-2f7404f5653d', '90.6.7.14 ', 'LINFOCITOS T CD4 SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(643, 'dd9a0240-b93b-11ee-84bf-ad6631d9f206', '90.6.7.15 ', 'LINFOCITOS T CD4 POR INMUNOFLUORESCENCIA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(644, 'dd9a0c50-b93b-11ee-bfe5-63a6c32099b2', '90.6.7.16 ', 'LINFOCITOS CD5 SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(645, 'dd9a16b0-b93b-11ee-bab7-e17928bd75de', '90.6.7.17 ', 'LINFOCITOS CD5 POR INMUNOFLUORESCENCIA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(646, 'dd9a22e0-b93b-11ee-85ba-97a82187cc0d', '90.6.7.18 ', 'LINFOCITOS CD7 LINFOCITOS T Y NK SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(647, 'dd9a2ff0-b93b-11ee-89f9-5d9258a983c3', '90.6.7.19 ', 'LINFOCITOS CD7 LINFOCITOS T Y NK POR INMUNOHISTOQUÍMICA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(648, 'dd9a3c80-b93b-11ee-8071-f378be9cfce1', '90.6.7.20 ', 'LINFOCITOS T CD8 SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(649, 'dd9a48c0-b93b-11ee-9949-1bf4d7a7a28b', '90.6.7.21  ', 'LINFOCITOS T CD8 POR INMUNOFLUORESCENCIA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(650, 'dd9a5560-b93b-11ee-a593-e54ffd1a9e12', '90.6.7.22  ', 'LINFOCITOS CD10 LINFOCITOS PRE-B [CALLA] SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(651, 'dd9a61c0-b93b-11ee-ad1c-63efb73b3d5f', '90.6.7.23 ', 'LINFOCITOS CD10 LINFOCITOS PRE-B [CALLA] POR INMUNOHISTOQUÍMICA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(652, 'dd9a6e10-b93b-11ee-93af-29f8f11d7f8f', '90.6.7.24 ', 'LINFOCITOS CD11 SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(653, 'dd9a7ab0-b93b-11ee-b739-257ed39184ae', '90.6.7.25  ', 'LINFOCITOS CD11 POR INMUNOHISTOQUÍMICA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(654, 'dd9a8770-b93b-11ee-912d-3fcc9a2d94bd', '90.6.7.26 ', 'LINFOCITOS CD13 SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(655, 'dd9a9c40-b93b-11ee-8c9e-d7786bab2e99', '90.6.7.27 ', 'LINFOCITOS CD13 POR INMUNOHISTOQUÍMICA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(656, 'dd9ab280-b93b-11ee-b42c-eb608bfcb355', '90.6.7.28 ', 'LINFOCITOS CD15 SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(657, 'dd9ac6b0-b93b-11ee-8853-51299c1944b4', '90.6.7.29 ', 'LINFOCITOS CD15 POR INMUNOHISTOQUÍMICA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(658, 'dd9ad7a0-b93b-11ee-ad02-2ba3b2a078bd', '90.6.7.30 ', 'LINFOCITOS CD16 LINFOCITOS NK SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(659, 'dd9ae700-b93b-11ee-aafa-638be10c9089', '90.6.7.31 ', 'LINFOCITOS CD16 LINFOCITOS NK POR INMUNOHISTOQUÍMICA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(660, 'dd9af400-b93b-11ee-b9ca-3df0404c6363', '90.6.7.32 ', 'LINFOCITOS CD22 SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(661, 'dd9b0320-b93b-11ee-bd6c-b98fb606fd97', '90.6.7.33 ', 'LINFOCITOS CD22 POR INMUNOHISTOQUÍMICA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(662, 'dd9b1200-b93b-11ee-93c8-f7541a89c732', '90.6.7.34 ', 'LINFOCITOS CD23 SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(663, 'dd9b2140-b93b-11ee-821a-5d05d218f160', '90.6.7.35 ', 'LINFOCITOS CD23 POR INMUNOHISTOQUÍMICA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(664, 'dd9b2de0-b93b-11ee-9638-67e1267a62d0', '90.6.7.36 ', 'LINFOCITOS CD38 LINFOCITOS T ACTIVADOS Y B LINFOCITOS NK SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(665, 'dd9b3c40-b93b-11ee-81b3-a75f1e8eceab', '90.6.7.37 ', 'LINFOCITOS CD38 LINFOCITOS T ACTIVADOS Y B, LINFOCITOS NK POR INMUNOHISTOQUÍMICA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(666, 'dd9b4b60-b93b-11ee-8673-a1056d30ce6b', '90.6.7.38 ', 'LINFOCITOS CD56 LINFOCITOS NK SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(667, 'dd9b5930-b93b-11ee-8c13-05763a1e30c5', '90.6.7.39 ', 'LINFOCITOS CD56 LINFOCITOS NK POR INMUNOHISTOQUÍMICA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(668, 'dd9b67c0-b93b-11ee-8b34-bfe48b2248e7', '90.6.7.40 ', 'LINFOCITOS CD79A SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(669, 'dd9b7640-b93b-11ee-b5bd-5399009351e7', '90.6.7.41 ', 'LINFOCITOS CD79A POR INMUNOHISTOQUÍMICA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(670, 'dd9b84d0-b93b-11ee-982c-ef02ec21612a', '90.6.7.42 ', 'LINFOCITOS CD79B SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(671, 'dd9b9240-b93b-11ee-bdf2-0f26efc18f3c', '90.6.7.43 ', 'LINFOCITOS CD79B POR INMUNOHISTOQUÍMICA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(672, 'dd9ba140-b93b-11ee-9877-1119c326ed98', '90.6.7.44 ', 'LINFOCITOS T CUANTIFICACIÓN CD3 CD4 CD8 SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(673, 'dd9baf60-b93b-11ee-b7f6-7d5fa2505079', '90.6.7.45  ', 'LINFOCITOS T INMADUROS CD1 POR INMUNOHISTOQUÍMICA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(674, 'dd9bbe50-b93b-11ee-8ab8-0bc793521549', '90.6.7.46 ', 'MONOCITOS CD45 SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(675, 'dd9bcc60-b93b-11ee-b2c3-1bc2098cdd43', '90.6.7.47 ', 'MONOCITOS CD45 POR INMUNOHISTOQUÍMICA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(676, 'dd9bdb80-b93b-11ee-b1bd-8bf75d14d6e9', '90.6.7.48 ', 'MONOCITOS CD64 SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(677, 'dd9bea20-b93b-11ee-9642-7db689832421', '90.6.7.49 ', 'MONOCITOS CD64 POR INMUNOHISTOQUÍMICA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(678, 'dd9bf780-b93b-11ee-8ca9-95df5ce995dd', '90.6.7.50 ', 'PLAQUETAS CD41 SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(679, 'dd9c0660-b93b-11ee-b78e-2bfb8e2505c1', '90.6.7.51 ', 'PLAQUETAS CD41 POR INMUNOHISTOQUÍMICA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(680, 'dd9c1530-b93b-11ee-8550-cbdd664f1793', '90.6.7.52 ', 'PLAQUETAS CD61 SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(681, 'dd9c24c0-b93b-11ee-bcc6-b70bea35828c', '90.6.7.53 ', 'PLAQUETAS CD61 POR INMUNOHISTOQUÍMICA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(682, 'dd9c33c0-b93b-11ee-8983-5d0fa8b14f9a', '90.6.7.54 ', 'LINFOCITOS B DE MEMORIA SUBPOBLACIONES IGD CD27 CD19 SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(683, 'dd9c4390-b93b-11ee-8cac-958680f5a1a7', '90.6.7.55 ', 'EXPRESIÓN DE PERFORINAS EN CÉLULAS NK SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(684, 'dd9c5210-b93b-11ee-b515-bdccf4634936', '90.6.7.56 ', 'PLASMOBLASTOS CD38: CD19 IGD CD38 SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(685, 'dd9c61a0-b93b-11ee-b44f-65bf8d8ded60', '90.6.7.57 ', 'LINFOCITOS ALFA BETA (CD4 CD8): TC RAB CD4 CD8 SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(686, 'dd9c6f70-b93b-11ee-a5e8-6ff9765f0772', '90.6.7.58 ', 'LINFOCITOS B TOTALES MÁS EXPRESIÓN DEL RECEPTOR DEL COMPLEMENTO CR2: CD45 CD19 CD21 SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(687, 'dd9c7c00-b93b-11ee-929a-35e3df79ca5d', '90.6.7.59 ', 'LINFOCITOS B TRANSICIONALES: CD24 CD19 CD38 SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(688, 'dd9c8710-b93b-11ee-8617-0d2003aeb903', '90.6.7.60 ', 'LINFOCITOS NK: EXPRESIÓN DE CD107A SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(689, 'dd9c9560-b93b-11ee-9e07-61ca38896a87', '90.6.7.61 ', 'LINFOCITOS NK: ENSAYO DE CITOTOXICIDAD SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(690, 'dd9ca3b0-b93b-11ee-a95b-e53d124c0651', '90.6.7.62 ', 'LINFOCITOS T (CD3 CD4 CD8 DOBLEMENTE NEGATIVOS) SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(691, 'dd9cb340-b93b-11ee-bfea-bf6dfbc91e84', '90.6.7.63 ', 'LINFOCITOS T (CD3 CD4 CD8 RELACIÓN CD4/CD8) Y LINFOCITOS B (CD19 CD20) RECUENTO SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(692, 'dd9cc120-b93b-11ee-b5fe-39a46b5c4e06', '90.6.7.64 ', 'LINFOCITOS T SUBPOBLACIONES PRINCIPALES: CD45 CD3 CD4 CD8 SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(693, 'dd9ccd60-b93b-11ee-8ded-614a0613f9ca', '90.6.7.65 ', 'MARCADOR TCR ALFA BETA (TCRAB) SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(694, 'dd9cd770-b93b-11ee-97bc-ff0f44180f72', '90.6.7.66 ', 'MONOCITOS CD14 ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(695, 'dd9ce1d0-b93b-11ee-be08-01eb3a788749', '90.6.7.68 ', 'SUBPOBLACIONES DE LINFOCITOS T B NK Y MONOCITOS EN LEUCOCITOS CD45 SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(696, 'dd9ced90-b93b-11ee-8ae8-511cf058b8de', '90.6.7.69 ', 'SUBPOBLACIONES EXTENDIDAS DE LINFOCITOS B (VIRGENES Y DE MEMORIA CON O SIN CAMBIO DE ISOTIPO PLASMOBLASTOS Y TRANSICIONALES) SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(697, 'dd9cfba0-b93b-11ee-aa33-11a6c874193a', '90.6.7.70 ', 'SUBPOBLACIONES EXTENDIDAS DE LINFOCITOS T (AYUDADORES Y CITOTÓXICOS VIRGENES Y DE MEMORIA CENTRAL Y EFECTORA) SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(698, 'dd9d05f0-b93b-11ee-a094-25253376d9f9', '90.6.7.71 ', 'EXPRESIÓN DE CD40 EN LINFOCITOS B ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(699, 'dd9d15b0-b93b-11ee-b1c9-f17583d63a8c', '90.6.7.72 ', 'EXPRESIÓN DE CD40L EN LINFOCITOS T', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(700, 'dd9d2210-b93b-11ee-b72c-bbe3d57b31e3', '90.6.7.73 ', 'EXPRESIÓN DE HLA CLASE II EN LINFOCITOS T Y B A PARTIR DE LEUCOCITOS CD45+  ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(701, 'dd9d3070-b93b-11ee-9c21-0923b52e528a', '90.6.7.74', 'EXPRESIÓN DE IFNGR1 E IL12RB1 EN LINFOCITOS', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(702, 'dd9d3ca0-b93b-11ee-9262-ed43cd89637a', '90.6.7.75 ', 'EXPRESIÓN INTRACELULAR DE SAP EN LINFOCITOS', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(703, 'dd9d4ac0-b93b-11ee-bd8b-6504b00a4cfd', '90.6.7.76 ', 'LINFOPROLIFERACIÓN A ANTI-CD3+ ANTI-CD28 ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(704, 'dd9d58b0-b93b-11ee-8132-1d42019d39e6', '90.6.7.77', 'LINFOPROLIFERACIÓN A MITÓGENO INCLUYE: TOXOIDE TETÁNICO, Y DERIVADO PROTÉICO PURIFICADO - PPD, FITOHEMAGLUTININA -PHA, ENTRE OTROS. ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(705, 'dd9d6660-b93b-11ee-967e-cd9ce1a4873d', '90.6.7.78 ', 'APOPTOSIS DE LINFOCITOS T ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(706, 'dd9d73a0-b93b-11ee-bae5-d3f51d8a68b7', '90.6.7.79 ', 'EXPRESIÓN DE CD18 A PARTIR DE LEUCOCITOS CD45+  ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(707, 'dd9d8000-b93b-11ee-8686-3df6973ce510', '90.6.7.80', 'DOCK8 INTRACELULAR EN LINFOCITOS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(708, 'dd9d8dc0-b93b-11ee-b5ce-472c15c63cf9', '90.6.7.81 ', 'EXPRESIÓN DE HLA DR EN LINFOCITOS T CD8+  ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(709, 'dd9d99c0-b93b-11ee-a6e4-a3bb63880ef4', '90.6.7.82', 'LINFOCITOS T NK INVARIANTES ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(710, 'dd9da550-b93b-11ee-9884-8d228e62aa57', '90.6.7.83 ', 'LINFOCITOS T DOBLEMENTE NEGATIVOS TCR ALFA-BETA  ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(711, 'dd9db2a0-b93b-11ee-8d7c-654d01e6d5c7', '90.6.7.84', 'LINFOCITOS T REGULADORES', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(712, 'dd9dbe90-b93b-11ee-9736-6f80a60562be', '90.6.7.85 ', 'LINFOCITOS T EMIGRANTES TÍMICOS', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(713, 'dd9dcaa0-b93b-11ee-83f2-1b05988df477', '90.6.7.86 ', 'XIAP INTRACELULAR EN LEUCOCITOS', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(714, 'dd9dd7a0-b93b-11ee-82ea-275112ad2c61', '90.6.7.87 ', 'WASP INTRACELULAR EN LEUCOCITOS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(715, 'dd9de520-b93b-11ee-b288-032777b242da', '90.6.7.88 ', 'PRUEBA FUNCIONAL PARA XIAP EN MONOCITOS', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(716, 'dd9df1a0-b93b-11ee-b0b4-9741db865b85', '90.6.8.01 ', 'BETA 2 GLICOPROTEÍNA I SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(717, 'dd9dff20-b93b-11ee-b19e-5b730074add7', '90.6.8.02 ', 'CAMPO OSCURO PARA CUALQUIER MUESTRA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(718, 'dd9e0ac0-b93b-11ee-b461-c3ac30e0e8d3', '90.6.8.03 ', 'CÉLULAS ROJAS GLICOFORINA SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(719, 'dd9e17d0-b93b-11ee-b376-a17c76402d4c', '90.6.8.05 ', 'COMPLEJOS INMUNES CIRCULANTES SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(720, 'dd9e2410-b93b-11ee-a3e3-4be72fbdfc19', '90.6.8.06 ', 'COMPLEMENTO C1Q SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(721, 'dd9e3110-b93b-11ee-b8af-cdeeda5df3ea', '90.6.8.07 ', 'ELECTROFORESIS DE AMINOÁCIDOS EN ORINA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(722, 'dd9e3cf0-b93b-11ee-85c6-33789294fa0b', '90.6.8.08 ', 'ELECTROFORESIS DE HEMOGLOBINA SEMIAUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(723, 'dd9e4a00-b93b-11ee-97bd-678b586473df', '90.6.8.09 ', 'ELECTROFORESIS DE HEMOGLOBINA AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(724, 'dd9e5470-b93b-11ee-92d3-9d82538cbbe8', '90.6.8.10 ', 'ELECTROFORESIS DE LIPOPROTEÍNAS SEMIAUTOMATIZADO Y AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(725, 'dd9e5ea0-b93b-11ee-8e47-639b6c13252c', '90.6.8.11 ', 'ELECTROFORESIS DE PROTEÍNAS DE LÍQUIDO CEFALORRAQUÍDEO [DETECCIÓN DE BANDAS OLIGOCLONALES] SEMIAUTOMATIZADO Y AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(726, 'dd9e6970-b93b-11ee-a7e5-ff58362901da', '90.6.8.12 ', 'ELECTROFORESIS DE PROTEÍNAS SEMIAUTOMATIZADO Y AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(727, 'dd9e7400-b93b-11ee-bc1b-1b60252965c1', '90.6.8.13 ', 'FACTOR INTRÍNSECO ANTICUERPOS SEMIAUTOMATIZADO Y AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(728, 'dd9e7ff0-b93b-11ee-830b-5399f4bfc8c3', '90.6.8.14 ', 'FAGOCITOSIS ESTUDIO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(729, 'dd9e8be0-b93b-11ee-a243-7143585125d7', '90.6.8.18 ', 'HEPATITIS C PRUEBA CONFIRMATORIA SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(730, 'dd9e9a50-b93b-11ee-a22f-47b1c7cdf461', '90.6.8.22 ', 'HISTAMINA SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(731, 'dd9ea890-b93b-11ee-9e3d-938e8e17d086', '90.6.8.23 ', 'INHIBIDOR C1 ESTERASA CONCENTRACIÓN O FUNCIONAL SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(732, 'dd9eb3c0-b93b-11ee-9131-d301345646d6', '90.6.8.24 ', 'INMUNOFIJACIÓN SEMIAUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(733, 'dd9ec130-b93b-11ee-a7e5-134796003c5b', '90.6.8.25 ', 'INMUNOFIJACIÓN AUTOMATIZADA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(734, 'dd9ecf90-b93b-11ee-98c1-dd8b64760308', '90.6.8.26 ', 'INMUNOGLOBULINA A [IG A] SEMIAUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(735, 'dd9eded0-b93b-11ee-b2bf-dd4e6def8019', '90.6.8.27 ', 'INMUNOGLOBULINA A [IG A] AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(736, 'dd9eece0-b93b-11ee-afc9-177a418ab131', '90.6.8.28', 'INMUNOGLOBULINA G [IG G] SEMIAUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(737, 'dd9ef7c0-b93b-11ee-9a57-c370790e07e1', '90.6.8.29 ', 'INMUNOGLOBULINA G [IG G] AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(738, 'dd9f0250-b93b-11ee-bce5-113f667f5ffe', '90.6.8.30 ', 'INMUNOGLOBULINA G [IG G] SUBCLASES 1 2 3 4 SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(739, 'dd9f0cd0-b93b-11ee-9094-2d273c7818f2', '90.6.8.31 ', 'INMUNOGLOBULINA M [IG M] SEMIAUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(740, 'dd9f1930-b93b-11ee-b821-456eba3b6382', '90.6.8.32', 'INMUNOGLOBULINA M [IG M] AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(741, 'dd9f26b0-b93b-11ee-a318-f7d0d222c169', '90.6.8.33 ', 'INMUNOGLOBULINA D [IG D] SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(742, 'dd9f33b0-b93b-11ee-a9bd-d9efb19747b4', '90.6.8.34 ', 'INMUNOGLOBULINA E [IG E] ESPECÍFICA (DOSIFICACIÓN CADA ALERGENO) SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(743, 'dd9f4180-b93b-11ee-b59a-d36e0005e0b4', '90.6.8.35  ', 'INMUNOGLOBULINA E [IG E] SEMIAUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(744, 'dd9f4c70-b93b-11ee-8d43-2782d23e7884', '90.6.8.36 ', 'INMUNOGLOBULINA E [IG E] AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(745, 'dd9f57c0-b93b-11ee-b8ac-fd1854457782', '90.6.8.37 ', 'INMUNOGLOBULINAS CADENAS LIVIANAS KAPPA Y LAMBDA SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(746, 'dd9f63c0-b93b-11ee-95ae-3ffbd16eefc6', '90.6.8.38 ', 'PLAQUETAS FACTOR 4 SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(747, 'dd9f6df0-b93b-11ee-8a88-175975e3d6fd', '90.6.8.39 ', 'RECEPTORES DE INTERLEUQUINA 2 CD25 POR INMUNOHISTOQUÍMICA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(748, 'dd9f77c0-b93b-11ee-bcdf-058d7b80b640', '90.6.8.41 ', 'PROCALCITONINA SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(749, 'dd9f8190-b93b-11ee-9417-1f8b18f90b9a', '90.6.8.42 ', 'INMUNOGLOBULINAS CADENAS LIVIANAS LIBRES KAPPA SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(750, 'dd9f8e10-b93b-11ee-a7b8-5f645f018af8', '90.6.8.43 ', 'INMUNOGLOBULINAS CADENAS LIVIANAS LIBRES LAMBDA SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(751, 'dd9f9820-b93b-11ee-8b21-f3e7166323ea', '90.6.8.44 ', 'DETERMINACIÓN DE LA EXPLOSIÓN RESPIRATORIA DE LOS GRANULOCITOS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(752, 'dd9fa200-b93b-11ee-9834-75bdff0b0376', '90.6.8.45 ', 'TOXOIDE DIFTÉRICO ANTICUERPOS IG G ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(753, 'dd9fac00-b93b-11ee-aa48-b1ee80477f67', '90.6.8.46 ', 'TOXOIDE TETÁNICO ANTICUERPOS IG G', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(754, 'dd9fb5f0-b93b-11ee-977b-93b9dfcaa384', '90.6.8.47 ', 'PROCALCITONINA MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(755, 'dd9fbfa0-b93b-11ee-9c08-09db6e8f907a', '90.6.8.48 ', 'INTERFERÓN GAMMA [GAMMAINTERFERÓN] ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(756, 'dd9fc950-b93b-11ee-8420-abaaea92d183', '90.6.8.50 ', 'PRESEPSINA SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(757, 'dd9fd320-b93b-11ee-abd8-35230b8980f6', '90.6.8.51 ', 'CALPROTECTINA SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(758, 'dd9fdcf0-b93b-11ee-ae42-bf324e8100e2', '90.6.8.55 ', 'TIROSINQUINASA SOLUBLE (SFLT1)', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(759, 'dd9fe6c0-b93b-11ee-a11c-53d56bc0294c', '90.6.9.01 ', 'AGLUTININAS AL FRÍO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(760, 'dd9ff090-b93b-11ee-af3b-bb55f0c6f109', '90.6.9.02 ', 'AGLUTININAS AL CALOR ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(761, 'dd9ffaa0-b93b-11ee-975f-ab1d7c0c61fb', '90.6.9.03 ', 'ANTICUERPOS HETEROFILOS MANUAL SEMIAUTOMATIZADO O AUTOMATIZADO', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(762, 'dda004c0-b93b-11ee-b3e7-d56e597ef5ac', '90.6.9.04 ', 'COMPLEMENTO HEMOLÍTICO AL 50% [CH 50] MANUAL O SEMIAUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(763, 'dda01470-b93b-11ee-92df-4ddd8fa73c26', '90.6.9.05 ', 'COMPLEMENTO SÉRICO C3 SEMIAUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(764, 'dda02600-b93b-11ee-8296-a54c729320e8', '90.6.9.06 ', 'COMPLEMENTO SÉRICO C3 AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(765, 'dda035a0-b93b-11ee-aa77-4b9ae186a7af', '90.6.9.07 ', 'COMPLEMENTO SÉRICO C4 SEMIAUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(766, 'dda043a0-b93b-11ee-acd0-7f5388c015ae', '90.6.9.08 ', 'COMPLEMENTO SÉRICO C4 AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(767, 'dda05080-b93b-11ee-aa29-5994b8356f25', '90.6.9.10 ', 'FACTOR REUMATOIDEO SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(768, 'dda05c60-b93b-11ee-a702-3d835fe0cd91', '90.6.9.11 ', 'FACTOR REUMATOIDEO MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(769, 'dda06860-b93b-11ee-909c-c3643261c345', '90.6.9.12 ', 'PREALBÚMINA SEMIAUTOMATIZADO O AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(770, 'dda07450-b93b-11ee-b504-7fcb3b45ed57', '90.6.9.13 ', 'PROTEÍNA C REACTIVA ALTA PRECISIÓN AUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(771, 'dda07ff0-b93b-11ee-a0fb-b9f2190db06b', '90.6.9.14 ', 'PROTEÍNA C REACTIVA MANUAL O SEMIAUTOMATIZADO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(772, 'dda08b20-b93b-11ee-b546-9f953ea64a81', '90.6.9.15 ', 'PRUEBA NO TREPONÉMICA MANUAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(773, 'dda096a0-b93b-11ee-bdca-1ffdb49323ed', '90.6.9.17 ', 'CRIOGLOBULINAS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(774, 'dda0a1c0-b93b-11ee-8d16-475c64d750b1', '90.7.0. ', 'PRUEBAS DE COPROLOGÍA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(775, 'dda0acb0-b93b-11ee-a0b1-39c3cef38255', '90.7.0.01 ', 'AZUCARES REDUCTORES EN HECES ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(776, 'dda0b7b0-b93b-11ee-9261-97e851168235', '90.7.0.02 ', 'COPROLÓGICO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(777, 'dda0c2e0-b93b-11ee-9a29-d129fe3cde18', '90.7.0.03 ', 'COPROLÓGICO POR CONCENTRACIÓN ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(778, 'dda0cdf0-b93b-11ee-8209-e71cff2120c6', '90.7.0.04 ', 'COPROSCÓPICO INCLUYE: PH, SANGRE OCULTA, AZÚCARES REDUCTORES, ACTIVIDAD DE TRIPSINA Y PARÁSITOS', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(779, 'dda0d8e0-b93b-11ee-939f-1fee32a35cee', '90.7.0.08 ', 'SANGRE OCULTA EN MATERIA FECAL [GUAYACO O EQUIVALENTE] ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(780, 'dda0e3f0-b93b-11ee-b48f-4bb335331412', '90.7.0.09 ', 'SANGRE OCULTA EN MATERIA FECAL (DETERMINACIÓN DE HEMOGLOBINA HUMANA ESPECÍFICA) ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(781, 'dda0ef20-b93b-11ee-95b5-47b3bef4f5b0', '90.7.0.10 ', 'UROBILINÓGENO EN MATERIA FECAL CUALITATIVO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(782, 'dda0fa40-b93b-11ee-8b31-af9668ead657', '90.7.0.11 ', 'UROBILINÓGENO EN MATERIA FECAL CUANTITATIVO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(783, 'dda10580-b93b-11ee-bebc-156966c4d4e1', '90.7.0.12 ', 'SANGRE OCULTA EN MATERIA FECAL [GUAYACO O EQUIVALENTE] SERIADO TRES MUESTRAS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(784, 'dda11100-b93b-11ee-ae41-1579b0a4e8c3', '90.7.0.13 ', 'COPROLÓGICO SERIADO TRES MUESTRAS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(785, 'dda11c40-b93b-11ee-b06c-c581ce601b71', '90.7.0.14 ', 'COPROSCÓPICO SERIADO TRES MUESTRAS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(786, 'dda12750-b93b-11ee-a42a-39545c429fbc', '90.7.1.01 ', 'AZUCARES REDUCTORES EN ORINA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(787, 'dda13340-b93b-11ee-95da-911934c46b7b', '90.7.1.06 ', 'UROANÁLISIS ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(788, 'dda13e90-b93b-11ee-bbce-574eebd6ecf0', '90.7.1.07 ', 'UROBILINÓGENO EN ORINA PARCIAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(789, 'dda14b00-b93b-11ee-af25-2133d62a4792', '90.7.1.08 ', 'GLÓBULOS ROJOS MORFOLOGÍA EN ORINA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(790, 'dda15a10-b93b-11ee-8779-0d4cc4d3d004', '90.8.3.21 ', 'GLUCOSA 6 FOSFATASA ACTIVIDAD ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(791, 'dda168c0-b93b-11ee-b3fa-9b969c825d3b', '90.8.3.22 ', 'GLUCOSA 6 FOSFATASA TRANSPORTADOR ACTIVIDAD ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(792, 'dda174e0-b93b-11ee-8986-035b6415e58f', '90.8.3.23 ', 'GLUCÓGENO CURVA DE ESTIMULACIÓN CON GLUCAGÓN (DETERMINACIÓN DE GLUCOSA Y ÁCIDO LÁCTICO) ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(793, 'dda180e0-b93b-11ee-a3c1-218e80503e0d', '90.8.8.01 ', 'VIRUS DE INMUNODEFICIENCIA HUMANA DETECCIÓN DEL PROVIRUS REACCIÓN EN CADENA DE LA POLIMERASA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(794, 'dda18d00-b93b-11ee-85b9-ed96cc049bcf', '90.8.8.02 ', 'VIRUS DE INMUNODEFICIENCIA HUMANA GENOTIPO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(795, 'dda198f0-b93b-11ee-a247-cd9f49bd7f3c', '90.8.8.03 ', 'HEPATITIS B GENOTIPO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(796, 'dda1a410-b93b-11ee-a9dc-098c02e3e9ca', '90.8.8.04 ', 'CITOMEGALOVIRUS GENOTIPO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(797, 'dda1b190-b93b-11ee-90f9-e909704faac3', '90.8.8.05 ', 'CITOMEGALOVIRUS CARGA VIRAL', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(798, 'dda1bc80-b93b-11ee-970f-3f3ee5534ee9', '90.8.8.06 ', 'HEPATITIS B CARGA VIRAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(799, 'dda1c8e0-b93b-11ee-877b-717858f0bf40', '90.8.8.07 ', 'HEPATITIS C CARGA VIRAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(800, 'dda1d340-b93b-11ee-b3ea-a97baf809fc1', '90.8.8.08 ', 'HERPES SIMPLEX CARGA VIRAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(801, 'dda1dd30-b93b-11ee-8555-510a7354d757', '90.8.8.09 ', 'BK POLIOMAVIRUS CARGA VIRAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(802, 'dda1e700-b93b-11ee-ae25-5d79ce9accfc', '90.8.8.10 ', 'JC POLIOMAVIRUS CARGA VIRAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(803, 'dda1f0c0-b93b-11ee-878d-e5efe1030824', '90.8.8.11 ', 'EPSTEIN-BARR CARGA VIRAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(804, 'dda1fae0-b93b-11ee-bcd3-17ddfc500fce', '90.8.8.12 ', 'ADENOVIRUS CARGA VIRAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(805, 'dda204c0-b93b-11ee-b45c-0798800ac8f8', '90.8.8.13 ', 'PARVOVIRUS CARGA VIRAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(806, 'dda20e50-b93b-11ee-8062-a3f0d7076e37', '90.8.8.14 ', 'CITOMEGALOVIRUS IDENTIFICACIÓN REACCIÓN EN CADENA DE LA POLIMERASA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(807, 'dda21810-b93b-11ee-8450-8783985bbfb8', '90.8.8.15 ', 'COXSACKIE A IDENTIFICACIÓN REACCIÓN EN CADENA DE LA POLIMERASA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(808, 'dda22250-b93b-11ee-bf04-a1e9e9bc9b15', '90.8.8.16 ', 'COXSACKIE B IDENTIFICACIÓN REACCIÓN EN CADENA DE LA POLIMERASA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(809, 'dda22c00-b93b-11ee-b975-65a9e003c1c3', '90.8.8.17 ', 'VIRUS DE INMUNODEFICIENCIA HUMANA 1 IDENTIFICACIÓN REACCIÓN EN CADENA DE LA POLIMERASA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(810, 'dda235a0-b93b-11ee-a02e-49617b474eec', '90.8.8.18 ', 'HEPATITIS B IDENTIFICACIÓN REACCIÓN EN CADENA DE LA POLIMERASA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(811, 'dda23fa0-b93b-11ee-b99c-e16e9ad94fff', '90.8.8.19 ', 'TOXOCARA SPP IDENTIFICACIÓN REACCIÓN EN CADENA DE LA POLIMERASA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(812, 'dda24a20-b93b-11ee-875c-33508f2a12d1', '90.8.8.20 ', 'TOXOPLASMA GONDII IDENTIFICACIÓN REACCIÓN EN CADENA DE LA POLIMERASA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(813, 'dda25460-b93b-11ee-afbd-dd8a1049c5ac', '90.8.8.21 ', 'VARICELA ZOSTER IDENTIFICACIÓN REACCIÓN EN CADENA DE LA POLIMERASA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(814, 'dda25e70-b93b-11ee-aed9-c7f1c661a870', '90.8.8.22 ', 'EPSTEIN BARR IDENTIFICACIÓN REACCIÓN EN CADENA DE LA POLIMERASA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(815, 'dda26830-b93b-11ee-bba4-6f64ba251430', '90.8.8.23 ', 'HEPATITIS C IDENTIFICACIÓN REACCIÓN EN CADENA DE LA POLIMERASA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(816, 'dda272d0-b93b-11ee-8ff2-f354fe49a8aa', '90.8.8.24 ', 'HERPES SIMPLEX I Y II IDENTIFICACIÓN REACCIÓN EN CADENA DE LA POLIMERASA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(817, 'dda27ca0-b93b-11ee-9b1f-2f6919cba9a4', '90.8.8.25 ', 'MYCOBACTERIUM TUBERCULOSIS IDENTIFICACIÓN REACCIÓN EN CADENA DE LA POLIMERASA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(818, 'dda286d0-b93b-11ee-8245-19af2da3a7c9', '90.8.8.26 ', 'MYCOBACTERIUM NO TUBERCULOSO IDENTIFICACIÓN REACCIÓN EN CADENA DE LA POLIMERASA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(819, 'dda29070-b93b-11ee-85a5-93652899975b', '90.8.8.27 ', 'MYCOBACTERIUM LEPRAE IDENTIFICACIÓN REACCIÓN EN CADENA DE LA POLIMERASA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(820, 'dda29ae0-b93b-11ee-96e8-85b061def0c5', '90.8.8.28 ', 'LEISHMANIA IDENTIFICACIÓN REACCIÓN EN CADENA DE LA POLIMERASA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(821, 'dda2a4d0-b93b-11ee-a5d7-8b5ed256d875', '90.8.8.32 ', 'VIRUS DE INMUNODEFICIENCIA HUMANA CARGA VIRAL ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(822, 'dda2af20-b93b-11ee-8aeb-0b1895303106', '90.8.8.33 ', 'HEPATITIS C GENOTIPO ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(823, 'dda2b920-b93b-11ee-a190-6bf0ef89ca15', '90.8.8.34 ', 'CLOSTRIDIUM DIFFICILE IDENTIFICACIÓN REACCIÓN EN CADENA DE LA POLIMERASA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(824, 'dda2c300-b93b-11ee-9133-5b5ea3fa13d1', '90.8.8.35  ', 'STREPTOCOCCUS PNEUMONIAE IDENTIFICACIÓN REACCIÓN EN CADENA DE LA POLIMERASA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(825, 'dda2ccb0-b93b-11ee-96a2-0f98211a585c', '90.8.8.36 ', 'BORDETELLA PERTUSSIS IDENTIFICACIÓN REACCIÓN EN CADENA DE LA POLIMERASA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(826, 'dda2d6c0-b93b-11ee-b19d-c9152efe8097', '90.8.8.37 ', 'BORDETELLA PARAPERTUSSIS IDENTIFICACIÓN REACCIÓN EN CADENA DE LA POLIMERASA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(827, 'dda2e120-b93b-11ee-b885-45dab0f63f71', '90.8.8.39 ', 'HAEMOPHILUS INFLUENZAE IDENTIFICACIÓN REACCIÓN EN CADENA DE LA POLIMERASA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(828, 'dda2eb60-b93b-11ee-a9dd-41eb78c0b927', '90.8.8.40', 'NEISSERIA MENINGITIDIS IDENTIFICACIÓN REACCIÓN EN CADENA DE LA POLIMERASA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(829, 'dda2f570-b93b-11ee-b857-0d63e17aa5e1', '90.8.8.41 ', 'HEPATITIS E IDENTIFICACIÓN REACCIÓN EN CADENA DE LA POLIMERASA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(830, 'dda2ff30-b93b-11ee-9430-53acedef88be', '90.8.8.43 ', 'SARAMPIÓN IDENTIFICACIÓN REACCIÓN EN CADENA DE LA POLIMERASA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(831, 'dda30930-b93b-11ee-be50-1f4bb684eeea', '90.8.8.46 ', 'MYCOBACTERIUM TUBERCULOSIS PRUEBAS DE SENSIBILIDAD POR REACCIÓN EN CADENA DE LA POLIMERASA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(832, 'dda31300-b93b-11ee-8c93-2f3123af6005', '90.8.8.47 ', 'ADENOVIRUS IDENTIFICACIÓN REACCIÓN EN CADENA DE LA POLIMERASA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(833, 'dda31cc0-b93b-11ee-b3a4-3960a9c7e381', '90.8.8.48 ', 'HISTOPLASMA IDENTIFICACIÓN REACCIÓN EN CADENA DE LA POLIMERASA', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(834, 'dda32660-b93b-11ee-87c8-d1deef3e9f35', '90.8.8.49 ', 'CHLAMYDIA IDENTIFICACIÓN REACCIÓN EN CADENA DE LA POLIMERASA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(835, 'dda33040-b93b-11ee-b9e3-b9e50bd71ce4', '90.8.8.50 ', 'NEISSERIA GONORRHOEAE IDENTIFICACIÓN REACCIÓN EN CADENA DE LA POLIMERASA ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(836, 'dda339d0-b93b-11ee-8f13-4168cdb6bf31', '90.8.8.55', 'IDENTIFICACIÓN DE OTRA BACTERIA (ESPECÍFICA) POR PRUEBAS MOLECULARES ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(837, 'dda343c0-b93b-11ee-89f4-337c7ef0896d', '90.8.8.56 ', 'IDENTIFICACIÓN DE OTRO VIRUS (ESPECÍFICA) POR PRUEBAS MOLECULARES ', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(838, 'dda35250-b93b-11ee-aec8-b7b453270777', '90.8.8.57 ', 'IDENTIFICACIÓN DE OTRO PARÁSITO (ESPECÍFICO) POR PRUEBAS MOLECULARES', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(839, 'dda360e0-b93b-11ee-bf87-49d4c629eb52', '90.8.8.58 ', 'IDENTIFICACIÓN DE OTRO HONGO (ESPECÍFICO) POR PRUEBAS MOLECULARES', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26'),
(840, 'dda36e40-b93b-11ee-a59b-73c1beb0b2ed', '90.8.8.59 ', 'IDENTIFICACIÓN SIMULTÁNEA DE MÚLTIPLES PATÓGENOS POR PRUEBAS MOLECULARES', 'active', '2024-01-22 20:35:26', '2024-01-22 20:35:26');

-- --------------------------------------------------------

--
-- Table structure for table `locks`
--

CREATE TABLE `locks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `date_init` varchar(191) DEFAULT NULL,
  `date_end` varchar(191) DEFAULT NULL,
  `time_init` varchar(191) DEFAULT NULL,
  `time_end` varchar(191) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locks`
--

INSERT INTO `locks` (`id`, `uuid`, `user`, `company`, `date_init`, `date_end`, `time_init`, `time_end`, `reason`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, '7e3d59a0-620d-11ee-ad4e-5b32b35b3fce', 6, 1, '2023-10-04', '2023-10-09', '08:00', '17:00', 'viaje por circusntanacias familiares', 'se coordino con el dr x', 'active', '2023-10-03 21:54:18', '2023-10-03 21:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `logmails`
--

CREATE TABLE `logmails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `campus` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `tpl_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `is_whatsapp` varchar(191) NOT NULL DEFAULT 'no',
  `is_email_text` varchar(191) NOT NULL DEFAULT 'no',
  `is_marketing` varchar(191) NOT NULL DEFAULT 'no',
  `is_sms` varchar(191) NOT NULL DEFAULT 'no',
  `subject` text DEFAULT NULL,
  `msj` text DEFAULT NULL,
  `is_attach` varchar(191) NOT NULL DEFAULT 'no',
  `is_programmed` varchar(191) NOT NULL DEFAULT 'no',
  `date_programmed` varchar(191) DEFAULT NULL,
  `is_diagnostic` varchar(191) NOT NULL DEFAULT 'no',
  `diagnostic` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `name_event` varchar(191) DEFAULT NULL,
  `sel_users` varchar(191) NOT NULL DEFAULT 'Todos',
  `sel_gender` varchar(191) NOT NULL DEFAULT 'Todos',
  `state` varchar(191) NOT NULL DEFAULT 'Enviado',
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logmails`
--

INSERT INTO `logmails` (`id`, `uuid`, `user`, `user_id`, `company`, `campus`, `tpl_id`, `is_whatsapp`, `is_email_text`, `is_marketing`, `is_sms`, `subject`, `msj`, `is_attach`, `is_programmed`, `date_programmed`, `is_diagnostic`, `diagnostic`, `name_event`, `sel_users`, `sel_gender`, `state`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dfa1ae80-61e9-11ee-91c9-75b50eeb1518', 0, 2, 1, 0, 1, 'no', 'no', 'si', 'no', 'SALUDO', '<h1>Descubre Nuestros Servicios Dermatológicos y Cuidados de la Piel</h1><p>Estimado/a [Nombre del Cliente],</p><p>En [Nombre de la Clínica Dermatológica], nos complace ofrecerte una amplia gama de servicios especializados para el cuidado de tu piel y mantenerla en óptimas condiciones. Descubre a continuación algunos de nuestros servicios destacados:</p><ul>            <li>Consulta dermatológica personalizada</li><li>Tratamientos de rejuvenecimiento facial</li><li>Terapias para el acné y manchas en la piel</li><!-- Agrega más servicios aquí --></ul><p>No dudes en contactarnos para obtener más información o agendar tu próxima cita. ¡Estamos aquí para cuidar de tu piel y brindarte el mejor servicio!</p><p>¡Esperamos verte pronto en [Nombre de la Clínica Dermatológica]!</p><p>Atentamente,</p><p>Equipo de [Nombre de la Clínica Dermatológica]</p><div class=\"container\"><a href=\"[Enlace a tu Sitio Web]\" class=\"button\">Explora Nuestros Servicios</a></div>', 'no', 'no', '2023-10-03', 'no', 0, 'CONFERENCIA', 'Pacientes', 'Masculino', 'Enviado', 'active', '2023-10-03 17:39:20', '2023-10-03 17:39:20'),
(2, '68b9c550-863c-11ee-bf51-1be43af11fa8', 0, 2, 1, 0, 2, 'no', 'no', 'si', 'no', 'atencion en salud', '<p>Hola querido paciente envio informacion</p>', 'no', 'no', '2023-11-18', 'si', 1, 'saludos', 'Administradores', 'Todos', 'Enviado', 'active', '2023-11-18 23:00:50', '2023-11-18 23:00:50'),
(3, '1456c7f0-9f45-11ee-ab70-2dd11d40b9d0', 0, 8, 1, 0, 1, 'no', 'no', 'si', 'no', 'x asunto', '<h1>Descubre Nuestros Servicios Dermatológicos y Cuidados de la Piel</h1><p>Estimado/a [Nombre del Cliente],</p><p>En [Nombre de la Clínica Dermatológica], nos complace ofrecerte una amplia gama de servicios especializados para el cuidado de tu piel y mantenerla en óptimas condiciones. Descubre a continuación algunos de nuestros servicios destacados:</p><ul>            <li>Consulta dermatológica personalizada</li><li>Tratamientos de rejuvenecimiento facial</li><li>Terapias para el acné y manchas en la piel</li><!-- Agrega más servicios aquí --></ul><p>No dudes en contactarnos para obtener más información o agendar tu próxima cita. ¡Estamos aquí para cuidar de tu piel y brindarte el mejor servicio!</p><p>¡Esperamos verte pronto en [Nombre de la Clínica Dermatológica]!</p><p>Atentamente,</p><p>Equipo de [Nombre de la Clínica Dermatológica]</p><div class=\"container\"><a href=\"[Enlace a tu Sitio Web]\" class=\"button\">Explora Nuestros Servicios</a></div>', 'no', 'no', '2023-12-20', 'si', 1, 'xxxx', 'Pacientes', 'Masculino', 'Enviado', 'active', '2023-12-20 19:35:53', '2023-12-20 19:35:53'),
(4, 'cc445400-9f45-11ee-a926-c1716eb23d09', 0, 2, 1, 0, 1, 'no', 'no', 'si', 'no', 'x asunto', '<h1>Descubre Nuestros Servicios Dermatológicos y Cuidados de la Piel</h1><p>Estimado/a [Nombre del Cliente],</p><p>En [Nombre de la Clínica Dermatológica], nos complace ofrecerte una amplia gama de servicios especializados para el cuidado de tu piel y mantenerla en óptimas condiciones. Descubre a continuación algunos de nuestros servicios destacados:</p><ul>            <li>Consulta dermatológica personalizada</li><li>Tratamientos de rejuvenecimiento facial</li><li>Terapias para el acné y manchas en la piel</li><!-- Agrega más servicios aquí --></ul><p>No dudes en contactarnos para obtener más información o agendar tu próxima cita. ¡Estamos aquí para cuidar de tu piel y brindarte el mejor servicio!</p><p>¡Esperamos verte pronto en [Nombre de la Clínica Dermatológica]!</p><p>Atentamente,</p><p>Equipo de [Nombre de la Clínica Dermatológica]</p><div class=\"container\"><a href=\"[Enlace a tu Sitio Web]\" class=\"button\">Explora Nuestros Servicios</a></div>', 'no', 'no', '2023-12-20', 'si', 4, 'x eventoi', 'Pacientes', 'Todos', 'Enviado', 'active', '2023-12-20 19:41:02', '2023-12-20 19:41:02');

-- --------------------------------------------------------

--
-- Table structure for table `mattachs`
--

CREATE TABLE `mattachs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `mail_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `path_attach` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicalp`
--

CREATE TABLE `medicalp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `doctor` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `campus` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `validity` int(11) NOT NULL DEFAULT 1,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicalp`
--

INSERT INTO `medicalp` (`id`, `uuid`, `doctor`, `user`, `company`, `campus`, `validity`, `status`, `created_at`, `updated_at`) VALUES
(1, '40731c40-61ef-11ee-9114-334b8b31c7c5', 2, 2, 1, 1, 3, 'active', '2023-10-03 18:17:50', '2023-10-03 18:17:50'),
(2, 'ef423370-afc4-11ee-9427-533e3ef631ed', 2, 8, 1, 1, 1, 'active', '2024-01-10 19:31:25', '2024-01-10 19:31:25'),
(3, '428df860-afc6-11ee-9d31-f90c76d1cae8', 6, 8, 1, 1, 2, 'active', '2024-01-10 19:40:55', '2024-01-10 19:40:55'),
(4, '067a2c70-d01a-11ee-9e4a-13e2de438d72', 2, 8, 1, 1, 1, 'active', '2024-02-20 23:01:09', '2024-02-20 23:01:09');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `uuid`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, '7348de10-baca-11ee-8bdb-7d20c44e531f', 'Códig', 'Descripcion', 'deleted', '2024-01-24 20:08:37', '2024-01-24 20:08:50'),
(2, '7348f980-baca-11ee-bd6f-2bae5e78c204', 'X000', 'Betametasona', 'active', '2024-01-24 20:08:37', '2024-01-24 20:08:37'),
(3, '73490520-baca-11ee-b90c-77f84dc4efeb', 'Y000', 'Hidroquinona', 'active', '2024-01-24 20:08:37', '2024-01-24 20:08:37'),
(4, '73490f40-baca-11ee-b997-01c86187b601', 'Z000', 'Isotretinoín', 'active', '2024-01-24 20:08:37', '2024-01-24 20:08:37'),
(5, '73491910-baca-11ee-9052-21bc5dd2f5ea', 'W000', 'Tretinoín', 'active', '2024-01-24 20:08:37', '2024-01-24 20:08:37'),
(6, '734922a0-baca-11ee-8412-d3fe1fbb8e13', 'V000', 'Clindamicina', 'active', '2024-01-24 20:08:37', '2024-01-24 20:08:37'),
(7, '73492ca0-baca-11ee-b0f5-bf8309a3be65', 'U000', 'Metronidazol', 'active', '2024-01-24 20:08:37', '2024-01-24 20:08:37'),
(8, '73493620-baca-11ee-8182-3319a42d969f', 'T000', '�cido salic�lico', 'active', '2024-01-24 20:08:37', '2024-01-24 20:08:37'),
(9, '73493fc0-baca-11ee-b228-2b1304577081', 'S000', 'Ciclosporina', 'active', '2024-01-24 20:08:37', '2024-01-24 20:08:37'),
(10, '73494940-baca-11ee-b6e1-612494ae904c', 'R000', 'Acitretina', 'active', '2024-01-24 20:08:37', '2024-01-24 20:08:37'),
(11, '734952e0-baca-11ee-b3db-e720668d5781', 'Q000', 'Tacrolimú', 'active', '2024-01-24 20:08:37', '2024-01-24 20:08:37'),
(12, '73495f10-baca-11ee-8766-23b5de0bd640', 'P000', 'Pimecrolimú', 'active', '2024-01-24 20:08:37', '2024-01-24 20:08:37'),
(13, '73496e80-baca-11ee-8bf2-7b9dd360a777', 'O000', 'Adalimumab', 'active', '2024-01-24 20:08:37', '2024-01-24 20:08:37'),
(14, '73497980-baca-11ee-9530-ab0e393dce4d', 'N000', 'Infliximab', 'active', '2024-01-24 20:08:37', '2024-01-24 20:08:37'),
(15, '73498520-baca-11ee-8e1c-c199c32e1a67', 'M000', 'Minoxidil', 'active', '2024-01-24 20:08:37', '2024-01-24 20:08:37'),
(16, '73498f00-baca-11ee-b3eb-d99d220f38cb', 'L000', 'Permetrina', 'active', '2024-01-24 20:08:37', '2024-01-24 20:08:37'),
(17, '734998b0-baca-11ee-a922-35aefaf43708', 'K000', 'Aciclovir', 'active', '2024-01-24 20:08:37', '2024-01-24 20:08:37'),
(18, '7349a330-baca-11ee-9428-c7746d477847', 'J000', 'Hidrocortisona', 'active', '2024-01-24 20:08:37', '2024-01-24 20:08:37'),
(19, '7349ace0-baca-11ee-ba26-3d5ae0782320', 'I000', 'Ketoconazol', 'active', '2024-01-24 20:08:37', '2024-01-24 20:08:37'),
(20, '7349b710-baca-11ee-8e54-c5047914d7cd', 'H000', 'Terbinafina', 'active', '2024-01-24 20:08:37', '2024-01-24 20:08:37'),
(21, '7349c0a0-baca-11ee-9dc9-1b3febcef1e2', 'G000', 'Clobetasol', 'active', '2024-01-24 20:08:37', '2024-01-24 20:08:37'),
(22, '7349cad0-baca-11ee-a881-85ac36995ba6', 'F000', 'Dipropionato de betametasona', 'active', '2024-01-24 20:08:37', '2024-01-24 20:08:37'),
(23, '7349d490-baca-11ee-927d-9fcc74b40ff0', 'E000', 'Alquitrán de hull', 'active', '2024-01-24 20:08:37', '2024-01-24 20:08:37'),
(24, '7349de40-baca-11ee-96ee-a19d509feaee', 'D000', '�cido azelaico', 'active', '2024-01-24 20:08:37', '2024-01-24 20:08:37'),
(25, '7349e800-baca-11ee-9064-ff22be900bcb', 'C000', 'Dapsona', 'active', '2024-01-24 20:08:37', '2024-01-24 20:08:37'),
(26, '7349f220-baca-11ee-aad6-f70186c4e8c7', 'B000', 'Ivermectina', 'active', '2024-01-24 20:08:37', '2024-01-24 20:08:37'),
(27, '7349fc70-baca-11ee-afb0-65996ef67c15', 'A000', 'Bacitracina', 'active', '2024-01-24 20:08:37', '2024-01-24 20:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_05_03_000001_create_customer_columns', 1),
(4, '2019_05_03_000002_create_subscriptions_table', 1),
(5, '2019_05_03_000003_create_subscription_items_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2022_01_30_043703_plans', 1),
(8, '2022_02_01_013551_roles', 1),
(9, '2022_02_01_013603_permissions', 1),
(10, '2022_02_01_014445_roles_permissions', 1),
(11, '2022_02_24_155502_faqs', 1),
(12, '2022_06_08_162336_create_settings_table', 1),
(13, '2022_07_05_125738_create_notifications_table', 1),
(14, '2022_07_07_031833_create_categories_table', 1),
(15, '2022_07_07_033919_create_payments_table', 1),
(16, '2022_07_21_122929_create_recovery_table', 1),
(17, '2022_08_20_011051_create_ticket_table', 1),
(18, '2022_08_20_011108_create_ticketmsj_table', 1),
(19, '2022_09_20_144334_create_twofa_table', 1),
(20, '2022_12_20_163739_create_thematic_table', 1),
(21, '2023_01_25_133641_create_companies_table', 1),
(22, '2023_01_25_142051_create_charges_table', 1),
(23, '2023_01_25_142158_create_headquarters_table', 1),
(24, '2023_01_25_142235_create_specialties_table', 1),
(25, '2023_01_25_142344_create_diagnoses_table', 1),
(26, '2023_01_25_142436_create_diagnosestype_table', 1),
(27, '2023_01_25_142553_create_habeas_table', 1),
(28, '2023_01_25_142946_create_consents_table', 1),
(29, '2023_01_25_143116_create_laboratoryexams_table', 1),
(30, '2023_01_25_143204_create_medicines_table', 1),
(31, '2023_02_08_032744_create_indications_table', 1),
(32, '2023_02_08_033529_create_checklistsecurity_table', 1),
(33, '2023_02_08_035150_create_pathologies_table', 1),
(34, '2023_02_24_210658_create_orders_table', 1),
(35, '2023_03_27_152919_create_subcategories_table', 1),
(36, '2023_03_27_161631_create_products_table', 1),
(37, '2023_03_27_161652_create_services_table', 1),
(38, '2023_04_12_165335_create_querytypes_table', 1),
(39, '2023_04_22_152658_create_vitalsigns_table', 1),
(40, '2023_04_22_152944_create_photographic_table', 1),
(41, '2023_05_02_143201_create_dermatology_table', 1),
(42, '2023_05_03_213104_create_prescriptions_table', 1),
(43, '2023_05_04_143418_create_procedures_table', 1),
(44, '2023_05_04_155027_create_hcdermdiagnostics_table', 1),
(45, '2023_05_04_160320_create_hcdermindications_table', 1),
(46, '2023_05_04_162522_create_hcdermsolexams_table', 1),
(47, '2023_05_04_162527_create_hcdermsolproc_table', 1),
(48, '2023_05_04_162532_create_hcdermsolpath_table', 1),
(49, '2023_07_11_154726_create_hcprocedure_table', 1),
(50, '2023_07_14_050618_create_hcsuture_table', 1),
(51, '2023_07_20_035614_create_hccrypy_table', 1),
(52, '2023_07_20_040051_create_hclesion_table', 1),
(53, '2023_07_21_170555_create_hcaesthetic_table', 1),
(54, '2023_07_22_160942_create_hctreatment_table', 1),
(55, '2023_07_23_023116_create_hcsurgical_table', 1),
(56, '2023_07_23_023127_create_hctumors_table', 1),
(57, '2023_07_23_043457_create_hcconsent_table', 1),
(58, '2023_07_24_035538_create_hcchecklist_table', 1),
(59, '2023_07_24_040631_create_hcclitem_table', 1),
(60, '2023_07_24_163903_create_mprescriptions_table', 1),
(61, '2023_07_24_164220_create_medicalp_table', 1),
(62, '2023_07_25_134748_create_examorders_table', 1),
(63, '2023_07_25_163454_create_eodiagnostics_table', 1),
(64, '2023_07_25_163501_create_eoexams_table', 1),
(65, '2023_07_26_025104_create_prods_table', 1),
(66, '2023_07_26_025112_create_prodsitem_table', 1),
(67, '2023_07_26_041009_create_pths_table', 1),
(68, '2023_07_26_041016_create_pthsitem_table', 1),
(69, '2023_07_26_130333_create_trainings_table', 1),
(70, '2023_07_28_054259_create_sliders_table', 1),
(71, '2023_07_30_045312_create_trainingsroles_table', 1),
(72, '2023_07_30_045336_create_trainingsusers_table', 1),
(73, '2023_08_02_132949_create_quotes_table', 1),
(74, '2023_08_10_160321_create_quotesproducts_table', 1),
(75, '2023_08_10_160338_create_quotesservices_table', 1),
(76, '2023_08_24_170434_create_logmails_table', 1),
(77, '2023_08_24_170446_create_mattachs_table', 1),
(78, '2023_08_24_170459_create_tplmails_table', 1),
(79, '2023_08_24_170616_create_usermails_table', 1),
(80, '2023_09_23_135509_create_appointments_table', 1),
(81, '2023_09_23_142713_create_diary_table', 1),
(82, '2023_09_23_145224_create_locks_table', 1),
(83, '2023_09_25_133755_create_diaryprocedures_table', 1),
(84, '2023_09_27_134456_create_solicitude_table', 1),
(85, '2023_09_27_140925_create_diaryqt_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mprescriptions`
--

CREATE TABLE `mprescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `mp` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `medicine` text DEFAULT NULL,
  `dose` varchar(191) DEFAULT NULL,
  `frequency` varchar(191) DEFAULT NULL,
  `route_administration` varchar(191) DEFAULT NULL,
  `duration` varchar(191) DEFAULT NULL,
  `indications` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mprescriptions`
--

INSERT INTO `mprescriptions` (`id`, `uuid`, `mp`, `medicine`, `dose`, `frequency`, `route_administration`, `duration`, `indications`, `status`, `created_at`, `updated_at`) VALUES
(1, '4075afc0-61ef-11ee-930b-2f1a7d78ff86', 1, 'X000 - Betametasona', '1', 'c/8 horas', 'Topico', '10', 'aplicar en zona', 'active', '2023-10-03 18:17:50', '2023-10-03 18:17:50'),
(2, '4075c6b0-61ef-11ee-aa3c-17b01ada0ad8', 1, 'Y000 - Hidroquinona', '2', 'C/12 horas', 'Topico', '10', 'aplicar', 'active', '2023-10-03 18:17:50', '2023-10-03 18:17:50'),
(3, 'ef4466c0-afc4-11ee-896f-53328f64de52', 2, 'U000 - Metronidazol', '10', '1 cada 12 horas', 'Oral', '30', 'tomar con abundante agua', 'active', '2024-01-10 19:31:25', '2024-01-10 19:31:25'),
(4, '428e2b50-afc6-11ee-b765-89abe8abf61e', 3, 'S000 - Ciclosporina', '1', '1 al dia', 'Oral', '1', 'ninguna', 'active', '2024-01-10 19:40:55', '2024-01-10 19:40:55'),
(5, '067a78f0-d01a-11ee-a7bc-876a7ab7a614', 4, 'X000 - Betametasona', '10', '2', 'Topico', '2', 'bgfg', 'active', '2024-02-20 23:01:09', '2024-02-20 23:01:09');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(191) DEFAULT NULL,
  `body` varchar(191) DEFAULT NULL,
  `icon` varchar(191) NOT NULL DEFAULT 'assets/media/icons/map001.svg',
  `color` varchar(191) NOT NULL DEFAULT 'primary',
  `badge` varchar(191) DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'Nuevo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `plan` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `amount` double(18,2) NOT NULL DEFAULT 0.00,
  `status` varchar(191) NOT NULL DEFAULT 'Pendiente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `uuid`, `plan`, `company`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'fad2d1b0-607b-11ee-a4eb-53b871119948', 1, 1, 300000.00, 'Completado', '2023-10-01 22:00:10', '2023-10-01 22:06:28'),
(2, '5fb346c0-b615-11ee-a685-19216597753a', 3, 4, 20000.00, 'Completado', '2024-01-18 20:22:21', '2024-01-18 20:30:51');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pathologies`
--

CREATE TABLE `pathologies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pathologies`
--

INSERT INTO `pathologies` (`id`, `uuid`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, '01c6e630-6077-11ee-b182-5bbbe78557d7', 'X100', 'ESTUDIO HISTOPATOLOGICO', 'active', '2023-10-01 21:24:34', '2024-01-24 20:23:29'),
(2, '0cb253e0-6077-11ee-8cb3-7b9191794ec2', 'Y100', 'Inmunohistoquímica', 'deleted', '2023-10-01 21:24:52', '2024-01-24 20:23:51'),
(3, '3b2a7bc0-6077-11ee-a92d-b7bcece0ed22', 'Z100', 'Biopsia por Congelación', 'deleted', '2023-10-01 21:26:10', '2024-01-24 20:19:40'),
(4, '44d2d770-6077-11ee-b6e5-df88a34f78c5', 'W100', 'Citología', 'deleted', '2023-10-01 21:26:26', '2024-01-24 20:19:33'),
(5, '7e89e970-6077-11ee-b265-93745c161f68', 'V100', 'Cultivo y Sensibilidad', 'deleted', '2023-10-01 21:28:03', '2024-01-24 20:19:25'),
(6, '8bdadae0-6077-11ee-806a-6bafadf3f397', 'U100', 'Biopsia por Punción', 'deleted', '2023-10-01 21:28:25', '2024-01-24 20:19:18'),
(7, 'c3bc6af0-6077-11ee-8f39-fd696cfc1c73', 'T100', 'Microscopía de Fluorescencia', 'deleted', '2023-10-01 21:29:59', '2024-01-24 20:19:12'),
(8, 'cf2d3940-6077-11ee-9c6e-dbc64282060d', 'S100', 'Biopsia por Láser', 'deleted', '2023-10-01 21:30:18', '2024-01-24 20:19:05'),
(9, 'dc4568a0-6077-11ee-9f64-ed3890dc0660', 'R100', 'Biopsia de Piel Completa', 'deleted', '2023-10-01 21:30:40', '2024-01-24 20:18:59'),
(10, '39897660-6078-11ee-84ef-53ab507c4892', 'Q100', 'Biopsia de Líquido Ampollar', 'deleted', '2023-10-01 21:33:17', '2024-01-24 20:18:54'),
(11, '49e28140-6078-11ee-aa13-8500a23036f9', 'P100', 'Biopsia de Tejido Subcutáneo', 'deleted', '2023-10-01 21:33:44', '2024-01-24 20:18:49'),
(12, '551e77a0-6078-11ee-aedd-1fc41a89dad1', 'O100', 'Biopsia de Ganglio Linfático', 'deleted', '2023-10-01 21:34:03', '2024-01-24 20:18:42'),
(13, '70c34990-bacc-11ee-882b-f9ec01638f6b', '1001', 'BIOPSIA MAS ESTUDIO HISTOPATOLOGICO', 'active', '2024-01-24 20:22:52', '2024-01-24 20:22:52');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `plan` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `invoice` varchar(191) DEFAULT NULL,
  `amount` double(18,2) NOT NULL DEFAULT 0.00,
  `type_pay` varchar(191) NOT NULL DEFAULT 'Plan',
  `currency` varchar(191) DEFAULT NULL,
  `response` varchar(191) DEFAULT NULL,
  `franchise` varchar(191) DEFAULT NULL,
  `date_init` varchar(191) DEFAULT NULL,
  `expiration` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `uuid`, `user`, `plan`, `company`, `invoice`, `amount`, `type_pay`, `currency`, `response`, `franchise`, `date_init`, `expiration`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dc48e160-607c-11ee-a6a9-9dfae3b0b8bb', 2, 1, 1, 'kuuonBYkKoTm6JTLM', 300000.00, 'Plan', 'COP', 'Aceptada', 'VS', '2023-10-01', '2024-01-01', '05bb8b22cc1395532a8f9b26', 'active', '2023-10-01 22:06:28', '2023-10-01 22:06:28'),
(2, '2ee37be0-b233-11ee-82b0-9798afeb0d6c', 2, 2, 1, 'iSXquTb2626C6fRXT', 10000.00, 'Plan', 'COP', 'Aceptada', 'VS', '2024-01-13', '2024-02-13', 'c5a40e47ea9a73a7d4a98935', 'active', '2024-01-13 21:45:39', '2024-01-13 21:45:39'),
(3, 'd3b22040-b55c-11ee-831d-91e7e93011a0', 11, 3, 3, 'v39ZZcDM3Ey3kTzcv', 20000.00, 'Plan', 'COP', 'Aceptada', 'VS', '2024-01-17', '2024-02-17', '498e37a939f01b84f5218098', 'active', '2024-01-17 22:21:18', '2024-01-17 22:21:18'),
(4, '8fc47aa0-b616-11ee-8342-058bfc0ced41', 12, 3, 4, 'vkxmb9CnBhRBcxA4d', 20000.00, 'Plan', 'COP', 'Aceptada', 'VS', '2024-01-18', '2024-02-18', '383c54d0103f024cb137fef5', 'active', '2024-01-18 20:30:51', '2024-01-18 20:30:51');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `group` varchar(191) NOT NULL,
  `tag` varchar(191) NOT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photographic`
--

CREATE TABLE `photographic` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `campus` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `photo` text DEFAULT NULL,
  `photo_pp` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photographic`
--

INSERT INTO `photographic` (`id`, `uuid`, `user`, `company`, `campus`, `photo`, `photo_pp`, `status`, `created_at`, `updated_at`) VALUES
(1, '13279020-6207-11ee-8caa-6f473afdebd5', 8, 1, 1, 'https://dermasoft.fullstackcolombia.com/storage/uploads/kXbkpsxQzNu2862RbFD2EcOsMJwhM3l3bJdoIfTg.jpg', 'storage/uploads/kXbkpsxQzNu2862RbFD2EcOsMJwhM3l3bJdoIfTg.jpg', 'active', '2023-10-03 21:08:22', '2023-10-03 21:08:22'),
(2, '299be6b0-6207-11ee-bfce-31ac369b719a', 8, 1, 1, 'https://dermasoft.fullstackcolombia.com/storage/uploads/ubysVxAOdBtDsVrUMzQekLvlMyLHDrWizBRMtdCA.jpg', 'storage/uploads/ubysVxAOdBtDsVrUMzQekLvlMyLHDrWizBRMtdCA.jpg', 'active', '2023-10-03 21:08:59', '2023-10-03 21:08:59'),
(3, '2a086e10-6207-11ee-8858-67d800e659b4', 8, 1, 1, 'https://dermasoft.fullstackcolombia.com/storage/uploads/5yyQQ4JNRH16GkxscDPp6VLkGslspW4zdTiETYVn.jpg', 'storage/uploads/5yyQQ4JNRH16GkxscDPp6VLkGslspW4zdTiETYVn.jpg', 'active', '2023-10-03 21:09:00', '2023-10-03 21:09:00'),
(4, '212f1db0-ba0b-11ee-a5f4-67430c1b5706', 13, 3, 3, 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/N5dwV2OKNfQ99glVsg7v9EadyYQ0Mn6DDUqK5LM9.jpg', 'storage/uploads/N5dwV2OKNfQ99glVsg7v9EadyYQ0Mn6DDUqK5LM9.jpg', 'active', '2024-01-23 21:19:05', '2024-01-23 21:19:05'),
(5, '413b86a0-ba0b-11ee-9f7e-5bf44862a510', 13, 3, 3, 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/y0jTSBlZF0zfjr3O8X8QJ1RxpOes582E8tlPYedN.jpg', 'storage/uploads/y0jTSBlZF0zfjr3O8X8QJ1RxpOes582E8tlPYedN.jpg', 'active', '2024-01-23 21:19:59', '2024-01-23 21:19:59');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `subtitle` varchar(191) DEFAULT NULL,
  `price` double(18,2) NOT NULL DEFAULT 0.00,
  `month` int(11) NOT NULL DEFAULT 1,
  `photo` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `days` int(11) NOT NULL DEFAULT 1,
  `allowed_patients` int(11) NOT NULL DEFAULT 0,
  `storage_capacity` int(11) NOT NULL DEFAULT 0,
  `users_admin` int(11) NOT NULL DEFAULT 0,
  `voice_transcription` varchar(191) NOT NULL DEFAULT 'no',
  `allowed_logo` varchar(191) NOT NULL DEFAULT 'no',
  `venues` int(11) NOT NULL DEFAULT 0,
  `users_medical` int(11) NOT NULL DEFAULT 0,
  `allowed_medical_prescription` varchar(191) NOT NULL DEFAULT 'no',
  `allow_generate_consent` varchar(191) NOT NULL DEFAULT 'no',
  `allow_whatsapp` varchar(191) NOT NULL DEFAULT 'no',
  `allow_mini_text` varchar(191) NOT NULL DEFAULT 'no',
  `allow_whatsapp_reminder` varchar(191) NOT NULL DEFAULT 'no',
  `mini_text` int(11) NOT NULL DEFAULT 0,
  `allow_special_messages` varchar(191) NOT NULL DEFAULT 'no',
  `allow_special_whatsapp` varchar(191) NOT NULL DEFAULT 'no',
  `allow_patient_quotes` varchar(191) NOT NULL DEFAULT 'no',
  `allowed_medical_whatsapp` varchar(191) NOT NULL DEFAULT 'no',
  `allowed_scheduling_web` varchar(191) NOT NULL DEFAULT 'no',
  `allowed_email_quotes` varchar(191) NOT NULL DEFAULT 'no',
  `allowed_emailing` varchar(191) NOT NULL DEFAULT 'no',
  `allowed_inventories_billing` varchar(191) NOT NULL DEFAULT 'no',
  `allowed_payments` varchar(191) NOT NULL DEFAULT 'no',
  `allow_hours` int(11) NOT NULL DEFAULT 0,
  `price_storage_capacity` double(18,2) NOT NULL DEFAULT 0.00,
  `price_users_admin` double(18,2) NOT NULL DEFAULT 0.00,
  `price_hours` double(18,2) NOT NULL DEFAULT 0.00,
  `price_venues` double(18,2) NOT NULL DEFAULT 0.00,
  `price_medical` double(18,2) NOT NULL DEFAULT 0.00,
  `price_mini_text` double(18,2) NOT NULL DEFAULT 0.00,
  `amount_mini_text` int(11) NOT NULL DEFAULT 0,
  `state` varchar(191) NOT NULL DEFAULT 'active',
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `uuid`, `name`, `subtitle`, `price`, `month`, `photo`, `description`, `days`, `allowed_patients`, `storage_capacity`, `users_admin`, `voice_transcription`, `allowed_logo`, `venues`, `users_medical`, `allowed_medical_prescription`, `allow_generate_consent`, `allow_whatsapp`, `allow_mini_text`, `allow_whatsapp_reminder`, `mini_text`, `allow_special_messages`, `allow_special_whatsapp`, `allow_patient_quotes`, `allowed_medical_whatsapp`, `allowed_scheduling_web`, `allowed_email_quotes`, `allowed_emailing`, `allowed_inventories_billing`, `allowed_payments`, `allow_hours`, `price_storage_capacity`, `price_users_admin`, `price_hours`, `price_venues`, `price_medical`, `price_mini_text`, `amount_mini_text`, `state`, `status`, `created_at`, `updated_at`) VALUES
(1, 'c9c68d00-606a-11ee-8efa-3dd513fac5f7', 'DERMA GOLD', 'Experiencia integral para una clínica de vanguardia', 300000.00, 3, 'https://dermasoft.fullstackcolombia.com/storage/uploads/im4JRQmOHhFYGrlU7vHbcYm7glejMVyEdc02JnKz.jpg', 'La membresía completa que proporciona acceso a todas las funcionalidades avanzadas para optimizar y potenciar la clínica dermatológica.\r\n<br>Todas las funcionalidades de las membresías básica y estándar.\r\n<br>Integración con dispositivos médicos para captura de imágenes y análisis\r\n<br>Herramientas de programación avanzada para optimización de horarios y recursos.\r\n<br>Asesoramiento y soporte técnico prioritario.\r\n<br>Actualizaciones y nuevas características automáticas.', 90, 1000, 25, 100, 'no', 'si', 10, 10, 'si', 'si', 'si', 'si', 'si', 1000, 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 10000, 5000.00, 1000.00, 2000.00, 5000.00, 2000.00, 1.00, 1, 'active', 'active', '2023-10-01 19:57:06', '2023-10-02 17:11:26'),
(2, '2d19d2c0-733d-11ee-995a-cbde1ee176f9', 'este', 'este', 10000.00, 1, 'https://dermasoft.fullstackcolombia.com/storage/uploads/vs07M2Q8l5ddxXjIvWqpV7w0vEbcMvBTUbdEO6fD.jpg', 'esta es la descripcion 1\r\n<br> descripcion 2\r\n<br> esta e sla 3', 1, 3, 5, 4, 'no', 'no', 3, 3, 'no', 'no', 'no', 'no', 'no', 2, 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 2, 2.00, 2.00, 3.00, 7.00, 2.00, 3.00, 3, 'active', 'deleted', '2023-10-25 18:48:28', '2024-01-15 20:20:01'),
(3, '6b323570-b3b9-11ee-905d-69db8ee0dddd', 'otra', 'la mejor membresia', 20000.00, 1, 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/T07ireRqOAO6C2pxIWqqHv7pUIHlCovIkNdfM2SZ.jpg', 'La membresía completa que proporciona acceso a todas las funcionalidades avanzadas para optimizar y potenciar la clínica dermatológica.\r\n<br>Todas las funcionalidades de las membresías básica y estándar.\r\n<br> Asesoramiento y soporte técnico prioritario.', 1, 10, 5, 2, 'no', 'no', 2, 2, 'no', 'no', 'no', 'no', 'no', 10, 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 1, 1.00, 1.00, 1.00, 1.00, 1.00, 1.00, 1, 'active', 'active', '2024-01-15 20:19:04', '2024-01-15 20:19:04');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `hc` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `campus` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `medicine` text DEFAULT NULL,
  `dose` varchar(191) DEFAULT NULL,
  `frequency` varchar(191) DEFAULT NULL,
  `route_administration` varchar(191) DEFAULT NULL,
  `duration` varchar(191) DEFAULT NULL,
  `indications` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `uuid`, `hc`, `user`, `company`, `campus`, `medicine`, `dose`, `frequency`, `route_administration`, `duration`, `indications`, `status`, `created_at`, `updated_at`) VALUES
(1, '8f1a2360-62ec-11ee-afcb-f967ff4f1d12', 1, 8, 1, 1, '1', '1', 'c/3 horas', 'cutanea', '10', 'aplicar', 'active', '2023-10-05 00:31:04', '2023-10-05 00:31:04'),
(2, '30fc48f0-6309-11ee-8914-176abeb86347', 4, 8, 1, 1, '1', '1', '3 al dia', 'oral', '8 dias', 'tomarlas', 'active', '2023-10-05 03:56:02', '2023-10-05 03:56:02'),
(3, '0fb27b60-b14e-11ee-b518-8d7f6da4cb54', 7, 8, 1, 1, '1', '1', '2 dia', 'cutanea', '30', 'ninguna', 'active', '2024-01-12 18:25:32', '2024-01-12 18:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `procedures`
--

CREATE TABLE `procedures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `procedures`
--

INSERT INTO `procedures` (`id`, `uuid`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'd8a46080-5f13-11ee-bdba-41b880cde4dd', '001', 'Biopsia', 'active', '2023-09-30 03:02:13', '2023-09-30 03:02:13'),
(2, 'd8a4b620-5f13-11ee-b813-57628105b357', '002', 'Otro', 'active', '2023-09-30 03:02:13', '2023-09-30 03:02:13'),
(863, '116ffba0-b93a-11ee-9721-2f318c21d783', '869700', 'RETIRO DE EXPANSOR TISULAR (UNICO O MULTIPLE) SOD', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(862, '116ff1e0-b93a-11ee-9ad0-37e953cd00bd', '8697', 'RETIRO DE EXPANSOR TISULAR', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(861, '116fe7d0-b93a-11ee-ab50-671f2559f100', '869601', 'INSERCION (SUBCUTANEA )  (TEJIDO  BLANDO) DE EXPANSOR DE TEJIDOS (UNICO O MULTIPLE )', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(860, '116fddc0-b93a-11ee-a9bd-9331298b5485', '8696', 'INSERCION DE EXPANSOR TISULAR ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(859, '116fd3c0-b93a-11ee-8324-8b4b37ccdff1', '869500', 'CURACON DE LESION EN PIEL O TEJIDO CELULAR SUBCUTANEO SOD', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(858, '116fc9a0-b93a-11ee-91ef-31fcb0f9253e', '8695', 'CURACION DE LESIONES EN PIEL O TEJIDO CELULAR SUBCUTANEO ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(857, '116fbd40-b93a-11ee-9c03-c779d73579d6', '869400', 'RETIRO DE SUTURA EN PIEL O TEJIDO CELULAR SUBCUTANEO SOD', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(856, '116fb110-b93a-11ee-849e-8d10d3a72c38', '8694', 'RETIRO DE SUTURA EN PIEL O TEJIDO CELULAR SUBCUTANEO ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(855, '116fa540-b93a-11ee-8b27-bd36776aed00', '869205', 'REDUCCION DE TEJIDO CELULAR SUBCUTANEO (MANEJO DE LINFEDEMA)', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(854, '116f9930-b93a-11ee-a24b-cdc068a5dfc0', '869204', 'TRANSPOSICION DE GANGLIOS LINFATICOS CON ANASTOMOSIS ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(853, '116f8ce0-b93a-11ee-92a7-9de9687c0f63', '869203', 'ANASTOMOSIS LINFATICO LINFATICA', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(852, '116f8090-b93a-11ee-86f7-096cef648096', '869202', 'ANASTOMOSIS LINFATICO VENOSO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(850, '116f6740-b93a-11ee-b5c5-9dfec16f0ecf', '8692', 'MANEJO QUIRURGICO DE LINFEDEMA', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(851, '116f7400-b93a-11ee-b190-57dc3300674d', '869201', 'DERIVACION LINFATICA (MANEJO DE LINFEDEMA)', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(849, '116f5ac0-b93a-11ee-9534-4531b4cf85a2', '869104', 'RESECCION TOTAL DE GLANDULAS SUDORIPARAS ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(848, '116f4e30-b93a-11ee-b122-89972f2d07ca', '869103', 'RESECCION PARCIAL DE GLANDULAS SUDORIPARAS ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(847, '116f4190-b93a-11ee-b923-3b456f67e5fe', '869102', 'RESECCION DE GLANDULAS SUDORIPARAS AXILARES CON RESECCION TOTAL DEL AREA ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(846, '116f3510-b93a-11ee-bc01-e512fcd04eaf', '869101', 'RESECCION DE GLANDULAS SUDORIPARAS AXILARES SIMPLE CON RESECCION GANGLIONAR', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(845, '116f2850-b93a-11ee-9bfe-910938657ff5', '8691', 'RESECCION DE GLANDULAS SUDORIPARAS', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(844, '116f1b00-b93a-11ee-8d05-253d77493190', '869', 'OTROS PROCEDIMIENTOS EN PIEL Y TEJIDO CELULAR SUBCUTANEO ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(843, '116f0bd0-b93a-11ee-8a24-23c83cea2107', '868705', 'PLASTIA DE PANTORILLA CON DISPOSITIVO ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(842, '116efd10-b93a-11ee-b01a-c520e97d197b', '868704', 'GLUTEOPLASTIA DE AUMENTO CON TEJIDO AUTOLOGO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(841, '116eeea0-b93a-11ee-bb02-03c62e24ccf0', '868703', 'GLUTEOPLASTIA DE AUMENTO CON DISPOSITIVO ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(839, '116ed150-b93a-11ee-9c5c-5fffaab9d867', '868701', 'PLASTIAS DE PECTORALES DE AUMENTO CON DISPOSITIVO ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(840, '116ee040-b93a-11ee-be2c-c7661e76f1f0', '868702', 'PLASTIA DE PECTORALES DE AUMENTO CON TEJIDO AUTOLOGO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(838, '116ec340-b93a-11ee-9ff4-131f418bd5dc', '8687', 'PLASTIAS DE AUMENTO DE TAMAÑ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(837, '116eb4b0-b93a-11ee-b535-21cca3898e31', '868604', 'RECONSTRUCCION DE MATRIZ UNGUEAL CON INJERTO COMPUESTO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(836, '116ea650-b93a-11ee-a1c0-076003ebf675', '868603', 'RECONSTRUCCION DEL LECHO UNGUEAL CON INJERTO DE MATRIZ UNGUEAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(835, '116e97d0-b93a-11ee-b4a2-85016f78111e', '868602', 'REPOSICION UÑA DE POLIETILEN', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(834, '116e88e0-b93a-11ee-949a-5d55035af579', '868601', 'ONICOPLASTIA CON COLGAJO DE UÑ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(833, '116e79e0-b93a-11ee-8c7a-c978f1fbf6e4', '8686', 'ONICOPLASTIA', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(832, '116e6b20-b93a-11ee-9b39-23c0cfbaf4d8', '868510,\"PLASTIA EN Z O W, EN ZONAS DE FLEXION\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(831, '116e5a20-b93a-11ee-90a3-1569a09e13b0', '868507,\"PLASTIA EN Z, EN CADA DEDO DE LA MANO O DEL PIE\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(830, '116e4ca0-b93a-11ee-81b9-3b0eb261f926', '868506,\"PLASTIA EN Z O W EN MANO (SIN INCLUIR DEDOS), MAS DE CINCO \"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(829, '116e4060-b93a-11ee-a834-1d22986247f2', '868505,\"PLASTIA EN Z O W EN MANO (SIN INCLUIR DEDOS), ENTRE TRES A CINCO\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(828, '116e3470-b93a-11ee-8053-0390602c689f', '868504,\"PLASTIA EN Z O W EN MANO (SIN INCLUIR DEDOS), ENTRE UNA A DOS\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(827, '116e29e0-b93a-11ee-8781-57654316c88e', '868503,\"PLASTIA EN Z O W EN AREA ESPECIAL (CARA, CUELLO, MANOS, PIES, PLIEGUES DE FLEXION, GENITALES), MAS DE CINCO\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(826, '116e1ed0-b93a-11ee-a21a-e978bb4f00ef', '868502,\"PLASTIA EN Z O W EN AREA ESPECIAL, (CARA,CUELLO, MANOS, PIES, PLIEGUES DE FLEXION, GENITALES) ENTRE TRES A CINCO\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(825, '116e1400-b93a-11ee-99b3-a565b38ba9a4', '868501,\"PLASTIA EN Z O W EN AREA ESPECIAL (CARA,CUELLO, MANOS,PIES,PLIEGUES DE FLEXION, GENITALES), ENTRE UNO A DOS\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(824, '116e09a0-b93a-11ee-997f-3bf1745b0c8b', '8685,\"PLASTIA EN Z O W EN AREA ESPECIAL (CARA, CUELLO, ZONAS DE FLEXION, MANOS, PIES Y GENITALES)\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(823, '116dff90-b93a-11ee-9589-a52169b357a2', '868403,\"PLASTIA EN Z O W EN AREA GENERAL, MAS DE CINCO\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(822, '116df500-b93a-11ee-8fb6-4104e5657ea7', '868402,\"PLASTIA EN Z O W EN AREA GENERAL, ENTRE TRES A CINCO\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(821, '116deab0-b93a-11ee-8cc3-ed34417a57ea', '868401,\"PLASTIA EN Z O W EN AREA GENERAL, ENTRE UNA A DOS\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(820, '116ddca0-b93a-11ee-9fa9-d36438e056f0', '8684', 'PLASTIA EN Z O W EN AREA GENERAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(819, '116dd2d0-b93a-11ee-8cdf-ff80edc4beeb', '868316,\"PANICULECTOMIA DE MUSLOS, PELVIS, GLUTEOS O BRAZOS\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(818, '116dc850-b93a-11ee-9650-39f3792f2d7d', '868315', 'PANICULECTOMIA DE ABDOMEN', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(817, '116dbe10-b93a-11ee-8626-2551c96ebac3', '868314', 'PANICULECTOMIA DE TORAX', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(816, '116db340-b93a-11ee-9ff8-1bd57f0e1eb9', '868313,\"REDUCCION DE TEJIDO ADIPOSO EN MUSLOS, PELVIS, GLUTEOS O BRAZOS, POR LIPECTOMIA\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(815, '116da910-b93a-11ee-aae5-1fff22f9ed63', '868312,\"REDUCCION DE TEJIDO ADIPOSO EN MUSLOS,PELVIS,GLUTEOS O BRAZOS, POR LIPOSUCCION\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(814, '116d9e80-b93a-11ee-b6da-6723b01f6d96', '868311', 'REDUCCION DE TEJIDO ADIPOSO DE PARED ABDOMINAL POR LIPECTOMIA', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(813, '116d9480-b93a-11ee-9a58-4566e284b366', '868310', 'REDUCCION DE TEJIDO ADIPOSO DE PARED ABDOMINAL POR LIPOSUCCION ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(812, '116d8a40-b93a-11ee-a821-057e7fc8890c', '868309,\"REDUCCION DE TEJIDO ADIPOSO EN AREA SUBMANDIBULAR, POR LIPOSUCCION\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(811, '116d8000-b93a-11ee-b047-a5b889f5bd79', '868308,\"REDUCCION DE TEJIDO ADIPOSO EN AREA SUBMANDIBULAR, POR LIPOSUCCION\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(810, '116d75c0-b93a-11ee-b760-01c5d4fbc377', '868307,\"REDUCCION DE TEJIDO ADIPOSO EN CARA, POR LIPECTOMIA\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(809, '116d6b60-b93a-11ee-a242-3f82a0c2792a', '868306,\"REDUCCION DE TEJIDO ADIPOSO EN CARA, POR LIPOSUCCION \"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(808, '116d6140-b93a-11ee-abd8-c31f3512d8ec', '868302', 'RESECCION DE BOLSAS ADIPOSAS DE BICHAT EN CARA ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(807, '116d5730-b93a-11ee-925b-6195a2ca0bff', '8683', 'PLASTIAS DE REDUCCION DE TAMAÑO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(806, '116d4c70-b93a-11ee-ac75-ffc398456e1b', '868206', 'RITIDECTOMIA SUBPERIOSTICA', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(805, '116d41d0-b93a-11ee-a9f5-75521a9d1b1a', '868205', 'RITIDECTOMIA DE FRENTE (VIA CORONAL O ENDOSCOPICA)', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(804, '116d3780-b93a-11ee-bbc1-5dfd236c8dab', '868204,\"RITIDECTOMIA TOTAL (FRENTE, PARPADOS, MEJILLA Y CUELLO)\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(803, '116d2c60-b93a-11ee-8f2e-eda6a3699948', '868203', 'RITIDECTOMIA CERVICOFACIAL SIN FRENTE', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(802, '116d2220-b93a-11ee-84cd-3d137b7fe3b2', '868202', 'RITIDECTOMIA ARRUGAS ANGULO EXTERNO DEL OJO VIA CORONAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(801, '116d17b0-b93a-11ee-83c1-39a46c6cae6d', '868201', 'RITIDECTOMIA ARRUGAS GLABELARES ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(800, '116d0d50-b93a-11ee-9fa4-1fd76509e96e', '8682', 'RITIDECTOMIA FACIAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(799, '116d0240-b93a-11ee-8f0e-55bfc485d81f', '868104,\"RESECCION DE CICATRIZ HIPERTROFICA O QUELOIDE, EN AEREA ESPECIAL\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(798, '116cf380-b93a-11ee-b7b0-cb41563529bd', '868103,\"RESECCION DE CICATRIZ HIPERTROFICA O QUELOIDE, EN AREA GENERAL\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(797, '116ce500-b93a-11ee-99a0-7b5ca4cad110', '868102', 'RESECCION SIMPLE DE CICATRIZ EN AREA ESPECIAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(796, '116cd6c0-b93a-11ee-bb27-c5057e5673ed', '868101', 'RESECCION SIMPLE DE CICATRIZ  EN AREA GENERAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(795, '116ccb60-b93a-11ee-b863-5d2a3031ccc5', '8681', 'CORRECCION QUIRURGICA DE CICATRICES', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(794, '116cbe10-b93a-11ee-b85e-c7b992c211b5', '868', 'REPARACION Y RECONSTRUCCION DE PIEL Y TEJIDO CELULAR SUBCUTANEO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(793, '116cb210-b93a-11ee-b76f-81ff8d68473d', '867500', 'REVISION DE INJERTO O COLGAJO SOD', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(792, '116ca600-b93a-11ee-a4ad-a779088fdc88', '8675', 'REVISION DE INJERTO O COLGAJO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(791, '116c9ba0-b93a-11ee-9882-73d1ee59a5b7', '867302', 'COLGAJO COMPUESTO PREFABRICADO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(790, '116c8fb0-b93a-11ee-b69f-41301e7b80c9', '867301', 'DIFERIMIENTO DE CUALQUIER COLGAJO [DELAY]', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(789, '116c82f0-b93a-11ee-ad71-f15ca3eada9e', '8673', 'DIFERIMIENTO DE CUALQUIER COLGAJO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(788, '116c7600-b93a-11ee-8757-05ea01cd09d9', '867203', 'COLGAJO LOCAL DE PIEL COMPUESTO DE VECINDAD ENTRE CINCO A DIEZ CENTIMETROS CUADRADOS', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(787, '116c6820-b93a-11ee-ba98-851b31f34582', '867202', 'COLGAJO LOCAL DE PIEL COMPUESTO DE VENCIDAD ENTRE DOS A CINCO CENTIMETROS CUADRADOS ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(786, '116c5ae0-b93a-11ee-a568-4972d1fa89de', '867201', 'COLGAJO LOCAL DE PIEL COMPUESTO DE VENCIDAD HASTA DE DOS CENTIMETROS CUADRADOS', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(785, '116c4e30-b93a-11ee-8e46-610ae4d0e492', '8672,\"COLGAJO LOCAL DE PIEL COMPUESTO DE VECINDAD (MUSCULARES, FASCIOCUTANEOS,     MUSCULO- CUTANEOS,    OSTEOMUSCULO- CUTANEOS)\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(784, '116c41f0-b93a-11ee-a248-ed5afc414954', '867108', 'COLGAJO COMPUESTO CON TECNICA MICROVASCULAR (EN PROPELA)', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(783, '116c3680-b93a-11ee-91d2-21aacd61eccf', '867107', 'COLGAJO NEUROVASCULAR(EN ISLA)', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(782, '116c2b50-b93a-11ee-a0d9-c7ea56589e6a', '867106', 'COLGAJO LIBRE COMPUESTO CON TECNICA MICROVASCULAR', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(781, '116c1f30-b93a-11ee-a279-bbf1e53b6f8d', '867105', 'COLGAJO LIBRE CUTANEO CON TECNICA MICROVASCULAR', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(780, '116c11d0-b93a-11ee-9c96-e9a9bdd918cb', '867104,\"COLGAJO COMPUESTO A DISTANCIA, EN VARIOS TIEMPOS\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(779, '116c0320-b93a-11ee-8d7d-694fee9890a7', '867103,\"COLGAJO CUTANEO A DISTANCIA, EN VARIOS TIEMPOS\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(778, '116bf480-b93a-11ee-b560-139ceb247728', '867102', 'COLGAJO MULTIPLE DE CUERO CABELLUDO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(777, '116be640-b93a-11ee-97f1-55b342a7cdf5', '867101', 'COLGAJO UNICO DE CUERO CABELLUDO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(776, '116bd830-b93a-11ee-aa6d-91d020cb129c', '8671', 'COLGAJOS COMPUESTOS', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(775, '116bc9a0-b93a-11ee-9d3e-0f21490b6c31', '867004', 'COLGAJO LOCAL SIMPLE DE PIEL DE MAS DE DIEZ CENTIMETROS CUADRADOS', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(774, '116bbb30-b93a-11ee-b887-dbfc4a4a181b', '867003', 'COLGAJO LOCAL SIMPLE DE PIEL DE CINCO A DIEZ CENTIMETROS CUADRADOS', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(773, '116bad00-b93a-11ee-b4f6-f9e1757524a3', '867002', 'COLGAJO LOCAL SIMPLE DE PIEL ENTRE DOS A CINCO CENTIMETROS CUADRADOS', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(772, '116b9e00-b93a-11ee-ae89-a14ea518117b', '867001', 'COLGAJO LOCAL SIMPLE DE PIEL HASTA DE DOS CENTIMETROS CUADRADOS ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(771, '116b8f70-b93a-11ee-bdff-c1a442cc6833', '8670', 'COLGAJO LOCAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(770, '116b8300-b93a-11ee-a45a-fff86cf137cc', '867', 'COLGAJOS', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(769, '116b7670-b93a-11ee-aa57-d7b12225a54c', '866702', 'INJERTO DERMOGRASO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(768, '116b6770-b93a-11ee-a257-5150bf2c6891', '866701', 'INJERTO GRASO ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(766, '116b4e00-b93a-11ee-b920-0b5c4cde3eee', '866602', 'HOMOINJERTO O AUTOINJERTO DE PIEL POR CULTIVO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(767, '116b5a50-b93a-11ee-830d-7b7fead01bb1', '8667', 'INJERTO GRASO [LIPOINJERTO]', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(765, '116b4440-b93a-11ee-99c7-4f511c7470a9', '866601', 'INJERTO HOMOLOGO DE PIEL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(764, '116b3aa0-b93a-11ee-b42d-61c796465773', '8666', 'HOMOINJERTO O AUTOINJERTO DE PIEL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(763, '116b3080-b93a-11ee-8287-3fbf6ba19071', '866501', 'INJERTO HETEROLOGO DE PIEL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(762, '116b2660-b93a-11ee-aa63-2d911755ee17', '8665', 'HETEROINJERTO DE PIEL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(761, '116b1c70-b93a-11ee-abaf-7d78b2553a8e', '866403', 'INJERTO DE REGION PILOSA', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(760, '116b12b0-b93a-11ee-bd65-9dea513715bf', '866402', 'MICROINJERTO DE CUERO CABELLUDO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(759, '116b0890-b93a-11ee-bf2c-d93afff3a17b', '866401', 'INJERTO DE CUERO CABELLUDO (ALOPECIA SECUELA POST-TRAUMA)', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(757, '116af410-b93a-11ee-b683-5f14550688fa', '866300', 'INJERTO CONDROCUTANEO SOD', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(758, '116afe30-b93a-11ee-9753-5b11db34d8fa', '8664,\"INJERTO EN REGION PILOSA (CEJA,BARBA O CUERO CABELLUDO)\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(756, '116ae9d0-b93a-11ee-99aa-5b4e56fb659b', '8663', 'INJERTO CONDROCUTANEO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(755, '116adf90-b93a-11ee-bae5-b3c687e29f58', '866204', 'INJERTO DE PIEL TOTAL EN AREA GENERAL DEL 30% O MAS DE SUPERFICIE CORPORAL TOTAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(754, '116ad540-b93a-11ee-81e0-f121aeda0421', '866203', 'INJERTO DE PIEL TOTAL EN AREA GENERAL DEL 20% AL 29% DE SUPERFICIE CORPORAL TOTAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(753, '116acb10-b93a-11ee-a42e-a90b8caed9b7', '866202', 'INJERTO DE PIEL TOTAL EN AREA GENERAL DEL DIEZ 10% AL 19% DE SUPERFICIE CORPORAL TORAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(751, '116ab5a0-b93a-11ee-880f-197188104f54', '8662', 'INJERTO DE PIEL TOTAL LIBRE ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(752, '116ac050-b93a-11ee-8370-339c96f8cfcc', '866201', 'INJERTO DE PIEL TOTAL EN AREA GENERAL MENOR DEL DIEZ10% DE SUPERFICIE CORPORAL TOTAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(750, '116aaab0-b93a-11ee-b20c-d1c0cf6986be', '866109', 'INJERTO DE PIEL TOTAL EN AREA ESPECIAL EN GENETALES', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(749, '116a9eb0-b93a-11ee-b769-c74d6ebe2358', '866108', 'INJERTO DE PIEL TOTAL EN AREA ESPECIAL EN TOBILLO O PIES', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(748, '116a9430-b93a-11ee-8d73-7b7df8712e1a', '866107', 'INJERTO DE PIEL TOTAL EN AREA ESPECIAL EN MUÑECAS O MANO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(747, '116a8a10-b93a-11ee-8b24-5932df61eb54', '866106,\"INSERTO DE PIEL TOTAL EN AREA ESPECIAL EN PLIEGUES DE FLEXION (AXILA, ANTECUBITAL, HUECOS, POPLITEOS, INGUINAL)\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(746, '116a7ff0-b93a-11ee-b424-6196a1095b08', '866105', 'INJERTO DE PIEL TOTAL EN AREA ESPECIAL EN CARA O CUELLO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(745, '116a7650-b93a-11ee-92a0-f9c1e7bb7be9', '866104', 'INJERTO DE PIEL PARCIAL EN AREA GENERAL MAYOR DEL TREINTA 30% DE SUPERFICIE CORPORAL TOTAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(744, '116a6c00-b93a-11ee-9cca-bdbbe3bf00c3', '866103', 'INJERTO DE PIEL PARCIAL EN AREA GENERAL DEL VEINTE 20% AL 29% DE SUPERFICIE CORPORAL TOTAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(743, '116a6050-b93a-11ee-b8df-c9f60035d640', '866102', 'INJERTO DE PIEL PARCIAL EN AREA GENERAL DEL DIEZ 10% AL 19% DE SUPERFICIE CORPORAL TOTAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(741, '116a48b0-b93a-11ee-b4f5-1d015a3dcbea', '8661', 'INJERTO DE PIEL PARCIAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(742, '116a5430-b93a-11ee-9e6b-d59260db3c73', '866101', 'INJERTO DE PIEL PARCIAL EN AREA GENERAL MENOR DEL DIEZ 10% DE SUPERFICIE CORPORAL TOTAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(740, '116a3d80-b93a-11ee-b7b2-4b001b6c32ba', '866', 'INJERTO CUTANEO LIBRE ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(739, '116a3380-b93a-11ee-b44b-97f1d7a0ea46', '865210', 'SUTURA DE MATRIZ UNGUEAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(738, '116a29d0-b93a-11ee-9d86-b5d505d3acc6', '865209', 'RECONSTRUCCION DE AVULSION (TOTAL O PARCIAL) DE CUERO CABELLUDO O AREA ESPECIAL CON TECNICA MICROVASCULAR', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(737, '116a1ff0-b93a-11ee-b8fd-cff8c6f05a66', '865208,\"SUTURA DE AVULSION EN PABELLON AURICULAR, NARIZ, LABIOS, PARPADOS O GENITALES\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(736, '116a1530-b93a-11ee-bb93-474705065d72', '865207', 'SUTURA DE HERIDA PARCIAL DE CUERO CABELLUDO (ESCALPE)', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(735, '116a0b40-b93a-11ee-ad40-191ffcbc0de7', '865206,\"SUTURA DE HERIDA MULTIPLE DE PLIEGUES DE FLEXION, GENITALES, MANOS Y PIES \"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(734, '116a0100-b93a-11ee-abcc-bfa644d530aa', '865205', 'SUTURA DE HERIDA MULTIPLE DE CARA SIN COMPROMISO DE LABIOS O PARPADOS ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(733, '1169f6c0-b93a-11ee-80d7-2b9f0b02e95e', '865204', 'SUTURA DE HERIDA MULTIPLE DE CARA', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(732, '1169eb80-b93a-11ee-9002-035bba1475bc', '865203,\"SUTURA DE HERIDA UNICA DE PLIEGUES DE FLEXION, GENITALES, MANOS Y PIES\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(731, '1169dca0-b93a-11ee-bc8c-151011bd2b35', '865202', 'SUTURA DE HERIDA UNICA DE CARA SIN COMPROMISO DE LABIOS O PARPADOS', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(730, '1169cb30-b93a-11ee-83be-d1f9a59b9a59', '865201', 'SUTURA DE HERIDA UNICA DE CARA ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(729, '1169b9c0-b93a-11ee-9eea-3dddc61a2400', '8652,\"SUTURA DE HERIDA EN AREA ESPECIAL (CARA,CUERO CABELLUDO, CUELLO, MANOS, PIES PLIEGUES DE FLEXION,GENITALES)\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(728, '1169ad00-b93a-11ee-8388-d7db0a771104', '865102,\"SUTURA DE HERIDA MULTIPLE,EN AREA GENERAL\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(727, '11699fb0-b93a-11ee-903d-5392f23df615', '865101,\"SUTURA DE HERIDA UNICA, EN AREA GENERAL\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(726, '11699260-b93a-11ee-b992-87db00c461c9', '8651', 'SUTURA DE HERIDA EN AREA GENERAL ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(725, '116984b0-b93a-11ee-9980-eb1df6c9bd41', '865', 'SUTURA DE PIEL Y TEJIDO CELULAR SUBCUTANEO ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(724, '11697910-b93a-11ee-b349-2b0bb0b7e506', '864301', 'CIRUGIA MICROGRAFICA [DE MOHS] POR CORTE ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(723, '11696ec0-b93a-11ee-bc80-7f254c192b96', '8643', 'CIRUGIA MICROGRAFICA [DE MOHS] POR CORTES ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(722, '116964e0-b93a-11ee-be17-af96b02431b0', '864205,\"RESECCION DE TUMOR BENIGNO O MALIGNO DE PIEL O TEJIDO CELULAR SUBCUTANEO DE AREA ESPECIAL,DE MAS DE CINCO CENTIMETROS \"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(721, '116959e0-b93a-11ee-bc0a-072981343294', '864204,\"RESECCION DE TUMOR BENIGNO O MALIGNO DE PIEL O TEJIDO CELULAR SUBCUTANEO DE AREA ESPECIAL, ENTRE TRES A CINCO CENTIMETROS\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(720, '11694f80-b93a-11ee-bfc7-c3d4e8bb91cf', '864203,\"RESECCION DE TUMOR BENIGNO O MALIGNO DE PIEL O TEJIDO CELULAR SUBCUTANEO DE AREA ESPECIAL, ENTRE DOS A TRES CENTIMETROS\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(719, '11694500-b93a-11ee-ae68-1f6454dd8ac7', '864202,\"RESECCION DE TUMOR BENIGNO O MALIGNO DE PIEL O TEJIDO CELULAR SUBCUTANEO DE AREA ESPECIAL, ENTRE UNO A DOS CENTIMETROS\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(718, '11693b00-b93a-11ee-b8d2-fdc552f1e007', '864201,\"RESECCION DE TUMOR BENIGNO O MALIGNO DE PIEL O TEJIDO CELULAR SUBCUTANEO DE AREA ESPECIAL,HASTA UN  CENTIMETRO\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(717, '11693040-b93a-11ee-a3ef-89fdbc459eee', '8642', 'RESECCION DE TUMOR BENIGNO O MALIGNO DE PIEL O TEJIDO CELULAR SUBCUTANEO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(716, '11692270-b93a-11ee-9357-75728ce39764', '864106,\"RESECCION DE TUMOR MALIGNO DE PIEL O TEJIDO CELULAR SUBCUTANEO AREA GENERAL, CON REPARACION (COLGAJO O INJERTO)\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(715, '11691800-b93a-11ee-a7e7-bd4e57dab7ad', '864105,\"RESECCION DE TUMOR BENIGNO DE PIEL O TEJIDO CELULAR SUBCUTANEO AREA GENERAL, CON REPARACION ( COLGAJO O INJERTO)\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(714, '11690dc0-b93a-11ee-8fcc-997ae5cfa051', '864104,\" RESECCION DE TUMOR BENIGNO O MALIGNO DE PIEL O TEJIDO CELULAR SUBCUTANEO AREA GENERAL, DE MAS DE DIEZ CENTIMETROS\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(713, '11690300-b93a-11ee-bc7c-e9fe701a2608', '864103,\"RESECCION DE TUMOR BENIGNO O MALIGNO DE PIEL O TEJIDO CELULAR SUBCUTANEO AREA GENERAL, ENTRE CINCO A DIEZ CENTIMETROS\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(712, '1168f8f0-b93a-11ee-983d-e12a2989be63', '864102,\"RESECCION DE TUMOR BENIGNO O MALIGNO DE PIEL O TEJIDO CELULAR SUBCUTANEO AREA GENERAL, ENTRE TRES A CINCO CENTIMETROS\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(711, '1168ee80-b93a-11ee-b615-c5bed2f64126', '864101', 'RESECCION DE TUMOR BRNIGNO O MALIGNO DE PIEL O TEJIDO CELULAR SUBCUTANEO AREA GENERAL HASTA TRES CENTIMETROS', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(710, '1168e400-b93a-11ee-998f-39f47adb003d', '8641', 'RESECCION DE TUMOR BENIGNO O MALIGNO DE PIEL O TEJIDO CELULAR SUBCUTANEO AREA GENERAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(709, '1168d980-b93a-11ee-baee-67dccec2139c', '864', 'ESCISION RADICAL DE LESION CUTANEA', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(707, '1168c540-b93a-11ee-af74-15c21eb11a36', '8638', 'ABLACION DE LESIONES CUTANEAS POR HAZ DE LASER ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(708, '1168cf60-b93a-11ee-9cdc-4fef52e06cad', '863800', 'ABLACION DE LESIONES CUTANEAS (TATUAJE) POR HAZ DE LASER SOD', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(706, '1168b9b0-b93a-11ee-b8f9-9b93b3460f26', '863690', 'ESCISION O ABLACION LOCAL DE LESION CUTANEA', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(705, '1168b000-b93a-11ee-8e1e-7343bf9f7a17', '863603', 'ABLACION DE TELANGIECTASIAS POR ESCLEROTERAPIA ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(704, '1168a580-b93a-11ee-973d-45d91706bdf0', '863602', 'EXTRACCION DE COMEDONES (COMEDOLISIS)', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(703, '11689b60-b93a-11ee-aa30-69c5f8156e4f', '863601', 'APERTURA O RESECCION DE QUISTES O PUSTULAS (CIRUGIA PARA ACNE)', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(702, '11689070-b93a-11ee-bf67-f350e6a10c17', '8636', 'OTRA ESCISION O ABLACION LOCAL DE LESIONES CUTANEAS ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(701, '11688600-b93a-11ee-b12f-e9496ae351e1', '863503,\"ESCISION DE LESIONES CUTANEAS POR RADIOFRECUENCIA, MAS DE DIEZ LESIONES \"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(700, '11687a10-b93a-11ee-b191-153492c5275b', '863502,\"ESCISION DE LESIONES CUTANEAS POR RADIOFRECUENCIA, ENTRE CINCO A DIEZ LESIONES\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(699, '11687000-b93a-11ee-8a30-1d7ec64dcc64', '863501,\"ESCISION DE LESIONES CUTANEAS POR RADIOFRECUENCIA, HASTA CINCO LESIONES\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(698, '11686590-b93a-11ee-849d-07031dd42e1d', '8635', 'ESCISION DE LESIONES CUTANEAS POR RADIOFRECUENCIA', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(697, '11685b80-b93a-11ee-abf2-2b6bd9677453', '863105,\"RESECCION DE LESIONES CUTANEAS POR CAUTERIZACION, FULGURACION O CRIOTERAPIA EN AREA ESPECIAL, MAS DE DIEZ LESIONES\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(696, '11685130-b93a-11ee-bbe8-cf78c304713b', '863104,\"RESECCION DE LESIONES CUTANEAS POR CAUTERIZACION, FULGURACION O CRIOTERAPIA EN AREA ESPECIAL,ENTRE TRES A DIEZ LESIONES\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(695, '116846f0-b93a-11ee-989e-97b658ebb7aa', '863103,\"RESECCION DE LESIONES CUTANEAS POR CAUTERIZACION, FULGURACION O CRIOTERAPIA EN AREA ESPECIAL, HASTA TRES LESIONES\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(694, '11683c80-b93a-11ee-84f8-cf2a99514418', '863102,\"RESECCION DE LESIONES CUTANEAS POR CAUTERIZACION, FULGURACION O CRIOTERAPIA EN AREA GENERAL, MAS DE SEIS LESIONES\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(693, '11683200-b93a-11ee-8ecc-4f44bf11a027', '863101,\"RESECCION DE LESIONES CUTANEAS POR CAUTERIZACION, FULGURACION O CRIOTERAPIA EN AREA GENERAL, HASTA SEIS LESIONES\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(692, '116827e0-b93a-11ee-802d-31084eab981d', '8631', 'ABLACION DE LESIONES CUTANEAS POR CAUTERIZACION FULGURACION O CRIOTERAPIA ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(691, '11681cc0-b93a-11ee-b00e-a9662b5a9a3e', '863', 'OTRA ESCISION LOCAL O ABLACION DE LESION DE PIEL Y TEJIDO CELULAR SUBCUTANEO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(689, '11680460-b93a-11ee-ba3d-0f31ea759654', '8629', 'FISTULECTOMIA DE PIEL Y TEJIDO CELULAR SUBCUTANEO ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(690, '11680f00-b93a-11ee-8079-5bb630292163', '862900', 'FISTULECTOMIA DE PIEL Y TEJIDO CELULAR SUBCUTANEO SOD', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(688, '1167f8e0-b93a-11ee-8bb3-9367160860d4', '862807', 'DESBRIDAMIENTO NO ESCISIONAL DE TEJIDO DESVITALIZADO MAYOR DEL 50% DE SUPERFICIE CORPORAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(687, '1167eb40-b93a-11ee-b8dc-5b2024bdedeb', '862806', 'DESBRIDAMIENTO NO ESCISIONAL DE TEJIDO DESVITALIZADO ENTRE EL 40% AL 50% DE SUPERFICIE CORPORAL ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(686, '1167de80-b93a-11ee-9bef-57d2b5f1d5d7', '862805', 'DESBRIDAMIENTO NO ESCISIONAL DE TEJIDO DESVITALIZADO ENTRE EL 30% AL 40% DE SUPERFICIE CORPORAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(685, '1167d220-b93a-11ee-afc8-c7fda7e5b44f', '862804', 'DESBRIDAMIENTO NO ESCISIONAL DE TEJIDO DESVITALIZADO ENTRE EL 20%AL 30% DE SUPERFICIE CORPORAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(684, '1167c5d0-b93a-11ee-bff1-9596dd3b99c0', '862803', 'DESBRIDAMIENTO NO ESCISIONAL DE TEJIDO DESVITALIZADO ENTRE EL 10% AL 20% DE SUPERFICIE CORPORAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(683, '1167b990-b93a-11ee-bc32-175338ecea90', '862802', 'DESBRIDAMIENTO NO ESCISONAL DE TEJIDO DESVITALIZADO ENTRE EL 5% AL 10% DE SUPERFICIE CORPORAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(682, '1167ad40-b93a-11ee-a412-118a42a136d7', '862801', 'DESBRIDAMIENTO NO ESCISIONAL DE TEJIDO DESVITALIZADO HASTA DEL 5% DE SUPERFICIE CORPORAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(680, '11679360-b93a-11ee-8095-8d2f2cffdacb', '862703', 'MATRICECTOMIA TOTAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(681, '1167a070-b93a-11ee-8703-97a9dd498018', '8628', 'DESBRIDAMIENTO NO ESCISIONAL DE TEJIDO DESVITALIZADO ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(678, '11677890-b93a-11ee-8916-d1a527f16782', '862701', 'ONICECTOMIA', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(679, '11678430-b93a-11ee-840e-192fa8069af3', '862702', 'MATRICECTOMIA PARCIAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(677, '11676ea0-b93a-11ee-bdcd-233dd7d2cf59', '8627,\"EXTRACCION DE UÑA,LECHO O PLIEGU\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(676, '11676460-b93a-11ee-8263-69f2b3deed28', '862602', 'SUSTITUCION DE DISPOSITIVO DE PRESION SUBATMOSFERICA ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(675, '11675a00-b93a-11ee-a24c-619e2d4b93f7', '862601', 'DESGRIDAMIENTO CON COLOCACION DE DISPOSITIVO DE PRESION SUBATMOSFERICA ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(674, '11675020-b93a-11ee-acc0-07b387403fe2', '8626', 'OTROS DESBRIDAMIENTOS ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(673, '11674630-b93a-11ee-b0d7-950d82ed21fa', '862514', 'DERMOABRASION (QUIMICA O MECANICA) EN AREA ESPECIAL EN GENITALES', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(672, '11673c00-b93a-11ee-83da-95fa33f2a146', '862513', 'DERMOABRASION (QUIMICA O MECANICA) EN AREA ESPECIAL EN TOBILLOS Y PIES', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(671, '116731a0-b93a-11ee-91be-83d882a91850', '862512', 'DERMOABRASION (QUIMICA O MECANICA) EN AREA ESPECIAL EN MUÑECAS Y MANO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(670, '11672750-b93a-11ee-89f3-b7121655e117', '862511,\"DERMOABRASION (QUIMICA O MECANICA) EN AREA ESPECIAL EN PLIEGUES DE FLEXION (AXILA,ANTECUBITAL, HUECOS, POPLITEOS, INGUINAL)\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(669, '11671d20-b93a-11ee-be40-53cca2a6a827', '862510', 'DERMOABRASION (QUIMICA O MECANICA ) EN AREA ESPECIAL EN CARA O CUELLO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(668, '11671320-b93a-11ee-bd76-c3080e16806a', '862509', 'DERMOABRASION (QUIMICA O MECANICA) DE AREA GENERAL DEL 50% O MAS DE SUPERFICIE CORPÓRAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(667, '116708e0-b93a-11ee-afee-bbe87f9204e8', '862508', 'DERMOABRASION (QUIMICA O MECANICA) DE AREA GENERAL DEL 30% AL 49% DE SUPERFICIE CORPORAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(666, '1166fef0-b93a-11ee-89bd-e1478f3842e5', '862507', 'DERMOABRASION (QUIMICA O MECANICA ) DE AREA GENERAL ENTRE EL 20% AL 29% DE SUPERFICIE CORPORAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(665, '1166f4e0-b93a-11ee-8961-e30f7317f9aa', '862506', 'DERMOABRASION (QUIMICA O MECANICA) DE AREA GENERAL ENTRE EL 10% AL 19% DE SUPERFICIE CORPORAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(664, '1166e560-b93a-11ee-bb3e-09b65317a38f', '862505', 'DERMOABRASION (QUIMICA O MECANICA) DE AREA GENERAL MENOR DEL 10% DE SUPERFICIE CORPORAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(663, '1166db60-b93a-11ee-8c9a-7140f4080036', '8625', 'ABRASION DERMICA', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(662, '1166d140-b93a-11ee-90d6-775531f05416', '862404', 'DERMOEXFOLIACION CON LASER PARCIAL O TOTAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(661, '1166c760-b93a-11ee-82ac-79e4b932a467', '862403', 'DERMOEXFOLIACION PROFUNDA', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(659, '1166b310-b93a-11ee-a748-db4239f245c1', '862401', 'DERMOEXFOLIACION SUPERFICIAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(660, '1166bd00-b93a-11ee-aa5d-e58e3ba88510', '862402', 'DERMOEXFOLIACION MEDIA', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(658, '1166a960-b93a-11ee-aa90-3d75be329769', '8624', 'DERMOEXFOLIACION (QUIMIOCIRUGIA DE PIEL)', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(657, '11669f90-b93a-11ee-9c81-6726e96658bf', '862355', 'ESCAROTOMIA DESCOMPRESIVA EN TRONCO (TORAX O ABDOMEN)', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(656, '11669540-b93a-11ee-b454-079692fa4f14', '862354', 'ESCAROTOMIA DESCOMPRESIVA EN EXTREMIDAD INFERIOR EXCEPTO TOBILLO PIE', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(655, '11668b60-b93a-11ee-8728-1f37ff45aa06', '862353', 'ESCAROTOMIA DESCOMPRESIVA EN EXTREMIDAD SUPERIOR EXCEPTO MUÑECA MANO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(654, '11668170-b93a-11ee-98c5-eb6a65afdb14', '862352', 'ESCAROTOMIA DESCOMPRESIVA EN TOBILLOS O PIES', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(653, '11667780-b93a-11ee-8a46-2d08ad8360ac', '862351', 'ESCAROTOMIA DESCOMPRESIVA EN MUÑECAS O MANOS', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(652, '11666d40-b93a-11ee-a1a4-61ea3f0afb53', '862329', 'ESCARECTOMIA DEL 30% O MAS DE SUPERFICIE CORPORAL ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(651, '11666320-b93a-11ee-954c-e96b7a7523a1', '862328', 'ESCARECTOMIA DEL 20% AL 29% DE SUPERFICIE CORPORAL ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(650, '11665930-b93a-11ee-b523-e99db85201be', '862326', 'ESCARECTOMIA DEL 10% AL 19% DE SUPERFICIE CORPORAL ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(649, '11664f00-b93a-11ee-b545-bd8bce27e8a0', '862324', 'ESCARECTOMIA MENOR DEL 10% DE SUPERFICIE CORPORAL ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(648, '11664100-b93a-11ee-a142-85a7d64722de', '862320', 'ESCAROTOMIA DESCOMPRENSIVA EN MUÑECA O MANOS', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(647, '116636d0-b93a-11ee-9150-4b84984ad0bd', '862315,\"ESCISION DE ULCERA (SACRA,ISQUIATICA,TROCANTERICA Y OTRAS LOCALIZACIONES) CON RESECCION DE BURSA POR ULCERA Y CIERRE CON COLGAJO COMPUESTO \"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(646, '11662c80-b93a-11ee-ad8d-05b0016edffe', '862314,\"ESCISION DE ULCERA (SACRA,ISQUIATICA.TROCANTERICA Y OTRAS LOCALIZACIONES) CON OSTECTOMIA\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(645, '116621b0-b93a-11ee-8495-2534902ccdc7', '862313,\"ESCISION DE ULCERA (SACRA,ISQUIATICA,TROCANTERICA Y OTRAS LOCALIZACIONES)\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(644, '11661730-b93a-11ee-af35-4354a91b85b0', '862312', 'DESGRIDAMIENTO DE LESION PROFUNDA (ULCERA) CON COCCIGECTOMIA', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(643, '11660c30-b93a-11ee-952a-235fc3492d6d', '862311,\"ESCISION DE ULCERA (SACRA,ISQUIATICA,TROCANTERICA Y OTRAS LOCALIZACIONES) CON OSTECTOMIA ,RESECCION DE BURSA POR ULCERA Y CIERRE CON COLGAJO COMPUESTO\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(642, '116600e0-b93a-11ee-92bc-7536a13e80b6', '862310', 'ESCISION DE ULCERA (SACRA,ISQUIATICA,TROCANTERICA Y OTRAS LOCALIZACIONES) CON CIERRE PRIMARIO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:39:28'),
(641, '1165f620-b93a-11ee-bb45-7bc25a0669c3', '8623', 'ESCISION DE ULCERAS Y ESCARECTOMIAS ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(640, '1165ec20-b93a-11ee-a43e-71d0a44c7692', '862104', 'RESECCION QUISTE PILONIDAL CON RECONSTRUCCION CON COLGAJO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(639, '1165e1e0-b93a-11ee-831f-054971387f2c', '862103', 'RESECCION QUISTE PILONIDAL (CIERRE PARCIAL O ESCISION ABIERTA)', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(637, '1165cce0-b93a-11ee-ad20-4f46fc46b984', '862101', 'DRENAJE DE QUISTE PILONIDAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(638, '1165d760-b93a-11ee-8476-a7272132d227', '862102', 'MARSUPIALIZACION DE QUISTE PILONIDAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(636, '1165c310-b93a-11ee-b6c6-2f942e0b86da', '8621', 'ESCISION DE QUISTE O SENO PILONIDAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(635, '1165b8d0-b93a-11ee-8660-f13f8729306a', '862010', 'DESBRIDAMIENTO ESCISIONAL DEL 50% O MAS DE SUPERFICIE CORPORAL EN AREA GENERAL ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(634, '1165ae60-b93a-11ee-be26-293580649a79', '862009', 'DESBRIDAMIENTO ESCISIONAL ENTRE EL 30% AL 49% DE SUPERFICIE CORPORAL EN AREA GENERAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(633, '1165a3d0-b93a-11ee-81b2-77bcd020f809', '862008', 'DESBRIDAMIENTO ESCISIONAL ENTRE EL 20% AL 29% DE SUPERFICIE CORPORAL EN AREA GENERAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(632, '11659a00-b93a-11ee-8821-af04ed11e31a', '862007', 'DESBRIDAMIENTO ESCISIONAL ENTRE EL 10% AL 19% DE SUPERFICIE CORPORAL EN AREA GENERAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(631, '11659010-b93a-11ee-a51e-c3966738e691', '862006', 'DESBRIDAMIENTO ESCISIONAL MENOR DEL 10% DE SUPERFICIE CORPORAL EN AREA GENERAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(630, '11658530-b93a-11ee-b471-5d7fb7076dcc', '862005', 'DESBRIDAMIENTO ESCISIONAL EN AREA ESPECIAL EN GENITALES', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(629, '11657ae0-b93a-11ee-856c-032229cffc43', '862004', 'DESBRIDAMIENTO ESCISIONAL EN AREA ESPECIAL EN TOBILLOS O PIES', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(628, '116570f0-b93a-11ee-b868-57b9e1159f93', '862003', 'DESBRIDAMIENTO ESCISIONAL EN AREA ESPECIAL EN MUÑECAS O MANO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(627, '11656680-b93a-11ee-83fb-cd377cfd68fe', '862002,\"DESBRIDAMIENTO ESCISIONAL EN AREA ESPECIAL EN PLIEGUES DE FLEXION (AXILA,ANTECUBITAL,HUECOS POPLITEOS,INGUINAL)\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(626, '11655b20-b93a-11ee-a4ed-8d86f2830817', '862001', ' DESBRIDAMIENTO ESCISIONAL EN AREA ESPECIAL EN CARA Y CUELLO ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(625, '11654f00-b93a-11ee-ad6e-c9715315637c', '8620', 'DESBRIDAMIENTO ESCISIONAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(624, '11654260-b93a-11ee-8c11-01dc436226ae', '862', 'ESCISION O ABLACION DE LESION O TEJIDO DE PIEL Y TEJIDO CELULAR SUBCUTANEO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(623, '11653550-b93a-11ee-879a-67e04cd7c7f0', '861905', 'RETIRO O SUSTITUCION DE DISPOSITIVO DE INFUSION ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(622, '116527a0-b93a-11ee-820f-b9196371d694', '861904', 'PROGRAMACION O REPROGRAMACION DE DISPOSITIVO DE INFUSION', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(621, '116518f0-b93a-11ee-a001-5d038e4062ed', '861903', 'RECAMBIO DE SUSTANCIA TERAPEUTICA EN DISPOSITIVO DE INFUSION', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(620, '11650720-b93a-11ee-a87d-a1eec0c77cb7', '861902', 'REVISION DE DISPOSITIVO DE INFUSION', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(619, '1164f940-b93a-11ee-b8d6-03c8dd5f85e8', '8619', 'REVISION O REPROGRAMACION O RETIRO DE DISPOSITIVOS DE INFUSION', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(618, '1164eaa0-b93a-11ee-8b17-0bccef5908e9', '861805', 'INSERCION DE BOMBA DE INFUSION TOTALMENTE IMPLANTABLE', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(617, '1164dcf0-b93a-11ee-8f83-15880a3a6652', '861804', 'INSERCION DE ESTIMULADOR ELECTRICO TRANSCUTANEO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(616, '1164d010-b93a-11ee-bf81-3fd18e2434f0', '861803', 'INSERCION DE CATETER SUBDERMICO (EPIDERMOCLISIS)', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(615, '1164c3e0-b93a-11ee-9e81-cf365fa114b3', '861801', 'INSECCION DE ANTICONCEPTIVOS SUBDERMICOS', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(614, '1164b500-b93a-11ee-8b5b-0fcfa7936044', '8618', 'INSPECCION DE DISPOSITIVO TERAPEUTICOEN PIEL O TEJIDO CELULAR SUBCUTANEA', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(613, '1164a8a0-b93a-11ee-a75d-3f2e9a18cadf', '861411', 'INYECCION DE MATERIAL MIORELAJANTE (TOXINA BOTULINICA)', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(612, '11649d40-b93a-11ee-ab27-7d3ef4d28269', '861410', 'TATUAJE INTRADERMICO O INYECCION DE PIGMENTOS OPACOS INSOLUBLES', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(611, '11649280-b93a-11ee-9bc8-9de0ff08b89d', '861403', 'INFILTRACION INTRALESIONAL CON MEDICAMENTO DE MAS DE DIEZ LESIONES', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(610, '11648820-b93a-11ee-9264-dbb81cdbc215', '861402', 'INFILTRACION INTRALESIONAL CON MEDICAMENTO ENTRE CINCO A DIEZ LESIONES', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(609, '11647dd0-b93a-11ee-9943-83dcc4a70560', '861401', 'INFILTRACION INTRALESIONAL CON MEDICAMENTO HASTA DE CINCO LESIONES', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(608, '11647140-b93a-11ee-a2b5-17334862c09d', '8614,\"INYECCION, INFILTRACION DE MATERIAL DE RELLENO O TATUAJE DE LESION O DEFECTO DE PIEL\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(607, '11646470-b93a-11ee-ba15-597be6ccd578', '861203', 'EXTRACCION DE ANTICONCEPTIVOS SUBDERMICOS POR INCISION', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(606, '11645800-b93a-11ee-af87-2d9d5a66caf2', '861202', 'EXTRACCION DE CUERPO EXTRAÑO EN PIEL O TEJIDO CELULAR SUBCUTANEO DE AREA ESPECIAL POR INCISIO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(605, '11644b00-b93a-11ee-a7f3-4d053823ec28', '861201', 'EXTRACCION DE CUERPO EXTRAÑO EN PIEL O TEJIDO CELULAR SUBCUTANEO DE AREA GENERAL POR INCISIO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(604, '11643e30-b93a-11ee-9504-c597d581c850', '8612', 'INCISION CON EXTRACCION DE CUERPO EXTRAÑO DE PIEL O TEJIDO CELULAR SUBCUTANE', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(603, '11642fd0-b93a-11ee-aa65-6d44997cddd7', '861104', 'DRENAJE DE COLECCIÓN PROFUNDA DE TEJIDOS BLANDO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(602, '116424b0-b93a-11ee-8e02-83d8b8512a69', '860103,\"DRENAJE DE HEMATOMA SUBUNGUEAL, POR INCISION O ASPIRACION\"', NULL, 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(601, '116419a0-b93a-11ee-a5e8-db4639e3d75e', '861102', 'DRENAJE DE COLECCIÓN PROFUNDA EN PIEL O TEJIDO CELULAR SUBCUTANEO POR INCISION O ASPIRACIO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(600, '11640cb0-b93a-11ee-be99-271b81630b6c', '861101', 'DRENAJE DE COLECCIÓN SUPERFICIAL DE PIEL O TEJIDO CELULAR SUBCUTANEO POR INCISION O ASPIRACIO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(599, '1163f660-b93a-11ee-a7f6-fd7255099b18', '8611', 'DRENAJE DE TEJIDOS BLANDOS', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(598, '1163e640-b93a-11ee-8c6a-9944539360fa', '861002', 'RESECCION QUIRURGICA DE MATERIALES EXOGENOS POR ALOGENOSIS CIRCUNFERENCIAL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(597, '1163da30-b93a-11ee-afce-f37131417ffc', '861001', 'RECECCION QUIRURGICA DE MATERIALES EXOGENOS POR ALOGENOSIS EN BLOQUE', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(596, '1163ce60-b93a-11ee-a08b-cdeaf2982b0d', '8610', 'RESECCION QUIRURGICA DE MATERIALES EXOGENOS POR ALOGENOSIS', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(595, '1163c2c0-b93a-11ee-b5bc-992e470a2b45', '861', 'INCISION DE PIEL Y TEJIDO CELULAR SUBCUTANEO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(594, '1163b6d0-b93a-11ee-9e92-d1d38920bba7', '860210', 'ESTUDIO FOTOBIOLOGICO (FOTOPARCHE)', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(593, '1163aa60-b93a-11ee-9e46-d7d33a009947', '860209', 'TRYPANOSOMA CRUZI PRUEBA (DE MACHADO GUERREIRO)', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(592, '11639f00-b93a-11ee-b349-29a661ed1428', '860208', 'PRUEBAS DE INTRADERMOREACCION PARA COMPROBAR INMUNIDAD CONTRA MICROORGANISMOS', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(591, '11639350-b93a-11ee-a8ad-cb46f27cad87', '860207', 'LEISHMANIA PRUEBA (DE MONTENEGRO)', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(590, '11638730-b93a-11ee-958c-eb0e37e03172', '860206', 'LEPROMINA PRUEBA (DE MITSUBA)', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(589, '11637bb0-b93a-11ee-922d-21b44f790034', '860205', 'TUBERCULINA PRUEBA (DE MANTOUX)', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(588, '11637020-b93a-11ee-b69e-75e253378c9b', '860204', 'PRUEBA INTRADERMOREACCION DE ESPOROTRIQUINA', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(587, '11636410-b93a-11ee-b9a5-8190b9805bb3', '860203', 'PRUEBA INTRADERMICA DE ALERGIA CON ESPECIFICACION O PUNTURA (AEROALERGENOS ALIMENTOS VENENOS DE INSECTOS O MEDICAMENTOS)', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(586, '11635850-b93a-11ee-b678-f940311c99dc', '860202', 'PRUEBA EPICUTANEA DE ALERGIA (PRUEBA DE PARCHE)', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(585, '11634ce0-b93a-11ee-9775-fdfde648c28f', '860201', 'PRUBA INTRADERMICA DE ALERGIA', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(584, '11634100-b93a-11ee-878c-67dc00ea5401', '8602', 'PRUEBAS DE SENSIBILIZACION EN PIEL', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(583, '116334e0-b93a-11ee-9192-653bca94c155', '860103', 'BIOPSIA ESCISIONAL DE UÑA (LECHO O MATRIZ', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(582, '116328f0-b93a-11ee-8480-87646ce4d1e0', '860102', 'BIOPSIA INCISIONAL O ESCISIONAL DE PIEL TEJIDO CELULAR SUBCITANEO O MUCUSA ( CON SUTURA)', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(581, '11631d60-b93a-11ee-a609-73007a707b7a', '860101', 'BIOPSIA DE PIEL CON SACABOCADO Y SUTURA SIMPLE', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34');
INSERT INTO `procedures` (`id`, `uuid`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(580, '116310f0-b93a-11ee-bfdc-0f9290fd2b20', '8601', 'BIPSIA DE PIEL Y TEJIDO CELULAR SUBCUTANEO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(579, '11630430-b93a-11ee-857e-197f6b268899', '860', 'PROCEDIMIENTOS DIAGNOSTICOS DIAGNOSTICOS EN PIEL Y TEJIDO CELULAR SUDCUTANEO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(578, '1162f350-b93a-11ee-81c6-9ded7ff68410', '86', 'PROCEDIMIENTOS EN PIEL Y TEJIDO CELULAR SUBCUTANEO', 'active', '2024-01-22 20:22:34', '2024-01-22 20:22:34'),
(577, '1162caa0-b93a-11ee-ad25-89dcd9dc6763', 'codigo', 'descripcion', 'deleted', '2024-01-22 20:22:34', '2024-01-22 20:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `prods`
--

CREATE TABLE `prods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `doctor` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `campus` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prodsitem`
--

CREATE TABLE `prodsitem` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `pd` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `procedure` varchar(191) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `category` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `subcategory` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `code` varchar(191) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` double(18,2) NOT NULL DEFAULT 0.00,
  `amount` int(11) NOT NULL DEFAULT 0,
  `stock` int(11) NOT NULL DEFAULT 0,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `uuid`, `company`, `category`, `subcategory`, `code`, `name`, `description`, `price`, `amount`, `stock`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ff952ab0-6140-11ee-b1a5-b14f508856cc', 1, 2, 2, '001', 'Dermapomada', 'Esta es una pomada', 20000.00, 15, 2, 'active', '2023-10-02 21:30:28', '2023-10-02 21:30:28'),
(2, '1fbcbb70-6141-11ee-9fd0-5b976a1bb2c2', 1, 3, 1, '002', 'Crema Hidratante piel de niña', 'esta es la crema', 50000.00, 10, 2, 'active', '2023-10-02 21:31:22', '2023-10-02 21:31:22');

-- --------------------------------------------------------

--
-- Table structure for table `pths`
--

CREATE TABLE `pths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `doctor` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `campus` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `annexes` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pths`
--

INSERT INTO `pths` (`id`, `uuid`, `doctor`, `user`, `company`, `campus`, `annexes`, `status`, `created_at`, `updated_at`) VALUES
(1, 'b5d91ba0-61f7-11ee-8fbd-bb21a1032bc2', 2, 2, 1, 1, 'se debe hacer', 'active', '2023-10-03 19:18:23', '2023-10-03 19:18:23'),
(2, '5dfadb90-6dff-11ee-8f12-098bc4d7c750', 2, 8, 1, 1, 'de acuerdo al procedimeinto se tomo muestra x que debe analuzarse', 'active', '2023-10-19 02:43:25', '2023-10-19 02:43:25'),
(3, '349a2ba0-bb85-11ee-b0d8-99294194b2e0', 2, 8, 1, 1, 'relaizar el procedimiento de estudio patologico', 'active', '2024-01-25 18:25:28', '2024-01-25 18:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `pthsitem`
--

CREATE TABLE `pthsitem` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `pt` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `code` varchar(191) DEFAULT NULL,
  `pathologie` varchar(191) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pthsitem`
--

INSERT INTO `pthsitem` (`id`, `uuid`, `pt`, `code`, `pathologie`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 'b5ddb410-61f7-11ee-bcd6-1df5c82f7f38', 1, 'X100', 'Histopatología', 'csda', 'active', '2023-10-03 19:18:23', '2023-10-03 19:18:23'),
(2, '5e024aa0-6dff-11ee-b78a-ed6b642c9083', 2, 'U100', 'Biopsia por Punción', 'piel dedo', 'active', '2023-10-19 02:43:25', '2023-10-19 02:43:25'),
(3, '349a6ae0-bb85-11ee-942f-2384b71e70d0', 3, 'X100', 'ESTUDIO HISTOPATOLOGICO', 'muestra 1 de aca', 'active', '2024-01-25 18:25:28', '2024-01-25 18:25:28'),
(4, '349a80c0-bb85-11ee-89bd-895847fe2fea', 3, '1001', 'BIOPSIA MAS ESTUDIO HISTOPATOLOGICO', 'muestra 2 de alla', 'active', '2024-01-25 18:25:28', '2024-01-25 18:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `querytypes`
--

CREATE TABLE `querytypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `code` varchar(191) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `price` double(18,2) NOT NULL DEFAULT 0.00,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `querytypes`
--

INSERT INTO `querytypes` (`id`, `uuid`, `company`, `code`, `name`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, '94604410-6141-11ee-9bbe-e78b511c7b2a', 1, '001', 'Dermatologia prrimera vez', 80000.00, 'active', '2023-10-02 21:34:38', '2023-10-02 21:34:38'),
(2, 'a4af2970-6141-11ee-a7d2-770f1a411f36', 1, '002', 'Dermatologia control', 60000.00, 'active', '2023-10-02 21:35:05', '2023-10-02 21:35:05'),
(3, 'c703b110-6141-11ee-8913-ebb988d97d6e', 1, '003', 'Procedimiento estetico laser minimo', 120000.00, 'active', '2023-10-02 21:36:03', '2023-10-02 21:36:03'),
(4, 'c6568f90-c1e9-11ee-bf1c-89964ffd3989', 4, '10014', 'Control de ACNE', 180000.00, 'active', '2024-02-02 21:40:29', '2024-02-02 21:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `doctor` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `campus` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `amount` double(18,2) NOT NULL DEFAULT 0.00,
  `state` varchar(191) NOT NULL DEFAULT 'COTIZACIÓN',
  `path_pdf` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `uuid`, `doctor`, `user`, `company`, `campus`, `amount`, `state`, `path_pdf`, `status`, `created_at`, `updated_at`) VALUES
(1, '1edc7720-63c2-11ee-b9be-ed23ba052d38', 6, 8, 1, 1, 260000.00, 'FACTURA', 'https://dermasoft.fullstackcolombia.com/storage/temp/f4NibzaUTmOnJCeuhSn31YcfXqUtVMIPCFTFdKLv.pdf', 'active', '2023-10-06 01:59:48', '2023-10-06 02:05:01'),
(2, 'e0e8c360-645a-11ee-9ce4-ed7d241c1122', 6, 8, 1, 1, 20000.00, 'FACTURA', 'https://dermasoft.fullstackcolombia.com/storage/temp/04tJtHk6FevqwGVyJYRSJgv31BuwHSRaA7VvvubG.pdf', 'active', '2023-10-06 20:13:17', '2024-01-12 17:57:44'),
(3, 'b695f910-6462-11ee-b87c-c1991ef4b583', 6, 8, 1, 1, 540000.00, 'FACTURA', 'https://dermasoft.fullstackcolombia.com/storage/temp/Y9PiZRYPPeAyGNTqagTI3OtDxIvcEILqO6xndsUX.pdf', 'active', '2023-10-06 21:09:22', '2024-01-26 18:59:20'),
(4, 'e326c150-6867-11ee-aeed-4bfe7390220a', 6, 8, 1, 1, 100000.00, 'COTIZACIÓN', 'https://dermasoft.fullstackcolombia.com/storage/temp/e7elcOjGhdxhgdfW6cvyd7nhZZ9i48GRBlkWAsZF.pdf', 'active', '2023-10-11 23:56:29', '2023-10-11 23:56:31');

-- --------------------------------------------------------

--
-- Table structure for table `quotesproducts`
--

CREATE TABLE `quotesproducts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `quote` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `product` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `price` double(18,2) NOT NULL DEFAULT 0.00,
  `amount` int(11) NOT NULL DEFAULT 0,
  `total` double(18,2) NOT NULL DEFAULT 0.00,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotesproducts`
--

INSERT INTO `quotesproducts` (`id`, `uuid`, `quote`, `product`, `price`, `amount`, `total`, `status`, `created_at`, `updated_at`) VALUES
(2, '7476f250-63c2-11ee-92de-07a721ff0183', 1, 2, 50000.00, 2, 100000.00, 'active', '2023-10-06 02:02:12', '2023-10-06 02:02:12'),
(3, '74771600-63c2-11ee-a36f-f50410eb8801', 1, 1, 20000.00, 4, 80000.00, 'active', '2023-10-06 02:02:12', '2023-10-06 02:02:12'),
(4, 'e0f09f60-645a-11ee-894e-f927611e8786', 2, 1, 20000.00, 1, 20000.00, 'active', '2023-10-06 20:13:17', '2023-10-06 20:13:17'),
(5, 'b6965760-6462-11ee-baf2-35f50a005abf', 3, 1, 20000.00, 2, 40000.00, 'active', '2023-10-06 21:09:22', '2023-10-06 21:09:22'),
(6, 'e328a1a0-6867-11ee-8648-47c080bc1e6c', 4, 1, 20000.00, 2, 40000.00, 'active', '2023-10-11 23:56:29', '2023-10-11 23:56:29');

-- --------------------------------------------------------

--
-- Table structure for table `quotesservices`
--

CREATE TABLE `quotesservices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `quote` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `service` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `price` double(18,2) NOT NULL DEFAULT 0.00,
  `amount` int(11) NOT NULL DEFAULT 0,
  `total` double(18,2) NOT NULL DEFAULT 0.00,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotesservices`
--

INSERT INTO `quotesservices` (`id`, `uuid`, `quote`, `service`, `price`, `amount`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, '1ee7c810-63c2-11ee-9649-bb59ebfbf196', 1, 1, 80000.00, 1, 80000.00, 'active', '2023-10-06 01:59:48', '2023-10-06 01:59:48'),
(4, 'ef2071a0-6462-11ee-adc3-b77cad6fa310', 3, 3, 250000.00, 2, 500000.00, 'active', '2023-10-06 21:10:57', '2023-10-06 21:10:57'),
(5, 'e329e270-6867-11ee-ba85-5d0466c4a224', 4, 2, 60000.00, 1, 60000.00, 'active', '2023-10-11 23:56:29', '2023-10-11 23:56:29');

-- --------------------------------------------------------

--
-- Table structure for table `recovery`
--

CREATE TABLE `recovery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `key` varchar(191) DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recovery`
--

INSERT INTO `recovery` (`id`, `uuid`, `user`, `key`, `status`, `created_at`, `updated_at`) VALUES
(3, 'ffbe7990-b55b-11ee-87e6-2b861e020e8d', 11, '7QNya1', 'active', '2024-01-17 22:15:23', '2024-01-17 22:15:23'),
(5, '921a3190-c694-11ee-ab02-351e710c44d6', 15, 'o1YbS6', 'active', '2024-02-08 20:13:10', '2024-02-08 20:13:10'),
(6, '45195f60-d007-11ee-a74e-b74a1a376a28', 8, 'qdrpet', 'active', '2024-02-20 20:46:53', '2024-02-20 20:46:53'),
(7, 'e5c1dae0-d008-11ee-98cb-0bd53dce29c8', 8, 'HWr0Ma', 'active', '2024-02-20 20:58:32', '2024-02-20 20:58:32'),
(8, '51972ff0-d01c-11ee-8709-017e10a23f6e', 8, 'fVYEj4', 'active', '2024-02-20 23:17:34', '2024-02-20 23:17:34'),
(9, '94b90dc0-d01c-11ee-b66f-176608cd9eba', 8, 'Ry1wRs', 'active', '2024-02-20 23:19:26', '2024-02-20 23:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `uuid`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'd89997a0-5f13-11ee-befd-a1a7daf4d315', 'Super Administrador', 'active', '2023-09-30 03:02:13', '2023-09-30 03:02:13'),
(2, 'd8a34030-5f13-11ee-a3de-b5c76e80872f', 'Administrador', 'active', '2023-09-30 03:02:13', '2023-09-30 03:02:13'),
(3, 'd8a36d10-5f13-11ee-a037-91ff60f684e3', 'Medico', 'active', '2023-09-30 03:02:13', '2023-09-30 03:02:13'),
(4, 'd8a39730-5f13-11ee-a37f-f11b5a924923', 'Administrativo', 'active', '2023-09-30 03:02:13', '2023-09-30 03:02:13'),
(5, 'd8a3c100-5f13-11ee-910d-81902e43b9bb', 'Paciente', 'active', '2023-09-30 03:02:13', '2023-09-30 03:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roles_id` bigint(20) UNSIGNED NOT NULL,
  `permissions_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `category` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `code` varchar(191) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `price` double(18,2) NOT NULL DEFAULT 0.00,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `uuid`, `company`, `category`, `code`, `name`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, '351495a0-6141-11ee-8006-bb41c79305e4', 1, 1, '001', 'Consulta por primera vez', 80000.00, 'active', '2023-10-02 21:31:58', '2023-10-02 21:31:58'),
(2, '4347a740-6141-11ee-87c9-bbfa9815ef61', 1, 1, '002', 'Consulta control', 60000.00, 'active', '2023-10-02 21:32:22', '2023-10-02 21:32:22'),
(3, '592d6af0-6141-11ee-93e2-119e92f3e0a1', 1, 1, '003', 'Procedimiento de Biopsia', 250000.00, 'active', '2023-10-02 21:32:59', '2023-10-02 21:32:59'),
(4, '73c285a0-6141-11ee-acb3-2bbdc1770628', 1, 1, '004', 'Procedimiento estetico laser minimo', 120000.00, 'active', '2023-10-02 21:33:43', '2023-10-02 21:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `hours_quotes` int(11) NOT NULL DEFAULT 1,
  `hours_scheduling_web` int(11) NOT NULL DEFAULT 1,
  `time_consultation` int(11) NOT NULL DEFAULT 1,
  `time_consultation_text` varchar(191) NOT NULL DEFAULT '20 minutos',
  `hours_ntf` int(11) NOT NULL DEFAULT 1,
  `logo` text DEFAULT NULL,
  `epaycokey` text DEFAULT NULL,
  `epaycoidc` varchar(10) DEFAULT NULL,
  `epaycopri` text DEFAULT NULL,
  `chat` text DEFAULT NULL,
  `whatsapp` text DEFAULT NULL,
  `video` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `uuid`, `hours_quotes`, `hours_scheduling_web`, `time_consultation`, `time_consultation_text`, `hours_ntf`, `logo`, `epaycokey`, `epaycoidc`, `epaycopri`, `chat`, `whatsapp`, `video`, `created_at`, `updated_at`) VALUES
(1, 'd8a3ecc0-5f13-11ee-8db0-8193f57741ce', 1, 1, 1, '20 minutos', 1, 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/vLrm4yK1z5B66SuO0ucXGiGFO1UMlQESFjxUQnFK.jpg', NULL, NULL, NULL, NULL, NULL, 'https://www.youtube.com/embed/uq4RlhClsq8', '2023-09-30 03:02:13', '2024-01-26 21:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(191) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `uuid`, `user`, `company`, `name`, `url`, `status`, `created_at`, `updated_at`) VALUES
(1, '7fa76710-6127-11ee-aa1e-13dcd917076b', 2, 1, 'Teleconsulta', 'https://dermasoft.fullstackcolombia.com/storage/uploads/hS9WFNiPCFvlz59ekkx9egWaNvqpTMC7EEKnjS4r.jpg', 'active', '2023-10-02 18:27:56', '2023-10-02 18:27:56'),
(2, '911ee980-6127-11ee-8668-4b6da752b9a0', 2, 1, 'Servicios dermatologicos', 'https://dermasoft.fullstackcolombia.com/storage/uploads/HlSx9GISh23KHxival2kMx997t2qUhEJjjcyCe11.jpg', 'active', '2023-10-02 18:28:26', '2023-10-02 18:28:26'),
(3, 'aa4cd1f0-6127-11ee-b3b9-956e6f8e7b5a', 2, 1, 'Conferencias', 'https://dermasoft.fullstackcolombia.com/storage/uploads/o8KiiooKpjAdBahIvEmksm8hzb0lIZAb0YrtOGWF.jpg', 'active', '2023-10-02 18:29:08', '2023-10-02 18:29:08'),
(4, 'b52a92d0-6127-11ee-8010-73bbc8863b79', 2, 1, 'presentacion', 'https://dermasoft.fullstackcolombia.com/storage/uploads/Pw0iUgUuRuP9vCM33nH9AILroKwTOkUqyfrsCTBF.png', 'active', '2023-10-02 18:29:26', '2023-10-02 18:29:26'),
(5, 'b29728c0-613b-11ee-b28e-81d40f52b6e7', 2, 1, '1', 'https://dermasoft.fullstackcolombia.com/storage/uploads/LtQwU0405nH7xtwrqrOTmTyBIvOH6ZQJmpi9XPEr.jpg', 'active', '2023-10-02 20:52:32', '2023-10-02 20:52:32'),
(6, 'bb091f70-613b-11ee-976d-4f596d52286c', 2, 1, '2', 'https://dermasoft.fullstackcolombia.com/storage/uploads/vA4C56dnqdY4uPVhQy5Ffpkx5eteVJZvvedyAUOk.jpg', 'active', '2023-10-02 20:52:46', '2023-10-02 20:52:46'),
(7, 'c3632f30-613b-11ee-a13e-99aaa50aa8b7', 2, 1, '3', 'https://dermasoft.fullstackcolombia.com/storage/uploads/jPrbHOxcOE6THTwdM6PQP1yt5e8nzs2v6wV83fnM.jpg', 'active', '2023-10-02 20:53:00', '2023-10-02 20:53:00'),
(8, '26965040-613c-11ee-ad52-d9b030002c8a', 2, 1, '5', 'https://dermasoft.fullstackcolombia.com/storage/uploads/cQSRoCtfmTc3sdcJ5r4Iu8Yn4gk2mE7kMfTeOpUi.jpg', 'active', '2023-10-02 20:55:46', '2023-10-02 20:55:46'),
(9, '1e9dcb20-b3dc-11ee-b076-ad2ee5c7c45d', 2, 1, 'otro', 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/xSIBx75d20OUPfPdHM5da10hvbfQkrHnm09kHfq6.jpg', 'active', '2024-01-16 00:27:28', '2024-01-16 00:27:28'),
(10, 'cff0c460-b618-11ee-8ac4-d1bed0f2b596', 12, 4, 'SUPER PROMOCION DE SKINPEN', 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/vayEBm6wvV6QoyJ6hG5BoII6UDt8Gjqt4v7Lnman.jpg', 'active', '2024-01-18 20:46:57', '2024-01-18 20:46:57'),
(11, '293faca0-b619-11ee-9f93-bb95504d0daa', 12, 4, 'HILOS TENSORES', 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/tzW3knJIJK8v8idOA1svS6ITohH9LDphaxQHlBMQ.jpg', 'active', '2024-01-18 20:49:27', '2024-01-18 20:49:27'),
(12, 'a98c5420-b619-11ee-9584-5bdb9ec7ae3d', 12, 4, 'DDD', 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/doqUKqnvpFZstMoDqsEhVOJ0VangQtPyZhYOBUjf.jpg', 'active', '2024-01-18 20:53:03', '2024-01-18 20:53:03');

-- --------------------------------------------------------

--
-- Table structure for table `solicitude`
--

CREATE TABLE `solicitude` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `campus` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `doctor` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `qt_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `query_type` varchar(191) DEFAULT NULL,
  `modality` varchar(191) DEFAULT NULL,
  `date_quote` varchar(191) DEFAULT NULL,
  `time_quote` varchar(191) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `solicitude`
--

INSERT INTO `solicitude` (`id`, `uuid`, `user`, `company`, `campus`, `doctor`, `qt_id`, `query_type`, `modality`, `date_quote`, `time_quote`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, '6453e500-61f4-11ee-b36d-bf984fd4e743', 2, 1, 0, 0, 1, 'Dermatologia prrimera vez', NULL, NULL, NULL, NULL, 'active', '2023-10-03 18:54:37', '2023-10-03 18:54:50'),
(2, 'a07d71e0-61f5-11ee-a4d0-81f7ad1d0923', 2, 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 'active', '2023-10-03 19:03:28', '2023-10-03 19:03:28'),
(3, 'e8d1ae10-620e-11ee-a6cb-619d88cd2d7c', 8, 1, 0, 6, 1, 'Dermatologia prrimera vez', NULL, NULL, NULL, NULL, 'active', '2023-10-03 22:04:27', '2023-10-03 22:04:43'),
(4, 'df4a9730-645b-11ee-83ac-ab8b18bb5c9f', 8, 1, 0, 6, 1, 'Dermatologia prrimera vez', 'Presencial', '2023-10-10', '09:00', 'crear', 'finalized', '2023-10-06 20:20:24', '2023-10-06 20:21:49'),
(5, '8d4d4fb0-645c-11ee-ad32-e5d8d0bdd302', 8, 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 'active', '2023-10-06 20:25:16', '2023-10-06 20:25:16'),
(6, 'ce1562d0-645c-11ee-9bcc-21032b632c20', 8, 1, 0, 6, 1, 'Dermatologia prrimera vez', NULL, NULL, NULL, NULL, 'active', '2023-10-06 20:27:05', '2023-10-06 20:28:51'),
(7, '7c9d6840-6463-11ee-ae06-752e88d41a53', 8, 1, 0, 6, 1, 'Dermatologia prrimera vez', 'Presencial', '2023-10-17', '01:30', NULL, 'finalized', '2023-10-06 21:14:55', '2023-10-06 21:18:17'),
(8, 'b0993890-6467-11ee-b17a-6904eb3f0daf', 8, 1, 0, 6, 1, 'Dermatologia prrimera vez', 'Presencial', '2023-10-16', '02:30', 'XCASCAS', 'finalized', '2023-10-06 21:45:00', '2023-10-06 21:47:51'),
(9, '82e47bc0-6863-11ee-bf16-0b9acf7e50a1', 8, 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 'active', '2023-10-11 23:25:10', '2023-10-11 23:25:10'),
(10, '05325050-6867-11ee-8e43-515227411af9', 8, 1, 0, 6, 1, 'Dermatologia prrimera vez', 'Presencial', '2023-10-24', '00:00', 'vsvgsag', 'finalized', '2023-10-11 23:50:17', '2023-10-11 23:51:52'),
(11, 'e1045ff0-6d39-11ee-b9b3-d3f3d92e9f64', 8, 1, 0, 0, 2, 'Dermatologia control', NULL, NULL, NULL, NULL, 'active', '2023-10-18 03:09:45', '2023-10-18 03:09:53'),
(12, '1d573190-6d3a-11ee-bdb1-71b52c1c6890', 8, 1, 0, 6, 1, 'Dermatologia prrimera vez', 'Presencial', '2023-10-31', '00:00', NULL, 'finalized', '2023-10-18 03:11:26', '2023-10-18 03:13:02'),
(13, '43d883b0-863d-11ee-9b37-4329d491b37a', 8, 1, 0, 6, 1, 'Dermatologia prrimera vez', NULL, NULL, NULL, NULL, 'active', '2023-11-18 23:06:58', '2023-11-18 23:07:48'),
(14, '3a83bfd0-893e-11ee-99bb-f33943120450', 8, 1, 0, 0, 1, 'Dermatologia prrimera vez', NULL, NULL, NULL, NULL, 'active', '2023-11-22 18:51:25', '2023-11-22 18:52:04'),
(15, '47faa340-96bf-11ee-8a53-d9c902eeb248', 8, 1, 0, 6, 1, 'Dermatologia prrimera vez', NULL, NULL, NULL, NULL, 'active', '2023-12-09 23:17:58', '2023-12-09 23:18:15'),
(16, 'f4392d80-9f41-11ee-960e-f90ef8b376fc', 8, 1, 0, 6, 1, 'Dermatologia prrimera vez', 'Teleconsulta', '2023-12-25', '05:00', 'esta', 'finalized', '2023-12-20 19:13:31', '2023-12-20 19:17:35'),
(17, '100ee200-9f5a-11ee-8184-2ffb5048af3e', 8, 1, 0, 6, 1, 'Dermatologia prrimera vez', 'Presencial', '2023-12-25', '00:00', NULL, 'finalized', '2023-12-20 22:06:06', '2023-12-20 22:07:04'),
(18, '4416b160-b149-11ee-b362-0d290e70976f', 8, 1, 0, 6, 1, 'Dermatologia prrimera vez', 'Presencial', '2024-01-16', '03:00', 'esta es una nota', 'finalized', '2024-01-12 17:51:12', '2024-01-12 17:53:15'),
(19, '07ec3d10-c1ea-11ee-b057-6339ec4e0fde', 12, 4, 0, 0, 4, 'Control de ACNE', NULL, NULL, NULL, NULL, 'active', '2024-02-02 21:42:19', '2024-02-02 21:42:27'),
(20, 'd2f83770-c68b-11ee-96f8-bdffbeec26bf', 8, 1, 0, 6, 2, 'Dermatologia control', 'Teleconsulta', '2024-02-08', '10:00', 'NINGUNA', 'pending', '2024-02-08 19:10:33', '2024-02-08 19:11:32'),
(21, '4558e1c0-c68c-11ee-aad3-2f2ede9fb5f2', 8, 1, 0, 6, 2, 'Dermatologia control', 'Teleconsulta', '2024-02-08', '10:30', 'ESTA', 'finalized', '2024-02-08 19:13:45', '2024-02-08 19:15:49'),
(22, 'b7f617f0-c6af-11ee-89aa-a182ea0e5418', 8, 1, 0, 6, 1, 'Dermatologia prrimera vez', 'Presencial', '2024-02-09', '02:00', 'es para añgo', 'finalized', '2024-02-08 23:27:30', '2024-02-08 23:28:38');

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE `specialties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`id`, `uuid`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, '5f2d22a0-606b-11ee-aab9-3982ffad0406', 'Dermatología Pediátrica', 'Se enfoca en tratar afecciones de la piel en bebés, niños y adolescentes.', 'active', '2023-10-01 20:01:16', '2023-10-01 20:01:16'),
(2, '6da2e140-606b-11ee-b08e-558822706124', 'Dermatología Cosmética y Estética', 'Se centra en mejorar la apariencia de la piel y abordar preocupaciones estéticas mediante procedimientos no invasivos e invasivos.', 'active', '2023-10-01 20:01:41', '2023-10-01 20:01:41'),
(3, '7b23e6c0-606b-11ee-a7d6-55e940955fa0', 'Dermatopatología', 'specialidad que se encarga del estudio e interpretación de muestras de tejido de la piel para diagnosticar enfermedades de la piel a nivel microscópico', 'active', '2023-10-01 20:02:03', '2023-10-01 20:02:03'),
(4, '88cbe2e0-606b-11ee-a374-693b104df25c', 'Dermatología Oncológica', 'Se dedica al diagnóstico y tratamiento del cáncer de piel y otras condiciones malignas relacionadas con la piel.', 'active', '2023-10-01 20:02:26', '2023-10-01 20:02:26'),
(5, '959c4ad0-606b-11ee-854c-bf853b435204', 'Dermatología Inmunológica', 'Estudia las enfermedades de la piel relacionadas con el sistema inmunológico y las reacciones autoinmunes.', 'active', '2023-10-01 20:02:48', '2023-10-01 20:02:48'),
(6, 'a2eff140-606b-11ee-a13b-7103840d3c4b', 'Dermatología Quirúrgica', 'Incluye procedimientos quirúrgicos para tratar afecciones de la piel, como extirpación de tumores cutáneos, cirugía reconstructiva y procedimientos de rejuvenecimiento facial', 'active', '2023-10-01 20:03:10', '2023-10-01 20:03:10'),
(7, 'b3d45e60-606b-11ee-b014-9d8a724f47e9', 'Dermatología Clínica General', 'Es la atención y tratamiento general de una amplia variedad de enfermedades y trastornos de la piel, cabello y uñas', 'active', '2023-10-01 20:03:38', '2023-10-01 20:03:38'),
(8, 'bfe2e250-606b-11ee-9fe2-01dcfc2c5bb0', 'Dermatología Geriátrica', 'Se centra en el diagnóstico y tratamiento de afecciones de la piel en personas de edad avanzada.', 'active', '2023-10-01 20:03:59', '2023-10-01 20:03:59'),
(9, '47cf9e00-b938-11ee-a3df-b505964edcda', 'Especialidad x', 'Atencion de pacientes x', 'deleted', '2024-01-22 20:09:46', '2024-01-22 20:10:14');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(191) DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `uuid`, `company`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, '99d6aff0-6140-11ee-a5a4-1d78c0e309ca', 1, 'CREMAS', 'active', '2023-10-02 21:27:38', '2023-10-02 21:27:38'),
(2, 'a1791a30-6140-11ee-a904-f7a546aabc5d', 1, 'POMADAS', 'active', '2023-10-02 21:27:50', '2023-10-02 21:27:50'),
(3, 'ac1e6fb0-6140-11ee-9c4f-c33ee1c1ec83', 1, 'POLVOS PARA LA CARA', 'active', '2023-10-02 21:28:08', '2023-10-02 21:28:08'),
(4, 'b3ce1970-6140-11ee-9d1d-05664309a78d', 1, 'LABIALES MEDICADOS', 'active', '2023-10-02 21:28:21', '2023-10-02 21:28:21');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `stripe_id` varchar(191) NOT NULL,
  `stripe_status` varchar(191) NOT NULL,
  `stripe_price` varchar(191) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(191) NOT NULL,
  `stripe_product` varchar(191) NOT NULL,
  `stripe_price` varchar(191) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thematic`
--

CREATE TABLE `thematic` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `date_init` varchar(191) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'Nuevo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `uuid`, `user`, `date_init`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'd3dc1800-6142-11ee-a311-593dce71a4e4', 2, '2023-10-02 16:43:34', 'SOLICITUD', 'Necesito crear otro procedimiento', 'Finalizado', '2023-10-02 21:43:34', '2023-10-02 21:54:57'),
(2, '6e619800-61fd-11ee-b2d7-b1ceae6db97a', 5, '2023-10-03 14:59:20', 'hola', 'este es un soporte', 'Finalizado', '2023-10-03 19:59:20', '2023-10-03 20:00:21'),
(3, '99d9e9c0-babc-11ee-ab2a-efbd248d54a8', 2, '2024-01-24 13:29:29', 'hola', 'jpñs', 'Finalizado', '2024-01-24 18:29:29', '2024-01-24 18:41:35'),
(4, 'be5a9d30-bc61-11ee-b6f6-99a2110d7301', 12, '2024-01-26 15:44:08', 'consentimiento informado', 'al realizar la firma del paciente nos sale error', 'Finalizado', '2024-01-26 20:44:08', '2024-01-26 20:48:52');

-- --------------------------------------------------------

--
-- Table structure for table `ticketmsj`
--

CREATE TABLE `ticketmsj` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `ticket` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `date_init` varchar(191) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `file` text DEFAULT NULL,
  `typemsj` varchar(191) NOT NULL DEFAULT 'Cliente',
  `status` varchar(191) NOT NULL DEFAULT 'Nuevo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticketmsj`
--

INSERT INTO `ticketmsj` (`id`, `uuid`, `user`, `ticket`, `date_init`, `title`, `description`, `file`, `typemsj`, `status`, `created_at`, `updated_at`) VALUES
(1, 'd3dfa540-6142-11ee-bad9-c37c239a6cae', 2, 1, '2023-10-02 16:43:34', 'SOLICITUD', 'Necesito crear otro procedimiento', 'https://dermasoft.fullstackcolombia.com/storage/uploads/dey9sD4fCttlvBkI19UzxcWpEfhEz5AFRP4HZShu.jpg', 'Cliente', 'Nuevo', '2023-10-02 21:43:34', '2023-10-02 21:43:34'),
(2, '1b210e20-6143-11ee-8e25-ad6fee9e1945', 1, 1, '2023-10-02 16:45:34', 'Rta solicitud', 'Ya fue creado el procedimiento', '', 'Cliente', 'Nuevo', '2023-10-02 21:45:34', '2023-10-02 21:45:34'),
(3, 'f32e7b90-6143-11ee-a4b9-1fc5aee1dc84', 1, 1, '2023-10-02 16:51:36', 'Atendido', 'Gracias', '', 'Cliente', 'Nuevo', '2023-10-02 21:51:36', '2023-10-02 21:51:36'),
(4, '5fc0f900-6144-11ee-9fee-e14b040855a3', 1, 1, '2023-10-02 16:54:38', 'ok', 'ok', 'https://dermasoft.fullstackcolombia.com/storage/uploads/U1LiQluBpbBPgfrqY9FEY8VydHxugJTa68TwFqlH.png', 'Cliente', 'Nuevo', '2023-10-02 21:54:38', '2023-10-02 21:54:38'),
(5, '6e627870-61fd-11ee-848f-83b291d3d349', 5, 2, '2023-10-03 14:59:20', 'hola', 'este es un soporte', 'https://dermasoft.fullstackcolombia.com/storage/uploads/6Hj3c5EF0BUhpsmKWL8rCAGjOoP6Pq53BnvxFZmZ.jpg', 'Cliente', 'Nuevo', '2023-10-03 19:59:20', '2023-10-03 19:59:20'),
(6, '8e5937c0-61fd-11ee-815a-5165afde0ccd', 1, 2, '2023-10-03 15:00:13', 'respuesta', 'ok ya', 'https://dermasoft.fullstackcolombia.com/storage/uploads/855Ofe3ufTC3PykcZV5de5B0tyrQQPCap4OLSuFh.jpg', 'Cliente', 'Nuevo', '2023-10-03 20:00:13', '2023-10-03 20:00:13'),
(7, '99da0e80-babc-11ee-9a2a-2d2f3fee5090', 2, 3, '2024-01-24 13:29:29', 'hola', 'jpñs', '', 'Cliente', 'Nuevo', '2024-01-24 18:29:29', '2024-01-24 18:29:29'),
(8, 'b504e720-babc-11ee-9008-cf77fd500c7a', 1, 3, '2024-01-24 13:30:14', 'pl', 'sdcfwsd', '', 'Cliente', 'Nuevo', '2024-01-24 18:30:14', '2024-01-24 18:30:14'),
(9, '22f87a00-babd-11ee-814e-c747e25d2284', 2, 3, '2024-01-24 13:33:19', 'ok', 'graciass', '', 'Cliente', 'Nuevo', '2024-01-24 18:33:19', '2024-01-24 18:33:19'),
(10, 'be5c1bb0-bc61-11ee-8011-8125b9939f45', 12, 4, '2024-01-26 15:44:08', 'consentimiento informado', 'al realizar la firma del paciente nos sale error', 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/HCUhuUMcPzUApPVmApPs0DMoaderU9Oybjhe7vNF.jpg', 'Cliente', 'Nuevo', '2024-01-26 20:44:08', '2024-01-26 20:44:08'),
(11, '1ee3d1c0-bc62-11ee-b78b-21348956cbeb', 14, 4, '2024-01-26 15:46:50', 'se gestiono', 'se realiza la verificacion del la firma del consentimiento', '', 'Cliente', 'Nuevo', '2024-01-26 20:46:50', '2024-01-26 20:46:50');

-- --------------------------------------------------------

--
-- Table structure for table `tplmails`
--

CREATE TABLE `tplmails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tplmails`
--

INSERT INTO `tplmails` (`id`, `uuid`, `company`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, '5317cd80-61e9-11ee-b4ca-1b4cba4d092e', 1, 'PLANITILLA PRUEBA', '<h1>Descubre Nuestros Servicios Dermatológicos y Cuidados de la Piel</h1><p>Estimado/a [Nombre del Cliente],</p><p>En [Nombre de la Clínica Dermatológica], nos complace ofrecerte una amplia gama de servicios especializados para el cuidado de tu piel y mantenerla en óptimas condiciones. Descubre a continuación algunos de nuestros servicios destacados:</p><ul>            <li>Consulta dermatológica personalizada</li><li>Tratamientos de rejuvenecimiento facial</li><li>Terapias para el acné y manchas en la piel</li><!-- Agrega más servicios aquí --></ul><p>No dudes en contactarnos para obtener más información o agendar tu próxima cita. ¡Estamos aquí para cuidar de tu piel y brindarte el mejor servicio!</p><p>¡Esperamos verte pronto en [Nombre de la Clínica Dermatológica]!</p><p>Atentamente,</p><p>Equipo de [Nombre de la Clínica Dermatológica]</p><div class=\"container\"><a href=\"[Enlace a tu Sitio Web]\" class=\"button\">Explora Nuestros Servicios</a></div>', 'active', '2023-10-03 17:35:24', '2023-10-03 17:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `directed_to` varchar(191) NOT NULL DEFAULT 'Todos',
  `views` text DEFAULT NULL,
  `type_url` varchar(191) NOT NULL DEFAULT 'PDF',
  `url` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `uuid`, `user`, `company`, `name`, `description`, `directed_to`, `views`, `type_url`, `url`, `status`, `created_at`, `updated_at`) VALUES
(1, 'd03396c0-6213-11ee-8de5-759076a2d62a', 1, 0, 'TESTEO', 'En el presente video se visualizara la respectiva infromacion ppara las respectivas correcciones', 'Todos', NULL, 'URL', 'https://youtu.be/yqxBjKHEG74', 'deleted', '2023-10-03 22:39:33', '2024-01-24 19:06:15'),
(2, '9e0d2ba0-6951-11ee-b390-7d5ffb969d5e', 1, 0, 'xx', 'xxxxxx', 'Users', '2', 'Archivo', 'https://dermasoft.fullstackcolombia.com/storage/uploads/a33o2fDx7rONO2lIO2oJ9zTlNeHhCaUyh3430KQX.mp4', 'deleted', '2023-10-13 03:49:35', '2024-01-24 19:06:23'),
(3, 'c9878790-6951-11ee-b40b-bd27d40596e5', 1, 0, 'xx', 'xxxxxx', 'Users', NULL, 'URL', 'https://www.youtube.com/watch?v=vEYQIkflNvo', 'deleted', '2023-10-13 03:50:48', '2024-01-24 19:06:28'),
(4, '912366d0-babe-11ee-aa9c-c5bb5afbfa7a', 1, 0, 'entrenamiento', 'este es un entremanie', 'Roles', '2', 'URL', 'https://www.youtube.com/embed/7b9Bv-hFoeI', 'deleted', '2024-01-24 18:43:33', '2024-02-20 23:10:34'),
(5, '5439a5b0-bac0-11ee-9ed1-9bf5696f4d60', 1, 0, 'nuevo capa', 'capacitacion', 'Users', '2', 'URL', 'https://www.youtube.com/embed/nSstOv7i05U', 'deleted', '2024-01-24 18:56:10', '2024-02-20 23:10:40'),
(6, '7111e830-bac0-11ee-8d9d-8b965ddc35aa', 1, 0, 'nuevo', 'capacitacion', 'Users', NULL, 'URL', 'https://www.youtube.com/embed/nSstOv7i05U', 'deleted', '2024-01-24 18:56:58', '2024-01-24 19:04:28'),
(7, '22d42b20-bac1-11ee-a1f3-7d28c04a0364', 1, 0, 'esta capacitacion', 'aca se visualiza esto', 'Users', '2', 'URL', 'https://www.youtube.com/embed/nSstOv7i05U', 'deleted', '2024-01-24 19:01:57', '2024-01-24 19:04:24'),
(8, '6db12ee0-bac1-11ee-b9cb-c7dc8ff8ae3a', 1, 0, 'esta capacitacion', 'aca se visualiza esto', 'Users', '2', 'URL', 'https://www.youtube.com/embed/nSstOv7i05U', 'deleted', '2024-01-24 19:04:02', '2024-01-24 19:04:19'),
(9, 'e1640210-bbfc-11ee-8220-35792fbf3d8c', 2, 1, 'Ejemplo', 'esto es solo un ejemplo', 'Roles', '3', 'URL', 'https://www.youtube.com/embed/lkupUddL4ww', 'active', '2024-01-26 08:42:08', '2024-02-20 23:26:32'),
(10, 'ed0f24e0-bc4e-11ee-ac47-099c3fdf4a3e', 1, 0, 'cacion', 'esta e suna cancion', 'Todos', NULL, 'URL', 'https://www.youtube.com/embed/92-gZRe3T8Y', 'inactive', '2024-01-26 18:29:26', '2024-02-20 23:10:54'),
(11, 'ca183290-bc5a-11ee-b4c8-0d9fafabbf4a', 1, 0, 'cronograma', 'este es el cronograma de entrega', 'Roles', '2', 'Archivo', 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/wd5zCRX7XjxdUKe1Ys4GsIghrj2S6q858XDNcumy.pdf', 'inactive', '2024-01-26 19:54:21', '2024-02-20 23:11:12'),
(12, 'f03940b0-bc5f-11ee-b954-87a67e74fa3c', 14, 0, 'HILOS TENSORES', 'en esta capacitacion buscamos que tengas el conocimiento que pueden presentar los hilos tensores', 'Roles', '2,3', 'URL', 'https://www.youtube.com/embed/THfK0dp2TWU', 'active', '2024-01-26 20:31:13', '2024-01-26 20:32:21'),
(13, 'd4a48550-c5f8-11ee-b3a1-6f0048b6db55', 1, 0, 'prueba documento', 'esta es una prueba', 'Users', '2', 'Archivo', 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/mUhUuuWq7aGk4cdZsZ7cHW14EMYDQzW6tAhei3VA.pdf', 'deleted', '2024-02-08 01:38:20', '2024-02-20 23:13:23'),
(14, 'ffc57950-d01a-11ee-a120-753295df93b5', 2, 1, 'capacitacion', 'esta es una capacitacion', 'Roles', '2', 'URL', 'https://www.youtube.com/embed/khB6DUHpR4o', 'active', '2024-02-20 23:08:07', '2024-02-20 23:08:23');

-- --------------------------------------------------------

--
-- Table structure for table `trainingsroles`
--

CREATE TABLE `trainingsroles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trainings_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `roles_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainingsroles`
--

INSERT INTO `trainingsroles` (`id`, `trainings_id`, `roles_id`, `created_at`, `updated_at`) VALUES
(1, 4, 2, NULL, NULL),
(2, 9, 3, NULL, NULL),
(3, 11, 2, NULL, NULL),
(4, 12, 2, NULL, NULL),
(5, 12, 3, NULL, NULL),
(6, 14, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trainingsusers`
--

CREATE TABLE `trainingsusers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trainings_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainingsusers`
--

INSERT INTO `trainingsusers` (`id`, `trainings_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 8, 2, NULL, NULL),
(2, 5, 2, NULL, NULL),
(3, 11, 2, NULL, NULL),
(4, 13, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `twofa`
--

CREATE TABLE `twofa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `email` varchar(191) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `keyresponse` text DEFAULT NULL,
  `code` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usermails`
--

CREATE TABLE `usermails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `mail_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `users_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `lastname` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `scd_name` varchar(191) DEFAULT NULL,
  `scd_lastname` varchar(191) DEFAULT NULL,
  `birth` varchar(191) DEFAULT NULL,
  `gender` varchar(191) DEFAULT NULL,
  `civil_status` varchar(191) DEFAULT NULL,
  `blood_type` varchar(191) DEFAULT NULL,
  `vital_state` varchar(191) DEFAULT NULL,
  `contact` varchar(191) DEFAULT NULL,
  `fix_phone` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `main_address` varchar(191) DEFAULT NULL,
  `secondary_address` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `department` varchar(191) DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `social_security` varchar(191) DEFAULT NULL,
  `affiliate_type` varchar(191) DEFAULT NULL,
  `affiliate_type_ssg` varchar(191) DEFAULT NULL,
  `education` varchar(191) DEFAULT NULL,
  `ethnic_group` varchar(191) DEFAULT NULL,
  `population_group` varchar(191) DEFAULT NULL,
  `occupation` varchar(191) DEFAULT NULL,
  `eps` varchar(191) DEFAULT NULL,
  `date_affiliation` varchar(191) DEFAULT NULL,
  `prepaid` varchar(191) DEFAULT NULL,
  `benefits_plan` varchar(191) DEFAULT NULL,
  `health_care` varchar(191) DEFAULT NULL,
  `notes` varchar(191) DEFAULT NULL,
  `contract_number` varchar(191) DEFAULT NULL,
  `occupational_hazards` varchar(191) DEFAULT NULL,
  `pension_funds` varchar(191) DEFAULT NULL,
  `attendant` varchar(191) DEFAULT NULL,
  `name_attendant` varchar(191) DEFAULT NULL,
  `relationship` varchar(191) DEFAULT NULL,
  `fix_phone_attendant` varchar(191) DEFAULT NULL,
  `phone_attendant` varchar(191) DEFAULT NULL,
  `document_type` varchar(191) DEFAULT NULL,
  `document_number` varchar(191) DEFAULT NULL,
  `landline` varchar(191) DEFAULT NULL,
  `regime` varchar(191) DEFAULT NULL,
  `stratum` varchar(191) DEFAULT NULL,
  `professional_card` varchar(191) DEFAULT NULL,
  `charge` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `specialty` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `campus` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `photo` text DEFAULT NULL,
  `photo_pp` text DEFAULT NULL,
  `signature` text DEFAULT NULL,
  `signature_pp` text DEFAULT NULL,
  `accept_habeas` text DEFAULT NULL,
  `role` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `habeas` varchar(20) NOT NULL DEFAULT 'no',
  `twofa` varchar(191) NOT NULL DEFAULT 'not',
  `modeswitch` varchar(191) NOT NULL DEFAULT 'light',
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(191) DEFAULT NULL,
  `pm_type` varchar(191) DEFAULT NULL,
  `pm_last_four` varchar(4) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `name`, `lastname`, `email`, `email_verified_at`, `password`, `scd_name`, `scd_lastname`, `birth`, `gender`, `civil_status`, `blood_type`, `vital_state`, `contact`, `fix_phone`, `phone`, `main_address`, `secondary_address`, `country`, `department`, `city`, `social_security`, `affiliate_type`, `affiliate_type_ssg`, `education`, `ethnic_group`, `population_group`, `occupation`, `eps`, `date_affiliation`, `prepaid`, `benefits_plan`, `health_care`, `notes`, `contract_number`, `occupational_hazards`, `pension_funds`, `attendant`, `name_attendant`, `relationship`, `fix_phone_attendant`, `phone_attendant`, `document_type`, `document_number`, `landline`, `regime`, `stratum`, `professional_card`, `charge`, `specialty`, `campus`, `company`, `photo`, `photo_pp`, `signature`, `signature_pp`, `accept_habeas`, `role`, `habeas`, `twofa`, `modeswitch`, `status`, `remember_token`, `created_at`, `updated_at`, `stripe_id`, `pm_type`, `pm_last_four`, `trial_ends_at`) VALUES
(1, 'd8a28b40-5f13-11ee-b1f8-1df17f415b4c', 'Super', 'Admin', 'info@example.com', '2023-09-30 03:02:13', '$2y$10$8MDrluQuAkWfXT.8DA/pFe3o7yXSQvX8yMFfQ53YyaArm89k4VWGq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3103451137', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 'http://app.dermasoft.mysoftware.live/storage/uploads/33YsF59I4YKjUtFM2p5Qq1ATWm7u5v25rC5iohBp.jpg', 'storage/uploads/33YsF59I4YKjUtFM2p5Qq1ATWm7u5v25rC5iohBp.jpg', NULL, NULL, NULL, 1, 'no', 'no', 'light', 'active', 'MFYbHfpu4mLekHE4vFPakljPnJDmvxI0hJpJITsWhJP6v9QsPIQCevuIEkjV', '2023-09-30 03:02:13', '2024-02-20 21:00:33', NULL, NULL, NULL, NULL),
(2, 'fad248c0-607b-11ee-9949-e1aa5973ffd1', 'carlos almeciga', '', 'alex1ptm@gmail.com', NULL, '$2y$10$0DCFiHQ66XvwpHrH9RvEdu4nFsd8yG1EsbWhqkugtfQCPgqr7OIY2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '30012345678', 'Calle 17 35 01', NULL, NULL, NULL, 'Bogota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cedula de ciudadanía', '123456', '7213501', NULL, NULL, '0', 1, 0, 1, 1, 'http://app.dermasoft.mysoftware.live/storage/uploads/NHRizQOYQC60yNogtRinY2E5gKhUvupKmFD55GWV.jpg', 'storage/uploads/NHRizQOYQC60yNogtRinY2E5gKhUvupKmFD55GWV.jpg', NULL, NULL, NULL, 2, 'no', 'no', 'light', 'active', NULL, '2023-10-01 22:00:10', '2024-02-20 23:25:04', NULL, NULL, NULL, NULL),
(3, '286df2b0-6150-11ee-b5e9-1f008164193e', 'Alfredo', '', 'alex1ptm_old@hotmail.com', '2023-10-02 23:18:59', '$2y$10$aX8obJCCBcMtdMxy8B6fD.Ftr2tbUwUJMWr6ajMxWRHyLE87Q3nqO', NULL, NULL, NULL, 'Masculino', NULL, NULL, NULL, NULL, NULL, '3022112345', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, 2, 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/gIMkOjxACVO2LEHNDCADWzV30tyKt8m62fBYlg6g.jpg', 'storage/uploads/gIMkOjxACVO2LEHNDCADWzV30tyKt8m62fBYlg6g.jpg', NULL, NULL, NULL, 2, 'no', 'not', 'light', 'active', NULL, '2023-10-02 23:18:59', '2023-10-02 23:18:59', NULL, NULL, NULL, NULL),
(4, 'c1e29130-6158-11ee-9fb9-f3c0e745d934', 'otto', 'todo', 'siervo.guzmanold@bioscenter.com.co', NULL, '$2y$10$glJ.AFOB6oylC19Hue1pleFNZl92uuTpNwLa6704SnanEr6XTTEMW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+57', '3103451137', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0123456', NULL, NULL, NULL, NULL, 0, 0, 2, 2, NULL, NULL, NULL, NULL, 'https://dermasoft.app.3dboosterstudio.com/storage/temp/13UojNkYFzPRKLa1mR1DxlYnifyTEKeSck64bRJj.pdf', 5, 'si', 'not', 'light', 'active', NULL, '2023-10-03 00:20:33', '2023-10-03 00:31:13', NULL, NULL, NULL, NULL),
(5, '7fde5540-61fa-11ee-8ab5-abce94231dd9', 'paciente', 'pueba', 'siervo.guzman598od@casur.gov.co', NULL, '$2y$10$wVQ/XeqvMX8dKcH8nrZm1.k7XNXQ3Eluk4e/n5vhEVspy.Lm3UaN2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+57', '3103451137', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '79872598', NULL, NULL, NULL, NULL, 0, 0, 1, 1, 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/KDiJwU6J3QiNHSqJUButNcdjvSaIiU9bWDSDOQh5.jpg', 'storage/uploads/KDiJwU6J3QiNHSqJUButNcdjvSaIiU9bWDSDOQh5.jpg', NULL, NULL, NULL, 5, 'no', 'no', 'light', 'deleted', NULL, '2023-10-03 19:38:21', '2023-10-03 20:10:08', NULL, NULL, NULL, NULL),
(6, 'd79a28e0-6200-11ee-aea8-f711232197fc', 'Medico', 'Prueba', 'vidrioschico.com@gmail.com', NULL, '$2y$10$46JBz2rxWf6d7C7J4Ebjt.nVpmAfjQxqYXUiIGAuY/9peAvoY/HUO', NULL, NULL, '2001-02-04', NULL, NULL, NULL, NULL, NULL, NULL, '30125116121', 'En la casa', 'fatima', NULL, NULL, 'bogota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cedula de ciudadanía', '789456', '2031522124', NULL, NULL, '018003025', 3, 7, 1, 1, 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/3l98ywEk6wvRsZZlCS9OrUL6MZ8X6HB7Qa55mqFL.jpg', 'storage/uploads/3l98ywEk6wvRsZZlCS9OrUL6MZ8X6HB7Qa55mqFL.jpg', 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/ZxCBmnGLbQ5XlT6BbTzkBvnS4UqGmCPvZ4p7uKqz.png', 'storage/uploads/ZxCBmnGLbQ5XlT6BbTzkBvnS4UqGmCPvZ4p7uKqz.png', NULL, 3, 'no', 'no', 'light', 'active', NULL, '2023-10-03 20:23:45', '2024-02-20 23:16:35', NULL, NULL, NULL, NULL),
(7, '829dbb40-6203-11ee-a218-d173f78aeaf9', 'paciente', 'pueba', 'siervo.guzman598@casur.gov.co', NULL, '$2y$10$.wN4pkyv8RtBuw.jWtoL3ulqFRrAfjqV2H6r7khV9vvLhmZVAe2LK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+57', '303451137', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '78686', NULL, NULL, NULL, NULL, 0, 0, 1, 1, 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/3v3oXJB6w5dHuwcpvktQ2ZdNxf817aWXSYNleaQ3.jpg', 'storage/uploads/3v3oXJB6w5dHuwcpvktQ2ZdNxf817aWXSYNleaQ3.jpg', NULL, NULL, NULL, 5, 'no', 'no', 'light', 'deleted', NULL, '2023-10-03 20:42:51', '2023-10-03 22:48:23', NULL, NULL, NULL, NULL),
(8, '4977e8d0-6204-11ee-b94b-479811af1a1c', 'paciente', 'prueba', 'siervo.guzman@bioscenter.com.co', NULL, '$2y$10$4DSEp2R8SvbtM8spnEKt6.YJpwWq0Tpp1FLUeCKnsgrwHvwmvD6hS', NULL, NULL, '2018-02-13', 'masculino', 'soltero', NULL, NULL, NULL, '+57', '3103451137', NULL, NULL, 'Colombia', 'BOGOTA', 'BOGOTA', NULL, NULL, NULL, NULL, NULL, NULL, 'EMPLEADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CARLOS TORRES', 'MADRE', '+57', '3118888544', 'cedula de ciudadanía', '310345', NULL, 'subsidiado', '2', NULL, 0, 0, 1, 1, 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/uUUBmak9e14PwzRYTQNaUnXSltbNOMddTs78I9xb.png', 'storage/uploads/uUUBmak9e14PwzRYTQNaUnXSltbNOMddTs78I9xb.png', 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/PenElIH8fxIzuJDc8k18DCaTwB8NRo4LBWVRS7J6.png', 'storage/uploads/PenElIH8fxIzuJDc8k18DCaTwB8NRo4LBWVRS7J6.png', 'https://dermasoft.app.3dboosterstudio.com/storage/temp/8bJnJvJtzifx5gvpMtjfoohrrguD8MyOB6A3gPnh.pdf', 5, 'si', 'not', 'light', 'active', NULL, '2023-10-03 20:48:24', '2023-10-18 02:23:51', NULL, NULL, NULL, NULL),
(9, '051d5e60-6d21-11ee-9e5c-1fab73027cd6', 'siervo', 'guzman', 'alex1ptm_@hotmail.com', NULL, '$2y$10$ZkIXqQAKJwcapIb/gnVvVunFgjZWVf.waJdeI53RrZGn2DJ/YMOBG', NULL, NULL, '1999-05-14', NULL, NULL, NULL, NULL, NULL, NULL, '315225221', 'calle 5 sur', 'fatima', NULL, NULL, 'bogota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cedula de ciudadanía', '789456', '358784854115', NULL, NULL, NULL, 2, 0, 1, 1, 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/FYp4K1BetXYHAsghAu2731kER2vsUoMsH212f2bt.jpg', 'storage/uploads/FYp4K1BetXYHAsghAu2731kER2vsUoMsH212f2bt.jpg', NULL, NULL, NULL, 4, 'no', 'no', 'light', 'active', NULL, '2023-10-18 00:11:48', '2023-10-18 00:15:36', NULL, NULL, NULL, NULL),
(10, '8f9ba8d0-b3b1-11ee-a051-e9efaff2f371', 'JENNIFER TORRES', '', 'jennifertorres665@gmail.com', NULL, '$2y$10$BhMkOjDQc9tb1bmozU30A.X98qNXzxRera7gCFFAYrYNUfq54jKKm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3017067245', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cedula de ciudadanía', '1023932242', NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, 'no', 'not', 'light', 'active', NULL, '2024-01-15 19:22:49', '2024-01-15 19:22:49', NULL, NULL, NULL, NULL),
(11, 'aaf37340-b55b-11ee-83b7-c36438455b07', 'edna', '', 'edna@bioscenter.com.co', '2024-01-17 22:13:00', '$2y$10$7fDKjiE6SsHuwuD6p/FT4Obmfch1EaFxE2btHwTZefM2S0an7ar4W', NULL, NULL, NULL, 'Femenino', NULL, NULL, NULL, NULL, NULL, '3103451137', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 3, 3, 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/soSgkq1J2BRsMIGJCUdvrrHin522SS8ySb729ZL5.jpg', 'storage/uploads/soSgkq1J2BRsMIGJCUdvrrHin522SS8ySb729ZL5.jpg', NULL, NULL, NULL, 2, 'no', 'not', 'light', 'active', NULL, '2024-01-17 22:13:00', '2024-01-17 22:16:45', NULL, NULL, NULL, NULL),
(12, '5fb2e400-b615-11ee-b464-795e79881160', 'ALBA CELY SOTO RIVERA', '', 'figurapielylaser@gmail.com', NULL, '$2y$10$FtTUF0YxqBmwfQh/roBHYe8GTwi/VDBOfaY7iGs66.JnQ6QBVOe.O', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3017067245', 'CALLE 40 B # 74F 22 SUR', NULL, NULL, NULL, 'BOGOTA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cedula de ciudadanía', '1023932242', '3134109274', NULL, NULL, '0', 2, 0, 4, 4, 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/I7GdZLh3XN8lrRH7N0eOIa9WboJQIulByEhAc1JP.jpg', 'storage/uploads/I7GdZLh3XN8lrRH7N0eOIa9WboJQIulByEhAc1JP.jpg', NULL, NULL, NULL, 2, 'no', 'no', 'light', 'active', NULL, '2024-01-18 20:22:21', '2024-02-02 20:48:04', NULL, NULL, NULL, NULL),
(13, 'd791b7d0-ba0a-11ee-8f6e-f52d2e1c2345', 'paciente x', 'apellido x', 'correox@gmail.com', NULL, '$2y$10$Ru4jbwaxrLcg6w2I.AuVfOBYVH5fYgHkUyvVrt9TDEdld0df5pxdu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+57', '310.3451137', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cedula de ciudadanía', '79872', NULL, NULL, NULL, NULL, 0, 0, 3, 3, NULL, NULL, NULL, NULL, 'https://dermasoft.app.3dboosterstudio.com/storage/temp/wbrW8IeygXwADovUVDXxFPfuN1pyRHOKVcW9cJAJ.pdf', 5, 'si', 'not', 'light', 'active', NULL, '2024-01-23 21:17:02', '2024-01-23 21:21:16', NULL, NULL, NULL, NULL),
(14, 'e07b0dc0-bc5c-11ee-a51e-a916f7fedc51', 'TANIA CELIS', '', 'tania.celis@claudiaarenas.com', NULL, '$2y$10$78yYzbcaqrsW/XcacLMXc.iCGYKtU6cRfQvP7BnZwDTlV1woY19vG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3134109274', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cedula de ciudadanía', '1023973153', NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, 'no', 'no', 'light', 'active', NULL, '2024-01-26 20:09:18', '2024-01-26 20:12:57', NULL, NULL, NULL, NULL),
(15, '02a4b630-c694-11ee-ba33-5db242ba40f2', 'CLAUDIA MARCELA', 'ARENAS SOTO', 'tania.celis0612@gmail.com', NULL, '$2y$10$UP49TJ2rwYu8EIkgwSNbpeX3KkfFWfEK4BBNNrJm6wFACr1bYXk6u', NULL, NULL, '1965-01-20', NULL, NULL, NULL, NULL, NULL, NULL, '313417245', 'calle 99 #48-06', 'CASTELLANA', NULL, NULL, 'BOGOTA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cedula de ciudadanía', '52874112', '3006159958', NULL, NULL, '1112236', 3, 7, 4, 4, NULL, NULL, 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/vWyCii5Prh3X72AllbzZxofiwKdH1fSygTf2CQf5.png', 'storage/uploads/vWyCii5Prh3X72AllbzZxofiwKdH1fSygTf2CQf5.png', NULL, 3, 'no', 'not', 'light', 'deleted', NULL, '2024-02-08 20:09:09', '2024-02-08 20:10:35', NULL, NULL, NULL, NULL),
(16, '33b7b740-c695-11ee-9f08-61c02139cb93', 'CLAUDIA MARCELA', 'ARENAS SOTO', 'jennifer.torres@claudiaarenas.com', NULL, '$2y$10$0D8XavxbXNzUuhXHhU8uGu8U.ZsmKk8BU8s3UQvQUxmi5B6bOLOlG', NULL, NULL, '1965-01-20', NULL, NULL, NULL, NULL, NULL, NULL, '3154133234', 'calle 99 #48-06', 'CASTELLANA', NULL, NULL, 'BOGOTA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cedula de ciudadanía', '52874112', '3006159958', NULL, NULL, '1112236', 3, 7, 4, 4, NULL, NULL, 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/AThqPEuRJnQEW4ql93mchWOu8GIv9MynUFdgMnTI.png', 'storage/uploads/AThqPEuRJnQEW4ql93mchWOu8GIv9MynUFdgMnTI.png', NULL, 3, 'no', 'no', 'light', 'active', NULL, '2024-02-08 20:17:41', '2024-02-08 20:20:03', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vitalsigns`
--

CREATE TABLE `vitalsigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `campus` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `heart_rate` varchar(191) DEFAULT NULL,
  `breathing_frequency` varchar(191) DEFAULT NULL,
  `weight` varchar(191) DEFAULT NULL,
  `blood_pressure` varchar(191) DEFAULT NULL,
  `temperature` varchar(191) DEFAULT NULL,
  `saturation` varchar(191) DEFAULT NULL,
  `querytype` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `note` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vitalsigns`
--

INSERT INTO `vitalsigns` (`id`, `uuid`, `user`, `company`, `campus`, `heart_rate`, `breathing_frequency`, `weight`, `blood_pressure`, `temperature`, `saturation`, `querytype`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, '02faedf0-61fb-11ee-9ffc-e9c7d710df11', 5, 1, 1, '2', '2', '2', '2', '2', '2', 1, 'ese ta bien', 'active', '2023-10-03 19:42:00', '2023-10-03 19:42:00'),
(2, 'e390da70-6206-11ee-bdd3-0b074173dca1', 8, 1, 1, '3', '3', '3', '3', '3', '3', 1, 'esta good', 'active', '2023-10-03 21:07:02', '2023-10-03 21:07:02'),
(3, '68b17150-6208-11ee-8375-61676ff8252a', 8, 1, 1, '4', '4', '4', '4', '4', '4', 1, 'fassdcs', 'active', '2023-10-03 21:17:55', '2023-10-03 21:17:55'),
(4, '11a75500-6f64-11ee-b2aa-09145a84a9b9', 8, 1, 1, '8', '8', '8', '8', '8', '8', 1, '22csdgvdsgvx', 'active', '2023-10-20 21:16:47', '2023-10-20 21:16:47'),
(5, '3bcd5990-6f64-11ee-ac1f-dbdf79b4dd77', 8, 1, 1, 'cv c', 'xcv<x', 'cxv<x', 'v<xcv', '<vxc', '<xcv<', 1, 'cv<zxv<z', 'active', '2023-10-20 21:17:58', '2023-10-20 21:17:58'),
(6, 'a2355d90-7035-11ee-930a-0bcc76137825', 8, 1, 1, '1', '1', '1', '1', '1', '1', 2, 'ndf', 'active', '2023-10-21 22:16:55', '2023-10-21 22:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `xsliders`
--

CREATE TABLE `xsliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(191) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `xsliders`
--

INSERT INTO `xsliders` (`id`, `uuid`, `user`, `name`, `url`, `status`, `created_at`, `updated_at`) VALUES
(1, '22d58550-a0de-11ee-9166-51f690d9c735', 1, 'NUEVA SERIE', 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/MxaNHdcMfWrMLD1Et0kulW7YoMVRv2Cx4QIZdOn0.jpg', 'active', '2023-12-22 20:24:02', '2024-01-27 00:36:17'),
(2, '2453a340-a0de-11ee-beee-07601cd55e60', 1, 'este es un slider', 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/eH2jvBxcTWXYm9qNlSoa6mbHXUkVDNNWvlOQcLNo.jpg', 'active', '2023-12-22 20:24:04', '2024-01-15 19:56:20'),
(3, 'd7ae92c0-afb6-11ee-93f8-d923f2903f50', 1, 'slider 1', 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/v2116cqwrtANoYgrg7BoW5qJu3FG88OBRMn1hESk.jpg', 'active', '2024-01-10 17:50:33', '2024-01-15 19:56:31'),
(4, 'f3f1ecf0-afb6-11ee-997e-63145c8d3100', 1, 'slider 2', 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/3OhgXBF5rMwnnvJIBPl8hL78BILq4AiOJhmyXbvl.jpg', 'active', '2024-01-10 17:51:20', '2024-01-15 19:56:49'),
(5, '6c136e20-b3dc-11ee-97bb-9b44902c9e25', 1, 'nuevo', 'https://dermasoft.app.3dboosterstudio.com/storage/uploads/VlloKYuXVzmgmFUMAyYMuxXG6BgtwVe73x8cJjBM.jpg', 'active', '2024-01-16 00:29:38', '2024-01-16 00:29:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `appointments_uuid_unique` (`uuid`),
  ADD KEY `appointments_user_foreign` (`user`),
  ADD KEY `appointments_company_foreign` (`company`),
  ADD KEY `appointments_campus_foreign` (`campus`),
  ADD KEY `appointments_qt_id_foreign` (`qt_id`),
  ADD KEY `appointments_doctor_foreign` (`doctor`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_uuid_unique` (`uuid`),
  ADD KEY `categories_company_foreign` (`company`);

--
-- Indexes for table `catfaqs`
--
ALTER TABLE `catfaqs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `catfaqs_uuid_unique` (`uuid`);

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `charges_uuid_unique` (`uuid`);

--
-- Indexes for table `checklistsecurity`
--
ALTER TABLE `checklistsecurity`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `checklistsecurity_uuid_unique` (`uuid`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_uuid_unique` (`uuid`),
  ADD KEY `companies_user_foreign` (`user`);

--
-- Indexes for table `consents`
--
ALTER TABLE `consents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `consents_uuid_unique` (`uuid`);

--
-- Indexes for table `dermatology`
--
ALTER TABLE `dermatology`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dermatology_uuid_unique` (`uuid`),
  ADD KEY `dermatology_user_foreign` (`user`),
  ADD KEY `dermatology_doctor_foreign` (`doctor`),
  ADD KEY `dermatology_company_foreign` (`company`),
  ADD KEY `dermatology_campus_foreign` (`campus`);

--
-- Indexes for table `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `diagnoses_uuid_unique` (`uuid`);

--
-- Indexes for table `diagnosestype`
--
ALTER TABLE `diagnosestype`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `diagnosestype_uuid_unique` (`uuid`);

--
-- Indexes for table `diary`
--
ALTER TABLE `diary`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `diary_uuid_unique` (`uuid`),
  ADD KEY `diary_user_foreign` (`user`),
  ADD KEY `diary_company_foreign` (`company`),
  ADD KEY `diary_campus1_foreign` (`campus1`),
  ADD KEY `diary_campus2_foreign` (`campus2`),
  ADD KEY `diary_campus3_foreign` (`campus3`),
  ADD KEY `diary_campus4_foreign` (`campus4`),
  ADD KEY `diary_campus5_foreign` (`campus5`),
  ADD KEY `diary_campus6_foreign` (`campus6`),
  ADD KEY `diary_campus7_foreign` (`campus7`);

--
-- Indexes for table `diaryprocedures`
--
ALTER TABLE `diaryprocedures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diaryprocedures_diary_id_foreign` (`diary_id`),
  ADD KEY `diaryprocedures_procedure_foreign` (`procedure`);

--
-- Indexes for table `diaryqt`
--
ALTER TABLE `diaryqt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diaryqt_diary_id_foreign` (`diary_id`),
  ADD KEY `diaryqt_qt_id_foreign` (`qt_id`);

--
-- Indexes for table `eodiagnostics`
--
ALTER TABLE `eodiagnostics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `eodiagnostics_uuid_unique` (`uuid`),
  ADD KEY `eodiagnostics_eo_foreign` (`eo`);

--
-- Indexes for table `eoexams`
--
ALTER TABLE `eoexams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `eoexams_uuid_unique` (`uuid`),
  ADD KEY `eoexams_eo_foreign` (`eo`);

--
-- Indexes for table `examorders`
--
ALTER TABLE `examorders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `examorders_uuid_unique` (`uuid`),
  ADD KEY `examorders_doctor_foreign` (`doctor`),
  ADD KEY `examorders_user_foreign` (`user`),
  ADD KEY `examorders_company_foreign` (`company`),
  ADD KEY `examorders_campus_foreign` (`campus`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faqs_uuid_unique` (`uuid`),
  ADD KEY `faqs_catfaq_foreign` (`catfaq`);

--
-- Indexes for table `habeas`
--
ALTER TABLE `habeas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `habeas_uuid_unique` (`uuid`);

--
-- Indexes for table `hcaesthetic`
--
ALTER TABLE `hcaesthetic`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hcaesthetic_uuid_unique` (`uuid`),
  ADD KEY `hcaesthetic_hc_foreign` (`hc`),
  ADD KEY `hcaesthetic_user_foreign` (`user`),
  ADD KEY `hcaesthetic_company_foreign` (`company`),
  ADD KEY `hcaesthetic_campus_foreign` (`campus`);

--
-- Indexes for table `hcchecklist`
--
ALTER TABLE `hcchecklist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hcchecklist_uuid_unique` (`uuid`),
  ADD KEY `hcchecklist_hc_foreign` (`hc`),
  ADD KEY `hcchecklist_user_foreign` (`user`),
  ADD KEY `hcchecklist_company_foreign` (`company`),
  ADD KEY `hcchecklist_campus_foreign` (`campus`),
  ADD KEY `hcchecklist_doctor_foreign` (`doctor`),
  ADD KEY `hcchecklist_created_by_foreign` (`created_by`);

--
-- Indexes for table `hcclitem`
--
ALTER TABLE `hcclitem`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hcclitem_uuid_unique` (`uuid`),
  ADD KEY `hcclitem_checklist_foreign` (`checklist`);

--
-- Indexes for table `hcconsent`
--
ALTER TABLE `hcconsent`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hcconsent_uuid_unique` (`uuid`),
  ADD KEY `hcconsent_hc_foreign` (`hc`),
  ADD KEY `hcconsent_user_foreign` (`user`),
  ADD KEY `hcconsent_company_foreign` (`company`),
  ADD KEY `hcconsent_campus_foreign` (`campus`),
  ADD KEY `hcconsent_consent_foreign` (`consent`),
  ADD KEY `hcconsent_doctor_foreign` (`doctor`);

--
-- Indexes for table `hccrypy`
--
ALTER TABLE `hccrypy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hccrypy_uuid_unique` (`uuid`),
  ADD KEY `hccrypy_hc_foreign` (`hc`),
  ADD KEY `hccrypy_user_foreign` (`user`),
  ADD KEY `hccrypy_company_foreign` (`company`),
  ADD KEY `hccrypy_campus_foreign` (`campus`);

--
-- Indexes for table `hcdermdiagnostics`
--
ALTER TABLE `hcdermdiagnostics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hcdermdiagnostics_uuid_unique` (`uuid`),
  ADD KEY `hcdermdiagnostics_hc_foreign` (`hc`),
  ADD KEY `hcdermdiagnostics_user_foreign` (`user`),
  ADD KEY `hcdermdiagnostics_company_foreign` (`company`),
  ADD KEY `hcdermdiagnostics_campus_foreign` (`campus`);

--
-- Indexes for table `hcdermindications`
--
ALTER TABLE `hcdermindications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hcdermindications_uuid_unique` (`uuid`),
  ADD KEY `hcdermindications_hc_foreign` (`hc`),
  ADD KEY `hcdermindications_user_foreign` (`user`),
  ADD KEY `hcdermindications_company_foreign` (`company`),
  ADD KEY `hcdermindications_campus_foreign` (`campus`);

--
-- Indexes for table `hcdermsolexams`
--
ALTER TABLE `hcdermsolexams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hcdermsolexams_uuid_unique` (`uuid`),
  ADD KEY `hcdermsolexams_hc_foreign` (`hc`),
  ADD KEY `hcdermsolexams_user_foreign` (`user`),
  ADD KEY `hcdermsolexams_company_foreign` (`company`),
  ADD KEY `hcdermsolexams_campus_foreign` (`campus`);

--
-- Indexes for table `hcdermsolpath`
--
ALTER TABLE `hcdermsolpath`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hcdermsolpath_uuid_unique` (`uuid`),
  ADD KEY `hcdermsolpath_hc_foreign` (`hc`),
  ADD KEY `hcdermsolpath_user_foreign` (`user`),
  ADD KEY `hcdermsolpath_company_foreign` (`company`),
  ADD KEY `hcdermsolpath_campus_foreign` (`campus`);

--
-- Indexes for table `hcdermsolproc`
--
ALTER TABLE `hcdermsolproc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hcdermsolproc_uuid_unique` (`uuid`),
  ADD KEY `hcdermsolproc_hc_foreign` (`hc`),
  ADD KEY `hcdermsolproc_user_foreign` (`user`),
  ADD KEY `hcdermsolproc_company_foreign` (`company`),
  ADD KEY `hcdermsolproc_campus_foreign` (`campus`);

--
-- Indexes for table `hclesion`
--
ALTER TABLE `hclesion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hclesion_uuid_unique` (`uuid`),
  ADD KEY `hclesion_hc_foreign` (`hc`),
  ADD KEY `hclesion_user_foreign` (`user`),
  ADD KEY `hclesion_company_foreign` (`company`),
  ADD KEY `hclesion_campus_foreign` (`campus`);

--
-- Indexes for table `hcprocedure`
--
ALTER TABLE `hcprocedure`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hcprocedure_uuid_unique` (`uuid`),
  ADD KEY `hcprocedure_hc_foreign` (`hc`),
  ADD KEY `hcprocedure_user_foreign` (`user`),
  ADD KEY `hcprocedure_company_foreign` (`company`),
  ADD KEY `hcprocedure_campus_foreign` (`campus`),
  ADD KEY `hcprocedure_type_procedure_foreign` (`type_procedure`);

--
-- Indexes for table `hcsurgical`
--
ALTER TABLE `hcsurgical`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hcsurgical_uuid_unique` (`uuid`),
  ADD KEY `hcsurgical_hc_foreign` (`hc`),
  ADD KEY `hcsurgical_user_foreign` (`user`),
  ADD KEY `hcsurgical_company_foreign` (`company`),
  ADD KEY `hcsurgical_campus_foreign` (`campus`),
  ADD KEY `hcsurgical_type_procedure_foreign` (`type_procedure`);

--
-- Indexes for table `hcsuture`
--
ALTER TABLE `hcsuture`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hcsuture_uuid_unique` (`uuid`),
  ADD KEY `hcsuture_hc_foreign` (`hc`),
  ADD KEY `hcsuture_user_foreign` (`user`),
  ADD KEY `hcsuture_company_foreign` (`company`),
  ADD KEY `hcsuture_campus_foreign` (`campus`);

--
-- Indexes for table `hctreatment`
--
ALTER TABLE `hctreatment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hctreatment_uuid_unique` (`uuid`),
  ADD KEY `hctreatment_hc_foreign` (`hc`),
  ADD KEY `hctreatment_user_foreign` (`user`),
  ADD KEY `hctreatment_company_foreign` (`company`),
  ADD KEY `hctreatment_campus_foreign` (`campus`);

--
-- Indexes for table `hctumors`
--
ALTER TABLE `hctumors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hctumors_uuid_unique` (`uuid`),
  ADD KEY `hctumors_hc_foreign` (`hc`),
  ADD KEY `hctumors_user_foreign` (`user`),
  ADD KEY `hctumors_company_foreign` (`company`),
  ADD KEY `hctumors_campus_foreign` (`campus`);

--
-- Indexes for table `headquarters`
--
ALTER TABLE `headquarters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `headquarters_uuid_unique` (`uuid`),
  ADD KEY `headquarters_position_foreign` (`position`),
  ADD KEY `headquarters_company_foreign` (`company`);

--
-- Indexes for table `indications`
--
ALTER TABLE `indications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `indications_uuid_unique` (`uuid`);

--
-- Indexes for table `laboratoryexams`
--
ALTER TABLE `laboratoryexams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `laboratoryexams_uuid_unique` (`uuid`);

--
-- Indexes for table `locks`
--
ALTER TABLE `locks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `locks_uuid_unique` (`uuid`),
  ADD KEY `locks_user_foreign` (`user`),
  ADD KEY `locks_company_foreign` (`company`);

--
-- Indexes for table `logmails`
--
ALTER TABLE `logmails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `logmails_uuid_unique` (`uuid`),
  ADD KEY `logmails_user_foreign` (`user`),
  ADD KEY `logmails_user_id_foreign` (`user_id`),
  ADD KEY `logmails_company_foreign` (`company`),
  ADD KEY `logmails_campus_foreign` (`campus`),
  ADD KEY `logmails_tpl_id_foreign` (`tpl_id`),
  ADD KEY `logmails_diagnostic_foreign` (`diagnostic`);

--
-- Indexes for table `mattachs`
--
ALTER TABLE `mattachs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mattachs_uuid_unique` (`uuid`),
  ADD KEY `mattachs_mail_id_foreign` (`mail_id`);

--
-- Indexes for table `medicalp`
--
ALTER TABLE `medicalp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `medicalp_uuid_unique` (`uuid`),
  ADD KEY `medicalp_doctor_foreign` (`doctor`),
  ADD KEY `medicalp_user_foreign` (`user`),
  ADD KEY `medicalp_company_foreign` (`company`),
  ADD KEY `medicalp_campus_foreign` (`campus`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `medicines_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mprescriptions`
--
ALTER TABLE `mprescriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mprescriptions_uuid_unique` (`uuid`),
  ADD KEY `mprescriptions_mp_foreign` (`mp`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `notifications_uuid_unique` (`uuid`),
  ADD KEY `notifications_user_foreign` (`user`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_uuid_unique` (`uuid`),
  ADD KEY `orders_plan_foreign` (`plan`),
  ADD KEY `orders_company_foreign` (`company`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pathologies`
--
ALTER TABLE `pathologies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pathologies_uuid_unique` (`uuid`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_uuid_unique` (`uuid`),
  ADD KEY `payments_user_foreign` (`user`),
  ADD KEY `payments_plan_foreign` (`plan`),
  ADD KEY `payments_company_foreign` (`company`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_uuid_unique` (`uuid`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photographic`
--
ALTER TABLE `photographic`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `photographic_uuid_unique` (`uuid`),
  ADD KEY `photographic_user_foreign` (`user`),
  ADD KEY `photographic_company_foreign` (`company`),
  ADD KEY `photographic_campus_foreign` (`campus`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plans_uuid_unique` (`uuid`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prescriptions_uuid_unique` (`uuid`),
  ADD KEY `prescriptions_hc_foreign` (`hc`),
  ADD KEY `prescriptions_user_foreign` (`user`),
  ADD KEY `prescriptions_company_foreign` (`company`),
  ADD KEY `prescriptions_campus_foreign` (`campus`);

--
-- Indexes for table `procedures`
--
ALTER TABLE `procedures`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `procedures_uuid_unique` (`uuid`);

--
-- Indexes for table `prods`
--
ALTER TABLE `prods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prods_uuid_unique` (`uuid`),
  ADD KEY `prods_doctor_foreign` (`doctor`),
  ADD KEY `prods_user_foreign` (`user`),
  ADD KEY `prods_company_foreign` (`company`),
  ADD KEY `prods_campus_foreign` (`campus`);

--
-- Indexes for table `prodsitem`
--
ALTER TABLE `prodsitem`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prodsitem_uuid_unique` (`uuid`),
  ADD KEY `prodsitem_pd_foreign` (`pd`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_uuid_unique` (`uuid`),
  ADD KEY `products_company_foreign` (`company`),
  ADD KEY `products_category_foreign` (`category`),
  ADD KEY `products_subcategory_foreign` (`subcategory`);

--
-- Indexes for table `pths`
--
ALTER TABLE `pths`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pths_uuid_unique` (`uuid`),
  ADD KEY `pths_doctor_foreign` (`doctor`),
  ADD KEY `pths_user_foreign` (`user`),
  ADD KEY `pths_company_foreign` (`company`),
  ADD KEY `pths_campus_foreign` (`campus`);

--
-- Indexes for table `pthsitem`
--
ALTER TABLE `pthsitem`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pthsitem_uuid_unique` (`uuid`),
  ADD KEY `pthsitem_pt_foreign` (`pt`);

--
-- Indexes for table `querytypes`
--
ALTER TABLE `querytypes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `querytypes_uuid_unique` (`uuid`),
  ADD KEY `querytypes_company_foreign` (`company`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `quotes_uuid_unique` (`uuid`),
  ADD KEY `quotes_doctor_foreign` (`doctor`),
  ADD KEY `quotes_user_foreign` (`user`),
  ADD KEY `quotes_company_foreign` (`company`),
  ADD KEY `quotes_campus_foreign` (`campus`);

--
-- Indexes for table `quotesproducts`
--
ALTER TABLE `quotesproducts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `quotesproducts_uuid_unique` (`uuid`),
  ADD KEY `quotesproducts_quote_foreign` (`quote`),
  ADD KEY `quotesproducts_product_foreign` (`product`);

--
-- Indexes for table `quotesservices`
--
ALTER TABLE `quotesservices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `quotesservices_uuid_unique` (`uuid`),
  ADD KEY `quotesservices_quote_foreign` (`quote`),
  ADD KEY `quotesservices_service_foreign` (`service`);

--
-- Indexes for table `recovery`
--
ALTER TABLE `recovery`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `recovery_uuid_unique` (`uuid`),
  ADD KEY `recovery_user_foreign` (`user`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_uuid_unique` (`uuid`);

--
-- Indexes for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_permissions_roles_id_foreign` (`roles_id`),
  ADD KEY `roles_permissions_permissions_id_foreign` (`permissions_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_uuid_unique` (`uuid`),
  ADD KEY `services_company_foreign` (`company`),
  ADD KEY `services_category_foreign` (`category`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_uuid_unique` (`uuid`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sliders_uuid_unique` (`uuid`),
  ADD KEY `sliders_user_foreign` (`user`),
  ADD KEY `sliders_company_foreign` (`company`);

--
-- Indexes for table `solicitude`
--
ALTER TABLE `solicitude`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `solicitude_uuid_unique` (`uuid`),
  ADD KEY `solicitude_user_foreign` (`user`),
  ADD KEY `solicitude_company_foreign` (`company`),
  ADD KEY `solicitude_campus_foreign` (`campus`),
  ADD KEY `solicitude_doctor_foreign` (`doctor`),
  ADD KEY `solicitude_qt_id_foreign` (`qt_id`);

--
-- Indexes for table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `specialties_uuid_unique` (`uuid`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subcategories_uuid_unique` (`uuid`),
  ADD KEY `subcategories_company_foreign` (`company`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_subscription_id_stripe_price_unique` (`subscription_id`,`stripe_price`),
  ADD UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`);

--
-- Indexes for table `thematic`
--
ALTER TABLE `thematic`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `thematic_uuid_unique` (`uuid`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_uuid_unique` (`uuid`),
  ADD KEY `ticket_user_foreign` (`user`);

--
-- Indexes for table `ticketmsj`
--
ALTER TABLE `ticketmsj`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticketmsj_uuid_unique` (`uuid`),
  ADD KEY `ticketmsj_user_foreign` (`user`),
  ADD KEY `ticketmsj_ticket_foreign` (`ticket`);

--
-- Indexes for table `tplmails`
--
ALTER TABLE `tplmails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tplmails_uuid_unique` (`uuid`),
  ADD KEY `tplmails_company_foreign` (`company`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trainings_uuid_unique` (`uuid`),
  ADD KEY `trainings_user_foreign` (`user`);

--
-- Indexes for table `trainingsroles`
--
ALTER TABLE `trainingsroles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainingsroles_trainings_id_foreign` (`trainings_id`),
  ADD KEY `trainingsroles_roles_id_foreign` (`roles_id`);

--
-- Indexes for table `trainingsusers`
--
ALTER TABLE `trainingsusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainingsusers_trainings_id_foreign` (`trainings_id`),
  ADD KEY `trainingsusers_users_id_foreign` (`user_id`);

--
-- Indexes for table `twofa`
--
ALTER TABLE `twofa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `twofa_uuid_unique` (`uuid`),
  ADD KEY `twofa_user_foreign` (`user`);

--
-- Indexes for table `usermails`
--
ALTER TABLE `usermails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usermails_uuid_unique` (`uuid`),
  ADD KEY `usermails_mail_id_foreign` (`mail_id`),
  ADD KEY `usermails_users_id_foreign` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_charge_foreign` (`charge`),
  ADD KEY `users_specialty_foreign` (`specialty`),
  ADD KEY `users_campus_foreign` (`campus`),
  ADD KEY `users_company_foreign` (`company`),
  ADD KEY `users_role_foreign` (`role`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- Indexes for table `vitalsigns`
--
ALTER TABLE `vitalsigns`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vitalsigns_uuid_unique` (`uuid`),
  ADD KEY `vitalsigns_user_foreign` (`user`),
  ADD KEY `vitalsigns_company_foreign` (`company`),
  ADD KEY `vitalsigns_campus_foreign` (`campus`),
  ADD KEY `vitalsigns_querytype_foreign` (`querytype`);

--
-- Indexes for table `xsliders`
--
ALTER TABLE `xsliders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `xsliders_uuid_unique` (`uuid`),
  ADD KEY `xsliders_user_foreign` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `catfaqs`
--
ALTER TABLE `catfaqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `checklistsecurity`
--
ALTER TABLE `checklistsecurity`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `consents`
--
ALTER TABLE `consents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dermatology`
--
ALTER TABLE `dermatology`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `diagnoses`
--
ALTER TABLE `diagnoses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1380;

--
-- AUTO_INCREMENT for table `diagnosestype`
--
ALTER TABLE `diagnosestype`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `diary`
--
ALTER TABLE `diary`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `diaryprocedures`
--
ALTER TABLE `diaryprocedures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diaryqt`
--
ALTER TABLE `diaryqt`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `eodiagnostics`
--
ALTER TABLE `eodiagnostics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eoexams`
--
ALTER TABLE `eoexams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `examorders`
--
ALTER TABLE `examorders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `habeas`
--
ALTER TABLE `habeas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hcaesthetic`
--
ALTER TABLE `hcaesthetic`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hcchecklist`
--
ALTER TABLE `hcchecklist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hcclitem`
--
ALTER TABLE `hcclitem`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `hcconsent`
--
ALTER TABLE `hcconsent`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hccrypy`
--
ALTER TABLE `hccrypy`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hcdermdiagnostics`
--
ALTER TABLE `hcdermdiagnostics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hcdermindications`
--
ALTER TABLE `hcdermindications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `hcdermsolexams`
--
ALTER TABLE `hcdermsolexams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hcdermsolpath`
--
ALTER TABLE `hcdermsolpath`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hcdermsolproc`
--
ALTER TABLE `hcdermsolproc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hclesion`
--
ALTER TABLE `hclesion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hcprocedure`
--
ALTER TABLE `hcprocedure`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hcsurgical`
--
ALTER TABLE `hcsurgical`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hcsuture`
--
ALTER TABLE `hcsuture`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hctreatment`
--
ALTER TABLE `hctreatment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hctumors`
--
ALTER TABLE `hctumors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `headquarters`
--
ALTER TABLE `headquarters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `indications`
--
ALTER TABLE `indications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `laboratoryexams`
--
ALTER TABLE `laboratoryexams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=841;

--
-- AUTO_INCREMENT for table `locks`
--
ALTER TABLE `locks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logmails`
--
ALTER TABLE `logmails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mattachs`
--
ALTER TABLE `mattachs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicalp`
--
ALTER TABLE `medicalp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `mprescriptions`
--
ALTER TABLE `mprescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pathologies`
--
ALTER TABLE `pathologies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photographic`
--
ALTER TABLE `photographic`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `procedures`
--
ALTER TABLE `procedures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=864;

--
-- AUTO_INCREMENT for table `prods`
--
ALTER TABLE `prods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodsitem`
--
ALTER TABLE `prodsitem`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pths`
--
ALTER TABLE `pths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pthsitem`
--
ALTER TABLE `pthsitem`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `querytypes`
--
ALTER TABLE `querytypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quotesproducts`
--
ALTER TABLE `quotesproducts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quotesservices`
--
ALTER TABLE `quotesservices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `recovery`
--
ALTER TABLE `recovery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `solicitude`
--
ALTER TABLE `solicitude`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `specialties`
--
ALTER TABLE `specialties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thematic`
--
ALTER TABLE `thematic`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ticketmsj`
--
ALTER TABLE `ticketmsj`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tplmails`
--
ALTER TABLE `tplmails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `trainingsroles`
--
ALTER TABLE `trainingsroles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trainingsusers`
--
ALTER TABLE `trainingsusers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `twofa`
--
ALTER TABLE `twofa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usermails`
--
ALTER TABLE `usermails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vitalsigns`
--
ALTER TABLE `vitalsigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `xsliders`
--
ALTER TABLE `xsliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
