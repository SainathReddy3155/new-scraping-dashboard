from email import message
from lib2to3.pgen2 import driver
from pickle import TRUE
from unittest import result
from flask import Flask, jsonify,render_template,request,session, abort,send_file,send_from_directory,redirect,json
import response
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

from functools import wraps
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
        sql="SELECT gmbname from gmbdata where gmbname=%s"
        val= [(gmbname)]
        mycursor.execute(sql,val)
        result=mycursor.fetchone()
        mycursor.close()
        print("checking : ",result)
        if result:
            print("already available updating the doctor")
            mydb = dbconnect()
            mycursor=mydb.cursor()
            sql="UPDATE gmbdata SET rating=%s,total_reviews=%s,speciality=%s,address=%s,phone_number=%s where gmbname=%s"
            val= (rating,total_reviews,speciality,address,phone_number,gmbname)
            mycursor.execute(sql,val)
            mydb.commit()
            mycursor.close()
            print("Updated successfully")
        ##ending of checking
        else:
            mydb = dbconnect()
            mycursor=mydb.cursor()
            sql="INSERT INTO gmbdata(gmbname,rating,total_reviews,speciality,address,phone_number) VALUES (%s,%s,%s,%s,%s,%s)"
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
    driver.maximize_window()
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
        driver.find_element_by_xpath("//*[@id='awards and recognitions']").find_element_by_class_name("view-more.u-t-link.u-c-pointer.u-bold").click()
        print("Clicking view more")
    except:
        print("Not Clicking view more")
    try:
        awards=driver.find_element_by_xpath("//*[@id='awards and recognitions']").text
        print(awards)
    except:
        awards="NA"
        print(awards)
    try:
        driver.find_element_by_id("education").find_element_by_class_name("view-more.u-t-link.u-c-pointer.u-bold").click()
        print("Clicking view more")
    except:
        print("Not Clicking view more")
    try:
        education=driver.find_element_by_id("education").text
        print(education)
    except:
        education="NA"
        print(education)  
    try:
        driver.find_element_by_id("experience").find_element_by_class_name("view-more.u-t-link.u-c-pointer.u-bold").click()
        print("Clicking view more")
    except:
        print("Not Clicking view more")
    try:
        experience=driver.find_element_by_id("experience").text
        print(experience)
    except:
        experience="NA"
        print(experience)
    try:
        driver.find_element_by_id("registrations").find_element_by_class_name("view-more.u-t-link.u-c-pointer.u-bold").text
        print("Clicking view more")
    except:
        print("Not Clicking view more")
    try:
        registrations=driver.find_element_by_id("registrations").text
        print(registrations)
    except:
        registrations="NA"
        print(registrations)
    try:
        driver.find_element_by_id("memberships").find_element_by_class_name("view-more.u-t-link.u-c-pointer.u-bold").click()
        print("Clicking view more")
    except:
        print("Not Clicking view more")
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
        val= (practo_doc_name,specialization,header_exp,location,clinic_name,address,awards,education,experience,registrations,membership,page_url,page_url)
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


from flask import Response
def docache():
    """ Flask decorator that allow to set Expire and Cache headers. """
    def fwrap(f):
        @wraps(f)
        def wrapped_f(*args, **kwargs):
            r = f(*args, **kwargs)
            
            rsp = Response(r)
            rsp.headers.add('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0')   
            
            return rsp
        return wrapped_f
    return fwrap

app = Flask(__name__)
app.secret_key = 'sainath123567'

@app.route("/",methods=["POST","GET"])
def home():
    if 'username' in session:
        return redirect("/dashboard")
    else:
        return redirect("/login")


@app.route("/login",methods=["POST",'GET'])

def login():
    errormessage=""
    if request.method == 'POST':
        username = request.form.get('username')
        password = request.form.get('password')
        # print(username)
        # print(password)
        mydb = dbconnect()
        cursor=mydb.cursor()
        cursor.execute("SELECT * FROM  login WHERE username=%s and password =%s",(username,password))
        exists=cursor.fetchone()
        cursor.close
        # print(exists)
        if exists :
            session['loggedin'] = True
            session['username'] = username
            
            print("username: ",session['username'])
       
            # print(last_login)      
            successmessage = 'Logged in successfully !'
            print(successmessage)
            return redirect ("/dashboard")
        else:
            errormessage = 'Invalid Attempt !'
            print(errormessage)  
            return render_template("login.php",variable={'errormessage':errormessage})   
    return render_template('login.php',variable={'errormessage':errormessage})

