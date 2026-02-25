FROM php:apache

# ARG DOCUMENT_ROOT="/var/www/html"

# Extensions PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Exemple pour Debian/Ubuntu
RUN a2dismod mpm_prefork mpm_worker && a2enmod mpm_event
# ACtiver mod_rewrite
# RUN a2enmod rewrite$

# WORKDIR ${DOCUMENT_ROOT}