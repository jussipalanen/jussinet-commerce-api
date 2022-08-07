FROM httpd:alpine
RUN apk update; \
    apk update;

# Copy apache vhost file to proxy php requests to php-fpm container
COPY test.apache.conf /usr/local/apache2/conf/test.apache.conf
RUN echo "Include /usr/local/apache2/conf/test.apache.conf" \
    >> /usr/local/apache2/conf/httpd.conf

RUN sed -i '/LoadModule rewrite_module/s/^#//g' /usr/local/apache2/conf/httpd.conf && \
    sed -i 's#AllowOverride [Nn]one#AllowOverride All#' /usr/local/apache2/conf/httpd.conf

RUN apk add apache2-utils