@app.route('/dashboard',methods=["POST","GET"])
@docache()
def dashboard():
    if "username" in session:
        print("hello")
        mydb = dbconnect()
        mycursor=mydb.cursor()
        sql="SELECT count(id) as total_doctors FROM ( SELECT id from `gmbdata` UNION ALL SELECT id from linkedin_basic_info UNION ALL SELECT id from practodata UNION ALL SELECT id from twitter_info) as adaad"
        mycursor.execute(sql)
        total_docs=mycursor.fetchone()
        mycursor.close()
        totaldocs=total_docs[0]
        mydb = dbconnect()
        mycursor=mydb.cursor()
        sql="SELECT count(id) from gmbdata"
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
    else:
        return redirect("/login")


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






##practodatatabletemplate
@app.route("/aggregator",methods=['POST','GET'])
@docache()
def practofinal():
    if "username" in session:
        return render_template("practodatatablefinal.php")
    else:
        return redirect("/login")

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
        return redirect('/aggregator')


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
        return("/aggregator")


##download excel practodatatable
@app.route("/downloadallaggregator",methods=['POST','GET'])
def downloadallpracto():
    file_name="aggregrator_data"
    mydb=dbconnect()
    mycursor=mydb.cursor()
    sql="SELECT practo_doc_name,specialization,header_exp,location,address FROM practodata ORDER BY id DESC"
    mycursor.execute(sql)
    results=mycursor.fetchall()
    df = pd.DataFrame(results,columns=['Doctor Name','Speciality','Experience','Location','Address'])
    filename=file_name+'-on''-['+str(datetime.now().strftime('%d-%m-%Y , %H-%M-%S')) +']'
    df.to_excel("static//files/"+filename+".xlsx")
    filepath='static/files'
    return send_from_directory(filepath,filename+'.xlsx',as_attachment=True)



##gmbdatatabletemplate
@app.route("/google",methods=['POST','GET'])
@docache()
def gmbfinal():
    if "username" in session:
        return render_template("gmbfinal.php",variable={})
    else:
        return redirect("/login") 


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
            sql="SELECT * FROM gmbdata ORDER BY id DESC LIMIT "+str(start)+","+str(length)+""
        ## if search is not empty then search query works
        else:   
            sql="SELECT * FROM `gmbdata` where gmbname LIKE '%"+(searchValue)+"%' OR rating LIKE '%"+(searchValue)+"%' OR total_reviews LIKE '%"+(searchValue)+"%' OR speciality LIKE '%"+(searchValue)+"%' OR address LIKE '%"+(searchValue)+"%' OR phone_number LIKE '%"+(searchValue)+"%' ORDER BY id LIMIT "+str(start)+","+str(length)+" "  
            # print(sql)
        mydb = dbconnect()
        mycursor=mydb.cursor()
        mycursor.execute(sql)
        results=mycursor.fetchall()
        # print(results)

        ##Total records query 
        mydb = dbconnect()
        mycursor=mydb.cursor()
        sql="SELECT * FROM gmbdata "
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
        sql="UPDATE gmbdata SET rating=%s,total_reviews=%s,speciality=%s,address=%s,phone_number=%s WHERE gmbname=%s"
        val=(gmbrating,totalreviews,speciality,address,phonenumber,gmbname)
        mycursor.execute(sql,val)   
        mydb.commit()
        mycursor.close()
        print("Updated successfully")
        return redirect('/google')


##deletegmbdatatabledata
@app.route("/deletegmbdata",methods=["POST","GET"])
def deletegmbdata():
    if request.method=="POST":
        data=request.get_json()
        gmbname=data["name"]
        print("name : ",gmbname)
        mydb = dbconnect()
        mycursor=mydb.cursor()
        sql="DELETE FROM gmbdata WHERE gmbname=%s"
        val=[(gmbname)]
        mycursor.execute(sql,val)   
        mydb.commit()
        mycursor.close()
    return redirect("/google")



