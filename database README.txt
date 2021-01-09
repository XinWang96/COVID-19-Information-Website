Database: AWS RDS database
main file: project_back_end.py
Pre-condition: 2020-10-18_daily_covid_data_ohio.csv and 2020-10-18_daily_covid_news_ohio.csv should be placed in the same directory.
                        pymysql installed: pip install pymysql

DB instance identifier: database-1
username:admin
password:TOpbYAdbuzlWDpC7gidy
host:database-1.clp96k52ns15.us-east-2.rds.amazonaws.com
port:3306

Accessing database: MySQL Workbench
Database name: Project
Tables: LiveData, NewsData

Function for now: read csv and store the information into its table. 
                              For both table, it will delete all rows first and then store the information line by line.
                              Both table is time sensitive, the outdated information will be removed from table.