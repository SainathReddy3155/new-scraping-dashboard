from email import message
from lib2to3.pgen2 import driver
from pickle import TRUE
from unittest import result
from flask import Flask, jsonify,render_template,request,session, abort,send_file,send_from_directory,redirect,json
from uritemplate import variables
import selenium
from selenium import webdriver
import time
import os
import re
import random
from selenium.webdriver.common.keys import Keys
from selenium.common.exceptions import NoSuchElementException
import pandas as pd
from selenium.webdriver.chrome.options import Options
import threading
from multiprocessing import Process
from threading import Thread
import mysql.connector
import datetime
from datetime import datetime
import pdfkit
# import pandas.io.sql as sql


def dbconnect():
    mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="jyothsna_gmb_req"
    ) 
    return mydb



def driverget():
    options = Options()
    ROOT_DIR = os.path.dirname(os.path.dirname(os.path.abspath('__file__')))
    chromeDriverFilePath = os.path.join(ROOT_DIR,r"C:\Users\admin\Desktop\Sainath Reddy\Chromedriver Folder\chromedriver.exe")
    options = webdriver.ChromeOptions()
    options.add_argument("--headless")
    options.add_argument("--ignore-certificate-errors")
    options.add_argument("--ignore-ssl-errors")
    options.add_argument("--no-sandbox")
    options.add_argument("--disable-dev-shm-usage")
    #,chrome_options=options
    driver = webdriver.Chrome(executable_path=chromeDriverFilePath)

    time.sleep(3)
 

    return driver
#end of Chrome Driver
# driverget()

def twitter_tweets_data(twitterhandel,days_since_tweet,username_at_the_rate,tweet,retweet_count,tweet_favourited,engagement_rate):
    mydb = dbconnect()
    mycursor=mydb.cursor()
    sql="INSERT INTO twitter_tweets_data(twitterhandel,days_since_tweet,username_at_the_rate,tweet,retweet_count,tweet_favourited,engagement_rate) VALUES (%s,%s,%s,%s,%s,%s,%s)"
    val= (twitterhandel,days_since_tweet,username_at_the_rate,tweet,retweet_count,tweet_favourited,engagement_rate)
    mycursor.execute(sql,val)
    mydb.commit()
    print(mycursor.rowcount, "record inserted.")

def twitter(name):
        print("in multithreading function of twitter")
        driver = driverget()
        url='https://socialbearing.com/search/user'
        driver.get(url)
        time.sleep(2)
        driver.find_element_by_id("search").send_keys(name)
        time.sleep(2)
        driver.find_element_by_css_selector("input[type='submit']").click()
        time.sleep(10)
        usersection=driver.find_elements_by_id("user-details")
        time.sleep(2)
        twitterhandel=name
        for data in usersection:
            try:
                total_no_tweets=data.find_element_by_xpath("//*[@id='user-details']/div[10]").text
                print(total_no_tweets)
            except:
                total_no_tweets="NA"
                print(total_no_tweets)
            try:
                tweets_per_day=data.find_element_by_xpath("//*[@id='user-details']/div[12]").text
                print(tweets_per_day)
            except:
                tweets_per_day="NA"
                print(tweets_per_day)
            try:
                followers=data.find_element_by_xpath("//*[@id='user-details']/div[14]").text
                print(followers)
            except:
                followers="NA"
                print(followers)
            try:
                following=data.find_element_by_xpath("//*[@id='user-details']/div[16]").text
                print(following)
            except:
                following="NA"
                print(following)
            try:
                favourited=data.find_element_by_xpath("//*[@id='user-details']/div[22]").text
                print(favourited)
            except:
                favourited="NA"
                print(favourited)
                time.sleep(6)
            mydb = dbconnect()
            mycursor=mydb.cursor()
            sql="INSERT INTO twitter_info(twitterhandel,total_no_tweets,tweets_per_day,followers,following,favourited) VALUES (%s,%s,%s,%s,%s,%s)"
            val= (twitterhandel,total_no_tweets,tweets_per_day,followers,following,favourited)
            mycursor.execute(sql,val)
            mydb.commit()
            mycursor.close()
        loadmoreflag=True
        while loadmoreflag:
            if int(driver.find_element_by_css_selector("p[class='h2 tweet-count tt']").text)<1000:
                if int(re.findall(r'\d+', driver.find_element_by_css_selector("p[class='h2 tweet-timeframe']").text)[0])<1000:
                    try:
                        driver.find_element_by_css_selector("a[class='load_more button button-grey-small tt']").click()
                        time.sleep(7)
                    except:
                        loadmoreflag=False

                else:
                    loadmoreflag=False
            else:
                loadmoreflag=False
      
        section=driver.find_elements_by_class_name("twitter-article-inner")
        for area in section:
            try:
                days_since_tweet=area.find_element_by_class_name("time-link").text
                print(days_since_tweet)
            except:
                pass
            try:
                username=area.find_element_by_class_name("scrn_name").text
                print(username)
            except:
                username="NA"
                print(username)
            try:
                username_at_the_rate=area.find_element_by_class_name("tun").text
                print(username_at_the_rate)
            except:
                username_at_the_rate="NA"
                print(username_at_the_rate)
            try:
                tweet=area.find_element_by_class_name('tweet-body').text
                print(tweet)
            except:
                tweet="NA"
            try:
                retweet_count=area.find_element_by_class_name("entity-box.tt.ent1").text
                print(retweet_count)
            except:
                retweet_count="NA"
                print(retweet_count)
            try:
                tweet_favourited=area.find_element_by_class_name("entity-box.tt.ent2").text
                print(tweet_favourited)
            except:
                tweet_favourited="NA"
                print("tweet_favourited")
            try:
                engagement_rate=area.find_element_by_class_name("tweet-engage.tt").text
                print(engagement_rate)
            except:
                engagement_rate="NA"
                print(engagement_rate)
            twitter_tweets_data(twitterhandel,days_since_tweet,username_at_the_rate,tweet,retweet_count,tweet_favourited,engagement_rate)
            
        successmessage="We have successfully fetched your data"
        driver.close()
        
        return successmessage