##gmbdatatabletemplate
@app.route("/twitterinfo",methods=['POST','GET'])
@docache()
def twitterinfofinal():
    if "username" in session:
        return render_template("twitterinfofinal.php",variable={})
    else:
        return redirect("/login")

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
@docache()
def twittertweetsdata():
    if "username" in session:
        return render_template("twitterdatafinal.php")
    else:
        return redirect("/login")

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
            sql="SELECT * FROM `twitter_tweets_data` where twitterhandel LIKE '%"+(searchValue)+"%' OR days_since_tweet LIKE '%"+(searchValue)+"%' OR username_at_the_rate LIKE '%"+(searchValue)+"%' OR tweet LIKE '%"+(searchValue)+"%' OR retweet_count LIKE '%"+(searchValue)+"%' OR tweet_favourited LIKE '%"+(searchValue)+"%' OR engagement_rate LIKE '%"+(searchValue)+"%' ORDER BY id DESC LIMIT "+str(start)+","+str(length)+" "  
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
    sql="SELECT twitterhandel,days_since_tweet,username_at_the_rate,tweet,retweet_count,tweet_favourited,engagement_rate FROM twitter_tweets_data ORDER BY id DESC"
    mycursor.execute(sql)
    results=mycursor.fetchall()
    df = pd.DataFrame(results,columns=['Twitter handel','Days Since Tweet','Username','Tweet','Retweet Count','Tweet Favourited','Engagement Rate'])
    filename=file_name+'-on''-['+str(datetime.now().strftime('%d-%m-%Y , %H-%M-%S')) +']'
    df.to_excel("static//files/"+filename+".xlsx")
    filepath='static/files'
    return send_from_directory(filepath,filename+'.xlsx',as_attachment=True)

##linkedinbasic info template
@app.route("/linkedinbasicinfo",methods=['POST','GET'])
@docache()
def linkedinbasicinfo():
    if "username" in session:
        return render_template("linkedinbasicinfo.php")
    else:
        return redirect("/login")

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
            sql="SELECT * FROM linkedin_basic_info ORDER BY id DESC LIMIT "+str(start)+","+str(length)+""
        ## if search is not empty then search query works
        else:   
            sql="SELECT * FROM `linkedin_basic_info` where Name LIKE '%"+(searchValue)+"%' OR description LIKE '%"+(searchValue)+"%' OR location LIKE '%"+(searchValue)+"%' OR 	connections LIKE '%"+(searchValue)+"%' OR about LIKE '%"+(searchValue)+"%' OR 	followers LIKE '%"+(searchValue)+"%' OR linkedinhandel LIKE '%"+(searchValue)+"%' ORDER BY id DESC LIMIT "+str(start)+","+str(length)+" "  
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
                    "Name":i[1],
                    "description":i[2],"location":i[3],"connections":i[4],"about":i[5],"followers":i[6],"linkedinhandel":i[7]}
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
    sql="SELECT Name,description,location,connections,about,followers,linkedinhandel FROM linkedin_basic_info ORDER BY id DESC"
    mycursor.execute(sql)
    results=mycursor.fetchall()
    df = pd.DataFrame(results,columns=['Name','Description','Location','Connections','About','Followers','Linkedinhandel'])
    filename=file_name+'-on''-['+str(datetime.now().strftime('%d-%m-%Y , %H-%M-%S')) +']'
    df.to_excel("static//files/"+filename+".xlsx")
    filepath='static/files'
    return send_from_directory(filepath,filename+'.xlsx',as_attachment=True)



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

 


