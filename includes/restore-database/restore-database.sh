DB_NAME="website"
DB_USER="root"
DB_PASS=""

# Восстановление базы данных
mysql -u $DB_USER  $DB_NAME < website.sql

echo "Database restored successfully!"