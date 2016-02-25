.fake: clean all

TARGET=OpenLayers.js
SOURCEDIR=OpenLayers-2.10/
HERE=`pwd`

all: $(TARGET)

clean:
	rm -f $(TARGET)

$(TARGET): microservice.cfg
	cp -f microservice.cfg $(SOURCEDIR)/build/microservice.cfg
	(cd $(SOURCEDIR)/build && ./build.py microservice.cfg)
	yui-compressor $(SOURCEDIR)/build/OpenLayers.js -o $(TARGET)