def gmbfunction(keywords):
    driver = driverget()
    driver.get("https://www.google.com/")
    driver.maximize_window()
    time.sleep(3)

   
    # driver.find_element_by_css_selector("input[title='Search']").send_keys("Dr  "+str(sheet_doc_name)+" "+str(city)+" "+str(speciality)+" GMB")
    driver.find_element_by_css_selector("input[title='Search']").send_keys("Dr  "+str(keywords)+" GMB")
    # driver.find_element_by_css_selector("input[title='Search']").send_keys("DR Bhupesh Shah AHMEDABAD  CARDIOLOGIST GMB ")
    time.sleep(4)
    # url=[]
    try:
        driver.find_element_by_css_selector("input[title='Search']").send_keys(Keys.RETURN)
        time.sleep(3)
    except:
        pass
    
    try:
        section=driver.find_elements_by_class_name("I6TXqe")
    except:
        section=driver.find_elemets_by_xpath("/html/body/div[7]/div/div[11]/div[2]/div/div/div[2]")
    
    for area in section:
        try:
            gmbname=area.find_element_by_xpath("/html/body/div[7]/div/div[11]/div[2]/div/div/div[2]/div/div[1]/div[2]/div[1]/div/div[2]/h2/span").text
            print(gmbname)
        except:
            gmbname=area.find_element_by_xpath("/html/body/div[7]/div/div[11]/div[2]/div/div/div[2]/div/div[1]/div[2]/div[1]/div/div[1]").text
            print(gmbname)
        try:
            rating=area.find_element_by_class_name("Aq14fc").text
            print(rating)
        except:
            rating="NA"
            print(rating)
        try:
            total_reviews=area.find_element_by_class_name("hqzQac").text
            total_reviews=re.sub("[^0-9]",'',total_reviews)
            print(total_reviews)
        except:
            total_reviews="NA"
            print(total_reviews)
        try:
            speciality=area.find_element_by_class_name("zloOqf.kpS1Ac.vk_gy").text
            print(speciality)
        except:
            speciality="NA"
            print(speciality)
        try:
            address=area.find_element_by_class_name("LrzXr").text
            print(address)
        except:
            address="NA"
            print(address)
        try:
            phone_number=area.find_element_by_class_name("LrzXr.zdqRlf.kno-fv").text
            print(phone_number)
        except:
            phone_number="NA"
            print(phone_number)
        driver.close()
        ###checking gmbname already available or not 
        mydb = dbconnect()
        mycursor=mydb.cursor()
        sql="SELECT gmbname from gmbdetails where gmbname=%s"
        val= [(gmbname)]
        mycursor.execute(sql,val)
        result=mycursor.fetchone()
        mycursor.close()
        print("checking : ",result)
        if result:
            print("already available updating the doctor")
            mydb = dbconnect()
            mycursor=mydb.cursor()
            sql="UPDATE gmbdetails SET rating=%s,total_reviews=%s,speciality=%s,address=%s,phone_number=%s where gmbname=%s"
            val= (rating,total_reviews,speciality,address,phone_number,gmbname)
            mycursor.execute(sql,val)
            mydb.commit()
            mycursor.close()
            print("Updated successfully")
        ##ending of checking
        else:
            mydb = dbconnect()
            mycursor=mydb.cursor()
            sql="INSERT INTO gmbdetails(gmbname,rating,total_reviews,speciality,address,phone_number) VALUES (%s,%s,%s,%s,%s,%s)"
            val= (gmbname,rating,total_reviews,speciality,address,phone_number)
            mycursor.execute(sql,val)
            mydb.commit()
            mycursor.close()
            print(mycursor.rowcount, "record inserted.")
            successmessage="We have successfully fetched data"
            # driver.close()
            return successmessage

def practodatascraping(keyword):
    driver = driverget()
    driver.get("https://www.google.com/")
    driver.maximize_window()
    time.sleep(5)
    driver.find_element_by_css_selector("input[title='Search']").send_keys("Dr "+str(keyword)+" Practo")
    time.sleep(5)
    url=[]
    try:
       driver.find_element_by_css_selector("input[title='Search']").send_keys(Keys.RETURN)
       time.sleep(6)
    except:
       pass
    for result in driver.find_elements_by_css_selector("div[class='yuRUbf']")[0:1]:
        if "https://www.practo.com/" in result.find_element_by_tag_name('a').get_attribute('href'):
            try:
                practo=result.find_element_by_tag_name('a').get_attribute('href')
                print("url : ",practo)
            except:
                print("no url found")
            url.append(practo)
    
    print("urls: ",url)
    try:
        driver.get(url[0])
    except:
        print("no urls found in list")
    time.sleep(4)
    # sheet_doc_name="BHUPESH SHAH"
    # doc_code="391580"
    try:
        practo_doc_name=driver.find_element_by_class_name("c-profile__title.u-bold.u-d-inlineblock").text
        print(practo_doc_name)
    except:
        practo_doc_name="NA"
    try:
        specialization=driver.find_element_by_xpath("/html/body/div[1]/div/div[3]/div/div[2]/div[1]/div[1]/div[2]/div[2]/p").text
        print(specialization)
    except:
        specialization="NA"
    try:
        header_exp=driver.find_element_by_xpath("/html/body/div[1]/div/div[3]/div/div[2]/div[1]/div[1]/div[2]/div[2]/div/h2").text
        print(header_exp)
    except:
        header_exp="NA"
        print(header_exp)
    try:
        location=driver.find_element_by_class_name("c-profile--clinic__location").text
        print(location)
    except:
        location="NA"
        print(location)
    try:
        clinic_name=driver.find_element_by_class_name("c-profile--clinic__name").text
        print(clinic_name)
    except:
        clinic_name="NA"
        print(clinic_name)
    try:
        address=driver.find_element_by_class_name("c-profile--clinic__address").text
        print(address)
    except:
        address="NA"
        print(address)
    try:
        awards=driver.find_element_by_xpath("//*[@id='awards and recognitions']").text
        print(awards)
    except:
        awards="NA"
        print(awards)
    try:
        education=driver.find_element_by_id("education").text
        print(education)
    except:
        education="NA"
        print(education)
    try:
        experience=driver.find_element_by_id("experience").text
        print(experience)
    except:
        experience="NA"
        print(experience)
    try:
        registrations=driver.find_element_by_id("registrations").text
        print(registrations)
    except:
        registrations="NA"
        print(registrations)
    try:
        membership=driver.find_element_by_id("memberships").text
        print(membership)
    except:
        membership="NA"
        print(membership)
    page_url=driver.current_url
    driver.close()
    ###checking gmbname already available or not 
    mydb = dbconnect()
    mycursor=mydb.cursor()
    sql="SELECT page_url from practodata where page_url=%s"
    val= [(page_url)]
    mycursor.execute(sql,val)
    result=mycursor.fetchone()
    mycursor.close()
    print("checking : ",result)
    if result:
        print("already available updating the doctor")
        mydb = dbconnect()
        mycursor=mydb.cursor()
        sql="UPDATE practodata SET practo_doc_name=%s,specialization=%s,header_exp=%s,location=%s,clinic_name=%s,address=%s,awards=%s,education=%s,experience=%s,registrations=%s,membership=%s ,page_url=%s where page_url=%s"
        val= (practo_doc_name,specialization,header_exp,location,clinic_name,address,awards,education,experience,registrations,membership,page_url)
        mycursor.execute(sql,val)
        mydb.commit()
        mycursor.close()
        print("Updated successfully")
    ##ending of checking
    else:
        mydb = dbconnect()
        mycursor=mydb.cursor()
        sql="INSERT INTO practodata(practo_doc_name,specialization,header_exp,location,clinic_name,address,awards,education,experience,registrations,membership,page_url) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)"
        val= (practo_doc_name,specialization,header_exp,location,clinic_name,address,awards,education,experience,registrations,membership,page_url)
        mycursor.execute(sql,val)
        mydb.commit()
        mycursor.close()
        successmessage="We have Successfully fetched Your Data"
        return successmessage



