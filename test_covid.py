


import pytest
from course_software_engineering_casenumber import crawlcovid
from project_back_end import TableAccess
from datetime import datetime, date, timedelta
import time


def test_get_data():
    print('##################test crawling functions#####################')
    data = crawlcovid().get_thread()
    if not data:
      assert data
    else:
      print("get_data function is tested successfully!")

def test_get_news():


    data  = crawlcovid().get_news()
    if not data:
      assert data
    else:
      print("get_data function is tested successfully!")


def test_sql():

   yesterday = (date.today() + timedelta(days=-1)).strftime("%Y-%m-%d")
   print('##################delete data#####################')
   time.sleep(5)
   TableAccess().delete()
   print('##################show data#####################')
   time.sleep(5)
   TableAccess().show()
   print('##################insert covid-19 related data and news#####################')

   TableAccess().insert_csv(yesterday + "_daily_covid_data_ohio_revised.csv", "LiveData")
   TableAccess().insert_csv(yesterday + "_daily_covid_news_ohio.csv", "NewsData")
   time.sleep(5)
   TableAccess().show()

   TableAccess().cursor_close()


# if __name__ == "__main__":
pytest.main()
