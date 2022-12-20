from selenium.webdriver.chrome.options import Options
from selenium import webdriver
import time
import os
from flask import *
import secrets
import dialogflow
from google.api_core.exceptions import InvalidArgument
from urllib.parse import quote
from random import randint
import requests
import google.protobuf  as pf
from webdriver_auto_update import check_driver
import pickle
import nltk
import re
from nltk.corpus import stopwords
from nltk.stem.snowball import SnowballStemmer
from nltk.stem import WordNetLemmatizer
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.model_selection import train_test_split
from sklearn.svm import LinearSVC
from sklearn.metrics import classification_report
import numpy as np
from sklearn.feature_extraction.text import TfidfVectorizer
import pandas as pd
import nltk
nltk.download('stopwords')
nltk.download('wordnet')
nltk.download('omw-1.4')


def detailscomponent(req):
    print(type(req))
    
    newlist = []
    for i in req['queryResult']['fulfillmentMessages']:
        for a in i.keys():
            if a[0] != 'p':
                newlist.append(a)
    return list( dict.fromkeys(newlist) )



#galderma_bot
os.environ["GOOGLE_APPLICATION_CREDENTIALS"] = 'galderma-1a-tqvi-f5466e5a2f65.json'
DIALOGFLOW_PROJECT_ID = 'galderma-1a-tqvi'
DIALOGFLOW_LANGUAGE_CODE = 'en'






options = Options()
#Chrome_Options is deprecated. So we use options instead.
def chromedriver():
    options = webdriver.ChromeOptions()
    options.add_argument("--headless")
    check_driver("C:\\Users\\Administrator\\Desktop\\gmb\\chromedriver")
    driver = webdriver.Chrome(executable_path=r"C:\Users\Administrator\Desktop\gmb\chromedriver\chromedriver.exe",chrome_options=options)
    return driver
#chrome_options=options,


app = Flask(__name__)
@app.route('/' , methods = ['GET'])
def index():
    return "Success"

#sentiment route starts

@app.route("/sentiment",methods=["POST"])
def home():
    
    def input_text(text):
        reviews_text=re.sub('[^A-Za-z0-9]'," ",str(text))
        reviews_text=re.sub("(.)\\1{2,}","\\1",str(reviews_text))
        html_tags_remover=re.compile('<.*?>')
        reviews_text=re.sub(html_tags_remover," ",reviews_text)
        lemmatizer=WordNetLemmatizer()
        reviews_text=lemmatizer.lemmatize(reviews_text)
        reviews_text=reviews_text.lower()
        reviews_text=reviews_text.split()
        reviews_text=[text for text in reviews_text if not text in set(stopwords.words('english'))]
        return ' '.join(reviews_text)
    ml_model = pickle.load(open(r"media//model (1).pkl", "rb")) 
    print(ml_model)
    tfidf_model = pickle.load(open(r"media//vectorizer.pkl", "rb")) 
    print(tfidf_model)
    if request.method=="POST":
        data=request.form.get("sentimenttext")
        # data="this movie is very time wasting and not at all good"
        # print(data)
        datapreprocess=input_text(data)

        vector_input = tfidf_model.transform([datapreprocess])

        result = ml_model.predict(vector_input)[0]
        print("result : ",result)
        if result==1:
            print("Positive")
            finalresult="Positive"
        elif result==0:
            print("neutral")
            finalresult="Neutral"
        else:
            print("Negative")
            finalresult="Negative"
        finaljson='[{"text":"'+data+'"},{"sentiment":"'+finalresult+'"}]'
    
    
    return finaljson



@app.route('/Comp_anaylysis', methods = ['POST'])
def Comp_anaylysis():
    #,chrome_options=options
    driver=chromedriver()
    keyword = request.values.get('keyword')
    Doctor = request.values.get('doc')
    url ='https://www.google.com/search?q='+keyword
    driver.get(url)
    time.sleep(3)
    mydict = {}
    try:
        driver.find_element_by_class_name('MXl0lf.mtqGb').click()
        b1 = driver.find_elements_by_class_name('dbg0pd')
        time.sleep(5)   
        print(len(b1))
        for i in range(0,len(b1)):
            print(b1[i].text)
            mydict[b1[i].text] = i+1
        flag = 0
        for i,j in mydict.items():
            if(Doctor in j):
                flag = 1
                break
            else:
                flag = 0
        if(flag == 0):
            mydict[Doctor] = len(mydict)+1
    except:
        try:
            b1 = driver.find_elements_by_class_name('dbg0pd')
            time.sleep(5)
            print(len(b1))
            for j in range(0,len(b1)):
                print(b1[j].text)
                mydict[b1[j].text] = j+1
            flag = 0
            for a,b in mydict.items():
                if(Doctor in a):
                    flag = 1
                    break
                else:
                    flag = 0
            if(flag == 0):
                mydict[Doctor] = len(mydict)+1
        except:
            val = driver.find_element_by_class_name('SPZz6b').find_element_by_tag_name('h2').text
            if(Doctor in val):
                mydict[Doctor] = 1
            else:
                mydict[Doctor] = len(mydict)+1
    driver.quit()
    
    return mydict  

    ##old one
