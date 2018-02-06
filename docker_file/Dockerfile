# This dockerfile uses the ubuntu image
# VERSION 2 - EDITION 1
# Author: klkuo 
# Command format: Instruction [arguments / command] ..

# 基本映像檔，必須是第一個指令
FROM ubuntu:16.04

MAINTAINER docker_user davidkuo104@gmail.com

# 更新映像檔的指令
#RUN echo "deb http://archive.ubuntu.com/ubuntu/ raring main universe" >> /etc/apt/sources.list
RUN apt-get -qq update
RUN apt-get -qqy install nginx
RUN echo "\ndaemon off;" >> /etc/nginx/nginx.conf

# 建立新容器時要執行的指令
CMD /usr/sbin/nginx
