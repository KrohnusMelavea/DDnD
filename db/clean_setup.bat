@echo off

mysql --host=localhost --user=root < db\setup_schema.sql
mysql --host=localhost --user=root < db\add_dev_items.sql
mysql --host=localhost --user=root < db\add_admin_accounts.sql