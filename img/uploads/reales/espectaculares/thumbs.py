import PIL
from PIL import Image

basewidth = 200
for x in range(125, 126):
    print x
    img = Image.open(str(x)+'.jpg')
    wpercent = (basewidth/float(img.size[0]))
    hsize = int((float(img.size[1])*float(wpercent)))
    img = img.resize((basewidth,hsize), PIL.Image.ANTIALIAS)
    img.save('thums/'+str(x)+'.jpg')
    x=x+1
