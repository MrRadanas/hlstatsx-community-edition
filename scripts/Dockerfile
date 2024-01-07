FROM debian:latest

WORKDIR /scripts

RUN apt update;  \
    apt upgrade -y;  \
    apt install -y  \
        build-essential  \
        carton  \
        cpanminus  \
        cron  \
        libdbd-mysql-perl  \
        libssl-dev  \
        openssl  \
        unzip  \
        zlib1g-dev  \
    ;

RUN addgroup --system hlstatsx;  \
    useradd -g hlstatsx hlstatsx

COPY --chown=hlstatsx:hlstatsx . .

RUN cpanm MaxMind::DB::Reader GeoIP2::Database::Reader Syntax::Keyword::Try;
#RUN carton install

RUN chown -R hlstatsx:hlstatsx ./*

RUN crontab -u hlstatsx ./Docker/cron/crontab

## Tell docker that all future commands should run as the appuser user
USER hlstatsx