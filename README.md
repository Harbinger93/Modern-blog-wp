# Modern Blog WP

## 📌 Descripción General
`Modern Blog WP` es una plantilla de WordPress personalizada y de alto rendimiento diseñada para portales de noticias serios y profesionales. El enfoque principal es la publicación de información crítica, informes técnicos y contenido multimedia con una estética moderna y segura.

Dada la naturaleza delicada de la información, el tema prioriza una estética **seria, profesional y sobria**, con un sistema de seguridad robusto y un rendimiento optimizado para situaciones de baja conectividad.

---

## 🛠 Tech Stack
Para garantizar velocidad, modernidad y seguridad, se utiliza el siguiente stack:

- **Core:** WordPress 6.x (Arquitectura Híbrida).
- **Frontend:** 
  - **Vite:** Como bundler de última generación para carga instantánea.
  - **React + Framer Motion:** Para micro-interacciones suaves y transiciones de estado.
  - **Tailwind CSS:** Para un diseño consistente y ligero.
- **Estética:** Glassmorphism optimizado para rendimiento con soporte nativo de Modo Oscuro/Claro.
- **Seguridad:** Hardening nativo mediante PHP, eliminación de dependencias externas (No Plugins) y cabeceras de seguridad estrictas.
- **Despliegue:** CI/CD con GitHub Actions vía SSH/rsync.

---

## ⚙️ Funcionalidades Clave (Cero Plugins)
Este tema ha sido desarrollado para ser **independiente de plugins**, integrando las siguientes funciones directamente en su núcleo:

1.  **Sistema de Noticias Avanzado:** Custom Post Types para informes técnicos, boletines y notas de prensa.
2.  **Seguridad Proactiva:**
    - Desactivación de XML-RPC y REST API no autenticada.
    - Eliminación de huellas de WordPress (versión, generador, etc.).
    - Implementación de cabeceras de seguridad (CSP, HSTS, X-Content-Type-Options).
    - Ofuscación de rutas de autor.
3.  **Gestión de Campos Personalizados:** Lógica nativa de Meta Boxes para evitar el uso de ACF o similares.
4.  **Optimización de Medios:** Soporte nativo para formatos WebP y Lazy Loading avanzado.
5.  **Multi-idioma Ready:** Estructura preparada para internacionalización (i18n).

---

## 📂 Estructura de Carpetas
```text
ovp-theme/
├── .github/workflows/   # Automatización de despliegue
├── assets/              # Archivos compilados (Producción)
├── inc/                 # Lógica modular del tema (PHP)
│   ├── security.php     # Hardening y Seguridad
│   ├── setup.php        # Configuración inicial y menús
│   ├── news.php         # Lógica de CPT y noticias
│   ├── meta-boxes.php   # Campos personalizados nativos
│   └── scripts.php      # Encolado de assets con Vite
├── src/                 # Código fuente (Vite/React/Tailwind)
│   ├── js/              # Componentes Framer Motion
│   └── css/             # Estilos y Glassmorphism
├── templates/           # Partes de plantilla reutilizables
├── functions.php        # Punto de entrada principal
└── style.css            # Metadatos del tema
```

---

## 🔒 Compromiso de Seguridad
Este proyecto sigue las guías de seguridad de **OWASP** y los estándares de WordPress. Al no depender de plugins de terceros, se reduce la superficie de ataque significativamente, garantizando que la plataforma de OVP sea un canal seguro para la defensa de los derechos humanos.
