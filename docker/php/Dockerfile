#Define the PHP version
FROM php:7.2.10-fpm

#Update the dependecies and install the most comum
RUN apt-get update \
    && apt-get install -y --no-install-recommends vim curl debconf subversion git apt-transport-https apt-utils \
    build-essential locales acl mailutils wget zip unzip \
    gnupg gnupg1 gnupg2 \
    zlib1g-dev \
    libxml2-dev \
    sudo

#Install php libraries
RUN docker-php-ext-install pdo pdo_mysql zip xml

#Copying the php settings
COPY php.ini /usr/local/etc/php/php.ini
COPY php-fpm-pool.conf 	/usr/local/etc/php/pool.d/www.conf

# Install composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

# Installing the PHP Unit to run the tests
RUN wget --no-check-certificate https://phar.phpunit.de/phpunit-6.5.3.phar && \
    mv phpunit*.phar phpunit.phar && \
    chmod +x phpunit.phar && \
    mv phpunit.phar /usr/local/bin/phpunit

# Create user and group
RUN groupadd dev -g 999
RUN useradd dev -g dev -d /home/dev -m
RUN passwd -d dev

# Locale settings
RUN rm -rf /var/lib/apt/lists/*
RUN echo "en_US.UTF-8 UTF-8" > /etc/locale.gen && \
    echo "pt_BR.UTF-8 UTF-8" >> /etc/locale.gen && \
    locale-gen

# Ensuring that our user has administrator access
RUN echo "dev ALL=(ALL) ALL" > /etc/sudoers

# Defining work directory
WORKDIR /invillia

# Open port to ngnix consume
EXPOSE 9000

# Running PHP
CMD ["php-fpm"]