app = Flask(__name__)
app.secret_key = 'sainath123567'

@app.route('/',methods=["POST","GET"])
def hello_name():
    print("hello")
    mydb = dbconnect()
    mycursor=mydb.cursor()
    sql="SELECT count(id) as total_doctors FROM ( SELECT id from `gmbdetails` UNION ALL SELECT id from linkedin_basic_info UNION ALL SELECT id from practodata UNION ALL SELECT id from twitter_info) as adaad"
    mycursor.execute(sql)
    total_docs=mycursor.fetchone()
    mycursor.close()
    totaldocs=total_docs[0]
    mydb = dbconnect()
    mycursor=mydb.cursor()
    sql="SELECT count(id) from gmbdetails"
    mycursor.execute(sql)
    total_gmbdetails1=mycursor.fetchone()
    mycursor.close()
    total_gmbdetails=total_gmbdetails1[0]
    mydb = dbconnect()
    mycursor=mydb.cursor()
    sql="SELECT count(id) from linkedin_basic_info"
    mycursor.execute(sql)
    total_linkedin1=mycursor.fetchone()
    mycursor.close()
    total_linkedin=total_linkedin1[0]
    mydb = dbconnect()
    mycursor=mydb.cursor()
    sql="SELECT count(id) from practodata"
    mycursor.execute(sql)
    total_practodata1=mycursor.fetchone()
    mycursor.close()
    total_practodata=total_practodata1[0]
    mydb = dbconnect()
    mycursor=mydb.cursor()
    sql="SELECT count(id) from twitter_info"
    mycursor.execute(sql)
    total_twitter_info1=mycursor.fetchone()
    mycursor.close()
    total_twitter_info=total_twitter_info1[0]
    return render_template("index.php",variable={'total_docs':totaldocs,'total_gmbdetails':total_gmbdetails,'total_linkedin':total_linkedin,'total_practodata':total_practodata,'total_twitter_info':total_twitter_info})


@app.route('/twitter',methods=['POST','GET'])
def twitterhome():
    message=""
    pgno=request.args.get("pgno")
    print("pgno : ",pgno)
    mydb = dbconnect()
    mycursor=mydb.cursor()
    sql="SELECT * from twitter_info ORDER BY id LIMIT "+pgno+",10"
    mycursor.execute(sql)
    twitter_info=mycursor.fetchall()
    mycursor.close()
    if len(twitter_info)==0:
        message="No Results to Fetch"
    else:
        message=""
    # mydb = dbconnect()
    # mycursor=mydb.cursor()
    # sql="SELECT * from twitter_tweets_data"
    # mycursor.execute(sql)
    # twitter_tweets_data=mycursor.fetchall()
    # mycursor.close()
    return render_template('twitterinfo.php',twitter_info=twitter_info,variable={'pgno':pgno,'message':message})

@app.route('/searchtwitter',methods=['POST'])
def searching_twitter():
    if request.method=="POST":
        name=request.form.get("name")
        print("name : ",name)
        t1 = Thread(target=twitter, args=(name,))
        t1.start()
        t1.join()
        successmessage="We have successfully fetched your data"
    return {'success':successmessage}
  

@app.route('/gmb',methods=['POST','GET'])
def gmb():
    message=""
    urlerror=""
    pgno=request.args.get("pgno")
    print(pgno)
    if int(pgno)<0 :
        urlerror="Invalid url attempt"
    # print(urlerror)
    else:
        mydb = dbconnect()
        mycursor=mydb.cursor()
        sql="SELECT * FROM gmbdetails ORDER BY ID LIMIT "+pgno+",10"
        mycursor.execute(sql)
        results=mycursor.fetchall()
        if len(results)==0:
            message="No Results to Fetch"
            print(message)
        else:
            message=""
        # print(results)
        return render_template('gmb.php',results=results,variable={'pgno':pgno,'message':message})
    return render_template("gmb.php",variable={'pgno':pgno,'urlerror':urlerror})

@app.route('/gmbdata',methods=['POST'])
def gmbdata():
    if request.method=="POST":
        keyword=request.form.get("name")
        print("name : ",keyword)
        t1 = Thread(target=gmbfunction, args=(keyword,))
        t1.start()
        t1.join()
        successmessage="We have successfully fetched the data"
    return {'success':successmessage}
    #     successmessage="We fecthed your data"
    # return render_template('gmb.php')


