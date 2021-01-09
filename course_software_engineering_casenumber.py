#!/usr/bin/env python
# -*- coding: UTF-8 -*-

# Project -> File   ：crawl_data -> course_software_engineering_casenumber
# IDE    ：PyCharm
# Author ：Yiyue Qian
# Contact: yiyue.qian@case.edu
# Date   ：10/15/2020 8:22 PM


from selenium import webdriver
from bs4 import BeautifulSoup
import re
import time
import csv
from selenium.webdriver.common.keys import Keys
from datetime import datetime, date, timedelta
import project_back_end as pbe

class crawlcovid:
    def __init__(self):

        self.yesterday = (date.today() + timedelta(days=-1)).strftime("%Y-%m-%d")
        self.output = r"./"+self.yesterday+"_daily_covid_data_ohio.csv"
        self.woutput = open(self.output, 'w', encoding='utf-8')

        #self.woutput.write(",".join(['location','total_case','new_case','case_per_1m','death','date'])+'\n')

        self.output_news = r"./"+self.yesterday+"_daily_covid_news_ohio.csv"
        self.newsoutput = open(self.output_news, 'w', encoding='utf-8')

        #self.newsoutput.write(",".join(['title', 'news_link', 'organization', 'time']) + '\n')


    def get_news(self):

        driver = webdriver.Chrome(executable_path="chromedriver")

        driver.get("https://news.google.com/topics/CAAqBwgKMJy5lwswj-KuAw/sections/CAQiVkNCQVNPZ29KTDIwdk1ERmpjSGw1RWdKbGJpSUxDQXc2QndvRmJHOWpZV3dxSEFvYUNoWk1UME5CVEY5T1JWZFRYMFZZVUV4QlRrRlVTVTlPSUFFb0FBKiYIACoiCAoiHENCQVNEd29KTDIwdk1ERmpjSGw1RWdKbGJpZ0FQAVAB/facets/%2Fm%2F05kkh?hl=en-US&gl=US&ceid=US%3Aen")

        contents = driver.page_source
        soup = BeautifulSoup(contents, 'lxml')
        news_data_sub = soup.find_all('div', attrs={'class': 'NiLAwe y6IFtc R7GTQ keNKEd j7vNaf nID9nc'})
        for item in news_data_sub:
            title = item.find('a', attrs={'class': 'DY5T1d'}).get_text()
            news_link = item.find('a', attrs={'class': 'DY5T1d'}).get('href')
            organization = item.find('a', attrs={'class': 'wEwyrc AVN2gc uQIVzc Sksgp'}).get_text()
            time = item.find('time', attrs={'class': 'WW6dff uQIVzc Sksgp'}).get('datetime')

            print('\"' + title + '\"' + ',' + '\"' + news_link + '\"' + ',' + '\"' + organization
                  + '\"' + ',' + '\"' + time + '\"',
                  end='\n', file=self.newsoutput)
        self.newsoutput.close()
        driver.close()

    def get_thread(self):

        yesterday = (date.today() + timedelta(days=-1)).strftime("%Y-%m-%d")

        driver = webdriver.Chrome(executable_path="chromedriver")

        driver.get("https://news.google.com/covid19/map?hl=en-US&mid=%2Fm%2F05kkh&gl=US&ceid=US%3Aen")

        contents = driver.page_source
        soup = BeautifulSoup(contents, 'lxml')
        county_data_sub = soup.find('tbody',attrs={'class':'ppcUXd'})
        overall_sub = county_data_sub.find_all('tr',attrs={'class':'sgXwHf wdLSAe Iryyw'})
        for item in overall_sub:
            location = item.find('th',attrs={'class':'l3HOY'}).get_text()
            detail_sub = item.find_all('td', attrs={'class': 'l3HOY'})
            total_case = detail_sub[0].get_text()
            new_case = detail_sub[1].get_text()
            case_per_1m = detail_sub[3].get_text()
            death = detail_sub[4].get_text()

            print('\"' + location + '\"' + ',' + '\"' + str(total_case) + '\"' + ',' + '\"' + str(new_case) + '\"' + ',' + '\"' + str(case_per_1m) + '\"' + ',' + '\"' + str(death) + '\"'+ ',' + '\"' + yesterday+ '\"',
                end='\n', file=self.woutput)
        ohio_sub = county_data_sub.find_all('tr',attrs={'class':'sgXwHf wdLSAe ROuVee'})
        for item in ohio_sub:
            location = item.find('th',attrs={'class':'l3HOY'}).get_text()
            detail_sub = item.find_all('td', attrs={'class': 'l3HOY'})
            total_case = detail_sub[0].get_text()
            new_case = detail_sub[1].get_text()
            case_per_1m = detail_sub[3].get_text()
            death = detail_sub[4].get_text()

            print('\"' + location + '\"' + ',' + '\"' + str(total_case) + '\"' + ',' + '\"' + str(new_case) + '\"' + ',' + '\"' + str(case_per_1m) + '\"' + ',' + '\"' + str(death) + '\"'+ ',' + '\"' + yesterday+ '\"',
                end='\n', file=self.woutput)
        county_sub = county_data_sub.find_all('tr', attrs={'class': 'sgXwHf wdLSAe YvL7re'})
        for item in county_sub:
            location = item.find('th', attrs={'class': 'l3HOY'}).get_text()
            detail_sub = item.find_all('td', attrs={'class': 'l3HOY'})
            total_case = detail_sub[0].get_text()
            new_case = detail_sub[1].get_text()
            case_per_1m = detail_sub[3].get_text()
            death = detail_sub[4].get_text()

            print('\"' + location + '\"' + ',' + '\"' + str(total_case) + '\"' + ',' + '\"' + str(
                new_case) + '\"' + ',' + '\"' + str(case_per_1m) + '\"' + ',' + '\"' + str(death) + '\"'+ ',' + '\"' + yesterday+ '\"',
                  end='\n', file=self.woutput)

        self.woutput.close()
        driver.close()

start = time.time()
scan_gitlab = crawlcovid()
scan_gitlab.get_thread()
scan_gitlab.get_news()
# log_dir = './logger/output_thread.log'
end = time.time()
mins = (end - start) / 60
# logger("run time : {} mins".format(mins), log_dir)
print("run time : {} mins".format(mins))

tableaccess = pbe.TableAccess()
tableaccess.insert_csv(scan_gitlab.yesterday+"_daily_covid_data_ohio.csv", "LiveData")
tableaccess.insert_csv(scan_gitlab.yesterday+"_daily_covid_news_ohio.csv", "NewsData")
tableaccess.cursor_close()
