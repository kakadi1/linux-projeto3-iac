# Usar a imagem oficial do PHP com Apache
FROM php:7.4-apache

# Instalar extensões necessárias
RUN docker-php-ext-install mysqli

# Habilitar o módulo rewrite do Apache (opcional, mas recomendado)
RUN a2enmod rewrite
