// var Multiple = document.getElementById("Multiple").value;
duplication(1);

function duplication($multiple){

    if(document.URL=="http://localhost/E-Lyrics.org/add"){

        if($multiple<=0){
            alert("Can't Be 0 or lower then 0");
        }else if
        ($multiple>1000){
    
            alert("only 1000 or less , so your navigator can handle it");
    
        }else{
    
            document.getElementById("Train").value= $multiple;
    
            var text=`
            `;
        
            for(var i=1; i <= $multiple ; i++){
        
                text+=`
                <div class="card-header m-2">
                    <div class="form-group p-2">
                        <label for="Artist${i}">Artist ${i}</label>
                        <input type="text" name="Artist${i}" class="form-control" placeholder="Artist">
                    </div>
                    <div class="form-group p-2">
                        <label for="Song${i}">Song ${i}</label>
                        <input type="text" name="Song${i}" class="form-control" placeholder="Song">
                    </div>
                    <div class="form-group p-2">
                        <label for="Album${i}">Album ${i}</label>
                        <input type="text" name="Album${i}" class="form-control" placeholder="Album">
                    </div>
                    <div class="form-group p-2">
                        <label for="Words${i}">Words ${i}</label>
                        <textarea style="height:150px" type="text" name="Words${i}" class="form-control" placeholder="Words"></textarea>
                    </div>
                </div>
                `
            }
        
            document.getElementById("Cards").innerHTML= text;
        }
    
    
    }

    if(document.URL=="http://localhost/E-Lyrics.org/add?artist=758"){

        if($multiple<=0){
            alert("Can't Be 0 or lower then 0");
        }else if
        ($multiple>1000){
    
            alert("only 1000 or less , so your navigator can handle it");
    
        }else{
    
            document.getElementById("Train").value= $multiple;
    
            var text=`
            `;
        
            for(var i=1; i <= $multiple ; i++){
        
                text+=`
                <div class="card-header m-2">
                    <div class="form-group p-2">
                        <label for="Artist${i}">Artist ${i}</label>
                        <input type="text" name="Artist${i}" class="form-control" placeholder="Artist">
                    </div>
                </div>
                `
            }
        
            document.getElementById("Cards").innerHTML= text;
        }
    
    }

    if(document.URL=="http://localhost/E-Lyrics.org/add?album=758"){

    if($multiple<=0){
        alert("Can't Be 0 or lower then 0");
    }else if
    ($multiple>1000){

        alert("only 1000 or less , so your navigator can handle it");

    }else{

        document.getElementById("Train").value= $multiple;

        var text=`
        `;
    
        for(var i=1; i <= $multiple ; i++){
    
            text+=`
            <div class="card-header m-2">
                <div class="form-group p-2">
                    <label for="Album${i}">Album ${i}</label>
                    <input type="text" name="Album${i}" class="form-control" placeholder="Artist">
                </div>
            </div>
            `
        }
    
        document.getElementById("Cards").innerHTML= text;
    }

}


    
}