# Roadmap JauService
## Fase 1: Planificación y Definición del Proyecto
### 1.1 Definición de Objetivos
- Identificar el alcance del MVP
  - Para la ciudad de Orizaba
  - Solo servirá para contactar gente con profesionistas
- Definir la propuesta de valor
  - Contactar a las casas con prestadores de servicio
- Identificar los servicios iniciales
  - Electricidad
  - Fontanería
  - Jardinería
  - Limpieza
  - Pintura
  - Balconería
  - Carpintería
  - Enfermería y Cuidados Especiales
  - Mascotas
### 1.2 Investigación de Mercado
- Análisis de competidores
  - Directos
    - TaskRabbit
    - Uber Works
  - Indirectos
    - Thumbtack
    - GetNinjas
- Identificar a los usuarios y prestadores de servicios
  - Usuarios
    - Demografía
      - Edad: 25-55 años
      - Ubicación: Zonas urbanas y suburbanas
      - Nivel socioeconómico: Medio a alto
      - Género: Tanto hombres como mujeres
    - Psicografía 
      - Usuarios con trabajos de tiempo completo que no tienen tiempo para hacer reparaciones o tareas del hogar
      - Personas con habilidades limitadas para realizar ciertas tareas (electricidad, fontanería, etc.).
      - Individuos que prefieren pagar por servicios profesionales para evitar complicaciones
    - Motivaciones
      - Ahorro de tiempo
      - Soluciones rápidas y fiables
      - Acceso a profesionales de calidad
    - Dolores (Pains)
      - Dificultad para encontrar profesionales de confianza
      - Servicios no garantizados o con problemas de calidad
      - Precios poco transparentes o abusivos
  - Clientes
    - Demografía
      - Edad: 25-50 años
      - Ubicación: Zonas urbanas y suburbanas
      - Nivel educativo: Varía desde personas con estudios técnicos a personas sin educación formal pero con experiencia
      - Género: Principalmente hombres en trabajos técnicos, pero creciente participación de mujeres en servicios de limpieza
    - Psicografía 
      - Personas que prefieren trabajar de manera independiente
      - Profesionales que buscan un canal confiable para captar clientes
      - Técnicos que buscan expandir su red de clientes a través de plataformas tecnológicas
    - Motivaciones
      - Acceder a un mercado más amplio sin necesidad de publicidad costosa
      - Obtener ingresos adicionales a través de trabajos eventuales
      - Flexibilidad en horarios y gestión de su propio negocio
    - Dolores (Pains)
      - Competencia desleal y precios bajos en el mercado
      - Comisiones altas en plataformas tecnológicas
      - Dificultad para encontrar clientes confiables que paguen a tiempo
### 1.3 Especificaciones Funcionales
- Requisitos de los usuarios y prestadores de servicios
- Definir funcionalidades esenciales 
  - Búsqueda
  - Contacto
  - Calificación
  - Registro

## Fase 2: Diseño del Producto
### 2.1 Diseño de la Base de Datos
- Tablas: usuarios, servicios, roles, órdenes de trabajo, historial de servicios
- Establecer relaciones entre tablas
### 2.2 UX/UI Design
- Creación de wireframes y mockups
- Diseño de pantallas para: 
  - Página de inicio
  - Registro/Login
  - Panel de usuario (cliente y proveedor)
  - Listado de servicios
  - Chat entre usuarios y prestadores
### 2.3 Feedback
- Revisión con stakeholders
- Realización de ajustes en función del feedback

## Fase 3: Desarrollo del MVP
### 3.1 Backend
- Desarrollo de API REST con CodeIgniter 4
  - Autenticación de usuarios
  - Gestión de roles (cliente/proveedor)
  - Gestión de órdenes de servicio
  - Sistema de calificaciones y reseñas
### 3.2 Frontend
- Desarrollo de la interfaz web (HTML, CSS, JavaScript, Bootstrap)
- Integración con el backend
### 3.3 Seguridad
- Implementación de autenticación con JWT o OAuth
- Validación de datos de entrada
- Encriptación de contraseñas

## Fase 4: Pruebas y Validación
### 4.1 Pruebas Unitarias
- Crear tests unitarios para las funciones críticas del backend
### 4.2 Pruebas de Integración
- Verificar la interacción entre frontend y backend
### 4.3 Pruebas de Usuario
- Obtener feedback de un grupo pequeño de usuarios
- Corrección de bugs y mejoras basadas en el feedback

## Fase 5: Lanzamiento del MVP
### 5.1 Implementación en Hosting/Servidor
- Configuración de servidor y base de datos
- Implementación de certificación SSL
### 5.2 Estrategia de Lanzamiento
- Comunicación del lanzamiento en redes sociales
- Actividades de marketing digital
### 5.3 Soporte Post-Lanzamiento
- Soporte técnico
- Mantenimiento de la plataforma

## Fase 6: Optimización y Nuevas Funcionalidades
### 6.1 Monitoreo y Métricas
- Implementar Google Analytics y herramientas de monitoreo
### 6.2 Mejoras en UX/UI
- Mejorar la experiencia del usuario en base a métricas
### 6.3 Nuevas Funcionalidades
- Implementación de una app móvil (iOS/Android)
- Funcionalidad de pagos en la plataforma
- Expansión de servicios ofrecidos (más categorías)
