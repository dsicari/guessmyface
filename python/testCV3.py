#OpenCV module
import cv2
#os module for reading training data directories and paths
import os
#numpy to convert python lists to numpy arrays as it is needed by OpenCV face recognizers
import numpy as np

#there is no label 0 in our training data so subject name for index/label 0 is empty
subjects = ["", "Ramiz Raja", "Elvis Presley"]


#function to detect face using OpenCV
def detect_face(img):
#convert the test image to gray scale as opencv face detector expects gray images
gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)

#load OpenCV face detector, I am using LBP which is fast
#there is also a more accurate but slow: Haar classifier
face_cascade = cv2.CascadeClassifier('opencv-files/lbpcascade_frontalface.xml')

#let's detect multiscale images(some images may be closer to camera than others)
#result is a list of faces
faces = face_cascade.detectMultiScale(gray, scaleFactor=1.2, minNeighbors=5);

#if no faces are detected then return original img
if (len(faces) == 0):
return None, None

#under the assumption that there will be only one face,
#extract the face area
x, y, w, h) = faces[0]

#return only the face part of the image
return gray[y:y+w, x:x+h], faces[0]