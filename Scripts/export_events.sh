PASS=`cat dbConnection.php| grep PASSWORD | cut -d "'" -f 4`
USER_NAME=`cat dbConnection.php| grep USER_NAME | cut -d "'" -f 4`
DATABASE=`cat dbConnection.php| grep DATABASE | cut -d "'" -f 4`
echo "use $DATABASE;select eveName,P.pId as AnweshaID,name,mobile,email from Registration R join People P on R.pId=P.pId join Events E on E.eveId=R.eveId order by eveName;" | mysql -u $USER_NAME --password="$PASS" | sed 's/\t/,/g'

