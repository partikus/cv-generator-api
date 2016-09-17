FROM debian:wheezy

MAINTAINER Michał Kruczek <mkruczek@pgs-soft.com>

ADD install.sh install.sh
RUN chmod +x install.sh && ./install.sh && rm install.sh

EXPOSE 11300

# 10MB = 10485760 Bytes
CMD ["beanstalkd", "-p", "11300", "-z", "10485760"]