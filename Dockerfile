FROM kanboard/kanboard

ADD . /var/www/app/plugins/Redmine

RUN cd /var/www/app/plugins/Redmine && composer --prefer-dist --no-dev --optimize-autoloader --quiet install
RUN chmod 744 /var/www/app/plugins/Redmine
