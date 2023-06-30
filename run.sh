
case "$1" in
 "1")
    mv ./src/App.jsx ./src/App.js; mv ./src/index.jsx ./src/index.js
    ;;
 "2")
    mv ./src/App.js ./src/App.jsx; mv ./src/index.js ./src/index.jsx
    ;;
 "zip")
    zip -r plugin.zip build coordinates-app.php
    ;;
 "push")
    if [ -z "$2" ]; then
        echo "Enter commit message !."
    else
       git add .
       git commit -m "$2"
       git push
    fi  
    ;;
esac
 