##download gmb alldata datatable
@app.route("/downloadmultiplegmb",methods=['POST','GET'])
def downloadmultiplegmb():
    file_name="gmbdata_complete_data"
    mydb=dbconnect()
    mycursor=mydb.cursor()
    sql="SELECT * FROM gmbdata"
    mycursor.execute(sql)
    results=mycursor.fetchall()
    df = pd.DataFrame(results,columns=['Id','Name','Rating','Total Reviews','Speciality','Address','Phone Number'])
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
    sql="SELECT twitterhandel,total_no_tweets,tweets_per_day,followers,following,favourited FROM twitter_info ORDER BY id DESC"
    mycursor.execute(sql)
    results=mycursor.fetchall()
    df = pd.DataFrame(results,columns=['Twitter Handel','Total tweets','Tweets per day','Followers','Following','Favourited'])
    filename=file_name+'-on''-['+str(datetime.now().strftime('%d-%m-%Y , %H-%M-%S')) +']'
    df.to_excel("static//files/"+filename+".xlsx")
    filepath='static/files'
    return send_from_directory(filepath,filename+'.xlsx',as_attachment=True)

##linkedin activty template
@app.route("/linkedinactivity",methods=["POST","GET"])
@docache()
def linkedinactivity():
    if "username" in session:
        return render_template("linkedinactivity.php")
    else:
        return redirect("/login")

##linkedin activty template datatable api
@app.route("/linkedinactivitydatatable",methods=["POST","GET"])
def linkedinactivitydatatable():
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
            sql="SELECT * FROM linkedin_activity ORDER BY id DESC LIMIT "+str(start)+","+str(length)+""
        ## if search is not empty then search query works
        else:   
            sql="SELECT * FROM `linkedin_activity` where Name LIKE '%"+(searchValue)+"%' OR post_data LIKE '%"+(searchValue)+"%' OR reactions_count LIKE '%"+(searchValue)+"%' OR 	no_of_comments LIKE '%"+(searchValue)+"%' ORDER BY id  DESC LIMIT "+str(start)+","+str(length)+" "  
            # print(sql)
        mydb = dbconnect()
        mycursor=mydb.cursor()
        mycursor.execute(sql)
        results=mycursor.fetchall()
        # print(results)

        ##Total records query 
        mydb = dbconnect()
        mycursor=mydb.cursor()
        sql="SELECT * FROM linkedin_activity"
        mycursor.execute(sql)
        results1=mycursor.fetchall()
        # print(results1)
        newarr=[]
        for i in results:
            datadictionary={
                    "Name":i[1],
                    "post_data":i[3],"reactions_count":i[4],"no_of_comments":i[5]}
            newarr.append(datadictionary)
        if len(results)==0:
            message="No Results to Fetch"
            print(message)
        else:
            message=""
        
        return jsonify({"data": newarr,'recordsFiltered': len(results1),'iTotalRecords':len(results1),'draw': draw,'start':start,'length':length})

##linkedin activity download excel
@app.route("/downloadlinkedinactivitydownloadexcel",methods=["POST","GET"])
def downloadlinkedinactivitydownloadexcel():
    file_name="linkedin_activity_data"
    mydb=dbconnect()
    mycursor=mydb.cursor()
    sql="SELECT Name,post_data,reactions_count,no_of_comments FROM linkedin_activity ORDER BY id DESC"
    mycursor.execute(sql)
    results=mycursor.fetchall()
    df = pd.DataFrame(results,columns=['Name','Post Data','Reactions','Comments'])
    filename=file_name+'-on''-['+str(datetime.now().strftime('%d-%m-%Y , %H-%M-%S')) +']'
    df.to_excel("static//files/"+filename+".xlsx")
    filepath='static/files'
    return send_from_directory(filepath,filename+'.xlsx',as_attachment=True)
    

##linkedin posts download excel 
@app.route("/downloadlinkedinpostsexcel",methods=["POST","GET"])
def downloadlinkedinpostsexcel():
    file_name="linkedin_posts_data"
    mydb=dbconnect()
    mycursor=mydb.cursor()
    sql="SELECT Name,post_data,post_likes,post_comments FROM linkedin_posts ORDER BY id DESC"
    mycursor.execute(sql)
    results=mycursor.fetchall()
    df = pd.DataFrame(results,columns=['Name','Post Data','Reactions','Comments'])
    filename=file_name+'-on''-['+str(datetime.now().strftime('%d-%m-%Y , %H-%M-%S')) +']'
    df.to_excel("static//files/"+filename+".xlsx")
    filepath='static/files'
    return send_from_directory(filepath,filename+'.xlsx',as_attachment=True)



