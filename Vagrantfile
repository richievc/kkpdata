# -*- mode: ruby -*-
# vi: set ft=ruby :

########################################################################
## LAPP STACK v1.0.0
## DEV SERVER
#########################################################################


Vagrant.configure("2") do |config|

  config.vm.box = "ubuntu/trusty64"

  # config.vm.box_check_update = false

  # config.vm.network "forwarded_port", guest: 80, host: 8080
  # config.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"
  # config.vm.network "public_network"

  config.vm.network "private_network", ip: "192.168.10.10"

  config.vm.synced_folder ".", "/var/www/html", :mount_options => ["dmode=777", "fmode=666"]

  # Provider-specific configuration so you can fine-tune various
  # backing providers for Vagrant. These expose provider-specific options.
  # Example for VirtualBox:
  #
  config.vm.provider "virtualbox" do |vb|
    #  Display the VirtualBox GUI when booting the machine
    vb.gui = true
    # Customize the amount of memory on the VM:
    vb.memory = "1024"
  end

  config.vm.provision "shell", path: 'bootstrap.sh'
end