# def Comp_anaylysis():

#     driver = chromedriver()
#     keyword = request.values.get('keyword')
#     Doctor = request.values.get('doc')
#     # Doctor = "Dr. Vandana | Best Obstetrician gynecologist and maternity specialist near me kurukshetra"
#     # keyword = "Obstetrician gynecologist  Kurukshetra Haryana"
#     url ='https://www.google.com/maps/search/'+keyword
#     driver.get(url)
#     time.sleep(3)
#     mydict = {}
#     try:
#         b = driver.find_elements_by_css_selector('h3.section-result-title')
#         a=[]
#         c=[]
#         count = 0
#         for j in b:
#             # print(i.text)
#             keyword = j.text
#             if("Hospital" not in keyword and count<10):
#                 count=count+1
#                 a.append(keyword)
#         for k in range(len(a)):
#             c.append(k+1)
#         flag = 0
#         for l in range(len(a)):
#             if((Doctor) in (a[l])):
#                 flag = 1
#                 break
#             else:
#                 flag = 0
#         if(flag == 0):
#             a[len(a)-1] = Doctor
#         for p in range(len(a)):
#             mydict[a[p]] = c[p]
#     except:
#         doctor_name = driver.find_element_by_tag_name('h1').text
#         if(Doctor in doctor_name):
#             mydict[Doctor] = '1'
#         else:
#             mydict[Doctor] = 'Not Found'
#     driver.quit()
#     return mydict
@app.route('/Google_searches', methods = ['POST'])  
def Google_searches():
    print("Google searches is working")
    #options = webdriver.ChromeOptions()
    #options.add_argument("--headless")
    #,chrome_options=options
    #driver = webdriver.Chrome(executable_path=chromeDriverFilePath,chrome_options=options)
    driver = chromedriver()
    keywords = request.values.get('keyword')
    print("keywords :",keywords)
    Doctor = request.values.get('doc')
    final_output = {}
    final_list = []
    my_list = keywords.split(',')
    print(my_list)
    for i in range(len(my_list)):
        mydict = {}
        # search_volumes = my_list[i].split('~')[1]
        driver.get('https://www.google.com/search?q='+my_list[i].split('~')[0])
        #print(my_list[i])
        time.sleep(3)
        try:
            driver.find_element_by_class_name('MXl0lf.mtqGb').click()
            b1 = driver.find_elements_by_class_name('dbg0pd')
            time.sleep(5)
            print(len(b1))
            for j in range(0,len(b1)):
                print(b1[j].text)
                mydict[b1[j].text] = j+1
            flag = 0
            for a,b in mydict.items():
                if(Doctor in a):
                    flag = 1
                    break
                else:
                    flag = 0
            if(flag == 0):
                mydict[Doctor] = '-'
        except:
            try:
                b1 = driver.find_elements_by_class_name('dbg0pd')
                time.sleep(5)
                print(len(b1))
                for j in range(0,len(b1)):
                    print(b1[j].text)
                    mydict[b1[j].text] = j+1
                flag = 0
                for a,b in mydict.items():
                    if(Doctor in a):
                        flag = 1
                        break
                    else:
                        flag = 0
                if(flag == 0):
                    mydict[Doctor] = '-'
            except:
                val = driver.find_element_by_class_name('SPZz6b').find_element_by_tag_name('h2').text
                if(Doctor in val):
                    mydict[Doctor] = 1
                else:
                    mydict[Doctor] = '-'
        specific_dict = {}
        specific_dict[my_list[i]] = mydict[Doctor]
        final_list.append(specific_dict)
    final_output[Doctor] = final_list
    driver.quit()
    return final_output