##youtube data template
@app.route("/youtube",methods=["POST","GET"])
@docache()
def youtube():
    if "username" in session:
        return render_template("youtube.php")
    else:
        return redirect("/login")


##youtube datatable data api
@app.route("/youtubedatatable",methods=["POST","GET"])
def youtubedatatable():
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
            sql="SELECT * FROM  yt_data ORDER BY id DESC LIMIT "+str(start)+","+str(length)+""
        ## if search is not empty then search query works
        else:   
            sql="SELECT * FROM `yt_data` where doctor_name LIKE '%"+(searchValue)+"%' OR video_name LIKE '%"+(searchValue)+"%' OR views LIKE '%"+(searchValue)+"%' OR date_posted LIKE '%"+(searchValue)+"%' OR likes LIKE '%"+(searchValue)+"%' OR channel_name LIKE '%"+(searchValue)+"%' OR subs LIKE '%"+(searchValue)+"%' OR comments LIKE '%"+(searchValue)+"%' OR page_url LIKE '%"+(searchValue)+"%' ORDER BY id DESC LIMIT "+str(start)+","+str(length)+" "  
            # print(sql)
        mydb = dbconnect()
        mycursor=mydb.cursor()
        mycursor.execute(sql)
        results=mycursor.fetchall()
        # print(results)

        ##Total records query 
        mydb = dbconnect()
        mycursor=mydb.cursor()
        sql="SELECT * FROM yt_data"
        mycursor.execute(sql)
        results1=mycursor.fetchall()
        # print(results1)
        newarr=[]
        for i in results:
            datadictionary={
                    "doctor_name":i[1],
                    "video_name":i[2],"views":i[3],"date_posted":i[4],"likes":i[5],"channel_name":i[6],"subs":i[7],"comments":i[8],"page_url":i[9]}
            newarr.append(datadictionary)
        if len(results)==0:
            message="No Results to Fetch"
            print(message)
        else:
            message=""
        
        return jsonify({"data": newarr,'recordsFiltered': len(results1),'iTotalRecords':len(results1),'draw': draw,'start':start,'length':length})


##youtube data download excel
@app.route("/youtubedownloadexcel",methods=["POST","GET"])
def youtubedownloadexcel():
    file_name="youtube_data"
    mydb=dbconnect()
    mycursor=mydb.cursor()
    sql="SELECT doctor_name,video_name,views,date_posted,likes,channel_name,subs,comments,page_url FROM yt_data ORDER BY id DESC"
    mycursor.execute(sql)
    results=mycursor.fetchall()
    df = pd.DataFrame(results,columns=['Doctor Name','Video Name','Views','Date Posted','Likes','Channel Name','Subscribers','Comments','Video Url'])
    filename=file_name+'-on''-['+str(datetime.now().strftime('%d-%m-%Y , %H-%M-%S')) +']'
    df.to_excel("static//files/"+filename+".xlsx")
    filepath='static/files'
    return send_from_directory(filepath,filename+'.xlsx',as_attachment=True)


###linkedin posts template
@app.route("/linkedinposts",methods=["POST","GET"])
@docache()
def linkedinposts():
    if "username" in session:
        return render_template("linkedinposts.php")
    else:
        return redirect("/login")


###linkedin posts data datatable api
@app.route("/likedinpostsdatatable",methods=["POST","GET"])
def likedinpostsdatatable():
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
            sql="SELECT * FROM  linkedin_posts ORDER BY id DESC LIMIT "+str(start)+","+str(length)+""
        ## if search is not empty then search query works
        else:   
            sql="SELECT * FROM `linkedin_posts` where Name LIKE '%"+(searchValue)+"%' OR post_data LIKE '%"+(searchValue)+"%' OR post_likes LIKE '%"+(searchValue)+"%' OR post_comments	 LIKE '%"+(searchValue)+"%' ORDER BY id  LIMIT "+str(start)+","+str(length)+" "  
            # print(sql)
        mydb = dbconnect()
        mycursor=mydb.cursor()
        mycursor.execute(sql)
        results=mycursor.fetchall()
        # print(results)

        ##Total records query 
        mydb = dbconnect()
        mycursor=mydb.cursor()
        sql="SELECT * FROM linkedin_posts"
        mycursor.execute(sql)
        results1=mycursor.fetchall()
        # print(results1)
        newarr=[]
        for i in results:
            datadictionary={
                    "Name":i[1],
                    "post_data":i[3],"post_likes":i[4],"post_comments":i[5],}
            newarr.append(datadictionary)
        if len(results)==0:
            message="No Results to Fetch"
            print(message)
        else:
            message=""
        
        return jsonify({"data": newarr,'recordsFiltered': len(results1),'iTotalRecords':len(results1),'draw': draw,'start':start,'length':length})

