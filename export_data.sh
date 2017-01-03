PASS=`cat dbConnection.php| grep PASSWORD | cut -d "'" -f 4`
USER_NAME=`cat dbConnection.php| grep USER_NAME | cut -d "'" -f 4`
DATABASE=`cat dbConnection.php| grep DATABASE | cut -d "'" -f 4`
echo "use $DATABASE;select * from People order by 
time 
desc;select * 
from 
CampusAmberg;" | 
mysql -u $USER_NAME --password="$PASS" | sed 's/\t/,/g'

