#!/usr/bin/env python
 
# import necessary libraries, you need to have previously installed # these via pip 
import requests
import json
from io import BytesIO
from PIL import Image, ImageDraw
#cam
import pygame, sys
import pygame.camera
import time, random

#
# GRAVA IMAGEM WEBCAM
#

pygame.init()
pygame.camera.init()
cam = pygame.camera.Camera("/dev/video0", (640,480))

print "Taking a shot:",
cam.start()
image = cam.get_image()
cam.stop()
#timestamp = time.strftime("%Y-%m-%d_%H%M%S", time.localtime())
filename = "/home/pi/faceapi/face2decode.jpg"
print "saving into %s" % filename
pygame.image.save(image, filename)

#
# DECODE IMAGEM
#

# Replace 'KEY_1' with your subscription key as a string
subscription_key = 'ea041bd96b1a4aa3a34b05ed8c962f02'
filename = '/home/pi/faceapi/face2decode.jpg'
# Replace or verify the region.
#
# You must use the same region in your REST API call as you used $
# For example, if you obtained your subscription keys from the we$
# "westcentralus" in the URI below with "westus".
#
# NOTE: Free trial subscription keys are generated in the westcen$
# a free trial subscription key, you should not need to change th$
uri_base = 'https://westcentralus.api.cognitive.microsoft.com'
# Request headers
# for locally stored image files use
# 'Content-Type': 'application/octet-stream'
headers = {
     'Content-Type': 'application/octet-stream',
     'Ocp-Apim-Subscription-Key': subscription_key,
}
# Request parameters
# The detection options for MCS Face API check MCS face api
# documentation for complete list of features available for
# detection in an image
# these parameters tell the api I want to detect a face and a smi$
params = {
    	'returnFaceId': 'true',
    	'returnFaceAttributes': 'age,gender,headPose,smile,facialHair,glasses,emotion,hair,makeup,occlusion,accessories,blur,exposure,noise',
}
# route to the face api
path_to_face_api = '/face/v1.0/detect'
# open jpg file as binary file data for intake by the MCS api
with open(filename, 'rb') as f:
    	img_data = f.read()
try:
    	# Execute the api call as a POST request. 
    	# What's happening?: You're sending the data, headers and
    	# parameter to the api route & saving the
	# mcs server's response to a variable.
	# Note: mcs face api only returns 1 analysis at time
    	response = requests.post(uri_base + path_to_face_api,
                             	data=img_data, 
                             	headers=headers,
                             	params=params)
    
    	print ('Response:')
    	# json() is a method from the request library that converts 
    	# the json reponse to a python friendly data structure
    	parsed = response.json()
        
	if(parsed == ""):
		print("Nao encontrou face")
    	# display the image analysis data
    	print (parsed)
    	print("---------------------------------")
    	print("Sexo: ",         parsed[0]['faceAttributes']['gender'])
    	print("Idade: ",        parsed[0]['faceAttributes']['age'])
    	print("Oculos: ",       parsed[0]['faceAttributes']['glasses'])
    	print("Raiva: ",        parsed[0]['faceAttributes']['emotion']['anger'])
    	print("Desprezo: ",     parsed[0]['faceAttributes']['emotion']['contempt'])
    	print("Nojo: ",         parsed[0]['faceAttributes']['emotion']['disgust'])
   	print("Medo: ",         parsed[0]['faceAttributes']['emotion']['fear'])
    	print("Felicidade: ",   parsed[0]['faceAttributes']['emotion']['happiness'])
    	print("Neutro: ",       parsed[0]['faceAttributes']['emotion']['neutral'])
    	print("Triste: ",       parsed[0]['faceAttributes']['emotion']['sadness'])
    	print("Surpreso: ",     parsed[0]['faceAttributes']['emotion']['surprise'])

except Exception as e:
    	print('Error:')
    	print(e)
