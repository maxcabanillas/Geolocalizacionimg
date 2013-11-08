from PIL import Image
from PIL.ExifTags import TAGS
import os
import operator

def get_exif_data(fname):    
    ret = {}    
    try:
        imga=fname[:-4]
        img = Image.open('espectaculares/' + fname) #Lee todas las imagenes de un folder llamado /img
        if hasattr( img, '_getexif' ):
            exifinfo = img._getexif()
            if exifinfo != None:                
                 v =exifinfo[34853]                 
                 lat = [float(x)/float(y) for x, y in v[2]]
                 latref = v[1]
                 lon = [float(x)/float(y) for x, y in v[4]]
                 lonref = v[3]
                 lat = lat[0] + lat[1]/60 + lat[2]/3600
                 lon = lon[0] + lon[1]/60 + lon[2]/3600
                 if latref == 'S':
                    lat = -lat
                 if lonref == 'W':
                    lon = -lon            
            ret['f']=imga
            ret['lat']=lat
            ret['long']=lon
    except IOError:
        print 'IOERROR ' + fname    
    return ret

path = 'espectaculares/'
listing = os.listdir(path)
i=0
dato={}
for infile in listing:
    img = infile
    par = img.find('(')
    para = img.find('y')   
    if par==int(-1) and para==int(-1):              
        valores = get_exif_data(img)
        dato[i]=valores
        i=i+1
        print valores
        #sorted(valores, key=lambda dato: dato[2])

