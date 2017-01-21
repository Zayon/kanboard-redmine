FROM kanboard/kanboard

ADD . /var/www/app/plugins/Redmine

RUN chmod 744 /var/www/app/plugins/Redmine
