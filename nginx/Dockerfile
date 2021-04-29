FROM nginx:1.19.1-alpine
RUN apk update && apk add bash

RUN rm /etc/nginx/conf.d/default.conf
COPY ./vhost.conf /etc/nginx/conf.d