# @app.route('/gmbdata',methods=['POST'])
# def gmbdata():
#     if request.method=="POST":
#         keyword=request.form.get("name")
#         print("name : ",keyword)
#         mydb = dbconnect()
#         mycursor=mydb.cursor()
#         sql="SELECT status FROM schema_mapping_table where functionname='gmbfunction'"
#         mycursor.execute(sql)
#         results=mycursor.fetchone()
#         print(results[0])
#         refreshstatus=results[0]
#         if (refreshstatus=="Ideal"):
#             print("Started Scraping")
#             mydb = dbconnect()
#             mycursor=mydb.cursor()
#             sql="Update schema_mapping_table SET status='In Progress' where functionname='gmbfunction'"
#             mycursor.execute(sql)
#             results=mycursor.fetchone()
#         else:
#             print("Already in scraping")
#             # t1 = Thread(target=gmbfunction, args=(keyword,))
#             # t1.start()
#             # t1.join()
#         successmessage="We have successfully fetched the data"
#     return {'success':successmessage}

@app.route('/editrow',methods=['POST','GET'])
def editrow():
    data1=request.get_json()
    data=data1['data']
    mydb = dbconnect()
    mycursor=mydb.cursor()
    sql="SELECT * FROM gmbdetails where gmbname=%s"
    val=[(data)]
    mycursor.execute(sql,val)
    editdata=mycursor.fetchone()
    # print(editdata)
    return {'success':editdata}


@app.route("/GmbSavechanges",methods=['POST','GET'])
def GmbSavechanges():
    if request.method=="POST":
        print("in save changes")
    return "savechanges function is working"


@app.route("/twitterinfochanges",methods=['POST','GET'])
def twitterinfochanges():
    data=request.get_json()
    name=data['data']
    print(name)
    mydb = dbconnect()
    mycursor=mydb.cursor()
    sql="SELECT * FROM twitter_info where Name=%s"
    val=[(name)]
    mycursor.execute(sql,val)
    editdata=mycursor.fetchone()
    return {'success':editdata}




@app.route("/practo",methods=['POST','GET'])
def practo():
    message=""
    pgno=request.args.get("pgno")
    print(pgno)
    
    # print("heeloo")
    mydb = dbconnect()
    mycursor=mydb.cursor()
    sql="SELECT * FROM practodata ORDER BY id LIMIT "+pgno+",10"
    mycursor.execute(sql)
    results=mycursor.fetchall()
    if len(results)==0:
        message="No Results to Fetch"
        print(message)
    else:
        message=""
    return render_template("practo.php",variable={'results':results,'pgno':pgno,'message':message})


# @app.route("/practodatatable1",methods=['POST','GET'])
# def practodatatable1():
#     print("Hellloooo")
#     message="hello"
#     # Datatabledata= request.form
#     # print(Datatabledata)
#     return render_template("practodatatable.php",variable={'message':message})
    # return "hlwo"

##practodatatabletest

@app.route("/practodatatable",methods=['POST','GET'])
def practodatatable():
    if request.method=="POST":
        draw= request.form['draw']
        start=int(request.form['start'])
        length=int(request.form['length'])
        searchValue=request.form["search[value]"]
        # print(searchValue)
        startpage=start
        pagelength=length
        print("start : ",start ,"length : ",length)
        ##get all records if the search is empty if not else condition
        if searchValue=='':
            ##pagination query with all records
            sql="SELECT * FROM practodata ORDER BY id DESC LIMIT "+str(start)+","+str(length)+""
        ## if search is not empty then search query works
        else:   
            sql="SELECT * FROM practodata where practo_doc_name LIKE '%"+(searchValue)+"%' OR specialization LIKE '%"+(searchValue)+"%' OR header_exp LIKE '%"+(searchValue)+"%' OR location LIKE '%"+(searchValue)+"%' ORDER BY id LIMIT "+str(start)+","+str(length)+" "  
            # print(sql)
        mydb = dbconnect()
        mycursor=mydb.cursor()
        mycursor.execute(sql)
        results=mycursor.fetchall()

        ##Total records query 
        mydb = dbconnect()
        mycursor=mydb.cursor()
        sql="SELECT * FROM practodata"
        mycursor.execute(sql)
        results1=mycursor.fetchall()
        # print(results1)
        newarr=[]
        for i in results:
            datadictionary={
                    "Practoname":i[1],"Specialization":i[2],
                    "Experience":i[3],"Location":i[4],"address":i[6]}
            newarr.append(datadictionary)
        if len(results)==0:
            message="No Results to Fetch"
            print(message)
        else:
            message=""
        
        return jsonify({"data": newarr,'recordsFiltered': len(results1),'iTotalRecords':len(results1),'draw': draw,'start':start,'length':length})
##practodatatabletemplate
@app.route("/aggregator",methods=['POST','GET'])
def practofinal():
    return render_template("practodatatablefinal.php")


##gmbdatatabletemplate
@app.route("/google",methods=['POST','GET'])
def gmbfinal():
    return render_template("gmbfinal.php",variable={})


##gmbdatatabletest
@app.route("/gmbdatatable",methods=['POST','GET'])
def gmbdatatable():
    if request.method=="POST":
        draw= request.form['draw']
        start=int(request.form['start'])
        length=int(request.form['length'])
        searchValue=request.form["search[value]"]
        # print(searchValue)
        startpage=start
        pagelength=length
        print("start : ",start ,"length : ",length)
        ##get all records if the search is empty if not else condition
        if searchValue=='':
            ##pagination query with all records
            sql="SELECT * FROM gmbdetails ORDER BY id DESC LIMIT "+str(start)+","+str(length)+""
        ## if search is not empty then search query works
        else:   
            sql="SELECT * FROM `gmbdetails` where gmbname LIKE '%"+(searchValue)+"%' OR rating LIKE '%"+(searchValue)+"%' OR total_reviews LIKE '%"+(searchValue)+"%' OR speciality LIKE '%"+(searchValue)+"%' OR address LIKE '%"+(searchValue)+"%' OR phone_number LIKE '%"+(searchValue)+"%' ORDER BY id LIMIT "+str(start)+","+str(length)+" "  
            # print(sql)
        mydb = dbconnect()
        mycursor=mydb.cursor()
        mycursor.execute(sql)
        results=mycursor.fetchall()
        # print(results)

        ##Total records query 
        mydb = dbconnect()
        mycursor=mydb.cursor()
        sql="SELECT * FROM gmbdetails "
        mycursor.execute(sql)
        results1=mycursor.fetchall()
        # print(results1)

        newarr=[]
        for i in results:
            datadictionary={"gmbname":i[1],
                    "rating":i[2],"total_reviews":i[3],
                    "speciality":i[4],"address":i[5],"phone_number":i[6]}
            newarr.append(datadictionary)
        if len(results)==0:
            message="No Results to Fetch"
            print(message)
        else:
            message=""
        
        return jsonify({"data": newarr,'recordsFiltered': len(results1),'iTotalRecords':len(results1),'draw': draw,'start':start,'length':length})