##linkedin data upload template
@app.route("/linkedinarticles",methods=["POST","GET"])
@docache()
def linkedinarticles():
    if "username" in session:
        return render_template("linkedinarticles.php")
    else:
        return redirect("/login")

##linkedin articles datatable api
@app.route("/linkedinarticlesdatatable",methods=["POST","GET"])
def linkedinarticlesdatatable():
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
            sql="SELECT * FROM  linkedin_articles ORDER BY id DESC LIMIT "+str(start)+","+str(length)+""
        ## if search is not empty then search query works
        else:   
            sql="SELECT * FROM `linkedin_articles` where Name LIKE '%"+(searchValue)+"%' OR article_data LIKE '%"+(searchValue)+"%' OR 	article_likes LIKE '%"+(searchValue)+"%' OR article_comments LIKE '%"+(searchValue)+"%' ORDER BY id  LIMIT "+str(start)+","+str(length)+" "  
            # print(sql)
        mydb = dbconnect()
        mycursor=mydb.cursor()
        mycursor.execute(sql)
        results=mycursor.fetchall()
        # print(results)

        ##Total records query 
        mydb = dbconnect()
        mycursor=mydb.cursor()
        sql="SELECT * FROM linkedin_articles"
        mycursor.execute(sql)
        results1=mycursor.fetchall()
        # print(results1)
        newarr=[]
        for i in results:
            datadictionary={
                    "Name":i[1],
                    "article_data":i[3],"article_likes":i[4],"article_comments":i[5],}
            newarr.append(datadictionary)
        if len(results)==0:
            message="No Results to Fetch"
            print(message)
        else:
            message=""
        
        return jsonify({"data": newarr,'recordsFiltered': len(results1),'iTotalRecords':len(results1),'draw': draw,'start':start,'length':length})

##linkedin articles download excel
@app.route("/downloadlinkedinarticlesexcel",methods=["POST","GET"])
def downloadlinkedinarticlesexcel():
    file_name="linkedin_articles_data"
    mydb=dbconnect()
    mycursor=mydb.cursor()
    sql="SELECT Name,article_data,article_likes,article_comments FROM linkedin_articles ORDER BY id DESC"
    mycursor.execute(sql)
    results=mycursor.fetchall()
    df = pd.DataFrame(results,columns=['Name','Article Data','Reactions','Comments'])
    filename=file_name+'-on''-['+str(datetime.now().strftime('%d-%m-%Y , %H-%M-%S')) +']'
    df.to_excel("static//files/"+filename+".xlsx")
    filepath='static/files'
    return send_from_directory(filepath,filename+'.xlsx',as_attachment=True)




##linkedin documents  template
@app.route("/linkedindocuments",methods=["POST","GET"])
@docache()
def linkedindocuments():
    if "username" in session:
        return render_template("linkedindocuments.php")
    else:
        return redirect("/login")


