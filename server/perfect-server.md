[Source](https://www.howtoforge.com/perfect-server-debian-wheezy-apache2-bind-dovecot-ispconfig-3)

mysql_secure_installation

<h1>The Perfect Server - Debian Wheezy (Apache2, BIND, Dovecot, ISPConfig 3)</h1>
<p>Version 1.0<br/> Author: Falko Timme <br/> <a href="http://twitter.com/howtoforgecom" target="_blank"><img src="https://www.howtoforge.com/images/socialmedia/twitter.png" alt="" width="16px" height="16px" border="0"/></a> <a href="http://twitter.com/howtoforgecom" target="_blank">Follow me on Twitter</a><br/> Last edited 05/07/2013</p>
<p>This tutorial shows how to prepare a Debian Wheezy server (with Apache2, BIND, Dovecot) for the installation of <a href="http://www.ispconfig.org/" target="_blank">ISPConfig 3</a>, and how to install ISPConfig 3. ISPConfig 3 is a webhosting control panel that allows you to configure the following services through a web browser: Apache or nginx web server, Postfix mail server, Courier or Dovecot IMAP/POP3 server, MySQL, BIND or MyDNS nameserver, PureFTPd, SpamAssassin, ClamAV, and many more. This setup covers Apache (instead of nginx), BIND (instead of MyDNS), and Dovecot (instead of Courier).</p>
<p><span class="highlight">Please note that this setup does not work for ISPConfig <strong>2</strong>!</span> It is valid for ISPConfig 3 only!</p>
<p>I do not issue any guarantee that this will work for you!</p>
<div class="sponsor">
<h4>ISPConfig 3 Manual</h4>
<p>In order to learn how to use ISPConfig 3, I strongly recommend to <a href="https://www.howtoforge.com/download-the-ispconfig-3-manual" target="_blank">download the ISPConfig 3 Manual</a>.</p>
<p>On more than 300 pages, it covers the concept behind ISPConfig (admin, resellers, clients), explains how to install and update ISPConfig 3, includes a reference for all forms and form fields in ISPConfig together with examples of valid inputs, and provides tutorials for the most common tasks in ISPConfig 3. It also lines out how to make your server more secure and comes with a troubleshooting section at the end.</p>
<p>&nbsp;</p>
<h4>ISPConfig Monitor App For Android</h4>
<p>With the ISPConfig Monitor App, you can check your server status and find out if all services are running as expected. You can check TCP and UDP ports and ping your servers. In addition to that you can use this app to request details from servers that have ISPConfig installed (<strong>please note that the minimum installed ISPConfig 3 version with support for the ISPConfig Monitor App is 3.0.3.3!</strong>); these details include everything you know from the Monitor module in the ISPConfig Control Panel (e.g. services, mail and system logs, mail queue, CPU and memory info, disk usage, quota, OS details, RKHunter log, etc.), and of course, as ISPConfig is multiserver-capable, you can check all servers that are controlled from your ISPConfig master server.</p>
<p>For download and usage instructions, please visit <a href="http://www.ispconfig.org/ispconfig-3/ispconfig-monitor-app-for-android/" target="_blank">http://www.ispconfig.org/ispconfig-3/ispconfig-monitor-app-for-android/</a>.</p>
</div>
<p>&nbsp;</p>
<h3>1 Requirements</h3>
<p>To install such a system you will need the following:</p>
<ul>
<li>the Debian Wheezy network installation CD, available here: <a href="http://cdimage.debian.org/debian-cd/7.0.0/i386/iso-cd/debian-7.0.0-i386-netinst.iso">http://cdimage.debian.org/debian-cd/7.0.0/i386/iso-cd/debian-7.0.0-i386-netinst.iso</a> (i386) or <a href="http://cdimage.debian.org/debian-cd/7.0.0/amd64/iso-cd/debian-7.0.0-amd64-netinst.iso">http://cdimage.debian.org/debian-cd/7.0.0/amd64/iso-cd/debian-7.0.0-amd64-netinst.iso</a> (x86_64)</li>
<li>a fast Internet connection.</li>
</ul>
<p>&nbsp;</p>
<h3>2 Preliminary Note</h3>
<p>In this tutorial I use the hostname <span class="system">server1.example.com</span> with the IP address <span class="system">192.168.0.100</span> and the gateway <span class="system">192.168.0.1</span>. These settings might differ for you, so you have to replace them where appropriate.</p>
<p>&nbsp;</p>
<h3>3 The Base System</h3>
[...] See source for Debian install at this point.
<div style="display:none">
<p>Insert your Debian Wheezy network installation CD into your system and boot from it. Select <span class="system">Install</span> (this will start the text installer - if you prefer a graphical installer, select <span class="system">Graphical install</span>):</p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/1.jpg" alt="" width="550" height="413"/></p>
<p>Choose your language:</p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/2.png" alt="" width="550" height="413"/></p>
<p>Then select your location:</p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/3.png" alt="" width="550" height="413"/></p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/4.png" alt="" width="550" height="413"/></p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/5.png" alt="" width="550" height="413"/></p>
<p>If you've selected an uncommon combination of language and location (like English as the language and Germany as the location, as in my case), the installer might tell you that there is no locale defined for this combination; in this case you have to select the locale manually. I select <span class="system">en_US.UTF-8</span> here:</p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/6.png" alt="" width="550" height="413"/></p>
<p>Choose a keyboard layout:</p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/7.png" alt="" width="550" height="413"/></p>
<p>The installer checks the installation CD, your hardware, and configures the network with DHCP if there is a DHCP server in the network:</p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/8.png" alt="" width="550" height="413"/></p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/9.png" alt="" width="550" height="413"/></p>
<p>Enter the hostname. In this example, my system is called <em class="system">server1.example.com</em>, so I enter <em class="system">server1</em>:</p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/10.png" alt="" width="550" height="413"/></p>
<p>Enter your domain name. In this example, this is <span class="system">example.com</span>:</p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/11.png" alt="" width="550" height="413"/></p>
<p>Afterwards, give the root user a password:</p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/12.png" alt="" width="550" height="413"/></p>
<p>Confirm that password to avoid typos:</p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/13.png" alt="" width="550" height="413"/></p>
<p>Create a normal user account, for example the user <span class="system">Administrator</span> with the user name <span class="system">administrator</span> (don't use the user name <span class="system">admin</span> as it is a reserved name on Debian Wheezy):</p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/14.png" alt="" width="550" height="413"/></p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/15.png" alt="" width="550" height="413"/></p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/16.png" alt="" width="550" height="413"/></p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/17.png" alt="" width="550" height="413"/></p>
<p>Now you have to partition your hard disk. For simplicity's sake I select <span class="system">Guided - use entire disk and set up LVM</span> - this will create one volume group with two logical volumes, one for the <span class="system">/</span> file system and another one for swap (of course, the partitioning is totally up to you - if you know what you're doing, you can also set up your partitions manually).</p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/19.png" alt="" width="550" height="413" pagespeed_url_hash="4153505564" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/></p>
<p>Select the disk that you want to partition:</p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/20.png" alt="" width="550" height="413" pagespeed_url_hash="1427790262" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/></p>
<p>Then select the partitioning scheme. As mentioned before, I select <span class="system">All files in one partition (recommended for new users)</span> for simplicity's sake - it's up to your likings what you choose here:</p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/21.png" alt="" width="550" height="413" pagespeed_url_hash="1722290183" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/></p>
<p>When you're asked <span class="system">Write the changes to disks and configure LVM?</span>, select <span class="system">Yes</span>:</p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/22.png" alt="" width="550" height="413" pagespeed_url_hash="2016790104" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/></p>
<p>When you're finished, select <span class="system">Finish partitioning and write changes to disk</span>:</p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/23.png" alt="" width="550" height="413" pagespeed_url_hash="2311290025" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/></p>
<p>Select <span class="system">Yes</span> when you're asked <span class="system">Write changes to disks?</span>:</p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/24.png" alt="" width="550" height="413" pagespeed_url_hash="2605789946" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/></p>
<p>Afterwards, your new partitions are created and formatted.</p>
<p>Now the base system is installed:</p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/25.png" alt="" width="550" height="413" pagespeed_url_hash="2900289867" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/></p>
<p>Next you must configure apt. Because you are using the Debian Wheezy Netinstall CD which contains only a minimal set of packages, you must use a network mirror. Select the country where the network mirror that you want to use is located (usually this is the country where your Debian Wheezy system is located):</p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/26.png" alt="" width="550" height="413" pagespeed_url_hash="3194789788" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/></p>
<p>Then select the mirror you want to use (e.g. <span class="system">ftp.de.debian.org</span>):</p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/27.png" alt="" width="550" height="413" pagespeed_url_hash="3489289709" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/></p>
<p>Unless you use an HTTP proxy, leave the following field empty and hit <span class="system">Continue</span>:</p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/28.png" alt="" width="550" height="413" pagespeed_url_hash="3783789630" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/></p>
<p>Apt is now updating its packages database:</p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/29.png" alt="" width="550" height="413" pagespeed_url_hash="4078289551" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/></p>
<p>You can skip the package usage survey by selecting <span class="system">No</span>:</p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/31.png" alt="" width="550" height="413" pagespeed_url_hash="1647074170" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/></p>
<p>We need a web server, DNS server, mail server, and a MySQL database, but nevertheless I don't select any of them now because I like to have full control over what gets installed on my system. We will install the needed packages manually later on. Therefore we just select <span class="system">Standard system utilities </span> and <span class="system">SSH server</span> (so that I can immediately connect to the system with an SSH client such as <a href="http://chiark.greenend.org.uk/%7Esgtatham/putty/" target="_blank">PuTTY</a> after the installation has finished) and hit <span class="system">Continue</span>:</p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/32.png" alt="" width="550" height="413" pagespeed_url_hash="1941574091" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/></p>
<p>The required packages are downloaded and installed on the system:</p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/33.png" alt="" width="550" height="413" pagespeed_url_hash="2236074012" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/></p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/34.png" alt="" width="550" height="413" pagespeed_url_hash="2530573933" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/></p>
<p>When you're asked <span class="system">Install the GRUB boot loader to the master boot record?</span>, select <span class="system">Yes</span>:</p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/35.png" alt="" width="550" height="413" pagespeed_url_hash="2825073854" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/></p>
<p>The base system installation is now finished. Remove the Debian Wheezy Netinstall CD from the CD drive and hit <span class="system">Continue</span> to reboot the system:</p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/36.png" alt="" width="550" height="413" pagespeed_url_hash="3119573775" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/></p>
</div>
<p>On to the next step...</p>
<h3>4 Install The SSH Server (Optional)</h3>
<p>If you did not install the OpenSSH server during the system installation, you can do it now:</p>
<p class="command">apt-get install ssh openssh-server</p>
<p>From now on you can use an SSH client such as <a href="http://www.chiark.greenend.org.uk/%7Esgtatham/putty/download.html" target="_blank">PuTTY</a> and connect from your workstation to your Debian Wheezy server and follow the remaining steps from this tutorial.</p>
<p>&nbsp;</p>
<h3>5 Install vim-nox (Optional)</h3>
<p>I'll use <span class="system">vi</span> as my text editor in this tutorial. The default <span class="system">vi</span> program has some strange behaviour on Debian and Ubuntu; to fix this, we install <span class="system">vim-nox</span>:</p>
<p class="command">apt-get install vim-nox</p>
<p>(You don't have to do this if you use a different text editor such as joe or nano.)</p>
<p>&nbsp;</p>
<h3>6 Configure The Network</h3>
<p>Because the Debian Wheezy installer has configured our system to get its network settings via DHCP, we have to change that now because a server should have a static IP address. Edit <span class="system">/etc/network/interfaces</span> and adjust it to your needs (in this example setup I will use the IP address <span class="system">192.168.0.100</span>) (please note that I replace <span class="system">allow-hotplug eth0</span> with <span class="system">auto eth0</span>; otherwise restarting the network doesn't work, and we'd have to reboot the whole system):</p>
<p class="command">vi /etc/network/interfaces</p>
<table border="1" width="90%" cellspacing="0" cellpadding="2" align="center" bgcolor="#CCCCCC">
<tbody>
<tr>
<td>
<pre># This file describes the network interfaces available on your system
# and how to activate them. For more information, see interfaces(5).

# The loopback network interface
auto lo
iface lo inet loopback

# The primary network interface
#allow-hotplug eth0
#iface eth0 inet dhcp
auto eth0
iface eth0 inet static
        address 192.168.0.100
        netmask 255.255.255.0
        network 192.168.0.0
        broadcast 192.168.0.255
        gateway 192.168.0.1</pre>
</td>
</tr>
</tbody>
</table>
<p>Then restart your network:</p>
<p class="command">/etc/init.d/networking restart</p>
<p>Then edit <span class="system">/etc/hosts</span>. Make it look like this:</p>
<p class="command">vi /etc/hosts</p>
<table border="1" width="90%" cellspacing="0" cellpadding="2" align="center" bgcolor="#CCCCCC">
<tbody>
<tr>
<td>
<pre>127.0.0.1       localhost.localdomain   localhost
192.168.0.100   server1.example.com     server1

# The following lines are desirable for IPv6 capable hosts
::1     localhost ip6-localhost ip6-loopback
ff02::1 ip6-allnodes
ff02::2 ip6-allrouters</pre>
</td>
</tr>
</tbody>
</table>
<p>Now run</p>
<p class="command">echo server1.example.com &gt; /etc/hostname<br/> /etc/init.d/hostname.sh start</p>
<p>Afterwards, run</p>
<p class="command">hostname<br/> hostname -f</p>
<p>It is important that both show <span class="system">server1.example.com</span> now!</p>
<p>&nbsp;</p>
<h3>7 Update Your Debian Installation</h3>
<p>First make sure that your <span class="system">/etc/apt/sources.list</span> contains the <span class="system">wheezy-updates</span> repository (this makes sure you always get the newest updates for the ClamAV virus scanner - this project publishes releases very often, and sometimes old versions stop working), and that the <span class="system">contrib</span> and <span class="system">non-free</span> repositories are enabled (some packages such as <span class="system">libapache2-mod-fastcgi</span> are not in the main repository).</p>
<p class="command">vi /etc/apt/sources.list</p>
<table border="1" width="90%" cellspacing="0" cellpadding="2" align="center" bgcolor="#CCCCCC">
<tbody>
<tr>
<td>
<pre>deb http://ftp.de.debian.org/debian/ wheezy main contrib non-free
deb-src http://ftp.de.debian.org/debian/ wheezy main contrib non-free

deb http://security.debian.org/ wheezy/updates main contrib non-free
deb-src http://security.debian.org/ wheezy/updates main contrib non-free

# wheezy-updates, previously known as 'volatile'
deb http://ftp.de.debian.org/debian/ wheezy-updates main contrib non-free
deb-src http://ftp.de.debian.org/debian/ wheezy-updates main contrib non-free</pre>
</td>
</tr>
</tbody>
</table>
<p>Run</p>
<p class="command">apt-get update</p>
<p>to update the apt package database and</p>
<p class="command">apt-get upgrade</p>
<p>to install the latest updates (if there are any).</p>
<p>&nbsp;</p>
<h3>8 Change The Default Shell</h3>
<p><span class="system">/bin/sh</span> is a symlink to <span class="system">/bin/dash</span>, however we need <span class="system">/bin/bash</span>, not <span class="system">/bin/dash</span>. Therefore we do this:</p>
<p class="command">dpkg-reconfigure dash</p>
<p><span class="system">Use dash as the default system shell (/bin/sh)? <span class="highlight">&lt;- no</span></span></p>
<p>If you don't do this, the ISPConfig installation will fail.</p>
<p>&nbsp;</p>
<h3>9 Synchronize the System Clock</h3>
<p>It is a good idea to synchronize the system clock with an NTP (<strong>n</strong>etwork <strong>t</strong>ime <strong>p</strong>rotocol) server over the Internet. Simply run</p>
<p class="command">apt-get install ntp ntpdate</p>
<p>and your system time will always be in sync.</p>
<p>&nbsp;</p>
<h3>10 Install Postfix, Dovecot, MySQL, phpMyAdmin, rkhunter, binutils</h3>
<p>We can install Postfix, Dovecot, MySQL, rkhunter, and binutils with a single command:</p>
<p class="command">apt-get install postfix postfix-mysql postfix-doc mysql-client mysql-server openssl getmail4 rkhunter binutils dovecot-imapd dovecot-pop3d dovecot-mysql dovecot-sieve sudo</p>
<p>You will be asked the following questions:</p>
<p class="system" style="text-align: left;"><span class="system">General type of mail configuration:</span> <span class="highlight">&lt;-- Internet Site<br/> </span>System mail name: <span class="highlight">&lt;-- server1.example.com</span><br/> New password for the MySQL "root" user: <span class="highlight">&lt;-- yourrootsqlpassword</span><br/> Repeat password for the MySQL "root" user:&nbsp;<span class="highlight">&lt;-- yourrootsqlpassword</span></p>
<p>Next open the TLS/SSL and submission ports in Postfix:</p>
<p class="command">vi /etc/postfix/master.cf</p>
<p>Uncomment the <span class="system">submission</span> and <span class="system">smtps</span> sections as follows (leave <span class="system">-o milter_macro_daemon_name=ORIGINATING</span> as we don't need it):</p>
<table border="1" width="90%" cellspacing="0" cellpadding="2" align="center" bgcolor="#CCCCCC">
<tbody>
<tr>
<td>
<pre>[...]
submission inet n       -       -       -       -       smtpd
  -o syslog_name=postfix/submission
  -o smtpd_tls_security_level=encrypt
  -o smtpd_sasl_auth_enable=yes
  -o smtpd_client_restrictions=permit_sasl_authenticated,reject
#  -o milter_macro_daemon_name=ORIGINATING
smtps     inet  n       -       -       -       -       smtpd
  -o syslog_name=postfix/smtps
  -o smtpd_tls_wrappermode=yes
  -o smtpd_sasl_auth_enable=yes
  -o smtpd_client_restrictions=permit_sasl_authenticated,reject
#  -o milter_macro_daemon_name=ORIGINATING
[...]</pre>
</td>
</tr>
</tbody>
</table>
<p>Restart Postfix afterwards:</p>
<p class="command">/etc/init.d/postfix restart</p>
<p>We want MySQL to listen on all interfaces, not just localhost, therefore we edit <span class="system">/etc/mysql/my.cnf</span> and comment out the line <span class="system">bind-address = 127.0.0.1</span>:</p>
<p class="command">vi /etc/mysql/my.cnf</p>
<table border="1" width="90%" cellspacing="0" cellpadding="2" align="center" bgcolor="#CCCCCC">
<tbody>
<tr>
<td>
<pre>[...]
# Instead of skip-networking the default is now to listen only on
# localhost which is more compatible and is not less secure.
#bind-address           = 127.0.0.1
[...]</pre>
</td>
</tr>
</tbody>
</table>
<p>Then we restart MySQL:</p>
<p class="command">/etc/init.d/mysql restart</p>
<p>Now check that networking is enabled. Run</p>
<p class="command">netstat -tap | grep mysql</p>
<p>The output should look like this:</p>
<p class="system">root@server1:~#&nbsp;netstat&nbsp;-tap&nbsp;|&nbsp;grep&nbsp;mysql<br/> tcp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0&nbsp;*:mysql&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*:*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LISTEN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;26757/mysqld<br/> root@server1:~#</p>
<p>&nbsp;</p>
<h3>11 Install Amavisd-new, SpamAssassin, And Clamav</h3>
<p>To install amavisd-new, SpamAssassin, and ClamAV, we run</p>
<p class="command">apt-get install amavisd-new spamassassin clamav clamav-daemon zoo unzip bzip2 arj nomarch lzop cabextract apt-listchanges libnet-ldap-perl libauthen-sasl-perl clamav-docs daemon libio-string-perl libio-socket-ssl-perl libnet-ident-perl zip libnet-dns-perl</p>
<p>The ISPConfig 3 setup uses amavisd which loads the SpamAssassin filter library internally, so we can stop SpamAssassin to free up some RAM:</p>
<p class="command">/etc/init.d/spamassassin stop<br/> update-rc.d -f spamassassin remove</p>
<h3>12 Install Apache2, PHP5, phpMyAdmin, FCGI, suExec, Pear, And mcrypt</h3>
<p>Apache2, PHP5, phpMyAdmin, FCGI, suExec, Pear, and mcrypt can be installed as follows:</p>
<p class="command">apt-get install apache2 apache2.2-common apache2-doc apache2-mpm-prefork apache2-utils libexpat1 ssl-cert libapache2-mod-php5 php5 php5-common php5-gd php5-mysql php5-imap phpmyadmin php5-cli php5-cgi libapache2-mod-fcgid apache2-suexec php-pear php-auth php5-mcrypt mcrypt php5-imagick imagemagick libapache2-mod-suphp libruby libapache2-mod-ruby libapache2-mod-python php5-curl php5-intl php5-memcache php5-memcached php5-ming php5-ps php5-pspell php5-recode php5-snmp php5-sqlite php5-tidy php5-xmlrpc php5-xsl memcached</p>
<p>You will see the following question:</p>
<p class="system"><span class="system">Web server to reconfigure automatically:</span>&nbsp;<span class="highlight">&lt;- apache2<br/> </span>Configure database for phpmyadmin with dbconfig-common? <span class="highlight">&lt;- no</span></p>
<p>Then run the following command to enable the Apache modules <span class="system">suexec</span>, <span class="system">rewrite</span>, <span class="system">ssl</span>, <span class="system">actions</span>, and <span class="system">include</span> (plus <span class="system">dav</span>, <span class="system">dav_fs</span>, and <span class="system">auth_digest</span> if you want to use WebDAV):</p>
<p class="command">a2enmod suexec rewrite ssl actions include</p>
<p class="command">a2enmod dav_fs dav auth_digest</p>
<p>Next open <span class="system">/etc/apache2/mods-available/suphp.conf</span>...</p>
<p class="command">vi /etc/apache2/mods-available/suphp.conf</p>
<p>... and comment out the <span class="system">&lt;FilesMatch "\.ph(p3?|tml)$"&gt;</span> section and add the line <span class="system">AddType application/x-httpd-suphp .php .php3 .php4 .php5 .phtml</span> - otherwise all PHP files will be run by SuPHP:</p>
<table align="center" bgcolor="#CCCCCC" border="1" bordercolor="#000000" cellpadding="2" cellspacing="0" width="90%">
<tbody>
<tr>
<td class="">
<pre>&lt;IfModule mod_suphp.c&gt;
    #&lt;FilesMatch "\.ph(p3?|tml)$"&gt;
    #    SetHandler application/x-httpd-suphp
    #&lt;/FilesMatch&gt;
        AddType application/x-httpd-suphp .php .php3 .php4 .php5 .phtml
        suPHP_AddHandler application/x-httpd-suphp

    &lt;Directory /&gt;
        suPHP_Engine on
    &lt;/Directory&gt;

    # By default, disable suPHP for debian packaged web applications as files
    # are owned by root and cannot be executed by suPHP because of min_uid.
    &lt;Directory /usr/share&gt;
        suPHP_Engine off
    &lt;/Directory&gt;

# # Use a specific php config file (a dir which contains a php.ini file)
#       suPHP_ConfigPath /etc/php5/cgi/suphp/
# # Tells mod_suphp NOT to handle requests with the type &lt;mime-type&gt;.
#       suPHP_RemoveHandler &lt;mime-type&gt;
&lt;/IfModule&gt;</pre>
</td>
</tr>
</tbody>
</table>
<p>Restart Apache afterwards:</p>
<p class="command">/etc/init.d/apache2 restart</p>
<p>If you want to host Ruby files with the extension <span class="system">.rb</span> on your web sites created through ISPConfig, you must comment out the line <span class="system">application/x-ruby rb</span> in <span class="system">/etc/mime.types</span>:</p>
<p class="command">vi /etc/mime.types</p>
<table border="1" width="90%" cellspacing="0" cellpadding="2" align="center" bgcolor="#CCCCCC">
<tbody>
<tr>
<td>
<pre>[...]
#application/x-ruby                             rb
[...]</pre>
</td>
</tr>
</tbody>
</table>
<p>(This is needed only for <span class="system">.rb</span> files; Ruby files with the extension <span class="system">.rbx</span> work out of the box.)</p>
<p>Restart Apache afterwards:</p>
<p class="command">/etc/init.d/apache2 restart</p>
<p>&nbsp;</p>
<h4>12.1 Xcache</h4>
<p>Xcache is a free and open PHP opcode cacher for caching and optimizing PHP intermediate code. It's similar to other PHP opcode cachers, such as eAccelerator and APC. It is strongly recommended to have one of these installed to speed up your PHP page.</p>
<p>Xcache can be installed as follows:</p>
<p class="command">apt-get install php5-xcache</p>
<p>Now restart Apache:</p>
<p class="command">/etc/init.d/apache2 restart</p>
<p>&nbsp;</p>
<h4>12.2 PHP-FPM</h4>
<p>Starting with ISPConfig 3.0.5, there is an additional PHP mode that you can select for usage with Apache: PHP-FPM.</p>
<p>To use PHP-FPM with Apache, we need the mod_fastcgi Apache module (please don't mix this up with mod_fcgid - they are very similar, but you cannot use PHP-FPM with mod_fcgid). We can install PHP-FPM and mod_fastcgi as follows:</p>
<p class="command">apt-get install libapache2-mod-fastcgi php5-fpm</p>
<p>Make sure you enable the module and restart Apache:</p>
<p class="command">a2enmod actions fastcgi alias<br/> /etc/init.d/apache2 restart</p>
<p>&nbsp;</p>
<h4>12.3 Additional PHP Versions</h4>
<p>Starting with ISPConfig 3.0.5, it is possible to have multiple PHP versions on one server (selectable through ISPConfig) which can be run through FastCGI and PHP-FPM. To learn how to build additional PHP versions (PHP-FPM and FastCGI) and how to configure ISPConfig, please check this tutorial: <a href="https://www.howtoforge.com/how-to-use-multiple-php-versions-php-fpm-and-fastcgi-with-ispconfig-3-debian-wheezy" target="_blank">How To Use Multiple PHP Versions (PHP-FPM &amp; FastCGI) With ISPConfig 3 (Debian Wheezy)</a>.</p>
<p>&nbsp;</p>
<h3>13 Install Mailman</h3>
<p>Since version 3.0.4, ISPConfig also allows you to manage (create/modify/delete) Mailman mailing lists. If you want to make use of this feature, install Mailman as follows:</p>
<p class="command">apt-get install mailman</p>
<p>Select at least one language, e.g.:</p>
<p class="system"><span class="system">Languages to support:</span>&nbsp;<span class="highlight">&lt;-- en (English)<br/> </span>Missing site list&nbsp;<span class="highlight">&lt;-- Ok</span></p>
<p>Before we can start Mailman, a first mailing list called <span class="system">mailman</span> must be created:</p>
<p class="command">newlist mailman</p>
<p class="system">root@server1:~#&nbsp;newlist&nbsp;mailman<br/> Enter&nbsp;the&nbsp;email&nbsp;of&nbsp;the&nbsp;person&nbsp;running&nbsp;the&nbsp;list:&nbsp;<span class="highlight">&lt;--&nbsp;admin&nbsp;email&nbsp;address,&nbsp;e.g.&nbsp;listadmin@example.com</span><br/> Initial&nbsp;mailman&nbsp;password:&nbsp;<span class="highlight">&lt;--&nbsp;admin&nbsp;password&nbsp;for&nbsp;the&nbsp;mailman&nbsp;list</span><br/> To&nbsp;finish&nbsp;creating&nbsp;your&nbsp;mailing&nbsp;list,&nbsp;you&nbsp;must&nbsp;edit&nbsp;your&nbsp;/etc/aliases&nbsp;(or<br/> equivalent)&nbsp;file&nbsp;by&nbsp;adding&nbsp;the&nbsp;following&nbsp;lines,&nbsp;and&nbsp;possibly&nbsp;running&nbsp;the<br/> `newaliases'&nbsp;program:<br/> <br/> ##&nbsp;mailman&nbsp;mailing&nbsp;list<br/> mailman:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"|/var/lib/mailman/mail/mailman&nbsp;post&nbsp;mailman"<br/> mailman-admin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"|/var/lib/mailman/mail/mailman&nbsp;admin&nbsp;mailman"<br/> mailman-bounces:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"|/var/lib/mailman/mail/mailman&nbsp;bounces&nbsp;mailman"<br/> mailman-confirm:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"|/var/lib/mailman/mail/mailman&nbsp;confirm&nbsp;mailman"<br/> mailman-join:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"|/var/lib/mailman/mail/mailman&nbsp;join&nbsp;mailman"<br/> mailman-leave:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"|/var/lib/mailman/mail/mailman&nbsp;leave&nbsp;mailman"<br/> mailman-owner:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"|/var/lib/mailman/mail/mailman&nbsp;owner&nbsp;mailman"<br/> mailman-request:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"|/var/lib/mailman/mail/mailman&nbsp;request&nbsp;mailman"<br/> mailman-subscribe:&nbsp;&nbsp;&nbsp;&nbsp;"|/var/lib/mailman/mail/mailman&nbsp;subscribe&nbsp;mailman"<br/> mailman-unsubscribe:&nbsp;&nbsp;"|/var/lib/mailman/mail/mailman&nbsp;unsubscribe&nbsp;mailman"<br/> <br/> Hit&nbsp;enter&nbsp;to&nbsp;notify&nbsp;mailman&nbsp;owner...&nbsp;<span class="highlight">&lt;--&nbsp;ENTER</span><br/> <br/> root@server1:~#</p>
<p>Open <span class="system">/etc/aliases</span> afterwards...</p>
<p class="command">vi /etc/aliases</p>
<p>... and add the following lines:</p>
<table border="1" width="90%" cellspacing="0" cellpadding="2" align="center" bgcolor="#CCCCCC">
<tbody>
<tr>
<td>
<pre>[...]
## mailman mailing list
mailman:              "|/var/lib/mailman/mail/mailman post mailman"
mailman-admin:        "|/var/lib/mailman/mail/mailman admin mailman"
mailman-bounces:      "|/var/lib/mailman/mail/mailman bounces mailman"
mailman-confirm:      "|/var/lib/mailman/mail/mailman confirm mailman"
mailman-join:         "|/var/lib/mailman/mail/mailman join mailman"
mailman-leave:        "|/var/lib/mailman/mail/mailman leave mailman"
mailman-owner:        "|/var/lib/mailman/mail/mailman owner mailman"
mailman-request:      "|/var/lib/mailman/mail/mailman request mailman"
mailman-subscribe:    "|/var/lib/mailman/mail/mailman subscribe mailman"
mailman-unsubscribe:  "|/var/lib/mailman/mail/mailman unsubscribe mailman"</pre>
</td>
</tr>
</tbody>
</table>
<p>Run</p>
<p class="command">newaliases</p>
<p>afterwards and restart Postfix:</p>
<p class="command">/etc/init.d/postfix restart</p>
<p>Finally we must enable the Mailman Apache configuration:</p>
<p class="command">ln -s /etc/mailman/apache.conf /etc/apache2/conf.d/mailman.conf</p>
<p>This defines the alias <span class="system">/cgi-bin/mailman/</span> for all Apache vhosts, which means you can access the Mailman admin interface for a list at <span class="system">http:///cgi-bin/mailman/admin/</span>, and the web page for users of a mailing list can be found at <span class="system">http:///cgi-bin/mailman/listinfo/</span>.</p>
<p>Under <span class="system">http:///pipermail</span> you can find the mailing list archives.</p>
<p>Restart Apache afterwards:</p>
<p class="command">/etc/init.d/apache2 restart</p>
<p>Then start the Mailman daemon:</p>
<p class="command">/etc/init.d/mailman start</p>
<p>&nbsp;</p>
<h3>14 Install PureFTPd And Quota</h3>
<p>PureFTPd and quota can be installed with the following command:</p>
<p class="command">apt-get install pure-ftpd-common pure-ftpd-mysql quota quotatool</p>
<p>Edit the file <span class="system">/etc/default/pure-ftpd-common</span>...</p>
<p class="command">vi /etc/default/pure-ftpd-common</p>
<p>... and make sure that the start mode is set to <span class="system">standalone</span> and set <span class="system">VIRTUALCHROOT=true</span>:</p>
<table border="1" width="90%" cellspacing="0" cellpadding="2" align="center" bgcolor="#CCCCCC">
<tbody>
<tr>
<td>
<pre>[...]
STANDALONE_OR_INETD=standalone
[...]
VIRTUALCHROOT=true
[...]</pre>
</td>
</tr>
</tbody>
</table>
<p>Now we configure PureFTPd to allow FTP and TLS sessions. FTP is a very insecure protocol because all passwords and all data are transferred in clear text. By using TLS, the whole communication can be encrypted, thus making FTP much more secure.</p>
<p>If you want to allow FTP and TLS sessions, run</p>
<p class="command">echo 1 &gt; /etc/pure-ftpd/conf/TLS</p>
<p>In order to use TLS, we must create an SSL certificate. I create it in <span class="system">/etc/ssl/private/</span>, therefore I create that directory first:</p>
<p class="command">mkdir -p /etc/ssl/private/</p>
<p>Afterwards, we can generate the SSL certificate as follows:</p>
<p class="command">openssl req -x509 -nodes -days 7300 -newkey rsa:2048 -keyout /etc/ssl/private/pure-ftpd.pem -out /etc/ssl/private/pure-ftpd.pem</p>
<p class="system">Country Name (2 letter code) [AU]: <span class="highlight">&lt;-- Enter your Country Name (e.g., "DE").</span><br/> State or Province Name (full name) [Some-State]: <span class="highlight">&lt;-- Enter your State or Province Name.</span><br/> Locality Name (eg, city) []: <span class="highlight">&lt;-- Enter your City.</span><br/> Organization Name (eg, company) [Internet Widgits Pty Ltd]: <span class="highlight">&lt;-- Enter your Organization Name (e.g., the name of your company).</span><br/> Organizational Unit Name (eg, section) []: <span class="highlight">&lt;-- Enter your Organizational Unit Name (e.g. "IT Department").</span><br/> Common Name (eg, YOUR name) []: <span class="highlight">&lt;-- Enter the Fully Qualified Domain Name of the system (e.g. "server1.example.com").</span><br/> Email Address []:&nbsp;<span class="highlight">&lt;-- Enter your Email Address.</span></p>
<p>Change the permissions of the SSL certificate:</p>
<p class="command">chmod 600 /etc/ssl/private/pure-ftpd.pem</p>
<p>Then restart PureFTPd:</p>
<p class="command">/etc/init.d/pure-ftpd-mysql restart</p>
<p>Edit <span class="system">/etc/fstab</span>. Mine looks like this (I added <span class="system">,usrjquota=quota.user,grpjquota=quota.group,jqfmt=vfsv0</span> to the partition with the mount point <span class="system">/</span>):</p>
<p class="command">vi /etc/fstab</p>
<table border="1" width="90%" cellspacing="0" cellpadding="2" align="center" bgcolor="#CCCCCC">
<tbody>
<tr>
<td>
<pre># /etc/fstab: static file system information.
#
# Use 'blkid' to print the universally unique identifier for a
# device; this may be used with UUID= as a more robust way to name devices
# that works even if disks are added and removed. See fstab(5).
#
#
/dev/mapper/server1-root /               ext4    errors=remount-ro,usrjquota=quota.user,grpjquota=quota.group,jqfmt=vfsv0 0       1
# /boot was on /dev/sda1 during installation
UUID=46d1bd79-d761-4b23-80b8-ad20cb18e049 /boot           ext2    defaults        0       2
/dev/mapper/server1-swap_1 none            swap    sw              0       0
/dev/sr0        /media/cdrom0   udf,iso9660 user,noauto     0       0</pre>
</td>
</tr>
</tbody>
</table>
<p>To enable quota, run these commands:</p>
<p class="command">mount -o remount /</p>
<p class="command">quotacheck -avugm<br/> quotaon -avug</p>
<p>&nbsp;</p>
<h3>15 Install BIND DNS Server</h3>
<p>BIND can be installed as follows:</p>
<p class="command">apt-get install bind9 dnsutils</p>
<p>&nbsp;</p>
<h3>16 Install Vlogger, Webalizer, And AWstats</h3>
<p>Vlogger, webalizer, and AWstats can be installed as follows:</p>
<p class="command">apt-get install vlogger webalizer awstats geoip-database libclass-dbi-mysql-perl</p>
<p>Open <span class="system">/etc/cron.d/awstats</span> afterwards...</p>
<p class="command">vi /etc/cron.d/awstats</p>
<p>... and comment out everything in that file:</p>
<table border="1" width="90%" cellspacing="0" cellpadding="2" align="center" bgcolor="#CCCCCC">
<tbody>
<tr>
<td>
<pre>#MAILTO=root

#*/10 * * * * www-data [ -x /usr/share/awstats/tools/update.sh ] &amp;&amp; /usr/share/awstats/tools/update.sh

# Generate static reports:
#10 03 * * * www-data [ -x /usr/share/awstats/tools/buildstatic.sh ] &amp;&amp; /usr/share/awstats/tools/buildstatic.sh</pre>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<h3>17 Install Jailkit</h3>
<p>Jailkit is needed only if you want to chroot SSH users. It can be installed as follows (<span class="highlight">important: Jailkit must be installed before ISPConfig - it cannot be installed afterwards!</span>):</p>
<p class="command">apt-get install build-essential autoconf automake1.9 libtool flex bison debhelper binutils-gold</p>
<p class="command">cd /tmp<br/> wget http://olivier.sessink.nl/jailkit/jailkit-2.17.tar.gz<br/> tar xvfz jailkit-2.17.tar.gz<br/> cd jailkit-2.17<br/> ./debian/rules binary</p>
<p>You can now install the Jailkit <span class="system">.deb</span> package as follows:</p>
<p class="command">cd ..<br/> dpkg -i jailkit_2.17-1_*.deb<br/> rm -rf jailkit-2.17*</p>
<p>&nbsp;</p>
<h3>18 Install fail2ban</h3>
<p>This is optional but recommended, because the ISPConfig monitor tries to show the log:</p>
<p class="command">apt-get install fail2ban</p>
<p>To make fail2ban monitor PureFTPd and Dovecot, create the file <span class="system">/etc/fail2ban/jail.local</span>:</p>
<p class="command">vi /etc/fail2ban/jail.local</p>
<p><span style="font-family: 'Courier New', Courier, mono; font-style: italic; line-height: 1.1em; background-color: #f9f9f9;">&nbsp;</span></p>
<pre>[pureftpd]
enabled  = true
port     = ftp
filter   = pureftpd
logpath  = /var/log/syslog
maxretry = 3

[dovecot-pop3imap]
enabled = true
filter = dovecot-pop3imap
action = iptables-multiport[name=dovecot-pop3imap, port="pop3,pop3s,imap,imaps", protocol=tcp]
logpath = /var/log/mail.log
maxretry = 5

[sasl]
enabled  = true
port     = smtp
filter   = sasl
logpath  = /var/log/mail.log
maxretry = 3</pre>
<p>Then create the following two filter files:</p>
<p class="command">vi /etc/fail2ban/filter.d/pureftpd.conf</p>
<pre>[Definition]
failregex = .*pure-ftpd: \(.*@&lt;HOST&gt;\) \[WARNING\] Authentication failed for user.*
ignoreregex =</pre>
<p class="command"><span face="Verdana, Arial, Helvetica, sans-serif">vi /etc/fail2ban/filter.d/dovecot-pop3imap.conf</span></p>
<pre>[Definition]
failregex = (?: pop3-login|imap-login): .*(?:Authentication failure|Aborted login \(auth failed|Aborted login \(tried to use disabled|Disconnected \(auth failed|Aborted login \(\d+ authentication attempts).*rip=(?P&lt;host&gt;\S*),.*
ignoreregex =</pre>
<p>Restart fail2ban afterwards:</p>
<p class="command">/etc/init.d/fail2ban restart</p>
<h3>19 Install SquirrelMail</h3>
<p>To install the SquirrelMail webmail client, run</p>
<p class="command">apt-get install squirrelmail</p>
<p>Then configure SquirrelMail:</p>
<p class="command">squirrelmail-configure</p>
<p>We must tell SquirrelMail that we are using Dovecot-IMAP/-POP3:</p>
<p class="system">SquirrelMail&nbsp;Configuration&nbsp;:&nbsp;Read:&nbsp;config.php&nbsp;(1.4.0)<br/> ---------------------------------------------------------<br/> Main&nbsp;Menu&nbsp;--<br/> 1.&nbsp;&nbsp;Organization&nbsp;Preferences<br/> 2.&nbsp;&nbsp;Server&nbsp;Settings<br/> 3.&nbsp;&nbsp;Folder&nbsp;Defaults<br/> 4.&nbsp;&nbsp;General&nbsp;Options<br/> 5.&nbsp;&nbsp;Themes<br/> 6.&nbsp;&nbsp;Address&nbsp;Books<br/> 7.&nbsp;&nbsp;Message&nbsp;of&nbsp;the&nbsp;Day&nbsp;(MOTD)<br/> 8.&nbsp;&nbsp;Plugins<br/> 9.&nbsp;&nbsp;Database<br/> 10.&nbsp;Languages<br/> <br/> D.&nbsp;&nbsp;Set&nbsp;pre-defined&nbsp;settings&nbsp;for&nbsp;specific&nbsp;IMAP&nbsp;servers<br/> <br/> C&nbsp;&nbsp;&nbsp;Turn&nbsp;color&nbsp;on<br/> S&nbsp;&nbsp;&nbsp;Save&nbsp;data<br/> Q&nbsp;&nbsp;&nbsp;Quit<br/> <br/> Command&nbsp;&gt;&gt;&nbsp;<span class="highlight">&lt;--&nbsp;D</span><br/> <br/> <br/> SquirrelMail&nbsp;Configuration&nbsp;:&nbsp;Read:&nbsp;config.php<br/> ---------------------------------------------------------<br/> While&nbsp;we&nbsp;have&nbsp;been&nbsp;building&nbsp;SquirrelMail,&nbsp;we&nbsp;have&nbsp;discovered&nbsp;some<br/> preferences&nbsp;that&nbsp;work&nbsp;better&nbsp;with&nbsp;some&nbsp;servers&nbsp;that&nbsp;don't&nbsp;work&nbsp;so<br/> well&nbsp;with&nbsp;others.&nbsp;&nbsp;If&nbsp;you&nbsp;select&nbsp;your&nbsp;IMAP&nbsp;server,&nbsp;this&nbsp;option&nbsp;will<br/> set&nbsp;some&nbsp;pre-defined&nbsp;settings&nbsp;for&nbsp;that&nbsp;server.<br/> <br/> Please&nbsp;note&nbsp;that&nbsp;you&nbsp;will&nbsp;still&nbsp;need&nbsp;to&nbsp;go&nbsp;through&nbsp;and&nbsp;make&nbsp;sure<br/> everything&nbsp;is&nbsp;correct.&nbsp;&nbsp;This&nbsp;does&nbsp;not&nbsp;change&nbsp;everything.&nbsp;&nbsp;There&nbsp;are<br/> only&nbsp;a&nbsp;few&nbsp;settings&nbsp;that&nbsp;this&nbsp;will&nbsp;change.<br/> <br/> Please&nbsp;select&nbsp;your&nbsp;IMAP&nbsp;server:<br/> &nbsp;&nbsp;&nbsp;&nbsp;bincimap&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;Binc&nbsp;IMAP&nbsp;server<br/> &nbsp;&nbsp;&nbsp;&nbsp;courier&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;Courier&nbsp;IMAP&nbsp;server<br/> &nbsp;&nbsp;&nbsp;&nbsp;cyrus&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;Cyrus&nbsp;IMAP&nbsp;server<br/> &nbsp;&nbsp;&nbsp;&nbsp;dovecot&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;Dovecot&nbsp;Secure&nbsp;IMAP&nbsp;server<br/> &nbsp;&nbsp;&nbsp;&nbsp;exchange&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;Microsoft&nbsp;Exchange&nbsp;IMAP&nbsp;server<br/> &nbsp;&nbsp;&nbsp;&nbsp;hmailserver&nbsp;=&nbsp;hMailServer<br/> &nbsp;&nbsp;&nbsp;&nbsp;macosx&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;Mac&nbsp;OS&nbsp;X&nbsp;Mailserver<br/> &nbsp;&nbsp;&nbsp;&nbsp;mercury32&nbsp;&nbsp;&nbsp;=&nbsp;Mercury/32<br/> &nbsp;&nbsp;&nbsp;&nbsp;uw&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;University&nbsp;of&nbsp;Washington's&nbsp;IMAP&nbsp;server<br/> &nbsp;&nbsp;&nbsp;&nbsp;gmail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;IMAP&nbsp;access&nbsp;to&nbsp;Google&nbsp;mail&nbsp;(Gmail)&nbsp;accounts<br/> <br/> &nbsp;&nbsp;&nbsp;&nbsp;quit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;Do&nbsp;not&nbsp;change&nbsp;anything<br/> Command&nbsp;&gt;&gt;&nbsp;<span class="highlight">&lt;--&nbsp;dovecot</span><br/> <br/> <br/> SquirrelMail&nbsp;Configuration&nbsp;:&nbsp;Read:&nbsp;config.php<br/> ---------------------------------------------------------<br/> While&nbsp;we&nbsp;have&nbsp;been&nbsp;building&nbsp;SquirrelMail,&nbsp;we&nbsp;have&nbsp;discovered&nbsp;some<br/> preferences&nbsp;that&nbsp;work&nbsp;better&nbsp;with&nbsp;some&nbsp;servers&nbsp;that&nbsp;don't&nbsp;work&nbsp;so<br/> well&nbsp;with&nbsp;others.&nbsp;&nbsp;If&nbsp;you&nbsp;select&nbsp;your&nbsp;IMAP&nbsp;server,&nbsp;this&nbsp;option&nbsp;will<br/> set&nbsp;some&nbsp;pre-defined&nbsp;settings&nbsp;for&nbsp;that&nbsp;server.<br/> <br/> Please&nbsp;note&nbsp;that&nbsp;you&nbsp;will&nbsp;still&nbsp;need&nbsp;to&nbsp;go&nbsp;through&nbsp;and&nbsp;make&nbsp;sure<br/> everything&nbsp;is&nbsp;correct.&nbsp;&nbsp;This&nbsp;does&nbsp;not&nbsp;change&nbsp;everything.&nbsp;&nbsp;There&nbsp;are<br/> only&nbsp;a&nbsp;few&nbsp;settings&nbsp;that&nbsp;this&nbsp;will&nbsp;change.<br/> <br/> Please&nbsp;select&nbsp;your&nbsp;IMAP&nbsp;server:<br/> &nbsp;&nbsp;&nbsp;&nbsp;bincimap&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;Binc&nbsp;IMAP&nbsp;server<br/> &nbsp;&nbsp;&nbsp;&nbsp;courier&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;Courier&nbsp;IMAP&nbsp;server<br/> &nbsp;&nbsp;&nbsp;&nbsp;cyrus&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;Cyrus&nbsp;IMAP&nbsp;server<br/> &nbsp;&nbsp;&nbsp;&nbsp;dovecot&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;Dovecot&nbsp;Secure&nbsp;IMAP&nbsp;server<br/> &nbsp;&nbsp;&nbsp;&nbsp;exchange&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;Microsoft&nbsp;Exchange&nbsp;IMAP&nbsp;server<br/> &nbsp;&nbsp;&nbsp;&nbsp;hmailserver&nbsp;=&nbsp;hMailServer<br/> &nbsp;&nbsp;&nbsp;&nbsp;macosx&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;Mac&nbsp;OS&nbsp;X&nbsp;Mailserver<br/> &nbsp;&nbsp;&nbsp;&nbsp;mercury32&nbsp;&nbsp;&nbsp;=&nbsp;Mercury/32<br/> &nbsp;&nbsp;&nbsp;&nbsp;uw&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;University&nbsp;of&nbsp;Washington's&nbsp;IMAP&nbsp;server<br/> &nbsp;&nbsp;&nbsp;&nbsp;gmail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;IMAP&nbsp;access&nbsp;to&nbsp;Google&nbsp;mail&nbsp;(Gmail)&nbsp;accounts<br/> <br/> &nbsp;&nbsp;&nbsp;&nbsp;quit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;Do&nbsp;not&nbsp;change&nbsp;anything<br/> Command&nbsp;&gt;&gt;&nbsp;dovecot<br/> <br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;imap_server_type&nbsp;=&nbsp;dovecot<br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;default_folder_prefix&nbsp;=&nbsp;<br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;trash_folder&nbsp;=&nbsp;Trash<br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sent_folder&nbsp;=&nbsp;Sent<br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;draft_folder&nbsp;=&nbsp;Drafts<br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;show_prefix_option&nbsp;=&nbsp;false<br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;default_sub_of_inbox&nbsp;=&nbsp;false<br/> show_contain_subfolders_option&nbsp;=&nbsp;false<br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;optional_delimiter&nbsp;=&nbsp;detect<br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;delete_folder&nbsp;=&nbsp;false<br/> <br/> Press&nbsp;any&nbsp;key&nbsp;to&nbsp;continue...&nbsp;<span class="highlight">&lt;--&nbsp;press&nbsp;a&nbsp;key</span><br/> <br/> SquirrelMail&nbsp;Configuration&nbsp;:&nbsp;Read:&nbsp;config.php&nbsp;(1.4.0)<br/> ---------------------------------------------------------<br/> Main&nbsp;Menu&nbsp;--<br/> 1.&nbsp;&nbsp;Organization&nbsp;Preferences<br/> 2.&nbsp;&nbsp;Server&nbsp;Settings<br/> 3.&nbsp;&nbsp;Folder&nbsp;Defaults<br/> 4.&nbsp;&nbsp;General&nbsp;Options<br/> 5.&nbsp;&nbsp;Themes<br/> 6.&nbsp;&nbsp;Address&nbsp;Books<br/> 7.&nbsp;&nbsp;Message&nbsp;of&nbsp;the&nbsp;Day&nbsp;(MOTD)<br/> 8.&nbsp;&nbsp;Plugins<br/> 9.&nbsp;&nbsp;Database<br/> 10.&nbsp;Languages<br/> <br/> D.&nbsp;&nbsp;Set&nbsp;pre-defined&nbsp;settings&nbsp;for&nbsp;specific&nbsp;IMAP&nbsp;servers<br/> <br/> C&nbsp;&nbsp;&nbsp;Turn&nbsp;color&nbsp;on<br/> S&nbsp;&nbsp;&nbsp;Save&nbsp;data<br/> Q&nbsp;&nbsp;&nbsp;Quit<br/> <br/> Command&nbsp;&gt;&gt;&nbsp;<span class="highlight">&lt;--&nbsp;S</span><br/> <br/> <br/> SquirrelMail&nbsp;Configuration&nbsp;:&nbsp;Read:&nbsp;config.php&nbsp;(1.4.0)<br/> ---------------------------------------------------------<br/> Main&nbsp;Menu&nbsp;--<br/> 1.&nbsp;&nbsp;Organization&nbsp;Preferences<br/> 2.&nbsp;&nbsp;Server&nbsp;Settings<br/> 3.&nbsp;&nbsp;Folder&nbsp;Defaults<br/> 4.&nbsp;&nbsp;General&nbsp;Options<br/> 5.&nbsp;&nbsp;Themes<br/> 6.&nbsp;&nbsp;Address&nbsp;Books<br/> 7.&nbsp;&nbsp;Message&nbsp;of&nbsp;the&nbsp;Day&nbsp;(MOTD)<br/> 8.&nbsp;&nbsp;Plugins<br/> 9.&nbsp;&nbsp;Database<br/> 10.&nbsp;Languages<br/> <br/> D.&nbsp;&nbsp;Set&nbsp;pre-defined&nbsp;settings&nbsp;for&nbsp;specific&nbsp;IMAP&nbsp;servers<br/> <br/> C&nbsp;&nbsp;&nbsp;Turn&nbsp;color&nbsp;on<br/> S&nbsp;&nbsp;&nbsp;Save&nbsp;data<br/> Q&nbsp;&nbsp;&nbsp;Quit<br/> <br/> Command&nbsp;&gt;&gt;&nbsp;<span class="highlight">&lt;--&nbsp;Q</span></p>
<p>Now we will configure SquirrelMail so that you can use it from within your web sites (created through ISPConfig) by using the <span class="system">/squirrelmail</span> or <span class="system">/webmail</span> aliases. So if your website is <span class="system">www.example.com</span>, you will be able to access SquirrelMail using <span class="system">www.example.com/squirrelmail</span> or <span class="system">www.example.com/webmail</span>.</p>
<p>SquirrelMail's Apache configuration is in the file <span class="system">/etc/squirrelmail/apache.conf</span>, but this file isn't loaded by Apache because it is not in the <span class="system">/etc/apache2/conf.d/</span> directory. Therefore we create a symlink called <span class="system">squirrelmail.conf</span> in the <span class="system">/etc/apache2/conf.d/</span> directory that points to <span class="system">/etc/squirrelmail/apache.conf</span> and reload Apache afterwards:</p>
<p class="command">cd /etc/apache2/conf.d/<br/> ln -s ../../squirrelmail/apache.conf squirrelmail.conf<br/> /etc/init.d/apache2 reload</p>
<p>Now open <span class="system">/etc/apache2/conf.d/squirrelmail.conf</span>...</p>
<p class="command">vi /etc/apache2/conf.d/squirrelmail.conf</p>
<p>... and add the following lines to the container that make sure that mod_php is used for accessing SquirrelMail, regardless of what PHP mode you select for your website in ISPConfig:</p>
<p><span style="font-family: 'Courier New', Courier, mono; font-style: italic; line-height: 1.1em; background-color: #f9f9f9;">&nbsp;</span></p>
<pre>[...]
&lt;Directory /usr/share/squirrelmail&gt;
  Options FollowSymLinks
  &lt;IfModule mod_php5.c&gt;
    <span class="highlight">AddType application/x-httpd-php .php</span>
    <span class="highlight">php_flag magic_quotes_gpc Off</span>
    <span class="highlight">php_flag track_vars On</span>
    <span class="highlight">php_admin_flag allow_url_fopen Off</span>
    <span class="highlight">php_value include_path .</span>
    <span class="highlight">php_admin_value upload_tmp_dir /var/lib/squirrelmail/tmp</span>
    <span class="highlight">php_admin_value open_basedir /usr/share/squirrelmail:/etc/squirrelmail:/var/lib/squirrelmail:/etc/hostname:/etc/mailname</span>
    php_flag register_globals off
  &lt;/IfModule&gt;
  &lt;IfModule mod_dir.c&gt;
    DirectoryIndex index.php
  &lt;/IfModule&gt;

  # access to configtest is limited by default to prevent information leak
  &lt;Files configtest.php&gt;
    order deny,allow
    deny from all
    allow from 127.0.0.1
  &lt;/Files&gt;
&lt;/Directory&gt;
[...]</pre>
<p><span style="font-family: 'Courier New', Courier, mono; font-style: italic; line-height: 1.1em; background-color: #f9f9f9;">mkdir /var/lib/squirrelmail/tmp</span>Create the directory <span class="system">/var/lib/squirrelmail/tmp</span>...</p>
<p>... and make it owned by the user <span class="system">www-data</span>:</p>
<p class="command">chown www-data /var/lib/squirrelmail/tmp</p>
<p>Reload Apache again:</p>
<p class="command">/etc/init.d/apache2 reload</p>
<p>That's it already - <span class="system">/etc/apache2/conf.d/squirrelmail.conf</span> defines an alias called <span class="system">/squirrelmail</span> that points to SquirrelMail's installation directory <span class="system">/usr/share/squirrelmail</span>.</p>
<p>You can now access SquirrelMail from your web site as follows:</p>
<p class="system">http://192.168.0.100/squirrelmail<br/> http://www.example.com/squirrelmail</p>
<p>You can also access it from the ISPConfig control panel vhost (after you have installed ISPConfig, see the next chapter) as follows (this doesn't need any configuration in ISPConfig):</p>
<p class="system">http://server1.example.com:8080/squirrelmail</p>
<p>If you'd like to use the alias <span class="system">/webmail</span> instead of <span class="system">/squirrelmail</span>, simply open <span class="system">/etc/apache2/conf.d/squirrelmail.conf</span>...</p>
<p class="command">vi /etc/apache2/conf.d/squirrelmail.conf</p>
<p>... and add the line <span class="system">Alias /webmail /usr/share/squirrelmail</span>:</p>
<p><span style="font-family: 'Courier New', Courier, mono; font-style: italic; line-height: 1.1em; background-color: #f9f9f9;">&nbsp;</span></p>
<pre>Alias /squirrelmail /usr/share/squirrelmail
Alias /webmail /usr/share/squirrelmail
[...]</pre>
<p>Then reload Apache:</p>
<p class="command">/etc/init.d/apache2 reload</p>
<p>Now you can access Squirrelmail as follows:</p>
<p><span class="system">http://192.168.0.100/webmail<br/> http://www.example.com/webmail<br/> http://server1.example.com:8080/webmail</span> (after you have installed ISPConfig, see the next chapter)</p>
<p class="system"><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/37.png" alt="" width="550" height="399"/></p>
<p>If you'd like to define a vhost like <span class="system">webmail.example.com</span> where your users can access SquirrelMail, you'd have to add the following vhost configuration to <span class="system">/etc/apache2/conf.d/squirrelmail.conf</span>:</p>
<p class="command">vi /etc/apache2/conf.d/squirrelmail.conf</p>
<p></p>
<table align="center" bgcolor="#CCCCCC" border="1" bordercolor="#000000" cellpadding="2" cellspacing="0" width="90%">
<tbody>
<tr>
<td class="">
<pre>[...]
&lt;VirtualHost *:80&gt;
  DocumentRoot /usr/share/squirrelmail
  ServerName webmail.example.com
&lt;/VirtualHost&gt;</pre>
</td>
</tr>
</tbody>
</table>
<p><span style="font-family: 'Courier New', Courier, mono; font-style: italic; line-height: 1.1em; background-color: #f9f9f9;">/etc/init.d/apache2 reload&nbsp;</span>Now reload Apache...&nbsp;Of course, there must be a DNS record for <span class="system">webmail.example.com</span> that points to the IP address that you use in the vhost configuration. Also make sure that the vhost <span class="system">webmail.example.com</span> does not exist in ISPConfig (otherwise both vhosts will interfere with each other!).</p>
<p>... and you can access SquirrelMail under <span class="system">http://webmail.example.com</span>!</p>
<p>&nbsp;</p>
<h3>20 Install ISPConfig 3</h3>
<p>To install ISPConfig 3 from the latest released version, do this:</p>
<p class="command">cd /tmp<br/> wget http://www.ispconfig.org/downloads/ISPConfig-3-stable.tar.gz<br/> tar xfz ISPConfig-3-stable.tar.gz<br/> cd ispconfig3_install/install/</p>
<p>The next step is to run</p>
<p class="command">php -q install.php</p>
<p>This will start the ISPConfig 3 installer. The installer will configure all services like Postfix, Dovecot, etc. for you. A manual setup as required for ISPConfig 2 (perfect setup guides) is not necessary.</p>
<p class="system"><span class="system">root@server1:/tmp/ispconfig3_install/install#&nbsp;php&nbsp;-q&nbsp;install.php<br/> PHP&nbsp;Deprecated:&nbsp;&nbsp;Comments&nbsp;starting&nbsp;with&nbsp;'#'&nbsp;are&nbsp;deprecated&nbsp;in&nbsp;/etc/php5/cli/conf.d/ming.ini&nbsp;on&nbsp;line&nbsp;1&nbsp;in&nbsp;Unknown&nbsp;on&nbsp;line&nbsp;0<br/> <br/> <br/> --------------------------------------------------------------------------------<br/> &nbsp;_____&nbsp;___________&nbsp;&nbsp;&nbsp;_____&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;__&nbsp;_&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;____<br/> |_&nbsp;&nbsp;&nbsp;_/&nbsp;&nbsp;___|&nbsp;___&nbsp;\&nbsp;/&nbsp;&nbsp;__&nbsp;\&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;_(_)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/__&nbsp;&nbsp;\<br/> &nbsp;&nbsp;|&nbsp;|&nbsp;\&nbsp;`--.|&nbsp;|_/&nbsp;/&nbsp;|&nbsp;/&nbsp;&nbsp;\/&nbsp;___&nbsp;&nbsp;_&nbsp;__&nbsp;|&nbsp;|_&nbsp;_&nbsp;&nbsp;__&nbsp;_&nbsp;&nbsp;&nbsp;&nbsp;_/&nbsp;/<br/> &nbsp;&nbsp;|&nbsp;|&nbsp;&nbsp;`--.&nbsp;\&nbsp;&nbsp;__/&nbsp;&nbsp;|&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;_&nbsp;\|&nbsp;'_&nbsp;\|&nbsp;&nbsp;_|&nbsp;|/&nbsp;_`&nbsp;|&nbsp;&nbsp;|_&nbsp;|<br/> &nbsp;_|&nbsp;|_/\__/&nbsp;/&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;\__/\&nbsp;(_)&nbsp;|&nbsp;|&nbsp;|&nbsp;|&nbsp;|&nbsp;|&nbsp;|&nbsp;(_|&nbsp;|&nbsp;___\&nbsp;\<br/> &nbsp;\___/\____/\_|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\____/\___/|_|&nbsp;|_|_|&nbsp;|_|\__,&nbsp;|&nbsp;\____/<br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;__/&nbsp;|<br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|___/<br/> --------------------------------------------------------------------------------<br/> <br/> <br/> &gt;&gt;&nbsp;Initial&nbsp;configuration<br/> <br/> Operating&nbsp;System:&nbsp;Debian&nbsp;or&nbsp;compatible,&nbsp;unknown&nbsp;version.<br/> <br/> &nbsp;&nbsp;&nbsp;&nbsp;Following&nbsp;will&nbsp;be&nbsp;a&nbsp;few&nbsp;questions&nbsp;for&nbsp;primary&nbsp;configuration&nbsp;so&nbsp;be&nbsp;careful.<br/> &nbsp;&nbsp;&nbsp;&nbsp;Default&nbsp;values&nbsp;are&nbsp;in&nbsp;[brackets]&nbsp;and&nbsp;can&nbsp;be&nbsp;accepted&nbsp;with&nbsp;.<br/> &nbsp;&nbsp;&nbsp;&nbsp;Tap&nbsp;in&nbsp;"quit"&nbsp;(without&nbsp;the&nbsp;quotes)&nbsp;to&nbsp;stop&nbsp;the&nbsp;installer.<br/> <br/> <br/> Select&nbsp;language&nbsp;(en,de)&nbsp;[en]:</span>&nbsp;<span class="highlight">&lt;--&nbsp;ENTER<br/> <br/> </span>Installation&nbsp;mode&nbsp;(standard,expert)&nbsp;[standard]:&nbsp;<span class="highlight">&lt;--&nbsp;ENTER</span><br/> <br/> Full&nbsp;qualified&nbsp;hostname&nbsp;(FQDN)&nbsp;of&nbsp;the&nbsp;server,&nbsp;eg&nbsp;server1.domain.tld&nbsp;&nbsp;[server1.example.com]:&nbsp;<span class="highlight">&lt;--&nbsp;ENTER</span><br/> <br/> MySQL&nbsp;server&nbsp;hostname&nbsp;[localhost]:&nbsp;<span class="highlight">&lt;--&nbsp;ENTER</span><br/> <br/> MySQL&nbsp;root&nbsp;username&nbsp;[root]:&nbsp;<span class="highlight">&lt;--&nbsp;ENTER</span><br/> <br/> MySQL&nbsp;root&nbsp;password&nbsp;[]:&nbsp;<span class="highlight">&lt;--&nbsp;yourrootsqlpassword</span><br/> <br/> MySQL&nbsp;database&nbsp;to&nbsp;create&nbsp;[dbispconfig]:&nbsp;<span class="highlight">&lt;--&nbsp;ENTER</span><br/> <br/> MySQL&nbsp;charset&nbsp;[utf8]:&nbsp;<span class="highlight">&lt;--&nbsp;ENTER</span><br/> <br/> Generating&nbsp;a&nbsp;4096&nbsp;bit&nbsp;RSA&nbsp;private&nbsp;key<br/> .............................................................++<br/> .........................................................................................................................++<br/> writing&nbsp;new&nbsp;private&nbsp;key&nbsp;to&nbsp;'smtpd.key'<br/> -----<br/> You&nbsp;are&nbsp;about&nbsp;to&nbsp;be&nbsp;asked&nbsp;to&nbsp;enter&nbsp;information&nbsp;that&nbsp;will&nbsp;be&nbsp;incorporated<br/> into&nbsp;your&nbsp;certificate&nbsp;request.<br/> What&nbsp;you&nbsp;are&nbsp;about&nbsp;to&nbsp;enter&nbsp;is&nbsp;what&nbsp;is&nbsp;called&nbsp;a&nbsp;Distinguished&nbsp;Name&nbsp;or&nbsp;a&nbsp;DN.<br/> There&nbsp;are&nbsp;quite&nbsp;a&nbsp;few&nbsp;fields&nbsp;but&nbsp;you&nbsp;can&nbsp;leave&nbsp;some&nbsp;blank<br/> For&nbsp;some&nbsp;fields&nbsp;there&nbsp;will&nbsp;be&nbsp;a&nbsp;default&nbsp;value,<br/> If&nbsp;you&nbsp;enter&nbsp;'.',&nbsp;the&nbsp;field&nbsp;will&nbsp;be&nbsp;left&nbsp;blank.<br/> -----<br/> Country&nbsp;Name&nbsp;(2&nbsp;letter&nbsp;code)&nbsp;[AU]:&nbsp;<span class="highlight">&lt;--&nbsp;ENTER</span><br/> State&nbsp;or&nbsp;Province&nbsp;Name&nbsp;(full&nbsp;name)&nbsp;[Some-State]:&nbsp;<span class="highlight">&lt;--&nbsp;ENTER</span><br/> Locality&nbsp;Name&nbsp;(eg,&nbsp;city)&nbsp;[]:&nbsp;<span class="highlight">&lt;--&nbsp;ENTER</span><br/> Organization&nbsp;Name&nbsp;(eg,&nbsp;company)&nbsp;[Internet&nbsp;Widgits&nbsp;Pty&nbsp;Ltd]:&nbsp;<span class="highlight">&lt;--&nbsp;ENTER</span><br/> Organizational&nbsp;Unit&nbsp;Name&nbsp;(eg,&nbsp;section)&nbsp;[]:&nbsp;<span class="highlight">&lt;--&nbsp;ENTER</span><br/> Common&nbsp;Name&nbsp;(e.g.&nbsp;server&nbsp;FQDN&nbsp;or&nbsp;YOUR&nbsp;name)&nbsp;[]:&nbsp;<span class="highlight">&lt;--&nbsp;ENTER</span><br/> Email&nbsp;Address&nbsp;[]:&nbsp;<span class="highlight">&lt;--&nbsp;ENTER</span><br/> Configuring&nbsp;Jailkit<br/> Configuring&nbsp;Dovecot<br/> Configuring&nbsp;Spamassassin<br/> Configuring&nbsp;Amavisd<br/> Configuring&nbsp;Getmail<br/> Configuring&nbsp;Pureftpd<br/> Configuring&nbsp;BIND<br/> Configuring&nbsp;Apache<br/> Configuring&nbsp;Vlogger<br/> Configuring&nbsp;Apps&nbsp;vhost<br/> Configuring&nbsp;Bastille&nbsp;Firewall<br/> Configuring&nbsp;Fail2ban<br/> Installing&nbsp;ISPConfig<br/> ISPConfig&nbsp;Port&nbsp;[8080]:&nbsp;<span class="highlight">&lt;--&nbsp;ENTER</span><br/> <br/> Do&nbsp;you&nbsp;want&nbsp;a&nbsp;secure&nbsp;(SSL)&nbsp;connection&nbsp;to&nbsp;the&nbsp;ISPConfig&nbsp;web&nbsp;interface&nbsp;(y,n)&nbsp;[y]:&nbsp;<span class="highlight">&lt;--&nbsp;ENTER</span><br/> <br/> Generating&nbsp;RSA&nbsp;private&nbsp;key,&nbsp;4096&nbsp;bit&nbsp;long&nbsp;modulus<br/> .................................................................................................++<br/> ........++<br/> e&nbsp;is&nbsp;65537&nbsp;(0x10001)<br/> You&nbsp;are&nbsp;about&nbsp;to&nbsp;be&nbsp;asked&nbsp;to&nbsp;enter&nbsp;information&nbsp;that&nbsp;will&nbsp;be&nbsp;incorporated<br/> into&nbsp;your&nbsp;certificate&nbsp;request.<br/> What&nbsp;you&nbsp;are&nbsp;about&nbsp;to&nbsp;enter&nbsp;is&nbsp;what&nbsp;is&nbsp;called&nbsp;a&nbsp;Distinguished&nbsp;Name&nbsp;or&nbsp;a&nbsp;DN.<br/> There&nbsp;are&nbsp;quite&nbsp;a&nbsp;few&nbsp;fields&nbsp;but&nbsp;you&nbsp;can&nbsp;leave&nbsp;some&nbsp;blank<br/> For&nbsp;some&nbsp;fields&nbsp;there&nbsp;will&nbsp;be&nbsp;a&nbsp;default&nbsp;value,<br/> If&nbsp;you&nbsp;enter&nbsp;'.',&nbsp;the&nbsp;field&nbsp;will&nbsp;be&nbsp;left&nbsp;blank.<br/> -----<br/> Country&nbsp;Name&nbsp;(2&nbsp;letter&nbsp;code)&nbsp;[AU]:&nbsp;<span class="highlight">&lt;--&nbsp;ENTER</span><br/> State&nbsp;or&nbsp;Province&nbsp;Name&nbsp;(full&nbsp;name)&nbsp;[Some-State]:&nbsp;<span class="highlight">&lt;--&nbsp;ENTER</span><br/> Locality&nbsp;Name&nbsp;(eg,&nbsp;city)&nbsp;[]:&nbsp;<span class="highlight">&lt;--&nbsp;ENTER</span><br/> Organization&nbsp;Name&nbsp;(eg,&nbsp;company)&nbsp;[Internet&nbsp;Widgits&nbsp;Pty&nbsp;Ltd]:&nbsp;<span class="highlight">&lt;--&nbsp;ENTER</span><br/> Organizational&nbsp;Unit&nbsp;Name&nbsp;(eg,&nbsp;section)&nbsp;[]:&nbsp;<span class="highlight">&lt;--&nbsp;ENTER</span><br/> Common&nbsp;Name&nbsp;(e.g.&nbsp;server&nbsp;FQDN&nbsp;or&nbsp;YOUR&nbsp;name)&nbsp;[]:&nbsp;<span class="highlight">&lt;--&nbsp;ENTER</span><br/> Email&nbsp;Address&nbsp;[]:&nbsp;<span class="highlight">&lt;--&nbsp;ENTER</span><br/> <br/> Please&nbsp;enter&nbsp;the&nbsp;following&nbsp;'extra'&nbsp;attributes<br/> to&nbsp;be&nbsp;sent&nbsp;with&nbsp;your&nbsp;certificate&nbsp;request<br/> A&nbsp;challenge&nbsp;password&nbsp;[]:&nbsp;<span class="highlight">&lt;--&nbsp;ENTER</span><br/> An&nbsp;optional&nbsp;company&nbsp;name&nbsp;[]:&nbsp;<span class="highlight">&lt;--&nbsp;ENTER</span><br/> writing&nbsp;RSA&nbsp;key<br/> Configuring&nbsp;DBServer<br/> Installing&nbsp;ISPConfig&nbsp;crontab<br/> no&nbsp;crontab&nbsp;for&nbsp;root<br/> no&nbsp;crontab&nbsp;for&nbsp;getmail<br/> Restarting&nbsp;services&nbsp;...<br/> Stopping&nbsp;MySQL&nbsp;database&nbsp;server:&nbsp;mysqld.<br/> Starting&nbsp;MySQL&nbsp;database&nbsp;server:&nbsp;mysqld&nbsp;..<br/> Checking&nbsp;for&nbsp;tables&nbsp;which&nbsp;need&nbsp;an&nbsp;upgrade,&nbsp;are&nbsp;corrupt&nbsp;or&nbsp;were<br/> not&nbsp;closed&nbsp;cleanly..<br/> Stopping&nbsp;Postfix&nbsp;Mail&nbsp;Transport&nbsp;Agent:&nbsp;postfix.<br/> Starting&nbsp;Postfix&nbsp;Mail&nbsp;Transport&nbsp;Agent:&nbsp;postfix.<br/> Stopping&nbsp;amavisd:&nbsp;amavisd-new.<br/> Starting&nbsp;amavisd:&nbsp;amavisd-new.<br/> Stopping&nbsp;ClamAV&nbsp;daemon:&nbsp;clamd.<br/> Starting&nbsp;ClamAV&nbsp;daemon:&nbsp;clamd&nbsp;.<br/> Restarting&nbsp;IMAP/POP3&nbsp;mail&nbsp;server:&nbsp;dovecot.<br/> [Tue&nbsp;May&nbsp;07&nbsp;02:36:22&nbsp;2013]&nbsp;[warn]&nbsp;NameVirtualHost&nbsp;*:443&nbsp;has&nbsp;no&nbsp;VirtualHosts<br/> [Tue&nbsp;May&nbsp;07&nbsp;02:36:22&nbsp;2013]&nbsp;[warn]&nbsp;NameVirtualHost&nbsp;*:80&nbsp;has&nbsp;no&nbsp;VirtualHosts<br/> [Tue&nbsp;May&nbsp;07&nbsp;02:36:23&nbsp;2013]&nbsp;[warn]&nbsp;NameVirtualHost&nbsp;*:443&nbsp;has&nbsp;no&nbsp;VirtualHosts<br/> [Tue&nbsp;May&nbsp;07&nbsp;02:36:23&nbsp;2013]&nbsp;[warn]&nbsp;NameVirtualHost&nbsp;*:80&nbsp;has&nbsp;no&nbsp;VirtualHosts<br/> Restarting&nbsp;web&nbsp;server:&nbsp;apache2&nbsp;...&nbsp;waiting&nbsp;.<br/> Restarting&nbsp;ftp&nbsp;server:&nbsp;Running:&nbsp;/usr/sbin/pure-ftpd-mysql-virtualchroot&nbsp;-l&nbsp;mysql:/etc/pure-ftpd/db/mysql.conf&nbsp;-l&nbsp;pam&nbsp;-H&nbsp;-O&nbsp;clf:/var/log/pure-ftpd/transfer.log&nbsp;-Y&nbsp;1&nbsp;-D&nbsp;-u&nbsp;1000&nbsp;-A&nbsp;-E&nbsp;-b&nbsp;-8&nbsp;UTF-8&nbsp;-B<br/> Installation&nbsp;completed.<br/> root@server1:/tmp/ispconfig3_install/install#</p>
<p>The installer automatically configures all underlying services, so no manual configuration is needed.</p>
<p>You now also have the possibility to let the installer create an SSL vhost for the ISPConfig control panel, so that ISPConfig can be accessed using <span class="system">https://</span> instead of <span class="system">http://</span>. To achieve this, just press <span class="system">ENTER</span> when you see this question: <span class="system">Do you want a secure (SSL) connection to the ISPConfig web interface (y,n) [y]:</span>.</p>
<p>Afterwards you can access ISPConfig 3 under <span class="system">http(s)://server1.example.com:8080/</span> or <span class="system">http(s)://192.168.0.100:8080/</span> ( http or https depends on what you chose during installation). Log in with the username <span class="system">admin</span> and the password <span class="system">admin</span> (you should change the default password after your first login):</p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/38.png" alt="" width="550" height="399"/></p>
<p><img src="https://www.howtoforge.com/images/perfect_server_debian_wheezy_apache2_bind_dovecot_ispconfig_3/39.png" alt="" width="550" height="399"/></p>
<p>The system is now ready to be used.</p>
<p>&nbsp;</p>
<div class="sponsor">
<h4>20.1 ISPConfig 3 Manual</h4>
<p>In order to learn how to use ISPConfig 3, I strongly recommend to <a href="https://www.howtoforge.com/download-the-ispconfig-3-manual" target="_blank">download the ISPConfig 3 Manual</a>.</p>
<p>On more than 300 pages, it covers the concept behind ISPConfig (admin, resellers, clients), explains how to install and update ISPConfig 3, includes a reference for all forms and form fields in ISPConfig together with examples of valid inputs, and provides tutorials for the most common tasks in ISPConfig 3. It also lines out how to make your server more secure and comes with a troubleshooting section at the end.</p>
<p>&nbsp;</p>
<h4>20.2 ISPConfig Monitor App For Android</h4>
<p>With the ISPConfig Monitor App, you can check your server status and find out if all services are running as expected. You can check TCP and UDP ports and ping your servers. In addition to that you can use this app to request details from servers that have ISPConfig installed (<strong>please note that the minimum installed ISPConfig 3 version with support for the ISPConfig Monitor App is 3.0.3.3!</strong>); these details include everything you know from the Monitor module in the ISPConfig Control Panel (e.g. services, mail and system logs, mail queue, CPU and memory info, disk usage, quota, OS details, RKHunter log, etc.), and of course, as ISPConfig is multiserver-capable, you can check all servers that are controlled from your ISPConfig master server.</p>
<p>For download and usage instructions, please visit <a href="http://www.ispconfig.org/ispconfig-3/ispconfig-monitor-app-for-android/" target="_blank">http://www.ispconfig.org/ispconfig-3/ispconfig-monitor-app-for-android/</a>.</p>
</div>
<p>&nbsp;</p>
<h3>21 Additional Notes</h3>
<h4>21.1 OpenVZ</h4>
<p>If the Debian server that you've just set up in this tutorial is an OpenVZ container (virtual machine), you should do this on the <span class="highlight">host system</span> (I'm assuming that the ID of the OpenVZ container is <span class="system">101</span> - replace it with the correct <span class="system">VPSID</span> on your system):</p>
<p class="command">VPSID=101<br/> for CAP in CHOWN DAC_READ_SEARCH SETGID SETUID NET_BIND_SERVICE NET_ADMIN SYS_CHROOT SYS_NICE CHOWN DAC_READ_SEARCH SETGID SETUID NET_BIND_SERVICE NET_ADMIN SYS_CHROOT SYS_NICE<br/> do<br/> &nbsp;&nbsp;vzctl set $VPSID --capability ${CAP}:on --save<br/> done</p>
<p>&nbsp;</p>
<h3>22 Links</h3>
<ul>
<li>Debian: <a href="http://www.debian.org/" target="_blank">http://www.debian.org/</a></li>
<li>ISPConfig: <a href="http://www.ispconfig.org/" target="_blank">http://www.ispconfig.org/</a></li>