###gmbsavechangesdatatable
@app.route("/gmbsavechanges",methods=["POST","GET"])
def gmbsavechanges():
    if request.method=="POST":
        gmbname=request.form.get("gmbname")
        gmbrating=request.form.get("gmbrating")
        totalreviews=request.form.get("totalreviews")
        speciality=request.form.get("speciality")
        address=request.form.get("address")
        phonenumber=request.form.get("phonenumber")
        mydb = dbconnect()
        mycursor=mydb.cursor()
        sql="UPDATE gmbdetails SET rating=%s,total_reviews=%s,speciality=%s,address=%s,phone_number=%s WHERE gmbname=%s"
        val=(gmbrating,totalreviews,speciality,address,phonenumber,gmbname)
        mycursor.execute(sql,val)   
        mydb.commit()
        mycursor.close()
        print("Updated successfully")
        return redirect('/google')
###practosavechangesdatatable
@app.route("/practosavechanges",methods=["POST","GET"])
def practosavechanges():
    if request.method=="POST":
        practoname=request.form.get("practoname")
        speciality=request.form.get("speciality")
        experience=request.form.get("experience")
        location=request.form.get("location")
        address=request.form.get("address")
        mydb = dbconnect()
        mycursor=mydb.cursor()
        sql="UPDATE practodata SET 	specialization=%s,header_exp=%s,location=%s,address=%sWHERE practo_doc_name=%s"
        val=(speciality,experience,location,address,practoname)
        mycursor.execute(sql,val)   
        mydb.commit()
        mycursor.close()
        print("Updated successfully")
        return redirect('/practofinal')
###practodeletedatatable
@app.route("/practodeletedata",methods=["POST","GET"])
def practodeletedata():
    if request.method=="POST":
        data=request.get_json()
        practoname=data["practoname"]
        print("name : ",practoname)
        mydb = dbconnect()
        mycursor=mydb.cursor()
        sql="DELETE FROM  practodata WHERE 	practo_doc_name=%s"
        val=[(practoname)]
        mycursor.execute(sql,val)   
        mydb.commit()
        mycursor.close()
        return("/practofinal")

##deletegmbdatatabledata
@app.route("/deletegmbdata",methods=["POST","GET"])
def deletegmbdata():
    if request.method=="POST":
        data=request.get_json()
        gmbname=data["name"]
        print("name : ",gmbname)
        mydb = dbconnect()
        mycursor=mydb.cursor()
        sql="DELETE FROM  gmbdetails WHERE gmbname=%s"
        val=[(gmbname)]
        mycursor.execute(sql,val)   
        mydb.commit()
        mycursor.close()
    return redirect("/google")

##download excel practodatatable
@app.route("/downloadallaggregator",methods=['POST','GET'])
def downloadallpracto():
    file_name="practo_data"
    mydb=dbconnect()
    mycursor=mydb.cursor()
    sql="SELECT practo_doc_name,specialization,header_exp,location,address FROM practodata"
    mycursor.execute(sql)
    results=mycursor.fetchall()
    df = pd.DataFrame(results,columns=['Doctor Name','Speciality','Experience','Location','Address'])
    filename=file_name+'-on''-['+str(datetime.now().strftime('%d-%m-%Y , %H-%M-%S')) +']'
    df.to_excel("static//files/"+filename+".xlsx")
    filepath='static/files'
    return send_from_directory(filepath,filename+'.xlsx',as_attachment=True)

##gmbdatatabletemplate
@app.route("/twitterinfo",methods=['POST','GET'])
def twitterinfofinal():
    return render_template("twitterinfofinal.php",variable={})

##twitteralldatatable
@app.route("/twitterdatatable",methods=["POST","GET"])
def twitterdatatable():
    if request.method=="POST":
        draw= request.form['draw']
        start=int(request.form['start'])
        length=int(request.form['length'])
        searchValue=request.form["search[value]"]
        # print(searchValue)
        startpage=start
        pagelength=length
        print("start : ",start ,"length : ",length)
        ##get all records if the search is empty if not else condition
        if searchValue=='':
            ##pagination query with all records
            sql="SELECT * FROM twitter_info ORDER BY id DESC LIMIT "+str(start)+","+str(length)+""
        ## if search is not empty then search query works
        else:   
            sql="SELECT * FROM `twitter_info` where Name LIKE '%"+(searchValue)+"%' OR twitterhandel LIKE '%"+(searchValue)+"%' OR 	total_no_tweets	 LIKE '%"+(searchValue)+"%' OR tweets_per_day LIKE '%"+(searchValue)+"%' OR followers LIKE '%"+(searchValue)+"%' OR following LIKE '%"+(searchValue)+"%' OR favourited LIKE '%"+(searchValue)+"%' ORDER BY id LIMIT "+str(start)+","+str(length)+" "  
            # print(sql)
        mydb = dbconnect()
        mycursor=mydb.cursor()
        mycursor.execute(sql)
        results=mycursor.fetchall()
        # print(results)

        ##Total records query 
        mydb = dbconnect()
        mycursor=mydb.cursor()
        sql="SELECT * FROM twitter_info ORDER BY id desc"
        mycursor.execute(sql)
        results1=mycursor.fetchall()
        # print(results1)

        newarr=[]
        for i in results:
            datadictionary={
                    "twitterhandel":i[1],"total_no_tweets":i[2],
                    "tweets_per_day":i[3],"followers":i[4],"following":i[5],"favourited":i[6]}
            newarr.append(datadictionary)
        if len(results)==0:
            message="No Results to Fetch"
            print(message)
        else:
            message=""
        
        return jsonify({"data": newarr,'recordsFiltered': len(results1),'iTotalRecords':len(results1),'draw': draw,'start':start,'length':length})

