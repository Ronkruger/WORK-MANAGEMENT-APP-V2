<?php


?>
<html lang="en>
    <head>
        <title>Create note</title>
        
    </head>
    <body>
    <div class="notes">
                    <h1 id="notes">Create notes</h1>
                    <div class="text-area">
                        <textarea id="myText" rows="4" cols="50">
                            
                               </textarea>
                           
                               <button type="button" onclick="saveDynamicDataToFile();">Click to Save</button>
                    </div>
                    <div class="saved files">

                    </div>
                </div>
<!-------scripts----------->
<script>

function saveDynamicDataToFile() {

    var userInput = document.getElementById("myText").value;
    
    var blob = new Blob([userInput], { type: "text/plain;charset=utf-8" });
    saveAs(blob, "file.txt");
}

</script>
<script src="/scripts/FileSaver.js"></script>
    </body>
   
</html>