##linkedin documents datatable api
@app.route("/linkedindocumentsdatatable",methods=["POST","GET"])
def linkedindocumentsdatatable():
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
            sql="SELECT * FROM  linkedin_documents ORDER BY id DESC LIMIT "+str(start)+","+str(length)+""
        ## if search is not empty then search query works
        else:   
            sql="SELECT * FROM `linkedin_documents` where Name LIKE '%"+(searchValue)+"%' OR doc_data LIKE '%"+(searchValue)+"%' OR doc_likes LIKE '%"+(searchValue)+"%' OR doc_comments LIKE '%"+(searchValue)+"%' ORDER BY id  LIMIT "+str(start)+","+str(length)+" "  
            # print(sql)
        mydb = dbconnect()
        mycursor=mydb.cursor()
        mycursor.execute(sql)
        results=mycursor.fetchall()
        # print(results)

        ##Total records query 
        mydb = dbconnect()
        mycursor=mydb.cursor()
        sql="SELECT * FROM linkedin_documents"
        mycursor.execute(sql)
        results1=mycursor.fetchall()
        # print(results1)
        newarr=[]
        for i in results:
            datadictionary={
                    "Name":i[1],
                    "doc_data":i[3],"doc_likes":i[4],"doc_comments":i[5],}
            newarr.append(datadictionary)
        if len(results)==0:
            message="No Results to Fetch"
            print(message)
        else:
            message=""
        
        return jsonify({"data": newarr,'recordsFiltered': len(results1),'iTotalRecords':len(results1),'draw': draw,'start':start,'length':length})


##linkedin documents download excel
@app.route("/downloadlinkedindocumentsexcel",methods=["POST","GET"])
def downloadlinkedindocumentsexcel():
    file_name="linkedin_documents_data"
    mydb=dbconnect()
    mycursor=mydb.cursor()
    sql="SELECT Name,doc_data,doc_likes,doc_comments FROM linkedin_documents ORDER BY id DESC"
    mycursor.execute(sql)
    results=mycursor.fetchall()
    df = pd.DataFrame(results,columns=['Name','Document Data','Reactions','Comments'])
    filename=file_name+'-on''-['+str(datetime.now().strftime('%d-%m-%Y , %H-%M-%S')) +']'
    df.to_excel("static//files/"+filename+".xlsx")
    filepath='static/files'
    return send_from_directory(filepath,filename+'.xlsx',as_attachment=True)

##linkedin data upload template
@app.route("/linkedinuploaddata",methods=["POST","GET"])
@docache()
def linkedinuploaddata():
    if "username" in session:
        return render_template("linkedinuploaddata.php")
    else:
        return redirect("/login")

##linkedin data upload api
@app.route("/linkedindatauploadapi",methods=["POST","GET"])
def linkedindatauploadapi():
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
            sql="SELECT * FROM  linkedindataupload ORDER BY id DESC LIMIT "+str(start)+","+str(length)+""
        ## if search is not empty then search query works
        else:   
            sql="SELECT * FROM `linkedindataupload` where linkedinurl LIKE '%"+(searchValue)+"%' OR status LIKE '%"+(searchValue)+"%'  ORDER BY id  LIMIT "+str(start)+","+str(length)+" "  
            # print(sql)
        mydb = dbconnect()
        mycursor=mydb.cursor()
        mycursor.execute(sql)
        results=mycursor.fetchall()
        # print(results)

        ##Total records query 
        mydb = dbconnect()
        mycursor=mydb.cursor()
        sql="SELECT * FROM linkedindataupload"
        mycursor.execute(sql)
        results1=mycursor.fetchall()
        # print(results1)
        newarr=[]
        for i in results:
            datadictionary={
                    "linkedinurl":i[1],
                    "status":i[2]}
            newarr.append(datadictionary)
        if len(results)==0:
            message="No Results to Fetch"
            print(message)
        else:
            message=""
        
        return jsonify({"data": newarr,'recordsFiltered': len(results1),'iTotalRecords':len(results1),'draw': draw,'start':start,'length':length})


##linkedindata upload 
@app.route("/linkedindataupload",methods=["POST","GET"])
def linkedindataupload():
    if request.method=="POST":
        data1=request.get_json()
        data=data1["linkedinuploaddata"]
        print(data)
        status="Pending"
        mydb = dbconnect()
        mycursor=mydb.cursor()
        sql="INSERT INTO linkedindataupload(linkedinurl,status) VALUES (%s,%s)"
        val= (data,status)
        mycursor.execute(sql,val)
        mydb.commit()
        print(mycursor.rowcount, "record inserted.")
        message="Successfully submitted"
        return redirect("/linkedinuploaddata")


##cleanup and merge template
@app.route("/cleanupandmerge",methods=['POST','GET'])
@docache()
def cleanupandmerge():
    if 'username' in session:
        return render_template("cleanupandmerge.php")
    else:
        return redirect("/login")