##twitterinfodelete datatable
@app.route("/twitterinfodelete",methods=['POST','GET'])
def twitterinfodelete():
    if request.method=="POST":
        data=request.get_json()
        twitterhandel=data["twitterhandel"]
        print("twitterhandel : ",twitterhandel)
        mydb = dbconnect()
        mycursor=mydb.cursor()
        sql="DELETE FROM  twitter_info WHERE twitterhandel=%s"
        val=[(twitterhandel)]
        mycursor.execute(sql,val)   
        mydb.commit()
        mycursor.close()
        return redirect('/twitterinfo')

##twitterinfosavechanges datatable
@app.route("/twitterinfosavechanges",methods=["POST","GET"])
def twitterinfosavechanges():
    if request.method=="POST":
        twiiterhandel=request.form.get("twitterhandel")
        totaltweets=request.form.get("totaltweets")
        Tweetsperday=request.form.get("Tweetsperday")
        followers=request.form.get("followers")
        following=request.form.get("following")
        favourited=request.form.get("favourited")
        mydb = dbconnect()
        mycursor=mydb.cursor()
        sql="UPDATE twitter_info SET total_no_tweets=%s,tweets_per_day=%s,followers=%s,following=%s,	favourited=%s WHERE twitterhandel=%s"
        val=(totaltweets,Tweetsperday,followers,following,favourited,twiiterhandel)
        mycursor.execute(sql,val)   
        mydb.commit()
        mycursor.close()
        print("Updated successfully")
        return redirect("/twitterinfo")


##twittertweetsalldata template
@app.route("/twittertweetsdata",methods=["POST","GET"])
def twittertweetsdata():
    return render_template("twitterdatafinal.php")

##twittertweetsalldata datatable
@app.route("/twitteralltweetsdata",methods=['POST','GET'])
def twitteralltweetsdata():
    if request.method=="POST":
        draw= request.form['draw']
        start=int(request.form['start'])
        length=int(request.form['length'])
        searchValue=request.form["search[value]"]
        # print(searchValue)
        startpage=start
        pagelength=length
        print("start : ",start ,"length : ",length)
        ##get all records if the search is empty if not else condition
        if searchValue=='':
            ##pagination query with all records
            sql="SELECT * FROM twitter_tweets_data ORDER BY id DESC LIMIT "+str(start)+","+str(length)+""
        ## if search is not empty then search query works
        else:   
            sql="SELECT * FROM `twitter_tweets_data` where twitterhandel LIKE '%"+(searchValue)+"%' OR days_since_tweet LIKE '%"+(searchValue)+"%' OR username_at_the_rate LIKE '%"+(searchValue)+"%' OR tweet LIKE '%"+(searchValue)+"%' OR retweet_count LIKE '%"+(searchValue)+"%' OR tweet_favourited LIKE '%"+(searchValue)+"%' OR engagement_rate LIKE '%"+(searchValue)+"%' ORDER BY id LIMIT "+str(start)+","+str(length)+" "  
            # print(sql)
        mydb = dbconnect()
        mycursor=mydb.cursor()
        mycursor.execute(sql)
        results=mycursor.fetchall()
        # print(results)

        ##Total records query 
        mydb = dbconnect()
        mycursor=mydb.cursor()
        sql="SELECT * FROM twitter_tweets_data"
        mycursor.execute(sql)
        results1=mycursor.fetchall()
        # print(results1)

        newarr=[]
        for i in results:
            datadictionary={
                    "twitterhandel":i[1],"days_since_tweet":i[2],
                    "username_at_the_rate":i[3],"tweet":i[4],"retweet_count":i[5],"tweet_favourited":i[6],"engagement_rate":i[7]}
            newarr.append(datadictionary)
        if len(results)==0:
            message="No Results to Fetch"
            print(message)
        else:
            message=""
        
        return jsonify({"data": newarr,'recordsFiltered': len(results1),'iTotalRecords':len(results1),'draw': draw,'start':start,'length':length})


##downloadcompletetweets data datatable excel
@app.route("/downloadcompletetwittertweetsdata",methods=["POST","GET"])
def downloadcompletetwittertweetsdata():
    file_name="twitter_tweets_data"
    mydb=dbconnect()
    mycursor=mydb.cursor()
    sql="SELECT twitterhandel,days_since_tweet,username_at_the_rate,tweet,retweet_count,tweet_favourited,engagement_rate FROM twitter_tweets_data"
    mycursor.execute(sql)
    results=mycursor.fetchall()
    df = pd.DataFrame(results,columns=['Twitter handel','Days Since Tweet','Username','Tweet','Retweet Count','Tweet Favourited','Engagement Rate'])
    filename=file_name+'-on''-['+str(datetime.now().strftime('%d-%m-%Y , %H-%M-%S')) +']'
    df.to_excel("static//files/"+filename+".xlsx")
    filepath='static/files'
    return send_from_directory(filepath,filename+'.xlsx',as_attachment=True)

##linkedinbasic info template
@app.route("/linkedinbasicinfo",methods=['POST','GET'])
def linkedinbasicinfo():
    return render_template("linkedinbasicinfo.php")

