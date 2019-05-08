FROM php:7.2-cli

RUN apt-get update \
 && apt-get install -y wget git zip sqlite3 \
 && apt-get clean \
 && wget https://raw.githubusercontent.com/composer/getcomposer.org/ffdc3c7fcb7c0f2a806508a868a35d13177a5a51/web/installer -O - -q | php -- --quiet

WORKDIR /ufaktura

COPY src /ufaktura

RUN chown -R nobody:nogroup /ufaktura

USER nobody

RUN /composer.phar install

EXPOSE 8080

CMD ["./yii", "serve", "0.0.0.0"]
