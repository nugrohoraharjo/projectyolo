from flask import Flask,render_template,Response, request, redirect, url_for,send_from_directory
import cv2
from werkzeug.utils import send_file
import subprocess
import detect
import pymysql
import sys
from flask import jsonify
import json
import os
from datetime import datetime
import signal
from pathlib import Path

app=Flask(__name__)

query = detect
# query = subprocess.Popen('python', 'detect.py', '--source', '0', '--weights', 'last.pt', '--imgsz', '736')
# pidnya = query.pidnya
def generate_frames():
    while True:
            
        ## read the camera frame
        success,frame=camera.read()
        if not success:
            break
        else:
            ret,buffer=cv2.imencode('.jpg',frame)
            frame=buffer.tobytes()

        yield(b'--frame\r\n'
                   b'Content-Type: image/jpeg\r\n\r\n' + frame + b'\r\n')



@app.route('/')
def index():
    return render_template('index.blade.php')
    

@app.route('/savedcapture')
def savedcapture():
    conn = pymysql.connect(host='localhost', user='root', password='', charset='utf8', db='yolodb')
    cur = conn.cursor()
    sql = "SELECT * from tb_image ORDER BY id DESC"
    cur.execute(sql)
    data = cur.fetchall()
    conn.close()
    jumlah = len(data)
    print(jumlah)
    # data = jsonify(data)
    datanya = jsonify([render_template('capture.html', data=data),jumlah ])
    # hasil = jsonify(data = datanya, jumlah = jumlah)
    return datanya


@app.route('/video')
def video():
    # untuk menjalankan kamera tanpa yolo uncomment line dibawah
    # return Response(generate_frames(),mimetype='multipart/x-mixed-replace; boundary=frame')
    # untuk menjalankan yolo dengan kamera website
    global query
    query = query.run(source='0',weights='last.pt',imgsz=[736,736])
    r = Response(query,mimetype='multipart/x-mixed-replace; boundary=frame')
    return r

@app.route('/video_off')
def video_off():    
    camera = cv2.VideoCapture(0)
    # if not camera.isOpened():
    #     message = "kamera berhasil error"
    # else:
    # message = "kamera tidak error"
    cv2.destroyAllWindows()
    camera.release()
    message = 'kamera tidak error'
    return jsonify(message)
    

@app.route('/reloadcapture')
def reloadcapture():
    conn = pymysql.connect(host='localhost', user='root', password='', charset='utf8', db='yolodb')
    cur = conn.cursor()
    sql = "SELECT * from tb_image ORDER BY id DESC"
    cur.execute(sql)
    data = cur.fetchall()
    conn.close()
    data = jsonify(data)

@app.route('/delete/<string:id>')
def delete(id):
    conn = pymysql.connect(host='localhost', user='root', password='', charset='utf8', db='yolodb')
    cur = conn.cursor()
    sql = "SELECT * from tb_image WHERE id = %s"
    cur.execute(sql,id)
    data = cur.fetchone()
    conn.close()
    filename = data[1]
    directory = "static/capture/"
    file = os.path.join(directory ,filename)
    os.remove(file)
    conn = pymysql.connect(host='localhost', user='root', password='', charset='utf8', db='yolodb')
    cur = conn.cursor()
    sql = "DELETE FROM tb_image WHERE id = %s"
    cur.execute(sql,id)
    # data = cur.fetchone()
    conn.commit()
    conn.close()
    retnya = data[2].strftime("%d-%b-%Y %H:%M:%S")
    
    return jsonify(retnya)
    
    

if __name__=="__main__":
    app.run(debug=True)