## linkedin data datatable api
@app.route("/linkedinbasicinfodata",methods=["POST",'GET'])
def linkedinbasicinfodata():
    if request.method=="POST":
        draw= request.form['draw']
        start=int(request.form['start'])
        length=int(request.form['length'])
        searchValue=request.form["search[value]"]
        # print(searchValue)
        startpage=start
        pagelength=length
        print("start : ",start ,"length : ",length)
        ##get all records if the search is empty if not else condition
        if searchValue=='':
            ##pagination query with all records
            sql="SELECT * FROM linkedin_basic_info ORDER BY id LIMIT "+str(start)+","+str(length)+""
        ## if search is not empty then search query works
        else:   
            sql="SELECT * FROM `linkedin_basic_info` where Name LIKE '%"+(searchValue)+"%' OR description LIKE '%"+(searchValue)+"%' OR location LIKE '%"+(searchValue)+"%' OR 	connections LIKE '%"+(searchValue)+"%' OR about LIKE '%"+(searchValue)+"%' OR 	followers LIKE '%"+(searchValue)+"%' OR linkedinhandel LIKE '%"+(searchValue)+"%' ORDER BY id LIMIT "+str(start)+","+str(length)+" "  
            # print(sql)
        mydb = dbconnect()
        mycursor=mydb.cursor()
        mycursor.execute(sql)
        results=mycursor.fetchall()
        # print(results)

        ##Total records query 
        mydb = dbconnect()
        mycursor=mydb.cursor()
        sql="SELECT * FROM linkedin_basic_info"
        mycursor.execute(sql)
        results1=mycursor.fetchall()
        # print(results1)
        newarr=[]
        for i in results:
            datadictionary={
                    "Name":i[2],
                    "description":i[3],"location":i[4],"connections":i[5],"about":i[6],"followers":i[7],"linkedinhandel":i[8]}
            newarr.append(datadictionary)
        if len(results)==0:
            message="No Results to Fetch"
            print(message)
        else:
            message=""
        
        return jsonify({"data": newarr,'recordsFiltered': len(results1),'iTotalRecords':len(results1),'draw': draw,'start':start,'length':length})


##download linkedin basic info excel datatable
@app.route("/downloadlinkedinbasicinfoexcel",methods=["POST","GET"])
def downloadlinkedinbasicinfoexcel():
    file_name="linkedin_basicinfo_data"
    mydb=dbconnect()
    mycursor=mydb.cursor()
    sql="SELECT Name,description,location,connections,about,followers,linkedinhandel FROM linkedin_basic_info"
    mycursor.execute(sql)
    results=mycursor.fetchall()
    df = pd.DataFrame(results,columns=['Name','Description','Location','Connections','About','Followers','Linkedinhandel'])
    filename=file_name+'-on''-['+str(datetime.now().strftime('%d-%m-%Y , %H-%M-%S')) +']'
    df.to_excel("static//files/"+filename+".xlsx")
    filepath='static/files'
    return send_from_directory(filepath,filename+'.xlsx',as_attachment=True)



# @app.route("/linkedinbasicinfo",methods=['POST','GET'])
# def linkedinbasicinfo():
#     message=""
#     urlerror=""
#     pgno=request.args.get("pgno")
#     print(pgno)
#     # print("heeloo")
#     if int(pgno)<0 :
#         urlerror="Invalid url attempt"
#         # print(urlerror)
#     else:
#         mydb = dbconnect()
#         mycursor=mydb.cursor()
#         # sql="SELECT * FROM practodata ORDER BY id LIMIT "+pgno+",10"
#         sql="SELECT * FROM linkedin_basic_info ORDER BY id LIMIT "+pgno+",10"
#         mycursor.execute(sql)
#         results=mycursor.fetchall()
#         # print(results)
#         lenofresults=len(results)
#         if len(results)==0:
#             message="No Results to Fetch"
#             # print(message)
#         else:
#             message=""
#         return render_template("linkedininfo.php",variable={'results':results,'pgno':pgno,'message':message,'lenofresults':lenofresults})
#     return render_template("linkedininfo.php",variable={'pgno':pgno,'urlerror':urlerror,'lenofresults':lenofresults})

@app.route("/linkedinactivity",methods=['POST','GET'])
def linkedinactivity():
    message=""
    pgno=request.args.get("pgno")
    print(pgno)
    print("heeloo")
    mydb = dbconnect()
    mycursor=mydb.cursor()
    # sql="SELECT * FROM practodata ORDER BY id LIMIT "+pgno+",10"
    sql="SELECT * FROM linkedin_activity where status != 'NA' ORDER BY id LIMIT "+pgno+",10"
    mycursor.execute(sql)
    results=mycursor.fetchall()
    # print(results)
    if len(results)==0:
        message="No Results to Fetch"
        print(message)
    else:
        message=""
    return render_template("linkedinactivity.php",variable={'results':results,'pgno':pgno,'message':message})

@app.route("/linkedinposts",methods=['POST','GET'])
def linkedinposts():
    message=""
    pgno=request.args.get("pgno")
    print(pgno)
    print("heeloo")
    mydb = dbconnect()
    mycursor=mydb.cursor()
    # sql="SELECT * FROM practodata ORDER BY id LIMIT "+pgno+",10"
    sql="SELECT * FROM linkedin_posts where status != 'NA' ORDER BY id LIMIT "+pgno+",10"
    mycursor.execute(sql)
    results=mycursor.fetchall()
    # print(results)
    if len(results)==0:
        message="No Results to Fetch"
        print(message)
    else:
        message=""
    return render_template("linkedinposts.php",variable={'results':results,'pgno':pgno,'message':message})

@app.route("/linkedinarticles",methods=['POST','GET'])
def linkedinarticles():
    message=""
    pgno=request.args.get("pgno")
    print(pgno)
    print("heeloo")
    mydb = dbconnect()
    mycursor=mydb.cursor()
    # sql="SELECT * FROM practodata ORDER BY id LIMIT "+pgno+",10"
    sql="SELECT * FROM linkedin_articles where status != 'NA' ORDER BY id LIMIT "+pgno+",10"
    mycursor.execute(sql)
    results=mycursor.fetchall()
    # print(results)
    if len(results)==0:
        message="No Results to Fetch"
        print(message)
    else:
        message=""
    return render_template("linkedinarticles.php",variable={'results':results,'pgno':pgno,'message':message})

@app.route("/linkedindocuments",methods=['POST','GET'])
def linkedindocuments():
    message=""
    pgno=request.args.get("pgno")
    print(pgno)
    print("heeloo")
    mydb = dbconnect()
    mycursor=mydb.cursor()
    # sql="SELECT * FROM practodata ORDER BY id LIMIT "+pgno+",10"
    sql="SELECT * FROM linkedin_documents ORDER BY id LIMIT "+pgno+",10"
    mycursor.execute(sql)
    results=mycursor.fetchall()
    # print(results)
    if len(results)==0:
        message="No Results to Fetch"
        print(message)
    else:
        message=""
    return render_template("linkedindocuments.php",variable={'results':results,'pgno':pgno,'message':message}) 


