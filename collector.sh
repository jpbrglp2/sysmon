#!/data/data/com.termux/files/usr/bin/bash

PC_IP="SEU ENDEREÇO IP"

while true
do

CPU=$(cat /proc/cpuinfo | grep Hardware | cut -d ":" -f2 | xargs)

RAM=$(free -h | grep Mem | awk '{print $3 " / " $2}')

UPTIME=$(uptime -p)

BATTERY=$(termux-battery-status 2>/dev/null | grep percentage | grep -o '[0-9]\+')

LAST_UPDATE=$(date '+%d/%m/%Y %H:%M:%S')

cat > system.json << EOF
{
    "cpu":"$CPU",
    "ram":"$RAM",
    "battery":"$BATTERY%",
    "uptime":"$UPTIME",
    "last_update":"$LAST_UPDATE"
}
EOF

HTTP_CODE=$(curl \
-s \
-o /dev/null \
-w "%{http_code}" \
-X POST \
-H "Content-Type: application/json" \
-d @system.json \
http://$PC_IP/CyberDeckMonitor/receiver.php)

clear

figlet SYSMON

echo
echo "STATUS............. ONLINE"
echo
echo "CPU................ $CPU"
echo "RAM................ $RAM"
echo "BATERIA............ $BATTERY%"
echo "UPTIME............. $UPTIME"
echo
echo "SERVIDOR........... $HTTP_CODE"
echo "ULTIMO ENVIO....... $LAST_UPDATE"
echo

sleep 5

done