##cleanup and merge datatable api
@app.route("/cleanupandmergedatatableapi",methods=['POST','GET'])
def cleanupandmergedatatableapi():
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
            sql="SELECT * FROM  cleanupandmerge ORDER BY id  LIMIT "+str(start)+","+str(length)+""
        ## if search is not empty then search query works
        else:   
            sql="SELECT * FROM `cleanupandmerge` where doctor_name LIKE '%"+(searchValue)+"%' OR google_name LIKE '%"+(searchValue)+"%'  OR google_speciality LIKE '%"+(searchValue)+"%'  OR google_address LIKE '%"+(searchValue)+"%' OR google_phonenumber LIKE '%"+(searchValue)+"%' OR aggregator_speciality LIKE '%"+(searchValue)+"%' OR aggregator_clinic_name LIKE '%"+(searchValue)+"%' OR aggregator_location LIKE '%"+(searchValue)+"%' OR linkedin_name LIKE '%"+(searchValue)+"%' OR 	linkedin_description LIKE '%"+(searchValue)+"%' OR 	linkedin_location LIKE '%"+(searchValue)+"%' OR twitter_name LIKE '%"+(searchValue)+"%'  OR twitter_handel LIKE '%"+(searchValue)+"%'  ORDER BY id  LIMIT "+str(start)+","+str(length)+" "  
            # print(sql)
        mydb = dbconnect()
        mycursor=mydb.cursor()
        mycursor.execute(sql)
        results=mycursor.fetchall()
        # print(results)

        ##Total records query 
        mydb = dbconnect()
        mycursor=mydb.cursor()
        sql="SELECT * FROM cleanupandmerge"
        mycursor.execute(sql)
        results1=mycursor.fetchall()
        # print(results1)
        newarr=[]
        for i in results:
            datadictionary={
                    "doctor_name":i[1],
                    "google_name":i[2],
                    "google_speciality":i[3],
                    "google_address":i[4],
                    "google_phonenumber":i[5],
                    "aggregator_speciality":i[6],
                    "aggregator_clinic_name":i[7],
                    "aggregator_location":i[8],
                    "linkedin_name":i[9],
                    "linkedin_description":i[10],
                    "linkedin_location":i[11],
                    "twitter_name":i[12],
                    "twitter_handel":i[13],
   }
            newarr.append(datadictionary)
        if len(results)==0:
            message="No Results to Fetch"
            print(message)
        else:
            message=""
        
        return jsonify({"data": newarr,'recordsFiltered': len(results1),'iTotalRecords':len(results1),'draw': draw,'start':start,'length':length})


##download excel of downloadcompletecleanupandmerge
@app.route("/downloadcompletecleanupandmerge",methods=["POST","GET"])
def downloadcompletecleanupandmerge():
    file_name="cleanup_merge_data"
    mydb=dbconnect()
    mycursor=mydb.cursor()
    sql="SELECT doctor_name,google_name,google_speciality,google_address,google_phonenumber,aggregator_speciality,aggregator_clinic_name,aggregator_location,linkedin_name,linkedin_description,linkedin_location,twitter_name,twitter_handel FROM cleanupandmerge ORDER BY id DESC"
    mycursor.execute(sql)
    results=mycursor.fetchall()
    df = pd.DataFrame(results,columns=['Name','Google Name','Google Speciality','Google Address','Google Phonenumber','Aggregator Speciality','Aggregator Clinic Name','Aggregator Location','Linkedin Name','Linkedin Description','Linkedin Location','Twitter Name','Twitter Handel'])
    filename=file_name+'-on''-['+str(datetime.now().strftime('%d-%m-%Y , %H-%M-%S')) +']'
    df.to_excel("static//files/"+filename+".xlsx")
    filepath='static/files'
    return send_from_directory(filepath,filename+'.xlsx',as_attachment=True)





@app.route("/logout",methods=["POST","GET"])
def logout():
    session.pop("username")
    session.clear()
    # response.headers.add('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0')
    return redirect("/login")




if __name__ == '__main__':
   app.run(debug=True,port=8080)