@app.route("/userinsights",methods=['POST','GET'])
def userinsights():
    mydb = dbconnect()
    mycursor=mydb.cursor()
    # sql="SELECT * FROM practodata ORDER BY id LIMIT "+pgno+",10"
    sql="SELECT * FROM twitter_info where twitterhandel ='DrSheetuSingh'"
    mycursor.execute(sql)
    twitterinforesults=mycursor.fetchone()
    
    return render_template("userinsights.php",twitterinforesults=twitterinforesults)

@app.route('/practoscraping',methods=['POST','GET'])
def practoscraping():
    data=request.get_json()
    print(data['data'])
    keyword=data['data']
    ##need to write multithreading and work on practo scraping
    t1 = Thread(target=practodatascraping, args=(keyword,))
    t1.start()
    t1.join()
    successmessage="We have successfully fetched the data"
    return {'success':successmessage}

@app.route("/deletegmb",methods=["POST",'GET'])
def deletegmb():
    if request.method=="POST":
        # pgno=request.form.get("pgid1")
        # print(pgno)
        data=request.get_json()
        print(data)
        gmbname=data['name']
        inputdata=data['inputdata']
        successmessage="Successfully deleted"
    return {'success':successmessage}
 

@app.route('/downsingletwitterexcel',methods=['POST','GET'])
def downsingletwitterexcel():
    file_name="twitterinfo"
    # pgno1=request.get_json()
    # pgno=pgno1['data']
    pgno=request.args.get("pgno")
    print(pgno)
    mydb = dbconnect()
    mycursor=mydb.cursor()
    # sql="SELECT * FROM practodata ORDER BY id LIMIT "+pgno+",10"
    sql="SELECT * FROM twitter_info ORDER BY id LIMIT "+pgno+",10"
    mycursor.execute(sql)
    results=mycursor.fetchall()
    # dataframe=pd.read_sql_query("SELECT * FROM twitter_info ORDER BY ID LIMIT "+pgno+",10",mydb)
    df = pd.DataFrame(results,columns=['Id','Name','Twitter Handel','Total tweets','Tweets per day','Followers','Following','Favourited'])
    filename = file_name+'-on''-['+str(datetime.now().strftime('%d-%m-%Y , %H-%M-%S')) +']'
    df.to_excel("static//files/"+ filename + '.xlsx')
    file_path = 'static/files/'
    return send_from_directory(file_path,filename+'.xlsx', as_attachment=True)




@app.route("/downloadsinglegmb",methods=['POST','GET'])
def downloadsinglegmb():
    file_name="gmbdata"
    pgno=request.args.get("pgno")
    print(pgno)
    mydb=dbconnect()
    mycursor=mydb.cursor()
    # sql="SELECT * FROM practodata ORDER BY id LIMIT "+pgno+",10"
    sql="SELECT * FROM gmbdetails ORDER BY id LIMIT "+pgno+" ,10"
    mycursor.execute(sql)
    results=mycursor.fetchall()
    # dataframe=pd.read_sql_query("SELECT * FROM twitter_info ORDER BY ID LIMIT "+pgno+",10",mydb)
    df = pd.DataFrame(results,columns=['Id','Gmb Name','Gmb Rating','Total Reviews','Speciality','Address','Phone Number'])
    filename=file_name+'-on''-['+str(datetime.now().strftime('%d-%m-%Y , %H-%M-%S')) +']'
    df.to_excel("static//files/"+filename+".xlsx")
    filepath='static/files'
    return send_from_directory(filepath,filename+'.xlsx',as_attachment=True)



##download gmb alldata datatable
@app.route("/downloadmultiplegmb",methods=['POST','GET'])
def downloadmultiplegmb():
    file_name="gmbdata_complete_data"
    mydb=dbconnect()
    mycursor=mydb.cursor()
    sql="SELECT * FROM gmbdetails"
    mycursor.execute(sql)
    results=mycursor.fetchall()
    df = pd.DataFrame(results,columns=['Id','Gmb Name','Gmb Rating','Total Reviews','Speciality','Address','Phone Number'])
    filename=file_name+'-on''-['+str(datetime.now().strftime('%d-%m-%Y , %H-%M-%S')) +']'
    df.to_excel("static//files/"+filename+".xlsx")
    filepath='static/files'
    return send_from_directory(filepath,filename+'.xlsx',as_attachment=True)

###compeletetwitterinfodata_downloadexcel
@app.route("/downloadcompletetwitterinfo",methods=['POST','GET'])
def downloadcompletetwitterinfo():
    file_name="twitter_info_data"
    mydb=dbconnect()
    mycursor=mydb.cursor()
    sql="SELECT twitterhandel,total_no_tweets,tweets_per_day,followers,following,favourited FROM twitter_info"
    mycursor.execute(sql)
    results=mycursor.fetchall()
    df = pd.DataFrame(results,columns=['Twitter Handel','Total tweets','Tweets per day','Followers','Following','Favourited'])
    filename=file_name+'-on''-['+str(datetime.now().strftime('%d-%m-%Y , %H-%M-%S')) +']'
    df.to_excel("static//files/"+filename+".xlsx")
    filepath='static/files'
    return send_from_directory(filepath,filename+'.xlsx',as_attachment=True)


@app.route("/gmbsearchdata",methods=['POST','GET'])
def gmbsearchdata():
    data=request.get_json()
    print(data)
    gmbname=data['gmbsearchvalue']
    print("gmbname : ",gmbname)
    mydb=dbconnect()
    mycursor=mydb.cursor()
    sql="SELECT * FROM gmbdetails where gmbname LIKE '%"+(gmbname)+"%' OR rating LIKE '%"+(gmbname)+"%' OR 	total_reviews LIKE '%"+(gmbname)+"%' OR speciality LIKE '%"+(gmbname)+"%' OR address LIKE '%"+(gmbname)+"%' OR 	phone_number LIKE '%"+(gmbname)+"%' "
    mycursor.execute(sql)
    results=mycursor.fetchall()
    print(results)
    return {"results":results}


if __name__ == '__main__':
   app.run(debug=True,port=8080)