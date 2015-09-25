---
title: 'Run Grav on Docker'
content:
    limit: 5
    pagination: '1'
    order:
        dir: desc
        by: date
    items: '@self.children'
---

# Run Grav on Docker
This is how to set up an environment to work with/on Grav stuff via docker.
## Requirements
Install [Docker-toolbox](http://https://www.docker.com/toolbox) incuding virtualbox, comes with it.

### Setup Docker
1. create a local vm to run docker  
    `docker-machine create --driver virtualbox grav`
<pre>Creating VirtualBox VM...
Creating SSH key...
Starting VirtualBox VM...
Starting VM...
To see how to connect Docker to this machine, run: docker-machine env grav</pre>
2. see how to connect to vm  
    `docker-machine env grav`  
Sample output:
<pre>export DOCKER_TLS_VERIFY="1"
export DOCKER_HOST="tcp://192.168.99.101:2376"
export DOCKER_CERT_PATH="/Users/cgrzecka/.docker/machine/machines/grav"
export DOCKER_MACHINE_NAME="grav"
# Run this command to configure your shell:
# eval "$(docker-machine env grav)"</pre>
*note your vm's IP*: 192.168.99.101
3. configure your shell to use grav vm  
    `eval "$(docker-machine env grav)"`

### Run container
1. `docker run -it -p :80 -v <path/to/grav/dev/directory>:/grav yoshz/apache-php-dev:5.5 bash`  
    Options explained:  
    * `-it`: gives interactive terminal
    * `-p :80`: exposes open external port
    * `-v ...`: mounts host filesystem to container for local development _(optional)_
    * `bash`: gives us a shell to run commands the container
2. take note of container's external port in use
    `eval "$(docker-machine env grav2)"`  
    `docker ps`
    Sample Output:
<pre>CONTAINER ID        IMAGE                      COMMAND                 CREATED             STATUS              PORTS                                               NAMES
7c00ba3e17cb        yoshz/apache-php-dev:5.5   "/entrypoint.sh bash"   12 minutes ago      Up 12 minutes       22/tcp, 443/tcp, 35729/tcp, 0.0.0.0:32769->80/tcp   ecstatic_goldstine</pre>
<pre>0.0.0.0:32769->80/tcp</pre> indicates my port is 32769.

### Grav time!
#### On Host
1. change directory on the *host* to the `<path/to/grav/dev/directory>`  
    `cd <path/to/grav/dev/directory>`
2. clone grav  
    `git clone git@github.com:getgrav/grav.git`

#### In Container
1. install grav  
    `cd /grav`  
    `bin/grav install`
2. copy repo to apache's web root
    `cp -r /grav/grav/* /var/www/html/`
3. set permission to allow grav to build cache  
    `chown -R www-data:www-data /var/www/html/*`
4. remove current user directory  
    `rm -r /var/www/html/user`
5. remove default intex.html
    `rm /var/www/html/index.html`
6. create symlink for user directory linked to the host 
    `ln -s /grav/user /var/www/html/user`
7. start apache  
    `service apache2 start`

#### Begin
1. visit your vm's IP with your container's port  
    Example:
    > [http://192.168.99.102:32769/](http://192.168.99.102:32769/) 