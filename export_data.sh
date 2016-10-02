PASS=`cat dbConnection.php| grep PASSWORD | cut -d "'" -f 4`
echo "use anwesha_17;select * from People order by 
time 
desc;select * 
from 
CampusAmberg;" | 
mysql -u anwesha_17 --password="$PASS" | sed 's/\t/,/g'