### Old one
# def Google_searches():
#     driver = chromedriver()
#     keywords = request.values.get('keyword')
#     Doctor = request.values.get('doc')
#     # Doctor = "Dr. Vandana | Best Obstetrician gynecologist and maternity specialist near me kurukshetra"
#     # keywords = "best gastroenterologist near me in whitefield~10000,gastroenterologist near me in whitefield~1000,gastro doctor in whitefield~100,best gastrologist in whitefield~1000,top gastrologist near me in whitefield~1000,gastrologist near me in whitefield ~1000,stomach specialist in whitefield~100,gastro doctor near me in whitefield~1000,stomach doctor near me in whitefield~100,gastroenterology doctors near me in whitefield~10000"
#     final_output = {}
#     final_list = []
#     my_list = keywords.split(',')
#     print(my_list)
#     for i in range(len(my_list)):
#         mydict = {}
#         # search_volumes = my_list[i].split('~')[1]
#         driver.get('https://www.google.com/maps/search/'+my_list[i].split('~')[0])
#         #print(my_list[i])
#         time.sleep(3)
#         try:
#             b = driver.find_elements_by_css_selector('h3.section-result-title')
#             a=[]
#             c=[]
#             count = 0
#             for j in b:
#                 keyword = j.text
#                 if("Hospital" not in keyword and count<10):
#                     count=count+1
#                     a.append(keyword)
#             for k in range(len(a)):
#                 c.append(k+1)
#             flag = 0
#             for l in range(len(a)):
#                 if((Doctor) in (a[l])):
#                     flag = 1
#                     break
#                 else:
#                     flag = 0
#             if(flag == 0):
#                 a[len(a)-1] = Doctor
#             for p in range(len(a)):
#                 mydict[a[p]] = c[p]
#         except:
#             doctor_name = driver.find_element_by_tag_name('h1').text
#             if(Doctor in doctor_name):
#                 mydict[Doctor] = '1'
#             else:
#                 mydict[Doctor] = '-'
#         specific_dict = {}
#         if mydict[Doctor] == 10:
#             mydict[Doctor] = '-'
#         specific_dict[my_list[i]] = mydict[Doctor]
#         final_list.append(specific_dict)
#     final_output[Doctor] = final_list
#     driver.quit()
#     return final_output
@app.route('/Rank_Map', methods = ['POST'])
def Rank_Map():
    keyword = request.values.get('keyword')
    # print(req_data)
    driver =chromedriver()
    # keyword = "Obstetrician gynecologist  Kurukshetra Haryana"
    url ='https://www.google.com/maps/search/'+keyword
    driver.get(url)
    data2 = driver.find_element_by_class_name("widget-pane.widget-pane-visible").get_attribute("innerHTML")                                                                                                                                        
    #data = soup.find("div",{"class":"widget-pane widget-pane-visible"})
    driver.quit()
    
    return data2
#def main():
    #Doctor = "Dr. Vandana | Best Obstetrician gynecologist and maternity specialist near me kurukshetra"
    #keyword = "Obstetrician gynecologist  Kurukshetra Haryana"
    #url ='https:/www.google.com/maps/search/'+keyword
   # print(Comp_anaylysis(url,Doctor))
   # time.sleep(5)
   # keywords = "best gastroenterologist near me in whitefield~10000,gastroenterologist near me in whitefield~1000,gastro doctor in whitefield~100,best gastrologist in whitefield~1000,top gastrologist near me in whitefield~1000,gastrologist near me in whitefield ~1000,stomach specialist in whitefield~100,gastro doctor near me in whitefield~1000,stomach doctor near me in whitefield~100,gastroenterology doctors near me in whitefield~10000"
  #  print(Google_searches(Doctor,keywords))
    #time.sleep(5)
