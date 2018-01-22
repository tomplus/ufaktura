#!/bin/bash

VERSION=$1

if [ -z "$VERSION" ]
then
    echo "Usage: $0 <version>"
fi

echo "Download docker image tpimages/ufaktura:$VERSION"
docker pull tpimages/ufaktura:$VERSION

DEST=`pwd`/releases
echo Destination $DEST
mkdir -p $DEST
chmod a+w $DEST

docker run --volume=$DEST:/tmp -it --rm --name ufaktura tpimages/ufaktura:$VERSION 'tar' 'czf' '/tmp/ufaktura-'$VERSION'.tgz' '/ufaktura'



