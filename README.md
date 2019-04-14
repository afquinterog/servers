# servers

To keep track of server status just need to add the client-script.sh to your ubuntu base server and run it periodically, the following cron ran the script each minute feel free to adjust value according to your needs.

*/1 * * * * /home/ubuntu/crons/client-script.sh > /home/ubuntu/crons/client-script.log 2>&1