#print(Rank_Map(url))
@app.route('/Rank_Map_screenshot', methods = ['POST'])
def Rank_Map_screenshot():
    Doctor = request.values.get('doc')
    keyword = request.values.get('keyword')
    doclink = request.values.get('doclink')
    cityorlocal = request.values.get('cityorlocal')
    # print(req_data)
    driver = chromedriver()
    # keyword = "Obstetrician gynecologist  Kurukshetra Haryana"
    url ='https://www.google.com/search?q='+keyword
    driver.get(url)
    driver.maximize_window()
    filename3 = secrets.token_hex(16) 
    filename2 = secrets.token_hex(16)
    filename1 = secrets.token_hex(16)
    # driver.save_screenshot("./static/"+filename+".png") 
    # # image = Image.open("image.png") 
    # return "https://gmbapi.multipliersolutions.in/static/"+filename+".png"
    # return send_file("./static/image.png", mimetype='image/gif')
    
    time.sleep(6)
    # driver.execute_script("window.scrollTo(0,500)") 
    # element1 = driver.find_element_by_class_name('rISBZc')# find part of the page you want image of
    element1 = driver.find_element_by_tag_name('body')# find part of the page you want image of
    total_height = element1.size["height"]+1000
    driver.set_window_size(1000, total_height/3.75)
    png1 = element1.screenshot("./static/"+doclink+"_"+cityorlocal+".png")
    time.sleep(2)

    # element1 = driver.find_element_by_class_name('asjHCd')# find part of the page you want image of
    # png1 = element1.screenshot("./static/"+filename2+".png")
    # time.sleep(2)

    # complete = driver.find_element_by_class_name('ccBEnf')
    # complete_png = complete.screenshot("./static/"+filename3+".png")

    Final_Name = []
    final_dict = {}

    Name = driver.find_elements_by_class_name('dbg0pd')
    print(len(Name))
    for i in Name:
        Final_Name.append(i.text)
    if(len(Final_Name)) == 0:
        final_dict[Doctor] = 'Not Found'
        checkrightside = driver.find_element_by_class_name('SPZz6b').text
        if (Doctor in checkrightside):
            final_dict[Doctor] = 1

    
    for i in range(len(Final_Name)):
        if(Final_Name[i] in Doctor):
            final_dict[Doctor] = i+1
            break
        else:
            final_dict[Doctor] = 'Not Found'
    mydict ={}
    print(Doctor)
    print(final_dict)
    print(Final_Name)
    print('Rank of a doctor is ' + str(final_dict[Doctor]) )
    mydict['url1'] = "https://gmbapi.multipliersolutions.in/static/"+doclink+"_"+cityorlocal+".png"
    # mydict['url2'] = "https://gmbapi.multipliersolutions.in/static/"+filename2+".png"
    # mydict['url3'] = "https://gmbapi.multipliersolutions.in/static/"+filename3+".png"
    mydict['Rank'] = final_dict[Doctor] 
    driver.quit()
    
    return mydict
@app.route('/GMB_profile', methods = ['POST'])
def GMB_profile():
    print("In gmb profile function")
    Doctor = request.values.get('doc')
    doclink = request.values.get('doclink')
    driver = chromedriver()
    url ='https://www.google.com/search?q='+Doctor
    driver.get(url)
    driver.maximize_window()
    time.sleep(3)
    driver.set_window_size(2200, 1000)
    filename1 = secrets.token_hex(16)
    try:
        #driver.find_element_by_class_name('liYKde.g.VjDLd').screenshot("./static/"+filename1+".png")
        driver.find_element_by_class_name('kp-wholepage.kp-wholepage-osrp.HSryR.EyBRub').screenshot("./static/"+doclink+"_profile.png")
    except:
        doclist = driver.find_elements_by_class_name('dbg0pd')
        for i in range(len(doclist)):
            if str(doclist[i].text) in str(Doctor):
                index = i
                # print(index)
        driver.find_elements_by_class_name('dbg0pd')[index].click()
        time.sleep(2)
        driver.maximize_window()
        driver.set_window_size(2500, 1000)
        time.sleep(2)
        driver.execute_script("document.body.style.zoom='100%'")
        driver.find_element_by_class_name('h2yBfgNjGpc__inline-item-view').screenshot("./static/"+doclink+"_profile.png")
    mydict ={}
    mydict['url1'] = "https://gmbapi.multipliersolutions.in/static/"+doclink+"_profile.png"
    
    driver.quit()
    
    return mydict

@app.route('/galderma_bot', methods=['GET', 'POST'])
def results4():
    req = request.get_json(force=True)
    text_to_be_analyzed = req['text']
    session_client = dialogflow.SessionsClient()
    session = session_client.session_path(DIALOGFLOW_PROJECT_ID, req['session'])
    text_input = dialogflow.types.TextInput(text=text_to_be_analyzed, language_code=DIALOGFLOW_LANGUAGE_CODE)
    query_input = dialogflow.types.QueryInput(text=text_input)
    response = session_client.detect_intent(session=session, query_input=query_input)
    resp = pf.json_format.MessageToJson(response, including_default_value_fields=False)
    res = {}
    res['response'] = json.loads(resp)
    res['components'] = detailscomponent(json.loads(resp))
    print('start')
    print(resp)

    print('end')
    # res = {}
    # res["text"] = response.query_result.fulfillment_messages[0].simple_responses.simple_responses[0].text_to_speech
    print(type(res))
    # # for i in 
    # res["btn"] = response.query_result.fulfillment_messages[1].suggestions.suggestions
    return (res)


if __name__ == '__main__':  
    #app.run(debug = True, port=8081)
    from waitress import serve
    serve(app, host="0.0.0.0", port=8081)
