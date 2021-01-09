#DB instance identifier: database-1
#username:admin
#password:TOpbYAdbuzlWDpC7gidy
#host:database-1.clp96k52ns15.us-east-2.rds.amazonaws.com
#port:3306

#need to install PyMySQL: pip install PyMySQL

import pymysql
import csv
import time
import json

class TableAccess:

    def __init__(self):
        self.username = 'admin'
        self.password = 'TOpbYAdbuzlWDpC7gidy'
        self.host = 'database-1.clp96k52ns15.us-east-2.rds.amazonaws.com'
        self.db = pymysql.connect(self.host, self.username, self.password)
        self.cursor = self.db.cursor()

    #csv_file: String type, path to csv
    #dataversion: 'LiveData' or 'NewsData'
    def insert_csv(self, csv_file, data_version):
        sql = 'truncate Project.' + data_version
        self.cursor.execute(sql)
        self.db.commit()

        if data_version == "LiveData":
            with open(csv_file,encoding="utf-8", mode="r", newline='') as readf:
                f = csv.reader(readf)
                sql = 'INSERT INTO Project.'+ data_version + '(location,total_case, new_case, case_per_1m, death, dates) VALUES(%s,%s,%s,%s,%s,%s)'
                for line in f:
                    self.cursor.execute(sql, line)
                    self.db.commit()

        else:
            with open(csv_file,encoding="utf-8", mode="r", newline='') as readf:
                f = csv.reader(readf)
                sql = """INSERT INTO Project."""+ data_version +"""(title,news_link, organizations, out_date) VALUES(%s,%s,%s,%s)"""
                for line in f:
                    self.cursor.execute(sql, line)
                    self.db.commit()

        # print(data_version + " imported")


    def delete(self):
        print("delete all of the data in LiveData table")
        sql = 'delete from Project.LiveData'
        self.cursor.execute(sql)
        self.db.commit()

        print("delete all of the data in NewsData table")
        sql = 'delete from Project.NewsData'
        self.cursor.execute(sql)
        self.db.commit()

    def show(self):


        sql = 'select * from  Project.LiveData limit 5'
        self.cursor.execute(sql)
        data = list(self.cursor.fetchall())
        if len(data) == 0:
          print("there is no data in  LiveData table")
        else:
          print('##################show 5 covid-19 sample data:#####################')
          for item in data:
            print(item)
        # self.db.commit()
        time.sleep(5)


        sql = 'select * from Project.NewsData limit 3'
        self.cursor.execute(sql)
        data = list(self.cursor.fetchall())
        if len(data) == 0:
          print("there is no data in NewsData table")
        else:
          print('##################show 3 covid-19 sample news:#####################')
          for item in data:
            print(item)
        self.db.commit()


    def read_livedata(self):

        sql = 'select * from  Project.LiveData '
        self.cursor.execute(sql)

        result = list(self.cursor.fetchall())
        lst = []
        for item in result:
          item_list = list(item)

          lst.append(dict(zip(['location','total_case','new_case','case_per_1m','death','date'], item_list)))
          str1 = json.dumps(lst, ensure_ascii=False)

        with open(r"livedata.json", "w") as fp:
          fp.write(json.dumps(lst))

        print(str1)
        return (str1)


    def cursor_close(self):
        self.cursor.close()

    def insert_student_data(self, t1,t2,t3,t4):
        sql = """INSERT INTO Project.StudentData (visit, fever, symptoms, contact) VALUES(%s,%s,%s,%s)"""
        data = (t1,t2,t3,t4)
        self.cursor.execute(sql, data)
        self.db.commit()
        self.cursor.close()

    def get_username(self, user):
        sql = """SELECT * FROM Project.Users WHERE username = %s"""
        self.cursor.execute(sql, user)
        result=self.cursor.fetchall()
        print(result)
        return (result)

    def insert_username_password(self, username, password):
        sql = """INSERT INTO Project.Users (username, psw, authority) VALUES(%s,%s,'faculty')"""
        data =(username, password)
        self.cursor.execute(sql, data)
        self.db.commit()
        self.cursor.close()



    def getStudentData(self):
         sql = """SELECT fever,symptoms,contact,visit FROM Project.StudentData;"""
         self.cursor.execute(sql)
         result=list(self.cursor.fetchall())
         lst=[]
         for item in result:
           item_list = list(item)
           lst.append(item_list)
         print(lst)
         with open(r"student.json", "w") as fp:
            fp.write(json.dumps(lst))


         return (result)

    def login(self,username,password):
        sql = """SELECT psw FROM Project.Users WHERE username = %s"""
        self.cursor.execute(sql, username)
        result=self.cursor.fetchall()
        print(result)

    def userinfo(self):
        sql = """SELECT username,authority FROM Project.Users;"""
        self.cursor.execute(sql)
        result=list(self.cursor.fetchall())
        lst=[]
        for item in result:
          item_list = list(item)
          lst.append(dict(zip(['username', 'authority'], item_list)))
          str1 = json.dumps(lst, ensure_ascii=False)
        print(lst)
        with open(r"user.json", "w") as fp:
           fp.write(json.dumps(lst))


        return (result)


    def get_authority(self, username):
        sql = """SELECT authority FROM Project.Users WHERE username = %s"""
        self.cursor.execute(sql, username)
        result=self.cursor.fetchall()
        lst=[]
        for item in result:
          item_list = list(item)
          item_list = (username,item_list)
          lst.append(dict(zip(['username', 'authority'], item_list)))
          str1 = json.dumps(lst, ensure_ascii=False)
        with open(r"authority.json", "w") as fp:
           fp.write(json.dumps(lst))
        print(f'{result[0][0]}')

    def deletes(self, user):
        sql = """DELETE FROM Project.Users WHERE username= %s"""
        self.cursor.execute(sql,user)
        self.db.commit()
        print('1')

    def upgrade(self,user):
        sql = """update Project.Users set authority='administrator' where username=%s"""
        self.cursor.execute(sql,user)
        self.db.commit()
        print('1')



    def changing(self,username, password):
        f_oj = open('authority.json')
        a = json.load(f_oj)
        b = a[0]['username']
        sql = "update Project.Users set psw = %s where username=%s"
        lst = (password, b)
        with open(r"bbb.json", "w") as fp:
          fp.write(json.dumps(lst))
        self.cursor.execute(sql,lst)
        self.db.commit()
        print(password)
